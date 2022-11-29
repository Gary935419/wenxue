<?php 
require '../conn/conn.php';
require '../conn/function.php';
require 'member_check.php';
$action=$_GET["action"];
if($action=="del"){
	$Q_id=intval($_GET["Q_id"]);
	mysqli_query($conn,"update sl_quan set Q_mid=0 where Q_mid=$M_id and Q_id=$Q_id");
	die("success");
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
  
</head>

<body class="body-index">
<?php require 'top.php';?>

		<div class="container m_top_30">
					<div class="yto-box">
						<h5>我的优惠券</h5>
						<form action="cartpay.php" method="get" id="form">
						<div class="panel panel-default">
							<div class="panel-heading">优惠券</div>
							<div class="table-responsive">
								<table class="table table-condensed" style="font-size: 12px;">
								 <thead>
									<tr>
										<th>名称</th>
										<th>使用范围</th>
										<th>优惠规则</th>
										<th>使用截止</th>
										<th>使用</th>
										<th>移除</th>
									</tr>
									</thead>
									<tbody>
									<?php

							$sql="select * from sl_quan where Q_mid=$M_id order by Q_order desc";
							$result = mysqli_query($conn,  $sql);
							if (mysqli_num_rows($result) > 0) {
							while($row = mysqli_fetch_assoc($result)) {

								if($row["Q_pid"]>0){
									$P_info="".getrs("select * from sl_product where P_id=".$row["Q_pid"],"P_title")."";
									$href="../?type=productinfo&id=".getrs("select * from sl_product where P_id=".$row["Q_pid"],"P_id");
								}else{
									$P_info="店内通用";
									$href="../";
								}

								if($row["Q_discount"]>0){
									$D_info=" 打".((100-$row["Q_discount"])/10)."折";
								}else{
									$D_info="";
								}

								if($row["Q_minuse"]>0){
									$M_info=" 减".$row["Q_minuse"]."元";
								}else{
									$M_info="";
								}


							        echo "<tr id=\"".$row["Q_id"]."\">
							        <td>".$row["Q_title"]."</td>
							        <td>".$P_info."</td>
							        <td>满".$row["Q_money"]."元".$D_info.$M_info."</td>
							        <td>".$row["Q_usetime"]."</td>
							        <td><a href=\"$href\" class=\"btn btn-xs btn-primary\" type=\"submit\">使用</a></td>
							        <td><button class=\"btn btn-xs btn-danger\" type=\"button\" onclick=\"del(".$row["Q_id"].")\">移除</button></td>
							        </tr>";
							    }
							} 
									?>

									</tbody>
								</table>
					</div>
				</div>
				
			</form>
			</div>
		</div>
	</div>
<?php 
require 'foot.php';
?>

	<!-- js plugins  -->
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="../js/sweetalert.min.js"></script>
	<script type="text/javascript">
		function del(id){
			if (confirm("确定移除优惠券吗？")==true){
                $.ajax({
            	url:'?action=del&Q_id='+id,
            	type:'post',
            	success:function (data) {
            	if(data=="success"){
            		$("#"+id).hide();
            	}else{
            		alert(data);
            	}
            	}
            });
                return true;
            }else{
                return false;
            }
}
	</script>
</body>
</html>