<?php 
require '../conn/conn.php';
require '../conn/function.php';
require 'member_check.php';
$action=$_GET["action"];
$page=$_GET["page"];
if($page==""){
	$page=1;
}
$id=intval($_GET["id"]);

if($action=="addp"){
	mysqli_query($conn,"update sl_member set M_product=CONCAT(M_product,'|',".$id.",'|') where M_id=".intval($M_id));
	die("success");
}

if($action=="delp"){
	mysqli_query($conn,"update sl_member set M_product=REPLACE(M_product,'|".$id."|','') where M_id=".intval($M_id));
	die("success");
}

if($action=="addn"){
	mysqli_query($conn,"update sl_member set M_news=CONCAT(M_news,'|',".$id.",'|') where M_id=".intval($M_id));
	die("success");
}

if($action=="deln"){
	mysqli_query($conn,"update sl_member set M_news=REPLACE(M_news,'|".$id."|','') where M_id=".intval($M_id));
	die("success");
}

if($action=="saven"){
	$n=$_POST["n"];
	if(count($n)>0){
		for ($i=0 ;$i<count($n);$i++) {
			if(strpos("|".getrs("select * from sl_member where M_id=".intval($M_id),"M_news")."|","|".$n[$i]."|")===false){
				mysqli_query($conn,"update sl_member set M_news=CONCAT(M_news,'|',".$n[$i].") where M_id=".intval($M_id));
			}
		}
	}
	die("success");
}

$sql="select count(P_id) as P_count from sl_product where P_del=0";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$P_counts=$row["P_count"];

$sql="select count(N_id) as N_count from sl_news where N_del=0";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$N_counts=$row["N_count"];

if($P_counts>$N_counts){
	$counts=$P_counts;
}else{
	$counts=$N_counts;
}

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
  <!-- Stylesheets -->
  <link rel="stylesheet" href="../css/css/font-awesome.min.css">
  <link rel="stylesheet" href="css/bootstrap.css">
  <link rel="stylesheet" href="css/site.min.css">
  <!-- css plugins -->

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
						<h5>价格展示</h5>


<div class="col-md-6">

						<div class="panel panel-default">
							<div class="panel-heading">商品价格</div>
							<div class="table-responsive">
								<table class="table table-condensed" style="font-size: 12px;">
								 <thead>
									<tr>
										<th width="20%">图片</th>
										<th width="50%">商品名称</th>
										<th width="20%">主站售价/成本价</th>
										<th width="10%">导入</th>

									</tr>
									</thead>
									<tbody>
									<?php
							$sql="select * from sl_product where P_del=0 order by P_top desc,P_order,P_id desc limit ".(($page-1)*10).",10";
							$result = mysqli_query($conn,  $sql);
							if (mysqli_num_rows($result) > 0) {
							while($row = mysqli_fetch_assoc($result)) {
								if(strpos("|".$M_product."|","|".$row["P_id"]."|")!==false){
									$btn="<button class=\"btn btn-xs btn-danger\" onclick=\"p(".$row["P_id"].",'delp')\">取消</button>";
								}else{
									$btn="<button class=\"btn btn-xs btn-primary\" onclick=\"p(".$row["P_id"].",'addp')\">导入</button>";
								}
							        echo "<tr>
							        <td><img src=\"".pic2(splitx($row["P_pic"],"|",0))."\" height=\"50\" width=\"50\"></td>
							        <td>".$row["P_title"]."</td>
							        <td>￥".$row["P_price"]."<br>￥".$row["P_price2"]."</td>
							        <td>$btn</td>
							        </tr>";
							    }
							} 
									?>
									</tbody>
								</table>

					</div>
					
				</div>

			</div>
<div class="col-md-6">

						<div class="panel panel-default">
							<div class="panel-heading">文章价格</div>
							<div class="table-responsive">
								<table class="table table-condensed" style="font-size: 12px;">
								 <thead>
									<tr>
										<th width="20%">图片</th>
										<th width="50%">文章名称</th>
										<th width="20%">售价/成本价</th>
										<th width="10%">导入</th>
									</tr>
									</thead>
									<tbody>
									<?php
							$sql="select * from sl_news where N_del=0 order by N_top desc,N_order,N_id desc limit ".(($page-1)*10).",10";
							$result = mysqli_query($conn,  $sql);
							if (mysqli_num_rows($result) > 0) {
							while($row = mysqli_fetch_assoc($result)) {
								if(strpos("|".$M_news."|","|".$row["N_id"]."|")!==false){
									$btn="<button class=\"btn btn-xs btn-danger\" onclick=\"p(".$row["N_id"].",'deln')\">取消</button>";
								}else{
									$btn="<button class=\"btn btn-xs btn-primary\" onclick=\"p(".$row["N_id"].",'addn')\">导入</button>";
								}
							        echo "<tr>
							        <td><img src=\"".pic2($row["N_pic"])."\" height=\"50\" width=\"50\"></td>
							        <td>".$row["N_title"]."</td>
							        <td>￥".$row["N_price"]."<br>￥".$row["N_price2"]."</td>
							        <td>$btn</td>
							        </tr>";
							    }
							} 
									?>
									</tbody>
								</table>
								
					</div>
				</div>
			</div>

			</div>
		<ul class="pagination" id="pagination" style="display: block;"></ul>
		<input type="hidden" id="PageCount" runat="server" />
        <input type="hidden" id="PageSize" runat="server" value="10" />
        <input type="hidden" id="countindex" runat="server" value="10"/>
        <!--设置最多显示的页码数 可以手动设置 默认为7-->
        <input type="hidden" id="visiblePages" runat="server" value="7" />
        <div style="height: 50px;"></div>
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

	<script src="js/jqPaginator.min.js" type="text/javascript"></script>
	<script>
		function loadData(num) {
            $("#PageCount").val("<?php echo $counts?>");
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

function p(id,action){
			$.ajax({
            	url:'?action='+action+'&id='+id,
            	type:'get',
            	success:function (data) {
	            	if(data=="success"){
	            		location.reload();
	            	}else{
	            		alert(data);
	            	}
            	}
            });
}


$('input[name="selectAll"]').on("click",function(){
        if($(this).is(':checked')){
            $('input[name="p[]"]').each(function(){
                $(this).prop("checked",true);
            });
        }else{
            $('input[name="p[]"]').each(function(){
                $(this).prop("checked",false);
            });
        }
    });
$('input[name="selectAll2"]').on("click",function(){
        if($(this).is(':checked')){
            $('input[name="n[]"]').each(function(){
                $(this).prop("checked",true);
            });
        }else{
            $('input[name="n[]"]').each(function(){
                $(this).prop("checked",false);
            });
        }
    });
	</script>
</body>
</html>