<?php 
/**
 * 
 *  Swiper.js + Fancybox gallery
 */
$repeater_field = get_field_object('specifikacije'); // Replace 'specifikacije' with your repeater field name

$labels = array_values($repeater_field['sub_fields']); 
$values = array_values(get_field('specifikacije')); 

?>

<?php if ($labels && $values && count($labels) === count($values)):?>
    <div class="table-container">
        <table class="table table-hover">
            <tbody>
                <?php for ($i = 0; $i < count($labels); $i++):?>
                    <tr>
                        <th><?php echo esc_html($labels[$i]['label']);?></th> 
                        <td><?php echo esc_html($values[$i]);?></td> 
                    </tr>
                <?php endfor;?>
            </tbody>
        </table>       

    </div>

<?php endif; ?>


<div class="my-3 text-center">
    <button class="show-more-btn">Prikaži več</button>	
</div>





