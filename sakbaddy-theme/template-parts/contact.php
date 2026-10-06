<section class="contact-page" id="contact">
	<div class="contact-shell">
		<div class="contact-copy">
			<h2><?php echo nl2br( esc_html( sakbaddy_get_option( 'contact_heading' ) ) ); ?></h2>
			<p><?php echo esc_html( sakbaddy_get_option( 'contact_description' ) ); ?></p>
			<ul class="contact-list">
				<?php if ( sakbaddy_get_option( 'contact_address' ) ) : ?><li class="contact-item"><span class="icon-wrap"><img class="contact-img" src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/contact/location.png' ); ?>" alt="" loading="lazy"></span><span><?php echo esc_html( sakbaddy_get_option( 'contact_address' ) ); ?></span></li><?php endif; ?>
				<?php if ( sakbaddy_get_option( 'contact_email' ) ) : ?><li class="contact-item"><span class="icon-wrap"><img class="contact-img" src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/contact/email.png' ); ?>" alt="" loading="lazy"></span><a href="mailto:<?php echo esc_attr( antispambot( sakbaddy_get_option( 'contact_email' ) ) ); ?>"><?php echo esc_html( antispambot( sakbaddy_get_option( 'contact_email' ) ) ); ?></a></li><?php endif; ?>
				<?php if ( sakbaddy_get_option( 'contact_phone' ) ) : ?><li class="contact-item"><span class="icon-wrap"><img class="contact-img" src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/contact/contact.png' ); ?>" alt="" loading="lazy"></span><a href="tel:<?php echo esc_attr( preg_replace( '/[^0-9+]/', '', sakbaddy_get_option( 'contact_phone' ) ) ); ?>"><?php echo esc_html( sakbaddy_get_option( 'contact_phone' ) ); ?></a></li><?php endif; ?>
			</ul>
			<?php
			$status = isset( $_GET['contact_status'] ) ? sanitize_key( wp_unslash( $_GET['contact_status'] ) ) : '';
			if ( 'sent' === $status ) :
				?><p class="contact-notice is-success" role="status"><?php esc_html_e( 'Thanks! Your message has been sent.', 'sakbaddy' ); ?></p><?php
			elseif ( 'error' === $status ) :
				?><p class="contact-notice is-error" role="alert"><?php esc_html_e( 'Your message could not be sent. Please check the form and try again.', 'sakbaddy' ); ?></p><?php
			endif;
			?>
		</div>
		<div class="form-panel">
			<h3><?php esc_html_e( 'Say Something', 'sakbaddy' ); ?></h3>
			<form class="contact-form" action="<?php echo esc_url( admin_url( 'admin-post.php' ) ); ?>" method="post">
				<input type="hidden" name="action" value="sakbaddy_contact">
				<?php wp_nonce_field( 'sakbaddy_contact', 'sakbaddy_contact_nonce' ); ?>
				<div class="field-row">
					<label class="screen-reader-text" for="contact-name"><?php esc_html_e( 'Full name', 'sakbaddy' ); ?></label>
					<input id="contact-name" name="contact_name" type="text" placeholder="<?php esc_attr_e( 'Full name', 'sakbaddy' ); ?>" autocomplete="name" required>
					<label class="screen-reader-text" for="contact-email"><?php esc_html_e( 'Email address', 'sakbaddy' ); ?></label>
					<input id="contact-email" name="contact_email" type="email" placeholder="<?php esc_attr_e( 'Email address', 'sakbaddy' ); ?>" autocomplete="email" required>
				</div>
				<label class="screen-reader-text" for="contact-subject"><?php esc_html_e( 'Subject', 'sakbaddy' ); ?></label>
				<input id="contact-subject" name="contact_subject" type="text" placeholder="<?php esc_attr_e( 'Subject', 'sakbaddy' ); ?>" required>
				<label class="screen-reader-text" for="contact-message"><?php esc_html_e( 'Message', 'sakbaddy' ); ?></label>
				<textarea id="contact-message" name="contact_message" rows="6" placeholder="<?php esc_attr_e( 'Type your message here...', 'sakbaddy' ); ?>" required></textarea>
				<button type="submit"><?php esc_html_e( 'Send Message', 'sakbaddy' ); ?></button>
			</form>
		</div>
	</div>
	<?php if ( sakbaddy_get_option( 'contact_map_url' ) ) : ?>
		<div class="map-container"><iframe src="<?php echo esc_url( sakbaddy_get_option( 'contact_map_url' ) ); ?>" title="<?php esc_attr_e( 'Map showing contact location', 'sakbaddy' ); ?>" loading="lazy" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe></div>
	<?php endif; ?>
</section>
