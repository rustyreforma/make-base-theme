<?php
/**
 * Template Name: Articles
 */

$context = Timber::get_context();

$timber_post = new Timber\Post();

global $paged;
if (!isset($paged) || !$paged){
    $paged = 1;
}

$articles = array(
    'post_type'      => 'post',
    'post_status'    => 'publish',
    'orderby'        => 'publish_date',
    'order'          => 'asc',
    'posts_per_page' => 6,
    'paged' => $paged,
);
$context['articles'] = new Timber\PostQuery( $articles );

Timber::render( array( 'page-article.twig', 'page.twig' ), $context );