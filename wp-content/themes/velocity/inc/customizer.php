<?php

/**
 * justg functions kirki
 *
 * @package justg
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;

if (!class_exists('Kirki') || class_exists('Kirki') && KIRKI_VERSION < 4)
	return false;

// Add our config to differentiate from other themes/plugins 
// that may use Kirki at the same time.
Kirki::add_config('justg_config', [
	'capability'  => 'edit_theme_options',
	'option_type' => 'theme_mod',
]);

/**
 * Add Panel.
 * 
 */
new \Kirki\Panel(
	'global_panel',
	[
		'priority'    => 10,
		'title'       => esc_html__('Global', ''),
		'description' => esc_html__('', 'justg'),
	]
);
Kirki::add_panel('panel_header', [
	'priority'    => 10,
	'title'       => esc_html__('Header', 'justg'),
	'description' => esc_html__('', 'justg'),
]);
/**
 * Add Section.
 * 
 */
Kirki::add_section('title_tagline', [
	'panel'    => 'panel_header',
	'title'    => __('Site Identity', 'justg'),
	'priority' => 10,
]);
Kirki::add_section('header_section', [
	'panel'    => 'panel_header',
	'title'    => __('Primary Header', 'justg'),
	'priority' => 10,
]);

/**
 * Add Field.
 * 
 */
Kirki::add_field('justg_config', [
	'type'        => 'select',
	'settings'    => 'select_header_container',
	'label'       => esc_html__('Header Container', 'justg'),
	'section'     => 'header_section',
	'default'     => 'full',
	'placeholder' => esc_html__('Header Container', 'justg'),
	'priority'    => 10,
	'multiple'    => 1,
	'choices'     => [
		'fixed' => esc_html__('Fixed', 'justg'),
		'full' => esc_html__('Full Width', 'justg'),
	],
]);
Kirki::add_field('justg_config', [
	'type'        => 'select',
	'settings'    => 'select_header_position',
	'label'       => esc_html__('Header Position', 'justg'),
	'section'     => 'header_section',
	'default'     => 'relative',
	'placeholder' => esc_html__('Header Position', 'justg'),
	'priority'    => 10,
	'multiple'    => 1,
	'choices'     => [
		'relative' => esc_html__('Relative', 'justg'),
		'fixed-top' => esc_html__('Fixed Top', 'justg'),
		'sticky-top' => esc_html__('Sticky Top', 'justg'),
	],
]);
Kirki::add_field('justg_config', [
	'type'        => 'background',
	'settings'    => 'background_header',
	'label'       => esc_html__('Background Header', 'justg'),
	'description' => esc_html__('', 'justg'),
	'section'     => 'header_section',
	'default'     => [
		'background-color'      => '#ffffff',
		'background-image'      => '',
		'background-repeat'     => 'repeat',
		'background-position'   => 'center center',
		'background-size'       => 'cover',
		'background-attachment' => 'scroll',
	],
	'transport'   => 'auto',
	'output'      => [
		[
			'element' => ['[data-bs-theme="light"] #main-menu .dropdown-menu,[data-bs-theme="light"] .bg-header'],
		],
	],
]);

Kirki::add_field('justg_config', [
	'type'        => 'slider',
	'settings'    => 'tinggi_logo',
	'label'       => esc_html__('Logo Height', 'justg'),
	'section'     => 'header_section',
	'default'     => 40,
	'transport'   => 'auto',
	'choices'     => [
		'min'  => 10,
		'max'  => 300,
		'step' => 1,
	],
	'output' => [
		[
			'element'  => '.navbar-brand img',
			'property' => 'max-height',
			'units'    => 'px',
		],
	],
	'partial_refresh'    => [
		'partial_tinggi_logo' => [
			'selector'        => '.navbar-brand',
			'render_callback' => '__return_false'
		]
	],
]);


Kirki::add_panel('panel_sidebar', [
	'priority'    => 10,
	'title'       => esc_html__('Sidebar', 'justg'),
	'description' => esc_html__('', 'justg'),
]);
Kirki::add_panel('panel_footer', [
	'priority'    => 10,
	'title'       => esc_html__('Footer', 'justg'),
	'description' => esc_html__('', 'justg'),
]);
Kirki::add_panel('panel_antispam', [
	'priority'    => 10,
	'title'       => esc_html__('Anti Spam', 'justg'),
	'description' => esc_html__('', 'justg'),
]);


