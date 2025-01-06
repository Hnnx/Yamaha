<?php
/**
 * Template Name: Full Width
 *  Use this to break free from .containers
 *
 * @package Yamaha
 */

get_header();
?>

<div id="content" tabindex="-1">

	<main class="site-main" id="main">
		<div class="container-fluid">
			<div class="row">
				<div class="col-8">

					<?php while ( have_posts() ) : the_post(); ?>
						<?php the_content(); ?>
					<?php endwhile; ?>
					
				</div>
			</div>
		</div>
	</main>

</div>

<?php get_footer();