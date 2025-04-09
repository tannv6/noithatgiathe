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

class Controller_Admin_Popup extends Controller
{

	public function before() {
		parent::before();
		error_reporting(0);
		if (!Auth::check()) {
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

		$template = View::forge('template/admin/template_main', [
			'active_menu' => "12,popup"
		]);


		$popups = Model_Popup_Index::find('all');

        $popups = array_values($popups);

		$view = View::forge('admin/popup/index', compact('popups'));

		$template->content = $view;
		$template->title = 'Popup';

		return Response::forge($template);
	}
	public function action_write($id = null)
	{
		$popup = null;
		$image_url = null;
		if (Input::method() == 'POST') {
			$uploader = new \Helper\Uploader(DOCROOT . 'uploads/popups/', IMAGE_ALLOWED_FORMAT);

			if ($uploader->upload()) {

				$image_url = $uploader->getName('image');

				$image_url_m = $uploader->getName('image_mobile');
			}

			if($id) {
				$popup = Model_Popup_Index::find($id);
				$popup->title = Input::post('title');

				if ($popup && $popup->save()) {
					Session::set_flash('success', 'Popup được cập nhật!');
					Response::redirect('admin/popup/write/' . $id);
				} else {
					Session::set_flash('error', 'Lỗi khi cập nhật popup.');
				}
			} else {
				$popup = Model_Popup_Index::forge([
					'title' => Input::post('title'),
				]);

				if ($popup && $popup->save()) {
					Session::set_flash('success', 'Popup đã được thêm!');
					Response::redirect('admin/popup');
				} else {
					Session::set_flash('error', 'Lỗi khi thêm popup.');
				}
			}
		} else {
			$code = Input::get('code');
			if ($id) {
				$popup = Model_Popup_Index::find($id);
				if (!$popup) {
					Response::redirect('admin/popup');
				}
			}
		}

		$template = View::forge('template/admin/template_main', [
			'active_menu' => "12,popup"
		]);

		$template->content = View::forge('admin/popup/write', compact('popup'));
		$template->title = $id ? 'Sửa popup' : 'Thêm popup';

		return Response::forge($template);
	}
	public function post_delete() {
		$ids = Input::post('ids');
		$cnt = count($ids);
		for ($i=0; $i < $cnt; $i++) {
			$entry = Model_Popup_Index::find($ids[$i]);
			$entry->delete();
		}
		return Response::forge(json_encode([
			'result' => 'success'
		]));
	}
}