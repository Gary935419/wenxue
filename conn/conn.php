<?php
error_reporting(E_ALL ^ E_NOTICE); 
header("content-type:text/html;charset=utf-8");
session_start();
//$conn = mysqli_connect('rm-uf6g5w968233b8p1reo.mysql.rds.aliyuncs.com','boda', 'BoDa@163!com', 'boda');
$conn = mysqli_connect('127.0.0.1','root', 'root', 't2');
mysqli_query($conn,'set names utf8');
date_default_timezone_set("PRC");
if (!$conn) {
    die("数据库连接失败: " . mysqli_connect_error());
}
?>