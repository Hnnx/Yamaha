<?php
/**
 * Partial template for comparison.
 */

$unique_id = isset($args['unique_id']) ? esc_attr($args['unique_id']) : 'default';

$posts = get_posts(array(
    'post_type' => 'vozilo',
    'fields' => 'ids',
    'tax_query' => array(
        array(
            'taxonomy' => 'vehicle-type',
            'field'    => 'slug',
            'terms'    => 'motocikli',
        ),
    ),
));
?>

<select name="vozilo" id="vozilo-select-<?php echo $unique_id; ?>">
    <option value="" selected disabled>Primerjaj...</option>
    <?php foreach ($posts as $vozilo): ?>
        <option value="<?php echo esc_attr($vozilo); ?>"><?php echo esc_html(get_the_title($vozilo)); ?></option>
    <?php endforeach; ?>
</select>


<div class="ajax-result" id="vozilo-data-<?php echo $unique_id; ?>">    

</div>

