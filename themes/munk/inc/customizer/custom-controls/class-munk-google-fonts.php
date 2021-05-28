<?php
/**
 * Load Google fonts in front.
 *
 * @package munk
 *
 * @since 2.0.0
 */

defined( 'ABSPATH' ) || exit;

/**
 * Class Munk_Google_Fonts
 */
class Munk_Google_Fonts {		

	/**
	 * Array of fonts to load.
	 * @var array
	 */
	private $selected_fonts = array();
	
	/**
	 * An array of google fonts.
	 *
	 * @static
	 * @access public
	 * @var null|object
	 */
	public static $google_fonts = null;	
	
	// Get our default customizer values
	private $defaults;

	/**
	 * The constructor.
	 */
	public function __construct() {
		
		$this->defaults = munk_customizer_defaults();

		add_action( 'wp_enqueue_scripts', array( $this, 'enqueue' ) );
		add_action( 'enqueue_block_editor_assets', array( $this, 'enqueue' ) );

	}	

	/**
	 * Get all fonts selected from customizer.
	 * @return array
	 */
	public function google_fonts() {		

		$selected_fonts      = array();
		$selected_fonts_pass = array();
		
		$typography_options = array (		
			'munk_typography_header_primary_title_ed',
			'munk_typography_header_primary_desc_ed',
			'munk_typography_header_above_ed',
			'munk_typography_header_below_ed',
			'munk_typography_main_nav_ed',
			'munk_typography_general_content',
			'munk_typography_general_post_title',
			'munk_typography_general_post_content',
			'munk_typography_general_post_meta',
			'munk_typography_sidebar_widget_title',
			'munk_typography_sidebar_widget_content',
			'munk_typography_footer_widget_title',
			'munk_typography_footer_widget_content',
			'munk_typography_footer_copyright',			
			'munk_typography_primary_button',						
		);
		
		foreach ($typography_options as $option) {
			
			$type_mod = get_theme_mod($option, $this->defaults[$option]);			
			if ($type_mod && !is_array($type_mod)) {														
				array_push( $selected_fonts, json_decode($type_mod, true ));	
			}
			
		}
		
        $selected_fonts = apply_filters( 'munk_selected_google_fonts', $selected_fonts );		

		return $selected_fonts;		
	}

	/**
	 * Enqueue fonts.
	 */
	public function enqueue() {

		$this->selected_fonts = $this->google_fonts();
		$font_str             = '';
		$subsets              = array();		
		
		if ( empty( $this->selected_fonts ) ) {
			return;
		}

		foreach ( $this->selected_fonts as $google_font ) {
			if ( ! empty( $font_str ) ) {
				$font_str .= '|';
			}

			$font_str .= $google_font['font'];
			if ( ! empty( $google_font['variant'] ) ) {
				$font_str .= ':' . $google_font['variant'];
			}

			if ( ! empty( $google_font['subsets'] ) ) {
				$subsets[] = is_array( $google_font['subsets'] ) ? implode( ',', $google_font['subsets'] ) : $google_font['subsets'];
			}
		}

		if ( ! empty( $subsets ) ) {
			$subsets_str = '&amp;subset=' . implode( ',', $subsets );
			$font_str    .= $subsets_str;
		}

		wp_register_style( 'munk-google-fonts', '//fonts.googleapis.com/css?family=' . $font_str );
		wp_enqueue_style( 'munk-google-fonts' );

	}

}

new Munk_Google_Fonts();