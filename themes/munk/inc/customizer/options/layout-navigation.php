<?php
/**
 * Above Header
 *
 * @package munk
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'Munk_Customize_Layout_Site_Navigation' ) ) :

	/**
	 * Archive/Blog option.
	 */
	class Munk_Customize_Layout_Site_Navigation extends Munk_Customize_Base_Option {

		/**
		 * Arguments for options.
		 *
		 * @return array
		 */
		public function elements() {


			$elements = array(			
				
				// Main Navigation Typograpy Settings
				'munk_typography_main_nav_toggle_label' => array(
					'setting' => array(						
					),
					'control' => array(
						'type'     => 'heading',
						'priority' => 3,
						'label'       => __('Menu Typography', 'munk'),
						'section'  => 'munk_layout_site_navigation',
					),					
				),			
				
				// Typography Settings
				'munk_typography_main_nav_ed' => array(
					'output'    => array(
						array(
						  'selector'   => '.site-header .navbar, .navbar .navbar-nav .nav-link, .site-header .dropdown-menu .dropdown-item',
						),
					),						
					'setting' => array(	
						'sanitize_callback' => array( 'Munk_Customizer_Sanitize', 'munk_typography_sanitization' ),
					),
					'control' => array(
						'type'     => 'typography',
						'priority' => 5,
						'label'    => '',
						'section'  => 'munk_layout_site_navigation',
						'input_attrs' => array(
							'font_count' => 'all',
							'orderby' => 'alpha',
						   'responsive' => array ( 'desktop', 'tablet', 'mobile' ),                    
						),	
					),					
				),																	
				
				// Main Nav Color Settings
				'munk_color_main_nav_label' => array(
					'setting' => array(						
					),
					'control' => array(
						'type'     => 'heading',
						'priority' => 10,
						'label'    => __('Main Navigation', 'munk'),
						'section'  => 'munk_layout_site_navigation',
					),					
				),			
				
				// Main Nav Color Settings
				'munk_color_main_nav_ed' => array(
					'output'    => array(
						array (
							'bgcolor' => array(						  
							  'selector'   => '.site-header .navbar, .layout-two-navbar',
							  'property'  => 'background-color',
							),
							'link' => array(						  
							  'selector'   => '.navbar .navbar-nav .nav-link',
							  'property'  => 'color',
							),
							'hover' => array(						  
							  'selector'   => '.navbar .navbar-nav .nav-link:hover',
							  'property'  => 'color',
							),		
						)
					),												
					'setting' => array(						
							'sanitize_callback' => array( 'Munk_Customizer_Sanitize', 'munk_multi_color_sanitization' ),
							'transport' => 'postMessage'
					),
					'control' => array(
						'label' => '',			
						'priority' => 15,
						'type'     => 'multi_color',
						'section'  => 'munk_layout_site_navigation',						
						'input_attrs' => array(
							'palette' => array(
								'#000000',
								'#222222',
								'#444444',
								'#777777',
							),
							'choices'     => array(
								'bgcolor' => __( 'Background Color', 'munk' ),
								'link'    => __( 'Link  Color', 'munk' ),
								'hover'   => __( 'Hover  Color', 'munk' ),
							),                    
						),	
					),					
				),
				
				// Dropdown Nav Color Settings
				'munk_color_main_nav_submenu_label' => array(
					'setting' => array(						
					),
					'control' => array(
						'type'     => 'heading',
						'priority' => 20,
						'label'       => __('Main Navigation Dropdown', 'munk'),
						'section'  => 'munk_layout_site_navigation',
					),					
				),			
				
				// Dropdown Nav Color Settings
				'munk_color_main_nav_submenu' => array(
					'output' => array(
						array (						
							'bgcolor' => array(						  
							  'selector'   => '.site-header .dropdown-menu, .navbar-expand-sm .navbar-nav .nav-item.dropdown:hover .nav-link.dropdown-toggle',
							  'property'  => 'background-color',
							),
							'link' => array(						  
							  'selector'   => '.site-header .dropdown-menu .dropdown-item, .navbar-expand-sm .navbar-nav .nav-item.dropdown:hover .nav-link.dropdown-toggle',
							  'property'  => 'color',
							),
							'hover' => array(						  
							  'selector'   => '.site-header .dropdown-menu .dropdown-item:hover',
							  'property'  => 'color',
							),		
						)
					),						
					'setting' => array(							
							'sanitize_callback' => array( 'Munk_Customizer_Sanitize', 'munk_multi_color_sanitization' ),
							'transport' => 'postMessage'
					),
					'control' => array(
						'label' => '',			
						'priority' => 25,
						'type'     => 'multi_color',
						'section' => 'munk_layout_site_navigation',						
						'input_attrs' => array(
							'palette' => array(
								'#000000',
								'#222222',
								'#444444',
								'#777777',
							),
							'choices'     => array(
								'bgcolor' => __( 'Background Color', 'munk' ),
								'link'    => __( 'Link  Color', 'munk' ),
								'hover'   => __( 'Hover  Color', 'munk' ),
							),                    
						),	
					),					
				),												
				
				// Mobile Menu Label Settings
				'munk_color_main_nav_toggle_label' => array(
					'setting' => array(
					),
					'control' => array(
						'type'     => 'heading',
						'priority' => 30,
						'label'       => __('Mobile Menu', 'munk'),
						'section'  => 'munk_layout_site_navigation',
					),					
				),			
				
				// Mobile Menu Color Settings
				'munk_color_main_nav_toggle' => array(
					'output'    => array(
						array (							
							'bgcolor' => array(						  
							  'selector'   => '.navbar-toggler',
							  'property'  => 'background-color',
							),
							'link' => array(						
							  'selector'   => '.navbar-toggler',
							  'property'  => 'color',
							),
						)
					),						
					'setting' => array(								
							'sanitize_callback' => array( 'Munk_Customizer_Sanitize', 'munk_multi_color_sanitization' ),
							'transport' => 'postMessage'
					),
					'control' => array(
						'label' => '',			
						'priority' => 35,
						'type'     => 'multi_color',
						'section' => 'munk_layout_site_navigation',						
						'input_attrs' => array(
							'palette' => array(
								'#000000',
								'#222222',
								'#444444',
								'#777777',
							),
							'choices'     => array(
								'bgcolor' => __( 'Background Color', 'munk' ),
								'link'    => __( 'Link  Color', 'munk' ),
							),                    
						),	
					),					
				),					
															
				

			);

			return $elements;

		}

	}

	new Munk_Customize_Layout_Site_Navigation();

endif;