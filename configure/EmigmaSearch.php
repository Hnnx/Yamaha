<?php

class EmigmaSearch {

    public $sq;
    public $post_type;

    public function __construct() {
    	$this->sq = (isset($_POST['q'])) ? $_POST['q'] : '';
    	$this->post_type = (isset($_POST['post_type']) && !empty($_POST['post_type'])) ? $_POST['post_type'] : 'any';
		$this->post_type = array('post', 'page');

		
	    add_action('wp_ajax_emigma_ajax_search', array($this, 'emigma_ajax_search_cb')); // wp_ajax_{action}
	    add_action('wp_ajax_nopriv_emigma_ajax_search', array($this, 'emigma_ajax_search_cb')); // wp_ajax_nopriv_{action}
    }

	//main search
	public function emigma_ajax_search_cb()  {

    	$args = array(
    		'post_type' => $this->post_type,
		    'post_status' => 'publish',
		    's' => htmlspecialchars($this->sq),
			'suppress_filters' => true,
			'posts_per_page' => -1,
		    //'orderby' => 'type',
	    );
		$results = new WP_Query($args);
		$response = array();

		if( $results->have_posts() ) :

			while( $results->have_posts() ): $results->the_post();
				$item['name'] = get_the_title();
				$item['link'] = get_the_permalink();
				$item['excerpt'] = get_the_excerpt();
				$item['cpt'] = get_post_type();

				array_push($response, $item);
			endwhile;

			wp_reset_postdata();
		endif;

		echo json_encode($response);
		die();
	}
}

new EmigmaSearch();