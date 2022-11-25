<?php
defined( 'ABSPATH' ) or die();

$classes = array( 'footer-copyright' );
$classes[] = sprintf( 'footer-copyright-%s', hank_option( 'footer__copyright__align' ) );

if ( hank_option( 'footer__copyright__full' ) == 'on' ) {
	$classes[] = 'footer-copyright-full';
}
?>

	<?php if ( hank_option( 'footer__copyright' ) == 'on' ): ?>
		<div class="<?php echo esc_attr( join( ' ', $classes ) ) ?>">
			<div class="footer-copyright-inner wrap">
				<div class="copyright-content">
					<?php echo hank_cleanup( hank_option( 'footer__copyright__content' ) ) ?>
				</div>
				
				<?php hank_social_icons( array( 'location' => 'footer' ) ) ?>
				
				<?php if ( hank_option( 'global__misc__gotop' ) == 'on' ): ?>
					<div class="go-to-top">
						<a href="javascript:;"><span><?php echo esc_html__( 'Go to Top', 'hank' ) ?></span></a>
					</div>
				<?php endif ?>
			</div>
		</div>
	<?php endif ?>