<h3 class="mb-3">Kategorije</h3>

<form method="get" class="taxonomy-filter">
    <div class="tax-menu list-group">
        <?php
        // Get current term and taxonomy
        $current_term = get_queried_object();
        $taxonomy = $current_term->taxonomy;

        // Fetch top-level parent terms
        $terms = get_terms( array(
            'taxonomy' => $taxonomy,
            'hide_empty' => false,
            'parent' => 0, // Only fetch top-level parent terms
        ) );

        if ( ! empty( $terms ) && ! is_wp_error( $terms ) ) {
            foreach ( $terms as $term ) {
                // Fetch children for this term
                $children = get_terms( array(
                    'taxonomy'   => $taxonomy,
                    'hide_empty' => false,
                    'parent'     => $term->term_id, // Fetch children of the current parent term
                ) );

                // Check if this term has children
                $has_children = !empty($children) ? ' has-children' : '';

                // Check if the current term is the selected term (either parent or child)
                $selected = ( $current_term->term_id === $term->term_id ) ? ' active' : '';

                // If the current term is a child, add active to its parent
                if ( !$selected && $current_term->parent === $term->term_id ) {
                    $selected = ' active'; // Add active class to the parent if child is selected
                }

                // Output the term link for top-level terms (parent terms)
                echo '<a href="' . esc_url( get_term_link( $term ) ) . '" class="list-group-item p-2 list-group-item-action' . $selected . $has_children . '">' . esc_html( $term->name );

                // If this term has children, display the sub-menu but exclude the parent term inside the submenu
                if ( $has_children ) {
                    echo '<div class="sub-menu" style="display: ' . ( $selected ? 'block' : 'none' ) . ';">'; // Keep sub-menu open for active parent
                    foreach ($children as $child) {
                        // Add active class to child if it matches the current URL
                        $child_selected = ( $current_term->term_id === $child->term_id ) ? ' active' : '';
                        echo '<div class="sub-menu-item' . $child_selected . '"><a href="' . esc_url( get_term_link( $child ) ) . '">' . esc_html( $child->name ) . '</a></div>';
                    }
                    echo '</div>';
                }

                echo '</a>';
            }
        }
        ?>
    </div>
</form>
