<?php
require '../conn/conn.php';
require '../conn/function.php';
require 'admin_check.php';

if(checkauth()){
	plug("x8","../conn/plug/");
	require "../conn/plug/x8.php";
}else{
	die("{\"msg\":\"免费版暂不支持回收站功能\"}");
}

$page=$_GET["page"];
if($page==""){
	$page=1;
}

$action=$_GET["action"];


if($action=="delallx"){
	mysqli_query($conn,"delete from sl_address where A_del=1");
	mysqli_query($conn,"delete from sl_admin where A_del=1");
	mysqli_query($conn,"delete from sl_card where C_del=1");
	mysqli_query($conn,"delete from sl_rcard where R_del=1");
	mysqli_query($conn,"delete from sl_csort where S_del=1");
	mysqli_query($conn,"delete from sl_guestbook where G_del=1");
	mysqli_query($conn,"delete from sl_link where L_del=1");
	mysqli_query($conn,"delete from sl_list where L_del=1");
	mysqli_query($conn,"delete from sl_log where L_del=1");
	mysqli_query($conn,"delete from sl_member where M_del=1");
	mysqli_query($conn,"delete from sl_menu where U_del=1");
	mysqli_query($conn,"delete from sl_news where N_del=1");
	mysqli_query($conn,"delete from sl_course where C_del=1");
	mysqli_query($conn,"delete from sl_usort where S_del=1");
	mysqli_query($conn,"delete from sl_nsort where S_del=1");
	mysqli_query($conn,"delete from sl_orders where O_del=1");
	mysqli_query($conn,"delete from sl_psort where S_del=1");
	mysqli_query($conn,"delete from sl_product where P_del=1");
	mysqli_query($conn,"delete from sl_slide where S_del=1");
	mysqli_query($conn,"delete from sl_quan where Q_del=1");
	mysqli_query($conn,"delete from sl_text where T_del=1");
	die("success");
}
if($action=="clear"){
	/*
	$pic="|";
	$sql="select * from sl_text";
	$result = mysqli_query($conn,  $sql);
	if (mysqli_num_rows($result) > 0) {
	while($row = mysqli_fetch_assoc($result)) {
	        $pic=$pic.$row["T_pic"]."|";
	    }
	} 

	$sql="select * from sl_news";
	$result = mysqli_query($conn,  $sql);
	if (mysqli_num_rows($result) > 0) {
	while($row = mysqli_fetch_assoc($result)) {
	        $pic=$pic.$row["N_pic"]."|";
		    if($row["N_video"]!=""){
		        $pic=$pic.$row["N_video"]."|";
		    }
	    }
	} 

	$sql="select * from sl_product";
	$result = mysqli_query($conn,  $sql);
	if (mysqli_num_rows($result) > 0) {
	while($row = mysqli_fetch_assoc($result)) {
	        $pic=$pic.$row["P_pic"]."|";
	        if($row["P_video"]!=""){
		        $pic=$pic.$row["P_video"]."|";
		    }
	    }
	} 

	$sql="select * from sl_nsort";
	$result = mysqli_query($conn,  $sql);
	if (mysqli_num_rows($result) > 0) {
	while($row = mysqli_fetch_assoc($result)) {
	        $pic=$pic.$row["S_pic"]."|";
	    }
	} 

	$sql="select * from sl_psort";
	$result = mysqli_query($conn,  $sql);
	if (mysqli_num_rows($result) > 0) {
	while($row = mysqli_fetch_assoc($result)) {
	        $pic=$pic.$row["S_pic"]."|";
	    }
	} 

	$sql="select * from sl_slide";
	$result = mysqli_query($conn,  $sql);
	if (mysqli_num_rows($result) > 0) {
	while($row = mysqli_fetch_assoc($result)) {
	        $pic=$pic.$row["S_pic"]."|";
	    }
	} 

	$sql="select * from sl_link";
	$result = mysqli_query($conn,  $sql);
	if (mysqli_num_rows($result) > 0) {
	while($row = mysqli_fetch_assoc($result)) {
	        $pic=$pic.$row["L_pic"]."|";
	    }
	} 

	$sql="select * from sl_member";
	$result = mysqli_query($conn,  $sql);
	if (mysqli_num_rows($result) > 0) {
	while($row = mysqli_fetch_assoc($result)) {
	        $pic=$pic.$row["M_head"]."|";
	    }
	} 

	$sql="select * from sl_admin";
	$result = mysqli_query($conn,  $sql);
	if (mysqli_num_rows($result) > 0) {
	while($row = mysqli_fetch_assoc($result)) {
	        $pic=$pic.$row["A_head"]."|";
	    }
	} 
	$pic=$pic."$C_logo|$C_ico|$C_qrcode|nopic.png|admin.jpg|img.php|";

	//删除media文件夹里用不到的文件
	$handler=opendir('../media/');
	while(($filename = readdir($handler)) !== false ) {
		if($filename != "." && $filename != ".."){  
			if(strpos($pic,"|$filename|")===false){
				unlink("../media/$filename");
			}
		}
	}
*/

	//清理无上级的商品
	mysqli_query($conn,"delete from sl_product where not P_sort in (select S_id from sl_psort where not S_sub=0)");
	//清理无上级的新闻
	mysqli_query($conn,"delete from sl_news where not N_sort in (select S_id from sl_nsort where not S_sub=0)");
	//清理无上级的卡密
	mysqli_query($conn,"delete from sl_card where not C_sort in (select S_id from sl_csort)");
	//清理无上级的商品子分类
	mysqli_query($conn,"delete from sl_psort where not S_sub in (select S_id from sl_psort where S_sub=0)");
	//清理无上级的新闻子分类
	mysqli_query($conn,"delete from sl_nsort where not S_sub in (select S_id from sl_nsort where S_sub=0)");
	//清理无上级的子菜单
	mysqli_query($conn,"delete from sl_menu where not U_sub in (select U_id from sl_menu where U_sub=0)");

	die("success");

}


