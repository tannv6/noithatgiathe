<?php

namespace Fuel\Migrations;

class Add_image_url_m_to_banners
{
	public function up()
	{
		\DBUtil::add_fields('banners', array(
			'image_url_m' => array('type' => 'varchar', 'constraint' => 255, 'null' => true, 'after' => 'image_url'),
		));
	}

	public function down()
	{
		\DBUtil::drop_fields('banners', array('image_url_m'));
	}
}
