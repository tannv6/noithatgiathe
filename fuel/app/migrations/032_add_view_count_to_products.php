<?php

namespace Fuel\Migrations;

class Add_view_count_to_products
{
    public function up()
    {
        \DBUtil::add_fields('products', [
            'view_count' => ['type' => 'int', 'constraint' => 10, 'default' => 0, 'null' => false]
        ]);
    }

    public function down()
    {
        \DBUtil::drop_fields('products', ['view_count']);
    }
}
