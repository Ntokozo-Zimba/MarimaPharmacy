<?php
/**
 * Displays footer site info
 *
 * @subpackage Dentistry Clinic
 * @since 1.0
 * @version 1.4
 */

?>

<div class="site-info py-4 text-center">
	<?php
        echo esc_html( get_theme_mod( 'dental_insight_footer_text' ) );
        printf(
            /* translators: %s: Dentistry WordPress Theme. */
            '<a href="' . esc_attr__( 'https://www.ovationthemes.com/wordpress/free-dentistry-wordpress-theme/', 'dentistry-clinic' ) . '"> %s</a>',
            esc_html__( 'Dentistry WordPress Theme', 'dentistry-clinic' )
        );
    ?>
</div>
