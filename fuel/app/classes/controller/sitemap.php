<?php

class Controller_Sitemap extends Controller
{
    public function action_index()
    {
        // Thiết lập header để trình duyệt hiểu đây là XML
        header('Content-Type: application/xml');

        // Lấy ngày hiện tại
        $lastmod = date('Y-m-d');

        // Địa chỉ trang chủ - chỉnh lại cho đúng domain
        $homepage_url = Uri::base(false);

        // Tạo nội dung XML
        $sitemap = <<<XML
<?xml version="1.0" encoding="UTF-8"?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
  <url>
    <loc>{$homepage_url}</loc>
    <lastmod>{$lastmod}</lastmod>
    <changefreq>weekly</changefreq>
    <priority>1.0</priority>
  </url>
</urlset>
XML;

        // In ra sitemap
        echo $sitemap;

        return;
    }
}
