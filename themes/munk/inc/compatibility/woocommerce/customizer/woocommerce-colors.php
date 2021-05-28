<?php
/**
 * Woocommerce Colors Sections
 *
 */


if ( ! class_exists( 'Munk_Customize_Colors_Woocommerce' ) ) :


	class Munk_Customize_Colors_Woocommerce extends Munk_Customize_Base_Option {

		/**
		 * Arguments for options.
		 *
		 * @return array
		 */
		public function elements() {
			
				$elements = array(						

					'munk_color_shop_layout_label' => array(
						'setting' => array(							
						),
						'control' => array(
							'type'     => 'heading',
							'priority' => 1,
							'label'       => __('Shop', 'munk'),
							'section'     => 'munk_colors_woocommerce',
						),					
					),		
					
					// Shop Color Settings
					'munk_color_shop_layout' => array(							
						'wc_output' => array(
							array (							
								'shop-bg' => array(								  
								  'selector'  => '.woocommerce #primary .site-main',
								  'property'  => 'background-color',
								),			
								'shop-title' => array(								  
								  'selector' => '.woocommerce.archive h1.page-title',
								  'property' => 'color',
								),
								'shop-content' => array(								  
								  'selector'  => '.woocommerce p.woocommerce-result-count, .woocommerce .woocommerce-breadcrumb, .woocommerce .woocommerce-breadcrumb a',
								  'property'  => 'color',
								),	
								'shop-selectbg' => array(								  
								  'selector'  => '.woocommerce .woocommerce-ordering select',
								  'property'  => 'background-color',
								),	
								'shop-selectcolor' => array(								  
								  'selector'  => '.woocommerce .woocommerce-ordering select',
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
							'priority' => 2,
							'type'     => 'multi_color',
							'section' => 'munk_colors_woocommerce',						
							'input_attrs' => array(
								'palette' => array(
									'#000000',
									'#222222',
									'#444444',
									'#777777',
								),                 
								'choices'     => array(
									'shop-bg'    => __( 'Product Container Background', 'munk' ),
									'shop-title'    => __( 'Shop Page Title', 'munk' ),
									'shop-content'   => __( 'Shop Content', 'munk' ),
									'shop-selectbg' => __( 'Shop Order Background', 'munk' ),									
									'shop-selectcolor' => __( 'Shop Order Color', 'munk' ),												
								),								
							),						
						),					
					),			
					
					//Products card label
					'munk_color_product_card_label' => array(
						'setting' => array(							
						),
						'control' => array(
							'type'     => 'heading',
							'priority' => 5,
							'label'       => __('Products Card', 'munk'),
							'section'     => 'munk_colors_woocommerce',
						),					
					),
					
					//Products Card Color Settings
					'munk_color_product_card_ed' => array(							
						'wc_output' => array(
							array (							
								'category' => array(								  
								  'selector'   => '.woocommerce-page ul.products li.product .mt-woo-product-category p, .woocommerce ul.products li.product .mt-woo-product-category p',
								  'property'  => 'color',
								),			
								'title' => array(								  
								  'selector'   => '.woocommerce-page ul.products li.product .woocommerce-loop-product__title, .woocommerce ul.products li.product .woocommerce-loop-product__title',
								  'property'  => 'color',
								),
								'price' => array(
								  'selector'   => '.woocommerce-page ul.products li.product .price, .woocommerce ul.products li.product .price',
								  'property'  => 'color',
								),	
								'rating' => array(								  
								  'selector'   => '.woocommerce .star-rating',
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
							'priority' => 10,
							'type'     => 'multi_color',
							'section' => 'munk_colors_woocommerce',						
							'input_attrs' => array(
								'palette' => array(
									'#000000',
									'#222222',
									'#444444',
									'#777777',
								),                 
								'choices'     => array(
									'category'    => __( 'Product Category', 'munk' ),
									'title'    => __( 'Product Title', 'munk' ),
									'price'   => __( 'Product Price', 'munk' ),
									'rating' => __( 'Product Rating', 'munk' ),									
								),								
							),						
						),					
					),
					
					//Single Product Label
					'munk_color_single_product_card_label' => array(
						'setting' => array(							
						),
						'control' => array(
							'type'     => 'heading',
							'priority' => 15,
							'label'       => __('Single Product', 'munk'),
							'section'     => 'munk_colors_woocommerce',
						),					
					),				
					
					//Single Product Color Settings
					'munk_color_single_product_ed' => array(							
						'wc_output' => array(
							array (	
							'title' => array (															  
								  'selector'   => '.woocommerce div.product .product_title, .woocommerce div.product .woocommerce-tabs ul.tabs li.active a, .single-product .up-sells h2,  .single-product .related h2',
								  'property'  => 'color',
								),			
							'content' => array(								  
								  'selector'   => '.woocommerce.single-product #content div.product div.summary, .woocommerce.single-product div.product div.summary, .woocommerce-page #content div.product div.summary, .woocommerce-page div.product div.summary,  .woocommerce-page div.product div.summary p,  .woocommerce-page div.product div.summary, .woocommerce div.product .woocommerce-tabs .panel, .woocommerce div.product .woocommerce-tabs .panel p, .woocommerce div.product .woocommerce-tabs .panel h2, .woocommerce div.product form.cart .mt-qty-wrap .plus, .woocommerce div.product form.cart .mt-qty-wrap .minus, .woocommerce div.product form.cart div.quantity input, .woocommerce table.shop_attributes th, .woocommerce table.shop_attributes td, #review_form span, #review_form label,.woocommerce div.product .woocommerce-tabs ul.tabs li a, .single-product .product_meta, .single-product .product_meta span, .single-product .product_meta span a',
								  'property'  => 'color',
								),						
							'price' => array(								  
								  'selector'   => '.woocommerce div.product p.price, .woocommerce div.product span.price, .woocommerce-page div.product div.summary p.price, #review_form #respond form p.stars a',
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
							'priority' => 20,
							'type'     => 'multi_color',
							'section' => 'munk_colors_woocommerce',						
							'input_attrs' => array(
								'palette' => array(
									'#000000',
									'#222222',
									'#444444',
									'#777777',
								),                 
								'choices'     => array(
									'title'    => __( 'Product Title', 'munk' ),
									'content'    => __( 'Product Content', 'munk' ),
									'price'   => __( 'Product Price', 'munk' ),									
								),								
							),						
						),					
					),			
			
					//Sale Badge Label
					'munk_color_sale_label' => array(
						'setting' => array(							
						),
						'control' => array(
							'type'     => 'heading',
							'priority' => 25,
							'label'       => __('Sale Badge', 'munk'),
							'section'     => 'munk_colors_woocommerce',
						),					
					),				
			
					//Sale Bade Color Settings
					'munk_color_sale_ed' => array(							
						'wc_output' => array(
							array (	
								'background' => array(								  
								  'selector'   => '.woocommerce span.onsale,.wc-block-grid__product-onsale',
								  'property'  => 'background-color',
								),						
								'content' => array(								  
								  'selector'   => '.woocommerce span.onsale,.wc-block-grid__product-onsale',
								  'property'  => 'color',
								  'suffix' => '!important',
								),	
							)
						),							
						'setting' => array(							
								'sanitize_callback' => array( 'Munk_Customizer_Sanitize', 'munk_multi_color_sanitization' ),
								'transport' => 'postMessage'
						),
						'control' => array(
							'label' => '',
							'priority' => 30,
							'type'     => 'multi_color',
							'section' => 'munk_colors_woocommerce',						
							'input_attrs' => array(
								'palette' => array(
									'#000000',
									'#222222',
									'#444444',
									'#777777',
								),                 
								'choices'     => array(
									'background'    => __( 'Background', 'munk' ),
									'content'    => __( 'Content', 'munk' ),									
								),								
							),						
						),					
					),				
			
				);
			return $elements;

		}

	}

	new Munk_Customize_Colors_Woocommerce();

endif;