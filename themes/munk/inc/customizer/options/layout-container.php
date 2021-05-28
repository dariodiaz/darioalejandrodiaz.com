<?php
/**
 * Site Container Options
 *
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'Munk_Customize_Layout_Site_Container' ) ) :

	/**
	 * Archive/Blog option.
	 */
	class Munk_Customize_Layout_Site_Container extends Munk_Customize_Base_Option {

		/**
		 * Arguments for options.
		 *
		 * @return array
		 */
		public function elements() {


			$elements = array(			
				
				'munk_layout_container_default_ed' => array(
					'setting' => array(					
						'sanitize_callback' => array( 'Munk_Customizer_Sanitize', 'munk_radio_sanitization' ),
					),
					'control' => array(
						'type'     => 'select',
						'is_default_type' => true,
						'priority' => 5,
						'label'       => __( 'Default Site Container', 'munk' ),
						'section'     => 'munk_layout_container',
						'choices'     => array(
							'default' 				=> __( 'Default', 'munk' ),			
							'boxed' 				=> __( 'Boxed', 'munk' ),
							'fullwidth-contained' 	=> __( 'Full Width - Contained', 'munk' ),			
							'fluid' 				=> __( 'Fluid', 'munk' ),						
						),
					),
				),	
				
				// .container width - if container layout = default
				'munk_layout_default_container_width' => array(
					'output'    => array(
						array(
							'selector' => 'body.mt-container-default .container',
							'property' => 'max-width',
							'unit' 	   => 'px',
						),
					),						
					'setting' => array(						
						'sanitize_callback' => array( 'Munk_Customizer_Sanitize', 'munk_sanitize_integer' ),
						'transport' => 'postMessage'
					),
					'control' => array(
						'type'     => 'slider',						
						'priority' => 10,
						'label'    => __( 'Default Container Width', 'munk' ),
						'section'  => 'munk_layout_container',						
						'choices'  => array(
							'min'  => 768,
							'max'  => 1920,
							'step' => 1,
						),
						'input_attrs' => array(
							'unit' => 'PX',
						),							
						'active_callback'  => array(
								array(
									'setting'  => 'munk_layout_container_default_ed',
									'operator' => '===',
									'value'    => 'default',
								),
						),							
					),
				),	
				
				// #page width - if container layout = boxed
				'munk_layout_boxed_container_width' => array(
					'output'    => array(
						array(
							'selector' => 'body.mt-container-boxed #page',
							'property' => 'max-width',
							'units'    => 'px',								
						),
					),						
					'setting' => array(						
						'sanitize_callback' => array( 'Munk_Customizer_Sanitize', 'munk_sanitize_integer' ),
						'transport' => 'postMessage'
					),
					'control' => array(
						'type'     => 'slider',						
						'priority' => 10,
						'label'    => __( 'Boxed Container Width', 'munk' ),
						'section'  => 'munk_layout_container',						
						'choices'  => array(
							'min'  => 768,
							'max'  => 1920,
							'step' => 1,
						),
						'input_attrs' => array(
							'unit' => 'PX',
						),						
						'active_callback'  => array(
								array(
									'setting'  => 'munk_layout_container_default_ed',
									'operator' => '===',
									'value'    => 'boxed',
								),
						),									
					),
				),	
				
				// inner width - if container layout = boxed
				'munk_layout_boxed_container_inner_width' => array(
					'output'    => array(
						array(
							'selector'  => 'body.mt-container-boxed .container',
							'property'  => 'max-width',
							'unit' 		=> 'px',
						),
					),					
					'setting' => array(						
						'sanitize_callback' => array( 'Munk_Customizer_Sanitize', 'munk_sanitize_integer' ),
						'transport' => 'postMessage'
					),
					'control' => array(
						'type'     => 'slider',						
						'priority' => 10,
						'label'       => __( 'Inner Container Width', 'munk' ),
						'section'  => 'munk_layout_container',						
						'choices'  => array(
							'min'  => 768,
							'max'  => 1920,
							'step' => 1,
						),
						'input_attrs' => array(
							'unit' => 'PX',
						),							
						'active_callback'  => array(
								array(
									'setting'  => 'munk_layout_container_default_ed',
									'operator' => '===',
									'value'    => 'boxed',
								),
						),							
					),
				),		
				
				// .container width - if container layout = fulllwidth-contained
				'munk_layout_contained_container_width' => array(
					'output'    => array(
						array(
							'selector' => 'body.mt-container-fullwidth-contained .container',
							'property' => 'max-width',
							'unit' 	   => 'px',
						),
					),						
					'setting' => array(						
						'sanitize_callback' => array( 'Munk_Customizer_Sanitize', 'munk_sanitize_integer' ),
						'transport' => 'postMessage'
					),
					'control' => array(
						'type'     => 'slider',						
						'priority' => 10,
						'label'       => __( 'Contained Container Width', 'munk' ),
						'section'  => 'munk_layout_container',						
						'choices'  => array(
							'min'  => 768,
							'max'  => 1920,
							'step' => 1,
						),
						'input_attrs' => array(
							'unit' => 'PX',
						),							
						'active_callback'  => array(
								array(
									'setting'  => 'munk_layout_container_default_ed',
									'operator' => '===',
									'value'    => 'fullwidth-contained',
								),
						),							
					),
				),						
				

			);

			return $elements;

		}

	}

	new Munk_Customize_Layout_Site_Container();

endif;