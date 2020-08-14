<?php
session_start();
?>
<?php
include 'connect.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>
		<?php $macl= $_GET['key'];
		$q="SELECT tenCL FROM doan_chungloai WHERE maCL=$macl";
		$r=mysqli_query($link,$q);
		$title=mysqli_fetch_array($r);
		echo $title['tenCL'];?>
	</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<meta charset="utf-8">

</head>
<body>
	<?php
	include 'header.php';
	?>
	<div id="content">
		<div class="danh-muc" style="border-top: 5px white solid;">
			<span>danh mục sản phẩm <?php echo $title['tenCL']; ?></span>
		</div>
		<?php
		$macl= $_GET['key'];
		$query="SELECT maLoai FROM doan_loai WHERE maCL= $macl";
		$result=mysqli_query($link,$query);
		while ($d=mysqli_fetch_array($result)) {
			$maloai=$d['maLoai']; 
			$que="SELECT * FROM doan_sp WHERE maLoai= $maloai";
			$res=mysqli_query($link,$que);
			while ($d1=mysqli_fetch_array($res)) { 
				$masp=$d1['maSP']?>
				<div class="sp" style="background: white;
				width: 290px;height: 350px;margin: 5px 5px;
				text-align: center;position: relative;
				float: left;z-index: 6; overflow: hidden;">
					<a href="chitiet-sp.php ?key=<?php echo $masp ?>">
						<div>
							<img src="<?php echo $d1['hinhAnh'] ?>" style="width: 280px; height: 250px;">
						</div>
						<div class="text-sp"><?php echo $d1['thongTin']; ?></div><br><br>
						<span class="ten-sp"><?php echo $d1['tenSP']; ?></span><br>
						<span class="gia-sp"><?php echo  number_format($d1['giaSP']); ?>.đ</span>
					</a>
				</div>
		<?php } }
include 'footer.php';
?>
</body>
</html>