<?php
// clear_cookies.php
setcookie('name', '', time() - 3600, '/');
setcookie('dob', '', time() - 3600, '/');

// 重定向回persistence页面
header('Location: persistence.php');
exit();
?>