$sql="select count(*) as L_count from
(select A_id as id,A_address as title,'nopic.png' as pic,'address_A' as type,'收货地址' as tag from sl_address where A_del=1
union select A_id as id,A_login as title,A_head as pic,'admin_A' as type,'管理员' as tag from sl_admin where A_del=1
union select C_id as id,C_content as title,'nopic.png' as pic,'card_C' as type,'卡密' as tag from sl_card where C_del=1
union select R_id as id,R_content as title,'nopic.png' as pic,'rcard_R' as type,'充值卡' as tag from sl_rcard where R_del=1
union select S_id as id,S_title as title,'nopic.png' as pic,'csort_S' as type,'卡密分类' as tag from sl_csort where S_del=1
union select G_id as id,G_title as title,'nopic.png' as pic,'guestbook_G' as type,'在线留言' as tag from sl_guestbook where G_del=1
union select L_id as id,L_title as title,L_pic as pic,'link_L' as type,'友链' as tag from sl_link where L_del=1
union select L_id as id,L_title as title,'nopic.png' as pic,'list_L' as type,'资金明细' as tag from sl_list where L_del=1
union select L_id as id,L_title as title,'nopic.png' as pic,'log_L' as type,'操作记录' as tag from sl_log where L_del=1
union select M_id as id,M_login as title,M_head as pic,'member_M' as type,'会员帐号' as tag from sl_member where M_del=1
union select U_id as id,U_title as title,'nopic.png' as pic,'menu_U' as type,'菜单' as tag from sl_menu where U_del=1
union select N_id as id,N_title as title,N_pic as pic,'news_N' as type,'文章' as tag from sl_news where N_del=1
union select C_id as id,C_title as title,C_pic as pic,'course_C' as type,'课程' as tag from sl_course where C_del=1
union select S_id as id,S_title as title,S_pic as pic,'usort_S' as type,'课程分类' as tag from sl_usort where S_del=1
union select S_id as id,S_title as title,S_pic as pic,'nsort_S' as type,'文章分类' as tag from sl_nsort where S_del=1
union select O_id as id,O_title as title,O_pic as pic,'orders_O' as type,'订单记录' as tag from sl_orders where O_del=1
union select P_id as id,P_title as title,P_pic as pic,'product_P' as type,'商品' as tag from sl_product where P_del=1
union select S_id as id,S_title as title,S_pic as pic,'psort_S' as type,'商品分类' as tag from sl_psort where S_del=1
union select S_id as id,S_title as title,S_pic as pic,'slide_S' as type,'焦点图' as tag from sl_slide where S_del=1
union select Q_id as id,Q_title as title,'nopic.png' as pic,'quan_Q' as type,'优惠券' as tag from sl_quan where Q_del=1
union select T_id as id,T_title as title,T_pic as pic,'text_T' as type,'单页' as tag from sl_text where T_del=1)a";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$L_count=$row["L_count"];
?>

