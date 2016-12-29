<?php
/**
* This file is part of the Location package.
*
* @copyright (c) VinaBB <vinabb.vn>
* @license GNU General Public License, version 2 (GPL-2.0)
*/

namespace vinabb\location\migrations\converter;

/**
* Converter stage 3: Convert module
*/
class c3_convert_module extends \phpbb\db\migration\migration
{
	/**
	* Skip this migration if an ACP_FLAGS module does not exist
	*
	* @return bool True to skip this migration, false to run it
	*/
	public function effectively_installed()
	{
		$sql = 'SELECT module_id
			FROM ' . $this->table_prefix . "modules
			WHERE module_class = 'acp'
				AND module_langname = 'ACP_FLAGS'";
		$result = $this->db->sql_query($sql);
		$module_id = (int) $this->db->sql_fetchfield('module_id');
		$this->db->sql_freeresult($result);

		// Skip migration if ACP_FLAGS module does not exist
		return !$module_id;
	}

	/**
	* Add or update data in the database
	*
	* @return array
	*/
	public function update_data()
	{
		return [
			// Remove old ACP_FLAGS module if it exists
			['if', [
				['module.exists', ['acp', false, 'ACP_FLAGS']],
				['module.remove', ['acp', false, 'ACP_FLAGS']]
			]]
		];
	}
}
