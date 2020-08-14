<link rel="stylesheet" type="text/css" href="style.css">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<?php
if(!isset($_SESSION)){
    session_start();
}
?>
<?php
include 'connect.php';
?>
<body>
	<div id="container">
		<div id="header">
			<div id="banner">
				<a href="index.php">
					<img src="hinh-anh/icons/logo.png" >
				</a>
				
				<div class="search-box">
					<form method="get" action="timkiem.php">
					<input class="search-txt" type="text" name="search" placeholder="Bạm tìm gì?">
					<input type="submit" name="submit-search" value="Tìm kiếm">
				</form>
				</div>
				<div id="gio-hang" style="width: 50px; height: 80px;margin-left: 30px;background-color: white; float: left;">
					<a href="giohang.php"><img src="hinh-anh/icons/gio-hang.png" style="height: 50px;width: 50px;" title="Giỏ hàng"></a>
				</div>
				<div id="sdt">
				<p style="margin-top: 42px; font-weight: ">Tư vấn mua hàng:<span style="color: red"> 0889 542 245</span>
				<p>Hỗ trợ khách hàng:<span style="color: red"> 0889 542 245</span>
				</div>
				<div id="login">
							<?php if (isset($_SESSION['user'])) 
							{
								echo "<br><span style='font-weight:lighter;font-size: 10px;'>"."Xin chào"."</span>"." "."<span style='color:red;'>"."<a href='trangcanhan.php'>".$_SESSION['user']."</a>"."</b>";
								echo "<br>"."<a href='delete-session.php'>"."<img src='hinh-anh/icons/logout.png' style='width:20px;height:20px; margin-left:10px;' title='Thoát' id='icon-logout'>"."</a>"."<br>";
							} else {
									?>
									<button class="login-buton"><img src="hinh-anh/icons/person.png" style="width: 35px;height: 35px;"></button>
									<div class="dropdown-login">
										<a href="dangnhap.php">Đăng nhập</a>
										<a href="dangki.php">Đăng kí</a>
									</div>	
								<?php } ?>
										
									

<!-- 					<p><b><a href="dn-dk.php">đăng kí</a></b></p> -->
				</div>
			</div>
			<div id="menu">
				<div>
					<ul>		
						<li><a href="index.php">trang chủ</a></li>
						<?php
$query="SELECT * FROM doan_chungloai";
$result=mysqli_query($link,$query);
$number=mysqli_num_rows($result);
for ($i=1; $i <=$number ; $i++) { 
	$d=mysqli_fetch_array($result);
	$tencl=$d['tenCL'];
	$macl=$d['maCL']; ?>
	<li>
		<a href="chungloai.php?key=<?php echo $macl ?>"><?php echo $d['tenCL']; ?> </a>
		<?php
			$que="SELECT * FROM doan_loai WHERE maCL =$macl";
			$re=mysqli_query($link,$que);
			?>
			<ul class="sub-menu">
			<?php while ($d1=mysqli_fetch_array($re)) { 
				$tenloai=$d1['tenLoai'];
				if ($tenloai!=$tencl) { ?>

					<li><a href="loai.php?key=<?php echo $d1['maLoai'] ?>"><?php echo $d1['tenLoai']; ?></a></li>
			<?php }} ?>
			</ul>
	</li>
<?php } ?>
						<li><a href="tincongnghe.php">Tin công nghệ</a></li>
					</ul>
				</div>
			</div>
		</div>
