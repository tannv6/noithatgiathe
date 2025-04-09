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
class Controller_Main extends Controller
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
		$s_text = Input::get('s_text');

		if($s_text) {
			$page = (int) Input::get('page', 1);

			$view = View::forge('main/search', [
				'products' => Model_Products::getPaging([ 'status' => "Y", ['product_name', 'LIKE', '%'.$s_text.'%']], $page),
				's_text' => $s_text
			]);
		} else {
			$banners = Model_Banners::find('all', ['where' => ['banner_code' => 'main_visual', 'status' => 'Y']]);
			$banners_middle = Model_Banners::find('all', ['where' => ['banner_code' => 'middle_visual', 'status' => 'Y']]);
			$banners_middle = array_values($banners_middle);

			$ads = Model_Banners::find('all', ['where' => ['banner_code' => 'ads', 'status' => 'Y']]);
			$ads = array_values($ads);

			$projects = Model_BbsList::find('all', ['where' => ['category_code' => 'project', 'status' => "Y",], 'order_by' => ['o_num' => 'desc']]);

			$new_products = Model_Products::getPaging(['is_new' => "Y", 'status' => "Y",], 1, 6)['data'];

			foreach ($new_products as $product) {
				$cate = Model_ProductCategory::find('first', ['where' => ['category_id' => $product->category_id]]);
				$product['category'] = $cate ? $cate->to_array() : [];
			}

			$top_sell_products = Model_Products::getPaging(['top_seller' => "Y", 'status' => "Y",], 1, 6)['data'];

			foreach ($top_sell_products as $product) {
				$cate = Model_ProductCategory::find('first', ['where' => ['category_id' => $product->category_id]]);
				$product['category'] = $cate ? $cate->to_array() : [];
			}

			$flash_sale_products = Model_Products::getPaging(['is_flash_sale' => "Y", 'status' => "Y",], 1, 6)['data'];

			foreach ($flash_sale_products as $product) {
				$cate = Model_ProductCategory::find('first', ['where' => ['category_id' => $product->category_id]]);
				$product['category'] = $cate ? $cate->to_array() : [];
			}

			$product_list_by_category = Model_ProductCategory::find('all', ['where' => ['level' => 1], 'order_by' => ['o_num' => 'desc']]);

			foreach ($product_list_by_category as $category) {

				$children = Model_ProductCategory::find('all', ['where' => ['parent_id' => $category->category_id], 'order_by' => ['o_num' => 'desc']]);

				foreach ($children as $child) {
					$products = Model_Products::getPaging(['category_id' => $child->category_id, 'status' => "Y",], 1, 10)['data'];
					if(count($products) > 0) {
						$child['products'] = $products;
					} else {
						unset($children[$child->category_id]);
					}
				}

				if(count($children) == 0) {
					unset($product_list_by_category[$category->category_id]);
				} else {
					$category['children'] = array_values($children);
				}

			}

			$main_banner_config = Model_BannerConfig::get_by_banner_code('main_visual');
			$middle_banner_config = Model_BannerConfig::get_by_banner_code('middle_visual');
			$ads_banner_config = Model_BannerConfig::get_by_banner_code('ads');

			$top_categories = Model_ProductCategory::find('all', ['where' => ['level' => 1, 'status' => 'Y'], 'order_by' => ['o_num' => 'desc']]);

			$view = View::forge('main/index', compact(
				'banners',
				'ads',
				'banners_middle',
				'projects',
				'new_products',
				'top_sell_products',
				'flash_sale_products',
				'product_list_by_category',
				'main_banner_config',
				'middle_banner_config',
				'ads_banner_config',
				'top_categories',
			));
		}

		$template = View::forge('template/user/template_main', [
			'active' => 'home',
		]);

		$template->content = $view;

		return Response::forge($template);
	}
	// private function getCategoriesWithChildren($parent_id = null) {
	//     $categories1 = Model_ProductCategory::query()
	//         ->where('parent_id', $parent_id)
	//         ->get();

	//     $categories_array = array_map(function($category) {
	//         return $category->to_array();
	//     }, $categories1);

	//     foreach ($categories_array as &$category) {
	//         $categories2 = $this->getCategoriesWithChildren($category['category_id']);
	//         $category->children = $categories2;
	//     }

	//     return $categories_array;
	// }
}
