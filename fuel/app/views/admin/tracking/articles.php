<?php
// Kết nối cơ sở dữ liệu
use Fuel\Core\DB;

// Truy vấn lượt xem theo ngày
$dailyViews = DB::query("
	SELECT DATE(view_date) as view_date, COUNT(*) as view_count
	FROM post_views
	GROUP BY DATE(view_date)
	ORDER BY view_date ASC
	LIMIT 7
")->execute()->as_array();

// Truy vấn lượt xem theo tháng
$monthlyViews = DB::query("
	SELECT DATE_FORMAT(view_date, '%Y-%m') as view_month, COUNT(*) as view_count
	FROM post_views
	GROUP BY view_month
	ORDER BY view_month ASC
	LIMIT 6
")->execute()->as_array();

// Truy vấn lượt xem theo năm
$yearlyViews = DB::query("
	SELECT YEAR(view_date) as view_year, COUNT(*) as view_count
	FROM post_views
	GROUP BY view_year
	ORDER BY view_year ASC
	LIMIT 5
")->execute()->as_array();

// Truy vấn lượt xem theo bài viết
$articleViews = DB::query("
	SELECT bbs_list.*, COUNT(*) as view_count
	FROM post_views
	INNER JOIN bbs_list ON post_views.post_id = bbs_list.bbs_id
	GROUP BY post_id
	ORDER BY view_count DESC
	LIMIT 100
")->execute()->as_array();

?>
<div id="tabs" class="tabs">
	<ul>
		<li><a href="#tab1">Thống kê theo ngày</a></li>
		<li><a href="#tab2">Thống kê theo tháng</a></li>
		<li><a href="#tab3">Thống kê theo năm</a></li>
	</ul>
	<div id="tab1">
		<canvas id="dailyChart"></canvas>
	</div>
	<div id="tab2">
		<canvas id="monthlyChart"></canvas>
	</div>
	<div id="tab3">
		<canvas id="yearlyChart"></canvas>
	</div>
</div>
<table class="table">
	<colgroup>
		<col width="5%">
		<col width="*">
		<col width="15%">
	</colgroup>
	<thead>
		<tr>
			<th>STT</th>
			<th>Tiêu đề</th>
			<th>Lượt xem</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($articleViews as $index => $articleView): ?>
			<tr>
				<td><?= $index + 1 ?></td>
				<td><?= $articleView['title'] ?></td>
				<td><?= $articleView['view_count'] ?></td>
			</tr>
		<?php endforeach; ?>
	</tbody>
</table>
<script>
	$(document).ready(function () {
		$('#tabs').tabs();
	})
</script>
<script>
	const dailyCtx = document.getElementById('dailyChart').getContext('2d');
	const monthlyCtx = document.getElementById('monthlyChart').getContext('2d');
	const yearlyCtx = document.getElementById('yearlyChart').getContext('2d');

	// Dữ liệu lượt xem theo ngày
	const dailyChart = new Chart(dailyCtx, {
		type: 'line',
		data: {
			labels: <?= json_encode(array_column($dailyViews, 'view_date')) ?>,
			datasets: [{
				label: 'Lượt xem theo ngày',
				data: <?= json_encode(array_column($dailyViews, 'view_count')) ?>,
				borderColor: 'blue',
				fill: false
			}]
		}
	});

	// Dữ liệu lượt xem theo tháng
	const monthlyChart = new Chart(monthlyCtx, {
		type: 'bar',
		data: {
			labels: <?= json_encode(array_column($monthlyViews, 'view_month')) ?>,
			datasets: [{
				label: 'Lượt xem theo tháng',
				data: <?= json_encode(array_column($monthlyViews, 'view_count')) ?>,
				backgroundColor: 'green'
			}]
		}
	});

	// Dữ liệu lượt xem theo năm
	const yearlyChart = new Chart(yearlyCtx, {
		type: 'bar',
		data: {
			labels: <?= json_encode(array_column($yearlyViews, 'view_year')) ?>,
			datasets: [{
				label: 'Lượt xem theo năm',
				data: <?= json_encode(array_column($yearlyViews, 'view_count')) ?>,
				backgroundColor: 'red'
			}]
		}
	});
</script>