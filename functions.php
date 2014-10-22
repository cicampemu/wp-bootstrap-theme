<?php
// Register Custom Navigation Walker
require_once('wp_bootstrap_navwalker.php');

//Add custom conditional CSS classes to the <body> tag
add_filter('body_class', 'mbe_body_class');
add_action('wp_head', 'mbe_wp_head');

//register new menu
register_nav_menus( array(
    'primary' => __( 'Primary Menu', 'Butler Theme' ),
) );


add_theme_support( 'post-thumbnails' );

add_image_size( 'sidebar-thumb', 120, 120, true ); // Hard Crop Mode

add_image_size( 'homepage-thumb', 220, 180 ); // Soft Crop Mode

add_image_size( 'singlepost-thumb', 590, 9999 ); // Unlimited Height Mode


// adds body-logged-in class to pages
function mbe_wp_head(){
    echo '<style>'.PHP_EOL;
    echo 'body{ padding-top: 70px !important; }'.PHP_EOL;
    // Using custom CSS class name.
    echo 'body.body-logged-in .navbar-fixed-top{ top: 28px !important; }'.PHP_EOL;
    // Using WordPress default CSS class name.
    echo 'body.logged-in .navbar-fixed-top{ top: 28px !important; }'.PHP_EOL;
    echo '</style>'.PHP_EOL;
}

function mbe_body_class($classes){
    if(is_user_logged_in()){
        $classes[] = 'body-logged-in';
    } else{
        $classes[] = 'body-logged-out';
    }
    return $classes;
}
