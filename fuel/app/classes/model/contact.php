<?php

class Model_Contact extends Orm\Model
{
	protected static $_table_name = 'tbl_contact';
	protected static $_primary_key = ['id'];

	protected static $_properties = [
		'id',
		'full_name',
		'email',
		'phone',
		'message',
		'status',
		'created_at',
		'updated_at',
	];

	protected static $_observers = [
		'Orm\Observer_CreatedAt' => ['events' => ['before_insert'], 'mysql_timestamp' => true],
		'Orm\Observer_UpdatedAt' => ['events' => ['before_save'], 'mysql_timestamp' => true],
	];

	public static function getPaging($where = [], $page = 1, $limit = 10) {
		$offset = ($page - 1) * $limit;

		$query = Model_Contact::query();

		if (!empty($where)) {
			$query->where($where);
		}

		$total = $query->count();

		$total_page = ceil($total / $limit);

		return [
			'total_page' => $total_page,
			'total' => $total,
			'page' => $page,
			'limit' => $limit,
			'offset' => $offset,
			'num' => $total - $offset,
			'data' => self::find('all', [
				'where' => $where,
				'limit' => $limit,
				'offset' => $offset
			])
		];
	}
}
