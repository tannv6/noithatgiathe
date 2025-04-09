<?php

namespace Fuel\Migrations;

class Add_keywords_to_site_settings
{
	public function up()
	{
		\DBUtil::add_fields('site_settings', array(
			'keywords' => array('type' => 'text', 'null' => true, 'after' => 'googlemap_link'),
		));
	}

	public function down()
	{
		\DBUtil::drop_fields('site_settings', array(
			'keywords',
		));
	}
}