<?php
defined( 'ABSPATH' ) or die();

add_filter( 'hank_sidebar_id', 'hank_single_sidebar' );
add_filter( 'hank_sidebar_position', 'hank_single_sidebar_position' );
?>
	<?php get_header( 'blog' ) ?>
		<?php if ( have_posts() ): the_post(); ?>
			<!-- The main content -->
			<main id="main-content" class="main-content" itemprop="mainContentOfPage">
				<div class="main-content-inner">
					<div class="content">
						<?php get_template_part( 'tmpl/post/content', 'single' ) ?>
					</div>
				</div>
			</main>

			<?php get_sidebar() ?>

			<?php hank_related_posts() ?>
			<?php hank_comments_list() ?>
		<?php endif ?>
	<?php get_footer( 'blog' ) ?>
