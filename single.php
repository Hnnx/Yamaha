<?php
/**
 * The template for displaying all single posts.
 *
 * @package Yamaha
 */

get_header();

?>

<?php while ( have_posts() ) : the_post(); ?>
	<main class="site-main position-relative" id="main">

		<?php if( get_post_type() == 'vozilo' ): ?>
			<div class="assist-box text-white p-2 p-md-4">
				<h3 class="mb-2 mb-md-3"> Te zanima več? <br> Kontaktiraj nas </h3>
				<div class="contacts">
					<a class="text-white align-items-center d-flex flex-column flex-md-row gap-1 gap-md-0" href="tel:059014716"> 
						<i class="fa-solid fa-square-phone me-2"></i>
						<span> 05/9014716 </span>
					</a>
					<a class="text-white align-items-center d-flex flex-column flex-md-row gap-1 gap-md-0" href="mailto:info@yamaha-koper.com"> 
						<i class="fa-solid fa-square-envelope me-2"></i>
						<span> info@yamaha-koper.com </span>
					</a>
				</div>
			</div>
		<?php endif; ?>

		<?php get_template_part( 'template-loop/content-single', get_post_type() ); ?>

	</main>	
<?php endwhile; wp_reset_postdata(); ?>

<?php get_footer();