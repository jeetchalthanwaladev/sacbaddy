<?php
/**
 * Template part: Portfolio Section
 *
 * @package Sakbaddy
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

$section_tag = get_theme_mod( 'sakbaddy_portfolio_tag', 'My Portfolio.' );

// Query Taxonomy Terms for Filters
$categories = get_terms( array(
    'taxonomy'   => 'project_category',
    'hide_empty' => false,
) );

$filter_list = array();
if ( ! empty( $categories ) && ! is_wp_error( $categories ) ) {
    foreach ( $categories as $term ) {
        $filter_list[] = array(
            'slug' => $term->slug,
            'name' => $term->name,
        );
    }
} else {
    // Default fallback filter categories
    $filter_list = array(
        array( 'slug' => 'branding', 'name' => 'Branding' ),
        array( 'slug' => 'photography', 'name' => 'Photography' ),
        array( 'slug' => 'fashion', 'name' => 'Fashion' ),
        array( 'slug' => 'product', 'name' => 'Product' ),
    );
}

// Query Projects
$project_query = new WP_Query( array(
    'post_type'      => 'project',
    'posts_per_page' => -1,
    'orderby'        => 'menu_order',
    'order'          => 'ASC',
) );

$projects = array();
if ( $project_query->have_posts() ) {
    while ( $project_query->have_posts() ) {
        $project_query->the_post();
        $id = get_the_ID();

        // Image
        $img_url = get_the_post_thumbnail_url( $id, 'large' );
        if ( ! $img_url ) {
            $default_img = get_post_meta( $id, '_sakbaddy_default_image', true );
            $img_url = ! empty( $default_img ) ? sakbaddy_asset( $default_img ) : sakbaddy_asset( 'src/portfolio/1.jpg' );
        }

        // Terms for filter matching
        $terms = get_the_terms( $id, 'project_category' );
        $cat_slugs = array( 'all' );
        $cat_names = array();
        if ( $terms && ! is_wp_error( $terms ) ) {
            foreach ( $terms as $t ) {
                $cat_slugs[] = strtolower( $t->slug );
                $cat_names[] = $t->name;
            }
        }

        $subtitle = get_post_meta( $id, '_sakbaddy_project_subtitle', true );
        if ( empty( $subtitle ) && ! empty( $cat_names ) ) {
            $subtitle = implode( ' / ', $cat_names );
        }

        $projects[] = array(
            'id'       => $id,
            'title'    => get_the_title(),
            'subtitle' => $subtitle,
            'image'    => $img_url,
            'cats'     => implode( ' ', $cat_slugs ),
            'url'      => get_post_meta( $id, '_sakbaddy_project_url', true ),
            'github'   => get_post_meta( $id, '_sakbaddy_project_github', true ),
        );
    }
    wp_reset_postdata();
} else {
    // Default fallback 9 projects
    $projects = array(
        array( 'title' => 'Curology Skincare', 'subtitle' => 'Fashion / Photography', 'image' => sakbaddy_asset( 'src/portfolio/1.jpg' ), 'cats' => 'all fashion photography branding', 'url' => '', 'github' => '' ),
        array( 'title' => 'Goby Blue Edition', 'subtitle' => 'Product / Branding', 'image' => sakbaddy_asset( 'src/portfolio/4.jpg' ), 'cats' => 'all product branding', 'url' => '', 'github' => '' ),
        array( 'title' => 'LARQ PureVis Coral', 'subtitle' => 'Product / Fashion', 'image' => sakbaddy_asset( 'src/portfolio/7.jpg' ), 'cats' => 'all product fashion photography', 'url' => '', 'github' => '' ),
        array( 'title' => 'Honest Beauty Primer', 'subtitle' => 'Branding / Product', 'image' => sakbaddy_asset( 'src/portfolio/2.jpg' ), 'cats' => 'all branding product', 'url' => '', 'github' => '' ),
        array( 'title' => 'LARQ Bottle Botanical', 'subtitle' => 'Product / Photography', 'image' => sakbaddy_asset( 'src/portfolio/5.jpg' ), 'cats' => 'all product photography', 'url' => '', 'github' => '' ),
        array( 'title' => 'GOBY Rose Pink', 'subtitle' => 'Product / Fashion', 'image' => sakbaddy_asset( 'src/portfolio/8.jpg' ), 'cats' => 'all product fashion', 'url' => '', 'github' => '' ),
        array( 'title' => 'Urban Sportswear', 'subtitle' => 'Fashion / Photography', 'image' => sakbaddy_asset( 'src/portfolio/3.jpg' ), 'cats' => 'all fashion photography', 'url' => '', 'github' => '' ),
        array( 'title' => 'The Doodle Club', 'subtitle' => 'Branding / Illustration', 'image' => sakbaddy_asset( 'src/portfolio/6.jpg' ), 'cats' => 'all branding illustration photography', 'url' => '', 'github' => '' ),
        array( 'title' => 'Aero Fixed Gear', 'subtitle' => 'Product / Photography', 'image' => sakbaddy_asset( 'src/portfolio/9.jpg' ), 'cats' => 'all product branding photography', 'url' => '', 'github' => '' ),
    );
}
?>
<section class="portfolio-section" id="portfolio">
    <div class="portfolio-container">
        <div class="portfolio-header">
            <?php if ( ! empty( $section_tag ) ) : ?>
                <h2 class="section-tag portfolio-tag"><?php echo esc_html( $section_tag ); ?></h2>
            <?php endif; ?>
        </div>

        <div class="portfolio-filter-nav" role="tablist" aria-label="<?php esc_attr_e( 'Portfolio Categories', 'sakbaddy' ); ?>">
            <button class="filter-btn active" data-filter="all" type="button" role="tab" aria-selected="true">
                <?php esc_html_e( 'All', 'sakbaddy' ); ?>
                <span class="active-indicator"></span>
            </button>
            <?php foreach ( $filter_list as $f ) : ?>
                <button class="filter-btn" data-filter="<?php echo esc_attr( strtolower( $f['slug'] ) ); ?>" type="button" role="tab" aria-selected="false">
                    <?php echo esc_html( $f['name'] ); ?>
                    <span class="active-indicator"></span>
                </button>
            <?php endforeach; ?>
        </div>

        <div class="portfolio-grid" id="portfolioGrid">
            <?php foreach ( $projects as $item ) : ?>
                <div class="portfolio-card"
                     data-category="<?php echo esc_attr( $item['cats'] ); ?>"
                     data-url="<?php echo esc_url( $item['url'] ); ?>"
                     data-github="<?php echo esc_url( $item['github'] ); ?>"
                     tabindex="0"
                     role="button"
                     aria-label="<?php echo esc_attr( $item['title'] ); ?>">
                    <img src="<?php echo esc_url( $item['image'] ); ?>" alt="<?php echo esc_attr( $item['title'] ); ?>" loading="lazy" />
                    <div class="portfolio-overlay">
                        <div class="portfolio-info">
                            <h3 class="portfolio-title"><?php echo esc_html( $item['title'] ); ?></h3>
                            <?php if ( ! empty( $item['subtitle'] ) ) : ?>
                                <span class="portfolio-cat"><?php echo esc_html( $item['subtitle'] ); ?></span>
                            <?php endif; ?>
                        </div>
                        <div class="portfolio-icon" aria-hidden="true">
                            <img src="<?php echo esc_url( sakbaddy_asset( 'src/portfolio/open.jpg' ) ); ?>" alt="<?php esc_attr_e( 'Open project', 'sakbaddy' ); ?>" loading="lazy" />
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- Lightbox Modal for Portfolio Details -->
<div class="portfolio-modal" id="portfolioModal" role="dialog" aria-modal="true" aria-label="<?php esc_attr_e( 'Project Details', 'sakbaddy' ); ?>">
    <div class="modal-backdrop"></div>
    <div class="modal-content">
        <button type="button" class="modal-close" aria-label="<?php esc_attr_e( 'Close modal', 'sakbaddy' ); ?>">&times;</button>
        <div class="modal-image-wrapper">
            <img class="modal-image" src="" alt="" />
        </div>
        <div class="modal-meta">
            <span class="modal-cat"></span>
            <h3 class="modal-title"></h3>
            <div class="modal-links" style="margin-top:14px; display:flex; gap:12px; justify-content:center;"></div>
        </div>
    </div>
</div>
