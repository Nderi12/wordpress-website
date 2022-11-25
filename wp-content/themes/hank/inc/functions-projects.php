<?php
defined( 'ABSPATH' ) or die();


add_filter( 'nprojects/shortcode_template', 'hank_project_shortcode_template' );
add_filter( 'nprojects/shortcode_parameters', 'hank_project_shortcode_params' );
add_filter( 'line-shortcode-unsupported', 'hank_project_disable_justify_shortcode' );
add_filter( 'the_excerpt', 'hank_project_auto_excerpt', 99 );

add_action( 'after_setup_theme', function () {
	if ( class_exists( 'nProjects_Admin' ) ) {
		$admin = nProjects_Admin::instance();
		$meta_box_hook = 'add_meta' . '_boxes';
		
		remove_action( 'admin_enqueue_scripts', array( $admin, 'enqueue_styles' ) );
		remove_action( 'admin_enqueue_scripts', array( $admin, 'enqueue_scripts' ) );
		remove_action( 'save_post', array( $admin, 'update_media_items' ) );
		remove_action( $meta_box_hook, array( $admin, 'add_metabox' ) );
	}
} );

function hank_project_auto_excerpt( $excerpt ) {
	if ( hank_current_post_type() == 'nproject' && mb_strlen( $excerpt ) > hank_option( 'projects__autoExcerptLength' ) ) {
		$excerpt = mb_substr( $excerpt, 0, hank_option( 'projects__autoExcerptLength' ) );
	}

	return $excerpt;
}

function hank_project_disable_justify_shortcode( $unsupported ) {
	$unsupported[] = 'projects_justify';
	return $unsupported;
}


function hank_projects_body_class( $classes ) {
	$classes[] = sprintf( 'projects projects-%s', hank_option( 'projects__displayMode' ) );

	return $classes;
}

function hank_projects_sidebar() {
	return hank_option( 'projects__sidebar' );
}

function hank_projects_sidebar_position() {
	return hank_option( 'projects__sidebarPosition' );
}


function hank_single_project_body_classes( $classes ) {
	$gallery_position = get_field( 'projectGalleryPosition' );
	
	if ( $gallery_position === 'default' ) {
		$gallery_position = hank_option( 'project__galleryPosition' );
	}

	$classes[] = sprintf( 'project-gallery-%s', $gallery_position );
	
	return $classes;
}

function hank_single_project_sidebar() {
	return hank_option( 'project__sidebar' );
}

function hank_single_project_sidebar_position() {
	return hank_option( 'project__sidebarPosition' );
}


function hank_project_media_item( $item, $size = 'full', $crop = false, $lightbox = true ) {
	$attachment_image = hank_get_image_resized( [
		'image_id' => is_array( $item ) ? $item['id'] : $item,
		'size'     => $size,
		'crop'     => $crop
	] );

	$attachment_image_src = $attachment_image['thumbnail_raw'][0];
	$attachment_image_large = $attachment_image['large'];

	if ( $lightbox ) {
		printf( '<a href="%s" rel="prettyPhoto[gallery]"><img src="%s" /></a>',
			$attachment_image_src,
			$attachment_image_large[0]
		);
	}
	else {
		echo hank_cleanup( $attachment_image['thumbnail'] );
	}
}



