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
	'HAPPY_ANNIVERSARY'			=> 'Happy anniversary',
	'HAPPY_ANNIVERSARY_TEXT'	=> 'Congratulations to: <strong>%s</strong>',

	'NOTIFICATION_HAPPY_ANNIVERSARY'		=> '%1$s, it is a great honour to be with you today to celebrate the %2$d-year membership anniversary.',
	'NOTIFICATION_TYPE_HAPPY_ANNIVERSARY'	=> 'Membership anniversary day',
));
