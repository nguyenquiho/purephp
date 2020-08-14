<?php
session_start();
if (isset($_SESSION['user'])) { ?>
	<!DOCTYPE html>
	<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Ẩn đơn hàng khi đã mua</title>
	</head>
	<body>
		<?php
			include 'connect.php';
			$madh=$_GET['madh'];
			echo $madh;
			$update=mysqli_query($link,"UPDATE doan_donhang SET anHien=0 WHERE maDH=$madh");
			header('location:trangcanhan.php');
		?>
	</body>
	</html>
<?php } ?>