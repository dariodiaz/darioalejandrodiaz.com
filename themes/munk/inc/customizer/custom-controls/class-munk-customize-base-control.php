<?php
/**
 * Customize Base control class.
 *
 * @package munk
 *
 * @since 2.0.0
 *
 * @see     WP_Customize_Control
 * @access  public
 */

/**
 * Munk Custom Control Base Class
 *
 */
class Munk_Custom_Control_Base extends WP_Customize_Control {
	
	/**
	 * Enqueue our scripts and styles
	 */
	public function enqueue(){		
		
		wp_enqueue_script( 'jquery-wp-color-picker-alpha', MUNK_PARENT_CUSTOMIZER_URI . '/assets/js/wp-color-picker-alpha.js', array( 'jquery', 'wp-color-picker' ), MUNK_THEME_VERSION, true );
		wp_enqueue_script( 'jquery-select2', MUNK_PARENT_CUSTOMIZER_URI . '/assets/js/jquery.select2.js', array( 'jquery' ), MUNK_THEME_VERSION, true );
		wp_enqueue_style( 'select2', MUNK_PARENT_CUSTOMIZER_URI . '/assets/css/select2.min.css', array(), MUNK_THEME_VERSION, 'all' );						
		
		// Main scripts.
		wp_enqueue_script(
			'munk-custom-controls',
			MUNK_PARENT_CUSTOMIZER_URI . '/assets/js/controls.js',
			array(
				'jquery',
				'jquery-wp-color-picker-alpha',
				'jquery-select2',				
				'jquery-ui-core', 
				'jquery-ui-slider',																				
			),
			MUNK_THEME_VERSION,
			true
		);
		wp_enqueue_style( 
			'munk-controls', 
			MUNK_PARENT_CUSTOMIZER_URI . '/assets/css/controls.css', 
			array(
				'wp-color-picker',
			),
			MUNK_THEME_VERSION
		);						
		
	}	

    protected function munk_get_resource_url() {
        if( strpos( wp_normalize_path( __DIR__ ), wp_normalize_path( WP_PLUGIN_DIR ) ) === 0 ) {
            // We're in a plugin directory and need to determine the url accordingly.
            return plugin_dir_url( __DIR__ );
        }

        return trailingslashit( get_template_directory_uri() );
    }

}

/**
 * Munk Custom Section Base Class
 *
 */
class Munk_Custom_Section_Base extends WP_Customize_Section {
    
    protected function munk_get_resource_url() {
        if( strpos( wp_normalize_path( __DIR__ ), wp_normalize_path( WP_PLUGIN_DIR ) ) === 0 ) {
            // We're in a plugin directory and need to determine the url accordingly.
            return plugin_dir_url( __DIR__ );
        }

        return trailingslashit( get_template_directory_uri() );
    }
    
}