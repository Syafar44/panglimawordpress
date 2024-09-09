<?php

/**
 * justg functions and definitions
 *
 * @package justg
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;

$justg_includes = array(
	'/class-autoupdate.php',    			// Load Auto update theme and TGM plugin.
	'/tgm/class-tgm-plugin-activation.php',	// Load plugin TGM activation.
	'/tgm/tgm.php',							// Register the required plugins for this theme.
	'/theme-settings.php',                  // Initialize theme default settings.
	'/setup.php',                           // Theme setup and custom theme supports.
	'/widgets.php',                         // Register widget area.
	'/enqueue.php',                         // Enqueue scripts and styles.
	'/template-tags.php',                   // Custom template tags for this theme.
	'/pagination.php',                      // Custom pagination for this theme.
	'/template-function.php',				// Load template functions.
	'/template-hooks.php',					// Load template hook.
	'/extras.php',                          // Custom functions that act independently of the theme templates.
	'/custom-comments.php',                 // Custom Comments file.
	'/jetpack.php',                         // Load Jetpack compatibility file.
	'/class-wp-bootstrap-navwalker.php',    // Load custom WordPress nav walker.
	'/editor.php',                          // Load Editor functions.
	'/deprecated.php',                      // Load deprecated functions.
	'/customizer.php',						// Setup Customizer.
	'/kirki3.php',							// Setup Customizer Kirki v3.
	'/aq_resizer.php'						// load aq_resizer functions.
);

foreach ($justg_includes as $file) {
	require_once get_template_directory() . '/inc' . $file;
}

//Version Theme
if (!defined('VELOCITY_SYSTEM_VERSION')) {
	define('VELOCITY_SYSTEM_VERSION', '2.4.4');
}