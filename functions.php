<?php


if ( ! defined( 'ABSPATH' ) ) { exit; };


global $pagenow;


define( 'TESTWORK538TH_URL', get_template_directory_uri() . '/' );
define( 'TESTWORK538TH_DIR', get_template_directory() . '/' );
define( 'TESTWORK538TH_TEXTDOMAIN', 'testwork538th' );
define( 'TESTWORK538TH_SLUG', 'testwork538th' );


get_template_part( 'includes/textdomain' );
get_template_part( 'includes/theme-functions' );
get_template_part( 'includes/theme-supports' );
get_template_part( 'includes/menus' );
get_template_part( 'includes/sidebars' );


if ( testwork538th\is_woo_active() ) {
	get_template_part( 'includes/hooks-woocommerce' );
}


if ( is_admin() ) {
	isset( $_GET[ 'activated' ] ) && 'themes.php' == $pagenow && get_template_part( 'includes/theme-activate' );
} else {
	get_template_part( 'includes/hooks-public' );
	get_template_part( 'includes/enqueue-public' );
}


if ( is_customize_preview() ) {
	get_template_part( 'customizer/panels' );
	get_template_part( 'customizer/scripts' );
	get_template_part( 'customizer/archive' );
	get_template_part( 'customizer/footer' );
}