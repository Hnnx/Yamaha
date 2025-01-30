<?php 
/**
 * 
 *  Get pinned posts
 */


 $vozila = get_field('vozilo', 'options');

 ?>


<div class="layout-grid-4">

    <?php foreach ($vozila as $id) :?>
        <a class="vehicle text-reset" href="<?php echo get_the_permalink($id);?>">
            <span class="featured-product text-white shadow rounded-1 d-block" style="background:url('<?= get_the_post_thumbnail_url( $id , 'large' );?>') center/contain no-repeat">

                <div class="featured-content p-2">

                <?php echo wp_trim_words(get_the_excerpt($id), 15, '...'); ?>

                    <span class="btn btn-primary d-block fit-content mt-5">
                        Preveri ponudbo
                    </span>
                </div>

                <h3 class="d-flex h-100 align-items-end justify-content-center text-dark pb-2"><?php echo get_the_title($id);?></h3>
                
            </span>
        </a>


    <?php endforeach;?>

</div>