<!DOCTYPE html>
<html lang="en">
	<head>

		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>回收站管理 - 后台管理</title>

		<!--favicon -->
		<link rel="icon" href="../media/<?php echo $C_ico?>" type="image/x-icon"/>

		<!--Bootstrap.min css-->
		<link rel="stylesheet" href="assets/plugins/bootstrap/css/bootstrap.min.css">

		<!--Icons css-->
		<link rel="stylesheet" href="assets/css/icons.css">

		<!--Style css-->
		<link rel="stylesheet" href="assets/css/style.css">

		<!--mCustomScrollbar css-->
		<link rel="stylesheet" href="assets/plugins/scroll-bar/jquery.mCustomScrollbar.css">

		<!--Sidemenu css-->
		<link rel="stylesheet" href="assets/plugins/toggle-menu/sidemenu.css">

		<!--Morris css-->


		<!--Toastr css-->
		<link rel="stylesheet" href="assets/plugins/toastr/build/toastr.css">


	</head>

	<body class="app ">

		<div id="spinner"></div>

		<div id="app">
			<div class="main-wrapper" >
				
					<?php
					require 'nav.php';
					?>

				<div class="app-content">
					<section class="section">

						<button class="btn btn-info pull-right" style="z-index: 2;position: relative;" onclick="clearx();">清理冗余数据</button>
                    	<ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.php">后台管理</a></li>
                            <li class="breadcrumb-item active" aria-current="page">回收站管理</li>
                        </ol>

						<div class="section-body ">

							<div class="row">
								<div class="col-lg-12">
									<form id="form">
									<div class="card card-primary">

										<div class="card-header">
											<h4>回收站管理</h4>
										</div>
										<div class="card-body p-0">
											<div class="table-responsive">
												<table class="table table-striped mb-0 text-nowrap">
													<tr>
														<th>选择</th>
														<th>名称</th>
														<th>类型</th>
														<th>图片</th>
														<th>恢复</th>
														<th>删除</th>
													</tr>

<?php
$sql="select id,title,pic,type,tag from (select A_id as id,A_address as title,'nopic.png' as pic,'address_A' as type,'收货地址' as tag from sl_address where A_del=1
union select A_id as id,A_login as title,A_head as pic,'admin_A' as type,'管理员' as tag from sl_admin where A_del=1
union select C_id as id,C_content as title,'nopic.png' as pic,'card_C' as type,'卡密' as tag from sl_card where C_del=1
union select R_id as id,R_content as title,'nopic.png' as pic,'rcard_R' as type,'充值卡' as tag from sl_rcard where R_del=1
union select S_id as id,S_title as title,'nopic.png' as pic,'csort_S' as type,'卡密分类' as tag from sl_csort where S_del=1
union select G_id as id,G_title as title,'nopic.png' as pic,'guestbook_G' as type,'在线留言' as tag from sl_guestbook where G_del=1
union select L_id as id,L_title as title,L_pic as pic,'link_L' as type,'友链' as tag from sl_link where L_del=1
union select L_id as id,L_title as title,'nopic.png' as pic,'list_L' as type,'资金明细' as tag from sl_list where L_del=1
union select L_id as id,L_title as title,'nopic.png' as pic,'log_L' as type,'操作记录' as tag from sl_log where L_del=1
union select M_id as id,M_login as title,M_head as pic,'member_M' as type,'会员帐号' as tag from sl_member where M_del=1
union select U_id as id,U_title as title,'nopic.png' as pic,'menu_U' as type,'菜单' as tag from sl_menu where U_del=1
union select N_id as id,N_title as title,N_pic as pic,'news_N' as type,'文章' as tag from sl_news where N_del=1
union select S_id as id,S_title as title,S_pic as pic,'nsort_S' as type,'文章分类' as tag from sl_nsort where S_del=1
union select C_id as id,C_title as title,C_pic as pic,'course_C' as type,'课程' as tag from sl_course where C_del=1
union select S_id as id,S_title as title,S_pic as pic,'usort_S' as type,'课程分类' as tag from sl_usort where S_del=1
union select O_id as id,O_title as title,O_pic as pic,'orders_O' as type,'订单记录' as tag from sl_orders where O_del=1
union select P_id as id,P_title as title,P_pic as pic,'product_P' as type,'商品' as tag from sl_product where P_del=1
union select S_id as id,S_title as title,S_pic as pic,'psort_S' as type,'商品分类' as tag from sl_psort where S_del=1
union select S_id as id,S_title as title,S_pic as pic,'slide_S' as type,'焦点图' as tag from sl_slide where S_del=1
union select Q_id as id,CONCAT(Q_title,'-',Q_code) as title,'nopic.png' as pic,'quan_Q' as type,'优惠券' as tag from sl_quan where Q_del=1
union select T_id as id,T_title as title,T_pic as pic,'text_T' as type,'单页' as tag from sl_text where T_del=1)a limit ".(($page-1)*20).",20";

