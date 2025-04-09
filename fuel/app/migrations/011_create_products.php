<?php

namespace Fuel\Migrations;

class Create_products
{
	public function up()
	{
		\DBUtil::create_table('products', [
			'product_id' => ['type' => 'int', 'auto_increment' => true, 'constraint' => 11],
			'product_name' => ['type' => 'varchar', 'constraint' => 255, 'null' => true],
			'product_code' => ['type' => 'varchar', 'constraint' => 100, 'null' => true],
			'description' => ['type' => 'text', 'null' => true],
			'init_price' => ['type' => 'decimal', 'constraint' => '10,2', 'null' => true],
			'sell_price' => ['type' => 'decimal', 'constraint' => '10,2', 'null' => true],
			'quantity' => ['type' => 'int', 'null' => true],
			'product_image' => ['type' => 'varchar', 'constraint' => 255, 'null' => true],
			'category_id' => ['type' => 'int', 'null' => true],
			'created_at' => ['type' => 'datetime', 'null' => true],
			'updated_at' => ['type' => 'datetime', 'null' => true],
			'deleted_at' => ['type' => 'datetime', 'null' => true],
			'sale_date' => ['type' => 'datetime', 'null' => true],
			'sale_end_date' => ['type' => 'datetime', 'null' => true],
			'price_on_sale_date' => ['type' => 'decimal', 'constraint' => '10,2', 'null' => true],
			'is_big_sale' => ['type' => 'char', 'constraint' => 1, 'null' => true, 'default' => 'N'],
			'is_best' => ['type' => 'char', 'constraint' => 1, 'null' => true, 'default' => 'N'],
			'is_new' => ['type' => 'char', 'constraint' => 1, 'null' => true, 'default' => 'Y'],
			'pot_id' => ['type' => 'int', 'null' => true],
			'brand_id' => ['type' => 'int', 'null' => true],
		], ['product_id']);
	}

	public function down()
	{
		\DBUtil::drop_table('products');
	}
}
