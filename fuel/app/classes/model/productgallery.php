<?php

class Model_ProductGallery extends Orm\Model
{
    protected static $_table_name = 'product_gallery';
    protected static $_primary_key = ['gallery_id'];

    protected static $_properties = [
        'gallery_id',
        'product_id',
        'image_path',
        'sort_order',
        'status',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected static $_observers = [
        'Orm\Observer_CreatedAt' => ['events' => ['before_insert'], 'mysql_timestamp' => true],
        'Orm\Observer_UpdatedAt' => ['events' => ['before_save'], 'mysql_timestamp' => true],
    ];
}
