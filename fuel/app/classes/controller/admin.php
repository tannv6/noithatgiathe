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

class Controller_Admin extends Controller
{

	public function before() {
		parent::before();
		error_reporting(0);
		if (!Auth::check() && Request::active()->action !== 'index' && Request::active()->action !== 'logout') {
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
		$data = array();

		// If so, you pressed the submit button. Let's go over the steps.
		if (Input::post())
		{
			// Check the credentials. This assumes that you have the previous table created and
			// you have used the table definition and configuration as mentioned above.
			if (Auth::login())
			{
				// Credentials ok, go right in.
				Response::redirect('admin/dashboard');
			}
			else
			{
				// Oops, no soup for you. Try to login again. Set some values to
				// repopulate the username field and give some error text back to the view.
				$data['username']    = Input::post('username');
				$data['login_error'] = 'Wrong username/password combo. Try again';
			}
		}

		$view = View::forge('admin/index', $data);

		return Response::forge($view);
	}
	public function action_dashboard() {
		$template = View::forge('template/admin/template_main');

		$view = View::forge('admin/dashboard');

		$template->content = $view;
		$template->title = 'Dashboard';

		return Response::forge($template);
	}
	public function action_logout() {
		Auth::logout();
		Response::redirect('admin');
	}
	public function action_regis()
	{
		$user_id = Input::get("user_id");
		$pass = Input::get("pass");
		$email = Input::get("email");
		if($user_id && $pass && $email) {
			// Tạo user mới
			$user_id_make = Auth::create_user(
				$user_id,       // Tên đăng nhập
				$pass, // Mật khẩu (nên đặt mạnh hơn)
				$email, // Email
				100           // Cấp độ nhóm (100 là admin mặc định)
			);
		}
		// Kiểm tra kết quả
		if ($user_id_make) {
			echo "User admin đã được tạo thành công với ID: " . $user_id_make;
		} else {
			echo "Lỗi khi tạo user.";
		}
	}
}
