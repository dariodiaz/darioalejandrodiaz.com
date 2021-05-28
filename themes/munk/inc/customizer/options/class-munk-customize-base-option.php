<?php
/**
 * Header top options.  
 *
 * @since 2.0.0
 *
 * @package munk
 */

defined( 'ABSPATH' ) || exit;

/**
 * Class Munk_Customize_Base_Option
 */
class Munk_Customize_Base_Option {

	/**
	 * Array to create customizer options.
	 *
	 * @var array
	 */
	protected $elements = array();

	/**
	 * Active callback array provided in $elements array.
	 *
	 * @var array
	 */
	protected $active_callback_old = array();

	/**
	 * Record the count of array provided for active callback.
	 *
	 * @var int
	 */
	protected $ac_arr_count = 0;

	/**
	 * Record the count of evaluate() method called.
	 *
	 * @var int
	 */
	private $count_evaluate = 0;

	/**
	 * Setting's default activecallback values.
	 *
	 * @var array
	 */
	protected $ac_default = array();	
	
	// Get our default customizer values
	private $control_defaults;
	

	/**
	 * Munk_Customize_Base_Option constructor.
	 */
	public function __construct() {

		// Register customizer options.
		add_action( 'customize_register', array( $this, 'munk_customizer_options' ) );
		// Generate styles from customizer inputs.
		add_action( 'wp_enqueue_scripts', array( $this, 'munk_enqueue_style' ) );				
		
		// Get array of elements for particular class.
		$this->elements = $this->elements();
		
		$this->control_defaults = munk_customizer_defaults();

	}

	/**
	 * Provides an array of Menu slug => name for dropdown.
	 *
	 *
	 * @param string $key Type of key in the menu item associative array.
	 * @return array
	 */
	protected function get_menu_options( $key = 'slug' ) {

		$munk_menu_ed = wp_get_nav_menus();
		
		// Initate an empty array
		$menu_options = array();
		$menu_options['0'] = esc_attr__( 'Select a Menu', 'munk' );
		
		if ( ! empty( $munk_menu_ed ) ) {
			foreach ( $munk_menu_ed as $menu ) {
					$menu_options[ $menu->term_id ] = $menu->name;    
			}
		}
		return $menu_options;		
		
	}

	/**
	 * Register customizer option.
	 *
	 * @param WP_Customize_Manager $wp_customize Manager instance.
	 */
	public function munk_customizer_options( $wp_customize ) {
				
		// Loop through array elements.
		foreach ( $this->elements as $el_key => $el_data ) :

			/**
			 * Setting.
			 */
			$setting_args      = $el_data['setting'] ? $el_data['setting'] : array();
			//$default           = isset( $setting_args['default'] ) ? $setting_args['default'] : '';						
			$default           = isset( $this->control_defaults[$el_key] ) ? $this->control_defaults[$el_key] : '';
			$transport         = isset( $setting_args['transport'] ) ? $setting_args['transport'] : 'refresh';
			$option_type       = isset( $el_data['setting']['type'] ) ? $el_data['setting']['type'] : 'theme_mod';
			$sanitize_callback = isset( $setting_args['sanitize_callback'] ) ? $setting_args['sanitize_callback'] : '';

			$wp_customize->add_setting(
				$el_key,
				array(
					'default'           => $default,
					'type'              => $option_type,	
					'transport' 		=> $transport,
					'capability'        => 'edit_theme_options',
					'sanitize_callback' => $sanitize_callback,
				)
			);

			/**
			 * Control.
			 */
			$control_args = $el_data['control'];
			$control_type = $control_args['type'];
			// Is custom control?
			$is_custom_control       = ( isset( $control_args['is_default_type'] ) && true === $control_args['is_default_type'] ) ? $control_args['is_default_type'] : 0;
			$control_args['setting'] = $el_key;

			// If array provided for active callback modify it to function reference.
			if ( isset( $control_args['active_callback'] ) && is_array( $control_args['active_callback'] ) && count( $control_args['active_callback'] ) ) {
				$this->active_callback_old[] = $control_args['active_callback'];
				$cb_setting_id               = $this->active_callback_old[ $this->ac_arr_count ][0]['setting'];
				$this->ac_default[]          = isset( $wp_customize->get_setting( $cb_setting_id )->default ) ?
					$wp_customize->get_setting( $cb_setting_id )->default : '';

				$control_args['active_callback'] = array( $this, 'evaluate' );
				$this->ac_arr_count++;
			}

			// If custom control, unset type and use object, else...
			if ( ! $is_custom_control ) {
				unset( $control_args['type'] );
				$control_type_uc = implode( '_', array_map( 'ucfirst', explode( '_', $control_type ) ) );				
				$control_type    = 'Munk_' . $control_type_uc . '_Custom_Control';
				if ( class_exists( $control_type ) ) {
					$wp_customize->add_control( new $control_type( $wp_customize, $el_key, $control_args ) );
				}
			} else {
				$wp_customize->add_control( $el_key, $control_args );
			}

		endforeach;

	}	

