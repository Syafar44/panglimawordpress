<?php

/**
 * Template Hook
 *
 * @package justg
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;

/**
 * Header Open
 *
 * @see justg_header_open()
 */
add_action('justg_header_open', 'justg_header_open', 20);

/**
 * Header
 *
 * @see justg_header_menu()
 */
add_action('justg_header', 'justg_header_menu');

/**
 * Header Close
 *
 * @see justg_header_close()
 */
add_action('justg_header_close', 'justg_header_close');

/**
 * Before Title
 *
 * @see justg_breadcrumb()
 */
$breadcrumb_position = velocitytheme_option('breadcrumb_position', 'justg_before_title');
add_action($breadcrumb_position, 'justg_breadcrumb');


/**
 * Before Content
 *
 * @see justg_left_sidebar_check()
 */
add_action('justg_before_content', 'justg_left_sidebar_check', 9);

/**
 * After Content
 *
 * @see justg_left_sidebar_check()
 */
add_action('justg_after_content', 'justg_right_sidebar_check', 9);

/**
 * Before After #main.site-main
 *
 * @see justg_before_sitemain() justg_after_sitemain()
 */
add_action('justg_before_content', 'justg_before_sitemain', 10);
add_action('justg_after_content', 'justg_after_sitemain', 8);


/**
 * Footer
 *
 * @see justg_the_footer_open()
 * @see justg_the_footer_content()
 * @see justg_the_footer_close()
 */
add_action('justg_do_footer', 'justg_the_footer_open');
add_action('justg_do_footer', 'justg_the_footer_content');
add_action('justg_do_footer', 'justg_the_footer_close');

/**
 * Footer Floating button
 *
 * @see justg_the_button_floating()
 */
add_action('wp_footer', 'justg_the_button_floating');
