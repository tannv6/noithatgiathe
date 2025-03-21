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

    public static function getPaging($where = [], $page = 1, $limit = 10, $order_by = [], $sell_price = []) {
        $offset = ($page - 1) * $limit;
    
        // Đảm bảo chỉ lấy sản phẩm chưa bị xóa
        $where['deleted_at'] = null;
    
        // Đếm tổng số bản ghi phù hợp
        $total = Model_Products::query()->where($where);

        if (count($sell_price) > 0) {
            $total->where_open();
            foreach ($sell_price as $index => $range) {
                if (is_array($range) && count($range) === 2) {
                    list($min, $max) = $range;
                    if ($index == 0) {
                        // Điều kiện đầu tiên thì chỉ cần where
                        $total->where('sell_price', '>=', $min)
                            ->where('sell_price', '<=', $max);
                    } else {
                        // Các điều kiện tiếp theo thì dùng or_where
                        $total->or_where_open()
                            ->where('sell_price', '>=', $min)
                            ->where('sell_price', '<=', $max)
                            ->or_where_close();
                    }
                }
            }
            $total->where_close();
        }

        $total = $total->count();

        $total_page = ceil($total / $limit);
    
        // Truy vấn dữ liệu
        $query = Model_Products::query()->where($where);

        if (count($sell_price) > 0) {
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
    
        // Thêm điều kiện sắp xếp nếu có
        if (!empty($order_by)) {
            foreach ($order_by as $column => $direction) {
                $query->order_by($column, $direction);
            }
        }
    
        // Lấy danh sách sản phẩm theo phân trang
        $data = $query->rows_limit($limit)->rows_offset($offset)->get();
    
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
            ->set('view_count', DB::expr('view_count + 1'))
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
