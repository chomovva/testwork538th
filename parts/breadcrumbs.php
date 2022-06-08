<?php


namespace testwork538th;


if ( ! defined( 'ABSPATH' ) ) { exit; };


echo apply_filters( 'breadcrumbs_before', '<div class="breadcrumbs mt-3 mb-3 small" id="bredcrumbs">' );

$link_format = apply_filters( 'breadcrumbs_link_format', '<a href="%s">%s</a> » ' );

if ( function_exists( 'yoast_breadcrumb' ) ) {

	yoast_breadcrumb();

} else {
	if ( ! is_front_page() ) {

		printf( $link_format, home_url(), __( 'Главная', TESTWORK538TH_TEXTDOMAIN ) );
		
		if ( is_category() || is_single() ) {
			
			if ( function_exists( 'is_product' ) && is_product() ) {

				$shop_page_id = wc_get_page_id( 'shop' );
				printf( $link_format, get_permalink( $shop_page_id ), get_the_title( $shop_page_id ) );

			} else {
				the_category( ' ' );
			}

			if ( is_single() ) {
				echo " » ";
				the_title();
			}

		} elseif ( is_page() ) {

			echo the_title();
		
		} elseif ( function_exists( 'is_shop' ) && is_shop() ) {

			echo get_the_title( wc_get_page_id( 'shop' ) );

		}

	}
	else {

		echo __( 'Домашняя страница', TESTWORK538TH_TEXTDOMAIN );

	}
}

echo apply_filters( 'breadcrumbs_after', '</div>' );