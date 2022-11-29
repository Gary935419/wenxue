<?php 
require '../conn/conn.php';
require '../conn/function.php';
require 'member_check.php';

if($M_type==0 || time()-strtotime($M_sellertime)>$M_sellerlong*86400){//商家到期
	Header("Location:seller.php");
	die();
}

$action=$_GET["action"];
$C_id=intval($_GET["C_id"]);
$S_id=intval($_GET["S_id"]);

$page=$_GET["page"];
if($page==""){
	$page=1;
}

$use=intval($_GET["use"]);

if($use==0){
	$use_info="";
}else{
	if($use==2){
		$use_info=" and C_use=1";
	}else{
		$use_info=" and C_use=0";
	}
}

if($action=="del"){
	mysqli_query($conn,"update sl_card set C_del=1 where C_id=$C_id and C_mid=$M_id");
	die("success");
}


if($action=="delall"){
	$id=$_POST["id"];
	if(count($id)>0) {
		$shu=0 ;
		for ($i=0 ;$i<count($id);$i++ ) {
			mysqli_query($conn,"update sl_card set C_del=1 where C_id=".intval($id[$i]));
			$shu=$shu+1 ;
			$ids=$ids.$id[$i].",";
		}
		$ids= substr($ids,0,strlen($ids)-1);
		if($shu>0) {
			mysqli_query($conn, "insert into sl_log(L_aid,L_time,L_add,L_ip,L_title) values(".$_SESSION["A_id"].",'".date('Y-m-d H:i:s')."','".$_SESSION["add"]."','".getip()."','批量删除卡密')");
			die("success");
		} else {
			die("删除失败");
		}

	} else {
		die("未选择要删除的内容");
	}
}

if($S_id==0){
	$sql="select count(C_id) as C_count from sl_card,sl_csort where C_del=0 and S_del=0 and C_sort=S_id and C_mid=$M_id ".$use_info." order by C_id desc";
}else{
	$sql="select count(C_id) as C_count from sl_card,sl_csort where C_del=0 and S_del=0 and C_sort=$S_id and C_sort=S_id and C_mid=$M_id ".$use_info." order by C_id desc";
}

$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$C_counts=$row["C_count"];

?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
  <meta charset="utf-8">
  <meta name="renderer" content="webkit">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
  <meta name="description" content="会员中心">
  <title>会员中心 - <?php echo $C_title?></title>
  <link href="../media/<?php echo $C_ico?>" rel="shortcut icon" />

  <!-- Stylesheets -->
  <link rel="stylesheet" href="../css/css/font-awesome.min.css">
  <link rel="stylesheet" href="css/bootstrap.css">
  <link rel="stylesheet" href="css/site.min.css">
  <!-- css plugins -->
  <link rel="stylesheet" href="css/icheck.min.css">
  <link rel="stylesheet" href="css/cropper.min.css">
  <link rel="stylesheet" href="../css/sweetalert.css">
 
  <!--[if lt IE 9]>
    <script src="/assets/js/plugins/html5shiv/html5shiv.min.js"></script>
    <![endif]-->
  <!--[if lt IE 10]>
    <link rel="stylesheet" href="/assets/css/ie8.min.css">
    <script src="/assets/js/plugins/respond/respond.min.js"></script>
    <![endif]-->
  
</head>

<body class="body-index">
<?php require 'top.php';?>
		<div class="container m_top_30">
			<div class="yto-box">
				<div class="row">
					<div class="col-sm-2 hidden-xs">
			<h5 class="p_bottom_10">卡密管理</h5>
		<ul class="nav nav-pills nav-stacked">
			<li><a href="product_sell.php">商品列表</a></li>
	        <li><a href="product_add.php">新增商品</a></li>
	        <hr>
	        <li class="active"><a href="card_sell.php">卡密列表</a></li>
	        <li><a href="card_add.php">新增卡密</a></li>
	        <li><a href="csort_list.php">卡密分类</a></li>
	        <li><a href="csort_add.php">新增分类</a></li>
	     </ul>
					</div>
					<div class="col-sm-10 b-left">
						

						<div class="panel panel-default">
							<div class="panel-heading">卡密分类

					<form class="input-group pull-right" style="width: 200px;z-index: 2;position: relative;margin-top: -5px" method="post" action="?action=search">
	                    <input type="text" class="form-control input-sm" name="keyword" value="" placeholder="搜索卡密">
	                    <span class="input-group-btn">
	                        <button class="btn btn-info btn-sm" type="form"><i class="fa fa-search"></i> 搜索</button>
	                    </span>
	                </form>

							</div>
							<div class="panel-body">
								<a href="?S_id=0" class="btn btn-xs 
								<?php
								if($S_id==0){
									echo "btn-primary";
								}else{
									echo "btn-info";
								}
								?>
								">全部</a>
								<?php
