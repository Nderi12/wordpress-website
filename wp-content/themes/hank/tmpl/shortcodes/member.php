<?php
$atts = shortcode_atts( array(
	'class'        => '',
	'css'          => '',
	
	'name'         => 'John Doe',
	'subtitle'     => '',
	'image'        => '',

	'facebook'     => '',
	'twitter'      => '',
	'linkedin'     => '',
	'google'       => '',
	'member_style' => ''
), $atts );

$member_image = '';
$member_info  = sprintf( '<h3 class="member-name">%s</h3>', esc_html( $atts['name'] ) );
$class        = array( 'member', $atts['class'] );
$class[]      = $atts['member_style'];
if ( function_exists( 'vc_shortcode_custom_css_class' ) ) {
	$class[] = vc_shortcode_custom_css_class( $atts['css'], ' ' );
}

if ( ! empty( $atts['image'] ) ) {
	if ( is_numeric( $atts['image'] ) && $images = wp_get_attachment_image_src( $atts['image'], 'full' ) )
		$atts['image'] = array_shift( $images );

	$class[] = 'has-image';
	$member_image = sprintf( '
		<div class="member-image">
			<img src="%s" alt="%s" />
		</div>
	', esc_attr( $atts['image'] ), esc_attr( $atts['name'] ) );
}

if ( ! empty( $atts['subtitle'] ) )
	$member_info.= sprintf( '<div class="member-subtitle">%s</div>', hank_cleanup( $atts['subtitle'] ) );

$social_links = '';
$content = force_balance_tags( wpautop( $content ) );
$content = preg_replace( '/<([a-z]+)>\s*<\/\\1>/i', '', $content );

if ( ! empty( $atts['facebook'] ) )
	$social_links.= sprintf( ' <a href="%s" data-title="Facebook" class="facebook"><i class="fa fa-facebook"></i></a>', esc_url( $atts['facebook'] ) );

if ( ! empty( $atts['twitter'] ) )
	$social_links.= sprintf( ' <a href="%s" data-title="Twitter" class="twitter"><i class="fa fa-twitter"></i></a>', esc_url( $atts['twitter'] ) );

if ( ! empty( $atts['linkedin'] ) )
	$social_links.= sprintf( ' <a href="%s" data-title="LinkedIn" class="linkedin"><i class="fa fa-linkedin"></i></a>', esc_url( $atts['linkedin'] ) );

if ( ! empty( $atts['google'] ) )
	$social_links.= sprintf( ' <a href="%s" data-title="Google Plus" class="google-plus"><i class="fa fa-google-plus"></i></a>', esc_url( $atts['google'] ) );

if ( ! empty( $social_links ) )
	$social_links = sprintf( '<div class="social-links">%s</div>', $social_links );

printf( '
	<div class="%s">
		%s
		<div class="member-info">
			<div class="member-meta">
			%s
			%s
			</div>
			<div class="member-desc">%s</div>
		</div>
	</div>', 
	esc_attr( implode( ' ', $class ) ),
	$member_image,
	$member_info,
	$social_links,
	$content
);
