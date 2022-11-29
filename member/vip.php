<?php 
require '../conn/conn.php';
require '../conn/function.php';
require 'member_check.php';

$action=$_GET["action"];

if($action=="vipcode"){
	$code=$_POST["code"];

	$sql = "select * from sl_rcard where R_content='".t($code)."' and R_use=0 and R_type=1 and R_del=0";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    if (mysqli_num_rows($result) > 0) {
    	$R_money=$row["R_money"];
    	$R_id=$row["R_id"];

    	if($M_vip==1){//原本是VIP会员
			mysqli_query($conn, "update sl_member set M_viplong=M_viplong+".(31*$R_money)." where M_id=".$M_id);
		}else{//原本是普通会员
			mysqli_query($conn, "update sl_member set M_viplong=".($R_money*31).",M_viptime='".date('Y-m-d H:i:s')."' where M_id=".$M_id);
		}

    	mysqli_query($conn, "update sl_rcard set R_use=1,R_usetime='".date('Y-m-d H:i:s')."',R_mid=".$M_id." where R_id=".intval($R_id));
    	box("成功开通VIP".$R_money."分钟！","vip.php","success");
    }else{
    	box("未找到该卡号或已使用，请重试！","back","error");
    }
}

if($action=="vip"){
	$viplong=$_POST["viplong"];
	$timelong = 0;
	switch ($viplong) {
		case 1:
		$fee=$vipprice1;
		$longtitle=$timelong1."分钟";
		$timelong = $timelong1;
		break;

		case 2:
		$fee=$vipprice2;
		$longtitle=$timelong2."分钟";
        $timelong = $timelong2;
		break;

		case 3:
		$fee=$vipprice3;
		$longtitle=$timelong3."分钟";
        $timelong = $timelong3;
		break;

		default:
		box("时长有误，请重新提交！" , "back", "error");
		break;
		
	}

	if($M_money-$fee>=0 && $fee>0){
		if($M_vip==1){//原本是VIP会员
            mysqli_query($conn, "update sl_member set M_viplong=M_viplong+".($timelong)." where M_id=".$M_id);
		}else{//原本是普通会员
			mysqli_query($conn, "update sl_member set M_viplong=".($timelong).",M_viptime='".date('Y-m-d H:i:s')."' where M_id=".$M_id);
		}
		mysqli_query($conn, "update sl_member set M_money=M_money-".$fee." where M_id=".$M_id);
		mysqli_query($conn, "insert into sl_list(L_mid,L_no,L_title,L_time,L_money,L_genkey) values($M_id,'".date('YmdHis').rand(10000000,99999999)."','开通VIP会员".$longtitle."','".date('Y-m-d H:i:s')."',-$fee,'')");
		//分站开通VIP提成
//		if($fmid>0 && $C_fzvip>0){
//			mysqli_query($conn, "update sl_member set M_money=M_money+".(($fee*$C_fzvip)/100)." where M_id=".$fmid);
//			mysqli_query($conn, "insert into sl_list(L_mid,L_no,L_title,L_time,L_money,L_genkey) values($fmid,'".date('YmdHis').rand(10000000,99999999)."','分站开通VIP会员提成','".date('Y-m-d H:i:s')."',".(($fee*$C_fzvip)/100).",'')");
//		}
		//分销提成
		//fx_vip($fee,$M_id,0);
		box("开通成功！" , "vip.php", "success");
	}else{
		box("账户余额不足，请先充值！" , "pay.php?money=".($fee-$M_money), "error");
	}
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
<style>
#buy label {
	padding: 1px 5px;
	cursor: pointer;
	border: #CCCCCC solid 2px;
	-moz-border-radius: 3px;
	-webkit-border-radius: 3px;
	border-radius: 3px;
}

#buy .checked {
	border: #ff0000 solid 2px;
	-moz-border-radius: 3px;
	-webkit-border-radius: 3px;
	border-radius: 3px;
	color: #ff0000;
}

#buy input[type="radio"] {
	display: none;
}
</style>
</head>

<body class="body-index">
<?php require 'top.php';?>

		<div class="container m_top_30">
<div class="yto-box">
<div class="panel panel-default">
							<div class="panel-heading">开通VIP</div>
							<div class="panel-body">
								<form action="?action=vip" method="post">
								<div class="col-xs-12 col-md-3">当前状态：</div>
								<div class="col-xs-12 col-md-9">
									<div class="col-xs-12 col-md-4" style="margin-bottom: 20px;"><b><?php

										if($M_viplong-(time()-strtotime($M_viptime))/86400*24*60>0){
											if($M_viplong>30000){
												echo "VIP会员 [永久]";
												$button="<button type=\"submit\" class=\"btn btn-info\" style=\"margin-top: 20px;\" disabled=\"false\">已是永久会员</button>";
											}else{
												echo "VIP会员 [".date('Y-m-d H:i', strtotime ("+".$M_viplong." minutes", strtotime($M_viptime)))."到期]";
												$button="<button type=\"submit\" class=\"btn btn-info\" style=\"margin-top: 20px;\">续费会员</button>";
											}
											
										}else{
											echo "普通会员";
											$button="<button type=\"submit\" class=\"btn btn-info\" style=\"margin-top: 20px;\">开通会员</button>";
										}

									?></b></div>
								</div>
								<div class="col-xs-12 col-md-3">开通时长：</div>
								<div class="col-xs-12 col-md-9" id="buy"><?php 
								if($vipprice1!=0){
									echo "<div class=\"col-xs-6 col-md-4\"><label aa=\"viplong\"><input type=\"radio\" name=\"viplong\" value=\"1\">".$timelong1."分钟 [".$vipprice1."元]</label></div>";
								}
								if($vipprice2!=0){
									echo "<div class=\"col-xs-6 col-md-4\"><label aa=\"viplong\"><input type=\"radio\" name=\"viplong\" value=\"2\"> ".$timelong2."分钟[".$vipprice2."元]</label></div>";
								}
								if($vipprice3!=0){
									echo "<div class=\"col-xs-6 col-md-4\"><label aa=\"viplong\"><input type=\"radio\" name=\"viplong\" value=\"3\"> ".$timelong3."分钟[".$vipprice3."元]</label></div>";
								}
								?>
								
								<div class="col-xs-12 col-md-12"><?php echo $button;?></div>
							</div>
						</form>
					</div>

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
$(function() { $('label').click(function(){var aa = $(this).attr('aa');$('[aa="'+aa+'"]').removeAttr('class') ;$(this).attr('class','checked');});});

$("#buy").find("div:first label").attr("class","checked");
$("#buy").find("div:first label input").attr("checked","checked");

	</script>
</body>
</html>