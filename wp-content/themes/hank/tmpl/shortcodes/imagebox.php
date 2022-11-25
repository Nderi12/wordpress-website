<?php
$atts = shortcode_atts( array(
	'class'          => '',
	'css'            => '',
	'image'          => '',
	'image_size'     => 'full',
	'title'          => '',
	'subtitle'       => '',
	'link'           => '',
	'target'         => '',
	'show_button'    => 'no',
	'button_text'    => esc_html__( 'Continue', 'hank' ),
	'imagebox_style' => ''
), $atts );

// Preparing the shortcode attributes
$atts['show_button'] = $atts['show_button'] == 'yes';
$atts['button_text'] = empty( $atts['button_text'] ) ? esc_html__( 'Continue', 'hank' ) : $atts['button_text'];

// Build the element classes
$classes = array( 'imagebox' );
$classes[] = $atts['class'];
$classes[] = $atts['imagebox_style'];

if ( function_exists( 'vc_shortcode_custom_css_class' ) ) {
	$classes[] = vc_shortcode_custom_css_class( $atts['css'], ' ' );
}

// Preparing image for the box
if ( is_numeric( $atts['image'] ) && function_exists( 'wpb_getImageBySize' ) ) {
	$image = wpb_getImageBySize( array( 'attach_id' => $atts['image'], 'thumb_size' => $atts['image_size'] ) );
	$image = $image['thumbnail'];
}
elseif ( filter_var( $atts['image'], FILTER_VALIDATE_URL ) ) {
	$image = sprintf( '<img src="%s" />', esc_url( $atts['image'] ) );
}

$content = wpautop( $content );
$content = preg_replace( '/<([a-z]+)>\s*<\/\\1>/i', '', $content );
$content = hank_cleanup( $content );
?>

<!-- BEGIN .imagebox -->
<div class="<?php echo esc_attr( join( ' ', $classes ) ) ?>">
	<?php if ( ! empty( $image ) ): ?>
		<a class="box-image" href="<?php echo esc_url( $atts['link'] ) ?>" target="<?php echo empty($atts['target']) ? '_self' : esc_attr( $atts['target'] ) ?>">
			<?php print( hank_cleanup( $image ) ) ?>
			<?php if ( ! empty( $atts['title'] ) ): ?>
				<h3 class="box-title">		
					<span><?php echo hank_cleanup( $atts['title'] ) ?></span>
					<?php if ( ! empty( $atts['subtitle'] ) ): ?>
						<span class="box-subtitle">
							<?php echo hank_cleanup( $atts['subtitle'] ) ?>
						</span>
					<?php endif ?>
				</h3>
			<?php endif ?>	
		</a>

		<?php if ( ! empty( $content ) ): ?>
			<div class="box-content">
				<?php echo hank_cleanup( $content ) ?>
			</div>
		<?php endif ?>

		<?php if ( $atts['show_button'] ): ?>
			<a class="box-button" href="<?php echo esc_url( $atts['link'] ) ?>" target="<?php echo empty($atts['target']) ? '_self' : esc_attr( $atts['target'] ) ?>">
				<span><?php echo esc_html( $atts['button_text'] ) ?></span>
			</a>
		<?php endif ?>
		
	<?php endif ?>
</div>
<!-- End .imagebox -->