/**
 * Add Section.
 * 
 */

Kirki::add_section('sidebar_section', [
	'panel'    => 'panel_sidebar',
	'title'    => __('Sidebar', 'justg'),
	'priority' => 10,
]);


/**
 * Add Section
 */
Kirki::add_section('footer_container_section', [
	'panel'    => 'panel_footer',
	'title'    => __('Container', 'justg'),
	'priority' => 10,
]);
/**
 * Add Field.
 * 
 */
Kirki::add_field('justg_config', [
	'type'        => 'select',
	'settings'    => 'option_footer_container',
	'label'       => esc_html__('Footer Container', 'justg'),
	'section'     => 'footer_container_section',
	'default'     => 'full',
	'placeholder' => esc_html__('Footer Container', 'justg'),
	'priority'    => 10,
	'multiple'    => 1,
	'choices'     => [
		'fixed' => esc_html__('Fixed', 'justg'),
		'full' => esc_html__('Full Width', 'justg'),
	],
]);
Kirki::add_field('justg_config', [
	'type'        => 'background',
	'settings'    => 'background_footer',
	'label'       => esc_html__('Background Footer', 'justg'),
	'description' => esc_html__('', 'justg'),
	'section'     => 'footer_container_section',
	'default'     => [
		'background-color'      => '#333333',
		'background-image'      => '',
		'background-repeat'     => 'repeat',
		'background-position'   => 'center center',
		'background-size'       => 'cover',
		'background-attachment' => 'scroll',
	],
	'transport'   => 'auto',
	'output'      => [
		[
			'element' => ['.block-footer'],
		],
	],
]);
Kirki::add_section('footer_widget_section', [
	'panel'    => 'panel_footer',
	'title'    => __('Widget Setting', 'justg'),
	'priority' => 10,
]);
Kirki::add_section('sidebar-widgets-footer-widget-1', [
	'panel'    => 'panel_footer',
	'title'    => __('Widget 1', 'justg'),
	'priority' => 10,
]);
Kirki::add_section('sidebar-widgets-footer-widget-2', [
	'panel'    => 'panel_footer',
	'title'    => __('Widget 2', 'justg'),
	'priority' => 10,
]);

Kirki::add_section('sidebar-widgets-footer-widget-3', [
	'panel'    => 'panel_footer',
	'title'    => __('Widget 3', 'justg'),
	'priority' => 10,
]);
Kirki::add_section('sidebar-widgets-footer-widget-4', [
	'panel'    => 'panel_footer',
	'title'    => __('Widget 4', 'justg'),
	'priority' => 10,
]);

/**
 * Add Sections.
 *
 * We'll be doing things a bit differently here, just to demonstrate an example.
 * We're going to define 1 section per control-type just to keep things clean and separate.
 *
 * @link https://kirki.org/docs/getting-started/sections.html
 */
$sections = [
	'typography'          => [esc_html__('Typography', 'justg'), ''],
	'colors'              => [esc_html__('Colors', 'justg'), ''],
	'container'           => [esc_html__('Container', 'justg'), ''],
	'widget'              => [esc_html__('Widget', 'justg'), ''],
];

foreach ($sections as $section_id => $section) {
	$section_args = [
		'title'       => $section[0],
		'description' => $section[1],
		'panel'       => 'global_panel',
	];
	if (isset($section[2])) {
		$section_args['type'] = $section[2];
	}
	new \Kirki\Section(str_replace('-', '_', $section_id) . '_section', $section_args);
}

new \Kirki\Field\Typography(
	[
		'settings'    => 'typography_setting',
		'label'       => esc_html__('Typography', 'velocity'),
		'description' => esc_html__('Just the font-family and font-weight.', 'velocity'),
		'section'     => 'typography_section',
		'priority'    => 10,
		'transport'   => 'auto',
		'default'     => [
			'font-family'     => 'Roboto',
			'variant'         => 'regular',
			'font-style'      => 'normal',
			'font-size'       => '14px',
			'line-height'     => '1.5',
			'letter-spacing'  => '0',
			'text-transform'  => 'none',
			'text-decoration' => 'none',
			'text-align'      => 'left',
		],
		'output'      => [
			[
				'element' => 'body,.is-root-container',
			],
		],
	]
);

