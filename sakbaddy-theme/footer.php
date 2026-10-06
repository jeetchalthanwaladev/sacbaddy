<footer class="site-footer">
	<div class="footer-container">
		<div class="footer-brand">
			<h3><?php bloginfo( 'name' ); ?></h3>
			<p><?php echo esc_html( sakbaddy_get_option( 'footer_text' ) ); ?></p>
		</div>
		<div class="footer-links">
			<h4><?php esc_html_e( 'Explore', 'sakbaddy' ); ?></h4>
			<ul>
				<li><a href="<?php echo esc_url( home_url( '/#home' ) ); ?>"><?php esc_html_e( 'Home', 'sakbaddy' ); ?></a></li>
				<li><a href="<?php echo esc_url( home_url( '/#about' ) ); ?>"><?php esc_html_e( 'About', 'sakbaddy' ); ?></a></li>
				<li><a href="<?php echo esc_url( home_url( '/#portfolio' ) ); ?>"><?php esc_html_e( 'Projects', 'sakbaddy' ); ?></a></li>
				<li><a href="<?php echo esc_url( home_url( '/#contact' ) ); ?>"><?php esc_html_e( 'Contact', 'sakbaddy' ); ?></a></li>
			</ul>
		</div>
		<div class="footer-social">
			<h4><?php esc_html_e( 'Follow me', 'sakbaddy' ); ?></h4>
			<?php foreach ( sakbaddy_social_links() as $label => $url ) : ?>
				<a href="<?php echo esc_url( $url ); ?>" target="_blank" rel="noopener noreferrer"><?php echo esc_html( $label ); ?></a>
			<?php endforeach; ?>
		</div>
	</div>
	<div class="footer-bottom">
		<p>&copy; <?php echo esc_html( gmdate( 'Y' ) ); ?> <?php bloginfo( 'name' ); ?>. <?php echo esc_html( sakbaddy_get_option( 'footer_copyright' ) ); ?></p>
	</div>
</footer>
<?php wp_footer(); ?>
</body>
</html>
