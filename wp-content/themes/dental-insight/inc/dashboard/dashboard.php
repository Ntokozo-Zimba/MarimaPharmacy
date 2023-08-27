<?php

add_action( 'admin_menu', 'dental_insight_gettingstarted' );
function dental_insight_gettingstarted() {
	add_theme_page( esc_html__('Theme Documentation', 'dental-insight'), esc_html__('Theme Documentation', 'dental-insight'), 'edit_theme_options', 'dental-insight-guide-page', 'dental_insight_guide');
}

function dental_insight_admin_theme_style() {
   wp_enqueue_style('dental-insight-custom-admin-style', esc_url(get_template_directory_uri()) . '/inc/dashboard/dashboard.css');
}
add_action('admin_enqueue_scripts', 'dental_insight_admin_theme_style');

if ( ! defined( 'DENTAL_INSIGHT_SUPPORT' ) ) {
define('DENTAL_INSIGHT_SUPPORT',__('https://wordpress.org/support/theme/dental-insight/','dental-insight'));
}
if ( ! defined( 'DENTAL_INSIGHT_REVIEW' ) ) {
define('DENTAL_INSIGHT_REVIEW',__('https://wordpress.org/support/theme/dental-insight/reviews/','dental-insight'));
}
if ( ! defined( 'DENTAL_INSIGHT_LIVE_DEMO' ) ) {
define('DENTAL_INSIGHT_LIVE_DEMO',__('https://www.ovationthemes.com/demos/dental-insight-pro/','dental-insight'));
}
if ( ! defined( 'DENTAL_INSIGHT_BUY_PRO' ) ) {
define('DENTAL_INSIGHT_BUY_PRO',__('https://www.ovationthemes.com/wordpress/dental-clinic-wordpress-theme/','dental-insight'));
}
if ( ! defined( 'DENTAL_INSIGHT_PRO_DOC' ) ) {
define('DENTAL_INSIGHT_PRO_DOC',__('https://ovationthemes.com/docs/ot-dental-insight-pro-doc/','dental-insight'));
}
if ( ! defined( 'DENTAL_INSIGHT_THEME_NAME' ) ) {
define('DENTAL_INSIGHT_THEME_NAME',__('Premium Dental Theme','dental-insight'));
}

/**
 * Theme Info Page
 */
