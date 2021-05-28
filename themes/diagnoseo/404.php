<?php
/**
 * 404 page template
 *
 * @package WordPress
 * @subpackage SEO
 */

?>

<?php get_header(); ?>
<div class="columns e404">
	<article class="col col2">
		<p class="e404"><?php esc_html_e( '404', 'diagnoseo' ); ?></p>
		<p><?php esc_html_e( 'Ooops, This Page Could Not Be Found!', 'diagnoseo' ); ?></p>
	</article><article class="col col2">
		<p><?php esc_html_e( "Can't find what you need?", 'diagnoseo' ); ?><br><?php esc_html_e( 'Take a moment and do a search below!', 'diagnoseo' ); ?></p>
		<?php get_search_form(); ?>
		<p><span><?php esc_html_e( 'or', 'diagnoseo' ); ?></span></p>
		<p><a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="button large"><?php esc_html_e( 'Back to Homepage', 'diagnoseo' ); ?></a></p>
	</article>
</div>
<?php get_footer(); ?>
