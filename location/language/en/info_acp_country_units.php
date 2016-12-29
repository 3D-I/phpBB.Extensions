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
	'ACP_COUNTRY_UNITS'	=> 'Administrative units',

	'LOG_COUNTRY_UNIT_ADD'		=> '<strong>Added new administrative unit</strong><br>» %s',
	'LOG_COUNTRY_UNIT_DELETE'	=> '<strong>Deleted administrative unit</strong><br>» %s',
	'LOG_COUNTRY_UNIT_DISABLE'	=> '<strong>Disabled administrative unit</strong><br>» %s',
	'LOG_COUNTRY_UNIT_EDIT'		=> '<strong>Edited administrative unit data</strong><br>» %s',
	'LOG_COUNTRY_UNIT_ENABLE'	=> '<strong>Enabled administrative unit</strong><br>» %s',
));
