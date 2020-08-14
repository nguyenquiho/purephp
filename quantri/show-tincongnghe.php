<?php
session_start();
if (isset($_SESSION['admin'])) {
	include 'left.php';
	include 'top.php';
	include '../connect.php';
	?>

<div id="mid">
	<!-- \Showw tin cong nghe -->
	<?php
			$result=mysqli_query($link,"SELECT * FROM doan_tincongnghe");
			$num=mysqli_num_rows($result);
			?>
			<div style="border-bottom: 1px solid black">
				<h3 style="margin-top: 25px;">Tin công nghệ</h3>
				<span>Quản lí tin (<?php echo "$num"; ?>)</span>
				<a href="them-bai-viet-ck.php">
					<button style="width: 100px;float: right; margin-right: 50px;margin-top: -25px;padding:10px; "> Thêm</button>
				</a>
			</div>
			<div>
				<table border="1px" style="width: 98%; border-collapse: collapse;margin-top: 20px;border-color: white">
					<tr>
						<th colspan="9" bgcolor="DarkSlateGray" style="color: white" align="left" height="30">Danh sách tin </th>
					</tr>
					<tr bgcolor="lightgrey">
						<th>STT</th>
						<th>Mã tin</th>
						<th>Tiêu đề</th>
						<th>Hình ảnh</th>
						<th>Nội dung</th>
						<th>Người đăng</th>
						<th>Ngày đăng</th>
						<th>Trạng thái</th>
						<th>Hành động</th>
					</tr>
					<?php
					$stt=1;
					while ($d=mysqli_fetch_array($result)) { $noidung=$d['noiDung'];
					$noidung=substr($noidung, 0,1000);
					if ($d['anHien']==0) {
					 	$tt="Không hiển thị";
					 }
					 else $tt="Hiển thị"; ?>
					<tr bgcolor="lightblue">
						<th><?php echo $stt; ?></th>
						<th><?php echo $d['maTin']; ?></th>
						<th><?php echo $d['tieuDe']; ?></th>
						<th><?php echo $d['hinhAnh']; ?></th>
						<th style="width: 400px;height: 100px;"><?php echo $noidung."..."; ?></th>
						<th><?php echo $d['nguoiDang']; ?></th>
						<th><?php echo $d['ngayDang']; ?></th>
						<th><?php echo $tt ?></th>
						<th><a onclick="return confirm('Bạn có chắc chắn xóa không ?')" href="delete-baiviet.php?matin=<?php echo $d['maTin']; ?>">Xoá</a>&nbsp &nbsp<a href="sua-baiviet.php?matin=<?php echo $d['maTin']; ?>">Sửa</a></th>
					</tr>
					<?php $stt++; } ?>
				</table>
			</div>
		</div>
	<?php include 'bottom.php'; } else header('location:../index.php'); ?>