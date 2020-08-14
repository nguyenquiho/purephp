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
	$result=mysqli_query($link,"SELECT * FROM doan_nguoidung");
			$num=mysqli_num_rows($result);
			?>
			<div style="border-bottom: 1px solid black">
				<h3 style="margin-top: 25px;">Người dùng</h3>
				<span>Quản lí người dùng(<?php echo "$num"; ?>)</span>
				<a href="add.php?key=nguoidung">
					<button style="width: 100px;float: right; margin-right: 50px;margin-top: -25px;padding:10px; "> Thêm</button>
				</a>
				
			</div>
			<div>
				<table border="1px" style="width: 98%; border-collapse: collapse;margin-top: 20px;border: white">
					<tr>
						<th colspan="7" bgcolor="DarkSlateGray" style="color: white" align="left" height="30">Danh sách người dùng </th>
					</tr>
					<tr bgcolor="lightgrey">
						<th>ID</th>
						<th>Họ tên</th>
						<th>Tên đăng nhập</th>
						<th>Mật khẩu</th>
						<th>Hình ảnh</th>
						<th>Hành động</th>
					</tr>
					<?php
					$stt=1;
					while ($d=mysqli_fetch_array($result)) { ?>
					<tr bgcolor="lightblue">
						<th><?php echo $d['id']; ?></th>
						<th><?php echo $d['hoTen']; ?></th>
						<th><?php echo $d['tenDangNhap']; ?></th>
						<th><?php echo $d['matKhau']; ?></th>
						<th><img width="80" height="80" src="../<?php echo $d['hinhAnh']; ?>" ></th>
						<th><a onclick="return confirm('Bạn có chắc chắn xóa không ?')" href="delete.php?key=nguoidung&id=<?php echo $d['id']; ?>">Xoá</a>&nbsp &nbsp<a href="update.php?key=nguoidung&id=<?php echo $d['id']; ?>">Sửa</a></th>
					</tr>
					<?php $stt++; } ?>
				</table>
			</div>
	</div>

	<?php include 'bottom.php'; } else header('location:../index.php'); ?>