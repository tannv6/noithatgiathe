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

// Bootstrap the framework - THIS LINE NEEDS TO BE FIRST!
require COREPATH.'bootstrap.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '../../../');
$dotenv->load();

// Add framework overload classes here
\Autoloader::add_classes(array(
	// Example: 'View' => APPPATH.'classes/myview.php',
));

// Register the autoloader
\Autoloader::register();

/**
 * Your environment.  Can be set to any of the following:
 *
 * Fuel::DEVELOPMENT
 * Fuel::TEST
 * Fuel::STAGING
 * Fuel::PRODUCTION
 */
Fuel::$env = Arr::get($_SERVER, 'FUEL_ENV', Arr::get($_ENV, 'FUEL_ENV', getenv('FUEL_ENV') ?: Fuel::DEVELOPMENT));

// Initialize the framework with the config file.
\Fuel::init('config.php');

\Model_SiteSettings::loadConstants();

function updatePageParam($new_value) {
	// Lấy các segment hiện tại
	$segments = Uri::segments();

	// Cập nhật segment số 3 (nếu có)
	if (isset($segments[2])) {
		$segments[2] = $new_value;
	} else {
		$segments[] = $new_value; // Nếu segment 3 chưa tồn tại, thêm vào
	}

	// Tạo URL mới
	$new_url = Uri::create(implode('/', $segments));

	// Lấy query string hiện tại
	$query_string = http_build_query(\Input::get());
	
	// Tạo URL mới từ segment
	$new_url = Uri::create(implode('/', $segments));

	// Nếu có query string, nối vào URL mới
	if (!empty($query_string)) {
		$new_url .= '?' . $query_string;
	}

	return $new_url;
}

function ipagelisting($cur_page, $total_page) {

	$retValue = "<div class='pagination'>";
	if ($cur_page > 1) {
		$url = updatePageParam($cur_page-1);
		$retValue .= "<a class='prev page-numbers' href='" . $url . "' title='Go to prev page'><span class='text-pagi-wrap'><i class='fa-solid fa-angle-left'></i></span></a>";
	} else {
		$retValue .= "<a class='prev page-numbers'  href='javascript:;' title='Go to prev page'><span class='text-pagi-wrap'><i class='fa-solid fa-angle-left'></i></span></a>";
	}
	$retValue .= "";
	$start_page = ( ( (int)( ($cur_page - 1 ) / 5 ) ) * 5 ) + 1;
	$end_page = $start_page + 4;
	if ($end_page >= $total_page) $end_page = $total_page;
	if ($total_page == 0)
	{
		$retValue .= "<span class='page-numbers current' title='Go to 0 page'><span class='text-pagi-wrap'>1</span></span>";
	} elseif ($total_page >= 1)
	{
		for ($k=$start_page;$k<=$end_page;$k++)
		{
			if ($cur_page != $k)
			{
				$url = updatePageParam($k);
				$retValue .= "<a href='$url' class='page-numbers' title='Go to page $k'><span class='text-pagi-wrap'>$k</span></a>";
			} else {
				$retValue .= "<span class='page-numbers current' title='Go to $k page'><span class='text-pagi-wrap'>$k</span></span>";
			}
		}
	}
	$retValue .= "";
	if ($cur_page < $total_page) {
		$url = updatePageParam($cur_page+1);
		$retValue .= "<a class='next page-numbers' href='$url" . "' title='Go to next page'><span class='text-pagi-wrap'><i class='fa-solid fa-angle-right'></i></span></a>";
	} else {
		$retValue .= "<a class='next page-numbers' href='javascript:;' title='Go to next page'><span class='text-pagi-wrap'><i class='fa-solid fa-angle-right'></i></span></a>";
	}
	$retValue .= "</div>";
	return $retValue;
}

function ipagelisting2($cur_page, $total_page) {

	$retValue = "<div class='pagination'>";
	if ($cur_page > 1) {
		$url = Uri::update_query_string(array('page' => $cur_page - 1));
		$retValue .= "<a class='prev page-numbers' href='" . $url . "' title='Go to prev page'><span class='text-pagi-wrap'><i class='fa-solid fa-angle-left'></i></span></a>";
	} else {
		$retValue .= "<a class='prev page-numbers'  href='javascript:;' title='Go to prev page'><span class='text-pagi-wrap'><i class='fa-solid fa-angle-left'></i></span></a>";
	}
	$retValue .= "";
	$start_page = ( ( (int)( ($cur_page - 1 ) / 5 ) ) * 5 ) + 1;
	$end_page = $start_page + 4;
	if ($end_page >= $total_page) $end_page = $total_page;
	if ($total_page == 0)
	{
		$retValue .= "<span class='page-numbers current' title='Go to 0 page'><span class='text-pagi-wrap'>1</span></span>";
	} elseif ($total_page >= 1)
	{
		for ($k=$start_page;$k<=$end_page;$k++)
		{
			if ($cur_page != $k)
			{
				$url = Uri::update_query_string(array('page' => $k));
				$retValue .= "<a href='$url' class='page-numbers' title='Go to page $k'><span class='text-pagi-wrap'>$k</span></a>";
			} else {
				$retValue .= "<span class='page-numbers current' title='Go to $k page'><span class='text-pagi-wrap'>$k</span></span>";
			}
		}
	}
	$retValue .= "";
	if ($cur_page < $total_page) {
		$url = Uri::update_query_string(array('page' => $cur_page + 1));
		$retValue .= "<a class='next page-numbers' href='$url" . "' title='Go to next page'><span class='text-pagi-wrap'><i class='fa-solid fa-angle-right'></i></span></a>";
	} else {
		$retValue .= "<a class='next page-numbers' href='javascript:;' title='Go to next page'><span class='text-pagi-wrap'><i class='fa-solid fa-angle-right'></i></span></a>";
	}
	$retValue .= "</div>";
	return $retValue;
}

