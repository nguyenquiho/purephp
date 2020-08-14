<?php
session_start();
?>
<!DOCTYPE html> 
<html> 
<head> 
	<meta charset="utf-8">
	<title>Sản phẩm tìm kiếm</title> 
</head>
	<body>
		<?php
		include 'header.php';
		if(isset($_GET['submit-search']) && empty($_GET['search']))
		{  ?>
			<script type="text/javascript">
			confirm('Bạn chưa nhập vào từ khoá!');
			</script> 
		<?php 
		// header('location:index.php'); 
		}
		if(isset($_GET['search']) && !empty($_GET['search'])){
			$search = $_GET['search'];
			include 'connect.php';
			$kq=mysqli_query($link,"select * from doan_sp where thongTin like '%$search%'");
			@$tsp=mysqli_num_rows($kq);
			if ($tsp==0) { ?>
				<div id="content" style="width: 1200px;height: 480px; background-color: #fff;">
				<br>
				<h2 style="color: red">
					Rất tiếc, Techfast.com.vn không tìm thấy kết quả nào phù hợp với từ khóa "<?php echo "$search " ?>"
				</h2><br>
				<h3>
					Để tìm được kết quả chính xác hơn, bạn vui lòng:
				</h3>
				<ul style="margin-left: 20px;">
					<li>Kiểm tra lỗi chính tả của từ khóa đã nhập</li>
					<li>Thử lại bằng từ khóa khác</li>
					<li>Thử lại bằng những từ khóa tổng quát hơn</li>
					<li>Thử lại bằng những từ khóa ngắn gọn hơn</li>
				</ul>
			</div>
			<?php }
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
	$kq=mysqli_query($link,"select * from doan_sp where thongTin like '%$search%' limit $vitri,$sd");
	if ($tsp>0) {
	?> 
	<div id="content">
		<div class="sp-tk">
		<div class="danh-muc" style="border-top: 5px white solid;"><span>sản phẩm tìm kiếm</span></div>
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
			?>
			</div>
	</div> <?php 
		//Tính page đầu, cuối của nhóm hiện hành: 
	$dau = ($gr - 1 ) * $sn+1; 

	$cuoi = $gr * $sn; 

	if( $cuoi > $tst)

		$cuoi=$tst;
	?>
	<p style="width: 1200px;height: 20px; background-color: orange;float: left; border-bottom: 1px solid orange;">Trang:
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
    			<?php }}}?></p>
    			<?php
    			include 'footer.php';
    			?>			
	</body>
</html>
