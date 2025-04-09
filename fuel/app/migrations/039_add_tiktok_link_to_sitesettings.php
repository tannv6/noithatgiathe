<?php

namespace Fuel\Migrations;

class Add_tiktok_link_to_sitesettings
{
	public function up()
	{
		\DBUtil::add_fields('site_settings', [
			'tiktok_link' => ['type' => 'varchar', 'constraint' => 1024, 'null' => true, 'default' => null],
		]);
	}

	public function down()
	{
		\DBUtil::drop_fields('site_settings', ['tiktok_link']);
	}
}
