<?php
defined( 'ABSPATH' ) or die();

add_filter( 'hank_customize_containers', 'hank_customize_projects_containers' );
add_filter( 'hank_customize_controls', 'hank_customize_projects_controls' );
add_filter( 'hank_customize_controls', 'hank_customize_single_project_controls' );
add_filter( 'hank_customize_controls', 'hank_customize_project_related' );
add_filter( 'hank_customize_settings', 'hank_customize_projects_settings' );


function hank_customize_projects_containers( $containers ) {
	$containers['projects'] = array(
		'type'        => 'panel',
		'title'       => esc_html__( 'Projects', 'hank' ),
		'description' => ''
	);

	$containers[ 'projectsList' ] = array(
		'type'  => 'section',
		'title'       => esc_html__( 'Project Archive', 'hank' ),
		'description' => '',
		'panel'       => 'projects'
	);

	$containers[ 'projectsSingle' ] = array(
		'type'  => 'section',
		'title'       => esc_html__( 'Project Single', 'hank' ),
		'description' => '',
		'panel'       => 'projects'
	);

	$containers[ 'projectsRelated' ] = array(
		'type'  => 'section',
		'title'       => esc_html__( 'Related Projects', 'hank' ),
		'description' => '',
		'panel'       => 'projects'
	);

	return $containers;
}


function hank_customize_projects_controls( $controls ) {
	$controls['projects__displayMode'] = array(
		'type'        => 'radio-buttons',
		'section'     => 'projectsList',
		'description' => esc_html__( 'Controls the layout for the projects pages.', 'hank' ),
		'choices'     => array(
			'grid-alt'  => esc_html__( 'Grid Titte', 'hank' ),
			'grid'      => esc_html__( 'Grid', 'hank' ),
			'masonry'   => esc_html__( 'Masonry', 'hank' )
		)
	);

	$controls['projects__gridColumns'] = array(
		'type'        => 'radio-buttons',
		'section'     => 'projectsList',
		'label'       => esc_html__( 'Grid Columns', 'hank' ),
		'choices'     => array( 2 => 2, 3 => 3, 4 => 4, 5 => 5 )
	);
	$controls['projects__gridGutter'] = array(
		'type'        => 'textfield',
		'section'     => 'projectsList',
		'label'       => esc_html__( 'Grid Column Spacing (px)', 'hank' ),
	);
	$controls['projects__imagesize'] = array(
		'type'        => 'textfield',
		'section'     => 'projectsList',
		'label' => esc_html__( 'Image Size', 'hank' ),
		'description' => esc_html__( 'Enter image size. Example: "thumbnail", "medium", "large", "full" or other sizes defined by current theme. Alternatively enter image size in pixels: 200x100 (Width x Height). Leave empty to use "thumbnail" size.', 'hank' )
	);
	$controls['projects__imagesizeCrop'] = array(
		'type'        => 'radio-buttons',
		'section'     => 'projectsList',
		'choices'     => array(
			'crop' => esc_html__('Hard Crop', 'hank'),
			'none' => esc_html__('None', 'hank')
		)
	);

	$controls['projects__filterable'] = array(
		'type'        => 'radio-onoff',
		'section'     => 'projectsList',
		'label'       => esc_html__( 'Enable Projects Filterable', 'hank' ),
	);
	$controls['projects__filterableType'] = array(
		'type'        => 'radio-buttons',
		'section'     => 'projectsList',
		'label'       => esc_html__( 'Filterable Type', 'hank' ),
		'choices'     => array(
			'nproject-tag'      => esc_html__( 'Tag', 'hank' ),
			'nproject-category' => esc_html__( 'Category', 'hank' )
		)
	);
	$controls['projects__filterableAlign'] = array(
		'type'        => 'radio-buttons',
		'section'     => 'projectsList',
		'label'       => _x( 'Filterable Alignment', 'customize', 'hank' ),
		'description' => _x( '', 'customize', 'hank' ),
		'choices'     => array(
			'left'    => _x( 'Left', 'customize', 'hank' ),
			'center'  => _x( 'Center', 'customize', 'hank' ),
			'right'   => _x( 'Right', 'customize', 'hank' )
		)
	);

	$controls['projects__excerpt'] = array(
		'type'        => 'radio-onoff',
		'section'     => 'projectsList',
		'label'       => esc_html__( 'Show Summary Text', 'hank' ),
	);
	$controls['projects__autoExcerptLength'] = array(
		'type'        => 'textfield',
		'section'     => 'projectsList',
		'label'       => esc_html__( 'Summary Text Length', 'hank' ),
	);

	$controls['projects__readmore'] = array(
		'type'        => 'radio-onoff',
		'section'     => 'projectsList',
		'label'       => esc_html__( 'Show Readmore Button', 'hank' ),
	);


	// Sidebar section
	$controls['projects__sidebarHeading'] = array(
		'type'        => 'heading',
		'section'     => 'projectsList',
		'label'       => esc_html__( 'Sidebar', 'hank' ),
	);
	$controls['projects__sidebar'] = array(
		'type'        => 'dropdown',
		'section'     => 'projectsList',
		'choices'     => 'hank_customize_dropdown_sidebars'
	);

	$controls['projects__sidebarPosition'] = array(
		'type'    => 'radio-buttons',
		'section' => 'projectsList',
		'label'   => esc_html__( 'Sidebar Position', 'hank' ),
		'choices' => array(
			'none'  => esc_html__( 'No Sidebar', 'hank' ),
			'left'  => esc_html__( 'Left', 'hank' ),
			'right' => esc_html__( 'Right', 'hank' )
		)
	);

	$controls['project__page__title'] = array(
		'type'    => 'textfield',
		'label'   => esc_html__( 'Archive Page Title', 'hank' ),
		'section' => 'projectsList',
		'default' => esc_html__( 'Project', 'hank' )
	);

	return $controls;
}