function hank_project_shortcode_params( $params ) {
	// General tab
	$params[] = array(
		'type'        => 'textfield',
		'heading'     => esc_html__( 'Widget Title', 'hank' ),
		'description' => esc_html__( 'Enter text which will be used as widget title. Leave blank if no title is needed.', 'hank' ),
		'param_name'  => 'widget_title'
	);

	$params[] = array(
		'type'        => 'textfield',
		'heading'     => esc_html__( 'Categories', 'hank' ),
		'description' => esc_html__( 'If you want to narrow output, enter category names here. Note: Only listed categories will be included.', 'hank' ),
		'param_name'  => 'categories'
	);

	$params[] = array(
		'type'        => 'textfield',
		'heading'     => esc_html__( 'Tags', 'hank' ),
		'description' => esc_html__( 'If you want to narrow output, enter tag names here. Note: Only listed tags will be included.', 'hank' ),
		'param_name'  => 'tags'
	);

	$params[] = array(
		'type'       => 'dropdown',
		'heading'    => esc_html__( 'Display Mode', 'hank' ),
		'param_name' => 'mode',
		'std'        => 3,
		'value'      => array(
			esc_html__( 'Grid Classic', 'hank' )   => 'grid',
			esc_html__( 'Grid Masonry', 'hank' )   => 'masonry',
			esc_html__( 'Grid Alt', 'hank' ) => 'grid-alt'
		)
	);

	$params[] = array(
		'type'        => 'dropdown',
		'heading'     => esc_html__( 'Columns', 'hank' ),
		'description' => esc_html__( 'The number of columns will be shown', 'hank' ),
		'param_name'  => 'columns',
		'std'         => 3,
		'value'       => array(
			esc_html__( '1 Column', 'hank' )  => 1,
			esc_html__( '2 Columns', 'hank' ) => 2,
			esc_html__( '3 Columns', 'hank' ) => 3,
			esc_html__( '4 Columns', 'hank' ) => 4,
			esc_html__( '5 Columns', 'hank' ) => 5,
		)
	);

	$params[] = array(
		'type'       => 'dropdown',
		'heading'    => esc_html__( 'Show Items Filter', 'hank' ),
		'param_name' => 'filter',
		'std'        => 'yes',
		'value'      => array(
			esc_html__( 'Yes', 'hank' ) => 'yes',
			esc_html__( 'No', 'hank' )  => 'no'
		)
	);

	$params[] = array(
		'type'       => 'dropdown',
		'heading'    => esc_html__( 'Filter By', 'hank' ),
		'param_name' => 'filter_by',
		'std'        => 'category',
		'value'      => array(
			esc_html__( 'Categories', 'hank' ) => 'category',
			esc_html__( 'Tags', 'hank' )       => 'tag'
		)
	);

	$params[] = array(
		'type'        => 'textfield',
		'heading'     => esc_html__( 'Limit', 'hank' ),
		'description' => esc_html__( 'The number of posts will be shown', 'hank' ),
		'param_name'  => 'limit',
		'value'       => 9
	);

	$params[] = array(
		'type'        => 'textfield',
		'heading'     => esc_html__( 'Offset', 'hank' ),
		'description' => esc_html__( 'The number of posts to pass over', 'hank' ),
		'param_name'  => 'offset',
		'value'       => 0
	);

	$params[] = array(
		'type'        => 'textfield',
		'heading'     => esc_html__( 'Thumbnail Size', 'hank' ),
		'description' => esc_html__( 'Enter image size. Example: "thumbnail", "medium", "large", "full" or other sizes defined by current theme. Alternatively enter image size in pixels: 200x100 (Width x Height). Leave empty to use "thumbnail" size.', 'hank' ),
		'param_name'  => 'thumbnail_size'
	);

	$params[] = array(
		'type'       => 'dropdown',
		'heading'    => esc_html__( 'Show Read More', 'hank' ),
		'param_name' => 'readmore',
		'std'        => 'yes',
		'value'      => array(
			esc_html__( 'Yes', 'hank' ) => 'yes',
			esc_html__( 'No', 'hank' )  => 'no'
		)
	);
	$params[] = array(
		'type'        => 'textfield',
		'heading'     => esc_html__( 'Readmore Text', 'hank' ),
		'param_name'  => 'readmore_text'
	);

	$params[] = array(
		'type'        => 'dropdown',
		'heading'     => esc_html__( 'Order By', 'hank' ),
		'description' => esc_html__( 'Select how to sort retrieved posts.', 'hank' ),
		'param_name'  => 'order',
		'std'         => 'date',
		'value'       => array(
			esc_html__( 'Date', 'hank' )          => 'date',
			esc_html__( 'ID', 'hank' )            => 'ID',
			esc_html__( 'Author', 'hank' )        => 'author',
			esc_html__( 'Title', 'hank' )         => 'title',
			esc_html__( 'Modified', 'hank' )      => 'modified',
			esc_html__( 'Random', 'hank' )        => 'rand',
			esc_html__( 'Comment count', 'hank' ) => 'comment_count',
			esc_html__( 'Menu order', 'hank' )    => 'menu_order'
		)
	);

	$params[] = array(
		'type'        => 'dropdown',
		'heading'     => esc_html__( 'Order Direction', 'hank' ),
		'description' => esc_html__( 'Designates the ascending or descending order.', 'hank' ),
		'param_name'  => 'direction',
		'std'         => 'DESC',
		'value'       => array(
			esc_html__( 'Ascending', 'hank' )          => 'ASC',
			esc_html__( 'Descending', 'hank' )            => 'DESC'
		)
	);

	$params[] = array(
		'type'       => 'dropdown',
		'heading'    => esc_html__( 'Enable equals height?', 'hank' ),
		'param_name' => 'equals',
		'std'        => 'no',
		'value'      => array(
			esc_html__( 'Yes', 'hank' ) => 'yes',
			esc_html__( 'No', 'hank' )  => 'no'
		)
	);

	$params[] = array(
		'type'        => 'textfield',
		'heading'     => esc_html__( 'Extra Class', 'hank' ),
		'description' => esc_html__( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'hank' ),
		'param_name'  => 'class'
	);

	$params[] = array(
		'type' => 'css_editor',
		'param_name' => 'css',
		'group' => esc_html__( 'Design Options', 'hank' )
	);

	return $params;
}



function hank_project_shortcode_template() {
	return 'tmpl/shortcodes/projects.php';
}
