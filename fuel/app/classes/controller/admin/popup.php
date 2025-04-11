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
		$popup_gallery = [];
		if (Input::method() == 'POST') {
			$deleted_images = explode(',', Input::post('deleted_images'));
			$deleted_images = array_filter($deleted_images, function($value) {
				return $value;
			});

			$uploader = new \Helper\Uploader(DOCROOT . 'storages/popups/', IMAGE_ALLOWED_FORMAT);

			if ($uploader->upload()) {
				$popup_gallery = $uploader->get('popup_gallery');
			}

			if($id) {
				$popup = Model_Popup_Index::find($id);
				foreach (Input::post() as $key => $value) {
					$popup->{$key} = $value;
				}
				$success = 'Popup được cập nhật!';
				$error = 'Lỗi khi cập nhật popup.';
				$redirect = 'admin/popup/write/' . $id;
			} else {
				$popup = Model_Popup_Index::forge(Input::post());
				$success = 'Popup đã được thêm!';
				$error = 'Lỗi khi thêm popup.';
				$redirect = 'admin/popup';
			}

			if ($popup && $popup->save()) {

				foreach ($popup_gallery as $key => $value) {
					$popup_gallery1 = Model_Popup_Image::forge([
						'popup_id' => $popup->id,
						'image_url' => $value['saved_as'],
						'sort_order' => $key
					]);

					$popup_gallery1->save();
				}

				foreach ($deleted_images as $key => $value) {
					$popup_gallery1 = Model_Popup_Image::find($value);
					$popup_gallery1->delete();
				}

				Session::set_flash('success', $success);
				Response::redirect($redirect);
			} else {
				Session::set_flash('error', $error);
			}
		} else {
			$code = Input::get('code');
			if ($id) {
				$popup = Model_Popup_Index::find($id);
				if (!$popup) {
					Response::redirect('admin/popup');
				}
				$popup_gallery = Model_Popup_Image::find('all', ['where' => ['popup_id' => $id]]);
			}
		}

		$template = View::forge('template/admin/template_main', [
			'active_menu' => "12,popup"
		]);

		$template->content = View::forge('admin/popup/write', compact('popup', 'popup_gallery'));
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