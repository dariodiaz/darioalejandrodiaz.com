<?php
/**
 * Munk Customizer Register Panels and Sections
 *
 * This class registers all the panels and sections for customizer.
 *
 * @since 2.0.0
 *
 * @package munk
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'Munk_Customizer_Panels_Sections' ) ) :

	/**
	 * Munk Customizer class
	 */
	class Munk_Customizer_Panels_Sections {
		/**
		 * Constructor - Setup customizer
		 */
		public function __construct() {

			add_action( 'customize_register', array( $this, 'munk_register_panels' ) );			

		}
		
		public function munk_register_panels( $wp_customize ) {						
			
			// All The Panels Goes Here			
			$wp_customize->add_panel( 'munk_layouts_header', array(
				'priority'       => 5,
				'capability'     => 'edit_theme_options',				
				'title'          => __('Header', 'munk'),				
			) );						
			
			$wp_customize->add_panel( 'munk_layouts_blog', array(
				'priority'       => 15,
				'capability'     => 'edit_theme_options',				
				'title'          => __('Content', 'munk'),				
			) );
			
			$wp_customize->add_panel( 'munk_layout_footer', array(
				'priority'       => 25,
				'capability'     => 'edit_theme_options',				
				'title'          => __('Footer', 'munk'),				
			) );	
			
			// All The Sections Goes Here
			
			// Header Sections
			$wp_customize->add_section( 'munk_layout_site_header_above' , array(
				'title'      => __( 'Above Header', 'munk' ),
				'capability'     => 'edit_theme_options',
				'panel' => 'munk_layouts_header',
				'priority'   => 10,
			) );		
			
			$wp_customize->add_section( 'munk_layout_site_header_primary' , array(
				'title'      => __( 'Primary Header', 'munk' ),
				'capability'     => 'edit_theme_options',
				'panel' => 'munk_layouts_header',
				'priority'   => 10,
			) );				

			$wp_customize->add_section( 'munk_layout_site_header_sticky' , array(
				'title'      => __( 'Sticky Header', 'munk' ),
				'capability'     => 'edit_theme_options',
				'panel' => 'munk_layouts_header',
				'priority'   => 10,
			) );							
			
			$wp_customize->add_section( 'munk_layout_site_header_below' , array(
				'title'      => __( 'Below Header', 'munk' ),
				'capability'     => 'edit_theme_options',
				'panel' => 'munk_layouts_header',
				'priority'   => 10,
			) );	
						
			
			// Main Navigation
			$wp_customize->add_section( 'munk_layout_site_navigation' , array(
				'title'      => __( 'Main Navigation', 'munk' ),
				'capability'     => 'edit_theme_options',				
				'priority'   => 10,
			) );			
			
			// Content
			$wp_customize->add_section( 'munk_layout_blog_archive' , array(
				'title'      => __( 'Archive', 'munk' ),
				'capability'     => 'edit_theme_options',		
				'panel' => 'munk_layouts_blog',
				'priority'   => 10,
			) );	
						
			$wp_customize->add_section( 'munk_customize_layout_single_post' , array(
				'title'      => __( 'Single Post', 'munk' ),
				'capability'     => 'edit_theme_options',		
				'panel' => 'munk_layouts_blog',
				'priority'   => 10,
			) );				
			
			$wp_customize->add_section( 'munk_customize_layout_single_page' , array(
				'title'      => __( 'Single Page', 'munk' ),
				'capability'     => 'edit_theme_options',		
				'panel' => 'munk_layouts_blog',
				'priority'   => 10,
			) );		
			
			$wp_customize->add_section( 'munk_layout_content_color' , array(
				'title'      => __( 'Color Settings', 'munk' ),
				'capability'     => 'edit_theme_options',		
				'panel' => 'munk_layouts_blog',
				'priority'   => 10,
			) );
			
			$wp_customize->add_section( 'munk_typography_content_settings' , array(
				'title'      => __( 'Typography Settings', 'munk' ),
				'capability'     => 'edit_theme_options',		
				'panel' => 'munk_layouts_blog',
				'priority'   => 10,
			) );		
			
			// Sidebar
			$wp_customize->add_section( 'munk_layout_sidebar' , array(
				'title'      => __( 'Sidebar', 'munk' ),
				'capability'     => 'edit_theme_options',						
				'priority'   => 20,
			) );	
			
			// Container
			$wp_customize->add_section( 'munk_layout_footer_widgets_area' , array(
				'title'      => __( 'Footer Widgets Area', 'munk' ),
				'capability'     => 'edit_theme_options',						
				'panel' => 'munk_layout_footer',
				'priority'   => 35,
			) );		
			
			// Container
			$wp_customize->add_section( 'munk_layout_footer_copyright_area' , array(
				'title'      => __( 'Copyright Area', 'munk' ),
				'capability'     => 'edit_theme_options',						
				'panel' => 'munk_layout_footer',
				'priority'   => 35,
			) );					
			
			// Buttons
			$wp_customize->add_section( 'munk_layout_button' , array(
				'title'      => __( 'Buttons', 'munk' ),
				'capability'     => 'edit_theme_options',						
				'priority'   => 35,
			) );
			
			// Container
			$wp_customize->add_section( 'munk_layout_container' , array(
				'title'      => __( 'Site Container', 'munk' ),
				'capability'     => 'edit_theme_options',						
				'priority'   => 40,
			) );		
			
			//WooCommerce Sections and Panels
			if(munk_is_woocommerce_activated()){
				
				// Color Settings	
				$wp_customize->add_section( 'munk_colors_woocommerce' , array(					
					'title'      => __( 'Colors Settings', 'munk' ),
        			'panel' 	 => 'woocommerce',
					'capability' => 'edit_theme_options',						
					'priority'   => 40,
				) );		
				
				// Color Settings	
				$wp_customize->add_section( 'munk_layout_wc_product' , array(					
					'title'      => __( 'Single Product', 'munk' ),
        			'panel' 	 => 'woocommerce',
					'capability' => 'edit_theme_options',						
					'priority'   => 10,
				) );						
								
			}
			
			
		}
		

	}
endif;

new Munk_Customizer_Panels_Sections();