<?php

namespace Fuel\Migrations;

class Create_tbl_contact
{
    public function up()
    {
        \DBUtil::create_table('tbl_contact', [
            'id'         => ['type' => 'int', 'auto_increment' => true, 'constraint' => 11, 'unsigned' => true],
            'full_name'  => ['type' => 'varchar', 'constraint' => 255, 'null' => false],
            'email'      => ['type' => 'varchar', 'constraint' => 255, 'null' => false],
            'phone'      => ['type' => 'varchar', 'constraint' => 20, 'null' => false],
            'message'    => ['type' => 'text', 'null' => false],
            'status'     => ['type' => 'char', 'constraint' => 1, 'default' => 'W', 'null' => true], // W: Chưa xử lý, Y: Đã xử lý
            'created_at' => ['type' => 'timestamp', 'default' => \DB::expr('CURRENT_TIMESTAMP')],
            'updated_at' => ['type' => 'timestamp', 'default' => \DB::expr('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP')],
        ], ['id']);
    }

    public function down()
    {
        \DBUtil::drop_table('tbl_contact');
    }
}
