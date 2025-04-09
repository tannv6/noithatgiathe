<?php

namespace Fuel\Migrations;

class Create_product_gallery
{
	public function up()
	{
		\DBUtil::create_table('product_gallery', [
			'gallery_id' => ['type' => 'int', 'auto_increment' => true, 'constraint' => 11],
			'product_id' => ['type' => 'int', 'constraint' => 11, 'null' => true],
			'image_path' => ['type' => 'varchar', 'constraint' => 255, 'null' => true],
			'sort_order' => ['type' => 'int', 'constraint' => 11, 'null' => true, 'default' => 0],
			'status' => ['type' => 'char', 'constraint' => 1, 'default' => 'Y', 'null' => true],
			'created_at' => ['type' => 'datetime', 'null' => true],
			'updated_at' => ['type' => 'datetime', 'null' => true],
			'deleted_at' => ['type' => 'datetime', 'null' => true],
		], ['gallery_id']);
	}

	public function down()
	{
		\DBUtil::drop_table('product_gallery');
	}
}
