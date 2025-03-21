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
	public function action_index()
	{

        $breadcrumb = [[
            'name' => 'Danh mục sản phẩm',
        ]];

        $content = View::forge('template/user/product_container', [
            'breadcrumb' => $breadcrumb,
            'top_categories' => Model_ProductCategory::find('all', ['where' => ['level' => 1, 'status' => 'Y']]),
            'content' => View::forge('shop/category', [
                'categories' => Model_ProductCategory::find('all', ['where' => ['level' => 2]]),
            ]),
            'title' => 'Sản phẩm tại nội thất Gia Thế',
            'top_sellers' => Model_Products::find('all', ['where' => ['top_seller' => "Y"]]),
            'banner' => Model_Banners::find('first', ['where' => ['banner_code' => 'products_bottom']]),
        ]);

        $template = View::forge('template/user/template_main', [
            'active' => 'shop',
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

        $limit = 1;

        $category = Model_ProductCategory::find('first', ['where' => ['slug' => $slug]]);

        $breadcrumb = [[
            'name' => $category['category_name'],
        ]];

        $orderby_arr = [];

        if(in_array($orderbys[0], $fields)) {
            if(in_array($orderbys[1], ['asc', 'desc'])) {
                $orderby_arr[$orderbys[0]] = $orderbys[1];
            }
        }

        $where = ['category_id' => $category['category_id']];

        $products = Model_Products::getPaging($where, $page, $limit, $orderby_arr, $prices);

        $content = View::forge('template/user/product_container', [
            'breadcrumb' => $breadcrumb,
            'top_categories' => Model_ProductCategory::find('all', ['where' => ['parent_id' => $category['category_id'], 'status' => 'Y']]),
            'content' => View::forge('shop/products', [
                'content' => $category['sort_description'],
                'products' => $products['data'],
                'page' => $products['page'],
                'total_page' => $products['total_page'],
                'url' => "/danh-muc-san-pham/{$slug}/",
            ]),
            'title' => $category['category_name'],
            'top_sellers' => Model_Products::find('all', ['where' => ['top_seller' => "Y"]]),
            'banner' => Model_Banners::find('first', ['where' => ['banner_code' => 'products_bottom']]),
        ]);

        $content->set('category', $category, false);

        $template = View::forge('template/user/template_main', [
            'body_class' => "archive tax-product_cat term-{$category['slug']} term-{$category['category_id']} website-design-by-thcmedia theme-thcmedia-company woocommerce woocommerce-page woocommerce-no-js",
            'active' => 'shop',
        ]);

        $template->content = $content;

		return Response::forge($template);
    }
    public function action_product($slug = null)
    {
        $product = Model_Products::find('first', ['where' => ['slug' => $slug]])->to_array();

        Tracking::trackProductView($product['product_id']);

        $template = View::forge('template/user/template_main', [
            'body_class' => "product-template-default single single-product postid-{$product['product_id']} website-design-by-thcmedia theme-thcmedia-company woocommerce woocommerce-page woocommerce-no-js",
            'active' => 'shop',
        ]);
        $breadcrumb = [[
            'name' => $product['product_name'],
        ]];

        if($product) {
            $product['gallery'] = Model_ProductGallery::find('all', ['where' => ['product_id' => $product['product_id']]]);
            $product['category'] = Model_ProductCategory::find('first', ['where' => ['category_id' => $product['category_id']]]);
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
                ['product_id', '!=', $product['product_id']]
            ],
            'limit' => 6
        ]);

        foreach ($related_products as $key => $product1) {
            $related_products[$key]['category'] = Model_ProductCategory::find('first', ['where' => ['category_id' => $product1->category_id]]);
        }

        $flash_sale_products = Model_Products::find('all', ['where' => ['is_flash_sale' => "Y"], 'limit' => 3]);

        foreach ($flash_sale_products as $key => $product2) {
            $flash_sale_products[$key]['category'] = Model_ProductCategory::find('first', ['where' => ['category_id' => $product2->category_id]]);
        }

        $top_sell_products = Model_Products::find('all', ['where' => ['top_seller' => "Y"], 'limit' => 3]);

        foreach ($top_sell_products as $key => $product3) {
            $top_sell_products[$key]['category'] = Model_ProductCategory::find('first', ['where' => ['category_id' => $product3->category_id]]);
        }

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