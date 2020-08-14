
<?php
session_start();
if (isset($_SESSION['admin'])) {
	include '../connect.php';
	
	include 'left.php';
	include 'top.php';
	?>	
	<div id="mid">
 		<?php
			$result=mysqli_query($link,"SELECT * FROM doan_sp");
			$num=mysqli_num_rows($result);
		?>
		<div style="border-bottom: 1px solid black">
				<h3 style="margin-top: 25px;">Sản phẩm</h3>
				<span>Quản lí sản phẩm(<?php echo "$num"; ?>)</span>
				<a href="add.php?key=sanpham">
					<button style="width: 100px;float: right; margin-right: 50px;margin-top: -25px;padding:10px; "> Thêm</button>
				</a>
				
		</div>
		<br>
		<form action="" method="GET">
			<input type="text" name="search" placeholder="Tìm kiếm">
			<input type="submit" value="Tìm">
		</form>
		<br>
		<?php

		if(isset($_GET['search'])){
			$search = $_GET['search'];
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
	<table border="1" style=" width: 95%;border-collapse: collapse;margin-left: 10px;border: white"> 
		<tbody>
			<tr>
				<th colspan="6" bgcolor="DarkSlateGray" style="color: white" align="left" height="30">Danh sách sản phẩm </th>
			</tr>
			<tr bgcolor="lightgrey">
				<th scope="col">STT</th>
				<th scope="col">Mã sản phâm</th>
				<th scope="col">Tên sản phẩm</th> 
				<th scope="col">Giá</th>
				<th scope="col">Hình</th> 
				<th scope="col">Hành động</th> 
			</tr> 
			<?php 
			$stt=1;
			while($d=mysqli_fetch_array($kq)){?>
				<tr bgcolor="lightblue">
					<th><?php echo $stt; ?></th> 
					<th><?php 

					$string = $d['maSP'];
					$Usearch = strtoupper($search);
					$replace = "<span style='color:red'>$Usearch</span>";
					$heighline = str_replace($Usearch, $replace, $string);
					echo $heighline;



					?></th> 

					<th><?php echo $d['tenSP'];?></th>
					<th><?php echo number_format($d['giaSP']);?> .VNĐ</th>
					<th width="150"><img src="<?php echo $d['hinhAnh'];?>" width="150" height="100" /></th>
					<th><a onclick="return confirm('Bạn có chắc chắn xóa không ?')" href="delete.php?key=sanpham&masp=<?php echo $d['maSP']; ?>">Xoá</a>&nbsp &nbsp<a href="update.php?key=sanpham&masp=<?php echo $d['maSP']; ?>">Sửa</a></th>
				</tr>
			<?php $stt++;
			 }?>
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
    	<a href="show-sp.php?gr=<?php echo $gr-1;?>&search=<?php echo $search ?>">&lt;&lt;</a><?php } //In ra các trang từ $dau đến $cuoi của nhóm hiện hành: 
    	for($i=$dau;$i<=$cuoi;$i++){
    		if($page==$i){echo "<b><i>$i</b></i> &nbsp";} 
    		else{
    			?> <a href="show-sp.php?page=<?php echo $i;?>&search=<?php echo $search ?>"><?php echo $i;?>&nbsp</a>
    		<?php }}

    		if($gr<$tsn){?>
    			<a href="show-sp.php?gr=<?php echo $gr+1;?>&search=<?php echo $search ?>">&gt;&gt;</a>
    			<?php }}?></p>
<?php
	if (!isset($_GET['search'])) { // Nếu chưa tìm kiếm thì xuất ra Sản Phẩm
		

			$conn=mysqli_connect("localhost","root","") or die("Khong the ket noi server!");
			mysqli_select_db($conn,"doan") or die("Database khong ton tai!");
			mysqli_query($conn,"set names 'utf8'");
			$kq=mysqli_query($conn,"select * from doan_sp");
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
	$kq=mysqli_query($conn,"select * from doan_sp limit $vitri,$sd");
	?> 
	<table border="1" style=" width: 95%;border-collapse: collapse;margin-left: 10px;border-color: white"> 
		<tbody>
			<tr>
				<th colspan="6" bgcolor="DarkSlateGray" style="color: white" align="left" height="30">Danh sách sản phẩm </th>
			</tr>
			<tr bgcolor="lightgrey">
				<th scope="col">STT</th>
				<th scope="col">Mã sản phâm</th>
				<th scope="col">Tên sản phẩm</th> 
				<th scope="col">Giá</th>
				<th scope="col">Hình</th> 
				<th scope="col">Hành động</th> 
			</tr> 
			<?php
			$stt=1;
			while($d=mysqli_fetch_array($kq)){?>
				<tr bgcolor="lightblue">
					<th><?php echo $stt; ?></th> 
					<th><?php 
					echo $d['maSP'];
					?></th> 
					<th><?php echo $d['tenSP'];?></th>
					<th><?php echo number_format($d['giaSP']);?> .VNĐ</th>
					<th width="150"><img src="<?php echo $d['hinhAnh'];?>" width="150" height="100" /></th>
					<th><a onclick="return confirm('Bạn có chắc chắn xóa không ?')" href="delete.php?key=sanpham&masp=<?php echo $d['maSP']; ?>">Xoá</a>&nbsp &nbsp<a href="update.php?key=sanpham&masp=<?php echo $d['maSP']; ?>">Sửa</a></th>
				</tr>
			<?php $stt++; 
			 }?>
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
    	<a href="show-sp.php?gr=<?php echo $gr-1;?>">&lt;&lt;</a><?php } //In ra các trang từ $dau đến $cuoi của nhóm hiện hành: 
    	for($i=$dau;$i<=$cuoi;$i++){
    		if($page==$i){echo "<b><i>$i</b></i> &nbsp";} 
    		else{
    			?> <a href="show-sp.php?page=<?php echo $i;?>"><?php echo $i;?>&nbsp</a>
    		<?php }}

    		if($gr<$tsn){?>
    			<a href="show-sp.php?gr=<?php echo $gr+1;?>">&gt;&gt;</a>
    			<?php }}?></p>

	<?php include 'bottom.php'; } else header('location:../index.php'); ?>