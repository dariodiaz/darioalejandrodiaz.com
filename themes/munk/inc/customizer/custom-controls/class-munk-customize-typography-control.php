<?php
/**
 * Munk Customize Typography Control Class.
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
* Google Font Select Custom Control
*
* @author Anthony Hortin <http://maddisondesigns.com>
* @license http://www.gnu.org/licenses/gpl-2.0.html
* @link https://github.com/maddisondesigns
*/
class Munk_Typography_Custom_Control extends Munk_Custom_Control_Base {
	/**
	 * The type of control being rendered
	 */
	public $type = 'typography';
	/**
	 * The list of Google Fonts
	 */
	private $fontList = false;
	/**
	 * The saved font values decoded from json
	 */
	private $fontValues = [];
	/**
	 * The default font values array from settings
	 */	
	/**
	 * The index of the saved font within the list of Google fonts
	 */
	private $fontListIndex = 0;
	/**
	 * The number of fonts to display from the json file. Either positive integer or 'all'. Default = 'all'
	 */
	private $fontCount = 'all';
	/**
	 * The font list sort order. Either 'alpha' or 'popular'. Default = 'alpha'
	 */
	private $fontOrderBy = 'alpha';

	private $text_transform = array (
			'none' => 'None',
			'capitalize' => 'Capitalize',
			'uppercase' => 'Uppercase',
			'lowercase' => 'Lowercase',
			'initial' => 'Initial',        
			'inherit' => 'Inherit',                        
	);
	private $text_align = array (
			'none' => 'None',
			'left' => 'Left',
			'center' => 'Center',
			'right' => 'Right',
			'justify' => 'Justify',                        
	);       

	private $responsive_attr = '';

