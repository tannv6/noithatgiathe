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
 * @extends  Controller_Base
 */

class Controller_Admin_Setting extends Controller_Base
{

	public function before() {
		parent::before();
		error_reporting(0);
		if (!Auth::check() && Request::active()->action !== 'index') {
			Response::redirect('admin');
		}
	}

	public function action_index() {
		$template = View::forge('template/admin/template_main', [
			'active_menu' => "12,13"
		]);

		$setting = Model_SiteSettings::find('first');

		$content = View::forge('admin/setting/basic', compact('setting'));

		$template->content = $content;
		$template->title = 'Cài đặt cơ bản';

		return Response::forge($template);
	}

	public function post_basic() {
		$setting = Model_SiteSettings::find('first');

		$post = Input::post();

		$uploader = new \Helper\Uploader(DOCROOT . 'uploads/settings/', IMAGE_ALLOWED_FORMAT);

		if ($uploader->upload()) {
			$favicon = $uploader->getName('favicon');

			$logo_header = $uploader->getName('logo_header');

			$logo_header_reverse = $uploader->getName('logo_header_reverse');

			$og_image = $uploader->getName('og_image');

			$owner_avatar = $uploader->getName('owner_avatar');
		}

		foreach ($post as $key => $value) {
			$setting->$key = $value;
		}

		if (isset($favicon)) {
			$setting->favicon = $favicon;
		}

		if (isset($logo_header)) {
			$setting->logo_header = $logo_header;
		}

		if (isset($logo_header_reverse)) {
			$setting->logo_header_reverse = $logo_header_reverse;
		}

		if (isset($og_image)) {
			$setting->og_image = $og_image;
		}

		if (isset($owner_avatar)) {
			$setting->owner_avatar = $owner_avatar;
		}

		if ($setting->save()) {
			Session::set_flash('message', 'Cài đặt cơ bản được cập nhật!');
			return Response::forge('<script>parent.location.reload();</script>');
		} else {
			Session::set_flash('message', 'Lỗi khi cập nhật cài đặt cơ bản.');
			return Response::forge('<script>parent.location.reload();</script>');
		}
	}

	public function action_basic()
	{
		$template = View::forge('template/admin/template_main', [
			'active_menu' => "12,13"
		]);

		$setting = Model_SiteSettings::find('first');

		$content = View::forge('admin/setting/basic', compact('setting'));

		$template->content = $content;
		$template->title = 'Cài đặt cơ bản';

		return Response::forge($template);
	}
	public function post_advanced() {
		$setting = Model_SiteSettings::find('first');

		$post = Input::post();

		foreach ($post as $key => $value) {
			$setting->$key = $value;
		}

		if ($setting->save()) {
			Session::set_flash('message', 'Cài đặt được cập nhật!');
			Response::redirect('admin/setting/advanced');
		} else {
			Session::set_flash('message', 'Lỗi khi cập nhật cài đặt.');
			Response::redirect('admin/setting/advanced');
		}
	}
	public function action_advanced()
	{
		$template = View::forge('template/admin/template_main', [
			'active_menu' => "12,shipping_and_installation"
		]);

		$setting = Model_SiteSettings::find('first');

		$content = View::forge('admin/setting/advanced', compact('setting'));

		$template->content = $content;
		$template->title = 'Cài đặt cơ bản';

		return Response::forge($template);
	}

}