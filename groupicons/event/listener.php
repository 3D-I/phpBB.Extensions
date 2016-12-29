<?php
/**
* This file is part of the Group Icons package.
*
* @copyright (c) VinaBB <vinabb.vn>
* @license The MIT License (MIT)
*/

namespace vinabb\groupicons\event;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class listener implements EventSubscriberInterface
{
	/** @var \phpbb\cache\service */
	protected $cache;

	/** @var \phpbb\language\language */
	protected $language;

	/** @var \phpbb\template\template */
	protected $template;

	/** @var \phpbb\request\request */
	protected $request;

	/** @var \phpbb\extension\manager */
	protected $ext_manager;

	/** @var \phpbb\path_helper */
	protected $path_helper;

	/** @var \phpbb\group\helper */
	protected $group_helper;

	/**
	* Constructor
	*
	* @param \phpbb\cache\service $cache
	* @param \phpbb\language\language $language
	* @param \phpbb\template\template $template
	* @param \phpbb\request\request $request
	* @param \phpbb\extension\manager $ext_manager
	* @param \phpbb\path_helper $path_helper
	* @param \phpbb\group\helper $group_helper
	*/
	public function __construct(
		\phpbb\cache\service $cache,
		\phpbb\language\language $language,
		\phpbb\template\template $template,
		\phpbb\request\request $request,
		\phpbb\extension\manager $ext_manager,
		\phpbb\path_helper $path_helper,
		\phpbb\group\helper $group_helper
	)
	{
		$this->cache = $cache;
		$this->language = $language;
		$this->template = $template;
		$this->request = $request;
		$this->ext_manager = $ext_manager;
		$this->path_helper = $path_helper;
		$this->group_helper = $group_helper;

		$this->ext_root_path = $this->ext_manager->get_extension_path('vinabb/groupicons', true);
		$this->ext_web_path = $this->path_helper->update_web_root_path($this->ext_root_path);
		$this->group_data_by_color = array();
	}

	/**
	* Event list
	*
	* @return array
	*/
	static public function getSubscribedEvents()
	{
		return array(
			'core.user_setup'						=> 'user_setup',
			'core.modify_username_string'			=> 'modify_username_string',
			'core.acp_manage_group_request_data'	=> 'acp_manage_group_request_data',
			'core.acp_manage_group_initialise_data'	=> 'acp_manage_group_initialise_data',
			'core.acp_manage_group_display_form'	=> 'acp_manage_group_display_form',
			'core.add_log'							=> 'add_log'
		);
	}

	/**
	* core.user_setup
	*
	* @param $event
	*/
	public function user_setup($event)
	{
		// Add our common language variables
		$lang_set_ext = $event['lang_set_ext'];
		$lang_set_ext[] = array(
			'ext_name' => 'vinabb/groupicons',
			'lang_set' => 'common',
		);
		$event['lang_set_ext'] = $lang_set_ext;
	}

	/**
	* core.modify_username_string
	*
	* @param $event
	*/
	public function modify_username_string($event)
	{
		// profile|username|colour|full|no_profile
		if ($event['mode'] == 'full')
		{
			if (!sizeof($this->group_data_by_color))
			{
				$this->group_data_by_color = $this->cache->get_group_data_by_color();
			}

			$key = str_replace('#', '', $event['username_colour']);
			$group_name = $this->group_helper->get_name($this->group_data_by_color[$key]['name'], true);
			$group_icon = !empty($this->group_data_by_color[$key]['icon']) ? '<img src="' . $this->ext_web_path . 'images/' . $this->group_data_by_color[$key]['icon'] . '" alt="' . $group_name . '" title="' . $group_name . '">' : '';
			$event['username_string'] = ($this->language->lang('DIRECTION') == 'ltr') ? $group_icon . $event['username_string'] : $event['username_string'] . $group_icon;
		}
	}

	/**
	* core.acp_manage_group_request_data
	*
	* @param $event
	*/
	public function acp_manage_group_request_data($event)
	{
		$submit_ary = $event['submit_ary'];
		$submit_ary['icon'] = $this->request->variable('group_icon', '');
		$event['submit_ary'] = $submit_ary;

		$validation_checks = $event['validation_checks'];
		$validation_checks['icon'] = array('match', true, '#(\.gif|\.png|\.jpg|\.jpeg)$#i');
		$event['validation_checks'] = $validation_checks;
	}

	/**
	* core.acp_manage_group_initialise_data
	*
	* @param $event
	*/
	public function acp_manage_group_initialise_data($event)
	{
		$test_variables = $event['test_variables'];
		$test_variables['icon'] = 'string';
		$event['test_variables'] = $test_variables;
	}

	/**
	* core.acp_manage_group_display_form
	*
	* @param $event
	*/
	public function acp_manage_group_display_form($event)
	{
		// Get from cache
		$group_data = $this->cache->get_group_data();

		// Current group icon
		$current_icon = $group_data[$event['group_id']]['icon'];

		// Group icon list
		$icon_list = filelist($this->ext_root_path . 'images/', '', 'gif|png|jpg|jpeg');
		$icon_options = '<option value=""' . (($current_icon == '') ? ' selected="selected"' : '') . '>' . $this->language->lang('SELECT_GROUP_ICON') . '</option>';

		foreach ($icon_list as $path => $icon_ary)
		{
			sort($icon_ary);

			foreach ($icon_ary as $icon)
			{
				$icon = $path . $icon;
				$selected = ($icon == $current_icon) ? ' selected="selected"' : '';
				$icon_options .= '<option value="' . $icon . '"' . $selected . '>' . $icon . '</option>';
			}
		}

		$this->template->assign_vars(array(
			'CURRENT_ICON_SRC'	=> !empty($current_icon) ? $this->ext_web_path . 'images/' . $current_icon : './images/spacer.gif',
			'ICONS_PATH'		=> $this->ext_web_path . 'images/',
			'ICON_OPTIONS'		=> $icon_options
		));
	}

	/**
	* core.add_log
	*
	* @param $event
	*/
	public function add_log($event)
	{
		if ($event['log_operation'] == 'LOG_GROUP_CREATED' || $event['log_operation'] == 'LOG_GROUP_DELETE' || $event['log_operation'] == 'LOG_GROUP_UPDATED')
		{
			$this->cache->clear_group_data();
		}
	}
}
