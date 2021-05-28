<?php
/**
 * Structured data in page header
 *
 * @package WordPress
 * @subpackage SEO
 */

?>
<?php

/**
 * Adds dateModified meta tag
 */
function diagnoseo_page_meta() {
	if ( ! is_single() && ! is_page() ) {
		return;
	}

	global $post;
	$date      = get_the_date( 'Y-m-d', $post->ID );
	$thumbnail = get_the_post_thumbnail_url( $post->ID, 'full' );
	?>
	<meta itemprop="dateModified" content="<?php echo esc_attr( $date ); ?>">
	<?php if ( $thumbnail ) : ?>
	<meta itemprop="primaryImageOfPage" content="<?php echo esc_url( $thumbnail ); ?>">
		<?php
	endif;

}
add_action( 'wp_head', 'diagnoseo_page_meta' );
