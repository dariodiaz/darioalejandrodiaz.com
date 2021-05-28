<?php
/**
 * Setting-based classes added to body element
 *
 * @package WordPress
 * @subpackage SEO
 */

?>
<?php
/**
 * Applies appropriate classes to body element
 *
 * @param array $classes Initial classes passed from WP.
 */
function diagnoseo_body_classes( $classes ) {

	$body_classes = array(
		'wide',
		'last-widget-sticky',
		'show-menus',
		'img-hover-lightup'
	);

	return array_merge( $classes, $body_classes );
}

add_filter( 'body_class', 'diagnoseo_body_classes' );
