<?php
/**
 * Sakbaddy Custom Post Types & Taxonomies
 * Registers Projects, Testimonials, Skills, and Education CPTs with Custom Meta Boxes.
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/* ==========================================================================
   1. REGISTER CUSTOM POST TYPES & TAXONOMIES
   ========================================================================== */
function sakbaddy_register_cpts() {

    // 1. PROJECTS CPT
    $project_labels = array(
        'name'               => _x( 'Projects', 'post type general name', 'sakbaddy' ),
        'singular_name'      => _x( 'Project', 'post type singular name', 'sakbaddy' ),
        'menu_name'          => _x( 'Projects', 'admin menu', 'sakbaddy' ),
        'add_new'            => _x( 'Add New Project', 'project', 'sakbaddy' ),
        'add_new_item'       => __( 'Add New Project', 'sakbaddy' ),
        'edit_item'          => __( 'Edit Project', 'sakbaddy' ),
        'new_item'           => __( 'New Project', 'sakbaddy' ),
        'view_item'          => __( 'View Project', 'sakbaddy' ),
        'all_items'          => __( 'All Projects', 'sakbaddy' ),
        'search_items'       => __( 'Search Projects', 'sakbaddy' ),
        'not_found'          => __( 'No projects found.', 'sakbaddy' ),
        'not_found_in_trash' => __( 'No projects found in Trash.', 'sakbaddy' ),
    );

    $project_args = array(
        'labels'             => $project_labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'show_in_rest'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'projects' ),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => 5,
        'menu_icon'          => 'dashicons-portfolio',
        'supports'           => array( 'title', 'editor', 'thumbnail', 'excerpt', 'page-attributes' ),
    );
    register_post_type( 'project', $project_args );

    // Project Categories Taxonomy
    $cat_labels = array(
        'name'              => _x( 'Project Categories', 'taxonomy general name', 'sakbaddy' ),
        'singular_name'     => _x( 'Project Category', 'taxonomy singular name', 'sakbaddy' ),
        'search_items'      => __( 'Search Categories', 'sakbaddy' ),
        'all_items'         => __( 'All Categories', 'sakbaddy' ),
        'edit_item'         => __( 'Edit Category', 'sakbaddy' ),
        'update_item'       => __( 'Update Category', 'sakbaddy' ),
        'add_new_item'      => __( 'Add New Category', 'sakbaddy' ),
        'new_item_name'     => __( 'New Category Name', 'sakbaddy' ),
        'menu_name'         => __( 'Categories', 'sakbaddy' ),
    );

    $cat_args = array(
        'hierarchical'      => true,
        'labels'            => $cat_labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'show_in_rest'      => true,
        'query_var'         => true,
        'rewrite'           => array( 'slug' => 'project-category' ),
    );
    register_taxonomy( 'project_category', array( 'project' ), $cat_args );


    // 2. TESTIMONIALS CPT
    $testimonial_labels = array(
        'name'               => _x( 'Testimonials', 'post type general name', 'sakbaddy' ),
        'singular_name'      => _x( 'Testimonial', 'post type singular name', 'sakbaddy' ),
        'menu_name'          => _x( 'Testimonials', 'admin menu', 'sakbaddy' ),
        'add_new'            => _x( 'Add New Testimonial', 'testimonial', 'sakbaddy' ),
        'add_new_item'       => __( 'Add New Testimonial', 'sakbaddy' ),
        'edit_item'          => __( 'Edit Testimonial', 'sakbaddy' ),
        'new_item'           => __( 'New Testimonial', 'sakbaddy' ),
        'view_item'          => __( 'View Testimonial', 'sakbaddy' ),
        'all_items'          => __( 'All Testimonials', 'sakbaddy' ),
        'search_items'       => __( 'Search Testimonials', 'sakbaddy' ),
        'not_found'          => __( 'No testimonials found.', 'sakbaddy' ),
        'not_found_in_trash' => __( 'No testimonials found in Trash.', 'sakbaddy' ),
    );

    $testimonial_args = array(
        'labels'             => $testimonial_labels,
        'public'             => true,
        'publicly_queryable' => false,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'show_in_rest'       => true,
        'query_var'          => false,
        'capability_type'    => 'post',
        'has_archive'        => false,
        'hierarchical'       => false,
        'menu_position'      => 6,
        'menu_icon'          => 'dashicons-format-quote',
        'supports'           => array( 'title', 'editor', 'thumbnail', 'page-attributes' ),
    );
    register_post_type( 'testimonial', $testimonial_args );


    // 3. SKILLS CPT
    $skill_labels = array(
        'name'               => _x( 'Skills', 'post type general name', 'sakbaddy' ),
        'singular_name'      => _x( 'Skill', 'post type singular name', 'sakbaddy' ),
        'menu_name'          => _x( 'Skills', 'admin menu', 'sakbaddy' ),
        'add_new'            => _x( 'Add New Skill', 'skill', 'sakbaddy' ),
        'add_new_item'       => __( 'Add New Skill', 'sakbaddy' ),
        'edit_item'          => __( 'Edit Skill', 'sakbaddy' ),
        'new_item'           => __( 'New Skill', 'sakbaddy' ),
        'all_items'          => __( 'All Skills', 'sakbaddy' ),
        'search_items'       => __( 'Search Skills', 'sakbaddy' ),
        'not_found'          => __( 'No skills found.', 'sakbaddy' ),
    );

    $skill_args = array(
        'labels'             => $skill_labels,
        'public'             => false,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'show_in_rest'       => true,
        'menu_position'      => 7,
        'menu_icon'          => 'dashicons-chart-bar',
        'supports'           => array( 'title', 'page-attributes' ),
    );
    register_post_type( 'skill', $skill_args );


    // 4. EDUCATION CPT
    $edu_labels = array(
        'name'               => _x( 'Education', 'post type general name', 'sakbaddy' ),
        'singular_name'      => _x( 'Education Item', 'post type singular name', 'sakbaddy' ),
        'menu_name'          => _x( 'Education', 'admin menu', 'sakbaddy' ),
        'add_new'            => _x( 'Add New Item', 'education', 'sakbaddy' ),
        'add_new_item'       => __( 'Add New Education Item', 'sakbaddy' ),
        'edit_item'          => __( 'Edit Education Item', 'sakbaddy' ),
        'new_item'           => __( 'New Education Item', 'sakbaddy' ),
        'all_items'          => __( 'All Education Items', 'sakbaddy' ),
        'search_items'       => __( 'Search Education', 'sakbaddy' ),
        'not_found'          => __( 'No education items found.', 'sakbaddy' ),
    );

    $edu_args = array(
        'labels'             => $edu_labels,
        'public'             => false,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'show_in_rest'       => true,
        'menu_position'      => 8,
        'menu_icon'          => 'dashicons-welcome-learn-more',
        'supports'           => array( 'title', 'page-attributes' ),
    );
    register_post_type( 'education', $edu_args );
}
add_action( 'init', 'sakbaddy_register_cpts' );


