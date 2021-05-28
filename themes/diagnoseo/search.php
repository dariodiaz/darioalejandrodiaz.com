<?php
/**
 * Search page main template
 *
 * @package WordPress
 * @subpackage SEO
 */

?>

<?php get_header(); ?>

<div class="main postlist">
<?php
if ( have_posts() ) :
	?>
	<h1 class="page-title"><?php esc_html_e( 'Search results for: ', 'diagnoseo' ); ?> <?php echo esc_html( get_search_query() ); ?></h1>
	<?php
	while ( have_posts() ) {
		the_post();
		get_template_part( 'post-list-item' );
	}

	get_template_part( 'pager' );
	?>
<?php else : ?>

	<h1 class="page-title"><?php esc_html_e( 'No posts found. Try a different search?', 'diagnoseo' ); ?></h1>
	<div class="in-page-search"><?php get_search_form(); ?></div>

<?php endif; ?>
</div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>
