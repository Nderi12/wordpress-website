<?php
return array(
    'name'     => esc_html__('LineThemes: Video Lightbox', 'hank'),
    'base'     => 'video-lightbox',
    'category' => 'LineThemes',
    'params'   => array(
        array(
            'type'       => 'textfield',
            'heading'    => esc_html__( 'Video URL', 'hank' ),
            'description' => esc_html__( 'We are accepted both Youtube and Video URL', 'hank' ),
            'param_name' => 'url',
            'std'        => ''
        ),
        array(
            'type'       => 'textfield',
            'heading'    => esc_html__( 'Title', 'hank' ),
            'param_name' => 'title',
            'std'        => ''
        ),

        array(
            'type'        => 'attach_image',
            'param_name'  => 'cover',
            'heading'     => esc_html__( 'Cover Image', 'hank' ),
            'description' => esc_html__( 'Select the image you want to show as the video cover.', 'hank' )
        ),

        array(
            'type'       => 'textfield',
            'heading'    => esc_html__( 'Width', 'hank' ),
            'param_name' => 'width',
            'std'        => 640
        ),

        array(
            'type'       => 'textfield',
            'heading'    => esc_html__( 'Height', 'hank' ),
            'param_name' => 'height',
            'std'        => 480
        ),
    )
);
