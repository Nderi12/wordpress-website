<?php
defined( 'ABSPATH' ) or die();

// The third-party libraries
require_once HANK_PATH . 'vendor/class-tgm-plugin-activation.php';

// Classes
require_once HANK_PATH . 'admin/inc/class-plugins-activation.php';
require_once HANK_PATH . 'admin/inc/class-sample-data-worker.php';
require_once HANK_PATH . 'admin/inc/class-sample-data.php';

// Register theme's assets
add_action( 'init', 'hank_setup_admin_assets' );

// Initialize sample data installer
add_action( 'init', 'hank_setup_sample_data_installer' );


if ( ! function_exists( 'hank_setup_admin_assets' ) ):
/**
 * Register scripts and styles for the theme
 * 
 * @return  void
 */
function hank_setup_admin_assets() {
	// Font Awesome
	wp_register_style( 'font-awesome', get_theme_file_uri( 'assets/css/components.css' ), array(), '4.7.0' );
	
	// Chosen
	wp_register_style( 'hank-chosen', get_theme_file_uri( 'admin/js/vendor/chosen/chosen.min.css' ), array(), HANK_VERSION );
	wp_register_script( 'hank-chosen', get_theme_file_uri( 'admin/js/vendor/chosen/chosen.jquery.min.js' ), array( 'jquery' ), HANK_VERSION, true );
	
	// Spectrum
	wp_register_style( 'hank-spectrum', get_theme_file_uri( 'admin/js/vendor/spectrum/spectrum.css' ), array(), HANK_VERSION );
	wp_register_script( 'hank-spectrum', get_theme_file_uri( 'admin/js/vendor/spectrum/spectrum.js' ), array( 'jquery' ), HANK_VERSION, true );

	// Spectrum
	wp_register_style( 'hank-iconpicker', get_theme_file_uri( 'admin/js/vendor/iconpicker/css/jquery.fonticonpicker.css' ), array(), HANK_VERSION );
	wp_register_script( 'hank-iconpicker', get_theme_file_uri( 'admin/js/vendor/iconpicker/fonticonpicker.js' ), array( 'jquery' ), HANK_VERSION, true );

	// VueJS library
	wp_register_script( 'vuejs', get_theme_file_uri( 'admin/js/vendor/vue.js' ), array(), HANK_VERSION, true );

	// Sample data installer
	wp_register_style( 'hank-sample-data', get_theme_file_uri( 'admin/css/sample-data.css' ) );
	wp_register_script( 'hank-sample-data', get_theme_file_uri( 'admin/js/sample-data.js' ), array( 'vuejs', 'jquery' ) );

	/**
	 * Core scripts
	 */
	wp_register_script( 'hank-options', get_theme_file_uri( 'admin/js/options.js' ), array(
		'vuejs',
		'hank-spectrum',
		'hank-chosen',
		'wp-plupload',
		'jquery-ui-resizable',
		'jquery-ui-sortable',
		'hank-iconpicker'
	), HANK_VERSION, true );

	wp_register_style( 'hank-options', get_theme_file_uri( 'admin/css/options.css' ), array(
		'font-awesome',
		'hank-chosen',
		'hank-spectrum',
		'hank-iconpicker'
	), HANK_VERSION );
	
	wp_register_style( 'hank-customize', get_theme_file_uri( 'admin/css/customize.css' ), array( 'hank-options' ), HANK_VERSION );
}
endif;



if ( ! function_exists( 'hank_setup_sample_data_installer' ) ):
function hank_setup_sample_data_installer() {
	new Hank_Sample_Data();
}
endif;

function hank_sample_data_files() {
	return array(
		array(
			'title'   => 'Sample Data #1',
			'file'    => 'demo-01.zip',
			'preview' => get_theme_file_uri( 'demo/screenshot-01.png' )
		)
	);
}
add_filter( 'hank/sample-datas', 'hank_sample_data_files' );


add_filter('acf/settings/save_json', function() {
	return get_theme_file_path( 'admin/json/' );
} );

add_filter('acf/settings/load_json', function( $paths ) {
    return array( get_theme_file_path( 'admin/json/' ) );
} );

add_filter('doing_it_wrong_trigger_error', function () {return false;}, 10, 0);