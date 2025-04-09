<?php

class Model_ProductCategory extends Orm\Model
{
	protected static $_table_name = 'product_categories';
	protected static $_primary_key = ['category_id'];

	protected static $_properties = [
		'category_id',
		'category_name',
		'parent_id',
		'category_image',
		'sort_description',
		'category_banner',
		'status',
		'level',
		'created_at',
		'updated_at',
		'slug',
		'o_num',
	];

	protected static $_observers = [
		'Orm\Observer_CreatedAt' => ['events' => ['before_insert'], 'mysql_timestamp' => true],
		'Orm\Observer_UpdatedAt' => ['events' => ['before_save'], 'mysql_timestamp' => true],
	];

	protected static $_has_many = array(
		'product_category_mappings' => array(
			'key_from' => 'category_id',
			'model_to' => 'Model_ProductCategoryMapping',
			'key_to' => 'category_id',
			'cascade_save' => true,
			'cascade_delete' => false,
		),
		'products' => array(
			'key_from' => 'category_id',
			'model_to' => 'Model_Products',
			'key_to' => 'product_id',
			'through' => 'product_category_mapping', // liên kết qua bảng trung gian
		),
	);

	public static function getChildren($category_id, $first = true) {
		$list = [];
		if($first) {
			$category = Model_ProductCategory::find('first', ['where' => ['category_id' => $category_id]]);
			$list[] = $category;
		}
		$children = Model_ProductCategory::find('all', ['where' => ['parent_id' => $category_id]]);
		$list = array_merge($list, $children);
		foreach($children as $child) {
			$children1 = self::getChildren($child['category_id'], false);
			if(count($children1) > 0) {
				$list = array_merge($list, $children1);
			}
		}

		return $list;
	}

	public static function getParents($category_id) {
		$list = [];
		$category = Model_ProductCategory::find('first', ['where' => ['category_id' => $category_id]]);
		$parent = Model_ProductCategory::find('first', ['where' => ['category_id' => $category['parent_id']]]);
		while($parent) {
			$list[] = $parent;
			$parent = Model_ProductCategory::find('first', ['where' => ['category_id' => $parent['parent_id']]]);
		}

		return array_reverse($list);

	}

}
