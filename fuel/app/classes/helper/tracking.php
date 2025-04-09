<?php
namespace Helper;

use Fuel\Core\DB;
use Detection\MobileDetect as Mobile_Detect;
use Model_Products;
use Model_BbsList;

class Tracking {
	public static function trackProductView($product_id) {
		\Session::start(); // Bắt đầu session

		$user_ip = \Input::real_ip();
		$current_date = date("Y-m-d");
		$current_hour = date("H");
		$current_month = date("m");
		$current_year = date("Y");

		// Xác định thiết bị bằng Mobile Detect
		$device     = self::getDevice();

		// Kiểm tra nếu đã có trong session -> Không lưu trùng
		if (\Session::get("viewed_product_{$product_id}")) {
			return;
		}

		// Kiểm tra nếu đã có trong database hôm nay
		$exists = DB::select('id')
			->from('product_views')
			->where('product_id', '=', $product_id)
			->where('user_ip', '=', $user_ip)
			->where('view_date', '=', $current_date)
			->execute()
			->count();

		if ($exists == 0) {
			// Lưu vào database
			DB::insert('product_views')
			->columns(['product_id', 'user_ip', 'device_type', 'view_date', 'view_hour', 'view_month', 'view_year'])
			->values([$product_id, $user_ip, $device, $current_date, $current_hour, $current_month, $current_year])
			->execute();

			// Lưu session để ngăn trùng lặp trong phiên
			\Session::set("viewed_product_{$product_id}", true);

			Model_Products::updateViewCount($product_id);
		}
	}
	public static function trackPostView($post_id)
	{
		\Session::start();
		$ip_address = \Input::real_ip();
		$user_agent = \Input::user_agent();
		$device     = self::getDevice();

		// Kiem tra neu da co trong session -> khong luu trung
		if (\Session::get("viewed_post_{$post_id}")) {
			return;
		}

		// Kiểm tra xem lượt xem đã tồn tại trong ngày chưa
		$exists = DB::select('id')
			->from('post_views')
			->where('post_id', $post_id)
			->where('ip_address', $ip_address)
			->where('view_date', '>=', date('Y-m-d 00:00:00'))
			->where('view_date', '<=', date('Y-m-d 23:59:59'))
			->execute()
			->as_array();

		if (empty($exists)) {
			// Chèn dữ liệu nếu chưa có
			DB::insert('post_views')
			->columns(['post_id', 'ip_address', 'user_agent', 'device', 'view_date']) // Danh sách cột
			->values([$post_id, $ip_address, $user_agent, $device, date('Y-m-d H:i:s')]) // Giá trị tương ứng
			->execute();

			// Luu session de ngan trung lap trong phien
			\Session::set("viewed_post_{$post_id}", true);

			Model_BbsList::updateViewCount($post_id);
		}
	}

	private static function getDevice()
	{
		$detect = new Mobile_Detect();

		if ($detect->isMobile() && !$detect->isTablet()) {
			$device_type = 'M';
		} elseif ($detect->isTablet()) {
			$device_type = 'T';
		} else {
			$device_type = 'P';
		}

		return $device_type;
	}

	public static function getPostViews($post_id, $type = 'day')
	{
		$query = DB::select(DB::expr("
			COUNT(*) as views,
			CASE
				WHEN '$type' = 'day' THEN DATE(view_date)
				WHEN '$type' = 'month' THEN DATE_FORMAT(view_date, '%Y-%m')
				WHEN '$type' = 'year' THEN YEAR(view_date)
				WHEN '$type' = 'hour' THEN HOUR(view_date)
			END as period
		"))
		->from('post_views')
		->where('post_id', $post_id)
		->group_by('period')
		->execute()
		->as_array();

		return $query;
	}
}