<?php
defined( 'ABSPATH' ) or die();


// Add filter to register customize containers
add_filter( 'hank_customize_containers', 'hank_customize_elements_containers' );
add_filter( 'hank_customize_settings', 'hank_customize_elements_settings' );


// Add filter to register customize controls
add_filter( 'hank_customize_controls', 'hank_customize_elements_button_controls' );
add_filter( 'hank_customize_controls', 'hank_customize_elements_input_controls' );


function hank_customize_elements_containers( $containers ) {
	$containers['elementButton'] = array(
		'type'  => 'section',
		'panel' => 'global__styles',
		'title' => esc_html__( 'Button', 'hank' ),
		'heading'     => array(
			'title'       => esc_html__( 'Element Settings', 'hank' ),
			'description' => esc_html__( 'Controls the settings for customizing the element styles.', 'hank' )
		)
	);
	$containers['elementInput'] = array(
		'type'  => 'section',
		'panel' => 'global__styles',
		'title' => esc_html__( 'Input, Textarea & Select', 'hank' )
	);

	return $containers;
}

function hank_customize_elements_settings( $settings ) {
	// The default settings for the button
	$settings['button__height'] = array( 'default' => '50px' );
	$settings['button__border'] = array( 'default' => array(
		'all'    => array( 'size' => '0px', 'style' => 'none', 'color' => '#000000' ),
		'top'    => array( 'size' => '0px', 'style' => 'none', 'color' => '#000000' ),
		'right'  => array( 'size' => '0px', 'style' => 'none', 'color' => '#000000' ),
		'bottom' => array( 'size' => '0px', 'style' => 'none', 'color' => '#000000' ),
		'left'   => array( 'size' => '0px', 'style' => 'none', 'color' => '#000000' )
	) );
	$settings['button__borderRadius'] = array( 'default' => '0px' );
	$settings['button_colors'] = array( 'default' => array(
		'default' => '',
		'hover'   => '',
		'pressed' => ''
	) );
	$settings['button__typography'] = array( 'default' => array() );
	$settings['button__padding']    = array( 'default' => array(
		'padding-top' => '0px', 'padding-right' => '0px', 'padding-bottom' => '0px', 'padding-left' => '0px'
	) );

	// The default settings for the input
	$settings['input__height'] = array( 'default' => '50px' );
	$settings['input__border'] = array( 'default' => array(
		'all'    => array( 'size' => '0px', 'style' => 'none', 'color' => '#000000' ),
		'top'    => array( 'size' => '0px', 'style' => 'none', 'color' => '#000000' ),
		'right'  => array( 'size' => '0px', 'style' => 'none', 'color' => '#000000' ),
		'bottom' => array( 'size' => '0px', 'style' => 'none', 'color' => '#000000' ),
		'left'   => array( 'size' => '0px', 'style' => 'none', 'color' => '#000000' )
	) );
	$settings['input__borderRadius'] = array( 'default' => '0px' );
	$settings['input_colors'] = array( 'default' => array(
		'default' => '',
		'hover'   => '',
		'pressed' => ''
	) );
	$settings['input__typography'] = array( 'default' => array() );
	$settings['input__padding']    = array( 'default' => array(
		'padding-top' => '0px', 'padding-right' => '0px', 'padding-bottom' => '0px', 'padding-left' => '0px'
	) );

	return $settings;
}

function hank_customize_elements_button_controls( $controls ) {
	$controls['button__background'] = array(
		'type'        => 'color',
		'section'     => 'elementButton',
		'label'       => esc_html__( 'Button Background Color', 'hank' ),
	);

	$controls['button__height'] = array(
		'type'        => 'textfield',
		'section'     => 'elementButton',
		'label'       => esc_html__( 'Button Height (px)', 'hank' ),
	);

	$controls['button__typography'] = array(
		'type'        => 'typography',
		'section'     => 'elementButton',
		'label'       => esc_html__( 'Button Font', 'hank' ),
	);

	$controls['button__padding'] = array(
		'type'        => 'dimension',
		'section'     => 'elementButton',
		'label'       => esc_html__( 'Button Padding', 'hank' ),
		'choices'     => array(
			'padding-top'    => esc_html__( 'Top', 'hank' ),
			'padding-right'  => esc_html__( 'Right', 'hank' ),
			'padding-bottom' => esc_html__( 'Bottom', 'hank' ),
			'padding-left'   => esc_html__( 'Left', 'hank' )
		)
	);

	$controls['button__border'] = array(
		'type'        => 'border',
		'section'     => 'elementButton',
		'label'       => esc_html__( 'Button Border', 'hank' ),
		'choices'     => array(
			'top'    => esc_html__( 'Top', 'hank' ),
			'right'  => esc_html__( 'Right', 'hank' ),
			'bottom' => esc_html__( 'Bottom', 'hank' ),
			'left'   => esc_html__( 'Left', 'hank' )
		)
	);
	$controls['button__borderRadius'] = array(
		'type'        => 'textfield',
		'section'     => 'elementButton',
		'label'       => esc_html__( 'Button Border Radius', 'hank' ),
	);

	return $controls;
}

function hank_customize_elements_input_controls( $controls ) {
	$controls['input__background'] = array(
		'type'        => 'color',
		'section'     => 'elementInput',
		'label'       => esc_html__( 'Background Color', 'hank' ),
	);

	$controls['input__height'] = array(
		'type'        => 'textfield',
		'section'     => 'elementInput',
		'label'       => esc_html__( 'Height (px)', 'hank' ),
	);

	$controls['input__typography'] = array(
		'type'        => 'typography',
		'section'     => 'elementInput',
		'label'       => esc_html__( 'Font', 'hank' ),
	);

	$controls['input__padding'] = array(
		'type'        => 'dimension',
		'section'     => 'elementInput',
		'label'       => esc_html__( 'Padding', 'hank' ),
		'choices'     => array(
			'padding-top'    => esc_html__( 'Top', 'hank' ),
			'padding-right'  => esc_html__( 'Right', 'hank' ),
			'padding-bottom' => esc_html__( 'Bottom', 'hank' ),
			'padding-left'   => esc_html__( 'Left', 'hank' )
		)
	);

	$controls['input__border'] = array(
		'type'        => 'border',
		'section'     => 'elementInput',
		'label'       => esc_html__( 'Border', 'hank' ),
		'choices'     => array(
			'top'    => esc_html__( 'Top', 'hank' ),
			'right'  => esc_html__( 'Right', 'hank' ),
			'bottom' => esc_html__( 'Bottom', 'hank' ),
			'left'   => esc_html__( 'Left', 'hank' )
		)
	);
	$controls['input__borderRadius'] = array(
		'type'        => 'textfield',
		'section'     => 'elementInput',
		'label'       => esc_html__( 'Border Radius', 'hank' ),
	);

	return $controls;
}
