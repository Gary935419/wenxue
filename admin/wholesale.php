<?php
require '../conn/conn.php';
require '../conn/function.php';
require 'admin_check.php';

$action=$_GET["action"];
$dirx=splitx($_SERVER["PHP_SELF"],$C_admin,0);
$D_domain=splitx($_SERVER["HTTP_HOST"].$_SERVER["PHP_SELF"],"/".$C_admin,0);

if($action=="list"){
	$part=$_POST["part"];
	$key=$_POST["key"];
	$url=$_POST["url"];
	$info=getbody($url."/api/collection.php?action=list","key=".$key."&part=".json_encode($part));
	die($info);
}

if($action=="info"){
	$type=$_GET["type"];
	$id=$_GET["id"];
	$md5x=$_GET["md5"];
	$key=$_POST["key"];
	$url=$_POST["url"];
	switch($type){
		case "text":
		$md5=md5(s("select * from sl_text where T_id=".$id));
		break;
		case "slide":
		$md5=md5(s("select * from sl_slide where S_id=".$id));
		break;
		case "menu":
		$md5=md5(s("select * from sl_menu where U_id=".$id));
		break;
		case "course":
		$md5=md5(s("select * from sl_course where C_id=".$id));
		break;
		case "usort":
		$md5=md5(s("select * from sl_usort where S_id=".$id));
		break;
		case "news":
		$md5=md5(s("select * from sl_news where N_id=".$id));
		break;
		case "nsort":
		$md5=md5(s("select * from sl_nsort where S_id=".$id));
		break;
		case "product":
		$md5=md5(s("select * from sl_product where P_id=".$id));
		break;
		case "psort":
		$md5=md5(s("select * from sl_psort where S_id=".$id));
		break;
		case "card":
		$md5=md5(s("select * from sl_card where C_id=".$id));
		break;
		case "csort":
		$md5=md5(s("select * from sl_csort where S_id=".$id));
		break;
	}
	if($md5!=$md5x){

		$info=getbody($url."/api/collection.php?action=info","key=".$key."&type=".$type."&id=".$id);
		$info=json_decode($info,true);

		$p=$info["pic"];

		for($i=0;$i<count($p);$i++){
			$pic=$p[$i]["pic"];
			$path=$p[$i]["path"];
			mkdirs_2(dirname($pic));
			if(!is_file($pic)){
				file_put_contents($pic,getbody($path,"","GET"));
			}
		}

		$sql=$info["sql"];
		$sql=explode(";__",trim($sql,"\xEF\xBB\xBF"));

		for($i=0;$i<count($sql);$i++){
			@mysqli_query($conn,$sql[$i]);
			//die($sql[$i]);
		}

	}
	die($md5."|".$md5x);
}


function s($sql){
	global $conn;
	$result = mysqli_query($conn, $sql);
	$row = mysqli_fetch_assoc($result);
	return json_encode($row);
}

/*
if($action=="pic"){
	$pic=$_GET["pic"];
	$path=$_GET["path"];
	mkdirs_2(dirname($pic));
	if(!is_file($pic)){
		file_put_contents($pic,getbody($path,"","GET"));
	}
	die();
}

if($action=="sql"){
	$part=$_POST["part"];
	$key=$_POST["key"];
	$url=$_POST["url"];
	$info=getbody($url."/api/collection.php?action=getlist","key=".$key."&part=".json_encode($part));
	$sql=json_decode($info)->sql;
	$dir=json_decode($info)->dir;
	$sql=str_replace($dir."kindeditor",$dirx."kindeditor",$sql);

	if(strpos($sql,";\r\n")!==false){
		$sql=explode(";\r\n",trim($sql,"\xEF\xBB\xBF"));
	}else{
		$sql=explode(";\n",trim($sql,"\xEF\xBB\xBF"));
	}

	for($i=0;$i<count($sql);$i++){
		@mysqli_query($conn,$sql[$i]);
	}
	die();
}
*/
if($action=="count"){
	$genkey=trim($_POST["genkey"]);
	$info=getbody($huoyuan."/api.php","action=count&genkey=".$genkey."&domain=".$_SERVER['HTTP_HOST']);
	if($info=="error"){
		die("{\"code\":\"error\",\"msg\":\"????????????????????????????????????\"}");
	}else{
		if($info=="error2"){
			die("{\"code\":\"error\",\"msg\":\"?????????????????????\"}");
		}else{
			die("{\"code\":\"success\",\"msg\":\"$info\"}");
		}
	}
}

