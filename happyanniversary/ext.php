<?php
/**
* This file is part of the Happy Anniversary package.
*
* @copyright (c) VinaBB <vinabb.vn>
* @license GNU General Public License, version 2 (GPL-2.0)
*/

namespace vinabb\happyanniversary;

class ext extends \phpbb\extension\base
{
	/**
	* Overwrite enable_step to enable Happy Anniversary notifications
	* before any included migrations are installed.
	*
	* @param mixed $old_state State returned by previous call of this method
	* @return mixed Returns false after last step, otherwise temporary state
	*/
	public function enable_step($old_state)
	{
		switch ($old_state)
		{
			// Empty means nothing has run yet
			case '':
				// Enable notifications
				$notification = $this->container->get('notification_manager');
				$notification->enable_notifications('vinabb.happyanniversary.notification.type.happy_anniversary');
			return 'notifications';

			default:
			// Run parent enable step method
			return parent::enable_step($old_state);
		}
	}

	/**
	* Overwrite disable_step to disable Happy Anniversary notifications
	* before the extension is disabled.
	*
	* @param mixed $old_state State returned by previous call of this method
	* @return mixed Returns false after last step, otherwise temporary state
	*/
	public function disable_step($old_state)
	{
		switch ($old_state)
		{
			// Empty means nothing has run yet
			case '':
				// Disable notifications
				$notification = $this->container->get('notification_manager');
				$notification->disable_notifications('vinabb.happyanniversary.notification.type.happy_anniversary');
			return 'notifications';

			default:
			// Run parent disable step method
			return parent::disable_step($old_state);
		}
	}

	/**
	* Overwrite purge_step to purge Happy Anniversary notifications before
	* any included and installed migrations are reverted.
	*
	* @param mixed $old_state State returned by previous call of this method
	* @return mixed Returns false after last step, otherwise temporary state
	*/
	public function purge_step($old_state)
	{
		switch ($old_state)
		{
			// Empty means nothing has run yet
			case '':
				// Purge notifications
				$notification = $this->container->get('notification_manager');
				$notification->purge_notifications('vinabb.happyanniversary.notification.type.happy_anniversary');
			return 'notifications';

			default:
			// Run parent purge step method
			return parent::purge_step($old_state);
		}
	}
}
