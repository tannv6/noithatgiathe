<?php

namespace Fuel\Migrations;

class Create_popups_and_popup_images
{
    public function up()
    {
        \DBUtil::create_table('popups', [
            'id' => ['type' => 'int', 'auto_increment' => true, 'constraint' => 11],
            'title' => ['type' => 'varchar', 'constraint' => 255, 'null' => true],
            'content' => ['type' => 'text', 'null' => true],
            'width' => ['type' => 'int', 'default' => 400, 'null' => true],
            'height' => ['type' => 'int', 'default' => 300, 'null' => true],
            'position_x' => ['type' => 'varchar', 'constraint' => 50, 'default' => 'center', 'null' => true],
            'position_y' => ['type' => 'varchar', 'constraint' => 50, 'default' => 'center', 'null' => true],
            'start_date' => ['type' => 'datetime', 'null' => true],
            'end_date' => ['type' => 'datetime', 'null' => true],
            'always_show' => ['type' => 'char', 'default' => 'N', 'constraint' => 1, 'null' => true],
            'always_hide' => ['type' => 'char', 'default' => 'N', 'constraint' => 1, 'null' => true],
            'device' => ['type' => 'varchar', 'constraint' => 20, 'default' => 'all', 'null' => true], // new
            'created_at' => ['type' => 'datetime', 'null' => true],
            'updated_at' => ['type' => 'datetime', 'null' => true],
        ], ['id']);

        \DBUtil::create_table('popup_images', [
            'id' => ['type' => 'int', 'auto_increment' => true, 'constraint' => 11],
            'popup_id' => ['type' => 'int', 'constraint' => 11, 'null' => true],
            'image_url' => ['type' => 'varchar', 'constraint' => 255, 'null' => true],
            'alt_text' => ['type' => 'varchar', 'constraint' => 255, 'null' => true],
            'sort_order' => ['type' => 'int', 'default' => 0, 'null' => true],
            'created_at' => ['type' => 'datetime', 'null' => true],
            'updated_at' => ['type' => 'datetime', 'null' => true],
        ], ['id']);

        \DBUtil::create_index('popup_images', ['popup_id']);
    }

    public function down()
    {
        \DBUtil::drop_table('popup_images');
        \DBUtil::drop_table('popups');
    }
}