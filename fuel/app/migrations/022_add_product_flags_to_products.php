<?php

namespace Fuel\Migrations;

class Add_product_flags_to_products
{
	public function up()
	{
		\DBUtil::add_fields('products', array(
			'is_flash_sale' => array('constraint' => 1, 'null' => false, 'type' => 'char', 'default' => 'N'),
		));
	}

	public function down()
	{
		\DBUtil::drop_fields('products', array(
			'is_flash_sale'
		));
	}
}