<?php

function getCategoriesWithChildren($parent_id = null) {
	$categories1 = Model_ProductCategory::query()
		->where('parent_id', $parent_id)
		->where('status', 'Y')
		->order_by('o_num', 'desc')
		->get();

	$categories_array = array_map(function($category) {
		return $category->to_array();
	}, $categories1);

	foreach ($categories_array as &$category) {
		$categories2 = getCategoriesWithChildren($category['category_id']);
		$category['children'] = $categories2;
	}

	return $categories_array;
}

$active_menu = explode(',', $active_menu);

$menus = [
	[
		'id' => 1,
		'name' => 'Dashboard',
		'link' => '/admin/dashboard',
		'icon' => 'fa-solid fa-house',
		'submenu' => [],
	],
	[
		'id' => 2,
		'name' => 'Sản phẩm',
		'link' => '#',
		'icon' => 'fa-solid fa-landmark',
		'submenu' => [
			[
				'id' => 3,
				'name' => 'Danh mục sản phẩm',
				'link' => '/admin/productcategories',
				'icon' => 'fa-solid fa-book',
			],
			[
				'id' => 4,
				'name' => 'Danh sách sản phẩm',
				'link' => '/admin/products',
				'icon' => 'fa-solid fa-list',
			],
		],
	],
	[
		'id' => 'contact',
		'name' => 'Liên hệ',
		'link' => '#',
		'icon' => 'fa-solid fa-address-card',
		'submenu' => [
			[
				'id' => 'contact_list',
				'name' => 'Danh sách liên hệ',
				'link' => '/admin/contacts',
				'icon' => 'fa-solid fa-list',
			],
		],
	],
	[
		'id' => 5,
		'name' => 'Bài viết',
		'link' => '#',
		'icon' => 'fa-solid fa-blog',
		'submenu' => [
			[
				'id' => 'project',
				'name' => 'Dự án',
				'link' => '/admin/bbs?category_code=project',
				'icon' => 'fa-solid fa-truck',
			],
			[
				'id' => 'video',
				'name' => 'Video',
				'link' => '/admin/bbs?category_code=video',
				'icon' => 'fa-solid fa-video',
			],
			[
				'id' => 'news',
				'name' => 'Tin tức',
				'link' => '/admin/bbs?category_code=news',
				'icon' => 'fa-solid fa-newspaper',
			],
			[
				'id' => 'experience',
				'name' => 'Kinh nghiệm',
				'link' => '/admin/bbs?category_code=experience',
				'icon' => 'fa-solid fa-truck-fast',
			],
			[
				'id' => 'design',
				'name' => 'Thiết kế',
				'link' => '/admin/bbs?category_code=design',
				'icon' => 'fa-solid fa-swatchbook',
			],
			[
				'id' => 'feng-shui',
				'name' => 'Phong thủy',
				'link' => '/admin/bbs?category_code=feng-shui',
				'icon' => 'fa-solid fa-palette',
			],
			[
				'id' => 'recruitment',
				'name' => 'Tuyển dụng',
				'link' => '/admin/bbs?category_code=recruitment',
				'icon' => 'fa-solid fa-object-group',
			],
			[
				'id' => 'discount',
				'name' => 'Khuyến mại',
				'link' => '/admin/bbs?category_code=discount',
				'icon' => 'fa-solid fa-ticket',
			],
			[
				'id' => 'furniture',
				'name' => 'Nội thất',
				'link' => '/admin/bbs?category_code=furniture',
				'icon' => 'fa-solid fa-house-laptop',
			],
			[
				'id' => 'in-house',
				'name' => 'Nội bộ',
				'link' => '/admin/bbs?category_code=in-house',
				'icon' => 'fa-solid fa-house-signal',
			],
			[
				'id' => 'policy',
				'name' => 'Chính sách khách hàng',
				'link' => '/admin/bbs?category_code=policy',
				'icon' => 'fa-solid fa-building-shield',
			],
			[
				'id' => 'company',
				'name' => 'Về công ty',
				'link' => '/admin/bbs?category_code=company',
				'icon' => 'fa-solid fa-shield',
			],
		],
	],
	[
		'id' => 'comment',
		'name' => 'Bình luận',
		'link' => '#',
		'icon' => 'fa-solid fa-comment',
		'submenu' => [
			[
				'id' => 'comment_list',
				'name' => 'Danh sách bình luận',
				'link' => '/admin/comment',
				'icon' => 'fa-solid fa-list',
			],
		]
	],
	[
		'id' => 8,
		'name' => 'Thống kê',
		'link' => '#',
		'icon' => 'fa-solid fa-chart-line',
		'submenu' => [
			[
				'id' => 'tracking',
				'name' => 'Truy cập trang',
				'link' => '#',
				'icon' => 'fa-solid fa-solar-panel',
				'submenu' => [
					[
						'id' => 'tracking_product',
						'name' => 'Sản phẩm',
						'link' => '/admin/tracking/product',
						'icon' => 'fa-solid fa-house-flood-water-circle-arrow-right',
					],
					[
						'id' => 'tracking_articles',
						'name' => 'Bài viết',
						'link' => '/admin/tracking/articles',
						'icon' => 'fa-solid fa-mattress-pillow',
					],
				]
			]
		]
	],
	[
		'id' => 12,
		'name' => 'Cài đặt hệ thống',
		'link' => '#',
		'icon' => 'fa-solid fa-gear',
		'submenu' => [
			[
				'id' => 13,
				'name' => 'Cài đặt cơ bản',
				'link' => '/admin/setting/basic',
				'icon' => 'fa-solid fa-wrench',
			],
			[
				'id' => 'shipping_and_installation',
				'name' => 'Vận chuyển và lắp đặt',
				'link' => '/admin/setting/advanced',
				'icon' => 'fa-solid fa-wrench',
			],
			[
				'id' => 'banner',
				'name' => 'Banner',
				'link' => '#',
				'icon' => 'fa-solid fa-school-flag',
				'submenu' => [
					[
						'id' => 'main_visual',
						'name' => 'Đầu trang chính',
						'link' => '/admin/banner?code=main_visual',
						'icon' => 'fa-solid fa-person-through-window',
					],
					[
						'id' => 'ads',
						'name' => 'Sứ mệnh',
						'link' => '/admin/banner?code=ads',
						'icon' => 'fa-solid fa-person-through-window',
					],
					[
						'id' => 'middle_visual',
						'name' => 'Giữa trang chính',
						'link' => '/admin/banner?code=middle_visual',
						'icon' => 'fa-solid fa-person-through-window',
					],
					[
						'id' => 'products_bottom',
						'name' => 'Danh sách sản phẩm',
						'link' => '/admin/banner?code=products_bottom',
						'icon' => 'fa-solid fa-person-through-window',
					]
				]
			],
		]
	]
];

