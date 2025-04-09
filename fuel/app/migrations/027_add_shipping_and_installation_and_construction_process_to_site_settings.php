<?php

namespace Fuel\Migrations;

class Add_shipping_and_installation_and_construction_process_to_site_settings
{
	public function up()
	{
		\DBUtil::add_fields('site_settings', array(
			'shipping_and_installation' => array('type' => 'text', 'null' => true),
			'construction_process' => array('type' => 'text', 'null' => true),
		));
	}

	public function down()
	{
		\DBUtil::drop_fields('site_settings', array('shipping_and_installation', 'construction_process'));
	}
}
