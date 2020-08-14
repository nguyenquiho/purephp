<?php
$ID=$_POST['ID'];
$maDH=$_POST['maDH'];
$tenDangNhap=$_POST['tenDangNhap'];

$maSP=$_POST['maSP'];
$tenSP=$_POST['tenSP'];
$SL=$_POST['SL'];

$giaSP=$_POST['giaSP'];
$thanhTien=$_POST['thanhTien'];



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
		$query="SELECT * FROM doan_chitiethoadon";
	$data = mysqli_query($conn,$query);
	//if(isset($_POST['submit'])){
		
		//if(($_POST['id'])==NULL or ($_POST['name'])==NULL or ($_POST['email'])==NULL or ($_POST['phone'])==NULL or ($_POST['address'])==NULL or ($_POST['created'])==NULL){ 
		//	echo "Không được để trống";
			//}else{ $sql=mysqli_query(" INSERT INTO  webproduct_my('".$_POST['id']."','".$_POST['name']."','".$_POST['email']."','".$_POST['phone']."','".$_POST['address']."','".$_POST['created']."')  "	or die("Lỗi truy vấn"));
	//}
		//}
	$add=" INSERT INTO  doan_chitiethoadon(ID,maDH,tenDangNhap,maSP,tenSP,SL,giaSP,thanhTien) VALUES('$ID','$maDH','$tenDangNhap','$maSP','$tenSP','$SL','$giaSP','$thanhTien')  "or die("Lỗi truy vấn");
if(mysqli_query($conn, $add))// nếu thêm thành công
{echo "<META http-equiv=\"refresh\" content=0;URL=http://localhost:8080/do-an/admin/doan_chitiethoadon.php>";
} else { 
    echo "Error: " . $add . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);

 //include( "sp.php");}
?>