<?php
/**
 * Page footer template
 *
 * @package WordPress
 * @subpackage SEO
 */

?>

<?php get_template_part( 'above-footer-widgets'); ?>
</div>

<footer class="site-footer">
	<p class="footer-message">Copyright &copy; <?php echo esc_html( date( 'Y' ) ); ?> <?php bloginfo( 'name' ); ?> <?php if ( is_front_page() ) : ?><?php esc_html_e( '| Powered by', 'diagnoseo' ); ?> <a href="https://diagnoseo.com/seo-friendly-wordpress-theme/" target="_blank" rel="noopener">DiagnoSEO WordPress Theme</a><?php endif; ?></p>
</footer>

<div class="overlay seo-popup-overlay"></div>

<div class="seo-popup popup-search">
	<label for="search-popup-toggle" class="icon-close popup-close"></label>
	<h3 class="spec-heading"><span><?php esc_html_e( 'Search', 'diagnoseo' ); ?></span></h3>
	<?php get_search_form(); ?>
</div>
<?php wp_footer(); ?>
</body>
</html>
