<?php
defined( 'ABSPATH' ) or die();


// A filter for adding custom classes
// into the body element
add_filter( 'hank_body_class', 'hank_body_classes', 5 );


// A filter to generate the post excerpt
// automatically
add_filter( 'hank_the_content', 'hank_auto_excerpt', 5 );


add_filter( 'line-shortcodes/posts-params', 'hank_custom_posts_shortcode_params' );


/**
 * Return the classes name for the body tag
 * in array format
 * 
 * @param   array  $classes  An existing classes
 * @return  array
 * @since   1.0.0
 */
function hank_body_classes( $classes ) {
	$classes[] = sprintf( 'layout-%s', hank_option( 'global__layout__mode' ) );

	if ( hank_has_sidebar() && is_active_sidebar( hank_sidebar_id() ) ) {
		$classes[] = sprintf( 'sidebar-%s', hank_sidebar_position() );
	}

	return $classes;
}


function hank_auto_excerpt( $content ) {
	if ( hank_option( 'blog__archive__autoExcerpt' ) === 'on' ) {
		$length = (int) hank_option( 'blog__archive__excerptLength' );
		$post   = get_post();

		if ( ! preg_match( '/<!--more(.*?)?-->/', $post->post_content ) ) {
			$content = strip_tags( strip_shortcodes( $content ) );
			$content = trim( $content );

			if ( strlen( $content ) > $length ) {
				$content = mb_substr( $content, 0, $length );
				$content.= '...';
			}

			return sprintf( '<p>%s</p>', $content );
		}
	}

	return $content;
}


function hank_custom_posts_shortcode_params( $args ) {
	$args['params'] = array(
		array(
			'type'        => 'textfield',
			'heading'     => esc_html__( 'Widget Title', 'hank' ),
			'param_name'  => 'title',
			'description' => esc_html__( 'Enter text which will be used as widget title. Leave blank if no title is needed.', 'hank' )
		),
		array(
			'type'        => 'textfield',
			'heading'     => esc_html__( 'Category', 'hank' ),
			'param_name'  => 'category',
			'description' => esc_html__( 'Enter the category\'s slug that will be used to filter posts', 'hank' )
		),
		array(
			'type'        => 'textfield',
			'heading'     => esc_html__( 'Tag', 'hank' ),
			'param_name'  => 'tag',
			'description' => esc_html__( 'Enter the tag\'s slug that will be used to filter posts', 'hank' )
		),
		array(
			'type'       => 'dropdown',
			'heading'    => esc_html__( 'Layout', 'hank' ),
			'param_name' => 'layout',
			'value'      => array(
				esc_html__( 'Grid', 'hank' ) => 'grid',
				esc_html__( 'List', 'hank' ) => 'list'
			)
		),
		array(
			'type'        => 'dropdown',
			'heading'     => esc_html__( 'Grid Columns', 'hank' ),
			'param_name'  => 'grid_columns',
			'description' => esc_html__( 'The number of columns for grid and grid masonry layout', 'hank' ),
			'value'       => array(
				esc_html__( '2 Columns', 'hank' ) => 2,
				esc_html__( '3 Columns', 'hank' ) => 3,
				esc_html__( '4 Columns', 'hank' ) => 4,
				esc_html__( '5 Columns', 'hank' ) => 5
			)
		),
		array(
			'type'        => 'textfield',
			'heading'     => esc_html__( 'Thumbnail Size', 'hank' ),
			'description' => esc_html__( 'Enter image size. Example: "thumbnail", "medium", "large", "full" or other sizes defined by current theme. Alternatively enter image size in pixels: 200x100 (Width x Height). Leave empty to use "thumbnail" size.', 'hank' ),
			'param_name'  => 'thumbnail_size'
		),
		array(
			'type'        => 'textfield',
			'heading'     => esc_html__( 'Limit', 'hank' ),
			'param_name'  => 'limit',
			'description' => esc_html__( 'The number of posts will be shown', 'hank' ),
			'value'       => 9
		),
		array(
			'type'        => 'textfield',
			'heading'     => esc_html__( 'Offset', 'hank' ),
			'param_name'  => 'offset',
			'description' => esc_html__( 'The number of posts to pass over', 'hank' ),
			'value'       => 0
		),
		array(
			'type'       => 'dropdown',
			'heading'    => esc_html__( 'Icon For Posts', 'hank' ),
			'param_name' => 'icon',
			'value'      => array(
				esc_html__( 'Post Thumbnail', 'hank' ) => 'post-thumbnail',
				esc_html__( 'Post Date', 'hank' ) => 'post-date'
			)
		),
		array(
			'type'       => 'checkbox',
			'heading'    => esc_html__( 'Hide Post Content', 'hank' ),
			'param_name' => 'hide_content',
			'value'      => array(
				esc_html__( 'Yes, please', 'hank' ) => 'yes'
			)
		),
		array(
			'type'       => 'textfield',
			'heading'    => esc_html__( 'Post Content Length', 'hank' ),
			'param_name' => 'content_length',
			'value'      => 40
		),
		array(
			'type'       => 'checkbox',
			'heading'    => esc_html__( 'Hide Read More', 'hank' ),
			'param_name' => 'hide_readmore',
			'value'      => array(
				esc_html__( 'Yes, please', 'hank' ) => 'yes'
			)
		),
		array(
			'type'       => 'textfield',
			'heading'    => esc_html__( 'Read More Text', 'hank' ),
			'param_name' => 'readmore_text',
			'value'      => esc_html__( 'Continue &rarr;', 'hank' )
		),

		array(
			'type'        => 'textfield',
			'heading'     => esc_html__( 'Extra class name', 'hank' ),
			'param_name'  => 'class',
			'description' => esc_html__( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'hank' )
		),

		array(
			'type'       => 'css_editor',
			'param_name' => 'css',
			'group'      => esc_html__( 'Design Options', 'hank' )
		)
	);

	return $args;
}