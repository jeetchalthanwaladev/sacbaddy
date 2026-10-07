<?php
/**
 * Sakbaddy Analytics Integration
 * Clean, lightweight Google Analytics 4 (GA4) integration without third-party plugins.
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

function sakbaddy_output_google_analytics() {
    $ga_id = get_theme_mod( 'sakbaddy_ga_id', '' );

    if ( empty( $ga_id ) ) {
        return;
    }

    // Sanitize GA ID format (G-XXXXXXXXXX)
    if ( ! preg_match( '/^G-[A-Za-z0-9]+$/', $ga_id ) ) {
        return;
    }

    $escaped_id = esc_attr( $ga_id );
    ?>
    <!-- Google tag (gtag.js) - Sakbaddy -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=<?php echo $escaped_id; ?>"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());
      gtag('config', '<?php echo $escaped_id; ?>', {
        'anonymize_ip': true,
        'send_page_view': true
      });
    </script>
    <?php
}
add_action( 'wp_head', 'sakbaddy_output_google_analytics', 20 );
