<?php
/**
 * Fuel is a fast, lightweight, community driven PHP 5.4+ framework.
 *
 * @package    Fuel
 * @version    1.9-dev
 * @author     Fuel Development Team
 * @license    MIT License
 * @copyright  2010 - 2019 Fuel Development Team
 * @link       https://fuelphp.com
 */

/**
 * The Main Controller.
 *
 * A basic controller example.  Has examples of how to set the
 * response body and status.
 *
 * @package  app
 * @extends  Controller
 */

class Controller_Admin_Tracking extends Controller
{
	public function before() {
		parent::before();
		error_reporting(0);
		if (!Auth::check()) {
			Response::redirect('admin');
		}
	}

	public function action_product() {

		$template = View::forge('template/admin/template_main', [
			'active_menu' => "8,tracking,tracking_product",
			'title' => 'Thống kê lượt xem sản phẩm'
		]);

		$template->content = View::forge('admin/tracking/product');

		return Response::forge($template);
	}

	public function action_articles() {

		$template = View::forge('template/admin/template_main', [
			'active_menu' => "8,tracking,tracking_articles",
			'title' => 'Thống kê lượt xem bài viết'
		]);

		$template->content = View::forge('admin/tracking/articles');

		return Response::forge($template);
	}

}