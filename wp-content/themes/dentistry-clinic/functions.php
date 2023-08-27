<?php
/**
 * Theme functions and definitions
 *
 * @package dentistry_clinic
 */

if ( ! function_exists( 'dentistry_clinic_enqueue_styles' ) ) :
	/**
	 * Load assets.
	 *
	 * @since 1.0.0
	 */
	function dentistry_clinic_enqueue_styles() {
		wp_enqueue_style( 'dental-insight-style-parent', get_template_directory_uri() . '/style.css' );
		wp_enqueue_style( 'dentistry-clinic-style', get_stylesheet_directory_uri() . '/style.css', array( 'dental-insight-style-parent' ), '1.0.0' );
        // Theme Customize CSS.
        require get_parent_theme_file_path( 'inc/extra_customization.php' );
        wp_add_inline_style( 'dentistry-clinic-style',$dental_insight_custom_style );
	}
endif;
add_action( 'wp_enqueue_scripts', 'dentistry_clinic_enqueue_styles', 99 );

function dentistry_clinic_customize_register() {
    global $wp_customize;
    $wp_customize->remove_section( 'dental_insight_pro' );
}
add_action( 'customize_register', 'dentistry_clinic_customize_register', 11 );

function dentistry_clinic_customize( $wp_customize ) {

    wp_enqueue_style('customizercustom_css', esc_url( get_stylesheet_directory_uri() ). '/assets/css/customizer.css');

    $wp_customize->add_section('dentistry_clinic_pro', array(
        'title'    => __('UPGRADE DENTISTRY CLICNIC PREMIUM', 'dentistry-clinic'),
        'priority' => 1,
    ));

    $wp_customize->add_setting('dentistry_clinic_pro', array(
        'default'           => null,
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control(new Dentistry_Clinic_Pro_Control($wp_customize, 'dentistry_clinic_pro', array(
        'label'    => __('DENTISTRY CLICNIC PREMIUM', 'dentistry-clinic'),
        'section'  => 'dentistry_clinic_pro',
        'settings' => 'dentistry_clinic_pro',
        'priority' => 1,
    )));
}
add_action( 'customize_register', 'dentistry_clinic_customize' );

function dentistry_clinic_header_style() {
    if ( get_header_image() ) :
    $dental_insight_custom_css = "
        .wrap_figure{
            background-image:url('".esc_url(get_header_image())."');
            background-position: center top;
        }";
        wp_add_inline_style( 'dental-insight-style', $dental_insight_custom_css );
    endif;
}
add_action( 'wp_enqueue_scripts', 'dentistry_clinic_header_style' );

function dentistry_clinic_setup() {
    add_theme_support( "align-wide" );
    add_theme_support( "wp-block-styles" );
    add_theme_support( 'responsive-embeds' );
    add_theme_support( 'woocommerce' );
    add_theme_support( 'automatic-feed-links' );
    add_theme_support( 'post-thumbnails' );
    add_theme_support( 'title-tag' );
    add_theme_support('custom-background',array(
        'default-color' => 'ffffff',
    ));
    add_image_size( 'dentistry-clinic-featured-image', 2000, 1200, true );
    add_image_size( 'dentistry-clinic-thumbnail-avatar', 100, 100, true );

    $GLOBALS['content_width'] = 525;

    add_theme_support( 'html5', array(
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
    ) );

    // Add theme support for Custom Logo.
    add_theme_support( 'custom-logo', array(
        'width'       => 250,
        'height'      => 250,
        'flex-width'  => true,
    ) );

    /*
     * This theme styles the visual editor to resemble the theme style,
     * specifically font, colors, and column width.
     */
    add_editor_style( array( 'assets/css/editor-style.css') );

}
add_action( 'after_setup_theme', 'dentistry_clinic_setup' );

function dentistry_clinic_widgets_init() {
    register_sidebar( array(
        'name'          => __( 'Sidebar', 'dentistry-clinic' ),
        'id'            => 'sidebar-1',
        'description'   => __( 'Add widgets here to appear in your sidebar on blog posts and archive pages.', 'dentistry-clinic' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<div class="widget_container"><h3 class="widget-title">',
        'after_title'   => '</h3></div>',
    ) );
    
    register_sidebar( array(
        'name'          => __( 'Page Sidebar', 'dentistry-clinic' ),
        'id'            => 'sidebar-2',
        'description'   => __( 'Add widgets here to appear in your pages and posts', 'dentistry-clinic' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<div class="widget_container"><h3 class="widget-title">',
        'after_title'   => '</h3></div>',
    ) );
    
    register_sidebar( array(
        'name'          => __( 'Sidebar 3', 'dentistry-clinic' ),
        'id'            => 'sidebar-3',
        'description'   => __( 'Add widgets here to appear in your sidebar on blog posts and archive pages.', 'dentistry-clinic' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<div class="widget_container"><h3 class="widget-title">',
        'after_title'   => '</h3></div>',
    ) );

    register_sidebar( array(
        'name'          => __( 'Footer 1', 'dentistry-clinic' ),
        'id'            => 'footer-1',
        'description'   => __( 'Add widgets here to appear in your footer.', 'dentistry-clinic' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );

    register_sidebar( array(
        'name'          => __( 'Footer 2', 'dentistry-clinic' ),
        'id'            => 'footer-2',
        'description'   => __( 'Add widgets here to appear in your footer.', 'dentistry-clinic' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );

    register_sidebar( array(
        'name'          => __( 'Footer 3', 'dentistry-clinic' ),
        'id'            => 'footer-3',
        'description'   => __( 'Add widgets here to appear in your footer.', 'dentistry-clinic' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );

    register_sidebar( array(
        'name'          => __( 'Footer 4', 'dentistry-clinic' ),
        'id'            => 'footer-4',
        'description'   => __( 'Add widgets here to appear in your footer.', 'dentistry-clinic' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );
}
add_action( 'widgets_init', 'dentistry_clinic_widgets_init' );

function dentistry_clinic_enqueue_comments_reply() {
    if( get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }
}
add_action( 'comment_form_before', 'dentistry_clinic_enqueue_comments_reply' );

define('DENTISTRY_CLICNIC_PRO_LINK',__('https://www.ovationthemes.com/wordpress/wordpress-dental-theme/','dentistry-clinic'));

/* Pro control */
if (class_exists('WP_Customize_Control') && !class_exists('Dentistry_Clinic_Pro_Control')):
    class Dentistry_Clinic_Pro_Control extends WP_Customize_Control{

    public function render_content(){?>
        <label style="overflow: hidden; zoom: 1;">
            <div class="col-md upsell-btn">
                <a href="<?php echo esc_url( DENTISTRY_CLICNIC_PRO_LINK ); ?>" target="blank" class="btn btn-success btn"><?php esc_html_e('UPGRADE DENTISTRY CLICNIC PREMIUM','dentistry-clinic');?> </a>
            </div>
            <div class="col-md">
                <img class="dentistry_clinic_img_responsive " src="<?php echo esc_url( get_stylesheet_directory_uri() ); ?>/screenshot.png">
            </div>
            <div class="col-md">
                <h3 style="margin-top:10px; margin-left: 20px; text-decoration:underline; color:#333;"><?php esc_html_e('DENTISTRY CLICNIC PREMIUM - Features', 'dentistry-clinic'); ?></h3>
                <ul style="padding-top:10px">
                    <li class="upsell-dentistry_clinic"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Responsive Design', 'dentistry-clinic');?> </li>
                    <li class="upsell-dentistry_clinic"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Boxed or fullwidth layout', 'dentistry-clinic');?> </li>
                    <li class="upsell-dentistry_clinic"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Shortcode Support', 'dentistry-clinic');?> </li>
                    <li class="upsell-dentistry_clinic"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Demo Importer', 'dentistry-clinic');?> </li>
                    <li class="upsell-dentistry_clinic"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Section Reordering', 'dentistry-clinic');?> </li>
                    <li class="upsell-dentistry_clinic"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Contact Page Template', 'dentistry-clinic');?> </li>
                    <li class="upsell-dentistry_clinic"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Multiple Blog Layouts', 'dentistry-clinic');?> </li>
                    <li class="upsell-dentistry_clinic"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Unlimited Color Options', 'dentistry-clinic');?> </li>
                    <li class="upsell-dentistry_clinic"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Designed with HTML5 and CSS3', 'dentistry-clinic');?> </li>
                    <li class="upsell-dentistry_clinic"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Customizable Design & Code', 'dentistry-clinic');?> </li>
                    <li class="upsell-dentistry_clinic"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Cross Browser Support', 'dentistry-clinic');?> </li>
                    <li class="upsell-dentistry_clinic"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Detailed Documentation Included', 'dentistry-clinic');?> </li>
                    <li class="upsell-dentistry_clinic"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Stylish Custom Widgets', 'dentistry-clinic');?> </li>
                    <li class="upsell-dentistry_clinic"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Patterns Background', 'dentistry-clinic');?> </li>
                    <li class="upsell-dentistry_clinic"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('WPML Compatible (Translation Ready)', 'dentistry-clinic');?> </li>
                    <li class="upsell-dentistry_clinic"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Woo-commerce Compatible', 'dentistry-clinic');?> </li>
                    <li class="upsell-dentistry_clinic"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Full Support', 'dentistry-clinic');?> </li>
                    <li class="upsell-dentistry_clinic"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('10+ Sections', 'dentistry-clinic');?> </li>
                    <li class="upsell-dentistry_clinic"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Live Customizer', 'dentistry-clinic');?> </li>
                    <li class="upsell-dentistry_clinic"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('AMP Ready', 'dentistry-clinic');?> </li>
                    <li class="upsell-dentistry_clinic"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Clean Code', 'dentistry-clinic');?> </li>
                    <li class="upsell-dentistry_clinic"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('SEO Friendly', 'dentistry-clinic');?> </li>
                    <li class="upsell-dentistry_clinic"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Supper Fast', 'dentistry-clinic');?> </li>
                </ul>
            </div>
            <div class="col-md upsell-btn upsell-btn-bottom">
                <a href="<?php echo esc_url( DENTISTRY_CLICNIC_PRO_LINK ); ?>" target="blank" class="btn btn-success btn"><?php esc_html_e('UPGRADE DENTISTRY CLICNIC PREMIUM','dentistry-clinic');?> </a>
            </div>
        </label>
    <?php } }
endif;

if ( ! defined( 'DENTAL_INSIGHT_SUPPORT' ) ) {
define('DENTAL_INSIGHT_SUPPORT',__('https://wordpress.org/support/theme/dentistry-clinic','dentistry-clinic'));
}
if ( ! defined( 'DENTAL_INSIGHT_REVIEW' ) ) {
define('DENTAL_INSIGHT_REVIEW',__('https://wordpress.org/support/theme/dentistry-clinic/reviews/#new-post','dentistry-clinic'));
}
if ( ! defined( 'DENTAL_INSIGHT_LIVE_DEMO' ) ) {
define('DENTAL_INSIGHT_LIVE_DEMO',__('https://www.ovationthemes.com/demos/dentistry-clinic/','dentistry-clinic'));
}
if ( ! defined( 'DENTAL_INSIGHT_BUY_PRO' ) ) {
define('DENTAL_INSIGHT_BUY_PRO',__('https://www.ovationthemes.com/wordpress/free-dentistry-wordpress-theme/','dentistry-clinic'));
}
if ( ! defined( 'DENTAL_INSIGHT_PRO_DOC' ) ) {
define('DENTAL_INSIGHT_PRO_DOC',__('https://www.ovationthemes.com/docs/ot-dentistry-clinic-pro-doc','dentistry-clinic'));
}
if ( ! defined( 'DENTAL_INSIGHT_THEME_NAME' ) ) {
define('DENTAL_INSIGHT_THEME_NAME',__('Premium Dentistry Theme','dentistry-clinic'));
}
