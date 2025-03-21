<?php

namespace Fuel\Migrations;

class Add_buying_guide_to_site_settings
{
    public function up()
    {
        \DBUtil::add_fields('site_settings', array(
            'buying_guide' => array('type' => 'varchar', 'constraint' => 500, 'null' => true),
        ));
    }

    public function down()
    {
        \DBUtil::drop_fields('site_settings', 'buying_guide');
    }
}