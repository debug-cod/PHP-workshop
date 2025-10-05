<?php
// clear_session.php

// 启动Session
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// 清除Session变量
unset($_SESSION['name']);
unset($_SESSION['dob']);

// 或者彻底销毁Session（注意：这会销毁所有Session数据）
// session_destroy();

// 重定向回Session页面
header('Location: persistence_session.php');
exit();
?>