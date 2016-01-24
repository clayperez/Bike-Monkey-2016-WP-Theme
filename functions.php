<?php
/**
 * Bike Monkey 2016 Functions File
 * Created by: Carlos Perez
 * 
 */


/* MENUS */
function register_main_menu() {
  register_nav_menu('main-menu',__( 'Main Menu' ));
}
add_action( 'init', 'register_main_menu' );


/* RESPONSIVE VIDEO EMBEDS */
function custom_oembed_filter($html, $url, $attr, $post_ID) {
    $return = '<div class="video-container">'.$html.'</div>';
    return $return;
}
add_filter( 'embed_oembed_html', 'custom_oembed_filter', 10, 4 );

?>
