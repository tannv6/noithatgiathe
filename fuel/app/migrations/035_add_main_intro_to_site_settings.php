<?php

namespace Fuel\Migrations;

class Add_main_intro_to_site_settings
{
	public function up()
	{
		\DBUtil::add_fields('site_settings', array(
			'main_intro'     => array('type' => 'text', 'null' => true),
			'main_sub_intro' => array('type' => 'text', 'null' => true),
		));
	}

	public function down()
	{
		\DBUtil::drop_fields('site_settings', array('main_intro', 'main_sub_intro'));
	}
}
