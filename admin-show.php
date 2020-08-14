
<?php
session_start();
if (isset($_SESSION['admin'])) {
	include 'left.php';
	include 'top.php';
	include 'connect.php';
	if (isset($_GET['key'])) {
		$key=$_GET['key'];
	} else $key=0;
?>
<div id="mid">
	<!-- \Showw chung loai -->
	<?php
		if ($key=="chungloai") {
			$result=mysqli_query($link,"SELECT * FROM doan_chungloai");
			$num=mysqli_num_rows($result);
			?>
			<div style="border-bottom: 1px solid black">
				<h3 style="margin-top: 25px;">Chủng loại</h3>
				<span>Quản lí chủng loại (<?php echo "$num"; ?>)</span>
				<button style="width: 100px;float: right; margin-right: 50px;margin-top: -25px;padding:10px; "> Thêm</button>
			</div>
			<div>
				<table border="1px" style="width: 98%; border-collapse: collapse;margin-top: 20px;">
					<tr>
						<th colspan="4" bgcolor="DarkSlateGray" style="color: white" align="left" height="30">Danh sách chủng loại </th>
					</tr>
					<tr bgcolor="lightgrey">
						<th>STT</th>
						<th>Mã chủng loại</th>
						<th>Tên chủng loại</th>
						<th>Hành động</th>
					</tr>
					<?php
					$stt=1;
					while ($d=mysqli_fetch_array($result)) { ?>
					<tr>
						<th><?php echo $stt; ?></th>
						<th><?php echo $d['maCL']; ?></th>
						<th><?php echo $d['tenCL']; ?></th>
						<th><a href="admin-delete.php?macl=<?php echo $d['maCL']; ?>">Xoá</a>&nbsp &nbsp<a href="admin-update.php?macl=<?php echo $d['maCL']; ?>">Sửa</a></th>
					</tr>
					<?php $stt++; } ?>
				</table>
			</div>
		<?php } //////////////////////////////// show loai ////////////
		elseif ($key=="loai") {
			$result=mysqli_query($link,"SELECT * FROM doan_loai");
			$num=mysqli_num_rows($result);
			?>
			<div style="border-bottom: 1px solid black">
				<h3 style="margin-top: 25px;">Loại</h3>
				<span>Quản lí loại sản phẩm(<?php echo "$num"; ?>)</span>
				<button style="width: 100px;float: right; margin-right: 50px;margin-top: -25px;padding:10px; "> Thêm</button>
			</div>
			<div>
				<table border="1px" style="width: 98%; border-collapse: collapse;margin-top: 20px;">
					<tr>
						<th colspan="5" bgcolor="DarkSlateGray" style="color: white" align="left" height="30">Danh sách loại sản phẩm </th>
					</tr>
					<tr bgcolor="lightgrey">
						<th>STT</th>
						<th>Mã chủng loại</th>
						<th>Mã loại</th>
						<th>Tên loại</th>
						<th>Hành động</th>
					</tr>
					<?php
					$stt=1;
					while ($d=mysqli_fetch_array($result)) { ?>
					<tr>
						<th><?php echo $stt; ?></th>
						<th><?php echo $d['maCL']; ?></th>
						<th><?php echo $d['maLoai']; ?></th>
						<th><?php echo $d['tenLoai']; ?></th>
						<th><a href="admin-delete.php?maloai=<?php echo $d['maLoai']; ?>">Xoá</a>&nbsp &nbsp<a href="admin-update.php?maloai=<?php echo $d['maLoai']; ?>">Sửa</a></th>
					</tr>
					<?php $stt++; } ?>
				</table>
			</div>
		// <?php } //////////////////////////////// show sap pham///////////////////
		elseif ($key=="sanpham") {
			$result=mysqli_query($link,"SELECT * FROM doan_sp");
			$num=mysqli_num_rows($result);
			?>
			<div style="border-bottom: 1px solid black">
				<h3 style="margin-top: 25px;">Sản phẩm</h3>
				<span>Quản lí sản phẩm(<?php echo "$num"; ?>)</span>
				<button style="width: 100px;float: right; margin-right: 50px;margin-top: -25px;padding:10px; "> Thêm</button>
			</div>
				<form method="GET">
			<input type="text" name="search" placeholder="Tìm kiếm">
			<input type="submit" value="Tìm" name="submit">
		</form>
		<?php

		if(isset($_GET['submit'])){
			if (!empty($_GET['search'])) {
				$search = $_GET['search'];
			}
			else echo "Vui lòng không để trống ";
			$conn=mysqli_connect("localhost","root","") or die("Khong the ket noi server!");
			mysqli_select_db($conn,"doan") or die("Database khong ton tai!");
			mysqli_query($conn,"set names 'utf8'");
			$kq=mysqli_query($conn,"select * from doan_sp where thongTin like '%$search%'");
			$tsp=mysqli_num_rows($kq); 
	$sd=20; //1 trang có 5 sạn phẩm 
	$sn=5; 
	//1 nhóm có 5 trang 
	//tinh tong so trang: 
	$tst=ceil($tsp/$sd); 
	//Tinh tong so nhom: 
	$tsn=ceil($tst/$sn);
	//tinh page, gr hiện hành: 
	if(isset($_GET['gr']))
	{
		$gr=$_GET['gr'];
		$page=($gr-1) *$sn+1;
	}
	else if(isset($_GET['page']))
	{
		$page=$_GET['page']; 
		$gr=ceil($page/$sn);
	}
	else{
		$gr=$page=1;
	}
	//Tính vị trị lấy sản phẩm:
	$vitri=($page-1) *$sd;
	// Query lấy sản phẩm theo vị trí: 
	$kq=mysqli_query($conn,"select * from doan_sp where thongTin like '%$search%' limit $vitri,$sd");
	?> 
	<table border="1" style="width: 98%"> 
		<tbody>
			<tr>
				<th scope="col">STT</th>
				<th scope="col">Mã sản phâm</th>
				<th scope="col">Tên sản phẩm</th> 
				<th scope="col">Giá</th>
				<th scope="col">Hình</th> 
				<th scope="col">Hành động</th> 
			</tr> 
			<?php
			while($d=mysqli_fetch_array($kq)){?>
				<tr>
					<th>&nbsp;</th> 
					<th><?php 

					$string = $d['maSP'];
					$Usearch = strtoupper($search);
					$replace = "<span style='color:red'>$Usearch</span>";
					$heighline = str_replace($Usearch, $replace, $string);
					echo $heighline;



					?></th> 

					<th><?php echo $d['tenSP'];?></th>
					<th><?php echo $d['giaSP'];?></th>
					<th width="150"><img src="<?php echo $d['hinhAnh'];?>" width="150" height="100" /></th>
					<th><a href="admin-delete.php?masp=<?php echo $d['maSP']; ?>">Xoá</a>&nbsp &nbsp<a href="admin-update.php?masp=<?php echo $d['maSP']; ?>">Sửa</a></th>
				</tr>
			<?php }?>
		</tbody>
	</table> 
	<?php
		//Tính page đầu, cuối của nhóm hiện hành: 
	$dau = ($gr - 1 ) * $sn+1; 

	$cuoi = $gr * $sn; 

	if( $cuoi > $tst)

		$cuoi=$tst;
	?>
	<p>Trang:
		<?php
    //Lùi 1 nhóm 
		if($gr>1) {?>
    	<a href="phantrang_sanpham_home.php?gr=<?php echo $gr-1;?>&search=<?php echo $search ?>">&lt;&lt;</a><?php } //In ra các trang từ $dau đến $cuoi của nhóm hiện hành: 
    	for($i=$dau;$i<=$cuoi;$i++){
    		if($page==$i){echo "<b><i>$i</b></i> &nbsp";} 
    		else{
    			?> <a href="admin-show.php?page=<?php echo $i;?>&search=<?php echo $search ?>"><?php echo $i;?>&nbsp</a>
    		<?php }}

    		if($gr<$tsn){?>
    			<a href="admin-show.php?gr=<?php echo $gr+1;?>&search=<?php echo $search ?>">&gt;&gt;</a>
    			<?php }}?></p>
<?php
	if (!isset($_GET['search'])) {
		echo "ABC";
	}
?>
		 <?php } ////////// show nguoi dung ////////////
		elseif ($key=="nguoidung") {
			$result=mysqli_query($link,"SELECT * FROM doan_nguoidung");
			$num=mysqli_num_rows($result);
			?>
			<div style="border-bottom: 1px solid black">
				<h3 style="margin-top: 25px;">Người dùng</h3>
				<span>Quản lí người dùng(<?php echo "$num"; ?>)</span>
				<button style="width: 100px;float: right; margin-right: 50px;margin-top: -25px;padding:10px; "> Thêm</button>
			</div>
			<div>
				<table border="1px" style="width: 98%; border-collapse: collapse;margin-top: 20px;">
					<tr>
						<th colspan="7" bgcolor="DarkSlateGray" style="color: white" align="left" height="30">Danh sách người dùng </th>
					</tr>
					<tr bgcolor="lightgrey">
						<th>ID</th>
						<th>Họ tên</th>
						<th>Tên đăng nhập</th>
						<th>Mật khẩu</th>
						<th>Hình ảnh</th>
						<th>Hành động</th>
					</tr>
					<?php
					$stt=1;
					while ($d=mysqli_fetch_array($result)) { ?>
					<tr>
						<th><?php echo $d['id']; ?></th>
						<th><?php echo $d['hoTen']; ?></th>
						<th><?php echo $d['tenDangNhap']; ?></th>
						<th><?php echo $d['matKhau']; ?></th>
						<th><?php echo $d['hinhAnh']; ?></th>
						<th><a href="admin-delete.php?id=<?php echo $d['id']; ?>">Xoá</a>&nbsp &nbsp<a href="admin-update.php?id=<?php echo $d['id']; ?>">Sửa</a></th>
					</tr>
					<?php $stt++; } ?>
				</table>
			</div>
		<?php }
		?>
</div>

<?php include 'bottom.php'; } else header('location:./index.php'); ?>