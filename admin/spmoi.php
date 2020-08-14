<?php
session_start();
//if (isset($_SESSION['admin'])) {
	
	
	
	
	

		$conn = @mysqli_connect("localhost","root","","doan") or die("Không thể kết nối đến sever");
		mysqli_query($conn,"SET NAMES 'utf8'");
		$query="SELECT * FROM doan_sp_moi ";
	$data = mysqli_query($conn,$query);
	
		$query1="SELECT * FROM doan_chungloai ";
		$data1 = mysqli_query($conn,$query1);
		$m1= mysqli_fetch_array($data1);
    if (isset($_SESSION['admin'])) {
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Sản phẩm mới</title>
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
      <li class="tran"> <a href="chungloai.php" class=" exp" > <span>Chủng loại</span> <strong>
       <?php
	   $query1="SELECT * FROM doan_chungloai ";
		$data1 = mysqli_query($conn,$query1);
            $num=mysqli_num_rows($data1);
			 echo $num ;
			 
			
			?>
      </strong> </a> </li>
      <li class="tran"> <a href="loai.php" class=" exp" > <span>Loại sản phẩm</span> <strong>
       <?php
	   $query2="SELECT * FROM doan_loai ";
		$data2 = mysqli_query($conn,$query2);
            $num=mysqli_num_rows($data2);
			 echo $num ;
			 
			
			?>
      </strong> </a> </li>
      <li class="product"> <a href="locsp.php" class=" exp" id="current"> <span>Sản phẩm</span> <strong>
       <?php
	   $query3="SELECT * FROM doan_sp ";
		$data3 = mysqli_query($conn,$query3);
            $num=mysqli_num_rows($data3);
			 echo $num ;
			 
			
			?>
      </strong> </a>
        <ul class="sub">
          <li class="this"> <a  href="spmoi.php"> Sản phẩm mới </a> </li>
          <li > <a href="spkm.php"> Sản phẩm khuyến mãi </a> </li>
          <li > 
          <a href="spbanchay.php"> Sản phẩm bán chạy
          <li > <a href="pkgt.php"> Phụ kiện giá tốt </li></a> 
        </ul>
      </li>
      <li class="account"> <a href="user.php" class=" exp"> <span>Người dùng</span> <strong>
       <?php
	   $query4="SELECT * FROM doan_nguoidung ";
		$data4 = mysqli_query($conn,$query4);
            $num=mysqli_num_rows($data4);
			 echo $num ;
			 
			
			?>
      </strong> </a>
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
        <h5>Sản phẩm mới</h5>
        <span>Quản lý sản phẩm mới</span> </div>
      <div class="horControlB menu_action">
        <ul>
          <li><a href="them_moi.php"> <img src="image/add.png" /> <span>Thêm mới</span> </a></li>
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
        <h6>Danh sách Sản phẩm</h6>
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
              <td style="width:80px;">Mã loại</td>
              <td>Mã sản phẩm</td>
              <td>Tên sản phẩm</td>
              <td>Giá sản phẩm</td>
              <td>Thông tin</td>
              <td >Hình ảnh</td>
              <td >SL</td>
             
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
					echo   "<td><input type='checkbox' name='id[]' value=".$m['maLoai']." /></td>";
						
					echo	"<td class='textC'>".$m['maLoai']."</td>";
						
						
					echo	"<td><span title=".$m['maSP']." class='tipS'>
							".$m['maSP']."</span></td>";
						
						
						echo	"<td><span title=".$m['tenSP']." class='tipS'>
							".$m['tenSP']."</span></td>";
							echo	"<td><span title=".$m['giaSP']." class='tipS'>
							".$m['giaSP']."</span></td>";
							
						echo	"<td><span title=".$m['thongTin']." class='tipS'>
							".$m['thongTin']."</span></td>"; ?>
						  <td><img src="<?php echo $m['hinhAnh']; ?>"></td>
						<?php 
            echo	"<td><span title=".$m['SL']." class='tipS'>
							".$m['SL']."</span></td>";
						
					
						
						
						
						
						
						echo "<td class='option'>";
							echo "<a href='sua_moi.php?id=".$m['maSP']."' title='Chỉnh sửa' class='tipS '>";
							echo "<img src='image/edit.png' />";
							echo "</a>";
							
							echo "<a href='xoa_moi.php?id=".$m['maSP']."' title='Xóa' class='tipS verify_action' >";
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