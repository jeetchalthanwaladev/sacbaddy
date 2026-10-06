<?php
/**
 * Sakbaddy Portfolio theme functions.
 *
 * @package Sakbaddy
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

define( 'SAKBADDY_VERSION', '1.0.0' );

function sakbaddy_setup() {
	load_theme_textdomain( 'sakbaddy', get_template_directory() . '/languages' );

	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'custom-logo', array(
		'height'      => 80,
		'width'       => 80,
		'flex-height' => true,
		'flex-width'  => true,
	) );
	add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption', 'style', 'script' ) );
	add_theme_support( 'responsive-embeds' );

	register_nav_menus( array(
		'primary' => __( 'Primary navigation', 'sakbaddy' ),
	) );
}
add_action( 'after_setup_theme', 'sakbaddy_setup' );

function sakbaddy_register_content_types() {
	register_post_type( 'sakbaddy_project', array(
		'labels'       => array(
			'name'                  => __( 'Projects', 'sakbaddy' ),
			'singular_name'         => __( 'Project', 'sakbaddy' ),
			'add_new_item'          => __( 'Add New Project', 'sakbaddy' ),
			'edit_item'             => __( 'Edit Project', 'sakbaddy' ),
			'new_item'              => __( 'New Project', 'sakbaddy' ),
			'view_item'             => __( 'View Project', 'sakbaddy' ),
			'search_items'          => __( 'Search Projects', 'sakbaddy' ),
			'not_found'             => __( 'No projects found.', 'sakbaddy' ),
			'menu_name'             => __( 'Projects', 'sakbaddy' ),
		),
		'public'       => true,
		'show_in_rest' => true,
		'has_archive'  => true,
		'rewrite'      => array( 'slug' => 'projects' ),
		'menu_icon'    => 'dashicons-portfolio',
		'supports'     => array( 'title', 'editor', 'excerpt', 'thumbnail', 'revisions' ),
	) );

	register_taxonomy( 'sakbaddy_project_category', 'sakbaddy_project', array(
		'labels'       => array(
			'name'          => __( 'Project Categories', 'sakbaddy' ),
			'singular_name' => __( 'Project Category', 'sakbaddy' ),
			'menu_name'     => __( 'Categories', 'sakbaddy' ),
		),
		'public'       => true,
		'show_in_rest' => true,
		'hierarchical' => true,
		'rewrite'      => array( 'slug' => 'project-category' ),
	) );

	register_post_type( 'sakbaddy_testimonial', array(
		'labels'       => array(
			'name'                  => __( 'Testimonials', 'sakbaddy' ),
			'singular_name'         => __( 'Testimonial', 'sakbaddy' ),
			'add_new_item'          => __( 'Add New Testimonial', 'sakbaddy' ),
			'edit_item'             => __( 'Edit Testimonial', 'sakbaddy' ),
			'new_item'              => __( 'New Testimonial', 'sakbaddy' ),
			'search_items'          => __( 'Search Testimonials', 'sakbaddy' ),
			'not_found'             => __( 'No testimonials found.', 'sakbaddy' ),
			'menu_name'             => __( 'Testimonials', 'sakbaddy' ),
		),
		'public'       => true,
		'show_in_rest' => true,
		'has_archive'  => false,
		'rewrite'      => array( 'slug' => 'testimonials' ),
		'menu_icon'    => 'dashicons-format-quote',
		'supports'     => array( 'title', 'editor', 'thumbnail', 'revisions' ),
	) );
}
add_action( 'init', 'sakbaddy_register_content_types' );
add_action( 'after_switch_theme', 'flush_rewrite_rules' );

function sakbaddy_enqueue_assets() {
	$base_uri  = get_template_directory_uri();
	$base_path = get_template_directory();
	$styles    = array( 'style', 'vnavbar', 'hero', 'about', 'testimonials', 'skills', 'my_portfolio', 'contact', 'footer' );

	wp_enqueue_style( 'sakbaddy-theme', get_stylesheet_uri(), array(), SAKBADDY_VERSION );

	foreach ( $styles as $style ) {
		$file = '/assets/css/' . $style . '.css';
		wp_enqueue_style(
			'sakbaddy-' . $style,
			$base_uri . $file,
			array( 'sakbaddy-theme' ),
			file_exists( $base_path . $file ) ? (string) filemtime( $base_path . $file ) : SAKBADDY_VERSION
		);
	}

	$script_path = $base_path . '/assets/js/theme.js';
	wp_enqueue_script(
		'sakbaddy-theme',
		$base_uri . '/assets/js/theme.js',
		array(),
		file_exists( $script_path ) ? (string) filemtime( $script_path ) : SAKBADDY_VERSION,
		true
	);
}
add_action( 'wp_enqueue_scripts', 'sakbaddy_enqueue_assets' );

function sakbaddy_option_defaults() {
	return array(
		'hero_eyebrow'       => 'Hello, My name is',
		'hero_title'          => 'Sakshi Shah',
		'hero_roles'          => 'Web Developer, Freelancer',
		'hero_description'    => 'I design and develop services for customers of all sizes, specializing in creating stylish, modern websites, web services and online stores.',
		'hero_button_text'    => 'Download CV',
		'hero_button_url'     => '#contact',
		'hero_image'          => 0,
		'about_title'         => 'Biography',
		'about_role'          => 'Web Developer',
		'about_name'          => 'Sakshi Shah',
		'about_description'   => "I'm a Freelancer webDeveloper with over 3 years of experience. I'm from india. I code and create web elements for amazing people around the world. I like work with new people. New people new Experiences.",
		'about_image'         => 0,
		'about_experience'    => '3+ years',
		'about_education'     => 'Computer Science',
		'about_button_text'   => 'Download CV',
		'about_button_url'    => '',
		'education_items'     => "2018-2020|Ph.D in Horriblensess|University Of Evil Doing\n2013-2016|Bsc. in Computer Science|World University\n2010-2012|Graphic Artist Training|Graphic Master Institute",
		'skill_items'         => "HTML5|92\nReact JS|85\nVue Js|90\nUi/Ux|88",
		'contact_heading'     => "What's your story?\nGet in touch",
		'contact_description' => 'Always available for freelancing if the right project comes along. Feel free to contact me.',
		'contact_address'     => 'India',
		'contact_email'       => 'sakshi_shah@domain.com',
		'contact_phone'       => '+91 98765 43210',
		'contact_map_url'     => '',
		'contact_recipient'   => get_option( 'admin_email' ),
		'social_facebook'     => '',
		'social_twitter'      => '',
		'social_instagram'    => '',
		'social_linkedin'     => '',
		'social_pinterest'    => '',
		'social_github'       => '',
		'footer_text'         => 'We provide stylish, practical, and affordable solutions for everyday living.',
		'footer_copyright'    => 'All rights reserved.',
		'ga_measurement_id'   => '',
	);
}

function sakbaddy_get_option( $key ) {
	$options  = wp_parse_args( get_option( 'sakbaddy_options', array() ), sakbaddy_option_defaults() );
	$defaults = sakbaddy_option_defaults();

	return array_key_exists( $key, $options ) ? $options[ $key ] : ( isset( $defaults[ $key ] ) ? $defaults[ $key ] : '' );
}

function sakbaddy_social_links() {
	$links = array(
		'Facebook'  => sakbaddy_get_option( 'social_facebook' ),
		'Twitter'   => sakbaddy_get_option( 'social_twitter' ),
		'Instagram' => sakbaddy_get_option( 'social_instagram' ),
		'LinkedIn'  => sakbaddy_get_option( 'social_linkedin' ),
		'Pinterest' => sakbaddy_get_option( 'social_pinterest' ),
		'GitHub'    => sakbaddy_get_option( 'social_github' ),
	);

	return array_filter( $links );
}

function sakbaddy_default_menu() {
	$items = array(
		'Home'         => '#home',
		'About'        => '#about',
		'Resume'       => '#resume',
		'Work'         => '#portfolio',
		'Testimonials' => '#testimonials',
		'Contact'      => '#contact',
	);
	echo '<ul class="nav-links">';
	foreach ( $items as $label => $anchor ) {
		$current = ( 'Home' === $label && is_front_page() ) ? ' aria-current="page"' : '';
		printf( '<li><a href="%1$s" aria-label="%2$s"%4$s><span class="screen-reader-text">%2$s</span><span aria-hidden="true">%3$s</span></a></li>', esc_url( home_url( '/' . $anchor ) ), esc_attr( $label ), esc_html( strtoupper( substr( $label, 0, 1 ) ) ), $current ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
	}
	echo '</ul>';
}
add_filter( 'nav_menu_item_title', 'sakbaddy_menu_item_title', 10, 4 );

function sakbaddy_menu_item_title( $title, $item, $args, $depth ) {
	if ( empty( $args->theme_location ) || 'primary' !== $args->theme_location ) {
		return $title;
	}

	$label = trim( strtolower( wp_strip_all_tags( $title ) ) );
	$icons = array(
		'home'         => '<svg viewBox="0 0 24 24" aria-hidden="true" focusable="false"><path d="M3 10.5 12 3l9 7.5V21h-6v-6H9v6H3z" fill="none" stroke="currentColor" stroke-width="2" stroke-linejoin="round"/></svg>',
		'about'        => '<svg viewBox="0 0 24 24" aria-hidden="true" focusable="false"><circle cx="12" cy="7" r="4" fill="none" stroke="currentColor" stroke-width="2"/><path d="M4 21v-2a4 4 0 0 1 4-4h8a4 4 0 0 1 4 4v2" fill="none" stroke="currentColor" stroke-width="2"/></svg>',
		'resume'       => '<svg viewBox="0 0 24 24" aria-hidden="true" focusable="false"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8zM14 2v6h6M8 13h8M8 17h8" fill="none" stroke="currentColor" stroke-width="2" stroke-linejoin="round"/></svg>',
		'work'         => '<svg viewBox="0 0 24 24" aria-hidden="true" focusable="false"><rect x="2" y="7" width="20" height="14" rx="2" fill="none" stroke="currentColor" stroke-width="2"/><path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16" fill="none" stroke="currentColor" stroke-width="2"/></svg>',
		'testimonials' => '<svg viewBox="0 0 24 24" aria-hidden="true" focusable="false"><path d="M4 5h7v7H7v3H4zm10 0h7v7h-4v3h-3z" fill="none" stroke="currentColor" stroke-width="2" stroke-linejoin="round"/></svg>',
		'contact'      => '<svg viewBox="0 0 24 24" aria-hidden="true" focusable="false"><path d="M22 16.9v3a2 2 0 0 1-2.2 2 19.8 19.8 0 0 1-8.6-3.1 19.5 19.5 0 0 1-6-6A19.8 19.8 0 0 1 2.1 4.2 2 2 0 0 1 4.1 2h3a2 2 0 0 1 2 1.7l.5 2.8a2 2 0 0 1-.6 1.9L7.7 9.7a16 16 0 0 0 6.6 6.6l1.3-1.3a2 2 0 0 1 1.9-.6l2.8.5a2 2 0 0 1 1.7 2z" fill="none" stroke="currentColor" stroke-width="2"/></svg>',
	);
	$icon  = isset( $icons[ $label ] ) ? $icons[ $label ] : '<span class="nav-menu-mark" aria-hidden="true">' . esc_html( strtoupper( substr( $label, 0, 1 ) ) ) . '</span>';
	$label = '<span class="screen-reader-text">' . esc_html( wp_strip_all_tags( $title ) ) . '</span>';

	return $icon . $label;
}

function sakbaddy_setting_fields() {
	return array(
		'hero_eyebrow'       => array( 'label' => __( 'Hero eyebrow', 'sakbaddy' ), 'type' => 'text', 'section' => 'homepage' ),
		'hero_title'         => array( 'label' => __( 'Hero title', 'sakbaddy' ), 'type' => 'text', 'section' => 'homepage' ),
		'hero_roles'         => array( 'label' => __( 'Hero roles (comma separated)', 'sakbaddy' ), 'type' => 'text', 'section' => 'homepage' ),
		'hero_description'   => array( 'label' => __( 'Hero description', 'sakbaddy' ), 'type' => 'textarea', 'section' => 'homepage' ),
		'hero_button_text'   => array( 'label' => __( 'Hero button text', 'sakbaddy' ), 'type' => 'text', 'section' => 'homepage' ),
		'hero_button_url'    => array( 'label' => __( 'Hero button URL', 'sakbaddy' ), 'type' => 'url', 'section' => 'homepage' ),
		'hero_image'         => array( 'label' => __( 'Hero image', 'sakbaddy' ), 'type' => 'image', 'section' => 'homepage' ),
		'about_title'        => array( 'label' => __( 'About section title', 'sakbaddy' ), 'type' => 'text', 'section' => 'about' ),
		'about_role'         => array( 'label' => __( 'Role', 'sakbaddy' ), 'type' => 'text', 'section' => 'about' ),
		'about_name'         => array( 'label' => __( 'Name', 'sakbaddy' ), 'type' => 'text', 'section' => 'about' ),
		'about_description'  => array( 'label' => __( 'About description', 'sakbaddy' ), 'type' => 'textarea', 'section' => 'about' ),
		'about_image'        => array( 'label' => __( 'Profile image', 'sakbaddy' ), 'type' => 'image', 'section' => 'about' ),
		'about_experience'   => array( 'label' => __( 'Experience summary', 'sakbaddy' ), 'type' => 'text', 'section' => 'about' ),
		'about_education'    => array( 'label' => __( 'Education summary', 'sakbaddy' ), 'type' => 'text', 'section' => 'about' ),
		'about_button_text'  => array( 'label' => __( 'About button text', 'sakbaddy' ), 'type' => 'text', 'section' => 'about' ),
		'about_button_url'   => array( 'label' => __( 'About button URL', 'sakbaddy' ), 'type' => 'url', 'section' => 'about' ),
		'education_items'    => array( 'label' => __( 'Education entries', 'sakbaddy' ), 'type' => 'textarea', 'description' => __( 'One entry per line: Year|Qualification|Institution', 'sakbaddy' ), 'section' => 'skills' ),
		'skill_items'        => array( 'label' => __( 'Skills', 'sakbaddy' ), 'type' => 'textarea', 'description' => __( 'One skill per line: Skill name|Level (0-100)', 'sakbaddy' ), 'section' => 'skills' ),
		'contact_heading'    => array( 'label' => __( 'Contact heading', 'sakbaddy' ), 'type' => 'textarea', 'section' => 'contact' ),
		'contact_description'=> array( 'label' => __( 'Contact description', 'sakbaddy' ), 'type' => 'textarea', 'section' => 'contact' ),
		'contact_address'    => array( 'label' => __( 'Address', 'sakbaddy' ), 'type' => 'text', 'section' => 'contact' ),
		'contact_email'      => array( 'label' => __( 'Public contact email', 'sakbaddy' ), 'type' => 'email', 'section' => 'contact' ),
		'contact_phone'      => array( 'label' => __( 'Public phone', 'sakbaddy' ), 'type' => 'text', 'section' => 'contact' ),
		'contact_map_url'    => array( 'label' => __( 'Google Maps embed URL', 'sakbaddy' ), 'type' => 'url', 'section' => 'contact' ),
		'contact_recipient'  => array( 'label' => __( 'Form recipient email', 'sakbaddy' ), 'type' => 'email', 'section' => 'contact' ),
		'social_linkedin'    => array( 'label' => __( 'LinkedIn URL', 'sakbaddy' ), 'type' => 'url', 'section' => 'social' ),
		'social_github'      => array( 'label' => __( 'GitHub URL', 'sakbaddy' ), 'type' => 'url', 'section' => 'social' ),
		'social_instagram'   => array( 'label' => __( 'Instagram URL', 'sakbaddy' ), 'type' => 'url', 'section' => 'social' ),
		'social_facebook'    => array( 'label' => __( 'Facebook URL', 'sakbaddy' ), 'type' => 'url', 'section' => 'social' ),
		'social_twitter'     => array( 'label' => __( 'Twitter/X URL', 'sakbaddy' ), 'type' => 'url', 'section' => 'social' ),
		'social_pinterest'   => array( 'label' => __( 'Pinterest URL', 'sakbaddy' ), 'type' => 'url', 'section' => 'social' ),
		'footer_text'        => array( 'label' => __( 'Footer text', 'sakbaddy' ), 'type' => 'textarea', 'section' => 'footer' ),
		'footer_copyright'   => array( 'label' => __( 'Copyright text', 'sakbaddy' ), 'type' => 'text', 'section' => 'footer' ),
		'ga_measurement_id'  => array( 'label' => __( 'Google Analytics 4 Measurement ID', 'sakbaddy' ), 'type' => 'text', 'description' => __( 'Optional; enter a valid ID such as G-XXXXXXXXXX. Leave blank to disable tracking.', 'sakbaddy' ), 'section' => 'integrations' ),
	);
}

function sakbaddy_add_settings_page() {
	add_theme_page(
		__( 'Portfolio Settings', 'sakbaddy' ),
		__( 'Portfolio Settings', 'sakbaddy' ),
		'manage_options',
		'sakbaddy-settings',
		'sakbaddy_render_settings_page'
	);
}
add_action( 'admin_menu', 'sakbaddy_add_settings_page' );

function sakbaddy_register_settings() {
	register_setting( 'sakbaddy_options_group', 'sakbaddy_options', array( 'sanitize_callback' => 'sakbaddy_sanitize_options' ) );

	$sections = array(
		'homepage'     => __( 'Homepage hero', 'sakbaddy' ),
		'about'        => __( 'About section', 'sakbaddy' ),
		'skills'       => __( 'Education and skills', 'sakbaddy' ),
		'contact'      => __( 'Contact information', 'sakbaddy' ),
		'social'       => __( 'Social links', 'sakbaddy' ),
		'footer'       => __( 'Footer', 'sakbaddy' ),
		'integrations' => __( 'Integrations', 'sakbaddy' ),
	);

	foreach ( $sections as $id => $title ) {
		add_settings_section( 'sakbaddy_' . $id, $title, '__return_false', 'sakbaddy-settings' );
	}

	foreach ( sakbaddy_setting_fields() as $key => $field ) {
		add_settings_field(
			'sakbaddy_' . $key,
			$field['label'],
			'sakbaddy_render_setting_field',
			'sakbaddy-settings',
			'sakbaddy_' . $field['section'],
			array( 'key' => $key, 'field' => $field )
		);
	}
}
add_action( 'admin_init', 'sakbaddy_register_settings' );

function sakbaddy_sanitize_options( $input ) {
	$clean  = array();
	$fields = sakbaddy_setting_fields();
	$input  = is_array( $input ) ? $input : array();

	foreach ( $fields as $key => $field ) {
		$value = isset( $input[ $key ] ) && is_scalar( $input[ $key ] ) ? (string) $input[ $key ] : '';
		switch ( $field['type'] ) {
			case 'url':
				$clean[ $key ] = esc_url_raw( $value );
				break;
			case 'email':
				$clean[ $key ] = sanitize_email( $value );
				break;
			case 'textarea':
				$clean[ $key ] = sanitize_textarea_field( $value );
				break;
			case 'image':
				$clean[ $key ] = absint( $value );
				break;
			default:
				$clean[ $key ] = sanitize_text_field( $value );
				break;
		}
	}

	return $clean;
}

function sakbaddy_render_setting_field( $args ) {
	$key   = $args['key'];
	$field = $args['field'];
	$value = sakbaddy_get_option( $key );
	$name  = 'sakbaddy_options[' . $key . ']';

	if ( 'textarea' === $field['type'] ) {
		printf( '<textarea class="large-text" rows="4" id="%1$s" name="%2$s">%3$s</textarea>', esc_attr( $key ), esc_attr( $name ), esc_textarea( $value ) );
	} elseif ( 'image' === $field['type'] ) {
		printf( '<input class="regular-text sakbaddy-image-id" type="hidden" id="%1$s" name="%2$s" value="%3$s">', esc_attr( $key ), esc_attr( $name ), esc_attr( $value ) );
		printf( '<button type="button" class="button sakbaddy-select-image" data-target="%s">%s</button>', esc_attr( $key ), esc_html__( 'Choose image', 'sakbaddy' ) );
		if ( $value ) {
			echo wp_get_attachment_image( absint( $value ), array( 100, 100 ), false, array( 'class' => 'sakbaddy-image-preview', 'style' => 'display:block;margin-top:8px' ) );
		} else {
			echo '<img class="sakbaddy-image-preview" alt="" style="display:none;max-width:100px;margin-top:8px">';
		}
	} else {
		printf(
			'<input class="regular-text" type="%1$s" id="%2$s" name="%3$s" value="%4$s">',
			esc_attr( $field['type'] ),
			esc_attr( $key ),
			esc_attr( $name ),
			esc_attr( $value )
		);
	}

	if ( ! empty( $field['description'] ) ) {
		printf( '<p class="description">%s</p>', esc_html( $field['description'] ) );
	}
}

function sakbaddy_render_settings_page() {
	if ( ! current_user_can( 'manage_options' ) ) {
		return;
	}
	?>
	<div class="wrap">
		<h1><?php esc_html_e( 'Portfolio Settings', 'sakbaddy' ); ?></h1>
		<p><?php esc_html_e( 'Update the content and contact details displayed across your portfolio. Projects and testimonials are managed from their own menu items.', 'sakbaddy' ); ?></p>
		<form action="options.php" method="post">
			<?php
			settings_fields( 'sakbaddy_options_group' );
			do_settings_sections( 'sakbaddy-settings' );
			submit_button( __( 'Save portfolio settings', 'sakbaddy' ) );
			?>
		</form>
	</div>
	<?php
}

function sakbaddy_enqueue_admin_assets( $hook ) {
	if ( 'appearance_page_sakbaddy-settings' !== $hook ) {
		return;
	}
	wp_enqueue_media();
	wp_enqueue_script( 'sakbaddy-admin', get_template_directory_uri() . '/assets/js/admin.js', array( 'jquery' ), SAKBADDY_VERSION, true );
}
add_action( 'admin_enqueue_scripts', 'sakbaddy_enqueue_admin_assets' );

function sakbaddy_add_meta_boxes() {
	add_meta_box( 'sakbaddy_project_details', __( 'Project details', 'sakbaddy' ), 'sakbaddy_render_project_meta_box', 'sakbaddy_project', 'normal', 'default' );
	add_meta_box( 'sakbaddy_testimonial_details', __( 'Testimonial details', 'sakbaddy' ), 'sakbaddy_render_testimonial_meta_box', 'sakbaddy_testimonial', 'normal', 'default' );
}
add_action( 'add_meta_boxes', 'sakbaddy_add_meta_boxes' );

function sakbaddy_meta_field( $post, $key, $label, $type = 'text' ) {
	$value = get_post_meta( $post->ID, $key, true );
	printf( '<p><label for="%1$s"><strong>%2$s</strong></label><br><input class="widefat" type="%3$s" id="%1$s" name="%1$s" value="%4$s"></p>', esc_attr( $key ), esc_html( $label ), esc_attr( $type ), esc_attr( $value ) );
}

function sakbaddy_render_project_meta_box( $post ) {
	wp_nonce_field( 'sakbaddy_save_meta', 'sakbaddy_meta_nonce' );
	sakbaddy_meta_field( $post, '_sakbaddy_project_url', __( 'Project URL', 'sakbaddy' ), 'url' );
	sakbaddy_meta_field( $post, '_sakbaddy_github_url', __( 'GitHub URL', 'sakbaddy' ), 'url' );
	sakbaddy_meta_field( $post, '_sakbaddy_technologies', __( 'Technologies (comma separated)', 'sakbaddy' ) );
	sakbaddy_meta_field( $post, '_sakbaddy_project_date', __( 'Project date', 'sakbaddy' ), 'date' );
	sakbaddy_meta_field( $post, '_sakbaddy_project_order', __( 'Display order', 'sakbaddy' ), 'number' );
}

function sakbaddy_render_testimonial_meta_box( $post ) {
	wp_nonce_field( 'sakbaddy_save_meta', 'sakbaddy_meta_nonce' );
	sakbaddy_meta_field( $post, '_sakbaddy_testimonial_role', __( 'Person role', 'sakbaddy' ) );
	sakbaddy_meta_field( $post, '_sakbaddy_rating', __( 'Rating (0-5)', 'sakbaddy' ), 'number' );
	sakbaddy_meta_field( $post, '_sakbaddy_testimonial_order', __( 'Display order', 'sakbaddy' ), 'number' );
}

function sakbaddy_save_meta( $post_id ) {
	if ( ! isset( $_POST['sakbaddy_meta_nonce'] ) || ! is_string( $_POST['sakbaddy_meta_nonce'] ) || ! wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['sakbaddy_meta_nonce'] ) ), 'sakbaddy_save_meta' ) ) {
		return;
	}
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	if ( ! current_user_can( 'edit_post', $post_id ) ) {
		return;
	}

	$fields = array(
		'_sakbaddy_project_url'       => 'url',
		'_sakbaddy_github_url'        => 'url',
		'_sakbaddy_technologies'     => 'text',
		'_sakbaddy_project_date'     => 'text',
		'_sakbaddy_project_order'    => 'int',
		'_sakbaddy_testimonial_role' => 'text',
		'_sakbaddy_rating'           => 'int',
		'_sakbaddy_testimonial_order'=> 'int',
	);

	foreach ( $fields as $key => $type ) {
		if ( ! isset( $_POST[ $key ] ) || ! is_scalar( $_POST[ $key ] ) ) {
			continue;
		}
		$value = wp_unslash( $_POST[ $key ] );
		if ( 'url' === $type ) {
			$value = esc_url_raw( $value );
		} elseif ( 'int' === $type ) {
			$value = absint( $value );
			if ( '_sakbaddy_rating' === $key ) {
				$value = min( 5, $value );
			}
		} else {
			$value = sanitize_text_field( $value );
		}
		update_post_meta( $post_id, $key, $value );
	}
}
add_action( 'save_post_sakbaddy_project', 'sakbaddy_save_meta' );
add_action( 'save_post_sakbaddy_testimonial', 'sakbaddy_save_meta' );

function sakbaddy_output_analytics() {
	$measurement_id = trim( (string) sakbaddy_get_option( 'ga_measurement_id' ) );
	if ( ! preg_match( '/^G-[A-Z0-9]+$/i', $measurement_id ) ) {
		return;
	}
	?>
	<script async src="https://www.googletagmanager.com/gtag/js?id=<?php echo esc_attr( $measurement_id ); ?>"></script>
	<script>
		window.dataLayer = window.dataLayer || [];
		function gtag(){dataLayer.push(arguments);}
		gtag('js', new Date());
		gtag('config', <?php echo wp_json_encode( $measurement_id ); ?>);
	</script>
	<?php
}
add_action( 'wp_head', 'sakbaddy_output_analytics', 20 );

function sakbaddy_handle_contact_form() {
	$referer = wp_get_referer();
	if ( ! $referer ) {
		$referer = home_url( '/' );
	}
	if ( ! isset( $_POST['sakbaddy_contact_nonce'] ) || ! is_string( $_POST['sakbaddy_contact_nonce'] ) || ! wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['sakbaddy_contact_nonce'] ) ), 'sakbaddy_contact' ) ) {
		wp_safe_redirect( add_query_arg( 'contact_status', 'error', $referer ) . '#contact' );
		exit;
	}

	$name    = isset( $_POST['contact_name'] ) && is_scalar( $_POST['contact_name'] ) ? sanitize_text_field( wp_unslash( $_POST['contact_name'] ) ) : '';
	$email   = isset( $_POST['contact_email'] ) && is_scalar( $_POST['contact_email'] ) ? sanitize_email( wp_unslash( $_POST['contact_email'] ) ) : '';
	$subject = isset( $_POST['contact_subject'] ) && is_scalar( $_POST['contact_subject'] ) ? sanitize_text_field( wp_unslash( $_POST['contact_subject'] ) ) : '';
	$message = isset( $_POST['contact_message'] ) && is_scalar( $_POST['contact_message'] ) ? sanitize_textarea_field( wp_unslash( $_POST['contact_message'] ) ) : '';

	if ( '' === $name || '' === $subject || '' === $message || ! is_email( $email ) ) {
		wp_safe_redirect( add_query_arg( 'contact_status', 'error', $referer ) . '#contact' );
		exit;
	}

	$recipient = sanitize_email( sakbaddy_get_option( 'contact_recipient' ) );
	if ( ! is_email( $recipient ) ) {
		$recipient = sanitize_email( get_option( 'admin_email' ) );
	}
	$sent = wp_mail(
		$recipient,
		sprintf( '[%s] %s', wp_specialchars_decode( get_bloginfo( 'name' ), ENT_QUOTES ), $subject ),
		"From: {$name}\nEmail: {$email}\n\n{$message}",
		array( 'Reply-To: ' . $name . ' <' . $email . '>' )
	);

	wp_safe_redirect( add_query_arg( 'contact_status', $sent ? 'sent' : 'error', $referer ) . '#contact' );
	exit;
}
add_action( 'admin_post_nopriv_sakbaddy_contact', 'sakbaddy_handle_contact_form' );
add_action( 'admin_post_sakbaddy_contact', 'sakbaddy_handle_contact_form' );
