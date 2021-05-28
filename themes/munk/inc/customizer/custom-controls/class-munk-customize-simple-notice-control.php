<?php
/**
 * Munk Customize Simple Notice Control Class.
 *
 * @package munk
 *
 * @since 2.0.0
 *
 * @see     WP_Customize_Control
 * @access  public
 *
 */

/*
*
* Simple Notice Custom Control
*
* @author Anthony Hortin <http://maddisondesigns.com>
* @license http://www.gnu.org/licenses/gpl-2.0.html
* @link https://github.com/maddisondesigns
*/
class Munk_Simple_Notice_Custom_Control extends Munk_Custom_Control_Base {
	/**
	 * The type of control being rendered
	 */
	public $type = 'simple_notice';
	/**
	 * Render the control in the customizer
	 */
	public function render_content() {
		$allowed_html = array(
			'a' => array(
				'href' => array(),
				'title' => array(),
				'class' => array(),
				'target' => array(),
			),
			'br' => array(),
			'em' => array(),
			'strong' => array(),
			'i' => array(
				'class' => array()
			),
			'span' => array(
				'class' => array(),
			),
			'code' => array(),
		);
	?>
		<div class="simple-notice-custom-control">
			<?php if( !empty( $this->label ) ) { ?>
				<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
			<?php } ?>
			<?php if( !empty( $this->description ) ) { ?>
				<span class="customize-control-description"><?php echo wp_kses( $this->description, $allowed_html ); ?></span>
			<?php } ?>
		</div>
	<?php
	}
}