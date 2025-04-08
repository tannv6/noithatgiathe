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

return array(
	/**
	 * -------------------------------------------------------------------------
	 *  Default route
	 * -------------------------------------------------------------------------
	 *
	 */

	'_root_' => 'main/index',

	/**
	 * -------------------------------------------------------------------------
	 *  Page not found
	 * -------------------------------------------------------------------------
	 *
	 */

	'_404_' => 'welcome/404',

	/**
	 * -------------------------------------------------------------------------
	 *  Example for Presenter
	 * -------------------------------------------------------------------------
	 *
	 *  A route for showing page using Presenter
	 *
	 */

	'hello(/:name)?' => array('welcome/hello', 'name' => 'hello'),
	'gioi-thieu' => 'gioithieu/index',
	'lien-he' => 'lienhe/index',
	'danh-muc-bai-viet/(:any)(/:any)?' => 'bbs/list/$1/$2',
	'bai-viet/(:any)' => 'bbs/view/$1',
	'danh-muc-san-pham/(:any)' => 'shop/category/$1',
	'danh-muc-san-pham' => 'shop/index',
	'san-pham/(:any)' => 'shop/product/$1',
	'sitemap.xml' => 'sitemap/index',
);
