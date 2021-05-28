<?php
/**
 * Theme Scripts
 *
 * @package Munk
 */

/**
 * Enqueue scripts and styles.
 */
function munk_scripts() {   
	
	wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/assets/css/bootstrap.css', '', MUNK_THEME_VERSION );
	wp_enqueue_style( 'munk-theme', get_template_directory_uri() . '/assets/css/theme.css', '', MUNK_THEME_VERSION );	
	wp_enqueue_style( 'munk-style', get_stylesheet_uri(), '', MUNK_THEME_VERSION );	   	
		
	wp_enqueue_script( 'jquery-bootstrap', get_template_directory_uri() . '/assets/js/bootstrap.js', array('jquery'), MUNK_THEME_VERSION, true );
	wp_enqueue_script( 'munk-custom', get_template_directory_uri() . '/assets/js/munk.js', array('jquery'), MUNK_THEME_VERSION, true );					

	$munk_sticky_header = get_theme_mod('munk_layout_site_header_sticky_ed', '0');				
	$munk_header_layout = get_theme_mod('munk_layout_site_header_primary_ed', 'layout-one');					
	$munk_data = array(
		'header_layout' => $munk_header_layout,
		'sticky_header' => $munk_sticky_header,
	);
	
	wp_localize_script( 'munk-custom', 'Munk_Data', $munk_data );	
		
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'munk_scripts', 10 );

function munk_blocks_scripts() {

    // disabling block editor style to load after theme styles
    wp_dequeue_style( 'wp-block-library' ); 
    wp_dequeue_style( 'wp-block-library-theme' ); 
    
    wp_enqueue_style( 'wp-block-library' ); 
    wp_enqueue_style( 'wp-block-library-theme' ); 
	
}
add_action( 'wp_enqueue_scripts', 'munk_blocks_scripts', 20 );