<?php

namespace Fuel\Migrations;

class Add_title_and_sub_title_to_banners
{
	public function up()
	{
		\DBUtil::add_fields('banners', array(
			'title' => array('constraint' => 255, 'null' => false, 'type' => 'varchar'),
			'sub_title' => array('constraint' => 255, 'null' => false, 'type' => 'varchar'),
		));
	}

	public function down()
	{
		\DBUtil::drop_fields('banners', array(
			'title'
,			'sub_title'
		));
	}
}