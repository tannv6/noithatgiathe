<?php

namespace Fuel\Migrations;

class Add_o_num_to_bbs_list
{
	public function up()
	{
		\DBUtil::add_fields('bbs_list', array(
			'o_num' => array('type' => 'int', 'constraint' => 11, 'default' => 0, 'null' => false),
		));
	}

	public function down()
	{
		\DBUtil::drop_fields('bbs_list', 'o_num');
	}
}
