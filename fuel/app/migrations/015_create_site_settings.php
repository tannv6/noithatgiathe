<?php

namespace Fuel\Migrations;

class Create_site_settings
{
	public function up()
	{
		\DBUtil::create_table('site_settings', [
			'id' => ['type' => 'int', 'auto_increment' => true, 'unsigned' => true],

			// Thông tin chung
			'logo_header' => ['type' => 'varchar', 'constraint' => 255, 'null' => true],
			'favicon' => ['type' => 'varchar', 'constraint' => 255, 'null' => true],
			'title' => ['type' => 'varchar', 'constraint' => 255, 'null' => true],
			'description' => ['type' => 'text', 'null' => true],
			'meta_tags' => ['type' => 'text', 'null' => true], // Lưu các thẻ meta SEO dưới dạng JSON hoặc chuỗi

			// Thông tin chủ công ty
			'company_name' => ['type' => 'varchar', 'constraint' => 1000, 'null' => true],
			'company_owner' => ['type' => 'varchar', 'constraint' => 255, 'null' => true],
			'owner_article_link' => ['type' => 'varchar', 'constraint' => 255, 'null' => true],

			// Thông tin liên hệ
			'customer_care_phone' => ['type' => 'varchar', 'constraint' => 20, 'null' => true],
			'hotline' => ['type' => 'varchar', 'constraint' => 20, 'null' => true],
			'customer_care_email' => ['type' => 'varchar', 'constraint' => 255, 'null' => true],
			'director_email' => ['type' => 'varchar', 'constraint' => 255, 'null' => true],
			'admin_email' => ['type' => 'varchar', 'constraint' => 255, 'null' => true],

			// Chính sách
			'warranty_policy_link' => ['type' => 'varchar', 'constraint' => 255, 'null' => true],
			'shipping_policy_link' => ['type' => 'varchar', 'constraint' => 255, 'null' => true],
			'return_policy_link' => ['type' => 'varchar', 'constraint' => 255, 'null' => true],
			'privacy_policy_link' => ['type' => 'varchar', 'constraint' => 255, 'null' => true],

			// Mạng xã hội
			'zalo_link' => ['type' => 'varchar', 'constraint' => 255, 'null' => true],
			'facebook_link' => ['type' => 'varchar', 'constraint' => 255, 'null' => true],
			'twitter_link' => ['type' => 'varchar', 'constraint' => 255, 'null' => true],
			'linkedin_link' => ['type' => 'varchar', 'constraint' => 255, 'null' => true],
			'pinterest_link' => ['type' => 'varchar', 'constraint' => 255, 'null' => true],

			// Địa chỉ
			'showroom_address' => ['type' => 'varchar', 'constraint' => 500, 'null' => true],
			'warehouse_address' => ['type' => 'varchar', 'constraint' => 500, 'null' => true],
			'factory_address' => ['type' => 'varchar', 'constraint' => 500, 'null' => true],
			'googlemap_embed_link' => ['type' => 'text', 'null' => true],

			// Thông tin khác
			'created_at' => ['type' => 'timestamp', 'default' => \DB::expr('CURRENT_TIMESTAMP')],
			'updated_at' => ['type' => 'timestamp', 'null' => true, 'on_update' => \DB::expr('CURRENT_TIMESTAMP')],
		], ['id']);
	}

	public function down()
	{
		\DBUtil::drop_table('site_settings');
	}
}