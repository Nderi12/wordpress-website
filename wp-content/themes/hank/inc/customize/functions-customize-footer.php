<?php
defined( 'ABSPATH' ) or die();


// Add filter to register customize containers
add_filter( 'hank_customize_containers', 'hank_customize_footer_containers' );
add_filter( 'hank_customize_settings', 'hank_customize_footer_settings' );


// Add filter to register customize controls
add_filter( 'hank_customize_controls', 'hank_customize_footer_controls' );
add_filter( 'hank_customize_controls', 'hank_customize_footer_widgets_controls' );
add_filter( 'hank_customize_controls', 'hank_customize_footer_copyright_controls' );


function hank_customize_footer_containers( $containers ) {
	$containers['footerGeneral'] = array(
		'type'    => 'section',
		'panel'   => 'headerAndFooter',
		'title'   => _x( 'General Settings', 'customize', 'hank' ),
		'heading' => array(
			'title'       => _x( 'Footer Settings', 'customize', 'hank' ),
			'description' => _x( '', 'customize', 'hank' )
		)
	);
	$containers['footerWidgets'] = array(
		'type'  => 'section',
		'panel' => 'headerAndFooter',
		'title' => _x( 'Widget Areas', 'customize', 'hank' )
	);
	$containers['footerCopyright'] = array(
		'type'  => 'section',
		'panel' => 'headerAndFooter',
		'title' => _x( 'Copyright Settings', 'customize', 'hank' )
	);

	return $containers;
}


function hank_customize_footer_settings( $settings ) {
	$settings['footer__background'] = array( 'default' => array() );
	$settings['footer__typography'] = array( 'default' => array() );
	$settings['footer__colors']     = array( 'default' => array() );
	$settings['footer__border']     = array( 'default' => array(
		'all'    => array( 'size' => '0px', 'style' => 'none', 'color' => '#000000' ),
		'top'    => array( 'size' => '0px', 'style' => 'none', 'color' => '#000000' ),
		'right'  => array( 'size' => '0px', 'style' => 'none', 'color' => '#000000' ),
		'bottom' => array( 'size' => '0px', 'style' => 'none', 'color' => '#000000' ),
		'left'   => array( 'size' => '0px', 'style' => 'none', 'color' => '#000000' )
	) );
	$settings['footer__padding']    = array( 'default' => array(
		'padding-top'    => '0px',
		'padding-right'  => '0px',
		'padding-bottom' => '0px',
		'padding-left'   => '0px'
	) );


	$settings['footer__copyright']             = array( 'default' => 'on' );
	$settings['footer__copyright__content']    = array( 'default' => 'Copyright &copy; 2017 LineThemes.' );
	$settings['footer__copyright__align']      = array( 'default' => 'center' );
	$settings['footer__copyright__full']         = array( 'default' => 'off' );
	$settings['footer__copyright__typography'] = array( 'default' => array() );
	$settings['footer__copyright__colors'] = array( 'default' => array() );
	$settings['footer__copyright__border']     = array( 'default' => array(
		'all'    => array( 'size' => '0px', 'style' => 'none', 'color' => '#000000' ),
		'top'    => array( 'size' => '0px', 'style' => 'none', 'color' => '#000000' ),
		'right'  => array( 'size' => '0px', 'style' => 'none', 'color' => '#000000' ),
		'bottom' => array( 'size' => '0px', 'style' => 'none', 'color' => '#000000' ),
		'left'   => array( 'size' => '0px', 'style' => 'none', 'color' => '#000000' )
	) );
	$settings['footer__copyright__padding'] = array( 'default' => array(
		'padding-top'    => '0px',
		'padding-right'  => '0px',
		'padding-bottom' => '0px',
		'padding-left'   => '0px'
	) );
	$settings['footer__copyright__background'] = array( 'default' => array() );


	$settings['footer__widgets']                  = array( 'default' => 'off' );
	$settings['footer__widgets__layout']          = array( 'default' => array(
		'columns' => 4,
		'layout'  => array(
			1 => array( 12 ),
			2 => array( 6, 6 ),
			3 => array( 4, 4, 4 ),
			4 => array( 3, 3, 3, 3 ),
		)
	) );
	$settings['footer__widgets__full']            = array( 'default' => 'off' );
	$settings['footer__widgets__padding']         = array( 'default' => array(
		'padding-top'    => '0px',
		'padding-right'  => '0px',
		'padding-bottom' => '0px',
		'padding-left'   => '0px'
	) );
	$settings['footer__widgets__background']      = array( 'default' => array() );
	$settings['footer__widgets__typography']      = array( 'default' => array() );
	$settings['footer__widgets__colors']          = array( 'default' => array() );
	$settings['footer__widgets__title']           = array( 'default' => array() );
	$settings['footer__widgets__margin']          = array( 'default' => array(
		'margin-top'    => '0px',
		'margin-right'  => '0px',
		'margin-bottom' => '0px',
		'margin-left'   => '0px'
	) );

	return $settings;
}



