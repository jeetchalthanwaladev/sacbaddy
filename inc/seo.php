<?php
/**
 * Sakbaddy SEO & Metadata Management
 * Outputs canonical URLs, Open Graph, and Twitter metadata,
 * intelligently deferring to Yoast or Rank Math if either plugin is active.
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

function sakbaddy_has_seo_plugin() {
    return defined( 'WPSEO_VERSION' ) || class_exists( 'RankMath' ) || defined( 'AIOSEO_VERSION' );
}

function sakbaddy_output_seo_meta() {
    // If a dedicated SEO plugin is handling meta tags, do not duplicate
    if ( sakbaddy_has_seo_plugin() ) {
        return;
    }

    $site_name   = get_bloginfo( 'name' );
    $description = get_theme_mod( 'sakbaddy_seo_description', 'Professional full-stack developer creating modern and responsive websites.' );
    $title       = wp_get_document_title();
    $canonical   = home_url( add_query_arg( array(), $GLOBALS['wp']->request ) );
    $og_type     = is_singular() ? 'article' : 'website';
    $og_image    = get_theme_mod( 'sakbaddy_seo_og_image', '' );

    if ( is_singular() && has_post_thumbnail() ) {
        $og_image = get_the_post_thumbnail_url( get_the_ID(), 'large' );
    } elseif ( empty( $og_image ) ) {
        $og_image = get_template_directory_uri() . '/src/image0.png';
    }

    if ( is_singular() && has_excerpt() ) {
        $description = get_the_excerpt();
    }
    ?>
    <meta name="description" content="<?php echo esc_attr( wp_strip_all_tags( $description ) ); ?>">
    <link rel="canonical" href="<?php echo esc_url( $canonical ); ?>">

    <!-- Open Graph Metadata -->
    <meta property="og:site_name" content="<?php echo esc_attr( $site_name ); ?>">
    <meta property="og:type" content="<?php echo esc_attr( $og_type ); ?>">
    <meta property="og:title" content="<?php echo esc_attr( $title ); ?>">
    <meta property="og:description" content="<?php echo esc_attr( wp_strip_all_tags( $description ) ); ?>">
    <meta property="og:url" content="<?php echo esc_url( $canonical ); ?>">
    <?php if ( ! empty( $og_image ) ) : ?>
        <meta property="og:image" content="<?php echo esc_url( $og_image ); ?>">
    <?php endif; ?>

    <!-- Twitter Cards -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="<?php echo esc_attr( $title ); ?>">
    <meta name="twitter:description" content="<?php echo esc_attr( wp_strip_all_tags( $description ) ); ?>">
    <?php if ( ! empty( $og_image ) ) : ?>
        <meta name="twitter:image" content="<?php echo esc_url( $og_image ); ?>">
    <?php endif; ?>
    <?php
}
add_action( 'wp_head', 'sakbaddy_output_seo_meta', 1 );
