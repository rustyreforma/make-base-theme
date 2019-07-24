<?php
/**
 * Template Name: Articles
 */

$context = Timber::get_context();

$category = get_category( get_query_var( 'cat' ) );
$cat_id = $category->slug;

global $paged;
if (!isset($paged) || !$paged){
    $page = (get_query_var('paged')) ? get_query_var('paged') : 1;
}

$articles = array(
    'post_type'      => 'post',
    'post_status'    => 'publish',
    'orderby'        => 'publish_date',
    'order'          => 'asc',
	'posts_per_page' => 6,
	'category_name'  => $category->slug,
    'paged'          => $paged,
);

$niwi_articles_id = 263;

$context['niwi_article_flexible'] = get_field('flexible_content', $niwi_articles_id);
$context['articles'] = new Timber\PostQuery( $articles );

Timber::render( array( 'page-article-category.twig', 'page.twig' ), $context );