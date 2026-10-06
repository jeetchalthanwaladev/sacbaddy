<?php
$testimonials = new WP_Query( array(
	'post_type'      => 'sakbaddy_testimonial',
	'post_status'    => 'publish',
	'posts_per_page' => 12,
	'meta_key'       => '_sakbaddy_testimonial_order',
	'orderby'        => array( 'meta_value_num' => 'ASC', 'date' => 'DESC' ),
) );
$fallback_testimonials = array(
	array( 'Nancy Byers', 'CEO at ib-themes', 'testimonial-1.webp' ),
	array( 'Jara Afsari', 'CEO at ib-themes', 'testimonial-2.webp' ),
	array( 'Alexander Wright', 'Product Lead at ib-themes', 'testimonial-3.webp' ),
);
?>
<section class="testimonials" id="testimonials">
	<div class="testimonials-container">
		<h2 class="section-tag testimonials-tag"><?php esc_html_e( 'Testimonials.', 'sakbaddy' ); ?></h2>
		<div class="testimonials-slider" id="testimonialsSlider"><div class="testimonials-track" id="testimonialsTrack">
			<?php if ( $testimonials->have_posts() ) : ?>
				<?php while ( $testimonials->have_posts() ) : $testimonials->the_post(); ?>
					<article class="testimonial-card">
						<div class="testimonial-avatar"><?php if ( has_post_thumbnail() ) { the_post_thumbnail( 'thumbnail', array( 'loading' => 'lazy' ) ); } ?></div>
						<div class="testimonial-content"><p class="testimonial-text"><?php echo esc_html( get_the_content() ); ?></p><h3 class="testimonial-name"><?php the_title(); ?></h3><span class="testimonial-role"><?php echo esc_html( get_post_meta( get_the_ID(), '_sakbaddy_testimonial_role', true ) ); ?></span></div>
					</article>
				<?php endwhile; wp_reset_postdata(); ?>
			<?php else : ?>
				<?php foreach ( $fallback_testimonials as $testimonial ) : ?>
					<article class="testimonial-card"><div class="testimonial-avatar"><img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/testimonials/' . $testimonial[2] ); ?>" alt="<?php echo esc_attr( $testimonial[0] ); ?>" loading="lazy"></div><div class="testimonial-content"><p class="testimonial-text"><?php esc_html_e( 'I enjoyed working together and was impressed by the thoughtful, polished result.', 'sakbaddy' ); ?></p><h3 class="testimonial-name"><?php echo esc_html( $testimonial[0] ); ?></h3><span class="testimonial-role"><?php echo esc_html( $testimonial[1] ); ?></span></div></article>
				<?php endforeach; ?>
			<?php endif; ?>
		</div></div>
		<div class="testimonials-dots" id="testimonialsDots" role="tablist" aria-label="<?php esc_attr_e( 'Testimonial navigation', 'sakbaddy' ); ?>"></div>
	</div>
</section>
<div class="testimonials-wave testimonials-wave-bottom" aria-hidden="true"></div>
