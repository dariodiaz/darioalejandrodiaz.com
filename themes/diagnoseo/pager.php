<?php
/**
 * Pager
 *
 * @package WordPress
 * @subpackage SEO
 */

?>

<?php
global $wp_query;

if ( $wp_query->max_num_pages > 1 ) :

	$diagnoseo_nav_classes = 'navigation pagination';
	if ( isset( $diagnoseo_load_button ) ) {
		$diagnoseo_nav_classes .= ' hide';
	}
	?>
	<nav class="<?php echo esc_attr( $diagnoseo_nav_classes ); ?>">
	<?php
	if ( get_option( 'permalink_structure' ) ) {
		$format = 'page/%#%/';
	} else {
		$format = '?paged=%#%';
	}

	if ( is_search() ) {
		$page_link     = get_pagenum_link( 1 );
		$base          = substr( $page_link, 0, strpos( $page_link, '?' ) );
		$search_string = ! empty( $_GET['s'] ) ? sanitize_text_field( wp_unslash( $_GET['s'] ) ) : '';
		echo wp_kses_post(
			paginate_links(
				array(
					'base'      => $base . '%_%?s=' . $search_string,
					'format'    => $format,
					'current'   => max( 1, get_query_var( 'paged' ) ),
					'total'     => $wp_query->max_num_pages,
					'prev_text' => '<i class="pagination-icon icon-arrow_back"></i>',
					'next_text' => '<i class="pagination-icon icon-arrow_forward"></i>',
				)
			)
		);
	} else {
		echo wp_kses_post(
			paginate_links(
				array(
					'base'      => get_pagenum_link( 1 ) . '%_%',
					'format'    => $format,
					'current'   => max( 1, get_query_var( 'paged' ) ),
					'total'     => $wp_query->max_num_pages,
					'prev_text' => '<i class="pagination-icon icon-arrow_back"></i>',
					'next_text' => '<i class="pagination-icon icon-arrow_forward"></i>',
				)
			)
		);
	}
	?>
</nav>
<?php endif; ?>
