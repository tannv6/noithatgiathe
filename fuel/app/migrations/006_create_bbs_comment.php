<?php

namespace Fuel\Migrations;

class Create_bbs_comment
{
	public function up()
	{
		\DBUtil::create_table('bbs_comment', [
			'cmt_id' => ['type' => 'int', 'constraint' => 11, 'auto_increment' => true],
			'bbs_id' => ['type' => 'int', 'constraint' => 11],
			'author' => ['type' => 'varchar', 'constraint' => 100, 'null' => true],
			'content' => ['type' => 'text', 'null' => true],
			'status' => ['type' => 'char', 'constraint' => 1, 'default' => 'Y'],
			'created_at' => ['type' => 'timestamp', 'default' => \DB::expr('CURRENT_TIMESTAMP')],
			'updated_at' => ['type' => 'timestamp', 'null' => true],
		], ['cmt_id']);

		\DBUtil::create_index('bbs_comment', ['bbs_id'], 'idx_post_id');
	}

	public function down()
	{
		\DBUtil::drop_table('bbs_comment');
	}
}