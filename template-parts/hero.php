<?php
/**
 * Template part: Hero Section
 *
 * @package Sakbaddy
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

$phone       = get_theme_mod( 'sakbaddy_hero_phone', '+91 98765 43210' );
$email       = get_theme_mod( 'sakbaddy_hero_email', 'sakshi_shah@domain.com' );
$greeting    = get_theme_mod( 'sakbaddy_hero_greeting', 'Hello, My name is' );
$title       = get_theme_mod( 'sakbaddy_hero_title', 'Sakshi Shah' );
$role1       = get_theme_mod( 'sakbaddy_hero_role1', 'Web Developer' );
$role2       = get_theme_mod( 'sakbaddy_hero_role2', 'Freelancer' );
$description = get_theme_mod( 'sakbaddy_hero_description', 'I design and develop services for customers of all sizes, specializing in creating stylish, modern websites, web services and online stores.' );
$btn_text    = get_theme_mod( 'sakbaddy_hero_btn_text', 'Download CV' );
$btn_url     = get_theme_mod( 'sakbaddy_hero_btn_url', '#contact' );
$custom_img  = get_theme_mod( 'sakbaddy_hero_image', '' );
$hero_img    = ! empty( $custom_img ) ? $custom_img : sakbaddy_asset( 'src/home-banner.png' );
?>
<section class="hero" id="home">
    <div class="container">
        <div class="htop">
            <?php if ( ! empty( $phone ) ) : ?>
                <div class="contact"><?php echo esc_html( $phone ); ?></div>
            <?php endif; ?>
            <?php if ( ! empty( $email ) ) : ?>
                <div class="email"><?php echo esc_html( $email ); ?></div>
            <?php endif; ?>
            <div class="leguagr" aria-label="<?php esc_attr_e( 'Language Selection', 'sakbaddy' ); ?>">
                <a class="active" href="#" aria-label="English">EN</a>
                <a href="#" aria-label="French">FR</a>
            </div>
        </div>

        <?php if ( ! empty( $greeting ) ) : ?>
            <h5><?php echo esc_html( $greeting ); ?></h5>
        <?php endif; ?>

        <?php if ( ! empty( $title ) ) : ?>
            <h1><?php echo esc_html( $title ); ?></h1>
        <?php endif; ?>

        <?php if ( ! empty( $role1 ) || ! empty( $role2 ) ) : ?>
            <ul>
                <?php if ( ! empty( $role1 ) ) : ?>
                    <li><?php echo esc_html( $role1 ); ?></li>
                <?php endif; ?>
                <?php if ( ! empty( $role2 ) ) : ?>
                    <li><?php echo esc_html( $role2 ); ?></li>
                <?php endif; ?>
            </ul>
        <?php endif; ?>

        <?php if ( ! empty( $description ) ) : ?>
            <p><?php echo wp_kses_post( $description ); ?></p>
        <?php endif; ?>

        <?php if ( ! empty( $btn_text ) ) : ?>
            <a href="<?php echo esc_url( $btn_url ); ?>" class="btn" role="button" style="display:inline-flex; align-items:center; justify-content:center; text-decoration:none;">
                <?php echo esc_html( $btn_text ); ?>
            </a>
        <?php endif; ?>

        <img src="<?php echo esc_url( $hero_img ); ?>" alt="<?php echo esc_attr( $title ); ?>" class="hero-image" loading="eager">
    </div>
</section>
