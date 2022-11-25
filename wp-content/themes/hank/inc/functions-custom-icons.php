<?php
defined( 'ABSPATH' ) or die();

add_filter( 'line/iconpicker_params', function( $params ) {
	$params[] = array(
		'type'        => 'iconpicker',
		'heading'     => esc_html__( 'Icon', 'hank' ),
		'param_name'  => 'icon_nucleo',
		'value'       => '', // default value to backend editor admin_label
		'description' => esc_html__( 'Select icon from library.', 'hank' ),
		'settings'    => array(
			'emptyIcon'    => false,
			'type'         => 'nucleo',
			'iconsPerPage' => 4000
		),
		'dependency' => array(
			'element' => 'type',
			'value'   => 'nucleo',
		)
	);

	return $params;
} );

add_filter( 'line/iconpicker_types_dropdown', function( $types ) {
	$types[esc_html__( 'Nucleo Icons', 'hank' )] = 'nucleo';

	return $types;
} );

add_filter( 'vc_iconpicker-type-nucleo', function( $icons ) {
	return array_merge( $icons, array(
		array( 'hank-bag-17' => 'hank-bag-17' ),
		array( 'hank-zoom' => 'hank-zoom' ),
		array( 'hank-small-right' => 'hank-small-right' ),
		array( 'hank-arrow-right' => 'hank-arrow-right' ),
		array( 'hank-small-down' => 'hank-small-down' ),
		array( 'hank-triangle-down' => 'hank-triangle-down' ),
		array( 'hank-arrow-down-2' => 'hank-arrow-down-2' ),
		array( 'hank-triangle-right' => 'hank-triangle-right' ),
		array( 'hank-triangle-up' => 'hank-triangle-up' ),
		array( 'hank-triangle-left' => 'hank-triangle-left' ),
		array( 'hank-small-up' => 'hank-small-up' ),
		array( 'hank-tail-top' => 'hank-tail-top' ),
		array( 'hank-small-left' => 'hank-small-left' ),
		array( 'hank-arrow-left' => 'hank-arrow-left' ),
		array( 'hank-i-remove' => 'hank-i-remove' ),
		array( 'hank-d-check' => 'hank-d-check' ),
		array( 'hank-single-content-03' => 'hank-single-content-03' ),
		array( 'hank-layout-25' => 'hank-layout-25' ),
		array( 'hank-paper' => 'hank-paper' ),
		array( 'hank-receipt-list-43' => 'hank-receipt-list-43' ),
		array( 'hank-screen-rotation' => 'hank-screen-rotation' ),
		array( 'hank-mobile-chat' => 'hank-mobile-chat' ),
		array( 'hank-phone-heartbeat' => 'hank-phone-heartbeat' ),
		array( 'hank-phone-button' => 'hank-phone-button' ),
		array( 'hank-b-meeting' => 'hank-b-meeting' ),
		array( 'hank-file-download-94' => 'hank-file-download-94' ),
		array( 'hank-phone' => 'hank-phone' ),
		array( 'hank-pen-tool' => 'hank-pen-tool' ),
		array( 'hank-pin-3' => 'hank-pin-3' ),
		array( 'hank-paper-diploma' => 'hank-paper-diploma' ),
		array( 'hank-trophy' => 'hank-trophy' ),
		array( 'hank-goal-65' => 'hank-goal-65' ),
		array( 'hank-single-03' => 'hank-single-03' ),
		array( 'hank-wallet-43' => 'hank-wallet-43' ),
		array( 'hank-books' => 'hank-books' ),
		array( 'hank-chart-bar-32' => 'hank-chart-bar-32' ),
		array( 'hank-chart-pie-36' => 'hank-chart-pie-36' ),
		array( 'hank-factory' => 'hank-factory' ),
		array( 'hank-payment' => 'hank-payment' ),
		array( 'hank-progress' => 'hank-progress' ),
		array( 'hank-plug' => 'hank-plug' ),
		array( 'hank-tie-02' => 'hank-tie-02' ),
		array( 'hank-bulb-63' => 'hank-bulb-63' ),
		array( 'hank-chart-bar-33' => 'hank-chart-bar-33' ),
		array( 'hank-chart-growth' => 'hank-chart-growth' ),
		array( 'hank-money-time' => 'hank-money-time' ),
		array( 'hank-pig' => 'hank-pig' ),
		array( 'hank-percentage-39' => 'hank-percentage-39' ),
		array( 'hank-percentage-38' => 'hank-percentage-38' ),
		array( 'hank-stock' => 'hank-stock' ),
		array( 'hank-strategy' => 'hank-strategy' ),
		array( 'hank-privacy-policy' => 'hank-privacy-policy' ),
		array( 'hank-chess-knight' => 'hank-chess-knight' ),
		array( 'hank-book-bookmark' => 'hank-book-bookmark' ),
		array( 'hank-design' => 'hank-design' ),
		array( 'hank-layers-2' => 'hank-layers-2' ),
		array( 'hank-stack' => 'hank-stack' ),
		array( 'hank-magnet' => 'hank-magnet' ),
		array( 'hank-measure-big' => 'hank-measure-big' ),
		array( 'hank-pantone' => 'hank-pantone' ),
		array( 'hank-pen-tool-2' => 'hank-pen-tool-2' ),
		array( 'hank-ruler-pencil' => 'hank-ruler-pencil' ),
		array( 'hank-window-paragraph' => 'hank-window-paragraph' ),
		array( 'hank-window-dev' => 'hank-window-dev' ),
		array( 'hank-sidebar' => 'hank-sidebar' ),
		array( 'hank-shape-star' => 'hank-shape-star' ),
		array( 'hank-thumb-down' => 'hank-thumb-down' ),
		array( 'hank-thumb-up' => 'hank-thumb-up' ),
		array( 'hank-sun' => 'hank-sun' ),
		array( 'hank-forest' => 'hank-forest' ),
		array( 'hank-fuel-2' => 'hank-fuel-2' ),
		array( 'hank-radiation' => 'hank-radiation' ),
		array( 'hank-gift' => 'hank-gift' ),
		array( 'hank-time-clock' => 'hank-time-clock' ),
		array( 'hank-square-pin' => 'hank-square-pin' ),
		array( 'hank-flag-points-32' => 'hank-flag-points-32' ),
		array( 'hank-map' => 'hank-map' ),
		array( 'hank-property-location' => 'hank-property-location' ),
		array( 'hank-play-movie' => 'hank-play-movie' ),
		array( 'hank-picture' => 'hank-picture' ),
		array( 'hank-sound' => 'hank-sound' ),
		array( 'hank-key' => 'hank-key' ),
		array( 'hank-new-construction' => 'hank-new-construction' ),
		array( 'hank-construction-sign' => 'hank-construction-sign' ),
		array( 'hank-barcode-qr' => 'hank-barcode-qr' ),
		array( 'hank-box-2' => 'hank-box-2' ),
		array( 'hank-support' => 'hank-support' ),
		array( 'hank-tag' => 'hank-tag' ),
		array( 'hank-engine-start' => 'hank-engine-start' ),
		array( 'hank-h-dashboard' => 'hank-h-dashboard' ),
		array( 'hank-clock' => 'hank-clock' ),
		array( 'hank-spaceship' => 'hank-spaceship' ),
		array( 'hank-alarm' => 'hank-alarm' ),
		array( 'hank-calendar-2' => 'hank-calendar-2' ),
		array( 'hank-mail' => 'hank-mail' ),
		array( 'hank-favorite' => 'hank-favorite' ),
		array( 'hank-unlocked' => 'hank-unlocked' ),
		array( 'hank-lock' => 'hank-lock' ),
		array( 'hank-cogwheel' => 'hank-cogwheel' ),
		array( 'hank-social-sharing' => 'hank-social-sharing' ),
	) );
} );

add_action( 'vc_backend_editor_enqueue_js_css', function() {
	wp_enqueue_style( 'nucleo-font', get_template_directory_uri() . '/assets/css/components.css' );
} );