<?php
/**
 * Template part: Testimonials Section
 *
 * @package Sakbaddy
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

$section_tag = get_theme_mod( 'sakbaddy_testimonials_tag', 'Testimonials.' );

// Query Testimonials CPT
$test_query = new WP_Query( array(
    'post_type'      => 'testimonial',
    'posts_per_page' => 12,
    'orderby'        => 'menu_order',
    'order'          => 'ASC',
) );

$testimonials = array();
if ( $test_query->have_posts() ) {
    while ( $test_query->have_posts() ) {
        $test_query->the_post();
        $id = get_the_ID();

        $avatar = get_the_post_thumbnail_url( $id, 'sakbaddy-avatar' );
        if ( ! $avatar ) {
            $default_img = get_post_meta( $id, '_sakbaddy_default_image', true );
            $avatar = ! empty( $default_img ) ? sakbaddy_asset( $default_img ) : sakbaddy_asset( 'src/testimonials/testimonial-1.webp' );
        }

        $testimonials[] = array(
            'name'    => get_the_title(),
            'role'    => get_post_meta( $id, '_sakbaddy_testimonial_role', true ),
            'content' => get_the_content(),
            'avatar'  => $avatar,
        );
    }
    wp_reset_postdata();
} else {
    // Default fallback 3 testimonials
    $testimonials = array(
        array(
            'name'    => 'Nancy Byers',
            'role'    => 'CEO at ib-themes',
            'content' => "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.",
            'avatar'  => sakbaddy_asset( 'src/testimonials/testimonial-1.webp' ),
        ),
        array(
            'name'    => 'Jara Afsari',
            'role'    => 'CEO at ib-themes',
            'content' => "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.",
            'avatar'  => sakbaddy_asset( 'src/testimonials/testimonial-2.webp' ),
        ),
        array(
            'name'    => 'Alexander Wright',
            'role'    => 'Product Lead at ib-themes',
            'content' => "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.",
            'avatar'  => sakbaddy_asset( 'src/testimonials/testimonial-3.webp' ),
        ),
    );
}
?>
<section class="testimonials" id="testimonials">
    <div class="testimonials-container">
        <?php if ( ! empty( $section_tag ) ) : ?>
            <div class="section-tag testimonials-tag"><?php echo esc_html( $section_tag ); ?></div>
        <?php endif; ?>

        <div class="testimonials-slider" id="testimonialsSlider">
            <div class="testimonials-track" id="testimonialsTrack">
                <?php foreach ( $testimonials as $item ) : ?>
                    <article class="testimonial-card">
                        <div class="testimonial-avatar">
                            <img src="<?php echo esc_url( $item['avatar'] ); ?>" alt="<?php echo esc_attr( $item['name'] ); ?>" loading="lazy" />
                        </div>
                        <div class="testimonial-content">
                            <p class="testimonial-text">
                                <?php echo wp_kses_post( $item['content'] ); ?>
                            </p>
                            <h3 class="testimonial-name"><?php echo esc_html( $item['name'] ); ?></h3>
                            <?php if ( ! empty( $item['role'] ) ) : ?>
                                <span class="testimonial-role"><?php echo esc_html( $item['role'] ); ?></span>
                            <?php endif; ?>
                        </div>
                    </article>
                <?php endforeach; ?>
            </div>
        </div>

        <div class="testimonials-dots" id="testimonialsDots" role="tablist" aria-label="<?php esc_attr_e( 'Testimonial navigation', 'sakbaddy' ); ?>">
        </div>
    </div>
</section>
<div class="testimonials-wave testimonials-wave-bottom" aria-hidden="true"></div>
