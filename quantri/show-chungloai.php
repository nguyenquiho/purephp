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
			$result=mysqli_query($link,"SELECT * FROM doan_chungloai");
			$num=mysqli_num_rows($result);
			?>
			<div style="border-bottom: 1px solid black">
				<h3 style="margin-top: 25px;">Chủng loại</h3>
				<span>Quản lí chủng loại (<?php echo "$num"; ?>)</span>
				<a href="add.php?key=chungloai"><button style="width: 100px;float: right; margin-right: 50px;margin-top: -25px;padding:10px; "> Thêm</button></a>
			</div>
			<div>
				<table border="1px" style="width: 98%; border-collapse: collapse;margin-top: 20px;border-color: white">
					<tr>
						<th colspan="4" bgcolor="DarkSlateGray" style="color: white" align="left" height="30">Danh sách chủng loại </th>
					</tr>
					<tr bgcolor="lightgrey">
						<th>STT</th>
						<th>Mã chủng loại</th>
						<th>Tên chủng loại</th>
						<th>Hành động</th>
					</tr>
					<?php
					$stt=1;
					while ($d=mysqli_fetch_array($result)) { ?>
					<tr bgcolor="lightblue">
						<th><?php echo $stt; ?></th>
						<th><?php echo $d['maCL']; ?></th>
						<th><?php echo $d['tenCL']; ?></th>
						<th><a onclick="return confirm('Bạn có chắc chắn xóa không ?')" href="delete.php?key=chungloai&macl=<?php echo $d['maCL']; ?>" >Xoá</a>&nbsp &nbsp<a href="update.php?key=chungloai&macl=<?php echo $d['maCL']; ?>">Sửa</a></th>
					</tr>
					<?php $stt++; } ?>
				</table>
			</div>
		</div>
	<?php include 'bottom.php'; } else header('location:../index.php'); ?>