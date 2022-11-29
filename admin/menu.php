<?php
require '../conn/conn.php';
require '../conn/function.php';
require 'admin_check.php';

$action=$_GET["action"];
$U_id=intval($_GET["U_id"]);
if($U_id!=""){
	$aa="edit&U_id=".$U_id;
	$U=getrs("select * from sl_menu where U_id=".$U_id);
	if ($U!="") {
		$U_order=$U["U_order"];
		$U_title=$U["U_title"];
		$U_type=$U["U_type"];
		$U_typeid=$U["U_typeid"];
		$U_link=$U["U_link"];
		$U_sub=$U["U_sub"];
		$U_icon=$U["U_icon"];
	}
	$title="编辑";
}else{
	$aa="add";
	$title="新增";
}

if($action=="add"){
	$U_order=intval($_POST["U_order"]);
	$U_title=$_POST["U_title"];
	$U_type=splitx($_POST["U_type"],"_",0);
	$U_typeid=intval(splitx($_POST["U_type"],"_",1));
	$U_link=$_POST["U_link"];
	$U_icon=$_POST["U_icon"];
	$U_sub=intval($_POST["U_sub"]);

	if($U_title!=""){
		if(getrs("select * from sl_menu where U_title='$U_title' and U_del=0 and U_type='$U_type' and U_typeid=$U_typeid and U_order=$U_order and U_sub=$U_sub","U_id")==""){
			mysqli_query($conn,"insert into sl_menu(U_order,U_title,U_type,U_typeid,U_link,U_sub,U_icon) values($U_order,'$U_title','$U_type',$U_typeid,'$U_link',$U_sub,'".$U_icon."')");
			$U_id=getrs("select * from sl_menu where U_title='$U_title' and U_del=0","U_id");
			mysqli_query($conn, "insert into sl_log(L_aid,L_time,L_add,L_ip,L_title) values(".$_SESSION["A_id"].",'".date('Y-m-d H:i:s')."','".$_SESSION["add"]."','".getip()."','新增菜单')");
			die("{\"msg\":\"success\",\"id\":\"".$U_id."\"}");
		}else{
			die("{\"msg\":\"已存在同名记录\"}");
		}
		
	}else{
		die("{\"msg\":\"请填全信息\"}");
	}
}

