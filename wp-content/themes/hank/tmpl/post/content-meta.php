<?php
defined( 'ABSPATH' ) or die();
?>
	
	<?php if ( hank_option( 'blog__archive__postMeta' ) == 'on' ): ?>
		<div class="post-meta">
			<div class="post-author-content">
				<?php echo get_avatar( get_the_author_meta( 'ID' ), 40 ); ?>
				<span><?php esc_html_e( 'by', 'hank' ) ?></span>
				<span class="post-name">
					<?php the_author_posts_link() ?>
				</span>	
			</div>
			<?php if ( ! post_password_required() && ( comments_open() || get_comments_number() ) ): ?>
				<div class="post-comments">
					<?php comments_popup_link( __( '0 <span>Comment</span>', 'hank' ), __( '1 <span>Comment</span>', 'hank' ), __( '% <span>Comments</span>', 'hank' ) ); ?>
				</div>
			<?php endif ?>
		</div>
	<?php endif ?>
