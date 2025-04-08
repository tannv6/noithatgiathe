<?php

namespace Fuel\Migrations;

class Add_googlemap_links_to_site_settings
{
    public function up()
    {
        \DBUtil::add_fields('site_settings', [
            'warehouse_googlemap_link' => ['type' => 'varchar', 'constraint' => 255, 'null' => true],
            'warehouse_googlemap_embed_link' => ['type' => 'varchar', 'constraint' => 255, 'null' => true],
            'factory_googlemap_link' => ['type' => 'varchar', 'constraint' => 255, 'null' => true],
            'factory_googlemap_embed_link' => ['type' => 'varchar', 'constraint' => 255, 'null' => true],
        ]);
    }

    public function down()
    {
        \DBUtil::drop_fields('site_settings', [
            'warehouse_googlemap_link',
            'warehouse_googlemap_embed_link',
            'factory_googlemap_link',
            'factory_googlemap_embed_link',
        ]);
    }
}
