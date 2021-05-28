<?php
/**
 * Layout Site Header - Sticky Header
 *
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'Munk_Customize_Layout_Site_Header_Sticky' ) ) :

	/**
	 * Archive/Blog option.
	 */
	class Munk_Customize_Layout_Site_Header_Sticky extends Munk_Customize_Base_Option {

		/**
		 * Arguments for options.
		 *
		 * @return array
		 */
		public function elements() {


			$elements = array(

				
				'munk_layout_site_header_sticky_ed' => array(
					'setting' => array(						
						'sanitize_callback' => array( 'Munk_Customizer_Sanitize', 'munk_switch_sanitization' ),
					),
					'control' => array(
						'type'     => 'toggle_switch',						
						'priority' => 5,
						'label'    => __( 'Enable Sticky Header', 'munk' ),
						'section'  => 'munk_layout_site_header_sticky',
					),
				),	
				
				'munk_layout_site_header_sticky_padding' => array(
					
					'output'    => array(
						array (							  
						  'selector'  => '.header-layout-one .munk-sticky-header, .header-layout-two .header-bottom.munk-sticky-header .navbar',
						  'property'  => 'padding',
						  'suffix' 	  => '!important',		
						),								
					),												
					'setting' => array (
						'sanitize_callback' => array( 'Munk_Customizer_Sanitize', 'munk_dimensions_sanitization' ),
					), 
					'control' => array(
						'type'     => 'dimensions',						
						'priority' => 10,
						'label'    => __( 'Sticky Header Padding', 'munk' ),
						'description' => __( 'Adjust sticky header top and bottom padding', 'munk' ),
						'section'     => 'munk_layout_site_header_sticky',
						'input_attrs' => array(
						'labels' => array(
							'top'  => __( 'Top', 'munk' ),
							'bottom' => __( 'Bottom', 'munk' ),
						),
						'responsive' => array ( 'desktop', 'tablet', 'mobile' ),                    
						),   						
					),
				),
				
				'munk_layout_site_header_sticky_logo' => array(
					'output' => array(
						array(
							'selector' => '.munk-sticky-header .site-branding .custom-logo',
							'property' => 'max-width',
							'unit' => '%',
						),
					),					
					'setting' => array(						
						'sanitize_callback' => array( 'Munk_Customizer_Sanitize', 'munk_sanitize_integer' ),
						'transport' => 'postMessage',
					),
					'control' => array(
						'type'     => 'slider',						
						'priority' => 15,
						'label'    => __( 'Sticky Header Logo Size', 'munk' ),
						'description' => __( 'Adjust sticky header logo size.', 'munk' ),		
						'section'  => 'munk_layout_site_header_sticky',
						'choices'  => array(
								'min'  => 0,
								'max'  => 100,
								'step' => 1,
						),
						'input_attrs' => array(
							'unit' => '%',
						),						
					),
				),					
				
				'munk_layout_site_header_sticky_border_ed' => array(
					'output' => array(
						array(
							'selector'  => '.munk-sticky-header',
							'property' => 'border-bottom-width',
							'unit' => 'px',
						),
					),											
					'setting' => array(						
						'sanitize_callback' => array( 'Munk_Customizer_Sanitize', 'munk_text_sanitization' ),						
					),
					'control' => array(
						'is_default_type' => true,
						'type'     => 'text',						
						'priority' => 20,
						'label'    => __( 'Bottom Border', 'munk' ),
						'section'  => 'munk_layout_site_header_sticky',						
					),
				),		
				
				'munk_layout_site_header_sticky_border_color' => array(
					'output' => array(
						array(
							'selector' => '.munk-sticky-header',
							'property' => 'border-bottom-color',							
						),
					),						
					'setting' => array(						
						'sanitize_callback' => array( 'Munk_Customizer_Sanitize', 'munk_hex_rgba_sanitization' ),						
					),
					'control' => array(
						'is_default_type' => true,
						'default'         => '#d4dadf',
						'type'     		  => 'color',						
						'priority' 		  => 25,
						'label'       	  => __( 'Border Color', 'munk' ),
						'description' 	  => __( 'Add bottom border color to sticky header', 'munk' ),
						'section'     	  => 'munk_layout_site_header_sticky',
					),
				),						
								

			);

			return $elements;

		}

	}

	new Munk_Customize_Layout_Site_Header_Sticky();

endif;