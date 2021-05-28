<?php
/**
 * Sidebar Options
 *
 * @package munk
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'Munk_Customize_Layout_Sidebar' ) ) :


	class Munk_Customize_Layout_Sidebar extends Munk_Customize_Base_Option {

		/**
		 * Arguments for options.
		 *
		 * @return array
		 */
		public function elements() {
			
				$elements = array(						
														
							
					'munk_layout_sidebar_padding' => array(
						'output'    => array(
							array (							  
							  'selector'  => '#secondary',
							  'property'  => 'padding',
							),								
						),							
						'setting' => array(						
							'sanitize_callback' => array( 'Munk_Customizer_Sanitize', 'munk_dimensions_sanitization' ),							
						), 
						'control' => array(
							'type'     => 'dimensions',													
							'priority' => 10,
							'label'       => __( 'Sidebar Spacing', 'munk' ),
							'description' => __( 'Adjust sidebar spacing', 'munk' ),
							'section'     => 'munk_layout_sidebar',
							'input_attrs' => array(
							'labels' => array(
								'top'  => __( 'Top', 'munk' ),
								'right'  => __( 'Right', 'munk' ),
								'bottom' => __( 'Bottom', 'munk' ),
								'left' => __( 'Left', 'munk' ),
							),
							'responsive' => array ( 'desktop', 'tablet', 'mobile' ),                    
							),   						
						),
					),		

					'munk_sidebar_color_label' => array(
						'setting' => array(							
						),
						'control' => array(
							'type'     => 'heading',
							'priority' => 15,
							'label'       => __('Color Settings', 'munk'),
							'section'     => 'munk_layout_sidebar',
						),					
					),			

					// Color Settings
					'munk_color_main_sidebar' => array(							
						'output' => array(
							array (							
								'bgcolor' => array(							  
								  'selector'   => '#secondary',
								  'property'   => 'background-color',
								),
								'widget-title' => array(							  
								  'selector'   => '#secondary .widget .widget-title',
								  'property'   => 'color',
								),
								'widget-title-bg' => array(							  
								  'selector'   => '#secondary .widget .widget-title',
								  'property'   => 'background-color',
								),			
								'text' => array(							  
								  'selector'   => '#secondary, #secondary .widget, #secondary .widget p, #secondary ul li, .widget table td',
								  'property'   => 'color',
								),			
								'link' => array(							  
								  'selector'   => '#secondary .widget a, #secondary .widget ul li a',
								  'property'   => 'color',
								),
								'hover' => array(							  
								  'selector'   => '#secondary .widget a:hover, #secondary .widget ul li a:hover',
								  'property'   => 'color',
								),			
							)
						),							
						'setting' => array(							
								'sanitize_callback' => array( 'Munk_Customizer_Sanitize', 'munk_multi_color_sanitization' ),
								'transport' => 'postMessage'
						),
						'control' => array(
							'label' => __( 'Sidebar Color', 'munk' ),
							'priority' => 20,
							'type'     => 'multi_color',
							'section' => 'munk_layout_sidebar',						
							'input_attrs' => array(
								'palette' => array(
									'#000000',
									'#222222',
									'#444444',
									'#777777',
								),
								'choices'     => array(
									'bgcolor' => __( 'Background Color', 'munk' ),
									'widget-title' => __( 'Widget Title Color', 'munk' ),			
									'widget-title-bg' => __( 'Widget Title Background Color', 'munk' ),						
									'text'    => __( 'Text Color', 'munk' ),
									'link'    => __( 'Link Color', 'munk' ),
									'hover'   => __( 'Hover Color', 'munk' ),
								),                    
							),						
						),					
					),			

					'munk_sidebar_font_label' => array(
						'setting' => array(							
						),
						'control' => array(
							'type'     => 'heading',
							'priority' => 25,
							'label'       => __('Typography Settings', 'munk'),
							'section'     => 'munk_layout_sidebar',
						),					
					),							

					'munk_typography_sidebar_widget_title' => array(
						'output'    => array(
							array(
							  'selector'   => '#secondary .widget .widget-title',							  
							),	
						),							
						'setting' => array(		
							'sanitize_callback' => array( 'Munk_Customizer_Sanitize', 'munk_typography_sanitization' ),
						),
						'control' => array(
							'type'     => 'typography',
							'priority' => 30,
							'label'       => __('Widget Title', 'munk'),
							'section'  => 'munk_layout_sidebar',
							'input_attrs' => array(
								'font_count' => 'all',
								'orderby' => 'alpha',
							   'responsive' => array ( 'desktop', 'tablet', 'mobile' ),                    
							),	
						),					
					),	

					'munk_typography_sidebar_widget_content' => array(
						'output'    => array(
							array(
							  'selector' => '#secondary .widget p, #secondary ul li, #secondary .widget table td, #secondary .widget a, #secondary .widget ul li a, #secondary .widget a:hover, #secondary .widget ul li a:hover',
							),	
						),							
						'setting' => array(				
							'sanitize_callback' => array( 'Munk_Customizer_Sanitize', 'munk_typography_sanitization' ),
						),
						'control' => array(
							'type'     => 'typography',
							'priority' => 35,
							'label'       => __('Widget Content', 'munk'),
							'section'  => 'munk_layout_sidebar',
							'input_attrs' => array(
								'font_count' => 'all',
								'orderby' => 'alpha',
							   'responsive' => array ( 'desktop', 'tablet', 'mobile' ),                    
							),	
						),					
					),						
					
			
				);
			return $elements;

		}

	}

	new Munk_Customize_Layout_Sidebar();

endif;