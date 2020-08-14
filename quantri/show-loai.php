<?php
session_start();
if (isset($_SESSION['admin'])) {
	include 'left.php';
	include 'top.php';
	include '../connect.php';
	?>

<div id="mid">
	<!-- \Showw chung loai -->
	<?php
			$result=mysqli_query($link,"SELECT * FROM doan_loai");
			$num=mysqli_num_rows($result);
			?>
			<div style="border-bottom: 1px solid black">
				<h3 style="margin-top: 25px;">Loại</h3>
				<span>Quản lí loại sản phẩm(<?php echo "$num"; ?>)</span>
				<a href="add.php?key=loai">
					<button style="width: 100px;float: right; margin-right: 50px;margin-top: -25px;padding:10px; "> Thêm</button>
				</a>
			</div>
			<div>
				<table border="1px" style="width: 98%; border-collapse: collapse;margin-top: 20px;border-color: white">
					<tr>
						<th colspan="5" bgcolor="DarkSlateGray" style="color: white" align="left" height="30">Danh sách loại sản phẩm </th>
					</tr>
					<tr bgcolor="lightgrey">
						<th>STT</th>
						<th>Mã chủng loại</th>
						<th>Mã loại</th>
						<th>Tên loại</th>
						<th>Hành động</th>
					</tr>
					<?php
					$stt=1;
					while ($d=mysqli_fetch_array($result)) { ?>
					<tr bgcolor="lightblue">
						<th><?php echo $stt; ?></th>
						<th><?php echo $d['maCL']; ?></th>
						<th><?php echo $d['maLoai']; ?></th>
						<th><?php echo $d['tenLoai']; ?></th>
						<th><a onclick="return confirm('Bạn có chắc chắn xóa không ?')" href="delete.php?key=loai&maloai=<?php echo $d['maLoai']; ?>">Xoá</a>&nbsp &nbsp<a href="update.php?key=loai&maloai=<?php echo $d['maLoai']; ?>">Sửa</a></th>
					</tr>
					<?php $stt++; } ?>
				</table>
			</div>
		</div>
	<?php include 'bottom.php'; } else header('location:../index.php'); ?>