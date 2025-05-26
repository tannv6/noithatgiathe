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
 * The Bbs Controller.
 *
 * A basic controller example.  Has examples of how to set the
 * response body and status.
 *
 * @package  app
 * @extends  Controller
 */
use Helper\Tracking;

class Controller_Bbs extends Controller
{

	public function before() {
		parent::before();
		error_reporting(0);
	}
	/**
	 * The basic main message
	 *
	 * @access  public
	 * @return  Response
	 */
	public function action_index()
	{
		$template = View::forge('template/user/template_main',[
			'title' => 'Chuyên mục bài viết',
		]);

		return Response::forge($template);
	}

	public function get_list($slug = null, $page = 1)
	{

		$limit = 10;

		$category = Model_BbsCategory::find('first', ['where' => ['slug' => $slug]]);

		$posts = Model_BbsList::getPaging(['category_code' => $category['code'], 'status' => "Y",], $page, $limit);

		$view = View::forge('bbs/list', [
			'title' => $category['name'],
		]);

		$view->set('posts', $posts['data'], false);
		$view->set('page', $posts['page'], false);
		$view->set('total_page', $posts['total_page'], false);
		$view->set('url', "/danh-muc-bai-viet/$slug/", false);

		$breadcrumb = [[
			'name' => $category['name'],
		]];

		$most_view = Model_BbsList::getMostView();

		$content = View::forge('template/user/bbs_container', [
			'view' => $view,
			'breadcrumb' => $breadcrumb,
			'most_view' => $most_view
		]);

		$template = View::forge('template/user/template_main', [
			'active' => $slug,
			'title' => $category['name'],
		]);

		$template->content = $content;

		return Response::forge($template);
	}
	public function get_view($slug = null)
	{
		$comment_author = \Session::get('comment_author');
		$comment_email = \Session::get('comment_email');
		$comment_remember = \Session::get('comment_remember');

		$bbs = Model_BbsList::find('first', ['where' => ['slug' => $slug, 'status' => "Y",]]);

		if (empty($bbs)) {
			return Response::redirect('/');
		}

		$comments = Model_Comments::find('all', ['where' => ['bbs_id' => $bbs['bbs_id']]]);

		Tracking::trackPostView($bbs['bbs_id']);

		$view = View::forge('bbs/view', [
			'comment_author' => $comment_author,
			'comment_email' => $comment_email,
			'comment_remember' => $comment_remember,
			'comments' => $comments,
			'star' => 4,
			'cmt_count' => 101,
		]);

		$view ->set('bbs', $bbs, false);
		
		$breadcrumb = [];
		
		$category = Model_BbsCategory::find('first', ['where' => ['code' => $bbs['category_code']]]);
		
		if (!empty($category)) {
			$breadcrumb[] = [
				'name' => $category['name'],
				'url' => "/danh-muc-bai-viet/" . $category['slug'],
			];
		}

		$breadcrumb[] = [
			'name' => $bbs['title'],
		];

		$most_view = Model_BbsList::getMostView();

		$content = View::forge('template/user/bbs_container', [
			'view' => $view,
			'breadcrumb' => $breadcrumb,
			'most_view' => $most_view,
		]);

		$template = View::forge('template/user/template_main', [
			'active' => $category['slug'],
			'title' => $bbs['title'],
			'og_image' => DOMAIN . "/storages/bbs/{$bbs['category_code']}/" . $bbs['thumb'],
			'og_url' => DOMAIN . "/bai-viet/" . $bbs['slug'],
		]);

		$template->content = $content;

		return Response::forge($template);
	}
}
