<?php
$link=@mysqli_connect('localhost','root','') or die("Kết nối sever thất bại!");
mysqli_select_db($link,'doan') or die('Database không tồn tại!');
mysqli_query($link,"SET NAMES 'UTF8'");
?>