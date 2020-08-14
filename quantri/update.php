<?php
session_start();
if (isset($_SESSION['admin'])) {
	include 'left.php';
	include 'top.php';
	include '../connect.php';
	?>

<div id="mid">
<?php
if (isset($_GET['key'])) {
	$key=$_GET['key'];// nếu key =donhang
	if ($key=="donhang") {
		$madh=$_GET['madh']; ?>
		<div style="border-bottom: 1px solid black">
			<h3 style="margin-top: 25px;">Đơn hàng</h3>
			<span>Sửa đơn hàng</span>		
		</div>
		<div style="margin: 50px 0px;">
		<?php
			$query=mysqli_query($link,"SELECT * FROM doan_donhang WHERE maDH= $madh");
			$d=mysqli_fetch_array($query);
		?>
			<form method="post">
				Trạng thái: <select name="trangthai">
					<option><?php if ($d['trangThai']==0) {
						echo "Đang xử lí";
					}elseif ($d['trangThai']==1) {
						echo "Đang giao";
					}elseif ($d['trangThai']==2) {
						echo "Đã giao";
					} ?></option>
					<option value="0">Đang xử lí</option>
					<option value="1">Đang giao</option>
					<option value="2">Đã giao</option>
				</select>
				<input type="submit" name="them" value="Cập nhật">
			</form>
			<?php
				if (isset($_POST['them'])) {
					$tt=$_POST['trangthai'];
					$update=mysqli_query($link,"UPDATE doan_donhang SET trangThai=$tt WHERE maDH=$madh");
					echo "<span style='color:#3270d3;'>Cập nhật thành công</span>";
				}
			?>
		</div>

	<?php }
	elseif ($key=="sanpham") {// nếu key= sản phẩm
		$masp=$_GET['masp']; ?>
		<div style="border-bottom: 1px solid black">
			<h3 style="margin-top: 25px;">Sản phẩm</h3>
			<span>Sửa sản phẩm</span>		
		</div>
		<div style="margin: 50px 0px;">
			<?php
			$query=mysqli_query($link,"SELECT * FROM doan_sp WHERE maSP= $masp");
			$d=mysqli_fetch_array($query);
		?>
			<form method="post">
				Mã loại: <input type="number" name="maloai" value="<?php echo $d['maLoai'] ?>"><br>
				Mã sản phẩm: <input type="number" name="masp" placeholder="<?php echo $d['maSP'] ?>"><br>
				Tên sản phẩm: <input type="text" name="tensp" value="<?php echo $d['tenSP'] ?>"><br>
				Giá: <input type="number" name="gia" value="<?php echo $d['giaSP'] ?>"><br>
				Thông tin: <input type="text" name="thongtin" value="<?php echo $d['thongTin'] ?>"><br>
				Hình ảnh: <input type="text" name="hinhanh" value="<?php echo $d['hinhAnh'] ?>"><br>
				Số lượng: <input type="text" name="sl" value="<?php echo $d['SL'] ?>"><br>
				<input type="submit" name="submit" value="Cập nhật">
			</form>
			<?php
				if (isset($_POST['submit'])) {
					$maloai=$_POST['maloai'];
					$tensp=$_POST['tensp'];
					$gia=$_POST['gia'];
					$thongtin=$_POST['thongtin'];
					$hinhanh=$_POST['hinhanh'];
					$sl=$_POST['sl'];
					$update=mysqli_query($link,"UPDATE doan_sp SET maLoai='$maloai', maSP='$masp', tenSP='$tensp',tenSP='$tensp',giaSP='$gia',thongTin='$thongtin',hinhAnh='$hinhanh',SL='$sl' WHERE maSP=$masp");
					if ($update) {
						echo "<span style='color:#3270d3;'>Cập nhật thành công</span>";
					}else echo "<span style='color:red;'>Cập nhật không thành công</span>";
				}
			?>
		</div>
	<?php } // Nếu key="loai"
	elseif ($key=="loai") {
		$maloai=$_GET['maloai']; ?>
		<div style="border-bottom: 1px solid black">
			<h3 style="margin-top: 25px;">Loại sản phẩm</h3>
			<span>Sửa loại sản phẩm</span>		
		</div>
		<div style="margin: 50px 0px;">
			<?php
			$query=mysqli_query($link,"SELECT * FROM doan_loai WHERE maLoai= $maloai");
			$d=mysqli_fetch_array($query);
		?>
			<form method="post">
				Mã chủng loại: <input type="number" name="macl" value="<?php echo $d['maCL'] ?>"><br>
				Mã loại: <input type="number" name="maloai" value="<?php echo $d['maLoai'] ?>"><br>
				Tên loại: <input type="text" name="tenloai" value="<?php echo $d['tenLoai'] ?>"><br>
				<input type="submit" name="submit" value="Cập nhật">
			</form>
			<?php
				if (isset($_POST['submit'])) {
					$macl=$_POST['macl'];
					$maloai=$_POST['maloai'];
					$tenloai=$_POST['tenloai'];
					$update=mysqli_query($link,"UPDATE doan_loai SET maCL='$macl',maLoai='$maloai', tenLoai='$tenloai' WHERE maLoai=$maloai");
					if ($update) {
						echo "<span style='color:#3270d3;'>Cập nhật thành công</span>";
					}else echo "<span style='color:red;'>Cập nhật không thành công</span>";
				}
			?>
		</div>
	<?php }

}
?>

</div>

	<?php include 'bottom.php'; } else header('location:../index.php'); ?>