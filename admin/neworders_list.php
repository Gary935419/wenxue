<?php
require '../conn/conn.php';
require '../conn/function.php';
require 'admin_check.php';

$page=$_GET["page"];
$action=$_GET["action"];

$keyword=t($_REQUEST["keyword"]);
$start=t($_REQUEST["start"]);
$end=t($_REQUEST["end"]);

$O_id=intval($_GET["O_id"]);
$M_id=intval($_GET["M_id"]);
$state=intval($_GET["state"]);

if($state==0){
	$state_info="";
}else{
	if($state==2){
		$state_info=" and O_state=0";
	}else{
		$state_info=" and O_state>0";
	}
}

if($M_id>0){
	$M_info=" and O_mid=$M_id";
}else{
	$M_info="";
}

if($page==""){
	$page=1;
}

function utfToGbk($data){
    return iconv('utf-8', 'GBK', $data);
}
switch($action){
	case "search":
	$sql="select count(O_id) as O_count from sl_orders,sl_member where O_mid=M_id ".$state_info." and O_del=0 and (O_title like '%".$keyword."%' or O_address like '%".$keyword."%' or M_login like '%".$keyword."%' or M_qq like '%".$keyword."%' or M_email like '%".$keyword."%' or M_mobile like '%".$keyword."%') and (not O_bz='虚拟' or ISNULL(O_bz)=1) ".$M_info;
	break;
	case "search2":
	$sql="select count(O_id) as O_count from sl_orders,sl_member where O_mid=M_id ".$state_info." and O_del=0 and date(O_time) between '".$start."' and '".$end."' and (not O_bz='虚拟' or ISNULL(O_bz)=1) ".$M_info;
	break;
	default:
	    $sql="select count(id) as O_count from sl_neworders,sl_member where mid=M_id";
	    break;
// 	$sql="select count(O_id) as O_count from sl_orders,sl_member where O_mid=M_id ".$state_info." and O_del=0 and (not O_bz='虚拟' or ISNULL(O_bz)=1) ".$M_info;
// 	break;
}

$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$O_count=$row["O_count"];
?>

<!DOCTYPE html>
<html lang="en">
	<head>

		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>购买明细 - 后台管理</title>

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
		<link rel="stylesheet" href="assets/plugins/morris/morris.css">

		<!--Toastr css-->
		<link rel="stylesheet" href="assets/plugins/toastr/build/toastr.css">
		<link rel="stylesheet" href="assets/plugins/toaster/garessi-notif.css">


		
	</head>

	<body class="app ">

		<div id="spinner"></div>

		<div id="app">
			<div class="main-wrapper" >
				
					<?php
					require 'nav.php';
					?>


				<div class="app-content">
<!--					<a href="recycle.php" class="btn btn-sm btn-primary pull-right" style="z-index: 2;position: relative;"><i class="fa fa-recycle"></i> 回收站</a>-->

<!--					<form class="input-group pull-right" style="width: 300px;z-index: 2;position: relative;margin-right: 5px;" method="post" action="?action=search">-->
<!--	                    <input type="text" class="form-control input-sm" name="keyword" value="--><?php //echo $keyword?><!--" placeholder="搜索订单">-->
<!--	                    <span class="input-group-btn">-->
<!--	                        <button class="btn btn-info btn-sm" type="submit"><i class="fa fa-search"></i> 搜索</button>-->
<!--	                    </span>-->
<!--	                </form>-->
<!---->
<!--	                <form class="input-group pull-right" style="width: 410px;z-index: 2;position: relative;margin-right: 5px;" method="post" action="?action=search2">-->
<!--	                    <input type="date" class="form-control input-sm" name="start" value="--><?php //echo $start?><!--" placeholder="起始"> -->
<!--	                    <div style="padding: 5px;">-</div>-->
<!--	                    <input type="date" class="form-control input-sm" name="end" value="--><?php //echo $end?><!--" placeholder="截止">-->
<!--	                    <span class="input-group-btn">-->
<!--	                        <button class="btn btn-info btn-sm" type="submit"><i class="fa fa-search"></i> 筛选</button>-->
<!--	                    </span>-->
<!--	                </form>-->

					<section class="section">
                    	<ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.php">后台管理</a></li>
                            <li class="breadcrumb-item active" aria-current="page">购买明细</li>
                        </ol>

						<div class="section-body ">

							<div class="row">
								<div class="col-lg-12">
									<form id="form">
									<div class="card card-primary">

										<div class="card-header">
											<h4><?php
											if($M_id>0){
												echo "用户：<b>".getrs("select M_login from sl_member where M_id=".$M_id,"M_login")."</b> 的";
											}
											if($action=="search2"){
												echo "<b>".$start." 至 ".$end."</b> 的";
											}
											if($action=="search"){
												echo "<b>搜索“".$keyword."”</b> 的";
											}
											?>购买记录
