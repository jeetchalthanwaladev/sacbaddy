<?php
/**
 * The template for displaying all individual pages
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
        <h1 class="page-title"><?php the_title(); ?></h1>
    </div>
</div>

<div class="site-main-content">
    <main id="primary" class="site-main" role="main">
        <?php
        while ( have_posts() ) :
            the_post();
            ?>
            <article id="page-<?php the_ID(); ?>" <?php post_class( 'single-post-wrapper' ); ?>>
                <?php if ( has_post_thumbnail() ) : ?>
                    <div class="post-thumbnail" style="margin-bottom:30px; border-radius:12px; overflow:hidden;">
                        <?php the_post_thumbnail( 'full' ); ?>
                    </div>
                <?php endif; ?>

                <div class="single-post-content">
                    <?php
                    the_content();
                    wp_link_pages( array(
                        'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'sakbaddy' ),
                        'after'  => '</div>',
                    ) );
                    ?>
                </div>
            </article>
            <?php
        endwhile;
        ?>
    </main>
</div>

<?php
get_footer();
