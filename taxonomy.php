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
        <div class="container-fluid padded my-5">
            <div class="row">
                <div class="col-12 col-lg-2">
                    <?php get_template_part( 'partials/partial', 'categories' ); ?>       
                </div>
                <div class="col-12 col-lg-10">

                    <?php taxonomy_breadcrumb(); ?>

                    <?php get_template_part( 'partials/partial', 'tax');?>

                </div>
            </div>
        </div>
</main><!-- #main -->

<?php
get_footer();