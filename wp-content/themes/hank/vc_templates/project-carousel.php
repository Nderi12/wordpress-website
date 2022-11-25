<?php
$original_atts = $atts;
$atts = shortcode_atts( array(
	'widget_title'   => '',
	'categories'     => '',
	'tags'            => '',
	'limit'          => 9,
	'lightbox'       => 'no',
	'offset'         => 0,
	'thumbnail_size' => 'full',
	'show_date'      => 'no',
	'date_format'    => '',
	'show_excerpt'   => 'no',
	'auto_excerpt'   => 'no',
	'excerpt_length' => 200,
	'readmore'       => 'yes',
	'readmore_text'  => 'Read More',
	'order'          => 'date',
	'direction'      => 'DESC',
	'class'          => '',
	'css'            => ''
), $atts );

// Remove attribute "class" from origial attributes
if ( isset( $original_atts['class'] ) ) unset( $original_atts['class'] );
if ( isset( $original_atts['css'] ) )   unset( $original_atts['css'] );

// Santinize the shortcode attributes
$atts['limit']        = abs( (int) $atts['limit'] );
$atts['limit']        = max( 1, $atts['limit']);
$atts['offset']       = abs( (int) $atts['offset'] );
$atts['readmore']     = $atts['readmore'] == 'yes';
$atts['show_date']    = $atts['show_date'] == 'yes';
$atts['show_excerpt'] = $atts['show_excerpt'] == 'yes';
$atts['auto_excerpt'] = $atts['auto_excerpt'] == 'yes';
$atts['lightbox']     = $atts['lightbox'] == 'yes';

// Santinize categories
$atts['categories'] = explode( ',', $atts['categories'] );
$atts['categories'] = array_map( 'trim', $atts['categories'] );
$atts['categories'] = array_filter( $atts['categories'] );

// Santinize tags
$atts['tags'] = explode( ',', $atts['tags'] );
$atts['tags'] = array_map( 'trim', $atts['tags'] );
$atts['tags'] = array_filter( $atts['tags'] );

$sorting_fields = [
	'date',
	'ID',
	'author',
	'title',
	'modified',
	'rand',
	'comment_count',
	'menu_order'
];

$sorting_direction = [
	'ASC',
	'DESC'
];

if ( ! in_array( $atts['order'], $sorting_fields ) )
	$atts['order'] = 'date';

if ( ! in_array( $atts['direction'], $sorting_direction ) )
	$atts['order'] = 'DESC';

// Begin build post type query
$args = array(
	'post_type'           => 'nproject',
	'ignore_sticky_posts' => true,
	'posts_per_page'      => $atts['limit'],
	'offset'              => $atts['offset'],
	'orderby'             => $atts['order'],
	'order'               => $atts['direction'],
	'tax_query'           => array(
		'relation' => 'AND'
	)
);

if ( ! empty( $atts['categories'] ) ) {
	$args['tax_query'][] = array(
		'taxonomy'         => 'nproject-category',
		'field'            => 'term_id',
		'terms'            => $atts['categories'],
		'include_children' => false
	);
}

if ( ! empty( $atts['tags'] ) ) {
	$args['tax_query'][] = array(
		'taxonomy' => 'nproject-tag',
		'field'    => 'term_id',
		'terms'    => $atts['tags'],
		'operator' => 'IN'
	);
}

$query = new WP_Query( $args );

// Start output the carousel
if ( $query->have_posts() ):
	$classes = array( 'projects project-carousel projects-grid' );
	$classes[] = $atts['class'];
	
	if ( function_exists('vc_shortcode_custom_css_class') ) {
		$classes[] = vc_shortcode_custom_css_class( $atts['css'], ' ' );
	}
?>
	<!-- BEGIN: .project-carousel -->
	<div class="<?php echo esc_attr( join( ' ', $classes ) ) ?>">
		
		<?php if ( ! empty( $atts['widget_title'] ) ): ?>
			<h3 class="widget-title">
				<?php echo esc_html( $atts['widget_title'] ) ?>
			</h3>
		<?php endif ?>

			<div class="projects-wrap">

			<?php
			
				/**
				 * Start output buffering to catching
				 * generated markup
				 */
				ob_start();

			?>

			
				<?php while ( $query->have_posts() ): $query->the_post(); ?>
					
					<div <?php post_class( 'project' ) ?>>
						<div class="project-inner">
							<figure class="project-thumbnail">
								<?php
									/**
									 * Preparing the post thumbnail
									 */
										$image = hank_get_image_resized( array( 'post_id' => get_the_ID(), 'size' => $atts['thumbnail_size'], 'crop' => true ) );
										print( hank_cleanup( $image['thumbnail'] ) );
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
									
									<?php if ( $atts['readmore'] == 'yes' ): ?>
										<div class="project-readmore">
											<a class="button full small primary" href="<?php the_permalink() ?>"><?php echo esc_html( $atts['readmore_text'] ) ?></a>
										</div>
									<?php endif ?>
								</div>
							</div>
						</div>
					</div>

				<?php
					// End the post loop
					endwhile;

					/**
					 * We need reset post data to ensure
					 * not conflict with other code
					 */
					wp_reset_postdata();
				?>
			<?php

				global $shortcode_tags;

				if ( isset( $shortcode_tags['elements_carousel'] ) ) {
					echo hank_cleanup( $shortcode_tags['elements_carousel']( $original_atts, ob_get_clean() ) );
				}

			?>

		</div>
	</div>
	<!-- END: .project-carousel -->
<?php endif ?>
