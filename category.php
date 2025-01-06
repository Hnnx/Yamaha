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

                    <?php
                    echo '<div class="layout-grid-2">';

                    while ( have_posts() ) :
                        the_post();
                        /*
                        * Include the Post-Type-specific template for the content.
                        * If you want to override this in a child theme, then include a file
                        * called content-___.php (where ___ is the Post Type name) and that will be used instead.
                        */
                        get_template_part( 'template-loop/content', get_post_type() );
                    endwhile;

                    echo '</div>';

                    echo '<div class="d-flex justify-content-center mt-6">';
                        understrap_pagination( ['total' => $query->max_num_pages] );
                    echo '</div>';

            else:

                get_template_part( 'template-parts/content', 'none' );

            endif;
            ?>



                </div>
            </div>
        </div>


</main><!-- #main -->

<?php
get_footer();