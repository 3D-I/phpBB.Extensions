<?php
/**
* This file is part of the Location package.
*
* @copyright (c) VinaBB <vinabb.vn>
* @license GNU General Public License, version 2 (GPL-2.0)
*/

namespace vinabb\location\migrations\v10x;

/**
* Migration stage 4: Initial module
*/
class m4_initial_module extends \phpbb\db\migration\migration
{
	/**
	* Assign migration file dependencies for this migration
	*
	* @return array
	*/
	static public function depends_on()
	{
		return ['\vinabb\location\migrations\converter\c3_convert_module', '\vinabb\location\migrations\v10x\m3_initial_permission'];
	}

	/**
	* Add or update data in the database
	*
	* @return array
	*/
	public function update_data()
	{
		return [
			['module.add', ['acp', 'ACP_CAT_DOT_MODS', 'ACP_CAT_LOCATION']],
			['module.add', ['acp', 'ACP_CAT_LOCATION', [
				'module_basename'	=> '\vinabb\location\acp\location_settings_module',
				'modes'				=> ['main']
			]]],
			['module.add', ['acp', 'ACP_CAT_LOCATION', [
				'module_basename'	=> '\vinabb\location\acp\continents_module',
				'modes'				=> ['main']
			]]],
			['module.add', ['acp', 'ACP_CAT_LOCATION', [
				'module_basename'	=> '\vinabb\location\acp\countries_module',
				'modes'				=> ['main']
			]]],
			['module.add', ['acp', 'ACP_CAT_LOCATION', [
				'module_basename'	=> '\vinabb\location\acp\country_units_module',
				'modes'				=> ['main']
			]]],
			['module.add', ['acp', 'ACP_CAT_LOCATION', [
				'module_basename'	=> '\vinabb\location\acp\languages_module',
				'modes'				=> ['main']
			]]],
			['module.add', ['acp', 'ACP_CAT_LOCATION', [
				'module_basename'	=> '\vinabb\location\acp\language_scripts_module',
				'modes'				=> ['main']
			]]],
			['module.add', ['acp', 'ACP_CAT_LOCATION', [
				'module_basename'	=> '\vinabb\location\acp\currencies_module',
				'modes'				=> ['main']
			]]]
		];
	}
}
