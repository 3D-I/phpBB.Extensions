<?php
/**
* This file is part of the Location package.
*
* @copyright (c) VinaBB <vinabb.vn>
* @license GNU General Public License, version 2 (GPL-2.0)
*/

namespace vinabb\location\migrations\v10x;

/**
* Migration stage 5: Additional config data
*/
class m5_add_config_data extends \phpbb\db\migration\migration
{
	/**
	* Add or update data in the database
	*
	* @return array
	*/
	public function update_data()
	{
		$prefix = 'vinabb_location_';

		return [
			['config.add', [$prefix . 'continent_name', 'TRANSLATION']],
			['config.add', [$prefix . 'country_name', 'ENGLISH_OR_LOCAL']],
			['config.add', [$prefix . 'unit_name', 'ENGLISH_OR_LOCAL']],
			['config.add', [$prefix . 'nationality_name', 'ENGLISH_OR_LOCAL']],
			['config.add', [$prefix . 'display_level', '3']],
			['config.add', [$prefix . 'require_level', '0']],
			['config.add', [$prefix . 'display_in_profile', '1']],
			['config.add', [$prefix . 'display_in_post', '1']],
			['config.add', [$prefix . 'display_in_pm', '1']],
			['config.add', [$prefix . 'display_in_memberlist', '1']],
			['config.add', [$prefix . 'display_in_group', '0']],
			['config.add', [$prefix . 'display_in_teampage', '0']],
			['config.add', [$prefix . 'enable_nationality', '0']],
			['config.add', [$prefix . 'require_nationality', '0']],
			['config.add', [$prefix . 'allow_change_nationality', '1']],
			['config.add', [$prefix . 'change_nationality_times', '0']],
			['config.add', [$prefix . 'display_nationality_in_profile', '1']],
			['config.add', [$prefix . 'display_nationality_in_post', '0']],
			['config.add', [$prefix . 'display_nationality_in_pm', '0']],
			['config.add', [$prefix . 'display_nationality_in_memberlist', '0']],
			['config.add', [$prefix . 'display_nationality_in_group', '0']],
			['config.add', [$prefix . 'display_nationality_in_teampage', '0']]
		];
	}
}
