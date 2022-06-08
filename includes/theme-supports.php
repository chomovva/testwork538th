<?php


namespace testwork538th;


if ( ! defined( 'ABSPATH' ) ) { exit; };


function theme_supports() {
	add_theme_support( 'menus' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'title-tag' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'html5', [ 'script', 'style' ] );
	add_filter( 'widget_text', 'do_shortcode' );
}

add_action( 'after_setup_theme', 'testwork538th\theme_supports' );