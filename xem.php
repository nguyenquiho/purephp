<?php 
session_start();
include 'connect.php';
$matin=$_GET['matin'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Xem tin công nghệ</title>
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
			$sql=mysqli_query($link, "SELECT * FROM doan_tincongnghe WHERE maTin=$matin");
			while ($d=mysqli_fetch_array($sql)) {?>
				<div style="font-family: Roboto;margin-top: 20px; margin-left: 20px;">
					<h2 style="text-align: center; color:#3270d3;"><?php echo $d['tieuDe']; ?></h2><br>
					<div style="color: grey"><?php echo $d['noiDung']; ?></div>
					
				</div>
			<?php }
		?>
	</div>
	<?php
		include 'footer.php';
	?>
</body>
</html>