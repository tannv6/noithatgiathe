<?php

namespace Fuel\Migrations;

class Add_top_seller_to_products
{
	public function up()
	{
		\DBUtil::add_fields('products', array(
			'top_seller' => array('constraint' => 1, 'null' => false, 'type' => 'char'),
		));
	}

	public function down()
	{
		\DBUtil::drop_fields('products', array(
			'top_seller'
		));
	}
}