/**
 * Multicolor Control.
 */
new \Kirki\Field\Multicolor(
	[
		'settings'  => 'link_setting',
		'label'     => esc_html__('Multicolor Control', 'velocity'),
		'section'   => 'colors_section',
		'priority'  => 10,
		'transport' => 'postMessage',
		'choices'   => [
			'main'    => esc_html__('Text', 'justg'),
			'heading' => esc_html__('Heading', 'justg'),
			'link'    => esc_html__('Link', 'justg'),
			'hover'   => esc_html__('Hover', 'justg'),
			'active'  => esc_html__('Active', 'justg'),
			'primary' => esc_html__('Primary', 'justg'),
			'light'	  => esc_html__('Light', 'justg'),
		],
		'alpha'     => true,
		'default'     => [
			'main'    => '#333333',
			'heading' => '#121212',
			'link'    => '#002B5B',
			'hover'   => '#333333',
			'primary' => '#1e73be',
			'light'   => '#f8f9fa',
		],
		'output'   => [
			[
				'choice'    => 'main',
				'element'   => ':root[data-bs-theme=light]',
				'property'  => '--bs-body-color',
			],
			[
				'choice'    => 'heading',
				'element'   => ':root[data-bs-theme=light]',
				'property'  => '--bs-heading-color',
			],
			[
				'choice'    => 'link',
				'element'   => ':root[data-bs-theme=light]',
				'property'  => '--bs-link-color',
			],
			[
				'choice'    => 'hover',
				'element'   => ':root[data-bs-theme=light]',
				'property'  => '--bs-link-hover-color',
			],
			[
				'choice'    => 'primary',
				'element'   => ':root',
				'property'  => '--bs-primary',
			],
			[
				'choice'    => 'primary',
				'element'   => ':root',
				'property'  => '--primary',
			],
			[
				'choice'    => 'primary',
				'element'   => '[data-bs-theme=dark]',
				'property'  => '--bs-link-hover-color',
			],
			[
				'choice'    => 'light',
				'element'   => ':root',
				'property'  => '--bs-light',
			],
			[
				'choice'    => 'light',
				'element'   => ':root',
				'property'  => '--light',
			],
		],
	]
);

new \Kirki\Field\Background(
	[
		'settings'    => 'background_website',
		'label'       => esc_html__('Background', 'justg'),
		'description' => esc_html__('', 'justg'),
		'section'     => 'colors_section',
		'default'     => [
			'background-color'      => '#ffffff',
			'background-image'      => '',
			'background-repeat'     => 'repeat',
			'background-position'   => 'center center',
			'background-size'       => 'cover',
			'background-attachment' => 'scroll',
		],
		'transport'   => 'auto',
		'output'      => [
			[
				'element'   => ':root[data-bs-theme=light] body',
			],
		],
	]
);

/**
 * Slider Control.
 */
new \Kirki\Field\Slider(
	[
		'settings'    => 'container_width',
		'label'       => esc_html__('Container Width', 'velocity'),
		'description' => esc_html__('', 'velocity'),
		'section'     => 'container_section',
		'default'     => '1140',
		'transport'   => 'postMessage',
		'tooltip'     => esc_html__('', 'velocity'),
		'choices'     => [
			'min'  => 600,
			'max'  => 3000,
			'step' => 1,
		],
		'output' => [
			[
				'element'  => '.container',
				'property' => 'max-width',
				'units'    => 'px',
			],
		],
	]
);

new \Kirki\Field\Slider(
	[
		'settings'    => 'sidebar_width',
		'label'       => esc_html__('Sidebar Width', 'velocity'),
		'description' => esc_html__('', 'velocity'),
		'section'     => 'widget_section',
		'default'     => '30',
		'transport'   => 'postMessage',
		'tooltip'     => esc_html__('', 'velocity'),
		'choices'     => [
			'min'  => 20,
			'max'  => 80,
			'step' => 1,
		],
		'output' => [
			[
				'element'  => '.widget-area',
				'property' => 'max-width',
				'units'    => '%',
				'media_query' => '@media (min-width: 768px)',
			],
		],
	]
);

