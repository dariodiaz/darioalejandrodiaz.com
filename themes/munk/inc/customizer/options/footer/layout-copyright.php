<?php
/**
 * Layout Footer - Copyright Area
 *
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'Munk_Customize_Layout_Footer_Copyright' ) ) :

	/**
	 * Archive/Blog option.
	 */
	class Munk_Customize_Layout_Footer_Copyright extends Munk_Customize_Base_Option {

		/**
		 * Arguments for options.
		 *
		 * @return array
		 */
		public function elements() {


			$elements = array(
				
				'munk_layout_footer_copyright_layout' => array(
					'setting' => array(						
						'sanitize_callback' => array( 'Munk_Customizer_Sanitize', 'munk_radio_sanitization' ),
					),
					'control' => array(
						'type'     => 'select',
						'is_default_type' => true,
						'priority' => 5,
						'label'       => __( 'Primary Header Layout', 'munk' ),
						'description' => __( 'Select Footer Copyright Layout', 'munk' ),
						'section'  	  => 'munk_layout_footer_copyright_area',
						'choices'     => array(
							'left-align' 	=> __( 'Left Aligned', 'munk' ),
							'right-align' 	=> __( 'Right Aligned', 'munk' ),            
							'center-align' 	=> __( 'Center Aligned', 'munk' ),			
						),
					),
				),	
				
				'munk_footer_copyright' => array(
					'setting' => array(						
						'sanitize_callback' => array( 'Munk_Customizer_Sanitize', 'munk_text_sanitization' ),
					),
					'control' => array(
						'type'     => 'text',
						'is_default_type' => true,
						'priority' => 10,
						'label'       => __( 'Footer Copyright', 'munk' ),
						'description' => __( 'You can change footer copyright and use your own custom text from here.', 'munk' ),
						'section'     => 'munk_layout_footer_copyright_area',						
					),
				),		
				
				'munk_ed_author_link' => array(
					'setting' => array(						
						'sanitize_callback' => array( 'Munk_Customizer_Sanitize', 'munk_switch_sanitization' ),
					),
					'control' => array(
						'type'     => 'toggle_switch',						
						'priority' => 15,
						'label'    => __( 'Show Author Link', 'munk' ),
						'section'  => 'munk_layout_footer_copyright_area',
					),
				),		
				
				'munk_ed_wp_link' => array(
					'setting' => array(						
						'sanitize_callback' => array( 'Munk_Customizer_Sanitize', 'munk_switch_sanitization' ),
					),
					'control' => array(
						'type'     => 'toggle_switch',						
						'priority' => 20,
						'label'    => __( 'Show WordPress Link', 'munk' ),
						'section'  => 'munk_layout_footer_copyright_area',
					),
				),			
				
				'munk_color_footer_label' => array(
					'setting' => array(						
					),
					'control' => array(
						'type'     => 'heading',
						'priority' => 25,
						'label'    => __('Color Settings', 'munk'),
						'section'  => 'munk_layout_footer_copyright_area',
					),					
				),					
				
				'munk_color_footer_copyright' => array(
					'output'    => array(
						array (
							'bgcolor' => array(						  
							  'selector'   => '.site-footer .site-info',
							  'property'   => 'background-color',
							),
							'text' => array(						  
							  'selector'   => '.site-footer .site-info, .site-footer .site-info p',
							  'property'   => 'color',
							),			
							'link' => array(						  
							  'selector'   => '.site-footer .site-info a,  .site-footer .site-info a:hover,  .site-footer .site-info a:active',
							  'property'   => 'color',
							)
						)
					),					
					'setting' => array(							
							'sanitize_callback' => array( 'Munk_Customizer_Sanitize', 'munk_multi_color_sanitization' ),
							'transport' 		=> 'postMessage'
					),
					'control' => array(
							'label' => '',			
							'priority' => 30,
							'type'     => 'multi_color',
							'section'  => 'munk_layout_footer_copyright_area',						
							'input_attrs' => array(
								'palette' => array(
									'#000000',
									'#222222',
									'#444444',
									'#777777',
								),
								'choices'     => array(
									'bgcolor' => __( 'Background Color', 'munk' ),
									'text'    => __( 'Text Color', 'munk' ),
									'link'    => __( 'Link Color', 'munk' ),
								),                    
							),						
					),					
				),		
				
				'munk_color_typography_label' => array(
					'setting' => array(
					),
					'control' => array(
						'type'     => 'heading',
						'priority' => 30,
						'label'    => __('Typography Settings', 'munk'),
						'section'  => 'munk_layout_footer_copyright_area',
					),					
				),	
				
				'munk_typography_footer_copyright' => array(
					'output'    => array(
						array(
						  'selector'   => '.site-footer .site-info,.site-footer .site-info, .site-footer .site-info p, .site-footer .site-info a,  .site-footer .site-info a:hover,  .site-footer .site-info a:active',
						),	
					),						
					'setting' => array(
						'sanitize_callback' => array( 'Munk_Customizer_Sanitize', 'munk_typography_sanitization' ),
					),
					'control' => array(
						'type'     => 'typography',
						'priority' => 35,
						'label'    => '',
						'section'  => 'munk_layout_footer_copyright_area',
						'input_attrs' => array(
							'font_count' => 'all',
							'orderby' 	 => 'alpha',
						    'responsive' => array ( 'desktop', 'tablet', 'mobile' ),                    
						),
					),					
				),							
				

			);

			return $elements;

		}

	}

	new Munk_Customize_Layout_Footer_Copyright();

endif;