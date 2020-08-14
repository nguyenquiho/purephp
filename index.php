<?php
session_start();
if (isset($_SESSION['admin'])) {
	header('location:localhost:8080/do-an/quantri/admin.php');
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Techfast.com.vn</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<?php
include('header.php');
include 'connect.php';
?>
<div id="content">
			<!-- <div id="slide">
				<a href="#sp-moi"> san pham moi</a>
				<a href="#sp-km"> san khuyen mai</a>
				<a href="#sp-bc"> san pham ban chay</a>
				<a href="#pk-gt"> phu kien gia tot</a>
			</div> -->
			
			<!-- Bắt đầu slide -->
			<div style="width: 1200px;height: 400px;" id="slider-container">
				<script>
					var i=0;
					var images=[];
					var time=3000;

				//image list
				images[0]='./hinh-anh/slide/sp-moi.png';
				images[1]='./hinh-anh/slide/sp-km.jpg';
				images[2]='./hinh-anh/slide/sp-banchay.jpg';
				images[3]='./hinh-anh/slide/phukien-giatot.jpg';

				//Change Image
				function changeImage(){

					document.slide.src = images[i];

					if(i <images.length-1){
						i++;
					} else {
						i=0;
					}
					setTimeout("changeImage()", time);
				}
				window.onload= changeImage;
			</script>

			<img name="slide" style="width: 1200px; height: 400px;margin-top: 1px;">
		</div>
		<!-- Kết thúc slider -->

		<div class="danh-muc" id="dm-sp-moi" style="margin-top: 2px;"><span>sản phẩm mới</span></div>
		<?php
		$query="SELECT * FROM doan_sp_moi";
		$result=mysqli_query($link,$query);

			// $number=mysqli_num_rows($result);
			// for ($i=1; $i <=$number ; $i++) { 
	  //        $d=mysqli_fetch_array($result);
	  //        $idcs=$d['idCS'];
	  //        echo'<div>'."<a href='infsinger.php ?key=$idcs' id='name-singer'>".$d['HoTenCS']."</a>"."</div>";
	  //        echo "<br>";
		while ($d=mysqli_fetch_array($result)){ ?>
			<div class="sp-moi">
				<?php
				$masp=$d['maSP'];
				?>	
				<a href="chitiet-sp.php ?key=<?php echo $masp ?>">
					<div><img src="<?php echo $d['hinhAnh'] ?>" style="width: 270px; height: 250px;">
					</div>
					<div class="text-sp-moi"><?php echo $d['thongTin']; ?></div>
					</<br><br>
					<span class="ten-sp"><?php echo $d['tenSP']; ?></span><br>
					<span class="gia-sp"><?php echo number_format($d['giaSP']); ?>.đ</span></a>
				</div>
			<?php } ?>
			<div class="danh-muc" id="dm-sp-km"><span>sản phẩm khuyến mãi</span></div>
			<?php
			$query="SELECT * FROM doan_sp_km";
			$result=mysqli_query($link,$query);
			while ($d=mysqli_fetch_array($result))
				{?>
					<div class="sp-km">
						<?php
						$masp=$d['maSP'];
						?>	
						<a href="chitiet-sp.php ?key=<?php echo $masp ?>">
							<div><img src="<?php echo $d['hinhAnh'] ?>" style="width: 270px; height: 250px;">
							</div>
							<div class="text-sp-km"><?php echo $d['thongTin']; ?></div> 
							</<br><br>
							<span class="ten-sp"><?php echo $d['tenSP']; ?></span><br>
							<span class="gia-sp"><?php echo number_format($d['giaSP']); ?>.đ</span></a>
						</div>
					<?php } ?>
					<div class="danh-muc" id="dm-sp-bc"><span>sản phẩm bán chạy</span></div>
					<?php
					$query="SELECT * FROM doan_sp_banchay";
					$result=mysqli_query($link,$query);
					while ($d=mysqli_fetch_array($result))
						{ ?>
							<div class="sp-bc" style="background: white;
							width: 290px;height: 350px;margin: 5px 5px;
							text-align: center;position: relative;
							float: left;z-index: 6; overflow: hidden;">
							<?php
							$masp=$d['maSP'];
							?>	
							<a href="chitiet-sp.php ?key=<?php echo $masp ?>">
								<div><img src="<?php echo $d['hinhAnh']  ?>" style="width: 270px; height: 250px;">
								</div>
								<div class="text-sp-bc"><?php echo $d['thongTin']; ?></div>
								</<br><br>
								<span class="ten-sp"><?php echo $d['tenSP']; ?></span><br>
								<span class="gia-sp"><?php echo number_format($d['giaSP']); ?>.đ</span></a>
							</div>
						<?php } ?>
						<div class="danh-muc" id="dm-pk-gt"><span>phụ kiện giá tốt</span></div>
						<?php
						$query="SELECT * FROM doan_pk_giatot";
						$result=mysqli_query($link,$query);
						while (($d=mysqli_fetch_array($result))) { ?>
							<div class="pk-gt" style="background: white;
							width: 290px;height: 400px;margin: 5px 5px;
							text-align: center;position: relative;
							float: left;z-index: 6;overflow: hidden;">
								<?php
								$maSP=$d['maSP']
								?>
								<a href="chitiet-sp.php ?key=<?php echo $masp ?>">
									<div><img src="<?php echo $d['hinhAnh'];?>">
									</div>
									<div class="text-pk-gt"><?php echo $d['thongTin']; ?></div>
									</<br><br>
									<span class="ten-sp"><?php echo $d['tenSP']; ?></span><br>
									<span class="gia-sp"><?php echo number_format($d['giaSP']); ?>.đ</span></a>
								</div>
							<?php }
							?>
						</div>
						<?php
						include 'footer.php';
						?>
					</body>
					</html>