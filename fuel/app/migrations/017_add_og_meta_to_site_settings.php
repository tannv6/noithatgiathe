<?php

namespace Fuel\Migrations;

class Add_og_meta_to_site_settings
{
	public function up()
	{
		\DBUtil::add_fields('site_settings', array(
			'og_title' => array('type' => 'varchar', 'constraint' => 255, 'null' => true, 'after' => 'meta_tags'),
			'og_description' => array('type' => 'text', 'null' => true, 'after' => 'og_title'),
			'og_image' => array('type' => 'varchar', 'constraint' => 255, 'null' => true, 'after' => 'og_description'),
			'og_url' => array('type' => 'varchar', 'constraint' => 255, 'null' => true, 'after' => 'og_image'),
			'og_type' => array('type' => 'varchar', 'constraint' => 50, 'null' => true, 'after' => 'og_url'),
		));
	}

	public function down()
	{
		\DBUtil::drop_fields('site_settings', array(
			'og_title',
			'og_description',
			'og_image',
			'og_url',
			'og_type',
		));
	}
}
