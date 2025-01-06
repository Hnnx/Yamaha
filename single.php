<?php
/**
 * The template for displaying all single posts.
 *
 * @package Yamaha
 */

get_header();

?>

<div class="wrapper" id="single-wrapper">
	<div id="content" tabindex="-1">
		<?php while ( have_posts() ) : the_post(); ?>
			<main class="site-main" id="main">

				<?php get_template_part( 'template-loop/content-single', get_post_type() ); ?>

			</main>	
		<?php endwhile; wp_reset_postdata(); ?>
	</div>
</div>

<?php get_footer();