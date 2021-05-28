<?php
/**
 * Breadcrumbs
 *
 * @package WordPress
 * @subpackage SEO
 */

?>
<?php
$diagnoseo_bc_position = 0;

/**
 * Generates breadcrumbs markup
 */
function diagnoseo_breadcrumbs() {

	/* when not to show breadcrumbs */

	if ( is_front_page() || is_home() || is_search() ) {
		return;
	}

	/* settings */

	$breadcrumb_separator = '/';
	$delimiter            = '<span class="delimiter">' . esc_html( $breadcrumb_separator ) . '</span>';
	$id                   = get_the_id();

	$allowed = array(
		'li'   => array(
			'itemprop'  => array( 'itemListElement' ),
			'itemtype'  => array( 'http://schema.org/ListItem' ),
			'itemscope' => array(),
		),
		'a'    => array(
			'href'     => array(),
			'itemprop' => array( 'item' ),
		),
		'span' => array(
			'itemprop' => array( 'name' ),
			'class'    => array( 'delimiter' ),
		),
		'meta' => array(
			'itemprop' => array( 'position' ),
			'content'  => array(),
		),
	);

	$main = esc_attr__( 'Home', 'diagnoseo' );
	if ( is_day() || is_month() || is_year() ) {
		$arc_year     = get_the_time( 'Y' );
		$arc_month    = get_the_time( 'F' );
		$arc_day      = get_the_time( 'd' );
		$arc_day_full = get_the_time( 'l' );
		$url_year     = get_year_link( $arc_year );
		$url_month    = get_month_link( $arc_year, $arc_month );
	}
	$calendar_active = class_exists( 'Tribe__Events__Main' );

	global $post, $cat;

	/* standard breadcrumbs */

	echo '<ol class="breadcrumbs" itemscope itemtype="http://schema.org/BreadcrumbList">';

	$home_link = home_url( '/' );

	echo wp_kses( diagnoseo_prepare_item( __( 'Home', 'diagnoseo' ), $home_link, false ), $allowed );

	if ( is_front_page() ) {
		echo '</ol>';
		return;
	}

	if ( is_home() ) {
		$id    = get_option( 'page_for_posts' );
		$html  = diagnoseo_prepare_ancestors( $id );
		$html .= diagnoseo_prepare_item( get_the_title( $id ) );
		echo wp_kses( $html, $allowed );

	} elseif ( is_attachment() ) {
		$html  = diagnoseo_prepare_category_path( $post->post_parent, 'category' );
		$html .= diagnoseo_prepare_item( get_the_title( $post->post_parent ), get_permalink( $post->post_parent ) );
		$html .= diagnoseo_prepare_item( get_the_title() );
		echo wp_kses( $html, $allowed );

	} elseif ( is_single() ) {
		$type = get_post_type();
		$html = '';
		$page_for_posts = get_option( 'page_for_posts' );
		if ( get_option( 'show_on_front' ) === 'page' && ! empty( $page_for_posts ) ) {
			$html .= diagnoseo_prepare_item( get_the_title( $page_for_posts ), get_permalink( $page_for_posts ) );
		}

		$html .= diagnoseo_prepare_category_path( $post->ID, 'category' );
		$html .= diagnoseo_prepare_item( get_the_title() );
		echo wp_kses( $html, $allowed );

	} elseif ( is_404() ) {
		echo wp_kses( prepare_item( esc_html__( 'Error 404 - Not Found.', 'diagnoseo' ) ), $allowed );

	} elseif ( is_category() ) {
		$html           = '';
		$page_for_posts = get_option( 'page_for_posts' );
		if ( get_option( 'show_on_front' ) === 'page' && ! empty( $page_for_posts ) ) {
			$html .= diagnoseo_prepare_item( get_the_title( $page_for_posts ), get_permalink( $page_for_posts ) );
		}
		$ancestors = array_reverse( get_ancestors( $cat, 'category' ) );
		foreach ( $ancestors as $ancestor ) {
			$ancestor_data = get_term( $ancestor, 'category' );
			if ( ! is_wp_error( $ancestor_data ) && $ancestor_data ) {
				$html .= diagnoseo_prepare_item( $ancestor_data->name, get_term_link( $ancestor_data->slug, 'category' ) );
			}
		}
		$current_cat = get_term( $cat, 'category' );
		$html       .= diagnoseo_prepare_item( $current_cat->name );
		echo wp_kses( $html, $allowed );

	} elseif ( is_tag() ) {
		echo wp_kses( diagnoseo_prepare_item( esc_attr__( 'Posts tagged', 'diagnoseo' ) . ': ' . single_tag_title( '', false ) ), $allowed );

	} elseif ( is_day() ) {
		$html  = diagnoseo_prepare_item( $arc_year, $url_year );
		$html .= diagnoseo_prepare_item( $arc_month, $url_month );
		$html .= diagnoseo_prepare_item( esc_html( $arc_day ) . '( ' . esc_html( $arc_day_full ) . ' )' );
		echo wp_kses( $html, $allowed );

	} elseif ( is_month() ) {
		$html  = diagnoseo_prepare_item( $arc_year, $url_year );
		$html .= diagnoseo_prepare_item( $arc_month );
		echo wp_kses( $html, $allowed );

	} elseif ( is_year() ) {
		echo wp_kses( diagnoseo_prepare_item( $arc_year ), $allowed );

	} elseif ( is_search() ) {
		echo wp_kses( diagnoseo_prepare_item( esc_attr__( 'Search results for', 'diagnoseo' ) . ': "' . get_search_query() . '"' ), $allowed );

	} elseif ( is_page() && ! $post->post_parent ) {
		echo wp_kses( diagnoseo_prepare_item( get_the_title() ), $allowed );

	} elseif ( is_page() && $post->post_parent ) {
		$html  = diagnoseo_prepare_ancestors( $post );
		$html .= diagnoseo_prepare_item( get_the_title( $id ) );
		echo wp_kses( $html, $allowed );

	} elseif ( is_author() ) {
		global $author;
		$user_info = get_userdata( $author );
		echo wp_kses( diagnoseo_prepare_item( __( 'Articles by', 'diagnoseo' ) . ': ' . esc_html( $user_info->display_name ) ), $allowed );
	}
	echo '</ol>';
}

