<?php

namespace Fuel\Migrations;

class Add_mobile_columns_to_banner_config
{
    public function up()
    {
        \DBUtil::add_fields('banner_config', [
            'mobile_ratio_width' => ['type' => 'int', 'constraint' => 11, 'null' => true],
            'mobile_ratio_height' => ['type' => 'int', 'constraint' => 11, 'null' => true],
        ]);
    }

    public function down()
    {
        \DBUtil::drop_fields('banner_config', ['mobile_ratio_width', 'mobile_ratio_height']);
    }
}