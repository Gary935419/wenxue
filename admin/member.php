<?php
require '../conn/conn.php';
require '../conn/function.php';
require 'admin_check.php';

$page=$_GET["page"];
$action=$_GET["action"];
$M_id=intval($_GET["M_id"]);
$type=intval($_GET["type"]);

if($type==0){
	$type_info="会员";
}else{
	$type_info="商家";
}

if($page==""){
	$page=1;
}

if($M_id!=""){
	$aa="edit&M_id=".$M_id;
	$M=getrs("select * from sl_member where M_id=".$M_id);
	if ($M!="") {
		$M_head=$M["M_head"];
		$M_from=$M["M_from"];
		$M_login=htmlspecialchars($M["M_login"]);
		$M_money=$M["M_money"];
		$M_fen=$M["M_fen"];
		$M_pwd=$M["M_pwd"];
		$M_stop=$M["M_stop"];
		$M_stopinfo=$M["M_stopinfo"];
		$M_email=htmlspecialchars($M["M_email"]);
		$M_qq=htmlspecialchars($M["M_qq"]);
		$M_mobile=htmlspecialchars($M["M_mobile"]);
		$M_regtime=$M["M_regtime"];
		$M_viptimex=$M["M_viptime"];
		$M_viplongx=$M["M_viplong"];
		$M_sellertimex=$M["M_sellertime"];
		$M_sellerlongx=$M["M_sellerlong"];

		if($M_viplongx-(time()-strtotime($M_viptimex))/86400*24*60>0){
			$M_vip=1;
			if($M_viplongx>30000){
				$M_viptitle="<span style=\"color:#ff0000\">VIP会员 [".date("Y-m-d",strtotime($M_viptimex))."开通/永久时长]</span>";
			}else{
				$M_viptitle="<span style=\"color:#ff0000\">VIP会员 [".date("Y-m-d",strtotime($M_viptimex))."开通/".date('Y-m-d', strtotime ("+".$M_viplongx." day", strtotime($M_viptimex)))."到期]</span>";
			}
			
		}else{
			$M_vip=0;
			$M_viptitle="普通会员";
		}

		if($M_sellerlongx-(time()-strtotime($M_sellertimex))/86400*24*60>0){
			$M_seller=1;
			if($M_sellerlongx>30000){
				$M_sellertitle="<span style=\"color:#ff0000\">商家用户 [".date("Y-m-d",strtotime($M_sellertimex))."开通/永久时长]</span>";
			}else{
				$M_sellertitle="<span style=\"color:#ff0000\">商家用户 [".date("Y-m-d",strtotime($M_sellertimex))."开通/".date('Y-m-d', strtotime ("+".$M_sellerlongx." day", strtotime($M_sellertimex)))."到期]</span>";
			}
			
		}else{
			$M_seller=0;
			$M_sellertitle="会员用户";
		}

	}
	$title="编辑";
}else{
	$M_head="head.jpg";
	$aa="add";
	$title="新增";
	$M_viptitle="普通会员";
	$M_sellertitle="会员用户";
	$M_money=0;
	$M_fen=0;
	$M_from=0;
	$M_type=0;
	$M_vip=0;
	$M_seller=0;
	$M_stop=0;
}

if($action=="excel"){
	$sql="select * from sl_member where M_del=0";
	$result = mysqli_query($conn, $sql);
	$arr = array();  
	while($row = mysqli_fetch_array($result)) {
	$count=count($row);
	  for($i=0;$i<$count;$i++){ 
	    unset($row[$i]);
	  }   
    array_push($arr,$row);
	} 

	$filename = utfToGbk('会员表.csv');
    $fileData = utfToGbk('用户名,余额,注册时间,邮箱,积分,店铺名称,QQ号,手机号,是否VIP,是否商户') . "\n";
    foreach ($arr as $value) {
        $temp = $value['M_login'] . "\t," .
        		$value['M_money'] . "\t," .
        		$value['M_regtime'] . "\t," .
        		$value['M_email'] . "\t," .
        		$value['M_fen'] . "\t," .
        		$value['M_shop'] . "\t," .
        		$value['M_qq'] . "\t," .
        		$value['M_mobile'] . "\t," .
        		vip($value['M_viptime'],$value['M_viplong']) . "\t," .
                vip($value['M_sellertime'],$value['M_sellerlong'])."\t";
        $fileData .= utfToGbk($temp) . "\n";
    }

    header("Content-type:text/csv");
    header("Content-Disposition:attachment;filename=" . $filename);
    header('Cache-Control:must-revalidate,post-check=0,pre-check=0');
    header('Expires:0');
    header('Pragma:public');
    echo $fileData;
    exit;
}

