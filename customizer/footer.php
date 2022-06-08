<?php


namespace testwork538th;


if ( ! defined( 'ABSPATH' ) ) { exit; };


function customizer_register_parts_footer2( $wp_customize ) {

	$wp_customize->add_section(
		TESTWORK538TH_SLUG . '_parts_footer',
		[
			'title'            => __( 'Подвал сайта', TESTWORK538TH_TEXTDOMAIN ),
			'priority'         => 10,
			'panel'            => 'template_parts',
		]
	); /**/

	$wp_customize->add_setting(
		'footercopy',
		[
			'transport'         => 'postMessage',
			'sanitize_callback' => 'sanitize_text_field',
		]
	);
	$wp_customize->add_control(
		'footercopy',
		[
			'section'           => TESTWORK538TH_SLUG . '_parts_footer',
			'label'             => __( 'Копирайт', TESTWORK538TH_TEXTDOMAIN ),
			'type'              => 'text',
		]
	);
	$wp_customize->selective_refresh->add_partial( 'footercopy', [
		'selector'         => '#footercopy',
		'render_callback'  => function () { return customizer_get_text_theme_mod( 'footercopy' ); },
		'fallback_refresh' => true,
	] ); /**/

}

add_action( 'customize_register', 'testwork538th\customizer_register_parts_footer2', 10, 1 );