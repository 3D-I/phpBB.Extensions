<?php
/**
* This file is part of the Location package.
*
* @copyright (c) VinaBB <vinabb.vn>
* @license GNU General Public License, version 2 (GPL-2.0)
*/

namespace vinabb\location\migrations\v10x;

/**
* Migration stage 3: Initial permission
*/
class m3_initial_permission extends \phpbb\db\migration\migration
{
	/**
	* Add or update data in the database
	*
	* @return array
	*/
	public function update_data()
	{
		return [
			['permission.add', ['a_location', true]],
			['permission.permission_set', ['ROLE_ADMIN_FULL', 'a_location']],
			['permission.permission_set', ['ROLE_ADMIN_STANDARD', 'a_location']]
		];
	}
}