function vip($time,$long){
	if($long-(time()-strtotime($time))/86400*24*60>0){
		if($long>9999){
			$l="永久";
		}else{
			$l=$long."天";
		}
		return "是（开通时间：".date("Y-m-d",strtotime($time))." 时长：".$l."）";
	}else{
		return "否";
	}
}
if($action=="clear"){
	mysqli_query($conn,"delete from sl_member where M_email='' and M_qq='' and M_mobile='' and M_money=0 and M_fen=0");
	die("{\"msg\":\"success\"}");
}
if($action=="creat"){
	$num=intval($_POST["num"]);
	$vip=intval($_POST["vip"]);
	$seller=intval($_POST["seller"]);

	if($num<1){
		die("{\"code\":\"error\",\"msg\":\"生成数量需大于0\"}");
	}else{
		for($i=0;$i<$num;$i++){
			$M_head="head.jpg";
			$M_login=gen_key(6,4);
			$M_pwd=gen_key(6,2);
			$M_money=0;
			$M_fen=0;
			$M_from=0;
			$M_stop=0;
			if($vip==1){
				$M_viplong=999*31;
				$M_viptime=date('Y-m-d H:i:s');
			}else{
				$M_viplong=0;
				$M_viptime='1970-01-01 00:00:00';
			}
			if($seller==1){
				$M_sellerlong=999*31;
				$M_sellertime=date('Y-m-d H:i:s');
			}else{
				$M_sellerlong=0;
				$M_sellertime='1970-01-01 00:00:00';
			}

			$info=$info."帐号：".$M_login."密码：".$M_pwd."\r\n";
			mysqli_query($conn,"insert into sl_member(M_head,M_login,M_pwd,M_money,M_fen,M_email,M_qq,M_mobile,M_regtime,M_pwdcode,M_openid,M_from,M_type,M_stop,M_stopinfo,M_viptime,M_viplong,M_sellertime,M_sellerlong) values('$M_head','$M_login','".md5($M_pwd)."',$M_money,$M_fen,'$M_email','$M_qq','$M_mobile','".date('Y-m-d H:i:s')."','','',$M_from,0,$M_stop,'$M_stopinfo','$M_viptime',$M_viplong,'$M_sellertime',$M_sellerlong)");
		}
		$info=$info."仅出现一次，请尽快保存！";
		$arr=array(
			"code"=>"success",
			"msg"=>$info
		);
		die(json_encode($arr));
	}
}
function utfToGbk($data){
    return iconv('utf-8', 'GBK', $data);
}
if($action=="add"){
$M_head=$_POST["M_head"];
$M_login=$_POST["M_login"];
$M_pwd=$_POST["M_pwd"];
$M_from=intval($_POST["M_from"]);
$M_money=round($_POST["M_money"],2);
$M_fen=intval($_POST["M_fen"]);
$M_stop=intval($_POST["M_stop"]);
$M_email=$_POST["M_email"];
$M_qq=$_POST["M_qq"];
$M_mobile=$_POST["M_mobile"];
$M_stopinfo=$_POST["M_stopinfo"];
$M_viplong=intval($_POST["M_viplong"]);
$M_sellerlong=intval($_POST["M_sellerlong"]);

if($M_login!="" && $M_pwd!=""){
	if(getrs("select * from sl_member where M_login='$M_login' and M_del=0","M_id")==""){
		mysqli_query($conn,"insert into sl_member(M_head,M_login,M_pwd,M_money,M_fen,M_email,M_qq,M_mobile,M_regtime,M_pwdcode,M_openid,M_from,M_type,M_stop,M_stopinfo) values('$M_head','$M_login','".md5($M_pwd)."',$M_money,$M_fen,'$M_email','$M_qq','$M_mobile','".date('Y-m-d H:i:s')."','','',$M_from,0,$M_stop,'$M_stopinfo')");
		$M_id=getrs("select * from sl_member where M_login='$M_login' and M_del=0","M_id");

		switch($M_viplong){
			case -1:
			mysqli_query($conn, "update sl_member set M_viplong=0,M_viptime='1970-01-01 00:00:00' where M_id=".$M_id);
			break;

			case 1:
			case 2:
			case 3:
			case 6:
			case 12:
			case 999:
			mysqli_query($conn, "update sl_member set M_viplong=".($M_viplong*31).",M_viptime='".date('Y-m-d H:i:s')."' where M_id=".$M_id);
			break;
		}

		switch($M_sellerlong){
			case -1:
			mysqli_query($conn, "update sl_member set M_type=0,M_sellerlong=0,M_sellertime='1970-01-01 00:00:00' where M_id=".$M_id);
			break;
			case 12:
			case 999:
			mysqli_query($conn, "update sl_member set M_type=1,M_sellerlong=".($M_sellerlong*31).",M_sellertime='".date('Y-m-d H:i:s')."' where M_id=".$M_id);
			break;
		}

		mysqli_query($conn, "insert into sl_log(L_aid,L_time,L_add,L_ip,L_title) values(".$_SESSION["A_id"].",'".date('Y-m-d H:i:s')."','".$_SESSION["add"]."','".getip()."','新增会员')");
		die("{\"msg\":\"success\",\"id\":\"".$M_id."\"}");
	}else{
		die("{\"msg\":\"已存在同名记录\"}");
	}
	
}else{
	die("{\"msg\":\"请填全信息\"}");
}

}

