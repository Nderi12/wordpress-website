<?php
defined( 'ABSPATH' ) or die();

$sliding_menu_options = array(
	'theme_location'  => 'sliding',
	'container'       => false,
	'menu_class'      => 'menu menu-sliding',
	'fallback_cb'     => false,
	'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
	'depth'           => 0
);

$contact_info  = hank_option( 'header__info__text' );
?>

<?php if ( is_active_sidebar( 'off-canvas-left' ) ): ?>
	<div id="off-canvas-left" class="off-canvas off-canvas-left">
		<a href="javascript:;" data-target="off-canvas-left" class="off-canvas-toggle">
			<span></span>
		</a>
		<div class="off-canvas-wrap">
			<?php dynamic_sidebar( 'off-canvas-left' ) ?>
		</div>
	</div>
<?php endif ?>

<?php if ( has_nav_menu( 'sliding' ) ): ?>
	<div id="off-canvas-right" class="off-canvas sliding-menu">
		<a href="javascript:;" data-target="off-canvas-right" class="off-canvas-toggle">
			<span></span>
		</a>

		<div class="off-canvas-wrap">
			<?php the_widget( 'WP_Widget_Search' ) ?>

			<?php wp_nav_menu( $sliding_menu_options ) ?>

			<?php if ( ! empty( $contact_info ) ): ?>
				<div class="header-info-text">
					<?php echo hank_cleanup( $contact_info ) ?>
				</div>
			<?php endif ?>
			
			<?php hank_social_icons( array( 'location' => 'nav' ) ) ?>
		</div>
	</div>
<?php endif ?>