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
	public static function getCateOfProduct($product_id) {
		$category = [];

		$category_query = Model_ProductCategory::find(\Input::get('category'));

		if($category_query) {
			$category = $category_query->to_array();
		} else {
			$query = \DB::query("
			    SELECT pcm.category_id
			    FROM product_category_mapping pcm
			    JOIN product_categories pc ON pcm.category_id = pc.category_id
			    WHERE pcm.product_id = :product_id
			    ORDER BY pc.level DESC, pcm.id ASC
			    LIMIT 1
			");

			$query->parameters(['product_id' => $product_id]);

			$result = $query->execute()->as_array();
			if (!empty($result)) {
				$category_id = $result[0]['category_id'];
				$category = Model_ProductCategory::find($category_id)->to_array();
			}
		}
		
		
		$parents = Model_ProductCategory::getParents($category['category_id']);
		
		$parents = array_map(function ($item) {
			return $item->to_array();
		}, array_values($parents));
		
		$parents[] = $category;
		
		return $parents;
	}
}
