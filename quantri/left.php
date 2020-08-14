<?php 
if (isset($_SESSION['admin'])) {
	$admin=$_SESSION['admin'];
}
?>
<!DOCTYPE html>
	<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Trang quản trị</title>
		<style type="text/css">
			*{
				margin: 0px;
				padding: 0px;
			}
			#container-box{
				font-family: Arial,San-serif;
				font-weight: lighter;
				min-height: 100px;
			}
			#left{
			width: 14%;
			background-color: DarkSlateGray;
			color: white;
			float: left;
			min-height: 650px
			}
			#top{
				height: 35px;
				width:85%;
				background-color: DarkSlateGray;
				float: left;
				border-left: 1px solid white;
				font-size: 20px;
				color: white;
				text-align: center;
				line-height: 35px;
			}
			#top-left{
				width: 100%;
				height: 100px;
				float: left;
				border-bottom: 1px solid white;
			}
			#menu{
				font-size: 12px;
			}
			ul li {
				border-right: none;
				padding-left: 15px;
				width: 90%;
				height: 30px;
				line-height: 30px;
			}
			ul li:hover{
				background-color: grey;
				cursor: pointer;
			}
			ul li:active{
				background-color: red;
			}
			ul  a {
				color: white;
				text-decoration: none;
			}
			#mid{
				background-color: white;
				float: right;
				width: 85%;
				border-left: 1px solid white;
				font-family: Roboto,San-serif;
			}
		</style>
	</head>
	<body>
		<div id="container-box">
			<div id="left">
				<div id="top-left">
					Xin chào <?php echo $admin; ?>
					<br>
					<a href="../delete-session.php" style="color: red">Đăng xuất</a>
				</div>
				&nbsp
				<ul id="menu">
						<a href="admin.php"><li>TRANG CHỦ</li></a>
						<a href="show-chungloai.php"><li>▢ CHỦNG LOẠI</li></a>
						<a href="show-loai.php"><li>⊟ LOẠI</li></a>
						<a href="show-sp.php"><li>⊞ SẢN PHẨM</li></a>
						<a href="show-spmoi.php"><li style="color: lightgrey">Sản phẩm mới</li></a>
						<a href="show-spkm.php"><li style="color: lightgrey">Sản phẩm khuyến mãi</li></a>
						<a href="show-spbc.php"><li style="color: lightgrey">Sản phẩm bán chạy</li></a>
						<a href="show-pkgt.php"><li style="color: lightgrey">Phụ kiện giá tốt</li></a>
						<a href="show-tincongnghe.php"><li>☑ TIN CÔNG NGHÊ</li></a>
						<a href="show-nguoidung.php"><li>웃 NGƯỜI DÙNG</li></a>
						<a href="show-donhang.php"><li>❏ ĐƠN HÀNG</li></a>
						
					</ul>
			</div>