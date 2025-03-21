<?php

namespace Fuel\Migrations;

class Create_post_views
{
    public function up()
    {
        \DBUtil::create_table('post_views', [
            'id'         => ['type' => 'int', 'auto_increment' => true, 'constraint' => 11],
            'post_id'    => ['type' => 'int', 'constraint' => 11],
            'ip_address' => ['type' => 'varchar', 'constraint' => 45],
            'user_agent' => ['type' => 'text'],
            'device'     => ['type' => 'varchar', 'constraint' => 50], // PC, Mobile, Tablet
            'view_date'  => ['type' => 'datetime'],
        ], ['id']);
    }

    public function down()
    {
        \DBUtil::drop_table('post_views');
    }
}
