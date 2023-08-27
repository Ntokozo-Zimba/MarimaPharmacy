<?php
/**
 * Displays footer site info
 *
 * @subpackage Dental Insight
 * @since 1.0
 * @version 1.4
 */

?>
<div class="site-info py-4 text-center">
	<?php
        echo esc_html( get_theme_mod( 'dental_insight_footer_text' ) );
        printf(
            /* translators: %s: Dental WordPress Theme. */
            '<a href="' . esc_attr__( 'https://www.ovationthemes.com/wordpress/free-dental-wordpress-theme/', 'dental-insight' ) . '"> %s</a>',
            esc_html__( 'Dental WordPress Theme', 'dental-insight' )
        );
    ?>
</div>
