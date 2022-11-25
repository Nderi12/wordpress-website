<?php

/**
 * Prevent direct access to this file
 */
defined( 'ABSPATH' ) or die();

$options          = array( 'itemSelector' => '.project' );
$meta_information = (array)hank_option( 'projects__meta' );

/**
 * Ignore render related box when it's disabled
 */
if ( ! is_singular( 'nproject' ) ) {
	return;
}

// Query args
$args = array(
	'post_type'      => 'nproject',
	'posts_per_page' => hank_option( 'project__related__count', 4 ),
	'post__not_in'   => array( get_the_ID() )
);

$related_item_type = hank_option( 'project__related__type' );

// Filter by tags
if ( 'tag' == $related_item_type ) {
	if ( ! ( $terms = get_the_terms( get_the_ID(), nProjects::TYPE_TAG ) ) )
		return;

	$args['tax_query'] = array(
		'taxonomy' => nProjects::TYPE_TAG,
		'field'    => 'term_id',
		'terms'    => wp_list_pluck( $terms, 'term_id' )
	);
}
// Filter by categories
elseif ( 'category' == $related_item_type ) {
	if ( ! ( $terms = get_the_terms( get_the_ID(), nProjects::TYPE_CATEGORY ) ) )
		return;

	$args['tax_query'] = array(
		'taxonomy' => nProjects::TYPE_CATEGORY,
		'field'    => 'term_id',
		'terms'    => wp_list_pluck( $terms, 'term_id' )
	);
}
// Show random items
elseif ( 'random' == $related_item_type ) {
	$args['orderby'] = 'rand';
}
// Show latest items
elseif ( 'recent' == $related_item_type ) {
	$args['order'] = 'DESC';
	$args['orderby'] = 'date';
}

// Create the query instance
$query = new WP_Query( $args );
$widget_title = hank_option( 'project__related__title' );

if ( $query->have_posts() ): ?>

	<div class="projects-related projects projects-masonry">
		<?php if ( ! empty( $widget_title ) ): ?>
			<h3 class="projects-related-title">
				<?php echo esc_html( $widget_title ) ?>
			</h3>
		<?php endif ?>

		<div class="projects-related-wrap" data-grid="<?php echo esc_attr( json_encode( $options ) ) ?>" data-columns="<?php echo esc_attr( hank_option( 'projects__related__gridColumns' ) ) ?>">
			<?php while ( $query->have_posts() ): $query->the_post(); ?>

				<div <?php post_class( 'project' ) ?> itemscope="itemscope" itemtype="http://schema.org/CreativeWork">
					<div class="project-inner" data-mh="project-grid">
						<figure class="project-thumbnail">
							<?php
								$image = hank_get_image_resized( array(
									'post_id' => get_the_ID(),
									'size'    => hank_option( 'projects__imagesize' ),
									'crop'    => hank_option( 'projects__imagesizeCrop' ) == true
								) );

								echo hank_cleanup( $image['thumbnail'] );
							?>
						</figure>

						<div class="project-info">
							<div class="project-info-inner">
								<h2 class="project-title" itemprop="name headline">
									<?php the_title() ?>
								</h2>

								<?php if ( hank_option( 'projects__excerpt' ) == 'on' ): ?>
									<div class="project-summary">
										<?php the_excerpt() ?>
									</div>
								<?php endif ?>

								<?php if( have_rows('projectInfo') ): ?>
									<div class="project-info-list">
									<?php while( have_rows('projectInfo') ): the_row(); 
										// vars
										$projectTitleInfo = get_sub_field('titleInfo');
										$projectContentInfo = get_sub_field('contentInfo');
										?>
										<div class="item">
											<h6><?php echo hank_cleanup( $projectTitleInfo ); ?></h6>
											<p><?php echo hank_cleanup( $projectContentInfo ); ?> </p>
										</div>
									<?php endwhile; ?>
									</div>
								<?php endif; ?>
								
								<?php if ( hank_option( 'projects__readmore' ) == 'on' ): ?>
									<div class="project-readmore">
										<a class="button full small primary" href="<?php the_permalink() ?>"><?php esc_html_e( 'View Detail', 'hank' ) ?></a>
									</div>
								<?php endif ?>
							</div>
						</div>
					</div>
				</div>

			<?php endwhile ?>
		</div>
	</div>

<?php endif ?>
