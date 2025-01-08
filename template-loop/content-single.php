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


$colors = get_the_terms( get_the_ID(), 'color' );

?>


<div class="container">

<div class="row">

Bodite prvi obveščeni, kdaj boste lahko preizkusili novi MT-07!
Prejemajte obvestila


APP

LOKACIJA

</div>

	
	<div class="row">		
		<div class="col-12 col-lg-6">
			<?php get_template_part( 'partials/partial', 'sync' ); ?>
		</div>
		<div class="col-12 col-lg-6 main-post-content">
			<?php the_content();?>

			<form method="GET" action="<?php echo esc_url(site_url('/povprasevanje/')); ?>">
				<ul class="list-group list-group-flush">
					<?php foreach ($colors as $color): ?>
						<?php if ($hex = get_field('barva_hex', 'color_' . $color->term_id)): ?>
							<li class="list-group-item p-1 d-flex gap-2 align-items-center">
								<input 
									type="radio" 
									name="barva" 
									id="color-<?php echo esc_attr($color->term_id); ?>" 
									value="<?php echo esc_attr($color->name); ?>" 
									class="form-check-input visually-hidden">
								<label for="color-<?php echo esc_attr($color->term_id); ?>" class="d-flex gap-2 align-items-center w-100">
									<div class="color-circle" style="background-color: <?php echo esc_attr($hex); ?>;"></div>
									<span><?php echo esc_html($color->name); ?></span>
								</label>
							</li>
						<?php endif; ?>
					<?php endforeach; ?>
				</ul>

				<input type="hidden" name="vozilo_id" value="<?php echo get_the_ID(); ?>">
				<input type="hidden" name="tip" value="<?php echo esc_attr(get_the_title()); ?>">

				<button type="submit" class="btn btn-primary mt-3">Pošlji povpraševanje</button>
			</form>

		</div>
	</div>
	<div class="row">
		<div class="col-12 col-lg-8">
			<?php get_template_part( 'partials/partial', 'specs');?>			
		</div>	
	</div>



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


</div>