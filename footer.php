<?php
/**
 * The template for displaying the footer
 *
 * @package Sakbaddy
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

$brand_title = get_theme_mod( 'sakbaddy_footer_brand', get_bloginfo( 'name' ) );
$brand_desc  = get_theme_mod( 'sakbaddy_footer_description', 'We provide stylish, practical, and affordable solutions for everyday living.' );
$copyright   = get_theme_mod( 'sakbaddy_footer_copyright', '© ' . date('Y') . ' ' . get_bloginfo( 'name' ) . '. All rights reserved.' );
$socials     = sakbaddy_get_social_links();
$home_url    = home_url( '/' );
$is_front    = is_front_page();
?>

<footer class="site-footer" role="contentinfo">
    <div class="footer-container">
        <div class="footer-brand">
            <?php if ( ! empty( $brand_title ) ) : ?>
                <h3><?php echo esc_html( $brand_title ); ?></h3>
            <?php endif; ?>
            <?php if ( ! empty( $brand_desc ) ) : ?>
                <p><?php echo wp_kses_post( $brand_desc ); ?></p>
            <?php endif; ?>
        </div>

        <div class="footer-links">
            <h4><?php esc_html_e( 'Quick Links', 'sakbaddy' ); ?></h4>
            <?php if ( has_nav_menu( 'footer' ) ) : ?>
                <?php
                wp_nav_menu( array(
                    'theme_location' => 'footer',
                    'container'      => false,
                    'depth'          => 1,
                    'fallback_cb'    => false,
                ) );
                ?>
            <?php else : ?>
                <ul>
                    <li><a href="<?php echo esc_url( $is_front ? '#home' : $home_url . '#home' ); ?>"><?php esc_html_e( 'Home', 'sakbaddy' ); ?></a></li>
                    <li><a href="<?php echo esc_url( $is_front ? '#about' : $home_url . '#about' ); ?>"><?php esc_html_e( 'About', 'sakbaddy' ); ?></a></li>
                    <li><a href="<?php echo esc_url( $is_front ? '#portfolio' : $home_url . '#portfolio' ); ?>"><?php esc_html_e( 'Portfolio', 'sakbaddy' ); ?></a></li>
                    <li><a href="<?php echo esc_url( $is_front ? '#contact' : $home_url . '#contact' ); ?>"><?php esc_html_e( 'Contact', 'sakbaddy' ); ?></a></li>
                </ul>
            <?php endif; ?>
        </div>

        <div class="footer-links">
            <h4><?php esc_html_e( 'Support', 'sakbaddy' ); ?></h4>
            <?php if ( has_nav_menu( 'footer_support' ) ) : ?>
                <?php
                wp_nav_menu( array(
                    'theme_location' => 'footer_support',
                    'container'      => false,
                    'depth'          => 1,
                    'fallback_cb'    => false,
                ) );
                ?>
            <?php else : ?>
                <ul>
                    <li><a href="#"><?php esc_html_e( 'Help Center', 'sakbaddy' ); ?></a></li>
                    <li><a href="#"><?php esc_html_e( 'Shipping', 'sakbaddy' ); ?></a></li>
                    <li><a href="#"><?php esc_html_e( 'Returns', 'sakbaddy' ); ?></a></li>
                    <li><a href="#"><?php esc_html_e( 'Privacy Policy', 'sakbaddy' ); ?></a></li>
                </ul>
            <?php endif; ?>
        </div>

        <div class="footer-social">
            <h4><?php esc_html_e( 'Follow Us', 'sakbaddy' ); ?></h4>
            <?php if ( ! empty( $socials['facebook']['url'] ) ) : ?>
                <a href="<?php echo esc_url( $socials['facebook']['url'] ); ?>" target="_blank" rel="noopener noreferrer">Facebook</a>
            <?php endif; ?>
            <?php if ( ! empty( $socials['instagram']['url'] ) ) : ?>
                <a href="<?php echo esc_url( $socials['instagram']['url'] ); ?>" target="_blank" rel="noopener noreferrer">Instagram</a>
            <?php endif; ?>
            <?php if ( ! empty( $socials['twitter']['url'] ) ) : ?>
                <a href="<?php echo esc_url( $socials['twitter']['url'] ); ?>" target="_blank" rel="noopener noreferrer">Twitter / X</a>
            <?php endif; ?>
            <?php if ( ! empty( $socials['linkedin']['url'] ) ) : ?>
                <a href="<?php echo esc_url( $socials['linkedin']['url'] ); ?>" target="_blank" rel="noopener noreferrer">LinkedIn</a>
            <?php endif; ?>
        </div>
    </div>

    <div class="footer-bottom">
        <p><?php echo esc_html( $copyright ); ?></p>
    </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
