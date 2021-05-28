<?php
/**
 * Customizer settings in css variables
 *
 * @package WordPress
 * @subpackage SEO
 */

?>
<?php
/**
 * Creates a tyle containig all the variables
 */
function diagnoseo_css_vars() {
	$css = '';

	$icon_font_path = get_template_directory_uri() . '/fonts';

	$css .= "@font-face {
		font-display: swap;
		font-family: 'seo';
		src: url( '" . $icon_font_path . "/seo.eot?ay24jn' );
		src: url( '" . $icon_font_path . "/seo.eot?ay24jn#iefix' ) format( 'embedded-opentype' ),url( '" . $icon_font_path . "/seo.ttf?ay24jn' ) format( 'truetype' ),url( '" . $icon_font_path . "/seo.woff?ay24jn' ) format( 'woff' ),url( '" . $icon_font_path . "/seo.svg?ay24jn#m' ) format( 'svg' );
		font-weight: normal;
		font-style: normal;
	}\n";

	if ( function_exists( 'add_inline_style' ) ) {
		add_inline_style( 'seo-css-vars', $css );
	} else {
		wp_styles()->add_inline_style( 'seo-css-vars', $css );
	}

	return $css;
}

add_action( 'wp_enqueue_scripts', 'diagnoseo_css_vars', 1 );
add_action( 'enqueue_block_editor_assets', 'diagnoseo_css_vars' );
