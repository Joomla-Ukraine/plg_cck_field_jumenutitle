<?php
/**
 * JUMenuTitle for SEBLOD
 *
 * @package          Joomla.Site
 * @subpackage       plg_cck_field_jumenutitle
 *
 * @author           Denys Nosov, denys@joomla-ua.org
 * @copyright        2023 (C) Joomla! Ukraine, https://joomla-ua.org. All rights reserved.
 * @license          GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

$options2 = JCckDev::fromJSON($this->item->options2);

$icons  = [];
$sprite = 'templates/admin/app/icons/icons.svg';
if(is_file(JPATH_SITE . '/' . @$options2[ 'sprite' ]))
{
	$sprite = @$options2[ 'sprite' ];
}

JCckDev::forceStorage();

$displayData = [
	'config' => $config,
	'form'   => [
		[
			'fields' => [
				JCckDev::renderForm('core_dev_text', @$options2[ 'sprite' ], $config, [
					'label'         => 'Sprite Path',
					'defaultvalue'  => $sprite,
					'size'          => 50,
					'storage_field' => 'json[options2][sprite]'
				]),
				JCckDev::renderForm('core_dev_text', @$options2[ 'size' ], $config, [
					'label'         => 'Icon Size',
					'defaultvalue'  => '24',
					'size'          => 50,
					'storage_field' => 'json[options2][size]'
				]),
				JCckDev::renderForm('core_dev_text', @$options2[ 'class' ], $config, [
					'label'         => 'Icon Class',
					'size'          => 50,
					'storage_field' => 'json[options2][class]'
				]),
				JCckDev::renderForm('core_dev_text', @$options2[ 'title_class' ], $config, [
					'label'         => 'Title Class',
					'size'          => 50,
					'storage_field' => 'json[options2][title_class]'
				])
			]
		],
		[
			'fields' => [
				JCckDev::getForm('core_storage', $this->item->storage, $config)
			],
			'mode'   => 'storage'
		]
	],
	'help'   => [],
	'html'   => '',
	'item'   => $this->item,
	'script' => ''
];

echo JCckDev::renderLayoutFile('cck' . JCck::v() . '.construction.cck_field.edit', $displayData);