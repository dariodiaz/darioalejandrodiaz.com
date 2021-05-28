<?php
/**
 * Search form
 *
 * @package WordPress
 * @subpackage SEO
 */

?>

<form method="get" class="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">
<fieldset>
	<button type="submit" class="search-button" name="searchsubmit" value="<?php esc_attr_e( 'Search', 'diagnoseo' ); ?>"><i class="icon-search"></i></button><input type="text" value="<?php the_search_query(); ?>" name="s" placeholder="<?php esc_attr_e( 'Search', 'diagnoseo' ); ?>" />
</fieldset>
</form>
