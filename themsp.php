<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Thêm sp</title>
</head>
<body>
	<?php
		include 'connect.php';
		$masp=$_GET['key'];
		$query="SELECT * FROM doan_sp WHERE maSP=$masp ";
		$result=mysqli_query($link, $query);
		$d=mysqli_fetch_array($result);
		if ($d['SL']>0) {
			$num=mysqli_num_rows($result);
		if ($num==1) {
			if (isset($_SESSION['giohang'][$masp])) {
			// tăng số lượng lên 1
			$_SESSION['giohang'][$masp]++;
		}
			else { // nếu sách chưa có trong giỏ hàng
				$_SESSION['giohang'][$masp]=1;
		}
		header("location:chitiet-sp.php?key=$masp");
		}
		}

		
		else{?>
			
		<?php }
		header("location:location:chitiet-sp.php?key=$masp");
		?>

</body>
</html>