<?php
get_header();
?>
<main id="main-content">
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
