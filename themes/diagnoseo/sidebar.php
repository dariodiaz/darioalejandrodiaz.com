<?php
/**
 * Sidebar template - basic sidebar
 *
 * @package WordPress
 * @subpackage SEO
 */

?>
<aside class="sidebar">
	<?php
	if ( ! dynamic_sidebar( 'sidebar-widget-area' ) ) :
		?>
		<div class="widget">
			<h3><span><?php esc_html_e( 'Pages', 'diagnoseo' ); ?></span></h3>
			<ul>
				<?php wp_list_pages( 'title_li=' ); ?>
			</ul>
		</div>
		<div class="widget">
			<h3><span><?php esc_html_e( 'Categories', 'diagnoseo' ); ?></span></h3>
			<ul>
				<?php wp_list_categories( 'title_li=' ); ?>
			</ul>
		</div>
		<div class="widget">
			<h3><span><?php esc_html_e( 'Archives', 'diagnoseo' ); ?></span></h3>
			<ul>
				<?php wp_get_archives( 'type=monthly' ); ?>
			</ul>
		</div>
		<?php
		if ( is_home() || is_page() ) :
			?>
		<div class="widget">
			<h3><span><?php esc_html_e( 'Meta', 'diagnoseo' ); ?></span></h3>
			<ul>
				<?php wp_register(); ?>
				<li><?php wp_loginout(); ?></li>
				<?php wp_meta(); ?>
			</ul>
		</div>
		<?php endif; ?>
	<?php endif; ?>
</aside>
