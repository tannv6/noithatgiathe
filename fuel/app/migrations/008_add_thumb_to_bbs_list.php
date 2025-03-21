<?php

namespace Fuel\Migrations;

class Add_thumb_to_bbs_list
{
	public function up()
	{
		\DBUtil::add_fields('bbs_list', array(
			'thumb' => array('constraint' => 255, 'null' => false, 'type' => 'varchar'),
		));
	}

	public function down()
	{
		\DBUtil::drop_fields('bbs_list', array(
			'thumb'
		));
	}
}