if($action=="edit"){
$M_head=$_POST["M_head"];
$M_login=$_POST["M_login"];
$M_pwd=$_POST["M_pwd"];
$M_from=intval($_POST["M_from"]);
$M_money=round($_POST["M_money"],2);
$M_fen=intval($_POST["M_fen"]);
$M_stop=intval($_POST["M_stop"]);
$M_email=$_POST["M_email"];
$M_qq=$_POST["M_qq"];
$M_mobile=$_POST["M_mobile"];
$M_stopinfo=$_POST["M_stopinfo"];
$M_viplong=intval($_POST["M_viplong"]);
$M_sellerlong=intval($_POST["M_sellerlong"]);

if($M_login!=""){
	mysqli_query($conn, "update sl_member set
	M_head='$M_head',
	M_login='$M_login',
	M_money=$M_money,
	M_fen=$M_fen,
	M_email='$M_email',
	M_qq='$M_qq',
	M_mobile='$M_mobile',
	M_stop=$M_stop,
	M_stopinfo='$M_stopinfo',
	M_from=$M_from
	where M_id=".$M_id);

	if($M_pwd!=""){
		mysqli_query($conn, "update sl_member set M_pwd='".md5($M_pwd)."' where M_id=".$M_id);
	}

	switch($M_viplong){
		case -1:
		mysqli_query($conn, "update sl_member set M_viplong=0,M_viptime='1970-01-01 00:00:00' where M_id=".$M_id);
		break;

		case 1:
		case 2:
		case 3:
		case 6:
		case 12:
		case 999:

		if($M_vip==1){//原本是VIP会员
			mysqli_query($conn, "update sl_member set M_viplong=M_viplong+".(31*$M_viplong)." where M_id=".$M_id);
		}else{//原本是普通会员
			mysqli_query($conn, "update sl_member set M_viplong=".($M_viplong*31).",M_viptime='".date('Y-m-d H:i:s')."' where M_id=".$M_id);
		}

		break;
	}

	switch($M_sellerlong){
		case -1:
		mysqli_query($conn, "update sl_member set M_type=0,M_sellerlong=0,M_sellertime='1970-01-01 00:00:00' where M_id=".$M_id);
		break;
		case 12:
		case 999:

		if($M_seller==1){//原本是VIP会员
			mysqli_query($conn, "update sl_member set M_type=1,M_sellerlong=M_sellerlong+".(31*$M_sellerlong)." where M_id=".$M_id);
		}else{//原本是普通会员
			mysqli_query($conn, "update sl_member set M_type=1,M_sellerlong=".($M_sellerlong*31).",M_sellertime='".date('Y-m-d H:i:s')."' where M_id=".$M_id);
		}

		break;
	}

	mysqli_query($conn, "insert into sl_log(L_aid,L_time,L_add,L_ip,L_title) values(".$_SESSION["A_id"].",'".date('Y-m-d H:i:s')."','".$_SESSION["add"]."','".getip()."','编辑会员')");
	die("{\"msg\":\"success\",\"id\":\"".$M_id."\"}");
}else{
	die("{\"msg\":\"请填全信息\"}");
}
}

if($action=="delall"){
	$id=$_POST["id"];
	if(count($id)>0) {
		$shu=0 ;
		for ($i=0 ;$i<count($id);$i++ ) {
			mysqli_query($conn,"update sl_member set M_del=1 where M_id=".intval($id[$i]));
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
$M_counts=getrs("select count(M_id) as M_count from sl_member where M_del=0 and M_type=$type","M_count");
?>
<!DOCTYPE html>
<html lang="en">
	<head>

		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title><?php echo $title.$type_info?> - 后台管理</title>

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

		<!--Toastr css-->
		<link rel="stylesheet" href="assets/plugins/toastr/build/toastr.css">

		<script type="text/javascript" src="../upload/upload.js"></script>
		<style type="text/css">
		.showpic{height: 100px;border: solid 1px #DDDDDD;padding: 5px;}
		.showpicx{width: 100%;max-width: 300px}
		.list-group a{text-decoration:none}
		.part{display:inline-block;width:23%;overflow:hidden;text-overflow:ellipsis;white-space: nowrap;}

.buy label {
	padding: 1px 5px;
	cursor: pointer;
	border: #CCCCCC solid 2px;
	-moz-border-radius: 3px;
	-webkit-border-radius: 3px;
	border-radius: 3px;
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
.vip{font-weight: bold;color: #ff0000}
.stop{font-weight: bold;color: #DDDDDD}
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
<!--					<a href="recycle.php" class="btn btn-info pull-right btn-sm" style="z-index: 2;position: relative;"><i class="fa fa-recycle"></i> 回收站</a>-->
					<a href="member.php" class="btn btn-primary pull-right btn-sm" style="z-index: 2;position: relative;margin-right: 5px;"><i class="fa fa-plus-circle"></i> 新增会员</a>
					<form class="input-group pull-right" style="width: 350px;z-index: 2;position: relative;margin-right: 5px;" method="post" action="?action=search">
	                    <input type="text" class="form-control input-sm" name="keyword" value="<?php echo t($_POST["keyword"])?>" placeholder="搜索会员（用户名/邮箱/手机/QQ）">
	                    <span class="input-group-btn">
	                        <button class="btn btn-info btn-sm" type="form"><i class="fa fa-search"></i> 搜索</button>
	                    </span>
	                </form>
					<section class="section">
                    	<ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.php">后台管理</a></li>
                            <li class="breadcrumb-item active" aria-current="page"><?php echo $type_info?>管理</li>
                        </ol>


						<div class="section-body ">
							<div class="row">
								<div class="col-lg-5">
									<form id="list">
									<div class="card card-primary">

										<div class="card-header">
											<h4><?php echo $type_info?>列表</h4>
										</div>
												<ul class="list-group">
													<li class="list-group-item " style="background: #f7f7f7"><div class="part"><?php echo $type_info?>ID-帐号</div><div class="part">邮箱</div></li>
													<?php 

								if($action=="search"){
									$M=getlist("select * from sl_member where M_del=0 and not M_login='未登录帐号' and (M_login like '%".t($_POST["keyword"])."%' or M_email like '%".t($_POST["keyword"])."%' or M_qq like '%".t($_POST["keyword"])."%' or M_mobile like '%".t($_POST["keyword"])."%') order by M_id desc");
								}else{
									$M=getlist("select * from sl_member where M_del=0 and not M_login='未登录帐号' and M_type=$type order by M_id desc limit ".(($page-1)*20).",20");
								}

																foreach($M as $m){
																	if($m["M_id"]==$M_id){
																		$active="active";
																	}else{
																		$active="";
																	}

																	$M_viptime=$m["M_viptime"];
																	$M_viplong=$m["M_viplong"];

																	if($M_viplong-(time()-strtotime($M_viptime))/86400*24*60>0){
																		$M_vip=" <img src=\"img/vip.png\" height=\"20\">";
																		$vipclass="vip";
																	}else{
																		if($m["M_stop"]==1){
																			$M_vip="[封]";
																			$vipclass="stop";
																		}else{
																			$M_vip="";
																			$vipclass="";
																		}
																	}

																	echo "<a id=\"".$m["M_id"]."\" href=\"?M_id=".$m["M_id"]."&type=".$type."\" class=\"list-group-item ".$active."\">
																	<div class=\"part ".$vipclass."\"><input type=\"checkbox\" name=\"id[]\" value=\"".$m["M_id"]."\"> ".$m["M_id"]."-".htmlspecialchars($m["M_login"]).$M_vip."</div> 
																	<div class=\"part\">".htmlspecialchars($m["M_email"])."</div>
																
																	<img src=\"".pic2($m["M_head"])."\" alt=\"<img src='".pic2($m["M_head"])."' width='200'><br>用户名：".htmlspecialchars($m["M_login"])."<br>邮箱：".htmlspecialchars($m["M_email"])."<br>QQ号：".htmlspecialchars($m["M_qq"])."<br>手机号：".htmlspecialchars($m["M_mobile"])."<br>账户余额：".$m["M_money"]."元<br>会员积分：".$m["M_fen"]."分<br>注册时间：".date("Y-m-d",strtotime($m["M_regtime"]))."\" style=\"height:25px;border-radius:10px;\" class=\"pull-right\"></a>";
																}
															
													?>
													
												</ul>
									</div>
									<label><input type="checkbox" id="selectAll" name="selectAll"> 全选</label>
									<button class="btn btn-sm btn-danger" type="button" onClick="delall()"><i class="fa fa-times-circle" ></i> 删除</button>
									<a href="member.php" class="btn btn-sm btn-primary"><i class="fa fa-plus-circle"></i> 新增<?php echo $type_info?></a>
<!--									<button class="btn btn-sm btn-info" type="button" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus-circle" ></i> 批量新增</button>-->
<!--									<a class="btn btn-sm btn-warning" href="?action=excel"><i class="fa fa-share"></i> 导出EXCEL</a>-->
									<ul class="pagination" id="pagination" style="float: right;"></ul>
<?php if($action!="search"){?>	
		<input type="hidden" id="PageCount" runat="server" />
        <input type="hidden" id="PageSize" runat="server" value="20" />
        <input type="hidden" id="countindex" runat="server" value="20"/>
        <!--设置最多显示的页码数 可以手动设置 默认为7-->
        <input type="hidden" id="visiblePages" runat="server" value="7" />
<?php }?>
								</form>
								</div>
								<?php if($action!="menu" && $action!="search"){?>
								
								<div class="col-lg-7">
									<form id="form">
									<div class="card card-primary">
										<div class="card-header ">
											<h4><?php echo $title?><?php echo $type_info?></h4>
										</div>
										<div class="card-body">
												<div class="form-group row">
													<label class="col-md-3 col-form-label" > <?php echo $type_info?>帐号</label>
													<div class="col-md-9">
														<input type="text"  name="M_login" class="form-control" value="<?php echo htmlspecialchars($M_login)?>">
													</div>
												</div>

												<div class="form-group row">
													<label class="col-md-3 col-form-label" ><?php echo $type_info?>密码</label>
													<div class="col-md-9">
														<input type="text" name="M_pwd" class="form-control" value="" placeholder="<?php
														if($M_id!=""){
															echo "留空则不修改密码";
														}
														?>">
														
													</div>
												</div>

												<div class="form-group row">
													<label class="col-md-3 col-form-label" ><?php echo $type_info?>头像</label>
													<div class="col-md-9">
														<p><img src="<?php echo pic2($M_head)?>" id="M_headx" class="showpic" onClick="showUpload('M_head','M_head','../media',1,null,'','');" alt="<img src='<?php echo pic2($M_head)?>' class='showpicx'>"></p>
														<div class="input-group">
															
						                                        <input type="text" id="M_head" name="M_head" class="form-control" value="<?php echo $M_head?>">
						                                        <span class="input-group-btn">
						                                                <button class="btn btn-primary m-b-5 m-t-5" type="button" onClick="showUpload('M_head','M_head','../media',1,null,'','');">上传</button>
						                                        </span>
						                                </div>
														
													</div>
												</div>

												<div class="form-group row">
													<label class="col-md-3 col-form-label" ><?php echo $type_info?>邮箱</label>
													<div class="col-md-9">
														<input type="text" name="M_email" class="form-control" value="<?php echo $M_email?>">
													</div>
												</div>

												<div class="form-group row">
													<label class="col-md-3 col-form-label" ><?php echo $type_info?>QQ</label>
													<div class="col-md-9">
														<input type="text" name="M_qq" class="form-control" value="<?php echo $M_qq?>">
													</div>
												</div>

												<div class="form-group row">
													<label class="col-md-3 col-form-label" ><?php echo $type_info?>手机</label>
													<div class="col-md-9">
														<input type="text" name="M_mobile" class="form-control" value="<?php echo $M_mobile?>">
													</div>
												</div>

												<div class="form-group row" >
													<label class="col-md-3 col-form-label" >注册时间</label>
													<div class="col-md-9 buy">
														<div style="font-weight: bold;margin-top: 7px"><?php echo $M_regtime?></div>
													</div>
												</div>


												<div class="form-group row">
													<label class="col-md-3 col-form-label" >账户状态</label>
													<div class="col-md-9" style="padding-top: 7px">
														<label><input type="radio" value="0" name="M_stop" <?php if($M_stop==0){echo "checked='checked'";}?>> 正常</label>
														<label><input type="radio" value="1" name="M_stop" <?php if($M_stop==1){echo "checked='checked'";}?>> 封停</label>
													</div>
													
												</div>
												<div class="form-group row">
													<label class="col-md-3 col-form-label" >封停原因</label>
													<div class="col-md-9">
														<textarea name="M_stopinfo" class="form-control"><?php echo $M_stopinfo?></textarea>
													</div>
													
												</div>

												<div class="form-group row">
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

		<div id="myModal" class="modal fade">
			<div class="modal-dialog modal-lg" role="document" >
				<div class="modal-content " style="width: 1000px">
					<div class="modal-header pd-x-20">
						<h6 class="modal-title">批量新增虚拟会员</h6>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<form id="form2">
						<div class="form-group row">
							<label class="col-md-3 col-form-label" >生成数量</label>
							<div class="col-md-9">
								<input type="text" name="num" class="form-control" value="10">
							</div>
						</div>
						<div class="form-group row">
							<label class="col-md-3 col-form-label" >其他设置</label>
							<div class="col-md-9">
								<label><input type="checkbox" name="vip" value="1"> 开通VIP</label>
								<label><input type="checkbox" name="seller" value="1"> 开通商户</label>
							</div>
						</div>
						<div class="form-group row">
							<label class="col-md-3 col-form-label" ></label>
							<div class="col-md-9">
								<button class="btn btn-info" type="button" onClick="creat()">开始生成</button>
								<button class="btn btn-danger" type="button" onClick="clearx()">一键清理</button>
							</div>
						</div>
						</form>
						<div class="form-group row">
							<label class="col-md-3 col-form-label" >返回信息</label>
							<div class="col-md-9">
								<textarea rows="20" class="form-control" id="callback"></textarea>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!--Jquery.min js-->
		<script src="assets/js/jquery.min.js"></script>

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

		<script src="assets/js/jqPaginator.min.js" type="text/javascript"></script>
		<script type="text/javascript">

		function creat(){
			$.ajax({
            	url:'?action=creat',
            	type:'post',
            	data:$("#form2").serialize(),
            	success:function (data) {
            	data=JSON.parse(data);
            	if(data.code=="success"){
            		toastr.success("生成成功", "成功");
            		$("#callback").val(data.msg);
            	}else{
            		toastr.error(data.msg, '错误');
            	}
            	}
            });
		}

		function loadData(num) {
            $("#PageCount").val("<?php echo $M_counts?>");
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
		        first: '<li class="first page-item"><a href="javascript:;" class="page-link">|<</a></li>',
		        prev: '<li class="prev page-item"><a href="javascript:;" class="page-link"><i class="arrow arrow2"></i><</a></li>',
		        next: '<li class="next page-item"><a href="javascript:;" class="page-link">><i class="arrow arrow3"></i></a></li>',
		        last: '<li class="last page-item"><a href="javascript:;" class="page-link">>|</a></li>',
		        page: '<li class="page page-item"><a href="javascript:;" class="page-link">{{page}}</a></li>',
		        onPageChange: function (num, type) {
		            if (type == "change") {
		                window.location="member.php?action=menu&type=<?php echo $type?>&page="+num;
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
            	url:'?action=<?php echo $aa?>',
            	type:'post',
            	data:$("#form").serialize(),
            	success:function (data) {
            	data=JSON.parse(data);
            	if(data.msg=="success"){
            		toastr.success("保存成功，2秒后刷新", "成功");
            		setTimeout("window.location.href='member.php?M_id="+data.id+"'", 2000 )
            	}else{
            		toastr.error(data.msg, '错误');
            	}
            	}
            });

			}

		function clearx() {
		    if (confirm("一键清理所有虚拟会员帐号？") == true) {
		        $.ajax({
		            url: '?action=clear',
		            type: 'get',
		            //data: $("#list").serialize(),
		            success: function(data) {
		                data = JSON.parse(data);
		                if (data.msg == "success") {
		                    location.reload();
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
		$(function() {$('.buy label').click(function(){var aa = $(this).attr('aa');$('[aa="'+aa+'"]').removeAttr('class') ;$(this).attr('class','checked');});});
		</script>
	</body>
</html>
