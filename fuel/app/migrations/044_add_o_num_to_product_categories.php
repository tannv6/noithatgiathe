<?php

namespace Fuel\Migrations;

class Add_o_num_to_product_categories
{
	public function up()
	{
		\DBUtil::add_fields('product_categories', array(
			'o_num' => array('constraint' => '11', 'null' => false, 'type' => 'int'),
		));
	}

	public function down()
	{
		\DBUtil::drop_fields('product_categories', array(
			'o_num'
		));
	}
}