<?php


namespace testwork538th;


if ( ! defined( 'ABSPATH' ) ) { exit; };


/**
 * Добавляет опции темы по умолчанию при её активации
 **/
function setup_default_mods( $old_name ) {
	$theme_slug = get_option( 'stylesheet' );
	$mods = get_theme_mods();
	if ( ! is_array( $mods ) ) {
		$mods = [];
	}
	update_option( 'theme_mods_' . $theme_slug, array_merge( [
		'catalogtitle'           => _e( 'Каталог', TESTWORK538TH_TEXTDOMAIN ),
		'footercopy'             =>  sprintf( '&copy; %s', get_bloginfo( 'name', 'raw' ) ),
		'archivetitleprefix'     => '',
	], $mods ) );
}

add_action( 'after_switch_theme', 'testwork538th\setup_default_mods' );