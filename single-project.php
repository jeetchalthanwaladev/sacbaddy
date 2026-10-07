<?php
/**
 * The template for displaying single Project post type
 *
 * @package Sakbaddy
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

get_header();

$subtitle = get_post_meta( get_the_ID(), '_sakbaddy_project_subtitle', true );
$url      = get_post_meta( get_the_ID(), '_sakbaddy_project_url', true );
$github   = get_post_meta( get_the_ID(), '_sakbaddy_project_github', true );
$tech     = get_post_meta( get_the_ID(), '_sakbaddy_project_tech', true );
$terms    = get_the_terms( get_the_ID(), 'project_category' );
?>

<div class="page-hero-banner">
    <div class="container" style="max-width:1200px; margin:0 auto; padding:0 24px;">
        <span class="portfolio-cat" style="color:#ff9000; font-weight:700; text-transform:uppercase; letter-spacing:0.05em; margin-bottom:8px; display:block;">
            <?php echo esc_html( $subtitle ? $subtitle : __( 'Project Case Study', 'sakbaddy' ) ); ?>
        </span>
        <h1 class="page-title" style="margin-top:0; font-size:clamp(2.2rem, 5vw, 3.2rem);"><?php the_title(); ?></h1>
    </div>
</div>

<div class="site-main-content">
    <main id="primary" class="site-main" role="main">
        <?php
        while ( have_posts() ) :
            the_post();
            ?>
            <article id="project-<?php the_ID(); ?>" <?php post_class( 'single-post-wrapper' ); ?>>
                <?php if ( has_post_thumbnail() ) : ?>
                    <div class="post-thumbnail" style="margin-bottom:35px; border-radius:12px; overflow:hidden; box-shadow:0 12px 40px rgba(0,0,0,0.06);">
                        <?php the_post_thumbnail( 'full' ); ?>
                    </div>
                <?php endif; ?>

                <div class="project-meta-box">
                    <?php if ( ! empty( $terms ) && ! is_wp_error( $terms ) ) : ?>
                        <div class="project-meta-item">
                            <strong><?php esc_html_e( 'Category', 'sakbaddy' ); ?></strong>
                            <span><?php echo esc_html( implode( ', ', wp_list_pluck( $terms, 'name' ) ) ); ?></span>
                        </div>
                    <?php endif; ?>

                    <?php if ( ! empty( $tech ) ) : ?>
                        <div class="project-meta-item">
                            <strong><?php esc_html_e( 'Technologies', 'sakbaddy' ); ?></strong>
                            <span><?php echo esc_html( $tech ); ?></span>
                        </div>
                    <?php endif; ?>

                    <div class="project-meta-item">
                        <strong><?php esc_html_e( 'Published', 'sakbaddy' ); ?></strong>
                        <span><?php echo esc_html( get_the_date() ); ?></span>
                    </div>
                </div>

                <div class="single-post-content">
                    <?php the_content(); ?>
                </div>

                <div class="btn-group">
                    <?php if ( ! empty( $url ) ) : ?>
                        <a href="<?php echo esc_url( $url ); ?>" target="_blank" rel="noopener noreferrer" class="btn-view-project">
                            <?php esc_html_e( 'Launch Live Project', 'sakbaddy' ); ?> &rarr;
                        </a>
                    <?php endif; ?>

                    <?php if ( ! empty( $github ) ) : ?>
                        <a href="<?php echo esc_url( $github ); ?>" target="_blank" rel="noopener noreferrer" class="btn-github">
                            <?php esc_html_e( 'View Source Code', 'sakbaddy' ); ?>
                        </a>
                    <?php endif; ?>

                    <a href="<?php echo esc_url( home_url( '/#portfolio' ) ); ?>" class="btn-github" style="background:#6b7280;">
                        &larr; <?php esc_html_e( 'Back to Portfolio', 'sakbaddy' ); ?>
                    </a>
                </div>
            </article>
            <?php
        endwhile;
        ?>
    </main>
</div>

<?php
get_footer();
