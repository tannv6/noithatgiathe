<?php

class Model_BbsCategory extends Orm\Model
{
	protected static $_table_name = 'bbs_category';
	protected static $_primary_key = ['id'];

	protected static $_properties = [
		'code',
		'name',
		'type',
		'description',
		'status',
		'created_at',
		'updated_at',
		'slug',
	];

	protected static $_observers = [
		'Orm\Observer_CreatedAt' => ['events' => ['before_insert'], 'mysql_timestamp' => true],
		'Orm\Observer_UpdatedAt' => ['events' => ['before_save'], 'mysql_timestamp' => true],
	];
}