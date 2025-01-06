<?php 
/**
 * 
 *  Get pinned posts
 */


 $vozila = get_field('vozilo', 'options');

 $myid = 235;


 ?>


<!-- geat, not perfect -->
<?php if(false):?>
    <div class="layout-grid-4">

        <?php for ($i=0; $i < 5; $i++) :?>

            <a href="" class="featured-vehicle shadow d-flex flex-column justify-content-end text-white" style="background:url('<?= get_the_post_thumbnail_url( $myid , 'large' );?>') center/cover no-repeat">
                <div class="slider-content p-3">
                    <h2><?= get_the_title($myid);?></h2>

                    <div class="extra-info">
                        Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ab voluptatibus, expedita corrupti quo doloribus ipsa nam, provident recusandae libero veritatis fuga iste officiis facere alias est error ipsum saepe maxime.

                        <span class="btn btn-primary d-block fit-content">
                            Preveri ponudbo
                        </span>
                    </div>


                </div>
            </a>

        <?php endfor;?>

    </div>

<?php endif;?>


<div class="layout-grid-3">

    <?php for ($i=0; $i < 5; $i++) :?>

        <a class="vehicle text-reset" href="<?php echo get_the_permalink(235);?>">
            <h1 class="display-4 text-center"><?php echo get_the_title(235);?></h1>
            <span class="featured-product text-white shadow rounded-1 d-block" style="background:url('<?= get_the_post_thumbnail_url( $myid , 'large' );?>') center/cover no-repeat">

                <div class="featured-content p-2 p-md-5">
                    Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ab voluptatibus, expedita corrupti quo doloribus ipsa nam, provident recusandae libero veritatis fuga iste officiis facere alias est error ipsum saepe maxime.

                    <span class="btn btn-primary d-block fit-content mt-5">
                        Preveri ponudbo
                    </span>
                </div>
            </span>

        </a>


    <?php endfor;?>

</div>