<?php

namespace Fuel\Migrations;

class Add_category_image_to_product_categories
{
	public function up()
	{
		\DBUtil::add_fields('product_categories', array(
			'category_image' => array('constraint' => 255, 'null' => true, 'type' => 'varchar'),
		));
	}

	public function down()
	{
		\DBUtil::drop_fields('product_categories', array(
			'category_image'
		));
	}
}