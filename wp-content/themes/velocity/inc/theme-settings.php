<?php

/**
 * Check and setup theme's default settings
 *
 * @package justg
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;

if (!function_exists('justg_setup_theme_default_settings')) {
	/**
	 * Store default theme settings in database.
	 */
	function justg_setup_theme_default_settings()
	{
		$defaults = justg_get_theme_default_settings();
		$settings = get_theme_mods();
		foreach ($defaults as $setting_id => $default_value) {
			// Check if setting is set, if not set it to its default value.
			if (!isset($settings[$setting_id])) {
				set_theme_mod($setting_id, $default_value);
			}
		}
	}
}

if (!function_exists('justg_get_theme_default_settings')) {
	/**
	 * Retrieve default theme settings.
	 *
	 * @return array
	 */
	function justg_get_theme_default_settings()
	{
		$defaults = array(
			'justg_posts_index_style' => 'default',   // Latest blog posts style.
			'justg_sidebar_position'  => 'right',     // Sidebar position.
			'justg_container_type'    => 'container', // Container width.
		);

		/**
		 * Filters the default theme settings.
		 *
		 * @param array $defaults Array of default theme settings.
		 */
		return apply_filters('justg_theme_default_settings', $defaults);
	}
}

if (!function_exists('velocitytheme_option')) {

	/**
	 * function for get all option.
	 * 
	 * made to manage velocity theme settings easier
	 *
	 * @package justg
	 */
	function velocitytheme_option($option_name = null, $default = null)
	{

		if (empty($option_name)) {
			return false;
		}

		if (empty($default) && class_exists('Kirki') && isset(Kirki::$all_fields[$option_name]) && isset(Kirki::$all_fields[$option_name]['default'])) {
			$default = Kirki::$all_fields[$option_name]['default'];
		}

		$option_value = get_theme_mod($option_name, $default);

		return $option_value;
	}
}

if (!function_exists('velocitytheme_color_scheme')) {
	/**
	 * set Color Scheme Bootstrap 
	 *
	 * @return array
	 */
	function velocitytheme_color_scheme()
	{
		$color_scheme = isset($_COOKIE["color_scheme"]) ? $_COOKIE["color_scheme"] : 'light';
		echo 'data-bs-theme="' . $color_scheme . '"';
	}
}

if (!function_exists('velocitytheme_wpversion')) {

	/**
	 * This will output the version WordPress
	 * 
	 * @since velocitytheme 2.3.4
	 */
	function velocitytheme_wpversion()
	{
		global $wp_version;
		return $wp_version;
	}
}

if (!class_exists('Kirki') && velocitytheme_wpversion() < 5) {
	///disable SSL Verify for TGM wp4.9
	add_filter('https_ssl_verify', '__return_false');
}
