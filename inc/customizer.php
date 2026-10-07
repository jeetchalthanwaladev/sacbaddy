<?php
/**
 * Sakbaddy Theme Customizer
 * Registers comprehensive CMS controls for Hero, About, Skills, Portfolio,
 * Testimonials, Contact, Social, Footer, SEO, and Google Analytics.
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

function sakbaddy_customize_register( $wp_customize ) {

    // Sanitize callbacks
    function sakbaddy_sanitize_text( $input ) {
        return sanitize_text_field( $input );
    }

    function sakbaddy_sanitize_textarea( $input ) {
        return wp_kses_post( $input );
    }

    function sakbaddy_sanitize_url( $input ) {
        return esc_url_raw( $input );
    }

    function sakbaddy_sanitize_image( $input ) {
        return esc_url_raw( $input );
    }

    function sakbaddy_sanitize_form_mode( $input ) {
        $valid = array( 'ajax', 'formspree' );
        return in_array( $input, $valid, true ) ? $input : 'ajax';
    }

    function sakbaddy_sanitize_ga_id( $input ) {
        $clean = sanitize_text_field( $input );
        if ( preg_match( '/^G-[A-Za-z0-9]+$/', $clean ) ) {
            return $clean;
        }
        return '';
    }

    // Panel: Sakbaddy Theme Options
    $wp_customize->add_panel( 'sakbaddy_theme_panel', array(
        'title'       => __( 'Sakbaddy CMS Options', 'sakbaddy' ),
        'description' => __( 'Manage all content, sections, contact details, and settings for your website.', 'sakbaddy' ),
        'priority'    => 20,
    ) );

    /* -------------------------------------------------------------
       1. HERO SECTION
       ------------------------------------------------------------- */
    $wp_customize->add_section( 'sakbaddy_hero_section', array(
        'title'    => __( 'Hero Section', 'sakbaddy' ),
        'panel'    => 'sakbaddy_theme_panel',
        'priority' => 10,
    ) );

    // Top Bar Phone
    $wp_customize->add_setting( 'sakbaddy_hero_phone', array(
        'default'           => '+91 98765 43210',
        'sanitize_callback' => 'sakbaddy_sanitize_text',
        'transport'         => 'refresh',
    ) );
    $wp_customize->add_control( 'sakbaddy_hero_phone', array(
        'label'   => __( 'Top Bar Phone Number', 'sakbaddy' ),
        'section' => 'sakbaddy_hero_section',
        'type'    => 'text',
    ) );

    // Top Bar Email
    $wp_customize->add_setting( 'sakbaddy_hero_email', array(
        'default'           => 'sakshi_shah@domain.com',
        'sanitize_callback' => 'sakbaddy_sanitize_text',
        'transport'         => 'refresh',
    ) );
    $wp_customize->add_control( 'sakbaddy_hero_email', array(
        'label'   => __( 'Top Bar Email Address', 'sakbaddy' ),
        'section' => 'sakbaddy_hero_section',
        'type'    => 'text',
    ) );

    // Hero Greeting
    $wp_customize->add_setting( 'sakbaddy_hero_greeting', array(
        'default'           => 'Hello, My name is',
        'sanitize_callback' => 'sakbaddy_sanitize_text',
        'transport'         => 'refresh',
    ) );
    $wp_customize->add_control( 'sakbaddy_hero_greeting', array(
        'label'   => __( 'Hero Greeting Subtitle', 'sakbaddy' ),
        'section' => 'sakbaddy_hero_section',
        'type'    => 'text',
    ) );

    // Hero Title / Name
    $wp_customize->add_setting( 'sakbaddy_hero_title', array(
        'default'           => 'Sakshi Shah',
        'sanitize_callback' => 'sakbaddy_sanitize_text',
        'transport'         => 'refresh',
    ) );
    $wp_customize->add_control( 'sakbaddy_hero_title', array(
        'label'   => __( 'Hero Title / Name', 'sakbaddy' ),
        'section' => 'sakbaddy_hero_section',
        'type'    => 'text',
    ) );

    // Hero Role 1
    $wp_customize->add_setting( 'sakbaddy_hero_role1', array(
        'default'           => 'Web Developer',
        'sanitize_callback' => 'sakbaddy_sanitize_text',
        'transport'         => 'refresh',
    ) );
    $wp_customize->add_control( 'sakbaddy_hero_role1', array(
        'label'   => __( 'Hero Role Tag 1', 'sakbaddy' ),
        'section' => 'sakbaddy_hero_section',
        'type'    => 'text',
    ) );

    // Hero Role 2
    $wp_customize->add_setting( 'sakbaddy_hero_role2', array(
        'default'           => 'Freelancer',
        'sanitize_callback' => 'sakbaddy_sanitize_text',
        'transport'         => 'refresh',
    ) );
    $wp_customize->add_control( 'sakbaddy_hero_role2', array(
        'label'   => __( 'Hero Role Tag 2', 'sakbaddy' ),
        'section' => 'sakbaddy_hero_section',
        'type'    => 'text',
    ) );

    // Hero Description
    $wp_customize->add_setting( 'sakbaddy_hero_description', array(
        'default'           => 'I design and develop services for customers of all sizes, specializing in creating stylish, modern websites, web services and online stores.',
        'sanitize_callback' => 'sakbaddy_sanitize_textarea',
        'transport'         => 'refresh',
    ) );
    $wp_customize->add_control( 'sakbaddy_hero_description', array(
        'label'   => __( 'Hero Description', 'sakbaddy' ),
        'section' => 'sakbaddy_hero_section',
        'type'    => 'textarea',
    ) );

    // Primary Button Text
    $wp_customize->add_setting( 'sakbaddy_hero_btn_text', array(
        'default'           => 'Download CV',
        'sanitize_callback' => 'sakbaddy_sanitize_text',
        'transport'         => 'refresh',
    ) );
    $wp_customize->add_control( 'sakbaddy_hero_btn_text', array(
        'label'   => __( 'Primary Button Text', 'sakbaddy' ),
        'section' => 'sakbaddy_hero_section',
        'type'    => 'text',
    ) );

    // Primary Button URL
    $wp_customize->add_setting( 'sakbaddy_hero_btn_url', array(
        'default'           => '#contact',
        'sanitize_callback' => 'sakbaddy_sanitize_text',
        'transport'         => 'refresh',
    ) );
    $wp_customize->add_control( 'sakbaddy_hero_btn_url', array(
        'label'   => __( 'Primary Button URL', 'sakbaddy' ),
        'section' => 'sakbaddy_hero_section',
        'type'    => 'text',
    ) );

    // Hero Banner Image
    $wp_customize->add_setting( 'sakbaddy_hero_image', array(
        'default'           => '',
        'sanitize_callback' => 'sakbaddy_sanitize_image',
        'transport'         => 'refresh',
    ) );
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'sakbaddy_hero_image', array(
        'label'       => __( 'Hero Banner Image (Default: home-banner.png)', 'sakbaddy' ),
        'section'     => 'sakbaddy_hero_section',
        'description' => __( 'Upload a custom hero image or leave empty to use the default theme image.', 'sakbaddy' ),
    ) ) );


    /* -------------------------------------------------------------
       2. ABOUT SECTION
       ------------------------------------------------------------- */
    $wp_customize->add_section( 'sakbaddy_about_section', array(
        'title'    => __( 'About Section', 'sakbaddy' ),
        'panel'    => 'sakbaddy_theme_panel',
        'priority' => 20,
    ) );

    // Section Tag
    $wp_customize->add_setting( 'sakbaddy_about_tag', array(
        'default'           => 'Biography',
        'sanitize_callback' => 'sakbaddy_sanitize_text',
    ) );
    $wp_customize->add_control( 'sakbaddy_about_tag', array(
        'label'   => __( 'Section Tag Title', 'sakbaddy' ),
        'section' => 'sakbaddy_about_section',
        'type'    => 'text',
    ) );

    // Role
    $wp_customize->add_setting( 'sakbaddy_about_role', array(
        'default'           => 'Web Developer',
        'sanitize_callback' => 'sakbaddy_sanitize_text',
    ) );
    $wp_customize->add_control( 'sakbaddy_about_role', array(
        'label'   => __( 'Professional Role', 'sakbaddy' ),
        'section' => 'sakbaddy_about_section',
        'type'    => 'text',
    ) );

    // Name
    $wp_customize->add_setting( 'sakbaddy_about_name', array(
        'default'           => 'Sakshi Shah',
        'sanitize_callback' => 'sakbaddy_sanitize_text',
    ) );
    $wp_customize->add_control( 'sakbaddy_about_name', array(
        'label'   => __( 'Full Name', 'sakbaddy' ),
        'section' => 'sakbaddy_about_section',
        'type'    => 'text',
    ) );

    // Bio
    $wp_customize->add_setting( 'sakbaddy_about_bio', array(
        'default'           => "I'm a Freelancer webDeveloper with over 3 years of experience. I'm from india. I code and create web elements for amazing people around the world. I like work with new people. New people new Experiences.",
        'sanitize_callback' => 'sakbaddy_sanitize_textarea',
    ) );
    $wp_customize->add_control( 'sakbaddy_about_bio', array(
        'label'   => __( 'Biography Text', 'sakbaddy' ),
        'section' => 'sakbaddy_about_section',
        'type'    => 'textarea',
    ) );

    // Profile Image
    $wp_customize->add_setting( 'sakbaddy_about_image', array(
        'default'           => '',
        'sanitize_callback' => 'sakbaddy_sanitize_image',
    ) );
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'sakbaddy_about_image', array(
        'label'       => __( 'Profile Image (Default: image0.png)', 'sakbaddy' ),
        'section'     => 'sakbaddy_about_section',
        'description' => __( 'Upload your circular profile photo or leave empty for default.', 'sakbaddy' ),
    ) ) );

    // Personal Info Grid Items
    $info_fields = array(
        'sakbaddy_about_phone'     => array( 'Phone', '(+91) 9876543210' ),
        'sakbaddy_about_birthday'  => array( 'Birthday', '11th april 2005' ),
        'sakbaddy_about_email'     => array( 'Email', 'info@domainname.com' ),
        'sakbaddy_about_age'       => array( 'Age', '21 years' ),
        'sakbaddy_about_skype'     => array( 'Skype', 'sakshi.40' ),
        'sakbaddy_about_address'   => array( 'Address', 'India' ),
        'sakbaddy_about_freelance' => array( 'Freelance Status', 'Available' ),
    );

    foreach ( $info_fields as $key => $meta ) {
        $wp_customize->add_setting( $key, array(
            'default'           => $meta[1],
            'sanitize_callback' => 'sakbaddy_sanitize_text',
        ) );
        $wp_customize->add_control( $key, array(
            'label'   => __( $meta[0], 'sakbaddy' ),
            'section' => 'sakbaddy_about_section',
            'type'    => 'text',
        ) );
    }


    /* -------------------------------------------------------------
       3. SECTION HEADINGS (SKILLS, PORTFOLIO, TESTIMONIALS)
       ------------------------------------------------------------- */
    $wp_customize->add_section( 'sakbaddy_headings_section', array(
        'title'    => __( 'Section Headings', 'sakbaddy' ),
        'panel'    => 'sakbaddy_theme_panel',
        'priority' => 30,
    ) );

    $wp_customize->add_setting( 'sakbaddy_skills_tag', array(
        'default'           => 'Education & Skills',
        'sanitize_callback' => 'sakbaddy_sanitize_text',
    ) );
    $wp_customize->add_control( 'sakbaddy_skills_tag', array(
        'label'   => __( 'Education & Skills Heading', 'sakbaddy' ),
        'section' => 'sakbaddy_headings_section',
        'type'    => 'text',
    ) );

    $wp_customize->add_setting( 'sakbaddy_portfolio_tag', array(
        'default'           => 'My Portfolio.',
        'sanitize_callback' => 'sakbaddy_sanitize_text',
    ) );
    $wp_customize->add_control( 'sakbaddy_portfolio_tag', array(
        'label'   => __( 'Portfolio Section Heading', 'sakbaddy' ),
        'section' => 'sakbaddy_headings_section',
        'type'    => 'text',
    ) );

    $wp_customize->add_setting( 'sakbaddy_testimonials_tag', array(
        'default'           => 'Testimonials.',
        'sanitize_callback' => 'sakbaddy_sanitize_text',
    ) );
    $wp_customize->add_control( 'sakbaddy_testimonials_tag', array(
        'label'   => __( 'Testimonials Section Heading', 'sakbaddy' ),
        'section' => 'sakbaddy_headings_section',
        'type'    => 'text',
    ) );


    /* -------------------------------------------------------------
       4. CONTACT SECTION & FORM SETTINGS
       ------------------------------------------------------------- */
    $wp_customize->add_section( 'sakbaddy_contact_section', array(
        'title'    => __( 'Contact Section & Form', 'sakbaddy' ),
        'panel'    => 'sakbaddy_theme_panel',
        'priority' => 40,
    ) );

    $wp_customize->add_setting( 'sakbaddy_contact_title_1', array(
        'default'           => "What's your story?",
        'sanitize_callback' => 'sakbaddy_sanitize_text',
    ) );
    $wp_customize->add_control( 'sakbaddy_contact_title_1', array(
        'label'   => __( 'Heading Line 1', 'sakbaddy' ),
        'section' => 'sakbaddy_contact_section',
        'type'    => 'text',
    ) );

    $wp_customize->add_setting( 'sakbaddy_contact_title_2', array(
        'default'           => 'Get in touch',
        'sanitize_callback' => 'sakbaddy_sanitize_text',
    ) );
    $wp_customize->add_control( 'sakbaddy_contact_title_2', array(
        'label'   => __( 'Heading Line 2 (Highlighted)', 'sakbaddy' ),
        'section' => 'sakbaddy_contact_section',
        'type'    => 'text',
    ) );

    $wp_customize->add_setting( 'sakbaddy_contact_subtitle', array(
        'default'           => 'Always available for freelancing if the right project comes along. Feel free to contact me.',
        'sanitize_callback' => 'sakbaddy_sanitize_textarea',
    ) );
    $wp_customize->add_control( 'sakbaddy_contact_subtitle', array(
        'label'   => __( 'Contact Subtitle Text', 'sakbaddy' ),
        'section' => 'sakbaddy_contact_section',
        'type'    => 'textarea',
    ) );

    $wp_customize->add_setting( 'sakbaddy_contact_address', array(
        'default'           => '123 Street New York City, United States Of America 750065.',
        'sanitize_callback' => 'sakbaddy_sanitize_text',
    ) );
    $wp_customize->add_control( 'sakbaddy_contact_address', array(
        'label'   => __( 'Display Address', 'sakbaddy' ),
        'section' => 'sakbaddy_contact_section',
        'type'    => 'text',
    ) );

    $wp_customize->add_setting( 'sakbaddy_contact_email', array(
        'default'           => 'support@domain.com',
        'sanitize_callback' => 'sakbaddy_sanitize_text',
    ) );
    $wp_customize->add_control( 'sakbaddy_contact_email', array(
        'label'   => __( 'Display Email', 'sakbaddy' ),
        'section' => 'sakbaddy_contact_section',
        'type'    => 'text',
    ) );

    $wp_customize->add_setting( 'sakbaddy_contact_phone', array(
        'default'           => '+044 9696 9696 3636',
        'sanitize_callback' => 'sakbaddy_sanitize_text',
    ) );
    $wp_customize->add_control( 'sakbaddy_contact_phone', array(
        'label'   => __( 'Display Phone', 'sakbaddy' ),
        'section' => 'sakbaddy_contact_section',
        'type'    => 'text',
    ) );

    $wp_customize->add_setting( 'sakbaddy_contact_map_url', array(
        'default'           => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3151.865498813894!2d144.96880199999998!3d-37.81661929999999!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6ad65d4c2b349649%3A0xb6899234e561db11!2sEnvato%20Pty%20Ltd!5e0!3m2!1sen!2sin!4v1791183175752!5m2!1sen!2sin',
        'sanitize_callback' => 'sakbaddy_sanitize_url',
    ) );
    $wp_customize->add_control( 'sakbaddy_contact_map_url', array(
        'label'       => __( 'Google Maps Embed URL', 'sakbaddy' ),
        'section'     => 'sakbaddy_contact_section',
        'type'        => 'url',
        'description' => __( 'Paste your Google Maps embed src link.', 'sakbaddy' ),
    ) );

    // Form Handling Mode
    $wp_customize->add_setting( 'sakbaddy_form_mode', array(
        'default'           => 'ajax',
        'sanitize_callback' => 'sakbaddy_sanitize_form_mode',
    ) );
    $wp_customize->add_control( 'sakbaddy_form_mode', array(
        'label'       => __( 'Form Submission Mode', 'sakbaddy' ),
        'section'     => 'sakbaddy_contact_section',
        'type'        => 'select',
        'choices'     => array(
            'ajax'      => __( 'Native WordPress Email (wp_mail)', 'sakbaddy' ),
            'formspree' => __( 'Formspree Service Endpoint', 'sakbaddy' ),
        ),
    ) );

    // Formspree URL
    $wp_customize->add_setting( 'sakbaddy_formspree_url', array(
        'default'           => '',
        'sanitize_callback' => 'sakbaddy_sanitize_url',
    ) );
    $wp_customize->add_control( 'sakbaddy_formspree_url', array(
        'label'       => __( 'Formspree Endpoint URL (Optional)', 'sakbaddy' ),
        'section'     => 'sakbaddy_contact_section',
        'type'        => 'url',
        'description' => __( 'Example: https://formspree.io/f/xv... (Leave blank to use WordPress native email).', 'sakbaddy' ),
    ) );

    // Recipient Email for wp_mail
    $wp_customize->add_setting( 'sakbaddy_contact_recipient', array(
        'default'           => get_option( 'admin_email' ),
        'sanitize_callback' => 'sanitize_email',
    ) );
    $wp_customize->add_control( 'sakbaddy_contact_recipient', array(
        'label'       => __( 'Notification Recipient Email', 'sakbaddy' ),
        'section'     => 'sakbaddy_contact_section',
        'type'        => 'email',
        'description' => __( 'Where form submission emails will be delivered.', 'sakbaddy' ),
    ) );


    /* -------------------------------------------------------------
       5. SOCIAL MEDIA LINKS
       ------------------------------------------------------------- */
    $wp_customize->add_section( 'sakbaddy_social_section', array(
        'title'    => __( 'Social Media Links', 'sakbaddy' ),
        'panel'    => 'sakbaddy_theme_panel',
        'priority' => 50,
    ) );

    $social_networks = array(
        'facebook'  => 'Facebook URL',
        'twitter'   => 'Twitter / X URL',
        'instagram' => 'Instagram URL',
        'linkedin'  => 'LinkedIn URL',
        'pinterest' => 'Pinterest URL',
        'github'    => 'GitHub URL',
        'youtube'   => 'YouTube URL',
    );

    foreach ( $social_networks as $key => $label ) {
        $wp_customize->add_setting( 'sakbaddy_social_' . $key, array(
            'default'           => '#',
            'sanitize_callback' => 'sakbaddy_sanitize_url',
        ) );
        $wp_customize->add_control( 'sakbaddy_social_' . $key, array(
            'label'   => __( $label, 'sakbaddy' ),
            'section' => 'sakbaddy_social_section',
            'type'    => 'url',
        ) );
    }


    /* -------------------------------------------------------------
       6. FOOTER SETTINGS
       ------------------------------------------------------------- */
    $wp_customize->add_section( 'sakbaddy_footer_section', array(
        'title'    => __( 'Footer Settings', 'sakbaddy' ),
        'panel'    => 'sakbaddy_theme_panel',
        'priority' => 60,
    ) );

    $wp_customize->add_setting( 'sakbaddy_footer_brand', array(
        'default'           => 'Sakbaddy',
        'sanitize_callback' => 'sakbaddy_sanitize_text',
    ) );
    $wp_customize->add_control( 'sakbaddy_footer_brand', array(
        'label'   => __( 'Footer Brand Name', 'sakbaddy' ),
        'section' => 'sakbaddy_footer_section',
        'type'    => 'text',
    ) );

    $wp_customize->add_setting( 'sakbaddy_footer_description', array(
        'default'           => 'We provide stylish, practical, and affordable solutions for everyday living.',
        'sanitize_callback' => 'sakbaddy_sanitize_textarea',
    ) );
    $wp_customize->add_control( 'sakbaddy_footer_description', array(
        'label'   => __( 'Footer Tagline / Bio', 'sakbaddy' ),
        'section' => 'sakbaddy_footer_section',
        'type'    => 'textarea',
    ) );

    $wp_customize->add_setting( 'sakbaddy_footer_copyright', array(
        'default'           => '© ' . date('Y') . ' Sakbaddy. All rights reserved.',
        'sanitize_callback' => 'sakbaddy_sanitize_text',
    ) );
    $wp_customize->add_control( 'sakbaddy_footer_copyright', array(
        'label'   => __( 'Copyright Notice', 'sakbaddy' ),
        'section' => 'sakbaddy_footer_section',
        'type'    => 'text',
    ) );


    /* -------------------------------------------------------------
       7. SEO & ANALYTICS
       ------------------------------------------------------------- */
    $wp_customize->add_section( 'sakbaddy_seo_analytics_section', array(
        'title'       => __( 'SEO & Google Analytics', 'sakbaddy' ),
        'panel'       => 'sakbaddy_theme_panel',
        'priority'    => 70,
        'description' => __( 'Configure meta tags and GA4 without installing third-party bloat.', 'sakbaddy' ),
    ) );

    $wp_customize->add_setting( 'sakbaddy_seo_description', array(
        'default'           => 'Professional full-stack developer creating modern and responsive websites.',
        'sanitize_callback' => 'sakbaddy_sanitize_textarea',
    ) );
    $wp_customize->add_control( 'sakbaddy_seo_description', array(
        'label'       => __( 'Default Meta Description', 'sakbaddy' ),
        'section'     => 'sakbaddy_seo_analytics_section',
        'type'        => 'textarea',
        'description' => __( 'Used if no SEO plugin (Yoast / Rank Math) is active.', 'sakbaddy' ),
    ) );

    $wp_customize->add_setting( 'sakbaddy_seo_og_image', array(
        'default'           => '',
        'sanitize_callback' => 'sakbaddy_sanitize_image',
    ) );
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'sakbaddy_seo_og_image', array(
        'label'       => __( 'Default Open Graph Social Share Image', 'sakbaddy' ),
        'section'     => 'sakbaddy_seo_analytics_section',
    ) ) );

    $wp_customize->add_setting( 'sakbaddy_ga_id', array(
        'default'           => '',
        'sanitize_callback' => 'sakbaddy_sanitize_ga_id',
    ) );
    $wp_customize->add_control( 'sakbaddy_ga_id', array(
        'label'       => __( 'Google Analytics 4 Measurement ID', 'sakbaddy' ),
        'section'     => 'sakbaddy_seo_analytics_section',
        'type'        => 'text',
        'description' => __( 'Format: G-XXXXXXXXXX. Leave empty if using Google Site Kit or no tracking.', 'sakbaddy' ),
    ) );
}
add_action( 'customize_register', 'sakbaddy_customize_register' );
