<?php
/**
 * Template Name: Videos
 */

$context = Timber::get_context();

$timber_post = new Timber\Post();

global $paged;
if (!isset($paged) || !$paged){
    $paged = 1;
}

$videos = array(
    'post_type'      => 'videos',
    'post_status'    => 'publish',
    'orderby'        => 'publish_date',
    'order'          => 'asc',
    'posts_per_page' => 6,
    'paged' => $paged,
);
$context['videos'] = new Timber\PostQuery( $videos );

Timber::render( array( 'page-video.twig', 'page.twig' ), $context );