function hank_customize_footer_controls( $controls ) {
	$controls['footer__background'] = array(
		'type'        => 'background',
		'section'     => 'footerGeneral',
		'label'       => _x( 'Footer Background', 'customize', 'hank' ),
		'description' => _x( '', 'customize', 'hank' )
	);

	$controls['footer__typography'] = array(
		'type'        => 'typography',
		'section'     => 'footerGeneral',
		'label'       => _x( 'Footer Font', 'customize', 'hank' ),
		'description' => _x( '', 'customize', 'hank' )
	);
	$controls['footer__colors'] = array(
		'type'        => 'colors',
		'section'     => 'footerGeneral',
		'label'       => _x( 'Footer Link Colors', 'customize', 'hank' ),
		'description' => _x( '', 'customize', 'hank' ),
		'choices'     => array(
			'link'      => _x( 'Link', 'customize', 'hank' ),
			'linkHover' => _x( 'Link Hover', 'customize', 'hank' )
		)
	);
	$controls['footer__padding'] = array(
		'type'        => 'dimension',
		'section'     => 'footerGeneral',
		'label'       => _x( 'Footer Padding', 'customize', 'hank' ),
		'description' => _x( '', 'customize', 'hank' ),
		'choices'     => array(
			'padding-top'    => _x( 'Top', 'customize', 'hank' ),
			'padding-right'  => _x( 'Right', 'customize', 'hank' ),
			'padding-bottom' => _x( 'Bottom', 'customize', 'hank' ),
			'padding-left'   => _x( 'Left', 'customize', 'hank' )
		)
	);
	$controls['footer__border'] = array(
		'type'        => 'border',
		'section'     => 'footerGeneral',
		'label'       => _x( 'Footer Border', 'customize', 'hank' ),
		'description' => _x( '', 'customize', 'hank' ),
		'choices'     => array(
			'top'    => esc_html__( 'Top', 'hank' ),
			'right'  => esc_html__( 'Right', 'hank' ),
			'bottom' => esc_html__( 'Bottom', 'hank' ),
			'left'   => esc_html__( 'Left', 'hank' )
		)
	);

	return $controls;
}



function hank_customize_footer_copyright_controls( $controls ) {
	$controls['footer__copyright'] = array(
		'type'        => 'radio-onoff',
		'section'     => 'footerCopyright',
		'label'       => _x( 'Enable Copyright Bar', 'customize', 'hank' ),
		'description' => _x( '', 'customize', 'hank' )
	);
	$controls['footer__copyright__full'] = array(
		'type'        => 'radio-onoff',
		'section'     => 'footerCopyright',
		'label'       => _x( '100% Full Width', 'customize', 'hank' ),
		'description' => _x( '', 'customize', 'hank' )
	);
	$controls['footer__copyright__content'] = array(
		'type'        => 'textareafield',
		'section'     => 'footerCopyright',
		'label'       => _x( 'Copyright Content', 'customize', 'hank' ),
		'description' => _x( '', 'customize', 'hank' )
	);
	$controls['footer__copyright__align'] = array(
		'type'        => 'radio-buttons',
		'section'     => 'footerCopyright',
		'label'       => _x( 'Copyright Bar Alignment', 'customize', 'hank' ),
		'description' => _x( '', 'customize', 'hank' ),
		'choices'     => array(
			'left'   => _x( 'Left', 'customize', 'hank' ),
			'center' => _x( 'Center', 'customize', 'hank' ),
			'right'  => _x( 'Right', 'customize', 'hank' )
		)
	);
	$controls['footer__copyright__background'] = array(
		'type'        => 'background',
		'section'     => 'footerCopyright',
		'label'       => _x( 'Copyright Bar Background', 'customize', 'hank' )
	);

	$controls['footer__copyright__typography'] = array(
		'type'        => 'typography',
		'section'     => 'footerCopyright',
		'label'       => _x( 'Typography', 'customize', 'hank' ),
		'description' => _x( '', 'customize', 'hank' )
	);
	$controls['footer__copyright__colors'] = array(
		'type'        => 'colors',
		'section'     => 'footerCopyright',
		'label'       => _x( 'Link Colors', 'customize', 'hank' ),
		'description' => _x( '', 'customize', 'hank' ),
		'choices'     => array(
			'link'      => _x( 'Link', 'customize', 'hank' ),
			'linkHover' => _x( 'Link Hover', 'customize', 'hank' )
		)
	);

	$controls['footer__copyright__border'] = array(
		'type'        => 'border',
		'section'     => 'footerCopyright',
		'label'       => _x( 'Border', 'customize', 'hank' ),
		'description' => _x( '', 'customize', 'hank' ),
		'choices'     => array(
			'top'    => esc_html__( 'Top', 'hank' ),
			'right'  => esc_html__( 'Right', 'hank' ),
			'bottom' => esc_html__( 'Bottom', 'hank' ),
			'left'   => esc_html__( 'Left', 'hank' )
		)
	);
	$controls['footer__copyright__padding'] = array(
		'type'        => 'dimension',
		'section'     => 'footerCopyright',
		'label'       => _x( 'Padding', 'customize', 'hank' ),
		'description' => _x( '', 'customize', 'hank' ),
		'choices'     => array(
			'padding-top'    => _x( 'Top', 'customize', 'hank' ),
			'padding-right'  => _x( 'Right', 'customize', 'hank' ),
			'padding-bottom' => _x( 'Bottom', 'customize', 'hank' ),
			'padding-left'   => _x( 'Left', 'customize', 'hank' )
		)
	);

	return $controls;
}



