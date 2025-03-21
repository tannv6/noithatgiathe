<?php

namespace Fuel\Migrations;

class Add_youtube_link_to_site_settings
{
    public function up()
    {
        \DBUtil::add_fields('site_settings', [
            'youtube_link' => ['type' => 'varchar', 'constraint' => 500, 'null' => true, 'default' => null],
        ]);
    }

    public function down()
    {
        \DBUtil::drop_fields('site_settings', ['youtube_link']);
    }
}
