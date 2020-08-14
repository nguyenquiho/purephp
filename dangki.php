<?php
session_start();
if (isset($_SESSION['cap_code'])) {
	$cap=$_SESSION['cap_code'];
}
include 'connect.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Đăng kí</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<style type="text/css">
		tr td input{
			width: 400px;
			height: 35px;
		}
	</style>
</head>
<body>
	<?php
		include 'header.php';
	?>
	<div id="content" style="width: 1200px; height: 480px;background-color: white" align="center">
		<form method="post" action="#" name="form-dk" style="width: 500px;height: 280px;background-color: #3270d3;margin-top: 100px;">
				<table style="width: 500px;height: 280px;">
					<tr>
						<td align="center" style="background-color: orange" colspan="2"><span style="color: #ffff;font-size: 20px;">THÔNG TIN ĐĂNG KÍ<span></td>
					</tr>
					<tr style="border-color: white">
						<td align="center" colspan="2"><input type="text" name="name" placeholder=" Họ và tên "></td>
					</tr>

					<tr style="border-color: white">
						<td align="center" colspan="2"><input type="text" name="user" placeholder=" Tên đăng nhập"></td>
					</tr>

					<tr>
						<td align="center" colspan="2"><input type="password" name="pass" placeholder=" Mật khẩu"></td>
					</tr>

					<tr>
						<td align="center" colspan="2"><input type="password" name="pass2" placeholder=" Nhập lại mật khẩu"></td>
					</tr>
					<tr style="width: 50px;">
						<td style="text-align: right;"><img src="captcha_code.php"></td>
						<td style="margin-right: 50px;"><input type="text" name="captcha" id="captcha" style="height: 30px;width: 215px;margin-top: 0px;" placeholder="Nhập mã captcha"></td>
						
					</tr>
					<tr>
						<td align="center" colspan="2"><button type="submit" style="border-color: white;width: 100px;height: 40px;font-size: 15px;" name="sign-up">Đăng kí</button></td>
					</tr>
				</table>	
		</form>
		<?php
			if (isset($_POST['sign-up'])) {
				if (empty($_POST['name']) or empty($_POST['user']) or empty($_POST['pass'])) {
					echo "<span style='color:red;'>"."Vui lòng không để trống!"."</span>";
				}
				else{
					if ($_POST['pass'] != $_POST['pass2']) {
						echo "<span style='color:red;'>"."Mật khẩu không trùng khớp! Vui lòng thử lại!"."</span>";
					}
					else{
						$name=$_POST['name']; 
						$user=$_POST['user'];
						$pass=$_POST['pass'];
						if (strlen($pass)<8) {
							echo "<span style='color:red;'>"."Mật khẩu dài ít nhất 8 kí tự, vui lòng nhập dài hơn!"."</span>";
						}
						else{
							
							$query="SELECT * FROM doan_nguoidung WHERE tenDangNhap='$user'";
							$result=mysqli_query($link,$query);
							$num=mysqli_num_rows($result);
							if ($num==1) {
								echo "<span style='color:red;'>"."Tên đăng nhập đã tồn tại, vui lòng đặt tên khác!"."</span>";
							}
							else{
								if ($cap==$_POST['captcha']) {
									$query1="INSERT INTO doan_nguoidung(hoTen,tenDangNhap,matKhau) VALUES ('$name','$user','$pass')";
								$insert=mysqli_query($link,$query1);
								if ($insert) {
									echo "<span style='color:#3270d3;'>"."Đăng kí thành công!"."</span>";
								}
								else{
								echo "<span style='color:red;'>"."Đăng kí không thành công, hãy thử lại!"."</span>";
								}

								}else echo "<span style='color:red;'>"."Sai mã captcha, hãy thử lại!"."</span>";
								
							}
						}
					}
				}
			}
		?>	
	</div>
	<?php
		include 'footer.php';
	?>
</body>
</html>