<?php
defined( 'ABSPATH' ) or die();
?>

	<?php get_header() ?>
		<div class="content">
			<div class="content-404">
				<div class="content-404-inner">
					<h3><?php _ex( 'Looks Like Something Went Wrong!', 'frontend', 'hank' ) ?></h3>
					<p><?php _ex( 'The page you were looking for is not here. Maybe you want to perform a search?', 'frontend', 'hank' ); ?></p>
				</div>
				<?php get_search_form(); ?>
			</div>
		</div>
		<!-- /.content-inner -->
	<?php get_footer() ?>
