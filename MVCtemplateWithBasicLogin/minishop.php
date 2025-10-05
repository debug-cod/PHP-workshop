<?php
// minishop.php - 修正版本

// 必须在任何输出前启动session
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// 检查是否已登录
if (!isset($_SESSION["login"])) {
    header('Location: index.php');
    exit();
}

// 初始化view对象
$view = new stdClass();
$view->pageTitle = 'Mini Shop';  // 确保这行存在
$view->errorMessage = '';
$view->purchasedProduct = null;

// 处理登录
if (isset($_POST['loginbutton'])) {
    $username = isset($_POST['username']) ? $_POST['username'] : '';
    $password = isset($_POST['password']) ? $_POST['password'] : '';

    // 调试：检查接收到的数据
    error_log("Login attempt: username=$username, password=$password");

    // 简单验证
    if ($username === 'admin' && $password === 'password123') {
        $_SESSION['loggedin'] = true;
        $_SESSION['username'] = $username;
        error_log("Login successful for user: $username");

        // 重定向避免重复提交
        header('Location: minishop.php');
        exit();
    } else {
        $view->errorMessage = 'Invalid username or password!';
        error_log("Login failed for user: $username");
    }
}

// 处理登出
if (isset($_POST['logoutbutton'])) {
    session_destroy();
    header('Location: minishop.php');
    exit();
}

// 处理购买
if (isset($_POST['buybutton']) && isset($_SESSION['loggedin'])) {
    $productId = isset($_POST['product_id']) ? $_POST['product_id'] : '';

    // 产品数据
    $products = [
        '1' => ['name' => 'Laptop', 'price' => 999.99],
        '2' => ['name' => 'Smartphone', 'price' => 599.99],
        '3' => ['name' => 'Headphones', 'price' => 149.99],
        '4' => ['name' => 'Tablet', 'price' => 399.99]
    ];

    if (isset($products[$productId])) {
        $view->purchasedProduct = $products[$productId];
    }
}

// 加载header
require_once 'Views/template/header.phtml';
// 加载主要内容
require_once 'Views/template/minishop.phtml';
// 加载footer
require_once 'Views/template/footer.phtml';
?>