if($action=="import"){
	$id=intval($_GET["id"]);
	$genkey=trim($_POST["genkey"]);
	$price=$_POST["price"];
	$sort=$_POST["sort"];
	$info=getbody($huoyuan."/api.php","action=item&P_id=".$id."&genkey=".$genkey."&domain=".$_SERVER['HTTP_HOST']);
	if($info=="error"){
		die("{\"code\":\"error\",\"msg\":\"????????????????????????????????????\"}");
	}else{
		if($info=="error2"){
			die("{\"code\":\"error\",\"msg\":\"?????????????????????\"}");
		}else{
			if($info=="error3"){
				die("{\"code\":\"error\",\"msg\":\"??????????????????\"}");
			}else{
				$info=json_decode($info,true);
				if(getrs("select P_id from sl_product where P_title='".$info["P_title"]."' and P_del=0","P_id")==""){
					mysqli_query($conn, "insert into sl_product(P_title,P_price,P_price2,P_sort,P_pic,P_order,P_selltype,P_rest,P_sell,P_unlogin,P_fx,P_tag,P_content,P_sh,P_vip) values('".$info["P_title"]."',".round($price).",".round($price).",".intval($sort).",'".downpic("../media/",$info["P_pic"])."',0,0,0,'".$info["P_sell"]."',1,1,'','".savepic($info["P_content"],$dirx)."',1,1)");
					die("{\"code\":\"success\",\"msg\":\"".$info["P_title"]."\"}");
				}else{
					mysqli_query($conn, "update sl_product set P_sell='".$info["P_sell"]."' where P_title='".$info["P_title"]."'");
					die("{\"code\":\"error\",\"msg\":\"???".$info["P_title"]."????????????\"}");
				}
			}
		}
	}
}

