<?php

// Add your custom functions here...

// FIX pagination of custom taxonomy pages.
function modify_videos_cat_query( $query ) {
	if (!is_admin() && $query->is_tax("videos_cat")){
		 $query->set('posts_per_page', 6);
    }
  }
add_action( 'pre_get_posts', 'modify_videos_cat_query' );

function custom_pre_get_posts( $query ) {  
    if( $query->is_main_query()) {  
        $query->set('posts_per_page', 6);
    }  
} 
add_action('pre_get_posts','custom_pre_get_posts'); 

// Google Map KEY
function my_acf_google_map_api( $api ){
	
	$api['key'] = 'AIzaSyAUpoZZnPexFOqYg5iC9itQXVcHYE_vDdQ';
	
	return $api;
	
}

add_filter('acf/fields/google_map/api', 'my_acf_google_map_api');
