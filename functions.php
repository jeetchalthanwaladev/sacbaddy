<?php
/**
 * Sakbaddy Theme Functions and Definitions
 *
 * @package Sakbaddy
 * @version 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

define( 'SAKBADDY_VERSION', '1.0.0' );
define( 'SAKBADDY_DIR', get_template_directory() );
define( 'SAKBADDY_URI', get_template_directory_uri() );

/* ==========================================================================
   1. THEME SETUP
   ========================================================================== */
function sakbaddy_setup() {
    load_theme_textdomain( 'sakbaddy', SAKBADDY_DIR . '/languages' );

    // Core WP Features
    add_theme_support( 'title-tag' );
    add_theme_support( 'post-thumbnails' );
    add_theme_support( 'responsive-embeds' );
    add_theme_support( 'automatic-feed-links' );

    add_theme_support( 'html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
        'style',
        'script',
    ) );

    add_theme_support( 'custom-logo', array(
        'height'      => 80,
        'width'       => 80,
        'flex-height' => true,
        'flex-width'  => true,
    ) );

    // Custom Image Sizes
    add_image_size( 'sakbaddy-thumb', 600, 600, true );
    add_image_size( 'sakbaddy-portfolio', 800, 600, true );
    add_image_size( 'sakbaddy-avatar', 160, 160, true );

    // Menus
    register_nav_menus( array(
        'primary'        => __( 'Primary Navigation', 'sakbaddy' ),
        'footer'         => __( 'Footer Quick Links', 'sakbaddy' ),
        'footer_support' => __( 'Footer Support Links', 'sakbaddy' ),
    ) );
}
add_action( 'after_setup_theme', 'sakbaddy_setup' );

/* ==========================================================================
   2. ENQUEUE STYLES AND SCRIPTS
   ========================================================================== */
function sakbaddy_scripts() {
    // Google Fonts: Inter & Rubik
    wp_enqueue_style(
        'sakbaddy-fonts',
        'https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&family=Rubik:wght@500;700;800&display=swap',
        array(),
        null
    );

    // Helper for CSS path (checks assets/css first, then style/)
    $css_dir = file_exists( SAKBADDY_DIR . '/assets/css/vnavbar.css' ) ? SAKBADDY_URI . '/assets/css' : SAKBADDY_URI . '/style';

    wp_enqueue_style( 'sakbaddy-vnavbar', $css_dir . '/vnavbar.css', array(), SAKBADDY_VERSION );
    wp_enqueue_style( 'sakbaddy-hero', $css_dir . '/hero.css', array(), SAKBADDY_VERSION );
    wp_enqueue_style( 'sakbaddy-about', $css_dir . '/about.css', array(), SAKBADDY_VERSION );
    wp_enqueue_style( 'sakbaddy-skills', $css_dir . '/skills.css', array(), SAKBADDY_VERSION );
    wp_enqueue_style( 'sakbaddy-portfolio', $css_dir . '/my_portfolio.css', array(), SAKBADDY_VERSION );
    wp_enqueue_style( 'sakbaddy-testimonials', $css_dir . '/testimonials.css', array(), SAKBADDY_VERSION );
    wp_enqueue_style( 'sakbaddy-contact', $css_dir . '/contact.css', array(), SAKBADDY_VERSION );
    wp_enqueue_style( 'sakbaddy-header', $css_dir . '/header.css', array(), SAKBADDY_VERSION );
    wp_enqueue_style( 'sakbaddy-footer', $css_dir . '/footer.css', array(), SAKBADDY_VERSION );
    wp_enqueue_style( 'sakbaddy-responsive', $css_dir . '/style.css', array(), SAKBADDY_VERSION );

    // Main style.css (Theme header and WP utilities)
    wp_enqueue_style( 'sakbaddy-main-style', get_stylesheet_uri(), array(), SAKBADDY_VERSION );

    // Main Vanilla JS
    wp_enqueue_script(
        'sakbaddy-main',
        SAKBADDY_URI . '/assets/js/main.js',
        array(),
        SAKBADDY_VERSION,
        true
    );

    // Localize Data for AJAX contact form
    wp_localize_script( 'sakbaddy-main', 'sakbaddy_data', array(
        'ajax_url'       => admin_url( 'admin-ajax.php' ),
        'nonce'          => wp_create_nonce( 'sakbaddy_contact_nonce' ),
        'form_mode'      => get_theme_mod( 'sakbaddy_form_mode', 'ajax' ),
        'formspree_url'  => get_theme_mod( 'sakbaddy_formspree_url', '' ),
        'home_url'       => home_url(),
    ) );
}
add_action( 'wp_enqueue_scripts', 'sakbaddy_scripts' );

/* ==========================================================================
   3. HELPER FUNCTIONS
   ========================================================================== */

/**
 * Returns URI to a theme asset with fallback support.
 */
function sakbaddy_asset( $path ) {
    $clean_path = ltrim( $path, '/' );
    return SAKBADDY_URI . '/' . $clean_path;
}

/**
 * Returns social media links array from Customizer.
 */
function sakbaddy_get_social_links() {
    $networks = array(
        'facebook'  => array( 'title' => 'Facebook', 'icon' => 'src/icons/facebook.png' ),
        'twitter'   => array( 'title' => 'Twitter', 'icon' => 'src/icons/twitter.png' ),
        'instagram' => array( 'title' => 'Instagram', 'icon' => 'src/icons/insta.png' ),
        'linkedin'  => array( 'title' => 'LinkedIn', 'icon' => 'src/icons/linkedin.png' ),
        'pinterest' => array( 'title' => 'Pinterest', 'icon' => 'src/icons/pintrest.png' ),
        'github'    => array( 'title' => 'GitHub', 'icon' => '' ),
        'youtube'   => array( 'title' => 'YouTube', 'icon' => '' ),
    );

    $links = array();
    foreach ( $networks as $key => $data ) {
        $url = get_theme_mod( 'sakbaddy_social_' . $key, '#' );
        if ( ! empty( $url ) ) {
            $links[ $key ] = array(
                'title' => $data['title'],
                'url'   => $url,
                'icon'  => $data['icon'] ? sakbaddy_asset( $data['icon'] ) : '',
            );
        }
    }
    return $links;
}

/* ==========================================================================
   4. INCLUDE MODULES
   ========================================================================== */
require_once SAKBADDY_DIR . '/inc/customizer.php';
require_once SAKBADDY_DIR . '/inc/cpt.php';
require_once SAKBADDY_DIR . '/inc/ajax.php';
require_once SAKBADDY_DIR . '/inc/seo.php';
require_once SAKBADDY_DIR . '/inc/analytics.php';
require_once SAKBADDY_DIR . '/inc/sample-data.php';
