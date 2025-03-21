<?php

namespace Fuel\Migrations;

class Create_banners
{
    public function up()
    {
        \DBUtil::create_table('banners', [
            'banner_id'           => ['type' => 'int', 'constraint' => 11, 'auto_increment' => true, 'unsigned' => true],
            'banner_code'  => ['type' => 'varchar', 'constraint' => 50, 'null' => false],
            'image_url'    => ['type' => 'varchar', 'constraint' => 255, 'null' => true],
            'link_url'     => ['type' => 'varchar', 'constraint' => 255, 'null' => true],
            'status'       => ['type' => 'char', 'constraint' => 1, 'default' => 'Y'],
            'created_at'   => ['type' => 'timestamp', 'default' => \DB::expr('CURRENT_TIMESTAMP')],
            'updated_at'   => ['type' => 'timestamp', 'null' => true, 'on update' => \DB::expr('CURRENT_TIMESTAMP')],
        ], ['banner_id']);
    }

    public function down()
    {
        \DBUtil::drop_table('banners');
    }
}
