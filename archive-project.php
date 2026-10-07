<?php
/**
 * The template for displaying the Projects archive
 *
 * @package Sakbaddy
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

get_header();
?>

<div class="page-hero-banner">
    <div class="container" style="max-width:1200px; margin:0 auto; padding:0 24px;">
        <h1 class="page-title"><?php esc_html_e( 'Selected Projects & Case Studies', 'sakbaddy' ); ?></h1>
        <p style="color:#626166; margin-top:8px;"><?php esc_html_e( 'Explore our recent digital creations, client work, and design explorations.', 'sakbaddy' ); ?></p>
    </div>
</div>

<div class="site-main-content" style="padding-top:20px;">
    <main id="primary" class="site-main" role="main">
        <?php get_template_part( 'template-parts/portfolio' ); ?>
    </main>
</div>

<?php
get_footer();
