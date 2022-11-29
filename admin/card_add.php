<?php
require '../conn/conn.php';
require '../conn/function.php';
require 'admin_check.php';

$action=$_GET["action"];
$C_id=intval($_GET["C_id"]);
$S_id=intval($_GET["S_id"]);

if($C_id!=""){
	$aa="edit&C_id=".$C_id;
	$C=getrs("select * from sl_card where C_id=".$C_id);
	if ($C!="") {
		$C_content=$C["C_content"];
		$C_sort=$C["C_sort"];
		$C_use=$C["C_use"];
		$C_type=$C["C_type"];
	}
}else{
	$aa="add";
	$C_use=0;
	$C_type=0;
	$C_sort=$S_id;
}

if($action=="add"){
	$C_content=$_POST["C_content"];
	$C_sort=intval($_POST["C_sort"]);
	$C_use=intval($_POST["C_use"]);
	$C_type=intval($_POST["C_type"]);

	if($C_sort==0){
		die("{\"msg\":\"请选择一个卡密分类\"}");
	}

	if($C_type==0){
		if($C_content!=""){
				$card=explode("\r\n",$C_content);
				for($i=0;$i<count($card);$i++){
					if(getrs("select * from sl_card where C_content='$C_content' and C_sort='$C_sort'","C_id")=="" && trim($card[$i])!=""){
						mysqli_query($conn,"insert into sl_card(C_content,C_sort,C_use,C_type) values('".trim($card[$i])."',$C_sort,$C_use,$C_type)");
					}
				}
				mysqli_query($conn, "insert into sl_log(L_aid,L_time,L_add,L_ip,L_title) values(".$_SESSION["A_id"].",'".date('Y-m-d H:i:s')."','".$_SESSION["add"]."','".getip()."','新增卡密')");
				die("{\"msg\":\"success\"}");
		}else{
			die("{\"msg\":\"请填全内容\"}");
		}
	}
	if($C_type==1){
			foreach ($_POST as $x=>$value) {
			    if(splitx($x,"_",0)=="picpic1"){
			        //$pic=$pic.$_POST[$x]."|";
			        mysqli_query($conn,"insert into sl_card(C_content,C_sort,C_use,C_type) values('".$_POST[$x]."',$C_sort,$C_use,$C_type)");
			    }
			}
			mysqli_query($conn, "insert into sl_log(L_aid,L_time,L_add,L_ip,L_title) values(".$_SESSION["A_id"].",'".date('Y-m-d H:i:s')."','".$_SESSION["add"]."','".getip()."','新增卡密')");
			die("{\"msg\":\"success\"}");
		}
	}

