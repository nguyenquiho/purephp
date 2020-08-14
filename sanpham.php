<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Sản phẩm tìm kiếm</title>
	<link rel="stylesheet" type="text/css" href="style.css">

</head>
<body>

		<?php
	include 'header.php';
	include 'connect.php';
	if (isset($_REQUEST['submit-search'])) {
		if (empty($_GET['timkiem'])) { ?>
			<div id='content' style="height:500px; background-color: white;"><br>
			<p style="margin-left: 10px;">Chưa nhập sản phẩm tìm kiếm!</p>
			</div>
			<?php
		}
		else{
			$timkiem=$_GET['timkiem'];
			$query=mysqli_query($link,"SELECT * FROM doan_sp WHERE thongTin LIKE '%$timkiem%'");
			$num=mysqli_num_rows($query);
			if ($num==0){ ?>
			<div id='content' style="height:500px; background-color: white;"><br>
			<p style="margin-left: 10px;">Không tìm thấy sản phẩm!</p>
			</div>
			<?php
			}else if ($num==1) { ?>
				<div id='content' style="height:500px; background-color: white;"><br>
					<div class="sp-tk">
					<div class="danh-muc" style="border-top: 5px white solid;"><span>sản phẩm tìm kiếm</span></div>
					<?php 
					while($d=mysqli_fetch_array($query)){ 
					$masp=$d['maSP'];
						?>
					<div class="sp" style="border: 1px solid tomato;">
						<a href="chitiet-sp.php ?key=<?php echo $masp ?>"><img src="<?php echo $d['hinhAnh'] ?>" style="width: 280px; height: 250px;"></<br><br>
						<span class="ten-sp"><?php echo $d['tenSP']; ?></span><br>
						<span class="gia-sp"><?php echo $d['giaSP']; ?>.đ</span></a>
					</div>
				</div>
				</div> 
			<?php } ?>
			<?php
			}else
			{ 
				
				?>
			<div class="sp-tk">
				<div class="danh-muc" style="border-top: 5px white solid;"><span>sản phẩm tìm kiếm</span></div>
				<?php
				while($d=mysqli_fetch_array($query)){

				$masp=$d['maSP'];?>
			<div class="sp">
				<a href="chitiet-sp.php ?key=<?php echo $masp ?>"><img src="<?php echo $d['hinhAnh'] ?>" style="width: 280px; height: 250px;"></<br><br>
				<span class="ten-sp"><?php echo $d['tenSP']; ?></span><br>
				<span class="gia-sp"><?php echo $d['giaSP']; ?>.đ</span></a>
				</div>
				<?php } ?>
				<?php
				}
				}
				}
				?>
				<?php
				include 'footer.php';
				?>

</body>
</html>