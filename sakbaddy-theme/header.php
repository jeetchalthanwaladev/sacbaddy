<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<a class="screen-reader-text" href="#main-content"><?php esc_html_e( 'Skip to content', 'sakbaddy' ); ?></a>
<nav class="vnavbar" id="site-navigation" aria-label="<?php esc_attr_e( 'Main navigation', 'sakbaddy' ); ?>">
	<div class="container">
		<div class="logo">
			<?php if ( has_custom_logo() ) : ?>
				<?php the_custom_logo(); ?>
			<?php else : ?>
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" aria-label="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>">
					<?php echo esc_html( strtoupper( substr( get_bloginfo( 'name' ), 0, 1 ) ) ); ?>
				</a>
			<?php endif; ?>
		</div>
		<?php
		wp_nav_menu( array(
			'theme_location' => 'primary',
			'container'      => false,
			'menu_class'     => 'nav-links',
			'menu_id'        => 'primary-menu',
			'fallback_cb'    => 'sakbaddy_default_menu',
			'depth'          => 1,
		) );
		?>
	</div>
</nav>
<button class="nav-toggle" type="button" aria-label="<?php esc_attr_e( 'Open navigation', 'sakbaddy' ); ?>" aria-expanded="false" aria-controls="site-navigation">
	<span></span><span></span><span></span>
</button>
