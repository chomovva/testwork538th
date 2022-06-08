<?php


namespace testwork538th;


if ( ! defined( 'ABSPATH' ) ) { exit; };


function customizer_register_archive( $wp_customize ) {

	$wp_customize->add_section(
		TESTWORK538TH_SLUG . '_home_footer',
		[
			'title'            => __( 'Архив', TESTWORK538TH_TEXTDOMAIN ),
			'description'      => __( 'Страницы архива, категорий (шаблон index.php)', TESTWORK538TH_TEXTDOMAIN ),
			'priority'         => 10,
			'panel'            => 'page_templates',
		]
	); /**/

	$wp_customize->add_setting(
		'archivetitleprefix',
		[
			'transport'         => 'postMessage',
			'sanitize_callback' => 'sanitize_text_field',
		]
	);
	$wp_customize->add_control(
		'archivetitleprefix',
		[
			'section'           => TESTWORK538TH_SLUG . '_home_footer',
			'label'             => __( 'Префикс', TESTWORK538TH_TEXTDOMAIN ),
			'description'       => __( 'Текст перед заголовком архива', TESTWORK538TH_TEXTDOMAIN ),
			'type'              => 'text',
		]
	);
	$wp_customize->selective_refresh->add_partial( 'archivetitleprefix', [
		'render_callback'  => '__return_false',
		'fallback_refresh' => true,
	] ); /**/

}

add_action( 'customize_register', 'testwork538th\customizer_register_archive', 10, 1 );