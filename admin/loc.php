<!-- select: casi
select:nhacsi -->
<?php 

//bài tập không pnaan cấp , từ cơ sở dữ liệu nghệ sĩ ca sĩ chọn ở selected sẽ không liên quan với nhau

	
		$host = "localhost";
		// $username = "id8351158_luyns";
		// $password = "truyen123";
		// $database = "id8351158_luyns";

		$username = "root";
		$password = "";
		$database = "vidu";

		$conn = @mysqli_connect("localhost","root","","doan") or die("Không thể kết nối đến sever");
		mysqli_query($conn,"SET NAMES 'utf8'");
		

	
	$query="SELECT * FROM doan_chungloai";
	$data = mysqli_query($conn,$query);
?>
<!DOCTYPE html>
<html lang="en">
	<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<style type="text/css">
td {
	cursor: pointer;
}
button {
	background-color: white;
	border: none;
	width: 30px;
	height: 0px;
}
</style>
	<?php  
		// function layURL(){
		// 	$pageURL = "";
		// 	if ($_SERVER[“SERVER_PORT”] != “80”) {

		// 	$pageURL .= $_SERVER[“SERVER_NAME”].”:”.$_SERVER[“SERVER_PORT”].$_SERVER[“REQUEST_URI”];

		// 	} else {

		// 	$pageURL .= $_SERVER[“SERVER_NAME”].$_SERVER[“REQUEST_URI”];

		// 	}

		// 	return $pageURL;
		// }
	?>
	</head>
	<body>
<form action="" method="get" name="form1" id="form1">
      <p>
    <?php 
				$sl2 = "select * from doan_chungloai";
				$kq2 = mysqli_query($conn, $sl2);
			?>
    <label for="nhacsi">Chủng loại</label>
    <select name="chungloai" id="chungloai" onchange="form1.submit()">
          <option value="" selected="selected">Tất cả</option>
          <?php 
					while ($d = mysqli_fetch_array($kq2)) {
				?>
          <option value="<?php echo $d['maCL']; ?>" 
					<?php 
				if(isset($_GET['chungloai']) && $_GET['chungloai'] == $d['maCL']) echo "selected = 'selected'";?>><?php echo $d['tenCL']; ?></option>
          <?php } ?>
        </select>
  </p>
      <p>
    <?php 
				$sl2 = "select * from doan_loai";
				$kq2 = mysqli_query($conn, $sl2);
			?>
    <label for="nhacsi">Loại</label>
    <select name="loai" id="loai" onchange="form1.submit()">
          <option value="" selected="selected">Tất cả</option>
          <?php 
					while ($d = mysqli_fetch_array($kq2)) {
				?>
          <option value="<?php echo $d['maLoai']; ?>" 
					<?php 
				if(isset($_GET['loai']) && $_GET['loai'] == $d['maLoai']) echo "selected = 'selected'";?>><?php echo $d['tenLoai']; ?></option>
          <?php } ?>
        </select>
  </p>
    </form>
<table border="1px">
      <tr>
    <form action="" method="post" id="form2" name="form2">
          <td>Mã loại
        <button  name="maLoai">&#9660</button></td>
            <td>
      Mã sản phẩm
            <button  name="maSP">
        </td>
          <td>Tên sản phẩm 
      <button onclick="form2.submit()" name="tenSP">&#9660</button>
            </td>
          <td>Giá sản phẩm
        <button onclick="form2.submit()" name="giaSP">&#9660</button></td>
          <td>Thông tin
        <button  name="thongTin">&#9660</button></td>
          <td>Hình ảnh
        <button onclick="form2.submit()" name="hinhAnh">&#9660</button></td>
          <td>Số lượng
        <button onclick="form2.submit()" name="SL">&#9660</button></td>
        </form>
  </tr>
      <?php 
		// echo layURL();
		$locCL = 0;
		$locLoai = 0;
		if(isset($_GET['chungloai']) && isset($_GET['loai'])){ 
			$locCl = $_GET['chungloai'];
			$locLoai = $_GET['loai'];
		}
		$sl3 = null;

		if($locCL == 0 && $locLoai == 0){
			$sl3 = "select * from doan_sp";
		}
		else if($locCL != 0 && $locLoai == 0){
			$sl3 = "select * from doan_sp where maCL = $locCL";
		}
		else if ($locCL == 0 && $locLoai != 0) {
			$sl3 = "select * from doan_sp where maLoai = $locLoai";
		}
		else {
			$sl3 = "select * from doan_sp where maCL = $locCL and maLoai = $locLoai";
		} 
		//if(isset($_POST['maLoai']))
			//$sl3 .= " order by maLoai";
		if(isset($_POST['maSP']))
			$sl3 .= " order by maSP";
		if(isset($_POST['tenSP']))
			$sl3 .= " order by tenSP";
		if(isset($_POST['giaSP']))      
			$sl3 .= " order by giaSP";    
		//if(isset($_POST['thongTin']))
		//	$sl3 .= " order by thongTin";
		if(isset($_POST['hinhAnh']))
			$sl3 .= " order by hinhAnh";
		if(isset($_POST['SL']))
			$sl3 .= " order by SL";
		                                                                     
		
		$kq3 = mysqli_query($conn, $sl3);
		while($d = mysqli_fetch_array($kq3)){
			?>
      <tr>
    <td><?php echo $d['maLoai']; ?></td>
    <td><?php echo $d['maSP']; ?></td>
    <td><?php echo $d['tenSP']; ?></td>
    <td><?php echo $d['giaSP']; ?></td>
    <td><?php echo $d['thongTin']; ?></td>
    <td><?php echo $d['hinhAnh']; ?></td>
    <td><?php echo $d['SL']; ?></td>
  </tr>
      <?php } ?>
    </table>
</body>
</html>