<?php 

$current_term = get_queried_object(); // Get the current taxonomy term object

if ($current_term && isset($current_term->term_id) && isset($current_term->taxonomy)) {
    $dynamic_field_key = $current_term->taxonomy . '_' . $current_term->term_id;
    $tax_bg = get_field('tax_bg', $dynamic_field_key);
}

 ?>


<div id="header-single" class="pt-9" style="background:url('<?php echo $tax_bg;?>') center/cover no-repeat">
    <?php if($vid_url = get_field('video')):?>
    <video autoplay muted loop id="background-video">
            <source src="<?php echo $vid_url;?>" type="video/mp4">
    </video>
    <?php endif;?>
    <div class="container">
        <div class="row header-content">
            <div class="col-12 col-lg-8 d-flex flex-column justify-content-end mb-5 text-white">
                <h1 class="display-1">
                    <?php if (is_home() && !is_front_page() || is_archive()) : ?>
                        <?php single_term_title(); ?>                    
                    <?php else :?>
                        <?php the_title(); ?>
                    <?php endif; ?>
                </h1>
                <span class="h4">
                    <?php echo term_description();?>
                </span>
                
            </div>      
        </div>
    </div>
    
</div>








