<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that
 * other 'pages' on your WordPress site will use a different template.
 *
 * @package Yamaha
 */

get_header();

?>

<div class="container pt-15" role="main">
	<div class="row">
		<div class="col-12">
			
			<?php while ( have_posts() ) : the_post(); ?>
				<?php get_template_part( 'template-loop/content', 'page' ); ?>
			<?php endwhile; ?>
			
		</div>
	</div>
</div>

<?php
get_footer();