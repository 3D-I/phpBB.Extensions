<?php
/**
* This file is part of the Group Icons package.
*
* @copyright (c) VinaBB <vinabb.vn>
* @license The MIT License (MIT)
*/

namespace vinabb\groupicons\decorated\cache;

class service extends \phpbb\cache\service
{
	/**
	* Create cache: phpbb_groups
	*/
	public function get_group_data()
	{
		if (($group_data = $this->driver->get('_vinabb_groupicons_group_data')) === false)
		{
			$sql = 'SELECT *
				FROM ' . GROUPS_TABLE;
			$result = $this->db->sql_query($sql);

			$group_data = array();
			while ($row = $this->db->sql_fetchrow($result))
			{
				$group_data[$row['group_id']] = array(
					'name'		=> $row['group_name'],
					'colour'	=> $row['group_colour'],
					'icon'		=> $row['group_icon'],
				);
			}
			$this->db->sql_freeresult($result);

			$this->driver->put('_vinabb_groupicons_group_data', $group_data);
		}

		return $group_data;
	}

	/**
	* Create cache: phpbb_groups
	*/
	public function get_group_data_by_name()
	{
		if (($group_data = $this->driver->get('_vinabb_groupicons_group_data_by_name')) === false)
		{
			$sql = 'SELECT *
				FROM ' . GROUPS_TABLE;
			$result = $this->db->sql_query($sql);

			$group_data = array();
			while ($row = $this->db->sql_fetchrow($result))
			{
				$group_data[$row['group_name']] = array(
					'id'		=> $row['group_id'],
					'colour'	=> $row['group_colour'],
					'icon'		=> $row['group_icon'],
				);
			}
			$this->db->sql_freeresult($result);

			$this->driver->put('_vinabb_groupicons_group_data_by_name', $group_data);
		}

		return $group_data;
	}

	/**
	* Create cache: phpbb_groups
	*/
	public function get_group_data_by_color()
	{
		if (($group_data = $this->driver->get('_vinabb_groupicons_group_data_by_color')) === false)
		{
			$sql = 'SELECT *
				FROM ' . GROUPS_TABLE;
			$result = $this->db->sql_query($sql);

			$group_data = array();
			while ($row = $this->db->sql_fetchrow($result))
			{
				$group_data[$row['group_colour']] = array(
					'id'	=> $row['group_id'],
					'name'	=> $row['group_name'],
					'icon'	=> $row['group_icon'],
				);
			}
			$this->db->sql_freeresult($result);

			$this->driver->put('_vinabb_groupicons_group_data_by_color', $group_data);
		}

		return $group_data;
	}

	/**
	* Clear cache: phpbb_groups
	*/
	public function clear_group_data()
	{
		$this->driver->destroy('_vinabb_groupicons_group_data');
		$this->driver->destroy('_vinabb_groupicons_group_data_by_name');
		$this->driver->destroy('_vinabb_groupicons_group_data_by_color');
	}
}
