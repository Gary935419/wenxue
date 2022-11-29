<?php
require '../conn/conn.php';
require '../conn/function.php';
require 'admin_check.php';

$action=$_GET["action"];

$D_domain=splitx($_SERVER["HTTP_HOST"].$_SERVER["PHP_SELF"],"/".$C_admin,0);
$dirx=splitx($_SERVER["PHP_SELF"],$C_admin,0);

$C_id=intval($_GET["C_id"]);

if($C_id!=""){
	$aa="edit&C_id=".$C_id;
	$sql="select * from sl_course,sl_usort where C_sort=S_id and C_id=".$C_id;
	$result = mysqli_query($conn, $sql);
	$row = mysqli_fetch_assoc($result);
	if (mysqli_num_rows($result) > 0) {
		$S_title=$row["S_title"];
		$C_pic=$row["C_pic"];
		$C_title=$row["C_title"];
		$C_content=$row["C_content"];
		$C_price=$row["C_price"];
		$C_sort=$row["C_sort"];
		$C_order=$row["C_order"];
		$C_time=$row["C_time"];
		$C_view=$row["C_view"];
		$C_top=$row["C_top"];
		$C_lesson=$row["C_lesson"];
		$C_author=$row["C_author"];
		$C_sh=$row["C_sh"];
	}
}else{
	$aa="add";
	$C_title="";
	$C_pic="nopic.png";
	$C_time=date('Y-m-d H:i:s');
	$C_top=0;
	$C_view=0;
	$C_price=0;
	$C_author=$_SESSION["A_login"];
	$C_order=0;
	$C_sh=1;
}

if($action=="add"){
	$C_pic=$_POST["C_pic"];
	$C_title=$_POST["C_title"];
	$C_content=str_replace("&quot;","",$_POST["C_content"]);
	$C_price=round($_POST["C_price"],2);
	$C_sort=intval($_POST["C_sort"]);
	$C_order=intval($_POST["C_order"]);
	$C_time=$_POST["C_time"];

	$C_author=$_POST["C_author"];
	$C_view=intval($_POST["C_view"]);
	$C_top=intval($_POST["C_top"]);
	$C_sh=intval($_POST["C_sh"]);

	foreach ($_POST as $x=>$value) {
		if(splitx($x,"_",0)=="picpic5"){
			$lesson=$lesson.$_POST[$x]."||";
		}
	    if(splitx($x,"_",0)=="picpic1"){
	    	$lesson=$lesson.$_POST[$x]."__".round($_POST["picpic2_".splitx($x,"_",1)],2)."__".str_replace("\"","'",$_POST["picpic3_".splitx($x,"_",1)])."__".$_POST["picpic4_".splitx($x,"_",1)]."||";
	    }
	}

	$lesson=substr($lesson,0,strlen($lesson)-2);
	$C_lesson=$lesson;
	
	if($C_sort==0){
		die("{\"msg\":\"请选择一个课程分类\"}");
	}

	if($C_price<0){
		die("{\"msg\":\"课程价格不可为负\"}");
	}

	if($C_title!=""){
		mysqli_query($conn,"insert into sl_course(C_pic,C_title,C_content,C_price,C_sort,C_order,C_time,C_view,C_top,C_lesson,C_author,C_shuxing,C_sh) values('$C_pic','$C_title','$C_content',$C_price,$C_sort,$C_order,'$C_time',$C_view,$C_top,'$C_lesson','$C_author','',$C_sh)");

		$C_id=getrs("select * from sl_course where C_title='$C_title' and C_pic='$C_pic' and C_sort=$C_sort","C_id");
		mysqli_query($conn, "insert into sl_log(L_aid,L_time,L_add,L_ip,L_title) values(".$_SESSION["A_id"].",'".date('Y-m-d H:i:s')."','".$_SESSION["add"]."','".getip()."','新增课程')");
		die("{\"msg\":\"success\",\"C_id\":$C_id}");
	}else{
		die("{\"msg\":\"请填全内容\"}");
	}
}