<!--											<div style="float: right;">-->
<!--												<a class="btn btn-primary" href="orders_list.php">全部</a> -->
<!--												<a class="btn btn-info" href="?state=1">已付</a> -->
<!--												<a class="btn btn-danger" href="?state=2">未付</a>												-->
<!--											</div>-->
										</h4>

										</div>
										<div class="card-body p-0">
											<div class="table-responsive">
												<table class="table table-striped mb-0">
													<tr>
<!--														<th width="5%">选择</th>-->
														<th width="20%">购买简介</th>
														<th width="20%">购买时间</th>
														<th width="20%">资源图片</th>
														<th width="20%">账号/邮箱</th>
														<th width="20%">首次观看时间</th>
													</tr>
	<?php
		switch($action){
			case "fh":
                $sql="select * from sl_orders,sl_member where O_mid=M_id and O_del=0 ".$M_info." and (not O_bz='虚拟' or ISNULL(O_bz)=1) and O_state=2 and O_type=0 and O_content='实物商品，由商家手动发货' order by O_id desc";
                break;
			case "search":
                $sql="select * from sl_orders,sl_member where O_mid=M_id ".$state_info." and O_del=0 and (not O_bz='虚拟' or ISNULL(O_bz)=1) and (O_title like '%".$keyword."%' or O_address like '%".$keyword."%' or M_login like '%".$keyword."%' or M_qq like '%".$keyword."%' or M_email like '%".$keyword."%' or M_mobile like '%".$keyword."%') ".$M_info." order by O_id desc limit ".(($page-1)*20).",20";
                break;
			case "search2":
                $sql="select * from sl_orders,sl_member where O_mid=M_id ".$state_info." and O_del=0 and (not O_bz='虚拟' or ISNULL(O_bz)=1) and date(O_time) between '".$start."' and '".$end."' ".$M_info." order by O_id desc limit ".(($page-1)*20).",20";
                break;
			default:
//                $sql="select * from sl_orders,sl_member where O_mid=M_id  ".$state_info." and (not O_bz='虚拟' or ISNULL(O_bz)=1) and O_del=0 ".$M_info." order by O_id desc limit ".(($page-1)*20).",20";
//                break;
                $sql="select * from sl_neworders,sl_member where mid=M_id order by id desc limit ".(($page-1)*20).",20";
                break;
		}

		$result = mysqli_query($conn, $sql);
		if (mysqli_num_rows($result) > 0) {
		while($row = mysqli_fetch_assoc($result)) {

			if($row["M_viplong"]-(time()-strtotime($row["M_viptime"]))/86400*24*60>0){
				$M_vip=" <img src=\"img/vip.png\" height=\"20\">";
			}else{
				$M_vip="";
			}

			$th="<p><input type=\"text\" value=\"".$row["O_bz"]."\" class=\"form-control\" name=\"bz_".$row["O_id"]."\" placeholder=\"备注\" onblur=\"save()\"></p><p>".$th."</p>";

			if($row["O_time2"]!=""){
				if($row["O_time2"]>date('Y-m-d H:i:s')){
					$dq=" <span style=\"color:#009900\">[".round((strtotime($row["O_time2"])-time())/3600/24)."天后到期]</span>";
				}else{
					$dq=" <span style=\"color:#ff0000\">[".date("Y-m-d",strtotime($row["O_time2"]))."已到期]</span>";
				}
				
			}else{
				$dq="";
			}
			
			
			
			
			if(empty($row["buy_type"])){
				$tablego="<tr id='".$row["id"]."'><td>
			<div style=\"width:100%;max-width:400px;display:block;white-space:normal;color:red;\">
			<p>".$row["buy_content"]."</p>
			</div>
			<p><b>花费".$row["buy_price"]."元购买时长".$row["buy_longtime"]."分钟</b></p>
			</td>";
			}else{
				$tablego="<tr id='".$row["id"]."'><td>
			<div style=\"width:100%;max-width:400px;display:block;white-space:normal;color:red;\">
			<p>".$row["buy_content"]."</p>
			</div>
			<p><b>花费".$row["buy_price"]."元购买</b></p>
			</td>";
			}
			
			$tablego = $tablego . "<td>
			<p>".date('Y-m-d H:i:s',$row["addtime"])."</p>
			</td>
			
			<td>
			<img src=\"".pic2($row["buy_img"])."\" height=\"50\" alt=\"<img src='".pic2($row["buy_img"])."' width='500'>\">
			</td>
			
			<td>
			<p>".$row["M_login"]." <br> ".$row["M_email"]."</p>
			</td>";
			if(empty($row["buy_time"])){
			    $tablego = $tablego . "<td>
			<p>用户暂未观看</p>
			</td>
			
			</tr>";
			}else{
			    $tablego = $tablego . "<td>
			<p>".date('Y-m-d H:i:s',$row["buy_time"])."</p>
			</td>
			
			</tr>";
			}
			
			echo $tablego;
			
		}
	}
