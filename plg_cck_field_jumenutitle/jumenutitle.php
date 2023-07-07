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

use Joomla\CMS\Factory;
use Joomla\CMS\Layout\FileLayout;

defined('_JEXEC') or die;

/**
 * plgCCK_FieldJUMenuTitle
 *
 * @since       1.0
 * @subpackage  plg_cck_field_jumenutitle
 * @package     Joomla.Site
 */
class plgCCK_FieldJUMenuTitle extends JCckPluginField
{
	/**
	 * @since 1.0
	 * @var string
	 */
	protected static string $type = 'jumenutitle';

	/**
	 * @since 1.0
	 * @var string
	 */
	protected static string $path;

	/**
	 * @param          $type
	 * @param array    $data
	 *
	 * @return void
	 * @since 1.0
	 */
	public function onCCK_FieldConstruct($type, array &$data = []): void
	{
		if(self::$type !== $type)
		{
			return;
		}

		$this->g_onCCK_FieldConstruct($data);

		$data[ 'display' ] = 1;
	}

	/**
	 * @param          $field
	 * @param          $style
	 * @param array    $data
	 * @param array    $config
	 *
	 * @return void
	 * @since 1.0
	 */
	public static function onCCK_FieldConstruct_SearchContent(&$field, $style, $data = [], &$config = []): void
	{
		$data[ 'markup' ] = null;

		parent::onCCK_FieldConstruct_SearchContent($field, $style, $data, $config);
	}

	/**
	 * @param          $field
	 * @param          $style
	 * @param array    $data
	 * @param array    $config
	 *
	 * @return void
	 * @since 1.0
	 */
	public static function onCCK_FieldConstruct_SearchSearch(&$field, $style, $data = [], &$config = []): void
	{
		$data[ 'label' ]      = null;
		$data[ 'live' ]       = null;
		$data[ 'match_mode' ] = null;
		$data[ 'markup' ]     = null;
		$data[ 'validation' ] = null;
		$data[ 'variation' ]  = null;

		parent::onCCK_FieldConstruct_SearchSearch($field, $style, $data, $config);
	}

	/**
	 * @param          $field
	 * @param          $style
	 * @param array    $data
	 * @param array    $config
	 *
	 * @return void
	 * @since 1.0
	 */
	public static function onCCK_FieldConstruct_TypeContent(&$field, $style, $data = [], &$config = []): void
	{
		$data[ 'markup' ] = null;

		parent::onCCK_FieldConstruct_TypeContent($field, $style, $data, $config);
	}

	/**
	 * @param          $field
	 * @param          $style
	 * @param array    $data
	 * @param array    $config
	 *
	 * @return void
	 * @since 1.0
	 */
	public static function onCCK_FieldConstruct_TypeForm(&$field, $style, $data = [], &$config = []): void
	{
		$data[ 'computation' ] = null;
		$data[ 'label' ]       = null;
		$data[ 'live' ]        = null;
		$data[ 'markup' ]      = null;
		$data[ 'validation' ]  = null;
		$data[ 'variation' ]   = null;

		parent::onCCK_FieldConstruct_TypeForm($field, $style, $data, $config);
	}

	/**
	 * @param           $field
	 * @param string    $value
	 * @param array     $config
	 *
	 * @return void
	 * @since 1.0
	 */
	public function onCCK_FieldPrepareContent(&$field, string $value = '', array &$config = []): void
	{
		if(self::$type !== $field->type)
		{
			return;
		}

		self::g_onCCK_FieldPrepareContent($field, $config);

		$item = Factory::getApplication()->getMenu()->getActive();

		$class = $field->css . $field->markup_class;
		$class = $class ? ' class="' . trim($class) . '"' : '';

		$html = '<h2 class="' . $class . '">';

		if($item->getParams()->get('menu-anchor_css'))
		{
			$options2 = JCckDev::fromJSON($field->options2);
			$html     .= (new FileLayout('icon', JPATH_SITE . '/plugins/cck_field/jumenutitle/tmpl'))->render([
				'sprite' => $options2[ 'sprite' ],
				'icon'   => $field->location,
				'size'   => $options2[ 'size' ],
				'class'  => ($options2[ 'class' ] ? : '')
			]);
		}

		$html .= '<span class="uk-text-middle">' . $item->title . '</span>';
		$html .= '</h2>';

		// Set
		$field->html  = $html;
		$field->value = '';
		$field->label = '';
	}

	/**
	 * @param           $field
	 * @param string    $value
	 * @param array     $config
	 * @param array     $inherit
	 * @param bool      $return
	 *
	 * @return void
	 * @since 1.0
	 */
	public function onCCK_FieldPrepareForm(&$field, $value = '', &$config = [], $inherit = [], $return = false)
	{
		if(self::$type !== $field->type)
		{
			return;
		}

		self::$path = self::g_getPath(self::$type . '/');
		self::g_onCCK_FieldPrepareForm($field, $config);

		$item = Factory::getApplication()->getMenu()->getActive();

		$class = $field->css . $field->markup_class;
		$class = $class ? ' class="' . trim($class) . '"' : '';

		$form = '<h2 class="' . $class . '">';

		if($item->getParams()->get('menu-anchor_css'))
		{
			$options2 = JCckDev::fromJSON($field->options2);
			$form     .= (new FileLayout('icon', JPATH_SITE . '/plugins/cck_field/jumenutitle/tmpl'))->render([
				'sprite' => $options2[ 'sprite' ],
				'icon'   => $field->location,
				'size'   => $options2[ 'size' ],
				'class'  => ($options2[ 'class' ] ? : '')
			]);
		}

		$form .= '<span class="uk-text-middle">' . $item->title . '</span>';
		$form .= '</h2>';

		// Set
		$field->form  = $form;
		$field->value = '';
		$field->label = '';

		// Return
		if($return === true)
		{
			return $field;
		}
	}

	/**
	 * @param           $field
	 * @param string    $value
	 * @param array     $config
	 * @param array     $inherit
	 * @param bool      $return
	 *
	 * @return void
	 * @since 1.0
	 */
	public function onCCK_FieldPrepareSearch(&$field, string $value = '', array &$config = [], array $inherit = [], bool $return = false)
	{
		if(self::$type !== $field->type)
		{
			return;
		}

		$this->onCCK_FieldPrepareForm($field, $value, $config, $inherit, $return);

		unset($config[ 'pagination_vars' ][ $field->name ]);

		if($return === true)
		{
			return $field;
		}
	}

	/**
	 * @param           $field
	 * @param string    $value
	 * @param array     $config
	 * @param array     $inherit
	 * @param bool      $return
	 *
	 * @return void
	 * @since 1.0
	 */
	public function onCCK_FieldPrepareStore($field, string $value = '', array &$config = [], array $inherit = [], bool $return = false): void
	{
		if(self::$type !== $field->type)
		{
			return;
		}
	}

	/**
	 * @param          $field
	 * @param array    $config
	 *
	 * @return string
	 * @since 1.0
	 */
	public static function onCCK_FieldRenderContent(&$field, array &$config = []): string
	{
		$field->markup = 'none';

		return parent::g_onCCK_FieldRenderContent($field, 'html');
	}

	/**
	 * @param          $field
	 * @param array    $config
	 *
	 * @return mixed
	 * @since 1.0
	 */
	public static function onCCK_FieldRenderForm(&$field, array &$config = [])
	{
		$field->markup = 'none';

		return parent::g_onCCK_FieldRenderForm($field);
	}
}