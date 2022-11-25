<?php
defined( 'ABSPATH' ) or die();

function hank_blog_body_class( $classes ) {
	$classes[] = sprintf( 'blog-%s', hank_option( 'blog__archive__style' ) );

	return $classes;
}

function hank_blog_sidebar() {
	return hank_option( 'blog__archive__sidebar' );
}

function hank_blog_sidebar_position() {
	return hank_option( 'blog__archive__sidebarPosition' );
}

function hank_single_sidebar() {
	return hank_option( 'blog__single__sidebar' );
}

function hank_single_sidebar_position() {
	return hank_option( 'blog__single__sidebarPosition' );
}

