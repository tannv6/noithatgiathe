<?php

namespace Fuel\Migrations;

class Add_email_level_parent_id_to_bbs_comment
{
	public function up()
	{
		\DBUtil::add_fields('bbs_comment', array(
			'email' => array('type' => 'varchar', 'constraint' => 255, 'null' => true),
			'level' => array('type' => 'int', 'constraint' => 11, 'null' => true),
			'parent_id' => array('type' => 'int', 'constraint' => 11, 'null' => true),
		));
	}

	public function down()
	{
		\DBUtil::drop_fields('bbs_comment', array('email', 'level', 'parent_id'));
	}
}