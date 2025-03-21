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

    public static function getPaging($where = [], $page = 1, $limit = 10) {
        $offset = ($page - 1) * $limit;

        $query = Model_BbsList::query();

        if (!empty($where)) {
            $query->where($where);
        }
        
        $total = $query->count();

        $total_page = ceil($total / $limit);

        return [
            'total_page' => $total_page,
            'total' => $total,
            'page' => $page,
            'limit' => $limit,
            'offset' => $offset,
            'num' => $total - $offset,
            'data' => self::find('all', [
                'where' => $where,
                'limit' => $limit,
                'offset' => $offset,
                'order_by' => ['o_num' => 'DESC']
            ])
        ];
    }

    public static function updateViewCount($bbs_id) {
        DB::update('bbs_list')
            ->set('view_count', DB::expr('view_count + 1'))
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