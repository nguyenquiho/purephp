<?php
session_start();
//if (isset($_SESSION['admin'])) {
	
	
	
	
	

		$conn = @mysqli_connect("localhost","root","","doan") or die("Không thể kết nối đến sever");
		mysqli_query($conn,"SET NAMES 'utf8'");
		$query="SELECT * FROM doan_nguoidung ";
	$data = mysqli_query($conn,$query);
	//$m= mysqli_fetch_array($data);
		$query1="SELECT * FROM doan_chungloai ";
		$data1 = mysqli_query($conn,$query1);
		$m1= mysqli_fetch_array($data1);
    if (isset($_SESSION['admin'])) {
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Người dùng</title>
<meta name="robots" content="noindex, nofollow" />
<link rel="shortcut icon" href="image/icon.png" type="image/x-icon"/>
<link rel="stylesheet" type="text/css" href="main.css" />
<link rel="stylesheet" type="text/css" href="css.css" media="screen" />
<script type="text/javascript">
	var admin_url 	= '';
	var base_url 	= '';
	var public_url 	= '';
</script>

<script type="text/javascript" src="jquery.min.js"></script>
<script type="text/javascript" src="jquery-ui.min.js"></script>

<script type="text/javascript" src="jquery.mousewheel.js"></script>

<script type="text/javascript" src="uniform.js"></script>
<script type="text/javascript" src="jquery.tagsinput.min.js"></script>
<script type="text/javascript" src="autogrowtextarea.js"></script>
<script type="text/javascript" src="jquery.maskedinput.min.js"></script>
<script type="text/javascript" src="jquery.inputlimiter.min.js"></script>

<script type="text/javascript" src="datatable.js"></script>
<script type="text/javascript" src="tablesort.min.js"></script>
<script type="text/javascript" src="resizable.min.js"></script>

<script type="text/javascript" src="jquery.tipsy.js"></script>
<script type="text/javascript" src="jquery.collapsible.min.js"></script>
<script type="text/javascript" src="jquery.progress.js"></script>
<script type="text/javascript" src="jquery.timeentry.min.js"></script>
<script type="text/javascript" src="jquery.colorpicker.js"></script>
<script type="text/javascript" src="jquery.jgrowl.js"></script>
<script type="text/javascript" src="jquery.breadcrumbs.js"></script>
<script type="text/javascript" src="jquery.sourcerer.js"></script>

<script type="text/javascript" src="custom.js"></script>


<script type="text/javascript" src="ckeditor.js"></script> 
<script type="text/javascript" src="chosen.jquery.min.js"></script>
<script type="text/javascript" src="jquery.scrollTo.js"></script>
<script type="text/javascript" src="jquery.number.min.js"></script>
<script type="text/javascript" src="jquery.formatCurrency-1.4.0.min.js"></script>
<script type="text/javascript" src="jquery.zclip.js"></script>

<script type="text/javascript" src="jquery.colorbox.js"></script>
<link rel="stylesheet" type="text/css" href="colorbox.css" media="screen" />

<script type="text/javascript" src="custom_admin.js" type="text/javascript"></script>
</head>

<body>

<!-- Left side content -->
<div id="left_content">
  <div id="leftSide" style="padding-top:30px;"> 
    
    <!-- Account panel -->
    
    <div class="sideProfile"> <a href="#" title="" class="profileFace"><img width="40" src="images/user.png" /></a> <span>Xin chào: <strong>admin!</strong></span> <span><?php echo $_SESSION['admin'] ?></span>
      <div class="clear"></div>
    </div>
    <div class="sidebarSep"></div>
    <!-- Left navigation -->
    
    <ul id="menu" class="nav">
      <li class="home"> <a href="untitled.php" class="" > <span>Trang quản trị</span> <strong></strong> </a> </li>
      <li class="tran"> <a href="chungloai.php" class=" exp" > <span>Chủng loại</span> <strong>  <?php
	   $query1="SELECT * FROM doan_chungloai ";
		$data1 = mysqli_query($conn,$query1);
            $num=mysqli_num_rows($data1);
			 echo $num ;
			 
			
			?></strong> </a> </li>
      <li class="tran"> <a href="loai.php" class=" exp" > <span>Loại sản phẩm</span> <strong> <?php
	   $query2="SELECT * FROM doan_loai ";
		$data2 = mysqli_query($conn,$query2);
            $num=mysqli_num_rows($data2);
			 echo $num ;
			 
			
			?></strong> </a> </li>
      <li class="product"> <a href="locsp.php" class=" exp" id="current"> <span>Sản phẩm</span> <strong> <?php
	   $query3="SELECT * FROM doan_sp ";
		$data3 = mysqli_query($conn,$query3);
            $num=mysqli_num_rows($data3);
			 echo $num ;
			 
			
			?></strong> </a>
        <ul class="sub">
          <li > <a href="spmoi.php"> Sản phẩm mới </a> </li>
          <li > <a href="spkm.php"> Sản phẩm khuyến mãi </a> </li>
          <li > 
          <a href="spbanchay.php"> Sản phẩm bán chạy
          <li > <a href="pkgt.php"> Phụ kiện giá tốt </a> </li>
        </ul>
      </li>
      <li class="account"> <a href="user.php" class="active exp"> <span>Người dùng</span> <strong> <?php
	   $query4="SELECT * FROM doan_nguoidung ";
		$data4 = mysqli_query($conn,$query4);
            $num=mysqli_num_rows($data4);
			 echo $num ;
			 
			
			?></strong> </a>
        <ul class="sub">
          <li > <a href="admin/admin.html"> Ban quản trị </a> </li>
          <li > <a href="admin/admin_group.html"> Nhóm quản trị </a> </li>
          <li > <a href="admin/user.html"> Thành viên </a> </li>
        </ul>
      </li>
      <li class="support"> <a href="donhang.php" class=" exp" > <span>Đơn hàng</span> <strong> <?php
	   $query5="SELECT * FROM doan_donhang ";
		$data5 = mysqli_query($conn,$query5);
            $num=mysqli_num_rows($data5);
			 echo $num ;
			 
			
			?></strong> </a>
        <ul class="sub">
          <li > <a href="admin/support.html"> Hỗ trợ </a> </li>
          <li > <a href="admin/contact.html"> Liên hệ </a> </li>
        </ul>
      </li>
      <li class="content"> <a href="admin/content.html" class=" exp" > <span>Nội dung</span> <strong>4</strong> </a>
        <ul class="sub">
          <li > <a href="admin/slide.html"> Slide </a> </li>
          <li > <a href="admin/news.html"> Tin tức </a> </li>
          <li > <a href="admin/info.html"> Trang thông tin </a> </li>
          <li > <a href="admin/video.html"> Video </a> </li>
        </ul>
      </li>
    </ul>
  </div>
  <div class="clear"></div>
</div>

<!-- Right side -->
<div id="rightSide">

<!-- Account panel top --> 

<!-- Right side -->
<div id="rightSide"> 
  
  <!-- Account panel top -->
  
  <div class="topNav">
    <div class="wrapper">
      <div class="welcome"> <span>Xin chào: <b>admin!</b></span> </div>
      <div class="userNav">
        <ul>
         
          
          <!-- Logout -->
          <li><a href="../delete-session.php"> <img src="image/logout.png" alt="" /> <span>Đăng xuất</span> </a></li>
        </ul>
      </div>
      <div class="clear"></div>
    </div>
  </div>
  
  <!-- Main content --> 
  <!-- Common view --> 
  <!-- Title area -->
  <div class="titleArea">
    <div class="wrapper">
      <div class="pageTitle">
        <h5>Thành viên</h5>
        <span>Quản lý thành viên</span> </div>
      <div class="horControlB menu_action">
        <ul>
          <li><a href="them_user.php"> <img src="image/add.png" /> <span>Thêm mới</span> </a></li>
        </ul>
      </div>
      <div class="clear"></div>
    </div>
  </div>
  <div class="line"></div>
  
  <!-- Message --> 
  
  <!-- Main content wrapper -->
  <div class="wrapper">
    <div class="widget">
      <div class="title"> <span class="titleIcon">
        <input type="checkbox" id="titleCheck" name="titleCheck" />
        </span>
        <h6>Danh sách Thành viên</h6>
        <div class="num f12">Tổng số: <b>
          <?php
            $num=mysqli_num_rows($data);
			 echo $num ;
			 
			
			?>
          </b></div>
      </div>
      <form action="http://localhost/webphp/index.php/admin/user.html" method="get" class="form" name="filter">
        <table cellpadding="0" cellspacing="0" width="100%" class="sTable mTable myTable withCheck" id="checkAll">
          <thead>
            <tr>
              <td style="width:10px;"><img src="image/tableArrows.png" /></td>
              <td style="width:80px;">Mã số</td>
              <td>Tên</td>
              <td>Tên đăng nhập</td>
              <td>Mật khẩu</td>
              <td>Giới tính</td>
              <td >Số điện thoại</td>
              <td >email</td>
              <td >Ngày sinh</td>
              <td >Địa chỉ</td>
              <td >Số lượt mua</td>
              <td style="width:100px;">Hành động</td>
            </tr>
          </thead>
          <tfoot>
            <tr>
              <td colspan="12"><div class="list_action itemActions"> <a href="#submit" id="submit" class="button blueB" url="user/del_all.html"> <span style='color:white;'>Xóa hết</span> </a> </div>
                <div class='pagination'> </div></td>
            </tr>
          </tfoot>
          <tbody>
            <!-- Filter -->
            <?php while($m= mysqli_fetch_array($data))
			{
									echo "<tr>";
					echo   "<td><input type='checkbox' name='id[]' value=".$m['id']." /></td>";
						
					echo	"<td class='textC'>".$m['id']."</td>";
						
						
					echo	"<td><span title=".$m['hoTen']." class='tipS'>
							".$m['hoTen']."</span></td>";
						
						
						echo	"<td><span title=".$m['tenDangNhap']." class='tipS'>
							".$m['tenDangNhap']."</span></td>";
							echo	"<td><span title=".$m['matKhau']." class='tipS'>
							".$m['matKhau']."</span></td>";
							echo	"<td><span title=".$m['GT']." class='tipS'>
							".$m['GT']."</span></td>";
						echo	"<td><span title=".$m['sdt']." class='tipS'>
							".$m['sdt']."</span></td>";
							echo	"<td><span title=".$m['email']." class='tipS'>
							".$m['email']."</span></td>";
						echo	"<td><span title=".$m['ngaySinh']." class='tipS'>
							".$m['ngaySinh']."</span></td>";
						echo	"<td><span title=".$m['diaChi']." class='tipS'>
							".$m['diaChi']."</span></td>";
							echo	"<td><span title=".$m['soLuotMua']." class='tipS'>
							".$m['soLuotMua']."</span></td>";
					
						
						
						
						
						
						echo "<td class='option'>";
							echo "<a href='sua_user.php?id=".$m['id']."' title='Chỉnh sửa' class='tipS '>";
							echo "<img src='image/edit.png' />";
							echo "</a>";
							
							echo "<a href='xoa_user.php?id=".$m['id']."' title='Xóa' class='tipS verify_action' >";
							  echo  "<img src='image/delete.png' />";
							echo "</a>";
						echo "</td>";
					echo "</tr>";
								
			}?>
          </tbody>
        </table>
      </form>
    </div>
  </div>
  <div class="clear mt30"></div>
  
  <!-- Footer -->
  <div id="footer">
    <div class="wrapper">
      <div>Footer</div>
    </div>
  </div>
</div>
<div class="clear"></div>
</body>
</html>
<?php } else header('location:http://localhost:8080/do-an/index.php'); ?>