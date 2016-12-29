<?php
/**
* This file is part of the Happy Anniversary package.
*
* @copyright (c) VinaBB <vinabb.vn>
* @license GNU General Public License, version 2 (GPL-2.0)
*/

namespace vinabb\happyanniversary\notification\type;

class happy_anniversary extends \phpbb\notification\type\base
{
	/**
	* Get notification type name
	*
	* @return string
	*/
	public function get_type()
	{
		return 'vinabb.happyanniversary.notification.type.happy_anniversary';
	}

	/**
	* Notification option data (for outputting to the user)
	*
	* @var bool|array False if the service should use it's default data
	* 					Array of data (including keys 'id', 'lang', and 'group')
	*/
	public static $notification_option = array(
		'lang'	=> 'NOTIFICATION_TYPE_HAPPY_ANNIVERSARY',
		'group'	=> 'NOTIFICATION_GROUP_MISCELLANEOUS',
	);

	/**
	* Is this type available to the current user (defines whether or not it will be shown in the UCP Edit notification options)
	*
	* @return bool True/False whether or not this is available to the user
	*/
	public function is_available()
	{
		return true;
	}

	/**
	* Get the id of the notification
	*
	* @param array $data The data for the updated rules
	* @return int Id of the notification
	*/
	public static function get_item_id($data)
	{
		// Store the current year as item_id for notification, it displays only once each year
		return date('Y', time());
	}

	/**
	* Get the id of the parent
	*
	* @param array $data The data for the updated rules
	* @return int Id of the parent
	*/
	public static function get_item_parent_id($data)
	{
		// No parent
		return 0;
	}

	/**
	* Find the users who want to receive notifications
	*
	* @param array $data The type specific data
	* @param array $options Options for finding users for notification
	* 		ignore_users => array of users and user types that should not receive notifications from this type because they've already been notified
	* 						e.g.: array(2 => array(''), 3 => array('', 'email'), ...)
	*
	* @return array
	*/
	public function find_users_for_notification($data, $options = array())
	{
		$options = array_merge(array(
			'ignore_users'		=> array(),
		), $options);

		return $this->check_user_notification_options(array_keys($data), $options);
	}

	/**
	* Users needed to query before this notification can be displayed
	*
	* @return array Array of user_ids
	*/
	public function users_to_query()
	{
		return array();
	}

	/**
	* Get the user's avatar
	*
	* @return string
	*/
	public function get_avatar()
	{
		$row = array(
			'avatar'		=> $this->user->data['user_avatar'],
			'avatar_type'	=> $this->user->data['user_avatar_type'],
			'avatar_width'	=> $this->user->data['user_avatar_width'],
			'avatar_height'	=> $this->user->data['user_avatar_height'],
		);

		return phpbb_get_avatar($row, 'USER_AVATAR', false, false);
	}

	/**
	* Get the HTML formatted title of this notification
	*
	* @return string
	*/
	public function get_title()
	{
		$data = $this->get_data('anniversary');

		return $this->language->lang('NOTIFICATION_HAPPY_ANNIVERSARY', $data[$this->user_id]['username'], $data[$this->user_id]['years']);
	}

	/**
	* Get the url to this item
	*
	* @return string URL
	*/
	public function get_url()
	{
		return get_username_string('profile', $this->user->data['user_id'], $this->user->data['username'], $this->user->data['user_colour']);
	}

	/**
	* Get email template
	*
	* @return string|bool
	*/
	public function get_email_template()
	{
		return '@vinabb_happyanniversary/happy_anniversary';
	}

	/**
	* Get email template variables
	*
	* @return array
	*/
	public function get_email_template_variables()
	{
		$data = $this->get_data('anniversary');

		return array(
			'USERNAME'	=> htmlspecialchars_decode($data[$this->user_id]['username']),
			'YEARS'		=> $data[$this->user_id]['years'],
			'U_BOARD'	=> generate_board_url(),
		);
	}

	/**
	* Function for preparing the data for insertion in an SQL query
	* (The service handles insertion)
	*
	* @param array $data The data for the updated rules
	* @param array $pre_create_data Data from pre_create_insert_array()
	*
	* @return array Array of data ready to be inserted into the database
	*/
	public function create_insert_array($data, $pre_create_data = array())
	{
		$this->set_data('anniversary', $data);

		parent::create_insert_array($data, $pre_create_data);
	}
}
