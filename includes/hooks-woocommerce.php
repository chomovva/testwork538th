<?php


namespace testwork538th;


if ( ! defined( 'ABSPATH' ) ) { exit; };


/**
 * Подменяет ссылку на "магазин"
 */

add_filter( 'woocommerce_get_' . 'shop' . '_page_permalink', 'home_url' );


/**
 * Добавляет обёртку для основного контента
 * */
function add_theme_container_wrap_start() {
	include get_theme_file_path( 'views/container-before.php' );
}

add_action( 'woocommerce_before_main_content', 'testwork538th\add_theme_container_wrap_start', 10, 0 );


/**
 * Закрывает обёртку для основного контента
 * */
function add_theme_container_wrap_end() {
	include get_theme_file_path( 'views/container-after.php' );
}

add_action( 'woocommerce_after_main_content', 'testwork538th\add_theme_container_wrap_end', 10, 0 );


/**
 * 
 * */
function add_part_shop_controls() {
	get_template_part( 'parts/shop-controls' );
}

// add_action( 'woocommerce_before_shop_loop', 'testwork538th\add_part_shop_controls', 20 );


/**
 * 
 * */
function change_quantity_input_classes( $classes, $product ) {
	return [ 'form-control', 'control-lg', 'mt-2' ];
}

// add_filter( 'woocommerce_quantity_input_classes', 'testwork538th\change_quantity_input_classes', 20, 2 );


function qwerqwer( $classes, $endpoint ) {
	if ( in_array( 'is-active', $classes ) ) {
		array_push( $classes, 'font-weight-bold' );
		array_push( $classes, 'text-primary' );
		array_push( $classes, 'lead' );
	}
	return $classes;
}

// add_filter( 'woocommerce_account_menu_item_classes', 'testwork538th\qwerqwer', 10, 2 );


function customizer_deregister_woocommerce_settings( $wp_customize ) {
	$wp_customize->remove_setting( 'woocommerce_catalog_columns' );
	$wp_customize->remove_setting( 'woocommerce_catalog_rows' );
	$wp_customize->remove_control( 'woocommerce_catalog_columns' );
	$wp_customize->remove_control( 'woocommerce_catalog_rows' );
}

// add_action( 'customize_register', 'testwork538th\customizer_deregister_woocommerce_settings', 20, 1 );