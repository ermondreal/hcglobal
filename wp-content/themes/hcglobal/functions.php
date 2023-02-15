<?php

function hcglobal_enqueue() {
	wp_enqueue_style('bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css');
	wp_enqueue_style('slick', 'https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.css');
	wp_enqueue_style('slick-theme', 'https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css');
	wp_enqueue_style('basic-animation', get_template_directory_uri() . '/assets/css/basic-animation.css');

	wp_enqueue_style('main', get_template_directory_uri() . '/assets/css/main.less');
	add_filter('style_loader_tag', 'my_style_loader_tag_function');

	// create version 
	$my_js_ver  = '?ver=1.4';
	wp_enqueue_script( 'less', get_template_directory_uri() . '/assets/js/less.js', array('jquery'), $my_js_ver, true );
	wp_enqueue_script( 'slick', 'https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js', array('jquery'), '', true );
	wp_enqueue_script( 'jquery-cdn', 'https://code.jquery.com/jquery-3.6.3.min.js', array('jquery'), '', true );
	wp_enqueue_script( 'main', get_template_directory_uri() . '/assets/js/main.js', array('jquery'), $my_js_ver, false );
	wp_enqueue_script( 'bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js', array('jquery'), '', false );

}
add_action('wp_enqueue_scripts', 'hcglobal_enqueue');

function my_style_loader_tag_function($tag){
	//do stuff here to find and replace the rel attribute
	return preg_replace("/='stylesheet' id='main-css'/", "='stylesheet/less' id='main-css'", $tag);
}