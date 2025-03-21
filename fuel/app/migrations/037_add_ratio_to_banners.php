<?php

namespace Fuel\Migrations;

class Add_ratio_to_banners
{
    public function up()
    {
        \DBUtil::add_fields('banners', array(
            'ratio'   => array('type' => 'varchar', 'constraint' => 20, 'null' => true),
            'ratio_m' => array('type' => 'varchar', 'constraint' => 20, 'null' => true),
        ));
    }

    public function down()
    {
        \DBUtil::drop_fields('banners', array('ratio', 'ratio_m'));
    }
}