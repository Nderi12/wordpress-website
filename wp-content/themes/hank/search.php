<?php
defined( 'ABSPATH' ) or die();

global $wp_query;

$paged = get_query_var( 'paged' ) ? intval( get_query_var( 'paged' ) ) : 1;
$index = 1 + ( ( $paged - 1 ) * $wp_query->query_vars['posts_per_page'] );
?>

	<?php get_header() ?>

		<?php if ( have_posts() ): ?>
			<div class="content">
				<div class="search-results">
					<?php while ( have_posts() ): the_post(); ?>
					<article <?php post_class( 'post' ) ?> id="post-<?php echo esc_attr( get_the_ID() ) ?>">
						<a href="<?php the_permalink() ?>">
							<span class="post-index">
								<?php echo (int) $index++ ?>
							</span>
							<!--?php the_post_thumbnail('thumbnail'); ?>-->
							<p class="post-title"><?php the_title() ?></p>
							<p class="post-meta">
								<span class="post-type">
									<?php $postType = get_post_type_object(get_post_type());
									if ($postType) {
									    echo esc_html($postType->labels->singular_name);
									} ?>
								</span>	

								<span class="post-date"><?php echo esc_html( get_the_date( get_option( 'date_format' ) ) ) ?></span>
							</p>
						</a>
					</article>
					<?php endwhile ?>
				</div>
			</div>
			
			<?php hank_pagination() ?>
		<?php else: ?>
			<div class="content">
				<div class="search-no-results">
					<h3><?php _ex( 'Nothing Found', 'frontend', 'hank' ) ?></h3>
					<p><?php _ex( 'Sorry, no posts matched your criteria. Please try another search', 'frontend', 'hank' ) ?></p>
				</div>

				<?php get_search_form() ?>
			</div>
		<?php endif ?>

	<?php get_footer() ?>