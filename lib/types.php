<?php 

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
add_action('init', 'custom_post_types');