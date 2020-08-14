
<?php
session_start();
if (isset($_SESSION['admin'])) {
	include 'left.php';
	include 'top.php';
	?>
	<div id="content" style="background: url(hinh-anh/bieudo.PNG); width: 82%;height: 600px;float: left;">
		
	</div>	
	
	<?php include 'bottom.php'; } else header('location:../index.php'); ?>