/* ==========================================================================
   2. META BOXES FOR CUSTOM POST TYPES
   ========================================================================== */

function sakbaddy_add_meta_boxes() {
    // Project Details Meta Box
    add_meta_box(
        'sakbaddy_project_meta',
        __( 'Project Details & Links', 'sakbaddy' ),
        'sakbaddy_project_meta_callback',
        'project',
        'normal',
        'high'
    );

    // Testimonial Details Meta Box
    add_meta_box(
        'sakbaddy_testimonial_meta',
        __( 'Testimonial Author Details', 'sakbaddy' ),
        'sakbaddy_testimonial_meta_callback',
        'testimonial',
        'normal',
        'high'
    );

    // Skill Percentage Meta Box
    add_meta_box(
        'sakbaddy_skill_meta',
        __( 'Skill Level & Percentage', 'sakbaddy' ),
        'sakbaddy_skill_meta_callback',
        'skill',
        'normal',
        'high'
    );

    // Education Details Meta Box
    add_meta_box(
        'sakbaddy_education_meta',
        __( 'Education Details', 'sakbaddy' ),
        'sakbaddy_education_meta_callback',
        'education',
        'normal',
        'high'
    );
}
add_action( 'add_meta_boxes', 'sakbaddy_add_meta_boxes' );