function dental_insight_guide() {

	// Theme info
	$return = add_query_arg( array()) ;
	$theme = wp_get_theme( '' ); ?>

	<div class="getting-started__header">
		<div class="col-md-10">
			<h2><?php echo esc_html( $theme ); ?></h2>
			<p><?php esc_html_e('Version: ', 'dental-insight'); ?><?php echo esc_html($theme['Version']);?></p>
		</div>
		<div class="col-md-2">
			<div class="btn_box">
				<a class="button-primary" href="<?php echo esc_url( DENTAL_INSIGHT_SUPPORT ); ?>" target="_blank"><?php esc_html_e('Support', 'dental-insight'); ?></a>
				<a class="button-primary" href="<?php echo esc_url( DENTAL_INSIGHT_REVIEW ); ?>" target="_blank"><?php esc_html_e('Review', 'dental-insight'); ?></a>
			</div>
		</div>
	</div>

	<div class="wrap getting-started">
		<div class="container">
			<div class="col-md-9">
				<div class="leftbox">
					<h3><?php esc_html_e('Documentation','dental-insight'); ?></h3>
					<p><?php esc_html_e('To step the Dental Insight theme follow the below steps.','dental-insight'); ?></p>

					<h4><?php esc_html_e('1. Setup Logo','dental-insight'); ?></h4>
					<p><?php esc_html_e('Go to dashboard >> Appearance >> Customize >> Site Identity >> Upload your logo or Add site title and site description.','dental-insight'); ?></p>
					<a class="button-primary" href="<?php echo esc_url( admin_url('customize.php?autofocus[control]=custom_logo') ); ?>" target="_blank"><?php esc_html_e('Upload your logo','dental-insight'); ?></a>

					<h4><?php esc_html_e('2. Setup Contact Info','dental-insight'); ?></h4>
					<p><?php esc_html_e('Go to dashboard >> Appearance >> Customize >> Contact info >> Add your contact info.','dental-insight'); ?></p>
					<a class="button-primary" href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=dental_insight_top') ); ?>" target="_blank"><?php esc_html_e('Add Contact Info','dental-insight'); ?></a>

					<h4><?php esc_html_e('4. Setup Social Icons','dental-insight'); ?></h4>
					<p><?php esc_html_e('Go to dashboard >> Appearance >> Customize >> Social Media >> Add social links.','dental-insight'); ?></p>
					<a class="button-primary" href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=dental_insight_urls') ); ?>" target="_blank"><?php esc_html_e('Add Social Icons','dental-insight'); ?></a>

					<h4><?php esc_html_e('3. Setup Menus','dental-insight'); ?></h4>
					<p><?php esc_html_e('Go to dashboard >> Appearance >> Menus >> Create Menus >> Add pages, post or custom link then save it.','dental-insight'); ?></p>
					<a class="button-primary" href="<?php echo esc_url( admin_url('customize.php?autofocus[panel]=nav_menus') ); ?>" target="_blank"><?php esc_html_e('Add Menus','dental-insight'); ?></a>

					<h4><?php esc_html_e('5. Setup Footer','dental-insight'); ?></h4>
					<p><?php esc_html_e('Go to dashboard >> Appearance >> Widgets >> Add widgets in footer 1, footer 2, footer 3, footer 4. >> ','dental-insight'); ?></p>
					<a class="button-primary" href="<?php echo esc_url( admin_url('customize.php?autofocus[panel]=widgets') ); ?>" target="_blank"><?php esc_html_e('Footer Widgets','dental-insight'); ?></a>

					<h4><?php esc_html_e('5. Setup Footer Text','dental-insight'); ?></h4>
					<p><?php esc_html_e('Go to dashboard >> Appearance >> Customize >> Footer Text >> Add copyright text. >> ','dental-insight'); ?></p>
					<a class="button-primary" href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=dental_insight_footer_copyright') ); ?>" target="_blank"><?php esc_html_e('Footer Text','dental-insight'); ?></a>

					<h3><?php esc_html_e('Setup Home Page','dental-insight'); ?></h3>
					<p><?php esc_html_e('To step the home page follow the below steps.','dental-insight'); ?></p>

					<h4><?php esc_html_e('1. Setup Page','dental-insight'); ?></h4>
					<p><?php esc_html_e('Go to dashboard >> Pages >> Add New Page >> Select "Custom Home Page" from templates >> Publish it.','dental-insight'); ?></p>
					<a class="dashboard_add_new_page button-primary"><?php esc_html_e('Add New Page','dental-insight'); ?></a>

					<h4><?php esc_html_e('2. Setup Slider','dental-insight'); ?></h4>
					<p><?php esc_html_e('Go to dashboard >> Post >> Add New Post >> Add title, content and featured image >> Publish it.','dental-insight'); ?></p>
					<p><?php esc_html_e('Go to dashboard >> Appearance >> Customize >> Slider Settings >> Select post.','dental-insight'); ?></p>
					<a class="button-primary" href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=dental_insight_slider_section') ); ?>" target="_blank"><?php esc_html_e('Add Slider','dental-insight'); ?></a>

					<h4><?php esc_html_e('3. Setup Services','dental-insight'); ?></h4>
					<p><?php esc_html_e('Go to dashboard >> Post >> Add New Post >> Add title, content and featured image >> Publish it.','dental-insight'); ?></p>
					<p><?php esc_html_e('Go to dashboard >> Appearance >> Customize >> Services Settings >> Select category.','dental-insight'); ?></p>

					<a class="button-primary" href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=dental_insight_service_box_section') ); ?>" target="_blank"><?php esc_html_e('Add Services','dental-insight'); ?></a>
				</div>
          	</div>
			<div class="col-md-3">
				<h3><?php echo esc_html(DENTAL_INSIGHT_THEME_NAME); ?></h3>
				<img class="dental_insight_img_responsive" style="width: 100%;" src="<?php echo esc_url( $theme->get_screenshot() ); ?>" />
				<div class="pro-links">
					<hr>
			    	<a class="button-primary livedemo" href="<?php echo esc_url( DENTAL_INSIGHT_LIVE_DEMO ); ?>" target="_blank"><?php esc_html_e('Live Demo', 'dental-insight'); ?></a>
					<a class="button-primary buynow" href="<?php echo esc_url( DENTAL_INSIGHT_BUY_PRO ); ?>" target="_blank"><?php esc_html_e('Buy Now', 'dental-insight'); ?></a>
					<a class="button-primary docs" href="<?php echo esc_url( DENTAL_INSIGHT_PRO_DOC ); ?>" target="_blank"><?php esc_html_e('Documentation', 'dental-insight'); ?></a>
					<hr>
				</div>
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
		</div>
	</div>

<?php }?>
