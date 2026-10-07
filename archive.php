<?php
/**
 * The template for displaying archive pages
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
        <h1 class="page-title"><?php the_archive_title(); ?></h1>
        <?php the_archive_description( '<div class="archive-description" style="color:#727079; margin-top:10px;">', '</div>' ); ?>
    </div>
</div>

<div class="site-main-content">
    <main id="primary" class="site-main" role="main">
        <?php if ( have_posts() ) : ?>
            <div class="posts-list" style="display: grid; gap: 32px;">
                <?php
                while ( have_posts() ) :
                    the_post();
                    ?>
                    <article id="post-<?php the_ID(); ?>" <?php post_class( 'blog-card' ); ?> style="background:#fff; padding:32px; border-radius:12px; box-shadow:0 4px 20px rgba(0,0,0,0.03);">
                        <header class="entry-header">
                            <h2 class="entry-title" style="margin-bottom:12px; font-weight:800;">
                                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                            </h2>
                            <div class="entry-meta" style="color:#727079; font-size:0.88rem; margin-bottom:16px;">
                                <span><?php echo get_the_date(); ?></span>
                            </div>
                        </header>

                        <div class="entry-summary" style="line-height:1.7; color:#5d5c64; margin-bottom:20px;">
                            <?php the_excerpt(); ?>
                        </div>

                        <a href="<?php the_permalink(); ?>" class="btn-read-more" style="color:#ff9000; font-weight:700; text-decoration:none;">
                            <?php esc_html_e( 'Read More &rarr;', 'sakbaddy' ); ?>
                        </a>
                    </article>
                    <?php
                endwhile;
                the_posts_navigation();
                ?>
            </div>
        <?php else : ?>
            <p><?php esc_html_e( 'No items found in this archive.', 'sakbaddy' ); ?></p>
        <?php endif; ?>
    </main>
</div>

<?php
get_footer();