$result = mysqli_query($conn,  $sql);
if (mysqli_num_rows($result) > 0) {
while($row = mysqli_fetch_assoc($result)) {
        echo "<tr><td><input type=\"checkbox\" name=\"id[]\" value=\"".$row["type"]."_".$row["id"]."\"></td><td>".$row["title"]."</td><td><b>".$row["tag"]."</b></td><td><img src=\"../media/".splitx($row["pic"],"|",0)."\" height=\"50\"></td><td><button class='btn btn-sm btn-info' type='button' onClick=\"recycle('".$row["type"]."_".$row["id"]."')\"><i class=\"fa fa-recycle\"></i> 恢复</button></td><td><button class='btn btn-sm btn-danger' type='button' onClick=\"del('".$row["type"]."_".$row["id"]."')\"><i class=\"fa fa-times-circle\"></i> 彻底删除</button></td></tr>";
    }
} 
?>

												</table>
											</div>
										</div>
									</div>
<label><input type="checkbox" id="selectAll" name="selectAll"> 全选</label>
<button class="btn btn-sm btn-danger" type="button" onClick="delall()"><i class="fa fa-times-circle" ></i> 删除所选</button>
<button class="btn btn-sm btn-primary" type="button" onClick="delallx()"><i class="fa fa-times-circle" ></i> 清空回收站</button>
<button class="btn btn-sm btn-info" type="button" onClick="recycleall()"><i class="fa fa-times-circle" ></i> 恢复所选</button>
<ul class="pagination" id="pagination" style="float: right;"></ul>
</form>
								</div>
								
							</div>
						</div>
<input type="hidden" id="PageCount" runat="server" />
        <input type="hidden" id="PageSize" runat="server" value="20" />
        <input type="hidden" id="countindex" runat="server" value="20"/>
        <!--设置最多显示的页码数 可以手动设置 默认为7-->
        <input type="hidden" id="visiblePages" runat="server" value="7" />
					</section>
				</div>

			</div>
		</div>

		<!--Jquery.min js-->
		<script src="assets/js/jquery.min.js"></script>

		<!--popper js-->
		<script src="assets/js/popper.js"></script>

		<!--Tooltip js-->
		<script src="assets/js/tooltip.js"></script>

		<script src="assets/js/help.js"></script>

		<!--Bootstrap.min js-->
		<script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>

		<!--Jquery.nicescroll.min js-->


		<!--mCustomScrollbar js-->
		<script src="assets/plugins/scroll-bar/jquery.mCustomScrollbar.concat.min.js"></script>

		<!--Scroll-up-bar.min js-->


		<!--Sidemenu js-->
		<script src="assets/plugins/toggle-menu/sidemenu.js"></script>

		<!--Scripts js-->
		<script src="assets/js/scripts.js"></script>

		<script src="assets/plugins/toastr/build/toastr.min.js"></script>



		<script src="assets/js/jqPaginator.min.js" type="text/javascript"></script>
		<script>
