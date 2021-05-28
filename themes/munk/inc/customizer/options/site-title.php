<?php
/**
 * Site Title and Description Sections
 *
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'Munk_Customize_Typography_Site_Title' ) ) :


	class Munk_Customize_Typography_Site_Title extends Munk_Customize_Base_Option {

		/**
		 * Arguments for options.
		 *
		 * @return array
		 */
		public function elements() {
			
				$elements = array(																																						
					
					'munk_custom_logo_size_ed' => array(
						'output'    => array(
							array(
								'selector' => '.site-header .site-branding .custom-logo',
								'property' => 'max-width',
								'unit' 	   => '%',
							),
						),							
						'setting' => array(							
							'sanitize_callback' => array( 'Munk_Customizer_Sanitize', 'munk_sanitize_integer' ),
							'transport' => 'postMessage',
						),					
						'control' => array(						
							'type'        => 'slider',							
							'label'       => __( 'Logo Size', 'munk' ),
							'section'     => 'title_tagline',
							'priority'    => 8,									
							'choices'     => array(
								'min'  => 0,
								'max'  => 100,
								'step' => 1,
							),			
							'input_attrs'     => array(
								'unit' => '%'
							),
						)
					),			
					
				// site title typography
				'munk_typography_header_primary_title_ed' => array(
					'output'  => array(
						array(
							'selector' => '.site-header .site-branding h1, .site-header .site-branding h1 a',
						),
					),					
					'setting' => array(	
						'sanitize_callback' => array( 'Munk_Customizer_Sanitize', 'munk_typography_sanitization' ),
					),
					'control' => array(
						'type'     	  => 'typography',						
						'label'       => __('Site Title Font', 'munk'),
						'section'     => 'title_tagline',
						'priority'    => 60,						
						'input_attrs' => array(
							'font_count' 	=> 'all',
							'orderby' 		=> 'alpha',
						   'responsive' 	=> array ( 'desktop', 'tablet', 'mobile' ),                    
						),	
					),					
				),	
					
				// site description typography
				'munk_typography_header_primary_desc_ed' => array(
					'output'  => array(
						array(
							'selector' => '.site-header .site-branding, .site-header .site-branding p',
						),
					),					
					'setting' => array(	
						'sanitize_callback' => array( 'Munk_Customizer_Sanitize', 'munk_typography_sanitization' ),
					),
					'control' => array(
						'type'     => 'typography',						
						'label'       => __('Site Description Font', 'munk'),
						'section'     => 'title_tagline',
						'priority'    => 70,						
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

	new Munk_Customize_Typography_Site_Title();

endif;