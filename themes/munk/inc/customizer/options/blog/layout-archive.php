<?php
/**
 * Archive/ blog layout.
 *
 * @package     munk
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'Munk_Customize_Layout_Blog_Archive' ) ) :

	/**
	 * Archive/Blog option.
	 */
	class Munk_Customize_Layout_Blog_Archive extends Munk_Customize_Base_Option {

		/**
		 * Arguments for options.
		 *
		 * @return array
		 */
		public function elements() {
			
				$elements = array(						

					'munk_layout_blog_archive_ed' => array(
						'setting' => array(							
							'sanitize_callback' => array( 'Munk_Customizer_Sanitize', 'munk_radio_sanitization' ),
						),				
						'control' => array(
							'type'        => 'radio_image',							
							'label'       => __( 'Archive Layout', 'munk' ),
							'section'     => 'munk_layout_blog_archive',						
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

					'munk_layout_blog_archive_entry_padding' => array(
						'output'    => array(
							array (							  
							  'selector'  => '.blog #primary .entry-card, .archive #primary .entry-card',
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
							'section'     => 'munk_layout_blog_archive',
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
					
					'munk_layout_blog_archive_entry_margin' => array(
						'output'    => array(
							array (							  
							  'selector'  => '.home #primary .entry-card, .blog #primary .entry-card, .archive #primary .entry-card',
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
							'section'     => 'munk_layout_blog_archive',
							'input_attrs' => array(
							'labels' => array(
								'top' 		=> __( 'Top', 'munk' ),
								'right'  	=> __( 'Right', 'munk' ),
								'bottom' 	=> __( 'Bottom', 'munk' ),
								'left' 		=> __( 'Left', 'munk' ),
							),
							'responsive' => array ( 'desktop', 'tablet', 'mobile' ),                    
							),   						
						),
					),						


					'munk_layout_blog_archive_content_ed' => array(
						'setting' => array(							
							'sanitize_callback' => array( 'Munk_Customizer_Sanitize', 'munk_text_sanitization' ),
						),
						'control' => array(
							'type'        => 'pill_checkbox',						
							'label'       => __( 'Post Layout', 'munk' ),
							'section'     => 'munk_layout_blog_archive',
							'choices'     => array(
								'title' 		=> __( 'Title', 'munk' ),
								'meta' 			=> __( 'Post Meta', 'munk' ),
								'image' 		=> __( 'Featured Image', 'munk' ),
								'content' 		=> __( 'Content', 'munk' ),
							),
							'priority'  => 20,
							'transport' => 'refresh',
							'input_attrs' => array(
								'sortable' => true,
								'fullwidth' => true,
							)
						)
					),	
					
					'munk_layout_blog_archive_post_meta' => array(
						'setting' => array(							
							'sanitize_callback' => array( 'Munk_Customizer_Sanitize', 'munk_text_sanitization' ),
						),
						'control' => array(
							'type'        => 'pill_checkbox',						
							'label'       => __( 'Post Meta', 'munk' ),
							'section'     => 'munk_layout_blog_archive',
							'choices'     => array(
								'author' 		=> __( 'Author', 'munk' ),
								'date' 			=> __( 'Date', 'munk' ),
								'category' 		=> __( 'Category', 'munk' ),
								'comments' 		=> __( 'Comment Link', 'munk' ),
								'tags' 			=> __( 'Tag', 'munk' ),	
							),
							'priority'    => 25,
							'transport' => 'refresh',
							'input_attrs' => array(
								'sortable' => true,
								'fullwidth' => true,
							)
						)
					),						

					'munk_layout_blog_archive_meta_icon' => array(
						'setting' => array(							
							'sanitize_callback' => array( 'Munk_Customizer_Sanitize', 'munk_switch_sanitization' ),
						),					
						'control' => array(
							'type'        => 'toggle_switch',
							'settings'    => 'munk_layout_blog_archive_meta_icon',
							'label'       => __( 'Show Icons in Post Meta', 'munk' ),
							'description' => __( 'Enable to show icons in post meta info.', 'munk' ),		
							'section'     => 'munk_layout_blog_archive',							
							'priority'    => 30,
							'transport'   => 'auto',	
						)
					),
								

					'munk_layout_blog_archive_post_content' => array(
						'setting' => array(							
							'sanitize_callback' => array( 'Munk_Customizer_Sanitize', 'munk_radio_sanitization' ),
						),					
						'control' => array(
							'type'        => 'select',
							'is_default_type' => true,							
							'label'       => __( 'Post Content', 'munk' ),
							'section'     => 'munk_layout_blog_archive',							
							'priority'    => 35,							
							'choices'     => array(
								'excerpt' 		=> __( 'Excerpt', 'munk' ),
								'content' 		=> __( 'Full Content', 'munk' ),
								'none' 			=> __( 'None', 'munk' ),
							),
						)
					),	

					'munk_layout_blog_archive_excert_length' => array(
						'setting' => array(							
							'sanitize_callback' => array( 'Munk_Customizer_Sanitize', 'munk_sanitize_integer' ),
						),					
						'control' => array(						
							'type'        => 'slider',							
							'label'       => __( 'Excerpt Length', 'munk' ),
							'priority'    => 40,		
							'section'     => 'munk_layout_blog_archive',	
							'choices'     => array(
								'min'  => 0,
								'max'  => 300,
								'step' => 1,
							),				
							'active_callback' => array(
								array(
									'setting'  => 'munk_layout_blog_archive_post_content',
									'operator' => '==',
									'value'    => 'excerpt',
								),				
							),	
						)
					),	
					
					'munk_layout_blog_archive_excert_read_more' => array(
						'setting' => array(							
							'sanitize_callback' => array( 'Munk_Customizer_Sanitize', 'munk_text_sanitization' ),
							'transport' => 'postMessage'
						),					
						'control' => array(						
							'type'     => 'text',
							'is_default_type' => true,									
							'label'    => __( 'Read More Text', 'munk' ),
							'section'  => 'munk_layout_blog_archive',							
							'priority' => 45,				
							'active_callback'  => array(
								array(
								'setting'  => 'munk_layout_blog_archive_post_content',
								'operator' => '==',
								'value'    => 'excerpt',
								)
							)				
						)	
					),						
					'munk_layout_blog_archive_pagination' => array(
						'setting' => array(							
							'sanitize_callback' => array( 'Munk_Customizer_Sanitize', 'munk_radio_sanitization' ),
						),					
						'control' => array(
							'type'        => 'select',
							'is_default_type' => true,							
							'label'       => __( 'Pagination Type', 'munk' ),
							'section'     => 'munk_layout_blog_archive',							
							'priority'    => 50,							
							'choices'     => array(
								'default' 	=> __( 'Default', 'munk' ),
								'numbered'	=> __( 'Numbered', 'munk' ),
							),
						)
					),						
					
			
				);
			return $elements;

		}

	}

	new Munk_Customize_Layout_Blog_Archive();

endif;