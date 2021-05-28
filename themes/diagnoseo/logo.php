<?php
/**
 * Site logo template
 *
 * @package WordPress
 * @subpackage SEO
 */

?>
<?php
$logo_link = home_url( '/' );

if ( display_header_text() ) :
	?>
	<p class="logo">
	<?php
	if ( has_custom_logo() ) :
		$custom_logo_id = get_theme_mod( 'custom_logo' );
		$logo           = wp_get_attachment_image_src( $custom_logo_id, 'full' );
		?>
		<a href="<?php echo esc_url( $logo_link ); ?>" class="logo"><img alt="<?php bloginfo( 'name' ); ?>" src="<?php echo esc_url( $logo[0] ); ?>" /></a>
	<?php else : ?>
		<a href="<?php echo esc_url( $logo_link ); ?>" class="logo"><?php bloginfo( 'name' ); ?></a>
	<?php endif; ?>
	<?php
	$description = get_bloginfo( 'description' );
	if ( ! empty( $description ) ) :
	?>
	<span class="site-tagline"><?php echo esc_html( $description ); ?></span>
	<?php
	endif;
	?>
	</p>
<?php endif; ?>
