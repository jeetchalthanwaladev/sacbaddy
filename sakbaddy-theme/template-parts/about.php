<?php
$profile_image = absint( sakbaddy_get_option( 'about_image' ) );
?>
<section class="about" id="about">
	<div class="about-left">
		<div class="profile-wrap">
			<?php
			if ( $profile_image ) {
				echo wp_get_attachment_image( $profile_image, 'large', false, array( 'alt' => esc_attr( sakbaddy_get_option( 'about_name' ) ) ) );
			} else {
				?>
				<img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/image0.png' ); ?>" alt="<?php echo esc_attr( sakbaddy_get_option( 'about_name' ) ); ?>" loading="lazy">
				<?php
			}
			?>
			<div class="socials">
				<?php foreach ( sakbaddy_social_links() as $slug => $social ) : ?>
					<a href="<?php echo esc_url( $social ); ?>" aria-label="<?php echo esc_attr( $slug ); ?>" target="_blank" rel="noopener noreferrer">
						<span aria-hidden="true"><?php echo esc_html( strtoupper( substr( $slug, 0, 1 ) ) ); ?></span>
					</a>
				<?php endforeach; ?>
			</div>
		</div>
		<div class="role"><?php echo esc_html( sakbaddy_get_option( 'about_role' ) ); ?></div>
		<h3><?php echo esc_html( sakbaddy_get_option( 'about_name' ) ); ?></h3>
	</div>
	<div class="about-right">
		<div class="section-tag"><?php echo esc_html( sakbaddy_get_option( 'about_title' ) ); ?></div>
		<p><?php echo esc_html( sakbaddy_get_option( 'about_description' ) ); ?></p>
		<div class="about-grid">
			<div class="info-row"><span><?php esc_html_e( 'Experience:', 'sakbaddy' ); ?></span><p><?php echo esc_html( sakbaddy_get_option( 'about_experience' ) ); ?></p></div>
			<div class="info-row"><span><?php esc_html_e( 'Education:', 'sakbaddy' ); ?></span><p><?php echo esc_html( sakbaddy_get_option( 'about_education' ) ); ?></p></div>
			<?php if ( sakbaddy_get_option( 'contact_phone' ) ) : ?>
				<div class="info-row"><span><?php esc_html_e( 'Phone:', 'sakbaddy' ); ?></span><p><?php echo esc_html( sakbaddy_get_option( 'contact_phone' ) ); ?></p></div>
			<?php endif; ?>
			<?php if ( sakbaddy_get_option( 'contact_email' ) ) : ?>
				<div class="info-row"><span><?php esc_html_e( 'Email:', 'sakbaddy' ); ?></span><p><?php echo esc_html( sakbaddy_get_option( 'contact_email' ) ); ?></p></div>
			<?php endif; ?>
		</div>
		<?php if ( sakbaddy_get_option( 'about_button_text' ) && sakbaddy_get_option( 'about_button_url' ) ) : ?>
			<p><a href="<?php echo esc_url( sakbaddy_get_option( 'about_button_url' ) ); ?>"><?php echo esc_html( sakbaddy_get_option( 'about_button_text' ) ); ?></a></p>
		<?php endif; ?>
	</div>
</section>
<div class="about-wave about-wave-bottom" aria-hidden="true"></div>
