<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @package Sakbaddy
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

get_header();
?>

<div class="site-main-content" style="display:flex; align-items:center; justify-content:center; text-align:center; min-height:70vh;">
    <main id="primary" class="site-main" role="main">
        <section class="error-404 not-found" style="max-width:600px; margin:0 auto; padding:40px 20px;">
            <div style="font-size: clamp(5rem, 15vw, 8rem); font-weight:900; line-height:1; color:#ff9000; margin-bottom:10px;">
                404
            </div>
            <h1 class="page-title" style="font-size:2rem; font-weight:800; color:#111018; margin-bottom:16px;">
                <?php esc_html_e( 'Page Not Found', 'sakbaddy' ); ?>
            </h1>
            <p style="color:#626166; font-size:1.05rem; line-height:1.7; margin-bottom:30px;">
                <?php esc_html_e( 'The page you are looking for might have been removed, had its name changed, or is temporarily unavailable.', 'sakbaddy' ); ?>
            </p>
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="btn-view-project" style="display:inline-flex;">
                &larr; <?php esc_html_e( 'Return to Homepage', 'sakbaddy' ); ?>
            </a>
        </section>
    </main>
</div>

<?php
get_footer();
