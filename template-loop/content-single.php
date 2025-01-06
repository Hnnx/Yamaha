<?php
/**
 * Template for displaying single posts
 *
 * @package Yamaha
 */



global $post;

$gallery = get_field('gallery');

$specs = get_field('specifikacije');
$features = get_field('features');




?>


<div class="container">
	<div class="row">
		<div class="col-12">
			<div class="slick-features">
				<?php foreach ($features as $feature): ?>
					<div class="slide">
						<img class="rounded-2 w-100" height="350px" src="<?= esc_url($feature['slika']['sizes']['large']); ?>" />	
						<h2 class="my-3"><?php echo $feature['title'];?> </h2>						
						<p><?php echo $feature['description'];?> </p>						
					</div>
				<?php endforeach; ?>
			</div>
		</div>
	</div>
	<div class="row">		
		<div class="col-12 col-lg-12">
			<?php get_template_part( 'partials/partial', 'sync' ); ?>
		</div>
	</div>
	<div class="row">
		<div class="col-12 main-post-content">
			<?php the_content() ?>
		</div>
	</div>
</div>