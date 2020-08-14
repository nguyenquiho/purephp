<?php
session_start();
if (isset($_SESSION['admin'])) {
	include 'left.php';
	include 'top.php';
	include '../connect.php';
	?>

<div id="mid">
	<!-- \Showw sp km -->
		<?php
			$result=mysqli_query($link,"SELECT * FROM doan_pk_giatot");
			$num=mysqli_num_rows($result);
			?>
			<div style="border-bottom: 1px solid black">
				<h3 style="margin-top: 25px;">Phụ kiện giá tốt</h3>
				<span>Quản lí phụ kiện giá tốt(<?php echo "$num"; ?>)</span>
				<a href="add.php?key=pkgt">
					<button style="width: 100px;float: right; margin-right: 50px;margin-top: -25px;padding:10px; "> Thêm</button>
				</a>
				
			</div>
			<div>
				<table border="1px" style="width: 98%; border-collapse: collapse;margin-top: 20px;border-color: white">
					<tr>
						<th colspan="6" bgcolor="DarkSlateGray" style="color: white" align="left" height="30">Danh sách sản phẩm phụ kiện giá tốt</th>
					</tr>
					<tr bgcolor="lightgrey">
						<th scope="col">STT</th>
						<th scope="col">Mã sản phâm</th>
						<th scope="col">Tên sản phẩm</th> 
						<th scope="col">Giá</th>
						<th scope="col">Hình</th> 
						<th scope="col">Hành động</th> 
					</tr>
					<?php
					$stt=1;
					while ($d=mysqli_fetch_array($result)) { ?>
					<tr bgcolor="lightblue">
					<th><?php echo $stt; ?></th> 
					<th><?php 
					echo $d['maSP'];
					?></th> 
					<th><?php echo $d['tenSP'];?></th>
					<th><?php echo number_format($d['giaSP']);?> .VNĐ</th>
					<th width="150"><img src="<?php echo $d['hinhAnh'];?>" width="150" height="100" /></th>
					<th><a href="delete.php?masp=<?php echo $d['maSP']; ?>">Xoá</a>&nbsp &nbsp<a href="update.php?masp=<?php echo $d['maSP']; ?>">Sửa</a></th>
				</tr>
					<?php $stt++; } ?>
				</table>
			</div>
</div>
	<?php include 'bottom.php'; } else header('location:../index.php'); ?>