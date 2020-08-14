   <?php
$id=$_POST['id'];
$hoTen=$_POST['hoTen'];
$tenDangNhap=$_POST['tenDangNhap'];
$matKhau=$_POST['matKhau'];
$GT=$_POST['GT'];
$sdt=$_POST['sdt'];
$email=$_POST['email'];
$ngaySinh=$_POST['ngaySinh'];
$diaChi=$_POST['diaChi'];
$soLuotMua=$_POST['soLuotMua'];

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
		$query="SELECT * FROM doan_nguoidung";
	$data = mysqli_query($conn,$query);
	
	$add=" INSERT INTO  doan_nguoidung(id,hoTen,tenDangNhap,matKhau,GT,sdt,email,ngaySinh,diaChi,soLuotMua) VALUES('$id','$hoTen','$tenDangNhap','$matKhau','$GT','$sdt','$email','$ngaySinh','$diaChi','$soLuotMua')  "or die("Lỗi truy vấn");
if(mysqli_query($conn, $add))// nếu thêm thành công
{echo "<META http-equiv=\"refresh\" content=0;URL=http://localhost:8080/do-an/admin/user.php>";
} else { 
    echo "Error: " . $add . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);

 //include( "sp.php");}
?>