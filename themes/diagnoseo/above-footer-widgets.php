<?php
/**
 * Above footer widget area
 *
 * @package WordPress
 * @subpackage SEO
 */

?>

<?php if ( diagnoseo_is_sidebar_active( 'above-footer-widget-area' ) ) : ?>
<aside class="above-footer">
	<?php dynamic_sidebar( 'above-footer-widget-area' ); ?>
</aside>
<?php endif;
