<?php 
/**
 * 
 *  Slick + Fancybox gallery
 */

 $gallery = get_field('gallery'); 
?>


<!-- Main Image Slider -->
<?php if (!empty($gallery) && is_array($gallery)): ?>

<div class="slick-product">

    <div class="product-main-slider">
        <?php foreach ($gallery as $image): ?>
            <a class="slick-slide" data-fancybox="gallery" href="<?= esc_url($image['url']); ?>">
                <img class="rounded-2" src="<?= esc_url($image['sizes']['large']); ?>" alt="<?= esc_url($image['sizes']['large']); ?>" />
            </a>
        <?php endforeach;?>
    </div>

    <!-- Thumbnail Slider -->
    <div class="product-slider">
        <?php foreach ($gallery as $image): ?>
            <div class="slick-slide px-2"><img class="rounded-2" src="<?= esc_url($image['sizes']['medium']); ?>" alt="Thumbnail 1" /></div>
        <?php endforeach;?>
    </div>
</div>
<?php endif;?>







