<?php

class Model_Popup_Index extends \Orm\Model
{
    protected static $_table_name = 'popups';
    protected static $_properties = [
        'id',
        'title',
        'content',
        'width',
        'height',
        'position_x',
        'position_y',
        'start_date',
        'end_date',
        'always_show',
        'always_hide',
        'device',
        'created_at',
        'updated_at',
    ];

    protected static $_has_many = [
        'images' => [
            'model_to' => 'Model_Popup_Image',
            'key_from' => 'id',
            'key_to' => 'popup_id',
            'cascade_save' => true,
            'cascade_delete' => true,
        ],
    ];
    

    protected static $_observers = [
        'Orm\Observer_CreatedAt' => ['events' => ['before_insert']],
        'Orm\Observer_UpdatedAt' => ['events' => ['before_update']],
    ];
}
