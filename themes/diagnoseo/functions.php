<?php
/**
 * Setup functions and some filters
 *
 * Here are the feature declarations, code includes and other code needed for the theme to set up.
 *
 * @package WordPress
 * @subpackage SEO
 */

?>
<?php
require_once ABSPATH . 'wp-admin/includes/plugin.php';

require get_theme_file_path( '/functions/breadcrumbs.php' );
require get_theme_file_path( '/functions/class-seo-menu-walker.php' );
require get_theme_file_path( '/functions/menus.php' );
require get_theme_file_path( '/functions/structured-data.php' );
require get_theme_file_path( '/functions/comments.php' );
require get_theme_file_path( '/functions/related-posts.php' );
require get_theme_file_path( '/functions/latest-posts.php' );

if ( ! isset( $content_width ) ) {
	$content_width = 1200; // phpcs:ignore WPThemeReview.CoreFunctionality.PrefixAllGlobals.NonPrefixedVariableFound
}

add_action( 'after_setup_theme', 'diagnoseo_setup' );

/**
 * Sets up the theme
 */
function diagnoseo_setup() {
	add_editor_style();
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'html5' );
	add_theme_support( 'custom-background' );
	add_theme_support( 'custom-logo', array( 'flex-width' => true ) );
	add_theme_support( 'woocommerce' );
	add_theme_support( 'title-tag' );
	add_theme_support( 'custom-header', array() );
	add_theme_support( 'align-wide' );
	add_theme_support( 'responsive-embeds' );
	add_theme_support( 'editor-styles' );
	add_theme_support(
		'editor-color-palette',
		array(
			array(
				'name'  => __( 'orange', 'diagnoseo' ),
				'slug'  => 'orange',
				'color' => '#ff6000',
			),
			array(
				'name'  => __( 'green', 'diagnoseo' ),
				'slug'  => 'green',
				'color' => '#31d49c',
			),
			array(
				'name'  => __( 'dark green', 'diagnoseo' ),
				'slug'  => 'dark-green',
				'color' => '#03823c',
			),
			array(
				'name'  => __( 'blue', 'diagnoseo' ),
				'slug'  => 'blue',
				'color' => '#269fcc',
			),
			array(
				'name'  => __( 'dark blue', 'diagnoseo' ),
				'slug'  => 'dark-blue',
				'color' => '#105772',
			),
			array(
				'name'  => __( 'purple', 'diagnoseo' ),
				'slug'  => 'purple',
				'color' => '#a51ef2',
			),
			array(
				'name'  => __( 'pink', 'diagnoseo' ),
				'slug'  => 'pink',
				'color' => '#fc83f2',
			),
			array(
				'name'  => __( 'red', 'diagnoseo' ),
				'slug'  => 'red',
				'color' => '#f55e23',
			),
			array(
				'name'  => __( 'brown', 'diagnoseo' ),
				'slug'  => 'brown',
				'color' => '#eb7f0c',
			),
			array(
				'name'  => __( 'gray', 'diagnoseo' ),
				'slug'  => 'gray',
				'color' => '#8097a6',
			),
			array(
				'name'  => __( 'dark gray', 'diagnoseo' ),
				'slug'  => 'dark-gray',
				'color' => '#495e6c',
			),
			array(
				'name'  => __( 'light gray', 'diagnoseo' ),
				'slug'  => 'light-gray',
				'color' => '#bcc6c9',
			),
		)
	);

	set_post_thumbnail_size( 850, 99999, false ); // Default size.
	add_image_size( 'diagnoseo-thumbnail-slider', 300, 200, true );

	/**
	 * Make theme available for translation
	 * Translations can be filed in the /languages/ directory
	 */
	load_theme_textdomain( 'diagnoseo' );

	register_nav_menus(
		array(
			'primary' => __( 'Main menu', 'diagnoseo' ),
			'footer'  => __( 'Footer menu', 'diagnoseo' ),
		)
	);
}

add_action( 'widgets_init', 'diagnoseo_widgets' );

/**
 * Creates widget areas
 */
function diagnoseo_widgets() {

	register_sidebar(
		array(
			'name'          => __( 'Sidebar Widget Area', 'diagnoseo' ),
			'id'            => 'sidebar-widget-area',
			'description'   => __( 'The sidebar widget area', 'diagnoseo' ),
			'before_widget' => '<div class="widget %2$s" id="%1$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		)
	);

	register_sidebar(
		array(
			'name'          => __( 'Above footer widget area', 'diagnoseo' ),
			'id'            => 'above-footer-widget-area',
			'description'   => __( 'Widget area placed at the end of page content', 'diagnoseo' ),
			'before_widget' => '<div class="widget %2$s" id="%1$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		)
	);
}


/**
 * Enqueues styles
 */
function diagnoseo_styles() {
	$debug_suffix = constant( 'WP_DEBUG' ) ? '?v=' . time() : '';

	wp_register_style( 'seo-css-vars', false, array(), 1 );
	wp_enqueue_style( 'seo-css-vars' );

	wp_enqueue_style( 'seo-basic-style', get_template_directory_uri() . '/css/main.css' . $debug_suffix, array(), 1, 'screen' );
}
add_action( 'wp_enqueue_scripts', 'diagnoseo_styles', 1 );

/**
 * Adds styles in admin
 */
function diagnoseo_add_admin_style() {
	$debug_suffix = constant( 'WP_DEBUG' ) ? '?v=' . time() : '';

	wp_enqueue_style( 'seo-admin-css', get_template_directory_uri() . '/css/admin.css' . $debug_suffix, array(), 1 );
}
add_action( 'admin_enqueue_scripts', 'diagnoseo_add_admin_style' );

/**
 * Styles for block editor
 */
function diagnoseo_block_editor_styles() {
	$debug_suffix = constant( 'WP_DEBUG' ) ? '?v=' . time() : '';

	wp_register_style( 'seo-css-vars', false, array(), 1 );
	wp_enqueue_style( 'seo-css-vars' );
	wp_enqueue_style( 'seo-editor-style', get_template_directory_uri() . '/css/editor.css' . $debug_suffix, array(), 1 );
}
add_action( 'enqueue_block_editor_assets', 'diagnoseo_block_editor_styles' );

/**
 * Enqueuing scripts
 */
function diagnoseo_scripts() {
	$debug_suffix = constant( 'WP_DEBUG' ) ? '?v=' . time() : '';

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'diagnoseo_scripts', 10 );


/* Other functions */
require get_template_directory() . '/functions/css-variables.php';
require get_template_directory() . '/functions/setting-classes.php';
require get_template_directory() . '/functions/utils.php';
require get_template_directory() . '/functions/content-filters.php';

remove_action( 'wp_head', 'est_output_link_wp_head' );

/**
 * Removes the update theme reminder
 *
 * @param object $value Notification.
 */
function diagnoseo_disable_theme_update_notification( $value ) {
	if ( isset( $value ) && is_object( $value ) ) {
		unset( $value->response['diagnoseo'] );
	}
	return $value;
}
add_filter( 'site_transient_update_themes', 'diagnoseo_disable_theme_update_notification' );

/**
 * Moves jquery calls to page footer
 */
function diagnoseo_move_jquery_to_footer() {
	wp_scripts()->add_data( 'jquery', 'group', 1 );
	wp_scripts()->add_data( 'jquery-core', 'group', 1 );
	wp_scripts()->add_data( 'jquery-migrate', 'group', 1 );
}
add_action( 'wp_enqueue_scripts', 'diagnoseo_move_jquery_to_footer' );
