<?php
/**
 * WooCommerce Compatibility File.
 *
 * @link https://woocommerce.com/
 *
 * @package Munk
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'Munk_Customize_Layout_WC_Product' ) ) :


	class Munk_Customize_Layout_WC_Product extends Munk_Customize_Base_Option {

		/**
		 * Arguments for options.
		 *
		 * @return array
		 */
		public function elements() {
			
				$elements = array(						
											
					'munk_customize_layout_wc_product_ed' => array(
						'setting' => array(							
							'sanitize_callback' => array( 'Munk_Customizer_Sanitize', 'munk_radio_sanitization' ),
						),				
						'control' => array(
							'type'        => 'radio_image',							
							'label'       => __( 'Single Product Layout', 'munk' ),
							'description' => __( 'This layout applies to single product pages', 'munk' ),				
							'section'     => 'munk_layout_wc_product',
							'priority'    => 5,
							'choices' => array(
								'no-sidebar' => array(  
									'image' => get_template_directory_uri() . '/inc/customizer/assets/images/no-sidebar.png',
									'name' => __( 'No Sidebar', 'munk' ) 
								),
								'left-sidebar' => array(
									'image' => get_template_directory_uri() . '/inc/customizer/assets/images/left-sidebar.png',
									'name' => __( 'Left Sidebar', 'munk' )
								),
								'right-sidebar' => array(
									'image' => get_template_directory_uri() . '/inc/customizer/assets/images/right-sidebar.png',
									'name' => __( 'Right Sidebar', 'munk' )
								)
							)							
						)
					),	
					
					'munk_customize_layout_wc_product_padding' => array(
						'wc_output'    => array(
							array (							  
							  'selector'  => '.woocommerce.single-product.mt-content-padding-yes #primary .site-main',
							  'property'  => 'padding',
							),								
						),							
						'setting' => array(
							'sanitize_callback' => array( 'Munk_Customizer_Sanitize', 'munk_dimensions_sanitization' ),
						), 
						'control' => array(
							'type'     => 'dimensions',						
							'priority' => 10,
							'label'       => __( 'Post Content Padding', 'munk' ),
							'description' => __( 'Adjust product layout padding', 'munk' ),
							'section'     => 'munk_layout_wc_product',
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
					
					'munk_customize_layout_wc_product_margin' => array(
						'wc_output'    => array(
							array (							  
							  'selector'  => '.woocommerce.single-product.mt-content-padding-yes #primary .site-main',
							  'property'  => 'margin',
							),								
						),							
						'setting' => array(
							'sanitize_callback' => array( 'Munk_Customizer_Sanitize', 'munk_dimensions_sanitization' ),
						), 
						'control' => array(
							'type'     => 'dimensions',						
							'priority' => 15,
							'label'       => __( 'Post Content Margin', 'munk' ),
							'description' => __( 'Adjust product layout margin', 'munk' ),
							'section'     => 'munk_layout_wc_product',
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
					
					'munk_wc_product_gallery_zoom' => array(
						'setting' => array(							
							'sanitize_callback' => array( 'Munk_Customizer_Sanitize', 'munk_switch_sanitization' ),
						),					
						'control' => array(
							'type'        => 'toggle_switch',							
							'label'       => __( 'Enable Image Zoom Effect', 'munk' ),
							'section'     => 'munk_layout_wc_product',							
							'priority'    => 20,							
						)
					),	
					
					'munk_wc_product_gallery_lightbox' => array(
						'setting' => array(							
							'sanitize_callback' => array( 'Munk_Customizer_Sanitize', 'munk_switch_sanitization' ),
						),					
						'control' => array(
							'type'        => 'toggle_switch',							
							'label'       => __( 'Enable Image Lightbox', 'munk' ),
							'section'     => 'munk_layout_wc_product',							
							'priority'    => 20,							
						)
					),	
					
					'munk_wc_product_gallery_slider' => array(
						'setting' => array(							
							'sanitize_callback' => array( 'Munk_Customizer_Sanitize', 'munk_switch_sanitization' ),
						),					
						'control' => array(
							'type'        => 'toggle_switch',							
							'label'       => __( 'Enable Gallery Slider', 'munk' ),
							'section'     => 'munk_layout_wc_product',							
							'priority'    => 20,							
						)
					),		
					
					'munk_wc_product_tab_layout' => array(
						'setting' => array(								
							'sanitize_callback' => array( 'Munk_Customizer_Sanitize', 'munk_radio_sanitization' ),
						),
						'control' => array(
							'type'     => 'select',
							'is_default_type' => true,
							'priority' => 25,
							'label'    => __( 'Product Tabs Layout', 'munk' ),
							'section'  => 'munk_layout_wc_product',
							'choices'  => array(
								'horizontal' => __( 'Horizontal', 'munk' ),
								'vertical' => __( 'Vertical', 'munk' ),
								'none' => __( 'Disabled', 'munk' ),
							),
						),
					),			
					
					'munk_wc_product_related' => array(
						'setting' => array(							
							'sanitize_callback' => array( 'Munk_Customizer_Sanitize', 'munk_switch_sanitization' ),
						),					
						'control' => array(
							'type'        => 'toggle_switch',							
							'label'       => __( 'Enable Related Products', 'munk' ),
							'section'     => 'munk_layout_wc_product',							
							'priority'    => 30,							
						)
					),			
					
					'munk_wc_product_row' => array(
						'setting' => array(							
							'sanitize_callback' => array( 'Munk_Customizer_Sanitize', 'munk_sanitize_integer' ),
						),					
						'control' => array(						
							'type'        => 'slider',							
							'label'       => __( 'No. of Related Products', 'munk' ),
							'priority'    => 35,		
							'section'     => 'munk_layout_wc_product',	
							'choices'     => array(
								'min'  => 1,
								'max'  => 36,
								'step' => 1,
								),
							'input_attrs' => array(
								'unit' => '',
							),								
							'active_callback' => array(
								array(
									'setting'  => 'munk_wc_product_related',
									'operator' => '==',
									'value'    => '1',
								),				
							),	
						)
					),	
					
					'munk_wc_product_col' => array(
						'setting' => array(							
							'sanitize_callback' => array( 'Munk_Customizer_Sanitize', 'munk_sanitize_integer' ),
						),					
						'control' => array(						
							'type'        => 'slider',							
							'label'       => __( 'Related Products Columns', 'munk' ),
							'priority'    => 40,		
							'section'     => 'munk_layout_wc_product',	
							'choices'     => array(
								'min'  => 1,
								'max'  => 6,
								'step' => 1,
								),
							'input_attrs' => array(
								'unit' => '',
							),								
							'active_callback' => array(
								array(
									'setting'  => 'munk_wc_product_related',
									'operator' => '==',
									'value'    => '1',
								),				
							),	
						)
					),						
					
			
				);
			return $elements;

		}

	}

	new Munk_Customize_Layout_WC_Product();

endif;