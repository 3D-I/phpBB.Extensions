<?php
/**
* This file is part of the Emoji Smilies package.
*
* @copyright (c) VinaBB <vinabb.vn>
* @license GNU General Public License, version 2 (GPL-2.0)
*/

namespace vinabb\emojismilies\migrations;

use phpbb\db\migration\migration;

class config extends migration
{
	/**
	* Update data
	*
	* @return array
	*/
	public function update_data()
	{
		return [
			['config.add', ['vinabb_emojismilies_smiley_type', 0]],
			['config.add', ['vinabb_emojismilies_emoji_type', 1]],
			['config.update', ['smilies_path', 'ext/vinabb/emojismilies/smilies']]
		];
	}

	/**
	* Revert data
	*
	* @return array
	*/
	public function revert_data()
	{
		return [
			['config.remove', ['vinabb_emojismilies_smiley_type']],
			['config.remove', ['vinabb_emojismilies_emoji_type']],
			['config.update', ['smilies_path', 'images/smilies']]
		];
	}
}
