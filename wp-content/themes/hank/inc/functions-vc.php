<?php
if ( ! function_exists( 'vc_add_param' ) ) {
    return;
}

add_action( 'vc_before_init', function () {
	vc_add_param( 'vc_row', [
		'type' => 'dropdown',
		'heading' => esc_html__( 'Canvas Effect', 'hank' ),
		'param_name' => 'canvas_effect',
		'value' => [
			esc_html__( 'No', 'hank' ) => 'no',
			esc_html__( 'Yes', 'hank' ) => 'yes'
		]
	] );
	vc_add_param( 'vc_row', [
        'type' => 'dropdown',
        'heading' => esc_html__( 'Row Styles', 'hank' ),
        'param_name' => 'row_style',
        'value' => [
            esc_html__( 'Default', 'hank' ) => '',
            esc_html__( 'Shadow', 'hank' ) => 'shadow',
            esc_html__( 'Overlay', 'hank' ) => 'overlay-1',
            esc_html__( 'Overlay and Shadow', 'hank' ) => 'overlay-1 shadow',
            esc_html__( 'Shape 1', 'hank' ) => 'shape-1',
            esc_html__( 'Shape 2', 'hank' ) => 'shape-2',
            esc_html__( 'Shape 3', 'hank' ) => 'shape-3',
            esc_html__( 'Shape 4', 'hank' ) => 'shape-4',
            esc_html__( 'Shape 5', 'hank' ) => 'shape-5'
        ]
    ] );
    vc_add_param( 'vc_row', [
        'type' => 'dropdown',
        'heading' => esc_html__( 'Background Position', 'hank' ),
        'param_name' => 'bg_position',
        'group' => esc_html__( 'Design Options', 'hank' ),
        'value' => [
            esc_html__( 'Default', 'hank' ) => '',
            esc_html__( 'Left Top', 'hank' ) => 'left top',
            esc_html__( 'Left Center', 'hank' ) => 'left center',
            esc_html__( 'Left Bottom', 'hank' ) => 'left bottom',
            esc_html__( 'Right Top', 'hank' ) => 'right top',
            esc_html__( 'Right Center', 'hank' ) => 'right center',
            esc_html__( 'Right Bottom', 'hank' ) => 'right bottom',
            esc_html__( 'Center Top', 'hank' ) => 'center top',
            esc_html__( 'Center Center', 'hank' ) => 'center center',
            esc_html__( 'Center Bottom', 'hank' ) => 'center bottom',
            esc_html__( 'Custom', 'hank' ) => 'custom'
        ]
    ] );
    vc_add_param( 'vc_row', [
        'type' => 'textfield',
        'heading' => esc_html__( 'Custom Background Position', 'hank' ),
        'param_name' => 'custom_position',
        'group' => esc_html__( 'Design Options', 'hank' ),
        'std' => '',
        'dependency' => array(
            'element' => 'bg_position',
            'value'   => 'custom',
        ),
    ] );
    
    vc_add_param( 'vc_row', [
        'type' => 'dropdown',
        'heading' => esc_html__( 'Advanced Background Size', 'hank' ),
        'param_name' => 'bg_size',
        'group' => esc_html__( 'Design Options', 'hank' ),
        'value' => [
            esc_html__( 'Default', 'hank' ) => '',
            esc_html__( '100% Width', 'hank' ) => '100% auto',
            esc_html__( '100% Height', 'hank' ) => 'auto 100%',
            esc_html__( 'Stretch', 'hank' ) => '100% 100%',
            esc_html__( 'Custom', 'hank' ) => 'custom'
        ]
    ] );
    vc_add_param( 'vc_row', [
        'type' => 'textfield',
        'heading' => esc_html__( 'Custom Background Size', 'hank' ),
        'param_name' => 'custom_size',
        'group' => esc_html__( 'Design Options', 'hank' ),
        'std' => '',
        'dependency' => array(
            'element' => 'bg_size',
            'value'   => 'custom',
        ),
    ] );
    vc_add_param( 'vc_section', [
        'type' => 'dropdown',
        'heading' => esc_html__( 'Section Styles', 'hank' ),
        'param_name' => 'section_style',
        'value' => [
            esc_html__( 'Default', 'hank' ) => '',
            esc_html__( 'Shadow', 'hank' ) => 'shadow',
            esc_html__( 'Overlay', 'hank' ) => 'overlay-1',
            esc_html__( 'Overlay and Shadow', 'hank' ) => 'overlay-1 shadow',
            esc_html__( 'Shape 1', 'hank' ) => 'shape-1',
            esc_html__( 'Shape 2', 'hank' ) => 'shape-2',
            esc_html__( 'Shape 3', 'hank' ) => 'shape-3',
            esc_html__( 'Shape 4', 'hank' ) => 'shape-4',
            esc_html__( 'Shape 5', 'hank' ) => 'shape-5'
        ]
    ] );
    vc_add_param( 'vc_section', [
        'type' => 'dropdown',
        'heading' => esc_html__( 'Background Position', 'hank' ),
        'param_name' => 'bg_position',
        'group' => esc_html__( 'Design Options', 'hank' ),
        'value' => [
            esc_html__( 'Default', 'hank' ) => '',
            esc_html__( 'Left Top', 'hank' ) => 'left top',
            esc_html__( 'Left Center', 'hank' ) => 'left center',
            esc_html__( 'Left Bottom', 'hank' ) => 'left bottom',
            esc_html__( 'Right Top', 'hank' ) => 'right top',
            esc_html__( 'Right Center', 'hank' ) => 'right center',
            esc_html__( 'Right Bottom', 'hank' ) => 'right bottom',
            esc_html__( 'Center Top', 'hank' ) => 'center top',
            esc_html__( 'Center Center', 'hank' ) => 'center center',
            esc_html__( 'Center Bottom', 'hank' ) => 'center bottom',
            esc_html__( 'Custom', 'hank' ) => 'custom'
        ]
    ] );
    vc_add_param( 'vc_section', [
        'type' => 'textfield',
        'heading' => esc_html__( 'Custom Background Position', 'hank' ),
        'param_name' => 'custom_position',
        'group' => esc_html__( 'Design Options', 'hank' ),
        'std' => '',
        'dependency' => array(
            'element' => 'bg_position',
            'value'   => 'custom',
        ),
    ] );
    vc_add_param( 'vc_section', [
        'type' => 'dropdown',
        'heading' => esc_html__( 'Advanced Background Size', 'hank' ),
        'param_name' => 'bg_size',
        'group' => esc_html__( 'Design Options', 'hank' ),
        'value' => [
            esc_html__( 'Default', 'hank' ) => '',
            esc_html__( '100% Width', 'hank' ) => '100% auto',
            esc_html__( '100% Height', 'hank' ) => 'auto 100%',
            esc_html__( 'Stretch', 'hank' ) => '100% 100%',
            esc_html__( 'Custom', 'hank' ) => 'custom'
        ]
    ] );
    vc_add_param( 'vc_section', [
        'type' => 'textfield',
        'heading' => esc_html__( 'Custom Background Size', 'hank' ),
        'param_name' => 'custom_size',
        'group' => esc_html__( 'Design Options', 'hank' ),
        'std' => '',
        'dependency' => array(
            'element' => 'bg_size',
            'value'   => 'custom',
        ),
    ] );
} );