/**
 * Prepares breadcrumb part markup
 *
 * @param string  $name Item name/title.
 * @param string  $url Item address.
 * @param boolean $separator Flag saying if separator should be displayed.
 */
function diagnoseo_prepare_item( $name, $url = '', $separator = true ) {
	global $diagnoseo_bc_position;
	$diagnoseo_bc_position ++;

	$breadcrumb_separator = '/';

	$html = '<li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">';
	if ( $separator ) {
		$html .= '<span class="delimiter">' . esc_html( $breadcrumb_separator ) . '</span>';
	}
	if ( ! empty( $url ) ) {
		$html .= '<a href="' . esc_url( $url ) . '" itemprop="item">';
	}
	$html .= '<span itemprop="name">' . esc_html( $name ) . '</span>';
	if ( ! empty( $url ) ) {
		$html .= '</a>';
	}
	$html .= '<meta itemprop="position" content="' . esc_attr( $diagnoseo_bc_position ) . '" />';
	$html .= '</li>';

	return $html;

}

/**
 * Creates item's ancestor list
 *
 * @param integer $post_id Post id.
 */
function diagnoseo_prepare_ancestors( $post_id ) {
	$post_array = get_post_ancestors( $post_id );
	krsort( $post_array );

	$items = '';

	foreach ( $post_array as $diagnoseo_key => $postid ) {
		$post   = get_post( $postid );
		$title  = $post->post_title;
		$items .= diagnoseo_prepare_item( $title, get_permalink( $post ) );
	}

	return $items;
}

/**
 * Creates a category path for the post
 *
 * @param integer $post_id Post id.
 * @param string  $taxonomy Taxonomy slug.
 */
function diagnoseo_prepare_category_path( $post_id, $taxonomy ) {
	$html  = '';
	$terms = wp_get_post_terms(
			$post_id,
			$taxonomy,
			array(
				'orderby' => 'parent',
				'order'   => 'DESC',
			)
		);

	if ( ! empty( $terms ) ) {
		$main_term = $terms[0];
		$ancestors = get_ancestors( $main_term->term_id, $taxonomy );
		$ancestors = array_reverse( $ancestors );
		foreach ( $ancestors as $ancestor ) {
			$ancestor = get_term( $ancestor, $taxonomy );
			if ( ! is_wp_error( $ancestor ) && $ancestor ) {
				$html .= diagnoseo_prepare_item( esc_html( $ancestor->name ), get_term_link( $ancestor->slug, $taxonomy ) );
			}
		}
		$html .= diagnoseo_prepare_item( esc_html( $main_term->name ), get_term_link( $main_term->slug, $taxonomy ) );
	}

	return $html;
}
