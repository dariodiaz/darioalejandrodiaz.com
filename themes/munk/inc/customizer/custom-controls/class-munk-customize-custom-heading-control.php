<?php
/**
 * Munk Customize Custom Heading Control Class.
 *
 * @package munk
 *
 * @since 2.0.0
 *
 * @see     WP_Customize_Control
 * @access  public
 *
 */

class Munk_Heading_Custom_control extends Munk_Custom_Control_Base {
	/**
	 * The type of control being rendered
	 */
	public $type = 'heading';
	/**
	 * Render the control in the customizer
	 */
	public function render_content(){
	?>
		<div class="munk-custom-heading-control">
			<?php if( !empty( $this->label ) ) { ?>
				<p class="customize-control-title"><?php echo esc_html( $this->label ); ?></p>
			<?php } ?>  
		</div>
	<?php
	}
}