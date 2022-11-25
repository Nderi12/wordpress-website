<?php
defined( 'ABSPATH' ) or die();
?>

	<div id="post-<?php the_ID() ?>" <?php post_class( 'post' ) ?>>
		<div class="post-inner">
			<?php get_template_part( 'tmpl/post/content-featured', get_post_format() ) ?>
			
			<?php if ( hank_option( 'blog__archive__postMeta' ) == 'on' ): ?>
				<div class="post-categories">
					<span><?php echo esc_html( get_the_date( get_option( 'date_format' ) ) ) ?></span>
					<?php the_category( _x( ' ', 'Used between list items, there is a space after the comma.', 'hank' ) ) ?>
				</div>
			<?php endif ?>
			
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
			
			<div class="post-footer">
				<?php if ( hank_option( 'blog__archive__postMeta' ) == 'on' ): ?>
					<?php get_template_part( 'tmpl/post/content-meta' ) ?>
				<?php endif ?>
			</div>
		</div>
	</div>
