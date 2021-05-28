<?php
/**
 * Layout Site Header - Primary Header
 *
 */
// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'Munk_Customize_Layout_Site_Header_Primary' ) ) :

	/**
	 * Archive/Blog option.
	 */
	class Munk_Customize_Layout_Site_Header_Primary extends Munk_Customize_Base_Option {

		/**
		 * Arguments for options.
		 *
		 * @return array
		 */
		public function elements() {


			$elements = array(

				'munk_layout_site_header_primary_ed' => array(
					'setting' => array(						
						'sanitize_callback' => array( 'Munk_Customizer_Sanitize', 'munk_radio_sanitization' ),
					),
					'control' => array(
						'type'     => 'select',
						'is_default_type' => true,
						'priority' => 10,
						'label'    => __( 'Primary Header Layout', 'munk' ),
						'section'  => 'munk_layout_site_header_primary',
						'choices'  => array(
								'none' => __( 'None', 'munk' ),
								'layout-one' => __( 'Layout 1', 'munk' ),
								'layout-two' => __( 'Layout 2', 'munk' ),				
						),
					),
				),	
				
				'munk_layout_site_header_primary_menu' => array(
					'setting' => array(						
						'sanitize_callback' => array( 'Munk_Customizer_Sanitize', 'munk_switch_sanitization' ),
					),
					'control' => array(
						'type'     => 'toggle_switch',						
						'priority' => 11,
						'label'    => __( 'Enable Primary Menu', 'munk' ),
						'section'  => 'munk_layout_site_header_primary',
					),
				),	
				
				'munk_layout_site_header_primary_padding' => array(
					'output'    => array(
						array (							  
						  'selector'  => '.header-layout-one .munk-header, .header-layout-two .layout-two-header',
						  'property'  => 'padding',
						),								
					),						
					'setting' => array(
						'sanitize_callback' => array( 'Munk_Customizer_Sanitize', 'munk_dimensions_sanitization' ),
					), 
					'control' => array(
						'type'     	  => 'dimensions',						
						'priority' 	  => 12,
						'label'       => __( 'Primary Header Padding', 'munk' ),
						'description' => __( 'Adjust primary header top and bottom padding', 'munk' ),
						'section'     => 'munk_layout_site_header_primary',
						'input_attrs' => array(
							'labels' => array(
								'top'  => __( 'Top', 'munk' ),
								'bottom' => __( 'Bottom', 'munk' ),
							),
							'responsive' => array ( 'desktop', 'tablet', 'mobile' ),                    
						),   						
					),
				),
				
				'munk_layout_site_header_primary_border_ed' => array(
					'output' => array(
						array(
							'selector'  => '.munk-header',
							'property' => 'border-bottom-width',											
						),
					),						
					'setting' => array(						
						'sanitize_callback' => array( 'Munk_Customizer_Sanitize', 'munk_text_sanitization' ),
						'transport' 		=> 'postMessage',
					),
					'control' => array(
						'is_default_type' => true,
						'type'     => 'text',						
						'priority' => 13,
						'label'    => __( 'Bottom Border', 'munk' ),
						'section'  => 'munk_layout_site_header_primary',						
					),
				),		
				
				'munk_layout_site_header_primary_border_color' => array(
					'output' => array(
						array(
							'selector'  => '.munk-header',
							'property' => 'border-bottom-color',											
						),
					),						
					'setting' => array(						
						'sanitize_callback' => array( 'Munk_Customizer_Sanitize', 'munk_hex_rgba_sanitization' ),
						'transport' 		=> 'postMessage',
					),
					'control' => array(
						'is_default_type' => true,
						'type'     => 'color',						
						'priority' => 14,
						'label'       => __( 'Border Color', 'munk' ),
						'description' => __( 'Add bottom border color to primary header', 'munk' ),
						'section'     => 'munk_layout_site_header_primary',
					),
				),						
				
				'munk_layout_site_header_shadow' => array(
					'setting' => array(						
						'sanitize_callback' => array( 'Munk_Customizer_Sanitize', 'munk_switch_sanitization' ),
					),
					'control' => array(
						'type'     => 'toggle_switch',						
						'priority' => 15,
						'label'       => __( 'Enable Header Box Shadow', 'munk' ),
						'section'  => 'munk_layout_site_header_primary',
					),
				),	
				
				'munk_layout_site_header_primary_margin_bottom' => array(
					'output' => array(
						array(
							'selector'  => '.munk-header',
							'property' => 'margin-bottom',		
							'unit' => 'px',
						),
					),						
					'setting' => array(						
						'sanitize_callback' => array( 'Munk_Customizer_Sanitize', 'munk_sanitize_integer' ),
						'transport' => 'postMessage'
					),
					'control' => array(
						'type'     => 'slider',						
						'priority' => 16,
						'label'    => __( 'Margin Bottom', 'munk' ),
						'description' => __( 'Adjust primary header bottom margin', 'munk' ),		
						'section'  => 'munk_layout_site_header_primary',
						'choices'     => array(
							'min'  => 0,
							'max'  => 500,
							'step' => 1,
						),
						'input_attrs' => array(
							'unit' => 'PX',
						),							
					),
				),	
				
				// Color Settings
				'munk_color_header_primary' => array(					
					'setting' => array(					
					),
					'control' => array(
						'type'     => 'heading',
						'priority' => 17,
						'label'    => __('Color Settings', 'munk'),
						'section'  => 'munk_layout_site_header_primary',
					),					
				),			
				
				// Color Settings
				'munk_color_header_primary_ed' => array(					
					'output'    => array(
						array (
							'bgcolor-header' => array(							  
							  'selector'  => '.site-header',
							  'property'  => 'background-color',
							),
							'text' => array(							  
							  'selector'   => '.site-header, .site-header .site-branding p',
							  'property'  => 'color',
							),			
							'link' => array(							  
							  'selector'   => '.site-header .site-branding h1 a',
							  'property'  => 'color',
							),
							'hover' => array(							  
							  'selector'   => '.site-header .site-branding h1 a:hover',
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
						'priority' => 18,
						'type'    => 'multi_color',
						'section' => 'munk_layout_site_header_primary',						
						'input_attrs' => array(
							'palette' => array(
								'#FFFFFF',
								'#222222',
								'#444444',
								'#777777',
							),
							'choices'     => array(
								'bgcolor-header' => __( 'Background Color', 'munk' ),
								'text'    => __( 'Text Color', 'munk' ),
								'link'    => __( 'Link  Color', 'munk' ),
								'hover'   => __( 'Hover  Color', 'munk' ),
							),                    
						),							
					),					
				),					
				

			);

			return $elements;

		}

	}

	new Munk_Customize_Layout_Site_Header_Primary();

endif;