<?php


namespace testwork538th;


if ( ! defined( 'ABSPATH' ) ) { exit; };


/**
 * Загрузка "переводов"
 */
function load_textdomain() {
	load_theme_textdomain( TESTWORK538TH_TEXTDOMAIN, TESTWORK538TH_DIR . 'languages/' );
}
add_action( 'after_setup_theme', 'testwork538th\load_textdomain' );
