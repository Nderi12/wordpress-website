<?php
defined( 'ABSPATH' ) or die();

add_filter( 'hank_customize_containers', 'hank_customize_blog_containers' );
add_filter( 'hank_customize_settings', 'hank_customize_blog_settings' );

add_filter( 'hank_customize_controls', 'hank_customize_blog_archive' );
add_filter( 'hank_customize_controls', 'hank_customize_blog_single' );
add_filter( 'hank_customize_controls', 'hank_customize_blog_related' );


function hank_customize_blog_containers( $containers ) {
	$containers['blog'] = array(
		'type'            => 'panel',
		'title'           => esc_html__( 'Blog & Post', 'hank' )
	);
	$containers['blogArchive'] = array(
		'type'        => 'section',
		'panel'       => 'blog',
		'title'       => esc_html__( 'Blog Settings', 'hank' ),
		'description' => esc_html__( 'Select the style of blog posts that will appearing on the archive page', 'hank' )
	);
	$containers['blogSingle'] = array(
		'type'        => 'section',
		'panel'       => 'blog',
		'title'       => esc_html__( 'Post Settings', 'hank' )
	);
	$containers['blogAuthor'] = array(
		'type'        => 'section',
		'panel'       => 'blog',
		'title'       => esc_html__( 'Author Box', 'hank' ),
	);
	$containers['blogRelated'] = array(
		'type'        => 'section',
		'panel'       => 'blog',
		'title'       => esc_html__( 'Related Posts', 'hank' ),
	);

	return $containers;
}


function hank_customize_blog_settings( $settings ) {
	$settings['blog__archive__style']           = array( 'default' => 'large' );
	$settings['blog__archive__columns']         = array( 'default' => 3 );
	$settings['blog__archive__gridGutter']      = array( 'default' => 60 );
	$settings['blog__archive__imagesize']       = array( 'default' => 'full' );
	$settings['blog__archive__imagesizeCrop']   = array( 'default' => 'crop' );
	$settings['blog__archive__autoExcerpt']     = array( 'default' => 'off' );
	$settings['blog__archive__excerptLength']   = array( 'default' => '40' );
	$settings['blog__archive__postMeta']        = array( 'default' => 'on' );
	$settings['blog__archive__readmore']        = array( 'default' => 'on' );
	$settings['blog__archive__sidebar']         = array( 'default' => 'primary' );
	$settings['blog__archive__sidebarPosition'] = array( 'default' => 'left' );
	
	$settings['blog__single__postMeta']        = array( 'default' => 'on' );
	$settings['blog__single__postTags']        = array( 'default' => 'on' );
	$settings['blog__single__postNav']         = array( 'default' => 'on' );
	$settings['blog__single__postAuthor']      = array( 'default' => 'on' );
	$settings['blog__single__relatedPosts']    = array( 'default' => 'on' );
	$settings['blog__single__sidebar']         = array( 'default' => 'primary' );
	$settings['blog__single__sidebarPosition'] = array( 'default' => 'left' );
	
	$settings['blog__related__title']     = array( 'default' => 'Related Posts' );
	$settings['blog__related__type']      = array( 'default' => 'category' );
	$settings['blog__related__count']     = array( 'default' => '3' );

	return $settings;
}


