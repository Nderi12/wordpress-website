<?php
defined( 'ABSPATH' ) or die();

$featured_background_types = (array) hank_option( 'header__titlebar__backgroundFeatured' );
$current_post_type         = hank_current_post_type();
$show_featured_image       = ! in_array( $current_post_type, $featured_background_types ) && has_post_thumbnail();
?>

	<div id="post-<?php the_ID() ?>" <?php post_class( 'post' ) ?>>
		<div class="post-inner">
			<div class="post-header">
				<h2 class="post-title" itemprop="headline">
					<?php the_title(); ?>
				</h2>
				<?php the_excerpt(); ?>
			</div>
			
			<?php if ( hank_option( 'blog__single__postMeta' ) == 'on' ): ?>
				<div class="post-meta">
					<div class="post-author-meta">
						<div class="post-avatar">
							<?php echo get_avatar( get_the_author_meta( 'ID' ), 60 ); ?>
						</div>
						<div class="post-author-content">
							<p class="post-name">
								<span><?php esc_html_e( 'By', 'hank' ) ?></span>
								<?php the_author(); ?>
							</p>
							<p class="post-data">
								<span><?php echo human_time_diff( get_the_time('U'), current_time('timestamp') ) . ' ago'; ?></span>
								<span><?php esc_html_e( 'in', 'hank' ) ?></span>
								<?php the_category( _x( ' ', 'Used between list items, there is a space after the comma.', 'hank' ) ) ?>
							</p>
						</div>
					</div>

					<div class="post-date">
						<span class="post-day"><?php echo esc_html( get_the_date( 'd' ) ) ?></span>
						<span class="post-month"><?php echo esc_html( get_the_date( 'F' ) ) ?></span>
						<span class="post-year"><?php echo esc_html( get_the_date( 'Y' ) ) ?></span>
					</div>
					
					<?php if ( ! post_password_required() && ( comments_open() || get_comments_number() ) ): ?>
						<div class="post-comments">
							<?php comments_popup_link( __( '0 <span>Comment</span>', 'hank' ), __( '1 <span>Comment</span>', 'hank' ), __( '% <span>Comments</span>', 'hank' ) ); ?>
						</div>
					<?php endif ?>

					<?php if ( function_exists( 'ADDTOANY_SHARE_SAVE_KIT' ) ) { ADDTOANY_SHARE_SAVE_KIT(); } ?>
				</div>
			<?php endif ?>	

			<div class="post-content" itemprop="text">
				<div class="post-content-inner">
					<div class="post-thumbnail">
						<?php the_post_thumbnail( 'post-thumbnail' ) ?>

						<?php if (get_post(get_post_thumbnail_id())->post_excerpt): // search for if the image has caption added on it ?>
						    <span class="featured-image-caption">
						        <?php echo hank_cleanup(get_post(get_post_thumbnail_id())->post_excerpt); // displays the image caption ?>
						    </span>
						<?php endif ?>
					</div>

					<div class="post-detail">
						<?php the_content() ?>
							
						<?php
							wp_link_pages( array(
								'before'      => '<div class="page-links"><span class="page-links-title">' . esc_html__( 'Pages:', 'hank' ) . '</span>',
								'after'       => '</div>',
								'link_before' => '<span>',
								'link_after'  => '</span>',
							) );
						?>	
						</div>

					<div class="post-footer">	
						<?php if ( hank_option( 'blog__single__postTags' ) == 'on' ): ?>
							<div class="post-tags"><p><?php the_tags( '', ' ' ); ?></p><p><?php esc_html_e( 'Tags:', 'hank' ); ?></p></div>
						<?php endif ?>

						<?php if ( function_exists( 'ADDTOANY_SHARE_SAVE_KIT' ) ) { ADDTOANY_SHARE_SAVE_KIT(); } ?>
					</div>
				</div>
				
				<div class="post-right">
					<?php if ( hank_option( 'blog__single__postAuthor' ) == 'on' ): ?>
						<?php get_template_part( 'tmpl/post/content-author' ) ?>
					<?php endif ?>

					<?php if ( hank_option( 'blog__single__postNav' ) == 'on' ): ?>
						<?php get_template_part( 'tmpl/post/content-navigator' ) ?>
					<?php endif ?>
				</div>
			</div>
			<!-- /.post-content -->
		</div>
		<!-- /.post-inner -->
	</div>
	<!-- /#post-<?php echo get_the_ID() ?> -->