//Shortcode
add_action( 'admin_init', function () {
	vc_add_param( 'imagebox', [
        'type' => 'dropdown',
        'heading' => esc_html__( 'Select Styles', 'hank' ),
        'param_name' => 'imagebox_style',
        'value' => [
            esc_html__( 'Default', 'hank' ) => '',
            esc_html__( 'Style 1', 'hank' ) => 'style1',
            esc_html__( 'Style 2', 'hank' ) => 'style2'
        ]
    ] );
    vc_add_param( 'member', [
        'type' => 'dropdown',
        'heading' => esc_html__( 'Select Styles', 'hank' ),
        'param_name' => 'member_style',
        'value' => [
            esc_html__( 'Default', 'hank' ) => '',
            esc_html__( 'Style 1', 'hank' ) => 'style1',
            esc_html__( 'Style 2', 'hank' ) => 'style2'
        ]
    ] );
    vc_add_param( 'iconbox', [
        'type' => 'dropdown',
        'heading' => esc_html__( 'Select Styles', 'hank' ),
        'param_name' => 'iconbox_style',
        'value' => [
            esc_html__( 'Default', 'hank' ) => '',
            esc_html__( 'Style 1', 'hank' ) => 'style1',
            esc_html__( 'Style 2', 'hank' ) => 'style2',
            esc_html__( 'Box Color: Primary', 'hank' ) => 'primary',
            esc_html__( 'Box Color: Accent', 'hank' ) => 'accent'
        ]
    ] );
    vc_add_param( 'elements_carousel', [
        'type' => 'dropdown',
        'heading' => esc_html__( 'Select Styles', 'hank' ),
        'param_name' => 'elements-carousel_style',
        'value' => [
            esc_html__( 'Default', 'hank' ) => '',
            esc_html__( 'Style 1', 'hank' ) => 'timeline',
            esc_html__( 'Style 2', 'hank' ) => 'style2'
        ]
    ] );
    vc_add_param( 'elements_carousel', [
        'type' => 'dropdown',
        'heading' => esc_html__( 'Centered Slides', 'hank' ),
        'param_name' => 'centered',
        'value' => [
            esc_html__( 'No', 'hank' ) => 'no',
            esc_html__( 'Yes', 'hank' ) => 'yes'
        ]
    ] );
} );