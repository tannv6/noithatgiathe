<?php

class Model_Comments extends Orm\Model
{
	protected static $_table_name = 'bbs_comment';
	protected static $_primary_key = ['cmt_id'];

	protected static $_properties = [
		'cmt_id',
		'bbs_id',
		'author',
		'content',
		'status',
		'created_at',
		'updated_at',
		'email',
		'level',
		'parent_id'
	];

	protected static $_observers = [
		'Orm\Observer_CreatedAt' => ['events' => ['before_insert'], 'mysql_timestamp' => true],
		'Orm\Observer_UpdatedAt' => ['events' => ['before_save'], 'mysql_timestamp' => true],
	];
}
