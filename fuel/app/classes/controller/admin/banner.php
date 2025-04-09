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

class Controller_Admin_Banner extends Controller
{

	public function before() {
		parent::before();
		error_reporting(0);
		if (!Auth::check() && Request::active()->action !== 'index') {
			Response::redirect('admin');
		}
	}

	/**
	 * The basic main message
	 *
	 * @access  public
	 * @return  Response
	 */
	public function action_index()
	{

		$code = Input::get('code');

		$code_names = [
			'main_visual' => "Đầu trang chính",
			'middle_visual' => 'Giữa trang chính',
			'products_bottom' => 'Danh sách sản phẩm',
			'ads' => 'Sứ mệnh',
		];

		$template = View::forge('template/admin/template_main', [
			'active_menu' => "12,banner,$code"
		]);

		$banners = Model_Banners::find('all', ['where' => ['banner_code' => $code]]);

		$banners = array_values($banners);

		$config = Model_BannerConfig::find('first', ['where' => ['banner_code' => $code]]);

		$view = View::forge('admin/banner/index', compact('banners', 'code', 'config'));

		$template->content = $view;
		$template->title = 'Banner ' . $code_names[$code];

		return Response::forge($template);
	}
	public function action_write($id = null)
	{
		$banner = null;
		$image_url = null;
		$config = null;
		if (Input::method() == 'POST') {
			$uploader = new \Helper\Uploader(DOCROOT . 'uploads/banners/', IMAGE_ALLOWED_FORMAT);

			if ($uploader->upload()) {

				$image_url = $uploader->getName('image');

				$image_url_m = $uploader->getName('image_mobile');
			}

			if($id) {
				$banner = Model_Banners::find($id);
				$banner->link_url = Input::post('link_url');
				$banner->ratio = Input::post('ratio');
				$banner->ratio_m = Input::post('ratio_m');
				$banner->title = Input::post('title');
				$banner->sub_title = Input::post('sub_title');
				$banner->status = Input::post('status', 1);
				if($image_url) $banner->image_url = $image_url;
				if($image_url_m) $banner->image_url_m = $image_url_m;

				if ($banner && $banner->save()) {
					Session::set_flash('success', 'Banner được cập nhật!');
					Response::redirect('admin/banner/write/' . $id . '?code=' . Input::post('banner_code'));
				} else {
					Session::set_flash('error', 'Lỗi khi cập nhật banner.');
				}
			} else {
				$banner = Model_Banners::forge([
					'link_url' => Input::post('link_url'),
					'ratio' => Input::post('ratio'),
					'ratio_m' => Input::post('ratio_m'),
					'title' => Input::post('title'),
					'sub_title' => Input::post('sub_title'),
					'status' => Input::post('status', 'Y'),
					'banner_code' => Input::post('banner_code'),
				]);

				if($image_url) $banner->image_url = $image_url;
				if($image_url_m) $banner->image_url_m = $image_url_m;

				if ($banner && $banner->save()) {
					Session::set_flash('success', 'Banner đã được thêm!');
					Response::redirect('admin/banner?code=' . Input::post('banner_code'));
				} else {
					Session::set_flash('error', 'Lỗi khi thêm banner.');
				}
			}
		} else {
			$code = Input::get('code');
			if ($id) {
				$banner = Model_Banners::find($id);
				$config = Model_BannerConfig::find('first', ['where' => ['banner_code' => $code]]);
				if (!$banner) {
					Response::redirect('admin/banner');
				}
			}
		}

		$template = View::forge('template/admin/template_main', [
			'active_menu' => "12,banner,$code"
		]);

		$template->content = View::forge('admin/banner/write', compact('banner', 'code', 'config'));
		$template->title = $id ? 'Sửa banner' : 'Thêm banner';

		return Response::forge($template);
	}
	public function post_delete() {
		$ids = Input::post('ids');
		$cnt = count($ids);
		for ($i=0; $i < $cnt; $i++) {
			$entry = Model_Banners::find($ids[$i]);
			$entry->delete();
		}
		return Response::forge(json_encode([
			'result' => 'success'
		]));
	}
	public function post_updateratio() {
		$post = Input::post();

		Model_BannerConfig::updateOrCreate($post);

		return Response::forge(json_encode([
			'result' => 'success',
		]));
	}
}
