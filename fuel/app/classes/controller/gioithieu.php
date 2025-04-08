<?php

class Controller_Gioithieu extends Controller
{
    public function before() {
		parent::before();
		error_reporting(0);
	}
    public function action_index()
    {

        $introduction_slug = array_reverse(explode("/", INTRODUCTION))[0];

        $introduction = Model_BbsList::find('first', ['where' => ['slug' => $introduction_slug]]);

        // dd($introduction);

        $view = View::forge('main/intro', [
            'content' => $introduction['content'],
        ]);

        $template = View::forge('template/user/template_main', [
            'active' => 'gioithieu',
            'title' => "Giới thiệu"
        ]);

        $template->content = $view;

        return Response::forge($template);
    }
}