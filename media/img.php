<?php
require '../conn/conn.php';
require '../conn/function.php';

$url = getbody($_GET["url"],"","GET");
header("Content-Type: image/jpeg; charset=utf-8");
echo $url;
?>