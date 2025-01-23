<?php
/**
 * Product meta partial template
 */

 // Get ACF fields
 $price = get_field('price'); 
 $discount_price = get_field('discount_price');
 $sku = get_field('SKU'); 

 // Check if the product has a discount price
 if ($discount_price) {
     $price_display = '<span class="original-price" style="text-decoration: line-through;">€ ' . esc_html($price) . '</span>';
     $discount_display = '<span class="discounted-price">€ ' . esc_html($discount_price) . '</span>';
 } else {
     $price_display = '<span class="regular-price">€ ' . esc_html($price) . '</span>';
     $discount_display = '';
 }
?>
<div class="product-price">
 <div class="price">
     <?php echo $discount_display; // Display discounted price if available ?>
     <?php echo $price_display; // Display the original or regular price ?>
 </div>
 
 <div class="sku">
     <strong>SKU:</strong> <?php echo esc_html($sku); ?>
 </div>
</div>
