<?php 
session_start();
include 'connect.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Tin công nghệ</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<style type="text/css">
	#content{
		width: 1200px;
		min-height: 500px;
	}
</style>
<body>
	<?php
		include 'header.php';
	?>
	<div id="content">
		<?php
			$sql=mysqli_query($link, "SELECT * FROM doan_tincongnghe");
			while ($d=mysqli_fetch_array($sql)) {?>
				<h4 style="font-family: Roboto;margin-top: 20px; margin-left: 20px;"><a style=" color: #3270d3;" href="xem.php?matin=<?php echo $d['maTin']; ?> "><?php echo $d['tieuDe']; ?></a></h4>
			<?php }
		?>
	</div>
	<?php
		include 'footer.php';
	?>
</body>
</html>