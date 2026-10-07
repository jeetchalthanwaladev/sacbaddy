<?php
/**
 * Sakbaddy Sample Data Seeder
 * Populates original portfolio items, testimonials, skills, and education on theme activation
 * so the theme is 100% complete and visually identical to the static site immediately.
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

function sakbaddy_seed_default_content() {
    // Only run if not already seeded
    if ( get_option( 'sakbaddy_sample_data_seeded' ) ) {
        return;
    }

    // 1. Seed Projects
    $existing_projects = get_posts( array( 'post_type' => 'project', 'posts_per_page' => 1 ) );
    if ( empty( $existing_projects ) ) {
        $default_projects = array(
            array(
                'title'      => 'Curology Skincare',
                'categories' => array( 'Fashion', 'Photography', 'Branding' ),
                'subtitle'   => 'Fashion / Photography',
                'image_num'  => '1.jpg',
                'order'      => 1,
            ),
            array(
                'title'      => 'Goby Blue Edition',
                'categories' => array( 'Product', 'Branding' ),
                'subtitle'   => 'Product / Branding',
                'image_num'  => '4.jpg',
                'order'      => 2,
            ),
            array(
                'title'      => 'LARQ PureVis Coral',
                'categories' => array( 'Product', 'Fashion', 'Photography' ),
                'subtitle'   => 'Product / Fashion',
                'image_num'  => '7.jpg',
                'order'      => 3,
            ),
            array(
                'title'      => 'Honest Beauty Primer',
                'categories' => array( 'Branding', 'Product' ),
                'subtitle'   => 'Branding / Product',
                'image_num'  => '2.jpg',
                'order'      => 4,
            ),
            array(
                'title'      => 'LARQ Bottle Botanical',
                'categories' => array( 'Product', 'Photography' ),
                'subtitle'   => 'Product / Photography',
                'image_num'  => '5.jpg',
                'order'      => 5,
            ),
            array(
                'title'      => 'GOBY Rose Pink',
                'categories' => array( 'Product', 'Fashion' ),
                'subtitle'   => 'Product / Fashion',
                'image_num'  => '8.jpg',
                'order'      => 6,
            ),
            array(
                'title'      => 'Urban Sportswear',
                'categories' => array( 'Fashion', 'Photography' ),
                'subtitle'   => 'Fashion / Photography',
                'image_num'  => '3.jpg',
                'order'      => 7,
            ),
            array(
                'title'      => 'The Doodle Club',
                'categories' => array( 'Branding', 'Illustration' ),
                'subtitle'   => 'Branding / Illustration',
                'image_num'  => '6.jpg',
                'order'      => 8,
            ),
            array(
                'title'      => 'Aero Fixed Gear',
                'categories' => array( 'Product', 'Branding', 'Photography' ),
                'subtitle'   => 'Product / Photography',
                'image_num'  => '9.jpg',
                'order'      => 9,
            ),
        );

        foreach ( $default_projects as $p ) {
            $post_id = wp_insert_post( array(
                'post_title'   => $p['title'],
                'post_content' => 'High quality presentation and case study for ' . $p['title'] . '.',
                'post_status'  => 'publish',
                'post_type'    => 'project',
                'menu_order'   => $p['order'],
            ) );

            if ( $post_id && ! is_wp_error( $post_id ) ) {
                update_post_meta( $post_id, '_sakbaddy_project_subtitle', $p['subtitle'] );
                update_post_meta( $post_id, '_sakbaddy_project_url', 'https://sacbaddy-25y2.vercel.app/' );
                update_post_meta( $post_id, '_sakbaddy_default_image', 'src/portfolio/' . $p['image_num'] );
                wp_set_object_terms( $post_id, $p['categories'], 'project_category' );
            }
        }
    }

    // 2. Seed Testimonials
    $existing_testimonials = get_posts( array( 'post_type' => 'testimonial', 'posts_per_page' => 1 ) );
    if ( empty( $existing_testimonials ) ) {
        $default_testimonials = array(
            array(
                'name'      => 'Nancy Byers',
                'role'      => 'CEO at ib-themes',
                'content'   => "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.",
                'image'     => 'src/testimonials/testimonial-1.webp',
                'order'     => 1,
            ),
            array(
                'name'      => 'Jara Afsari',
                'role'      => 'CEO at ib-themes',
                'content'   => "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.",
                'image'     => 'src/testimonials/testimonial-2.webp',
                'order'     => 2,
            ),
            array(
                'name'      => 'Alexander Wright',
                'role'      => 'Product Lead at ib-themes',
                'content'   => "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.",
                'image'     => 'src/testimonials/testimonial-3.webp',
                'order'     => 3,
            ),
        );

        foreach ( $default_testimonials as $t ) {
            $post_id = wp_insert_post( array(
                'post_title'   => $t['name'],
                'post_content' => $t['content'],
                'post_status'  => 'publish',
                'post_type'    => 'testimonial',
                'menu_order'   => $t['order'],
            ) );

            if ( $post_id && ! is_wp_error( $post_id ) ) {
                update_post_meta( $post_id, '_sakbaddy_testimonial_role', $t['role'] );
                update_post_meta( $post_id, '_sakbaddy_testimonial_rating', 5 );
                update_post_meta( $post_id, '_sakbaddy_default_image', $t['image'] );
            }
        }
    }

    // 3. Seed Skills
    $existing_skills = get_posts( array( 'post_type' => 'skill', 'posts_per_page' => 1 ) );
    if ( empty( $existing_skills ) ) {
        $default_skills = array(
            array( 'title' => 'HTML5', 'percent' => 92, 'order' => 1 ),
            array( 'title' => 'React JS', 'percent' => 85, 'order' => 2 ),
            array( 'title' => 'Vue Js', 'percent' => 90, 'order' => 3 ),
            array( 'title' => 'Ui/Ux', 'percent' => 88, 'order' => 4 ),
        );

        foreach ( $default_skills as $s ) {
            $post_id = wp_insert_post( array(
                'post_title'  => $s['title'],
                'post_status' => 'publish',
                'post_type'   => 'skill',
                'menu_order'  => $s['order'],
            ) );

            if ( $post_id && ! is_wp_error( $post_id ) ) {
                update_post_meta( $post_id, '_sakbaddy_skill_percent', $s['percent'] );
            }
        }
    }

    // 4. Seed Education
    $existing_edu = get_posts( array( 'post_type' => 'education', 'posts_per_page' => 1 ) );
    if ( empty( $existing_edu ) ) {
        $default_edu = array(
            array(
                'title'  => 'Ph.D in Horriblensess',
                'years'  => '2018-2020',
                'school' => 'University Of Evil Doing',
                'order'  => 1,
            ),
            array(
                'title'  => 'Bsc. in Computer Science',
                'years'  => '2013-2016',
                'school' => 'World University',
                'order'  => 2,
            ),
            array(
                'title'  => 'Graphic Artist Training',
                'years'  => '2010-2012',
                'school' => 'Graphic Master Institute',
                'order'  => 3,
            ),
        );

        foreach ( $default_edu as $e ) {
            $post_id = wp_insert_post( array(
                'post_title'  => $e['title'],
                'post_status' => 'publish',
                'post_type'   => 'education',
                'menu_order'  => $e['order'],
            ) );

            if ( $post_id && ! is_wp_error( $post_id ) ) {
                update_post_meta( $post_id, '_sakbaddy_edu_years', $e['years'] );
                update_post_meta( $post_id, '_sakbaddy_edu_school', $e['school'] );
            }
        }
    }

    update_option( 'sakbaddy_sample_data_seeded', true );
}
add_action( 'after_switch_theme', 'sakbaddy_seed_default_content' );
