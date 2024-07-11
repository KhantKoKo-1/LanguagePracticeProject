<?php

$authenticated = false;
$user_id = '';
if (isset($_SESSION['admin']['user_id']) || isset($_SESSION['admin']['email'])) {
    $user_id = $_SESSION['admin']['user_id'];
    // $url =  $admin_base_url . 'dashboard';
}
else if (isset($_SESSION['user']['user_id']) || isset($_SESSION['user']['email'])) {
    $user_id = $_SESSION['user']['user_id'];
    // $url =  $user_base_url . 'index.php';
}
else if (isset($_COOKIE['user'])) {

    $user = json_decode($_COOKIE['user'], true);
    // $user_id = $user['user_id'];
    var_dump($_COOKIE['user'],);
    exit();
    // if ($user['role'] == $admin_enable_status) {
    //   $url =  $admin_base_url . 'dashboard';
    // } else {
    //   $url =  $user_base_url . 'index.php';
    // }
}

$auth_sql = "SELECT COUNT(user_id) AS total FROM `users` WHERE `user_id` = '$user_id' AND deleted_at IS NULL AND deleted_by IS NULL";
$auth_result = $mysqli->query($auth_sql);
while ($auth_row = $auth_result->fetch_assoc()) {
    if ($auth_row['total'] > 0) {
        $authenticated = true;
    }
}

if ($authenticated == false) {
    header("Refresh: 0; url=$base_url");
    exit();
}