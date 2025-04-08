<?php

class Controller_Admin_ProductCategories extends Controller_Base
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
        $parent_id = Input::get('parent_id') ?: null;

        $parent = Model_ProductCategory::find($parent_id);

        $grand_parent_id = Model_ProductCategory::find($parent['parent_id'])['category_id'];

        $categories = Model_ProductCategory::find('all' , ['where' => ['parent_id' => $parent_id], 'order_by' => ['o_num' => 'desc']]);

        foreach($categories as $category) {
            $children = Model_ProductCategory::find('all', ['where' => ['parent_id' => $category->category_id]]);
            if(count($children) > 0) {
                $category->hasChild = true;
            } else {
                $category->hasChild = false;
            }
        }

        $categories = array_values($categories);

        $view = View::forge('admin/productcategories/index', compact('categories', 'parent_id', 'grand_parent_id'));

        $template = View::forge('template/admin/template_main', [
            'active_menu' => "2,3"
        ]);

        $template->content = $view;
		$template->title = 'Danh mục sản phẩm' . ($parent ? "({$parent['category_name']})" : "");

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
        $slugDb = Model_ProductCategory::find('first', ['where' => [
            ['slug', '=', $slug],
            ['category_id', '!=', $id]
        ]]);
        if ($slugDb) {
            // Giá trị đã tồn tại, tìm một hậu tố duy nhất tăng dần
            $suffix = 1;
            $new_slug = $slug . '-' . $suffix;

            // Kiểm tra xem giá trị mới đã tồn tại chưa, nếu có thì tăng hậu tố
            while (Model_ProductCategory::find('first', ['where' => ['slug' => $new_slug]])) {
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
        $category = null;
        if (Input::method() == 'POST') {
            $uploader = new \Helper\Uploader(DOCROOT . 'uploads/categories/', IMAGE_ALLOWED_FORMAT);

            if ($uploader->upload()) {
                $category_image = $uploader->getName('category_image');

                $category_banner = $uploader->getName('category_banner');
            }
            $parent_id = Input::post('parent_id');
            if ($parent_id) {
                $parent = Model_ProductCategory::find($parent_id);
                $level = $parent ? $parent->level + 1 : 1;
            } else {
                $level = 1;
            }
            if($id) {
                $delete_image = Input::post('delete_image');
                $delete_banner = Input::post('delete_banner');
                $category = Model_ProductCategory::find($id);
                $category->category_name = Input::post('category_name');
                $category->parent_id = Input::post('parent_id') ?: null;
                $category->status = Input::post('status', 1);
                $category->sort_description = Input::post('sort_description');
                $category->slug = $this->getUniqueSlug($this->convert_vn_to_str(Input::post('slug')), $id);
                $category->level = $level;
                if($delete_image) {
                    $category->category_image = '';
                }
                if($delete_banner) {
                    $category->category_banner = '';
                }
                if($category_image) $category->category_image = $category_image;
                if($category_banner) $category->category_banner = $category_banner;
    
                if ($category && $category->save()) {
                    Session::set_flash('success', 'Danh mục được cập nhật!');
                    Response::redirect('admin/productcategories/write/' . $id);
                } else {
                    Session::set_flash('error', 'Lỗi khi cập nhật danh mục.');
                }
            } else {
                $category = Model_ProductCategory::forge([
                    'category_name' => Input::post('category_name'),
                    'parent_id' => Input::post('parent_id') ?: null,
                    'status' => Input::post('status', 1),
                    'sort_description' => Input::post('sort_description'),
                    'slug' => $this->getUniqueSlug($this->convert_vn_to_str(Input::post('category_name'))),
                    'level' => $level,
                    'o_num' => 0
                ]);

                if($category_image) $category->category_image = $category_image;
                if($category_banner) $category->category_banner = $category_banner;
    
                if ($category && $category->save()) {
                    Session::set_flash('success', 'Danh mục đã được thêm!');
                    Response::redirect('admin/productcategories?parent_id=' . Input::post('parent_id') );
                } else {
                    Session::set_flash('error', 'Lỗi khi thêm danh mục.');
                }
            }
        } else {
            if ($id) {
                $category = Model_ProductCategory::find($id);
                if (!$category) {
                    Response::redirect('admin/productcategories');
                }
            } else {
                $category['parent_id'] = Input::get("parent_id");
            }
        }

        $categories = $this->getCategoriesWithChildren();

        $template = View::forge('template/admin/template_main', [
            'active_menu' => "2,3"
        ]);

        $template->content = View::forge('admin/productcategories/write', compact('categories', 'category'));
        $template->title = $id ? 'Sửa danh mục' : 'Thêm danh mục';

        return Response::forge($template);
    }
    public function post_delete() {
        $ids = Input::post('id');
        $cnt = count($ids);
        for ($i=0; $i < $cnt; $i++) { 
            $entry = Model_ProductCategory::find($ids[$i]);
            $entry->delete();
        }
        return Response::forge(json_encode([
            'result' => 'success'
        ]));
    }
    public function post_change()
    {
        $category_id = Input::post('category_id');
        $o_num = Input::post('o_num');

        $cnt = count($category_id);
        for ($i=0; $i < $cnt; $i++) { 
            $entry = Model_ProductCategory::find($category_id[$i]);
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