<?php
/**
 * Munk Customizer Defaults Class.
 *
 * @package munk
 *
 * @since 2.0.0
 *
 * @access  public
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

	
/**
* Set our Customizer default options
*/
if ( ! function_exists( 'munk_customizer_defaults' ) ) :
		function munk_customizer_defaults() {
			$customizer_defaults = array(
                // above header
                'munk_layout_site_header_above_ed' => 'none',
                'munk_layout_site_header_above_section_one' => 'text',
                'munk_layout_site_header_above_section_one_text' => esc_html__( 'Call Us: 1800-123-456-7890', 'munk' ),
                'munk_layout_site_header_above_section_one_shortcode' => '',
                'munk_layout_site_header_above_section_one_menu' => '0',
                'munk_layout_site_header_above_section_two' => 'search',
                'munk_layout_site_header_above_section_two_text' => esc_html__( 'Call Us: 1800-123-456-7890', 'munk' ),
                'munk_layout_site_header_above_section_two_shortcode' => '',
                'munk_layout_site_header_above_section_two_menu' => '0',
                'munk_color_header_above_ed' => json_encode(array(
					'bgcolor' => '#f5f6f7',
					'text'    => '#101010',
					'link'    => '#101010',
					'hover'   => MUNK_ACCENT_COLOR,
				)),
                'munk_typography_header_above_ed' => json_encode(array(
					'font'    				=> 'IBM Plex Sans',
					'variant'        		=> '400',
					'fontsize_desktop'  	=> '14px',
					'fontsize_tablet'   	=> '14px',
					'fontsize_mobile'   	=> '14px',
					'lineheight_desktop'	=> '1.6',
					'lineheight_tablet'		=> '1.6',
					'lineheight_mobile'		=> '1.6',
					'texttransform_desktop' => 'none',
					'texttransform_tablet' 	=> 'none',
					'texttransform_mobile' 	=> 'none',
					'textalign_desktop'     => 'left',		
					'textalign_tablet'     	=> 'left',		
					'textalign_mobile'     	=> 'left',		
                )),       
                //below header         
                'munk_layout_site_header_below_ed' => 'none',
                'munk_layout_site_header_below_section_one' => 'text',
                'munk_layout_site_header_below_section_one_text' => esc_html__( 'Call Us: 1800-123-456-7890', 'munk' ),
                'munk_layout_site_header_below_section_one_shortcode' => '',
                'munk_layout_site_header_below_section_one_menu' => '0',
                'munk_layout_site_header_below_section_two' => 'none',
                'munk_layout_site_header_below_section_two_text' => esc_html__( 'Call Us: 1800-123-456-7890', 'munk' ),
                'munk_layout_site_header_below_section_two_shortcode' => '',
                'munk_layout_site_header_below_section_two_menu' => '0',
                'munk_color_header_below_ed' => json_encode(array(
                    'bgcolor' => '#f5f6f7',
                    'text'    => '#101010',
                    'link'    => '#101010',
                    'hover'   => MUNK_ACCENT_COLOR,
                )),
                'munk_typography_header_below_ed' => json_encode(array(
					'font'    				=> 'IBM Plex Sans',
					'variant'        		=> 'regular',
					'fontsize_desktop'  	=> '14px',
					'fontsize_tablet'   	=> '14px',
					'fontsize_mobile'   	=> '14px',
					'lineheight_desktop'	=> '1.6',
					'lineheight_tablet'		=> '1.6',
					'lineheight_mobile'		=> '1.6',
					'texttransform_desktop' => 'none',
					'texttransform_tablet' 	=> 'none',
					'texttransform_mobile' 	=> 'none',
					'textalign_desktop'     => 'left',		
					'textalign_tablet'     	=> 'left',		
					'textalign_mobile'     	=> 'left',											
                )),
                // primary header
                'munk_layout_site_header_primary_ed' => 'layout-one',
                'munk_layout_site_header_primary_menu' => '1',
                'munk_layout_site_header_primary_padding' => json_encode(array(
						'top' => array (
							'desktop'	=> '10px',
							'tablet' 	=> '10px',
							'mobile' 	=> '10px',
						),
						'bottom' => array (
							'desktop'	=> '10px',
							'tablet' 	=> '10px',
							'mobile' 	=> '10px',
						),
					)
				),
                'munk_layout_site_header_primary_border_ed' => '1px',
                'munk_layout_site_header_primary_border_color' => '#d4dadf',
                'munk_layout_site_header_shadow' => '1',
                'munk_layout_site_header_primary_margin_bottom' => '0',
                'munk_color_header_primary_ed' => json_encode(array(
                    'bgcolor-header' => '#FFFFFF',
                    'text'    => '#101010',
                    'link'    => '#101010',
                    'hover'   => '#101010',
                )),
                //Sticky Header
                'munk_layout_site_header_sticky_ed' => 0,
                'munk_layout_site_header_sticky_padding' => json_encode(array(
						'top' => array (
							'desktop'	=> '5px',
							'tablet' 	=> '5px',
							'mobile' 	=> '5px',
						),					
						'bottom' => array (
							'desktop'	=> '5px',
							'tablet' 	=> '5px',
							'mobile' 	=> '5px',
						),
					)
				),			
                'munk_layout_site_header_sticky_logo' => '100',
                'munk_layout_site_header_sticky_border_ed' => '1px',
                'munk_layout_site_header_sticky_border_color' => '#d4dadf',
                //Archive
                'munk_layout_blog_archive_ed' => 'right-sidebar',
                'munk_layout_blog_archive_entry_padding' => json_encode(array(
						'top' => array (
							'desktop'	=> '25px',
							'tablet' 	=> '25px',
							'mobile' 	=> '15px',
						),
						'right' => array (
							'desktop'	=> '45px',
							'tablet' 	=> '25px',
							'mobile' 	=> '15px',
						),					
						'bottom' => array (
							'desktop'	=> '25px',
							'tablet' 	=> '25px',
							'mobile' 	=> '15px',
						),
						'left' => array (
							'desktop'	=> '45px',
							'tablet' 	=> '25px',
							'mobile' 	=> '15px',
						)
					)
				),			
                'munk_layout_blog_archive_entry_margin' => json_encode(array(
						'top' => array (
							'desktop'	=> '0px',
							'tablet' 	=> '0px',
							'mobile' 	=> '0px',
						),
						'right' => array (
							'desktop'	=> '0px',
							'tablet' 	=> '0px',
							'mobile' 	=> '0px',
						),					
						'bottom' => array (
							'desktop'	=> '0px',
							'tablet' 	=> '0px',
							'mobile' 	=> '0px',
						),
						'left' => array (
							'desktop'	=> '0px',
							'tablet' 	=> '0px',
							'mobile' 	=> '0px',
						)
                )),
                'munk_layout_blog_archive_content_ed' => 'title,meta,image,content',			                
                'munk_layout_blog_archive_post_meta' => 'author,date,category,comments',                
                'munk_layout_blog_archive_meta_icon' => '1',
                'munk_layout_blog_archive_post_content' => 'excerpt',
                'munk_layout_blog_archive_excert_length' => '55',
                'munk_layout_blog_archive_excert_read_more' => esc_html__( 'Read More', 'munk' ),
                'munk_layout_blog_archive_pagination' => 'default',
                //Single Post
                'munk_layout_single_post_ed' => 'right-sidebar',
                'munk_layout_single_entry_padding' => json_encode(array(
						'top' => array (
							'desktop'	=> '25px',
							'tablet' 	=> '25px',
							'mobile' 	=> '15px',
						),
						'right' => array (
							'desktop'	=> '45px',
							'tablet' 	=> '25px',
							'mobile' 	=> '15px',
						),					
						'bottom' => array (
							'desktop'	=> '25px',
							'tablet' 	=> '25px',
							'mobile' 	=> '15px',
						),
						'left' => array (
							'desktop'	=> '45px',
							'tablet' 	=> '25px',
							'mobile' 	=> '15px',
						)
                )),
                'munk_layout_single_entry_margin' => json_encode(array(
						'top' => array (
							'desktop'	=> '0px',
							'tablet' 	=> '0px',
							'mobile' 	=> '0px',
						),
						'right' => array (
							'desktop'	=> '0px',
							'tablet' 	=> '0px',
							'mobile' 	=> '0px',
						),					
						'bottom' => array (
							'desktop'	=> '0px',
							'tablet' 	=> '0px',
							'mobile' 	=> '0px',
						),
						'left' => array (
							'desktop'	=> '0px',
							'tablet' 	=> '0px',
							'mobile' 	=> '0px',
						)
                )),
                'munk_layout_single_post_content_pos' => 'title,meta,image,content',			                
                'munk_layout_single_post_meta' => 'author,date,category,comments',   				
                'munk_layout_single_post_meta_icon' => 1,
                'munk_layout_single_post_author_ed' => 0,
                'munk_layout_single_post_author_title' => esc_html__( 'Author Title', 'munk' ),          
                //Single Page
                'munk_layout_single_page_ed' => 'right-sidebar',
                'munk_layout_single_page_entry_padding' => json_encode(array(
						'top' => array (
							'desktop'	=> '25px',
							'tablet' 	=> '25px',
							'mobile' 	=> '15px',
						),
						'right' => array (
							'desktop'	=> '45px',
							'tablet' 	=> '25px',
							'mobile' 	=> '15px',
						),					
						'bottom' => array (
							'desktop'	=> '25px',
							'tablet' 	=> '25px',
							'mobile' 	=> '15px',
						),
						'left' => array (
							'desktop'	=> '45px',
							'tablet' 	=> '25px',
							'mobile' 	=> '15px',
						)
                )),
                'munk_layout_single_page_entry_margin' => json_encode(array(
						'top' => array (
							'desktop'	=> '0px',
							'tablet' 	=> '0px',
							'mobile' 	=> '0px',
						),
						'right' => array (
							'desktop'	=> '0px',
							'tablet' 	=> '0px',
							'mobile' 	=> '0px',
						),					
						'bottom' => array (
							'desktop'	=> '0px',
							'tablet' 	=> '0px',
							'mobile' 	=> '0px',
						),
						'left' => array (
							'desktop'	=> '0px',
							'tablet' 	=> '0px',
							'mobile' 	=> '0px',
						)
                )),
                'munk_layout_single_page_content_pos' => 'title,image,content',
                // Content Color
                'munk_color_general_bgcolor' => '#ffffff',
                'munk_color_general_title_color' => '#212529',
                'munk_color_general_text_color' => '#212529',
                'munk_color_general_link_color' => '#212529',
                'munk_color_general_link_hover' => '#212529',
                'munk_color_general_post_meta' => '#212529',       
                //Content Typography
                'munk_typography_general_content' => json_encode(array(
					'font'    				=> 'IBM Plex Sans',
					'variant'        		=> 'regular',
					'fontsize_desktop'  	=> '16px',
					'fontsize_tablet'   	=> '16px',
					'fontsize_mobile'   	=> '16px',
					'lineheight_desktop'	=> '1.6',
					'lineheight_tablet'		=> '1.6',
					'lineheight_mobile'		=> '1.6',
					'texttransform_desktop' => 'none',
					'texttransform_tablet' 	=> 'none',
					'texttransform_mobile' 	=> 'none',
					'textalign_desktop'     => 'left',		
					'textalign_tablet'     	=> 'left',		
					'textalign_mobile'     	=> 'left',						
                )),
                'munk_typography_general_post_title' => json_encode(array(
					'font'    				=> 'IBM Plex Sans',
					'variant'        		=> '600',
					'fontsize_desktop'  	=> '25px',
					'fontsize_tablet'   	=> '25px',
					'fontsize_mobile'   	=> '25px',
					'lineheight_desktop'	=> '1.6',
					'lineheight_tablet'		=> '1.6',
					'lineheight_mobile'		=> '1.6',
					'texttransform_desktop' => 'none',
					'texttransform_tablet' 	=> 'none',
					'texttransform_mobile' 	=> 'none',
					'textalign_desktop'     => 'left',		
					'textalign_tablet'     	=> 'left',		
					'textalign_mobile'     	=> 'left',						
                )),
                'munk_typography_general_post_content' =>  json_encode(array(
					'font'    				=> 'IBM Plex Sans',
					'variant'        		=> 'regular',
					'fontsize_desktop'  	=> '16px',
					'fontsize_tablet'   	=> '16px',
					'fontsize_mobile'   	=> '16px',
					'lineheight_desktop'	=> '1.6',
					'lineheight_tablet'		=> '1.6',
					'lineheight_mobile'		=> '1.6',
					'texttransform_desktop' => 'none',
					'texttransform_tablet' 	=> 'none',
					'texttransform_mobile' 	=> 'none',
					'textalign_desktop'     => 'left',		
					'textalign_tablet'     	=> 'left',		
					'textalign_mobile'     	=> 'left',											
                )),
                'munk_typography_general_post_meta' => json_encode(array(
					'font'    				=> 'IBM Plex Sans',
					'variant'        		=> 'regular',
					'fontsize_desktop'  	=> '14px',
					'fontsize_tablet'   	=> '14px',
					'fontsize_mobile'   	=> '14px',
					'lineheight_desktop'	=> '1.6',
					'lineheight_tablet'		=> '1.6',
					'lineheight_mobile'		=> '1.6',
					'texttransform_desktop' => 'none',
					'texttransform_tablet' 	=> 'none',
					'texttransform_mobile' 	=> 'none',
					'textalign_desktop'     => 'left',		
					'textalign_tablet'     	=> 'left',		
					'textalign_mobile'     	=> 'left',						
                )),    
                //footer widgets area
                'munk_layout_footer_ed' => 'three-col',
                'munk_color_footer_widgets' => json_encode(array(
                    'bgcolor' 		  => '#292E37',
                    'widget-title'    => '#c5ccd8',
                    'text'    => '#c5ccd8',			
                    'link'    => '#c5ccd8',
                    'hover'   => '#c5ccd8',
                )),                
                'munk_typography_footer_widget_title' => json_encode(array(
					'font'    				=> 'IBM Plex Sans',
					'variant'        		=> 'regular',
					'fontsize_desktop'  	=> '18px',
					'fontsize_tablet'   	=> '18px',
					'fontsize_mobile'   	=> '18px',
					'lineheight_desktop'	=> '1.6',
					'lineheight_tablet'		=> '1.6',
					'lineheight_mobile'		=> '1.6',
					'texttransform_desktop' => 'none',
					'texttransform_tablet' 	=> 'none',
					'texttransform_mobile' 	=> 'none',
					'textalign_desktop'     => 'left',		
					'textalign_tablet'     	=> 'left',		
					'textalign_mobile'     	=> 'left',						
                )),
                'munk_typography_footer_widget_content' => json_encode(array(
					'font'    				=> 'IBM Plex Sans',
					'variant'        		=> 'regular',
					'fontsize_desktop'  	=> '15px',
					'fontsize_tablet'   	=> '15px',
					'fontsize_mobile'   	=> '15px',
					'lineheight_desktop'	=> '1.6',
					'lineheight_tablet'		=> '1.6',
					'lineheight_mobile'		=> '1.6',
					'texttransform_desktop' => 'none',
					'texttransform_tablet' 	=> 'none',
					'texttransform_mobile' 	=> 'none',
					'textalign_desktop'     => 'left',		
					'textalign_tablet'     	=> 'left',		
					'textalign_mobile'     	=> 'left',						
                )),
                //footer copyright area
                'munk_layout_footer_copyright_layout' => 'left-align',
                'munk_footer_copyright' => '',
                'munk_ed_author_link' => '1',
                'munk_ed_wp_link' => '1',
                'munk_color_footer_copyright' => json_encode(array(
                    'bgcolor' => '#262b33',
                    'text'    => '#afb7c5',			
                    'link'    => '#afb7c5',
                )),
                'munk_typography_footer_copyright' => json_encode(array(
					'font'    				=> 'IBM Plex Sans',
					'variant'        		=> 'regular',
					'fontsize_desktop'  	=> '14px',
					'fontsize_tablet'   	=> '14px',
					'fontsize_mobile'   	=> '14px',
					'lineheight_desktop'	=> '1.6',
					'lineheight_tablet'		=> '1.6',
					'lineheight_mobile'		=> '1.6',
					'texttransform_desktop' => 'none',
					'texttransform_tablet' 	=> 'none',
					'texttransform_mobile' 	=> 'none',
					'textalign_desktop'     => 'left',		
					'textalign_tablet'     	=> 'left',		
					'textalign_mobile'     	=> 'left',						
                )),
                //buttons
                'munk_color_primary_button' =>json_encode( array(
                    'bgcolor' => '#0161bd',
                    'text'    => '#ffffff',			
                    'hover-bg'    => '#075aaa',
                    'hover-text'   => '#ffffff',
                )),
                'munk_typography_primary_button' => json_encode(array(
					'font'    				=> 'IBM Plex Sans',
					'variant'        		=> 'regular',
					'fontsize_desktop'  	=> '15px',
					'fontsize_tablet'   	=> '15px',
					'fontsize_mobile'   	=> '15px',
					'lineheight_desktop'	=> '1.6',
					'lineheight_tablet'		=> '1.6',
					'lineheight_mobile'		=> '1.6',
					'texttransform_desktop' => 'none',
					'texttransform_tablet' 	=> 'none',
					'texttransform_mobile' 	=> 'none',
					'textalign_desktop'     => 'center',		
					'textalign_tablet'     	=> 'center',		
					'textalign_mobile'     	=> 'center',						
                )),
                //container
                'munk_layout_container_default_ed' => 'default',
                'munk_layout_default_container_width' => '1140',
                'munk_layout_boxed_container_width' => '1140',
                'munk_layout_boxed_container_inner_width' => '1140',
                'munk_layout_contained_container_width' => '1140',      
                //Main Navigation
                'munk_color_main_nav_ed' => json_encode(array(
                    'bgcolor' => '#ffffff',
                    'link'    => '#101010',
                    'hover'   => MUNK_ACCENT_COLOR,
                )),
                'munk_color_main_nav_submenu' => json_encode(array(
                    'bgcolor' => '#292E37',
                    'link'    => '#ffffff',
                    'hover'   => '#ffffff',
                )),
                'munk_color_main_nav_toggle' => json_encode(array(
                    'bgcolor' => '#101010',
                    'link'    => '#ffffff',
                )),
                'munk_typography_main_nav_ed' => json_encode(array(
					'font'    				=> 'IBM Plex Sans',
					'variant'        		=> 'regular',
					'fontsize_desktop'  	=> '15px',
					'fontsize_tablet'   	=> '15px',
					'fontsize_mobile'   	=> '15px',
					'lineheight_desktop'	=> '1.6',
					'lineheight_tablet'		=> '1.6',
					'lineheight_mobile'		=> '1.6',
					'texttransform_desktop' => 'none',
					'texttransform_tablet' 	=> 'none',
					'texttransform_mobile' 	=> 'none',
					'textalign_desktop'     => 'left',		
					'textalign_tablet'     	=> 'left',		
					'textalign_mobile'     	=> 'left',						
                )),
                //sidebar
                'munk_layout_sidebar_padding' => json_encode(array(
						'top' => array (
							'desktop'	=> '45px',
							'tablet' 	=> '25px',
							'mobile' 	=> '15px',
						),
						'right' => array (
							'desktop'	=> '45px',
							'tablet' 	=> '25px',
							'mobile' 	=> '15px',
						),					
						'bottom' => array (
							'desktop'	=> '45px',
							'tablet' 	=> '25px',
							'mobile' 	=> '15px',
						),
						'left' => array (
							'desktop'	=> '45px',
							'tablet' 	=> '25px',
							'mobile' 	=> '15px',
						)
					)
				),			
                'munk_color_main_sidebar' => json_encode(array(
                    'bgcolor' => '#f5f6f7',
                    'widget-title'    => '#191919',
                    'widget-title-bg' => '#f5f6f7',			
                    'text'    => '#212529',			
                    'link'    => '#212529',
                    'hover'   => '#212529',
                )),
                'munk_typography_sidebar_widget_title' => json_encode(array(
                    'text-transform' => 'none',
					'font'    				=> 'IBM Plex Sans',
					'variant'        		=> '600',
					'fontsize_desktop'  	=> '21px',
					'fontsize_tablet'   	=> '21px',
					'fontsize_mobile'   	=> '21px',
					'lineheight_desktop'	=> '1.6',
					'lineheight_tablet'		=> '1.6',
					'lineheight_mobile'		=> '1.6',
					'texttransform_desktop' => 'none',
					'texttransform_tablet' 	=> 'none',
					'texttransform_mobile' 	=> 'none',
					'textalign_desktop'     => 'left',		
					'textalign_tablet'     	=> 'left',		
					'textalign_mobile'     	=> 'left',						
                )),
                'munk_typography_sidebar_widget_content' => json_encode(array(
					'font'    				=> 'IBM Plex Sans',
					'variant'        		=> 'regular',
					'fontsize_desktop'  	=> '14px',
					'fontsize_tablet'   	=> '14px',
					'fontsize_mobile'   	=> '14px',
					'lineheight_desktop'	=> '1.6',
					'lineheight_tablet'		=> '1.6',
					'lineheight_mobile'		=> '1.6',
					'texttransform_desktop' => 'none',
					'texttransform_tablet' 	=> 'none',
					'texttransform_mobile' 	=> 'none',
					'textalign_desktop'     => 'left',		
					'textalign_tablet'     	=> 'left',		
					'textalign_mobile'     	=> 'left',						
                )),
                'munk_custom_logo_size_ed' => '100',
                'munk_typography_header_primary_title_ed' => json_encode(array(
					'font'    				=> 'IBM Plex Sans',
					'variant'        		=> 'regular',
					'fontsize_desktop'  	=> '22px',
					'fontsize_tablet'   	=> '22px',
					'fontsize_mobile'   	=> '22px',
					'lineheight_desktop'	=> '1.6',
					'lineheight_tablet'		=> '1.6',
					'lineheight_mobile'		=> '1.6',
					'texttransform_desktop' => 'none',
					'texttransform_tablet' 	=> 'none',
					'texttransform_mobile' 	=> 'none',
					'textalign_desktop'     => 'center',		
					'textalign_tablet'     	=> 'center',		
					'textalign_mobile'     	=> 'center',						
                )),
                'munk_typography_header_primary_desc_ed' => json_encode(array(
					'font'    				=> 'IBM Plex Sans',
					'variant'        		=> 'regular',
					'fontsize_desktop'  	=> '14px',
					'fontsize_tablet'   	=> '14px',
					'fontsize_mobile'   	=> '14px',
					'lineheight_desktop'	=> '1.6',
					'lineheight_tablet'		=> '1.6',
					'lineheight_mobile'		=> '1.6',
					'texttransform_desktop' => 'none',
					'texttransform_tablet' 	=> 'none',
					'texttransform_mobile' 	=> 'none',
					'textalign_desktop'     => 'center',		
					'textalign_tablet'     	=> 'center',		
					'textalign_mobile'     	=> 'center',						
                )),
                //WooCommerce
                'munk_color_shop_layout' => json_encode(array(
                    'shop-bg'    => '#ffffff',
                    'shop-title'    => '#212529',
                    'shop-content'   => '#212529',
                    'shop-selectbg'   => '#ffffff',			
                    'shop-selectcolor'   => '#212529',						
                )),
                'munk_color_product_card_ed' => json_encode(array(
					'category'=> '#999999',
					'title'   => '#101010',
					'price'   => '#101010',
					'rating'  => '#ee9e13',									
                )),
                'munk_color_single_product_ed' => json_encode(array(
                    'title'   => '#212529',
                    'content' => '#212529',
                    'price'   => '#0161bd',
                )),
                'munk_color_sale_ed' => json_encode(array(
                    'background'    => '#0161bd',
                    'content'    => '#ffffff',
                )),
                'munk_customize_layout_wc_product_ed' => 'right-sidebar',
                'munk_customize_layout_wc_product_padding' => json_encode(array(
					'top' => array (
						'desktop'	=> '45px',
						'tablet' 	=> '25px',
						'mobile' 	=> '15px',
					),
					'right' => array (
						'desktop'	=> '45px',
						'tablet' 	=> '25px',
						'mobile' 	=> '15px',
					),					
					'bottom' => array (
						'desktop'	=> '45px',
						'tablet' 	=> '25px',
						'mobile' 	=> '15px',
					),
					'left' => array (
						'desktop'	=> '45px',
						'tablet' 	=> '25px',
						'mobile' 	=> '15px',
					)
                )),
                'munk_customize_layout_wc_product_margin' => json_encode(array(
						'top' => array (
							'desktop'	=> '0px',
							'tablet' 	=> '0px',
							'mobile' 	=> '0px',
						),
						'right' => array (
							'desktop'	=> '0px',
							'tablet' 	=> '0px',
							'mobile' 	=> '0px',
						),					
						'bottom' => array (
							'desktop'	=> '0px',
							'tablet' 	=> '0px',
							'mobile' 	=> '0px',
						),
						'left' => array (
							'desktop'	=> '0px',
							'tablet' 	=> '0px',
							'mobile' 	=> '0px',
						)
                )),
                'munk_wc_product_gallery_zoom' => '1',
                'munk_wc_product_gallery_lightbox' => '1',
                'munk_wc_product_gallery_slider' => '1',
                'munk_wc_product_tab_layout' => 'horizontal',
                'munk_wc_product_related' => '1',
                'munk_wc_product_row' => '4',
                'munk_wc_product_col' => '4',
                'munk_customize_layout_woocommerce_ed' => 'right-sidebar',
                'munk_customize_layout_woocommerce_padding' => json_encode(array(
						'top' => array (
							'desktop'	=> '45px',
							'tablet' 	=> '25px',
							'mobile' 	=> '15px',
						),
						'right' => array (
							'desktop'	=> '45px',
							'tablet' 	=> '25px',
							'mobile' 	=> '15px',
						),					
						'bottom' => array (
							'desktop'	=> '45px',
							'tablet' 	=> '25px',
							'mobile' 	=> '15px',
						),
						'left' => array (
							'desktop'	=> '45px',
							'tablet' 	=> '25px',
							'mobile' 	=> '15px',
						)
                )),
                'munk_customize_layout_woocommerce_margin' => json_encode(array(
						'top' => array (
							'desktop'	=> '0px',
							'tablet' 	=> '0px',
							'mobile' 	=> '0px',
						),
						'right' => array (
							'desktop'	=> '0px',
							'tablet' 	=> '0px',
							'mobile' 	=> '0px',
						),					
						'bottom' => array (
							'desktop'	=> '0px',
							'tablet' 	=> '0px',
							'mobile' 	=> '0px',
						),
						'left' => array (
							'desktop'	=> '0px',
							'tablet' 	=> '0px',
							'mobile' 	=> '0px',
						)
                )),
                'munk_woocommerce_shop_per_row' => '3',
                'munk_woocommerce_shop_per_page' => '12',
                'munk_woocommerce_shop_add_to_cart_hover' => '1',
                'munk_woocommerce_shop_breadcrumbs' => '1',
                'munk_woocommerce_shop_title' => '1',				
			);
			return apply_filters( 'munk_customizer_defaults', $customizer_defaults );
		}	
endif;