function hank_customize_blog_archive( $controls ) {
	$controls['blog__archive__style'] = array(
		'type' => 'radio-buttons',
		'section' => 'blogArchive',
		'default' => 'grid',
		'choices' => array(
			'grid'   => esc_html__( 'Grid', 'hank' ),
			'masonry'   => esc_html__( 'Masonry', 'hank' ),
			'medium' => esc_html__( 'Medium', 'hank' ),
			'large'  => esc_html__( 'Large', 'hank' )
		)
	);
	$controls['blog__archive__columns'] = array(
		'type' => 'radio-buttons',
		'label'   => esc_html__( 'Grid Columns', 'hank' ),
		'section' => 'blogArchive',
		'choices' => array(
			2 => 2,
			3 => 3,
			4 => 4,
			5 => 5
		)
	);
	$controls['blog__archive__gridGutter'] = array(
		'type'        => 'textfield',
		'section'     => 'blogArchive',
		'label'       => esc_html__( 'Grid Column Spacing (px)', 'hank' ),
	);
	$controls['blog__archive__imagesize'] = array(
		'type'        => 'textfield',
		'section'     => 'blogArchive',
		'label' => esc_html__( 'Image Size', 'hank' ),
		'description' => esc_html__( 'Enter image size. Example: "thumbnail", "medium", "large", "full" or other sizes defined by current theme. Alternatively enter image size in pixels: 200x100 (Width x Height). Leave empty to use "thumbnail" size.', 'hank' )
	);
	$controls['blog__archive__imagesizeCrop'] = array(
		'type'        => 'radio-buttons',
		'section'     => 'blogArchive',
		'choices'     => array(
			'crop' => esc_html__('Hard Crop', 'hank'),
			'none' => esc_html__('None', 'hank')
		)
	);
	$controls['blog__archive__postMeta'] = array(
		'type'    => 'radio-onoff',
		'label'   => esc_html__( 'Show Post Meta', 'hank' ),
		'section' => 'blogArchive',
		'default' => 'on'
	);
	$controls['blog__archive__readmore'] = array(
		'type'    => 'radio-onoff',
		'label'   => esc_html__( 'Show Read More', 'hank' ),
		'section' => 'blogArchive',
		'default' => 'on'
	);
	$controls['blog__archive__autoExcerpt'] = array(
		'type'    => 'radio-onoff',
		'label'   => esc_html__( 'Auto Post Excerpt', 'hank' ),
		'section' => 'blogArchive',
		'default' => 'off'
	);

	$controls['blog__archive__excerptLength'] = array(
		'type'    => 'textfield',
		'label'   => esc_html__( 'Post Excerpt Length', 'hank' ),
		'section' => 'blogArchive',
		'default' => 40
	);

	/**
	 * Sidebar settings
	 */
	$controls['blog__archive__sidebar'] = array(
		'type'    => 'dropdown',
		'section' => 'blogArchive',
		'label'   => esc_html__( 'Sidebar', 'hank' ),
		'choices' => 'hank_customize_dropdown_sidebars'
	);
	$controls['blog__archive__sidebarPosition'] = array(
		'type'    => 'radio-buttons',
		'section' => 'blogArchive',
		'label'   => esc_html__( 'Sidebar Position', 'hank' ),
		'choices' => array(
			'none' => esc_html__( 'No Sidebar', 'hank' ),
			'left'       => esc_html__( 'Left', 'hank' ),
			'right'      => esc_html__( 'Right', 'hank' )
		)
	);
	
	
	return $controls;
}


function hank_customize_blog_single( $controls ) {
	$controls['blog__single__postMeta'] = array(
		'type'    => 'radio-onoff',
		'label'   => esc_html__( 'Show Post Meta', 'hank' ),
		'section' => 'blogSingle',
		'default' => 'on'
	);
	$controls['blog__single__postTags'] = array(
		'type'    => 'radio-onoff',
		'label'   => esc_html__( 'Show Post Tags', 'hank' ),
		'section' => 'blogSingle',
		'default' => 'on'
	);
	$controls['blog__single__postNav'] = array(
		'type'    => 'radio-onoff',
		'label'   => esc_html__( 'Show Post Navigator', 'hank' ),
		'section' => 'blogSingle',
		'default' => 'on'
	);
	$controls['blog__single__postAuthor'] = array(
		'type'    => 'radio-onoff',
		'label'   => esc_html__( 'Show Post Author', 'hank' ),
		'section' => 'blogSingle',
		'default' => 'on'
	);
	$controls['blog__single__relatedPosts'] = array(
		'type'    => 'radio-onoff',
		'label'   => esc_html__( 'Show Related Posts', 'hank' ),
		'section' => 'blogSingle',
		'default' => 'on'
	);

	/**
	 * Sidebar settings
	 */
	$controls['blog__single__sidebar'] = array(
		'type'    => 'dropdown',
		'section' => 'blogSingle',
		'label'   => esc_html__( 'Sidebar', 'hank' ),
		'choices' => 'hank_customize_dropdown_sidebars'
	);
	$controls['blog__single__sidebarPosition'] = array(
		'type'    => 'radio-buttons',
		'section' => 'blogSingle',
		'label'   => esc_html__( 'Sidebar Position', 'hank' ),
		'choices' => array(
			'none'    => esc_html__( 'No Sidebar', 'hank' ),
			'left'  => esc_html__( 'Left', 'hank' ),
			'right' => esc_html__( 'Right', 'hank' )
		)
	);
	
	
	return $controls;
}


function hank_customize_blog_related( $controls ) {
	$controls['blog__related__title'] = array(
		'type'    => 'textfield',
		'label'   => esc_html__( 'Widget Title', 'hank' ),
		'section' => 'blogRelated',
		'default' => esc_html__( 'Related Posts', 'hank' )
	);

	$controls['blog__related__count'] = array(
		'type'    => 'textfield',
		'label'   => esc_html__( 'Number of Related Posts', 'hank' ),
		'section' => 'blogRelated',
		'default' => esc_html__( '4', 'hank' )
	);

	$controls['blog__related__gridColumns'] = array(
		'type'        => 'radio-buttons',
		'section'     => 'blogRelated',
		'label'       => esc_html__( 'Grid Columns', 'hank' ),
		'choices'     => array( 2 => 2, 3 => 3, 4 => 4, 5 => 5 )
	);

	$controls['blog__related__type'] = array(
		'type' => 'dropdown',
		'section' => 'blogRelated',
		'label' => esc_html__( 'Show Related Posts Based On', 'hank' ),
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
