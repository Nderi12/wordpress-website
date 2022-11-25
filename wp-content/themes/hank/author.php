<?php
defined( 'ABSPATH' ) or die();

add_filter( 'hank_body_class', 'hank_blog_body_class' );
add_filter( 'hank_sidebar_id', 'hank_blog_sidebar' );
add_filter( 'hank_sidebar_position', 'hank_blog_sidebar_position' );
?>

	<?php get_header() ?>
		<?php if ( have_posts() ): ?>
			<?php get_template_part( 'tmpl/post/content-author' ) ?>
			<?php get_template_part( 'tmpl/post/loop', hank_option( 'blog__archive__style' ) ) ?>
		<?php else: ?>
			<div class="content">
				<?php get_template_part( 'tmpl/post/content', 'none' ) ?>
			</div>
		<?php endif ?>
	<?php get_footer() ?>
