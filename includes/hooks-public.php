<?php


namespace testwork538th;


if ( ! defined( 'ABSPATH' ) ) { exit; };


/**
 * Устанавливает префикс для архивов
 * */
function get_custom_archive_title_prefix( $prefix ){
	return get_theme_mod( 'archivetitleprefix' );
}

add_filter( 'get_the_archive_title_prefix', 'testwork538th\get_custom_archive_title_prefix' );


/**
 * 
 * */
function print_scripts_head() {
	echo force_balance_tags( get_theme_mod( 'additionalscriptswphead' ) );
}

add_action( 'wp_head', 'testwork538th\print_scripts_head', 99, 0 );


/**
 * 
 * */
function print_scripts_footer() {
	echo force_balance_tags( get_theme_mod( 'additionalscriptswpfooter' ) );
}

add_action( 'wp_footer', 'testwork538th\print_scripts_footer', 99, 0 );


/**
 * 
 * */
function empty_custom_logo_fix( $html, $blog_id ) {
	return empty( trim( $html ) ) ? sprintf( '<a class="custom-logo-link" href="%s">%s</a>', home_url( '/', null ), get_bloginfo( 'name', 'raw' ) ) : $html;
}

add_filter( 'get_custom_logo', 'testwork538th\empty_custom_logo_fix', 10, 2 );