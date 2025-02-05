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
// echo $template;


?>

</div><!-- #site-content -->


<?php get_template_part( 'partials/footer', 'cta' ); ?>




<footer class="mt-13">

	<?php get_template_part( 'partials/footer', 'banner');?>

	<div class="bottom-bar bg-dark py-3">
		<div class="container">
			<div class="row">
				<div class="col-12">

				
					<div class="d-flex gap-2 justify-content-between text-white <?= wp_is_mobile() ? 'h2 fw-normal' : '';?>">
						<div class="align-self-center">
							&copy; 
							<?php echo date("Y"); ?> 
							<?php echo get_bloginfo( 'name' ); ?>
						</div>	
						
						<nav id="privacy-navigation" class="align-self-center">
							<a href="<?php echo esc_url( get_privacy_policy_url() ); ?>">
								Politika zasebnosti
							</a>
						</nav>
					
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
