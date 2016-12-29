<?php
/**
* This file is part of the Emoji Smilies package.
*
* @copyright (c) VinaBB <vinabb.vn>
* @license GNU General Public License, version 2 (GPL-2.0)
*/

namespace vinabb\emojismilies\migrations;

use phpbb\db\migration\migration;

class module extends migration
{
	/**
	* Update data
	*
	* @return array
	*/
	public function update_data()
	{
		return [
			['module.add', ['acp', 'ACP_MESSAGES', [
				'module_basename'	=> '\vinabb\emojismilies\acp\settings_module',
				'modes'				=> ['main']
			]]]
		];
	}
}
