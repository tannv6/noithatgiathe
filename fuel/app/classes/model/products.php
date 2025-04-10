<?php

class Model_Products extends Orm\Model
{
	protected static $_table_name = 'products';
	protected static $_primary_key = ['product_id'];

	public static $_properties = [
		'product_id',
		'product_name',
		'product_code',
		'description',
		'init_price',
		'sell_price',
		'quantity',
		'product_image',
		'category_id',
		'created_at',
		'updated_at',
		'deleted_at',
		'sale_date',
		'sale_end_date',
		'price_on_sale_date',
		'is_big_sale',
		'is_best',
		'is_new',
		'pot_id',
		'brand_id',
		'status',
		'top_seller',
		'slug',
		'is_flash_sale',
		'view_count',
	];

	protected static $_observers = [
		'Orm\Observer_CreatedAt' => ['events' => ['before_insert'], 'mysql_timestamp' => true],
		'Orm\Observer_UpdatedAt' => ['events' => ['before_save'], 'mysql_timestamp' => true],
	];

	protected static $_has_many = array(
		'product_category_mappings' => array(
			'key_from' => 'product_id',
			'model_to' => 'Model_ProductCategoryMapping',
			'key_to' => 'product_id',
			'cascade_save' => true,
			'cascade_delete' => false,
		),
		'categories' => array(
			'key_from' => 'product_id',
			'model_to' => 'Model_ProductCategory',
			'key_to' => 'category_id',
			'through' => 'product_category_mapping', // liên kết qua bảng trung gian
		),
	);

	public static function getPaging($where = [], $page = 1, $limit = 10, $order_by = [], $sell_price = []) {
		$offset = ($page - 1) * $limit;
		// Đảm bảo chỉ lấy sản phẩm chưa bị xóa
		$where['deleted_at'] = null;
		$product_name = $where['product_name'];
		unset($where['product_name']);
		$category_id = $where['category_id'];
		unset($where['category_id']);

		// Đếm tổng số bản ghi phù hợp
		$query = Model_Products::query()->where($where);

		if ($product_name) {
			$query->where('product_name', 'like', '%' . $product_name . '%');
		}
		if ($category_id) {
			$children = Model_ProductCategory::getChildren($category_id);
			$children = array_column($children, 'category_id');
			if(count($children) > 0) {
				$query->related('product_category_mappings', [
					'where' => [
						['category_id', 'IN', $children]
					]
				]);
			} else {
				$query->related('product_category_mappings', [
					'where' => ['category_id' => $category_id]
				]);
			}
		}

		if (count($sell_price ?: []) > 0) {
			$query->where_open();
			foreach ($sell_price as $index => $range) {
				if (is_array($range) && count($range) === 2) {
					list($min, $max) = $range;
					if ($index == 0) {
						// Điều kiện đầu tiên thì chỉ cần where
						$query->where('sell_price', '>=', $min)
							->where('sell_price', '<=', $max);
					} else {
						// Các điều kiện tiếp theo thì dùng or_where
						$query->or_where_open()
							->where('sell_price', '>=', $min)
							->where('sell_price', '<=', $max)
							->or_where_close();
					}
				}
			}
			$query->where_close();
		}

		$total = clone $query;

		$total = $total->count();

		$total_page = ceil($total / $limit);

		// Thêm điều kiện sắp xếp nếu có
		if (!empty($order_by)) {
			foreach ($order_by as $column => $direction) {
				$query->order_by($column, $direction);
			}
		}

		// Lấy danh sách sản phẩm theo phân trang
		$data = $query->rows_limit($limit)->rows_offset($offset)->get();

		// dd(DB::last_query());

		return [
			'total_page' => $total_page,
			'total' => $total,
			'page' => $page,
			'limit' => $limit,
			'offset' => $offset,
			'num' => $total - $offset,
			'data' => $data
		];
	}

	public static function updateViewCount($product_id) {
		DB::update('products')
		->set(['view_count' => DB::expr('view_count + 1')])
		->where('product_id', $product_id)
		->execute();
	}

	public static function getMostView() {
		$query = Model_BbsList::query();
		$query->where('status', "Y");
		$query->order_by('view_count', 'DESC');
		$query->limit(5);
		return $query->execute()->as_array();
	}
}
