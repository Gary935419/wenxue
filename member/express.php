<?php
require '../conn/conn.php';
require '../conn/function.php';
require 'member_check.php';

$action=$_GET["action"];
$O_id=intval($_GET["id"]);

$sql="select * from sl_orders where O_mid=".$M_id." and O_id=".$O_id;
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
if (mysqli_num_rows($result) > 0) {
	$O_wl=$row["O_wl"];
	$O_wlno=$row["O_wlno"];
	$O_address=$row["O_address"];
	$O_wlinfo=$row["O_wlinfo"];
	$O_wlinfotime=$row["O_wlinfotime"];
}else{
	box("您未购买过此商品","back","error");
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
  <title>物流查询 - 会员中心</title>
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
    <script src="http://ec.yto.net.cn/assets/js/plugins/html5shiv/html5shiv.min.js"></script>
    <![endif]-->
  <!--[if lt IE 10]>
    <link rel="stylesheet" href="http://ec.yto.net.cn/assets/css/ie8.min.css">
    <script src="http://ec.yto.net.cn/assets/js/plugins/respond/respond.min.js"></script>
    <![endif]-->
	<script>
		var _ctxPath='';
	</script>    
</head>

<link rel="stylesheet" href="css/cropper.min.css">
<body id="crop-avatar" class="body-index">

<?php
require 'top.php';
?>
<div class="page">
<div class="container m_top_10">
			<ol class="breadcrumb">
				<li><i class="icon fa-home" aria-hidden="true"></i><a href="../">首页</a></li>
				<li>用户信息</li>
				<li class="active">商品评价</li>
			</ol>
		<div class="yto-box">
		<div class="row">
	 <div class="col-sm-2 hidden-xs">
	 <div class="my-avatar center-block p_bottom_10">
							<span class="avatar"> 
							    <img alt="..." src="../media/<?php echo $M_head?>"> 
							</span>
	</div>
	<h5 class="text-center p_bottom_10">您好！<?php echo $M_login?></h5>
	     <ul class="nav nav-pills nav-stacked">
	        <li><a href="edit.php">基本信息</a></li>
	        <li><a href="address.php">收货地址</a></li>
            <li><a href="pwdedit.php">密码修改</a></li>
            
	     </ul>
	 </div>
	 <div class="col-sm-10 b-left">
<p>快递公司：<b><?php echo $O_wl?></b> 快递单号：<b><?php echo $O_wlno?></b> <a href="product.php" class="btn btn-xs btn-primary">返回</a></p>
<?php
											if($O_wlinfo=="" || (time()-strtotime($O_wlinfotime))/3600>1){
												$host = "https://qyexpress.market.alicloudapi.com";
											    $path = "/composite/queryexpress";
											    $method = "GET";
											    $appcode = $C_kd;
											    $headers = array();
											    array_push($headers, "Authorization:APPCODE " . $appcode);
											    $querys = "mobile=".splitx($O_address,"__",1)."&number=$O_wlno";
											    $bodys = "";
											    $url = $host . $path . "?" . $querys;

											    $curl = curl_init();
											    curl_setopt($curl, CURLOPT_CUSTOMREQUEST, $method);
											    curl_setopt($curl, CURLOPT_URL, $url);
											    curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
											    curl_setopt($curl, CURLOPT_FAILONERROR, false);
											    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
											    curl_setopt($curl, CURLOPT_HEADER, true);
											    if (1 == strpos("$".$host, "https://"))
											    {
											        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
											        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
											    }
											    $info=curl_exec($curl);

											    if(strpos($info,"{\"data\":")!==false){
												    $info=json_decode("{\"data\":".splitx($info,"{\"data\":",1))->data->list;
												    foreach($info as $l){
												    	$wlinfo=$wlinfo."<p>【".$l->time."】".$l->status."</p>";
												    }
												    echo $wlinfo;
												    mysqli_query($conn, "update sl_orders set O_wlinfo='$wlinfo',O_wlinfotime='".date('Y-m-d H:i:s')."' where O_id=$O_id");
											    }else{
											    	$info=json_decode("{\"resp\":".splitx($info,"{\"resp\":",1))->resp->RespMsg;
											    	echo "<p>错误信息：".$info."</p>";
											    }
											}else{
												echo $O_wlinfo;
											}
											?>
</div>
</div>
</div>
</div>
</div>

</div>
<?php require 'foot.php';?>

  <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/icheck.min.js"></script>
  <script src="js/page.js"></script>
  <script src="js/yto_cityselect.js"></script>
  <script src="js/cropper.min.js"></script>
  <script src="js/cropper-set.js"></script>
  <script src="js/bootstrap-datetimepicker.js"></script>
 <script type="text/javascript">
	  $(function() {
		  'use strict';
		  setTimeout(function(){
	          $("#error:parent").removeClass("hidden");
	          },200);

		  $("#address").citySelect();
		  
		  $('#birthday').datetimepicker({
			    format: 'yyyy-mm-dd',
			    startDate: '1950-01-01',
			    endDate: '2020-12-30',
			    weekStart : 1,
				todayBtn : 1,
				autoclose : 1,
				initialDate:'1985-01-01',
				todayHighlight : 1,
				startView : 4,
				minView : 2,
				fontAwesome:true,
				forceParse : 0,
				linkFormat: 'yyyy-mm-dd',
		        linkField:'birthday_hidden'
			});

	  });
	</script>
</body>
</html>