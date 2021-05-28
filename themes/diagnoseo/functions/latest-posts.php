<?php
/**
 * Latest posts functions
 *
 * @package WordPress
 * @subpackage SEO
 */

?>
<?php
/**
 * Displays latest posts
 *
 * @param object  $post Current post object.
 * @param integer $limit Number of posts to show.
 */
function diagnoseo_latest_posts( $post, $limit = 6 ) {
	$cids                = wp_get_post_categories( $post->ID );

	$diagnoseo_options = array(
		'post_type'           => 'post',
		'post_status'         => 'publish',
		'posts_per_page'      => $limit,
		'post__not_in'        => array( $post->ID ),
		'ignore_sticky_posts' => true,
	);
	$latest        = new WP_Query( $diagnoseo_options );
	if ( $latest->have_posts() ) :
		?>
		<div class="latest-posts additional-post-list">
			<h2 class="postlist-title"><span><?php esc_html_e( 'Latest posts', 'diagnoseo' ); ?></span></h2>
			<div class="columns">
			<?php
			while ( $latest->have_posts() ) :
				$latest->the_post();
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
				</article><?php endwhile; ?>
			</div>
		</div>
		<?php
	endif;
	wp_reset_postdata();
}
