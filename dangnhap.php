<?php
session_start();
if (isset($_SESSION['user'])) {
	header('location:index.php');
}
if (isset($_SESSION['admin'])) {
	header('location:../quantri/admin.php');
}
if (isset($_SESSION['cap_code'])) {
	$cap=$_SESSION['cap_code'];
}
include 'connect.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Đăng nhập</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<?php
		include 'header.php';
	?>
	<div id="content" style="width: 1200px; height: 480px;background-color: white" align="center">
		<form method="post" action="#" name="form-dn" style="width: 500px;height: 250px;background-color: #3270d3;margin-top: 100px;">
				<table style="width: 500px;height: 250px;" style="border: 1px solid white;border-radius: 25px 25px 25px 25px;">
					<tr>
						<td colspan="2" align="center" style="background-color: orange"><span style="color: #fff;font-size: 20px;">THÔNG TIN ĐĂNG NHẬP<span></td>
					</tr>
					<tr style="border-color: white">
						<td align="center"><label style="color: white;font-size: 20px;font-weight: lighter;">Tên đăng nhập: </label></td>
						<td><input type="text" name="user" style="width: 300px;height: 35px;"></td>
					</tr>
					<tr>
						<td align="center"><label style="color: white;font-size: 20px;font-weight: lighter;">Mật khẩu: </label></td>
						<td><input type="password" name="pass" style="width: 300px;height: 35px;"></td>
					</tr>
					<tr style="width: 50px;">
						<td style="text-align: right;"><img src="captcha_code.php"></td>
						<td style="margin-right: 50px;"><input type="text" name="captcha" id="captcha" style="height: 30px;width: 300px;margin-top: 0px;" placeholder="Nhập mã captcha"></td>
						
					</tr>
					<tr>
						<td colspan="2" align="center"><button type="submit" style="border-color: white;width: 100px;height: 40px;font-size: 15px;" name="login">Đăng nhập</button></td>
					</tr>
				</table>	
		</form>
		<?php if (isset($_POST['login']))
		{
			if (empty($_POST['user']) or empty($_POST['pass'])or empty($_POST['captcha'])) {
				echo "<span style='color: red;'>"."Vui lòng không để trống!"."</span>";
			}
			else{

				$user=$_POST['user'];
				$pass=$_POST['pass'];
				$query="SELECT * FROM doan_nguoidung WHERE tenDangNhap='$user' AND matKhau='$pass'";
				$result=mysqli_query($link,$query);
				$num=mysqli_num_rows($result);
				if ($num==1) {
					if ($cap==$_POST['captcha']) {
						$d=mysqli_fetch_array($result);
						$id=$d['id'];
						$_SESSION['id']=$id;
						$_SESSION['user']=$user;
					// $_SESSION['pass']=$pass;
					// header('location:index.php');
					echo "<META http-equiv=\"refresh\" content=0;URL=index.php>";	
					}
					else echo "<span style='color: red;'>"."Sai mã captcha. Vui lòng thử lại!"."</span>";
				}
				else if ($num==0) {
					$que="SELECT * FROM doan_admin WHERE tenDangNhap='$user' AND matKhau='$pass'";
					$res=mysqli_query($link,$que);
					$n=mysqli_num_rows($res);
					if ($n==1) {
						
						if ($cap==$_POST['captcha']) {
							$_SESSION['admin']=$_POST['user'];
						echo "<META http-equiv=\"refresh\"content=0;URL=http://localhost:8080/do-an/quantri/admin.php>";
						}
						else echo "<span style='color: red;'>"."Sai mã captcha. Vui lòng thử lại!"."</span>";
					}
					else{
						echo "<span style='color: red;'>"."Sai tên đăng nhập hoặc Mật khẩu! Vui lòng thử lại!"."</span>";
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