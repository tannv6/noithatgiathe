<?php

namespace Fuel\Migrations;

class Add_slug_to_bbs_category
{
    public function up()
    {
        \DBUtil::add_fields('bbs_category', array(
            'slug' => array('type' => 'varchar', 'constraint' => 255, 'null' => true),
        ));
    }

    public function down()
    {
        \DBUtil::drop_fields('bbs_category', array(
            'slug',
        ));
    }
}
