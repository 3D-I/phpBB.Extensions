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
	'EMOJI_SMILIES_SETTINGS_UPDATED'	=> 'The Emoji smilies settings have been updated.',
	'EMOJI_TYPE'						=> 'Emoji type',
	'EMOJI_TYPE_EMOJIONE'				=> 'Emoji One',
	'EMOJI_TYPE_RAW'					=> 'Native',
	'EMOJI_TYPE_TWITTER'				=> 'Twitter Twemoji',

	'SMILEY_TYPE'		=> 'Smiley type',
	'SMILEY_TYPE_EMOJI'	=> 'Emoji (Unicode characters)',
	'SMILEY_TYPE_IMG'	=> 'Normal images'
]);
