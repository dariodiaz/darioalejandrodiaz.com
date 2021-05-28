<?php
/**
 * Munk Customizer Class
 *
 * @since 2.0.0
 *
 * @package munk
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'Munk_Customizer' ) ) :

	/**
	 * Munk Customizer class
	 */
	class Munk_Customizer {
		/**
		 * Constructor - Setup customizer
		 */
		public function __construct() {

			add_action( 'customize_register', array( $this, 'munk_register_controls' ) );			
			add_action( 'customize_register', array( $this, 'munk_customize_helpers' ) );						
			add_action( 'customize_preview_init', array( $this, 'munk_customize_preview_js' ) );
			add_action( 'after_setup_theme', array( $this, 'munk_customize_options' ) );
			add_action( 'customize_register', array( $this, 'munk_default_customize' ), 10 );	
			
			require MUNK_PARENT_CUSTOMIZER_DIR . '/munk-customizer-defaults.php';			
			require MUNK_PARENT_CUSTOMIZER_DIR . '/custom-controls/class-munk-google-fonts.php';	
			

		}

		/**
		 * Register custom controls
		 *
		 * @param WP_Customize_Manager $wp_customize Manager instance.
		 */
		public function munk_register_controls( $wp_customize ) {

			// Controls path.
			$control_dir = MUNK_PARENT_CUSTOMIZER_DIR . '/custom-controls';			
			
			// Load base class for controls.
			require_once $control_dir . '/class-munk-customize-base-control.php';		
			
			// Load custom control classes.
			require_once $control_dir . '/class-munk-customize-dimensions-control.php';			
			require_once $control_dir . '/class-munk-customize-image-radio-button-control.php';
			require_once $control_dir . '/class-munk-customize-multicolor-control.php';			
			require_once $control_dir . '/class-munk-customize-simple-notice-control.php';
			require_once $control_dir . '/class-munk-customize-slider-control.php';
			require_once $control_dir . '/class-munk-customize-sortable-pills-control.php';
			require_once $control_dir . '/class-munk-customize-typography-control.php';			
			require_once $control_dir . '/class-munk-customize-custom-heading-control.php';			
			require_once $control_dir . '/class-munk-customize-toggle-control.php';			
			
			// Register the custom control type.
  			$wp_customize->register_control_type( 'Munk_Toggle_Switch_Custom_control' );

		}

		/**
		 * Include customizer helpers.
		 */
		public function munk_customize_helpers() {
			
			require_once MUNK_PARENT_INC_DIR . '/customizer/class-munk-customizer-sanitize.php';			

		}	

		/**
		 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
		 */
		public function munk_customize_preview_js() {

			wp_enqueue_script( 'munk-customizer-preview', MUNK_PARENT_CUSTOMIZER_URI . '/assets/js/customizer-preview.js', array( 'underscore', 'customize-preview' ), MUNK_THEME_VERSION, true );

		}

		/**
		 * Include customizer options.
		 */
		public function munk_customize_options() {
			/**
			 * Base class that registers all sections and panels
			 */			
			require MUNK_PARENT_CUSTOMIZER_DIR . '/options/class-munk-customize-panels-sections.php';		
			require MUNK_PARENT_CUSTOMIZER_DIR . '/options/class-munk-customize-base-option.php';						

			
			// Global.
			require MUNK_PARENT_CUSTOMIZER_DIR . '/options/site-title.php';			
			require MUNK_PARENT_CUSTOMIZER_DIR . '/options/layout-buttons.php';
			require MUNK_PARENT_CUSTOMIZER_DIR . '/options/layout-container.php';			
			require MUNK_PARENT_CUSTOMIZER_DIR . '/options/layout-navigation.php';
			require MUNK_PARENT_CUSTOMIZER_DIR . '/options/layout-sidebar.php';
			
			//Header
			require MUNK_PARENT_CUSTOMIZER_DIR . '/options/header/layout-above_header.php';
			require MUNK_PARENT_CUSTOMIZER_DIR . '/options/header/layout-below_header.php';
			require MUNK_PARENT_CUSTOMIZER_DIR . '/options/header/layout-primary_header.php';
			require MUNK_PARENT_CUSTOMIZER_DIR . '/options/header/layout-sticky_header.php';			
			
			//Blog/Archive
			require MUNK_PARENT_CUSTOMIZER_DIR . '/options/blog/layout-archive.php';
			require MUNK_PARENT_CUSTOMIZER_DIR . '/options/blog/layout-content_color.php';
			require MUNK_PARENT_CUSTOMIZER_DIR . '/options/blog/layout-content_typography.php';
			require MUNK_PARENT_CUSTOMIZER_DIR . '/options/blog/layout-single_page.php';
			require MUNK_PARENT_CUSTOMIZER_DIR . '/options/blog/layout-single_post.php';
			
			//Footer
			require MUNK_PARENT_CUSTOMIZER_DIR . '/options/footer/layout-copyright.php';
			require MUNK_PARENT_CUSTOMIZER_DIR . '/options/footer/layout-footer_widgets.php';	

		}
		
		/**
		 * Reset Default Customizer Options
		 */
		public function munk_default_customize($wp_customize) {

			$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
			$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
			$wp_customize->get_setting( 'header_text' )->transport  	= 'postMessage';			

			$wp_customize->get_section ('title_tagline')->panel = 'munk_layouts_header';	
			$wp_customize->get_section('title_tagline')->priority = 5;

			$wp_customize->get_section ('header_image')->panel = 'munk_layouts_header';	
			$wp_customize->get_section('header_image')->priority = 50;	

			$wp_customize->get_control ('background_color')->section = 'munk_layout_content_color';		
			$wp_customize->get_control('background_color')->priority = 5;		
			$wp_customize->get_control('background_color')->label = __('Body Background Color', 'munk');
			$wp_customize->get_control('background_color')->description = __('Applies to entire site body background', 'munk');	

			$wp_customize->remove_control( 'header_textcolor' );	

			$wp_customize->get_control('background_image')->section = 'munk_layout_content_color';			
			$wp_customize->get_control('background_image')->priority = 100;			

			$wp_customize->get_control('background_preset')->section = 'munk_layout_content_color';			
			$wp_customize->get_control('background_preset')->priority = 101;			

			$wp_customize->get_control('background_position')->section = 'munk_layout_content_color';			
			$wp_customize->get_control('background_position')->priority = 102;				

			$wp_customize->get_control('background_size')->section = 'munk_layout_content_color';			
			$wp_customize->get_control('background_size')->priority = 103;

			$wp_customize->get_control('background_repeat')->section = 'munk_layout_content_color';			
			$wp_customize->get_control('background_repeat')->priority = 104;	

			$wp_customize->get_control('background_attachment')->section = 'munk_layout_content_color';			
			$wp_customize->get_control('background_attachment')->priority = 104;		


		}		

	}
endif;

new Munk_Customizer();