<?php
/**
 * Dental Insight: Customizer
 *
 * @subpackage Dental Insight
 * @since 1.0
 */

function dental_insight_customize_register( $wp_customize ) {

	wp_enqueue_style('customizercustom_css', esc_url( get_template_directory_uri() ). '/assets/css/customizer.css');

	// fontawesome icon-picker

	load_template( trailingslashit( get_template_directory() ) . '/inc/icon-picker.php' );


	// Add custom control.
  	require get_parent_theme_file_path( 'inc/customize/customize_toggle.php' );

	require get_parent_theme_file_path( 'inc/switch/control_switch.php' );

	require get_parent_theme_file_path( 'inc/custom-control.php' );
	
	// Register the custom control type.
	$wp_customize->register_control_type( 'Dental_Insight_Toggle_Control' );

	$wp_customize->add_section( 'dental_insight_typography_settings', array(
		'title'       => __( 'Typography', 'dental-insight' ),
		'priority'       => 2,
	) );

	$font_choices = array(
			'' => 'Select',
			'Source Sans Pro:400,700,400italic,700italic' => 'Source Sans Pro',
			'Open Sans:400italic,700italic,400,700' => 'Open Sans',
			'Oswald:400,700' => 'Oswald',
			'Playfair Display:400,700,400italic' => 'Playfair Display',
			'Montserrat:400,700' => 'Montserrat',
			'Raleway:400,700' => 'Raleway',
			'Droid Sans:400,700' => 'Droid Sans',
			'Lato:400,700,400italic,700italic' => 'Lato',
			'Arvo:400,700,400italic,700italic' => 'Arvo',
			'Lora:400,700,400italic,700italic' => 'Lora',
			'Merriweather:400,300italic,300,400italic,700,700italic' => 'Merriweather',
			'Oxygen:400,300,700' => 'Oxygen',
			'PT Serif:400,700' => 'PT Serif',
			'PT Sans:400,700,400italic,700italic' => 'PT Sans',
			'PT Sans Narrow:400,700' => 'PT Sans Narrow',
			'Cabin:400,700,400italic' => 'Cabin',
			'Fjalla One:400' => 'Fjalla One',
			'Francois One:400' => 'Francois One',
			'Josefin Sans:400,300,600,700' => 'Josefin Sans',
			'Libre Baskerville:400,400italic,700' => 'Libre Baskerville',
			'Arimo:400,700,400italic,700italic' => 'Arimo',
			'Ubuntu:400,700,400italic,700italic' => 'Ubuntu',
			'Bitter:400,700,400italic' => 'Bitter',
			'Droid Serif:400,700,400italic,700italic' => 'Droid Serif',
			'Roboto:400,400italic,700,700italic' => 'Roboto',
			'Open Sans Condensed:700,300italic,300' => 'Open Sans Condensed',
			'Roboto Condensed:400italic,700italic,400,700' => 'Roboto Condensed',
			'Roboto Slab:400,700' => 'Roboto Slab',
			'Yanone Kaffeesatz:400,700' => 'Yanone Kaffeesatz',
			'Rokkitt:400' => 'Rokkitt',
		);

	$wp_customize->add_setting( 'dental_insight_section_typo_heading', array(
			'default'           => '',
			'transport'         => 'refresh',
			'sanitize_callback' => 'sanitize_text_field',
		) );
		$wp_customize->add_control( new Dental_Insight_Customizer_Customcontrol_Section( $wp_customize, 'dental_insight_section_typo_heading', array(
			'label'       => esc_html__( 'Typography Setting', 'dental-insight' ),
			'section'     => 'dental_insight_typography_settings',
			'settings'    => 'dental_insight_section_typo_heading',
		) ) );

	$wp_customize->add_setting( 'dental_insight_headings_text', array(
		'sanitize_callback' => 'dental_insight_sanitize_fonts',
	));

	$wp_customize->add_control( 'dental_insight_headings_text', array(
		'type' => 'select',
		'description' => __('Select your suitable font for the headings.', 'dental-insight'),
		'section' => 'dental_insight_typography_settings',
		'choices' => $font_choices

	));

	$wp_customize->add_setting( 'dental_insight_body_text', array(
		'sanitize_callback' => 'dental_insight_sanitize_fonts'
	));

	$wp_customize->add_control( 'dental_insight_body_text', array(
		'type' => 'select',
		'description' => __( 'Select your suitable font for the body.', 'dental-insight' ),
		'section' => 'dental_insight_typography_settings',
		'choices' => $font_choices
	) );

 	$wp_customize->add_section('dental_insight_pro', array(
        'title'    => __('UPGRADE DENTAL PREMIUM', 'dental-insight'),
        'priority' => 1,
    ));

    $wp_customize->add_setting('dental_insight_pro', array(
        'default'           => null,
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control(new Dental_Insight_Pro_Control($wp_customize, 'dental_insight_pro', array(
        'label'    => __('DENTAL PREMIUM', 'dental-insight'),
        'section'  => 'dental_insight_pro',
        'settings' => 'dental_insight_pro',
        'priority' => 1,
    )));

    //Logo
    $wp_customize->add_setting('dental_insight_logo_max_height',array(
		'default'=> '',
		'transport' => 'refresh',
		'sanitize_callback' => 'dental_insight_sanitize_integer'
	));
	$wp_customize->add_control(new Dental_Insight_Slider_Custom_Control( $wp_customize, 'dental_insight_logo_max_height',array(
		'label'	=> esc_html__('Logo Width','dental-insight'),
		'section'=> 'title_tagline',
		'settings'=>'dental_insight_logo_max_height',
		'input_attrs' => array(
            'step'             => 1,
			'min'              => 0,
			'max'              => 100,
        ),
	)));

	$wp_customize->add_setting('dental_insight_logo_title',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '1',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'dental_insight_callback_sanitize_switch',
		)
	);
	$wp_customize->add_control(new Dental_Insight_Customizer_Customcontrol_Switch(
			$wp_customize,
			'dental_insight_logo_title',
			array(
				'settings'        => 'dental_insight_logo_title',
				'section'         => 'title_tagline',
				'label'           => __( 'Show Site Title', 'dental-insight' ),				
				'choices'		  => array(
					'1'      => __( 'On', 'dental-insight' ),
					'off'    => __( 'Off', 'dental-insight' ),
				),
				'active_callback' => '',
			)
		)
	);

	$wp_customize->add_setting('dental_insight_logo_text',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '1',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'dental_insight_callback_sanitize_switch',
		)
	);
	$wp_customize->add_control(new Dental_Insight_Customizer_Customcontrol_Switch(
			$wp_customize,
			'dental_insight_logo_text',
			array(
				'settings'        => 'dental_insight_logo_text',
				'section'         => 'title_tagline',
				'label'           => __( 'Show Site Tagline', 'dental-insight' ),				
				'choices'		  => array(
					'1'      => __( 'On', 'dental-insight' ),
					'off'    => __( 'Off', 'dental-insight' ),
				),
				'active_callback' => '',
			)
		)
	);

    // Theme General Settings
    $wp_customize->add_section('dental_insight_theme_settings',array(
        'title' => __('Theme General Settings', 'dental-insight'),
        'priority' => 2
    ) );

    $wp_customize->add_setting(
		'dental_insight_sticky_header',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '1',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'dental_insight_callback_sanitize_switch',
		)
	);
	$wp_customize->add_control(
		new Dental_Insight_Customizer_Customcontrol_Switch(
			$wp_customize,
			'dental_insight_sticky_header',
			array(
				'settings'        => 'dental_insight_sticky_header',
				'section'         => 'dental_insight_theme_settings',
				'label'           => __( 'Show Sticky Header', 'dental-insight' ),				
				'choices'		  => array(
					'1'      => __( 'On', 'dental-insight' ),
					'off'    => __( 'Off', 'dental-insight' ),
				),
				'active_callback' => '',
			)
		)
	);

	$wp_customize->add_setting(
		'dental_insight_theme_loader',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '1',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'dental_insight_callback_sanitize_switch',
		)
	);
	$wp_customize->add_control(
		new Dental_Insight_Customizer_Customcontrol_Switch(
			$wp_customize,
			'dental_insight_theme_loader',
			array(
				'settings'        => 'dental_insight_theme_loader',
				'section'         => 'dental_insight_theme_settings',
				'label'           => __( 'Show Site Loader', 'dental-insight' ),				
				'choices'		  => array(
					'1'      => __( 'On', 'dental-insight' ),
					'off'    => __( 'Off', 'dental-insight' ),
				),
				'active_callback' => '',
			)
		)
	);

	$wp_customize->add_setting('dental_insight_menu_text_transform',array(
        'default' => 'CAPITALISE',
        'sanitize_callback' => 'dental_insight_sanitize_choices'
	));
	$wp_customize->add_control('dental_insight_menu_text_transform',array(
        'type' => 'select',
        'label' => __('Menus Text Transform','dental-insight'),
        'section' => 'dental_insight_theme_settings',
        'choices' => array(
            'CAPITALISE' => __('CAPITALISE','dental-insight'),
            'UPPERCASE' => __('UPPERCASE','dental-insight'),
            'LOWERCASE' => __('LOWERCASE','dental-insight'),
        ),
	) );

	$wp_customize->add_setting( 'dental_insight_section_scroll_heading', array(
		'default'           => '',
		'transport'         => 'refresh',
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( new Dental_Insight_Customizer_Customcontrol_Section( $wp_customize, 'dental_insight_section_scroll_heading', array(
		'label'       => esc_html__( 'Scroll Top Setting', 'dental-insight' ),
		'section'     => 'dental_insight_theme_settings',
		'settings'    => 'dental_insight_section_scroll_heading',
	) ) );

	$wp_customize->add_setting(
		'dental_insight_scroll_enable',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => 'off',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'dental_insight_callback_sanitize_switch',
		)
	);
	$wp_customize->add_control(
		new Dental_Insight_Customizer_Customcontrol_Switch(
			$wp_customize,
			'dental_insight_scroll_enable',
			array(
				'settings'        => 'dental_insight_scroll_enable',
				'section'         => 'dental_insight_theme_settings',
				'label'           => __( 'Hide Scroll Top', 'dental-insight' ),				
				'choices'		  => array(
					'1'      => __( 'On', 'dental-insight' ),
					'off'    => __( 'Off', 'dental-insight' ),
				),
				'active_callback' => '',
			)
		)
	);

	$wp_customize->add_setting('dental_insight_scroll_options',array(
        'default' => 'right_align',
        'sanitize_callback' => 'dental_insight_sanitize_choices'
	));
	$wp_customize->add_control('dental_insight_scroll_options',array(
        'type' => 'select',
        'label' => __('Scroll Top Alignment','dental-insight'),
        'section' => 'dental_insight_theme_settings',
        'choices' => array(
            'right_align' => __('Right Align','dental-insight'),
            'center_align' => __('Center Align','dental-insight'),
            'left_align' => __('Left Align','dental-insight'),
        ),
	) );

	$wp_customize->add_setting('dental_insight_scroll_top_icon',array(
		'default'	=> 'fas fa-chevron-up',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new Dental_Insight_Fontawesome_Icon_Chooser(
        $wp_customize,'dental_insight_scroll_top_icon',array(
		'label'	=> __('Add Scroll Top Icon','dental-insight'),
		'transport' => 'refresh',
		'section'	=> 'dental_insight_theme_settings',
		'setting'	=> 'dental_insight_scroll_top_icon',
		'type'		=> 'icon'
	)));	

	$wp_customize->add_setting( 'dental_insight_section_shoppage_heading', array(
		'default'           => '',
		'transport'         => 'refresh',
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( new Dental_Insight_Customizer_Customcontrol_Section( $wp_customize, 'dental_insight_section_shoppage_heading', array(
		'label'       => esc_html__( 'Shop Page Setting', 'dental-insight' ),
		'section'     => 'dental_insight_theme_settings',
		'settings'    => 'dental_insight_section_shoppage_heading',
	) ) );


	$wp_customize->add_setting(
		'dental_insight_shop_page_sidebar',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => 'off',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'dental_insight_callback_sanitize_switch',
		)
	);
	$wp_customize->add_control(
		new Dental_Insight_Customizer_Customcontrol_Switch(
			$wp_customize,
			'dental_insight_shop_page_sidebar',
			array(
				'settings'        => 'dental_insight_shop_page_sidebar',
				'section'         => 'dental_insight_theme_settings',
				'label'           => __( 'Hide Shop Page Sidebar', 'dental-insight' ),				
				'choices'		  => array(
					'1'      => __( 'On', 'dental-insight' ),
					'off'    => __( 'Off', 'dental-insight' ),
				),
				'active_callback' => '',
			)
		)
	);

	$wp_customize->add_setting(
		'dental_insight_wocommerce_single_page_sidebar',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => 'off',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'dental_insight_callback_sanitize_switch',
		)
	);
	$wp_customize->add_control(
		new Dental_Insight_Customizer_Customcontrol_Switch(
			$wp_customize,
			'dental_insight_wocommerce_single_page_sidebar',
			array(
				'settings'        => 'dental_insight_wocommerce_single_page_sidebar',
				'section'         => 'dental_insight_theme_settings',
				'label'           => __( 'Hide Single Product Page Sidebar', 'dental-insight' ),				
				'choices'		  => array(
					'1'      => __( 'On', 'dental-insight' ),
					'off'    => __( 'Off', 'dental-insight' ),
				),
				'active_callback' => '',
			)
		)
	);

	//theme width

	$wp_customize->add_section('dental_insight_theme_width_settings',array(
        'title' => __('Theme Width Option', 'dental-insight'),
        'priority' => 2,
    ) );

	$wp_customize->add_setting('dental_insight_width_options',array(
        'default' => 'full_width',
        'sanitize_callback' => 'dental_insight_sanitize_choices'
	));
	$wp_customize->add_control('dental_insight_width_options',array(
        'type' => 'select',
        'label' => __('Theme Width Option','dental-insight'),
        'section' => 'dental_insight_theme_width_settings',
        'choices' => array(
            'full_width' => __('Fullwidth','dental-insight'),
            'container' => __('Container','dental-insight'),
            'container_fluid' => __('Container Fluid','dental-insight'),
        ),
	) );
	//button
	$wp_customize->add_section('dental_insight_button_options',array(
        'title' => __('Button settings', 'dental-insight'),
        'priority' => 2,
    ) );
    $wp_customize->add_setting( 'dental_insight_theme_button_color', array(
	    'default' => '',
	    'sanitize_callback' => 'sanitize_hex_color'
  	));
  	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'dental_insight_theme_button_color', array(
	    'description' => __('It will change the complete theme  Buttton color in one click.', 'dental-insight'),
	    'section' => 'dental_insight_button_options',
	    'settings' => 'dental_insight_theme_button_color',
  	)));

	$wp_customize->add_setting('dental_insight_button_border_radius',array(
		'default'=> 30,
		'transport' => 'refresh',
		'sanitize_callback' => 'dental_insight_sanitize_integer'
	));
	$wp_customize->add_control(new Dental_Insight_Slider_Custom_Control( $wp_customize, 'dental_insight_button_border_radius',array(
		'label' => esc_html__( 'Border Radius','dental-insight' ),
		'section'=> 'dental_insight_button_options',
		'settings'=>'dental_insight_button_border_radius',
		'input_attrs' => array(
            'step'             => 1,
			'min'              => 0,
			'max'              => 50,
        ),
	)));
	// Post Layouts
    $wp_customize->add_section('dental_insight_layout',array(
        'title' => __('Post Layout', 'dental-insight'),
        'priority' => 2
    ) );

    $wp_customize->add_setting( 'dental_insight_section_post_heading', array(
		'default'           => '',
		'transport'         => 'refresh',
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( new Dental_Insight_Customizer_Customcontrol_Section( $wp_customize, 'dental_insight_section_post_heading', array(
		'label'       => esc_html__( 'Post Structure', 'dental-insight' ),
		 'description' => __( 'Change the post layout from below options', 'dental-insight' ),
		'section'     => 'dental_insight_layout',
		'settings'    => 'dental_insight_section_post_heading',
	) ) );

	

	$wp_customize->add_setting(
		'dental_insight_single_post_sidebar',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'dental_insight_callback_sanitize_switch',
		)
	);
	$wp_customize->add_control(
		new Dental_Insight_Customizer_Customcontrol_Switch(
			$wp_customize,
			'dental_insight_single_post_sidebar',
			array(
				'settings'        => 'dental_insight_single_post_sidebar',
				'section'         => 'dental_insight_layout',
				'label'           => __( 'Show Single Post Fullwidth', 'dental-insight' ),				
				'choices'		  => array(
					'1'      => __( 'On', 'dental-insight' ),
					'off'    => __( 'Off', 'dental-insight' ),
				),
				'active_callback' => '',
			)
		)
	);

    $wp_customize->add_setting( 'dental_insight_post_option',
			array(
				'default' => 'two_column',
				'transport' => 'refresh',
				'sanitize_callback' => 'sanitize_text_field'
			)
		);
		$wp_customize->add_control( new Dental_Insight_Radio_Image_Control( $wp_customize, 'dental_insight_post_option',
			array(
				'type'=>'select',
				'label' => __( 'select Post Page Layout', 'dental-insight' ),
				'section' => 'dental_insight_layout',
				'choices' => array(
					'one_column' => array(
						'image' => get_template_directory_uri().'/assets/images/1column.jpg',
						'name' => __( 'One Column', 'dental-insight' )
					),
					'two_column' => array(
						'image' => get_template_directory_uri().'/assets/images/2column.jpg',
						'name' => __( 'Two Column', 'dental-insight' )
					),
					'three_column' => array(
						'image' => get_template_directory_uri().'/assets/images/3column.jpg',
						'name' => __( 'Three Column', 'dental-insight' )
					),
					'four_column' => array(
						'image' => get_template_directory_uri().'/assets/images/4column.jpg',
						'name' => __( 'Four Column', 'dental-insight' )
					),
					'grid_sidebar' => array(
						'image' => get_template_directory_uri().'/assets/images/grid-sidebar.jpg',
						'name' => __( 'Grid-Sidebar Layout', 'dental-insight' )
					),
					'grid_post' => array(
						'image' => get_template_directory_uri().'/assets/images/grid.jpg',
						'name' => __( 'Grid Layout', 'dental-insight' )
					)
				)
			)
		) );

    $wp_customize->add_setting('dental_insight_grid_column',array(
		'default' => '3_column',
		'sanitize_callback' => 'dental_insight_sanitize_select'
	));
	$wp_customize->add_control('dental_insight_grid_column',array(
		'label' => esc_html__('Grid Post Per Row','dental-insight'),
		'section' => 'dental_insight_layout',
		'setting' => 'dental_insight_grid_column',
		'type' => 'radio',
        'choices' => array(
            '1_column' => __('1','dental-insight'),
            '2_column' => __('2','dental-insight'),
            '3_column' => __('3','dental-insight'),
            '4_column' => __('4','dental-insight'),
            '5_column' => __('6','dental-insight'),
        ),
	));

	$wp_customize->add_setting('dental_insight_date',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => 'off',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'dental_insight_callback_sanitize_switch',
		)
	);
	$wp_customize->add_control(new Dental_Insight_Customizer_Customcontrol_Switch(
			$wp_customize,
			'dental_insight_date',
			array(
				'settings'        => 'dental_insight_date',
				'section'         => 'dental_insight_layout',
				'label'           => __( 'Hide Date', 'dental-insight' ),				
				'choices'		  => array(
					'1'      => __( 'On', 'dental-insight' ),
					'off'    => __( 'Off', 'dental-insight' ),
				),
				'active_callback' => '',
			)
		)
	);

	$wp_customize->selective_refresh->add_partial( 'dental_insight_date', array(
		'selector' => '.date-box',
		'render_callback' => 'dental_insight_customize_partial_dental_insight_date',
	) );

	$wp_customize->add_setting('dental_insight_admin',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => 'off',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'dental_insight_callback_sanitize_switch',
		)
	);
	$wp_customize->add_control(new Dental_Insight_Customizer_Customcontrol_Switch(
			$wp_customize,
			'dental_insight_admin',
			array(
				'settings'        => 'dental_insight_admin',
				'section'         => 'dental_insight_layout',
				'label'           => __( 'Hide Author/Admin', 'dental-insight' ),				
				'choices'		  => array(
					'1'      => __( 'On', 'dental-insight' ),
					'off'    => __( 'Off', 'dental-insight' ),
				),
				'active_callback' => '',
			)
		)
	);

	$wp_customize->selective_refresh->add_partial( 'dental_insight_admin', array(
		'selector' => '.entry-author',
		'render_callback' => 'dental_insight_customize_partial_dental_insight_admin',
	) );

	$wp_customize->add_setting('dental_insight_comment',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => 'off',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'dental_insight_callback_sanitize_switch',
		)
	);
	$wp_customize->add_control(new Dental_Insight_Customizer_Customcontrol_Switch(
			$wp_customize,
			'dental_insight_comment',
			array(
				'settings'        => 'dental_insight_comment',
				'section'         => 'dental_insight_layout',
				'label'           => __( 'Hide Comment', 'dental-insight' ),				
				'choices'		  => array(
					'1'      => __( 'On', 'dental-insight' ),
					'off'    => __( 'Off', 'dental-insight' ),
				),
				'active_callback' => '',
			)
		)
	);

	$wp_customize->selective_refresh->add_partial( 'dental_insight_comment', array(
		'selector' => '.entry-comments',
		'render_callback' => 'dental_insight_customize_partial_dental_insight_comment',
	) );


	// Top Header
    $wp_customize->add_section('dental_insight_top',array(
        'title' => __('Contact info', 'dental-insight'),        
        'priority' => 2
    ) );

    $wp_customize->add_setting( 'dental_insight_section_contact_heading', array(
			'default'           => '',
			'transport'         => 'refresh',
			'sanitize_callback' => 'sanitize_text_field',
		) );
		$wp_customize->add_control( new Dental_Insight_Customizer_Customcontrol_Section( $wp_customize, 'dental_insight_section_contact_heading', array(
			'label'       => esc_html__( 'Contact Setting', 'dental-insight' ),	
			'description' => __( 'Add contact info in the below feilds', 'dental-insight' ),		
			'section'     => 'dental_insight_top',
			'settings'    => 'dental_insight_section_contact_heading',
		) ) );

		$wp_customize->add_setting(
		'dental_insight_topbar_enable',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => 'off',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'dental_insight_callback_sanitize_switch',
		)
	);
	$wp_customize->add_control(
		new Dental_Insight_Customizer_Customcontrol_Switch(
			$wp_customize,
			'dental_insight_topbar_enable',
			array(
				'settings'        => 'dental_insight_topbar_enable',
				'section'         => 'dental_insight_top',
				'label'           => __( 'Check to Hide contact info', 'dental-insight' ),				
				'choices'		  => array(
					'1'      => __( 'On', 'dental-insight' ),
					'off'    => __( 'Off', 'dental-insight' ),
				),
				'active_callback' => '',
			)
		)
	);

    $wp_customize->add_setting('dental_insight_find_us',array(
		'default' => '',
		'sanitize_callback' => 'sanitize_text_field'
	));
	$wp_customize->add_control('dental_insight_find_us',array(
		'label' => esc_html__('Add Text','dental-insight'),
		'section' => 'dental_insight_top',
		'setting' => 'dental_insight_find_us',
		'type'    => 'text',
		'active_callback' => 'dental_insight_topbar_dropdown'
	));

	$wp_customize->add_setting('dental_insight_find_us_url',array(
		'default' => '',
		'sanitize_callback' => 'esc_url_raw'
	));
	$wp_customize->add_control('dental_insight_find_us_url',array(
		'label' => esc_html__('Add URL','dental-insight'),
		'section' => 'dental_insight_top',
		'setting' => 'dental_insight_find_us_url',
		'type'    => 'url',
		'active_callback' => 'dental_insight_topbar_dropdown'
	));

    $wp_customize->add_setting('dental_insight_feedback',array(
		'default' => '',
		'sanitize_callback' => 'sanitize_text_field'
	));
	$wp_customize->add_control('dental_insight_feedback',array(
		'label' => esc_html__('Add Text 1','dental-insight'),
		'section' => 'dental_insight_top',
		'setting' => 'dental_insight_feedback',
		'type'    => 'text',
		'active_callback' => 'dental_insight_topbar_dropdown'
	));

	$wp_customize->add_setting('dental_insight_feedback_url',array(
		'default' => '',
		'sanitize_callback' => 'esc_url_raw'
	));
	$wp_customize->add_control('dental_insight_feedback_url',array(
		'label' => esc_html__('Add URL 1','dental-insight'),
		'section' => 'dental_insight_top',
		'setting' => 'dental_insight_feedback_url',
		'type'    => 'url',
		'active_callback' => 'dental_insight_topbar_dropdown'
	));

	$wp_customize->add_setting('dental_insight_email',array(
		'default' => '',
		'sanitize_callback' => 'sanitize_email'
	));
	$wp_customize->add_control('dental_insight_email',array(
		'label' => esc_html__('Add Email Address','dental-insight'),
		'section' => 'dental_insight_top',
		'setting' => 'dental_insight_email',
		'type'    => 'text',
		'active_callback' => 'dental_insight_topbar_dropdown'
	));
	$wp_customize->add_setting('dental_insight_email_icon',array(
		'default'	=> 'fas fa-envelope',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new Dental_Insight_Fontawesome_Icon_Chooser(
        $wp_customize,'dental_insight_email_icon',array(
		'label'	=> __('Add Email Icon','dental-insight'),
		'transport' => 'refresh',
		'section'	=> 'dental_insight_top',
		'setting'	=> 'dental_insight_email_icon',
		'type'		=> 'icon'
	)));
	$wp_customize->add_setting('dental_insight_call_text',array(
		'default' => '',
		'sanitize_callback' => 'sanitize_text_field'
	));
	$wp_customize->add_control('dental_insight_call_text',array(
		'label' => esc_html__('Add Text','dental-insight'),
		'section' => 'dental_insight_top',
		'setting' => 'dental_insight_call_text',
		'type'    => 'text',
		'active_callback' => 'dental_insight_topbar_dropdown'
	));

	$wp_customize->add_setting('dental_insight_call',array(
		'default' => '',
		'sanitize_callback' => 'dental_insight_sanitize_phone_number'
	));
	$wp_customize->add_control('dental_insight_call',array(
		'label' => esc_html__('Add Phone Number','dental-insight'),
		'section' => 'dental_insight_top',
		'setting' => 'dental_insight_call',
		'type'    => 'text',
		'active_callback' => 'dental_insight_topbar_dropdown'
	));

	$wp_customize->add_setting('dental_insight_call_icon',array(
		'default'	=> 'fas fa-phone',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new Dental_Insight_Fontawesome_Icon_Chooser(
        $wp_customize,'dental_insight_call_icon',array(
		'label'	=> __('Add  call Icon','dental-insight'),
		'transport' => 'refresh',
		'section'	=> 'dental_insight_top',
		'setting'	=> 'dental_insight_call_icon',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('dental_insight_timing_text',array(
		'default' => '',
		'sanitize_callback' => 'sanitize_text_field'
	));
	$wp_customize->add_control('dental_insight_timing_text',array(
		'label' => esc_html__('Add Text','dental-insight'),
		'section' => 'dental_insight_top',
		'setting' => 'dental_insight_timing_text',
		'type'    => 'text',
		'active_callback' => 'dental_insight_topbar_dropdown'
	));

	$wp_customize->add_setting('dental_insight_timing',array(
		'default' => '',
		'sanitize_callback' => 'sanitize_text_field'
	));
	$wp_customize->add_control('dental_insight_timing',array(
		'label' => esc_html__('Add Timing','dental-insight'),
		'section' => 'dental_insight_top',
		'setting' => 'dental_insight_timing',
		'type'    => 'text',
		'active_callback' => 'dental_insight_topbar_dropdown'
	));

	$wp_customize->add_setting('dental_insight_timing_icon',array(
		'default'	=> 'far fa-clock',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new Dental_Insight_Fontawesome_Icon_Chooser(
        $wp_customize,'dental_insight_timing_icon',array(
		'label'	=> __('Add  Clock Icon','dental-insight'),
		'transport' => 'refresh',
		'section'	=> 'dental_insight_top',
		'setting'	=> 'dental_insight_timing_icon',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('dental_insight_address_text',array(
		'default' => '',
		'sanitize_callback' => 'sanitize_text_field'
	));
	$wp_customize->add_control('dental_insight_address_text',array(
		'label' => esc_html__('Add Text','dental-insight'),
		'section' => 'dental_insight_top',
		'setting' => 'dental_insight_address_text',
		'type'    => 'text',
		'active_callback' => 'dental_insight_topbar_dropdown'
	));

	$wp_customize->add_setting('dental_insight_address',array(
		'default' => '',
		'sanitize_callback' => 'sanitize_text_field'
	));
	$wp_customize->add_control('dental_insight_address',array(
		'label' => esc_html__('Add Address','dental-insight'),
		'section' => 'dental_insight_top',
		'setting' => 'dental_insight_address',
		'type'    => 'text',
		'active_callback' => 'dental_insight_topbar_dropdown'
	));
	$wp_customize->add_setting('dental_insight_address_icon',array(
		'default'	=> 'fas fa-map-marker-alt',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new Dental_Insight_Fontawesome_Icon_Chooser(
        $wp_customize,'dental_insight_address_icon',array(
		'label'	=> __('Add Address Icon','dental-insight'),
		'transport' => 'refresh',
		'section'	=> 'dental_insight_top',
		'setting'	=> 'dental_insight_address_icon',
		'type'		=> 'icon'
	)));

	// Social Media
    $wp_customize->add_section('dental_insight_urls',array(
        'title' => __('Social Media', 'dental-insight'),        
        'priority' => 3
    ) );

    $wp_customize->add_setting( 'dental_insight_section_social_heading', array(
			'default'           => '',
			'transport'         => 'refresh',
			'sanitize_callback' => 'sanitize_text_field',
		) );
		$wp_customize->add_control( new Dental_Insight_Customizer_Customcontrol_Section( $wp_customize, 'dental_insight_section_social_heading', array(
			'label'       => esc_html__( 'Social Media Setting', 'dental-insight' ),
			'description' => __( 'Add social media links in the below feilds', 'dental-insight' ),			
			'section'     => 'dental_insight_urls',
			'settings'    => 'dental_insight_section_social_heading',
		) ) );

	$wp_customize->add_setting(
		'dental_insight_social_enable',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '1',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'dental_insight_callback_sanitize_switch',
		)
	);
	$wp_customize->add_control(
		new Dental_Insight_Customizer_Customcontrol_Switch(
			$wp_customize,
			'dental_insight_social_enable',
			array(
				'settings'        => 'dental_insight_social_enable',
				'section'         => 'dental_insight_urls',
				'label'           => __( 'Check to show social fields', 'dental-insight' ),				
				'choices'		  => array(
					'1'      => __( 'On', 'dental-insight' ),
					'off'    => __( 'Off', 'dental-insight' ),
				),
				'active_callback' => '',
			)
		)
	);

	$wp_customize->add_setting('dental_insight_facebook_icon',array(
		'default'	=> 'fab fa-facebook-f',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new Dental_Insight_Fontawesome_Icon_Chooser(
        $wp_customize,'dental_insight_facebook_icon',array(
		'label'	=> __('Add Facebook Icon','dental-insight'),
		'transport' => 'refresh',
		'section'	=> 'dental_insight_urls',
		'setting'	=> 'dental_insight_facebook_icon',
		'type'		=> 'icon',
		'active_callback' => 'dental_insight_social_dropdown'
	)));

	$wp_customize->add_setting('dental_insight_facebook',array(
		'default' => '',
		'sanitize_callback' => 'esc_url_raw'
	));
	$wp_customize->add_control('dental_insight_facebook',array(
		'label' => esc_html__('Facebook URL','dental-insight'),
		'section' => 'dental_insight_urls',
		'setting' => 'dental_insight_facebook',
		'type'    => 'url',
		'active_callback' => 'dental_insight_social_dropdown'
	));

	$wp_customize->selective_refresh->add_partial( 'dental_insight_facebook', array(
		'selector' => '.links a i',
		'render_callback' => 'dental_insight_customize_partial_dental_insight_facebook',
	) );

	$wp_customize->add_setting(
		'dental_insight_header_fb_target',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '1',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'dental_insight_callback_sanitize_switch',
		)
	);
	$wp_customize->add_control(
		new Dental_Insight_Customizer_Customcontrol_Switch(
			$wp_customize,
			'dental_insight_header_fb_target',
			array(
				'settings'        => 'dental_insight_header_fb_target',
				'section'         => 'dental_insight_urls',
				'label'           => __( 'Open link in a new tab', 'dental-insight' ),				
				'choices'		  => array(
					'1'      => __( 'On', 'dental-insight' ),
					'off'    => __( 'Off', 'dental-insight' ),
				),
				'active_callback' => 'dental_insight_social_dropdown',
			)
		)
	);

	$wp_customize->add_setting('dental_insight_twitter_icon',array(
		'default'	=> 'fab fa-twitter',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new Dental_Insight_Fontawesome_Icon_Chooser(
        $wp_customize,'dental_insight_twitter_icon',array(
		'label'	=> __('Add Twitter Icon','dental-insight'),
		'transport' => 'refresh',
		'section'	=> 'dental_insight_urls',
		'setting'	=> 'dental_insight_twitter_icon',
		'type'		=> 'icon',
		'active_callback' => 'dental_insight_social_dropdown'
	)));


	$wp_customize->add_setting('dental_insight_twitter',array(
		'default' => '',
		'sanitize_callback' => 'esc_url_raw'
	));
	$wp_customize->add_control('dental_insight_twitter',array(
		'label' => esc_html__('Twitter URL','dental-insight'),
		'section' => 'dental_insight_urls',
		'setting' => 'dental_insight_twitter',
		'type'    => 'url',
		'active_callback' => 'dental_insight_social_dropdown'
	));

	$wp_customize->add_setting(
		'dental_insight_header_twt_target',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '1',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'dental_insight_callback_sanitize_switch',
		)
	);
	$wp_customize->add_control(
		new Dental_Insight_Customizer_Customcontrol_Switch(
			$wp_customize,
			'dental_insight_header_twt_target',
			array(
				'settings'        => 'dental_insight_header_twt_target',
				'section'         => 'dental_insight_urls',
				'label'           => __( 'Open link in a new tab', 'dental-insight' ),				
				'choices'		  => array(
					'1'      => __( 'On', 'dental-insight' ),
					'off'    => __( 'Off', 'dental-insight' ),
				),
				'active_callback' => 'dental_insight_social_dropdown',
			)
		)
	);

	$wp_customize->add_setting('dental_insight_youtube_icon',array(
		'default'	=> 'fab fa-youtube',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new Dental_Insight_Fontawesome_Icon_Chooser(
        $wp_customize,'dental_insight_youtube_icon',array(
		'label'	=> __('Add Youtube Icon','dental-insight'),
		'transport' => 'refresh',
		'section'	=> 'dental_insight_urls',
		'setting'	=> 'dental_insight_youtube_icon',
		'type'		=> 'icon',
		'active_callback' => 'dental_insight_social_dropdown'
	)));


	$wp_customize->add_setting('dental_insight_youtube',array(
		'default' => '',
		'sanitize_callback' => 'esc_url_raw'
	));
	$wp_customize->add_control('dental_insight_youtube',array(
		'label' => esc_html__('Youtube URL','dental-insight'),
		'section' => 'dental_insight_urls',
		'setting' => 'dental_insight_youtube',
		'type'    => 'url',
		'active_callback' => 'dental_insight_social_dropdown'
	));

	$wp_customize->add_setting(
		'dental_insight_header_ut_target',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '1',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'dental_insight_callback_sanitize_switch',
		)
	);
	$wp_customize->add_control(
		new Dental_Insight_Customizer_Customcontrol_Switch(
			$wp_customize,
			'dental_insight_header_ut_target',
			array(
				'settings'        => 'dental_insight_header_ut_target',
				'section'         => 'dental_insight_urls',
				'label'           => __( 'Open link in a new tab', 'dental-insight' ),				
				'choices'		  => array(
					'1'      => __( 'On', 'dental-insight' ),
					'off'    => __( 'Off', 'dental-insight' ),
				),
				'active_callback' => 'dental_insight_social_dropdown',
			)
		)
	);

	$wp_customize->add_setting('dental_insight_instagram_icon',array(
		'default'	=> 'fab fa-instagram',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new Dental_Insight_Fontawesome_Icon_Chooser(
        $wp_customize,'dental_insight_instagram_icon',array(
		'label'	=> __('Add Instagram Icon','dental-insight'),
		'transport' => 'refresh',
		'section'	=> 'dental_insight_urls',
		'setting'	=> 'dental_insight_instagram_icon',
		'type'		=> 'icon',
		'active_callback' => 'dental_insight_social_dropdown'
	)));

	$wp_customize->add_setting('dental_insight_instagram',array(
		'default' => '',
		'sanitize_callback' => 'esc_url_raw'
	));
	$wp_customize->add_control('dental_insight_instagram',array(
		'label' => esc_html__('Instagram URL','dental-insight'),
		'section' => 'dental_insight_urls',
		'setting' => 'dental_insight_instagram',
		'type'    => 'url',
		'active_callback' => 'dental_insight_social_dropdown'
	));

	$wp_customize->add_setting(
		'dental_insight_header_ins_target',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '1',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'dental_insight_callback_sanitize_switch',
		)
	);
	$wp_customize->add_control(
		new Dental_Insight_Customizer_Customcontrol_Switch(
			$wp_customize,
			'dental_insight_header_ins_target',
			array(
				'settings'        => 'dental_insight_header_ins_target',
				'section'         => 'dental_insight_urls',
				'label'           => __( 'Open link in a new tab', 'dental-insight' ),				
				'choices'		  => array(
					'1'      => __( 'On', 'dental-insight' ),
					'off'    => __( 'Off', 'dental-insight' ),
				),
				'active_callback' => 'dental_insight_social_dropdown',
			)
		)
	);

    //Slider
	$wp_customize->add_section( 'dental_insight_slider_section' , array(
    	'title'      => __( 'Slider Settings', 'dental-insight' ),    	
		'priority'   => 4,
	) );

	$wp_customize->add_setting( 'dental_insight_section_slide_heading', array(
			'default'           => '',
			'transport'         => 'refresh',
			'sanitize_callback' => 'sanitize_text_field',
		) );
		$wp_customize->add_control( new Dental_Insight_Customizer_Customcontrol_Section( $wp_customize, 'dental_insight_section_slide_heading', array(
			'label'       => esc_html__( 'Slider Setting', 'dental-insight' ),
			'description' => __( 'Slider Image Dimension ( 600px x 700px )', 'dental-insight' ),		
			'section'     => 'dental_insight_slider_section',
			'settings'    => 'dental_insight_section_slide_heading',
		) ) );

	$args = array('numberposts' => -1);
	$post_list = get_posts($args);
	$i = 0;
	$pst_sls[]= __('Select','dental-insight');
	foreach ($post_list as $key => $p_post) {
		$pst_sls[$p_post->ID]=$p_post->post_title;
	}
	for ( $i = 1; $i <= 4; $i++ ) {
		$wp_customize->add_setting('dental_insight_post_setting'.$i,array(
			'sanitize_callback' => 'dental_insight_sanitize_select',
		));
		$wp_customize->add_control('dental_insight_post_setting'.$i,array(
			'type'    => 'select',
			'choices' => $pst_sls,
			'label' => __('Select post','dental-insight'),
			'section' => 'dental_insight_slider_section'
		));

		$wp_customize->selective_refresh->add_partial( 'dental_insight_post_setting'.$i, array(
			'selector' => '.carousel-control-prev',
			'render_callback' => 'dental_insight_customize_partial_dental_insight_post_setting'.$i,
		) );
	}
	wp_reset_postdata();

	$wp_customize->add_setting('dental_insight_slider_content_alignment',array(
        'default' => 'LEFT-ALIGN',
        'sanitize_callback' => 'dental_insight_sanitize_choices'
	));
	$wp_customize->add_control('dental_insight_slider_content_alignment',array(
        'type' => 'select',
        'label' => __('Slider Content Alignment','dental-insight'),
        'section' => 'dental_insight_slider_section',
        'choices' => array(
            'LEFT-ALIGN' => __('LEFT-ALIGN','dental-insight'),
            'CENTER-ALIGN' => __('CENTER-ALIGN','dental-insight'),
            'RIGHT-ALIGN' => __('RIGHT-ALIGN','dental-insight'),),
	) );


	// Services Section
	$wp_customize->add_section( 'dental_insight_service_box_section' , array(
    	'title'      => __( 'Services Settings', 'dental-insight' ),
		'priority'   => 5,
	) );

	$wp_customize->add_setting(
		'dental_insight_services_enable',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '1',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'dental_insight_callback_sanitize_switch',
		)
	);
	$wp_customize->add_control(
		new Dental_Insight_Customizer_Customcontrol_Switch(
			$wp_customize,
			'dental_insight_services_enable',
			array(
				'settings'        => 'dental_insight_services_enable',
				'section'         => 'dental_insight_service_box_section',
				'label'           => __( 'Check to show services settings', 'dental-insight' ),				
				'choices'		  => array(
					'1'      => __( 'On', 'dental-insight' ),
					'off'    => __( 'Off', 'dental-insight' ),
				),
				'active_callback' => '',
			)
		)
	);

	$wp_customize->add_setting('dental_insight_services_section_title',array(
		'default' => '',
		'sanitize_callback' => 'sanitize_text_field'
	));
	$wp_customize->add_control('dental_insight_services_section_title',array(
		'label' => esc_html__('Section Title','dental-insight'),
		'section' => 'dental_insight_service_box_section',
		'setting' => 'dental_insight_services_section_title',
		'type'    => 'text',
		'active_callback' => 'dental_insight_service_dropdown'
	));

	$wp_customize->selective_refresh->add_partial( 'dental_insight_services_section_title', array(
		'selector' => '#services-box h3',
		'render_callback' => 'dental_insight_customize_partial_dental_insight_services_section_title',
	) );

	$categories = get_categories();
	$cats = array();
	$i = 0;
	$cat_post[]= 'select';
	foreach($categories as $category){
	if($i==0){
	  $default = $category->slug;
	  $i++;
	}
	$cat_post[$category->slug] = $category->name;
	}

	$wp_customize->add_setting('dental_insight_category_setting',array(
		'default' => 'select',
		'sanitize_callback' => 'dental_insight_sanitize_select',
	));
	$wp_customize->add_control('dental_insight_category_setting',array(
		'type'    => 'select',
		'choices' => $cat_post,
		'label' => esc_html__('Select Category to display Post','dental-insight'),
		'section' => 'dental_insight_service_box_section',
		'active_callback' => 'dental_insight_service_dropdown'
	));
	$wp_customize->add_setting('dental_insight_category_button_color',array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color',
		'capability' => 'edit_theme_options',
		)
	);
	
	$wp_customize->add_control( 'dental_insight_category_button_color', array(
	   'settings' => 'dental_insight_category_button_color',
	   'section'   => 'dental_insight_service_box_section',
	   'label' => __(' Button  Color', 'dental-insight'),
	   'type'      => 'color'
		)
	);

	//Footer
    $wp_customize->add_section( 'dental_insight_footer_copyright', array(
    	'title'      => esc_html__( 'Footer Text', 'dental-insight' ),
    	'priority' => 6
	) );

	$wp_customize->add_setting( 'dental_insight_section_footer_heading', array(
			'default'           => '',
			'transport'         => 'refresh',
			'sanitize_callback' => 'sanitize_text_field',
		) );
		$wp_customize->add_control( new Dental_Insight_Customizer_Customcontrol_Section( $wp_customize, 'dental_insight_section_footer_heading', array(
			'label'       => esc_html__( 'Footer Setting', 'dental-insight' ),		
			'section'     => 'dental_insight_footer_copyright',
			'settings'    => 'dental_insight_section_footer_heading',
		) ) );

    $wp_customize->add_setting('dental_insight_footer_text',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('dental_insight_footer_text',array(
		'label'	=> esc_html__('Copyright Text','dental-insight'),
		'section'	=> 'dental_insight_footer_copyright',
		'type'		=> 'text'
	));

	$wp_customize->selective_refresh->add_partial( 'dental_insight_footer_text', array(
		'selector' => '.site-info a',
		'render_callback' => 'dental_insight_customize_partial_dental_insight_footer_text',
	) );

	$wp_customize->add_setting('dental_insight_footer_widget',array(
		'default' => '4',
		'sanitize_callback' => 'dental_insight_sanitize_select'
	));
	$wp_customize->add_control('dental_insight_footer_widget',array(
		'label' => esc_html__('Footer Per Column','dental-insight'),
		'section' => 'dental_insight_footer_copyright',
		'setting' => 'dental_insight_footer_widget',
		'type' => 'radio',
				'choices' => array(
						'1'   => __('1 Column', 'dental-insight'),
						'2'  => __('2 Column', 'dental-insight'),
						'3' => __('3 Column', 'dental-insight'),
						'4' => __('4 Column', 'dental-insight')
				),
	));

	$wp_customize->get_setting( 'blogname' )->transport          = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport   = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport  = 'postMessage';

	$wp_customize->selective_refresh->add_partial( 'blogname', array(
		'selector' => '.site-title a',
		'render_callback' => 'dental_insight_customize_partial_blogname',
	) );
	$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
		'selector' => '.site-description',
		'render_callback' => 'dental_insight_customize_partial_blogdescription',
	) );

	//front page
	$num_sections = apply_filters( 'dental_insight_front_page_sections', 4 );

	// Create a setting and control for each of the sections available in the theme.
	for ( $i = 1; $i < ( 1 + $num_sections ); $i++ ) {
		$wp_customize->add_setting( 'panel_' . $i, array(
			'default'           => false,
			'sanitize_callback' => 'dental_insight_sanitize_dropdown_pages',
			'transport'         => 'postMessage',
		) );

		$wp_customize->add_control( 'panel_' . $i, array(
			/* translators: %d is the front page section number */
			'label'          => sprintf( __( 'Front Page Section %d Content', 'dental-insight' ), $i ),
			'description'    => ( 1 !== $i ? '' : __( 'Select pages to feature in each area from the dropdowns. Add an image to a section by setting a featured image in the page editor. Empty sections will not be displayed.', 'dental-insight' ) ),
			'section'        => 'theme_options',
			'type'           => 'dropdown-pages',
			'allow_addition' => true,
			'active_callback' => 'dental_insight_is_static_front_page',
		) );

		$wp_customize->selective_refresh->add_partial( 'panel_' . $i, array(
			'selector'            => '#panel' . $i,
			'render_callback'     => 'dental_insight_front_page_section',
			'container_inclusive' => true,
		) );
	}
}
add_action( 'customize_register', 'dental_insight_customize_register' );

function dental_insight_customize_partial_blogname() {
	bloginfo( 'name' );
}
function dental_insight_customize_partial_blogdescription() {
	bloginfo( 'description' );
}
function dental_insight_is_static_front_page() {
	return ( is_front_page() && ! is_home() );
}
function dental_insight_is_view_with_layout_option() {
	return ( is_page() || ( is_archive() && ! is_active_sidebar( 'sidebar-1' ) ) );
}

define('DENTAL_INSIGHT_PRO_LINK',__('https://www.ovationthemes.com/wordpress/dental-clinic-wordpress-theme/','dental-insight'));

/* Pro control */
if (class_exists('WP_Customize_Control') && !class_exists('Dental_Insight_Pro_Control')):
    class Dental_Insight_Pro_Control extends WP_Customize_Control{

    public function render_content(){?>
        <label style="overflow: hidden; zoom: 1;">
	        <div class="col-md-2 col-sm-6 upsell-btn">
                <a href="<?php echo esc_url( DENTAL_INSIGHT_PRO_LINK ); ?>" target="blank" class="btn btn-success btn"><?php esc_html_e('UPGRADE DENTAL PREMIUM','dental-insight');?> </a>
	        </div>
            <div class="col-md-4 col-sm-6">
                <img class="dental_insight_img_responsive " src="<?php echo esc_url( get_template_directory_uri() ); ?>/screenshot.png">

            </div>
	        <div class="col-md-3 col-sm-6">
	            <h3 style="margin-top:10px; margin-left: 20px; text-decoration:underline; color:#333;"><?php esc_html_e('DENTAL PREMIUM - Features', 'dental-insight'); ?></h3>
                <ul style="padding-top:10px">
                    <li class="upsell-dental_insight"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Responsive Design', 'dental-insight');?> </li>
                    <li class="upsell-dental_insight"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Boxed or fullwidth layout', 'dental-insight');?> </li>
                    <li class="upsell-dental_insight"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Shortcode Support', 'dental-insight');?> </li>
                    <li class="upsell-dental_insight"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Demo Importer', 'dental-insight');?> </li>
                    <li class="upsell-dental_insight"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Section Reordering', 'dental-insight');?> </li>
                    <li class="upsell-dental_insight"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Contact Page Template', 'dental-insight');?> </li>
                    <li class="upsell-dental_insight"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Multiple Blog Layouts', 'dental-insight');?> </li>
                    <li class="upsell-dental_insight"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Unlimited Color Options', 'dental-insight');?> </li>
                    <li class="upsell-dental_insight"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Designed with HTML5 and CSS3', 'dental-insight');?> </li>
                    <li class="upsell-dental_insight"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Customizable Design & Code', 'dental-insight');?> </li>
                    <li class="upsell-dental_insight"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Cross Browser Support', 'dental-insight');?> </li>
                    <li class="upsell-dental_insight"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Detailed Documentation Included', 'dental-insight');?> </li>
                    <li class="upsell-dental_insight"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Stylish Custom Widgets', 'dental-insight');?> </li>
                    <li class="upsell-dental_insight"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Patterns Background', 'dental-insight');?> </li>
                    <li class="upsell-dental_insight"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('WPML Compatible (Translation Ready)', 'dental-insight');?> </li>
                    <li class="upsell-dental_insight"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Woo-commerce Compatible', 'dental-insight');?> </li>
                    <li class="upsell-dental_insight"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Full Support', 'dental-insight');?> </li>
                    <li class="upsell-dental_insight"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('10+ Sections', 'dental-insight');?> </li>
                    <li class="upsell-dental_insight"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Live Customizer', 'dental-insight');?> </li>
                   	<li class="upsell-dental_insight"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('AMP Ready', 'dental-insight');?> </li>
                   	<li class="upsell-dental_insight"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Clean Code', 'dental-insight');?> </li>
                   	<li class="upsell-dental_insight"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('SEO Friendly', 'dental-insight');?> </li>
                   	<li class="upsell-dental_insight"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Supper Fast', 'dental-insight');?> </li>
                </ul>
        	</div>
		    <div class="col-md-2 col-sm-6 upsell-btn upsell-btn-bottom">
	            <a href="<?php echo esc_url( DENTAL_INSIGHT_PRO_LINK ); ?>" target="blank" class="btn btn-success btn"><?php esc_html_e('UPGRADE DENTAL PREMIUM','dental-insight');?> </a>
		    </div>
			<p><?php printf(__('Please review us if you love our product on %1$sWordPress.org%2$s. </br></br>  Thank You', 'dental-insight'), '<a target="blank" href="https://wordpress.org/support/theme/dental-insight/reviews/">', '</a>');
            ?></p>
        </label>
    <?php } }
endif;
