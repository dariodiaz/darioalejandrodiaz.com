<?php
/**
 * Archive/ blog layout.
 *
 * @package     munk
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'Munk_Customize_Layout_Single_Post' ) ) :

	/**
	 * Archive/Blog option.
	 */
	class Munk_Customize_Layout_Single_Post extends Munk_Customize_Base_Option {

		/**
		 * Arguments for options.
		 *
		 * @return array
		 */
		public function elements() {
			
				$elements = array(						

					'munk_layout_single_post_ed' => array(
						'setting' => array(							
							'sanitize_callback' => array( 'Munk_Customizer_Sanitize', 'munk_radio_sanitization' ),
						),				
						'control' => array(
							'type'        => 'radio_image',							
							'label'       => __( 'Single Post Layout', 'munk' ),
							'section'     => 'munk_customize_layout_single_post',						
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

					'munk_layout_single_entry_padding' => array(
						'output'    => array(
							array (							  
							  'selector'  => '.single-post.mt-content-padding-yes #primary .entry-card',
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
							'description' => __( 'Adjust post content padding', 'munk' ),
							'section'     => 'munk_customize_layout_single_post',
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
					
					'munk_layout_single_entry_margin' => array(
						'output'    => array(
							array (							  
							  'selector'  => '.single-post.mt-content-padding-yes #primary .entry-card',
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
							'description' => __( 'Adjust post content margin', 'munk' ),
							'section'     => 'munk_customize_layout_single_post',
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


					'munk_layout_single_post_content_pos' => array(
						'setting' => array(							
							'sanitize_callback' => array( 'Munk_Customizer_Sanitize', 'munk_text_sanitization' ),
						),
						'control' => array(
							'type'        => 'pill_checkbox',						
							'label'       => __( 'Post Layout', 'munk' ),
							'section'     => 'munk_customize_layout_single_post',
							'choices'     => array(
								'title' 		=> __( 'Title', 'munk' ),
								'meta' 			=> __( 'Post Meta', 'munk' ),
								'image' 		=> __( 'Featured Image', 'munk' ),
								'content'		=> __( 'Content', 'munk' ),
							),
							'priority'    => 20,
							'transport' => 'refresh',
							'input_attrs' => array(
								'sortable' => true,
								'fullwidth' => true,
							)
						)
					),	
					
					'munk_layout_single_post_meta' => array(
						'setting' => array(							
							'sanitize_callback' => array( 'Munk_Customizer_Sanitize', 'munk_text_sanitization' ),
						),
						'control' => array(
							'type'        => 'pill_checkbox',						
							'label'       => __( 'Post Meta', 'munk' ),
							'section'     => 'munk_customize_layout_single_post',
							'choices'     => array(
								'author' 	=> __( 'Author', 'munk' ),
								'date' 		=> __( 'Date', 'munk' ),
								'category' 	=> __( 'Category', 'munk' ),
								'comments' 	=> __( 'Comment Link', 'munk' ),
								'tags' 		=> __( 'Tag', 'munk' ),	
							),
							'priority'    => 25,
							'transport' => 'refresh',
							'input_attrs' => array(
								'sortable' => true,
								'fullwidth' => true,
							)
						)
					),						

					'munk_layout_single_post_meta_icon' => array(
						'setting' => array(							
							'sanitize_callback' => array( 'Munk_Customizer_Sanitize', 'munk_switch_sanitization' ),
						),					
						'control' => array(
							'type'        => 'toggle_switch',							
							'label'       => __( 'Show Icons in Post Meta', 'munk' ),
							'description' => __( 'Enable to show icons in post meta info.', 'munk' ),		
							'section'     => 'munk_customize_layout_single_post',							
							'priority'    => 30,							
						)
					),
					
					'munk_layout_single_post_author_ed' => array(
						'setting' => array(							
							'sanitize_callback' => array( 'Munk_Customizer_Sanitize', 'munk_switch_sanitization' ),
						),					
						'control' => array(
							'type'        => 'toggle_switch',							
							'label'       => __( 'Author Bio', 'munk' ),							
							'section'     => 'munk_customize_layout_single_post',
							'priority'    => 35,							
						)
					),					
					
					'munk_layout_single_post_author_title' => array(
						'setting' => array(							
							'sanitize_callback' => array( 'Munk_Customizer_Sanitize', 'munk_text_sanitization' ),
							'transport' => 'postMessage'
						),					
						'control' => array(
							'type'        => 'text',		
							'is_default_type' => true,							
							'label'       => __( 'Author Title', 'munk' ),							
							'section'     => 'munk_customize_layout_single_post',
							'priority'    => 40,							
							'active_callback' => array(
								array(
									'setting'  => 'munk_layout_single_post_author_ed',
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

	new Munk_Customize_Layout_Single_Post();

endif;