if($action=="edit"){
	$U_order=intval($_POST["U_order"]);
	$U_title=$_POST["U_title"];
	$U_type=splitx($_POST["U_type"],"_",0);
	$U_typeid=intval(splitx($_POST["U_type"],"_",1));
	$U_link=$_POST["U_link"];
	$U_icon=$_POST["U_icon"];
	$U_sub=intval($_POST["U_sub"]);

	if($U_title!=""){
		mysqli_query($conn, "update sl_menu set
		U_title='$U_title',
		U_order=$U_order,
		U_type='$U_type',
		U_typeid=$U_typeid,
		U_link='$U_link',
		U_icon='$U_icon',
		U_sub=$U_sub
		where U_id=".$U_id);
		mysqli_query($conn, "insert into sl_log(L_aid,L_time,L_add,L_ip,L_title) values(".$_SESSION["A_id"].",'".date('Y-m-d H:i:s')."','".$_SESSION["add"]."','".getip()."','编辑菜单')");
		die("{\"msg\":\"success\",\"id\":\"".$U_id."\"}");
	}else{
		die("{\"msg\":\"请填全信息\"}");
	}
}

if($action=="delall"){
	$id=$_POST["id"];
	if(count($id)>0) {
		$shu=0 ;
		for ($i=0 ;$i<count($id);$i++ ) {
			mysqli_query($conn,"update sl_menu set U_del=1 where U_id=".intval($id[$i]));
			$shu=$shu+1 ;
			$ids=$ids.$id[$i].",";
		}
		$ids= substr($ids,0,strlen($ids)-1);
		if($shu>0) {
			die("{\"msg\":\"success\",\"ids\":\"".$ids."\"}");
		} else {
			die("{\"msg\":\"删除失败\"}");
		}
	} else {
		die("{\"msg\":\"未选择要删除的内容\"}");
	}
}

if($action=="hide"){
	$id=intval($_GET["id"]);
	mysqli_query($conn, "update sl_menu set U_hide=1 where U_id=".$id);
	die("{\"code\":\"success\",\"msg\":\"隐藏菜单成功\"}");
}
if($action=="show"){
	$id=intval($_GET["id"]);
	mysqli_query($conn, "update sl_menu set U_hide=0 where U_id=".$id);
	die("{\"code\":\"success\",\"msg\":\"取消隐藏成功\"}");
}
?>
<!DOCTYPE html>
<html lang="en">
	<head>

		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title><?php echo $title?>菜单 - 后台管理</title>

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

		<script type="text/javascript" src="../upload/upload.js"></script>
		<style type="text/css">
		.showpic{height: 100px;border: solid 1px #DDDDDD;padding: 5px;}
		.list-group a{text-decoration:none}
		.part{display:inline-block;width:40%;overflow:hidden;text-overflow:ellipsis;white-space: nowrap;}
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

					<a href="recycle.php" class="btn btn-info pull-right" style="z-index: 2;position: relative;"><i class="fa fa-recycle"></i> 回收站</a>
					<a href="menu.php" class="btn btn-primary pull-right" style="z-index: 2;position: relative;margin-right: 5px;"><i class="fa fa-plus-circle"></i> 新增菜单</a>
					<section class="section">
                    	<ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.php">后台管理</a></li>
                            <li class="breadcrumb-item active" aria-current="page">菜单管理</li>
                        </ol>


						<div class="section-body ">
							
							<div class="row">
								
								<div class="col-lg-5">
									<form id="list">
									<div class="card card-primary">

										<div class="card-header">
											<h4>菜单列表</h4>
										</div>
												<ul class="list-group">
											<li class="list-group-item " style="background: #f7f7f7"><div class="part">标题</div><div class="part">链接到</div><div class="pull-right">隐藏</div></li>
											<?php 
											foreach(getlist("select * from sl_menu where U_del=0 and U_sub=0 order by U_order,U_id desc") as $u){

															if($u["U_id"]==$U_id){
																$active="active";
															}else{
																$active="";
															}
															switch($u["U_type"]){
																case "index":
																$type="首页";
																break;
															}
															if($u["U_hide"]==1){
																$checked="checked='checked'";
															}else{
																$checked="";
															}
															
															echo "<a id=\"".$u["U_id"]."\" href=\"?U_id=".$u["U_id"]."\" class=\"list-group-item ".$active."\">
															<div class=\"part\"><input type=\"checkbox\" name=\"id[]\" value=\"".$u["U_id"]."\"> <b>└ ".$u["U_order"].".".$u["U_title"]."</b></div>
															<div class=\"part\"><b>".$type."</b></div>
															<div class=\"pull-right\"><input type=\"checkbox\" ".$checked." onclick=\"hide(".$u["U_id"].")\" id=\"hide_".$u["U_id"]."\"></div>
															</a>";

															foreach(getlist("select * from sl_menu where U_del=0 and U_sub=".$u["U_id"]." order by U_order,U_id desc") as $u2){
																	if($u2["U_id"]==$U_id){
																		$active2="active";
																	}else{
																		$active2="";
																	}

																	switch($u2["U_type"]){
																		case "index":
																		$type2="首页";
																		break;

																		case "news":
																		if($u2["U_typeid"]==0){
																			$type2="文章 → 全部文章";
																		}else{
																			$type2="文章 → ".getrs("select * from sl_nsort where S_id=".$u2["U_typeid"],"S_title");
																		}
																	}

																	if($u2["U_hide"]==1){
																		$checked="checked='checked'";
																	}else{
																		$checked="";
																	}
																	

															}
													}
											?>
										</ul>
									</div>
									<label><input type="checkbox" id="selectAll" name="selectAll"> 全选</label>
									<button class="btn btn-sm btn-danger" type="button" onClick="delall()"><i class="fa fa-times-circle" ></i> 删除所选</button>
									<a href="menu.php" class="btn btn-sm btn-primary"><i class="fa fa-plus-circle"></i> 新增菜单</a>
								</form>
								</div>
								<?php if($action!="menu"){?>
								
								<div class="col-lg-7">
									<form id="form">
									<div class="card card-primary">
										<div class="card-header ">
											<h4><?php echo $title?>菜单</h4>
										</div>
										<div class="card-body">
												<div class="form-group row">
													<label class="col-md-3 col-form-label" >上级菜单</label>
													<div class="col-md-9">
														<select name="U_sub" class="form-control">
															<option value="0">根分类</option>
															<?php
															foreach(getlist("select * from sl_menu where U_del=0 and U_sub=0 order by U_order,U_id desc") as $u){
																	if($U_sub==$u["U_id"]){
																		$selected="selected";
																	}else{
																		$selected="";
																	}
																	echo "<option value=\"".$u["U_id"]."\" ".$selected.">".$u["U_title"]."</option>";
																
															}

															?>
														</select>
													</div>
												</div>

												<div class="form-group row">
													<label class="col-md-3 col-form-label" >链接到</label>
													<div class="col-md-9">
														<select name="U_type" class="form-control" onchange="change()" id="to">
														<?php if($news_show=="true"){?>
														<optgroup label="文章模块">
															<option value="news_0" <?php if($U_type=="news" && $U_typeid==0){
																		echo "selected='selected'";
																	}?>>所有文章</option>
															<?php
															foreach(getlist("select * from sl_nsort where S_del=0 and S_sub=0 order by S_order,S_id desc") as $n){

																	if($U_typeid==$n["S_id"] && $U_type=="news"){
																		$selected="selected";
																	}else{
																		$selected="";
																	}
																	echo "<option value=\"news_".$n["S_id"]."\" ".$selected.">└ ".$n["S_title"]."</option>";
																	foreach(getlist("select * from sl_nsort where S_del=0 and S_sub=".$n["S_id"]." order by S_order,S_id desc") as $n2){
																		
																			if($U_typeid==$n2["S_id"] && $U_type=="news"){
																				$selected2="selected";
																			}else{
																				$selected2="";
																			}
																			echo "<option value=\"news_".$n2["S_id"]."\" ".$selected2.">└── ".$n2["S_title"]."</option>";
																	}
															}
															?>
														</optgroup>
														<?php }?>

														</select>
													</div>
												</div>

												<div class="form-group row">
													<label class="col-md-3 col-form-label" >菜单标题</label>
													<div class="col-md-9">
														<input type="text"  name="U_title" class="form-control" value="<?php echo $U_title?>" id="title">
													</div>
												</div>

												<div class="form-group row">
													<label class="col-md-3 col-form-label" >菜单排序</label>
													<div class="col-md-9">
														<input type="text"  name="U_order" class="form-control" value="<?php echo $U_order?>" placeholder="数字越小，排序越靠前">
													</div>
												</div>

												<div class="form-group row" id="link" style=" <?php if($U_type=="link"){
													echo "";
												}else{
													echo "display:none";
												}?>">
													<label class="col-md-3 col-form-label" >外部链接</label>
													<div class="col-md-9">
														<input type="text"  name="U_link" class="form-control" value="<?php echo $U_link?>" placeholder="以http(s)://开头">
													</div>
												</div>
<!--												<div class="form-group row">-->
<!--													<label class="col-md-3 col-form-label" >菜单图标</label>-->
<!--													<div class="col-md-9">-->
<!--														<p><img src="--><?php //echo pic2($U_icon)?><!--" id="U_iconx" class="showpic" onClick="showUpload('U_icon','U_icon','../media',1,null,'','');" alt="<img src='--><?php //echo pic2($U_icon)?><!--' class='showpicx'>"></p>-->
<!--														<div class="input-group">-->
<!--															-->
<!--						                                        <input type="text" id="U_icon" name="U_icon" class="form-control" value="--><?php //echo $U_icon?><!--">-->
<!--						                                        <span class="input-group-btn">-->
<!--						                                                <button class="btn btn-primary m-b-5 m-t-5" type="button" onClick="showUpload('U_icon','U_icon','../media',1,null,'','');">上传</button>-->
<!--						                                        </span>-->
<!--						                                </div>-->
<!--													</div>-->
<!--												</div>-->
												

												<div class="form-group row" >
													<label class="col-md-3 col-form-label" ></label>
													<div class="col-md-9">
														<button class="btn btn-info" type="button" onClick="save()">保存</button>
													</div>
												</div>
												
										</div>
									</div>
									</form>
								</div>
							
							<?php }?>
							
							</div>
							
						</div>
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
		<script src="assets/plugins/nicescroll/jquery.nicescroll.min.js"></script>

		<!--mCustomScrollbar js-->
		<script src="assets/plugins/scroll-bar/jquery.mCustomScrollbar.concat.min.js"></script>

		<!--Scroll-up-bar.min js-->
		<script src="assets/plugins/scroll-up-bar/dist/scroll-up-bar.min.js"></script>

		<!--Sidemenu js-->
		<script src="assets/plugins/toggle-menu/sidemenu.js"></script>

		<!--Scripts js-->
		<script src="assets/js/scripts.js"></script>

		<script src="assets/plugins/toastr/build/toastr.min.js"></script>
		<script src="assets/plugins/toaster/garessi-notif.js"></script>

		<script src="assets/plugins/toaster/garessi-notif.js"></script>

		<script type="text/javascript">


		function change(){
			if(document.getElementById("to").value=="link_1"){
				$("#link").show();
			}else{
				$("#link").hide();
			}
		}
		function save(){
				$.ajax({
            	url:'?action=<?php echo $aa?>',
            	type:'post',
            	data:$("#form").serialize(),
            	success:function (data) {
            	data=JSON.parse(data);
            	if(data.msg=="success"){
            		toastr.success("保存成功，2秒后刷新", "成功");
            		setTimeout("window.location.href='menu.php?U_id="+data.id+"'", 2000 )
            	}else{
            		toastr.error(data.msg, '错误');
            	}
            	}
            });

			}
function delall() {
    if (confirm("确定删除吗？") == true) {
        $.ajax({
            url: '?action=delall',
            type: 'post',
            data: $("#list").serialize(),
            success: function(data) {
                data = JSON.parse(data);
                if (data.msg == "success") {
                    toastr.success("删除成功", "成功");
                    id = data.ids.split(",");
                    for (var i = 0; i < id.length; i++) {
                        $("#" + id[i]).hide();
                    };
                } else {
                    toastr.error(data.msg, '错误');
                }
            }
        });
        return true;
    } else {
        return false;
    }
}

function hide(id){
    if ($("#hide_"+id).is(":checked")== true) {
       action="hide";
    } else {
       action="show";
    }
    $.ajax({
    	url:'?action='+action+'&id='+id,
    	success:function (data) {
    	data=JSON.parse(data);
    	if(data.code=="success"){
    		toastr.success(data.msg, "成功");
    	}else{
    		toastr.error(data.msg, '错误');
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
