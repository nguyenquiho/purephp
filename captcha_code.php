<?php
session_start();
$ranStr = md5(microtime()); // Lấy chuối  rồi mã hoá MD5
$ranStr = substr($ranStr, 0, 6); // Cắt chuối lấy 6 kí tự
$_SESSION['cap_code']= $ranStr;
$newImage = imagecreatefromjpeg("hinh-anh/bg_captcha.jpg"); // Tạo hình ảnh từ captcha
$txtColor= imagecolorallocate($newImage, 0, 0, 0); // Thêm màu sắc cho hình ảnh
imagestring($newImage, 5, 5, 5, $ranStr, $txtColor);
header("Content-type: hinh-anh/jpeg");// Xuất định dạng là hình ảnh
imagejpeg($newImage); //Xuất hình ảnh ra trình như 1 file;
?> 