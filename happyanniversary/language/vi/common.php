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
	'HAPPY_ANNIVERSARY'			=> 'Kỷ niệm ngày tham gia',
	'HAPPY_ANNIVERSARY_TEXT'	=> 'Thành viên: <strong>%s</strong>',

	'NOTIFICATION_HAPPY_ANNIVERSARY'		=> '%1$s, chúc mừng ngày kỷ niệm %2$d năm thành viên của bạn.',
	'NOTIFICATION_TYPE_HAPPY_ANNIVERSARY'	=> 'Chúc mừng ngày kỷ niệm thành viên',
));
