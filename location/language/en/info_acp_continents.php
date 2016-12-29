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
	'ACP_CONTINENTS'	=> 'Continents',

	'LOG_CONTINENT_ADD'		=> '<strong>Added new continent</strong><br>» %s',
	'LOG_CONTINENT_DELETE'	=> '<strong>Deleted continent</strong><br>» %s',
	'LOG_CONTINENT_DISABLE'	=> '<strong>Disabled continent</strong><br>» %s',
	'LOG_CONTINENT_EDIT'	=> '<strong>Edited continent data</strong><br>» %s',
	'LOG_CONTINENT_ENABLE'	=> '<strong>Enabled continent</strong><br>» %s',
));
