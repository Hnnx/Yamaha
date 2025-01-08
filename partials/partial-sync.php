<?php 
/**
 * 
 *  Swiper.js + Fancybox gallery
 */

 $gallery = get_field('gallery'); 


?>



<div class="swiper main">

    <div class="swiper-wrapper">

    <?php foreach ($gallery as $image): ?>

        <div class="swiper-slide">
            <a href="<?= esc_url($image['url']); ?>" data-fancybox="gallery-moto" data-caption="Single image">
                <img class="rounded-2" src="<?= esc_url($image['sizes']['large']); ?>" />
            </a>
        </div>

    <?php endforeach; ?>

    </div>

    <div class="swiper-button-style swiper-button-next"></div>
    <div class="swiper-button-style swiper-button-prev"></div>
</div>

<div thumbsSlider="" class="swiper thumb">
    <div class="swiper-wrapper">

        <?php foreach ($gallery as $image): ?>           

            <div class="swiper-slide">
                <img class="rounded-2" class="rounded-2" src="<?= esc_url($image['sizes']['medium']); ?>" />
            </div>

        <?php endforeach; ?>

    </div>

    <div class="swiper-button-style swiper-button-next"></div>
    <div class="swiper-button-style swiper-button-prev"></div>

</div>





