<?php

class Model_SiteSettings extends Orm\Model
{
    protected static $_table_name = 'site_settings';
    protected static $_primary_key = ['id'];

    protected static $_properties = [
        'id',
        'logo_header',
        'favicon',
        'title',
        'description',
        'meta_tags',
        'og_title',
        'og_description',
        'og_image',
        'og_url',
        'og_type',
        'keywords',
        'company_name',
        'company_owner',
        'owner_article_link',
        'customer_care_phone',
        'hotline',
        'customer_care_email',
        'director_email',
        'admin_email',
        'warranty_policy_link',
        'shipping_policy_link',
        'return_policy_link',
        'privacy_policy_link',
        'zalo_link',
        'facebook_link',
        'twitter_link',
        'linkedin_link',
        'messenger_link',
        'youtube_link',
        'pinterest_link',
        'showroom_address',
        'googlemap_link',
        'googlemap_embed_link',
        'warehouse_address',
        'factory_address',
        'created_at',
        'updated_at',
        'installation_instructions',
        'buying_guide',
        'shipping_and_installation',
        'construction_process',
        'owner_avatar',
        'main_intro',
        'main_sub_intro',
        'logo_header_reverse',
        'tiktok_link',
        'introduction',
        'warehouse_googlemap_link',
        'warehouse_googlemap_embed_link',
        'factory_googlemap_link',
        'factory_googlemap_embed_link',
    ];

    protected static $_observers = [
        'Orm\Observer_CreatedAt' => ['events' => ['before_insert'], 'mysql_timestamp' => true],
        'Orm\Observer_UpdatedAt' => ['events' => ['before_save'], 'mysql_timestamp' => true],
    ];

    public static function loadConstants()
    {
        $settings = static::find('first');
        foreach ($settings as $key => $value) {
            define(strtoupper($key), $value);
        }
        define('DOMAIN', OG_URL);
    }
}
