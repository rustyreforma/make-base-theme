<?php
/**
 * Template Name: Videos
 */

$context = Timber::get_context();

$timber_post = new Timber\Post();

$term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) ); 

global $paged;
if (!isset($paged) || !$paged){
    $page = (get_query_var('paged')) ? get_query_var('paged') : 1;
}

$videos = array(
    'post_type'      => 'videos',
    'post_status'    => 'publish',
    'orderby'        => 'publish_date',
    'order'          => 'asc',
    'paged' => $paged,
    'posts_per_page' => 6,
    'tax_query' => array(
        array(
            'taxonomy' => 'videos_cat',
            'field'    => 'slug',
            'terms'    => $term->slug,
        ),
    ),
);

$niwi_videos_id = 251;


$context['niwi_category_flexible'] = get_field('flexible_content', $niwi_videos_id);
$context['videos'] = new Timber\PostQuery($videos);

	
Timber::render( array( 'video_taxonomy.twig', 'page.twig' ), $context );