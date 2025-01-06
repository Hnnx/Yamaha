<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Yamaha
 */

get_header();
?>

<main id="primary" class="site-main">

    <?php if ( have_posts() ) : ?>

    <div class="container">
        <div class="row">
            <div class="col-12">

                <?php if ( have_posts() ) : ?>

                    <div class="layout-grid-4">
                        <?php while ( have_posts() ) : the_post() ?>
                            <?php get_template_part( 'template-loop/content', get_post_type() ); ?>
                        <?php endwhile; ?>
                    </div>

                    <div class="d-flex justify-content-center mt-6">
                        <?php understrap_pagination() ?>
                    </div>

                <?php else : ?>
                    <?php get_template_part( 'template-parts/content', 'none' ); ?>
                <?php endif; ?>

            </div>
        </div>
    </div>

    <?php endif;?>


</main><!-- #main -->

<?php
get_footer();