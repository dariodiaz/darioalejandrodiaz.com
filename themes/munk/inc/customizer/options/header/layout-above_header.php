<?php
/**
 * Above Header
 *
 * @package munk
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'Munk_Customize_Layout_Site_Header_Above' ) ) :

	/**
	 * Archive/Blog option.
	 */
	class Munk_Customize_Layout_Site_Header_Above extends Munk_Customize_Base_Option {

		/**
		 * Arguments for options.
		 *
		 * @return array
		 */
		public function elements() {


			$elements = array(

				'munk_layout_site_header_above_ed' => array(
					'setting' => array(								
						'sanitize_callback' => array( 'Munk_Customizer_Sanitize', 'munk_radio_sanitization' ),
					),
					'control' => array(
						'type'     => 'select',
						'is_default_type' => true,
						'priority' => 10,
						'label'    => __( 'Above Header Layout', 'munk' ),
						'section'  => 'munk_layout_site_header_above',
						'choices'  => array(
								'none' 	  => __( 'None', 'munk' ),
								'one-col' => __( 'One Column', 'munk' ),
								'two-col' => __( 'Two Column', 'munk' ),		
						),
					),
				),	
				
				'munk_layout_site_header_above_section_one_heading' => array(
					'setting' => array(						
					),
					'control' => array(
						'type'     => 'heading',
						'priority' => 10,
						'label'    => __('Section 1', 'munk'),
						'section'  => 'munk_layout_site_header_above',
						'active_callback' => array(							
							array(
								'setting'  => 'munk_layout_site_header_above_ed',
								'operator' => '!=',
								'value'    => 'none',
							),	
						),						
					),					
				),					
				
				'munk_layout_site_header_above_section_one' => array(
					'setting' => array(						
						'sanitize_callback' => array( 'Munk_Customizer_Sanitize', 'munk_radio_sanitization' ),
					),
					'control' => array(
						'type'     => 'select',
						'is_default_type' => true,						
						'label'       => '',
						'section'     => 'munk_layout_site_header_above',						
						'priority'    => 10,
						'input_attrs' => array(
							'placeholder' => __( 'Please select an option...', 'munk' ),
							'multiselect' => false,
						),
						'choices'   	=> array(
							'none' 		=> __( 'None', 'munk' ),
							'text' 		=> __( 'Text', 'munk' ),
							'search'	=> __( 'Search Form', 'munk' ),
							'menu' 		=> __( 'Menu', 'munk' ),
							'widget'	=> __( 'Widget', 'munk' ),				
							'shortcode' => __( 'Shortcode', 'munk' ),				
						),	
						'active_callback' => array(							
							array(
								'setting'  => 'munk_layout_site_header_above_ed',
								'operator' => '!=',
								'value'    => 'none',
							),	
						),
				) ),
				
				'munk_layout_site_header_above_section_one_text' => array(
					'setting' => array(						
						'sanitize_callback' => array( 'Munk_Customizer_Sanitize', 'munk_text_sanitization' ),
					),	
					'control' => array(					
						'type'   => 'text',		
						'is_default_type' => true,
						'label'    => __( 'Text Content', 'munk' ),
						'section'  => 'munk_layout_site_header_above',						
						'priority' => 11,			
						'active_callback' => array(
							array(
									'setting'  => 'munk_layout_site_header_above_ed',
									'operator' => '!=',
									'value'    => 'none',
							),
							array(
								'setting'  => 'munk_layout_site_header_above_section_one',
								'operator' => '==',
								'value'    => 'text',
							),				
						),
				) ),
				
				'munk_layout_site_header_above_section_one_menu' => array(
					'setting' => array(						
						'sanitize_callback' => array( 'Munk_Customizer_Sanitize', 'munk_radio_sanitization' ),
					),		
					'control' => array(	
						'type'     => 'select',
						'is_default_type' => true,					
						'label'    => __( 'Select menu', 'munk' ),
						'section'  => 'munk_layout_site_header_above',						
						'priority' => 12,
						'choices' => $this->get_menu_options(),
						'input_attrs' => array(
							'placeholder' => __( 'Please select a menu...', 'munk' ),							
						),						
						'active_callback' => array(
							array(								
								'setting'  => 'munk_layout_site_header_above_ed',
								'operator' => '!=',
								'value'    => 'none',								
							),
							array(
								'setting'  => 'munk_layout_site_header_above_section_one',
								'operator' => '==',
								'value'    => 'menu',
							),				
						),		
					)
				),
				
				'munk_layout_site_header_above_section_one_shortcode' => array(
					'setting' => array(						
						'sanitize_callback' => array( 'Munk_Customizer_Sanitize', 'munk_text_sanitization' ),
					),		
					'control' => array(	
						'type'     => 'text',
						'is_default_type' => true,						
						'label'    => __( 'Shortcode', 'munk' ),
						'section'  => 'munk_layout_site_header_above',
						'description'  => __( 'Enter your shortcode here.', 'munk' ),			
						'priority' => 12,
						'active_callback' => array(
							array(
								'setting'  => 'munk_layout_site_header_above_ed',
								'operator' => '!=',
								'value'    => 'none',
							),
							array(
								'setting'  => 'munk_layout_site_header_above_section_one',
								'operator' => '==',
								'value'    => 'shortcode',
							),				
						),		
					) 
				),	
				
				'munk_layout_site_header_above_section_two_heading' => array(
					'setting' => array(						
					),
					'control' => array(
						'type'     => 'heading',
						'priority' => 14,
						'label'    => __('Section 2', 'munk'),
						'section'  => 'munk_layout_site_header_above',
						'active_callback' => array(							
							array(
								'setting'  => 'munk_layout_site_header_above_ed',
								'operator' => '==',
								'value'    => 'two-col',
							),	
						),						
					),					
				),	
				
				// Section 2 Starts Here
				'munk_layout_site_header_above_section_two' => array(
					'setting' => array(						
						'sanitize_callback' => array( 'Munk_Customizer_Sanitize', 'munk_radio_sanitization' ),
					),
					'control' => array(
						'type'     => 'select',
						'is_default_type' => true,						
						'label'       => '',
						'section'     => 'munk_layout_site_header_above',						
						'priority'    => 15,
						'input_attrs' => array(
							'placeholder' => __( 'Please select an option...', 'munk' ),
							'multiselect' => false,
						),
						'choices'     => array(
								'none' 		=> __( 'None', 'munk' ),
								'text' 		=> __( 'Text', 'munk' ),
								'search' 	=> __( 'Search Form', 'munk' ),
								'menu'		=> __( 'Menu', 'munk' ),
								'widget' 	=> __( 'Widget', 'munk' ),				
								'shortcode' => __( 'Shortcode', 'munk' ),				
						),	
						'active_callback' => array(							
							array(
								'setting'  => 'munk_layout_site_header_above_ed',
								'operator' => '==',
								'value'    => 'two-col',
							),	
						),
				) ),	
					
				
				'munk_layout_site_header_above_section_two_text' => array(
					'setting' => array(						
						'sanitize_callback' => array( 'Munk_Customizer_Sanitize', 'munk_text_sanitization' ),
					),	
					'control' => array(					
						'type'   => 'text',		
						'is_default_type' => true,
						'label'    => __( 'Text Content', 'munk' ),
						'section'  => 'munk_layout_site_header_above',						
						'priority' => 15,			
						'active_callback' => array(
							array(
								'setting'  => 'munk_layout_site_header_above_ed',
								'operator' => '==',
								'value'    => 'two-col',
							),
							array(
								'setting'  => 'munk_layout_site_header_above_section_two',
								'operator' => '==',
								'value'    => 'text',
							),				
						),
				) ),
				
				'munk_layout_site_header_above_section_two_menu' => array(
					'setting' => array(						
						'sanitize_callback' => array( 'Munk_Customizer_Sanitize', 'munk_radio_sanitization' ),
					),		
					'control' => array(	
						'type'     => 'select',
						'is_default_type' => true,						
						'label'    => __( 'Select menu', 'munk' ),
						'section'  => 'munk_layout_site_header_above',						
						'priority' => 15,
						'choices'  => $this->get_menu_options(),
						'input_attrs' => array(
							'placeholder' => __( 'Please select a menu...', 'munk' ),
							'multiselect' => false,
						),						
						'active_callback' => array(
							array(								
								'setting'  => 'munk_layout_site_header_above_ed',
								'operator' => '==',
								'value'    => 'two-col',								
							),
							array(
								'setting'  => 'munk_layout_site_header_above_section_two',
								'operator' => '==',
								'value'    => 'menu',
							),				
						),		
					)
				),
				
				'munk_layout_site_header_above_section_two_shortcode' => array(
					'setting' => array(						
						'sanitize_callback' => array( 'Munk_Customizer_Sanitize', 'munk_text_sanitization' ),
					),		
					'control' => array(	
						'type'     => 'text',
						'is_default_type' => true,						
						'label'    => __( 'Shortcode', 'munk' ),
						'section'  => 'munk_layout_site_header_above',
						'description'  => __( 'Enter your shortcode here.', 'munk' ),			
						'priority' => 15,
						'active_callback' => array(
							array(
								'setting'  => 'munk_layout_site_header_above_ed',
								'operator' => '==',
								'value'    => 'two-col',
							),
							array(
								'setting'  => 'munk_layout_site_header_above_section_two',
								'operator' => '==',
								'value'    => 'shortcode',
							),				
						),		
					) 
				),		
				
				// Typography Settings
				'munk_typography_header_above_label' => array(
					'setting' => array(
					),
					'control' => array(
						'type'     => 'heading',
						'priority' => 20,
						'label'       => __('Typography Settings', 'munk'),
						'section'  => 'munk_layout_site_header_above',
						'active_callback' => array(							
							array(
								'setting'  => 'munk_layout_site_header_above_ed',
								'operator' => '!=',
								'value'    => 'none',
							),	
						),						
					),					
				),	
				
				
				// Typography Settings
				'munk_typography_header_above_ed' => array(
					'output'  => array(
						array(
							'selector' => '.header-above, .header-above a, .header-above ul.mt-header-ed-menu li a',							
						),
					),						
					'setting' => array(
						'sanitize_callback' => array( 'Munk_Customizer_Sanitize', 'munk_typography_sanitization' ),						
					),
					'control' => array(
						'type'     => 'typography',
						'priority' => 21,
						'label'       => '',
						'section'  => 'munk_layout_site_header_above',
						'input_attrs' => array(
							'font_count' => 'all',
							'orderby' => 'alpha',
						   'responsive' => array ( 'desktop', 'tablet', 'mobile' ),                    
						),	
						'active_callback' => array(							
							array(
								'setting'  => 'munk_layout_site_header_above_ed',
								'operator' => '!=',
								'value'    => 'none',
							),	
						),						
					),					
				),						
				
				// Color Settings
				'munk_color_header_above_label' => array(
					'setting' => array(						
					),
					'control' => array(
						'type'     => 'heading',
						'priority' => 22,
						'label'    => __('Color Settings', 'munk'),
						'section'  => 'munk_layout_site_header_above',
						'active_callback' => array(							
							array(
								'setting'  => 'munk_layout_site_header_above_ed',
								'operator' => '!=',
								'value'    => 'none',
							),	
						),						
					),					
				),			
				
				// Color Settings
				'munk_color_header_above_ed' => array(
					'output'    => array(
						array (
							'bgcolor' => array(							  
							  'selector'   => '.header-above',
							  'property'  => 'background-color',
							),
							'text' => array(							  
							  'selector'   => '.header-above',
							  'property'  => 'color',
							),			
							'link' => array(							  
							  'selector'   => '.header-above a, .header-above ul.mt-header-ed-menu li a',
							  'property'  => 'color',
							),
							'hover' => array(							  
							  'selector'   => '.header-above a:hover, .header-above ul.mt-header-ed-menu li a:hover',
							  'property'  => 'color',
							),		
						)
					),						
					'setting' => array(						
							'sanitize_callback' => array( 'Munk_Customizer_Sanitize', 'munk_multi_color_sanitization' ),
							'transport' => 'postMessage',
					),
					'control' => array(
						'label' => '',			
						'priority' => 24,
						'type'     => 'multi_color',
						'section' => 'munk_layout_site_header_above',						
						'input_attrs' => array(
							'palette' => array(
								'#000000',
								'#222222',
								'#444444',
								'#777777',
							),
							'choices'     => array(
								'bgcolor'	=> __( 'Background Color', 'munk' ),
								'text' 	 	=> __( 'Text Color', 'munk' ),			
								'link'   	=> __( 'Link Color', 'munk' ),
								'hover'  	=> __( 'Link Hover Color', 'munk' ),
							),                    
						),	
						'active_callback' => array(							
							array(
								'setting'  => 'munk_layout_site_header_above_ed',
								'operator' => '!=',
								'value'    => 'none',
							),	
						),						
					),					
				),	
															
				

			);

			return $elements;

		}

	}

	new Munk_Customize_Layout_Site_Header_Above();

endif;