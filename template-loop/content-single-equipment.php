<?php
/**
 * Template for displaying single posts
 *
 * @package Yamaha
 */

?>


<article id="post-<?php the_ID(); ?>">
    <div class="container mt-5 single-product">
    <p><?php custom_breadcrumb(); ?></p>

        <div class="row">		
            <div class="col-12 col-lg-6">


                <?php if($gallery = get_field('gallery')){
                    get_template_part( 'partials/partial', 'sync' );
                }
                else {
                    $thumbnail_url = get_the_post_thumbnail_url(get_the_ID(), 'medium_large'); 
                    if ($thumbnail_url) {
                        echo '<img src="' . esc_url($thumbnail_url) . '" alt="' . get_the_title() . '" class="product-thumbnail"  />';
                    }
                };?>
            </div>
            <div class="col-12 col-lg-6 main-post-content">

                <h2 class="fw-normal mb-3"> <?php the_title();?></h2>

                <?php the_content();?>

                <form method="GET" action="<?php echo esc_url(site_url('/povprasevanje/')); ?>">
                    <ul class="list-group list-group-flush">
                        <?php foreach ($colors as $color): ?>
                            <?php if ($hex = get_field('barva_hex', 'color_' . $color->term_id)): ?>
                                <li class="list-group-item p-1 d-flex gap-2 align-items-center">
                                    <input 
                                        type="radio" 
                                        name="barva" 
                                        id="color-<?php echo esc_attr($color->term_id); ?>" 
                                        value="<?php echo esc_attr($color->name); ?>" 
                                        class="form-check-input visually-hidden">
                                    <label for="color-<?php echo esc_attr($color->term_id); ?>" class="d-flex gap-2 align-items-center w-100">
                                        <div class="color-circle" style="background-color: <?php echo esc_attr($hex); ?>;"></div>
                                        <span><?php echo esc_html($color->name); ?></span>
                                    </label>
                                </li>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </ul>

                    <input type="hidden" name="vozilo_id" value="<?php echo get_the_ID(); ?>">
                    <input type="hidden" name="tip" value="<?php echo esc_attr(get_the_title()); ?>">

                    <button type="submit" class="btn btn-primary mt-3">Pošlji povpraševanje</button>
                </form>

            </div>
        </div>

        <div class="row">
            <div class="col-12">                

                <?php if($models = get_field('compatibility')): ?>

                    <h4>Združljivo z:</h4>
                    <?php foreach ($models as $index => $model): ?>
                        <a href="<?php echo get_the_permalink($model->ID); ?>"><?php echo get_the_title($model->ID); ?></a>
                        <?php if ($index !== count($models) - 1): ?> | <?php endif; ?>
                    <?php endforeach; ?>

                <?php endif;?>


            </div>
        </div>
    </div>
</article>


		




			


		




			