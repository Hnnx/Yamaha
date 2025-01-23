<?php
/**
 * Default post rendering content according to caller of get_template_part.
 *
 * @package Yamaha
 */

?>


<a href="<?php the_permalink(); ?>" <?php post_class('loop-item card rounded-1 text-reset p-2 d-flex flex-column'); ?>>

	<div class="img-wrapper">
		<?php if (has_post_thumbnail()) : ?>
			<?php the_post_thumbnail('medium_large'); ?>
		<?php else : ?>
			<img src="<?= get_static_dir().'/img/placeholder.png';?>" alt="Placeholder">
		<?php endif; ?>
	</div>
	<h4 class="my-3"><?php the_title();?></h4>

	<?php the_excerpt();?>

	<span class="btn btn-primary">Odkrijte več</span>


</a>
