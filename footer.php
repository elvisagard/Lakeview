<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package PPx_Starter_Theme
 */

?>

	</div><!-- #content -->
<?php //PPX-FOOT 1.0 FOOTER ?>
<?php $image_alt = get_post_meta(4800, '_wp_attachment_image_alt', TRUE); ?>
<?php $logo_footer_alt = get_post_meta(4905, '_wp_attachment_image_alt', TRUE); ?>



<?php //PPX-FOOT 1.0 FOOTER ?>
<?php if (is_page() && is_active_sidebar( 'page-bottom-1' ) ) : ?>

<div id="page-bottom" class="uk-margin-xlarge-top">
    <aside id="sidebar-output" class="uk-background-muted uk-padding uk-padding-remove-horizontal">
     <div class="uk-container">
         <?php dynamic_sidebar( 'page-bottom-1' ); ?>
     </div>
    </aside>
</div>

<?php endif; ?> <!-- #page-bottom-1 output -->


</div><!-- #page -->


	<div class="grid-sabbath">
    	<img class="sda-logo" src="/wp-content/uploads/2023/02/sda-logo.svg" alt="<?php echo $image_alt; ?>">
    </div><!-- grid-sabbath -->

	<footer id="colophon" class="site-footer uk-background-secondary uk-padding-large uk-padding-remove-horizontal uk-position-relative">	
		
		<section class="footer-content uk-container uk-flex">
			<div class="lv-footer-left uk-width-1-4@l">
				<img class="lv-footer-logo uk-width-medium" src="/wp-content/uploads/2023/03/lv-logo-full-footer.svg" alt="<?php echo $logo_footer_alt; ?>">
				<address>
					4001 Macedonia Road,<br>
					Powder Springs, GA 30127<br>
					Email: <a href="email:office@lakeviewadventist.org">office@lakeviewadventist.org</a><br>
					Phone: <a href="tel:7702221511">1-770.222.1511</a>
				</address>
				<ul class="uk-iconnav uk-margin-medium-top">
					<li class="uk-flex uk-flex-center uk-flex-middle"><a href="#" uk-icon="icon: facebook; ratio: 1.1" uk-tooltip="title: Facebook"></a></li>
					<li class="uk-flex uk-flex-center uk-flex-middle"><a href="#" uk-icon="icon: linkedin; ratio: 1.1" uk-tooltip="title: Linked In"></a></li>
					<li class="uk-flex uk-flex-center uk-flex-middle"><a href="#" uk-icon="icon: youtube; ratio: 1.1" uk-tooltip="title: Youtube"></a></li>
					<li class="uk-flex uk-flex-center uk-flex-middle more-menu"><a href="#" uk-icon="icon: twitter; ratio: 1.1" uk-tooltip="title: Twitter"></a></li>
				</ul>
			</div>

			<div class="lv-footer-center uk-width-1-4 uk-padding-large uk-padding-remove-top uk-padding-remove-right uk-visible@m">
				<h4 class="">Quick Links</h4>
				<?php //PPX-FOOTER 3.0 FOOTER NAV ?> 
					<?php
					wp_nav_menu( array(
						'theme_location'    => 'menu-footer-desktop',
						'menu_id'           => 'footer-menu',
						'menu_class'        => 'uk-nav uk-nav-default',
						'container'         => 'div',
						'container_class'   => 'uk-visible@ll',
					) );
					?>

			</div>

			<div class="lv-footer-right uk-width-1-2 uk-visible@l">
				<?php if ( is_active_sidebar( 'footer-beliefs' ) ) : ?>
					<div id="secondary-sidebar" class="footer-beliefs">
					<?php dynamic_sidebar( 'footer-beliefs' ); ?>
					</div>
				<?php endif; ?>
			</div>

		</section>

		<div class="uk-container uk-position-medium uk-position-bottom-center">
			<p class=”copyright uk-position-absolute”><?php echo lv_copyright(); ?> Lakeview Seventh-day Adventist Church</p>
		</div>

		<div class="site-info uk-container">
				<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'lv-base' ) ); ?>">
					<?php
					/* translators: %s: CMS name, i.e. WordPress. */
					printf( esc_html__( 'Proudly powered by %s', 'lv-base' ), 'WordPress' );
					?>
				</a>
				<span class="sep"> | </span>
					<?php
					/* translators: 1: Theme name, 2: Theme author. */
					printf( esc_html__( 'Theme: %1$s by %2$s.', 'lv-base' ), 'lv-base', '<a href="https://profoundpixels.com">Profound Pixels</a>' );
					?>
			</div><!-- .site-info -->
	</footer><!-- #colophon -->
	<?php wp_footer(); ?>


</body>
</html>
