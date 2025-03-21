<?php

namespace Fuel\Migrations;

class Add_installation_instructions_to_site_settings
{
    public function up()
    {
        \DBUtil::add_fields('site_settings', array(
            'installation_instructions' => array('type' => 'varchar', 'constraint' => 500, 'null' => true),
        ));
    }

    public function down()
    {
        \DBUtil::drop_fields('site_settings', 'installation_instructions');
    }
}