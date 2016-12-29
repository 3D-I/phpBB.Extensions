<?php
/**
* This file is part of the Location package.
*
* @copyright (c) VinaBB <vinabb.vn>
* @license GNU General Public License, version 2 (GPL-2.0)
*/

namespace vinabb\location\migrations\v10x;

/**
* Migration stage 1: Initial schema
*/
class m1_initial_schema extends \phpbb\db\migration\migration
{
	/** @var string */
	private $gdecimal;

	/**
	* Geographic Decimal: decimal(10, 6)
	*/
	private function set_gdecimal()
	{
		switch ($this->db->get_sql_layer())
		{
			case 'sqlite3':
				$this->gdecimal = 'DECIMAL(10,6)';
			break;

			case 'mssql_odbc':
			case 'mssqlnative':
				$this->gdecimal = '[float]';
			break;

			case 'oracle':
				$this->gdecimal = 'number(10, 6)';
			break;

			default:
				$this->gdecimal = 'decimal(10,6)';
			break;
		}
	}

	/**
	* Add tables to the database
	*
	* @return array
	*/
	public function update_schema()
	{
		$this->set_gdecimal();

		return [
			'add_tables'	=> [
				$this->table_prefix . 'continents'			=> $this->get_schema_continents(),
				$this->table_prefix . 'countries'			=> $this->get_schema_countries(),
				$this->table_prefix . 'country_units'		=> $this->get_schema_country_units(),
				$this->table_prefix . 'languages'			=> $this->get_schema_languages(),
				$this->table_prefix . 'language_scripts'	=> $this->get_schema_language_scripts(),
				$this->table_prefix . 'currencies'			=> $this->get_schema_currencies()
			]
		];
	}

	/**
	* Get schema for the table: _continents
	*
	* @return array
	*/
	protected function get_schema_continents()
	{
		return [
			'COLUMNS'		=> [
				'continent_id'		=> ['UINT', null, 'auto_increment'],
				'continent_code'	=> ['VCHAR:2', ''],
				'continent_name'	=> ['VCHAR_UNI', ''],
				'continent_person'	=> ['VCHAR_UNI', ''],
				'continent_people'	=> ['VCHAR_UNI', ''],
				'continent_adj'		=> ['VCHAR_UNI', ''],
				'continent_enabled'	=> ['BOOL', 1]
			],
			'PRIMARY_KEY'	=> 'continent_id',
			'KEYS'			=> [
				'cn_code'	=> ['UNIQUE', 'continent_code']
			]
		];
	}

	/**
	* Get schema for the table: _countries
	*
	* @return array
	*/
	protected function get_schema_countries()
	{
		return [
			'COLUMNS'		=> [
				'country_id'			=> ['UINT', null, 'auto_increment'],
				'continent_code'		=> ['VCHAR:2', ''],
				'country_code'			=> ['VCHAR:2', ''],
				'country_name'			=> ['VCHAR_UNI', ''],
				'country_lang'			=> ['VCHAR', ''],
				'country_localname'		=> ['VCHAR_UNI', ''],
				'country_fullname'		=> ['VCHAR_UNI', ''],
				'country_type'			=> ['VCHAR:1', ''],
				'country_person'		=> ['VCHAR_UNI', ''],
				'country_people'		=> ['VCHAR_UNI', ''],
				'country_adj'			=> ['VCHAR_UNI', ''],
				'country_parent'		=> ['VCHAR:2', ''],
				'country_unit'			=> ['VCHAR:2', ''],
				'country_capital'		=> ['VCHAR:6', ''],
				'country_iso_2'			=> ['VCHAR:2', ''],
				'country_iso_3'			=> ['VCHAR:3', ''],
				'country_currency'		=> ['VCHAR:3', ''],
				'country_phone_idd'		=> ['VCHAR:3', ''],
				'country_phone_code'	=> ['VCHAR', ''],
				'country_date'			=> ['VCHAR:12', ''],
				'country_flag'			=> ['VCHAR', ''],
				'country_timezone'		=> ['VCHAR', ''],
				'country_enabled'		=> ['BOOL', 1]
			],
			'PRIMARY_KEY'	=> 'country_id',
			'KEYS'			=> [
				'ct_code'	=> ['UNIQUE', 'country_code'],
				'cn_code'	=> ['INDEX', 'continent_code'],
				'cu_code'	=> ['INDEX', 'country_unit'],
				'cr_code'	=> ['INDEX', 'country_currency']
			]
		];
	}

