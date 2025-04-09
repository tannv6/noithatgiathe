<?php

namespace Fuel\Migrations;

class Add_logo_header_reverse_to_site_settings
{
	public function up()
	{
		\DBUtil::add_fields('site_settings', array(
			'logo_header_reverse' => array('type' => 'varchar', 'constraint' => 255, 'null' => true),
		));
	}

	public function down()
	{
		\DBUtil::drop_fields('site_settings', array('logo_header_reverse'));
	}
}
