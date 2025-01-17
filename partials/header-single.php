<?php 


 ?>


<div id="header-single" class="pt-9" style="background:url('<?php the_post_thumbnail_url();?>') center/cover no-repeat">
<?php if($vid_url = get_field('video')):?>
    <video autoplay muted loop id="background-video">
            <source src="<?php echo $vid_url;?>" type="video/mp4">
    </video>
    <?php endif;?>
    <div class="container">
        <div class="row header-content">
            <div class="col-12 col-lg-8 d-flex flex-column justify-content-end mb-5 text-white">
                <?php if (is_home() && !is_front_page()) : ?>
                    <h1 class="display-1">
                        <?php single_post_title(); ?>
                    </h1>
                <?php else : ?>
                    <h1 class="display-1">
                        <?php the_title(); ?>
                    </h1>
                <?php endif; ?>
                <span class="h4"><?php the_excerpt();?></span>
            </div>      
        </div>
    </div>
    
</div>