?>
<!DOCTYPE html>
<html lang="en">
	<head>

		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>???????????? - ????????????</title>

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
		.showpic{height: 50px;border: solid 1px #DDDDDD;padding: 5px;}
		html{height: 100%}
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
					<section class="section">

						<div class="section-body ">
							
							<div class="row">
								
								<div class="col-lg-5">
									<form id="form">
									<div class="card card-primary">
										<div class="card-header ">
											<h4>????????????</h4>
										</div>
										<div class="card-body">
											<div class="form-group row">
											<label class="col-md-3 col-form-label" >????????????</label>
													<div class="col-md-9">
														<select name="sort" class="form-control">
															<?php
																$sql2="select * from sl_psort where S_del=0 and S_sub=0 order by S_order,S_id desc";
																	$result2 = mysqli_query($conn, $sql2);
																	if (mysqli_num_rows($result2) > 0) {
																	while($row2 = mysqli_fetch_assoc($result2)) {
																		echo "<optgroup label=\"".$row2["S_title"]."\">";
																		$sql="select * from sl_psort where S_del=0 and S_sub=".$row2["S_id"]." order by S_order,S_id desc";
																			$result = mysqli_query($conn, $sql);
																			if (mysqli_num_rows($result) > 0) {
																			while($row = mysqli_fetch_assoc($result)) {
																				if($P_sort==$row["S_id"]){
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
														
													</div>
												</div>

												<div class="form-group row">
													<label class="col-md-3 col-form-label" >????????????</label>
													<div class="col-md-9">
						                                <div class="input-group">
														<input type="text"  name="price" class="form-control" value="10">
														<span class="input-group-addon">???</span>
													</div>
													</div>
												</div>

												<div class="form-group row">
													<label class="col-md-3 col-form-label" >?????????</label>
													<div class="col-md-9">
						                                <input type="text" name="genkey" class="form-control" value="">
													</div>
												</div>

											<div class="form-group row">
													<label class="col-md-3 col-form-label" >????????????</label>
													<div class="col-md-9">
														<p>1.????????????????????????????????????20????????????</p>
														<p>2.????????????????????????????????????</p>
													</div>
												</div>

												<div class="form-group row">
													<label class="col-md-3 col-form-label" ></label>
													<div class="col-md-9">
														<button class="btn btn-primary" type="button" onClick="count()">????????????</button>
														<span id="loading" style="display: none"><img src="<?php echo $huoyuan?>/images/loading.gif"> ???????????????????????????????????????...</span>
														<div class="progress progress-striped active" style="display: none;margin-top: 10px" id="progressx">
														    <div class="progress-bar progress-bar-success" role="progressbar"
														         aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"
														         style="width: 0%;" id="progress">
														    </div>
														</div>
													</div>
												</div>
										</div>
									</div>
	
									
									</form>

									<form id="form2">
									<div class="card card-primary">
										<div class="card-header ">
											<h4>????????????
												<span style="font-size: 12px;float: right"><b>???????????????</b><?php echo gethttp().$D_domain?> <b>??????KEY???</b><?php echo md5($_SESSION["A_login"].$_SESSION["A_pwd"])?></span>
											</h4>
										</div>
										<div class="card-body">

												<div class="form-group row">
													<label class="col-md-3 col-form-label" >????????????</label>
													<div class="col-md-9">
						                                <input type="text" name="url" class="form-control" value="">
													</div>
												</div>

												<div class="form-group row">
													<label class="col-md-3 col-form-label" >??????KEY</label>
													<div class="col-md-9">
						                                <input type="text" name="key" class="form-control" value="">
													</div>
												</div>

												<div class="form-group row">
													<label class="col-md-3 col-form-label" >????????????</label>
													<div class="col-md-9">
						                                <label><input type="checkbox" name="part[]" value="product">??????(?????????)</label>
						                                <label><input type="checkbox" name="part[]" value="news">??????</label>
						                                <label><input type="checkbox" name="part[]" value="course">??????</label>
						                                <label><input type="checkbox" name="part[]" value="text">??????</label>
						                                <label><input type="checkbox" name="part[]" value="slide">?????????</label>
						                                <label><input type="checkbox" name="part[]" value="menu">??????</label>
													</div>
												</div>

												<div class="form-group row">
													<label class="col-md-3 col-form-label" >????????????</label>
													<div class="col-md-9">
						                                ???????????????????????????100???????????????????????????????????????????????????KEY???<span style="color: #f00;font-weight: bold;">????????????????????????????????????????????????????????????</span>
													</div>
												</div>

												<div class="form-group row">
													<label class="col-md-3 col-form-label" ></label>
													<div class="col-md-9">
														<button class="btn btn-primary" type="button" onClick="collect()">????????????</button>
														<span id="loading2" style="display: none"><img src="<?php echo $huoyuan?>/images/loading.gif"> ???????????????????????????????????????...</span>
														<div class="progress progress-striped active" style="display: none;margin-top: 10px" id="progressx2">
														    <div class="progress-bar progress-bar-success" role="progressbar"
														         aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"
														         style="width: 0%;" id="progress2">
														    </div>
														</div>

														<span id="persent"></span>
													</div>
												</div>

										</div>
									</div>
									
									</form>

								</div>

								<div class="col-lg-7">
									<div class="card card-primary">
										<a href="<?php echo $huoyuan?>?from=<?php echo $_SERVER["HTTP_HOST"]?>" target="_blank" class="btn btn-info" style="position: absolute;top: 15px;right: 130px;">????????????</a>
										<iframe src='<?php echo $huoyuan?>?from=<?php echo $_SERVER["HTTP_HOST"]?>' id="hy" name='mapif' type='1' frameborder='0' width='100%'></iframe>
									</div>
								</div>
							</div>
						</div>
					</section>
				</div>

			</div>
		</div>

		<!--Jquery.min js-->
		<script src="assets/js/jquery.min.js"></script>

		<!--Bootstrap.min js-->
		<script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>

		<!--Sidemenu js-->
		<script src="assets/plugins/toggle-menu/sidemenu.js"></script>

		<!--mCustomScrollbar js-->
		<script src="assets/plugins/scroll-bar/jquery.mCustomScrollbar.concat.min.js"></script>

		<!--Scripts js-->
		<script src="assets/js/scripts.js"></script>

		<script src="assets/plugins/toastr/build/toastr.min.js"></script>


		<script type="text/javascript">
		function collect(){
			$("#loading2").show();
			$("#progressx2").show();
			$.ajax({
		    	url:'?action=list',
		    	type:'post',
		    	data:$("#form2").serialize(),
		    	success:function (data) {
			    	data=JSON.parse(data);
			    	if(data.code=="success"){
			    		info(0,data.list);
			    	}else{
			    		toastr.error(data.msg, '??????');
			    	}
		    	}
		    });
		}

		function info(i,p){
			$.ajax({
		    	url:'?action=info&type='+p[i]["type"]+'&id='+p[i]["id"]+'&md5='+p[i]["md5"],
		    	type:'post',
		    	data:$("#form2").serialize(),
		    	success:function (data) {
		    		if(i<p.length-1){
		    			$("#progress2").attr("style","width: "+(((i+1)/p.length)*100)+"%");
                		$("#progress2").html((((i+1)/p.length)*100).toFixed(2)+"%");
		    			info(i+1,p);
		    			i=i+1;
		    		}else{
		    			$("#progress2").attr("style","width: "+(((i+1)/p.length)*100)+"%");
        				$("#progress2").html((((i+1)/p.length)*100).toFixed(2)+"%");
        				$("#loading2").hide();
        				toastr.success("??????????????????", "??????");
		    		}
		    	}
		    });
		}

		function count(){
			$("#loading").show();
			$("#progressx").show();
			$.ajax({
		    	url:'?action=count',
		    	type:'post',
		    	data:$("#form").serialize(),
		    	success:function (data) {
			    	data=JSON.parse(data);
			    	if(data.code=="success"){
			    		$count=data.msg.split(",");
						for(var i = 0; i < $count.length; i++) {
						    imports($count[i],i,$count.length);
						}
			    	}else{
			    		toastr.error(data.msg, '??????');
			    	}
		    	}
		    });
		}

		function imports(id,i,count){
			$.ajax({
		    	url:'?action=import&id='+id,
		    	type:'post',
		    	data:$("#form").serialize(),
		    	success:function (data) {
			    	data=JSON.parse(data);
			    	$("#progress").attr("style","width: "+(((i+1)/count)*100)+"%");
                	$("#progress").html((((i+1)/count)*100).toFixed(2)+"%");

			    	if(data.code=="success"){
			    		toastr.success("???"+data.msg+"???????????????", "??????");
			    	}else{
			    		toastr.error(data.msg, '??????');
			    	}

					console.log(i);
				    console.log(count);
				    if(i==count-1){
						$("#loading").hide();
					}

		    	}
		    });
		    
		}

		$("#hy").height($(window).height()-122);
		</script>
		
	</body>
</html>
