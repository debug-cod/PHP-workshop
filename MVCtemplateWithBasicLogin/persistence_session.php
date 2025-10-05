<?php
// persistence_session.php - Session版本控制器

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// 检查是否已登录
if (!isset($_SESSION["login"])) {
    header('Location: index.php');
    exit();

}

// 处理表单提交
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['name'])){
    // 使用 ?? 操作符（PHP 7.0+）
    $name = isset($_POST['name']) ? $_POST['name'] : "";
    $dob = isset($_POST['dob']) ? $_POST['dob'] : "";

    // 在同一个if块内检查数据
    if (!empty($name) && !empty($dob)){
        $_SESSION['name'] = $name;
        $_SESSION['dob'] = $dob;
        header('Location: persistence_session.php');
        exit();
    }
}

// 创建view对象并传递变量
$view = new stdClass();
$view->hasSession = isset($_SESSION['name']) && isset($_SESSION['dob']);
$view->pageTitle = 'Session Exercise';

// 加载视图
require_once 'Views/template/persistence_session.phtml';
?>