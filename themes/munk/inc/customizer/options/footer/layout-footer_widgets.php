<?php
/**
 * Layout Footer - Widget Area
 *
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'Munk_Customize_Layout_Footer_Widgets_Area' ) ) :

	/**
	 * Archive/Blog option.
	 */
	class Munk_Customize_Layout_Footer_Widgets_Area extends Munk_Customize_Base_Option {

		/**
		 * Arguments for options.
		 *
		 * @return array
		 */
		public function elements() {


			$elements = array(
				
				'munk_layout_footer_ed' => array(
					'setting' => array(					
						'sanitize_callback' => array( 'Munk_Customizer_Sanitize', 'munk_radio_sanitization' ),
					),
					'control' => array(
						'type'     => 'select',
						'is_default_type' => true,
						'priority' 	  => 5,
						'label'       => __( 'Footer Widgets Area Layout', 'munk' ),
						'section'     => 'munk_layout_footer_widgets_area',						
						'description' => __( 'Select Footer Widget Columns', 'munk' ),
						'choices'     => array(
							'one-col' 	=> __( 'One Column', 'munk' ),
							'two-col' 	=> __( 'Two Columns', 'munk' ),
							'three-col' => __( 'Three Columns', 'munk' ),						
							'four-col' 	=> __( 'Four Columns', 'munk' ),									
							'none' 		=> __( 'Disable Footer Widgets', 'munk' ),				
						),
					),
				),	
				
				'munk_color_footer_main_label' => array(
					'setting' => array(						
					),
					'control' => array(
						'type'     => 'heading',
						'priority' => 10,
						'label'    => __('Color Settings - Footer Widgets', 'munk'),
						'section'  => 'munk_layout_footer_widgets_area',					
					),					
				),					
				
				'munk_color_footer_widgets' => array(
					'output'    => array(
						array (
							'bgcolor' => array(						  
							  'selector'  => '.site-footer',
							  'property'  => 'background-color',
							),
							'widget-title' => array(						  
							  'selector'  => '.site-footer .footer-t .widget-title',
							  'property'  => 'color',
							),
							'text' => array(						  
							  'selector'  => '.site-footer .footer-t, .site-footer .footer-t .widget, .site-footer .footer-t .widget p, .site-footer .footer-t ul li, .site-footer .widget.widget_calendar table td',
							  'property'  => 'color',
							),			
							'link' => array(						  
							  'selector'  => '.site-footer .footer-t .widget a, .site-footer .footer-t .widget ul li a',
							  'property'  => 'color',
							),
							'hover' => array(						  
							  'selector'  => '.site-footer .footer-t .widget a:hover, .site-footer .footer-t .widget ul li a:hover',
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
						'section'  => 'munk_layout_footer_widgets_area',						
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
								'text'    => __( 'Text Color', 'munk' ),
								'link'    => __( 'Link Color', 'munk' ),
								'hover'   => __( 'Hover Color', 'munk' ),
							),                    
						),							
					),					
				),		
				
				'munk_footer_typography_label' => array(
					'setting' => array(
					),
					'control' => array(
						'type'     => 'heading',
						'priority' => 20,
						'label'    => __('Typography Settings - Footer Widgets', 'munk'),
						'section'  => 'munk_layout_footer_widgets_area',					
					),					
				),		
				
				'munk_typography_footer_widget_title' => array(
					'output'    => array(
						array(
						  'selector'   => '.site-footer .footer-t .widget-title',
						),	
					),						
					'setting' => array(
						'sanitize_callback' => array( 'Munk_Customizer_Sanitize', 'munk_typography_sanitization' ),
					),
					'control' => array(
						'type'     => 'typography',
						'priority' => 25,
						'label'    => __('Widget Title', 'munk'),
						'section'  => 'munk_layout_footer_widgets_area',
						'input_attrs' => array(
							'font_count' => 'all',
							'orderby' => 'alpha',
						   'responsive' => array ( 'desktop', 'tablet', 'mobile' ),                    
						),						
					),					
				),			
				
				'munk_typography_footer_widget_content' => array(
					'output'    => array(
						array(
						  'selector'   => '.site-footer, .site-footer .footer-t, .site-footer .footer-t .widget, .site-footer .footer-t .widget p, .site-footer .footer-t ul li, .site-footer .widget.widget_calendar table td, .site-footer .footer-t .widget a, .site-footer .footer-t .widget ul li a, .site-footer .footer-t .widget a:hover, .site-footer .footer-t .widget ul li a:hover',
						),	
					),						
					'setting' => array(
						'sanitize_callback' => array( 'Munk_Customizer_Sanitize', 'munk_typography_sanitization' ),
					),
					'control' => array(
						'type'     => 'typography',
						'priority' => 30,
						'label'       => __('Widget Content', 'munk'),
						'section'     => 'munk_layout_footer_widgets_area',
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

	new Munk_Customize_Layout_Footer_Widgets_Area();

endif;