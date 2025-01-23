<h3 class="mb-3">Kategorije</h3>

<form method="get" class="taxonomy-filter">
    <div class="list-group">        
        <?php
        $terms = get_terms( array(
            'taxonomy' => get_queried_object()->taxonomy,
            'hide_empty' => false, // Show all terms even if they have no posts
        ) );

        if ( ! empty( $terms ) && ! is_wp_error( $terms ) ) {
            foreach ( $terms as $term ) {
                $selected = ( get_queried_object_id() === $term->term_id ) ? ' active' : '';
                echo '<a href="' . esc_url( get_term_link( $term ) ) . '" class="list-group-item p-2 list-group-item-action' . $selected . '">' . esc_html( $term->name ) . '</a>';
            }
        }
        ?>
    </div>
</form>
