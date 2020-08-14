<?php
session_start();
if (isset($_SESSION['user'])) {
	unset($_SESSION['user']);
}
if (isset($_SESSION['id'])) {
	unset($_SESSION['id']);
}

if (isset($_SESSION['admin'])) {
	unset($_SESSION['admin']);
}

if (isset($_SESSION['giohang'])) {
	unset($_SESSION['giohang']);
}
if (isset($_SESSION['item'])) {
	unset($_SESSION['item']);
}
header('location:index.php');
?>