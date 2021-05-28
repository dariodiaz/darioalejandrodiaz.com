<?php
/**
 * Archive/ blog layout.
 *
 * @package     munk
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'Munk_Customize_Layout_Single_Page' ) ) :

	/**
	 * Archive/Blog option.
	 */
	class Munk_Customize_Layout_Single_Page extends Munk_Customize_Base_Option {

		/**
		 * Arguments for options.
		 *
		 * @return array
		 */
		public function elements() {
			
				$elements = array(						

					'munk_layout_single_page_ed' => array(
						'setting' => array(							
							'sanitize_callback' => array( 'Munk_Customizer_Sanitize', 'munk_radio_sanitization' ),
						),				
						'control' => array(
							'type'        => 'radio_image',							
							'label'       => __( 'Single Page Layout', 'munk' ),
							'section'     => 'munk_customize_layout_single_page',						
							'priority'    => 5,
							'choices' => array(
								'no-sidebar' => array(  // Required. Value for this particular radio button choice
									'image' => get_template_directory_uri() . '/inc/customizer/assets/images/no-sidebar.png',
									'name' => __( 'No Sidebar', 'munk' ) // Required. Title text to display
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

					'munk_layout_single_page_entry_padding' => array(
						'output'    => array(
							array (							  
							  'selector'  => '.page.mt-content-padding-yes #primary .entry-card',
							  'property'  => 'padding',
							),								
						),							
						'setting' => array(
							'sanitize_callback' => array( 'Munk_Customizer_Sanitize', 'munk_dimensions_sanitization' ),
						), 
						'control' => array(
							'type'     => 'dimensions',						
							'priority' => 10,
							'label'       => __( 'Page Content Padding', 'munk' ),
							'description' => __( 'Adjust page content padding', 'munk' ),
							'section'     => 'munk_customize_layout_single_page',
							'input_attrs' => array(
							'labels' => array(
								'top'  		=> __( 'Top', 'munk' ),
								'right'  	=> __( 'Right', 'munk' ),
								'bottom' 	=> __( 'Bottom', 'munk' ),
								'left' 		=> __( 'Left', 'munk' ),
							),
							'responsive' => array ( 'desktop', 'tablet', 'mobile' ),                    
							),   						
						),
					),	
					
					'munk_layout_single_page_entry_margin' => array(
						'output'    => array(
							array (							  
							  'selector'  => '.page.mt-content-padding-yes #primary .entry-card',
							  'property'  => 'margin',
							),								
						),							
						'setting' => array(
							'sanitize_callback' => array( 'Munk_Customizer_Sanitize', 'munk_dimensions_sanitization' ),
						), 
						'control' => array(
							'type'     => 'dimensions',						
							'priority' => 15,
							'label'       => __( 'Page Content Margin', 'munk' ),
							'description' => __( 'Adjust page content margin', 'munk' ),
							'section'     => 'munk_customize_layout_single_page',
							'input_attrs' => array(
							'labels' => array(
								'top'  		=> __( 'Top', 'munk' ),
								'right'  	=> __( 'Right', 'munk' ),
								'bottom' 	=> __( 'Bottom', 'munk' ),
								'left' 		=> __( 'Left', 'munk' ),
							),
							'responsive' => array ( 'desktop', 'tablet', 'mobile' ),                    
							),   						
						),
					),						


					'munk_layout_single_page_content_pos' => array(
						'setting' => array(							
							'sanitize_callback' => array( 'Munk_Customizer_Sanitize', 'munk_text_sanitization' ),
						),
						'control' => array(
							'type'        => 'pill_checkbox',						
							'label'       => __( 'Page Layout', 'munk' ),
							'section'     => 'munk_customize_layout_single_page',
							'choices'     => array(
								'title' 		=> __( 'Title', 'munk' ),								
								'image' 		=> __( 'Featured Image', 'munk' ),
								'content' 		=> __( 'Content', 'munk' ),
							),
							'priority'    => 20,
							'transport' => 'refresh',
							'input_attrs' => array(
								'sortable' => true,
								'fullwidth' => true,
							)
						)
					),														
								
				
					
			
				);
			return $elements;

		}

	}

	new Munk_Customize_Layout_Single_Page();

endif;