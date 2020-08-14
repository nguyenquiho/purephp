<! doctype html> 
<html> 
<head> <meta charset="utf-8">
	<title>Untitled Document</title> </head>
	<body>
		<form action="" method="GET">
			<input type="text" name="search" placeholder="Tìm kiếm">
			<input type="submit" value="Tìm">
		</form>
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
    	<a href="nhapp.php?gr=<?php echo $gr-1;?>&search=<?php echo $search ?>">&lt;&lt;</a><?php } //In ra các trang từ $dau đến $cuoi của nhóm hiện hành: 
    	for($i=$dau;$i<=$cuoi;$i++){
    		if($page==$i){echo "<b><i>$i</b></i> &nbsp";} 
    		else{
    			?> <a href="nhapp.php?page=<?php echo $i;?>&search=<?php echo $search ?>"><?php echo $i;?>&nbsp</a>
    		<?php }}

    		if($gr<$tsn){?>
    			<a href="nhapp.php?gr=<?php echo $gr+1;?>&search=<?php echo $search ?>">&gt;&gt;</a>
    			<?php }}?></p>
<?php
	if (!isset($_GET['search'])) {
		echo "ABC";
	}
?>
  </body>
  </html>