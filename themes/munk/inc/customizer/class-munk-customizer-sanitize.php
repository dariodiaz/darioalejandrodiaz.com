<?php
/**
 * Munk Customizer sanitize class.
 *
 * @package munk
 *
 * @since 2.0.0
 *
 * @access  public
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

/**
 * Customizer Sanitizes Initial setup
 */
class Munk_Customizer_Sanitize {

		/**
		 * Instance
		 *
		 * @access private
		 * @var object
		 */
		private static $instance;

		/**
		 * Initiator
		 */
		public static function get_instance() {
			if ( ! isset( self::$instance ) ) {
				self::$instance = new self();
			}

			return self::$instance;
		}

		/**
		 * Constructor
		 */
		public function __construct() {
		}


		/**
		 * Switch sanitization
		 *
		 * @param  string		Switch value
		 * @return integer	Sanitized value
		 */			
		public static function munk_switch_sanitization( $input ) {
			if ( true === $input ) {
				return 1;
			} else {
				return 0;
			}
		}


		/**
		 * Radio Button and Select sanitization
		 *
		 * @param  string		Radio Button value
		 * @return integer	Sanitized value
		 */
		public static function munk_radio_sanitization( $input, $setting ) {
			//get the list of possible radio box or select options
		 	$choices = $setting->manager->get_control( $setting->id )->choices;

			if ( array_key_exists( $input, $choices ) ) {
				return $input;
			} else {
				return $setting->default;
			}
		}

		/**
		 * Integer sanitization
		 *
		 * @param  string		Input value to check
		 * @return integer	Returned integer value
		 */
		public static function munk_sanitize_integer( $input ) {
			return (int) $input;
		}

		/**
		 * Text sanitization
		 *
		 * @param  string	Input to be sanitized (either a string containing a single string or multiple, separated by commas)
		 * @return string	Sanitized input
		 */
		public static function munk_text_sanitization( $input ) {
			if ( strpos( $input, ',' ) !== false) {
				$input = explode( ',', $input );
			}
			if( is_array( $input ) ) {
				foreach ( $input as $key => $value ) {
					$input[$key] = sanitize_text_field( $value );
				}
				$input = implode( ',', $input );
			}
			else {
				$input = sanitize_text_field( $input );
			}
			return $input;
		}

		/**
		 * Array sanitization
		 *
		 * @param  array	Input to be sanitized
		 * @return array	Sanitized input
		 */
		public static function munk_array_sanitization( $input ) {
			if( is_array( $input ) ) {
				foreach ( $input as $key => $value ) {
					$input[$key] = sanitize_text_field( $value );
				}
			}
			else {
				$input = '';
			}
			return $input;
		}

		/**
		 * Alpha Color (Hex, RGB & RGBa) sanitization
		 *
		 * @param  string	Input to be sanitized
		 * @return string	Sanitized input
		 */
		public static function munk_hex_rgba_sanitization( $input, $setting ) {
			if ( empty( $input ) || is_array( $input ) ) {
				return $setting->default;
			}

			if ( false === strpos( $input, 'rgb' ) ) {
				// If string doesn't start with 'rgb' then santize as hex color
				$input = sanitize_hex_color( $input );
			} else {
				if ( false === strpos( $input, 'rgba' ) ) {
					// Sanitize as RGB color
					$input = str_replace( ' ', '', $input );
					sscanf( $input, 'rgb(%d,%d,%d)', $red, $green, $blue );
					$input = 'rgb(' . munk_in_range( $red, 0, 255 ) . ',' . munk_in_range( $green, 0, 255 ) . ',' . munk_in_range( $blue, 0, 255 ) . ')';
				}
				else {
					// Sanitize as RGBa color
					$input = str_replace( ' ', '', $input );
					sscanf( $input, 'rgba(%d,%d,%d,%f)', $red, $green, $blue, $alpha );
					$input = 'rgba(' . munk_in_range( $red, 0, 255 ) . ',' . munk_in_range( $green, 0, 255 ) . ',' . munk_in_range( $blue, 0, 255 ) . ',' . munk_in_range( $alpha, 0, 1 ) . ')';
				}
			}
			return $input;
		}

		/**
		 * Only allow values between a certain minimum & maxmium range
		 *
		 * @param  number	Input to be sanitized
		 * @return number	Sanitized input
		 */
		public static function munk_in_range( $input, $min, $max ){
			if ( $input < $min ) {
				$input = $min;
			}
			if ( $input > $max ) {
				$input = $max;
			}
			return $input;
		}
	

		/**
		 * Google Font sanitization
		 *
		 * @param  string	JSON string to be sanitized
		 * @return string	Sanitized input
		 */
		public static function munk_typography_sanitization( $input, $setting ) {
			
			$input_ed = json_decode($input, true);			
			
			if ( empty( $input_ed ) || ! is_array( $input_ed ) ) {
				$input = $setting->default;
			}												
			else {
				foreach ( $input_ed as $key => $value ) {
					$input_ed[$key] = sanitize_text_field( $value );
				}
				$input = json_encode( $input_ed );
			}
			
			return $input;
		}

		/**
		 * Slider sanitization
		 *
		 * @param  string	Slider value to be sanitized
		 * @return string	Sanitized input
		 */
		public static function munk_range_sanitization( $input, $setting ) {
			$attrs = $setting->manager->get_control( $setting->id )->choices;

			$min = ( isset( $attrs['min'] ) ? $attrs['min'] : $input );
			$max = ( isset( $attrs['max'] ) ? $attrs['max'] : $input );
			$step = ( isset( $attrs['step'] ) ? $attrs['step'] : 1 );

			$number = floor( $input / $attrs['step'] ) * $attrs['step'];

			return munk_in_range( $number, $min, $max );
		}
	
		/**
		 * Sanitizes dimension controls.
		 *
		 * @static
		 * @access public
		 * @since 1.0
		 * @param array $input The value.
		 * @return array
		 */
		public static function munk_dimensions_sanitization( $input, $setting ) {			
			
			$input_ed = json_decode($input, true);	

			if ( ! is_array( $input_ed ) ) {
				return $setting->default;
			}

			foreach ( $input_ed as $key => $value ) {		

				foreach ( $value as $key_inner => $val_inner ) {						
					$value[ $key_inner ] = sanitize_text_field( $val_inner );
				}		

				$input_ed[ $key ] = $value;		
			}

			$input = json_encode($input_ed);

			return $input;	

		}	
		
		/**
		 * Sanitizes Multi Color controls.
		 *
		 * @static
		 * @access public
		 * @since 1.0
		 * @param array $input The value.
		 * @return array
		 */
		public static function munk_multi_color_sanitization( $input, $setting ) {			

			$input_ed = json_decode($input, true);			
			
			if ( empty( $input_ed ) || ! is_array( $input_ed ) ) {
				return $setting->default;
			}
			
			foreach ( $input_ed as $key => $val ) {												
				
				if ( false === strpos( $val, 'rgb' ) ) {
					// If string doesn't start with 'rgb' then santize as hex color
					$val = sanitize_hex_color( $val );
				} 
				else {						
					// By now we know the string is formatted as an rgba color so we need to further sanitize it.
					$val = str_replace( ' ', '', $val );
					sscanf( $val, 'rgba(%d,%d,%d,%f)', $red, $green, $blue, $alpha );
					$val = 'rgba(' . $red . ',' . $green . ',' . $blue . ',' . $alpha . ')';											
				}	
				
			}
				
			$input_ed[ $key ] = $val;				
			
			$input = json_encode($input_ed);				
			
			return $input;
			
		}		

}
Munk_Customizer_Sanitize::get_instance();
