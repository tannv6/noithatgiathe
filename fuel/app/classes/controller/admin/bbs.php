<?php

class Controller_Admin_Bbs extends Controller_Base
{
	public function before() {
		parent::before();
		error_reporting(0);
		if (!Auth::check() && Request::active()->action !== 'index') {
			Response::redirect('admin');
		}
	}
	public function action_index()
	{
		$page = Input::get('page', 1);

		$category_code = Input::get('category_code');
		$title = Input::get('title');
		$sort = Input::get('sort');

		$sort_arr1 = explode('-', $sort);

		$sort_arr = [];

		if($sort_arr1[0] && $sort_arr1[1]) {
			$sort_arr[$sort_arr1[0]] = $sort_arr1[1];
		}

		$sort_arr['bbs_id'] = 'desc';

		$result = Model_BbsList::getPaging( ['category_code' => $category_code, 'title' => $title], $page, 10, $sort_arr);

		$list = $result['data'];

		$view = View::forge('admin/bbs/index', compact('result', 'category_code', 'title', 'sort'));

		$template = View::forge('template/admin/template_main', [
			'active_menu' => "5,$category_code"
		]);

		$template->content = $view;

		$category = Model_BbsCategory::find('first', ['where' => ['code' => $category_code]]);

		$template->title = 'Danh sách bài viết ‘' . $category['name'] . '’';

		return Response::forge($template);
	}
	private function getUniqueSlug($slug, $id = null) {
		$slugDb = Model_BbsList::find('first', ['where' => [
			['slug', '=', $slug],
			['bbs_id', '!=', $id]
		]]);
		if ($slugDb) {
			// Giá trị đã tồn tại, tìm một hậu tố duy nhất tăng dần
			$suffix = 1;
			$new_slug = $slug . '-' . $suffix;

			// Kiểm tra xem giá trị mới đã tồn tại chưa, nếu có thì tăng hậu tố
			while (Model_BbsList::find('first', ['where' => ['slug' => $new_slug]])) {
				$suffix++;
				$new_slug = $slug . '-' . $suffix;
			}

			// Sử dụng giá trị mới với hậu tố duy nhất tăng dần
			$slug = $new_slug;
		}

		return $slug;
	}
	public function action_write($id = null)
	{
		$bbs = null;
		if (Input::method() == 'POST') {
			$uploader = new \Helper\Uploader(DOCROOT . 'uploads/bbs/' . Input::post('category_code') . '/', IMAGE_ALLOWED_FORMAT);

			if ($uploader->upload()) {
				$thumb = $uploader->getName('image');
			}
			if($id) {
				$bbs = Model_BbsList::find($id);
				$bbs->title = Input::post('title');
				$bbs->description = Input::post('description');
				$bbs->content = Input::post('content');
				$bbs->status = Input::post('status', 1);
				$bbs->slug = $this->getUniqueSlug($this->convert_vn_to_str(Input::post('slug')), $id);
				if($thumb) $bbs->thumb = $thumb;

				if ($bbs && $bbs->save()) {
					Session::set_flash('success', 'Bài viết được cập nhật!');
					Response::redirect('admin/bbs/write/' . $id . '?category_code=' . Input::post('category_code') );
				} else {
					Session::set_flash('error', 'Lỗi khi cập nhật bài viết.');
				}
			} else {
				$bbs = Model_BbsList::forge([
					'title' => Input::post('title'),
					'description' => Input::post('description'),
					'content' => Input::post('content'),
					'status' => Input::post('status', 1),
					'category_code' => Input::post('category_code'),
					'slug' => $this->getUniqueSlug($this->convert_vn_to_str(Input::post('title'))),
					'view_count' => 0,
					'o_num' => 0
				]);

				$bbs->thumb = $thumb ? $thumb : '';

				if ($bbs && $bbs->save()) {
					Session::set_flash('success', 'Bài viết đã được thêm!');
					Response::redirect('admin/bbs?category_code=' . Input::post('category_code') );
				} else {
					Session::set_flash('error', 'Lỗi khi thêm bài viết.');
				}
			}
		} else {
			$category_code = Input::get('category_code');
			if ($id) {
				$bbs = Model_BbsList::find($id);
				if (!$bbs) {
					Response::redirect('admin/bbs?category_code=' . $category_code );
				}
			}
		}

		$template = View::forge('template/admin/template_main', [
			'active_menu' => "5,$category_code"
		]);

		$template->content = View::forge('admin/bbs/write', compact( 'bbs', 'category_code'));
		$template->title = $id ? 'Sửa bài viết' : 'Thêm bài viết';

		return Response::forge($template);
	}
	public function post_delete() {
		$ids = Input::post('ids');
		$cnt = count($ids);
		for ($i=0; $i < $cnt; $i++) {
			$entry = Model_BbsList::find($ids[$i]);
			$entry->delete();
		}
		return Response::forge(json_encode([
			'result' => 'success'
		]));
	}
	public function post_change()
	{
		$bbs_id = Input::post('bbs_id');
		$o_num = Input::post('o_num');

		$cnt = count($bbs_id);
		for ($i=0; $i < $cnt; $i++) {
			$entry = Model_BbsList::find($bbs_id[$i]);
			$entry->o_num = $o_num[$i];
			$entry->save();
		}
		\Session::set_flash('message', "Thông tin đã được cập nhật!");

		$res = '<script>
					parent.location.reload();
				</script>';

		return Response::forge($res);

	}
}