<?php

function get_static_dir() {
	return get_template_directory_uri() . '/static';
}

/**
 * Prints HTML5 <time> tag 
 * Slightly modified understap function
 */
if ( ! function_exists( 'posted_on' ) ) :	
	function posted_on($post_id) {
		$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
		if ( get_the_time( 'U' ) !== get_the_modified_time( 'U', $post_id ) ) {
			$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time>';
		}
		$time_string = sprintf( $time_string,
			esc_attr( get_the_date( 'c', $post_id ) ),
			esc_html( get_the_date('', $post_id) ),
			esc_attr( get_the_modified_date( 'c', $post_id ) ),
			esc_html( get_the_modified_date('', $post_id) )
		);
		$posted_on = sprintf(
			esc_html_x( '%s', 'post date', 'understrap' ), $time_string 
		);

		echo '<span class="posted-on fw-medium fs-5 me-2">' . $posted_on . '</span>'; // WPCS: XSS OK.
	}
endif;

// UNDERSTRAP PAGINATION
if ( ! function_exists( 'understrap_pagination' ) ) {
	/**
	 * Displays the navigation to next/previous set of posts.
	 *
	 * @param string|array $args {
	 *     (Optional) Array of arguments for generating paginated links for archives.
	 *
	 *     @type string $base               Base of the paginated url. Default empty.
	 *     @type string $format             Format for the pagination structure. Default empty.
	 *     @type int    $total              The total amount of pages. Default is the value WP_Query's
	 *                                      `max_num_pages` or 1.
	 *     @type int    $current            The current page number. Default is 'paged' query var or 1.
	 *     @type string $aria_current       The value for the aria-current attribute. Possible values are 'page',
	 *                                      'step', 'location', 'date', 'time', 'true', 'false'. Default is 'page'.
	 *     @type bool   $show_all           Whether to show all pages. Default false.
	 *     @type int    $end_size           How many numbers on either the start and the end list edges.
	 *                                      Default 1.
	 *     @type int    $mid_size           How many numbers to either side of the current pages. Default 2.
	 *     @type bool   $prev_next          Whether to include the previous and next links in the list. Default true.
	 *     @type bool   $prev_text          The previous page text. Default '&laquo;'.
	 *     @type bool   $next_text          The next page text. Default '&raquo;'.
	 *     @type string $type               Controls format of the returned value. Possible values are 'plain',
	 *                                      'array' and 'list'. Default is 'array'.
	 *     @type array  $add_args           An array of query args to add. Default false.
	 *     @type string $add_fragment       A string to append to each link. Default empty.
	 *     @type string $before_page_number A string to appear before the page number. Default empty.
	 *     @type string $after_page_number  A string to append after the page number. Default empty.
	 *     @type string $screen_reader_text Screen reader text for the nav element. Default 'Posts navigation'.
	 * }
	 * @param string       $class           (Optional) Classes to be added to the <ul> element. Default 'pagination'.
	 */
	function understrap_pagination( $args = array(), $class = 'pagination' ) {

		if ( ! isset( $args['total'] ) && $GLOBALS['wp_query']->max_num_pages <= 1 ) {
			return;
		}

		$args = wp_parse_args(
			$args,
			array(
				'mid_size'           => 1,
				'prev_next'          => true,
				'prev_text'          => __( '<div class="pag-nav left"></div>', 'understrap' ),
				'next_text'          => __( '<div class="pag-nav right"></div>', 'understrap' ),
				'type'               => 'array',
				'current'            => max( 1, get_query_var( 'paged' ) ),
				'screen_reader_text' => __( 'Posts navigation', 'understrap' ),
			)
		);

		$links = paginate_links( $args );
		if ( ! $links ) {
			return;
		}

		?>

		<nav id="pagination" class="d-flex justify-content-center mt-5" aria-labelledby="posts-nav-label">

			<ul class="<?php echo esc_attr( $class ); ?> d-flex gap-1">

				<?php
				$current_page = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
				$first_page = 1;
				?>

				<?php if ( $current_page != $first_page ) : // Go to first page ?>
					<a href="<?php echo get_pagenum_link( $first_page ); ?>" title="First page" class="page-item first-page me-1">
						<div class="pag-nav first"></div>
					</a>
				<?php endif; ?>

				<?php foreach ( $links as $key => $link ) : // All links between ?>
					<li class="page-item mx-1 fw-bold <?php echo strpos( $link, 'current' ) ? 'active' : ''; ?>">
						<?php echo str_replace( 'page-numbers', 'page-number', $link ); ?>
					</li>
				<?php endforeach; ?>

				<?php
				global $wp_query;
				$last_page = $wp_query->max_num_pages;
				?>

				<?php if ( $current_page != $last_page ) : // Go to last page ?>

					<a href="<?php echo get_pagenum_link( $last_page ); ?>" title="Last page" class="page-item last-page ms-1">
						<div class="pag-nav last"></div>
					</a>
				<?php endif; ?>

			</ul>

		</nav>

		<?php
	}
}

