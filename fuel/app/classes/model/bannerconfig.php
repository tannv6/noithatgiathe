<?php

use Orm\Model;

class Model_BannerConfig extends Model
{
	protected static $_properties = [
		'id',
		'banner_code',
		'ratio_width',
		'ratio_height',
		'mobile_ratio_width',
		'mobile_ratio_height',
		'created_at',
		'updated_at',
	];

	protected static $_table_name = 'banner_config';

	protected static $_primary_key = ['id'];

	protected static $_created_at = 'created_at';
	protected static $_updated_at = 'updated_at';

	public static function updateOrCreate($data) {
		$banner = self::find('first', ['where' => ['banner_code' => $data['banner_code']]]);
		if ($banner) {
			$banner->ratio_width = $data['ratio_width'];
			$banner->ratio_height = $data['ratio_height'];
			$banner->mobile_ratio_width = $data['mobile_ratio_width'];
			$banner->mobile_ratio_height = $data['mobile_ratio_height'];
			$banner->save();
		} else {
			$new = new Model_BannerConfig($data);
			$new->save();
		}
	}
	public function get_by_banner_code($banner_code) {
		return self::find('first', ['where' => ['banner_code' => $banner_code]]);
	}
}