function renderPagination($page, $pages) {

	$output = '<nav><ul class="pagination justify-content-center">';

	//Nút "First"

	$firstDisabled = ($page <= 1) ? ' disabled' : '';
	$url = Uri::update_query_string(array('page' => 1));
	$output .= '<li class="page-item' . $firstDisabled . '">
					<a class="page-link" href="' . $url . '">««</a>
				</li>';

	// Nút "Previous"
	$prevDisabled = ($page <= 1) ? ' disabled' : '';
	$url = Uri::update_query_string(array('page' => $page - 1));
	$output .= '<li class="page-item' . $prevDisabled . '">
					<a class="page-link" href="' . $url . '">«</a>
				</li>';

	// Hiển thị tối đa 5 trang
	$start = max(1, $page - 2);
	$end = min($pages, $start + 4);

	if ($end - $start < 4) {
		$start = max(1, $end - 4);
	}

	for ($i = $start; $i <= $end; $i++) {
		$active = ($i == $page) ? ' active' : '';
		$pageDisabled = $i == $page;
		$url = Uri::update_query_string(array('page' => $i));
		$output .= '<li class="page-item' . $active . '">';
		if($pageDisabled) {
			$output .= '<a class="page-link" style="pointer-events: none;">' . $i . '</a>';
		} else {
			$output .= '<a class="page-link" href="' . $url . '">' . $i . '</a>';
		}
		$output .= '</li>';
	}

	// Nút "Next"
	$nextDisabled = ($page >= $pages) ? ' disabled' : '';
	$url = Uri::update_query_string(array('page' => $page + 1));
	$output .= '<li class="page-item' . $nextDisabled . '">
					<a class="page-link" href="' . $url . '">»</a>
				</li>';

	// Nút "Last"
	$lastDisabled = ($page >= $pages) ? ' disabled' : '';
	$url = Uri::update_query_string(array('page' => $pages));
	$output .= '<li class="page-item' . $lastDisabled . '">
					<a class="page-link" href="' . $url . '">»»</a>
				</li>';

	$output .= '</ul></nav>';
	return $output;
}

if (!function_exists('dd')) {
	function dd(...$vars)
	{
		$ip = \Input::ip();
		if($ip == "222.252.18.26") {
			\Debug::$js_toggle_open = true;
			$trace = debug_backtrace(DEBUG_BACKTRACE_IGNORE_ARGS, 1);
			$caller = $trace[0];
			echo "<pre style='background: #222; color: #0f0; padding: 10px;margin: 0;'>";
			echo "Called at: " . ($caller['file'] ?? 'unknown file') . " on line " . ($caller['line'] ?? 'unknown line') . "\n";
			echo "</pre>";
			\Debug::dump(...$vars);
			exit;
		}
	}
}

if (!function_exists('d')) {
	function d(...$vars)
	{
		\Debug::$js_toggle_open = true;
		$trace = debug_backtrace(DEBUG_BACKTRACE_IGNORE_ARGS, 1);
		$caller = $trace[0];
		echo "<pre style='background: #222; color: #0f0; padding: 10px;margin: 0;'>";
		echo "Called at: " . ($caller['file'] ?? 'unknown file') . " on line " . ($caller['line'] ?? 'unknown line') . "\n";
		echo "</pre>";
		\Debug::dump(...$vars);
	}
}

define("IMAGE_ALLOWED_FORMAT", ['jpg', 'jpeg', 'png', 'gif', 'webp', 'svg', 'bmp', 'tiff', 'tif', 'ico', 'heic', 'heif', 'raw', 'psd', 'ai', 'eps']);

define("ASSETS_VERSION", time());

function to_snake_case_filename($filename) {
	$name = pathinfo($filename, PATHINFO_FILENAME);
	$ext  = strtolower(pathinfo($filename, PATHINFO_EXTENSION));

	// Bỏ ký tự đặc biệt, chuyển sang snake_case
	$snake = preg_replace('/[^a-zA-Z0-9]+/', '_', $name);
	$snake = strtolower(trim($snake, '_'));

	return $snake . '.' . $ext;
}