<?php 
$num = rand(1,7400);
$int  = floor($num/500)*500;
$num = (string)$num;
$int  = (string)$int;
$url="http://list.432100.xyz/one/%E5%B0%8F%E5%A7%90%E5%A7%90%E7%9F%AD%E8%A7%86%E9%A2%91/%E5%BF%AB%E6%89%8B%E5%B0%8F%E5%A7%90%E5%A7%90/$int/$num.mp4";
header("Location: $url");
?>