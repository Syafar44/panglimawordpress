<?php
/**
 * justg enqueue scripts
 *
 * @package justg
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

if ( ! function_exists( 'justg_scripts' ) ) {
	/**
	 * Load theme's JavaScript and CSS sources.
	 */
	function justg_scripts() {
		// Get the theme data.
		$theme_version 	= VELOCITY_SYSTEM_VERSION;

		wp_enqueue_style( 'justg-styles', get_template_directory_uri() . '/css/theme.min.css', array(), $theme_version );

		wp_enqueue_script( 'jquery' );
		wp_enqueue_style('dashicons');
		wp_enqueue_script( 'justg-scripts', get_template_directory_uri() . '/js/theme.min.js', array(), $theme_version, true );
		
		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}

		wp_localize_script(
			'justg-scripts',
			'opt',
			array(
				'ajaxUrl'        => admin_url('admin-ajax.php'),
				'ajaxPost'       => admin_url('admin-post.php'),
				'restUrl'        => rest_url(),
				'restUrlProduct' => rest_url('wp/v2/product'),
				'shopName'       => sanitize_title_with_dashes(sanitize_title_with_dashes(get_bloginfo('name'))),
				'inWishlist'     => esc_html__("Already in wishlist","justg"),
				'removeWishlist' => esc_html__("Remove from wishlist","justg"),
				'buttonText'     => esc_html__("Details","justg"),
				'error'          => esc_html__("Something went wrong, could not add to wishlist","justg"),
				'noWishlist'     => esc_html__("No wishlist found","justg"),
			)
		);

	}
} // End of if function_exists( 'justg_scripts' ).

add_action( 'wp_enqueue_scripts', 'justg_scripts', 20 );

