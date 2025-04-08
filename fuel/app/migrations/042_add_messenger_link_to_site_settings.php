<?php

namespace Fuel\Migrations;

class Add_Messenger_Link_To_Site_Settings
{
    public function up()
    {
        \DBUtil::add_fields('site_settings', array(
            'messenger_link' => array('constraint' => 255, 'type' => 'varchar', 'null' => true),
        ));
    }

    public function down()
    {
        \DBUtil::drop_fields('site_settings', 'messenger_link');
    }
}
