<?php

function hcglobal_enqueue() {
    wp_enqueue_style('bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css');
    wp_enqueue_style('style', get_template_directory_uri() . '/assets/css/style.css');

    // // create version 
    // $my_js_ver  = '?ver=1.0.4'; 
    // wp_enqueue_script( 'jquery-1', get_template_directory_uri() . '/assets/js/jquery-migrate-1.4.1.js', array('jquery'), $my_js_ver, true );
    // wp_enqueue_script( 'jquery-3', get_template_directory_uri() . '/assets/js/jquery-3.3.1.min.js', array('jquery'), $my_js_ver, true );
    // wp_enqueue_script( 'custom_js', get_template_directory_uri() . '/assets/js/script.js', array('jquery'), $my_js_ver, false );
    // wp_enqueue_script( 'bootstrapcdn', 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js', array('jquery'), '', false );

}
add_action('wp_enqueue_scripts', 'hcglobal_enqueue');