<?php
/**
 * Migrations scripts for Munk theme.
 *
 * Migrating from 1.2.0 > 2.0.0
 *
 * Moved Customizer from KIRKI to Native Customizer Options
 * 
 * @subpackage Munk
 * @since 2.0.0
 */


// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

function munk_migrations_one() {

	// Bail out if the migration is already done.
	if ( get_option( 'munk_migrations_one' ) ) {
		return;
	}
	
			//typography migration
			$munk_typography_arr = array (		
					'munk_typography_header_primary_title_ed',
					'munk_typography_header_primary_desc_ed',
					'munk_typography_sidebar_widget_title',
					'munk_typography_sidebar_widget_content',
					'munk_typography_main_nav_ed',
					'munk_typography_footer_widget_title',
					'munk_typography_footer_widget_content',
					'munk_typography_footer_copyright',
					'munk_typography_general_content',
					'munk_typography_general_post_title',
					'munk_typography_general_post_content',
					'munk_typography_general_post_meta',
					'munk_typography_primary_button',
					'munk_typography_header_above_ed',
					'munk_typography_header_below_ed',		
			);
	
			foreach ($munk_typography_arr as $typography) {
				
				$type_mod = get_theme_mod($typography);
				if ($type_mod && is_array($type_mod)) {								
					
					$new_typography_arr = array();
					$new_typography_arr['font'] 					= isset($type_mod['font-family']) ? $type_mod['font-family'] : 'inherit';
					$new_typography_arr['variant'] 					= isset($type_mod['variant']) ? $type_mod['variant'] : 'regular';
					$new_typography_arr['fontsize_desktop'] 		= isset($type_mod['font-size']) ? $type_mod['font-size'] : '16px';
					$new_typography_arr['fontsize_tablet'] 			= isset($type_mod['font-size']) ? $type_mod['font-size'] : '16px';
					$new_typography_arr['fontsize_mobile'] 			= isset($type_mod['font-size']) ? $type_mod['font-size'] : '16px';
					$new_typography_arr['lineheight_desktop'] 		= isset($type_mod['line-height']) ? $type_mod['line-height'] : '1.6em';
					$new_typography_arr['lineheight_tablet'] 		= isset($type_mod['line-height']) ? $type_mod['line-height'] : '1.6em';
					$new_typography_arr['lineheight_mobile'] 		= isset($type_mod['line-height']) ? $type_mod['line-height'] : '1.6em';
					$new_typography_arr['texttransform_desktop'] 	= isset($type_mod['text-transform']) ? $type_mod['text-transform'] : 'none';
					$new_typography_arr['texttransform_tablet'] 	= isset($type_mod['text-transform']) ? $type_mod['text-transform'] : 'none';
					$new_typography_arr['texttransform_mobile'] 	= isset($type_mod['text-transform']) ? $type_mod['text-transform'] : 'none';
					$new_typography_arr['textalign_desktop'] 		= isset($type_mod['font-weight']) ? $type_mod['font-weight'] : 'left';
					$new_typography_arr['textalign_tablet'] 		= isset($type_mod['font-weight']) ? $type_mod['font-weight'] : 'left';
					$new_typography_arr['textalign_mobile'] 		= isset($type_mod['font-weight']) ? $type_mod['font-weight'] : 'left';
										
					$new_typography_json = json_encode($new_typography_arr);
					set_theme_mod($typography, $new_typography_json);
					
				}																
				
			}	
	
			//multicolor migration
			$munk_multicolor_arr = array (		
					'munk_color_shop_layout',
					'munk_color_main_sidebar',
					'munk_color_product_card_ed',
					'munk_color_single_product_ed',
					'munk_color_sale_ed',
					'munk_color_primary_button',
					'munk_color_main_nav_ed',
					'munk_color_main_nav_submenu',
					'munk_color_main_nav_toggle',
					'munk_color_footer_widgets',
					'munk_color_footer_copyright',
					'munk_color_header_above_ed',
					'munk_color_header_below_ed',
					'munk_color_header_primary_ed',	
			);
	
			foreach ($munk_multicolor_arr as $color) {
				
				$color_mod = get_theme_mod($color);
								
				if ($color_mod && is_array($color_mod)) {								
					
					$new_color_json = json_encode($color_mod, JSON_UNESCAPED_SLASHES);					
					set_theme_mod($color, $new_color_json);					
					
				}																
				
			}		
	
			//dimensions migration
			$munk_dimensions_arr = array (			
				'munk_customize_layout_wc_product_padding',
				'munk_customize_layout_wc_product_margin',
				'munk_customize_layout_woocommerce_padding',
				'munk_customize_layout_woocommerce_margin',
				'munk_layout_sidebar_padding',
				'munk_layout_single_entry_padding',
				'munk_layout_single_entry_margin',
				'munk_layout_single_page_entry_padding',
				'munk_layout_single_page_entry_margin',
				'munk_layout_blog_archive_entry_padding',
				'munk_layout_blog_archive_entry_margin',
				'munk_layout_site_header_sticky_padding',
				'munk_layout_site_header_primary_padding',
			);
	
			foreach ($munk_dimensions_arr as $dimension) {
				
				$dimension_mod = get_theme_mod($dimension);	
				if ($dimension_mod && is_array($dimension_mod)) {
					$new_dimension_arr = array();				
					foreach ($dimension_mod as $key => $value) {
						
						if (preg_match('/^[a-z]+_[a-z]+$/i', $key)) {
							$new_key = substr($key, strpos($key, "_") + 1);
						} else {
							$new_key = substr($key, strpos($key, "-") + 1);
						}						
						
						
						$new_dimension_arr[$new_key] = array (
							'desktop' => $dimension_mod[$key],
							'tablet'  => $dimension_mod[$key],
							'mobile'  => $dimension_mod[$key],
						);	

						$new_dimension_json = json_encode($new_dimension_arr);					
						set_theme_mod($dimension, $new_dimension_json);						
					}					
				}
				
			}	
	
			//sortable pills migration
			$munk_sortable_pills_arr = array (			
				'munk_layout_blog_archive_content_ed',
				'munk_layout_blog_archive_post_meta',				
				'munk_layout_single_post_content_pos',
				'munk_layout_single_post_meta',				
				'munk_layout_single_page_content_pos',
			);	
	
			foreach ($munk_sortable_pills_arr as $pills) {	
				//get mods value
				$pills_mod = get_theme_mod($pills);				
				
				//check if value exists
				if ($pills_mod && is_array($pills_mod)) {			
					
					// convert array to string
					$pills_mod_string = implode(',', $pills_mod);						
					
					// new string as theme_mod
					set_theme_mod($pills, $pills_mod_string);		
					
					
				}				
				
			}
			
	

	// Set flag to not repeat the migration process, ie, run it only once.
	update_option( 'munk_migrations_one', true );

}
add_action( 'after_setup_theme', 'munk_migrations_one' );