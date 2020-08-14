<?php
session_start();
//if (isset($_SESSION['admin'])) {
	
	
	
	
	

		$conn = @mysqli_connect("localhost","root","","doan") or die("Không thể kết nối đến sever");
		mysqli_query($conn,"SET NAMES 'utf8'");
		$query="SELECT * FROM doan_loai ";
	$data = mysqli_query($conn,$query);
	//$m= mysqli_fetch_array($data);
		$query1="SELECT * FROM doan_chungloai ";
		$data1 = mysqli_query($conn,$query1);
		$m1= mysqli_fetch_array($data1);
    if (isset($_SESSION['admin'])) {
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Loại sản phẩm</title>
<meta name="robots" content="noindex, nofollow" />
<link rel="shortcut icon" href="image/icon.png" type="image/x-icon"/>
<link rel="stylesheet" type="text/css" href="main.css" />
<link rel="stylesheet" type="text/css" href="css.css" media="screen" />

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
      <li class="tran"> <a href="chungloai.php" class=" exp" > <span>Chủng loại</span> <strong> <?php
	   $query1="SELECT * FROM doan_chungloai ";
		$data1 = mysqli_query($conn,$query1);
            $num=mysqli_num_rows($data1);
			 echo $num ;
			 
			
			?></strong> </a> </li>
      <li class="tran"> <a href="loai.php" class="active exp" > <span>Loại sản phẩm</span> <strong><?php
	   $query2="SELECT * FROM doan_loai ";
		$data2 = mysqli_query($conn,$query2);
            $num=mysqli_num_rows($data2);
			 echo $num ;
			 
			
			?></strong> </a> </li>
      <li class="product"> <a href="locsp.php" class=" exp" id="current"> <span>Sản phẩm</span> <strong><?php
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
          <li > <a href="pkgt.php"> Phụ kiện giá tốt </li></a> 
        </ul>
      </li>
      <li class="account"> <a href="user.php" class=" exp" > <span>Người dùng</span> <strong> <?php
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
      <li class="support"> <a href="donhang.php" class=" exp" > <span>Đơn hàng</span> <strong><?php
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
  
  <div class="topNav">
    <div class="wrapper">
      <div class="welcome"> <span>Xin chào: <b>admin!</b></span> </div>
      <div class="userNav">
        <ul>
          <li><a href="admin.php" target="_blank"> <img style="margin-top:7px;" src="image/home.png" /> <span>Trang chủ</span> </a></li>
          
          <!-- Logout -->
          <li><a href="admin/home/logout.html"> <img src="image/logout.png" alt="" /> <span>Đăng xuất</span> </a></li>
        </ul>
      </div>
      <div class="clear"></div>
    </div>
  </div>
  
  <!-- Main content --> 
  <!-- Common --> 
  <!-- Title area -->
  <div class="titleArea">
    <div class="wrapper">
      <div class="pageTitle">
        <h5>Loại sản phẩm</h5>
        <span>Quản lý loại sản phẩm</span> </div>
      <div class="horControlB menu_action">
        <ul>
          <li><a href="themloai.php"> <img src="image/add.png" /> <span>Thêm mới</span> </a></li>
          <li><a href="admin/cat.html"> <img src="image/list.png" /> <span>Danh sách</span> </a></li>
        </ul>
      </div>
      <div class="clear"></div>
    </div>
  </div>
  <div class="line"></div>
  
  <!-- Message --> 
  
  <!-- Main content wrapper -->
  <div class="wrapper"> 
    
    <!-- Static table -->
    <div class="widget" id='main_content'>
      <div class="title"> <span class="titleIcon">
        <input type="checkbox" id="titleCheck" name="titleCheck" />
        </span>
        <h6>Danh sách loại sản phẩm</h6>
        <div class="num f12">Tổng số: <b>
          <?php
            $num=mysqli_num_rows($data);
			 echo $num ;
			 
			
			?>
          </b></div>
      </div>
      <table cellpadding="0" cellspacing="0" width="100%" class="sTable mTable myTable taskWidget" id="checkAll">
        <thead>
          <tr>
            <td style="width:21px;"><img src="image/tableArrows.png" /></td>
            <td>Mã chủng loại</td>
            <td>Mã  loại</td>
            <td>Tên loại</td>
            <td >Hành động</td>
          </tr>
        </thead>
        <tfoot class="auto_check_pages">
          <tr>
            <td colspan="5"><div class="list_action itemActions"> <a href="#submit" id="submit" class="button blueB" url="admin/cat/del_all.html"> <span style='color:white;'>Xóa hết</span> </a> </div>
              <div class='pagination'>
              
              <!-- &nbsp;<strong>1</strong>&nbsp;<a href="admin/cat/index/10">2</a>&nbsp;<a href="admin/cat/index/10">Trang kế tiếp</a>&nbsp;			            </div>--></td>
          </tr>
        </tfoot>
        <?php while($m= mysqli_fetch_array($data))
			{
			echo "<tbody>";
			     			   echo  "<tr class='row_18'>";
			     echo "   <td><input type='checkbox' name='id[]' value='18' /></td>";
					
					echo "<td>".$m['maCL']."</td>";  
					echo"<td>".$m['maLoai']."</td>";
					echo "<td>".$m['tenLoai']."</td>";
					echo "<td class='option'>";
					echo	"<a href='sualoai.php?id=".$m['maLoai']."' title='Chỉnh sửa' class='tipS '>";
					echo		"<img src='image/edit.png' />";
						echo "</a>";
						
						echo "<a href='xoaloai.php?id=".$m['maLoai']."' title='Xóa' class='tipS verify_action' >";
						 echo   "<img src='image/delete.png' />";
			
					echo	"</a>";
				echo	"</td>";
				echo "</tr>";
								
		echo	"</tbody>"; 
		
		
		
		
		     };?>
      </table>
    </div>
  </div>
  <div class="clear mt30"></div>
  
  <!-- Footer -->
  <div id="footer">
    <div class="wrapper">
      <div>FOOTER</div>
    </div>
  </div>
</div>
<div class="clear"></div>
</body>
</html>
<?php } else header('location:http://localhost:8080/do-an/index.php'); ?>