$sql="select * from sl_csort where S_del=0 and S_mid=$M_id order by S_id desc";
							$result = mysqli_query($conn,  $sql);
							if (mysqli_num_rows($result) > 0) {
							while($row = mysqli_fetch_assoc($result)) {
								if($S_id==$row["S_id"]){
									$class="btn-primary";
								}else{
									$class="btn-info";
								}
								echo "<a href=\"?S_id=".$row["S_id"]."\" class=\"btn btn-xs $class\">".$row["S_title"]."</a> ";
							    }
							} 
								?>
								
					</div>
				</div>

						<form id="form">
						<div class="panel panel-default">
							<div class="panel-heading">我的卡密
							<a href="card_add.php"  class="btn btn-info btn-xs">新增卡密</a>
							<a href="csort_add.php"  class="btn btn-primary btn-xs">新增分类</a>
							<div class="pull-right">
								<a href="card_sell.php" class="btn btn-warning btn-xs">全部</a>
								<a href="?use=2" class="btn btn-danger btn-xs">已售</a> 
								<a href="?use=1" class="btn btn-success btn-xs">未售</a> 
							</div>
						</div>
							<div class="table-responsive">
								
								<table class="table table-condensed" style="font-size: 12px;">
								 <thead>
									<tr>
										<th>选择</th>
										<th>卡密内容</th>
										<th>分类</th>
										<th>已发放</th>
										<th>编辑</th>
										<th>删除</th>
									</tr>
									</thead>
									<tbody>
									<?php

									if($action=="search"){
										$C=getlist("select * from sl_card,sl_csort where C_del=0 and C_mid=$M_id ".$use_info." and S_del=0 and C_sort=S_id and C_content like '%".t($_POST["keyword"])."%' order by C_id desc");
									}else{
										if($S_id==0){
											$C=getlist("select * from sl_card,sl_csort where C_del=0 and C_mid=$M_id ".$use_info." and S_del=0 and C_sort=S_id order by C_id desc limit ".(($page-1)*10).",10");
										}else{
											$C=getlist("select * from sl_card,sl_csort where C_del=0 and C_mid=$M_id ".$use_info." and S_del=0 and C_sort=S_id and S_id=".$S_id." order by C_id desc limit ".(($page-1)*10).",10");
										}
									}

							foreach($C as $c){

									if($c["C_use"]==1){
										$C_use="<span style=\"color:#ff0000;font-weight:bold;\">已售</span>";
									}else{
										$C_use="<span style=\"color:#009900;font-weight:bold;\">未售</span>";
									}
								
							        echo "<tr id='".$c["C_id"]."'>
							        <td><input type=\"checkbox\" name=\"id[]\" value=\"".$c["C_id"]."\"></td>
							        <td>".$c["C_content"]."</td>
							        <td>".$c["S_title"]."</td>
							        <td>".$C_use."</td>
							        <td><a href='card_add.php?C_id=".$c["C_id"]."' class='btn btn-xs btn-info'><i class=\"fa fa-edit\"></i> 编辑</a></td>
							        <td><button class='btn btn-xs btn-danger' type='button' onClick='del(".$c["C_id"].")'><i class=\"fa fa-times-circle\"></i> 删除</button></td>
							        </tr>";
							} 
									?>

									</tbody>
								</table>
					</div>
				</div>

				<label><input type="checkbox" id="selectAll" name="selectAll"> 全选</label>
									<button class="btn btn-sm btn-danger" type="button" onClick="delall()">删除所选</button>
									<ul class="pagination" id="pagination" style="display: block;"></ul>
								

<?php if($action!="search"){?>	
		<input type="hidden" id="PageCount" runat="server" />
        <input type="hidden" id="PageSize" runat="server" value="10" />
        <input type="hidden" id="countindex" runat="server" value="10"/>
        <input type="hidden" id="visiblePages" runat="server" value="7" />
<?php }?>
</form>
			</div>
			</div>
			</div>
			
		</div>

	</div>
	
<?php 
require 'foot.php';
?>

	<!-- js plugins  -->
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>

	<script src="js/page.js"></script>
	<script src="../js/sweetalert.min.js"></script>
	

			<script>
function del(id){
			if (confirm("确定删除分类吗？")==true){
                $.ajax({
            	url:'?action=del&C_id='+id,
            	type:'post',
            	success:function (data) {
            	if(data=="success"){
            		$("#"+id).hide();
            	}else{
            		alert(data);
            	}
            	}
            });
                return true;
            }else{
                return false;
            }
}
function dels(id){
			if (confirm("确定删除卡密分类吗（分类下卡密也会删除）？")==true){
                $.ajax({
            	url:'?action=dels&S_id='+id,
            	type:'post',
            	success:function (data) {
            	if(data=="success"){
            		$("#s"+id).hide();
            	}else{
            		alert(data);
            	}
            	}
            });
                return true;
            }else{
                return false;
            }
}
function delall(){
	if (confirm("确定删除卡密分类吗（分类下卡密也会删除）？")==true){
				$.ajax({
            	url:'?action=delall',
            	type:'post',
            	data:$("#form").serialize(),
            	success:function (data) {
            	if(data=="success"){
            		location.reload();
            	}else{
            		//alert(data);
            	}
            	}
            });
				return true;
}else{
	return false;
}
			}
	</script>

	<script src="js/jqPaginator.min.js" type="text/javascript"></script>
	<script>
		function loadData(num) {
            $("#PageCount").val("<?php echo $C_counts?>");
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
                window.location="?page="+num+"&use="+<?php echo $use?>;
            }
        }
    });
}
$(function () {
    loadData(<?php echo $page?>);
    loadpage(<?php echo $page?>);

});
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