function loadData(num) {
            $("#PageCount").val("<?php echo $L_count?>");
        }
function loadpage(id) {
    var myPageCount = parseInt($("#PageCount").val());
    var myPageSize = parseInt($("#PageSize").val());
    var countindex = myPageCount % myPageSize > 0 ? (myPageCount / myPageSize) + 1 : (myPageCount / myPageSize);
    $("#countindex").val(countindex);

    $.jqPaginator('#pagination', {
        totalPages: parseInt($("#countindex").val()),
        visiblePages: parseInt($("#visiblePages").val()),
        currentPage: id,
        first: '<li class="first page-item"><a href="javascript:;" class="page-link">首页</a></li>',
        prev: '<li class="prev page-item"><a href="javascript:;" class="page-link"><i class="arrow arrow2"></i>上一页</a></li>',
        next: '<li class="next page-item"><a href="javascript:;" class="page-link">下一页<i class="arrow arrow3"></i></a></li>',
        last: '<li class="last page-item"><a href="javascript:;" class="page-link">末页</a></li>',
        page: '<li class="page page-item"><a href="javascript:;" class="page-link">{{page}}</a></li>',
        onPageChange: function (num, type) {
            if (type == "change") {
                window.location="?page="+num;
            }
        }
    });
}
$(function () {
    loadData(<?php echo $page?>);
    loadpage(<?php echo $page?>);

});


function del(id){
			if (confirm("确定删除吗？")==true){
                $.ajax({
            	url:'?action=del&id='+id,
            	type:'post',
            	success:function (data) {
            	if(data=="success"){
            		location.reload();
            	}else{
            		toastr.error(data, '错误');
            	}
            	}
            });
                return true;
            }else{
                return false;
            }
}


function delallx(){
			if (confirm("确定清空回收站吗？")==true){
                $.ajax({
            	url:'?action=delallx',
            	type:'post',
            	success:function (data) {
            	if(data=="success"){
            		location.reload();
            	}else{
            		toastr.error(data, '错误');
            	}
            	}
            });
                return true;
            }else{
                return false;
            }
}


function recycle(id){
			if (confirm("确定恢复吗？")==true){
                $.ajax({
            	url:'?action=recycle&id='+id,
            	type:'post',
            	success:function (data) {
            	if(data=="success"){
            		location.reload();
            	}else{
            		toastr.error(data, '错误');
            	}
            	}
            });
                return true;
            }else{
                return false;
            }
}

function delall(){
				$.ajax({
            	url:'?action=delall',
            	type:'post',
            	data:$("#form").serialize(),
            	success:function (data) {
            	if(data=="success"){
            		location.reload();
            	}else{
            		toastr.error(data, '错误');
            	}
            	}
            });

		}

function recycleall(){
				$.ajax({
            	url:'?action=recycleall',
            	type:'post',
            	data:$("#form").serialize(),
            	success:function (data) {
            	if(data=="success"){
            		location.reload();
            	}else{
            		toastr.error(data, '错误');
            	}
            	}
            });

		}
function clearx(){
			if(window.confirm('清理冗余数据说明：\r1.清理没有用的图片，节省本地空间\r2.清理没有分类的新闻，商品，卡密\r3.清理没有上级分类的新闻子分类，商品子分类\r4.清理没有上级菜单的子菜单')){
				$.ajax({
	            	url:'?action=clear',
	            	type:'get',
	            	success:function (data) {
		            	if(data=="success"){
		            		toastr.success("清理完成", '成功');
		            	}else{
		            		toastr.error(data, '错误');
		            	}
	            	}
	            });
              }else{
                 return false;
             }
}

$('input[name="selectAll"]').on("click",function(){
        if($(this).is(':checked')){
            $('input[name="id[]"]').each(function(){
                $(this).prop("checked",true);
            });
        }else{
            $('input[name="id[]"]').each(function(){
                $(this).prop("checked",false);
            });
        }
    });
		</script>
	</body>
</html>