	/**
	 * Get our list of fonts from the json file
	 */
	public function __construct( $manager, $id, $args = array(), $options = array() ) {
		parent::__construct( $manager, $id, $args );
		// Get the font sort order
		if ( isset( $this->input_attrs['orderby'] ) && strtolower( $this->input_attrs['orderby'] ) === 'popular' ) {
			$this->fontOrderBy = 'popular';
		}
		// Get the list of Google fonts
		if ( isset( $this->input_attrs['font_count'] ) ) {
			if ( 'all' != strtolower( $this->input_attrs['font_count'] ) ) {				
				$this->fontCount = ( abs( (int) $this->input_attrs['font_count'] ) > 0 ? abs( (int) $this->input_attrs['font_count'] ) : 'all' );				
			}
		}
		$this->fontList = array_merge($this->munk_getDefaultFonts(), $this->munk_getGoogleFonts( 'all' ));

		// Decode the default json font value
		$this->fontValues = json_decode( $this->value() );	
		
		// Find the index of our default font within our list of Google fonts
		$this->fontListIndex = $this->munk_getFontIndex( $this->fontList, $this->fontValues->font );
	}
	/**
	 * Export our List of Google Fonts to JavaScript
	 */
	public function to_json() {
		parent::to_json();
		$this->json['munkfontslist'] = $this->fontList;
	}
	/**
	 * Render the control in the customizer
	 */
	public function render_content() {                                    
		$fontCounter = 0;
		$isFontInList = false;
		$fontListStr = '';
		
		if (!is_array($this->value())) {			
			$element_value = json_decode($this->value(), true);            
		}
		else {
			$element_value = json_decode( $this->settings['default']->default, true );						
		}		
				
		$responsive_attr = $this->input_attrs['responsive'];  
		if( !empty($this->fontList) ) {
			?>    
			<div class="google_fonts_select_control">                                                         
				<?php if( !empty( $this->label ) ) { ?>
					<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
				<?php } ?>
				<?php if( !empty( $this->description ) ) { ?>
					<span class="customize-control-description"><?php echo esc_html( $this->description ); ?></span>
				<?php } ?>
				<div class="munk-font-preview" data-id="<?php echo esc_attr($this->id); ?>">
						<div class="font-preview-box">
							<span class="font-family"><?php echo esc_html($element_value['font']); ?></span>                                    
							<i>/</i>
							<span class="font-weight"><?php echo esc_html($element_value['variant']); ?></span>
							<i>/</i>
							<?php if (isset($responsive_attr) && ($responsive_attr != 'false')) { 
							foreach ($responsive_attr as $device) {                                                                                    
							$selected_value_fontsize = 'fontsize_' . $device;  
							?>
							<span class="font-size-<?php echo esc_attr($device); ?>"><?php echo esc_html($element_value[$selected_value_fontsize]); ?></span>
							<?php } } ?>
						</div>					
					<a href="#" class="font-dots"><span class=""></span></a>                        
				</div>
				<div class="google-font-wrapper">
					<div class="google-font-wrapper-modal <?php echo esc_attr($this->id); ?>" data-modal="<?php echo esc_attr($this->id); ?>">
					<input type="hidden" id="<?php echo esc_attr( $this->id ); ?>" name="<?php echo esc_attr( $this->id ); ?>" value="<?php echo esc_attr( $this->value() ); ?>" class="customize-control-google-font-selection" <?php $this->link(); ?> />                                                        						
							<div class="google-fonts">
								<h5><?php echo esc_html('Font Family', 'munk'); ?></h5>
								<select class="google-fonts-list" control-name="<?php echo esc_attr( $this->id ); ?>">
										<?php
											foreach( $this->fontList as $key => $value ) {
												$fontCounter++;
												$fontListStr .= '<option value="' . esc_attr($value->family) . '" ' . selected( $this->fontValues->font, $value->family, false ) . '>' . esc_attr($value->family) . '</option>';
												if ( $this->fontValues->font === $value->family ) {
													$isFontInList = true;
												}
												if ( is_int( $this->fontCount ) && $fontCounter === $this->fontCount ) {
													break;
												}
											}
											if ( !$isFontInList && $this->fontListIndex ) {
												// If the default or saved font value isn't in the list of displayed fonts, add it to the top of the list as the default font
												$fontListStr = '<option value="' . esc_attr($this->fontList[$this->fontListIndex]->family) . '" ' . selected( $this->fontValues->font, $this->fontList[$this->fontListIndex]->family, false ) . '>' . esc_attr($this->fontList[$this->fontListIndex]->family) . ' (default)</option>' . $fontListStr;
											}
											// Display our list of font options
											echo $fontListStr; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
										?>                                    
								</select>
							</div>
						<div class="weight-style">           
							<h5><?php echo esc_html('Font Variant', 'munk'); ?></h5>
							<select class="google-fonts-regularweight-style">
								<?php
									foreach( $this->fontList[$this->fontListIndex]->variants as $key => $value ) {
										echo '<option value="' . esc_attr($value) . '" ' . selected( $this->fontValues->variant, $value, false ) . '>' . esc_attr($value) . '</option>';
									}
								?>
							</select>
						</div>  						                                                  
						<?php if (isset($responsive_attr) && ($responsive_attr != 'false')) { ?>
							<div class="munk-responsive-controls cz-control-options">
									<ul class="munk-cz-devices">
										<li class="active desktop"><button type="button" class="preview-desktop" data-device="desktop"><i class="dashicons dashicons-desktop"></i></button></li>
										<li class="tablet"><button type="button" class="preview-tablet" data-device="tablet"><i class="dashicons dashicons-tablet"></i></button></li>
										<li class="mobile"><button type="button" class="preview-mobile" data-device="mobile"><i class="dashicons dashicons-smartphone"></i></button></li>
									</ul>                                                                                      
								<?php                                                                    
									// font size                                    
									echo '<div class="font-size"><h5>' .esc_html('Font Size', 'munk'). '</h5>';
									foreach ($responsive_attr as $device) {
										$selected_value = 'fontsize_' . $device;                                            
										echo '<input type="text" class="google-fonts-font-size-'.esc_attr($device).'" value="'.esc_attr($element_value[$selected_value]).'"/>';
										}                                         
									echo '</div>';                                     
								?>                                                            
								<?php
									// line height                                    
									echo '<div class="line-height"><h5>' .esc_html('Line Height', 'munk'). '</h5>';
									foreach ($responsive_attr as $device) {       
										$selected_value = 'lineheight_' . $device;
										echo '<input type="text" class="google-fonts-line-height-'.esc_attr($device).'"value="'.esc_attr($element_value[$selected_value]).'"/>';          
									} 
									echo '</div>';                                     
								?>                                                            
								<?php
									// text transform                                    
									echo '<div class="text-transform"><h5>' .esc_html('Text Transform', 'munk'). '</h5>';
									foreach ($responsive_attr as $device) {  
									$selected_value = 'texttransform_' . $device;
									echo '<select class="google-fonts-text-transform-'.esc_attr($device).'">';
											foreach ($this->text_transform as $key => $value) {                                           
												 echo '<option value="' . esc_attr($key) . '" ' . selected( $key, $element_value[$selected_value], false ) . '>' . esc_attr($value) . '</option>';
											}                                        
									echo '</select>';
									} 
									echo '</div>';                                    
								?>                                                              
								<?php
									// text align                                    
									echo '<div class="text-align"><h5>' .esc_html('Text Align', 'munk'). '</h5>';
									foreach ($responsive_attr as $device) { 
									$selected_value = 'textalign_' . $device;
									echo '<select class="google-fonts-text-align-'.esc_attr($device).'">';
											foreach ($this->text_align as $key => $value) {                                           
												 echo '<option value="' . esc_attr($key) . '" ' . selected( $key, $element_value[$selected_value], false ) . '>' . esc_attr($value) . '</option>';
											}                                        
									echo '</select>';
									} 
									echo '</div>';                                    
								?>                              
							</div>                                 
						<?php } ?>                            
					</div>                                        
				</div>
			</div>
			<?php
		}
	}