new \Kirki\Field\Select(
	[
		'settings'    => 'justg_sidebar_position',
		'label'       => esc_html__('Sidebar Position', 'justg'),
		'description' => esc_html__('Select position', 'justg'),
		'section'     => 'widget_section',
		'transport'   => 'refresh',
		'default'     => 'right',
		'choices'     => [
			'left'  	=> esc_html__('Left', 'justg'),
			'right' 	=> esc_html__('Right', 'justg'),
			'disable'	=> esc_html__('Disable', 'justg'),
		],
	]
);

/**
 * Add a panel.
 *
 * @link https://kirki.org/docs/getting-started/panels.html
 */
new \Kirki\Panel(
	'floating_panel',
	[
		'priority'    => 90,
		'title'       => esc_html__('Floating Button', ''),
		'description' => esc_html__('', 'justg'),
	]
);

/**
 * Add Sections.
 *
 * We'll be doing things a bit differently here, just to demonstrate an example.
 * We're going to define 1 section per control-type just to keep things clean and separate.
 *
 * @link https://kirki.org/docs/getting-started/sections.html
 */
$sections = [
	'whatsapp'          => [esc_html__('Whatsapp', 'justg'), ''],
	'scroll_to_top'     => [esc_html__('Scroll to top', 'justg'), ''],
];

foreach ($sections as $section_id => $section) {
	$section_args = [
		'title'       => $section[0],
		'description' => $section[1],
		'panel'       => 'floating_panel',
	];
	if (isset($section[2])) {
		$section_args['type'] = $section[2];
	}
	new \Kirki\Section(str_replace('-', '_', $section_id) . '_section', $section_args);
}

/**
 * Whatsapp control.
 */
new \Kirki\Field\Checkbox_Switch(
	[
		'settings'    => 'whatsapp_enable',
		'label'       => esc_html__('Enable Whatsapp', 'justg'),
		'description' => esc_html__('Enable/Disable Whatsapp', 'justg'),
		'section'     => 'whatsapp_section',
		'transport'   => 'postMessage',
		'default'     => false,
	]
);

/**
 * Whatsapp control.
 */
new \Kirki\Field\Text(
	[
		'settings'    => 'whatsapp_number',
		'label'       => esc_html__('Whatsapp Number', 'justg'),
		'description' => esc_html__('Enter your whatsapp number', 'justg'),
		'section'     => 'whatsapp_section',
		'transport'   => 'postMessage',
		'default'     => '',
	]
);

new \Kirki\Field\Text(
	[
		'settings'    => 'whatsapp_text',
		'label'       => esc_html__('Whatsapp Text', 'justg'),
		'description' => esc_html__('Enter your whatsapp text', 'justg'),
		'section'     => 'whatsapp_section',
		'transport'   => 'postMessage',
		'default'     => 'Butuh Bantuan?',
	]
);

new \Kirki\Field\Textarea(
	[
		'settings'    => 'whatsapp_message',
		'label'       => esc_html__('Whatsapp Message', 'justg'),
		'description' => esc_html__('Enter your whatsapp message', 'justg'),
		'section'     => 'whatsapp_section',
		'transport'   => 'postMessage',
		'default'     => 'Halo..',
	]
);

new \Kirki\Field\Select(
	[
		'settings'    => 'whatsapp_position',
		'label'       => esc_html__('Position', 'justg'),
		'description' => esc_html__('Select position', 'justg'),
		'section'     => 'whatsapp_section',
		'transport'   => 'postMessage',
		'default'     => 'right',
		'choices'     => [
			'left'  => esc_html__('Left', 'justg'),
			'right' => esc_html__('Right', 'justg'),
		],
	]
);

/**
 * Scroll to top control.
 */
new \Kirki\Field\Checkbox_Switch(
	[
		'settings'    => 'scroll_to_top_enable',
		'label'       => esc_html__('Enable Scroll to top', 'justg'),
		'description' => esc_html__('Enable/Disable Scroll to top', 'justg'),
		'section'     => 'scroll_to_top_section',
		'transport'   => 'postMessage',
		'default'     => true,
	]
);

new \Kirki\Field\Select(
	[
		'settings'    => 'scroll_to_top_position',
		'label'       => esc_html__('Position', 'justg'),
		'description' => esc_html__('Select position', 'justg'),
		'section'     => 'scroll_to_top_section',
		'transport'   => 'postMessage',
		'default'     => 'right',
		'choices'     => [
			'left'  => esc_html__('Left', 'justg'),
			'right' => esc_html__('Right', 'justg'),
		],
	]
);
