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

class Controller_Admin_Contacts extends Controller
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

		$page = Input::get('page', 1);

		$template = View::forge('template/admin/template_main', [
			'active_menu' => "contact,contact_list"
		]);

		$contacts = Model_Contact::getPaging([], $page);

		$view = View::forge('admin/contacts/index', compact('contacts', 'code'));

		$template->content = $view;
		$template->title = 'Danh sách liên hệ';

		return Response::forge($template);
	}
	public function action_write($id = null)
	{
		if($id) {
			$contact = Model_Contact::find($id);
			foreach (Input::post() as $key => $value) {
				$contact->$key = $value;
			}
			$contact && $contact->save();
		} else {
			$contact = Model_Contact::forge(Input::post());
			$contact && $contact->save();
		}

		Session::set_flash('message', 'Liên hệ đã được cập nhật!');

		return Response::forge(json_encode([
			'result' => 'success'
		]));
	}
	public function get_detail($id = null)
	{
		$id = intval($id);
		$contact = Model_Contact::find($id)->to_array();
		$contact['message'] = nl2br($contact['message']);
		return Response::forge(json_encode($contact));
	}
	public function post_delete() {
		$ids = Input::post('ids');
		$cnt = count($ids);
		for ($i=0; $i < $cnt; $i++) {
			$entry = Model_Contact::find($ids[$i]);
			$entry->delete();
		}
		return Response::forge(json_encode([
			'result' => 'success'
		]));
	}
}
