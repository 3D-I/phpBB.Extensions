<?php
/**
* This file is part of the Emoji Smilies package.
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
	$lang = [];
}

/**
* All language files should use UTF-8 as their encoding
* and the files must not contain a BOM.
*/
$lang = array_merge($lang, [
	'ACP_EMOJI_SMILIES'			=> 'Emoji smilies',
	'ACP_EMOJI_SMILIES_EXPLAIN'	=> 'Convert phpBB smilies into native Emojis or use as normal images, with or without CDN.',

	'LOG_EMOJI_SMILIES_SETTINGS'	=> '<strong>Altered Emoji smilies settings</strong>'
]);
