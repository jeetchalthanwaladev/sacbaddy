<?php
$hero_image = absint( sakbaddy_get_option( 'hero_image' ) );
$roles      = array_filter( array_map( 'trim', explode( ',', sakbaddy_get_option( 'hero_roles' ) ) ) );
?>
<section class="hero" id="home">
	<div class="container">
		<div class="htop">
			<div class="contact"><?php echo esc_html( sakbaddy_get_option( 'contact_phone' ) ); ?></div>
			<div class="email"><?php echo esc_html( sakbaddy_get_option( 'contact_email' ) ); ?></div>
		</div>
		<h5><?php echo esc_html( sakbaddy_get_option( 'hero_eyebrow' ) ); ?></h5>
		<h1><?php echo esc_html( sakbaddy_get_option( 'hero_title' ) ); ?></h1>
		<?php if ( $roles ) : ?>
			<ul>
				<?php foreach ( $roles as $role ) : ?><li><?php echo esc_html( $role ); ?></li><?php endforeach; ?>
			</ul>
		<?php endif; ?>
		<p><?php echo esc_html( sakbaddy_get_option( 'hero_description' ) ); ?></p>
		<?php if ( sakbaddy_get_option( 'hero_button_text' ) && sakbaddy_get_option( 'hero_button_url' ) ) : ?>
			<a href="<?php echo esc_url( sakbaddy_get_option( 'hero_button_url' ) ); ?>" class="btn"><?php echo esc_html( sakbaddy_get_option( 'hero_button_text' ) ); ?></a>
		<?php endif; ?>
		<?php
		if ( $hero_image ) {
			echo wp_get_attachment_image( $hero_image, 'full', false, array( 'class' => 'hero-image', 'alt' => esc_attr( sakbaddy_get_option( 'hero_title' ) ), 'fetchpriority' => 'high' ) );
		} else {
			?>
			<img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/home-banner.png' ); ?>" alt="<?php echo esc_attr( sakbaddy_get_option( 'hero_title' ) ); ?>" class="hero-image" fetchpriority="high">
			<?php
		}
		?>
	</div>
</section>
