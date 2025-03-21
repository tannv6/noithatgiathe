<?php
// Kết nối cơ sở dữ liệu
use Fuel\Core\DB;

// Truy vấn lượt xem theo ngày
$dailyViews = DB::query("
    SELECT DATE(view_date) as view_date, COUNT(*) as view_count 
    FROM post_views 
    GROUP BY DATE(view_date) 
    ORDER BY view_date ASC
")->execute()->as_array();

// Truy vấn lượt xem theo tháng
$monthlyViews = DB::query("
    SELECT DATE_FORMAT(view_date, '%Y-%m') as view_month, COUNT(*) as view_count 
    FROM post_views 
    GROUP BY view_month 
    ORDER BY view_month ASC
")->execute()->as_array();

// Truy vấn lượt xem theo năm
$yearlyViews = DB::query("
    SELECT YEAR(view_date) as view_year, COUNT(*) as view_count 
    FROM post_views 
    GROUP BY view_year 
    ORDER BY view_year ASC
")->execute()->as_array();
?>

    <h2>Thống kê lượt xem bài viết</h2>

    <canvas id="dailyChart"></canvas>
    <canvas id="monthlyChart"></canvas>
    <canvas id="yearlyChart"></canvas>

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