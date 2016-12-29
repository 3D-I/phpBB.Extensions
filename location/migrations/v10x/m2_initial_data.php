<?php
/**
* This file is part of the Location package.
*
* @copyright (c) VinaBB <vinabb.vn>
* @license GNU General Public License, version 2 (GPL-2.0)
*/

namespace vinabb\location\migrations\v10x;

/**
* Migration stage 2: Initial data
*/
class m2_initial_data extends \phpbb\db\migration\migration
{
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
		return [['custom', [[$this, 'insert_country_data']]]];
	}

	/**
	* Add countries to the database
	*/
	public function insert_country_data()
	{
		// Load the insert buffer class to perform a buffered multi insert
		$insert_buffer = new \phpbb\db\sql_insert_buffer($this->db, $this->table_prefix . 'countries');

		// Prepare data
		$country_data = [
			[
				'continent'		=> 'AS',
				'code'			=> 'AF',
				'name'			=> 'Afghanistan',
				'lang'			=> 'ps|prs',
				'localname'		=> 'افغانستان|افغانستان',
				'fullname'		=> 'REPUBLIC_I_OF_NAME',
				'person'		=> 'Afghan',
				'people'		=> 'Afghans',
				'adj'			=> 'Afghan',
				'parent'		=> '',
				'unit'			=> '',
				'capital'		=> '',
				'iso_2'			=> 'AF',
				'iso_3'			=> 'AFG',
				'currency'		=> 'AFN',
				'phone_idd'		=> '00',
				'phone_code'	=> '93',
				'date'			=> '1919-08-19',
				'flag'			=> 'af.svg',
				'timezone'		=> 'Asia/Kabul',
				'enabled'		=> true
			]
		];

		// Insert data
		foreach ($country_data as $data)
		{
			$insert_buffer->insert([
				'continent_code'		=> $data['continent'],
				'country_code'			=> $data['code'],
				'country_name'			=> $data['name'],
				'country_lang'			=> $data['lang'],
				'country_localname'		=> $data['localname'],
				'country_fullname'		=> $data['fullname'],
				'country_person'		=> $data['person'],
				'country_people'		=> $data['people'],
				'country_adj'			=> $data['adj'],
				'country_parent'		=> $data['parent'],
				'country_unit'			=> $data['unit'],
				'country_capital'		=> $data['capital'],
				'country_iso_2'			=> $data['iso_2'],
				'country_iso_3'			=> $data['iso_3'],
				'country_currency'		=> $data['currency'],
				'country_phone_idd'		=> $data['phone_idd'],
				'country_phone_code'	=> $data['phone_code'],
				'country_date'			=> $data['date'],
				'country_flag'			=> $data['flag'],
				'country_timezone'		=> $data['timezone'],
				'country_enabled'		=> $data['enabled'],
			]);
		}

		// Flush the buffer
		$insert_buffer->flush();
	}
}
