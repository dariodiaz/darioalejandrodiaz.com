<?php
/**
 * Content filters
 *
 * @package WordPress
 * @subpackage SEO
 */

?>
<?php
/**
 * Removes inline styles from tag cloud
 *
 * @param string $input The tag cloud markup.
 */
function diagnoseo_remove_inline_style_tagcloud( $input ) {
	return preg_replace( '/style=\"font-size: .+pt;\"/', '', $input );
}
add_filter( 'wp_generate_tag_cloud', 'diagnoseo_remove_inline_style_tagcloud' );

/**
 * Wraps tables in an element so they become responsive
 *
 * @param string $content Table markup.
 */
function diagnoseo_table_filter( $content ) {
	$find        = array( '<table', '</table>' );
	$replacement = array( '<div class="table"><table', '</table></div>' );
	return str_replace( $find, $replacement, $content );
}
add_action( 'the_content', 'diagnoseo_table_filter', 10, 1 );
