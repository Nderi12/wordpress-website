<?php
/**
 * WARNING: This file is part of the theme. DO NOT edit
 * this file under any circumstances.
 */

/**
 * Prevent direct access to this file
 */
defined( 'ABSPATH' ) or die();

/**
 * Template Name: Blog Large
 */
add_filter( 'hank_sidebar_id', 'hank_blog_sidebar' );
add_filter( 'hank_sidebar_position', 'hank_blog_sidebar_position' );
add_filter( 'body_class', function( $classes ) {
    return array_merge( $classes, array( 'blog-large' ) );
} );
?>
	
	<?php get_header() ?>
		<?php
			query_posts( array(
				'post_type'      => 'post',
				'paged'          => max( 1, get_query_var( 'paged' ) )
			) );
		?>

		<?php get_template_part( 'tmpl/post/loop-large', hank_option( 'blog__archive__style' ) ) ?>

		<?php wp_reset_postdata(); ?>
		<?php wp_reset_query(); ?>

	<?php get_footer(); ?>
