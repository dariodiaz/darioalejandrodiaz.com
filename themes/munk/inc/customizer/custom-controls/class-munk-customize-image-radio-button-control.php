<?php
/**
 * Munk Customize Image Radio Button Control Class.
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
 * Image Radio Button Custom Control
 *
 * @author Anthony Hortin <http://maddisondesigns.com>
 * @license http://www.gnu.org/licenses/gpl-2.0.html
 * @link https://github.com/maddisondesigns
 */
class Munk_Radio_Image_Custom_Control extends Munk_Custom_Control_Base {
	/**
	 * The type of control being rendered
	 */
	public $type = 'radio_image';

	/**
	 * Render the control in the customizer
	 */
	public function render_content() {
	?>
		<div class="image_radio_button_control">
			<?php if( !empty( $this->label ) ) { ?>
				<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
			<?php } ?>
			<?php if( !empty( $this->description ) ) { ?>
				<span class="customize-control-description"><?php echo esc_html( $this->description ); ?></span>
			<?php } ?>

			<?php foreach ( $this->choices as $key => $value ) { ?>
				<label class="radio-button-label">
					<input type="radio" name="<?php echo esc_attr( $this->id ); ?>" value="<?php echo esc_attr( $key ); ?>" <?php $this->link(); ?> <?php checked( esc_attr( $key ), $this->value() ); ?>/>
					<img src="<?php echo esc_attr( $value['image'] ); ?>" alt="<?php echo esc_attr( $value['name'] ); ?>" title="<?php echo esc_attr( $value['name'] ); ?>" />
				</label>
			<?php	} ?>
		</div>
	<?php
	}
}