<?php

namespace Fuel\Migrations;

class Add_googlemap_link_to_site_settings
{
	public function up()
	{
		\DBUtil::add_fields('site_settings', array(
			'googlemap_link' => array('type' => 'varchar', 'constraint' => 255, 'null' => true, 'after' => 'og_type'),
		));
	}

	public function down()
	{
		\DBUtil::drop_fields('site_settings', array(
			'googlemap_link',
		));
	}
}
