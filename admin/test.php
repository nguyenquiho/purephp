
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
			
<div class="sideProfile">
	<a href="#" title="" class="profileFace"><img width="40" src="image/user.png" /></a>
	<span>Xin chào: <strong>admin!</strong></span>
	<span><?php echo $_SESSION['admin'] ?></span>
	<div class="clear"></div>
</div>
<div class="sidebarSep"></div>		    
		    <!-- Left navigation -->
			
<ul id="menu" class="nav">

			<li class="home">
		
			<a href="admin/home.html" class="" >
				<span>Bảng điều khiển</span>
				<strong></strong>
			</a>
			
						
		</li>
			<li class="tran">
		
			<a href="admin/tran.html" class=" exp" >
				<span>Chủng loại</span>
				<strong>5</strong>
			</a>
			
					
						
		</li>
        <li class="tran">
		
			<a href="admin/tran.html" class=" exp" >
				<span>Loại sản phẩm</span>
				<strong>16</strong>
			</a>
			
						
		</li>
			<li class="product">
		
			<a href="admin/product.html" class="active exp" id="current">
				<span>Sản phẩm</span>
				<strong>5</strong>
			</a>
			
							<ul class="sub">
											<li >
							<a href="admin/product.html">
								Sản phẩm mới							</a>
						</li>
											<li class="this">
							<a href="admin/cat.html">
								Sản phẩm khuyến mãi						</a>
						</li>
											<li >
							<a href="admin/comment.html">
								Sản phẩm bán chạy
                        <li >
							<a href="admin/comment.html">
								Phụ kiện giá tốt						</a>
						</li>
									</ul>
						
		</li>
			<li class="account">
		
			<a href="admin/account.html" class=" exp" >
				<span>Người dùng</span>
				<strong>3</strong>
			</a>
			
							<ul class="sub">
											<li >
							<a href="admin/admin.html">
								Ban quản trị							</a>
						</li>
											<li >
							<a href="admin/admin_group.html">
								Nhóm quản trị							</a>
						</li>
											<li >
							<a href="admin/user.html">
								Thành viên							</a>
						</li>
									</ul>
						
		</li>
			<li class="support">
		
			<a href="admin/support.html" class=" exp" >
				<span>Đơn hàng</span>
				<strong>2</strong>
			</a>
			
							<ul class="sub">
											<li >
							<a href="admin/support.html">
								Hỗ trợ							</a>
						</li>
											<li >
							<a href="admin/contact.html">
								Liên hệ							</a>
						</li>
									</ul>
						
		</li>
			<li class="content">
		
			<a href="admin/content.html" class=" exp" >
				<span>Nội dung</span>
				<strong>4</strong>
			</a>
			
							<ul class="sub">
											<li >
							<a href="admin/slide.html">
								Slide							</a>
						</li>
											<li >
							<a href="admin/news.html">
								Tin tức							</a>
						</li>
											<li >
							<a href="admin/info.html">
								Trang thông tin							</a>
						</li>
											<li >
							<a href="admin/video.html">
								Video							</a>
						</li>
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
		<div class="welcome">
			<span>Xin chào: <b>admin!</b></span>
		</div>
		
		<div class="userNav">
			<ul>
				<li><a href="" target="_blank">
					<img style="margin-top:7px;" src="image/home.png" />
					<span>Trang chủ</span>
				</a></li>
				
				<!-- Logout -->
				<li><a href="admin/home/logout.html">
					<img src="image/logout.png" alt="" />
					<span>Đăng xuất</span>
				</a></li>
				
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
			<span>Quản lý sản phẩm</span>
		</div>
		
		<div class="horControlB menu_action">
			<ul>
				<li><a href="admin/product/add.html">
					<img src="image/add.png" />
					<span>Thêm mới</span>
				</a></li>
			
				<li>
					<a href="admin/product/?feature=1.html">
						<img src="image/feature.png" />
						<span>Tiêu biểu</span>
					</a>
				</li>

				<li><a href="admin/product.html">
					<img src="image/list.png" />
					<span>Danh sách</span>
				</a></li>
				
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
	
		<div class="title">
			<span class="titleIcon"><input type="checkbox" id="titleCheck" name="titleCheck" /></span>
			<h6>
				Danh sách sản phẩm			</h6>
		 	<div class="num f12">Số lượng: <b>0</b></div>
		</div>
		
		<table cellpadding="0" cellspacing="0" width="100%" class="sTable mTable myTable" id="checkAll">
			
			<thead class="filter"><tr><td colspan="9">
				<form class="list_filter form" action="test.php" method="get">
					<table cellpadding="0" cellspacing="0" width="80%"><tbody>
					
						<tr>
							
							
							<td class="label" style="width:70px;"><label for="filter_id">Tên sản phẩm</label></td>
							<td class="item" style="width:200px;" >
			<input type="text" name="search" placeholder="Tìm kiếm">
			
		</form></td>
							
							
																		      <!-- kiem tra danh muc co danh muc con hay khong -->
			
					
																	</select>
							</td>
							
							<td style='width:150px'>
					
                            <input type="submit" class="button blueB" value="Tìm">
							<input type="reset" class="basic" value="Reset" onclick="window.location.href = 'test.php'; ">
							</td>
							
						</tr>
					</tbody></table>
				</form> <?php

		if(isset($_GET['search'])){
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
	$kq=mysqli_query($conn,"select * from doan_sp where thongTin like '%$search%' limit $vitri,$sd");?>
			
			
			<thead>
				<tr>
					  <td style="width:21px;"><img src="image/tableArrows.png" /></td>
					<td style="width:60px;">Mã loại</td>
					<td>Mã sản phẩm</td>
					<td>Tên sản phẩm</td>
					<td >Giá sản phẩm</td>
					<td>Thông tin</td>
                    <td >Hình ảnh</td>
                    <td >Số lượng</td>
                    <td >Hành động</td>
				</tr><tbody class="list_item">
            <?php while($m= mysqli_fetch_array($kq))
			{
		  			   echo  "<tr class='row_18'>";
			     echo "   <td><input type='checkbox' name='id[]' value='18' /></td>";
					
					echo "<td>".$m['maLoai']."</td>";  
					echo"<td>".$m['maSP']."</td>";
					echo "<td>".$m['tenSP']."</td>";
					echo "<td>".$m['giaSP']."</td>";
					echo "<td>".$m['thongTin']."</td>";
					echo "<td>".$m['hinhAnh']."</td>";
					echo "<td>".$m['SL']."</td>";
					echo "<td class='option'>";
					echo	"<a href='../do-an/themSP/sualoai.php?id=".$m['maLoai']."' title='Chỉnh sửa' class='tipS '>";
					echo		"<img src='image/edit.png' />";
						echo "</a>";
						
						echo "<a href='admin/cat/del/18.html' title='Xóa' class='tipS verify_action' >";
						 echo   "<img src='image/delete.png' />";
			
					echo	"</a>";
				echo	"</td>";
				echo "</tr>";
								
		
		
		
		
		
		     };?>
             </thead>
             </tbody>
			</table>	<?php	             
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
    	<a href="test.php?gr=<?php echo $gr-1;?>&search=<?php echo $search ?>">&lt;&lt;</a><?php } //In ra các trang từ $dau đến $cuoi của nhóm hiện hành: 
    	for($i=$dau;$i<=$cuoi;$i++){
    		if($page==$i){echo "<b><i>$i</b></i> &nbsp";} 
    		else{
    			?> <a href="test.php?page=<?php echo $i;?>&search=<?php echo $search ?>"><?php echo $i;?>&nbsp</a>
    		<?php }}

    		if($gr<$tsn){?>
    			<a href="test.php?gr=<?php echo $gr+1;?>&search=<?php echo $search ?>">&gt;&gt;</a>
    			<?php }}
	?> 
					     <div class='pagination'>
			               			            </div>
					</td>
				</tr>
			</tfoot>
			
			
			
 			<tfoot class="auto_check_pages">
				<tr>
					<td colspan="8">
						 <div class="list_action itemActions">
								<a href="#submit" id="submit" class="button blueB" url="admin/product/del_all.html">
									<span style='color:white;'>Xóa hết</span>
								</a>
						 </div>
							  <div class='pagination'>
	
		        			
			
		
	</div>
	
</div>		<div class="clear mt30"></div>
		
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