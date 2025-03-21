<?php

class Controller_Comment extends Controller
{
    public function before() {
		parent::before();
		error_reporting(0);
	}
    public function post_write() {
        $bbs_id = Input::post('bbs_id');
        $parent_id = Input::post('parent_id');
        $content = Input::post('content');
        $email = Input::post('email');
        $author = Input::post('author');
        $save_info = Input::post('save_info');

        if($save_info) {
            \Session::set('comment_author', $author);
            \Session::set('comment_email', $email);
            \Session::set('comment_remember', "Y");
        } else {
            \Session::delete('comment_author');
            \Session::delete('comment_email');
            \Session::delete('comment_remember');
        }

        $data = array(
            'bbs_id' => $bbs_id,
            'parent_id' => $parent_id,
            'content' => $content,
            'email' => $email,
            'author' => $author,
            'status' => 'W',
        );

        $contact = Model_Comments::forge($data);

        $contact->save();

        $res = '<script>
                    parent.location.reload();
                </script>';

        return Response::forge($res);

    }
}