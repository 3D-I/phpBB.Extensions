<?php
/**
* This file is part of the Location package.
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
	'ACP_LANGUAGES'	=> 'Languages',

	'LOG_LANGUAGE_ADD'		=> '<strong>Added new language</strong><br>» %s',
	'LOG_LANGUAGE_DELETE'	=> '<strong>Deleted language</strong><br>» %s',
	'LOG_LANGUAGE_DISABLE'	=> '<strong>Disabled language</strong><br>» %s',
	'LOG_LANGUAGE_EDIT'		=> '<strong>Edited language data</strong><br>» %s',
	'LOG_LANGUAGE_ENABLE'	=> '<strong>Enabled language</strong><br>» %s',
));
