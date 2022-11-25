<?php
$atts = shortcode_atts( array(
	'items'                    => 4,
	'autoplay'                 => 'yes',
	'hover_stop'               => 'yes',
	'controls'                 => 'navigation,rewind-navigation,pagination,pagination_numbers',
	'mouse_drag'               => 'yes',
	'touch_drag'               => 'yes',
	'responsive'               => 'yes',
	'scroll_page'              => 'yes',
	'autoplay_speed'           => 5000,
	'slide_speed'              => 200,
	'pagination_speed'         => 200,
	'rewind_speed'             => 200,
	'tablet_items'             => 2,
	'mobile_items'             => 1,
	'class'                    => '',
	'css'                      => '',
	'elements-carousel_style'  => '',
	'centered'  => 'no'
), $atts );

$controls = explode( ',', $atts['controls'] );
$controls = array_map( 'trim', $controls );
$controls = array_map( 'strtolower', $controls );

// Build element config
$config = array();
$config['items'] = abs( (int) $atts['items'] );
$config['items'] = max( 1, $config['items'] );
$config['items'] = min( 6, $config['items'] );

if ( $config['items'] == 1 ) {
	$config['singleItem'] = true;
}
else {
	$tablet_items = abs( (int) $atts['tablet_items'] );
	$tablet_items = max( 1, $tablet_items );
	$tablet_items = min( 6, $tablet_items );
	$config['itemsTablet'] = array( 1200, $tablet_items );

	$mobile_items = abs( (int) $atts['mobile_items'] );
	$mobile_items = max( 1, $mobile_items );
	$mobile_items = min( 6, $mobile_items );
	$config['itemsMobile'] = array( 544, $mobile_items );
}

$config['center']        = $atts['centered'] == 'yes';
$config['autoPlay']      = $atts['autoplay'] == 'yes' ? abs( (int) $atts['autoplay_speed'] ) : false;
$config['stopOnHover']   = $atts['hover_stop'] == 'yes';
$config['mouseDrag']     = $atts['mouse_drag'] == 'yes';
$config['touchDrag']     = $atts['touch_drag'] == 'yes';
$config['responsive']    = $atts['responsive'] == 'yes';
$config['scrollPerPage'] = $atts['scroll_page'] == 'yes';

$config['slideSpeed']      = abs( (int) $atts['slide_speed'] );
$config['paginationSpeed'] = abs( (int) $atts['pagination_speed'] );
$config['rewindSpeed']     = abs( (int) $atts['rewind_speed'] );
$config['slideSpeed']      = abs( (int) $atts['slide_speed'] );

$config['navigation']        = in_array( 'navigation', $controls );
$config['rewindNav']         = in_array( 'rewind-navigation', $controls );
$config['pagination']        = in_array( 'pagination', $controls );
$config['paginationNumbers'] = in_array( 'pagination-numbers', $controls );

// Hard coded params
$config['dragBeforeAnimFinish'] = true;
$config['addClassActive'] = true;
$config['autoHeight'] = true;
$config['navigationText'] = array( __( 'Previous', 'hank' ), __( 'Next', 'hank' ) );
$config['itemsScaleUp'] = true;

$classes = array( 'elements-carousel' );
$classes[] = $atts['class'];
$classes[] = $atts['elements-carousel_style'];

if ( function_exists( 'vc_shortcode_custom_css_class' ) ) {
	$classes[] = vc_shortcode_custom_css_class( $atts['css'], ' ' );
}
?>
<!-- BEGIN: .elements-carousel -->
<div class="<?php echo esc_attr( join( ' ', $classes ) ) ?>" data-config="<?php echo esc_attr( json_encode( $config ) ) ?>">
	<div class="elements-carousel-wrap">
		<?php echo do_shortcode( $content ) ?>
	</div>
</div>
<!-- END: .elements-carousel -->
