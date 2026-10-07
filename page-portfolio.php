<?php
/**
 * Template Name: Portfolio Page
 *
 * @package Sakbaddy
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

get_header();
?>

<main id="primary" class="site-main" role="main">
    <?php get_template_part( 'template-parts/portfolio' ); ?>
</main>

<?php
get_footer();
