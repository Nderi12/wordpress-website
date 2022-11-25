<?php
defined( 'ABSPATH' ) or die();

$featured_background_types = (array) hank_option( 'header__titlebar__backgroundFeatured' );
$current_post_type         = hank_current_post_type();
$show_featured_image       = ! in_array( $current_post_type, $featured_background_types ) && has_post_thumbnail();

$gallery_position = get_field( 'projectGalleryPosition' );
$gallery_style = get_field( 'projectGalleryStyle' );

if ( $gallery_position === 'default' ) {
	$gallery_position = hank_option( 'project__galleryPosition' );
}

if ( $gallery_style === 'default' ) {
	$gallery_style = hank_option( 'project__galerryMode' );
}

add_filter( 'hank_body_class', 'hank_single_project_body_classes' );
add_filter( 'hank_sidebar_id', 'hank_single_project_sidebar' );
add_filter( 'hank_sidebar_position', 'hank_single_project_sidebar_position' );
?>
	<?php get_header('blog') ?>
		<?php if ( have_posts() ): the_post(); ?>

			<main id="main-content" class="main-content" itemprop="mainContentOfPage">
				<div class="main-content-inner">
					<div class="content">
						<div <?php post_class( 'project' ) ?>>
							<div class="project-inner">
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
								
								<div class="project-content">
									<div class="project-header">
										<div class="project-thumbnail">
											<?php if ( $show_featured_image ): ?>
												<?php the_post_thumbnail( 'post-thumbnail' ) ?>
											<?php endif ?>
											
											<?php if ( in_array( $gallery_position, array( 'top' ) ) ): ?>
												<?php get_template_part( 'tmpl/project/gallery', $gallery_style ) ?>
											<?php endif ?>

											<?php if (get_post(get_post_thumbnail_id())->post_excerpt) { // search for if the image has caption added on it ?>
											    <span class="featured-image-caption">
											        <?php echo hank_cleanup(get_post(get_post_thumbnail_id())->post_excerpt); // displays the image caption ?>
											    </span>
											<?php } ?>		
										</div>
									</div>

									<?php if ( in_array( $gallery_position, array( 'left' ) ) ): ?>
										<?php get_template_part( 'tmpl/project/gallery', $gallery_style ) ?>
									<?php endif ?>

									<div class="project-detail">
										<?php the_content() ?>
									</div>

									<?php if ( in_array( $gallery_position, array( 'right' ) ) ): ?>
										<?php get_template_part( 'tmpl/project/gallery', $gallery_style ) ?>
									<?php endif ?>
								</div>
							</div>
						</div>
					</div>
				</div>
			</main>

			<?php get_sidebar() ?>


			<?php if ( in_array( $gallery_position, array( 'bottom' ) ) ): ?>
				<?php get_template_part( 'tmpl/project/gallery', $gallery_style ) ?>
			<?php endif ?>

			<?php if ( hank_option( 'project__pagination' ) == 'on' ): ?>
				<?php get_template_part( 'tmpl/post/content-navigator' ) ?>
			<?php endif ?>

			<?php if ( hank_option( 'project__related' ) == 'on' ): ?>
				<?php get_template_part( 'tmpl/project/related' ) ?>
			<?php endif ?>
		<?php endif ?>
	<?php get_footer('blog') ?>
