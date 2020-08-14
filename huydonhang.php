<?php
 session_start();
 include 'connect.php';
 if (isset($_SESSION['user'])) {
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Huỷ đơn hàng</title>
</head>
<body>
	<?php
		$madh=$_GET['madh'];
		$query=mysqli_query($link,"DELETE FROM doan_donhang WHERE maDH=$madh");
		header('location:trangcanhan.php');
	?>
</body>
</html>
<?php } ?>