<?php
/**
 * Related posts functions
 *
 * @package WordPress
 * @subpackage SEO
 */

?>
<?php
/**
 * Fetches posts based on categories
 *
 * @param array   $post_categories Array of term objects.
 * @param integer $limit Post count. -1 = no limit.
 * @param array   $exclude_ids Post ids to exclude.
 */
function diagnoseo_get_posts_by_cats( $post_categories, $limit = -1, $exclude_ids = array() ) {
	$cids = array();
	foreach ( $post_categories as $term ) {
		$cids[] = $term->term_id;
	}
	$options = array(
		'post_type'           => 'post',
		'post_status'         => 'publish',
		'category__in'        => $cids,
		'posts_per_page'      => $limit,
		'post__not_in'        => $exclude_ids,
		'ignore_sticky_posts' => true,
	);
	$query   = new WP_Query( $options );
	return $query;
}

/**
 * Prepares query data to retrieve related posts
 *
 * @param object  $post Current post object.
 * @param integer $limit Number of related posts to get.
 */
function diagnoseo_prepare_related_queries( $post, $limit ) {
	$post_cats = wp_get_post_categories( $post->ID, array( 'fields' => 'all' ) );

	$queries = array();

	while ( ! empty( $post_cats ) ) {
		$query     = diagnoseo_get_posts_by_cats( $post_cats, $limit, array( $post->ID ) );
		$queries[] = $query;

		if ( $limit > 0 ) {
			$limit -= $query->found_posts;
		}

		if ( $limit > 0 ) {
			$cids = array();
			foreach ( $post_cats as $child ) {
				if ( ! empty( $child->parent ) ) {
					$cids[] = $child->parent;
				}
			}

			$post_cats = empty( $cids ) ? false : get_categories( array( 'include' => $cids ) );
		} else {
			break;
		}
	}

	return $queries;
}

/**
 * Gets related posts
 *
 * @param object  $post Current post object.
 * @param integer $limit Number of posts to retrieve.
 */
function diagnoseo_related_posts( $post, $limit = 6 ) {
	$max_posts = $limit;
	$queries   = diagnoseo_prepare_related_queries( $post, $limit );
	?>
	<div class="related-posts additional-post-list">
		<h2 class="postlist-title"><span><?php esc_html_e( 'Related posts', 'diagnoseo' ); ?></span></h2>
		<div class="columns">
		<?php
		foreach ( $queries as $query ) :
			if ( $query->have_posts() ) :
				while ( $query->have_posts() ) :
					$query->the_post();
					?>
					<article class="col col3">
						<div class="post">
						<?php if ( has_post_thumbnail() ) : ?>
						<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( 'seo-thumbnail-slider', array() ); ?></a>
						<?php endif; ?>
						<div class="post-content">
							<h3 class="post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
							<?php
							if ( ! has_post_thumbnail() ) {
								echo wp_kses_post( wpautop( diagnoseo_custom_excerpt( 15, $post ) ) );
							}
							?>
						</div>
						</div>
					</article>
					<?php
				endwhile;
			endif;
		endforeach;
		?>
		</div>
	</div>
	<?php

	wp_reset_postdata();
}
