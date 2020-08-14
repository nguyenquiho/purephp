<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Xoá sản phẩm</title>
</head>
<body>
	<?php
	// kiểm tra masp có tồn tại trước khi xoá
	if (isset($_GET['masp'])) { 
		unset($_SESSION['giohang'][$_GET['masp']]);
		header('location:giohang.php');
	} 
	?>
</body>
</html>