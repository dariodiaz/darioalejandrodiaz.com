<?php
/**
 * Page header template
 *
 * @package WordPress
 * @subpackage SEO
 */

?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head itemscope itemtype="http://schema.org/WebPage">
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<?php wp_body_open(); ?>
	<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'diagnoseo' ); ?></a>
	<input type="checkbox" id="search-popup-toggle" class="hidden" value="1" />
	<header class="site-header"
		<?php
		$header_image = get_header_image();
		if ( ! empty( $header_image ) ) : ?>
			style="background-image: url(<?php echo esc_url( $header_image ); ?>)"
		<?php endif; ?>
	>
		<div class="main-header">
			<input type="checkbox" id="checkbox-mainmenu" value="1" class="hidden" access-key="m" />
			<div class="site-title links-right">
				<?php get_template_part( 'logo' ); ?>
				<label for="checkbox-mainmenu" class="menu-toggle" data-menu="mainmenu"><span class="menu-toggle-content">
					<span class="menu-icon"></span>
				</span></label>
			</div>

			<nav class="mainmenu submenu-animation-fade-move rotate-submenu-icon" itemscope itemtype="http://www.schema.org/SiteNavigationElement">
				<?php get_search_form(); ?>
				<?php get_template_part( 'logo' ); ?>
				<ul class="menu">
					<?php
					wp_nav_menu(
						array(
							'fallback_cb'    => 'diagnoseo_page_menu',
							'depth'          => '2',
							'theme_location' => 'primary',
							'link_before'    => '',
							'link_after'     => '',
							'container'      => false,
							'items_wrap'     => '%3$s',
							'walker'         => new diagnoseo_Menu_Walker(),
						)
					);
					?>
					<li class="menu-item-search"><label for="search-popup-toggle" class="search-popup-link"><i class="icon-search"></i></label></li>
				</ul>
			</nav>
		</div>
	</header>

<?php

diagnoseo_breadcrumbs();

/**
 * Content area and its classes
 */

$content_classes = array(
	'content',
	'btn-type-flat',
	'has-sidebar',
	'fancy-borders',
 );

if ( is_single() ) {
	switch ( get_post_type() ) {
		case 'post':
			$schema_type = 'Article';
			break;
	}
}
?>
<div class="<?php echo esc_attr( implode( ' ', $content_classes ) ); ?>" id="content"
<?php
if ( is_single() ) :
	?>
	itemscope itemtype="http://schema.org/<?php echo esc_attr( $schema_type ); ?>"
	<?php
endif;
?>
>
