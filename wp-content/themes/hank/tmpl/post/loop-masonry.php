<?php
defined( 'ABSPATH' ) or die();

$options = array( 'itemSelector' => '.post' );
?>
	
	<div class="content" role="main" itemprop="mainContentOfPage">
		<?php if ( have_posts() ): ?>
			<div class="content-inner" data-grid="<?php echo esc_attr( json_encode( $options ) ) ?>" data-columns="<?php echo esc_attr( hank_option( 'blog__archive__columns' ) ) ?>">
				<?php while ( have_posts() ): the_post(); ?>
					<div id="post-<?php the_ID() ?>" <?php post_class( 'post' ) ?>>
						<div class="post-inner">
							<?php get_template_part( 'tmpl/post/content-featured', get_post_format() ) ?>
							
							<?php if ( hank_option( 'blog__archive__postMeta' ) == 'on' ): ?>
								<div class="post-meta">
									<div class="post-date">
										<?php echo esc_html( get_the_date( get_option( 'date_format' ) ) ) ?>
									</div>
									<div class="post-categories">
										<?php the_category( _x( ' ', 'Used between list items, there is a space after the comma.', 'hank' ) ) ?>
									</div>
								</div>
							<?php endif ?>

							<div class="post-header">
								<?php get_template_part( 'tmpl/post/content-title' ) ?>
							</div>
						</div>
					</div>
				<?php endwhile ?>
			</div>

			<?php hank_pagination() ?>
		<?php else: ?>
			<?php get_template_part( 'tmpl/post/content-none' ) ?>
		<?php endif ?>
	</div>
	<!-- /.content -->

