<?php
$values     = [];
$taxonomies = [
    'nproject-category',
    'nproject-tag'
];

foreach ( $taxonomies as $taxonomy ) {
    $terms = get_terms( $taxonomy );
    $values[ $taxonomy ] = [];

    if ( is_array( $terms ) ) {
        foreach ( $terms as $term ) {
            $values[ $taxonomy ][] = [
                'label' => $term->name,
                'value' => $term->term_id
            ];
        }
    }
}

return array(
    'name'     => __( 'LineThemes: Project Carousel', 'hank' ),
    'base'     => 'project-carousel',
    'category' => 'LineThemes',
    'params'   => array(
        // General tab
        array(
            'type'        => 'textfield',
            'heading'     => __( 'Widget Title', 'hank' ),
            'description' => __( 'Enter text which will be used as widget title. Leave blank if no title is needed.', 'hank' ),
            'param_name'  => 'widget_title'
        ),

        array(
            'type'        => 'autocomplete',
            'heading'     => __( 'Categories', 'hank' ),
            'description' => __( 'If you want to narrow output, enter category names here. Note: Only listed categories will be included.', 'hank' ),
            'param_name'  => 'categories',
            'settings'    => array(
                'multiple'       => true,
                'sortable'       => true,
                'min_length'     => 1,
                'no_hide'        => true,
                'unique_values'  => true,
                'display_inline' => true,
                'values'         => $values['nproject-category']
            )
        ),

        array(
            'type'        => 'autocomplete',
            'heading'     => __( 'Tags', 'hank' ),
            'description' => __( 'If you want to narrow output, enter tag names here. Note: Only listed tags will be included.', 'hank' ),
            'param_name'  => 'tags',
            'settings'    => array(
                'multiple'       => true,
                'sortable'       => true,
                'min_length'     => 1,
                'no_hide'        => true,
                'unique_values'  => true,
                'display_inline' => true,
                'values'         => $values['nproject-tag']
            )
        ),

        array(
            'type'        => 'textfield',
            'heading'     => __( 'Limit', 'hank' ),
            'description' => __( 'The number of posts will be shown', 'hank' ),
            'param_name'  => 'limit',
            'value'       => 9
        ),

        array(
            'type'        => 'textfield',
            'heading'     => __( 'Offset', 'hank' ),
            'description' => __( 'The number of posts to pass over', 'hank' ),
            'param_name'  => 'offset',
            'value'       => 0
        ),

        array(
            'type'        => 'textfield',
            'heading'     => __( 'Thumbnail Size', 'hank' ),
            'description' => __( 'Enter image size. Example: "thumbnail", "medium", "large", "full" or other sizes defined by current theme. Alternatively enter image size in pixels: 200x100 (Width x Height). Leave empty to use "thumbnail" size.', 'hank' ),
            'param_name'  => 'thumbnail_size'
        ),

        array(
            'type'        => 'dropdown',
            'heading'     => __( 'Show Post Date?', 'hank' ),
            'description' => __( 'Select "Yes" to display post date in the carousel', 'hank' ),
            'param_name'  => 'show_date',
            'std'         => 'no',
            'value'       => array(
                __( 'Yes', 'hank' ) => 'yes',
                __( 'No', 'hank' ) => 'no'
            )
        ),

        array(
            'type'        => 'textfield',
            'heading'     => __( 'Date format', 'hank' ),
            'description' => __( 'Enter custom date format that will be shown', 'hank' ),
            'param_name'  => 'date_format',
            'dependency'  => array(
                'element' => 'show_date',
                'value'   => 'yes'
            ),
            'value'       => ''
        ),

        array(
            'type'        => 'dropdown',
            'heading'     => __( 'Show Post Excerpt?', 'hank' ),
            'description' => __( 'Select "Yes" to display post excerpt in the carousel', 'hank' ),
            'param_name'  => 'show_excerpt',
            'std'         => 'no',
            'value'       => array(
                __( 'Yes', 'hank' ) => 'yes',
                __( 'No', 'hank' ) => 'no'
            )
        ),

        array(
            'type'        => 'dropdown',
            'heading'     => __( 'Auto Post Excerpt?', 'hank' ),
            'description' => __( 'Select "Yes" to display automatic generate post excerpt', 'hank' ),
            'param_name'  => 'auto_excerpt',
            'dependency'  => array(
                'element' => 'show_excerpt',
                'value'   => 'yes'
            ),
            'std'         => 'no',
            'value'       => array(
                __( 'Yes', 'hank' ) => 'yes',
                __( 'No', 'hank' ) => 'no'
            )
        ),

        array(
            'type'        => 'textfield',
            'heading'     => __( 'Post excerpt length', 'hank' ),
            'description' => __( 'Enter the custom length of post excerpt that will be generated', 'hank' ),
            'param_name'  => 'excerpt_length',
            'dependency'  => array(
                'element' => 'auto_excerpt',
                'value'   => 'yes'
            ),
            'value'       => 200
        ),

        array(
            'type'       => 'dropdown',
            'heading'    => __( 'Read more', 'hank' ),
            'description' => __( 'Select "YES" to show the read more link', 'hank' ),
            'param_name' => 'readmore',
            'std'        => 'yes',
            'value'      => array(
                __( 'Yes', 'hank' ) => 'yes',
                __( 'No', 'hank' ) => 'no'
            )
        ),

        array(
            'type'        => 'textfield',
            'heading'     => __( 'Read more text', 'hank' ),
            'description' => __( 'Custom text for the read more link', 'hank' ),
            'param_name'  => 'readmore_text',
            'dependency'  => array(
                'element' => 'readmore',
                'value'   => 'yes'
            ),
            'value'       => __( 'Read More', 'hank' )
        ),

        array(
            'type'        => 'dropdown',
            'heading'     => __( 'Order By', 'hank' ),
            'description' => __( 'Select how to sort retrieved posts.', 'hank' ),
            'param_name'  => 'order',
            'std'         => 'date',
            'value'       => array(
                __( 'Date', 'hank' )          => 'date',
                __( 'ID', 'hank' )            => 'ID',
                __( 'Author', 'hank' )        => 'author',
                __( 'Title', 'hank' )         => 'title',
                __( 'Modified', 'hank' )      => 'modified',
                __( 'Random', 'hank' )        => 'rand',
                __( 'Comment count', 'hank' ) => 'comment_count',
                __( 'Menu order', 'hank' )    => 'menu_order'
            )
        ),

        array(
            'type'        => 'dropdown',
            'heading'     => __( 'Order Direction', 'hank' ),
            'description' => __( 'Designates the ascending or descending order.', 'hank' ),
            'param_name'  => 'direction',
            'std'         => 'DESC',
            'value'       => array(
                __( 'Ascending', 'hank' )          => 'ASC',
                __( 'Descending', 'hank' )            => 'DESC'
            )
        ),

        array(
            'type'        => 'textfield',
            'heading'     => __( 'Extra Class', 'hank' ),
            'description' => __( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'hank' ),
            'param_name'  => 'class'
        ),

        // Carousel Options
        array(
            'type'        => 'dropdown',
            'heading'     => __( 'Show Items', 'hank' ),
            'description' => __( 'The maximum amount of items displayed at a time', 'hank' ),
            'param_name'  => 'items',
            'group'       => __( 'Carousel Options', 'hank' ),
            'value'       => array_combine( range( 1, 6 ), range( 1, 6 ) ),
            'std'         => 4
        ),

        array(
            'type'       => 'dropdown',
            'heading'    => __( 'Autoplay?', 'hank' ),
            'param_name' => 'autoplay',
            'group'      => __( 'Carousel Options', 'hank' ),
            'std'        => 'yes',
            'value'      => array(
                __( 'Yes', 'hank' ) => 'yes',
                __( 'No', 'hank' ) => 'no'
            )
        ),

        array(
            'type'        => 'dropdown',
            'heading'     => __( 'Stop On Hover?', 'hank' ),
            'description' => __( 'Rewind speed in milliseconds', 'hank' ),
            'param_name'  => 'hover_stop',
            'group'       => __( 'Carousel Options', 'hank' ),
            'std'         => 'yes',
            'value'       => array(
                __( 'Yes', 'hank' ) => 'yes',
                __( 'No', 'hank' ) => 'no'
            )
        ),

        array(
            'type'        => 'checkbox',
            'heading'     => __( 'Slider Controls', 'hank' ),
            'param_name'  => 'controls',
            'group'       => __( 'Carousel Options', 'hank' ),
            'std'         => 'navigation,rewind-navigation,pagination,pagination-numbers',
            'value'       => array(
                __( 'Navigation', 'hank' )         => 'navigation',
                __( 'Rewind Navigation', 'hank' )  => 'rewind-navigation',
                __( 'Pagination', 'hank' )         => 'pagination',
                __( 'Pagination Numbers', 'hank' ) => 'pagination-numbers'
            )
        ),

        array(
            'type'       => 'dropdown',
            'heading'    => __( 'Scroll Per Page?', 'hank' ),
            'param_name' => 'scroll_page',
            'group'       => __( 'Carousel Options', 'hank' ),
            'std'        => 'yes',
            'value'      => array(
                __( 'Yes', 'hank' ) => 'yes',
                __( 'No', 'hank' ) => 'no'
            )
        ),

        array(
            'type'       => 'dropdown',
            'heading'    => __( 'Allow Mouse Drag?', 'hank' ),
            'param_name' => 'mouse_drag',
            'group'      => __( 'Carousel Options', 'hank' ),
            'std'        => 'yes',
            'value'      => array(
                __( 'Yes', 'hank' ) => 'yes',
                __( 'No', 'hank' ) => 'no'
            )
        ),

        array(
            'type'       => 'dropdown',
            'heading'    => __( 'Allow Touch Drag?', 'hank' ),
            'param_name' => 'touch_drag',
            'group'      => __( 'Carousel Options', 'hank' ),
            'std'        => 'yes',
            'value'      => array(
                __( 'Yes', 'hank' ) => 'yes',
                __( 'No', 'hank' ) => 'no'
            )
        ),

        array(
            'type'       => 'dropdown',
            'heading'    => __( 'Centered Slides?', 'hank' ),
            'param_name' => 'centered',
            'group'      => __( 'Carousel Options', 'hank' ),
            'std'        => 'no',
            'value'      => array(
                __( 'Yes', 'hank' ) => 'yes',
                __( 'No', 'hank' ) => 'no'
            )
        ),

        // Speed
        array(
            'type'        => 'textfield',
            'heading'     => __( 'Autoplay Speed', 'hank' ),
            'description' => __( 'Autoplay speed in milliseconds', 'hank' ),
            'param_name'  => 'autoplay_speed',
            'group'       => __( 'Speed', 'hank' ),
            'value'       => 5000
        ),

        array(
            'type'        => 'textfield',
            'heading'     => __( 'Slide Speed', 'hank' ),
            'description' => __( 'Slide speed in milliseconds', 'hank' ),
            'param_name'  => 'slide_speed',
            'group' => __( 'Speed', 'hank' ),
            'value'       => 200
        ),

        array(
            'type'        => 'textfield',
            'heading'     => __( 'Pagination Speed', 'hank' ),
            'description' => __( 'Pagination speed in milliseconds', 'hank' ),
            'param_name'  => 'pagination_speed',
            'group' => __( 'Speed', 'hank' ),
            'value'       => 200
        ),

        array(
            'type'        => 'textfield',
            'heading'     => __( 'Rewind Speed', 'hank' ),
            'description' => __( 'Rewind speed in milliseconds', 'hank' ),
            'param_name'  => 'rewind_speed',
            'group' => __( 'Speed', 'hank' ),
            'value'       => 200
        ),

        // Responsive
        array(
            'type'       => 'dropdown',
            'heading'    => __( 'Enable Responsive?', 'hank' ),
            'param_name' => 'responsive',
            'group'      => __( 'Responsive', 'hank' ),
            'std'        => 'yes',
            'value'      => array(
                __( 'Yes', 'hank' ) => 'yes',
                __( 'No', 'hank' ) => 'no'
            )
        ),

        array(
            'type'        => 'dropdown',
            'heading'     => __( 'Items On Tablet', 'hank' ),
            'description' => __( 'The maximum amount of items displayed at a time on tablet device', 'hank' ),
            'param_name'  => 'tablet_items',
            'group'       => __( 'Responsive', 'hank' ),
            'value'       => array_combine( range( 1, 6 ), range( 1, 6 ) ),
            'std'         => 2
        ),

        array(
            'type'        => 'dropdown',
            'heading'     => __( 'Items On Mobile', 'hank' ),
            'description' => __( 'The maximum amount of items displayed at a time on mobile device', 'hank' ),
            'param_name'  => 'mobile_items',
            'group'       => __( 'Responsive', 'hank' ),
            'value'       => array_combine( range( 1, 6 ), range( 1, 6 ) ),
            'std'         => 1
        ),

        array(
            'type' => 'css_editor',
            'param_name' => 'css',
            'group' => __( 'Design Options', 'hank' )
        )
    )
);
