<?php
get_header();
?>
<main id="main-content" class="content-page">
	<?php if ( have_posts() ) : ?>
		<?php while ( have_posts() ) : the_post(); ?>
			<article <?php post_class(); ?>>
				<header><h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1></header>
				<div class="entry-content"><?php the_excerpt(); ?></div>
			</article>
		<?php endwhile; ?>
		<?php the_posts_pagination(); ?>
	<?php else : ?>
		<h1><?php esc_html_e( 'Welcome', 'sakbaddy' ); ?></h1>
		<p><?php esc_html_e( 'There is no content to display yet.', 'sakbaddy' ); ?></p>
	<?php endif; ?>
</main>
<?php
get_footer();
