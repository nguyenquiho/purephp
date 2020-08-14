<?php
session_start();
$key=$_GET['key'];
if (isset($_SESSION['user'])) {
	$user=$_SESSION['user'];
}
else $user='noName';

if (isset($_SESSION['item'])) {
	$item=$_SESSION['item'];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Chi tiết sản phẩm</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<SCRIPT LANGUAGE="JavaScript">
      function Themvaogiohang() {
         alert("Đã thêm vào giỏ hàng");
         window.location='themsp.php?key=<?php echo $key; ?>';
      }
 
</SCRIPT>
</head>
<div id="container" style="margin: 0px auto">
	<?php
include 'header.php';
include 'connect.php';
?>
<div id="content" style=" background-color: white;margin-bottom: 0px;">
	<?php

	$query="SELECT * FROM doan_sp";
	$result=mysqli_query($link,$query);
	while ($d=mysqli_fetch_array($result)) {
		if ($d['maSP']==$key) { ?>
			<div class="danh-muc" style="border-top: 5px white solid;"><span>Thông tin sản phẩm</span></div>
			<img src="<?php echo $d['hinhAnh'] ?>" style="width: 300px;height: 300px;float: left;margin-left: 100px;">
			<div id="thong-tin" style="width: 600px;height: 300px;background-color: white;float:left;margin-left: 150px;border-bottom: 1px solid orange">
				<h3 style="padding-top: 50px;font-weight: lighter;margin-left: 70px"><?php echo $d['tenSP'];?> </h3>
				<br>
				<button id="btn-rating" style="width: 100px;height: 20px;margin-left: 70px;border: none;outline: none; font-size: 12px;"><a href="#binhluan" style="color: black"> XEM ĐÁNH GIÁ</a></button><br><br>
				<span style="margin-left: 70px;font-size: 15px;">Giá: </span><span style="color: red;"><?php echo number_format($d['giaSP']); ?> đ</span><br>
				<span style="margin-left: 70px;font-size: 15px;">Vận chuyển: </span><span style="font-size: 14px;color: grey">Miễn phí vận chuyển(với đơn hàng trên 500.000đ)</span><br>
				<span style="margin-left: 70px;font-size: 15px;">Cam kết: </span><span style="font-size: 14px;color: grey">Hoàn tiền 200% nếu phát hiện sản phẩm không chính hãng</span><br>
				<span style="margin-left: 70px;font-size: 15px;">Tình trạng sản phẩm: </span><span style="color: red;">
				<?php 
				 // $sql=mysqli_query($link,"SELECT * FROM doan_sp WHERE maSP=$key");
				 // $d=mysqli_fetch_array($sql);
				 if ($d['SL']<=0) {
				 	echo "Hết hàng";
				 }
				 else echo "Còn hàng";

				 ?>
				 </span><br>
				
			</div>
			<div id="mota" style="width: 450px;height: 200px;background-color: white; padding-left: 50px; font-weight: lighter;font-size: 13px;
			float: left;" >Mô tả<br>
			<p style="color: grey"><?php echo $d['thongTin']; ?></p>
		</div>
		<div  style="width:700px; height: 200px; background: white;float: left;margin-left: 50px;"><br>
			<!-- <span style="margin-left: 365px;border-bottom: 1px solid grey; font-size: 14px;color: grey;">Giỏ hàng của bạn: (<?php 
				if (isset($_SESSION['item'])) {
					 echo $item;;
				}
				else echo "0";
			 ?> item)</span><br> -->
			<br>
			<?php
			?>
			<center>
					<button type="submit" name="add" id="btn-them-gh" onclick="Themvaogiohang()">Thêm vào giỏ hàng</button>
					<button id="btn-muahang" onclick="window.location='mua-hang.php?key=<?php echo $key; ?>'" style="font-size: 15px;" >Mua hàng</button>			
				

			</center>
		</div>

		<!-- 			<div style="width: 1200px;background: white;float: left;padding-left: 50px;">Đánh giá</div> -->
	<?php }}?>
	<div id="binhluan" style="width: 1200px;min-height: 200px; background-color: white;float: left;">
		<div id="danhmuc" class="danh-muc" style="margin-top: 0px;padding-left: 20px;">
		Đánh giá về sản phẩm
		</div>
		<form method="post" action="chitiet-sp.php?key=<?php echo $key; ?>" >
			<input type="text" name="noidung" style="width: 800px; min-height: 30px;padding-left: 20px;" placeholder="Thêm đánh giá..."><br>
			<input type="submit" name="binhluan" style="width: 100px;height: 20px;margin-left: 700px;background-color:#3270d3;border: none; outline: 0px;color: white;border-radius: 2px; ">	<br>
		</form>
		<?php
			if (isset($_POST['binhluan'])) {
				if (empty($_POST['noidung'])) {
					echo "<script type=\"text/javascript\">
				alert('Vui lòng không để trống đánh giá!');
				</script>";
				}
				else{
					if ($user=='noName') {
						echo "<script type=\"text/javascript\">
				alert('Vui lòng đăng nhập để bình luận!');
				</script>";
					}
					else{
						$noidung=$_POST['noidung'];
						date_default_timezone_set('Asia/Ho_Chi_Minh');
						$time= date('Y-m-d H:i:s');
						$query1=@"INSERT INTO doan_danhgia(tenDangNhap,maSP,noiDung,thoiGian) VALUES ('$user','$key','$noidung','$time')";
						$insert=mysqli_query($link,$query1);
					}
					
				}
			}
			
			$result=mysqli_query($link,"SELECT * FROM doan_danhgia WHERE maSP=$key ORDER BY ID DESC");
			while ($d=mysqli_fetch_array($result)) { ?>
				<div style="max-width: 800px; border-radius: 10px; background-color: #C0E2FF;margin-bottom: 10px;margin-top: 10px;">
				<?php
				echo "<p style= 'color:red;font-weight:bold;margin-left:20px;font-weight:lighter;'>".$d['tenDangNhap']."</p>";
				echo "<p style='margin-left:30px;font-size:14px;color: grey;'>".$d['noiDung']."</p>";
				echo "<p style='margin-left:30px;font-size:10px;color:grey;'>"."Lúc: ".$d['thoiGian']."</p>";
				?>
				</div>

			<?php }
		?>
		
	</div>
	</div>
</div>
<?php
include 'footer.php';
?>
</div>

</html>