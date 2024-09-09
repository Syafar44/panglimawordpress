<?php

/**
 * Fuction yang digunakan di theme ini.
 */
if (!defined('ABSPATH')) {
	exit; // Exit if accessed directly.
}

add_action('after_setup_theme', 'velocitychild_theme_setup', 9);

function velocitychild_theme_setup()
{

	// Load justg_child_enqueue_parent_style after theme setup
	add_action('wp_enqueue_scripts', 'justg_child_enqueue_parent_style', 20);

	if (class_exists('Kirki')) :

		/**
		 * Customizer control in child themes
		 * Sample Panel
		 * 
		 */
		Kirki::add_panel('panel_home', [
			'priority'    => 10,
			'title'       => esc_html__('Home', 'justg'),
			'description' => esc_html__('', 'justg'),
		]);

		/**
		 * Sample section
		 * 
		 */
		Kirki::add_section('home_slider', [
			'panel'    => 'panel_home',
			'title'    => __('Slider', 'justg'),
			'priority' => 10,
		]);

		/**
		 * Sample Field
		 * 
		 */
	// Kirki::add_field( 'justg_config', [
	// 	'type'        => 'repeater',
	// 	'label'       => esc_html__( 'Slider Home', 'justg' ),
	// 	'section'     => 'home_slider',
	// 	'priority'    => 10,
	// 	'row_label' => [
	// 		'type'  => 'text',
	// 		'value' => esc_html__( 'Slide', 'justg' ),
	// 	],
	// 	'button_label' => esc_html__('Tambah Slide', 'justg' ),
	// 	'settings'     => 'home_slider_setting',
	// 	'fields' => [
	// 		'image' => [
	// 			'type'        => 'image',
	// 			'label'       => esc_html__( 'Gambar', 'justg' ),
	// 			'description' => esc_html__( 'gunakan gambar dengan ukuran sama', 'justg' ),
	// 			'default'     => '',
	// 		],
	// 		'link_url'  => [
	// 			'type'        => 'text',
	// 			'label'       => esc_html__( 'Url slide', 'justg' ),
	// 			'description' => esc_html__( 'link saat gambar di klik', 'justg' ),
	// 			'default'     => '',
	// 		],
	// 	]
	// ] );

	endif;
}

add_action('init', 'velocity_admin_init');
function velocity_admin_init()
{
	register_post_type('produk', array(
		'labels' => array(
			'name' => 'Produk',
			'singular_name' => 'produk',
			'add_new' => 'Tambah Produk Baru',
			'add_new_item' => 'Tambah Produk Baru',
			'edit_item' => 'Edit Produk',
			'view_item' => 'Lihat Produk',
			'search_items' => 'Cari Produk',
			'not_found' => 'Tidak ditemukan',
			'not_found_in_trash' => 'Tidak ada Produk di kotak sampah'
		),
		'menu_icon' => 'dashicons-screenoptions',
		'public' => true,
		'has_archive' => true,
		//'show_in_rest' => true, // Use Gutenberg
		'taxonomies' => array('kategori'),
		'supports' => array(
			'title',
			'editor',
			'thumbnail',
		),
	));
	register_taxonomy(
		'kategori',
		'produk',
		array(
			'label' => __('Kategori Produk'),
			'rewrite' => array('slug' => 'kategori'),
			'hierarchical' => true,
			'show_admin_column' => true,
			//'show_in_rest' => true, // Use Gutenberg
		)
	);
}

add_filter('rwmb_meta_boxes', 'vel_metabox');
function vel_metabox($meta_boxes)
{
	$textdomain = 'justg';
	$meta_boxes[] = array(
		'id'         => 'standard',
		'title'      => __('Velocity Fields', $textdomain),
		'post_types' => array('produk'),
		'context'    => 'normal',
		'priority'   => 'high',
		'autosave'   => true,
		'fields'     => array(
			array(
				'name'  => __('Link Produk', $textdomain),
				'type'  => 'heading',
			),
			array(
				'name'             => __('Link Pemesanan Whatsapp ', $textdomain),
				'id'               => "pemesanan_wa",
				'type'             => 'text',
			),
			array(
				'name'             => __('Link Shopee', $textdomain),
				'id'               => "pemesanan_shopee",
				'type'             => 'text',
			),
			array(
				'name'             => __('Link Tokopedia', $textdomain),
				'id'               => "pemesanan_tokopedia",
				'type'             => 'text',
			),
			array(
				'name'             => __('Link Lazada', $textdomain),
				'id'               => "pemesanan_lazada",
				'type'             => 'text',
			),
			array(
				'name'             => __('Link Bukalapak', $textdomain),
				'id'               => "pemesanan_bukalapak",
				'type'             => 'text',
			),
			// array(
			// 	'name'  => __('Style Card', $textdomain),
			// 	'type'  => 'heading',
			// ),
			// array(
			// 	'name'             => __('Warna Tema Card', $textdomain),
			// 	'id'               => "pemesanan_bukalapak",
			// 	'type'             => 'text',
			// ),
		)
	);

	return $meta_boxes;
}


// tambah modul custom (DALAM THEME)
function vsstem_modul()
{
	if (class_exists('FLBuilder')) {
		get_template_part('modul/velocity-callout/velocity-callout');
	}
}
add_action('init', 'vsstem_modul');
