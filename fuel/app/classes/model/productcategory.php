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
    ];

    protected static $_observers = [
        'Orm\Observer_CreatedAt' => ['events' => ['before_insert'], 'mysql_timestamp' => true],
        'Orm\Observer_UpdatedAt' => ['events' => ['before_save'], 'mysql_timestamp' => true],
    ];
}
