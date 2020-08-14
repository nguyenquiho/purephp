<?php
session_start();
if (isset($_SESSION['admin'])) {
	include 'left.php';
	include 'top.php';
	include '../connect.php';
	?>

<div id="mid">
	<!-- \Showw nguoi dung -->
	<?php
	$result=mysqli_query($link,"SELECT * FROM doan_donhang");
			$num=mysqli_num_rows($result);
			?>
			<div style="border-bottom: 1px solid black">
				<h3 style="margin-top: 25px;">Đơn hàng</h3>
				<span>Quản lí đơn hàng(<?php echo "$num"; ?>)</span>
			</div>
			<div>
				<table border="1px" style="width: 98%; border-collapse: collapse;margin-top: 20px;border: white;">
					<tr>
						<th colspan="3" bgcolor="DarkSlateGray" style="color: white" align="left" height="30">Danh sách đơn hàng </th>
						<th colspan="2" bgcolor="DarkSlateGray" style="color: white" align="left" height="30">
							<form method="post">
								<select name="loc">
									<option value="-1">Tất cả</option>
									<option value="0">Đang xử lí</option>
									<option value="1">Đang giao</option>
									<option value="2">Đã giao</option>
								</select>
								<input type="submit" name="submit" value="Lọc">
							</form>
						</th>
					</tr>
					<?php
						if (isset($_POST['submit'])) {
							$loc=$_POST['loc'];
							if ($loc==0) { // Lọc đơn ahfng đang xử lí
								$result=mysqli_query($link,"SELECT * FROM doan_donhang WHERE trangThai=0");?>
					<tr bgcolor="lightgrey">
						<th>STT</th>
						<th>Mã đơn hàng</th>
						<th>Chi tiết</th>
						<th>Trạng thái</th>
						<th>Hành động</th>

					</tr>
					<?php
					$stt=1;
					while ($d=mysqli_fetch_array($result)) { ?>
					<tr bgcolor="lightblue" style="height: 100px;">
						<th><?php echo $stt; ?></th>
						<th><?php echo $d['maDH']; ?></th>
						<?php
							$madh=$d['maDH'];
							$query=mysqli_query($link,"SELECT * FROM doan_chitiethoadon WHERE maDH=$madh");
							
						?>
						<td style="font-weight: bold; font-size: 14px;">
						<p style="color: green;">
						<?php
						echo "Tên khách hàng: ".$d['tenKH']."<br>";
						echo "Địa chỉ: ".$d['diaChi']."<br>";
						echo "Số điện thoại: ".$d['sdt']."<br>";
						echo "Ngày mua: ".$d['ngayMua']."<br>"."</p>";

						while ($chitiet=mysqli_fetch_array($query)) {
							
							echo "Mã sản phẩm: ".$chitiet['maSP'];
							echo "--Tên sản phẩm: ".$chitiet['tenSP'];
							echo "--Số lượng : ".$chitiet['SL'];
							echo "--Giá : ".number_format($chitiet['giaSP'])." .VNĐ";
							echo "--Thành tiền : ".number_format($chitiet['thanhTien'])." .VNĐ<br>";
						}?>	
							<span style='color:red'>Tổng cộng: <?php echo number_format($d['tongCong']); ?> .VNĐ</span>

						</td>
						<th><?php if ($d['trangThai']==0) { // Lọc đơn hàng đang xử lí
							echo "<span style='color:#eb0000;'>Đang xử lí</span>";
						}
						elseif ($d['trangThai']==1) {
						  	echo "<span style='color:darkorange;'>Đang giao</span>";
						  }
						  elseif ($d['trangThai']==2) {
						  	echo "<span style='color:green;'>Đã giao</span>";
						  }  ?></th>
						<th><a onclick="return confirm('Bạn có chắc chắn xóa không ?')" href="delete.php?key=donhang&madh=<?php echo $d['maDH']; ?>">Xoá</a>&nbsp &nbsp<a href="update.php?key=donhang&madh=<?php echo $d['maDH']; ?>">Sửa</a></th>
					</tr>
					<?php $stt++;
							} }

							// hết trường hợp đang xử lí
							else if($loc==1) { // Lọc đơn hàng đang giao
								$result=mysqli_query($link,"SELECT * FROM doan_donhang WHERE trangThai=1");?>
					<tr bgcolor="lightgrey">
						<th>STT</th>
						<th>Mã đơn hàng</th>
						<th>Chi tiết</th>
						<th>Trạng thái</th>
						<th>Hành động</th>

					</tr>
					<?php
					$stt=1;
					while ($d=mysqli_fetch_array($result)) { ?>
					<tr bgcolor="lightblue" style="height: 100px;">
						<th><?php echo $stt; ?></th>
						<th><?php echo $d['maDH']; ?></th>
						<?php
							$madh=$d['maDH'];
							$query=mysqli_query($link,"SELECT * FROM doan_chitiethoadon WHERE maDH=$madh");
							
						?>
						<td style="font-weight: bold; font-size: 14px;">
						<p style="color: green;">
						<?php
						echo "Tên khách hàng: ".$d['tenKH']."<br>";
						echo "Địa chỉ: ".$d['diaChi']."<br>";
						echo "Số điện thoại: ".$d['sdt']."<br>";
						echo "Ngày mua: ".$d['ngayMua']."<br>"."</p>";

						while ($chitiet=mysqli_fetch_array($query)) {
							
							echo "Mã sản phẩm: ".$chitiet['maSP'];
							echo "--Tên sản phẩm: ".$chitiet['tenSP'];
							echo "--Số lượng : ".$chitiet['SL'];
							echo "--Giá : ".number_format($chitiet['giaSP'])." .VNĐ";
							echo "--Thành tiền : ".number_format($chitiet['thanhTien'])." .VNĐ<br>";
						}?>	
							<span style='color:red'>Tổng cộng: <?php echo number_format($d['tongCong']); ?> .VNĐ</span>

						</td>
						<th><?php if ($d['trangThai']==0) {
							echo "<span style='color:#eb0000;'>Đang xử lí</span>";
						}
						elseif ($d['trangThai']==1) {
						  	echo "<span style='color:darkorange;'>Đang giao</span>";
						  }
						  elseif ($d['trangThai']==2) {
						  	echo "<span style='color:green;'>Đã giao</span>";
						  }  ?></th>
						<th><a onclick="return confirm('Bạn có chắc chắn xóa không ?')" href="delete.php?key=donhang&madh=<?php echo $d['maDH']; ?>">Xoá</a>&nbsp &nbsp<a href="update.php?key=donhang&madh=<?php echo $d['maDH']; ?>">Sửa</a></th>
					</tr>
					<?php $stt++;
							} }
							else if ($loc==2) { // Lọc đơn hàng đã giao 
									$result=mysqli_query($link,"SELECT * FROM doan_donhang WHERE trangThai=2");?>
					<tr bgcolor="lightgrey">
						<th>STT</th>
						<th>Mã đơn hàng</th>
						<th>Chi tiết</th>
						<th>Trạng thái</th>
						<th>Hành động</th>

					</tr>
					<?php
					$stt=1;
					while ($d=mysqli_fetch_array($result)) { ?>
					<tr bgcolor="lightblue" style="height: 100px;">
						<th><?php echo $stt; ?></th>
						<th><?php echo $d['maDH']; ?></th>
						<?php
							$madh=$d['maDH'];
							$query=mysqli_query($link,"SELECT * FROM doan_chitiethoadon WHERE maDH=$madh");
							
						?>
						<td style="font-weight: bold; font-size: 14px;">
						<p style="color: green;">
						<?php
						echo "Tên khách hàng: ".$d['tenKH']."<br>";
						echo "Địa chỉ: ".$d['diaChi']."<br>";
						echo "Số điện thoại: ".$d['sdt']."<br>";
						echo "Ngày mua: ".$d['ngayMua']."<br>"."</p>";

						while ($chitiet=mysqli_fetch_array($query)) {
							
							echo "Mã sản phẩm: ".$chitiet['maSP'];
							echo "--Tên sản phẩm: ".$chitiet['tenSP'];
							echo "--Số lượng : ".$chitiet['SL'];
							echo "--Giá : ".number_format($chitiet['giaSP'])." .VNĐ";
							echo "--Thành tiền : ".number_format($chitiet['thanhTien'])." .VNĐ<br>";
						}?>	
							<span style='color:red'>Tổng cộng: <?php echo number_format($d['tongCong']); ?> .VNĐ</span>

						</td>
						<th><?php if ($d['trangThai']==0) {
							echo "<span style='color:#eb0000;'>Đang xử lí</span>";
						}
						elseif ($d['trangThai']==1) {
						  	echo "<span style='color:;'>Đang giao</span>";
						  }
						  elseif ($d['trangThai']==2) {
						  	echo "<span style='color:green;'>Đã giao</span>";
						  }  ?></th>
						<th><a onclick="return confirm('Bạn có chắc chắn xóa không ?')" href="delete.php?key=donhang&madh=<?php echo $d['maDH']; ?>">Xoá</a>&nbsp &nbsp<a href="update.php?key=donhang&madh=<?php echo $d['maDH']; ?>">Sửa</a></th>
					</tr>
					<?php $stt++; }
							}
						}
						else{ ?>
							<tr bgcolor="lightgrey">
						<th>STT</th>
						<th>Mã đơn hàng</th>
						<th>Chi tiết</th>
						<th>Trạng thái</th>
						<th>Hành động</th>

					</tr>
					<?php
					$stt=1;
					while ($d=mysqli_fetch_array($result)) { ?>
					<tr bgcolor="lightblue" style="height: 100px;">
						<th><?php echo $stt; ?></th>
						<th><?php echo $d['maDH']; ?></th>
						<?php
							$madh=$d['maDH'];
							$query=mysqli_query($link,"SELECT * FROM doan_chitiethoadon WHERE maDH=$madh");
							
						?>
						<td style="font-weight: bold; font-size: 14px;">
						<p style="color: green;">
						<?php
						echo "Tên khách hàng: ".$d['tenKH']."<br>";
						echo "Địa chỉ: ".$d['diaChi']."<br>";
						echo "Số điện thoại: ".$d['sdt']."<br>";
						echo "Ngày mua: ".$d['ngayMua']."<br>"."</p>";

						while ($chitiet=mysqli_fetch_array($query)) {
							
							echo "Mã sản phẩm: ".$chitiet['maSP'];
							echo "--Tên sản phẩm: ".$chitiet['tenSP'];
							echo "--Số lượng : ".$chitiet['SL'];
							echo "--Giá : ".number_format($chitiet['giaSP'])." .VNĐ";
							echo "--Thành tiền : ".number_format($chitiet['thanhTien'])." .VNĐ<br>";
						}?>	
							<span style='color:red'>Tổng cộng: <?php echo number_format($d['tongCong']); ?> .VNĐ</span>

						</td>
						<th><?php if ($d['trangThai']==0) {
							echo "<span style='color:#eb0000;'>Đang xử lí</span>";
						}
						elseif ($d['trangThai']==1) {
						  	echo "<span style='color:darkorange;'>Đang giao</span>";
						  }
						  elseif ($d['trangThai']==2) {
						  	echo "<span style='color:green;'>Đã giao</span>";
						  }  ?></th>
						<th><a onclick="return confirm('Bạn có chắc chắn xóa không ?')" href="delete.php?key=donhang&madh=<?php echo $d['maDH']; ?>">Xoá</a>&nbsp &nbsp<a href="update.php?key=donhang&madh=<?php echo $d['maDH']; ?>">Sửa</a></th>
					</tr>
					<?php $stt++; } }?>

					
 					
				</table>
			</div>
	</div>

	<?php include 'bottom.php'; } else header('location:../index.php'); ?>