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
	'ACP_CONTINENTS_EXPLAIN'	=> 'Here you are able to add, edit or remove continents.',
	'ACP_CONTINENTS_MODES'		=> array(
		'add'		=> 'Add new continent',
		'delete'	=> 'Delete continent',
		'edit'		=> 'Edit continent data',
		'manage'	=> 'Manage continents',
	),
	'ACP_COUNTRIES_EXPLAIN'		=> 'Here you are able to add, edit or remove countries. The default country is marked with an asterisk (*).',
	'ACP_COUNTRIES_MODES'		=> array(
		'add'		=> 'Add new country',
		'delete'	=> 'Delete country',
		'edit'		=> 'Edit country data',
		'manage'	=> 'Manage countries',
	),
	'ACP_COUNTRY_UNITS_EXPLAIN'	=> 'Here you are able to add, edit or remove administrative units.',
	'ACP_COUNTRY_UNITS_MODES'	=> array(
		'add'		=> 'Add new unit',
		'delete'	=> 'Delete unit',
		'edit'		=> 'Edit unit data',
		'manage'	=> 'Manage units',
	),
	'ACP_CURRENCIES_EXPLAIN'	=> 'Here you are able to add, edit or remove currencies.',
	'ACP_CURRENCIES_MODES'		=> array(
		'add'		=> 'Add new currency',
		'delete'	=> 'Delete currency',
		'edit'		=> 'Edit currency data',
		'manage'	=> 'Manage currencies',
	),
	'ACP_LANG_SCRIPTS_EXPLAIN'	=> 'Here you are able to add, edit or remove countries’ language scripts.',
	'ACP_LANG_SCRIPTS_MODES'	=> array(
		'add'		=> 'Add new script',
		'delete'	=> 'Delete script',
		'edit'		=> 'Edit script data',
		'manage'	=> 'Manage scripts',
	),
	'ACP_LANGUAGES_EXPLAIN'		=> 'Here you are able to add, edit or remove countries’ languages.',
	'ACP_LANGUAGES_MODES'		=> array(
		'add'		=> 'Add new language',
		'delete'	=> 'Delete language',
		'edit'		=> 'Edit language data',
		'manage'	=> 'Manage languages',
	),
));
