<?php
return array(
	'name'     => esc_html__('LineThemes: Locations', 'hank'),
	'base'     => 'locations',
	'category' => 'LineThemes',
	'params'   => array(
		array(
			'type'        => 'dropdown',
			'heading'     => esc_html__( 'Maps Type', 'hank' ),
			'description' => esc_html__( 'Select the Maps type', 'hank' ),
			'group'       => esc_html__( 'Maps Settings', 'hank' ),
			'param_name'  => 'type',
			'std'         => 'roadmap',
			'value'       => array(
				'ROADMAP'   => 'roadmap',
				'SATELLITE' => 'satellite',
				'HYBRID'    => 'hybrid',
				'TERRAIN'   => 'terrain'
			)
		),

		array(
			'type'        => 'dropdown',
			'heading'     => esc_html__( 'Maps Style', 'hank' ),
			'description' => esc_html__( 'Select style for the Maps', 'hank' ),
			'group'       => esc_html__( 'Maps Settings', 'hank' ),
			'param_name'  => 'style',
			'std'         => 'default',
			'value'       => array(
				'Default'          => 'default',
				'Subtle Grayscale' => 'subtle-grayscale',
				'Pale Dawn'        => 'pale-dawn',
				'Blue Water'       => 'blue-warter',
				'Light Monochrome' => 'light-monochrome',
				'Shades of Gray'   => 'shades-of-gray'
			)
		),

		array(
			'type'        => 'dropdown',
			'heading'     => esc_html__( 'Zoom Level', 'hank' ),
			'group'       => esc_html__( 'Maps Settings', 'hank' ),
			'param_name'  => 'zoomlevel',
			'description' => esc_html__( 'Select the default zoom level for the Maps', 'hank' ),
			'value'       => array_combine( range( 1, 24 ), range( 1, 24 ) ),
			'std'         => 15
		),

		array(
			'type'        => 'dropdown',
			'heading'     => esc_html__( 'Enable Zoom On Mouse Scroll', 'hank' ),
			'description' => esc_html__( 'If select "yes", the maps will zoom in/out when user scroll the mouse', 'hank' ),
			'group'       => esc_html__( 'Maps Settings', 'hank' ),
			'param_name'  => 'zoomable',
			'std'         => 'yes',
			'value'       => array(
				esc_html__( 'No', 'hank' )  => 'no',
				esc_html__( 'Yes', 'hank' ) => 'yes'
			)
		),

		array(
			'type'        => 'dropdown',
			'heading'     => esc_html__( 'Enable Draggable', 'hank' ),
			'group'       => esc_html__( 'Maps Settings', 'hank' ),
			'param_name'  => 'draggable',
			'std'         => 'yes',
			'value'       => array(
				esc_html__( 'No', 'hank' )  => 'no',
				esc_html__( 'Yes', 'hank' ) => 'yes'
			)
		),

		array(
			'type'       => 'textfield',
			'heading'    => esc_html__( 'Height', 'hank' ),
			'group'      => esc_html__( 'Maps Settings', 'hank' ),
			'param_name' => 'height',
			'std'        => 300
		),

		array(
			'description' => esc_html__( 'Controls the locations you want to show on the maps.', 'hank' ),
			'group'       => esc_html__( 'Locations', 'hank' ),
			'type'        => 'param_group',
			'param_name'  => 'locations',
			'params'      => array(
				array(
					'type'        => 'attach_image',
					'param_name'  => 'marker',
					'heading'     => esc_html__( 'Marker Image', 'hank' ),
					'description' => esc_html__( 'Select the image you want to show as the maps marker.', 'hank' )
		        ),

		        array(
					'type'        => 'textfield',
					'heading'     => esc_html__( 'Address', 'hank' ),
					'param_name'  => 'address',
					'description' => esc_html__( 'Enter you address that will show at the center of the Maps', 'hank' ),
					'admin_label' => true
				),

				array(
					'type'        => 'textarea',
					'heading'     => esc_html__( 'Information Content', 'hank' ),
					'param_name'  => 'content'
				)
			)
		)
	)
);
