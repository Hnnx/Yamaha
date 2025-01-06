<?php
/**
 * Partial template for content in page.php
 *
 * @package Yamaha
 */
?>


<article <?php post_class( 'main-content' ); ?> id="post-<?php the_ID(); ?>">

    <div class="entry-content">
        <?php the_content(); ?>
    </div><!-- .entry-content -->

</article><!-- #post-## -->