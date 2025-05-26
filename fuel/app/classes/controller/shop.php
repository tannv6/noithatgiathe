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
 * The Shop Controller.
 *
 * A basic controller example.  Has examples of how to set the
 * response body and status.
 *
 * @package  app
 * @extends  Controller
 */

use Helper\Tracking;

class Controller_Shop extends Controller
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
	public function action_index($page = 1)
	{

		$breadcrumb = [[
			'name' => 'Danh mục sản phẩm',
		]];

		$limit = 20;

		$orderby = Input::get('orderby');
		$price = Input::get('price');

		$orderbys = explode('-', $orderby);

		$fields = Model_Products::$_properties;

		$orderby_arr = [];

		if(in_array($orderbys[0], $fields)) {
			if(in_array($orderbys[1], ['asc', 'desc'])) {
				$orderby_arr[$orderbys[0]] = $orderbys[1];
			}
		}

		if(!is_array($price)) {
			if($price) {
				$prices = [explode('-', $price)];
			}
		} else {
			$prices = array_map(function($price) {
				return explode('-', $price);
			}, $price);
		}

		$products = Model_Products::getPaging([ 'status' => "Y", ], $page, $limit, $orderby_arr, $prices);

		$content = View::forge('template/user/product_container', [
			'breadcrumb' => $breadcrumb,
			'top_categories' => Model_ProductCategory::find('all', ['where' => ['level' => 1, 'status' => 'Y']]),
			'content' => View::forge('shop/products', [
				'content' => '',
				'products' => $products['data'],
				'page' => $products['page'],
				'total_page' => $products['total_page'],
			]),
			'title' => 'Sản phẩm tại nội thất Gia Thế',
			'top_sellers' => Model_Products::find('all', ['where' => ['top_seller' => "Y", 'status' => "Y",]]),
			'banner' => Model_Banners::find('first', ['where' => ['banner_code' => 'products_bottom']]),
		]);

		$template = View::forge('template/user/template_main', [
			'active' => 'shop',
			'title' => 'Sản phẩm tại nội thất Gia Thế',
		]);

		$template->content = $content;

		return Response::forge($template);
	}
	public function action_category($slug = null, $page = 1)
	{
		$orderby = Input::get('orderby');
		$price = Input::get('price');

		$orderbys = explode('-', $orderby);
		if(!is_array($price)) {
			if($price) {
				$prices = [explode('-', $price)];
			}
		} else {
			$prices = array_map(function($price) {
				return explode('-', $price);
			}, $price);
		}

		$fields = Model_Products::$_properties;

		$limit = 20;

		$category = Model_ProductCategory::find('first', ['where' => ['slug' => $slug]]);

		$breadcrumb = [];

		$orderby_arr = [];

		if(in_array($orderbys[0], $fields)) {
			if(in_array($orderbys[1], ['asc', 'desc'])) {
				$orderby_arr[$orderbys[0]] = $orderbys[1];
			}
		}

		$where = ['category_id' => $category['category_id'], 'status' => "Y",];

		$products = Model_Products::getPaging($where, $page, $limit, $orderby_arr, $prices);

		$parents_category = Model_ProductCategory::getParents($category['category_id']);
		
		foreach ($parents_category as $parent) {
			$breadcrumb[] = [
				'name' => $parent['category_name'],
				'url' => "/danh-muc-san-pham/{$parent['slug']}",
			];
		}
		
		$parents_category = array_column($parents_category, 'category_id');

		$child_categories = Model_ProductCategory::find('all', ['where' => ['parent_id' => $category['category_id'], 'status' => 'Y']]);
		
		$breadcrumb[] = [
			'name' => $category['category_name'],
		];

		$content = View::forge('template/user/product_container', [
			'breadcrumb' => $breadcrumb,
			'top_categories' => [],
			'child_categories' => $child_categories,
			'category_id' => $category['category_id'],
			'parents_category' => $parents_category,
			'content' => View::forge('shop/products', [
				'content' => $category['sort_description'],
				'products' => $products['data'],
				'page' => $products['page'],
				'total_page' => $products['total_page'],
			]),
			'title' => $category['category_name'],
			'top_sellers' => Model_Products::find('all', ['where' => ['top_seller' => "Y", 'status' => "Y",]]),
			'banner' => Model_Banners::find('first', ['where' => ['banner_code' => 'products_bottom']]),
		]);

		$content->set('category', $category, false);

		$template = View::forge('template/user/template_main', [
			'category_id' => $category['category_id'],
			'parents_category' => $parents_category,
			'body_class' => "archive tax-product_cat term-{$category['slug']} term-{$category['category_id']} website-design-by-thcmedia theme-thcmedia-company woocommerce woocommerce-page woocommerce-no-js",
			'active' => 'shop',
			'title' => $category['category_name'],
		]);

		$template->content = $content;

		return Response::forge($template);
	}
	public function action_product($slug = null)
	{
		$product = Model_Products::find('first', ['where' => ['slug' => $slug, 'status' => "Y",]]);

		if(!$product) return Response::redirect('/');

		$product = $product->to_array();

		Tracking::trackProductView($product['product_id']);

		$template = View::forge('template/user/template_main', [
			'body_class' => "product-template-default single single-product postid-{$product['product_id']} website-design-by-thcmedia theme-thcmedia-company woocommerce woocommerce-page woocommerce-no-js",
			'active' => 'shop',
			'title' => $product['product_name'],
			// 'description' => $product['product_name'],
			'og_image' => DOMAIN . "/storages/products/" . $product['product_image'],
			'og_url' => DOMAIN . '/san-pham/' . $product['slug'],
		]);
		$breadcrumb = [];

		$product['gallery'] = Model_ProductGallery::find('all', ['where' => ['product_id' => $product['product_id']]]);
		
		$categories = Model_ProductCategoryMapping::getCateOfProduct($product['product_id']);
		
		foreach ($categories as $category) {
			$breadcrumb[] = [
				'name' => $category['category_name'],
				'url' => "/danh-muc-san-pham/{$category['slug']}",
			];
		}
		
		$sell_price = $product['sell_price'];
		$init_price = $product['init_price'];

		$product['sell_price'] = number_format($sell_price, 0, ',', '.');

		if($init_price && $init_price > $sell_price) {
			$product['init_price'] = number_format($init_price, 0, ',', '.');

			$product['save'] = number_format($init_price - $sell_price, 0, ',', '.');
		} else {
			$product['init_price'] = "";
		}

		$related_products = Model_Products::find('all', [
			'where' => [
				['category_id', '=', $product['category_id']],
				['product_id', '!=', $product['product_id']],
				'status' => "Y",
			],
			'limit' => 6
		]);

		foreach ($related_products as $key => $product1) {
			$related_products[$key]['category'] = Model_ProductCategory::find('first', ['where' => ['category_id' => $product1->category_id]]);
		}

		$flash_sale_products = Model_Products::find('all', ['where' => ['is_flash_sale' => "Y", 'status' => "Y",], 'limit' => 3]);

		foreach ($flash_sale_products as $key => $product2) {
			$flash_sale_products[$key]['category'] = Model_ProductCategory::find('first', ['where' => ['category_id' => $product2->category_id]]);
		}

		$top_sell_products = Model_Products::find('all', ['where' => ['top_seller' => "Y", 'status' => "Y",], 'limit' => 3]);

		foreach ($top_sell_products as $key => $product3) {
			$top_sell_products[$key]['category'] = Model_ProductCategory::find('first', ['where' => ['category_id' => $product3->category_id]]);
		}
		
		$breadcrumb[] = [
			'name' => $product['product_name'],
		];

		$content = View::forge('shop/detail',[
			'breadcrumb' => $breadcrumb,
			'product' => $product,
			'related_products' => $related_products,
			'flash_sale_products' => $flash_sale_products,
			'top_sell_products' => $top_sell_products,
		]);
		$template->content = $content;
		return Response::forge($template);
	}
}