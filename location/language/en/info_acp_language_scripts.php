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
	'ACP_LANG_SCRIPTS'	=> 'Language scripts',

	'LOG_LANG_SCRIPT_ADD'		=> '<strong>Added new language script</strong><br>» %s',
	'LOG_LANG_SCRIPT_DELETE'	=> '<strong>Deleted language script</strong><br>» %s',
	'LOG_LANG_SCRIPT_DISABLE'	=> '<strong>Disabled language script</strong><br>» %s',
	'LOG_LANG_SCRIPT_EDIT'		=> '<strong>Edited language script data</strong><br>» %s',
	'LOG_LANG_SCRIPT_ENABLE'	=> '<strong>Enabled language script</strong><br>» %s',
));