	/**
	 * Find the index of the saved font in our multidimensional array of Google Fonts
	 */
	public function munk_getFontIndex( $haystack, $needle ) {
		foreach( $haystack as $key => $value ) {
			if( $value->family == $needle ) {
				return $key;
			}
		}
		return false;
	}

	/**
	 * Return the list of Google Fonts from our json file. Unless otherwise specfied, list will be limited to 30 fonts.
	 */
	public function munk_getGoogleFonts( $count = 30 ) {
		// Google Fonts json generated from https://www.googleapis.com/webfonts/v1/webfonts?sort=popularity&key=YOUR-API-KEY
		$fontFile = MUNK_PARENT_CUSTOMIZER_URI . '/google-fonts-alphabetical.json';
		$request = wp_remote_get( $fontFile );
		
		if( is_wp_error( $request ) ) {
			return "";
		}

		$body = wp_remote_retrieve_body( $request );
		$content = json_decode( $body );

		if( $count == 'all' ) {
			return $content->items;
		} else {
			return array_slice( $content->items, 0, $count );
		}
	}
		

	/**
	 * Return the list of Default Fonts from our json file.
	 */
	public function munk_getDefaultFonts() {				
		$default_fonts = '{"kind":"default","items":[{"kind":"default","family":"system-ui","category":"","variants":["300","400","500","700"],"subsets":[],"version":"","lastModified":"","files":{}},{"kind":"default","family":"initial","category":"","subsets":[],"version":"","lastModified":"","files":{}},{"kind":"default","family":"inherit","category":"","variants":["100","200","300","400","500","600","700","800"],"subsets":[],"version":"","lastModified":"","files":{}},{"kind":"default","family":"serif","category":"serif","variants":["regular","italic","500","500italic","600","600italic","700","700italic"],"subsets":[],"version":"","lastModified":"","files":{}},{"kind":"default","family":"sans-serif","category":"sans-serif","variants":["regular","italic","500","500italic","600","600italic","700","700italic"],"subsets":[],"version":"","lastModified":"","files":{}},{"kind":"default","family":"monospace","category":"monospace","variants":["regular","italic","500","500italic","600","600italic","700","700italic"],"subsets":[],"version":"","lastModified":"","files":{}}]}';				
		
		$content = json_decode( $default_fonts );		
		return $content->items;		
	}        

}