function hank_customize_single_project_controls( $controls ) {
	$controls['project__pagination'] = array(
		'type'        => 'radio-onoff',
		'section'     => 'projectsSingle',
		'label'       => esc_html__( 'Show Post Navigator', 'hank' ),
	);
	$controls['project__author'] = array(
		'type'        => 'radio-onoff',
		'section'     => 'projectsSingle',
		'label'       => esc_html__( 'Show Post Author', 'hank' ),
	);
	$controls['project__tags'] = array(
		'type'        => 'radio-onoff',
		'section'     => 'projectsSingle',
		'label'       => esc_html__( 'Show Project Tags', 'hank' ),
	);
	$controls['project__related'] = array(
		'type'        => 'radio-onoff',
		'section'     => 'projectsSingle',
		'label'       => esc_html__( 'Show Related Posts', 'hank' ),
	);
	$controls['project__galerryMode'] = array(
		'type'        => 'radio-buttons',
		'section'     => 'projectsSingle',
		'label'       => esc_html__( 'Gallery Styles', 'hank' ),
		'choices'     => array(
			'list'   => esc_html__( 'List', 'hank' ),
			'slider' => esc_html__( 'Slider', 'hank' ),
			'grid'   => esc_html__( 'Grid', 'hank' )
		)
	);

	$controls['project__galleryColumns'] = array(
		'type'        => 'radio-buttons',
		'section'     => 'projectsSingle',
		'label'       => esc_html__( 'Gallery Columns', 'hank' ),
		'choices'     => array(
			2 => 2,
			3 => 3,
			4 => 4,
			5 => 5,
		)
	);
	$controls['project__galleryPosition'] = array(
		'type'        => 'radio-buttons',
		'section'     => 'projectsSingle',
		'label'       => esc_html__( 'Gallery Position', 'hank' ),
		'choices'     => array(
			'top'    => esc_html__( 'Top', 'hank' ),
			'right'  => esc_html__( 'Right', 'hank' ),
			'bottom' => esc_html__( 'Bottom', 'hank' ),
			'left'   => esc_html__( 'Left', 'hank' )
		)
	);

	// Sidebar section
	$controls['project__sidebarHeading'] = array(
		'type'        => 'heading',
		'section'     => 'projectsSingle',
		'label'       => esc_html__( 'Sidebar', 'hank' ),
	);
	$controls['project__sidebar'] = array(
		'type'        => 'dropdown',
		'section'     => 'projectsSingle',
		'choices'     => 'hank_customize_dropdown_sidebars'
	);

	$controls['project__sidebarPosition'] = array(
		'type'    => 'radio-buttons',
		'section' => 'projectsSingle',
		'label'   => esc_html__( 'Sidebar Position', 'hank' ),
		'choices' => array(
			'none'  => esc_html__( 'No Sidebar', 'hank' ),
			'left'  => esc_html__( 'Left', 'hank' ),
			'right' => esc_html__( 'Right', 'hank' )
		)
	);

	return $controls;
}


