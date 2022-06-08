<?php


namespace testwork538th;


if ( ! defined( 'ABSPATH' ) ) { exit; };


/**
 * Регистрация "сайдбаров"
 */
function register_sidebars() {
	register_sidebar( [
		'name'             => __( 'Подвал', TESTWORK538TH_TEXTDOMAIN ),
		'id'               => 'basement',
		'description'      => __( 'Отображается в подвале сайта', TESTWORK538TH_TEXTDOMAIN ),
		'class'            => '',
		'before_widget'    => '<div id="%1$s" class="widget mb-3 %2$s">',
		'after_widget'     => '</div>',
		'before_title'     => '<h3 class="widget__title title">',
		'after_title'      => '</h3>',
	] );
}

add_action( 'widgets_init', 'testwork538th\register_sidebars' );