<?php
/**
 * Munk Customize Dimensions Control Class.
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
 * Dimensions Custom Control
 *
 */
class Munk_Dimensions_Custom_control extends Munk_Custom_Control_Base {
	/**
	 * The type of control being rendered
	 */
	public $type = 'dimensions';

	private $dimensions_label = array();

	private $responsive_attr = '';

	/**
	 * Render the control in the customizer
	 */
	public function render_content(){
	$dimensions_label = $this->input_attrs['labels'];    
	$responsive_attr = $this->input_attrs['responsive'];
	$saved_dimensions = array_filter(json_decode($this->value(), true));
	?>
		<div class="munk-dimensions-control">        
			<div class="control-label alignleft">
				<?php if( !empty( $this->label ) ) { ?>
				<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
				<?php } ?>                              
			</div>                
			<div class="munk-responsive-controls cz-control-options alignright">
				<ul class="munk-cz-devices">
					<li class="active desktop"><button type="button" class="preview-desktop" data-device="desktop"><i class="dashicons dashicons-desktop"></i></button></li>
					<li class="tablet"><button type="button" class="preview-tablet" data-device="tablet"><i class="dashicons dashicons-tablet"></i></button></li>
					<li class="mobile"><button type="button" class="preview-mobile" data-device="mobile"><i class="dashicons dashicons-smartphone"></i></button></li>
				</ul> 
			</div>
			<div class="control-clearfix"></div>
			<input type="hidden" id="<?php echo esc_attr($this->id); ?>" name="<?php echo esc_attr($this->id); ?>" class="customize-control-dimensions-input" value="<?php echo esc_attr( $this->value() ); ?>" <?php $this->link(); checked( $this->value() ); ?>>                
			<?php 
			if (isset($responsive_attr) && ($responsive_attr != 'false')) { 
			foreach ($responsive_attr as $device) {                                                                                                    
			?>
				<div class="dimensions device-<?php echo esc_attr($device); ?>" data-device="<?php echo esc_attr($device); ?>">
					<?php 
					if ($saved_dimensions) {
					foreach ($saved_dimensions as $key => $value) {					
					?>											
					<span>
						<input type="text" class="dimension-<?php echo esc_attr($key); ?>-<?php echo esc_attr($device); ?>" value="<?php echo esc_attr( $saved_dimensions[$key][$device]); ?>" />
						<label><?php echo esc_html($key); ?></label>
					</span>
					<?php }
					}
					?>                                                          
				</div>                            
			
			<?php } } ?>                                
				<?php if( !empty( $this->description ) ) { ?>
					<span class="customize-control-description"><?php echo esc_html( $this->description ); ?></span>
				<?php } ?>  
		</div>
	<?php
	}
}