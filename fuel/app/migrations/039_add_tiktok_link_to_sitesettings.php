<?php

namespace Fuel\Migrations;

class Add_tiktok_link_to_sitesettings
{
    public function up()
    {
        \DBUtil::add_fields('site_settings', array(
            'tiktok_link' => array('type' => 'varchar', 'constraint' => 255, 'null' => true),
        ));
    }

    public function down()
    {
        \DBUtil::drop_fields('site_settings', 'tiktok_link');
    }
}