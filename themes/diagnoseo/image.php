<?php
/**
 * Attachment (image) page template
 *
 * @package WordPress
 * @subpackage SEO
 */

?>

<?php get_header(); ?>
<div class="main">
	<?php
	if ( have_posts() ) :
		while ( have_posts() ) :
			the_post();
			?>
	<article class="page">
		<h1 class="page-title"><?php the_title(); ?> <?php edit_post_link( esc_html__( 'Edit this entry', 'diagnoseo' ), '', '' ); ?></h1>
		<p><a href="<?php echo esc_url( wp_get_attachment_url( $post->ID ) ); ?>"><?php echo wp_get_attachment_image( $post->ID, 'medium' ); ?></a></p>
			<?php
			if ( ! empty( $post->post_excerpt ) ) {
				the_excerpt();
			}
			wp_link_pages(
				array(
					'before'         => '<p><strong>' . esc_html__( 'Pages', 'diagnoseo' ) . ':</strong> ',
					'after'          => '</p>',
					'next_or_number' => 'number',
				)
			);
			?>
		<p class="pagination">
			<span class="alignleft"><?php previous_image_link(); ?></span>
			<span class="alignright"><?php next_image_link(); ?></span>
		</p>
	</article>

			<?php comments_template(); ?>

			<?php
		endwhile;
	endif;
	?>
</div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>
