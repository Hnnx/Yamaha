<?php
/**
 * Shortcodes.
 *
 * @package Yamaha
 */


 function product_image_fn() {
    $vozilo_id = isset($_GET['vozilo_id']) ? intval($_GET['vozilo_id']) : 0;

    if ($vozilo_id && has_post_thumbnail($vozilo_id)) {
        $thumbnail_url = get_the_post_thumbnail_url($vozilo_id, 'medium');
        $link = get_the_permalink( $vozilo_id );

        return '<a href="'.$link.'"><img src="' . esc_url($thumbnail_url) . '" alt=""><a>';
    } 
}
add_shortcode('product_image', 'product_image_fn');
