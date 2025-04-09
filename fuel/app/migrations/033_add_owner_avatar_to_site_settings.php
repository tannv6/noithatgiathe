<?php

namespace Fuel\Migrations;

class Add_owner_avatar_to_site_settings
{
	public function up()
	{
		\DBUtil::add_fields('site_settings', [
			'owner_avatar' => ['type' => 'varchar', 'constraint' => 255, 'null' => true]
		]);
	}

	public function down()
	{
		\DBUtil::drop_fields('site_settings', ['owner_avatar']);
	}
}
