<?php
/**
 * Template part: Education & Skills Section
 *
 * @package Sakbaddy
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

$section_tag = get_theme_mod( 'sakbaddy_skills_tag', 'Education & Skills' );

// 1. Query Education Items
$edu_query = new WP_Query( array(
    'post_type'      => 'education',
    'posts_per_page' => 10,
    'orderby'        => 'menu_order',
    'order'          => 'ASC',
) );

$edu_items = array();
if ( $edu_query->have_posts() ) {
    while ( $edu_query->have_posts() ) {
        $edu_query->the_post();
        $edu_items[] = array(
            'years'  => get_post_meta( get_the_ID(), '_sakbaddy_edu_years', true ),
            'title'  => get_the_title(),
            'school' => get_post_meta( get_the_ID(), '_sakbaddy_edu_school', true ),
        );
    }
    wp_reset_postdata();
} else {
    // Fallback default education items
    $edu_items = array(
        array( 'years' => '2018-2020', 'title' => 'Ph.D in Horriblensess', 'school' => 'University Of Evil Doing' ),
        array( 'years' => '2013-2016', 'title' => 'Bsc. in Computer Science', 'school' => 'World University' ),
        array( 'years' => '2010-2012', 'title' => 'Graphic Artist Training', 'school' => 'Graphic Master Institute' ),
    );
}

// 2. Query Skill Items
$skill_query = new WP_Query( array(
    'post_type'      => 'skill',
    'posts_per_page' => 12,
    'orderby'        => 'menu_order',
    'order'          => 'ASC',
) );

$skills_list = array();
if ( $skill_query->have_posts() ) {
    while ( $skill_query->have_posts() ) {
        $skill_query->the_post();
        $percent = get_post_meta( get_the_ID(), '_sakbaddy_skill_percent', true );
        if ( $percent === '' ) $percent = '85';
        $skills_list[] = array(
            'name'    => get_the_title(),
            'percent' => $percent,
        );
    }
    wp_reset_postdata();
} else {
    // Fallback default skills
    $skills_list = array(
        array( 'name' => 'HTML5', 'percent' => 92 ),
        array( 'name' => 'React JS', 'percent' => 85 ),
        array( 'name' => 'Vue Js', 'percent' => 90 ),
        array( 'name' => 'Ui/Ux', 'percent' => 88 ),
    );
}
?>
<section class="skills-section" id="resume">
    <div class="skills-container">
        <?php if ( ! empty( $section_tag ) ) : ?>
            <div class="section-tag skills-tag"><?php echo esc_html( $section_tag ); ?></div>
        <?php endif; ?>

        <div class="skills-grid">
            <!-- Education Column -->
            <div class="edu-card">
                <?php foreach ( $edu_items as $edu ) : ?>
                    <div class="edu-item">
                        <?php if ( ! empty( $edu['years'] ) ) : ?>
                            <span class="edu-year"><?php echo esc_html( $edu['years'] ); ?></span>
                        <?php endif; ?>
                        <h4 class="edu-title"><?php echo esc_html( $edu['title'] ); ?></h4>
                        <?php if ( ! empty( $edu['school'] ) ) : ?>
                            <p class="edu-school"><?php echo esc_html( $edu['school'] ); ?></p>
                        <?php endif; ?>
                    </div>
                <?php endforeach; ?>
            </div>

            <!-- Skills List Column -->
            <div class="skills-list">
                <?php foreach ( $skills_list as $skill ) : ?>
                    <div class="skill-row">
                        <div class="skill-percent" data-value="<?php echo esc_attr( $skill['percent'] ); ?>"><?php echo esc_html( $skill['percent'] ); ?>%</div>
                        <div class="skill-content">
                            <span class="skill-name"><?php echo esc_html( $skill['name'] ); ?></span>
                            <div class="skill-track">
                                <div class="skill-bar" style="width: <?php echo esc_attr( $skill['percent'] ); ?>%;"></div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>
