<?php
// Get the current queried taxonomy object
$current_taxonomy = get_queried_object();

// Ensure we're on a valid taxonomy page
if ($current_taxonomy && isset($current_taxonomy->term_id)) :

    // Check if the current term is a parent term (parent == 0 means no parent)
    if ($current_taxonomy->parent === 0) :
        // Fetch child terms for the current taxonomy term
        $child_terms = get_terms([
            'taxonomy' => $current_taxonomy->taxonomy, // Use current taxonomy
            'parent'   => $current_taxonomy->term_id,  // Get child terms of current term
            'orderby'  => 'name',
            'order'    => 'ASC',
        ]);

        // Check if there are child terms
        if (!empty($child_terms) && !is_wp_error($child_terms)) :
            foreach ($child_terms as $child_term) : ?>

                <h2 class="taxonomy-title"><?php echo esc_html($child_term->name); ?></h2>

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

                if ($child_posts->have_posts()) : ?>

                    <div class="layout-grid-4">
                        <?php while ($child_posts->have_posts()) : $child_posts->the_post(); ?>
                            <?php get_template_part('template-loop/content', get_post_type()); ?>
                        <?php endwhile; ?>
                    </div>

                    <div class="d-flex justify-content-center mt-6">
                        <?php understrap_pagination(); ?>
                    </div>

                <?php else : ?>
                    <p>No posts found under <?php echo esc_html($child_term->name); ?>.</p>
                <?php endif;

                wp_reset_postdata(); // Reset query after each child term
            endforeach; ?>
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
            ]);

            if ($parent_posts->have_posts()) : ?>

                <div class="layout-grid-4">
                    <?php while ($parent_posts->have_posts()) : $parent_posts->the_post(); ?>
                        <?php get_template_part('template-loop/content', get_post_type()); ?>
                    <?php endwhile; ?>
                </div>

                <div class="d-flex justify-content-center mt-6">
                    <?php understrap_pagination(); ?>
                </div>
            <?php endif; wp_reset_postdata(); 
        endif;?>
    <?php else : 
        // If we're on a child term, show posts associated with the current child taxonomy
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
        ]);

        if ($child_posts->have_posts()) : ?>

            <h2 class="mb-3"><?php echo esc_html($current_taxonomy->name); ?></h2>

            <div class="layout-grid-4">
                <?php while ($child_posts->have_posts()) : $child_posts->the_post(); ?>
                    <?php get_template_part('template-loop/content', get_post_type()); ?>
                <?php endwhile; ?>
            </div>

            <div class="d-flex justify-content-center mt-6">
                <?php understrap_pagination(); ?>
            </div>

        <?php endif;?>
    <?php endif;?>
<?php endif; ?>
