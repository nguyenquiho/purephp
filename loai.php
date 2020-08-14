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
	<title><?php $maloai= $_GET['key'];
	$q="SELECT * FROM doan_loai WHERE maLoai=$maloai";
	$r=mysqli_query($link,$q);
	$title=mysqli_fetch_array($r);
	if ($title['maCL']==1) {
		echo "Laptop ".$title['tenLoai'];
	}
	else if ($title['maCL']==2) {
		echo "Máy tính để bàn ".$title['tenLoai'];
	}
	else{
		echo $title['tenLoai'];
	}
	?>
</title>
<link rel="stylesheet" type="text/css" href="stylee.css">
<meta charset="utf-8">

</head>
<body>
	<?php
	include 'header.php';
	?>
	<div id="content">
		<div class="danh-muc" style="border-top: 5px white solid;">
			<span>danh mục sản phẩm <?php echo $title['tenLoai']; ?></span>
		</div>
		<?php
		$maloai= $_GET['key'];
		$kq=mysqli_query($link,"select * from doan_sp where maLoai =$maloai");
			@$tsp=mysqli_num_rows($kq);
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
	if ($tsp>0) {
	?> 
		<?php
		while($d=mysqli_fetch_array($kq)){
			$masp=$d['maSP'];?>
			<div class="sp" style="width: background: white;
							width: 290px;height: 350px;margin: 5px 5px;
							text-align: center;position: relative;
							float: left;z-index: 6; overflow: hidden;">
				<a href="chitiet-sp.php ?key=<?php echo $masp ?>">
				<div><img src="<?php echo $d['hinhAnh'] ?>" style="width: 280px; height: 250px;"></div>
				<div class="text-sp"><?php echo $d['thongTin']; ?></div><br><br>
					<span class="ten-sp"><?php echo $d['tenSP']; ?></span><br>
					<span class="gia-sp"><?php echo $d['giaSP']; ?>.đ</span>
				</a>
			</div>
				<?php
			}
		//Tính page đầu, cuối của nhóm hiện hành: 
	$dau = ($gr - 1 ) * $sn+1; 

	$cuoi = $gr * $sn; 

	if( $cuoi > $tst)

		$cuoi=$tst;
	?>
	<p style="width: 1200px;height: 20px; background-color: orange;float: left; border-bottom: 1px solid orange; text-align: center;">Trang:
		<?php
    //Lùi 1 nhóm 
		if($gr>1) {?>
    	<a href="nhap.php?gr=<?php echo $gr-1;?>&search=<?php echo $search ?>">&lt;&lt;</a><?php } //In ra các trang từ $dau đến $cuoi của nhóm hiện hành: 
    	for($i=$dau;$i<=$cuoi;$i++){
    		if($page==$i){echo "<b><i>$i</b></i> &nbsp";} 
    		else{
    			?> <a href="nhap.php?page=<?php echo $i;?>&search=<?php echo $search ?>"><?php echo $i;?>&nbsp</a>
    		<?php }}

    		if($gr<$tsn){?>
    			<a href="nhap.php?gr=<?php echo $gr+1;?>&search=<?php echo $search ?>">&gt;&gt;</a>
    			<?php }}?></p>
<?php
include 'footer.php'
?>
</body>
</html>