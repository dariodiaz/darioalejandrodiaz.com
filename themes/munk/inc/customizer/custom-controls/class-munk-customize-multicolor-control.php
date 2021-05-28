<?php
/**
 * Munk Customize MultiColor Control Class.
 *
 * @package munk
 *
 * @since 2.0.0
 *
 * @see     WP_Customize_Control
 * @access  public
 *
 */

/**
 * WPColorPicker Alpha Color Picker Custom Control
 *
 * @author Anthony Hortin <http://maddisondesigns.com>
 * @license http://www.gnu.org/licenses/gpl-2.0.html
 * @link https://github.com/maddisondesigns
 *
 * Props @kallookoo for WPColorPicker script with Alpha Channel support
 *
 * @author Sergio <https://github.com/kallookoo>
 * @license http://www.gnu.org/licenses/gpl-3.0.html
 * @link https://github.com/kallookoo/wp-color-picker-alpha
 */
class Munk_Multi_Color_Custom_control extends Munk_Custom_Control_Base {
	/**
	 * The type of control being rendered
	 */
	public $type = 'multi_color';
	/**
	 * ColorPicker Attributes
	 */
	public $attributes = "";
	/**
	 * Color palette defaults
	 */
	public $defaultPalette = array(
		'#000000',
		'#ffffff',
		'#dd3333',
		'#dd9933',
	);

	public $choices = array();                
	/**
	 * Constructor
	 */
	public function __construct( $manager, $id, $args = array(), $options = array() ) {
		parent::__construct( $manager, $id, $args );
	}
	/**
	 * Pass our Palette colours to JavaScript
	 */
	public function to_json() {
		parent::to_json();
		$this->json['colorpickerpalette'] = isset( $this->input_attrs['palette'] ) ? $this->input_attrs['palette'] : $this->defaultPalette;            
	}
	/**
	 * Render the control in the customizer
	 */
	public function render_content() {	
	if (!is_array($this->value())) {
		$selected_colors = json_decode($this->value(), true);
	}		
	else {
		$selected_colors = json_decode($this->setting->default, true);               
	}	
	$choices = $this->input_attrs['choices'];            			
	$defaults = json_decode($this->setting->default, true);		
	?>
	  <div class="wpcolorpicker_alpha_color_control" id="<?php echo esc_attr($this->id); ?>">
			<?php if( !empty( $this->label ) ) { ?>
				<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
			<?php } ?>
			<?php if( !empty( $this->description ) ) { ?>
				<span class="customize-control-description"><?php echo esc_html( $this->description ); ?></span>
			<?php } ?>

			<input type="hidden" data-id="<?php echo esc_attr( $this->id ); ?>" name="<?php echo esc_attr( $this->id ); ?>" value="<?php echo esc_attr( $this->value() ); ?>" class="customize-control-colorpicker-alpha-color" <?php echo esc_attr($this->attributes); ?> <?php $this->link(); ?> />   

				<?php foreach ($selected_colors as $key => $value ) { ?>
				<div class="color-unit-wrapper">
				<label class="color_label"><?php echo esc_html($choices[$key]); ?></label>
					<input 
						   type="text" 
						   class="wpcolorpicker-alpha-color-picker"                               
						   data-default-color="<?php echo esc_attr($defaults[$key]); ?>"
						   data-key="<?php echo esc_attr($key); ?>"
						   data-alpha="true"
						   data-reset-alpha="true"
						   data-custom-width="100"
						   value="<?php echo esc_attr($value); ?>" 
					/>    
				</div>              
				<?php } ?>                

		</div>
	<?php
	}
}