function hank_customize_footer_widgets_controls( $controls ) {
	$controls['footer__widgets'] = array(
		'type'        => 'radio-onoff',
		'section'     => 'footerWidgets',
		'label'       => _x( 'Enable Footer Widget Areas', 'customize', 'hank' ),
		'description' => _x( '', 'customize', 'hank' )
	);
	$controls['footer__widgets__full'] = array(
		'type'        => 'radio-onoff',
		'section'     => 'footerWidgets',
		'label'       => _x( '100% Full Width', 'customize', 'hank' ),
		'description' => _x( '', 'customize', 'hank' )
	);
	$controls['footer__widgets__layout'] = array(
		'type'        => 'column-layout',
		'section'     => 'footerWidgets',
		'label'       => _x( 'Widgetized Layout Builder', 'customize', 'hank' ),
		'description' => _x( '', 'customize', 'hank' )
	);
	$controls['footer__widgets__background'] = array(
		'type'        => 'background',
		'section'     => 'footerWidgets',
		'label'       => _x( 'Footer Widget Areas Background', 'customize', 'hank' ),
		'description' => _x( '', 'customize', 'hank' )
	);
	$controls['footer__widgets__padding'] = array(
		'type'        => 'dimension',
		'section'     => 'footerWidgets',
		'label'       => _x( 'Footer Widget Areas Padding', 'customize', 'hank' ),
		'description' => _x( '', 'customize', 'hank' ),
		'choices'     => array(
			'padding-top'    => _x( 'Top', 'customize', 'hank' ),
			'padding-right'  => _x( 'Right', 'customize', 'hank' ),
			'padding-bottom' => _x( 'Bottom', 'customize', 'hank' ),
			'padding-left'   => _x( 'Left', 'customize', 'hank' )
		)
	);
	$controls['footer__widgets__typography'] = array(
		'type'        => 'typography',
		'section'     => 'footerWidgets',
		'label'       => _x( 'Footer Widget Areas Font', 'customize', 'hank' ),
		'description' => _x( '', 'customize', 'hank' )
	);
	$controls['footer__widgets__colors'] = array(
		'type'        => 'colors',
		'section'     => 'footerWidgets',
		'label'       => _x( 'Footer Widget Areas Link Colors', 'customize', 'hank' ),
		'description' => _x( '', 'customize', 'hank' ),
		'choices'     => array(
			'link'      => _x( 'Link', 'customize', 'hank' ),
			'linkHover' => _x( 'Link Hover', 'customize', 'hank' )
		)
	);
	$controls['footer__widgets__titleHeading'] = array(
		'type'        => 'heading',
		'section'     => 'footerWidgets',
		'label'       => esc_html__( 'Footer Widget Title Font', 'hank' ),
	);
	$controls['footer__widgets__title'] = array(
		'type'        => 'typography',
		'section'     => 'footerWidgets'
	);
	$controls['footer__widgets__margin'] = array(
		'type'    => 'dimension',
		'section' => 'footerWidgets',
		'label'   => esc_html__( 'Footer Widget Margin', 'hank' ),
		'choices' => array(
			'margin-top'    => esc_html__( 'Top', 'hank' ),
			'margin-right'  => esc_html__( 'Right', 'hank' ),
			'margin-bottom' => esc_html__( 'Bottom', 'hank' ),
			'margin-left'   => esc_html__( 'Left', 'hank' )
		)
	);

	return $controls;
}