// Project Meta Box Callback
function sakbaddy_project_meta_callback( $post ) {
    wp_nonce_field( 'sakbaddy_save_project_meta', 'sakbaddy_project_nonce' );

    $subtitle = get_post_meta( $post->ID, '_sakbaddy_project_subtitle', true );
    $url      = get_post_meta( $post->ID, '_sakbaddy_project_url', true );
    $github   = get_post_meta( $post->ID, '_sakbaddy_project_github', true );
    $tech     = get_post_meta( $post->ID, '_sakbaddy_project_tech', true );
    ?>
    <p>
        <label for="sakbaddy_project_subtitle"><strong><?php esc_html_e( 'Display Category / Subtitle:', 'sakbaddy' ); ?></strong></label><br>
        <input type="text" id="sakbaddy_project_subtitle" name="sakbaddy_project_subtitle" value="<?php echo esc_attr( $subtitle ); ?>" class="widefat" placeholder="e.g. Fashion / Photography">
    </p>
    <p>
        <label for="sakbaddy_project_url"><strong><?php esc_html_e( 'Live Project URL:', 'sakbaddy' ); ?></strong></label><br>
        <input type="url" id="sakbaddy_project_url" name="sakbaddy_project_url" value="<?php echo esc_url( $url ); ?>" class="widefat" placeholder="https://example.com">
    </p>
    <p>
        <label for="sakbaddy_project_github"><strong><?php esc_html_e( 'GitHub Repository URL:', 'sakbaddy' ); ?></strong></label><br>
        <input type="url" id="sakbaddy_project_github" name="sakbaddy_project_github" value="<?php echo esc_url( $github ); ?>" class="widefat" placeholder="https://github.com/username/project">
    </p>
    <p>
        <label for="sakbaddy_project_tech"><strong><?php esc_html_e( 'Technologies Used:', 'sakbaddy' ); ?></strong></label><br>
        <input type="text" id="sakbaddy_project_tech" name="sakbaddy_project_tech" value="<?php echo esc_attr( $tech ); ?>" class="widefat" placeholder="e.g. React, Node.js, Tailwind">
    </p>
    <?php
}


// Testimonial Meta Box Callback
function sakbaddy_testimonial_meta_callback( $post ) {
    wp_nonce_field( 'sakbaddy_save_testimonial_meta', 'sakbaddy_testimonial_nonce' );

    $role   = get_post_meta( $post->ID, '_sakbaddy_testimonial_role', true );
    $rating = get_post_meta( $post->ID, '_sakbaddy_testimonial_rating', true );
    if ( ! $rating ) $rating = '5';
    ?>
    <p>
        <label for="sakbaddy_testimonial_role"><strong><?php esc_html_e( 'Person Role / Designation:', 'sakbaddy' ); ?></strong></label><br>
        <input type="text" id="sakbaddy_testimonial_role" name="sakbaddy_testimonial_role" value="<?php echo esc_attr( $role ); ?>" class="widefat" placeholder="e.g. CEO at ib-themes">
    </p>
    <p>
        <label for="sakbaddy_testimonial_rating"><strong><?php esc_html_e( 'Star Rating (1 - 5):', 'sakbaddy' ); ?></strong></label><br>
        <select id="sakbaddy_testimonial_rating" name="sakbaddy_testimonial_rating">
            <?php for ( $i = 5; $i >= 1; $i-- ) : ?>
                <option value="<?php echo esc_attr( $i ); ?>" <?php selected( $rating, (string) $i ); ?>><?php echo esc_html( $i ); ?> Stars</option>
            <?php endfor; ?>
        </select>
    </p>
    <?php
}


// Skill Meta Box Callback
function sakbaddy_skill_meta_callback( $post ) {
    wp_nonce_field( 'sakbaddy_save_skill_meta', 'sakbaddy_skill_nonce' );

    $percent = get_post_meta( $post->ID, '_sakbaddy_skill_percent', true );
    if ( $percent === '' ) $percent = '85';
    ?>
    <p>
        <label for="sakbaddy_skill_percent"><strong><?php esc_html_e( 'Proficiency Percentage (0 - 100):', 'sakbaddy' ); ?></strong></label><br>
        <input type="number" id="sakbaddy_skill_percent" name="sakbaddy_skill_percent" value="<?php echo esc_attr( $percent ); ?>" min="0" max="100" style="width:100px;"> %
    </p>
    <?php
}


