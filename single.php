<?php
/**
 * The Template for displaying all single posts
 *
 * Methods for TimberHelper can be found in the /lib sub-directory
 *
 * @package  WordPress
 * @subpackage  Timber
 * @since    Timber 0.1
 */

$context = Timber::get_context();
$timber_post = Timber::query_post();
$context['post'] = $timber_post;

$firstpost = array(
    'post_type' => 'post',
    'order' => 'ASC',
    'posts_per_page' => 1
);
$context['first_post'] = Timber::get_posts( $firstpost );

$latestpost = array(
    'post_type' => 'post',
    'order' => 'DESC',
    'posts_per_page' => 1
);
$context['latest_post'] = Timber::get_posts( $latestpost );

$context['flexible_post'] = get_field('content'); 

$cat = get_the_category();
$cat_ids = array();
foreach ($cat as $cat) {
	$cat_ids[] = $cat->term_id;
}

$relatedposts = array(
    'post_type'        => 'post',
    'order'            => 'rand',
	'posts_per_page'   => 3,
	'category__in'     => $cat_ids,
	'post__not_in'     => array($post->ID)
);
$context['relatedposts'] = Timber::get_posts( $relatedposts );


if ( post_password_required( $timber_post->ID ) ) {
	Timber::render( 'single-password.twig', $context );
} else {
	Timber::render( array( 'single-' . $timber_post->ID . '.twig', 'single-' . $timber_post->post_type . '.twig', 'single.twig' ), $context );
}
