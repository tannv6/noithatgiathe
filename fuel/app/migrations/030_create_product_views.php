<?php

namespace Fuel\Migrations;

class Create_Product_Views
{
    public function up()
    {
        \DBUtil::create_table('product_views', [
            'id'          => ['type' => 'int', 'constraint' => 11, 'auto_increment' => true],
            'product_id'  => ['type' => 'int', 'constraint' => 11, 'null' => false],
            'user_ip'     => ['type' => 'varchar', 'constraint' => 45, 'null' => false],
            'device_type' => ['type' => "enum('M', 'T', 'P')", 'null' => false],
            'view_date'   => ['type' => 'date', 'null' => false],
            'view_hour'   => ['type' => 'tinyint', 'constraint' => 2, 'null' => false],
            'view_month'  => ['type' => 'tinyint', 'constraint' => 2, 'null' => false],
            'view_year'   => ['type' => 'smallint', 'constraint' => 4, 'null' => false],
            'created_at'  => ['type' => 'timestamp', 'default' => \DB::expr('CURRENT_TIMESTAMP')],
        ], ['id']);
    }

    public function down()
    {
        \DBUtil::drop_table('product_views');
    }
}
