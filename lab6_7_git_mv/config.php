<?php
$db_host = "127.0.0.1";
$db_port = "3306";
$db_user = "user";
$db_pass = "pw";
$db_name = "bk";
$pw_opts = [
    'cost' => 12,
];
$db = new PDO('mysql:host='.$db_host.';dbname='.$db_name.';charset=utf8mb4', $db_user, $db_pass);
?>

