<?php

class Controller_Gioithieu extends Controller
{
    public function before() {
		parent::before();
		error_reporting(0);
	}
    public function action_index()
    {

        $view = View::forge('main/intro');

        $template = View::forge('template/user/template_main', [
            'active' => 'gioithieu',
        ]);

        $template->content = $view;

        return Response::forge($template);
    }
}