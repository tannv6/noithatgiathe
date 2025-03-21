<?php

namespace Fuel\Migrations;

class Add_category_banner_and_sort_description_to_product_category
{
	public function up()
	{
		\DBUtil::add_fields('product_categories', array(
			'category_banner' => array('constraint' => 255, 'type' => 'varchar'),
			'sort_description' => array('null' => false, 'type' => 'text'),
		));
	}

	public function down()
	{
		\DBUtil::drop_fields('product_category', array(
			'category_banner'
,			'sort_description'
		));
	}
}