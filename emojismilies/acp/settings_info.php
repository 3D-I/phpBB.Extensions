<?php
/**
* This file is part of the Emoji Smilies package.
*
* @copyright (c) VinaBB <vinabb.vn>
* @license GNU General Public License, version 2 (GPL-2.0)
*/

namespace vinabb\emojismilies\acp;

class settings_info
{
	public function module()
	{
		return [
			'filename'	=> '\vinabb\emojismilies\acp\settings_module',
			'title'		=> 'ACP_EMOJI_SMILIES',
			'version'	=> '1.0.0',
			'modes'		=> [
				'main'	=> [
					'title'	=> 'ACP_EMOJI_SMILIES',
					'auth'	=> 'ext_vinabb/emojismilies && acl_a_board',
					'cat'	=> ['ACP_MESSAGES']
				]
			]
		];
	}
}
