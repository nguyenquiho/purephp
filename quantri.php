
<?php
session_start();
if (isset($_SESSION['admin'])) {
	?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Trang quản trị</title>
	<style type="text/css">
</head>
<body>
</body>
</html>

<?php } else header('location:index.php'); ?>