if($action=="edit"){
	$C_pic=$_POST["C_pic"];
	$C_title=$_POST["C_title"];
	$C_content=str_replace("&quot;","",$_POST["C_content"]);
	$C_price=round($_POST["C_price"],2);
	$C_sort=intval($_POST["C_sort"]);
	$C_order=intval($_POST["C_order"]);
	$C_time=$_POST["C_time"];
	$C_author=$_POST["C_author"];
	$C_view=intval($_POST["C_view"]);
	$C_top=intval($_POST["C_top"]);
	$C_sh=intval($_POST["C_sh"]);

	foreach ($_POST as $x=>$value) {
		if(splitx($x,"_",0)=="picpic5"){
			$lesson=$lesson.$_POST[$x]."||";
		}
	    if(splitx($x,"_",0)=="picpic1"){
	    	$lesson=$lesson.$_POST[$x]."__".round($_POST["picpic2_".splitx($x,"_",1)],2)."__".str_replace("\"","'",$_POST["picpic3_".splitx($x,"_",1)])."__".$_POST["picpic4_".splitx($x,"_",1)]."||";
	    }
	}

	$lesson=substr($lesson,0,strlen($lesson)-2);
	$C_lesson=$lesson;

	if($C_title!=""){
		mysqli_query($conn, "update sl_course set
		C_pic='$C_pic',
		C_title='$C_title',
		C_content='$C_content',
		C_price=$C_price,
		C_sort=$C_sort,
		C_order=$C_order,
		C_time='$C_time',
		C_view=$C_view,
		C_top=$C_top,
		C_sh=$C_sh,
		C_author='$C_author',
		C_lesson='$C_lesson'
		where C_id=".$C_id);
		mysqli_query($conn, "insert into sl_log(L_aid,L_time,L_add,L_ip,L_title) values(".$_SESSION["A_id"].",'".date('Y-m-d H:i:s')."','".$_SESSION["add"]."','".getip()."','编辑课程')");
		die("{\"msg\":\"success\",\"C_id\":0}");
	}else{
		die("{\"msg\":\"请填全内容\"}");
	}
}
?>
<!DOCTYPE html>
<html lang="en">
	<head>

		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>课程设置 - 后台管理</title>

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


		<script type="text/javascript" src="../upload/upload.js"></script>
		<style type="text/css">
		.showpic{height: 100px;border: solid 1px #DDDDDD;padding: 5px;}
		.showpicx{width: 100%;max-width: 500px}
		.list-group a{text-decoration:none}

		

		.table td{padding: 0px}

	</style>
		<script type="text/javascript">

function AddPic(){
 var i =pic1.rows.length;
 var newTr = pic1.insertRow();
 var _id='pp'+i;
 var newTd0 = newTr.insertCell();
 newTr.id=_id;
 newTd0.innerHTML ='<div class="input-group"><input type="text" name="picpic1_'+i+'" class="form-control" value="" placeholder="课时名称"><div style="position:relative;max-width:100px"><input type="text" name="picpic2_'+i+'" class="form-control" value="" placeholder="价格（元）"></div><div style="position:relative;min-width:250px"><input type="text" name="picpic3_'+i+'" class="form-control" value="" placeholder="视频网址" id="video_'+i+'"><button class="btn btn-info btn-sm" type="button" onClick="showUpload(\'video_'+i+'\',\'video_'+i+'\',\'../media\',1,null,\'\',\'\');" style="position:absolute;right:5px;top:5px;">上传</button></div><div style="position:relative;max-width:100px"><input type="text" name="picpic4_'+i+'" class="form-control" value="" placeholder="时长"></div><span class="input-group-btn"><button class="btn btn-primary m-b-5  m-t-5" type="button" onclick="DelPic('+i+')">－ 删除</button></span></div>';
}

function AddPic2(){
 var i =pic1.rows.length;
 var newTr = pic1.insertRow();
 var _id='pp'+i;
 var newTd0 = newTr.insertCell();
 newTr.id=_id;
 newTd0.innerHTML ='<div class="input-group"><input type="text" name="picpic5_'+i+'" class="form-control" value="" placeholder="章节名称"><span class="input-group-btn"><button class="btn btn-primary m-b-5  m-t-5" type="button" onclick="DelPic('+i+')">－ 删除</button></span></div>';
}

function AddPic3(){
 var i =pic1.rows.length;
 var newTr = pic1.insertRow(0);
 var _id='pp'+i;
 var newTd0 = newTr.insertCell();
 newTr.id=_id;
 newTd0.innerHTML ='<div class="input-group"><input type="text" name="picpic5_'+i+'" class="form-control" value="" placeholder="章节名称"><span class="input-group-btn"><button class="btn btn-primary m-b-5  m-t-5" type="button" onclick="DelPic('+i+')">－ 删除</button></span></div>';
}

function DelPic(i){
  var Container = document.getElementById("pic1");
    var _tr=document.getElementById("pp"+i);  
    row=_tr.rowIndex;
    Container.deleteRow(row);
}
	</script>
	</head>

	<body class="app ">

		<div id="spinner"></div>

		<div id="app">
			<div class="main-wrapper" >
				
					<?php
					require 'nav.php';
					?>

				<div class="app-content">
					
					<a class="btn btn-primary pull-right btn-sm" href="usort_add.php" style="z-index: 2;position: relative;margin-right: 10px;"><i class="fa fa-plus-circle"></i> 新增课程分类</a>
					<a class="btn btn-primary pull-right btn-sm" href="course_add.php" style="z-index: 2;position: relative;margin-right: 10px;"><i class="fa fa-plus-circle"></i> 新增课程</a>

					<section class="section">
                    	<ol class="breadcrumb">
                            <li class="breadcrumb-item active"><a href="course_list.php">课程管理</a></li>
                            <li class="breadcrumb-item"><a href="usort_add.php">课程分类</a></li>

                        </ol>
                        <style type="text/css">
                        .active a{font-weight: bold;color: #a2a9d4}
                    	</style>

						<div class="section-body ">
							<form id="form">
							<div class="row">
								
								<div class="col-lg-3">

									<div class="card card-primary">

										<div class="card-header">
											<h4><?php echo $S_title?> - 课程列表</h4>
										</div>
											
												<ul class="list-group">
													<?php 
													if($C_id==0){
														$sql="select * from sl_course,sl_usort where C_sort=S_id and S_del=0 and C_del=0 order by C_id desc limit 20";
													}else{
														$sql="select * from sl_course,sl_usort where C_sort=S_id and S_del=0 and C_del=0 and C_sort=$C_sort order by C_id desc limit 20";
													}
														
																$result = mysqli_query($conn, $sql);
																if (mysqli_num_rows($result) > 0) {
																while($row = mysqli_fetch_assoc($result)) {
																	if($row["C_id"]==$C_id){
																		$active="active";
																	}else{
																		$active="";
																	}
																	echo "<a href=\"?C_id=".$row["C_id"]."\" class=\"list-group-item ".$active."\"><b>[".$row["S_title"]."]</b> ".htmlspecialchars($row["C_title"])."</a>";
																}
															}
													?>
													
												</ul>
											
										
									</div>
									<a href="course_add.php" class="btn btn-sm btn-primary"><i class="fa fa-plus-circle"></i> 新增课程</a>
								</div>

								<div class="col-lg-9">
									<div class="card card-primary">
										<div class="card-header ">
											<h4>课程管理</h4>
										</div>
										<div class="card-body">

												

												<div class="form-group row">
													<label class="col-md-2 col-form-label" >课程标题</label>
													<div class="col-md-10">
														<input type="text" id="C_title" name="C_title" class="form-control" value="<?php echo htmlspecialchars($C_title)?>">
													</div>
												</div>

												<div class="form-group row">
													<label class="col-md-2 col-form-label" >课程图片</label>
													<div class="col-md-10">
														<p><img src="<?php echo pic2($C_pic)?>" id="C_picx" class="showpic" onClick="showUpload('C_pic','C_pic','../media',1,null,'','');" alt="<img src='<?php echo pic2($C_pic)?>' class='showpicx'>"></p>
														<div class="input-group">
						                                        <input type="text" id="C_pic" name="C_pic" class="form-control" value="<?php echo $C_pic?>">
						                                        <span class="input-group-btn">
						                                                <button class="btn btn-primary m-b-5 m-t-5" type="button" onClick="showUpload('C_pic','C_pic','../media',1,null,'','');">上传</button>
						                                        </span>
						                                </div>
														
													</div>
												</div>

												<div class="form-group row">
													<label class="col-md-2 col-form-label" >课程作者</label>
													<div class="col-md-4">
														<input type="text"  name="C_author" class="form-control" value="<?php echo $C_author?>">
													</div>

													<label class="col-md-2 col-form-label" >课程价格</label>
													<div class="col-md-4">
														<div class="input-group">
														<span class="input-group-addon">出售价</span>
														<input type="text"  name="C_price" class="form-control" value="<?php echo $C_price?>">
														<span class="input-group-addon">元</span>
													</div>
													
													</div>

												</div>

												<div class="form-group row">
													<label class="col-md-2 col-form-label" >发布日期</label>
													<div class="col-md-4">
														<div class="input-group">
										                    <input type="text"  name="C_time" id="C_time" class="form-control" value="<?php echo $C_time?>">
										                    <span class="input-group-btn">
										                        <button class="btn btn-info" type="button" onclick="getdate()">获取</button>
										                    </span>
										                </div>
													</div>
												
													<label class="col-md-2 col-form-label" >观看次数</label>
													<div class="col-md-4">
														<div class="input-group">
														<input type="text"  name="C_view" class="form-control" value="<?php echo $C_view?>">
														<span class="input-group-addon">次</span>
													</div>
													</div>
												</div>

												<div class="form-group row">
													<label class="col-md-2 col-form-label" >课程排序</label>
													<div class="col-md-4" style="position: relative;">
														<input type="text"  name="C_order" class="form-control" value="<?php echo $C_order?>" placeholder="数字越小，排序越靠前">

														<label style="position: absolute;right: 25px;top: 10px;"><input type="checkbox" name="C_top" value="1" <?php if($C_top==1){echo "checked='checked'";}?> >置顶</label>

														<div style="margin-top: 10px;font-size: 12px;color: #AAAAAA">*数字越小，排序越靠前</div>
													</div>
												
													<label class="col-md-2 col-form-label" >课程分类</label>
													<div class="col-md-4">
														<select name="C_sort" class="form-control">
															<?php
													$sql2="select * from sl_usort where S_del=0 and S_sub=0 order by S_order,S_id desc";
														$result2 = mysqli_query($conn, $sql2);
														if (mysqli_num_rows($result2) > 0) {
														while($row2 = mysqli_fetch_assoc($result2)) {
															echo "<optgroup label=\"".$row2["S_title"]."\">";
															$sql="select * from sl_usort where S_del=0 and S_sub=".$row2["S_id"]." order by S_order,S_id desc";
																$result = mysqli_query($conn, $sql);
																if (mysqli_num_rows($result) > 0) {
																while($row = mysqli_fetch_assoc($result)) {
																	if($C_sort==$row["S_id"]){
																		$selected="selected";
																	}else{
																		$selected="";
																	}
																	echo "<option value=\"".$row["S_id"]."\" ".$selected.">".$row["S_title"]."</option>";
																}
															}
															echo "</optgroup>";
														}
													}

															?>
															
														</select>
														<div style="margin-top: 10px;font-size: 12px;color: #AAAAAA">*课程无法直接归到主分类，如果无法选择请先新建子分类</div>
													</div>
												</div>

												<div class="form-group row">
													<label class="col-md-2 col-form-label" >课程审核</label>
													<div class="col-md-4">
														<select class="form-control" name="C_sh">
															<option value="0" <?php if($C_sh==0){echo "selected=\"selected\"";}?>>未审核</option>
															<option value="1" <?php if($C_sh==1){echo "selected=\"selected\"";}?>>已通过</option>
															<option value="2" <?php if($C_sh==2){echo "selected=\"selected\"";}?>>未通过</option>
														</select>
													</div>
												
												</div>


												<div class="form-group row" style="background: #f7f7f7;padding: 10px 0">
													<label class="col-md-2 col-form-label" >课时设置</label>
													<div class="col-md-10">
														<div style="margin: 10px 0;">
														<button type="button" class="btn btn-info btn-sm" onclick="AddPic3()">＋ 新增章节分隔线</button>
													</div>

														<table class="table" id="pic1">
														<?php
															$kf=explode("||",$C_lesson);
															for($i=0;$i<count($kf);$i++){
																if(strpos($kf[$i],"_")!==false){
																	echo '<tr id="pp'.$i.'"><td><div class="input-group">
															            <input type="text" placeholder="课时名称" name="picpic1_'.$i.'" class="form-control" value="'.splitx($kf[$i],"__",0).'">
															            <div style="position:relative;max-width:100px"><input type="text" placeholder="价格（元）" name="picpic2_'.$i.'" class="form-control" value="'.splitx($kf[$i],"__",1).'"></div>
															            <div style="position:relative;min-width:250px"><input type="text" placeholder="视频网址" id="video_'.$i.'" name="picpic3_'.$i.'" class="form-control" value="'.splitx($kf[$i],"__",2).'"><button class="btn btn-info btn-sm" type="button" onClick="showUpload(\'video_'.$i.'\',\'video_'.$i.'\',\'../media\',1,null,\'\',\'\');" style="position:absolute;right:5px;top:5px;">上传</button></div>
															            
															            <div style="position:relative;max-width:100px"><input type="text" placeholder="时长" name="picpic4_'.$i.'" class="form-control" value="'.splitx($kf[$i],"__",3).'"></div>
															            <span class="input-group-btn">
															                    <button class="btn btn-primary m-b-5  m-t-5" type="button" onclick="DelPic('.$i.')">－ 删除</button>
															            </span>
															    </div></td></tr>';
																}else{
																	echo '<tr id="pp'.$i.'"><td><div class="input-group">
															            <input type="text" placeholder="章节名称" name="picpic5_'.$i.'" class="form-control" value="'.splitx($kf[$i],"__",0).'">
															            <span class="input-group-btn">
															                    <button class="btn btn-primary m-b-5  m-t-5" type="button" onclick="DelPic('.$i.')">－ 删除</button>
															            </span>
															    </div></td></tr>';

																}
															}
														?>
													</table>
														<button type="button" class="btn btn-primary btn-sm" onclick="AddPic()">＋ 新增一节课时</button>
														<button type="button" class="btn btn-info btn-sm" onclick="AddPic2()">＋ 新增章节分隔线</button>
														<div style="font-size: 12px;color: #AAAAAA;display: inline-block;margin-left: 20px;">*不会设置？点击<a href="<?php echo $url_from?>/h34.html" target="_blank">查看帮助</a></div>
													</div>
												</div>

												<div class="form-group row">
													<label class="col-md-2 col-form-label" >课程介绍</label>
													<div class="col-md-10">
														<script charset='utf-8' src='../kindeditor/kindeditor-all-min.js'></script>
		                                                <script charset='utf-8' src='../kindeditor/lang/zh-CN.js'></script>
		                                                <script>KindEditor.ready(function(K) {window.editor = K.create('#content', {uploadJson : '../kindeditor/php/upload_json.php', fileManagerJson : '../kindeditor/php/file_manager_json.php',allowFileManager : true,items:[
        'source', '|', 'undo', 'redo', '|', 'preview', 'print', 'template', 'code', 'cut', 'copy', 'paste',
        'plainpaste', 'wordpaste', '|', 'justifyleft', 'justifycenter', 'justifyright',
        'justifyfull', 'insertorderedlist', 'insertunorderedlist', 'indent', 'outdent', 'subscript',
        'superscript', 'clearhtml', 'quickformat', 'selectall', '|', 'fullscreen', '/',
        'formatblock', 'fontname', 'fontsize', '|', 'forecolor', 'hilitecolor', 'bold',
        'italic', 'underline', 'strikethrough', 'lineheight', 'removeformat', '|', 'image', 'multiimage',
         'insertfile', 'table', 'hr', 'emoticons', 'baidumap', 'pagebreak',
        'anchor', 'link', 'unlink', '|', 'about'
] });});</script>
		                                                <textarea name='C_content' style='width:100%;height:350px;' id='content'><?php echo $C_content?></textarea>
														
													</div>
												</div>

												<div class="form-group row">
													<label class="col-md-2 col-form-label" ></label>
													<div class="col-md-10">
														<button class="btn btn-info" type="button" onClick="save(1)">保存</button>
														<button class="btn btn-primary" type="button" onClick="save(2)">保存并返回</button>
													</div>
												</div>
										</div>
									</div>
								</div>
							</div>
							</form>
						</div>
					</section>
				</div>

			</div>
		</div>

		<script src="assets/js/jquery.min.js"></script>
		<script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>
		<script src="assets/plugins/toggle-menu/sidemenu.js"></script>
		<script src="assets/plugins/scroll-bar/jquery.mCustomScrollbar.concat.min.js"></script>
		<script src="assets/js/scripts.js"></script>
		<script src="assets/js/help.js"></script>
		<script src="assets/plugins/toastr/build/toastr.min.js"></script>

		<script type="text/javascript">
		function save(id){
			toastr.warning('请稍等...','');
			editor.sync();
				$.ajax({
            	url:'?action=<?php echo $aa?>',
            	type:'post',
            	data:$("#form").serialize(),
            	success:function (data) {
            	data=JSON.parse(data);
            	if(data.msg=="success"){
            		if(id==1){
	            		if(data.C_id==0){
	            			toastr.success("保存成功", "成功");
	            		}else{
	            			window.location.href="course_add.php?C_id="+data.C_id;
	            		}
            		}else{
            			window.location.href="course_list.php";
            		}
            	}else{
            		toastr.error(data.msg, '错误');
            	}
            	}
            });

			}

			

			function getdate(){
				var day1 = new Date();
				day1.setDate(day1.getDate());
				var s1 = day1.format("yyyy-MM-dd hh:mm:ss");
				$("#C_time").val(s1);
			}

			Date.prototype.format = function (fmt) {
			    var o = {
			        "M+": this.getMonth() + 1, //月份
			        "d+": this.getDate(), //日
			        "h+": this.getHours(), //小时
			        "m+": this.getMinutes(), //分
			        "s+": this.getSeconds(), //秒
			        "q+": Math.floor((this.getMonth() + 3) / 3), //季度
			        "S": this.getMilliseconds() //毫秒
			    };
			    if (/(y+)/.test(fmt)) fmt = fmt.replace(RegExp.$1, (this.getFullYear() + "").substr(4 - RegExp.$1.length));
			    for (var k in o)
			        if (new RegExp("(" + k + ")").test(fmt)) fmt = fmt.replace(RegExp.$1, (RegExp.$1.length == 1) ? (o[k]) : (("00" + o[k]).substr(("" + o[k]).length)));
			    return fmt;
			}

			$(function() { $('.buy label').click(function(){var aa = $(this).attr('aa');$('[aa="'+aa+'"]').removeAttr('class') ;$(this).attr('class','checked');});});
document.addEventListener('keydown', function(e) {
  if (e.keyCode == 83 && (navigator.platform.match("Mac") ? e.metaKey : e.ctrlKey))      {
        e.preventDefault();
        save(1);
      }
});
		</script>
		
	</body>
</html>
