<?php

namespace Fuel\Migrations;

class Add_introduction_to_site_settings
{
	public function up()
	{
		\DBUtil::add_fields('site_settings', array(
			'introduction' => array('constraint' => 500, 'null' => false, 'type' => 'varchar'),
		));
	}

	public function down()
	{
		\DBUtil::drop_fields('site_settings', array(
			'introduction'
		));
	}
}