<?php
session_start();
if (isset($_SESSION['admin'])) {
	include 'left.php';
	include 'top.php';
	include '../connect.php';
	?>

<div id="mid">
<?php
$key=$_GET['key'];
if ($key=="chungloai") {
	$macl=$_GET['macl'];
	$query=mysqli_query($link,"SELECT maLoai FROM doan_loai WHERE maCL=$macl");
	while ($d=mysqli_fetch_array($query))
	{
		$maloai=$d['maLoai'];
		$del=mysqli_query($link,"DELETE FROM doan_sp WHERE maLoai=$maloai");
	}
	$del2=mysqli_query($link,"DELETE FROM doan_loai WHERE maCL=$macl");
	$del3=mysqli_query($link,"DELETE FROM doan_chungloai WHERE maCL=$macl");
	header('location:show-chungloai.php');	
}
elseif ($key=="loai") {
	$maloai=$_GET['maloai'];
	$del=mysqli_query($link,"DELETE FROM doan_sp WHERE maLoai=$maloai");
	$del2=mysqli_query($link,"DELETE FROM doan_loai WHERE maLoai=$maloai");
	header('location:show-loai.php');
}  
elseif ($key=="sanpham") {
	$masp=$_GET['masp'];
	$del=mysqli_query($link,"DELETE FROM doan_sp WHERE maSP=$masp");
	header('location:show-sp.php');
}
elseif ($key=="donhang") {
	$madh=$_GET['madh'];
	echo $madh;
}
elseif ($key=="nguoidung") {
	$id=$_GET['id'];
	$del=mysqli_query($link,"DELETE FROM doan_nguoidung WHERE id=$id");
	header('location:show-nguoidung.php');
}
?>

</div>

	<?php include 'bottom.php'; } else header('location:../index.php'); ?>