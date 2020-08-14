<?php
session_start();
include 'connect.php';
if (isset($_SESSION['id'])) {
	$id=$_SESSION['id'];
}
if (isset($_SESSION['user'])) {
	$user=$_SESSION['user'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Trang cá nhân</title>
</head>
<style type="text/css">
	*{
		margin: 0px;
		padding: 0px;
	}
	#btn-home{
		background-color: green; 
		border: none;
		outline: none; 
		padding: 10px; 
		color: white; 
		border-radius: 10px;
	}
	#btn-home:hover{
		cursor: pointer;
		opacity: 0.9;
	}
	#btn-logout:hover{
		cursor: pointer;
		opacity: 0.9;
	}

	#btn-logout{
		background-color: red; 
		border: none;
		outline: none; 
		padding: 10px; 
		color: white; 
		border-radius: 10px;
	}
	ul li{
		text-align: left;
		padding-left: 50px;
		list-style-type: none;
		height: 30px;
		line-height: 30px;
		color: grey;
	}
	ul li:hover{
		background: lightblue;
		cursor: pointer;
	}
	a{
		text-decoration: none;
	}

</style>
<?php
	$sql=mysqli_query($link,"SELECT * FROM doan_nguoidung WHERE id=$id");
	$avt=mysqli_fetch_array($sql);
?>
<body style="color: black;text-align: center;background-color: black; font-family: Roboto ,San-serif">
	<div id="container">
	<div style="width:1200px; height: 80px; background-color: white; margin: 0px auto;">
		<a href="index.php" style="text-decoration: none;">
			<img src="hinh-anh/icons/logo.png" style="float: left;height: 80px; width: 300px;">
		</a>
