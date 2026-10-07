<?php
/**
 * Template Name: Education & Skills Page
 *
 * @package Sakbaddy
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

get_header();
?>

<main id="primary" class="site-main" role="main">
    <?php get_template_part( 'template-parts/skills' ); ?>
</main>

<?php
get_footer();
