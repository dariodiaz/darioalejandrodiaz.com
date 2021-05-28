<?php
/**
 * Menu helpers and utilities
 *
 * @package WordPress
 * @subpackage SEO
 */

?>
<?php

/**
 * Displays a menu
 */
function diagnoseo_page_menu() {
	if ( is_page() ) {
		$highlight = 'page_item current-menu-item';
	} else {
		$highlight = 'menu-item current-menu-item';
	}
	?>
	<ul class="menu"><?php wp_list_pages( 'container=&sort_column=menu_order&title_li=&link_before=&link_after=&depth=1' ); ?></ul>
	<?php
}
