<?php
/**
 * Template for displaying single posts
 *
 * @package Yamaha
 */



global $post;

$gallery = get_field('gallery');

$specs = get_field('specifikacije');

#lvar_dump($specs);

?>

<div class="container">
	<div class="row">
		<div class="col-12 col-lg-6">
			<?php the_excerpt();?>
		</div>
		<div class="col-12 col-lg-6">
			<?php get_template_part( 'partials/partial', 'sync' ); ?>
		</div>
	</div>
	<div class="row">
		<div class="col-12 main-post-content">
			<?php the_content() ?>
		</div>
	</div>
</div>