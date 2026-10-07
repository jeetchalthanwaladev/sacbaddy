<?php
/**
 * Template part: Top Header Bar
 * Header used on subpages and standard blog/archive views.
 *
 * @package Sakbaddy
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

$site_title = get_bloginfo( 'name' );
$logo_letter = ! empty( $site_title ) ? mb_substr( $site_title, 0, 1 ) : 'S';
$phone = get_theme_mod( 'sakbaddy_hero_phone', '+91 98765 43210' );
$email = get_theme_mod( 'sakbaddy_hero_email', 'sakbaddy@gmail.com' );
?>
<header class="site-header" role="banner">
    <div class="container">
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="brand" aria-label="<?php echo esc_attr( $site_title ); ?> home">
            <span class="brand-mark"><?php echo esc_html( $logo_letter ); ?></span>
            <span class="brand-text"><?php echo esc_html( $site_title ); ?></span>
        </a>

        <nav class="main-nav" aria-label="<?php esc_attr_e( 'Main navigation', 'sakbaddy' ); ?>">
            <?php if ( ! empty( $phone ) ) : ?>
                <a href="<?php echo esc_url( 'tel:' . preg_replace( '/[^0-9+]/', '', $phone ) ); ?>"><?php echo esc_html( $phone ); ?></a>
            <?php endif; ?>
            <?php if ( ! empty( $email ) ) : ?>
                <a href="<?php echo esc_url( 'mailto:' . sanitize_email( $email ) ); ?>"><?php echo esc_html( $email ); ?></a>
            <?php endif; ?>
        </nav>

        <div class="header-actions">
            <a href="<?php echo esc_url( wp_login_url() ); ?>" class="btn btn-secondary"><?php esc_html_e( 'Log in', 'sakbaddy' ); ?></a>
            <a href="<?php echo esc_url( home_url( '/#contact' ) ); ?>" class="btn btn-primary"><?php esc_html_e( 'Get Started', 'sakbaddy' ); ?></a>
        </div>
    </div>
</header>
