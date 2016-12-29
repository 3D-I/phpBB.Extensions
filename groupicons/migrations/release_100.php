<?php
/**
* This file is part of the Group Icons package.
*
* @copyright (c) VinaBB <vinabb.vn>
* @license The MIT License (MIT)
*/

namespace vinabb\groupicons\migrations;

class release_100 extends \phpbb\db\migration\migration
{
	public function update_schema()
	{
		return [
			'add_columns'	=> [$this->table_prefix . 'groups' => ['group_icon' => ['VCHAR', '']]]
		];
	}

	public function revert_schema()
	{
		return [
			'drop_columns'	=> [$this->table_prefix . 'groups' => ['group_icon']]
		];
	}
}
