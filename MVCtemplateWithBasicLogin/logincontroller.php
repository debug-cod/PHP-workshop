<?php
session_start();

// 移除这行调试代码
// var_dump($_SESSION);

if (isset($_POST["loginbutton"])) {
    $username = $_POST["username"] ?? '';
    $password = $_POST["password"] ?? '';

    // 移除调试输出
    // echo $username;
    // echo $password;

    if ($username == "a" && $password == "b") {
        // 登录成功
        $_SESSION["login"] = $username;
        // 重定向到首页或其他页面
        header('Location: index.php');
        exit();
    } else {
        // 登录失败
        $error = "Error in username and password";
        // 可以重定向回登录页面并显示错误
        header('Location: index.php?error=' . urlencode($error));
        exit();
    }
}

if (isset($_POST["logoutbutton"])) {
    // 移除调试输出
    // echo "logout user";
    unset($_SESSION["login"]);
    session_destroy();
    // 重定向到首页
    header('Location: index.php');
    exit();
}
?>
