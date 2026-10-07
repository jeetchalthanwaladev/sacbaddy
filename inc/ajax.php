<?php
/**
 * Sakbaddy AJAX Handlers
 * Secure processing for Contact Form submissions with nonce verification,
 * data sanitization, and wp_mail notification.
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

function sakbaddy_handle_contact_form() {
    // 1. Verify Nonce
    if ( ! isset( $_POST['nonce'] ) || ! wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['nonce'] ) ), 'sakbaddy_contact_nonce' ) ) {
        wp_send_json_error( array( 'message' => __( 'Security verification failed. Please refresh the page and try again.', 'sakbaddy' ) ), 403 );
    }

    // 2. Sanitize and Validate Inputs
    $name    = isset( $_POST['name'] ) ? sanitize_text_field( wp_unslash( $_POST['name'] ) ) : '';
    $email   = isset( $_POST['email'] ) ? sanitize_email( wp_unslash( $_POST['email'] ) ) : '';
    $subject = isset( $_POST['subject'] ) ? sanitize_text_field( wp_unslash( $_POST['subject'] ) ) : '';
    $message = isset( $_POST['message'] ) ? wp_kses_post( wp_unslash( $_POST['message'] ) ) : '';

    if ( empty( $name ) ) {
        wp_send_json_error( array( 'message' => __( 'Please enter your full name.', 'sakbaddy' ) ) );
    }

    if ( empty( $email ) || ! is_email( $email ) ) {
        wp_send_json_error( array( 'message' => __( 'Please provide a valid email address.', 'sakbaddy' ) ) );
    }

    if ( empty( $subject ) ) {
        wp_send_json_error( array( 'message' => __( 'Please enter a message subject.', 'sakbaddy' ) ) );
    }

    if ( empty( $message ) ) {
        wp_send_json_error( array( 'message' => __( 'Please write a message before sending.', 'sakbaddy' ) ) );
    }

    // 3. Prepare Email
    $recipient = get_theme_mod( 'sakbaddy_contact_recipient', get_option( 'admin_email' ) );
    if ( ! is_email( $recipient ) ) {
        $recipient = get_option( 'admin_email' );
    }

    $site_name    = get_bloginfo( 'name' );
    $mail_subject = sprintf( '[%s Contact Form] %s', $site_name, $subject );

    $body  = sprintf( "You have received a new contact inquiry from %s:\n\n", $site_name );
    $body .= sprintf( "Name: %s\n", $name );
    $body .= sprintf( "Email: %s\n", $email );
    $body .= sprintf( "Subject: %s\n\n", $subject );
    $body .= "Message:\n" . $message . "\n\n";
    $body .= sprintf( "Sent from: %s\n", home_url() );

    $headers = array(
        'Content-Type: text/plain; charset=UTF-8',
        sprintf( 'From: %s <%s>', $site_name, get_option( 'admin_email' ) ),
        sprintf( 'Reply-To: %s <%s>', $name, $email ),
    );

    // 4. Send Email
    $sent = wp_mail( $recipient, $mail_subject, $body, $headers );

    if ( $sent ) {
        wp_send_json_success( array( 'message' => __( 'Thank you! Your message has been sent successfully. We will get back to you shortly.', 'sakbaddy' ) ) );
    } else {
        wp_send_json_error( array( 'message' => __( 'Unable to send email right now. Please email us directly or try again later.', 'sakbaddy' ) ) );
    }
}
add_action( 'wp_ajax_sakbaddy_contact_form', 'sakbaddy_handle_contact_form' );
add_action( 'wp_ajax_nopriv_sakbaddy_contact_form', 'sakbaddy_handle_contact_form' );
