<?php

use Fuel\Core\DB;

// ID sản phẩm cần thống kê
$product_id = 1;

// Truy vấn thống kê lượt xem theo ngày (7 ngày gần nhất)
$views_by_day = DB::query("
    SELECT DATE(view_date) AS period, COUNT(*) AS views 
    FROM product_views 
    WHERE product_id = $product_id 
    GROUP BY period 
    ORDER BY period DESC 
    LIMIT 7
")->execute()->as_array();

// Truy vấn thống kê lượt xem theo tháng (6 tháng gần nhất)
$views_by_month = DB::query("
    SELECT DATE_FORMAT(view_date, '%Y-%m') AS period, COUNT(*) AS views 
    FROM product_views 
    WHERE product_id = $product_id 
    GROUP BY period 
    ORDER BY period DESC 
    LIMIT 6
")->execute()->as_array();

// Truy vấn thống kê lượt xem theo năm (5 năm gần nhất)
$views_by_year = DB::query("
    SELECT YEAR(view_date) AS period, COUNT(*) AS views 
    FROM product_views 
    WHERE product_id = $product_id 
    GROUP BY period 
    ORDER BY period DESC 
    LIMIT 5
")->execute()->as_array();

// Chuyển dữ liệu thành JSON để truyền vào Chart.js
$data_day   = json_encode(array_reverse(array_column($views_by_day, 'views')));
$labels_day = json_encode(array_reverse(array_column($views_by_day, 'period')));

$data_month   = json_encode(array_reverse(array_column($views_by_month, 'views')));
$labels_month = json_encode(array_reverse(array_column($views_by_month, 'period')));

$data_year   = json_encode(array_reverse(array_column($views_by_year, 'views')));
$labels_year = json_encode(array_reverse(array_column($views_by_year, 'period')));

?>

    <h2>Thống kê lượt xem sản phẩm</h2>

    <canvas id="chartDay"></canvas>
    <canvas id="chartMonth" style="margin-top: 40px;"></canvas>
    <canvas id="chartYear" style="margin-top: 40px;"></canvas>

    <script>
        // Dữ liệu thống kê theo ngày
        const dataDay = {
            labels: <?php echo $labels_day; ?>,
            datasets: [{
                label: "Lượt xem theo ngày",
                data: <?php echo $data_day; ?>,
                backgroundColor: "rgba(75, 192, 192, 0.5)",
                borderColor: "rgba(75, 192, 192, 1)",
                borderWidth: 2
            }]
        };

        // Dữ liệu thống kê theo tháng
        const dataMonth = {
            labels: <?php echo $labels_month; ?>,
            datasets: [{
                label: "Lượt xem theo tháng",
                data: <?php echo $data_month; ?>,
                backgroundColor: "rgba(255, 159, 64, 0.5)",
                borderColor: "rgba(255, 159, 64, 1)",
                borderWidth: 2
            }]
        };

        // Dữ liệu thống kê theo năm
        const dataYear = {
            labels: <?php echo $labels_year; ?>,
            datasets: [{
                label: "Lượt xem theo năm",
                data: <?php echo $data_year; ?>,
                backgroundColor: "rgba(54, 162, 235, 0.5)",
                borderColor: "rgba(54, 162, 235, 1)",
                borderWidth: 2
            }]
        };

        // Vẽ biểu đồ theo ngày
        new Chart(document.getElementById("chartDay"), {
            type: "line",
            data: dataDay,
            options: {
                responsive: true,
                plugins: { legend: { display: true } }
            }
        });

        // Vẽ biểu đồ theo tháng
        new Chart(document.getElementById("chartMonth"), {
            type: "bar",
            data: dataMonth,
            options: {
                responsive: true,
                plugins: { legend: { display: true } }
            }
        });

        // Vẽ biểu đồ theo năm
        new Chart(document.getElementById("chartYear"), {
            type: "bar",
            data: dataYear,
            options: {
                responsive: true,
                plugins: { legend: { display: true } }
            }
        });

    </script>