?>
<aside id="sidebar" class="expand">
	<div class="d-flex">
		<button class="toggle-btn" type="button">
			<i class="fa-solid fa-bars"></i>
		</button>
		<div class="sidebar-logo">
			<a href="#">Admin</a>
		</div>
	</div>
	<ul class="sidebar-nav">
		<?php foreach ($menus as $menu):
			$is_menu_expand = in_array($menu['id'], $active_menu);
			$is_menu_active = in_array($menu['id'], $active_menu) && count($menu['submenu']) == 0;
			?>
			<li class="sidebar-item">
				<a href="<?= $menu['link'] ?>" class="sidebar-link <?= $is_menu_expand ? "" : "collapsed" ?> <?= $is_menu_active ? "active" : "" ?> has-dropdown"
				<?php if (count($menu['submenu']) > 0): ?>
					data-bs-toggle="collapse" data-bs-target="#lv2_<?= $menu['id'] ?>" aria-expanded="<?= $is_menu_expand ? "true" : "false" ?>" aria-controls="lv2_<?= $menu['id'] ?>"
				<?php endif; ?>
				>
					<i class="<?= $menu['icon'] ?>"></i>
					<span><?= $menu['name'] ?></span>
				</a>
				<?php if (count($menu['submenu']) > 0): ?>
					<ul class="sidebar-dropdown list-unstyled collapse <?= $is_menu_expand ? "show" : "" ?>" id="lv2_<?= $menu['id'] ?>">
						<?php foreach ($menu['submenu'] as $submenu):
							$is_submenu_expand = in_array($submenu['id'], $active_menu);
							$is_submenu_active = in_array($submenu['id'], $active_menu) && count($submenu['submenu']) == 0;
							?>
							<li class="sidebar-item">
								<a href="<?= $submenu['link'] ?>" class="sidebar-link <?= $is_submenu_expand ? "" : "collapsed" ?> <?= $is_submenu_active ? "active" : "" ?> has-dropdown"
								<?php if (count($submenu['submenu']) > 0): ?>
									data-bs-toggle="collapse" data-bs-target="#lv3_<?=$submenu['id']?>" aria-expanded="<?= $is_submenu_expand ? "true" : "false" ?>" aria-controls="lv3_<?=$submenu['id']?>"
								<?php endif; ?>
								>
									<i class="<?= $submenu['icon'] ?> ms-3"></i>
									<span><?= $submenu['name'] ?></span>
								</a>
								<?php if (count($submenu['submenu']) > 0): ?>
								<ul id="lv3_<?=$submenu['id']?>" class="sidebar-dropdown list-unstyled collapse <?= $is_submenu_expand ? "show" : "" ?>">
									<?php foreach ($submenu['submenu'] as $subsubmenu):
										$is_subsubmenu_expand = in_array($subsubmenu['id'], $active_menu);
										$is_subsubmenu_active = in_array($subsubmenu['id'], $active_menu) && count($subsubmenu['submenu']) == 0;
										?>
										<li class="sidebar-item">
											<a href="<?= $subsubmenu['link'] ?>" class="sidebar-link <?= $is_subsubmenu_active ? "active" : "" ?>">
												<i class="<?= $subsubmenu['icon'] ?> ms-5"></i>
												<span><?= $subsubmenu['name'] ?></span>
											</a>
										</li>
									<?php endforeach; ?>
								</ul>
								<?php endif; ?>
							</li>
						<?php endforeach; ?>
					</ul>
				<?php endif; ?>
			</li>
		<?php endforeach; ?>
	</ul>
</aside>