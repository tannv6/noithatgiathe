<?php

namespace Fuel\Migrations;

class Create_banner_config
{
	public function up()
	{
		\DBUtil::create_table('banner_config', [
			'id' => ['type' => 'int', 'constraint' => 11, 'auto_increment' => true, 'unsigned' => true],
			'banner_code' => ['type' => 'varchar', 'constraint' => 50],
			'ratio_width' => ['type' => 'int', 'constraint' => 11],
			'ratio_height' => ['type' => 'int', 'constraint' => 11],
			'created_at' => ['type' => 'timestamp', 'default' => \DB::expr('CURRENT_TIMESTAMP')],
			'updated_at' => ['type' => 'timestamp', 'null' => true, 'on_update' => \DB::expr('CURRENT_TIMESTAMP')],
		], ['id']);
	}

	public function down()
	{
		\DBUtil::drop_table('banner_config');
	}
}
