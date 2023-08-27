<?php

function health_care_hospital_remove_customize_register() {
    global $wp_customize;
    $wp_customize->remove_section( 'online_pharmacy_color_option' );

    $wp_customize->remove_setting( 'online_pharmacy_footer_widget_image' );
    $wp_customize->remove_control( 'online_pharmacy_footer_widget_image' );
}
add_action( 'customize_register', 'health_care_hospital_remove_customize_register', 11 );

function health_care_hospital_customize_register( $wp_customize ) {

    // About Product
    $wp_customize->add_section('health_care_hospital_about_section',array(
        'title' => __('About Product Settings','health-care-hospital'),
        'priority'  => 7,
        'panel' => 'online_pharmacy_panel_id'
    ));

    $wp_customize->add_setting('health_care_hospital_about_title',array(
        'default'=> '',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('health_care_hospital_about_title',array(
        'label' => __('Title','health-care-hospital'),
        'section'=> 'health_care_hospital_about_section',
        'type'=> 'text'
    ));

    $wp_customize->add_setting('health_care_hospital_about_sub_title',array(
        'default'=> '',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('health_care_hospital_about_sub_title',array(
        'label' => __('Sub Title','health-care-hospital'),
        'section'=> 'health_care_hospital_about_section',
        'type'=> 'text'
    ));

    $wp_customize->add_setting('health_care_hospital_about_text',array(
        'default'=> '',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('health_care_hospital_about_text',array(
        'label' => __('Text','health-care-hospital'),
        'section'=> 'health_care_hospital_about_section',
        'type'=> 'text'
    ));

    $wp_customize->add_setting('health_care_hospital_about_btn_text',array(
        'default'=> '',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('health_care_hospital_about_btn_text',array(
        'label' => __('Button Text','health-care-hospital'),
        'section'=> 'health_care_hospital_about_section',
        'type'=> 'text'
    ));

    $wp_customize->add_setting('health_care_hospital_about_btn_url',array(
        'default'=> '',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('health_care_hospital_about_btn_url',array(
        'label' => __('Button URL','health-care-hospital'),
        'section'=> 'health_care_hospital_about_section',
        'type'=> 'text'
    ));

    $online_pharmacy_args = array(
        'type'                     => 'product',
        'child_of'                 => 0,
        'parent'                   => '',
        'orderby'                  => 'term_group',
        'order'                    => 'ASC',
        'hide_empty'               => false,
        'hierarchical'             => 1,
        'number'                   => '',
        'taxonomy'                 => 'product_cat',
        'pad_counts'               => false
    );
    $categories = get_categories($online_pharmacy_args);
    $cat_posts = array();
    $m = 0;
    $cat_posts[]='Select';
    foreach($categories as $category){
    if($m==0){
        $default = $category->slug;
            $m++;
        }
        $cat_posts[$category->slug] = $category->name;
    }

    $wp_customize->add_setting('health_care_hospital_best_product_category',array(
        'default'   => 'select',
        'sanitize_callback' => 'health_care_hospital_sanitize_select',
    ));
    $wp_customize->add_control('health_care_hospital_best_product_category',array(
        'type'    => 'select',
        'choices' => $cat_posts,
        'label' => __('Select category to display products ','health-care-hospital'),
        'section' => 'health_care_hospital_about_section',
    ));
}
add_action( 'customize_register', 'health_care_hospital_customize_register' );
