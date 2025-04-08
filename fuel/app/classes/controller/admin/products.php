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
 * @extends  Controller_Base
 */

class Controller_Admin_Products extends Controller_Base
{

	public function before() {
		parent::before();
		error_reporting(0);
		if (!Auth::check() && Request::active()->action !== 'index') {
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

        $page = Input::get('page', 1);
        $product_name = Input::get('product_name');
        $sort = Input::get('sort');

        $sort_arr1 = explode('-', $sort);

        $template = View::forge('template/admin/template_main', [
            'active_menu' => "2,4"
        ]);

        $sort_arr = [];

        if($sort_arr1[0] && $sort_arr1[1]) {
            $sort_arr[$sort_arr1[0]] = $sort_arr1[1];
        }

        $sort_arr['product_id'] = 'desc';

        $products = Model_Products::getPaging([
            'product_name' => $product_name
        ], $page, 10, $sort_arr);

        $view = View::forge('admin/products/index', compact('products', 'product_name', 'sort'));

        $template->content = $view;
		$template->title = 'Sản phẩm';

		return Response::forge($template);
	}

    private function getCategoriesWithChildren($parent_id = null) {
        $categories = [];
        $categories1 = Model_ProductCategory::query()
            ->where('parent_id', $parent_id)
            ->get();
    
        $categories_array = array_map(function($category) {
            return $category->to_array();
        }, $categories1);
    
        foreach ($categories_array as &$category) {
            $categories[] = $category;
            $categories2 = $this->getCategoriesWithChildren($category['category_id']);
            $categories = array_merge($categories, $categories2);
        }
    
        return $categories;
    }

    private function getUniqueSlug($slug, $id = null) {
        $slugDb = Model_Products::find('first', ['where' => [
            ['slug', '=', $slug],
            ['product_id', '!=', $id]
        ]]);
        if ($slugDb) {
            // Giá trị đã tồn tại, tìm một hậu tố duy nhất tăng dần
            $suffix = 1;
            $new_slug = $slug . '-' . $suffix;

            // Kiểm tra xem giá trị mới đã tồn tại chưa, nếu có thì tăng hậu tố
            while (Model_Products::find('first', ['where' => ['slug' => $new_slug]])) {
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
        $product = null;
        $product_image = null;
        $product_gallery = [];
        if (Input::method() == 'POST') {
            $deleted_images = explode(',', Input::post('deleted_images'));
            $deleted_images = array_filter($deleted_images, function($value) {
                return $value;
            });

            $uploader = new \Helper\Uploader(DOCROOT . 'uploads/products/', IMAGE_ALLOWED_FORMAT);

            if ($uploader->upload()) {

                $product_gallery = $uploader->get('product_gallery');

                $product_image = $uploader->getName('product_image');

            }

            if($id) {
                $product = Model_Products::find($id);
                $product->product_name = Input::post('product_name');
                $product->init_price = Input::post('init_price');
                $product->sell_price = Input::post('sell_price');
                $product->description = Input::post('description');
                $product->status = Input::post('status', 1);
                $product->category_id = Input::post('category_id');
                $product->top_seller = Input::post('top_seller', 'N');
                $product->is_new = Input::post('is_new', 'N');
                $product->is_flash_sale = Input::post('is_flash_sale', 'N');
                $product->slug = $this->getUniqueSlug($this->convert_vn_to_str(Input::post('slug')), $id);
                if($product_image) $product->product_image = $product_image;
                $success = 'Sản phẩm đã được cập nhật!';
                $error = 'Lỗi khi cập nhật sản phẩm.';
                $redirect = 'admin/products/write/' . $id;
            } else {
                $product = Model_Products::forge([
                    'product_name' => Input::post('product_name'),
                    'init_price' => Input::post('init_price'),
                    'sell_price' => Input::post('sell_price'),
                    'description' => Input::post('description'),
                    'status' => Input::post('status', 'Y'),
                    'category_id' => Input::post('category_id'),
                    'is_new' => Input::post('is_new', 'N'),
                    'is_flash_sale' => Input::post('is_flash_sale', 'N'),
                    'top_seller' => Input::post('top_seller', 'N'),
                    'slug' => $this->getUniqueSlug($this->convert_vn_to_str(Input::post('product_name'))),
					'view_count' => 0
                ]);

                if($product_image) $product->product_image = $product_image;

                $success = 'Sản phẩm mới được thêm!';
                $error = 'Lỗi khi thêm sản phẩm.';
                $redirect = 'admin/products';
            }
    
            if ($product && $product->save()) {

                foreach ($product_gallery as $key => $value) {
                    $product_gallery1 = Model_ProductGallery::forge([
                        'product_id' => $product->product_id,
                        'image_path' => $value['saved_as']
                    ]);

                    $product_gallery1->save();
                }

                foreach ($deleted_images as $key => $value) {
                    $product_gallery1 = Model_ProductGallery::find($value);
                    $product_gallery1->delete();
                }

				$category_ids = Input::post('category_ids');

				DB::query('DELETE FROM `product_category_mapping` WHERE `product_id` = ' . $product->product_id)->execute();

				if(is_array($category_ids)) {
					foreach($category_ids as $id) {
						Model_ProductCategoryMapping::forge([
							'category_id' => $id,
							'product_id' => $product->product_id
						])->save();
					}
				}

                Session::set_flash('success', $success);
                Response::redirect($redirect);
            } else {
                Session::set_flash('error', $error);
            }
        } else {
            if ($id) {
                $product = Model_Products::find($id);
                if (!$product) {
                    Response::redirect('admin/products');
                }
				$product['categories'] = array_column(Model_ProductCategoryMapping::find("all", ['where' => ['product_id' => $id]]), 'category_id');
				// dd($product['categories']);
                $product_gallery = Model_ProductGallery::find('all', ['where' => ['product_id' => $id]]);
            }
        }

        $categories = $this->getCategoriesWithChildren();

        $template = View::forge('template/admin/template_main', [
            'active_menu' => "2,4"
        ]);

        $template->content = View::forge('admin/products/write', compact('product', 'product_gallery', 'categories'));
        $template->title = $id ? 'Sửa sản phẩm' : 'Thêm sản phẩm';

        return Response::forge($template);
    }
    public function post_delete() {
        $ids = Input::post('ids');
        $cnt = count($ids);
        for ($i=0; $i < $cnt; $i++) {
            $entry = Model_Products::find($ids[$i]);
            $entry->delete();
        }
        return Response::forge(json_encode([
            'result' => 'success'
        ]));
    }
}