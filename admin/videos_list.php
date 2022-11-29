<?php
require '../conn/conn.php';
require '../conn/function.php';
require 'admin_check.php';

$page=$_GET["page"];
$action=$_GET["action"];
$V_id=intval($_GET["V_id"]);

if($page==""){
	$page=1;
}

if($action=="del"){
	mysqli_query($conn,"update sl_videos set V_del=1 where V_id=".$V_id);
	mysqli_query($conn, "insert into sl_log(L_aid,L_time,L_add,L_ip,L_title) values(".$_SESSION["A_id"].",'".date('Y-m-d H:i:s')."','".$_SESSION["add"]."','".getip()."','删除视频')");
	die("success");
}

if($action=="save"){
	foreach ($_POST as $x=>$value) {
		if(splitx($x,"_",0)=="title"){
			mysqli_query($conn,"update sl_videos set V_title='".$_POST[$x]."' where V_id=".intval(splitx($x,"_",1)));
		}
		if(splitx($x,"_",0)=="order"){
			mysqli_query($conn,"update sl_videos set V_order=".$_POST[$x]." where V_id=".intval(splitx($x,"_",1)));
		}
// 		if(splitx($x,"_",0)=="sort"){
// 			mysqli_query($conn,"update sl_videos set C_sort=".$_POST[$x]." where C_id=".intval(splitx($x,"_",1)));
// 		}
		if(splitx($x,"_",0)=="price"){
			mysqli_query($conn,"update sl_videos set V_price=".$_POST[$x]." where V_id=".intval(splitx($x,"_",1)));
		}
	}
	die("success");
}

if($action=="delall"){
	$id=$_POST["id"];
	if(count($id)>0) {
		$shu=0 ;
		for ($i=0 ;$i<count($id);$i++ ) {
			mysqli_query($conn,"update sl_videos set V_del=1 where V_id=".intval($id[$i]));
			$shu=$shu+1 ;
			$ids=$ids.$id[$i].",";
		}
		$ids= substr($ids,0,strlen($ids)-1);
		if($shu>0) {
			mysqli_query($conn, "insert into sl_log(L_aid,L_time,L_add,L_ip,L_title) values(".$_SESSION["A_id"].",'".date('Y-m-d H:i:s')."','".$_SESSION["add"]."','".getip()."','批量删除视频')");
			die("success");
		} else {
			die("删除失败");
		}

	} else {
		die("未选择要删除的内容");
	}
}

// if($S_id==0){
// 	$S_title="";
// 	$sql="select count(C_id) as C_count from sl_course,sl_usort where C_sort=S_id and C_del=0";
// }else{
// 	$S_title=getrs("select * from sl_usort where S_id=".$S_id,"S_title")." - ";
// 	$sql="select count(C_id) as C_count from sl_course,sl_usort where C_sort=S_id and C_del=0 and (S_id=".$S_id." or S_sub=".$S_id.")";
// }
// $result = mysqli_query($conn, $sql);
// $row = mysqli_fetch_assoc($result);
// $C_counts=$row["C_count"];
$C_all=getrs("select count(V_id) as C_count from sl_videos where V_del=0","C_count");
?>

