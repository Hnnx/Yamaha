<?php
// Get the current queried taxonomy object
$current_taxonomy = get_queried_object();?>

<!-- Check if the current term is a parent term (parent == 0 means no parent) -->
<?php if ($current_taxonomy->parent === 0) :
    // Fetch child terms for the current taxonomy term
    $child_terms = get_terms([
        'taxonomy' => $current_taxonomy->taxonomy, // Use current taxonomy
        'parent'   => $current_taxonomy->term_id,  // Get child terms of current term
        'orderby'  => 'name',
        'order'    => 'ASC',
    ]);
    ?>

    <?php if (!empty($child_terms) && !is_wp_error($child_terms)):?>
        <?php foreach ($child_terms as $child_term) : ?>

            <div class="tax-heading">
                <h1 class="taxonomy-title display-2 mt-6 mb-2"><?php echo esc_html($child_term->name); ?></h1>
                <hr class="mt-0">
            </div>

            <?php
            // Query posts associated with the child term
            $child_posts = new WP_Query([
                'post_type'      => get_post_type(), // Change to your post type if needed
                'posts_per_page' => -1,    // Get all posts
                'tax_query'      => [
                    [
                        'taxonomy' => $current_taxonomy->taxonomy, // Use current taxonomy
                        'field'    => 'term_id',
                        'terms'    => $child_term->term_id,
                    ],
                ],
            ]);
            ?>

            <?php if ($child_posts->have_posts()) : ?>

                <div class="layout-grid-4 mobile-grid-2">
                    <?php while ($child_posts->have_posts()) : $child_posts->the_post(); ?>
                        <?php get_template_part('template-loop/content', get_post_type()); ?>
                    <?php endwhile; ?>
                </div>
            <?php endif; wp_reset_postdata(); ?>

        <?php endforeach; ?>
    <?php else : ?>
        <?php
        // Show posts for the current taxonomy term
        $parent_posts = new WP_Query([
            'post_type'      => get_post_type(), // Change to your post type if needed
            'posts_per_page' => -1,    // Get all posts
            'tax_query'      => [
                [
                    'taxonomy' => $current_taxonomy->taxonomy, // Use current taxonomy
                    'field'    => 'term_id',
                    'terms'    => $current_taxonomy->term_id, // Use the current term ID
                ],
            ],
        ]); ?>

        <?php if ($parent_posts->have_posts()) : ?>

            <div class="layout-grid-4 mobile-grid-2">
                <?php while ($parent_posts->have_posts()) : $parent_posts->the_post(); ?>
                    <?php get_template_part('template-loop/content', get_post_type()); ?>
                <?php endwhile; ?>
            </div>
        <?php endif; wp_reset_postdata(); ?>
    <?php endif;?>
<?php else : ?>

    <?php
    $child_posts = new WP_Query([
        'post_type'      => get_post_type(), // Change to your post type if needed
        'posts_per_page' => -1,    // Get all posts
        'tax_query'      => [
            [
                'taxonomy' => $current_taxonomy->taxonomy, // Use current taxonomy
                'field'    => 'term_id',
                'terms'    => $current_taxonomy->term_id,  // Use the current child term ID
            ],
        ],
    ]);?>

    <?php if ($child_posts->have_posts()) : ?>

        <div class="tax-heading">
            <h1 class="taxonomy-title display-2 mt-6 mb-2"><?php echo esc_html($current_taxonomy->name); ?></h1>
            <hr class="mt-0">
        </div>

        <div class="layout-grid-4 mobile-grid-2">
            <?php while ($child_posts->have_posts()) : $child_posts->the_post(); ?>
                <?php get_template_part('template-loop/content', get_post_type()); ?>
            <?php endwhile; ?>
        </div>

    <?php endif;?>
    
<?php endif;?>

    
