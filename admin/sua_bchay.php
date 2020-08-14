<?php
session_start();
//if (isset($_SESSION['admin'])) {
	
	
	
	
	

		$conn = @mysqli_connect("localhost","root","","doan") or die("Không thể kết nối đến sever");
		mysqli_query($conn,"SET NAMES 'utf8'");
		$query="SELECT * FROM doan_sp_banchay ";
	$data = mysqli_query($conn,$query);
	$m= mysqli_fetch_array($data);
		$query1="SELECT * FROM doan_chungloai ";
		$data1 = mysqli_query($conn,$query1);
		$m1= mysqli_fetch_array($data1);
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Sản phẩm bán chạy</title>
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
      <li class="home"> <a href="admin/home.html" class="" > <span>Bảng điều khiển</span> <strong></strong> </a> </li>
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
          <li> <a  href="spmoi.php"> Sản phẩm mới </a> </li>
          <li > <a href="spkm.php"> Sản phẩm khuyến mãi </a> </li>
          <li  class="this"> 
          <a href="skbanchay.php"> Sản phẩm bán chạy
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

<div class="topNav">
  <div class="wrapper">
    <div class="welcome"> <span>Xin chào: <b>admin!</b></span> </div>
    <div class="userNav">
      <ul>
        <li><a href="" target="_blank"> <img style="margin-top:7px;" src="image/home.png" /> <span>Trang chủ</span> </a></li>
        
        <!-- Logout -->
        <li><a href="admin/home/logout.html"> <img src="image/logout.png" alt="" /> <span>Đăng xuất</span> </a></li>
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
        <li><a href="admin/product/add.html"> <img src="image/add.png" /> <span>Thêm mới</span> </a></li>
        <li> <a href="admin/product/?feature=1.html"> <img src="image/feature.png" /> <span>Tiêu biểu</span> </a> </li>
        <li><a href="admin/product.html"> <img src="image/list.png" /> <span>Danh sách</span> </a></li>
      </ul>
    </div>
    <div class="clear"></div>
  </div>
</div>
<div class="line"></div>

<!-- Message --> 

<!-- Main content wrapper -->
<div class="wrapper"> 
    
    <!-- Form -->
    <div class="wrapper"> 
    
    <!-- Form -->
    <form class="form" id="form"  method="post" enctype="multipart/form-data">
      <fieldset>
        <div class="widget">
          <div class="title"> <img src="image/add.png" class="titleIcon" />
            <h6>Sửa sản phẩm bán chạy</h6>
          </div>
          <ul class="tabs">
            <li><a href="#tab1">Thông tin chung</a></li>
            <li><a href="#tab2">SEO Onpage</a></li>
            <li><a href="#tab3">Bài viết</a></li>
          </ul>
          <div class="tab_container">
            <div id='tab1' class="tab_content pd0">
   <?php 
 $conn = @mysqli_connect("localhost","root","","doan") or die("Không thể kết nối đến sever");
		mysqli_query($conn,"SET NAMES 'utf8'");
        $id=$_GET['id'];
		
	$sql="SELECT * FROM doan_sp_banchay where maSP='$id'"; //tìm trong bảng có id lấy được bằng get trùng mã sp thì lấy
	$query=mysqli_query($conn,$sql);
	$row=mysqli_fetch_array($query);//lấy dữ liệu của id đó ra
	?>

