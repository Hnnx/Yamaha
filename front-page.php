<?php
/**
 * Template Name: Front Page Template
 *
 * @package Yamaha
 */

get_header(); ?>

<div class="box-wrapper my-3" style="background-image: url('<?= get_static_dir().'/img/footer.webp';?>');">

    <div class="slide-box animate__animated p-3 p-md-5">
        <div class="content-animate">
            <h2 class="fw-bold animate__animated"> NOVI MODELI </h2>
            <h2 class="fw-bold text-primary animate__animated delayed"> 2025 </h2>
        </div>
    </div>
</div>

<div class="container-fluid px-md-13">
    <div class="row">
        <div class="col-12">

        <div id="featured-grid" class="mb-15 animate__animated header-models">
            <?php get_template_part( 'partials/header', 'models');?>
        </div>

            <?php while ( have_posts() ) : the_post(); ?>
                <?php the_content();?>
            <?php endwhile; ?>

        </div>
    </div>
</div><!-- #content -->

<?php get_footer();