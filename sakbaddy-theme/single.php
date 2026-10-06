<?php
get_header();
?>
<main id="main-content" class="content-page">
	<?php while ( have_posts() ) : the_post(); ?>
		<article <?php post_class(); ?>>
			<header><h1><?php the_title(); ?></h1></header>
			<?php if ( has_post_thumbnail() ) { the_post_thumbnail( 'large' ); } ?>
			<div class="entry-content"><?php the_content(); ?></div>
			<?php if ( 'sakbaddy_project' === get_post_type() ) : ?>
				<?php $project_url = get_post_meta( get_the_ID(), '_sakbaddy_project_url', true ); ?>
				<?php if ( $project_url ) : ?><p><a href="<?php echo esc_url( $project_url ); ?>" target="_blank" rel="noopener noreferrer"><?php esc_html_e( 'View project', 'sakbaddy' ); ?></a></p><?php endif; ?>
			<?php endif; ?>
		</article>
	<?php endwhile; ?>
</main>
<?php
get_footer();
