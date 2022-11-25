<?php
defined( 'ABSPATH' ) or die();
?>
	
	<div class="content" role="main" itemprop="mainContentOfPage">
		<?php if ( have_posts() ): ?>
			<?php while ( have_posts() ): the_post(); ?>
				<div id="post-<?php the_ID() ?>" <?php post_class( 'post' ) ?>>
					<div class="post-inner">
						<?php if ( hank_option( 'blog__archive__postMeta' ) == 'on' ): ?>
							<div class="post-meta">
								<div class="post-author-meta">
									<?php echo get_avatar( get_the_author_meta( 'ID' ), 40 ); ?>
									<p class="post-name">
										<span><?php esc_html_e( 'By', 'hank' ) ?></span>
										<?php the_author_posts_link() ?>
									</p>
									<p class="post-date">
										<span><?php esc_html_e( 'On', 'hank' ) ?></span>
										<?php echo esc_html( get_the_date( get_option( 'date_format' ) ) ) ?>
									</p>
								</div>
								<div class="post-categories">
									<span><?php esc_html_e( 'In', 'hank' ) ?></span>
									<?php the_category( _x( ' ', 'Used between list items, there is a space after the comma.', 'hank' ) ) ?>
								</div>
							</div>
						<?php endif ?>

						<div class="post-wrap">
							<?php get_template_part( 'tmpl/post/content-featured', get_post_format() ) ?>
							<div class="post-header">
								<?php get_template_part( 'tmpl/post/content-title' ) ?>
							</div>
							
							<div class="post-content">
								<?php
									hank_the_content( false );
									wp_link_pages( array(
										'before'      => '<div class="page-links"><span class="page-links-title">' . esc_html__( 'Pages:', 'hank' ) . '</span>',
										'after'       => '</div>',
										'link_before' => '<span>',
										'link_after'  => '</span>',
									) );
								?>
							</div>
						</div>
					</div>
				</div>
			<?php endwhile ?>
		<?php else: ?>
			<?php get_template_part( 'tmpl/post/content-none' ) ?>
		<?php endif ?>
	</div>
	<!-- /.content -->
	<?php hank_pagination() ?>
			