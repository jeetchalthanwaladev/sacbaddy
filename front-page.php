<?php
/**
 * The front page template file
 * Renders the full homepage CMS experience matching the original static site.
 *
 * @package Sakbaddy
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

get_header();
?>

<main id="primary" class="site-main" role="main">
    <?php
    get_template_part( 'template-parts/hero' );
    get_template_part( 'template-parts/about' );
    get_template_part( 'template-parts/testimonials' );
    get_template_part( 'template-parts/skills' );
    get_template_part( 'template-parts/portfolio' );
    get_template_part( 'template-parts/contact' );
    ?>
</main>

<?php
get_footer();