<!DOCTYPE html>
<html lang="en">
	<head>

		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>视频列表 - 后台管理</title>

		<!--favicon -->
		<link rel="icon" href="../media/<?php echo $C_ico?>" type="image/x-icon"/>

		<!--Bootstrap.min css-->
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

		<!--Toastr css-->
		<link rel="stylesheet" href="assets/plugins/toastr/build/toastr.css">

		<style type="text/css">
			.list-group a{text-decoration:none}
		</style>

		
	</head>

	<body class="app ">

		<div id="spinner"></div>

		<div id="app">
			<div class="main-wrapper" >
				
					<?php
					require 'nav.php';
					?>


				<div class="app-content">

					<!--<a href="recycle.php" class="btn btn-info pull-right btn-sm" style="z-index: 2;position: relative;"><i class="fa fa-recycle"></i> 回收站</a>-->
					<!--<a href="usort_add.php" class="btn btn-primary pull-right btn-sm" style="z-index: 2;position: relative;margin-right: 5px;"><i class="fa fa-plus-circle"></i> 新增课程分类</a>-->
					<a href="videos_add.php" class="btn btn-primary pull-right btn-sm" style="z-index: 2;position: relative;margin-right: 5px;">
					    <i class="fa fa-plus-circle"></i> 新增视频</a>
					<!--<form class="input-group pull-right" style="width: 300px;z-index: 2;position: relative;margin-right: 5px;" method="post" action="?action=search">-->
	    <!--                <input type="text" class="form-control input-sm" name="keyword" value="<?php echo t($_POST["keyword"])?>" placeholder="搜索课程">-->
	    <!--                <span class="input-group-btn">-->
	    <!--                    <button class="btn btn-info btn-sm" type="form"><i class="fa fa-search"></i> 搜索</button>-->
	    <!--                </span>-->
	    <!--            </form>-->

					<section class="section">
						<ol class="breadcrumb">
                            <li class="breadcrumb-item active"><a href="videos_list.php">视频管理</a></li>
                            <!--<li class="breadcrumb-item"><a href="usort_add.php">课程分类</a></li>-->
                            
                        </ol>
                        <style type="text/css">
                        .active a{font-weight: bold;color: #a2a9d4}
                    	</style>

						<div class="section-body ">

							<div class="row">

								<div class="col-lg-12">
									<form id="form">
									<div class="card card-primary">

										<div class="card-header">
											<h4><?php 
											if($action=="search"){
												echo "搜索“".t($_POST["keyword"])."” - ";
											}else{
												echo $S_title;
											}
											
											?>视频列表[<?php echo $C_all?>个]</h4>

										</div>
										<div class="card-body p-0">
											<div class="table-responsive">
												<table class="table table-striped mb-0 text-nowrap">
													<tr>
														<th>选择</th>
														<th>排序</th>
														<th>名称</th>
														<th>价格</th>
														<th>配图</th>
<!--														<th>视频</th>-->
														<th>操作</th>
													</tr>

<?php
// 		if($action=="sh"){
// 			$sql="select * from sl_course,sl_usort where C_del=0 and S_del=0 and C_sort=S_id and C_sh=0 order by C_id desc,C_order";
// 		}else{
// 			if($action=="search"){
// 				$sql="select * from sl_course,sl_usort where C_del=0 and S_del=0 and C_sort=S_id and C_title like '%".t($_POST["keyword"])."%' order by C_top desc,C_order,C_id desc";
// 			}else{
// 				if($S_id==0){
// 					$sql="select * from sl_course,sl_usort where C_del=0 and S_del=0 and C_sort=S_id order by C_top desc,C_order,C_id desc limit ".(($page-1)*20).",20";
// 				}else{
// 					$sql="select * from sl_course,sl_usort where C_del=0 and S_del=0 and C_sort=S_id and (S_id=".$S_id." or S_sub=".$S_id.") order by C_top desc,C_order,C_id desc limit ".(($page-1)*20).",20";
// 				}
// 			}
// 		}
		$sql="select * from sl_videos where V_del=0 order by V_order desc,V_id desc limit ".(($page-1)*20).",20";

		$result = mysqli_query($conn, $sql);
		if (mysqli_num_rows($result) > 0) {
		while($row = mysqli_fetch_assoc($result)) {


// 		switch($row["C_sh"]){
// 			case 0:
// 			$sh="<span style=\"color:#ff9900\">未审核</span>";
// 			break;
// 			case 1:
// 			$sh="<span style=\"color:#009900\">已通过</span>";
// 			break;
// 			case 2:
// 			$sh="<span style=\"color:#ff0000\">未通过</span>";
// 			break;

// 		}


// 		if($row["C_mid"]>0){
// 			$from=getrs("select M_login from sl_member where M_id=".$row["C_mid"],"M_login");
// 		}else{
// 			$from="自营";
// 		}

// 		if($row["C_top"]==1){
// 			$top="<div style=\"background:#0099ff;color:#ffffff;border-radius:5px;font-size:12px;padding:2px 6px;display:inline-block;margin-top:5px;\"><i class=\"fa fa-arrow-circle-up\"></i> 置顶</div>";
// 		}else{
// 			$top="";
// 		}
			echo "<tr id='".$row["V_id"]."'>
            			<td>
            			    <input type=\"checkbox\" name=\"id[]\" value=\"".$row["V_id"]."\">
            			</td>
            			<td>
            			    <input type=\"txt\" style=\"width:50px;\" class=\"form-control\" name=\"order_".$row["V_id"]."\" value=\"".$row["V_order"]."\">".$top."
            			</td>
            			<td>
            			    <textarea style=\"width:100%;min-width:180px;\" rows=\"3\" class=\"form-control\" name=\"title_".$row["V_id"]."\">".htmlspecialchars($row["V_title"])."
            			    </textarea>
            			</td>
            			<td>
            			    <input type=\"text\" class=\"form-control\" style=\"min-width:80px;max-width:120px\" name=\"price_".$row["V_id"]."\" value=\"".$row["V_price"]."\">
            			</td>
            			<td>
            			    <img src=\"".pic2($row["V_pic"])."\" height=\"50\" alt=\"<img src='".pic2($row["V_pic"])."' width='500'>\">
            			</td>
            			
            	        <td>
            	            <p>
            	                <a href='videos_add.php?V_id=".$row["V_id"]."' class='btn btn-sm btn-info'>
            	                    <i class=\"fa fa-edit\"></i> 编辑
            	                </a>
            	            </p>
            	            <p>
            	                <button class='btn btn-sm btn-danger' type='button' onClick='del(".$row["V_id"].")'>
            	                    <i class=\"fa fa-times-circle\"></i> 删除
            	                </button>
            	            </p>
            	        </td>
			       </tr>";
		}
	}
?>
<!--                                                    <td>-->
<!--                                                        <video width=\"100%\" style=\"max-height:500px;background:#000000\" poster=\"" . pic2($row["V_pic"]) . "\" controls>-->
<!--                                                        <source src=\"../media/" . $row["V_video"] . "\" type=\"video/mp4\">您的浏览器不支持 video 标签。</video>-->
<!--                                                    </td>-->
												</table>
											</div>
										</div>
									</div>

									<label><input type="checkbox" id="selectAll" name="selectAll"> 全选</label>
									<button class="btn btn-sm btn-danger" type="button" onClick="delall()"><i class="fa fa-times-circle" ></i> 删除所选</button>
									<button class="btn btn-sm btn-primary" type="button" onclick="save()"><i class="fa fa-save"></i> 保存修改</button>
									<!--<a href="course_add.php" class="btn btn-sm btn-info"><i class="fa fa-plus-circle"></i> 新增课程</a>-->
									

									<ul class="pagination" id="pagination" style="float: right;"></ul>
									</form>
								</div>
								
							</div>
						</div>
<?php if($action!="search" && $action!="sh"){?>	
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


        <!-- Large Modal -->
        <div id="haibao" class="modal fade">
            <div class="modal-dialog" role="document" >
                <div class="modal-content">
                    <div class="modal-header pd-x-20">
                        <h6 class="modal-title">生成海报</h6>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div id="poster"></div>
                </div>
            </div><!-- modal-dialog -->
        </div><!-- modal -->

		<!--Jquery.min js-->
		<script src="assets/js/jquery.min.js"></script>
		<script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>
		<script src="assets/plugins/toggle-menu/sidemenu.js"></script>
		<script src="assets/plugins/scroll-bar/jquery.mCustomScrollbar.concat.min.js"></script>
		<script src="assets/js/scripts.js"></script>
		<script src="assets/js/help.js"></script>
		<script src="assets/plugins/toastr/build/toastr.min.js"></script>

		<script src="assets/js/jqPaginator.min.js" type="text/javascript"></script>
		<script>
// function loadData(num) {
//             $("#PageCount").val("<?php echo $C_counts?>");
//         }
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
                window.location="videos_list.php?page="+num;
            }
        }
    });
}
$(function () {
    loadData(<?php echo $page?>);
    loadpage(<?php echo $page?>);

});

function del(id){
			if (confirm("确定删除视频吗？")==true){
                $.ajax({
            	url:'?action=del&V_id='+id,
            	type:'post',
            	success:function (data) {
            	if(data=="success"){
            		$("#"+id).hide();
            		toastr.success('删除成功', '错误');
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
function save(){
	$.ajax({
		url:'?action=save',
		type:'post',
		data:$("#form").serialize(),
		success:function (data) {
			if(data=="success"){
            		toastr.success('保存成功', '成功');
            	}else{
            		toastr.error(data, '错误');
            	}
		}
	});
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