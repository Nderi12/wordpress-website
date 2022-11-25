<?php
defined( 'ABSPATH' ) or die();

add_filter( 'hank_body_class', 'hank_woocommerce_body_class' );
add_filter( 'hank_sidebar_id', 'hank_woocommerce_sidebar' );
add_filter( 'hank_sidebar_position', 'hank_woocommerce_sidebar_position' );
?>

	<?php get_header() ?>
		<div class="content">
			<?php woocommerce_content() ?>
		</div>
	<?php get_footer() ?>
