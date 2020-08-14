<?php
session_start();
if (isset($_SESSION['admin'])) { 
	include '../connect.php';
	$matin=$_GET['matin'];?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Xoá bài viết</title>
</head>
<body>
	<?php
	$query=mysqli_query($link,"DELETE FROM doan_tincongnghe WHERE maTin=$matin");
	header('location:show-tincongnghe.php');
	?>
</body>
</html>
<?php }
?>