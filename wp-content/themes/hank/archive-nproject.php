<?php
defined( 'ABSPATH' ) or die();


add_filter( 'hank_body_class', 'hank_projects_body_class' );
add_filter( 'hank_sidebar_id', 'hank_projects_sidebar' );
add_filter( 'hank_sidebar_position', 'hank_projects_sidebar_position' );
?>

	<?php get_header() ?>
		<?php if ( have_posts() ): ?>
			<?php get_template_part( 'tmpl/project/loop', hank_option( 'projects__displayMode' ) ) ?>
		<?php else: ?>
			<div class="content">
				<?php get_template_part( 'tmpl/project/content', 'none' ) ?>
			</div>
		<?php endif ?>
	<?php get_footer(); ?>

