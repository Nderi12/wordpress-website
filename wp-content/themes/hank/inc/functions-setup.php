<?php
defined( 'ABSPATH' ) or die();


// Setup the theme navigation
add_action( 'after_setup_theme', 'hank_navigation' );

// Setup theme supports
add_action( 'after_setup_theme', 'hank_supports' );

// Setup theme sidebars
add_action( 'widgets_init', 'hank_sidebars' );

// Add action to register the needed scripts and styles
// for the theme
add_action( 'init', 'hank_register_assets', 5 );

// We need enqueue the scripts and styles before showing
// the content
add_action( 'wp_enqueue_scripts', 'hank_enqueue_assets', 5 );

// Adding SVG support in the media library
add_filter( 'upload_mimes', 'hank_upload_mimes' );

// Adding filter to change the shortcodes path
add_filter( 'line-shortcode-path', 'hank_shortcodes_path' );

add_filter( 'vc_before_init', 'hank_shortcodes_init' );

add_filter( 'wp_kses_allowed_html', 'hank_allowed_html', 10, 2 );

add_filter( 'the_content', function ( $content ) {
	if ( is_singular() ) {
		return preg_replace( '/<p>\s*<span id="more-[0-9]+">\s*<\/span><\/p>/is', '', $content );
	}

	return $content;
}, 99 );


if ( ! isset( $content_width ) ) {
	$content_width = 900;
}

function hank_cleanup ( $content ) {
	return $content;
}

function hank_allowed_html ( $allowed_tags, $context ) {
	if ( $context === 'post' ) {
		$allowed_tags['div'] = array_merge( $allowed_tags['div'], [
			'data-vc-parallax-image' => true,
			'data-vc-video-bg' => true
		] );

		$common_atts = [
			'id' => true,
			'class' => true,
			'style' => true,
			'width' => true,
			'height' => true,
			'type' => true,
			'data-*' => true
		];

		$allowed_tags['rs-module-wrap'] = $common_atts;
		$allowed_tags['rs-module'] = $common_atts;
		$allowed_tags['rs-slides'] = $common_atts;
		$allowed_tags['rs-slide'] = $common_atts;
		$allowed_tags['rs-layer'] = $common_atts;
		$allowed_tags['rs-progress'] = $common_atts;
		$allowed_tags['script'] = $common_atts;
	}

	return $allowed_tags;
}

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function hank_pingback_header() {
	if ( is_singular() && pings_open() ) {
		echo '<link rel="pingback" href="', esc_url( get_bloginfo( 'pingback_url' ) ), '">';
	}
}
add_action( 'wp_head', 'hank_pingback_header' );


/**
 * Register the theme menu locations
 *
 * @return  void
 * @since   1.0.0
 */
function hank_navigation() {
	register_nav_menus( array(
		'primary'   => esc_html__( 'Primary Menu', 'hank' ),
		'sliding'   => esc_html__( 'Sliding Menu', 'hank' ),
		'top'       => esc_html__( 'Top Menu', 'hank' )
	) );
}


/**
 * Register the theme features support
 *
 * @return  void
 */
