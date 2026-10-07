<?php
/**
 * Template part: Contact Section
 *
 * @package Sakbaddy
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

$title_1  = get_theme_mod( 'sakbaddy_contact_title_1', "What's your story?" );
$title_2  = get_theme_mod( 'sakbaddy_contact_title_2', 'Get in touch' );
$subtitle = get_theme_mod( 'sakbaddy_contact_subtitle', 'Always available for freelancing if the right project comes along. Feel free to contact me.' );
$address  = get_theme_mod( 'sakbaddy_contact_address', '123 Street New York City, United States Of America 750065.' );
$email    = get_theme_mod( 'sakbaddy_contact_email', 'support@domain.com' );
$phone    = get_theme_mod( 'sakbaddy_contact_phone', '+044 9696 9696 3636' );
$map_url  = get_theme_mod( 'sakbaddy_contact_map_url', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3151.865498813894!2d144.96880199999998!3d-37.81661929999999!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6ad65d4c2b349649%3A0xb6899234e561db11!2sEnvato%20Pty%20Ltd!5e0!3m2!1sen!2sin!4v1791183175752!5m2!1sen!2sin' );
?>
<section class="contact-page" id="contact">
    <div class="contact-shell">
        <div class="contact-copy">
            <h2>
                <?php echo esc_html( $title_1 ); ?>
                <?php if ( ! empty( $title_2 ) ) : ?>
                    <br><span><?php echo esc_html( $title_2 ); ?></span>
                <?php endif; ?>
            </h2>

            <?php if ( ! empty( $subtitle ) ) : ?>
                <p><?php echo wp_kses_post( $subtitle ); ?></p>
            <?php endif; ?>

            <ul class="contact-list">
                <?php if ( ! empty( $address ) ) : ?>
                    <li class="contact-item">
                        <span class="icon-wrap">
                            <img class="contact-img" src="<?php echo esc_url( sakbaddy_asset( 'src/contact/location.png' ) ); ?>" alt="<?php esc_attr_e( 'Location Icon', 'sakbaddy' ); ?>" />
                        </span>
                        <span><?php echo esc_html( $address ); ?></span>
                    </li>
                <?php endif; ?>

                <?php if ( ! empty( $email ) ) : ?>
                    <li class="contact-item">
                        <span class="icon-wrap">
                            <img class="contact-img" src="<?php echo esc_url( sakbaddy_asset( 'src/contact/email.png' ) ); ?>" alt="<?php esc_attr_e( 'Email Icon', 'sakbaddy' ); ?>" />
                        </span>
                        <a href="mailto:<?php echo esc_attr( sanitize_email( $email ) ); ?>"><?php echo esc_html( $email ); ?></a>
                    </li>
                <?php endif; ?>

                <?php if ( ! empty( $phone ) ) : ?>
                    <li class="contact-item">
                        <span class="icon-wrap">
                            <img class="contact-img" src="<?php echo esc_url( sakbaddy_asset( 'src/contact/contact.png' ) ); ?>" alt="<?php esc_attr_e( 'Phone Icon', 'sakbaddy' ); ?>" />
                        </span>
                        <a href="tel:<?php echo esc_attr( preg_replace( '/[^0-9+]/', '', $phone ) ); ?>"><?php echo esc_html( $phone ); ?></a>
                    </li>
                <?php endif; ?>
            </ul>
        </div>

        <div class="form-panel">
            <h3><?php esc_html_e( 'Say Something', 'sakbaddy' ); ?></h3>

            <form class="contact-form" method="post" action="" novalidate>
                <div class="form-feedback" role="alert" aria-live="polite"></div>

                <div class="field-row">
                    <input id="full-name" name="name" type="text" placeholder="<?php esc_attr_e( 'Full Name', 'sakbaddy' ); ?>" required aria-label="<?php esc_attr_e( 'Full Name', 'sakbaddy' ); ?>" />
                    <input id="email" name="email" type="email" placeholder="<?php esc_attr_e( 'Email Address', 'sakbaddy' ); ?>" required aria-label="<?php esc_attr_e( 'Email Address', 'sakbaddy' ); ?>" />
                </div>

                <input id="subject" name="subject" type="text" placeholder="<?php esc_attr_e( 'Subject', 'sakbaddy' ); ?>" required aria-label="<?php esc_attr_e( 'Subject', 'sakbaddy' ); ?>" />

                <textarea id="message" name="message" rows="6" placeholder="<?php esc_attr_e( 'Type your message here...', 'sakbaddy' ); ?>" required aria-label="<?php esc_attr_e( 'Message', 'sakbaddy' ); ?>"></textarea>

                <button type="submit"><?php esc_html_e( 'Send Message', 'sakbaddy' ); ?></button>
            </form>
        </div>
    </div>

    <?php if ( ! empty( $map_url ) ) : ?>
        <div class="map-container">
            <iframe src="<?php echo esc_url( $map_url ); ?>" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="strict-origin-when-cross-origin" title="<?php esc_attr_e( 'Google Maps Location', 'sakbaddy' ); ?>"></iframe>
        </div>
    <?php endif; ?>
</section>
