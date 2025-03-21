<?php

namespace Fuel\Migrations;

class Add_description_to_bbs_list
{
	public function up()
	{
		\DBUtil::add_fields('bbs_list', array(
			'description' => array('null' => false, 'type' => 'text'),
		));
	}

	public function down()
	{
		\DBUtil::drop_fields('bbs_list', array(
			'description'
		));
	}
}