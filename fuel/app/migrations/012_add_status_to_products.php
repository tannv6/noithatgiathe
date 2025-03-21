<?php

namespace Fuel\Migrations;

class Add_status_to_products
{
    public function up()
    {
        \DBUtil::add_fields('products', [
            'status' => [
                'type' => 'char',
                'constraint' => 1,
                'default' => 'Y', // Giá trị mặc định là 'Y'
                'null' => true,
                'after' => 'brand_id', // Đặt sau cột brand_id
            ],
        ]);
    }

    public function down()
    {
        \DBUtil::drop_fields('products', ['status']);
    }
}
