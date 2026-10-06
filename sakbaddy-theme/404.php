<?php
get_header();
?>
<main id="main-content" class="content-page">
	<h1><?php esc_html_e( 'Page not found', 'sakbaddy' ); ?></h1>
	<p><?php esc_html_e( 'The page you were looking for could not be found.', 'sakbaddy' ); ?></p>
	<p><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'Return to the homepage', 'sakbaddy' ); ?></a></p>
</main>
<?php
get_footer();
