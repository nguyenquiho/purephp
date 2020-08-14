<?php
session_start();
if (isset($_SESSION['admin'])) {
	include 'left.php';
	include 'top.php';
	include '../connect.php';
	?>

<div id="mid">
	<!-- // Lấy key -->
	<?php
	$key=$_GET['key'];
	?>
	<!-- // Nếu	 -->

	<?php
		if ($key=='chungloai') { ?>
			<div style="border-bottom: 1px solid black">
				<h3 style="margin-top: 25px;">Chủng loại</h3>
				<span>Thêm chủng loại</span>		
			</div>
			<div style="margin: 50px 0px;">
				<form method="post">
					Mã chủng loại: <input type="number" name="macl"><br>
					Tên chủng loại: <input type="text" name="tencl"><br>
					<input type="submit" name="them" value="Thêm">
				</form>
				<?php
					if (isset($_POST['them'])) {
						if (!empty($_POST['macl'])&& !empty($_POST['tencl'])) {
							$macl=$_POST['macl'];
							$tencl=$_POST['tencl'];
							$insert=mysqli_query($link,"INSERT INTO doan_chungloai(maCL,tenCL) VALUES('$macl','$tencl')");
							if ($insert) {
								echo "<span style='color:#3270d3;'>Thêm thành công</span>";
							}
						}
						else echo "<span style='color:red;'>Vui lòng không để trống</span>";
					}
				?>
			</div>

		<?php } //thêm loại
		elseif ($key=='loai') { ?>
			<div style="border-bottom: 1px solid black">
				<h3 style="margin-top: 25px;">Loại</h3>
				<span>Thêm Loại</span>		
			</div>
			<div style="margin: 50px 0px;">
				<form method="post">
					Mã chủng loại: <input type="number" name="macl"><br>
					Mã loại: <input type="number" name="maloai"><br>
					Tên loại: <input type="text" name="tenloai"><br>
					<input type="submit" name="them" value="Thêm">
				</form>
				<?php
					if (isset($_POST['them'])) {
						if (!empty($_POST['macl'])&& !empty($_POST['maloai'])&& !empty($_POST['tenloai'])) {
							$macl=$_POST['macl'];
							$maloai=$_POST['maloai'];
							$tenloai=$_POST['tenloai'];
							$insert=mysqli_query($link,"INSERT INTO doan_loai(maCL,maloai,tenLoai) VALUES('$macl','$maloai','$tenloai')");
							if ($insert) {
								echo "<span style='color:#3270d3;'>Thêm thành công</span>";
							}
						}
						else echo "<span style='color:red;'>Vui lòng không để trống</span>";
					}
				?>
			</div>
			
		<?php } 
	 		elseif ($key=="sanpham") { ?>

	 			<div style="border-bottom: 1px solid black">
				<h3 style="margin-top: 25px;">Sản phẩm</h3>
				<span>Thêm sản phẩm</span>		
			</div>
			<div style="margin: 50px 0px;">
				<form method="post">
					Mã loại: <input type="number" name="maloai"><br>
					Mã sản phẩm: <input type="number" name="masp"><br>
					Tên sản phẩm: <input type="text" name="tensp"><br>
					Giá sản phẩm: <input type="number" name="gia"><br>
					Thông tin: <input type="text" name="thongtin"><br>
					Hình ảnh: <input type="text" name="hinhanh"><br>
					Số lượng: <input type="number" name="sl"><br>
					<input type="submit" name="them" value="Thêm">
				</form>
				<?php
					if (isset($_POST['them'])) {
						if (!empty($_POST['maloai'])&& !empty($_POST['masp'])&& !empty($_POST['tensp'])&& !empty($_POST['gia'])&& !empty($_POST['thongtin'])&& !empty($_POST['hinhanh'])&& !empty($_POST['sl'])) {
							$maloai=$_POST['maloai'];
							$masp=$_POST['masp'];
							$tensp=$_POST['tensp'];
							$gia=$_POST['gia'];
							$thongtin=$_POST['thongtin'];
							$hinhanh=$_POST['hinhanh'];
							$sl=$_POST['sl'];
							$insert=mysqli_query($link,"INSERT INTO doan_sp(maLoai,maSP,tenSP,giaSP,thongTin,hinhAnh,SL) VALUES('$maloai','$masp','$tensp','$gia','$thongtin','$hinhanh','$sl')");
							if ($insert) {
								echo "<span style='color:#3270d3;'>Thêm thành công</span>";
							}
						}
						else echo "<span style='color:red;'>Vui lòng không để trống</span>";
					}
				?>
			</div>
			
		<?php }
		elseif ($key=="nguoidung") { ?>
			<div style="border-bottom: 1px solid black">
				<h3 style="margin-top: 25px;">Người dùng</h3>
				<span>Thêm người dùng</span>		
			</div>
			<div style="margin: 50px 0px;">
				<form method="post">
					Họ tên: <input type="text" name="hoten"><br>
					Tên đăng nhập: <input type="text" name="tendangnhap"><br>
					Mật khẩu: <input type="password" name="matkhau"><br>
					Hình ảnh: <input type="text" name="hinhanh"><br>
					<input type="submit" name="them" value="Thêm">
				</form>
				<?php
					if (isset($_POST['them'])) {
						if (!empty($_POST['hoten'])&& !empty($_POST['tendangnhap'])&& !empty($_POST['matkhau'])&& !empty($_POST['hinhanh'])) {
							$hoten=$_POST['hoten'];
							$tendangnhap=$_POST['tendangnhap'];
							$matkhau=$_POST['matkhau'];
							$hinhanh=$_POST['hinhanh'];
							$insert=mysqli_query($link,"INSERT INTO doan_nguoidung(hoTen,tenDangNhap,matKhau,hinhAnh) VALUES('$hoten','$tendangnhap','$matkhau','$hinhanh')");
							if ($insert) {
								echo "<span style='color:#3270d3;'>Thêm thành công</span>";
							}
						}
						else echo "<span style='color:red;'>Vui lòng không để trống</span>";
					}
				?>
			</div>		
		<?php }
		elseif (condition) {
			# code...
		}
	?>




</div>
	<?php include 'bottom.php'; } else header('location:../index.php'); ?>