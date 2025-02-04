<?php 
/**
 * 
 *  Get pinned posts
 */

 $sticky_posts_ids = get_option('sticky_posts');
 if (!empty($sticky_posts_ids)) {
     $sticky_posts = get_posts(array(
         'post__in'       => $sticky_posts_ids, 
         'posts_per_page' => 3, 
         'orderby'        => 'date', 
         'order'          => 'DESC', 
     ));
 } else {
    $sticky_posts = get_posts(array(
        'posts_per_page' => 1, 
        'orderby'        => 'date', 
        'order'          => 'DESC', 
    ));
 }

 ?>


<div id="hero-wrapper" class="d-flex">

    <div class="slick w-100 ">
        <div class="slick-carousel">
            <?php foreach ($sticky_posts as $post) : setup_postdata($post); ?>
                <?php get_template_part( 'partials/header', 'slick');?>
            <?php endforeach; wp_reset_postdata(); ?>
        </div>
    </div>


    <div class="content d-flex flex-column gap-4 gap-md-8">

        <div class="feature-box p-5 animate__animated animate__slideInRight animate__delay-1s animate-first">
            <a href="<?= site_url( '/prodaja/motocikli/');?>">
                <div class="img-wrapper">
                    <img src="<?= get_static_dir().'/img/yam_r1.png';?>" alt="">
                </div>
                <p class="display-4 fw-bold text-center">Prodaja</p>
            </a>
        </div>

        <div class="feature-box p-5 animate__animated animate__slideInRight animate__delay-1s">
            <a href="<?php echo site_url().'/servis/';?>">
                <div class="img-wrapper">
                        <img src="<?= get_static_dir().'/img/yam_r1.png';?>" alt="">
                </div>
                <p class="display-4 fw-bold text-center">Servis</p>
            </a>

        </div>

    </div>

    
</div>