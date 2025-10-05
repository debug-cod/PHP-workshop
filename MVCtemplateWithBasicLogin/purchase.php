<?php
// purchase.php

// 从查询字符串获取产品信息
$productID = isset($_GET['productID']) ? $_GET['productID'] : '';
$productName = isset($_GET['name']) ? $_GET['name'] : '';
$productPrice = isset($_GET['price']) ? $_GET['price'] : '';

// 将产品信息传递给视图
$view = new stdClass();
$view->productID = $productID;
$view->productName = $productName;
$view->productPrice = $productPrice;
$view->pageTitle = 'Purchase';

// 加载视图
require_once 'Views/template/purchase.phtml';
?>