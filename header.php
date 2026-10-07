<?php
/**
 * The header for our theme
 * Displays all of the <head> section and everything up until <main>
 *
 * @package Sakbaddy
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" type="image/png" href="<?php echo esc_url( sakbaddy_asset( 'src/favicon.png' ) ); ?>">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<a class="screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'sakbaddy' ); ?></a>

<?php
// On the front page or single-page view, show the vertical navigation bar
if ( is_front_page() || is_home() ) {
    get_template_part( 'template-parts/navbar' );
} else {
    // On subpages, render the top site header
    get_template_part( 'template-parts/header-bar' );
}
?>
