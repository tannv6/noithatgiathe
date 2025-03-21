<?php

namespace Fuel\Migrations;

class Add_type_to_bbs_category
{
    public function up()
    {
        \DBUtil::add_fields('bbs_category', [
            'type' => ['type' => 'varchar', 'constraint' => 50, 'null' => true]
        ]);
    }

    public function down()
    {
        \DBUtil::drop_fields('bbs_category', ['type']);
    }
}