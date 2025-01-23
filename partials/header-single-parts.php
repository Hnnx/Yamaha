<?php 


 ?>


<div id="header-single" class="pt-9" style="background:url('<?php echo $tax_bg;?>') center/cover no-repeat">
<?php if($vid_url = get_field('video')):?>
    <video autoplay muted loop id="background-video">
            <source src="<?php echo $vid_url;?>" type="video/mp4">
    </video>
    <?php endif;?>
    <div class="container">
        <div class="row header-content single">
            <div class="col-12 col-lg-8 d-flex flex-column justify-content-end mb-5 text-white">
                <h1>
                    <?php the_title(); ?>
                </h1>                
            </div>      
        </div>
    </div>
    
</div>







