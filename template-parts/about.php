<?php
/**
 * Template part: About Section
 *
 * @package Sakbaddy
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

$tag         = get_theme_mod( 'sakbaddy_about_tag', 'Biography' );
$role        = get_theme_mod( 'sakbaddy_about_role', 'Web Developer' );
$name        = get_theme_mod( 'sakbaddy_about_name', 'Sakshi Shah' );
$bio         = get_theme_mod( 'sakbaddy_about_bio', "I'm a Freelancer webDeveloper with over 3 years of experience. I'm from india. I code and create web elements for amazing people around the world. I like work with new people. New people new Experiences." );
$custom_img  = get_theme_mod( 'sakbaddy_about_image', '' );
$profile_img = ! empty( $custom_img ) ? $custom_img : sakbaddy_asset( 'src/image0.png' );

$info_rows = array(
    'Name:'      => get_theme_mod( 'sakbaddy_about_name', 'Sakshi Shah' ),
    'Phone:'     => get_theme_mod( 'sakbaddy_about_phone', '(+91) 9876543210' ),
    'Birthday:'  => get_theme_mod( 'sakbaddy_about_birthday', '11th april 2005' ),
    'Email:'     => get_theme_mod( 'sakbaddy_about_email', 'info@domainname.com' ),
    'Age:'       => get_theme_mod( 'sakbaddy_about_age', '21 years' ),
    'Skype:'     => get_theme_mod( 'sakbaddy_about_skype', 'sakshi.40' ),
    'Address:'   => get_theme_mod( 'sakbaddy_about_address', 'India' ),
    'Freelance:' => get_theme_mod( 'sakbaddy_about_freelance', 'Available' ),
);

$social_links = sakbaddy_get_social_links();
?>
<section class="about" id="about">
    <div class="about-left">
        <div class="profile-wrap">
            <img src="<?php echo esc_url( $profile_img ); ?>" alt="<?php echo esc_attr( $name ); ?>" loading="lazy" />
            <div class="socials">
                <?php if ( ! empty( $social_links['facebook']['url'] ) ) : ?>
                    <a href="<?php echo esc_url( $social_links['facebook']['url'] ); ?>" aria-label="Facebook" target="_blank" rel="noopener noreferrer"><img src="<?php echo esc_url( sakbaddy_asset( 'src/icons/facebook.png' ) ); ?>" alt="Facebook" /></a>
                <?php endif; ?>
                <?php if ( ! empty( $social_links['twitter']['url'] ) ) : ?>
                    <a href="<?php echo esc_url( $social_links['twitter']['url'] ); ?>" aria-label="Twitter" target="_blank" rel="noopener noreferrer"><img src="<?php echo esc_url( sakbaddy_asset( 'src/icons/twitter.png' ) ); ?>" alt="Twitter" /></a>
                <?php endif; ?>
                <?php if ( ! empty( $social_links['instagram']['url'] ) ) : ?>
                    <a href="<?php echo esc_url( $social_links['instagram']['url'] ); ?>" aria-label="Instagram" target="_blank" rel="noopener noreferrer"><img src="<?php echo esc_url( sakbaddy_asset( 'src/icons/insta.png' ) ); ?>" alt="Instagram" /></a>
                <?php endif; ?>
                <?php if ( ! empty( $social_links['linkedin']['url'] ) ) : ?>
                    <a href="<?php echo esc_url( $social_links['linkedin']['url'] ); ?>" aria-label="LinkedIn" target="_blank" rel="noopener noreferrer"><img src="<?php echo esc_url( sakbaddy_asset( 'src/icons/linkedin.png' ) ); ?>" alt="LinkedIn" /></a>
                <?php endif; ?>
                <?php if ( ! empty( $social_links['pinterest']['url'] ) ) : ?>
                    <a href="<?php echo esc_url( $social_links['pinterest']['url'] ); ?>" aria-label="Pinterest" target="_blank" rel="noopener noreferrer"><img src="<?php echo esc_url( sakbaddy_asset( 'src/icons/pintrest.png' ) ); ?>" alt="Pinterest" /></a>
                <?php endif; ?>
            </div>
        </div>
        <?php if ( ! empty( $role ) ) : ?>
            <div class="role"><?php echo esc_html( $role ); ?></div>
        <?php endif; ?>
        <?php if ( ! empty( $name ) ) : ?>
            <h3><?php echo esc_html( $name ); ?></h3>
        <?php endif; ?>
    </div>

    <div class="about-right">
        <?php if ( ! empty( $tag ) ) : ?>
            <div class="section-tag"><?php echo esc_html( $tag ); ?></div>
        <?php endif; ?>

        <?php if ( ! empty( $bio ) ) : ?>
            <p><?php echo wp_kses_post( $bio ); ?></p>
        <?php endif; ?>

        <div class="about-grid">
            <?php foreach ( $info_rows as $label => $value ) : ?>
                <?php if ( ! empty( $value ) ) : ?>
                    <div class="info-row">
                        <span><?php echo esc_html( $label ); ?></span>
                        <p><?php echo esc_html( $value ); ?></p>
                    </div>
                <?php endif; ?>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<div class="about-wave about-wave-bottom" aria-hidden="true"></div>
