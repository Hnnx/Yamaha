<?php
/**
 * Default worpress footer starts wtih closing content <div>
 * Modify everything in <footer> tag and make sure to include closing divs after </footer>
 *
 * </div> for page
 * calling wp_footer()
 * close </body> and <html>
 *
 * @package Yamaha
 */

 global $template;
 #echo $template;

?>

</div><!-- #site-content -->

<footer class="mt-13">
	<div class="header-banner">
		<?php get_template_part( 'partials/header', 'banner');?>
	</div>
</footer>

 <footer id="footer" class="mt-9">
	<div class="footer-content-wrapper border-top border-dark py-6">
		<div class="container">
			<div class="row">
				<div class="col-12 col-md-4">
					<h2>First column</h2>
					<?php if ( is_active_sidebar( 'footer-1' ) ) : ?>						
						<?php dynamic_sidebar( 'footer-1' ); ?>						
					<?php endif; ?>
				</div>
				<div class="col-12 col-md-4">
					<h2>Second column</h2>
				</div>
				<div class="col-12 col-md-4">
					<h2>Third column</h2>
				</div>
			</div>
		</div>
	</div>

	<div class="bottom-bar border-top border-dark py-3">
		<div class="container">
			<div class="row">
				<div class="col-12">

					<div class="d-flex flex-column flex-md-row gap-4">
						<div class="align-self-center">
							&copy; 
							<?php echo date("Y"); ?> 
							<?php echo get_bloginfo( 'name' ); ?>
						</div>

						<nav id="privacy-navigation" class="align-content-center">
							<?php wp_nav_menu(
								array(
									'theme_location'  => 'menu-privacy',
									'container_class' => 'align-items-center',
									'menu_class'      => 'navbar-nav d-flex flex-column flex-md-row gap-3',
									'fallback_cb'     => '',
									'menu_id'         => 'privacy-menu',
								)
							); ?>
						</nav>

						<p class="ms-3 ms-md-auto mt-3 mt-md-0">
							<?php _e('Avtorji: ', 'yamaha'); ?>
							<a href="#" target="_blank">Yamaha</a>
						</p>
					</div>

				</div>
			</div>
		</div>
	</div>
</footer>


</div><!-- #page -->
<div class="d-print-none overlay" id="overlay"></div>
<?php wp_footer(); ?>
</body>
</html>
