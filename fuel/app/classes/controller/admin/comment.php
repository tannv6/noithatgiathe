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

class Controller_Admin_Comment extends Controller
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

		$template = View::forge('template/admin/template_main', [
			'active_menu' => "comment,comment_list"
		]);

		$comments = Model_Comments::find('all');

		$comments = array_values($comments);

		$view = View::forge('admin/comment/index', compact('comments'));

		$template->content = $view;
		$template->title = 'Danh sách bình luận';

		return Response::forge($template);
	}
	public function action_write($id = null)
	{
		if($id) {
			$contact = Model_Comments::find($id);
			foreach (Input::post() as $key => $value) {
				$contact->$key = $value;
			}
			$contact && $contact->save();
		} else {
			$contact = Model_Comments::forge(Input::post());
			$contact && $contact->save();
		}

		Session::set_flash('message', 'Bình luận đã được cập nhật!');

		return Response::forge(json_encode([
			'result' => 'success'
		]));
	}
	public function get_detail($id = null)
	{
		$id = intval($id);
		$contact = Model_Comments::find($id)->to_array();
		$contact['content'] = nl2br($contact['content']);
		return Response::forge(json_encode($contact));
	}
	public function post_delete() {
		$ids = Input::post('ids');
		$cnt = count($ids);
		for ($i=0; $i < $cnt; $i++) {
			$entry = Model_Comments::find($ids[$i]);
			$entry->delete();
		}
		return Response::forge(json_encode([
			'result' => 'success'
		]));
	}
}
