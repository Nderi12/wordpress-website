<?php
defined( 'ABSPATH' ) or die();

$post_permalink = get_permalink();
$post_target    = '_self';

if ( get_post_format() == 'link' ) {
	$post_permalink = get_post_meta( get_the_ID(), '_post_link', true );
	$post_target    = get_post_meta( get_the_ID(), '_post_link_target', true );
}
?>

	<span class="more"><?php echo esc_html__( 'Read More', 'hank' ) ?></span>
	
