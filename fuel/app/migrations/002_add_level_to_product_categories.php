<?php

namespace Fuel\Migrations;

class Add_level_to_product_categories
{
	public function up()
	{
		\DBUtil::add_fields('product_categories', [
			'level' => ['type' => 'int', 'default' => 1],
		]);
	}

	public function down()
	{
		\DBUtil::drop_fields('product_categories', ['level']);
	}
}
