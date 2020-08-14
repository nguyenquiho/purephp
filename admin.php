
<?php
session_start();
if (isset($_SESSION['admin'])) {
	include 'left.php';
	include 'top.php';
	?>


	<?php include 'bottom.php'; } else header('location:index.php'); ?>