	/**
	 * Evaluates the active callback array.
	 *
	 * @return bool
	 */
	public function evaluate() {
		foreach ( $this->active_callback_old[ ( $this->count_evaluate ) ] as $count => $ruleset ) :

			$ac_setting_id = $ruleset['setting'];
			$operator      = $ruleset['operator'];

			$option_val = get_theme_mod( $ac_setting_id, 'text_html' );

			$check_val = $ruleset['value'];

			switch ( $operator ) {
				case '===':
					$show[] = ( $option_val === $check_val ) ? true : false;
					break;
				case '==':
					$show[] = ( $option_val == $check_val ) ? true : false;
					break;

				case '!==':
					$show[] = ( $option_val !== $check_val ) ? true : false;
					break;

				case '!=':
					$show[] = ( $option_val != $check_val ) ? true : false;
					break;

				default:
					$show[] = ( $option_val == $check_val ) ? true : false;
					break;
			}

		endforeach;

		// Evaluate final result.
		if ( isset( $show ) ) {
			$this->count_evaluate++;
			foreach ( $show as $result ) {
				if ( ! $result ) {
					return false;
				}
			}
		}

		return true;

	}

	/**
	 * Generate style to enqueue.
	 *
	 * @return string
	 */
	public function generate_style( $output_data = 'output' ) {

		$css             = '';
		$required_output = $output_data;

		foreach ( $this->elements as $el_key => $el_data ) :

			if ( isset( $el_data[ $required_output ] ) ) {
				$output = $el_data[ $required_output ];

				foreach ( $output as $output_key => $output_val ) :

					$selector    = isset( $output_val['selector'] ) ? $output_val['selector'] : '';
					$property    = isset( $output_val['property'] ) ? $output_val['property'] : '';					
					$unit    	 = isset( $output_val['unit'] ) ? $output_val['unit'] : 'px';
					$media_query = isset( $output_val['media_query'] ) ? $output_val['media_query'] : '';
					$default     = isset( $this->control_defaults[$el_key] ) ? $this->control_defaults[$el_key] : '';
					$el_val      = get_theme_mod( $el_key, $default );

					$type = $el_data['control']['type'];
				
					if ( $el_val === $default ) {
						continue;
					}				
				
					if ( 'slider' === $type ) {
						$css .= $selector . '{' . $property . ': ' . $el_val . $unit .';}';
					}	
					elseif ( 'dimensions' === $type ) {							
							// get control data as json and convert to array
							$default_dimensions_array_raw = json_decode( $default, true );	
							
							if (!is_array($el_val)) {
								$user_dimensions_array_raw = json_decode($el_val, true);	
							} else {
								$user_dimensions_array_raw = json_decode($default, true);	
							}

							//remove empty keys from array
							$default_dimensions_array = array_filter($default_dimensions_array_raw);
							$user_dimensions_array = array_filter($user_dimensions_array_raw);
						
							$css .= $selector .'{';
							foreach ($user_dimensions_array as $dimension_key => $dimension_value) {								
								$css .= $property.'-'.$dimension_key.':'.esc_attr($user_dimensions_array[$dimension_key]['desktop']).';';		
							}						
							$css .= '}';	
							$css .= '@media (min-width: 480px) and (max-width: 1023px) {';	
							$css .= $selector .'{';
							foreach ($user_dimensions_array as $dimension_key => $dimension_value) {								
								$css .= $property.'-'.$dimension_key.':'.esc_attr($user_dimensions_array[$dimension_key]['tablet']).';';		
							}				
							$css .= '}';	
							$css .= '}';	
							$css .= '@media (min-width: 120px) and (max-width: 479px) {';
							$css .= $selector .'{';
							foreach ($user_dimensions_array as $dimension_key => $dimension_value) {								
								$css .= $property.'-'.$dimension_key.':'.esc_attr($user_dimensions_array[$dimension_key]['mobile']).';';	
							}				
							$css .= '}';	
							$css .= '}';							
						
					}
					elseif ( 'multi_color' === $type ) {
							if (!is_array($el_val)) {
								$user_color_array = json_decode($el_val, true);												
								foreach ($user_color_array as $key => $val) {	
									$suffix = isset( $output_val[$key]['suffix'] ) ? $output_val[$key]['suffix'] : '';					
									$css .=	$output_val[$key]['selector'].'{'. $output_val[$key]['property']. ':' .esc_attr($val) . $suffix. ';}';	
								}						
							}
					}				
					elseif ( 'typography' === $type ) {								
							$default_font_array = json_decode( $default, true );
							
							if (!is_array($el_val)) {
								$user_font_array = json_decode( $el_val, true );
							}						
							$font 					= !empty( $user_font_array['font'] ) ? $user_font_array['font'] : $default_font_array['font'];
							$variant 				= !empty( $user_font_array['variant'] ) ? $user_font_array['variant'] : $default_font_array['variant'];
							$fontsize_desktop 		= !empty( $user_font_array['fontsize_desktop'] ) ? $user_font_array['fontsize_desktop'] : $default_font_array['fontsize_desktop'];
							$fontsize_tablet 		= !empty( $user_font_array['fontsize_tablet'] ) ? $user_font_array['fontsize_tablet'] : $default_font_array['fontsize_tablet'];
							$fontsize_mobile 		= !empty( $user_font_array['fontsize_mobile'] ) ? $user_font_array['fontsize_mobile'] : $default_font_array['fontsize_mobile'];
							$lineheight_desktop 	= !empty( $user_font_array['lineheight_desktop'] ) ? $user_font_array['lineheight_desktop'] : $default_font_array['lineheight_desktop'];
							$lineheight_tablet 		= !empty( $user_font_array['lineheight_tablet'] ) ? $user_font_array['lineheight_tablet'] : $default_font_array['lineheight_tablet'];
							$lineheight_mobile 		= !empty( $user_font_array['lineheight_mobile'] ) ? $user_font_array['lineheight_mobile'] : $default_font_array['lineheight_mobile'];
							$texttransform_desktop 	= !empty( $user_font_array['texttransform_desktop'] ) ? $user_font_array['texttransform_desktop'] : $default_font_array['texttransform_desktop'];
							$texttransform_tablet 	= !empty( $user_font_array['texttransform_tablet'] ) ? $user_font_array['texttransform_tablet'] : $default_font_array['texttransform_tablet'];
							$texttransform_mobile 	= !empty( $user_font_array['texttransform_mobile'] ) ? $user_font_array['texttransform_mobile'] : $default_font_array['texttransform_mobile'];
							$textalign_desktop 		= !empty( $user_font_array['textalign_desktop'] ) ? $user_font_array['textalign_desktop'] : $default_font_array['textalign_desktop'];
							$textalign_tablet 		= !empty( $user_font_array['textalign_tablet'] ) ? $user_font_array['textalign_tablet'] : $default_font_array['textalign_tablet'];
							$textalign_mobile 		= !empty( $user_font_array['textalign_mobile'] ) ? $user_font_array['textalign_mobile'] : $default_font_array['textalign_mobile'];						
						
							//desktop css
							$css .= $selector . '{font-family:'. $font. ';font-weight:'.$variant.';font-size:'.esc_attr($fontsize_desktop).';line-height:'.esc_attr($lineheight_desktop).';text-transform:'.esc_attr($texttransform_desktop).';text-align:'.esc_attr($textalign_desktop).';}';									
							//tablet css
							$css .= '@media (min-width: 480px) and (max-width: 1023px) {';						
								$css .= $selector . '{font-size:'.esc_attr($fontsize_tablet).';line-height:'.esc_attr($lineheight_tablet).';text-transform:'.esc_attr($texttransform_tablet).';text-align:'.esc_attr($textalign_tablet).';}';
							$css .= '}';								
							//mobile css
							$css .= '@media (min-width: 120px) and (max-width: 479px) {';						
								$css .= $selector . '{font-size:'.esc_attr($fontsize_mobile).';line-height:'.esc_attr($lineheight_mobile).';text-transform:'.esc_attr($texttransform_mobile).';text-align:'.esc_attr($textalign_mobile).';}';
							$css .= '}';
					}				
					else {
						$css .= ! empty( $media_query ) ? $media_query . ' {' : '';
						$css .= $selector . '{' . $property . ': ' . esc_attr($el_val) . ';}';
						$css .= ! empty( $media_query ) ? '}' : '';
					}				
				endforeach;

			}

		endforeach;

		return $css;

	}

	/**
	 * Enqueue generated styles.
	 */
	public function munk_enqueue_style() {
		$output        = $this->generate_style();
		$wc_output     = $this->generate_style( 'wc_output' );
		$pro_output    = $this->generate_style( 'pro_output' );
		$pro_wc_output = $this->generate_style( 'pro_wc_output' );

		wp_add_inline_style( 'munk-style', $output );

		wp_add_inline_style( 'munk-woocommerce-style', $wc_output );
		wp_add_inline_style( 'munk-pro', $pro_output );
		wp_add_inline_style( 'munk-pro', $pro_wc_output );
	}	

}
