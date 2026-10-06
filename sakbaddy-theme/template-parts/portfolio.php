<?php
$project_terms = get_terms( array( 'taxonomy' => 'sakbaddy_project_category', 'hide_empty' => true ) );
$projects      = new WP_Query( array(
	'post_type'      => 'sakbaddy_project',
	'post_status'    => 'publish',
	'posts_per_page' => 30,
	'meta_key'       => '_sakbaddy_project_order',
	'orderby'        => array( 'meta_value_num' => 'ASC', 'date' => 'DESC' ),
) );
$fallback_projects = array(
	array( 'Curology Skincare', 'Fashion / Photography', '1.jpg', 'fashion photography branding' ),
	array( 'Goby Blue Edition', 'Product / Branding', '4.jpg', 'product branding' ),
	array( 'LARQ PureVis Coral', 'Product / Fashion', '7.jpg', 'product fashion photography' ),
	array( 'Honest Beauty Primer', 'Branding / Product', '2.jpg', 'branding product' ),
	array( 'LARQ Bottle Botanical', 'Product / Photography', '5.jpg', 'product photography' ),
	array( 'GOBY Rose Pink', 'Product / Fashion', '8.jpg', 'product fashion' ),
	array( 'Urban Sportswear', 'Fashion / Photography', '3.jpg', 'fashion photography' ),
	array( 'The Doodle Club', 'Branding / Illustration', '6.jpg', 'branding photography' ),
	array( 'Aero Fixed Gear', 'Product / Photography', '9.jpg', 'product photography branding' ),
);
$fallback_categories = array(
	'branding'    => __( 'Branding', 'sakbaddy' ),
	'photography' => __( 'Photography', 'sakbaddy' ),
	'fashion'     => __( 'Fashion', 'sakbaddy' ),
	'product'     => __( 'Product', 'sakbaddy' ),
);
?>
<section class="portfolio-section" id="portfolio">
	<div class="portfolio-container">
		<div class="portfolio-header"><h2 class="section-tag portfolio-tag"><?php esc_html_e( 'My Portfolio.', 'sakbaddy' ); ?></h2></div>
		<div class="portfolio-filter-nav" role="tablist" aria-label="<?php esc_attr_e( 'Portfolio categories', 'sakbaddy' ); ?>">
			<button class="filter-btn active" data-filter="all" type="button" role="tab" aria-selected="true"><?php esc_html_e( 'All', 'sakbaddy' ); ?><span class="active-indicator"></span></button>
			<?php if ( ! is_wp_error( $project_terms ) && $project_terms ) : ?>
				<?php foreach ( $project_terms as $term ) : ?>
					<button class="filter-btn" data-filter="<?php echo esc_attr( $term->slug ); ?>" type="button" role="tab" aria-selected="false"><?php echo esc_html( $term->name ); ?><span class="active-indicator"></span></button>
				<?php endforeach; ?>
			<?php else : ?>
				<?php foreach ( $fallback_categories as $slug => $label ) : ?>
					<button class="filter-btn" data-filter="<?php echo esc_attr( $slug ); ?>" type="button" role="tab" aria-selected="false"><?php echo esc_html( $label ); ?><span class="active-indicator"></span></button>
				<?php endforeach; ?>
			<?php endif; ?>
		</div>
		<div class="portfolio-grid" id="portfolioGrid">
			<?php if ( $projects->have_posts() ) : ?>
				<?php while ( $projects->have_posts() ) : $projects->the_post(); $terms = get_the_terms( get_the_ID(), 'sakbaddy_project_category' ); $slugs = ( $terms && ! is_wp_error( $terms ) ) ? wp_list_pluck( $terms, 'slug' ) : array(); $project_url = get_post_meta( get_the_ID(), '_sakbaddy_project_url', true ); ?>
					<article class="portfolio-card" data-category="<?php echo esc_attr( implode( ' ', $slugs ) ); ?>">
						<?php if ( has_post_thumbnail() ) { the_post_thumbnail( 'large', array( 'loading' => 'lazy' ) ); } ?>
						<div class="portfolio-overlay">
							<div class="portfolio-info"><h3 class="portfolio-title"><?php the_title(); ?></h3><span class="portfolio-cat"><?php echo esc_html( $terms && ! is_wp_error( $terms ) ? implode( ' / ', wp_list_pluck( $terms, 'name' ) ) : '' ); ?></span></div>
							<?php if ( $project_url ) : ?><a class="portfolio-icon" href="<?php echo esc_url( $project_url ); ?>" aria-label="<?php echo esc_attr( sprintf( __( 'View %s project', 'sakbaddy' ), get_the_title() ) ); ?>" target="_blank" rel="noopener noreferrer">↗</a><?php endif; ?>
						</div>
					</article>
				<?php endwhile; wp_reset_postdata(); ?>
			<?php else : ?>
				<?php foreach ( $fallback_projects as $project ) : ?>
					<article class="portfolio-card" data-category="<?php echo esc_attr( $project[3] ); ?>">
						<img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/portfolio/' . $project[2] ); ?>" alt="<?php echo esc_attr( $project[0] ); ?>" loading="lazy">
						<div class="portfolio-overlay"><div class="portfolio-info"><h3 class="portfolio-title"><?php echo esc_html( $project[0] ); ?></h3><span class="portfolio-cat"><?php echo esc_html( $project[1] ); ?></span></div></div>
					</article>
				<?php endforeach; ?>
			<?php endif; ?>
		</div>
	</div>
</section>
