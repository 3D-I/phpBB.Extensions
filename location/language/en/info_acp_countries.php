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
	'ACP_COUNTRIES'	=> 'Countries',

	'LOG_COUNTRY_ADD'		=> '<strong>Added new country</strong><br>» %s',
	'LOG_COUNTRY_DELETE'	=> '<strong>Deleted country</strong><br>» %s',
	'LOG_COUNTRY_DISABLE'	=> '<strong>Disabled country</strong><br>» %s',
	'LOG_COUNTRY_EDIT'		=> '<strong>Edited country data</strong><br>» %s',
	'LOG_COUNTRY_ENABLE'	=> '<strong>Enabled country</strong><br>» %s',
));