<?php  if(isset($_POST['submit']))
{ 


		//update bản wp và set name bằng người dùng nhập,id bằng chinh gười dùng sửa	   
		
		      
		if(empty($_POST['maSP']))
       {//kiểm tra xem có nhập thông tin chưa nếu trống thì echo ra
		              echo '<p style="color:red">Vui lòng không để trống mã sp</p> ';
		}else
		      { $maSP=$_POST['maSP'];
		         if($row['maSP']==$maSP)
			                   { echo "<META http-equiv=\"refresh\" content=0;URL=http://localhost:8080/do-an/admin/spbanchay.php>";
							   }
				else
				               {$add=" update  doan_sp_banchay set maSP='$maSP' where maSP='$id'"   or die("Lỗi truy vấn");
							   $query=mysqli_query($conn,$add);
							   
							   if($query){echo "<META http-equiv=\"refresh\" content=0;URL=http://localhost:8080/do-an/admin/spbanchay.php>";}
							   
							   }
		//update bản wp và set name bằng người dùng nhập,id bằng chinh gười dùng sửa	   
		
		      }	  
			  if(empty($_POST['tenSP']))
       {//kiểm tra xem có nhập thông tin chưa nếu trống thì echo ra
		              echo '<p style="color:red">Vui lòng không để trống tên sản phẩm</p> ';
		}else
		      { $tenSP=$_POST['tenSP'];
		         if($row['tenSP']==$tenSP)
			                   {echo "<META http-equiv=\"refresh\" content=0;URL=http://localhost:8080/do-an/admin/spbanchay.php>";
							   }
				else
				               {$add=" update  doan_sp_banchay set tenSP='$tenSP' where maSP='$id'"   or die("Lỗi truy vấn");
							   $query=mysqli_query($conn,$add);
							   
							   if($query){echo "<META http-equiv=\"refresh\" content=0;URL=http://localhost:8080/do-an/admin/spbanchay.php>";}
							   
							   }
		//update bản wp và set name bằng người dùng nhập,id bằng chinh gười dùng sửa	   
		
		      }	  
			  if(empty($_POST['giaSP']))
       {//kiểm tra xem có nhập thông tin chưa nếu trống thì echo ra
		              echo '<p style="color:red">Vui lòng không để trống giá</p> ';
		}else
		      { $giaSP=$_POST['giaSP'];
		         if($row['giaSP']==$giaSP)
			                   {echo "<META http-equiv=\"refresh\" content=0;URL=http://localhost:8080/do-an/admin/spbanchay.php>";
							   }
				else
				               {$add=" update  doan_sp_banchay set giaSP='$giaSP' where maSP='$id'"   or die("Lỗi truy vấn");
							   $query=mysqli_query($conn,$add);
							   
							   if($query){echo "<META http-equiv=\"refresh\" content=0;URL=http://localhost:8080/do-an/admin/spbanchay.php>";}
							   
							   }
		//update bản wp và set name bằng người dùng nhập,id bằng chinh gười dùng sửa	   
		
		      }	  
			  if(empty($_POST['thongTin']))
       {//kiểm tra xem có nhập thông tin chưa nếu trống thì echo ra
		              echo '<p style="color:red">Vui lòng không để trống thông tin</p> ';
		}else
		      { $thongTin=$_POST['thongTin'];
		         if($row['thongTin']==$thongTin)
			                   { echo "<META http-equiv=\"refresh\" content=0;URL=http://localhost:8080/do-an/admin/spbanchay.php>";
							   }
				else
				               {$add=" update  doan_sp_banchay set thongTin='$thongTin' where maSP='$id'"   or die("Lỗi truy vấn");
							   $query=mysqli_query($conn,$add);
							   
							   if($query){echo "<META http-equiv=\"refresh\" content=0;URL=http://localhost:8080/do-an/admin/spbanchay.php>";}
							   
							   }
		//update bản wp và set name bằng người dùng nhập,id bằng chinh gười dùng sửa	   
		
		      }	  
			  if(empty($_POST['hinhAnh']))
       {//kiểm tra xem có nhập thông tin chưa nếu trống thì echo ra
		              echo '<p style="color:red">Vui lòng không để trống hình ảnh</p> ';
		}else

		      { $hinhAnh=$_POST['hinhAnh'];
		         if($row['hinhAnh']==$hinhAnh)
			                   { echo "<META http-equiv=\"refresh\" content=0;URL=http://localhost:8080/do-an/admin/spbanchay.php>";
							   }
				else
				               {$add=" update  doan_sp_banchay set hinhAnh='$hinhAnh' where maSP='$id'"   or die("Lỗi truy vấn");
							   $query=mysqli_query($conn,$add);
							   
							   if($query){echo "<META http-equiv=\"refresh\" content=0;URL=http://localhost:8080/do-an/admin/spbanchay.php>";}
							   
							   }
		//update bản wp và set name bằng người dùng nhập,id bằng chinh gười dùng sửa	   
		
		      
		 if(empty($_POST['SL']))
       {//kiểm tra xem có nhập thông tin chưa nếu trống thì echo ra
		              echo '<p style="color:red">Vui lòng không để trống hình ảnh</p> ';
		}else
		      { $SL=$_POST['SL'];
		         if($row['SL']==$SL)
			                   { echo "<META http-equiv=\"refresh\" content=0;URL=http://localhost:8080/do-an/admin/spbanchay.php>";
							   }
				else
				               {$add=" update  doan_sp_banchay set SL='$SL' where maSP='$id'"   or die("Lỗi truy vấn");
							   $query=mysqli_query($conn,$add);
							   
							   if($query){echo "<META http-equiv=\"refresh\" content=0;URL=http://localhost:8080/do-an/admin/spbanchay.php>";}
							   
							   }
			  }}}?>
                    <div class="formRow">
                <label class="formLeft" for="param_name">Mã loại:<span class="req">*</span></label>
                <div class="formRight"> <span class="oneTwo">
                  <input name="maLoai" id="param_name" _autocheck="true" type="text"  value="<?php echo $row['maLoai']?>"/>
                  </span> <span name="name_autocheck" class="autocheck"></span>
                  <div name="name_error" class="clear error"></div>
                </div>
                <div class="clear"></div>
              </div>
       <div class="formRow">
                <label class="formLeft" for="param_name">Mã sản phẩm:<span class="req">*</span></label>
                <div class="formRight"> <span class="oneTwo">
                  <input name="maSP" id="param_name" _autocheck="true" type="text"  value="<?php echo $row['maSP']?>"/>
                  </span> <span name="name_autocheck" class="autocheck"></span>
                  <div name="name_error" class="clear error"></div>
                </div>
                <div class="clear"></div>
              </div>
       <div class="formRow">
                <label class="formLeft" for="param_name">Tên sản phẩm:<span class="req">*</span></label>
                <div class="formRight"> <span class="oneTwo">
                  <input name="tenSP" id="param_name" _autocheck="true" type="text"  value="<?php echo $row['tenSP']?>"/>
                  </span> <span name="name_autocheck" class="autocheck"></span>
                  <div name="name_error" class="clear error"></div>
                </div>
                <div class="clear"></div>
              </div>
     <div class="formRow">
                <label class="formLeft" for="param_name">Giá sản phẩm:<span class="req">*</span></label>
                <div class="formRight"> <span class="oneTwo">
                  <input name="giaSP" id="param_name" _autocheck="true" type="number"  value="<?php echo $row['giaSP']?>"/>
                  </span> <span name="name_autocheck" class="autocheck"></span>
                  <div name="name_error" class="clear error"></div>
                </div>
                <div class="clear"></div>
              </div>
      <div class="formRow">
                <label class="formLeft" for="param_name">Thông tin:<span class="req">*</span></label>
                <div class="formRight"> <span class="oneTwo">
                  <input name="thongTin" id="param_name" _autocheck="true" type="text"  value="<?php echo $row['thongTin']?>"/>
                  </span> <span name="name_autocheck" class="autocheck"></span>
                  <div name="name_error" class="clear error"></div>
                </div>
                <div class="clear"></div>
              </div>
      <div class="formRow">
                <label class="formLeft" for="param_name">Hình ảnh:<span class="req">*</span></label>
                <div class="formRight"> <span class="oneTwo">
                  <input name="hinhAnh" id="param_name" _autocheck="true" type="url"  value="<?php echo $row['hinhAnh']?>"/>
                  </span> <span name="name_autocheck" class="autocheck"></span>
                  <div name="name_error" class="clear error"></div>
                </div>
                <div class="clear"></div>
              </div>
      <div class="formRow">
                <label class="formLeft" for="param_name">Số lượng:<span class="req">*</span></label>
                <div class="formRight"> <span class="oneTwo">
                  <input name="SL" id="param_name" _autocheck="true" type="number"  value="<?php echo $row['SL']?>"/>
                  </span> <span name="name_autocheck" class="autocheck"></span>
                  <div name="name_error" class="clear error"></div>
                </div>
                <div class="clear"></div>
              </div>
    
          <div class="formSubmit">
            <input type="submit" value="Sửa bán chạy " class="redB" name="submit" />
            <input type="reset" value="Hủy bỏ" class="basic" />
          </div>
          <div class="clear"></div>
        </div>
      </fieldset>
   
  </div>
  <div class="clear mt30"></div>
  </div>
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