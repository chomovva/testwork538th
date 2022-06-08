<?php


namespace testwork538th;


if ( ! defined( 'ABSPATH' ) ) { exit; };


/**
 * Подключение скриптов
 */
function scripts() {
	wp_enqueue_script( 'testwork538th-public', get_theme_file_uri( 'scripts/public.js' ), [ 'jquery' ], filemtime( get_theme_file_path( 'scripts/public.js' ) ), true );
	wp_enqueue_script( 'fancybox', get_theme_file_uri( 'scripts/fancybox.js' ), [ 'jquery' ], '3.3.5', true );
	file_exists( $init_gallery_script_path = get_theme_file_path( 'scripts/init/fancybox-gallery.js' ) ) && wp_add_inline_script( 'fancybox', file_get_contents( $init_gallery_script_path ), 'after' );
	wp_enqueue_script( 'superembed', get_theme_file_uri( 'scripts/superembed.js' ), [ 'jquery' ], '3.1', true );
}

add_action( 'wp_enqueue_scripts', 'testwork538th\scripts' );


/**
 * Добавляет предварительную загрузку шрифтов
 * */
function add_preload_resource() {
	foreach ( apply_filters( 'preload_resource_part', [
		// path => font
	] ) as $file_path => $type ) {
		$file_uri = get_theme_file_uri( $file_path );
		if ( $file_uri ) {
			echo '<link rel="preload" href="' . $file_uri . '" as="' . $type . '" crossorigin="anonymous">';
		}
	}
}

add_action( 'head_start', 'testwork538th\add_preload_resource' );


/**
 * Отключение стилей при выводе их в шапке, чтобы подкючить в подвале сайта
 */
function dequeue_style() {
	wp_dequeue_style( 'contact-form-7' );
	wp_dequeue_style( 'wp-block-library' );
	wp_dequeue_style( 'wpdiscuz-font-awesome' );
	wp_dequeue_style( 'wpdiscuz-frontend-css' );
	wp_dequeue_style( 'wpdiscuz-user-content-css' );
	wp_dequeue_style( 'exactmetrics-popular-posts-style-css' );
	wp_dequeue_style( 'tablepress-default-css' );
	wp_dequeue_style( 'site-reviews-css' );
	wp_dequeue_style( 'dashicons-css' );
	wp_dequeue_style( 'exactmetrics-vue-frontend-style-css' );
}

add_action( 'wp_print_styles', 'testwork538th\dequeue_style' );


/**
 * Подключение стилей
 */
function print_styles() {
	wp_enqueue_style( 'testwork538th-fonts', get_theme_file_uri( 'styles/fonts.css' ), [], filemtime( get_theme_file_path( 'styles/fonts.css' ) ), 'all' );
	wp_enqueue_style( 'testwork538th-public', get_theme_file_uri( 'styles/public.css' ), [], filemtime( get_theme_file_path( 'styles/public.css' ) ), 'all' );
	if ( is_woo_active() ) {
		wp_enqueue_style( 'testwork538th-wc', get_theme_file_uri( 'styles/wc.css' ), [], filemtime( get_theme_file_path( 'styles/wc.css' ) ), 'all' );
	}
	wp_enqueue_style( 'fancybox', get_theme_file_uri( 'styles/fancybox.css' ), [], '3.3.5', 'all' );
	wp_enqueue_style( 'contact-form-7' );
	wp_enqueue_style( 'wp-block-library' );
	wp_enqueue_style( 'wpdiscuz-font-awesome' );
	wp_enqueue_style( 'wpdiscuz-frontend-css' );
	wp_enqueue_style( 'wpdiscuz-user-content-css' );
	wp_enqueue_style( 'exactmetrics-popular-posts-style-css' );
	wp_enqueue_style( 'tablepress-default-css' );
	wp_enqueue_style( 'dashicons-css' );
	wp_enqueue_style( 'exactmetrics-vue-frontend-style-css' );
}
add_action( 'get_footer', 'testwork538th\print_styles', 10, 0 );


/**
 * Подключение стилей инлайн для более быстрой отрисовки страницы
 * */
function ctitical_styles() {
	$critical_file_path = get_theme_file_path( 'styles/critical.css' );
	if ( file_exists( $critical_file_path ) ) {
		echo '<style type="text/css">' . file_get_contents( $critical_file_path ) . '</style>';
	}
}

add_action( 'wp_head', 'testwork538th\ctitical_styles', 10, 0 );


/**
 * Удаляет аттрибуты для style и script, которые были добавленны в обход wp
 * */
function remove_type_attr_start() {
	ob_start();
}

function remove_type_attr_end() {
    echo preg_replace( "/type=['\"]text\/(javascript|css)['\"]/", '', ob_get_clean() );
}

add_action( 'get_header', 'testwork538th\remove_type_attr_start', 5, 0 );
add_action( 'wp_footer', 'testwork538th\remove_type_attr_end', 99, 0 );