	/**
	* Get schema for the table: _country_units
	*
	* @return array
	*/
	protected function get_schema_country_units()
	{
		return [
			'COLUMNS'		=> [
				'unit_id'						=> ['UINT', null, 'auto_increment'],
				'country_code'					=> ['VCHAR:2', ''],
				'lv1_code'						=> ['VCHAR:2', ''],
				'lv2_code'						=> ['VCHAR:2', ''],
				'lv3_code'						=> ['VCHAR:2', ''],
				'unit_code'						=> ['VCHAR:2', ''],
				'unit_name'						=> ['VCHAR_UNI', ''],
				'unit_localname'				=> ['VCHAR_UNI', ''],
				'unit_othername'				=> ['VCHAR_UNI', ''],
				'unit_type'						=> ['VCHAR:2', ''],
				'unit_capital'					=> ['VCHAR:2', ''],
				'unit_lat ' . $this->gdecimal	=> ['', 0],// Little hack to add new datatype :p
				'unit_lng ' . $this->gdecimal	=> ['', 0],// Little hack to add new datatype :p
				'unit_currency'					=> ['VCHAR:3', ''],
				'unit_phone_code'				=> ['VCHAR', ''],
				'unit_date'						=> ['VCHAR:12', ''],
				'unit_flag'						=> ['VCHAR', ''],
				'unit_timezone'					=> ['VCHAR', ''],
				'unit_legend'					=> ['BOOL', 0],
				'unit_enabled'					=> ['BOOL', 1]
			],
			'PRIMARY_KEY'	=> 'unit_id',
			'KEYS'			=> [
				'cu_code'	=> ['UNIQUE', 'unit_code'],
				'ct_code'	=> ['INDEX', 'country_code'],
				'l1_code'	=> ['INDEX', 'lv1_code'],
				'l2_code'	=> ['INDEX', 'lv2_code'],
				'l3_code'	=> ['INDEX', 'lv3_code'],
				'cr_code'	=> ['INDEX', 'unit_currency']
			]
		];
	}

	/**
	* Get schema for the table: _languages
	*
	* @return array
	*/
	protected function get_schema_languages()
	{
		return [
			'COLUMNS'		=> [
				'lang_id'				=> ['UINT', null, 'auto_increment'],
				'lang_code'				=> ['VCHAR:3', ''],
				'script_code'			=> ['VCHAR:4', ''],
				'lang_name'				=> ['VCHAR_UNI', ''],
				'lang_localname'		=> ['VCHAR_UNI', ''],
				'lang_root'				=> ['VCHAR:3', ''],
				'lang_iso_1'			=> ['VCHAR:2', ''],
				'lang_iso_2t'			=> ['VCHAR:3', ''],
				'lang_iso_2b'			=> ['VCHAR:3', ''],
				'lang_iso_3'			=> ['VCHAR', ''],
				'lang_number_decimal'	=> ['VCHAR', ''],
				'lang_number_group'		=> ['VCHAR', ''],
				'lang_number_list'		=> ['VCHAR', ''],
				'lang_format_date'		=> ['VCHAR', ''],
				'lang_format_time'		=> ['VCHAR', ''],
				'lang_format_datetime'	=> ['VCHAR', ''],
				'lang_enabled'			=> ['BOOL', 1]
			],
			'PRIMARY_KEY'	=> 'lang_id',
			'KEYS'			=> [
				'l_code'	=> ['UNIQUE', 'lang_code'],
				'ls_code'	=> ['INDEX', 'script_code']
			]
		];
	}

	/**
	* Get schema for the table: _language_scripts
	*
	* @return array
	*/
	protected function get_schema_language_scripts()
	{
		return [
			'COLUMNS'		=> [
				'script_id'			=> ['UINT', null, 'auto_increment'],
				'script_code'		=> ['VCHAR:4', ''],
				'script_name'		=> ['VCHAR_UNI', ''],
				'script_direction'	=> ['VCHAR:3', ''],
				'script_iso'		=> ['VCHAR:3', ''],
				'script_enabled'	=> ['BOOL', 1]
			],
			'PRIMARY_KEY'	=> 'script_id',
			'KEYS'			=> [
				'ls_code'	=> ['UNIQUE', 'script_code']
			]
		];
	}

	/**
	* Get schema for the table: _currencies
	*
	* @return array
	*/
	protected function get_schema_currencies()
	{
		return [
			'COLUMNS'		=> [
				'currency_id'				=> ['UINT', null, 'auto_increment'],
				'currency_code'				=> ['VCHAR:3', ''],
				'currency_name'				=> ['VCHAR_UNI', ''],
				'currency_localname'		=> ['VCHAR_UNI', ''],
				'currency_fullname'			=> ['VCHAR_UNI', ''],
				'currency_local_fullname'	=> ['VCHAR_UNI', ''],
				'currency_iso'				=> ['VCHAR:3', ''],
				'currency_symbol'			=> ['VCHAR_UNI', ''],
				'currency_digits'			=> ['TINT:1', 0],
				'currency_enabled'			=> ['BOOL', 1]
			],
			'PRIMARY_KEY'	=> 'currency_id',
			'KEYS'			=> [
				'cr_code'	=> ['UNIQUE', 'currency_code']
			]
		];
	}

	/**
	* Drop tables from the database
	*
	* @return array
	*/
	public function revert_schema()
	{
		return [
			'drop_tables'	=> [
				$this->table_prefix . 'continents',
				$this->table_prefix . 'countries',
				$this->table_prefix . 'country_units',
				$this->table_prefix . 'languages',
				$this->table_prefix . 'language_scripts',
				$this->table_prefix . 'currencies'
			]
		];
	}
}
