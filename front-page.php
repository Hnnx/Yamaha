<?php
/**
 * Template Name: Front Page Template
 *
 * @package Yamaha
 */

get_header(); ?>

<div class="header-banner">
    <?php #get_template_part( 'partials/header', 'banner');?>
</div>

<div class="slide-box animate__animated p-5 my-3">
    <div class="content-animate">
        <h2 class="fw-bold animate__animated"> NOVI MODELI </h2>
        <h2 class="fw-bold text-primary animate__animated delayed"> 2025 </h2>
    </div>
</div>

<div class="container-fluid">
    <div class="row">
        <div class="col-12">

        <div id="featured-grid" class="animate__animated header-models">
            <?php get_template_part( 'partials/header', 'models');?>
        </div>

            <?php while ( have_posts() ) : the_post(); ?>
                <?php the_content();?>
            <?php endwhile; ?>

            <?php

                $args = array(
                    'post_type' => 'vozilo',
                    'tax_query' => array(
                        array(
                            'taxonomy' => 'vehicle-type', // Assuming 'vehicle-type' is a custom taxonomy
                            'field' => 'slug',
                            'terms' => 'skuterji', // The slug of the term
                        ),
                    ),
                );

                $query = new WP_Query($args);


                if ($query->have_posts()) :?>

                <div class="layout-grid-4">
                    <?php while ($query->have_posts()) : $query->the_post();?>

  
                    <?php endwhile; wp_reset_postdata();?>
                </div>
                <?php endif; ?>
            

            <?php #get_template_part( 'partials/sample', 'content');?>

        </div>
    </div>
</div><!-- #content -->

<?php get_footer();