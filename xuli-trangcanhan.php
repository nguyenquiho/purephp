<?php
session_start();
include 'connect.php';
if (isset($_SESSION['user'])) {
	$user=$_SESSION['user'];
	$id=$_SESSION['id'];
	$action=$_GET['action'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>
		<?php
			if ($action=="fix-infor") {
				echo "Chỉnh sửa thông tin cá nhân";
			}
			elseif ($action=="change-pass") {
				echo "Đổi mật khẩu";
			}
			elseif ($action=="change-avt") {
				echo "Đổi ảnh đại diện";
			}
		?>		
	</title>
</head>
<style type="text/css">
		*{
		margin: 0px;
		padding: 0px;
	}
	#btn-home{
		background-color: green; 
		border: none;
		outline: none; 
		padding: 10px; 
		color: white; 
		border-radius: 10px;
	}
	#btn-home:hover{
		cursor: pointer;
		opacity: 0.9;
	}
	#btn-logout:hover{
		cursor: pointer;
		opacity: 0.9;
	}

	#btn-logout{
		background-color: red; 
		border: none;
		outline: none; 
		padding: 10px; 
		color: white; 
		border-radius: 10px;
	}
	ul li{
		text-align: left;
		padding-left: 50px;
		list-style-type: none;
		height: 30px;
		line-height: 30px;
		color: grey;
	}
	ul li:hover{
		background: lightblue;
		cursor: pointer;
	}
	a{
		text-decoration: none;
	}
</style>
<body style="color: black;text-align: center;background-color: black; font-family: Roboto ,San-serif">
	<?php
	$sql=mysqli_query($link,"SELECT * FROM doan_nguoidung WHERE id=$id");
	$avt=mysqli_fetch_array($sql);
?>
	<div id="container">
	<div style="width:1200px; height: 80px; background-color: white; margin: 0px auto;">
		<a href="index.php" style="text-decoration: none;">
			<img src="hinh-anh/icons/logo.png" style="float: left;height: 80px; width: 300px;">
		</a>
