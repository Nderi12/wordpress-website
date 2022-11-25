<?php
defined( 'ABSPATH' ) or die();

// The menu settings
$primary_menu_args = array(
	'theme_location'  => 'primary',
	'container'       => false,
	'menu_class'      => 'menu menu-primary',
	'fallback_cb'     => 'hank_page_menu',
	'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
	'depth'           => 0
);

$contact_info  = hank_option( 'header__info__text' );
$nav_info  = hank_option( 'header__nav__text' );
$header_nav_extras = hank_option( 'header__nav__extras' );

$header_classes = array( 'site-header site-header-classic' );
$header_classes[] = sprintf( 'header-brand-%s', hank_option( 'header__logoAlign' ) );

if ( hank_option( 'header__width' ) === 'on' ) {
	$header_classes[] = 'header-full';
}

if ( hank_option( 'header__shadow' ) === 'on' ) {
	$header_classes[] = 'header-shadow';
}

if ( hank_option( 'header__transparent' ) === 'on' ) {
	$header_classes[] = 'header-transparent';
}
?>

	<?php if ( hank_option( 'header__topbar' ) === 'on' ): ?>
		<?php get_template_part( 'tmpl/header-topbar' ); ?>
	<?php endif ?>

	<div id="site-header" class="<?php echo esc_attr( join( ' ', $header_classes ) ) ?>">
		<div class="site-header-inner wrap">
			<div class="header-content">
				<div class="header-brand">
					<a href="<?php echo esc_attr( site_url() ) ?>">
						<?php hank_logo( hank_option( 'header__logo' ) ) ?>
					</a>
				</div>

				<?php if ( has_nav_menu( 'primary' ) ): ?>
					<nav class="navigator" itemscope="itemscope" itemtype="http://schema.org/SiteNavigationElement">

						<?php if ( ! empty( $nav_info ) ): ?>
							<div class="nav-info">
								<?php echo hank_cleanup( $nav_info ) ?>
							</div>
						<?php endif ?>

						<?php wp_nav_menu( $primary_menu_args ) ?>
					</nav>
				<?php endif ?>

				<div class="extras">
					<?php if ( ! empty( $contact_info ) ): ?>
						<div class="header-info-text">
							<?php echo hank_cleanup( $contact_info ) ?>
						</div>
					<?php endif ?>

					<?php hank_social_icons( array( 'location' => 'nav' ) ) ?>

					<?php if ( ! empty( $header_nav_extras ) ): ?>
						<ul class="navigator menu-extras">
							<?php foreach ( $header_nav_extras as $type ): ?>
								<?php get_template_part( 'tmpl/header-icon', $type ); ?>
							<?php endforeach ?>
						</ul>
					<?php endif ?>
				</div>
			
				<?php get_template_part( 'tmpl/header-sliding-toggle' ) ?>
				
			</div>			
		</div>
		<!-- /.site-header-inner -->
	</div>
	<!-- /.site-header -->

	<?php if ( hank_option( 'header__sticky' ) === 'on' ): ?>
		<?php get_template_part( 'tmpl/header-sticky' ); ?>
	<?php endif ?>