<?php

class Model_ProductCategoryMapping extends Orm\Model
{
	protected static $_table_name = 'product_category_mapping';
	protected static $_primary_key = ['id'];

	protected static $_properties = [
		'id',
		'category_id',
		'product_id',
	];
	protected static $_belongs_to = array(
		'product' => array(
			'key_from' => 'product_id',
			'model_to' => 'Model_Products',
			'key_to' => 'product_id',
			'cascade_save' => false,
			'cascade_delete' => false,
		),
		'category' => array(
			'key_from' => 'category_id',
			'model_to' => 'Model_ProductCategory',
			'key_to' => 'category_id',
			'cascade_save' => false,
			'cascade_delete' => false,
		),
	);
}
