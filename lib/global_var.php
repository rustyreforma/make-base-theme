<?php 

if( function_exists('acf_add_options_page') ) {
	acf_add_options_page('Theme Options');
}

add_filter( 'timber/context', 'add_to_context' );
function add_to_context( $context ) {
    // Theme Options
    $context['options'] = get_fields('option');

    // Flexible Content Data
    $context['flexible'] = get_field('flexible_content');

    // Main menu
    $context['menu'] = new Timber\Menu('main-navigation');

    // Flexible Content Global Vars
        // get videos posts
        $videos = array(
            'post_type'      => 'videos',
            'post_status'    => 'publish',
            'orderby'        => 'publish_date',
            'order'          => 'asc',
            'posts_per_page' => 8,
        );
        $context['latestvideos'] = Timber::get_posts( $videos );

        // get news posts for news and testimonial flexible content
        $lpost = array(
            'post_type'      => 'post',
            'post_status'    => 'publish',
            'orderby'        => 'publish_date',
            'order'          => 'asc',
            'category_name'  => 'news',
            'posts_per_page' => 3,
        );
        $context['latestnews'] = Timber::get_posts( $lpost );

         // get events posts for news and testimonial flexible content
         $epost = array(
            'post_type'      => 'post',
            'post_status'    => 'publish',
            'orderby'        => 'publish_date',
            'order'          => 'asc',
            'category_name'  => 'events',
            'posts_per_page' => 3,
        );
        $context['latestevents'] = Timber::get_posts( $epost );

        // get latest upcoming products
        $uproduct = array(
            'post_type'      => 'product',
            'post_status'    => 'publish',
            'orderby'        => 'modified',
            'order'          => 'desc',
            'tag'            => 'upcoming',
            'posts_per_page' => 6,
        );
        $context['upcomingproducts'] = Timber::get_posts( $uproduct );

        // get news posts for news and testimonial flexible content
        $testi = array(
            'post_type'      => 'testimonial',
            'post_status'    => 'publish',
            'order'          => 'rand',
            'posts_per_page' => 3,
        );
        $context['testimonials'] = Timber::get_posts( $testi );

        // get videos_cat taxonomy
        $videos_cat = get_terms([
            'taxonomy' => 'videos_cat',
            'hide_empty' => true,
        ]);

        $context['video_category'] = $videos_cat;

        // get post categories
        $article_cat = get_terms([
            'taxonomy' => 'category',
            'hide_empty' => true,
        ]);

        $context['article_category'] = $article_cat;

    return $context;
}

