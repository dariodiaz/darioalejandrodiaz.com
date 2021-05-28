<?php
/**
 * Archive/ blog typography options
 *
 * @package     munk
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'Munk_Customize_Typography_Content' ) ) :


	class Munk_Customize_Typography_Content extends Munk_Customize_Base_Option {

		/**
		 * Arguments for options.
		 *
		 * @return array
		 */
		public function elements() {
			
				$elements = array(						
									

				// munk_typography_general_content
				'munk_typography_general_content' => array(
					'output'  => array(
						array(
							'selector' => 'body, #primary, .entry-card, .entry-card .entry-content p, .entry-card .entry-excerpt p, body,.archive-description,.archive-description p,.wp-block-image figcaption,.related-post,.entry-content,.entry-content p,.entry-content ul,.entry-content ul li,.entry-content blockquote,.entry-content blockquote p,.entry-content span,.entry-content ol,.entry-content ol li,.entry-content caption,.entry-content table td,.entry-content table tr td,.entry-content form label,.entry-content legend,.entry-content address,.entry-content pre, .entry-card a,.entry-content a,.entry-content a:visited,.entry-content a:focus,.entry-content a:active,.comment-list .reply a, .entry-card .entry-meta a, .entry-card .entry-meta span, .entry-card .entry-meta',
						),
					),					
					'setting' => array(	
						'sanitize_callback' => array( 'Munk_Customizer_Sanitize', 'munk_typography_sanitization' ),
					),
					'control' => array(
						'type'     => 'typography',
						'priority' => 5,
						'label'       => __('Base Content Font', 'munk'),								
						'section'     => 'munk_typography_content_settings',
						'input_attrs' => array(
							'font_count' 	=> 'all',
							'orderby' 		=> 'alpha',
						   'responsive' 	=> array ( 'desktop', 'tablet', 'mobile' ),                    
						),	
					),					
				),	
					
				// munk_typography_general_post_title
				'munk_typography_general_post_title' => array(
					'output'  => array(
						array(
							'selector' => '.entry-card .entry-title a, .single h1.entry-title, .page h1.entry-title, .archive-title',							
						),
					),					
					'setting' => array(		
						'sanitize_callback' => array( 'Munk_Customizer_Sanitize', 'munk_typography_sanitization' ),
					),
					'control' => array(
						'type'     => 'typography',
						'priority' => 5,
						'label'       => __('Post/Page Title', 'munk'),		
						'section'     => 'munk_typography_content_settings',
						'input_attrs' => array(
							'font_count'	=> 'all',
							'orderby' 		=> 'alpha',
						   	'responsive' 	=> array ( 'desktop', 'tablet', 'mobile' ),                    
						),	
					),					
				),
					
				// munk_typography_general_post_content
				'munk_typography_general_post_content' => array(
					'output'  => array(
						array(
							'selector' => '.entry-card .entry-content p, .entry-card .entry-excerpt p, .archive-description,.archive-description p,.wp-block-image figcaption,.related-post,.entry-content,.entry-content p,.entry-content ul,.entry-content ul li,.entry-content blockquote,.entry-content blockquote p,.entry-content span,.entry-content ol,.entry-content ol li,.entry-content caption,.entry-content table td,.entry-content table tr td,.entry-content form label,.entry-content legend,.entry-content address,.entry-content pre, .entry-card a,.entry-content a,.entry-content a:visited,.entry-content a:focus,.entry-content a:active,.comment-list .reply a',							
						),
					),					
					'setting' => array(	
						'sanitize_callback' => array( 'Munk_Customizer_Sanitize', 'munk_typography_sanitization' ),
					),
					'control' => array(
						'type'     => 'typography',
						'priority' => 5,
						'label'       => __('Post/Page Content', 'munk'),		
						'section'     => 'munk_typography_content_settings',
						'input_attrs' => array(
							'font_count' 	=> 'all',
							'orderby' 		=> 'alpha',
						   'responsive' 	=> array ( 'desktop', 'tablet', 'mobile' ),                    
						),	
					),					
				),			
					
				// munk_typography_general_post_content
				'munk_typography_general_post_meta' => array(
					'output'  => array(
						array(
							'selector' => '.entry-card .entry-meta a, .entry-card .entry-meta span, .entry-card .entry-meta',							
						),
					),					
					'setting' => array(
						'sanitize_callback' => array( 'Munk_Customizer_Sanitize', 'munk_typography_sanitization' ),
					),
					'control' => array(
						'type'     => 'typography',
						'priority' => 5,
						'label'       => __('Post Meta', 'munk'),		
						'section'     => 'munk_typography_content_settings',
						'input_attrs' => array(
							'font_count' 	=> 'all',
							'orderby' 		=> 'alpha',
						   'responsive' 	=> array ( 'desktop', 'tablet', 'mobile' ),                    
						),	
					),					
				),								
					
			
				);
			return $elements;

		}

	}

	new Munk_Customize_Typography_Content();

endif;