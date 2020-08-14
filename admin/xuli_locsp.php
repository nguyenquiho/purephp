  <?php
$loai=$_POST['maLoai'];
$ma=$_POST['maSP'];
$ten=$_POST['tenSP'];
$gia=$_POST['giaSP'];
$tt=$_POST['thongTin'];
$anh=$_POST['hinhAnh'];
$sl=$_POST['SL'];

//nếu mà passw thì thêm md5($_POST['pass']); là định dạng ra sao

		$host = "localhost";
		// $username = "id8351158_luyns";
		// $password = "truyen123";
		// $database = "id8351158_luyns";

		$username = "root";
		$password = "";
		$database = "vidu";

		$conn = @mysqli_connect("localhost","root","","doan") or die("Không thể kết nối đến sever");
		mysqli_query($conn,"SET NAMES 'utf8'");
		$query="SELECT * FROM doan_sp";
	$data = mysqli_query($conn,$query);
	//if(isset($_POST['submit'])){
		
		//if(($_POST['id'])==NULL or ($_POST['name'])==NULL or ($_POST['email'])==NULL or ($_POST['phone'])==NULL or ($_POST['address'])==NULL or ($_POST['created'])==NULL){ 
		//	echo "Không được để trống";
			//}else{ $sql=mysqli_query(" INSERT INTO  webproduct_my('".$_POST['id']."','".$_POST['name']."','".$_POST['email']."','".$_POST['phone']."','".$_POST['address']."','".$_POST['created']."')  "	or die("Lỗi truy vấn"));
	//}
		//}
	$add=" INSERT INTO  doan_sp(maLoai,maSP,tenSP,giaSP,thongTin,hinhAnh,SL) VALUES('$loai','$ma','$ten','$gia','$tt','$anh','$sl')  "or die("Lỗi truy vấn");
if(mysqli_query($conn, $add))// nếu thêm thành công
{echo "<META http-equiv=\"refresh\" content=0;URL=http://localhost:8080/do-an/admin/locsp.php?search=$search>";
} else { 
    echo "Error: " . $add . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);

 //include( "sp.php");}
?>