<?php
defined( 'ABSPATH' ) or die();

if ( ! ( $author_id = get_the_author_meta( 'ID' ) ) ) {
	$author_id = get_query_var( 'author' );
}

$author_posts_query = new WP_Query([
	'author' => $author_id,
	'posts_per_page' => 3
]);

$author_description = get_the_author_meta( 'description', $author_id );
?>

	
	<div class="post-author-box" itemprop="author" itemscope="itemscope" itemtype="http://schema.org/Person">
		<?php echo get_avatar( get_the_author_meta( 'ID' ), 50 ); ?>
		<div class="author-box-content">
			<div class="author-box-title">
				<span><?php esc_html_e( 'About the:', 'hank' ); ?></span>
				<span><?php the_author_posts_link() ?></span>
			</div>

			<?php if ( ! empty( $author_description ) ): ?>
				<div class="author-description">
					<?php echo hank_cleanup( $author_description ) ?>
				</div>
			<?php endif ?>

			<?php if ( $author_posts_query->have_posts() ): ?>
			<div class="author-recent-posts">
				<ul>
					<?php while( $author_posts_query->have_posts() ): $author_posts_query->the_post() ?>
					<li>
						<a href="<?php the_permalink() ?>" rel="bookmark">
							<?php the_title() ?>
						</a>
					</li>
					<?php endwhile ?>
					<?php wp_reset_postdata() ?>
				</ul>

				<a href="<?php echo esc_url( get_author_posts_url( $author_id ) ) ?>" class="author-more-posts">
					<?php esc_html_e( 'More Posts', 'hank' ) ?>
				</a>
			</div>
			<?php endif ?>
		</div>
	</div>