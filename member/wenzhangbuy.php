<?php 
require '../conn/conn.php';
require '../conn/function.php';
require 'member_check.php';

$action=$_GET["action"];

if($action=="wenzhengbuy"){
    $fee=$_POST["buy_price"];
    $buy_content=$_POST["buy_content"];
    $bid=$_POST["bid"];
    $buy_img=$_POST["buy_img"];
    $buy_longtime=$_POST["buy_longtime"];
    $addtime = time();
	if($M_money-$fee>=0 && $fee>0){
        $buy_content = '购买了标题为《'.$buy_content.'》的付费文章';
		mysqli_query($conn, "update sl_member set M_money=M_money-".$fee." where M_id=".$M_id);
		$query = "insert into sl_neworders(mid,buy_content,buy_price,buy_longtime,addtime,buy_type,bid,buy_time,buy_img) values($M_id,'$buy_content',$fee,$buy_longtime,$addtime,0,$bid,'','$buy_img')";
		mysqli_query($conn,$query);
		
		mysqli_query($conn, "insert into sl_list(L_mid,L_no,L_title,L_time,L_money,L_genkey) values($M_id,'".date('YmdHis').rand(10000000,99999999)."','购买文章".$longtitle."','".date('Y-m-d H:i:s')."',-$fee,'')");
		
		box("购买成功！" , "/?type=newsinfo&id=".$bid, "success");
	}else{
		box("账户余额不足，请先充值！" , "pay.php?money=".($fee-$M_money), "error");
	}
}else{
    $id=$_GET["id"];
    $newtype=$_GET["type"];

    $sql="select * from sl_news where N_id=".$id;
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);

    $N_title = $row["N_title"];
    $N_price = $row["N_price"];
    $N_timelong = $row["N_timelong"];
    $N_pic = $row["N_pic"];
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
							<div class="panel-heading">购买文章</div>
							<div class="panel-body">
								<form action="?action=wenzhengbuy" method="post">
								<div class="col-xs-12 col-md-3">文章标题：</div>
								<div class="col-xs-12 col-md-9">
									<div class="col-xs-12 col-md-4" style="margin-bottom: 20px;"><b><?php

                                            echo $N_title;
                                            $button="<button type=\"submit\" class=\"btn btn-info\" style=\"margin-top: 20px;\">立即购买</button>"

									?></b></div>
								</div>
								<div class="col-xs-12 col-md-3">文章价格：</div>
								<div class="col-xs-12 col-md-9" id="buy"><?php
                                    echo "<div class=\"col-xs-6 col-md-4\"><label aa=\"viplong\"><input type=\"radio\" name=\"viplong\" value=\"1\">".$N_timelong."分钟 [".$N_price."元]</label></div>";
								?>
                                <input type="hidden" name="bid" value="<?php echo $id ?>">
                                <input type="hidden" name="buy_img" value="<?php echo $N_pic ?>">
								<input type="hidden" name="buy_price" value="<?php echo $N_price ?>">
                                <input type="hidden" name="buy_content" value="<?php echo $N_title ?>">
                                <input type="hidden" name="buy_longtime" value="<?php echo $N_timelong ?>">
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