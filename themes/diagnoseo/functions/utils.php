<?php
/**
 * Various utility functions
 *
 * @package WordPress
 * @subpackage SEO
 */

?>
<?php
/**
 * Replaces empty title with a placeholder
 *
 * @param string $title Title placeholder.
 */
function diagnoseo_title( $title ) {
	if ( '' === $title ) {
		$title = 'Untitled';
	}
	return $title;
}
add_filter( 'the_title', 'diagnoseo_title' );

/**
 * Creates custom excerpt for posts
 *
 * @param integer $limit Max. word count.
 * @param object  $post Post object.
 * @param boolean $strip_html If true clears any html from the excerpt.
 * @param boolean $show_more_link If true adds a "read more" link to the excerpt.
 */
function diagnoseo_custom_excerpt( $limit, $post, $show_more_link = false ) {
	if ( has_excerpt() ) {
		return get_the_excerpt();
	}
	$more = '<!--more-->';
	if ( $post ) {
		$diagnoseo_found_posts = strpos( $post->post_content, $more );
	} else {
		$diagnoseo_found_posts = false;
	}

	if ( ! $diagnoseo_found_posts ) {
		$excerpt = explode( ' ', wp_strip_all_tags( get_the_content() ), $limit );
		if ( count( $excerpt ) >= $limit ) {
			array_pop( $excerpt );
			$excerpt = implode( ' ', $excerpt ) . '...';
		} else {
			$excerpt = implode( ' ', $excerpt );
		}
		$excerpt = preg_replace( '`\[[^\]]*\]`', '', $excerpt );
	} else {
		$excerpt = substr( $post->post_content, 0, $diagnoseo_found_posts );
	}

	if ( $show_more_link ) {
		$excerpt .= ' <a href="' . esc_url( get_the_permalink() ) . '" class="more-link">' . esc_html__( 'Read more', 'diagnoseo' ) . '</a>';
	}
	return $excerpt;
}

/**
 * Prevents WordPress from adding "more" link to excerpt
 *
 * @param string $more "More" text - ingnore.
 */
function diagnoseo_excerpt_more( $more ) {
	global $post;
	return '';
}
add_filter( 'excerpt_more', 'diagnoseo_excerpt_more', 11 );

/**
 * Disables comments in new post by default
 *
 * @param array $data Post data.
 */
function diagnoseo_default_comments_off( $data ) {
	if ( 'page' === $data['post_type'] && 'auto-draft' === $data['post_status'] ) {
		$data['comment_status'] = 0;
	}

	return $data;
}
add_filter( 'wp_insert_post_data', 'diagnoseo_default_comments_off' );

/**
 * Customizes pagination
 */
function diagnoseo_post_pagination() {
	return array(
		'link_before'      => '<span class="pagination-link">',
		'link_after'       => '</span>',
		'next_or_number'   => 'number',
		'before'           => '<p class="pages"><strong>' . __( 'Pages', 'diagnoseo' ) . ':</strong> ',
		'after'            => '</p>',
		'previouspagelink' => '',
		'nextpagelink'     => '',
		'echo'             => 1,
		'pagelink'         => '%',
		'separator'        => '',
		'aria_current'     => 'page',
	);
}
add_filter( 'wp_link_pages_args', 'diagnoseo_post_pagination' );

/**
 * Checks if a widget area is active
 *
 * @param string $name Widget area name.
 */
function diagnoseo_is_sidebar_active($name) {
    global $wp_registered_sidebars;
	$has_widgets = wp_get_sidebars_widgets();
    return ! empty( $has_widgets[$name] );
}