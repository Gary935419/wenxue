<?php
require '../conn/conn.php';
require '../conn/function.php';
require 'admin_check.php';

$action=$_GET["action"];

$D_domain=splitx($_SERVER["HTTP_HOST"].$_SERVER["PHP_SELF"],"/".$C_admin,0);
$dirx=splitx($_SERVER["PHP_SELF"],$C_admin,0);

$V_id=intval($_GET["V_id"]);

if($V_id!=""){
	$aa="edit&V_id=".$V_id;
	$sql="select * from sl_videos where V_id=".$V_id;
	$result = mysqli_query($conn, $sql);
	$row = mysqli_fetch_assoc($result);
	if (mysqli_num_rows($result) > 0) {
		$V_pic=$row["V_pic"];
		$V_title=$row["V_title"];
		$V_content=$row["V_content"];
		$V_price=$row["V_price"];
		$V_order=$row["V_order"];
		$V_date=$row["V_date"];
        $V_video=$row["V_video"];
	}
}else{
	$aa="add";
    $V_title="";
    $V_pic="nopic.png";
    $V_date=date('Y-m-d H:i:s');
    $V_price=0;
	$C_order=0;
}

if($action=="add"){
	$V_pic=$_POST["V_pic"];
	$V_title=$_POST["V_title"];
	$V_content=str_replace("&quot;","",$_POST["V_content"]);
	$V_price=round($_POST["V_price"],2);
	$V_order=intval($_POST["V_order"]);
    $V_date=date('Y-m-d H:i:s',time());
    $V_video=$_POST["V_video"];
    $V_del=0;
	if($V_price<0){
		die("{\"msg\":\"视频价格不可为负\"}");
	}

	if($V_pic!="" && $V_title!="" && $V_content!="" && $V_price!="" && $V_order!="" && $V_video!=""){
		mysqli_query($conn,"insert into sl_videos(V_pic,V_title,V_content,V_price,V_order,V_date,V_video,V_del) values('$V_pic','$V_title','$V_content',$V_price,$V_order,'$V_date','$V_video',0)");

// 		$V_id=getrs("select * from sl_videos where $V_title='$V_title' and V_pic='$V_pic' and V_order=$V_order","V_id");
		mysqli_query($conn, "insert into sl_log(L_aid,L_time,L_add,L_ip,L_title) values(".$_SESSION["A_id"].",'".date('Y-m-d H:i:s')."','".$_SESSION["add"]."','".getip()."','新增视频')");
		die("{\"msg\":\"success\",\"V_id\":666}");
	}else{
		die("{\"msg\":\"请填全内容\"}");
	}
}

