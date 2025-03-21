<?php

namespace Fuel\Migrations;

class Create_bbs_category
{
	public function up()
	{
		\DBUtil::create_table('bbs_category', array(
			'id' => array('type' => 'int', 'unsigned' => true, 'null' => false, 'auto_increment' => true, 'constraint' => '11'),
			'code' => array('constraint' => 50, 'null' => false, 'type' => 'varchar'),
			'name' => array('constraint' => 100, 'null' => false, 'type' => 'varchar'),
			'description' => array('null' => false, 'type' => 'text'),
			'status' => array('constraint' => 1, 'null' => false, 'type' => 'char'),
			'created_at' => array('null' => false, 'type' => 'timestamp'),
			'updated_at' => array('null' => false, 'type' => 'timestamp'),
		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('bbs_category');
	}
}