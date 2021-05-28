<?php
/**
 * Archive/ blog Color Settings layout.
 *
 * @package     munk
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'Munk_Customize_Layout_Content_Color' ) ) :

	/**
	 * Archive/Blog option.
	 */
	class Munk_Customize_Layout_Content_Color extends Munk_Customize_Base_Option {

		/**
		 * Arguments for options.
		 *
		 * @return array
		 */
		public function elements() {
			
				$elements = array(						
					
					'munk_color_general_bgcolor' => array(
						'output'  => array(
							array(
								'selector' => '#primary .entry-card, body.mt-container-fullwidth-contained #page',
								'property' => 'background-color',
							),
						),					
						'setting' => array(						
							'sanitize_callback' => array( 'Munk_Customizer_Sanitize', 'munk_hex_rgba_sanitization' ),
							'transport' 		=> 'postMessage'
						),
						'control' => array(
							'is_default_type' => true,
							'type'     => 'color',						
							'priority' => 5,
							'label'       => __( 'Background Color', 'munk' ),
							'description' => __( 'Applies to primary content area', 'munk' ),		
							'section'     => 'munk_layout_content_color',
						),
					),		
					'munk_color_general_title_color' => array(
						'output'  => array(
							array(
								'selector' => '.entry-card .entry-title a, .single h1.entry-title, .page h1.entry-title, .archive-title',
								'property' => 'color',
							),
						),						
						'setting' => array(						
							'sanitize_callback' => array( 'Munk_Customizer_Sanitize', 'munk_hex_rgba_sanitization' ),
							'transport' 		=> 'postMessage'
						),
						'control' => array(
							'is_default_type' => true,
							'type'     => 'color',						
							'priority' => 5,
							'label'       => __( 'Post/Page Title Color', 'munk' ),
							'section'     => 'munk_layout_content_color',
						),
					),		
					'munk_color_general_text_color' => array(
						'output'  => array(
							array(
								'selector' => 'body:not(.has-blocks)  .entry-card .entry-content *, body:not(.has-blocks) .entry-card .entry-excerpt, body.has-blocks .entry-card .entry-content, .entry-card .entry-excerpt',
								'property' => 'color',
							),
						),											
						'setting' => array(						
							'sanitize_callback' => array( 'Munk_Customizer_Sanitize', 'munk_hex_rgba_sanitization' ),
							'transport' 		=> 'postMessage'
						),
						'control' => array(
							'is_default_type' => true,
							'type'     => 'color',						
							'priority' => 5,
							'label'       => __( 'Post/Page Content Color', 'munk' ),
							'description' => __( 'Applies to primary content area', 'munk' ),		
							'section'     => 'munk_layout_content_color',
						),
					),		
					'munk_color_general_link_color' => array(
						'output'  => array(
							array(
								'selector' => '.entry-card .entry-content a:not(.wp-block-button__link), .comment-list a',
								'property' => 'color',
							),
						),						
						'setting' => array(						
							'sanitize_callback' => array( 'Munk_Customizer_Sanitize', 'munk_hex_rgba_sanitization' ),
							'transport' 		=> 'postMessage'
						),
						'control' => array(
							'is_default_type' => true,
							'type'     => 'color',						
							'priority' => 5,
							'label'       => __( 'Content Link Color', 'munk' ),
							'description' => __( 'Applies to primary content area', 'munk' ),		
							'section'     => 'munk_layout_content_color',
						),
					),		
					'munk_color_general_link_hover' => array(
						'output'  => array(
							array(
								'selector' => 'body:not(.has-blocks) .entry-card a:hover, body:not(.has-blocks) .entry-content a:hover,.comment-list .reply a:hover',
								'property' => 'color',
							),
						),						
						'setting' => array(						
							'sanitize_callback' => array( 'Munk_Customizer_Sanitize', 'munk_hex_rgba_sanitization' ),
							'transport' 		=> 'postMessage'
						),
						'control' => array(
							'is_default_type' => true,
							'type'     => 'color',						
							'priority' => 5,
							'label'       => __( 'Content Link Hover Color', 'munk' ),
							'description' => __( 'Applies to primary content area', 'munk' ),		
							'section'     => 'munk_layout_content_color',
						),
					),		
					'munk_color_general_post_meta' => array(
						'output'  => array(
							array(
								'selector' => '.entry-card .entry-meta a, .entry-card .entry-meta span, .entry-card .entry-meta, .entry-card .entry-meta .comments svg, .entry-card .entry-meta .posted-on svg, .entry-card .entry-meta .tags svg, .entry-card .entry-meta .post-category svg, .entry-card .entry-meta .byline svg',
								'property' => 'color',
							),
						),						
						'setting' => array(						
							'sanitize_callback' => array( 'Munk_Customizer_Sanitize', 'munk_hex_rgba_sanitization' ),
							'transport' 		=> 'postMessage'
						),
						'control' => array(
							'is_default_type' => true,
							'type'     => 'color',						
							'priority' => 5,
							'label'       => __( 'Post Meta Color', 'munk' ),
							'description' => __( 'Applies to primary content area', 'munk' ),		
							'section'     => 'munk_layout_content_color',
						),
					),								
				);
			return $elements;

		}

	}

	new Munk_Customize_Layout_Content_Color();

endif;