// Education Meta Box Callback
function sakbaddy_education_meta_callback( $post ) {
    wp_nonce_field( 'sakbaddy_save_education_meta', 'sakbaddy_education_nonce' );

    $years  = get_post_meta( $post->ID, '_sakbaddy_edu_years', true );
    $school = get_post_meta( $post->ID, '_sakbaddy_edu_school', true );
    ?>
    <p>
        <label for="sakbaddy_edu_years"><strong><?php esc_html_e( 'Year Range:', 'sakbaddy' ); ?></strong></label><br>
        <input type="text" id="sakbaddy_edu_years" name="sakbaddy_edu_years" value="<?php echo esc_attr( $years ); ?>" class="widefat" placeholder="e.g. 2018-2020">
    </p>
    <p>
        <label for="sakbaddy_edu_school"><strong><?php esc_html_e( 'School / University / Institute:', 'sakbaddy' ); ?></strong></label><br>
        <input type="text" id="sakbaddy_edu_school" name="sakbaddy_edu_school" value="<?php echo esc_attr( $school ); ?>" class="widefat" placeholder="e.g. University Of Evil Doing">
    </p>
    <?php
}


// Save Meta Data
function sakbaddy_save_post_meta( $post_id ) {
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;
    if ( ! current_user_can( 'edit_post', $post_id ) ) return;

    // Save Project Meta
    if ( isset( $_POST['sakbaddy_project_nonce'] ) && wp_verify_nonce( $_POST['sakbaddy_project_nonce'], 'sakbaddy_save_project_meta' ) ) {
        if ( isset( $_POST['sakbaddy_project_subtitle'] ) ) {
            update_post_meta( $post_id, '_sakbaddy_project_subtitle', sanitize_text_field( $_POST['sakbaddy_project_subtitle'] ) );
        }
        if ( isset( $_POST['sakbaddy_project_url'] ) ) {
            update_post_meta( $post_id, '_sakbaddy_project_url', esc_url_raw( $_POST['sakbaddy_project_url'] ) );
        }
        if ( isset( $_POST['sakbaddy_project_github'] ) ) {
            update_post_meta( $post_id, '_sakbaddy_project_github', esc_url_raw( $_POST['sakbaddy_project_github'] ) );
        }
        if ( isset( $_POST['sakbaddy_project_tech'] ) ) {
            update_post_meta( $post_id, '_sakbaddy_project_tech', sanitize_text_field( $_POST['sakbaddy_project_tech'] ) );
        }
    }

    // Save Testimonial Meta
    if ( isset( $_POST['sakbaddy_testimonial_nonce'] ) && wp_verify_nonce( $_POST['sakbaddy_testimonial_nonce'], 'sakbaddy_save_testimonial_meta' ) ) {
        if ( isset( $_POST['sakbaddy_testimonial_role'] ) ) {
            update_post_meta( $post_id, '_sakbaddy_testimonial_role', sanitize_text_field( $_POST['sakbaddy_testimonial_role'] ) );
        }
        if ( isset( $_POST['sakbaddy_testimonial_rating'] ) ) {
            update_post_meta( $post_id, '_sakbaddy_testimonial_rating', absint( $_POST['sakbaddy_testimonial_rating'] ) );
        }
    }

    // Save Skill Meta
    if ( isset( $_POST['sakbaddy_skill_nonce'] ) && wp_verify_nonce( $_POST['sakbaddy_skill_nonce'], 'sakbaddy_save_skill_meta' ) ) {
        if ( isset( $_POST['sakbaddy_skill_percent'] ) ) {
            $val = min( 100, max( 0, absint( $_POST['sakbaddy_skill_percent'] ) ) );
            update_post_meta( $post_id, '_sakbaddy_skill_percent', $val );
        }
    }

    // Save Education Meta
    if ( isset( $_POST['sakbaddy_education_nonce'] ) && wp_verify_nonce( $_POST['sakbaddy_education_nonce'], 'sakbaddy_save_education_meta' ) ) {
        if ( isset( $_POST['sakbaddy_edu_years'] ) ) {
            update_post_meta( $post_id, '_sakbaddy_edu_years', sanitize_text_field( $_POST['sakbaddy_edu_years'] ) );
        }
        if ( isset( $_POST['sakbaddy_edu_school'] ) ) {
            update_post_meta( $post_id, '_sakbaddy_edu_school', sanitize_text_field( $_POST['sakbaddy_edu_school'] ) );
        }
    }
}
add_action( 'save_post', 'sakbaddy_save_post_meta' );
