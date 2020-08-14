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
  session_start();
  if (isset($_SESSION['admin'])) {
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Lọc sản phẩm</title>
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
    
    <div class="sideProfile"> <a href="#" title="" class="profileFace"><img width="40" src="image/user.png" /></a> <span>Xin chào: <strong>admin!</strong></span> <span><?php echo $_SESSION['admin'] ?></span>
      <div class="clear"></div>
    </div>
    <div class="sidebarSep"></div>
    <!-- Left navigation -->
    
    <ul id="menu" class="nav">
      <li class="home"> <a href="untitled.php" class="active exp" > <span>Trang quản trị</span> <strong></strong> </a> </li>
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
          <li > <a href="spmoi.php"> Sản phẩm mới </a> </li>
          <li > <a href="spkm.php"> Sản phẩm khuyến mãi </a> </li>
          <li > 
          <a href="spbanchay.php"> Sản phẩm bán chạy
          <li > <a href="pkgt.php"> Phụ kiện giá tốt </li>
          </a>
        </ul>
      </li>
      <li class="account"> <a href="user.php" class=" exp" > <span>Người dùng</span> <strong>
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
      <li class="support"> <a href="donhang.php" class=" exp" > <span>Đơn hàng</span> <strong>
        <?php
	   $query5="SELECT * FROM doan_donhang ";
		$data5 = mysqli_query($conn,$query5);
            $num=mysqli_num_rows($data5);
			 echo $num ;
			 
			
			?>
        </strong> </a>
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
        <li><a href="" target="_blank"> <img style="margin-top:7px;" src="image/home.png" /> <span>Trang chủ</span> </a></li>
        
        <!-- Logout -->
        <li><a href="../delete-session.php"> <img src="image/logout.png" alt="" /> <span>Đăng xuất</span> </a></li>
      </ul>
    </div>
    <div class="clear"></div>
  </div>
</div>

<!-- Main content --> 
<script type="text/javascript">
(function($)
{
	$(document).ready(function()
	{
		var main = $('#main_product');
		
		// Tips
		main.find('.tipN').tipsy({gravity:'n', fade:false, html:true});
		main.find('.tipS').tipsy({gravity:'s', fade:false, html:true});
		main.find('.tipW').tipsy({gravity:'w', fade:false, html:true});
		main.find('.tipE').tipsy({gravity:'e', fade:false, html:true});
		
		// Tooltip
		main.find('[_tooltip]').nstUI({
			method:	'tooltip'
		});
	});
})(jQuery);
</script> 
<!-- Common view --> 
<script type="text/javascript">
(function($)
{
	$(document).ready(function()
	{
		var main = $('#form');
		
		// Tabs
		main.contentTabs();
	});
})(jQuery);
</script> 

<!-- Title area -->
<div class="titleArea">
  <div class="wrapper">
    <div class="pageTitle">
      <h5>Sản phẩm</h5>
      <span>Quản lý sản phẩm</span> </div>
    <div class="horControlB menu_action">
      <ul>
        <li><a href="them_locsp.php?&search=<?php	$search = $_GET['loai']; echo $search; ?>"> <img src="image/add.png" /> <span>Thêm mới</span> </a></li>
      </ul>
    </div>
    <div class="clear"></div>
  </div>
</div>
<div class="line"></div>

<!-- Message --> 

<!-- Main content wrapper -->
<div class="wrapper" id="main_product">
  <div class="widget">
    <div class="title"> <span class="titleIcon">
      <input type="checkbox" id="titleCheck" name="titleCheck" />
      </span>
      <h6> Danh sách sản phẩm </h6>
    </div>
    <table cellpadding="0" cellspacing="0" width="100%" class="sTable mTable myTable" id="checkAll">
      <thead class="filter">
        <tr>
          <td colspan="9"><form class="list_filter form" action="untitled.php" method="get" name="form1" id="form1">
              <table cellpadding="0" cellspacing="0" width="80%">
                <tbody>
                  <tr>
                    
                      <?php 
				$sl2 = "select * from doan_loai";
				$kq2 = mysqli_query($conn, $sl2);
			?>
                    <td class="label" style="width:300px;"><label for="filter_status">Tên loại</label></td>
                    <td class="item"><select name="loai" id="loai" onchange="form1.submit()">
                        <option value="" selected="selected">Tất cả</option>
                        <?php 
					while ($d = mysqli_fetch_array($kq2)) {
				?>
                        <option value="<?php echo $d['maLoai']; ?>" 
					<?php 
				if(isset($_GET['loai']) && $_GET['loai'] == $d['maLoai']) echo "selected = 'selected'";?>><?php echo $d['tenLoai']; ?></option>
                        <?php } ?>
                        
                        <!-- kiem tra danh muc co danh muc con hay khong -->
                        
                      </select></td>
                  </tr>
                </tbody>
              </table>
            </form>
            <?php

	/*	if(isset($_GET['search'])){
			$search = $_GET['search'];
			$conn=mysqli_connect("localhost","root","") or die("Khong the ket noi server!");
			mysqli_select_db($conn,"doan") or die("Database khong ton tai!");
			mysqli_query($conn,"set names 'utf8'");
			$kq=mysqli_query($conn,"select * from doan_sp where thongTin like '%$search%'");
			$tsp=mysqli_num_rows($kq); 
	$sd=20; //1 trang có 5 sạn phẩm 
	$sn=5; 
	//1 nhóm có 5 trang 
	//tinh tong so trang: 
	$tst=ceil($tsp/$sd); 
	//Tinh tong so nhom: 
	$tsn=ceil($tst/$sn);
	//tinh page, gr hiện hành: 
	if(isset($_GET['gr']))
	{
		$gr=$_GET['gr'];
		$page=($gr-1) *$sn+1;
	}
	else if(isset($_GET['page']))
	{
		$page=$_GET['page']; 
		$gr=ceil($page/$sn);
	}
	else{
		$gr=$page=1;
	}
	//Tính vị trị lấy sản phẩm:
	$vitri=($page-1) *$sd;
	// Query lấy sản phẩm theo vị trí: 
	$kq=mysqli_query($conn,"select * from doan_sp where thongTin like '%$search%' limit $vitri,$sd");*/?>
        <thead>
      
       <tr>
    <form action="" method="post" id="form2" name="form2">
        <td style="width:21px;"><img src="image/tableArrows.png" /></td>  
        <td>Mã loại
      
            <td>
      Mã sản phẩm
           
        </td>
          <td>Tên sản phẩm 
     
            </td>
          <td>Giá sản phẩm
        <button  name="giaSP"><img src="image/transfer.png" /></button></td>
          <td>Thông tin
        </td>
          <td>Hình ảnh
        </td>
          <td>Số lượng
        <button onclick="form2.submit()" name="SL"><img src="image/transfer.png" /></button></td>
        <td style="width:60px;" >Hoạt động</td>
        </form>
  </tr>
      <?php 
		// echo layURL();
		$locCL = 0;
		$locLoai = 0;
		if( isset($_GET['loai'])){ 
			
			$locLoai = $_GET['loai'];
		}
		$sl3 = null;

		if( $locLoai == 0){
			$sl3 = "select * from doan_sp";
		}
		
		else {
			$sl3 = "select * from doan_sp where maLoai = $locLoai";
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
		
		while($d = mysqli_fetch_array($kq3))
			{?>
      <tr class='row_18'>
        <td><input type='checkbox' name='id[]' value='18' /></td>
        <td><?php echo $d['maLoai']; ?></td>
        <td><?php echo $d['maSP']; ?></td>
        <td><?php echo $d['tenSP']; ?></td>
        <td><?php echo $d['giaSP']; ?></td>
        <td><?php echo $d['thongTin']; ?></td>
        <td><?php echo $d['hinhAnh']; ?></td>
        <td><?php echo $d['SL']; ?></td>
        
        
        
        <td class="option" style="vertical-align:middle"><a href="suasp.php?id=<?php echo $d['maSP'] ?>&search=<?php echo  $search ?> title="Chỉnh sửa" class="tipS">
          <?php	echo		"<img src='image/edit.png' />";
						echo "</a>";
						
						echo "<a href='xoasp.php' title='Xóa' class='tipS verify_action' >";
						 echo   "<img src='image/delete.png' />";
			
					echo	"</a>";
				echo	"</td>";
				echo "</tr>";
								
		
		
		
		
		
		     };?>
          </thead>
          </tbody>
    </table>
    <?php	/*             
	//Tính page đầu, cuối của nhóm hiện hành: 
	$dau = ($gr - 1 ) * $sn+1; 

	$cuoi = $gr * $sn; 

	if( $cuoi > $tst)

		$cuoi=$tst;
	?>
    <p>Trang:
      <?php
    //Lùi 1 nhóm 
		if($gr>1) {?>
      <a href="untitled.php?gr=<?php echo $gr-1;?>&search=<?php echo $search ?>">&lt;&lt;</a>
      <?php } //In ra các trang từ $dau đến $cuoi của nhóm hiện hành: 
    	for($i=$dau;$i<=$cuoi;$i++){
    		if($page==$i){echo "<b><i>$i</b></i> &nbsp";} 
    		else{
    			?>
      <a href="untitled.php?page=<?php echo $i;?>&search=<?php echo $search ?>"><?php echo $i;?>&nbsp</a>
      <?php }}

    		if($gr<$tsn){?>
      <a href="untitled.php?gr=<?php echo $gr+1;?>&search=<?php echo $search ?>">&gt;&gt;</a>
      <?php }*/
	?>
    <div class='pagination'> </div>
    </td>
    </tr>
    </tfoot>
    <tfoot class="auto_check_pages">
      <tr>
        <td colspan="8"><div class="list_action itemActions"> <a href="#submit" id="submit" class="button blueB" url="admin/product/del_all.html"> <span style='color:white;'>Xóa hết</span> </a> </div>
          <div class='pagination'> </div>
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
<?php
 } else header('location:http://localhost:8080/do-an/index.php'); ?>