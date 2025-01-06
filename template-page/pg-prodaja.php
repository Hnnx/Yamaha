<?php
/**
 * Template Name: Prodaja
 * 
 *
 * @package Yamaha
 */

get_header();
?>

<div id="content" tabindex="-1">

	<main class="site-main" id="main">
		<div class="container-fluid">
			<div class="row">
				<div class="col-12">

					<div class="banner-select">
						<ul>
							<li>
								Post type
							</li>
						</ul>
					</div>

					<div class="motocikli">
						<?php
						$terms = get_terms(array(
							'taxonomy' => 'vehicle-type',
							'hide_empty' => false, 
						));
						?>

						<?php if (!empty($terms) && !is_wp_error($terms)) :?>
							<?php  foreach ($terms as $term) :?>
								<h2>Kategorija: <?php echo esc_html($term->name);?> </h2>
								
								<?php
								$posts = new WP_Query(array(
									'post_type' => 'vozilo',
									'tax_query' => array(
										array(
											'taxonomy' => 'vehicle-type',
											'field'    => 'term_id',
											'terms'    => $term->term_id,
										),
									),
								)); ?>
								
								<?php if ($posts->have_posts()) :?>
									<div class="layout-grid-4">
										<?php while ($posts->have_posts()) : $posts->the_post() ;?>
											<?php get_template_part( 'template-loop/content', get_post_type()); ?>
										<?php endwhile;?>
									</div>

								<?php endif; wp_reset_postdata();?>
								
							<?php endforeach;?>
						<?php endif;?>						

					</div>
					
				</div>
			</div>
		</div>
	</main>

</div>

<?php get_footer();