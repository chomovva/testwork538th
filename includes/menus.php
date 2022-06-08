<?php


namespace testwork538th;


if ( ! defined( 'ABSPATH' ) ) { exit; };


/**
 * Регистрация меню
 */
function register_theme_nav_menus() {
	register_nav_menus( [
		'main'        => __( 'Главное меню', TESTWORK538TH_TEXTDOMAIN ),
	] );
}

add_action( 'after_setup_theme', 'testwork538th\register_theme_nav_menus' );