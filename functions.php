<?php

function enqueue_bootstrap_and_jquery() {
    // Enqueue jQuery
    //wp_enqueue_script('jquery', 'https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js', array(), '3.6.0', true);

    // Enqueue Bootstrap JavaScript (requires jQuery)
    //wp_enqueue_script('bootstrap-js', 'https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js', array('jquery'), '4.0.0', true);

    // Enqueue Bootstrap CSS
    //wp_enqueue_style('bootstrap-css', 'https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css', array(), '4.0.0');
}
add_action('wp_enqueue_scripts', 'enqueue_bootstrap_and_jquery');


function enqueue_font_poppins() {
    // Enqueue Poppins Google Font
    wp_enqueue_style( 'poppins-font', 'https://fonts.googleapis.com/css?family=Poppins:200;300;400,500,600,700&display=swap', array(), null );
}
add_action( 'wp_enqueue_scripts', 'enqueue_font_poppins' );


function enqueue_font_jost() {
    wp_enqueue_style( 'jost-font', 'https://fonts.googleapis.com/css2?family=Jost:wght@200;300;400;500;600;700&display=swap' );
}
add_action( 'wp_enqueue_scripts', 'enqueue_font_jost' );


function enqueue_font_awesome() {
    // Enqueue Font-Awesome
    wp_enqueue_style( 'font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css', array(), '5.15.3' );
}
add_action( 'wp_enqueue_scripts', 'enqueue_font_awesome' );


function enqueue_smooth_scroll() {
    wp_enqueue_script('smooth-scroll', get_template_directory_uri() . '/assets/js/smooth-scroll.js', array('jquery'), '1.0', true);
}
add_action('wp_enqueue_scripts', 'enqueue_smooth_scroll');


function enqueue_mobile_menu() {
    wp_enqueue_script( 'mobile-menu', get_template_directory_uri() . '/assets/js/mobile-menu.js', array( 'jquery' ), '1.0', true );
}
add_action( 'wp_enqueue_scripts', 'enqueue_mobile_menu' );


?>