// Search fix
function __search_by_title_only( $search, $wp_query ) {
    global $wpdb;
    if(empty($search)) {
        return $search; // skip processing - no search term in query
    }
    $q = $wp_query->query_vars;
    $n = !empty($q['exact']) ? '' : '%';
    $search =
    $searchand = '';
    foreach ((array)$q['search_terms'] as $term) {
        $term = esc_sql($wpdb->esc_like($term));
        $search .= "{$searchand}($wpdb->posts.post_title LIKE '{$n}{$term}{$n}')";
        $searchand = ' AND ';
    }
    if (!empty($search)) {
        $search = " AND ({$search}) ";
        if (!is_user_logged_in())
            $search .= " AND ($wpdb->posts.post_password = '') ";
    }
    return $search;
}
add_filter('posts_search', '__search_by_title_only', 500, 2);


// Helper menu

if(!function_exists('helper_menu')){
	function helper_menu($title = '', $type = '' ){

		$terms = get_terms( array(
			'taxonomy' => $type,
			'hide_empty' => false,
		) );
		
		
		$grid_num = 5;
		
		?>

<li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children">
<a href="#"><?php echo $title;?></a>
<div class="sub-menu aux-sub-menu p-3 layout-grid-<?php echo $grid_num;?>">
	<?php if (!is_wp_error($terms) && !empty($terms)) :?>
			<?php foreach ($terms as $term):?>
				<?php if ($image = get_field('image', $type.'_' . $term->term_id)) :?>
					<a href="<?php echo get_term_link($term);?>" class="term-item">
						<img src="<?php echo $image['sizes']['medium'];?>" alt="<?php echo esc_attr($image['alt']);?>">                    
						<p class="text-center"><?php echo $term->name;?></p>
					</a>
				<?php else:?>
					<a href="<?php echo get_term_link($term);?>" class="term-item">
						<img src="http://ymh.razvija.se/wp-content/uploads/2024/11/placeholder.png" alt="">                                
						<p class="text-center"><?php echo $term->name;?></p>
					</a>
				<?php endif;?>
			<?php endforeach;?>
	<?php endif;?>
</div>
</li>

	<?php }

}



function get_vozilo_data_simple() {
    if (!isset($_POST['post_id'])) {
        wp_send_json_error(['message' => 'Missing post ID']);
        return;
    }

    $post_id = intval($_POST['post_id']);
    $specifikacije = get_field('specifikacije', $post_id);

    ob_start(); ?>

	<img src="<?php echo get_the_post_thumbnail_url( $post_id ,'thumbnail');?>" alt="">
	<h2><?php echo get_the_title($post_id);?></h2>

	<table>

    <tr><td><?php echo isset($specifikacije['tip_agregata']) ? esc_html($specifikacije['tip_agregata']) : ' / '; ?></td></tr>
    <tr><td><?php echo isset($specifikacije['prostornina']) ? esc_html($specifikacije['prostornina']) : ' / '; ?></td></tr>
    <tr><td><?php echo isset($specifikacije['vrtina_x_gib']) ? esc_html($specifikacije['vrtina_x_gib']) : ' / '; ?></td></tr>
    <tr><td><?php echo isset($specifikacije['kompresijsko_razmerje']) ? esc_html($specifikacije['kompresijsko_razmerje']) : ' / '; ?></td></tr>
    <tr><td><?php echo isset($specifikacije['maksimalna_moc']) ? esc_html($specifikacije['maksimalna_moc']) : ' / '; ?></td></tr>
    <tr><td><?php echo isset($specifikacije['maksimalen_navor']) ? esc_html($specifikacije['maksimalen_navor']) : ' / '; ?></td></tr>
    <tr><td><?php echo isset($specifikacije['sistem_podmazovanja']) ? esc_html($specifikacije['sistem_podmazovanja']) : ' / '; ?></td></tr>
    <tr><td><?php echo isset($specifikacije['tip_sklopke']) ? esc_html($specifikacije['tip_sklopke']) : ' / '; ?></td></tr>
    <tr><td><?php echo isset($specifikacije['sistem_vziga']) ? esc_html($specifikacije['sistem_vziga']) : ' / '; ?></td></tr>

	</table>

    <?php 
    $html = ob_get_clean();

    wp_send_json_success(['html' => $html]);
}
add_action('wp_ajax_get_vozilo_data_simple', 'get_vozilo_data_simple');
add_action('wp_ajax_nopriv_get_vozilo_data_simple', 'get_vozilo_data_simple');