<!-- 		<div style="width: 80px; height: 80px;float: right;"><a href="index.php" title="Trang chủ"><img src="hinh-anh/icons/home.png" width="80px" height="80px" ></a></div> -->
	</div>
	<div style="background:#3270d3; font-weight: bold;height: 40px; width: 1200px;margin: 0px auto; color: white;font-size: 30px;line-height: 40px;">Xin chào <span style="text-transform: uppercase;"><?php echo $user ; ?></span></div>
		
	</div>
	<div style="background: white; width: 1200px;min-height: 550px; margin: 0px auto">
		<div style="background-color: white; width: 300px;min-height: 500px;float: left;border-right: 20px lightgrey solid;">
			<div id="pícture" style="width: 300px; height: 300px; background-color: white;">
				<img src="<?php echo $avt['hinhAnh']; ?>" width="250" height="280" style="margin-top: 5px;"><br>
				<span style="color: #3270d3"><span style="text-transform: uppercase;"><?php echo $user; ?></span></span>
			</div><br>
			<a href="index.php"><button id="btn-home">TRANG CHỦ</button></a>&nbsp &nbsp
			<a href="delete-session.php"><button id="btn-logout"> ĐĂNG XUẤT</button></a>
			<br>
			<ul>
				<br><br>
				<li>⬜ Quản lí đơn hàng</li> 
				<a href="xuli-trangcanhan.php?action=change-avt">
					<li>☆ Đổi ảnh đại diện</li>	
				</a>
				<a href="xuli-trangcanhan.php?action=fix-infor">
					<li>✡ Chỉnh sửa thông tin cá nhân</li>	
				</a>
				<a href="xuli-trangcanhan.php?action=change-pass">
					<li>☪ Đổi mật khẩu</li>
				</a>							
			</ul>  
		</div>
		<?php
			if ($action=="change-avt") {// Đổi ảnh đại diện
				echo "<br><h2 style='text-align:left; color:#3270d3;margin-left:20px;'>Đổi ảnh đại diện</h2><br>"; ?>
				<form method="post" enctype="multipart/form-data" style="float: left;">
					&nbsp Upload Avatar: <input type="file" name="fileUpload" id="fileUpload"><br><br>
					<input type="submit" name="submit" value="Upload"><br>
				</form>
				<?php 
				if (isset($_POST['submit'])) {
				// echo "<pre>";
				// print_r($_FILES);
				// echo "</pre>";
				$error=array(); // Khai báo mảng lỗi. để sau kiểm tra nếu mảng rỗng mới OK
				// Bước 1: tạo folder upload avetar để chứa ảnh
				$target_dir="upload_avt/";
				$target_file= $target_dir.basename($_FILES['fileUpload']['name']); // Lấy target nối với tên file cần upload

				// Bước 2: Kiểm tra điều kiện file
				// 
				// 1: Ktra kích thước file
					if ($_FILES['fileUpload']['size']>5242880) {
					$error['fileUpload']="Chỉ được upload file dưới 5MB !";
				}
				// 2: Kiểm tra đuôi(loại) file (png ,jpeg,jpg,gif)
				$file_type=pathinfo($_FILES['fileUpload']['name'], PATHINFO_EXTENSION);// Lấy đuôi file
				// echo $file_type;
				$file_type_allow= array('png','jpg','jpeg','gif'); //Lưu đuôi file cho phép upload vào 1 mảng để ktra
					if (!in_array(strtolower($file_type), $file_type_allow)) {// Kiểm tra đuôi file có là 1 trong số dạng file cho phép hay k,( tham số T!: đuôi file upload------- Tham số T2: Mảng cho phép)
					$error['fileUpload']='Chỉ cho phép upload file ảnh!';
				}
				
				// 3: Kiểm tra sự tồn tại của file
					if (file_exists($target_file)) {
					$error['fileUpload']="File đã tồn tại!";
				}

				// Bước 3: Kiểm tra và chuyển file từ bộ nhớ tạm lên SEVER
					if (empty($error)) {
					if (move_uploaded_file($_FILES['fileUpload']['tmp_name'], $target_file)) {
							
							$flag=true;
						}
				}	else echo "<span style='color:red'>".$error['fileUpload']."</span>";

			}
				if (isset($flag)) {// Nếu upload thành công
				// echo $target_file;
				// echo $user;
				$_SESSION['target_file']=$target_file;
				$insert=mysqli_query($link,"UPDATE doan_nguoidung SET hinhAnh='$target_file' WHERE id= $id");
				if ($insert) {
					echo "<span style='color:#3270d3'> Upload thành công!</span>";
				}
			}
		 }elseif ($action=="fix-infor") {// Hành động chỉnh sửa thông tin cá nhân 
				echo "<br><h2 style='text-align:left; color:#3270d3;margin-left:20px;'>Chỉnh sửa thông tin cá nhân</h2><br>"; ?>
				<form method="post"  style="float: left;">
					&nbsp Họ tên: <input type="text" name="hoten" placeholder="Nhập họ tên mới"><br><br>
					<input type="submit" name="submit" value="Cập nhật"><br>
				</form>
				<?php
					if (isset($_POST['submit'])) {
						if (!empty($_POST['hoten'])) {
							$hoten=$_POST['hoten'];
							$update=mysqli_query($link,"UPDATE doan_nguoidung SET hoTen='$hoten' WHERE id= $id");
							if ($update) {
								echo "<span style='color:#3270d3'> Cập nhật thành công!</span>";
							}
						}
					}
		}elseif ($action=="change-pass") {// Hành động đổi mật khẩu
				echo "<br><h2 style='text-align:left; color:#3270d3;margin-left:20px;'>Đổi mật khẩu</h2><br>"; ?>
				<form method="post"  style="float: left;">
					&nbsp Mật khẩu mới: <input type="text" name="matkhau" placeholder="Nhập mật khẩu mới"><br><br>
					&nbsp Xác nhận lại mật khẩu: <input type="text" name="matkhau2" placeholder="Nhập mật lại khẩu"><br><br>
					<input type="submit" name="submit" value="Đổi mật khẩu"><br>
				</form>
				<?php
					if (isset($_POST['submit'])) {
						if (!empty($_POST['matkhau'])&&!empty($_POST['matkhau2'])) {
							$matkhau=$_POST['matkhau'];
							if ($_POST['matkhau']==$_POST['matkhau2']) {
								$update=mysqli_query($link,"UPDATE doan_nguoidung SET matKhau='$matkhau' WHERE id= $id");
								if ($update) {
								echo "<span style='color:#3270d3'> Đổi mật khẩu thành công!</span>";
							}
							}else echo "<span style='color:#eb0000'> Mật khẩu không trùng khớp!</span>";
							
						}else echo "<span style='color:#eb0000'> Vui lòng không để trống!</span>";
					}
		}?>
	</div>

	<div style="background-color: #3270d3; width: 1200px; margin: 0px auto;">
	<?php include 'footer.php'; ?>
	</div>
</div>
</body>
</html>

<?php } ?>