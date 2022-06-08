<?php


namespace testwork538th;


if ( ! defined( 'ABSPATH' ) ) { exit; };


/**
 * Проверяет является ли переданная строка валидным URL
 * @param  string  $url исходная строка
 * @return boolean      результат проверки
 */
function is_url( $url = '' ) {
	$result = false;
	if ( is_string( $url ) ) {
		$path = parse_url( $url, PHP_URL_PATH );
		$encoded_path = array_map( 'urlencode', explode( '/', $path ) );
		$url = str_replace( $path, implode( '/', $encoded_path ), $url );
		$result = filter_var( $url, FILTER_VALIDATE_URL) ? true : false;
	}
	return $result;
}


/**
 * Удаление размера изображения из url вложения
 * @param    string   $url   url изображения, который нужно очистить
 * @return   string          очищенный url
 * */
function removing_image_size_from_url( $url = '' ) {
	return preg_replace( '~-[0-9]+x[0-9]+(?=\..{2,6})~', '', $url );
}


/**
 * Проверяет активен ли WC
 * @return   bool
 * */
function is_woo_active() {
	return in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) );
}

/**
 * Проверяет активен ли Polylang
 * @return   bool
 * */
function is_pll_active() {
	return in_array( 'polylang/polylang.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) );
}

/**
 * Возвращает и очищает текстовую настройку для использования в превью Customizer API
 * */
function customizer_get_text_theme_mod( $setting_name ) {
	$result = nl2br( trim( esc_html( get_theme_mod( $setting_name ) ) ) );
	return ( empty( $result ) ) ? false : $result;
}


