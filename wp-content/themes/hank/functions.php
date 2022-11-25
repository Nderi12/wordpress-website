<?php
defined( 'ABSPATH' ) or exit;

// Theme constants
define( 'HANK_PATH', trailingslashit( get_template_directory() ) );
define( 'HANK_URI', trailingslashit( get_template_directory_uri() ) );
define( 'HANK_VERSION', '1.0.0' );
define( 'HANK_ID', 'hank' );


// Action to load the theme translation
add_action( 'after_setup_theme', 'hank_translation_import', 5 );

/**
 * Load the translation files into the theme textdomain
 * 
 * @return  void
 */
function hank_translation_import() {
	load_theme_textdomain( 'hank', get_template_directory() . '/languages' );
}


/**
 * We must check PHP version to ensure the theme can
 * be worked fine
 */
if ( version_compare( PHP_VERSION, '5.3', '<' ) ) {
	// Register action to checking theme requirements
	add_action( 'after_switch_theme', 'hank_requirement_check', 10, 2 );

	// Action to sending a notice while hosting does
	// not meet the minimum requires
	add_action( 'admin_notices', 'hank_requirement_notice' );

	/**
	 * Check the theme requirements
	 *
	 * @param   string  $name   Theme's name
	 * @param   object  $theme  The theme object
	 *
	 * @return  void
	 */
	function hank_requirement_check( $name, $theme ) {
		// Switch back to previous theme
		switch_theme( $theme->stylesheet );
	}

	/**
	 * Show the warning message when hosting environment doesn't
	 * meet the theme minimum requires.
	 * 
	 * @return  void
	 */
	function hank_requirement_notice() {
		printf( '<div class="error"><p>%s</p></div>',
			esc_html__( 'Sorry! Your server does not meet the minimum requirements, please upgrade PHP version to 5.3 or higher', 'hank' ) );
	}

	return;
}


// The base classes
require_once HANK_PATH . 'inc/options/class-options-container.php';
require_once HANK_PATH . 'inc/options/class-options-control.php';
require_once HANK_PATH . 'inc/options/class-options-section.php';

require_once HANK_PATH . 'inc/functions-helpers.php';
require_once HANK_PATH . 'inc/functions-helpers-styles.php';

// Theme customize setup
require_once HANK_PATH . 'inc/customize/functions-customize.php';

// Theme setup
require_once HANK_PATH . 'inc/functions-setup.php';
require_once HANK_PATH . 'inc/functions-template.php';
require_once HANK_PATH . 'inc/functions-custom-icons.php';
require_once HANK_PATH . 'inc/functions-metaboxes.php';
require_once HANK_PATH . 'inc/class-custom-sidebars.php';

if ( is_admin() ) {
	require_once HANK_PATH . 'admin/functions-setup.php';
	require_once HANK_PATH . 'admin/functions-plugins.php';
}

// Custom filters & actions
require_once HANK_PATH . 'inc/functions-filters.php';
require_once HANK_PATH . 'inc/functions-blog.php';
require_once HANK_PATH . 'inc/functions-projects.php';
require_once HANK_PATH . 'inc/functions-woocommerce.php';
require_once HANK_PATH . 'inc/functions-vc.php';
