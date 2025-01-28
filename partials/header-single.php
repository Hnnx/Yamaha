<div id="header-single" class="pt-9" style="background:url('<?php the_post_thumbnail_url();?>') center/cover no-repeat">
    
<?php if($vid_url = get_field('video')):?>
<video autoplay muted loop id="background-video">
        <source src="<?php echo $vid_url;?>" type="video/mp4">
</video>
<?php endif;?>
    <div class="container">
        <div class="row header-content">
            <div class="col-12 col-lg-8 d-flex flex-column justify-content-end mb-5 text-white">

                <?php if(get_field('test_ride')):?>

                <h2 class="mb-auto pt-3 animate__animated animate__headShake animate__slower">
                    <a href="#test-ride" class="badge text-bg-danger text-white fw-normal">
                    TESTNA VOŽNJA NA VOLJO
                    </a>                
                </h2>
                <?php endif;?>


                <h1 class="display-1">
                    <?php if (is_home() && !is_front_page()) : ?>
                        <?php single_post_title(); ?>
                    <?php else : ?>
                        <?php the_title(); ?>
                    <?php endif; ?>
                </h1>
                <?php if ( has_excerpt() ) : ?>
                    <span class="h4"><?php the_excerpt(); ?></span>
                <?php endif; ?>

            </div>      
        </div>
    </div>
    
</div>


