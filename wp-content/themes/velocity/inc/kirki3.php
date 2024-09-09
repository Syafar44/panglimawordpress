<?php

/**
 * justg functions kirki version 3
 *
 * @package justg
 */

if (!class_exists('Kirki') || class_exists('Kirki') && KIRKI_VERSION > 4)
    return false;

// Add our config to differentiate from other themes/plugins 
// that may use Kirki at the same time.
Kirki::add_config('justg_config', [
    'capability'  => 'edit_theme_options',
    'option_type' => 'theme_mod',
]);

//PANEL Kirki
Kirki::add_panel('global_panel', array(
    'priority'    => 10,
    'title'       => esc_html__('Global', 'kirki'),
    'description' => esc_html__('', 'kirki'),
));
Kirki::add_panel('floating_panel', [
    'priority'    => 10,
    'title'       => esc_html__('Floating Button', 'justg'),
    'description' => esc_html__('', 'justg'),
]);

//SECTION Kirki
Kirki::add_section('title_tagline', [
    'panel'    => 'global_panel',
    'title'    => __('Site Identity', 'justg'),
    'priority' => 10,
]);

$sections = [
    'global'  => [
        'colors'            => [esc_html__('Colors', 'justg'), ''],
        'widget'            => [esc_html__('Widget', 'justg'), ''],
    ],
    'floating'  => [
        'whatsapp'          => [esc_html__('Whatsapp', 'justg'), ''],
        'scroll_to_top'     => [esc_html__('Scroll to top', 'justg'), ''],
    ],
];
foreach ($sections as $panel => $datasection) {
    foreach ($datasection as $section_id => $section) {

        Kirki::add_section($section_id . '_section', [
            'title'       => $section[0],
            'description' => $section[1],
            'panel'       => $panel . '_panel',
            'priority' => 10,
        ]);
    }
}


Kirki::add_field('justg_config', [
    'type'        => 'background',
    'settings'    => 'background_website',
    'label'       => esc_html__('Background', 'justg'),
    'description' => esc_html__('', 'justg'),
    'section'     => 'colors_section',
    'default'     => [
        'background-color'      => 'rgba(255,255,255)',
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
]);

Kirki::add_field('justg_config', [
    'type'        => 'switch',
    'settings'    => 'whatsapp_enable',
    'label'       => esc_html__('Enable Whatsapp', 'kirki'),
    'section'     => 'whatsapp_section',
    'default'     => 1,
    'priority'    => 10,
    'choices'     => [
        1  => esc_html__('Enable', 'kirki'),
        0 => esc_html__('Disable', 'kirki'),
    ],
]);
Kirki::add_field('justg_config', [
    'type'        => 'text',
    'settings'    => 'whatsapp_number',
    'label'       => esc_html__('Whatsapp Number', 'justg'),
    'description' => esc_html__('Enter your whatsapp number', 'justg'),
    'section'     => 'whatsapp_section',
    'transport'   => 'postMessage',
    'default'     => '',
    'priority'    => 10,
]);
Kirki::add_field('justg_config', [
    'type'          => 'text',
    'settings'      => 'whatsapp_text',
    'label'         => esc_html__('Whatsapp Text', 'justg'),
    'description'   => esc_html__('Enter your whatsapp text', 'justg'),
    'section'       => 'whatsapp_section',
    'transport'     => 'postMessage',
    'default'       => 'Butuh Bantuan?',
    'priority'      => 10,
]);
Kirki::add_field('justg_config', [
    'type'          => 'textarea',
    'settings'      => 'whatsapp_message',
    'label'         => esc_html__('Whatsapp Message', 'justg'),
    'description'   => esc_html__('Enter your whatsapp message', 'justg'),
    'section'       => 'whatsapp_section',
    'transport'     => 'postMessage',
    'default'       => 'Halo..',
    'priority'      => 10,
]);
Kirki::add_field('justg_config', [
    'type'        => 'select',
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
]);

Kirki::add_field('justg_config', [
    'type'        => 'switch',
    'settings'    => 'scroll_to_top_enable',
    'label'       => esc_html__('Enable Scroll to top', 'justg'),
    'description' => esc_html__('Enable/Disable Scroll to top', 'justg'),
    'section'     => 'scroll_to_top_section',
    'transport'   => 'postMessage',
    'default'     => true,
]);
Kirki::add_field('justg_config', [
    'type'        => 'select',
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
]);
