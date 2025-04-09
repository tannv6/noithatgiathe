<?php

namespace Fuel\Migrations;

class Create_product_categories
{
	public function up()
	{
		\DBUtil::create_table('product_categories', [
			'category_id' => ['type' => 'int', 'auto_increment' => true, 'constraint' => 11],
			'category_name' => ['type' => 'varchar', 'constraint' => 255, 'null' => false],
			'parent_id' => ['type' => 'int', 'constraint' => 11, 'null' => true],
			'status' => ['type' => 'char', 'constraint' => 1, 'default' => 'Y'],
			'created_at' => ['type' => 'datetime', 'null' => false],
			'updated_at' => ['type' => 'datetime', 'null' => false]
		], ['category_id']);
	}

	public function down()
	{
		\DBUtil::drop_table('product_categories');
	}
}
