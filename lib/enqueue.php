<?php

add_action( 'wp_enqueue_scripts', 'enqueue_scripts' );
function enqueue_scripts() { 
    // jQuery
    wp_register_script( 'jQuery', 'http://code.jquery.com/jquery-2.2.4.min.js', null, null, true );
    wp_enqueue_script('jQuery');

    // Compiled JS
    wp_register_script( 'main-js', THEME_ROOT . '/dist/js/main.js' , '', '', true );
    wp_enqueue_script('main-js');

    // Compiled CSS
    wp_register_style( 'main-js', THEME_ROOT . '/dist/css/main.css' , '', '', true );
    wp_enqueue_style('main-js');

    // Deregister WP Embed
    wp_deregister_script( 'wp-embed' );

    // Deregister WP styles
    wp_dequeue_style( 'wp-block-library' );
}

// remove un-used scripts and rss feeds
remove_action( 'wp_head', 'print_emoji_detection_script', 7 ); 
remove_action( 'admin_print_scripts', 'print_emoji_detection_script' ); 
remove_action( 'wp_print_styles', 'print_emoji_styles' ); 
remove_action( 'admin_print_styles', 'print_emoji_styles' );
remove_action( 'wp_head', 'feed_links_extra', 3 ); // Display the links to the extra feeds such as category feeds
remove_action( 'wp_head', 'feed_links', 2 ); // Display the links to the general feeds: Post and Comment Feed
remove_action( 'wp_head', 'rsd_link' ); // Display the link to the Really Simple Discovery service endpoint, EditURI link
remove_action( 'wp_head', 'wlwmanifest_link' ); // Display the link to the Windows Live Writer manifest file.
remove_action( 'wp_head', 'index_rel_link' ); // index link
remove_action( 'wp_head', 'parent_post_rel_link', 10, 0 ); // prev link
remove_action( 'wp_head', 'start_post_rel_link', 10, 0 ); // start link
remove_action( 'wp_head', 'adjacent_posts_rel_link', 10, 0 ); // Display relational links for the posts adjacent to the current post.
remove_action( 'wp_head', 'wp_generator' ); // Display the XHTML generator that is generated on the wp_head hook, WP version