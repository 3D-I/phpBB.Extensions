<?php
/**
* This file is part of the Happy Anniversary package.
*
* @copyright (c) VinaBB <vinabb.vn>
* @license GNU General Public License, version 2 (GPL-2.0)
*/

namespace vinabb\happyanniversary\event;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;

/**
* PHP events
*/
class listener implements EventSubscriberInterface
{
	/** @var \phpbb\cache\driver\driver_interface */
	protected $cache;

	/** @var \phpbb\config\config */
	protected $config;

	/** @var \phpbb\db\driver\driver_interface */
	protected $db;

	/** @var \phpbb\language\language */
	protected $language;

	/** @var \phpbb\notification\manager */
	protected $notification;

	/** @var \phpbb\template\template */
	protected $template;

	/** @var \phpbb\user */
	protected $user;

	/**
	* Constructor
	*
	* @param \phpbb\cache\driver\driver_interface	$cache			Cache object
	* @param \phpbb\config\config					$config			Config object
	* @param \phpbb\db\driver\driver_interface		$db				Database object
	* @param \phpbb\language\language				$language		Language object
	* @param \phpbb\notification\manager			$notification	Notification manager
	* @param \phpbb\template\template				$template		Template object
	* @param \phpbb\user							$user			User object
	*/
	public function __construct(
		\phpbb\cache\driver\driver_interface $cache,
		\phpbb\config\config $config,
		\phpbb\db\driver\driver_interface $db,
		\phpbb\language\language $language,
		\phpbb\notification\manager $notification,
		\phpbb\template\template $template,
		\phpbb\user $user
	)
	{
		$this->cache = $cache;
		$this->config = $config;
		$this->db = $db;
		$this->language = $language;
		$this->notification = $notification;
		$this->template = $template;
		$this->user = $user;
	}

	/**
	* List of phpBB's PHP events to be used
	*
	* @return array
	*/
	static public function getSubscribedEvents()
	{
		return [
			'core.user_setup'				=> 'user_setup',
			'core.index_modify_page_title'	=> 'index_modify_page_title'
		];
	}

	/**
	* core.user_setup
	*
	* @param array $event Data from the PHP event
	*/
	public function user_setup($event)
	{
		// Add our common language variables
		$lang_set_ext = $event['lang_set_ext'];
		$lang_set_ext[] = [
			'ext_name' => 'vinabb/happyanniversary',
			'lang_set' => 'common'
		];
		$event['lang_set_ext'] = $lang_set_ext;
	}

	/**
	* core.index_modify_page_title
	*
	* @param array $event Data from the PHP event
	*/
	public function index_modify_page_title($event)
	{
		// Get the list of anniversary users
		$anniversary_users = '';

		foreach ($this->get_cache() as $user_id => $user_data)
		{
			$anniversary_users .= (($anniversary_users == '') ? '' : ', ') . get_username_string('full', $user_id, $user_data['username'], $user_data['user_colour']) . ' (' . $user_data['years'] . ')';
		}

		// Output
		$this->template->assign_var('HAPPY_ANNIVERSARY_TEXT', ($anniversary_users != '') ? $this->language->lang('HAPPY_ANNIVERSARY_TEXT', $anniversary_users) : '');
	}

	/**
	* Build cache for anniversary users, then push notifications to them once
	*
	* @return array
	*/
	protected function get_cache()
	{
		if (($anniversary_data = $this->cache->get('_vinabb_happyanniversary')) === false)
		{
			$anniversary_data = [];
		}

		// Current time
		$time = time();
		$now_year = date('Y', $time);

		// When do need to refresh cache?
		$next_time = strtotime('+1 day');
		$expired_time = strtotime(date('d', $next_time) . '-' . date('m', $next_time) . '-'. date('Y', $next_time) . ' 00:00:00');

		if ($now_year > $this->config['vinabb_happyanniversary_begin_year'] && (!sizeof($anniversary_data) || $time > $expired_time))
		{
			$anniversary_data = [];

			$sql = $this->db->sql_build_query('SELECT', $this->build_sql($time));
			$result = $this->db->sql_query($sql);

			while ($row = $this->db->sql_fetchrow($result))
			{
				$anniversary_data[$row['user_id']] = [
					'username'		=> $row['username'],
					'user_colour'	=> $row['user_colour'],
					'years'			=> $now_year - date('Y', $row['user_regdate'])
				];
			}
			$this->db->sql_freeresult($result);

			// Push a notification and/or send an email to the user
			if (sizeof($anniversary_data))
			{
				$this->notification->add_notifications('vinabb.happyanniversary.notification.type.happy_anniversary', $anniversary_data);
			}

			// The next day, how many seconds left?
			$this->cache->put('_vinabb_happyanniversary', $anniversary_data, $expired_time - $time);
		}

		return $anniversary_data;
	}

	/**
	* Build SQL query for anniversary users
	*
	* @param int $time Timestamp
	* @return array
	*/
	protected function build_sql($time)
	{
		$sql_or = $this->build_sql_or($time);
		$sql_and = ($sql_or == '') ? '' : "AND ({$sql_or})";

		// Build the query
		$sql_ary = [
			'SELECT' => 'u.user_id, u.username, u.user_colour, u.user_regdate',
			'FROM' => [USERS_TABLE => 'u'],
			'LEFT_JOIN' => [
				[
					'FROM' => [BANLIST_TABLE => 'b'],
					'ON' => 'u.user_id = b.ban_userid'
				]
			],
			'WHERE' => '(b.ban_id IS NULL OR b.ban_exclude = 1)
				AND ' . $this->db->sql_in_set('u.user_type', [USER_NORMAL, USER_FOUNDER]) .
				$sql_and,
			'ORDER_BY'	=> 'u.user_regdate'
		];

		return $sql_ary;
	}

	/**
	* Build SQL OR sub-query for each year
	*
	* @param int $time Timestamp
	* @return string
	*/
	protected function build_sql_or($time)
	{
		$sql_or = '';

		// Current date
		$now_year = date('Y', $time);
		$now_month = date('m', $time);
		$now_day = date('d', $time);

		// Does Time Machine already exist?
		$i = $now_year - 1;

		for ($i; $i >= $this->config['vinabb_happyanniversary_begin_year']; $i--)
		{
			$sql_or .= ($sql_or == '') ? '' : ' OR ';
			$sql_or .= '(u.user_regdate > ' . (strtotime("{$now_day}-{$now_month}-{$i} 00:00:00") - 1) . ' AND u.user_regdate < ' . (strtotime("{$now_day}-{$now_month}-{$i} 23:59:59") + 1) . ')';
		}

		// Display anniversary of 29th february on 28th february in non-leap-years
		if ($now_day == '28' && $now_month == '02' && !date('L', $time) && date('L', strtotime("01-01-{$i}")))
		{
			$sql_or .= ($sql_or == '') ? '' : ' OR ';
			$sql_or .= '(u.user_regdate > ' . (strtotime("29-02-{$i} 00:00:00") - 1) . ' AND u.user_regdate < ' . (strtotime("29-02-{$i} 23:59:59") + 1) . ')';
		}

		return $sql_or;
	}
}
