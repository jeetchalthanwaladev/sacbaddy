<?php
get_header();
?>
<main id="main-content" class="content-page">
	<header><h1><?php the_archive_title(); ?></h1><?php the_archive_description( '<div class="archive-description">', '</div>' ); ?></header>
	<?php if ( have_posts() ) : ?>
		<div class="portfolio-grid">
			<?php while ( have_posts() ) : the_post(); ?>
				<article <?php post_class( 'portfolio-card' ); ?>>
					<a href="<?php the_permalink(); ?>"><?php if ( has_post_thumbnail() ) { the_post_thumbnail( 'large', array( 'loading' => 'lazy' ) ); } ?><h2 class="portfolio-title"><?php the_title(); ?></h2></a>
					<?php the_excerpt(); ?>
				</article>
			<?php endwhile; ?>
		</div>
		<?php the_posts_pagination(); ?>
	<?php else : ?>
		<p><?php esc_html_e( 'Nothing has been published yet.', 'sakbaddy' ); ?></p>
	<?php endif; ?>
</main>
<?php
get_footer();
