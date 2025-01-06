<?php
/**
 * Default post rendering content according to caller of get_template_part.
 *
 * @package Yamaha
 */

?>


<a href="<?php the_permalink();?> "<?php post_class( 'loop-item card rounded-1 text-reset p-2 d-flex flex-column') ?>>

	<div class="img-wrapper">
		<?php the_post_thumbnail('medium_large');?>
	</div>
	<h2 class="text-center"><?php the_title();?></h2>

	<?php the_excerpt();?>

</a>