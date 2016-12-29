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
	'ACP_CURRENCIES'	=> 'Currencies',

	'LOG_CURRENCY_ADD'		=> '<strong>Added new currency</strong><br>» %s',
	'LOG_CURRENCY_DELETE'	=> '<strong>Deleted currency</strong><br>» %s',
	'LOG_CURRENCY_DISABLE'	=> '<strong>Disabled currency</strong><br>» %s',
	'LOG_CURRENCY_EDIT'		=> '<strong>Edited currency data</strong><br>» %s',
	'LOG_CURRENCY_ENABLE'	=> '<strong>Enabled currency</strong><br>» %s',
));
