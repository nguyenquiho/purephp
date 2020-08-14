<?php 
session_start();
if (isset($_SESSION['admin'])) {
	$admin=$_SESSION['admin'];
	include '../connect.php';
	include 'left.php';
	include 'top.php';
	$matin=$_GET['matin'];
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
	<span>Sửa bài viết</span>
</div>
<?php
$query=mysqli_query($link,"SELECT * FROM doan_tincongnghe WHERE maTin= $matin");
$d=mysqli_fetch_array($query);
?>
<center>
	<form action="" method="post" style="margin-top: 100px;">
	<table>
	
		<tr>
			<td nowrap="nowrap">Tiêu đề bài viết :</td>
			<td><input type="text" id="title" name="tieude" value="<?php echo $d['tieuDe']; ?>"></td>
		</tr>
		<tr>
			<td nowrap="nowrap">Nội dung :</td>
			<td><textarea name="noidung" id="noidung" rows="10" cols="150"><?php echo $d['noiDung']; ?> </textarea></td>
		</tr>
		<tr>
			<td nowrap="nowrap">Hiển thị ? :</td>
			<td>
				<select name="anHien">
					<option value="0">Không hiển thị</option>
					<option value="1">Hiển thị</option>
				</select>
			</td>
		</tr>
		<tr>
			<td colspan="2" align="center"><input type="submit" name="submit" value="Sửa"></td>
		</tr>
 
	</table>	
</form>
</center>

	<?php
	if (isset($_POST["submit"])) {
		//lấy thông tin từ các form bằng phương thức POST
		$tieude = $_POST["tieude"];
		$noidung = $_POST["noidung"];
		$anhien = $_POST["anHien"];
 
		$sql = "UPDATE doan_tincongnghe SET tieuDe='$tieude' ,noiDung='$noidung' ,anhien=$anhien WHERE maTin= $matin";
		// thực thi câu $sql với biến conn lấy từ file connection.php
		mysqli_query($link,$sql);
		if($sql){
			echo "<br><center><span style='color:#3270d3;'>Sửa bài viết thành công!</span><center>";
		}
		

	}
 
?>
<script>
    // Replace the <textarea id="editor1"> with a CKEditor
    // instance, using default configuration.
    CKEDITOR.replace( 'noidung' );
</script>
	
</body>
</html>
<?php } else header('location:../index.php'); ?>