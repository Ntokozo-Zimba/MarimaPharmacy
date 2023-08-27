<?php 

	$dental_insight_custom_style= "";

	if( get_option( 'dental_insight_sticky_header',true) != 'on') {

		$dental_insight_custom_style .='.menu_header.fixed{';

			$dental_insight_custom_style .='position: static;';
			
		$dental_insight_custom_style .='}';
	}

	if( get_option( 'dental_insight_sticky_header',true) != 'off') {

		$dental_insight_custom_style .='.menu_header.fixed{';

			$dental_insight_custom_style .='position: fixed;';
			
		$dental_insight_custom_style .='}';
	}


	$dental_insight_logo_max_height = get_theme_mod('dental_insight_logo_max_height');

	if($dental_insight_logo_max_height != false){

		$dental_insight_custom_style .='.custom-logo-link img{';

			$dental_insight_custom_style .='max-height: '.esc_html($dental_insight_logo_max_height).'px;';
			
		$dental_insight_custom_style .='}';
	}

	/*---------------------------Width -------------------*/
	
	$dental_insight_theme_width = get_theme_mod( 'dental_insight_width_options','full_width');

    if($dental_insight_theme_width == 'full_width'){

		$dental_insight_custom_style .='body{';

			$dental_insight_custom_style .='max-width: 100%;';

		$dental_insight_custom_style .='}';

	}else if($dental_insight_theme_width == 'container'){

		$dental_insight_custom_style .='body{';

			$dental_insight_custom_style .='max-width: 1140px; width: 100%; padding-right: 15px; padding-left: 15px; margin-right: auto; margin-left: auto;';

		$dental_insight_custom_style .='}';

	}else if($dental_insight_theme_width == 'container_fluid'){

		$dental_insight_custom_style .='body{';

			$dental_insight_custom_style .='width: 100%;padding-right: 15px;padding-left: 15px;margin-right: auto;margin-left: auto;';

		$dental_insight_custom_style .='}';
	}


/*---------------------------Scroll-top-position -------------------*/
	
	$dental_insight_scroll_options = get_theme_mod( 'dental_insight_scroll_options','right_align');

    if($dental_insight_scroll_options == 'right_align'){

		$dental_insight_custom_style .='.scroll-top button{';

			$dental_insight_custom_style .='';

		$dental_insight_custom_style .='}';

	}else if($dental_insight_scroll_options == 'center_align'){

		$dental_insight_custom_style .='.scroll-top button{';

			$dental_insight_custom_style .='right: 0; left:0; margin: 0 auto; top:85% !important';

		$dental_insight_custom_style .='}';

	}else if($dental_insight_scroll_options == 'left_align'){

		$dental_insight_custom_style .='.scroll-top button{';

			$dental_insight_custom_style .='right: auto; left:5%; margin: 0 auto';

		$dental_insight_custom_style .='}';
	}



			/*---------------------------text-transform-------------------*/

	$dental_insight_text_transform = get_theme_mod( 'dental_insight_menu_text_transform','CAPITALISE');
    if($dental_insight_text_transform == 'CAPITALISE'){

		$dental_insight_custom_style .='nav#top_gb_menu ul li a{';

			$dental_insight_custom_style .='text-transform: capitalize ; font-size: 14px;';

		$dental_insight_custom_style .='}';

	}else if($dental_insight_text_transform == 'UPPERCASE'){

		$dental_insight_custom_style .='nav#top_gb_menu ul li a{';

			$dental_insight_custom_style .='text-transform: uppercase ; font-size: 14px;';

		$dental_insight_custom_style .='}';

	}else if($dental_insight_text_transform == 'LOWERCASE'){

		$dental_insight_custom_style .='nav#top_gb_menu ul li a{';

			$dental_insight_custom_style .='text-transform: lowercase ; font-size: 14px;';

		$dental_insight_custom_style .='}';
	}

		/*-------------------------Slider-content-alignment-------------------*/

		$dental_insight_slider_content_alignment = get_theme_mod( 'dental_insight_slider_content_alignment','CENTER-ALIGN');

		 if($dental_insight_slider_content_alignment == 'LEFT-ALIGN'){

				$dental_insight_custom_style .='.slider-inner{';

					$dental_insight_custom_style .='text-align:left;';

				$dental_insight_custom_style .='}';


			}else if($dental_insight_slider_content_alignment == 'CENTER-ALIGN'){

				$dental_insight_custom_style .='.slider-inner{';

					$dental_insight_custom_style .='text-align:center;';

				$dental_insight_custom_style .='}';


			}else if($dental_insight_slider_content_alignment == 'RIGHT-ALIGN'){

				$dental_insight_custom_style .='.slider-inner{';

					$dental_insight_custom_style .='text-align:right;';

				$dental_insight_custom_style .='}';

			}

		//---------------------theme-button-color-------------//

			$dental_insight_theme_button_color = get_theme_mod('dental_insight_theme_button_color');

			if($dental_insight_theme_button_color != false){

		$dental_insight_custom_style .='button, input[type="button"] ,input[type="submit"],.home-btn a, .woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button,.woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt,button.search-submit, .toggle-menu button, a.more-link, .prev.page-numbers, .next.page-numbers, .site-footer .search-form .search-submit,a.added_to_cart.wc-forward {';

			$dental_insight_custom_style .='background-color: '.esc_attr($dental_insight_theme_button_color).';';

		$dental_insight_custom_style .='}';
	}
	$dental_insight_button_border = get_theme_mod('dental_insight_button_border_radius','30');
		
		if($dental_insight_button_border != false){

				$dental_insight_custom_style .='button, input[type="button"] ,input[type="submit"],.home-btn a, .woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button,.woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt,button.search-submit, .toggle-menu button, a.more-link, .prev.page-numbers, .next.page-numbers, .site-footer input[type="search"],#sidebar input[type="search"], input[type="search"], .box-button a ,a.added_to_cart.wc-forward{';

		$dental_insight_custom_style .='border-radius: '.esc_attr(

			$dental_insight_button_border).'px;';
				
				$dental_insight_custom_style .='}';
		}

//-----------------------service-section-button-color

		$dental_insight_category_button_color = get_theme_mod('dental_insight_category_button_color');

	if ($dental_insight_category_button_color != false){

		$dental_insight_custom_style.='.box-button a{';
		
			$dental_insight_custom_style.=' background:'.esc_attr($dental_insight_category_button_color).';';

		$dental_insight_custom_style.='}';
	}