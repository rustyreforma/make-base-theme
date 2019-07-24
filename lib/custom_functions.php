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
