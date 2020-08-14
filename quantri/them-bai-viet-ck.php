<?php 
session_start();
if (isset($_SESSION['admin'])) {
	$admin=$_SESSION['admin'];
	include '../connect.php';
	include 'left.php';
	include 'top.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
<script src="ckeditor/ckeditor.js"></script>
</head>
<body>

 <div style="border-bottom: 1px solid black">
	<h3 style="margin-top: 25px;">Tin công nghệ</h3>
	<span>Thêm bài viết mới</span>
</div>
<center>
	<form action="" method="post" style="margin-top: 100px;">
	<table>
	
		<tr>
			<td nowrap="nowrap">Tiêu đề bài viết :</td>
			<td><input type="text" id="title" name="tieude"></td>
		</tr>
		<tr>
			<td> Hình ảnh :</td>
			<td><input type="url" name="hinhanh"></td>
		</tr>
		<tr>
			<td nowrap="nowrap">Nội dung :</td>
			<td><textarea name="noidung" id="noidung" rows="10" cols="150"></textarea></td>
		</tr>
		<tr>
			<td nowrap="nowrap">Hiển thị ? :</td>
			<td><input type="checkbox" id="is_public" name="anHien" value="1"> Hiển thị</td>
		</tr>
		<tr>
			<td colspan="2" align="center"><input type="submit" name="submit" value="Thêm bài viết"></td>
		</tr>
 
	</table>	
</form>
<?php
	if (isset($_POST["submit"])) {
		//lấy thông tin từ các form bằng phương thức POST
		$tieude = $_POST["tieude"];
		$noidung = $_POST["noidung"];
		$anHien = 0;
		$hinhanh=$_POST['hinhanh'];
		if (isset($_POST["anHien"])) {
			$anHien = $_POST["anHien"];
		}
		
 
		$sql = "INSERT INTO doan_tincongnghe(tieuDe,hinhAnh, noiDung, nguoiDang,ngayDang, anHien ) VALUES ( '$tieude','$hinhanh', '$noidung', '$admin', now(), '$anHien')";
		// thực thi câu $sql với biến conn lấy từ file connection.php
		mysqli_query($link,$sql);
		if($sql){
			echo "<br><span style='color:#3270d3;'>Thêm bài viết thành công!</span>";
		}
		

	}
 
?>
</center>

	
<script>
    // Replace the <textarea id="editor1"> with a CKEditor
    // instance, using default configuration.
    CKEDITOR.replace( 'noidung' );
</script>
	
</body>
</html>
<?php } else header('location:../index.php'); ?>