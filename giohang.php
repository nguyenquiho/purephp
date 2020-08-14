<?php
session_start();
if (isset($_SESSION['user'])) {
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Giỏ hàng</title>
</head>
<style type="text/css">
	td input[type=submit]:hover{
		cursor: pointer;
		opacity: .8;
	}
	td input[type=button]:hover{
		cursor: pointer;
		opacity: .8;
	}	
	form input[type=submit]:hover{
		cursor: pointer;
		opacity: .8;
	}	

</style>
<body >
	<div id="container" style="font-family: roboto, san-serif">
	<?php include 'header.php'; ?>
	<?php
	include 'connect.php';
	if (isset($_SESSION['giohang'])) {
			// Xử lý cập nhật giỏ hàng
		$giohang= $_SESSION['giohang'];
		//Nếu người dùng cập nhật lại giỏ hàng( Nhấn nút cập nhật)
		if (isset($_POST['capnhat'])&& count($giohang)!= "") {
			$soluong_cn= $_POST['soluong'];
			foreach ($soluong_cn as $masp => $sl) {
				//nếu như người dùng đặt lại = 0 -> ta huỷ luôn sp đó trong giỏ hàng
				if ($sl <= 0) {
					unset($_SESSION['giohang'][$masp]);
				}

				// Ngược lại ta cập nhật lại số lượng trong giỏ hàng
				else if ($sl >0  && is_numeric($sl)) {
					$_SESSION['giohang'][$masp]= $sl;
				}
				//refresh lại giỏ hàng
				header('location:giohang.php');
			}
		}
		?>
		<div id="content" align="center" style="min-height: 500px; margin: 0px auto; ">
			<form action="" method="post" style="margin-top: 20px;">
				<table border="1px solid" style="border: white;border-collapse: collapse;" align="center" bgcolor="lightblue">
					<tr>
						<th colspan="7" style="color: white; font-size: 20px;background-color: #3366FF">Giỏ Hàng Của Bạn</th>
					</tr>
					<tr style="color: red;">
						<th>STT</th>
						<th>Tên Sản Phẩm</th>
						<th>Hình Ảnh</th>
						<th>Số Lượng</th>
						<th>Đơn Giá</th>
						<th>Thành Tiền</th>
						<th> &nbsp</th>
					</tr>
					<?php
					include 'connect.php';
			//duyet qua gio hang
					$tongcong=0;
					$stt=1;
					foreach ($giohang as $masp => $sl) {
				// lấy thông tin sản phẩm
						$result=mysqli_query($link, "SELECT * FROM doan_sp WHERE maSP in ('$masp')");
						$d=mysqli_fetch_array($result);
						?>
						<tr>
							<th><?php echo $stt; ?></th>
							<th><?php echo $d['tenSP']; ?></th>
							<th><img width="50" height="50" src="<?php echo $d['hinhAnh']; ?>"></th>
							<th><input min="0" type="number" name="soluong[<?php echo $masp; ?>]" size="4"value="<?php echo $sl; ?>" ></th>
							<th><?php echo number_format($d['giaSP']); ?> .VNĐ</th>
							<th><?php echo number_format($sl*$d['giaSP']); ?> .VNĐ</th>

							<th><a onclick="return confirm('Bạn có chắc chắn xóa không ?')" href="xoasp.php?masp=<?php echo $masp ?>"style="color: red;" >Xoá</a></th>
							
						</tr>
						<?php  
				// Tổng tiền
						$tongcong+= $sl* $d['giaSP'];
						$stt++;
					} 	
					?>
					<tr>
						<td colspan="6" align="right" style="color: red">Tổng cộng: <?php echo number_format($tongcong)." VNĐ"; ?></td>
					</tr>
					<tr>
						<td colspan="7" align="center" bgcolor="white"><input type="submit" name="capnhat" value="Cập Nhật" style="padding: 10px; width: 100px;background-color:#3366ff; outline: none; border: none; border-radius: 10px;color: white ">&nbsp<input type="submit" name="dathang" value="Đặt Hàng" style="padding: 10px; width: 100px;background-color:#eb0000; outline: none; border: none; border-radius: 10px;color: white">&nbsp<input type="button" name="muathem" onclick="window.location='index.php'" value="Mua Thêm" style="padding: 10px; width: 100px;background-color:#3366ff; outline: none; border: none; border-radius: 10px;color: white"></td>
					</tr>
				</table>
			</form>
			<?php
			if (isset($_POST['dathang'])) { ?>
				<form method="post">
					<div align="center" style=" width: 500px; background-color: white;">
					<span style="color: #3270d3">Họ tên: </span><input type="text" name="tenkh"  placeholder="Nhập họ tên" style="margin-top: 20px; width: 300px; height: 30px;border: 1px solid #3270d3;padding-left: 20px;border-radius: 10px;color: #3270d3"><br><br>
					<span style="margin-left: -54px;color: #3270d3 ">Số Điện Thoại: </span><input type="text" name="sdt" placeholder="Nhập số điện thoại" style="width: 300px;height: 30px;border: 1px solid #3270d3;;border-radius: 10px;color: #3270d3;padding-left: 20px;"><br><br>
					<span style="margin-left: -5px;color: #3270d3;">Địa Chỉ: </span><input type="text" name="diachi" placeholder="Nhập địa chỉ" style="width: 300px;height: 30px;border: 1px solid #3270d3;border-radius: 10px;color: #3270d3;padding-left: 20px;"><br><br>
					</div>
					
					<input type="submit" name="dongy" value="Đồng ý" align="center" style=" width: 100px; height: 45px; border: 1px solid #3270d3; border-radius: 5px; background-color:#3270d3;color: white ;"><br>
				</form>

					<?php }
						if (isset($_POST['dongy'])) {
							if (empty($_POST['tenkh']) or empty($_POST['sdt']) or empty($_POST['diachi'])  ) {
								echo "<script type=\"text/javascript\">
				alert('Vui lòng không để trống!');
				</script>";
							}
							else
							{	
								$user=$_SESSION['user'];
								$tenkh=$_POST['tenkh']; 	
								$sdt=$_POST['sdt'];
								$diachi=$_POST['diachi'];
								date_default_timezone_set('Asia/Ho_Chi_Minh');
								$time= date('Y-m-d H:i:s');
								$tt= 0;
								$result=mysqli_query($link, "INSERT INTO doan_donhang(tenKH,tenDangNhap,tongCong,ngayMua,diaChi,sdt,trangThai,anHien) VALUES ('$tenkh','$user','$tongcong','$time','$diachi','$sdt','$tt','1')");

								$result1=mysqli_query($link, "SELECT maDH FROM doan_donhang");
								while ($d=mysqli_fetch_array($result1)) {
									$madh=$d['maDH'];
								}
						foreach ($giohang as $masp => $sl) {
						$kq=mysqli_query($link, "SELECT * FROM doan_sp WHERE maSP in ('$masp')");
						$d1=mysqli_fetch_array($kq);
						$slhientai= $d1['SL'];
						$masp=$d1['maSP'];
						$tensp=$d1['tenSP'];
						$giasp=($d1['giaSP']);
						$thanhtien=($sl*$d1['giaSP']);
						
						
						$newsl=$slhientai-$sl;
						$sql = mysqli_query($link,"UPDATE doan_sp SET SL=$newsl WHERE maSP=$masp");


						// $query="INSERT INTO doan_chitietdh(maDH,tenDangNhap,tenKH,maSP,tenSP,SL,giaSP,thanhTien,diaChi,sdt,ngayMua,trangThai) VALUES ('$madh',$user','$tenkh','$masp',$tensp','$sl','$giasp','$thanhtien',$diachi','$sdt','$time','$tt')";	
						// $insert=mysqli_query($link,$query);
						// $insert=mysqli_query($link,"INSERT INTO doan_chitietdh(maDH,tenDangNhap,tenKH,maSP,tenSP,SL,giaSP,thanhTien,diaChi,sdt,ngayMua,trangThai) VALUES ('$madh',$user','$tenkh','$masp',$tensp','$sl','$giasp','$thanhtien',$diachi','$sdt','$time','$tt')");
						$insert=mysqli_query($link, "INSERT INTO doan_chitiethoadon(maDH,tenDangNhap,maSP,tenSP,SL,giaSP,thanhTien) VALUES ('$madh','$user','$masp','$tensp','$sl','$giasp','$thanhtien')");

					// 	//
					// 	//
					// 	echo $madh."-";
					// 	echo $tenkh."-";
					// 	echo $user."-";
					// 	echo $masp."-";
					// 	echo $tensp."-";
					// 	echo $giasp."-";
					// 	echo $sl."-";
					// 	echo $thanhtien."-";
					// 	echo $diachi."-";
					// 	echo $sdt."-";
					// 	echo $time."-";
					// 	echo $tongcong."-";
					// 	echo $tt."///";
					}
						if ($insert) {
									echo "<br><span style='color:#3270d3;'>"."Đặt hàng thành công!"."</span>";
									unset($_SESSION['giohang']);
									}
									else echo "<br><span style='color:red;'>Đặt hàng không thành công!</span>";




									 // echo mysqli_error();
										
						
		
					///////
					
					// echo $user;
					// echo $tenkh;
					// echo $noidung."<br>";
					// echo $tongcong= "Tổng cộng: ".number_format($tongcong)."VNĐ";
							}
						} 
					?>
					<?php
					
					?>

			<?php } else {?> 
				<div id='content' style='height:480px;'><br><h3 style="color: red;margin-left: 20px;"> Giỏ hàng chưa có sản phẩm!</h3>
				</div> <?php } ?>
		</div>
		<div id="footer" style="width: 1200px; margin-left: 0px;">
			<?php
			include 'footer.php';
			?>
		</div>
		</div>


</body>
</html>
<?php } 
else{

header('location:dangnhap.php');
}
?>