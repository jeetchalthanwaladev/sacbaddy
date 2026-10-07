<?php
/**
 * The template for displaying all single blog posts
 *
 * @package Sakbaddy
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

get_header();
?>

<div class="site-main-content">
    <main id="primary" class="site-main" role="main">
        <?php
        while ( have_posts() ) :
            the_post();
            ?>
            <article id="post-<?php the_ID(); ?>" <?php post_class( 'single-post-wrapper' ); ?>>
                <header class="entry-header" style="margin-bottom:28px;">
                    <h1 class="entry-title" style="font-size:clamp(2rem, 4vw, 2.8rem); font-weight:800; color:#111018; margin-bottom:14px;"><?php the_title(); ?></h1>
                    <div class="single-post-meta">
                        <span><?php echo esc_html( get_the_date() ); ?></span>
                        <span>&bull;</span>
                        <span><?php the_author_posts_link(); ?></span>
                        <?php if ( has_category() ) : ?>
                            <span>&bull;</span>
                            <span><?php the_category( ', ' ); ?></span>
                        <?php endif; ?>
                    </div>
                </header>

                <?php if ( has_post_thumbnail() ) : ?>
                    <div class="post-thumbnail" style="margin-bottom:35px; border-radius:12px; overflow:hidden;">
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

                <footer class="entry-footer" style="margin-top:40px; padding-top:20px; border-top:1px solid #e8e8f0;">
                    <?php if ( has_tag() ) : ?>
                        <div class="post-tags" style="color:#727079;">
                            <strong><?php esc_html_e( 'Tags:', 'sakbaddy' ); ?></strong> <?php the_tags( '', ', ', '' ); ?>
                        </div>
                    <?php endif; ?>
                </footer>

                <?php
                if ( comments_open() || get_comments_number() ) :
                    comments_template();
                endif;
                ?>
            </article>
            <?php
        endwhile;
        ?>
    </main>
</div>

<?php
get_footer();