function hank_supports() {
	add_theme_support( 'woocommerce' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-formats', array( 'gallery', 'link', 'quote', 'status', 'video', 'audio' ) );
	add_theme_support( 'html5', array( 'comment-list', 'search-form', 'comment-form', 'gallery', 'caption' ) );
	add_theme_support( 'post-thumbnails' );
}


function hank_sidebars() {
	register_sidebar( array(
		'name'          => esc_html__( 'Primary Widgets Area', 'hank' ),
		'id'            => 'primary',
		'description'   => esc_html__( 'Add widgets here to appear in your sidebar', 'hank' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Sliding Content - Left', 'hank' ),
		'id'            => 'off-canvas-left',
		'description'   => esc_html__( 'Add widgets here to appear in your sidebar', 'hank' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Sliding Content - Right', 'hank' ),
		'id'            => 'off-canvas-right',
		'description'   => esc_html__( 'Add widgets here to appear in your sidebar', 'hank' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	/**
	 * Content bottom sidebars
	 */
	register_sidebar( array(
		'name'          => esc_html__( 'Content Bottom #1', 'hank' ),
		'id'            => 'content-bottom-1',
		'description'   => esc_html__( 'Add widgets here to appear in your Content Bottom #1 area', 'hank' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Content Bottom #2', 'hank' ),
		'id'            => 'content-bottom-2',
		'description'   => esc_html__( 'Add widgets here to appear in your Content Bottom #2 area', 'hank' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Content Bottom #3', 'hank' ),
		'id'            => 'content-bottom-3',
		'description'   => esc_html__( 'Add widgets here to appear in your Content Bottom #3 area', 'hank' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Content Bottom #4', 'hank' ),
		'id'            => 'content-bottom-4',
		'description'   => esc_html__( 'Add widgets here to appear in your Content Bottom #4 area', 'hank' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	/**
	 * Footer sidebars
	 */
	register_sidebar( array(
		'name'          => esc_html__( 'Footer #1', 'hank' ),
		'id'            => 'footer-1',
		'description'   => esc_html__( 'Add widgets here to appear in your Footer #1 area', 'hank' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer #2', 'hank' ),
		'id'            => 'footer-2',
		'description'   => esc_html__( 'Add widgets here to appear in your Footer #2 area', 'hank' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer #3', 'hank' ),
		'id'            => 'footer-3',
		'description'   => esc_html__( 'Add widgets here to appear in your Footer #3 area', 'hank' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer #4', 'hank' ),
		'id'            => 'footer-4',
		'description'   => esc_html__( 'Add widgets here to appear in your Footer #4 area', 'hank' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
}


function hank_register_assets() {
	// Theme's styles
	wp_register_style( 'hank-components', get_template_directory_uri() . '/assets/css/components.css', array(), HANK_VERSION, 'all' );

	if (is_child_theme()) {
		wp_register_style( 'hank-parent', get_template_directory_uri() . '/assets/css/style.css', array( 'hank-components' ), HANK_VERSION, 'all' );
		wp_register_style( 'hank', get_stylesheet_uri(), array( 'hank-parent' ), HANK_VERSION, 'all' );
	} else {
		wp_register_style( 'hank', get_template_directory_uri() . '/assets/css/style.css', array( 'hank-components' ), HANK_VERSION, 'all' );
	}

	// Theme's scripts
	wp_register_script( 'hank-components', get_theme_file_uri( '/assets/js/components.js' ), ['jquery'], HANK_VERSION, true );
	wp_register_script( 'hank', get_template_directory_uri() . '/assets/js/theme.js', ['hank-components'], HANK_VERSION, true );

	if ( $settings = get_option( 'line_settings' ) ) {
		wp_register_script( 'line-shortcode-maps-api', 'https://maps.google.com/maps/api/js?v=3&key=' . $settings['maps_api'], array(), false, true );
	}
}


function hank_enqueue_google_fonts() {
	global $_required_google_fonts;

	if ( ! empty( $_required_google_fonts ) && is_array( $_required_google_fonts ) ) {
		$fonts = array();
		$subsets = array();

		foreach ( $_required_google_fonts as $font ) {
			$fonts[] = sprintf( '%s:%s', urlencode( $font['family'] ), urlencode( $font['variants'] ) );
			$subsets = array_merge( $subsets, $font['subsets'] );
		}

		if ( ! empty( $fonts ) ) {
			$scheme = parse_url( get_site_url(), PHP_URL_SCHEME );
			$fonts_url = add_query_arg( array(
				'family' => implode( '|', array_unique( $fonts ) ),
				'subset' => implode( ',', array_unique( $subsets ) )
				), sprintf( '%s://fonts.googleapis.com/css', $scheme ) );

			wp_enqueue_style( 'hank-fonts', $fonts_url );
		}
	}
}


function hank_enqueue_assets() {
	// The dynamic styles
	if ( locate_template( 'dynamic-styles.php' ) ) {
		// Load the script that generate the dynamic
		// stylesheets
		get_template_part( 'dynamic-styles' );
	}

	hank_enqueue_google_fonts();

	// Enqueue the main styles
	wp_enqueue_style( 'hank' );

	// Enqueue the inline stylesheet
	wp_add_inline_style( 'hank', hank_styles() );
	wp_add_inline_style( 'hank', hank_scheme_styles() );

	// Enqueue the main script
	wp_enqueue_script( 'hank' );

	// Comment script
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}


/**
 * Register custom mime types for the theme
 *
 * @param   array  $mimes  List of mime types
 * @return  array
 */
function hank_upload_mimes( $mimes ) {
	$mimes['ico'] = 'image/x-icon';
	$mimes['dat'] = 'application/octet-stream';
	$mimes['txt'] = 'text/plain';

	return $mimes;
}


/**
 * Return the string that indicated the folder which contains
 * all shortcode templates
 *
 * @param   string  $path  The original path
 * @return  string
 */
function hank_shortcodes_path( $path ) {
	return 'tmpl/shortcodes/';
}


/**
 * Initial the additional shortcodes for the theme
 *
 * @return  void
 */
function hank_shortcodes_init() {
	require_once get_theme_file_path( 'inc/elements/locations.php' );
	
	vc_lean_map( 'video-lightbox', null, get_theme_file_path( 'inc/elements/video-lightbox.php' ) );
	vc_lean_map( 'project-carousel', null, get_theme_file_path( 'inc/elements/project-carousel.php' ) );
}


function hank_acf_fallback_init () {
	if ( ! function_exists( 'get_field' ) ) {
		function get_field () {}
	}

	if ( ! function_exists( 'the_field' ) ) {
		function the_field () {}
	}
}
add_action( 'wp', 'hank_acf_fallback_init' );

//Restoring the classic Widgets Editor 
function hank_theme_support() {
    remove_theme_support( 'widgets-block-editor' );
}
add_action( 'after_setup_theme', 'hank_theme_support' );