<!-- 		<div style="width: 80px; height: 80px;float: right;"><a href="index.php" title="Trang chủ"><img src="hinh-anh/icons/home.png" width="80px" height="80px" ></a></div> -->
	</div>
	<div style="background:#3270d3; font-weight: bold;height: 40px; width: 1200px;margin: 0px auto; color: white;font-size: 30px;line-height: 40px;">Xin chào <span style="text-transform: uppercase;"><?php echo $user ; ?></span></div>
		
	</div>
	<?php 
	$result=mysqli_query($link,"SELECT * FROM doan_donhang WHERE tenDangNhap='$user' AND anHien=1");
	$num=mysqli_num_rows($result);
	?>
	<div style="background: white; width: 1200px;min-height: 550px; margin: 0px auto">
		<div style="background-color: white; width: 300px;min-height: 500px;float: left;border-right: 20px lightgrey solid;">
			<div id="pícture" style="width: 300px; height: 300px; background-color: white;">
				<img src="<?php echo $avt['hinhAnh'] ?>" width="250" height="280" style="margin-top: 5px;"><br>
				<span style="color: #3270d3"><span style="text-transform: uppercase;"><?php echo $user; ?></span></span>
			</div><br>
			<a href="index.php"><button id="btn-home">TRANG CHỦ</button></a>&nbsp &nbsp
			<a href="delete-session.php"><button id="btn-logout"> ĐĂNG XUẤT</button></a>
			<br>
			<ul>
				<br><br>
				<li>⬜ Quản lí đơn hàng</li>
				<a href="xuli-trangcanhan.php?action=change-avt">
					<li>☆ Đổi ảnh đại diện</li>	
				</a>
				<a href="xuli-trangcanhan.php?action=fix-infor">
					<li>✡ Chỉnh sửa thông tin cá nhân</li>	
				</a>
				<a href="xuli-trangcanhan.php?action=change-pass">
					<li>☪ Đổi mật khẩu</li>
				</a>							
			</ul>  
		</div>
		<div style="float: left; margin: 0px auto;">

			
			<br><h2 style="color: #3270d3 ;text-align: left;border-bottom: 1px solid #3270d3;width: 360px;margin-left: 10px;">Quản lí đơn hàng của bạn <span style="color: red;">(<?php echo $num; ?> đơn)</span></h2><br>
			
			<?php
				$soluondh=0;
				while($d=mysqli_fetch_array($result)){ 
					$madh=$d['maDH']; ?>
					<table border="1px" bgcolor="lightblue" style="border: solid 1px white;border-collapse: collapse;width: 830px;margin-left: 10px;">
						<tr>
							<td colspan="7">
								<div style="color: black;">
								Mã đơn hàng: <?php echo $d['maDH']; ?><br>
								Tên khách hàng: <?php echo $d['tenKH']; ?><br>
								Địa chỉ: <?php echo $d['diaChi']; ?>------ SĐT: <?php echo $d['sdt']; ?><br>
								Ngày lập: <?php echo $d['ngayMua']; ?>
								</div>
							</td>
						</tr>
						<tr style="color: red">
							<th>STT</th>
							<th>Mã Sản Phẩm</th>
							<th>Tên Sản Phẩm</th>
							<th>Số Lượng</th>
							<th>Đơn Giá</th>
							<th>Thành Tiền</th>
							<?php
								if ($d['trangThai']==0) {
									echo "<th>&nbsp</th>";
								}
							?>
							
						</tr>
						<?php
						$i=1;
						$tongcong=0;
				$result1=mysqli_query($link,"SELECT * FROM doan_chitiethoadon WHERE maDH='$madh'");
				while($d1=mysqli_fetch_array($result1))
					{ $masp=$d1['maSP'];
					?>
					<tr>
						<th><?php echo $i; ?></th>
						<th><?php echo $d1['maSP']; ?></th>
						<th><?php echo $d1['tenSP']; ?></th>
						<th><?php echo $d1['SL']; ?></th>
						<th><?php echo number_format($d1['giaSP']); ?> .VNĐ</th>
						<th><?php echo number_format($d1['thanhTien']); ?> .VNĐ</th>
						<?php
							$tongcong=$tongcong+$d1['thanhTien'];
						?>

						<?php
								if ($d['trangThai']==0) {
									echo "<th><a href='xoasptrongdonhang.php?madh=$madh&masp=$masp'>Xoá</a></th>";
								}
							?>
					</tr>					
				<?php $i++; } ?>
						<tr>
						<th colspan="3">
							<?php if ($d['trangThai']==0) {
							echo "<span style='color:red;'>"."Trạng thái: Đang xử lí"."</span>";} 
							 else if ($d['trangThai']==1) {
							 	echo "<span style='color:tomato;'>"."Trạng thái: Đang giao"."</span>";}
							 	else   echo "<span style='color:green;'>"."Trạng thái: Đã giao"."</span>";;							 	
							  ?>			 	 	
						</th>
						<th colspan="4" style="color: red;"><?php echo "Tổng cộng: ".number_format($tongcong);?> .VNĐ</th>
						<!-- //Cập nhật lại tổng cộng cho đơn hàng nếu xoá -->
						<?php 
							$update=mysqli_query($link,"UPDATE doan_donhang SET tongCong=$tongcong WHERE maDH=$madh");
						?>
					</tr>
					<?php
							if ($d['trangThai']==0) { ?>
								<tr>
									<th colspan="7"><a href="huydonhang.php?madh=<?php echo $d['maDH']; ?>" style="text-decoration: none; color: red;">Huỷ đơn hàng</a></th>
								</tr>	
							<?php }
							elseif ($d['trangThai']==2) { ?>
								<tr>
									<th colspan="7"><a href="andonhang.php?madh=<?php echo $d['maDH']; ?>" style="text-decoration: none; color: red;">Xoá</a></th>
								</tr>	
							 	
							 <?php } ?>
					</table><br>
				<?php } ?>

		</div>
	</div>
	<div style="background-color: #3270d3; width: 1200px; margin: 0px auto;">
	<?php include 'footer.php'; ?>
	</div>
	</div>
</body>
</html>
<?php }else header('location:index.php'); ?>