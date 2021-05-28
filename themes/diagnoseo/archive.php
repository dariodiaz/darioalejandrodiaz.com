<?php
/**
 * Archive page template
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

	<h1 class="page-title"><?php the_archive_title(); ?></h1>
	<?php
	$description = category_description();
	if ( ! empty( $description ) ) :
		?>
		<div class="category-description"><?php echo wp_kses_post( $description ); ?></div>
		<?php
	endif;

	if ( have_posts() ) {
		while ( have_posts() ) {
			the_post();
			get_template_part( 'post-list-item', null );
		}
	} else {
		?>
		<p><?php esc_html_e('The archive is empty', 'diagnoseo' ); ?></p>
		<?php
	}
	?>

	<?php if ( ! empty( $diagnoseo_load_posts ) ) : ?>
		</div>
	<?php endif; ?>

	<?php get_template_part( 'pager' ); ?>
</div>

<?php get_sidebar(); ?>
<?php get_footer(); ?>
