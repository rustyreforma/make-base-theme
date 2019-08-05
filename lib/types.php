<?php 
add_action( 'init', 'custom_post_types' );
//add_action( 'init', 'product_category' );

function custom_post_types()
{
    $types = [
        //  [Title, Plural Name, Singular Name, Supports, Icon]
            // Sample below.
            //['event', 'Events', 'Event', ['title', 'editor'],'dashicons-calendar-alt'],
        ];

    // loop all values in the array.
    foreach ($types as $type) {
        register_post_type(
            $type[0], array(
              'labels' => array('name' => __( $type[1] ), $type[2] => __( $type[0] ) ),
              'public' => true,
              'has_archive' => true,
              'supports' => $type[3],
              'menu_icon'     => $type[4],
            )
          );
    }
}

// function product_category() {
//     $taxonomies = [
//         //  [Title, Plural Name, Singular Name, Supports, Icon]
//             // Sample below.
//             //['slug', 'slug for type'],
//             ['product_cat', 'product', 'Categories'],
//             ['videos_cat', 'videos', 'Video Categories'],
//             //['category', 'post', 'Categories'],
//         ];
//     foreach ($taxonomies as $cat) {
//         register_taxonomy(
//             $cat[0],
//             $cat[1],
//             array(
//                 'label' => __( $cat[2] ),
//                 'public' => true,
//                 'rewrite' => true,
//                 'hierarchical' => true,
//             )
//         );
//     }
    
// }