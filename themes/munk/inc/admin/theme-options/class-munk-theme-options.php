<?php
/**
 * The file for Munk Theme Options Page
 *
 * @link       https://metricthemes.com
 * @since      1.0.0
 *
 * @package    Munk
 * @since      1.1.0
 * @author     MetricThemes <support@metricthemes.com>
 *
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

if ( ! class_exists( 'Munk_Theme_Options' ) ) {

    class Munk_Theme_Options {


                /**
                 * Member Variable
                 *
                 * @var instance
                 */
                private static $instance;

                /**
                 *  Initiator
                 */
                public static function get_instance() {
                    if ( ! isset( self::$instance ) ) {
                        self::$instance = new self();
                    }
                    return self::$instance;
                }

                /**
                * Constructor
                */
                public function __construct() {

                     get_template_part('inc/admin/theme-options/functions-munk-theme', 'options');

                     add_filter( 'init', array( $this, 'munk_theme_options_run' ) );
										 add_filter( 'admin_init', array( $this, 'munk_admin_notice_run' ) );

                }

								function munk_admin_notice_run () {
										if ( !is_plugin_active( 'munk-sites/munk-sites.php' ) ) {
												if( get_option( 'munk_admin_notice_dismiss' ) != true ) {
													add_action( 'admin_notices', array( $this, 'munk_admin_notice_ed' ), 10 );
													add_action( 'wp_ajax_munk_admin_notice_dismiss', array( $this, 'munk_admin_notice_dismiss' ), 10 );
												}
										}

								}

                function munk_theme_options_run () {

                    add_filter( 'admin_menu', array( $this, 'munk_theme_options_ed' ), 10 );
                    add_action( 'admin_enqueue_scripts', array( $this, 'munk_admin_scripts' ), 10 );

                    add_action( 'munk_theme_options_top', 'munk_theme_options_header_logo', 5 );
                    add_action( 'munk_theme_options_top', 'munk_theme_options_header_desc', 10 );

                    add_action( 'munk_theme_options_left_side', 'munk_theme_options_customizer_links', 10 );
                    add_action( 'munk_theme_options_left_side', 'munk_theme_options_pro_upgrade_text', 12 );
                    add_action( 'munk_theme_options_left_side', 'munk_theme_options_pro_features', 15 );

                    add_action( 'munk_theme_options_right_side', 'munk_theme_options_instant_site_sidebar_box', 5 );
                    add_action( 'munk_theme_options_right_side', 'munk_theme_options_review_us_sidebar_box', 10 );
                    add_action( 'munk_theme_options_right_side', 'munk_theme_options_documentation_sidebar_box', 15 );
                    add_action( 'munk_theme_options_right_side', 'munk_theme_options_support_sidebar_box', 20 );

                }


                /**
                 * Enqueue scripts and styles.
                 */
                function munk_admin_scripts() {
                    wp_enqueue_style( 'munk-admin', get_template_directory_uri() . '/assets/css/munk-admin.css', '', MUNK_THEME_VERSION );
										wp_enqueue_script( 'munk-admin-notice', get_template_directory_uri() . '/inc/admin/theme-options/assets/update-notice.js', '', MUNK_THEME_VERSION, false );
                }


                function munk_theme_options_ed() {
                    add_theme_page( __('Munk Options', 'munk'), __('Munk Options', 'munk'), 'edit_theme_options', 'munk-options', array( $this, 'munk_theme_options_page' ) );
                }

                function munk_theme_options_page() {
                    ?>
                    <div class="wrap munk-admin-wrap">
                    <div class="munk-container">
                        <div class="munk-options-header">
                            <?php do_action('munk_theme_options_top') ?>
                        </div>
                    </div>
                    <div class="munk-container">
                        <div class="munk-options-body">
                            <div class="munk-body-left">
                                <?php do_action('munk_theme_options_left_side') ?>
                            </div>
                            <div class="munk-body-right">
                                <?php do_action('munk_theme_options_right_side') ?>
                            </div>
                        </div>
                    </div>
                    </div>
                <?php
                }

								function munk_admin_notice_ed() {
								    ?>
								    <div class="notice notice-success is-dismissible munk-admin-notice">
												<div class="notice-inner">
									        <h3><?php _e( 'Thanks for installing Munk, you are awesome!', 'munk' ); ?></h3>
													<p><?php _e( 'We strongly recommend to install and active the Munk Instant Sites plugin. <br> Munk Sites plugin provides professionally designed Instant Sites that you can easily import into your website directly from your WordPress Dashboard. New Designs Every Week.', 'munk' ); ?></p>
													<a href="<?php echo esc_url(admin_url( 'plugin-install.php?s=munk-sites&tab=search&type=term')); ?>" class="button button-primary button-hero"><?php _e('Install Munk Sites', 'munk'); ?></a>
												</div>
								    </div>
								    <?php
								}

								function munk_admin_notice_dismiss() {
								      update_option( 'munk_admin_notice_dismiss', true );
								}


    }

    /**
    *  Starting this off by calling 'get_instance()' method
    */
    Munk_Theme_Options::get_instance();

}
