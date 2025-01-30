<?php 
/**
 * 
 *  Slick slider element
 */

 ?>


 <article style="background:url('<?php the_post_thumbnail_url('large');?>') center/cover no-repeat">
    <?php if($vid_url = get_field('video')):?>
    <video autoplay muted loop id="background-video">
            <source src="<?php echo $vid_url;?>" type="video/mp4">
    </video>
    <?php endif;?>

    <div class="container h-100 d-flex flex-column justify-content-end">
        <div class="row">
            <div class="col-12 col-lg-8">

            <div class="slide-content mb-7">
            <p class="display-3 text-white"><?php the_title();?></p>
            <span class="text-white h3 fw-light">
                <?php the_excerpt();?>        
            </span>
            <a href="<?php the_permalink();?>" class="btn btn-primary display-2">PREBERI VEČ</a>

            </div>

            </div>
        </div>
    </div>
 </article>
