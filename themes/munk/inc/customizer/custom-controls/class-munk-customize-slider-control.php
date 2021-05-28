<?php
/**
 * Munk Customize Slider Control Class.
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
 * Slider Custom Control
 *
 * @author Anthony Hortin <http://maddisondesigns.com>
 * @license http://www.gnu.org/licenses/gpl-2.0.html
 * @link https://github.com/maddisondesigns
 */
class Munk_Slider_Custom_Control extends Munk_Custom_Control_Base {
	/**
	 * The type of control being rendered
	 */
	public $type = 'slider';
	
	public $unit = '';
	
	/**
	 * Render the control in the customizer
	 */
	public function render_content() {			
	$unit = isset( $this->input_attrs['unit']  ) ? $this->input_attrs['unit'] : '';				
	?>
		<div class="slider-custom-control">
			<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
			<span class="input_unit">
			<input type="number" id="<?php echo esc_attr( $this->id ); ?>" name="<?php echo esc_attr( $this->id ); ?>" value="<?php echo esc_attr( $this->value() ); ?>" class="customize-control-slider-value" <?php $this->link(); ?> />			
			<span><?php echo esc_html($unit ); ?></span>			
			</span>
			<div class="slider" slider-min-value="<?php echo esc_attr( $this->choices['min'] ); ?>" slider-max-value="<?php echo esc_attr( $this->choices['max'] ); ?>" slider-step-value="<?php echo esc_attr( $this->choices['step'] ); ?>"></div>
			<span class="slider-reset dashicons dashicons-image-rotate" slider-reset-value="<?php echo esc_attr( $this->setting->default ); ?>"></span>
		</div>
	<?php
	}
}