<?php

class Model_BbsList extends Orm\Model
{
    protected static $_table_name = 'bbs_list';
    protected static $_primary_key = ['bbs_id'];

    protected static $_properties = [
        'bbs_id',
        'category_code',
        'title',
        'thumb',
        'content',
        'author',
        'status',
        'view_count',
        'description',
        'created_at',
        'updated_at',
        'slug',
        'o_num',
    ];

    protected static $_observers = [
        'Orm\Observer_CreatedAt' => ['events' => ['before_insert'], 'mysql_timestamp' => true],
        'Orm\Observer_UpdatedAt' => ['events' => ['before_save'], 'mysql_timestamp' => true],
    ];

    public static function getPaging($where = [], $page = 1, $limit = 10, $sort = []) {
        $offset = ($page - 1) * $limit;

        $title = $where['title'];
        unset($where['title']);

        $query = Model_BbsList::query();

        if (!empty($where)) {
            $query->where($where);
        }

        if ($title) {
            $query->where('title', 'like', '%' . $title . '%');
        }
        
        $total = $query->count();

        $total_page = ceil($total / $limit);

        $query = Model_BbsList::query();

        if (!empty($where)) {
            $query->where($where);
        }

        if ($title) {
            $query->where('title', 'like', '%' . $title . '%');
        }

        if (!empty($sort)) {
            $query->order_by($sort);
        }

        $query->limit($limit);
        $query->offset($offset);
        return [
            'total_page' => $total_page,
            'total' => $total,
            'page' => $page,
            'limit' => $limit,
            'offset' => $offset,
            'num' => $total - $offset,
            'data' => $query->get(),
        ];
    }

    public static function updateViewCount($bbs_id) {
        DB::update('bbs_list')
        ->set(['view_count' => DB::expr('view_count + 1')])
        ->where('bbs_id', $bbs_id)
        ->execute();
    }

    public static function getMostView() {
        $query = \DB::select('bbs_list.*')
        ->from('bbs_list')
        ->join('bbs_category', 'LEFT')
        ->on('bbs_category.code', '=', 'bbs_list.category_code')
        ->where('bbs_list.status', "Y")
        ->where('bbs_category.type', "public")
        ->order_by('bbs_list.view_count', 'DESC')
        ->limit(10)
        ->execute()
        ->as_array();
    
    return $query;
    
    }

}