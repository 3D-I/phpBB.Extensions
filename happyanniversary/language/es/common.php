<?php
/**
* This file is part of the Happy Anniversary package.
*
* @copyright (c) VinaBB <vinabb.vn>
* @license GNU General Public License, version 2 (GPL-2.0)
*/

/**
* DO NOT CHANGE
*/
if (!defined('IN_PHPBB'))
{
	exit;
}

if (empty($lang) || !is_array($lang))
{
	$lang = array();
}

/**
* All language files should use UTF-8 as their encoding
* and the files must not contain a BOM.
*/
$lang = array_merge($lang, array(
	'HAPPY_ANNIVERSARY'			=> 'Feliz aniversario',
	'HAPPY_ANNIVERSARY_TEXT'	=> 'Enhorabuena a: <strong>%s</strong>',

	'NOTIFICATION_HAPPY_ANNIVERSARY'		=> '%1$s, es un gran honor estar con ustedes hoy para celebrar el aniversario de %2$d años como miembro.',
	'NOTIFICATION_TYPE_HAPPY_ANNIVERSARY'	=> 'Día del aniversario de miembros',
));
