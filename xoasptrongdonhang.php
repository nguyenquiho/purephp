<?php
session_start();
include 'connect.php';
if (isset($_SESSION['user'])) { ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Xoá 1 sản phẩm trong đơn hàng đang xử lí</title>
</head>
<body>
	<?php
		$madh=$_GET['madh'];
		$masp=$_GET['masp'];
		$delete=mysqli_query($link,"DELETE FROM doan_chitiethoadon WHERE maDH=$madh AND maSP=$masp");
		header('location:trangcanhan.php');
	?>
</body>
</html>
<?php } else header('location:index.php');
?>