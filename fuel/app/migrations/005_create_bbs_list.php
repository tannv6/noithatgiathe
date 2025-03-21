<?php

namespace Fuel\Migrations;

class Create_bbs_list
{
    public function up()
    {
        \DBUtil::create_table('bbs_list', [
            'bbs_id' => ['type' => 'int', 'constraint' => 11, 'auto_increment' => true],
            'category_code' => ['type' => 'varchar', 'constraint' => 255],
            'title' => ['type' => 'varchar', 'constraint' => 255],
            'content' => ['type' => 'text', 'null' => true],
            'author' => ['type' => 'varchar', 'constraint' => 100, 'null' => true],
            'status' => ['type' => 'char', 'constraint' => 1, 'default' => 'Y'],
            'view_count' => ['type' => 'int', 'constraint' => 11, 'default' => 0],
            'created_at' => ['type' => 'timestamp', 'default' => \DB::expr('CURRENT_TIMESTAMP')],
            'updated_at' => ['type' => 'timestamp', 'null' => true],
        ], ['bbs_id']);

        \DBUtil::create_index('bbs_list', ['category_id'], 'idx_category_id');
    }

    public function down()
    {
        \DBUtil::drop_table('bbs_list');
    }
}