if($action=="edit"){
	$V_pic=$_POST["V_pic"];
	$V_title=$_POST["V_title"];
	$V_content=str_replace("&quot;","",$_POST["V_content"]);
	$V_price=round($_POST["V_price"],2);
	$V_order=intval($_POST["V_order"]);
	$V_video=$_POST["V_video"];
    $V_date=date('Y-m-d H:i:s',time());

	if($V_pic!="" && $V_title!="" && $V_content!="" && $V_price!="" && $V_order!="" && $V_video!=""){
		mysqli_query($conn, "update sl_videos set
		V_pic='$V_pic',
		V_title='$V_title',
		V_content='$V_content',
		V_price=$V_price,
		V_order=$V_order,
		V_video='$V_video',
		V_date='$V_date'
		where V_id=".$V_id);
		mysqli_query($conn, "insert into sl_log(L_aid,L_time,L_add,L_ip,L_title) values(".$_SESSION["A_id"].",'".date('Y-m-d H:i:s')."','".$_SESSION["add"]."','".getip()."','编辑视频')");
        die("{\"msg\":\"success\",\"V_id\":666}");
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
		<title>视频设置 - 后台管理</title>

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
<!--					-->
<!--					<a class="btn btn-primary pull-right btn-sm" href="usort_add.php" style="z-index: 2;position: relative;margin-right: 10px;"><i class="fa fa-plus-circle"></i> 新增课程分类</a>-->
<!--					<a class="btn btn-primary pull-right btn-sm" href="course_add.php" style="z-index: 2;position: relative;margin-right: 10px;"><i class="fa fa-plus-circle"></i> 新增课程</a>-->

					<section class="section">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.php">后台管理</a></li>
                            <li class="breadcrumb-item active" aria-current="page">视频管理</li>
                        </ol>
                        <style type="text/css">
                        .active a{font-weight: bold;color: #a2a9d4}
                    	</style>

						<div class="section-body ">
							<form id="form">
							<div class="row">
								<div class="col-lg-12">
									<div class="card card-primary">
										<div class="card-header ">
											<h4>视频管理</h4>
										</div>
										<div class="card-body">

												<div class="form-group row">
													<label class="col-md-2 col-form-label" ><span style="color:red;">*</span>视频标题</label>
													<div class="col-md-10">
														<input type="text" id="V_title" name="V_title" class="form-control" value="<?php echo htmlspecialchars($V_title)?>">
													</div>
												</div>

												<div class="form-group row">
													<label class="col-md-2 col-form-label" ><span style="color:red;">*</span>视频封面图</label>
													<div class="col-md-10">
														<p><img src="<?php echo pic2($V_pic)?>" id="V_picx" class="showpic" onClick="showUpload('V_pic','V_pic','../media',1,null,'','');" alt="<img src='<?php echo pic2($V_pic)?>' class='showpicx'>"></p>
														<div class="input-group">
						                                        <input type="text" id="V_pic" name="V_pic" class="form-control" value="<?php echo $V_pic?>">
						                                        <span class="input-group-btn">
						                                                <button class="btn btn-primary m-b-5 m-t-5" type="button" onClick="showUpload('V_pic','V_pic','../media',1,null,'','');">上传</button>
						                                        </span>
						                                </div>
													</div>
												</div>

                                                <div class="form-group row">
                                                    <label class="col-md-2 col-form-label" ><span style="color:red;">*</span>上传视频</label>
                                                    <div class="col-md-10">
                                                        <div class="input-group">
                                                            <input type="text" id="V_video" name="V_video" class="form-control" value="<?php echo $V_video?>">
                                                            <span class="input-group-btn">
                                                                <button class="btn btn-info m-b-5 m-t-5" type="button" onClick="showUpload('V_video','V_video','../media',1,null,'','');">上传</button>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>

                                                <?php if (!empty($V_video)){ ?>
                                                    <div class="form-group row">
                                                        <label class="col-md-2 col-form-label" >视频内容预览</label>
                                                        <div class="col-md-10">
                                                            <div class="input-group">
                                                                <video width="100%" style="max-height:500px;background:#000000" poster="<?php echo pic2($V_pic)?>" controls>
                                                                    <source src="../media/<?php echo $V_video?>" type="video/mp4">您的浏览器不支持 video 标签。</video>
                                                            </div>
                                                        </div>
                                                    </div>
                                                <?php }else{ ?>

                                                <?php } ?>

												<div class="form-group row">
													<label class="col-md-2 col-form-label" ><span style="color:red;">*</span>视频价格</label>
													<div class="col-md-4">
														<div class="input-group">
<!--														<span class="input-group-addon">出售价</span>-->
														<input type="number" name="V_price" id="V_price" class="form-control" value="<?php echo $V_price?>">
														<span class="input-group-addon">元</span>
													</div>
													
													</div>

												</div>

<!--												<div class="form-group row">-->
<!--													<label class="col-md-2 col-form-label" >发布日期</label>-->
<!--													<div class="col-md-4">-->
<!--														<div class="input-group">-->
<!--										                    <input type="text"  name="C_time" id="C_time" class="form-control" value="--><?php //echo $C_time?><!--">-->
<!--										                    <span class="input-group-btn">-->
<!--										                        <button class="btn btn-info" type="button" onclick="getdate()">获取</button>-->
<!--										                    </span>-->
<!--										                </div>-->
<!--													</div>-->
<!--												-->
<!--													<label class="col-md-2 col-form-label" >观看次数</label>-->
<!--													<div class="col-md-4">-->
<!--														<div class="input-group">-->
<!--														<input type="text"  name="C_view" class="form-control" value="--><?php //echo $C_view?><!--">-->
<!--														<span class="input-group-addon">次</span>-->
<!--													</div>-->
<!--													</div>-->
<!--												</div>-->

												<div class="form-group row">
													<label class="col-md-2 col-form-label" ><span style="color:red;">*</span>视频排序</label>
													<div class="col-md-4" style="position: relative;">
														<input type="number"  name="V_order" id="V_order" class="form-control" value="<?php echo $V_order?>" placeholder="数字越小，排序越靠前">

<!--														<label style="position: absolute;right: 25px;top: 10px;"><input type="checkbox" name="C_top" value="1" --><?php //if($C_top==1){echo "checked='checked'";}?><!-- >置顶</label>-->

														<div style="margin-top: 10px;font-size: 12px;color: #AAAAAA">*数字越小，排序越靠前</div>
													</div>
												</div>

												<div class="form-group row">
													<label class="col-md-2 col-form-label" ><span style="color:red;">*</span>视频介绍</label>
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
		                                                <textarea name='V_content' style='width:100%;height:350px;' id='content'><?php echo $V_content?></textarea>
														
													</div>
												</div>

												<div class="form-group row">
													<label class="col-md-2 col-form-label" ></label>
													<div class="col-md-10">
														<!--<button class="btn btn-info" type="button" onClick="save(1)">保存</button>-->
														<button class="btn btn-primary" type="button" onClick="save(2)">确认提交</button>
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
            		window.location.href="videos_list.php";
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
