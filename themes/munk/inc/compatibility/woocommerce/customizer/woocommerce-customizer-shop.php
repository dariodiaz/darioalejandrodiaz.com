<?php
/**
 * WooCommerce Compatibility File.
 *
 * @link https://woocommerce.com/
 *
 * @package Munk
 */

// If plugin - 'WooCommerce' not exist then return.
//if ( ! class_exists( 'WooCommerce' ) ) {
//	return;
//}

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'Munk_Customize_Layout_WC_Shop' ) ) :


	class Munk_Customize_Layout_WC_Shop extends Munk_Customize_Base_Option {

		/**
		 * Arguments for options.
		 *
		 * @return array
		 */
		public function elements() {
			
				$elements = array(						
											
					'munk_customize_layout_woocommerce_ed' => array(
						'setting' => array(							
							'sanitize_callback' => array( 'Munk_Customizer_Sanitize', 'munk_radio_sanitization' ),
						),				
						'control' => array(
							'type'        => 'radio_image',							
							'label'       => __( 'Shop Layout', 'munk' ),
							'description' => __( 'This layout applies to WooCommerce archives pages like: shop, product categories and product tags.', 'munk' ),						
							'section'     => 'woocommerce_product_catalog',
							'priority'    => 1,
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
					
					'munk_customize_layout_woocommerce_padding' => array(
						'wc_output'    => array(
							array (							  
							  'selector'  => '.woocommerce #primary .site-main',
							  'property'  => 'padding',
							),								
						),							
						'setting' => array(
							'sanitize_callback' => array( 'Munk_Customizer_Sanitize', 'munk_dimensions_sanitization' ),
						), 
						'control' => array(
							'type'     => 'dimensions',						
							'priority' => 2,
							'label'       => __( 'Post Content Padding', 'munk' ),
							'description' => __( 'Adjust shop container padding', 'munk' ),
							'section'     => 'woocommerce_product_catalog',
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
					
					'munk_customize_layout_woocommerce_margin' => array(
						'wc_output'    => array(
							array (							  
							  'selector'  => '.woocommerce #primary .site-main',
							  'property'  => 'margin',
							),								
						),							
						'setting' => array(
							'sanitize_callback' => array( 'Munk_Customizer_Sanitize', 'munk_dimensions_sanitization' ),
						), 
						'control' => array(
							'type'     => 'dimensions',						
							'priority' => 3,
							'label'       => __( 'Post Content Margin', 'munk' ),
							'description' => __( 'Adjust shop container margin', 'munk' ),
							'section'     => 'woocommerce_product_catalog',
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
					
					'munk_woocommerce_shop_per_row' => array(
						'setting' => array(							
							'sanitize_callback' => array( 'Munk_Customizer_Sanitize', 'munk_sanitize_integer' ),
						),					
						'control' => array(						
							'type'        => 'slider',							
							'label'       => __( 'Shop Columns', 'munk' ),
							'section'     => 'woocommerce_product_catalog',
							'priority'    => 4,									
							'choices'     => array(
								'min'  => 1,
								'max'  => 6,
								'step' => 1,
								),
							'input_attrs' => array(
								'unit' => '',
							),								
						)
					),	
					
					'munk_woocommerce_shop_per_page' => array(
						'setting' => array(							
							'sanitize_callback' => array( 'Munk_Customizer_Sanitize', 'munk_sanitize_integer' ),
						),					
						'control' => array(						
							'type'        => 'slider',							
							'label'       => __( 'Products Per Page', 'munk' ),
							'section'     => 'woocommerce_product_catalog',
							'priority'    => 5,									
							'choices'     => array(
								'min'  => 1,
								'max'  => 100,
								'step' => 1,
								),
							'input_attrs' => array(
								'unit' => '',
							),								
						)
					),				
					
					'munk_woocommerce_shop_add_to_cart_hover' => array(
						'setting' => array(							
							'sanitize_callback' => array( 'Munk_Customizer_Sanitize', 'munk_switch_sanitization' ),
						),					
						'control' => array(
							'type'        => 'toggle_switch',							
							'label'       => __( 'Enable Add to Cart On Hover', 'munk' ),
							'section'     => 'woocommerce_product_catalog',
							'priority'    => 6,							
						)
					),		
					
					'munk_woocommerce_shop_breadcrumbs' => array(
						'setting' => array(							
							'sanitize_callback' => array( 'Munk_Customizer_Sanitize', 'munk_switch_sanitization' ),
						),					
						'control' => array(
							'type'        => 'toggle_switch',
							'label'       => __( 'Shop Breadcrumbs', 'munk' ),
							'section'     => 'woocommerce_product_catalog',
							'priority'    => 7,							
						)
					),	
					
					'munk_woocommerce_shop_title' => array(
						'setting' => array(							
							'sanitize_callback' => array( 'Munk_Customizer_Sanitize', 'munk_switch_sanitization' ),
						),					
						'control' => array(
							'type'        => 'toggle_switch',
							'label'       => __( 'Display Shop Title', 'munk' ),
							'section'     => 'woocommerce_product_catalog',
							'priority'    => 8,
						)
					),						
					
			
				);
			return $elements;

		}

	}

	new Munk_Customize_Layout_WC_Shop();

endif;