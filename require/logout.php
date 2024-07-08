<?php
require_once("./common.php");
session_start();
session_destroy();
$url =  $base_url;
header("Refresh: 0; url=$url");
exit();
?>