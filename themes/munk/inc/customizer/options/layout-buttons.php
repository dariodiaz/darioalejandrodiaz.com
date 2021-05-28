<?php
/**
 * Button Styling Options
 *
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'Munk_Customize_Layout_Buttons' ) ) :

	/**
	 * Archive/Blog option.
	 */
	class Munk_Customize_Layout_Buttons extends Munk_Customize_Base_Option {

		/**
		 * Arguments for options.
		 *
		 * @return array
		 */
		public function elements() {


			$elements = array(
				
				'munk_primary_button_color_label' => array(
					'setting' => array(						
					),
					'control' => array(
						'type'     => 'heading',
						'priority' => 25,
						'label'       => __('Color Settings', 'munk'),
						'section'  => 'munk_layout_button',
					),					
				),					
				
				'munk_color_primary_button' => array(
					'output'    => array(
						array (
							'bgcolor' => array(						  
							   'selector'   => '.button, #button, input[type="button"], input[type="submit"], .btn, .btn-primary, .woocommerce a.button, .woocommerce .added_to_cart, .woocommerce add_to_cart_button, .woocommerce button.button, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce a.button.alt.disabled, .woocommerce a.button.alt:disabled, .woocommerce a.button.alt:disabled[disabled], .navigation.pagination .nav-links a:hover, .navigation.pagination .nav-links .current, .entry-card .read-more a, .woocommerce nav.woocommerce-pagination ul li a:hover, .woocommerce nav.woocommerce-pagination ul li span.current',
							   'property' => 'background-color',
							   'suffix'   => ' !important',
							),
							'text' => array(						  
							  'selector'   => '.button, #button, input[type="button"], input[type="submit"], .btn, .btn-primary, .woocommerce a.button, .woocommerce .added_to_cart, .woocommerce add_to_cart_button, .woocommerce button.button, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce a.button.alt.disabled, .woocommerce a.button.alt:disabled, .woocommerce a.button.alt:disabled[disabled], .navigation.pagination .nav-links a:hover, .navigation.pagination .nav-links .current, .entry-card .read-more a, .woocommerce nav.woocommerce-pagination ul li a:hover, .woocommerce nav.woocommerce-pagination ul li span.current', 
							  'property'  => 'color',
							  'suffix'   => ' !important',			  
							),					
							'hover-bg' => array(						  
							  'selector'   => '.button:hover, #button:hover, input[type="button"]:hover, input[type="submit"]:hover, .btn:hover, .btn-primary:hover, .woocommerce a.button:hover, .woocommerce .added_to_cart:hover, .woocommerce add_to_cart_button:hover, .woocommerce button.button:hover, .woocommerce a.button.alt:hover, .woocommerce button.button.alt:hover, .woocommerce a.button.alt.disabled:hover, .woocommerce a.button.alt:disabled:hover, .woocommerce a.button.alt:disabled[disabled]:hover, .entry-card .read-more a:hover',
							  'property'  => 'background-color',
							  'suffix'   => ' !important',
							),
							'hover-text' => array(						  
							  'selector'   => '.button:hover, #button:hover, input[type="button"]:hover, input[type="submit"]:hover, .btn:hover, .btn-primary:hover, .woocommerce a.button:hover, .woocommerce .added_to_cart:hover, .woocommerce add_to_cart_button:hover, .woocommerce button.button:hover, .woocommerce a.button.alt:hover, .woocommerce button.button.alt:hover, .woocommerce a.button.alt.disabled:hover, .woocommerce a.button.alt:disabled:hover, .woocommerce a.button.alt:disabled[disabled]:hover, .entry-card .read-more a:hover',
							  'property'  => 'color',
							  'suffix'   => ' !important',			  			  
							),							
						)
					),						
					'setting' => array(						
							'sanitize_callback' => array( 'Munk_Customizer_Sanitize', 'munk_multi_color_sanitization' ),
							'transport' => 'postMessage',
					),
					'control' => array(
							'label' => '',			
							'priority' => 30,
							'type'     => 'multi_color',
							'section' => 'munk_layout_button',						
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
									'hover-bg'    => __( 'Hover background Color', 'munk' ),
									'hover-text'   => __( 'Hover Text Color', 'munk' ),
								),                    
							),						
					),					
				),		
				
				'munk_primary_button_typography_label' => array(
					'setting' => array(						
					),
					'control' => array(
						'type'     => 'heading',
						'priority' => 30,
						'label'       => __('Typography Settings', 'munk'),
						'section'  => 'munk_layout_button',
					),					
				),	
				
				'munk_typography_primary_button' => array(
					'output'    => array(
						array(
						  'selector'   => '.button, #button, input[type="button"], input[type="submit"], .btn, .btn-primary, .woocommerce table.shop_table td.actions button.button, .navigation.pagination .nav-links a.page-numbers, .navigation.pagination .nav-links a:hover,.navigation.pagination .nav-links .current, .no-results .search-submit, .woocommerce div.product .cart .single_add_to_cart_button, .woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt,.wp-block-button__link,.is-style-outline .wp-block-button__link, .woocommerce-page ul.products li.product .button, .woocommerce ul.products li.product .button, .woocommerce-js.woocommerce ul.products li.product .button, .wc-block-grid__product .wp-block-button__link, .has-aligned-buttons .wc-block-grid__product .wp-block-button__link, .woocommerce-page ul.products li.product.fixedbutton .button, .woocommerce ul.products li.product.fixedbutton .button, .woocommerce-js.woocommerce ul.products li.product.fixedbutton .button, .entry-card .read-more a, .widget_search .search-submit, .woocommerce form.checkout_coupon button.button, .woocommerce-page ul.products li.product .added_to_cart, .woocommerce ul.products li.product .added_to_cart, .woocommerce-js.woocommerce ul.products li.product .added_to_cart, .woocommerce .woocommerce-form-login .woocommerce-form-login__submit, .error-404 .search-submit, .woocommerce nav.woocommerce-pagination ul li',
						  'suffix'   => ' !important',  
						),
					),						
					'setting' => array(	
						'sanitize_callback' => array( 'Munk_Customizer_Sanitize', 'munk_typography_sanitization' ),
					),
					'control' => array(
						'type'     => 'typography',
						'priority' => 35,
						'label'       => '',
						'section'  => 'munk_layout_button',
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

	new Munk_Customize_Layout_Buttons();

endif;