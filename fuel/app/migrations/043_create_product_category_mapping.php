<?php

namespace Fuel\Migrations;

class Create_Product_Category_Mapping
{
    public function up()
    {
        \DBUtil::create_table('product_category_mapping', [
            'id' => ['type' => 'int', 'constraint' => 11, 'auto_increment' => true],
            'product_id' => ['type' => 'int', 'constraint' => 11],
            'category_id' => ['type' => 'int', 'constraint' => 11],
        ], ['id']); // 'id' là khóa chính
    }

    public function down()
    {
        \DBUtil::drop_table('product_category_mapping');
    }
}
