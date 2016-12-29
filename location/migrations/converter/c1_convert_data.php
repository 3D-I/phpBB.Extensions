<?php
/**
* This file is part of the Location package.
*
* @copyright (c) VinaBB <vinabb.vn>
* @license GNU General Public License, version 2 (GPL-2.0)
*/

namespace vinabb\location\migrations\converter;

/**
* Converter stage 1: Convert data
*/
class c1_convert_data extends \phpbb\db\migration\migration
{
	/**
	* Skip this migration if a previous pages table does not
	* exist, or our pages table is already installed
	*
	* @return bool True to skip this migration, false to run it
	*/
	public function effectively_installed()
	{
		return !$this->db_tools->sql_table_exists($this->table_prefix . 'flags') || $this->db_tools->sql_column_exists($this->table_prefix . 'users', 'user_location');
	}

	/**
	* Assign migration file dependencies for this migration
	*
	* @return array
	*/
	static public function depends_on()
	{
		return ['\nedka\location\migrations\v10x\m1_initial_schema'];
	}

	/**
	* Add or update data in the database
	*
	* @return array
	*/
	public function update_data()
	{
		return [['custom', [[$this, 'convert_data']]]];
	}

	/**
	* Custom function to convert and add data
	*/
	public function convert_data()
	{
		// Get data from old column, also convert country codes to UPPERCASE
		$this->db->sql_query('UPDATE ' . $this->table_prefix . 'users SET user_location = UPPER(user_flag)');

		// Update some old country codes
		// 'Ascension Island' [AC] is now part of 'Saint Helena, Ascension and Tristan Da Cunha' [SH]
		$this->db->sql_query('UPDATE ' . $this->table_prefix . "users SET user_location = 'SH' WHERE user_location = 'AC'");

		// 'Netherlands Antilles' [AN] is part of 'Kingdom of the Netherlands' [NL]
		$this->db->sql_query('UPDATE ' . $this->table_prefix . "users SET user_location = 'NL' WHERE user_location = 'AN'");
	}
}
