<?php
/**
 * Post list item - post with a medium image
 *
 * @package WordPress
 * @subpackage SEO
 */

?>
<?php
$diagnoseo_post_classes = 'post-list-item';
if ( is_sticky( get_the_id() ) ) {
	$diagnoseo_post_classes .= ' sticky';
}
?>
<article <?php post_class( $diagnoseo_post_classes ); ?>>
	<?php if ( has_post_thumbnail() ) : ?>
	<a href="<?php the_permalink(); ?>" class="post-image"><?php the_post_thumbnail(); ?></a>
	<?php endif; ?>
	<div class="post-content">
		<h2 class="post-title"><a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a> <?php edit_post_link( esc_html__( 'Edit this entry', 'diagnoseo' ), '', '' ); ?></h2>
		<p class="post-meta">
			<?php if ( 0 !== count( get_the_category() ) ) : ?>
			<span class="meta meta-category"><?php the_category( ', ' ); ?></span> <i class="meta-sep">/</i>
			<?php endif; ?>
			<span class="meta meta-date"><?php the_time( get_option( 'date_format' ) ); ?></span> <i class="meta-sep">/</i>
			<span class="meta meta-author"><?php the_author(); ?></span>
			<?php if ( comments_open() ) : ?>
			<i class="meta-sep">/</i> <span class="meta meta-comments"><?php comments_popup_link( '0', '1', '%', 'icon-comment comment-link' ); ?></span>
			<?php endif; ?>
		</p>

		<p class="post-excerpt"><?php echo get_the_excerpt(); ?></p>
		<p class="read-more"><a href="<?php the_permalink(); ?>"><?php esc_html_e( 'Read more', 'diagnoseo' ); ?></a></p>
	</div>
</article>