?>

												</table>
											</div>
										</div>
									</div>
									<!--<label><input type="checkbox" id="selectAll" name="selectAll"> 全选</label>-->
									<!--<button class="btn btn-sm btn-danger" type="button" onclick="delall()"><i class="fa fa-times-circle" ></i> 删除所选</button>-->
<!--									<button class="btn btn-sm btn-warning" type="button" onclick="delx()"><i class="fa fa-times-circle" ></i> 清理未付款订单</button>-->
<!--									<button class="btn btn-sm btn-primary" type="button" onclick="excel()"><i class="fa fa-share" ></i> 导出EXCEL</button>-->
									<ul class="pagination" id="pagination" style="float: right;"></ul>
								</form>
								</div>
								
							</div>
						</div>
<?php if($action!="fh"){?>
        <input type="hidden" id="PageCount" runat="server" />
        <input type="hidden" id="PageSize" runat="server" value="20" />
        <input type="hidden" id="countindex" runat="server" value="20"/>
        <!--设置最多显示的页码数 可以手动设置 默认为7-->
        <input type="hidden" id="visiblePages" runat="server" value="7" />
<?php }?>
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

		<!--Bootstrap.min js-->
		<script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>

		<!--Jquery.nicescroll.min js-->
		<script src="assets/plugins/nicescroll/jquery.nicescroll.min.js"></script>

		<!--mCustomScrollbar js-->
		<script src="assets/plugins/scroll-bar/jquery.mCustomScrollbar.concat.min.js"></script>

		<!--Scroll-up-bar.min js-->
		<script src="assets/plugins/scroll-up-bar/dist/scroll-up-bar.min.js"></script>

		<!--Sidemenu js-->
		<script src="assets/plugins/toggle-menu/sidemenu.js"></script>

		<!--Scripts js-->
		<script src="assets/js/scripts.js"></script>
		<script src="assets/js/help.js"></script>
		<!--Toastr js-->
		<script src="assets/plugins/toastr/build/toastr.min.js"></script>
		<script src="assets/plugins/toaster/garessi-notif.js"></script>
		<script src="assets/js/jqPaginator.min.js" type="text/javascript"></script>
		<script>
			function excel(){
				window.location.href="?action=excel&start="+$("[name='start']").val()+"&end="+$("[name='end']").val();
			}
function loadData(num) {
            $("#PageCount").val("<?php echo $O_count?>");
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
            	<?php
            	switch($action){
            		case "search":
            		$url="&action=search&keyword=".$keyword;
            		break;
            		case "search2":
            		$url="&action=search2&start=".$start."&end=".$end;
            		break;
            		default:
            		$url="&M_id=".$M_id."&state=".$state;
            		break;
            	}
            	?>
                window.location="orders_list.php?page="+num+"<?php echo $url?>";
            }
        }
    });
}
$(function () {
    loadData(<?php echo $page?>);
    loadpage(<?php echo $page?>);

});

function save(){
	$.ajax({
		url:'?action=save',
		type:'post',
		data:$("#form").serialize(),
		success:function (data) {
			if(data=="success"){
        		toastr.success('保存成功', '成功');
        		setTimeout("location.reload()", 2000 )
        	}else{
        		toastr.error(data, '错误');
        	}
		}
	});
}

function del(id){
			if (confirm("确定删除该订单吗？")==true){
                $.ajax({
            	url:'?action=del&S_id='+id,
            	type:'post',
            	success:function (data) {
            	if(data=="success"){
            		$("#"+id).hide();
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
	if (confirm("确定删除选中的订单吗？")==true){
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
		 return true;
    }else{
        return false;
    }
}

function delx(){
	if (confirm("确定清理所有未付款订单吗？")==true){
				$.ajax({
            	url:'?action=delx',
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
		 return true;
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