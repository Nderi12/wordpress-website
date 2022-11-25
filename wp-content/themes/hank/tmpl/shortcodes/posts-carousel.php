<?php
$original_atts = $atts;
$atts = shortcode_atts( array(
	'widget_title'   => '',
	'categories'     => '',
	'tag'            => '',
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
	'readmore_text'  => '',
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
$atts['tags'] = explode( ',', $atts['tag'] );
$atts['tags'] = array_map( 'trim', $atts['tags'] );
$atts['tags'] = array_filter( $atts['tags'] );

$allowed_sorting_fields = array(
	'date', 'ID', 'author', 'title', 'modified', 'rand', 'comment_count', 'menu_order'
);

if ( ! in_array( $atts['order'], $allowed_sorting_fields ) )
	$atts['order'] = 'date';

if ( ! in_array( $atts['direction'], array( 'ASC', 'DESC' ) ) )
	$atts['order'] = 'DESC';

// Begin build post type query
$args = array(
	'post_type'           => 'post',
	'ignore_sticky_posts' => true,
	'posts_per_page'      => $atts['limit'],
	'offset'              => $atts['offset'],
	'orderby'             => $atts['order'],
	'order'               => $atts['direction'],
	'tax_query'           => array(
		'relation' => 'OR'
	)
);

if ( ! empty( $atts['categories'] ) ) {
	$args['tax_query'][] = array(
		'taxonomy'         => 'category',
		'field'            => 'term_id',
		'terms'            => $atts['categories'],
		'include_children' => false
	);
}

if ( ! empty( $atts['tags'] ) ) {
	$args['tax_query'][] = array(
		'taxonomy'         => 'post_tag',
		'field'            => 'slug',
		'terms'            => $atts['tags']
	);
}

$query = new WP_Query( $args );

// Start output the carousel
if ( $query->have_posts() ):
	$classes = array( 'posts-carousel' );
	$classes[] = $atts['class'];
	
	if ( function_exists('vc_shortcode_custom_css_class') ) {
		$classes[] = vc_shortcode_custom_css_class( $atts['css'], ' ' );
	}
?>
	<!-- BEGIN: .posts-carousel -->
	<div class="<?php echo esc_attr( join( ' ', $classes ) ) ?>">
		
		<?php if ( ! empty( $atts['widget_title'] ) ): ?>
			<h3 class="widget-title">
				<?php echo esc_html( $atts['widget_title'] ) ?>
			</h3>
		<?php endif ?>

			<div class="blog-entries">

			<?php
			
				/**
				 * Start output buffering to catching
				 * generated markup
				 */
				ob_start();

			?>

			
				<?php while ( $query->have_posts() ): $query->the_post(); ?>
					
					<div id="post-<?php the_ID() ?>" <?php post_class( 'post' ) ?>>
						<div class="post-inner">
							<?php if ( has_post_thumbnail() && function_exists( 'wpb_getImageBySize' ) ): ?>
								<a href="<?php the_permalink() ?>" class="post-image">
									<?php if ( $atts['readmore'] ): ?>
										<span class="read-more"><?php echo esc_html( $atts['readmore_text'] ) ?></span>
									<?php endif ?>

									<?php

										/**
										 * Preparing the post thumbnail
										 */
										$image = wpb_getImageBySize( array( 'post_id' => get_the_ID(), 'thumb_size' => $atts['thumbnail_size'] ) );
										$image_large = $image['p_img_large'];

										if ( $atts['lightbox'] ):
											printf( $image_large[0], $image['thumbnail'] );
										else:
											print( hank_cleanup( $image['thumbnail'] ) );
										endif;
									?>
								</a>
							<?php endif ?>

							<div class="post-header">
								<p class="post-title">
									<a href="<?php the_permalink() ?>"><?php the_title() ?></a>
								</p>
							</div>

							<?php if ( $atts['show_excerpt'] ): ?>
								<div class="post-content">
									<?php if ( has_excerpt() ): ?>
										<?php the_excerpt() ?>
									<?php else: ?>
										<?php

											$content = get_the_content();
											$content = trim( strip_tags( $content ) );
											$length  = intval( '0' . $atts['excerpt_length'] );
											$length  = max( $length, 1 );

											if ( mb_strlen( $content ) > $length ) {
												$content = mb_substr( $content, 0, $length );
												$content.= '...';
											}

											echo hank_cleanup( $content );
										?>
									<?php endif ?>
								</div>
							<?php endif ?>
						
							<?php if ( $atts['show_date'] ): ?>
								<div class="post-date">
									<?php echo esc_html( get_the_date( get_option( 'date_format' ) ) ) ?>
								</div>
							<?php endif ?>
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
	<!-- END: .posts-carousel -->
<?php endif ?>
