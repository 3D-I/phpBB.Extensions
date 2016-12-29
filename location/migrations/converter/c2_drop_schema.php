<?php
/**
* This file is part of the Location package.
*
* @copyright (c) VinaBB <vinabb.vn>
* @license GNU General Public License, version 2 (GPL-2.0)
*/

namespace vinabb\location\migrations\converter;

/**
* Converter stage 2: Drop old tables and columns
*/
class c2_drop_schema extends \phpbb\db\migration\migration
{
	/**
	* Skip this migration if a previous pages table does not
	* exist, or our pages table is already installed
	*
	* @return bool True to skip this migration, false to run it
	*/
	public function effectively_installed()
	{
		return !$this->db_tools->sql_table_exists($this->table_prefix . 'flags');
	}

	/**
	* Assign migration file dependencies for this migration
	*
	* @return array
	*/
	static public function depends_on()
	{
		return ['\nedka\location\migrations\converter\c1_convert_data'];
	}

	/**
	* RIP to Country Flag MOD :(
	*
	* @return array
	*/
	public function update_schema()
	{
		return [
			'drop_tables'	=> [$this->table_prefix . 'flags'],
			'drop_columns'	=> [
				$this->table_prefix . 'users'	=> ['user_flag'],
				$this->table_prefix . 'groups'	=> ['group_flag']
			]
		];
	}

	/**
	* Remove old config data
	*
	* @return array
	*/
	public function update_data()
	{
		return [
			['config.remove', ['flags_path']],
			['config.remove', ['require_flag']],
			['permission.remove', ['a_flags']]
		];
	}
}
