<?php
/**
 * Shortcodes.
 *
 * @package Yamaha
 */


function product_image_fn() {
    ob_start();
    
    $vozilo_id = isset($_GET['vozilo_id']) ? intval($_GET['vozilo_id']) : 0;

    if ($vozilo_id && has_post_thumbnail($vozilo_id)) {
        $thumbnail_url = get_the_post_thumbnail_url($vozilo_id, 'medium');
        $link = get_the_permalink($vozilo_id);

        echo '<a href="' . $link . '"><img src="' . $thumbnail_url . '" alt="Product image" class="img-fluid my-3"></a>';
    }

    return ob_get_clean();
}
add_shortcode('product_image', 'product_image_fn');
