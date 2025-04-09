<?php

class Model_Banners extends Orm\Model
{
	protected static $_table_name = 'banners';
	protected static $_primary_key = ['banner_id'];

	protected static $_properties = [
		'banner_id',
		'banner_code',
		'image_url',
		'link_url',
		'status',
		'created_at',
		'updated_at',
		'title',
		'sub_title',
		'image_url_m',
		'ratio',
		'ratio_m'
	];

	protected static $_observers = [
		'Orm\Observer_CreatedAt' => ['events' => ['before_insert'], 'mysql_timestamp' => true],
		'Orm\Observer_UpdatedAt' => ['events' => ['before_save'], 'mysql_timestamp' => true],
	];
}