function hank_customize_projects_settings( $settings ) {
	$settings['projects__displayMode']     = array( 'default' => 'grid' );
	$settings['projects__gridColumns']     = array( 'default' => 3 );
	$settings['projects__gridGutter']      = array( 'default' => 20 );
	$settings['projects__imagesize']       = array( 'default' => 'full' );
	$settings['projects__imagesizeCrop']   = array( 'default' => 'crop' );
	
	$settings['projects__filterable']        = array( 'default' => 'on' );
	$settings['projects__filterableAlign']   = array( 'default' => 'left' );
	$settings['projects__filterableType']    = array( 'default' => 'nproject-tag' );
	$settings['projects__excerpt']           = array( 'default' => 'on' );
	$settings['projects__autoExcerpt']       = array( 'default' => 'on' );
	$settings['projects__autoExcerptLength'] = array( 'default' => '12' );
	$settings['projects__readmore']          = array( 'default' => 'on' );
	$settings['projects__sidebar']           = array( 'default' => 'primary' );
	$settings['projects__sidebarPosition']   = array( 'default' => 'right' );

	$settings['project__pagination']      = array( 'default' => 'on' );
	$settings['project__author']          = array( 'default' => 'on' );
	$settings['project__related']         = array( 'default' => 'on' );
	$settings['project__galerryMode']     = array( 'default' => 'grid' );
	$settings['project__galleryColumns']  = array( 'default' => 3 );
	$settings['project__galleryPosition'] = array( 'default' => 'top' );
	$settings['project__sidebar']         = array( 'default' => 'primary' );
	$settings['project__sidebarPosition'] = array( 'default' => 'left' );
	$settings['project__tags']            = array( 'default' => 'on' );

	$settings['project__related__title']            = array( 'default' => 'Related Posts' );
	$settings['project__related__count']            = array( 'default' => '4' );
	$settings['projects__related__gridColumns']     = array( 'default' => 4 );
	$settings['project__related__type']             = array( 'default' => 'category' );

	return $settings;
}

function hank_customize_project_related( $controls ) {
	$controls['project__related__title'] = array(
		'type'    => 'textfield',
		'label'   => esc_html__( 'Widget Title', 'hank' ),
		'section' => 'projectsRelated',
		'default' => esc_html__( 'Related Projects', 'hank' )
	);

	$controls['project__related__count'] = array(
		'type'    => 'textfield',
		'label'   => esc_html__( 'Number of Related Projects', 'hank' ),
		'section' => 'projectsRelated',
		'default' => esc_html__( '4', 'hank' )
	);

	$controls['projects__related__gridColumns'] = array(
		'type'        => 'radio-buttons',
		'section'     => 'projectsRelated',
		'label'       => esc_html__( 'Grid Columns', 'hank' ),
		'choices'     => array( 2 => 2, 3 => 3, 4 => 4, 5 => 5 )
	);

	$controls['project__related__type'] = array(
		'type' => 'dropdown',
		'section' => 'projectsRelated',
		'label' => esc_html__( 'Show Related Projects Based On', 'hank' ),
		'default' => 'tag',
		'choices' => array(
			'tag'      => esc_html__( 'Tag', 'hank' ),
			'category' => esc_html__( 'Category', 'hank' ),
			'random'   => esc_html__( 'Random', 'hank' ),
			'recent'   => esc_html__( 'Recent', 'hank' )
		)
	);

	return $controls;
}
