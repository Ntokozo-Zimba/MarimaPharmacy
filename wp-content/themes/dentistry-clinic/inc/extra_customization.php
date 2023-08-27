<?php 

	$dental_insight_sticky_header = get_theme_mod('dental_insight_sticky_header');

	$dental_insight_custom_style= "";

	if($dental_insight_sticky_header != true){

		$dental_insight_custom_style .='.wrap_figure.fixed{';

			$dental_insight_custom_style .='position: static;';
			
		$dental_insight_custom_style .='}';
	}

	$dental_insight_logo_max_height = get_theme_mod('dental_insight_logo_max_height');

	if($dental_insight_logo_max_height != false){

		$dental_insight_custom_style .='.custom-logo-link img{';

			$dental_insight_custom_style .='max-height: '.esc_html($dental_insight_logo_max_height).'px;';
			
		$dental_insight_custom_style .='}';
	}