if($action=="edit"){
	$C_content=$_POST["C_content"];
	$C_sort=intval($_POST["C_sort"]);
	$C_use=intval($_POST["C_use"]);
	$C_type=intval($_POST["C_type"]);

	if($C_sort==0){
		die("{\"msg\":\"请选择一个卡密分类\"}");
	}

	if(getrs("select * from sl_card where C_content='$C_content' and C_sort='$C_sort' and not C_id=$C_id","C_id")==""){
		if($C_type==0){
			if($C_content!=""){
				if(strpos($C_content,"\r\n")===false){
					mysqli_query($conn, "update sl_card set C_content='$C_content',C_sort=$C_sort,C_use=$C_use,C_type=$C_type where C_id=".$C_id);
					mysqli_query($conn, "insert into sl_log(L_aid,L_time,L_add,L_ip,L_title) values(".$_SESSION["A_id"].",'".date('Y-m-d H:i:s')."','".$_SESSION["add"]."','".getip()."','编辑卡密')");
					die("{\"msg\":\"success\"}");
				}else{
					die("{\"msg\":\"不支持编辑多个\"}");
				}
			}else{
				die("{\"msg\":\"请填全内容\"}");
			}
		}
		if($C_type==1){
			$C_content=$_POST["picpic1_0"];
			mysqli_query($conn, "update sl_card set C_content='$C_content',C_sort=$C_sort,C_use=$C_use,C_type=$C_type where C_id=".$C_id);
			mysqli_query($conn, "insert into sl_log(L_aid,L_time,L_add,L_ip,L_title) values(".$_SESSION["A_id"].",'".date('Y-m-d H:i:s')."','".$_SESSION["add"]."','".getip()."','编辑卡密')");
			die("{\"msg\":\"success\"}");
		}
	}else{
		die("{\"msg\":\"卡密内容重复\"}");
	}
}
?>
<!DOCTYPE html>
<html lang="en">
	<head>

		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>卡密设置 - 后台管理</title>

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
		.showpic{max-height: 100px;border: solid 1px #DDDDDD;padding: 5px;max-width: 100px}
		.list-group a{text-decoration:none}
		.buy label {
			padding: 1px 5px;
			cursor: pointer;
			border: #CCCCCC solid 2px;
			-moz-border-radius: 3px;
			-webkit-border-radius: 3px;
			border-radius: 3px;
			color: #CCCCCC;
		}

		.buy .checked {
			border: #ff0000 solid 2px;
			-moz-border-radius: 3px;
			-webkit-border-radius: 3px;
			border-radius: 3px;
			color: #ff0000;
		}

		.buy input[type="radio"] {
			display: none;
		}
	</style>
	<script type="text/javascript">
		function AddPic()
{
 var i =pic1.rows.length;
 var newTr = pic1.insertRow();
 var _id='pp'+i;
 var newTd0 = newTr.insertCell();
 newTr.id=_id;
 newTd0.innerHTML ='<div class="row"><div class="col-md-3"><img src="../media/nopic.png" id="picpic1_'+i+'x" class="showpic" onClick="showUpload(\'picpic1_'+i+'\',\'picpic1_'+i+'\',\'../media\',1,null,\'\',\'\');" alt="<img src=\'../media/nopic.png\' class=\'showpicx\'>"></div><div class="col-md-9"><div class="input-group"><input type="text" id="picpic1_'+i+'" name="picpic1_'+i+'" class="form-control" value="nopic.png"><span class="input-group-btn"><button class="btn btn-primary m-b-5 m-t-5" type="button" onClick="showUpload(\'picpic1_'+i+'\',\'picpic1_'+i+'\',\'../media\',1,null,\'\',\'\');">上传</button></span></div><button class="btn btn-danger btn-sm" type="button" onclick="DelPic('+i+')">- 删除该图</button></div></div>';
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
					<section class="section">
                    	<ol class="breadcrumb">
                            <li class="breadcrumb-item active"><a href="card_list.php">卡密管理</a></li>
                            <li class="breadcrumb-item"><a href="csort_add.php">卡密分类</a></li>
                            <li class="breadcrumb-item"><a href="card_out.php">导出卡密</a></li>
                        </ol>
                        <style type="text/css">
                        .active a{font-weight: bold;color: #a2a9d4}
                    	</style>

						<div class="section-body ">
							<form id="form">
							<div class="row">
								
								<div class="col-lg-8">
									<div class="card card-primary">
										<div class="card-header ">
											<h4>卡密管理</h4>
										</div>
										<div class="card-body">

											<div class="form-group row">
													<label class="col-md-3 col-form-label" >卡密方式</label>
													<div class="col-md-9 buy">
														<label aa="C_type" onclick="c(0)" <?php if($C_type==0){echo "class='checked'";}?>><input value="0" type="radio" name="C_type" <?php if($C_type==0){echo "checked='checked'";}?>> 文字卡密</label>
														<label aa="C_type" onclick="c(1)" <?php if($C_type==1){echo "class='checked'";}?>><input value="1" type="radio" name="C_type" <?php if($C_type==1){echo "checked='checked'";}?>> 图片卡密</label>

													</div>
												</div>

												<div class="form-group row" id="text">
													<label class="col-md-3 col-form-label" >卡密内容</label>
													<div class="col-md-9">
														<textarea name="C_content" id="C_content" class="form-control" rows="20"><?php echo $C_content?></textarea>
														<div style="margin-top: 10px;font-size: 12px;color: #AAAAAA">*可以批量新增卡密，每行一个，可以智能去重复 <button class="btn btn-sm btn-info" onclick="txt()" type="button">导入txt</button></div>
													</div>
												</div>

												<div class="form-group row" id="pic">
													<label class="col-md-3 col-form-label" >卡密图片</label>
													<div class="col-md-9" style="border: solid 1px #EEEEEE;padding-bottom: 10px;border-radius: 5px;background: #f9f9f9">
<table class="table" id="pic1">
															<?php
															$pic=explode("\r\n",$C_content);
															for($i=0;$i<count($pic);$i++){
																echo "<tr id=\"pp".$i."\"><td><div class=\"row\">
																<div class=\"col-md-3\">
																<img src=\"".pic2($pic[$i])."\" id=\"picpic1_".$i."x\" class=\"showpic\" onClick=\"showUpload('picpic1_".$i."','picpic1_".$i."','../media',1,null,'','');\" alt=\"<img src='".pic2($pic[$i])."' class='showpicx'>
																\"></div>

																<div class=\"col-md-9\">
																<div class=\"input-group\">
						                                        <input type=\"text\" id=\"picpic1_".$i."\" name=\"picpic1_".$i."\" class=\"form-control\" value=\"".$pic[$i]."\">
						                                        <span class=\"input-group-btn\">
						                                                <button class=\"btn btn-primary m-b-5 m-t-5\" type=\"button\" onClick=\"showUpload('picpic1_".$i."','picpic1_".$i."','../media',1,null,'','');\">上传</button>
						                                        </span>
						                                </div>
						                                <button class=\"btn btn-danger btn-sm\" type=\"button\" onclick=\"DelPic(".$i.")\">- 删除该图</button>
						                                </div>
						                                </div></td></tr>";
															}

															?>
</table>
<?php if($C_id==""){?>
<button class="btn btn-info btn-sm" type="button" onclick="AddPic()">+ 新增一个卡密图</button>
<?php }?>
													</div>
												</div>



												<div class="form-group row">
													<label class="col-md-3 col-form-label" >卡密分类</label>
													<div class="col-md-9">
														<select name="C_sort" class="form-control">
															<?php
															foreach(getlist("select * from sl_csort where S_del=0 and S_mid=0 order by S_id desc") as $c){
																	if($C_sort==$c["S_id"]){
																		$selected="selected";
																	}else{
																		$selected="";
																	}
																	echo "<option value=\"".$c["S_id"]."\" ".$selected.">".$c["S_title"]."</option>";
																}
															?>
															
														</select>
													</div>
												</div>

												<div class="form-group row">
													<label class="col-md-3 col-form-label" >已发放</label>
													<div class="col-md-9">
														<select name="C_use" class="form-control">
															<option value="0" <?php if($C_use==0){echo "selected=\"selected\"";}?>>否</option>
															<option value="1" <?php if($C_use==1){echo "selected=\"selected\"";}?>>是</option>
														</select>
														<div style="margin-top: 10px;font-size: 12px;color: #AAAAAA">*已发放的卡密不会再次发放给其他会员</div>
													</div>
												</div>

												<div class="form-group row">
													<label class="col-md-3 col-form-label" ></label>
													<div class="col-md-9">
														
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
			c(<?php echo $C_type?>);
			function txt(){
			$("#C_content").parent().append("<input type='file' id='fileId' name='file' style='display:none;' onchange='bbb()'/>");
            $("#fileId").trigger("click");
		}
		function bbb() {
			var objFile = document.getElementById("fileId");
			if(objFile.value == "") {
				alert("不能空")
			}
			var files = $('#fileId').prop('files'); //获取到文件列表
			console.log(files.length);
			if(files.length == 0) {
				alert('请选择文件');
			} else {
				for(var i = 0; f = files[i]; i++) {
					var reader = new FileReader(); //新建一个FileReader
					reader.readAsText(files[i], "UTF-8"); //读取文件
					reader.onload = function(evt) { //读取完文件之后会回来这里
						var fileString = evt.target.result; // 读取文件内容
						//console.log(fileString)
						$("#C_content").val(fileString);
					}
				}
			}
		}
		function save(id){
				$.ajax({
            	url:'?action=<?php echo $aa?>',
            	type:'post',
            	data:$("#form").serialize(),
            	success:function (data) {
            	data=JSON.parse(data);
            	if(data.msg=="success"){
            		if(id==1){
	            		toastr.success("保存成功", "成功");
            		}else{
            			window.location.href="card_list.php";
            		}
            	}else{
            		toastr.error(data.msg, '错误');
            	}
            	}
            });

			}
$('.buy label').click(function(){var aa = $(this).attr('aa');$('[aa="'+aa+'"]').removeAttr('class') ;$(this).attr('class','checked');});

function c($s){
				if($s==0){
					$("#text").show();
					$("#pic").hide();
				}else{
					$("#text").hide();
					$("#pic").show();
				}
			}
		</script>
		
	</body>
</html>
