<?php

/**
 * The header for our theme
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package justg
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;

$container = velocitytheme_option('justg_container_type', 'container');
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?> <?php velocitytheme_color_scheme(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?> <?php justg_body_attributes(); ?>>
	<?php do_action('wp_body_open'); ?>
	<div class="site" id="page">

		<?php
		do_action('justg_before_header');
		do_action('justg_header_open');
		do_action('justg_header_before');
		do_action('justg_header');
		do_action('justg_header_after');
		do_action('justg_header_close');
		do_action('justg_after_header');
		?>

		<div class="justg-top-content"><?php do_action('justg_top_content'); ?></div>

		<div id="wrapper-content">
			<?php do_action('justg_before_wrapper_content'); ?>