<?php

namespace Fuel\Migrations;

class Add_slug_to_tables
{
	public function up()
	{
		// Thêm cột 'slug' vào bảng 'bbs_list'
		\DBUtil::add_fields('bbs_list', array(
			'slug' => array('type' => 'varchar', 'constraint' => 1000, 'null' => true),
		));

		// Thêm cột 'slug' vào bảng 'products'
		\DBUtil::add_fields('products', array(
			'slug' => array('type' => 'varchar', 'constraint' => 1000, 'null' => true),
		));

		// Thêm cột 'slug' vào bảng 'product_categories'
		\DBUtil::add_fields('product_categories', array(
			'slug' => array('type' => 'varchar', 'constraint' => 1000, 'null' => true),
		));
	}

	public function down()
	{
		// Xóa cột 'slug' nếu rollback
		\DBUtil::drop_fields('bbs_list', array('slug'));
		\DBUtil::drop_fields('products', array('slug'));
		\DBUtil::drop_fields('product_categories', array('slug'));
	}
}
