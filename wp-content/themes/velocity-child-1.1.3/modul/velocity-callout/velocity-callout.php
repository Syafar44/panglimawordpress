<?php

/**
 * @class vFLvelocityCallout
 */
class vFLvelocityCallout extends FLBuilderModule
{

	/**
	 * @method __construct
	 */
	public function __construct()
	{
		parent::__construct(array(
			'name'          	=> __('Velocity Callout', 'fl-builder'),
			'description'   	=> __('Display a callout section with background image and icon by Velocity Developer.', 'fl-builder'),
			'category'      	=> __('Media', 'fl-builder'),
			'editor_export' 	=> false,
			'partial_refresh'	=> true,
			'icon'				=> 'format-gallery.svg',
		));
	}
}

/**
 * Register the module and its form settings.
 */
FLBuilder::register_module('vFLvelocityCallout', array(
	'layout'        => array(
		'title'         => __('Callout Content', 'fl-builder'),
		'sections'      => array(
			'content'       => array(
				'title'         => __('Content', 'fl-builder'),
				'fields'        => array(
					'image' => array(
						'type'          => 'photo',
						'label'         => __('Image Icon', 'fl-builder'),
					),
					'background_content'       => array(
						'type'          => 'color',
						'label'         => __('Background Content', 'fl-builder'),
						'rows'          => 10,
					),
					'content'       => array(
						'type'          => 'editor',
						'label'         => __('Content', 'fl-builder'),
						'rows'          => 10,
					),
				),
			),
		),
	),
));
