<?php
// querystring.php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// 检查是否已登录
if (!isset($_SESSION["login"])) {
    header('Location: index.php');
    exit();
}


// 我们不需要Session，但如果你需要可以启动
// 模拟一些产品数据
$products = [
    ['id' => 1, 'name' => 'Panasonic DVD', 'price' => 80],
    ['id' => 2, 'name' => 'Sony DVD', 'price' => 85],
    ['id' => 3, 'name' => 'Samsung DVD', 'price' => 75],
];

// 将产品数据传递给视图
$view = new stdClass();
$view->products = $products;
$view->pageTitle = 'Query String Exercise';

// 加载视图
require_once 'Views/template/querystring.phtml';
?>