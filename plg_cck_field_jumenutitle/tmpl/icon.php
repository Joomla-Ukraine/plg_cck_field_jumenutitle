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

use Joomla\CMS\Uri\Uri;

/** @var array $displayData */
$data = (object) $displayData;

?>
<?php if(isset($data->sprite)) : ?>
	<?php
	$size = 20;
	if(isset($data->size))
	{
		$size = $data->size;
	}
	?>
	<svg width="<?php echo $size; ?>" height="<?php echo $size; ?>"<?php echo(isset($data->class) && $data->class ? ' class="' . $data->class . '"' : ''); ?>>
		<use xlink:href="<?php Uri::base(true); ?>/<?php echo $data->sprite; ?>#<?php echo $data->icon; ?>"></use>
	</svg>
<?php endif; ?>