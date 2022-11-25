<?php
defined( 'ABSPATH' ) or die();

$options          = array( 'itemSelector' => '.project' );
$meta_information = (array)hank_option( 'projects__meta' );
?>

	<?php if ( have_posts() ): ?>
		<div class="content" role="main" itemprop="mainContentOfPage">
			<?php get_template_part( 'tmpl/project/filter' ) ?>

			<div class="content-inner" data-grid="<?php echo esc_attr( json_encode( $options ) ) ?>" data-columns="<?php echo esc_attr( hank_option( 'projects__gridColumns' ) ) ?>">
				<?php while ( have_posts() ): the_post(); ?>

					<div <?php post_class( 'project' ) ?> itemscope="itemscope" itemtype="http://schema.org/CreativeWork">
						<div class="project-inner">
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

			<?php hank_pagination() ?>
		</div>
	<?php else: ?>
		<!-- Show empty message -->
	<?php endif ?>
