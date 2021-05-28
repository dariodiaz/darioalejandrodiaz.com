<?php
/**
 * Page template
 *
 * @package WordPress
 * @subpackage SEO
 */

?>


<?php
get_header();

if ( have_posts() ) :
	while ( have_posts() ) :
		the_post();
		$this_post_id = get_the_id();
		?>
<main class="main">
	<article class="page single">
		<?php if ( has_post_thumbnail() ) : ?>
		<div class="post-image"><?php the_post_thumbnail(); ?></div>
		<?php endif; ?>
		<div class="post-content">
			<h1 class="post-title"><?php the_title(); ?> <?php edit_post_link( esc_html__( 'Edit this entry', 'diagnoseo' ), '', '' ); ?></h1>

			<?php the_content(); ?>
			<?php
			wp_link_pages(
				array(
					'before'         => '<p class="pages"><strong>' . esc_html__( 'Pages', 'diagnoseo' ) . ':</strong> ',
					'after'          => '</p>',
					'next_or_number' => 'number',
					'aria_current'   => 'page',
				)
			);
			?>
		</div>
	</article>

	<?php comments_template(); ?>
</main>
		<?php
	endwhile;
endif;
?>

<?php get_sidebar(); ?>
<?php get_footer(); ?>
