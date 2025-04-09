<?php

class Model_Popup_Image extends \Orm\Model
{
    protected static $_table_name = 'popup_images';
    protected static $_properties = [
        'id',
        'popup_id',
        'image_url',
        'alt_text',
        'sort_order',
        'created_at',
        'updated_at',
    ];

    protected static $_belongs_to = [
        'popup' => [
            'key_from' => 'popup_id',
            'model_to' => 'Model_Popup',
            'key_to' => 'id',
        ],
    ];

    protected static $_observers = [
        'Orm\Observer_CreatedAt' => ['events' => ['before_insert']],
        'Orm\Observer_UpdatedAt' => ['events' => ['before_update']],
    ];
}
