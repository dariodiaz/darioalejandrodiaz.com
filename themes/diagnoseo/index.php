<?php
/**
 * Basic post list template
 *
 * @package WordPress
 * @subpackage SEO
 */

?>

<?php get_header(); ?>

<div class="main postlist">
	<?php if ( ! empty( $diagnoseo_load_posts ) ) : ?>
		<div class="<?php echo esc_attr( $diagnoseo_load_posts ); ?>">
	<?php endif; ?>
	<?php
	if ( have_posts() ) {
		while ( have_posts() ) {
			the_post();
			get_template_part( 'post-list-item', null );
		}
	}
	?>
	<?php if ( ! empty( $diagnoseo_load_posts ) ) : ?>
		</div>
	<?php endif; ?>
	<?php get_template_part( 'pager' ); ?>
</div>

<?php get_sidebar(); ?>

<?php get_footer(); ?>
