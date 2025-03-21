<?php

class Controller_Lienhe extends Controller
{
    public function before() {
		parent::before();
		error_reporting(0);
	}
    public function action_index()
    {

        $view = View::forge('main/lienhe');

        $template = View::forge('template/user/template_main', [
            'active' => 'lienhe',
        ]);

        $template->content = $view;

        return Response::forge($template);
    }
    public function post_write() {
        $full_name = Input::post('full_name');
        $email = Input::post('email');
        $phone = Input::post('phone');
        $message = Input::post('message');
        $data = array(
            'full_name' => $full_name,
            'email' => $email,
            'phone' => $phone,
            'message' => $message,
            'status' => 'W',
        );

        $contact = Model_Contact::forge($data);

        $contact->save();

        \Session::set_flash('message', "Cảm ơn quý khách đã liên hệ với chúng tôi. Chúng tôi sẽ liên hệ với quý khách trong thời gian sớm nhất.");

        $res = '<script>
                    parent.location.reload();
                </script>';

        return Response::forge($res);

    }
}