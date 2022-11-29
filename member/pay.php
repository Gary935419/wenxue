<?php 
require '../conn/conn.php';
require '../conn/function.php';
require 'member_check.php';

$D_domain=splitx($_SERVER["HTTP_HOST"].$_SERVER["PHP_SELF"],"/member",0);

$show=$_REQUEST["show"];
$action=$_GET["action"];

if($action=="card"){
	$card=$_POST["card"];

	$sql = "select * from sl_rcard where R_content='".t($card)."' and R_use=0 and R_type=0 and R_del=0";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    if (mysqli_num_rows($result) > 0) {
    	$R_money=$row["R_money"];
    	$R_id=$row["R_id"];
    	mysqli_query($conn, "update sl_member set M_money=M_money+".round($R_money,2)." where M_id=".$M_id);
    	mysqli_query($conn, "update sl_rcard set R_use=1,R_usetime='".date('Y-m-d H:i:s')."',R_mid=".$M_id." where R_id=".intval($R_id));
    	mysqli_query($conn, "insert into sl_list(L_mid,L_no,L_title,L_time,L_money,L_genkey) values($M_id,'".gen_key(20)."','充值卡充值','".date('Y-m-d H:i:s')."',".round($R_money,2).",'".gen_key(20)."')");
    	box("成功充值".$R_money."元！","list.php","success");
    }else{
    	box("未找到该卡号或已使用，请重试！","back","error");
    }
}

if(isMobile()){
	$port_info="?port_type=wap";
}else{
	$port_info="";
}
$genkey=gen_key(20);
if ($show=="t"){
	
?>
<!doctype html>
<html>
<head>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="Content-Language" content="zh-cn" />
<title>微信充值跳转</title>
<script src="js/jquery.min.js"></script>
<script src="../js/qrcode.min.js"></script>
<link href="https://qzonestyle.gtimg.cn/open_proj/proj_qcloud_v2/css/shop_cart/wechat_pay.css?v=201605201" rel="stylesheet" media="screen"/>
</head>
<body>
<div class="body">
    <h1 class="mod-title">
        <span class="ico-wechat"></span><span class="text">微信支付</span>
    </h1>
    <div class="mod-ct">
        <div class="order">
        </div>
        <div class="amount">
            ￥<?php echo round($_REQUEST["wx_fee"],2)?>
        </div>
        <div class="qr-image" >
        	<div id="billImage" style="display: inline-block;width: 200px;height: 200px;"></div>

           
        </div>
        <!--detail-open 加上这个类是展示订单信息，不加不展示-->
        <div class="detail detail-open" id="orderDetail" >
            <dl class="detail-ct">
                <dt>商家</dt>
                <dd id="storeName"><?php echo $C_title?></dd>
                <dt>商品名称</dt>
                <dd id="productName">用户充值<?php echo $_REQUEST["wx_fee"]?>元</dd>
                <dt>交易单号</dt>
                <dd id="billId"><?php echo $genkey?></dd>
                <dt>创建时间</dt>
                <dd id="createTime"><?php echo date('Y-m-d H:i:s')?></dd>
            </dl>

        </div>
        <div class="tip">
            <span class="dec dec-left"></span>
            <span class="dec dec-right"></span>
            <div class="ico-scan"></div>
            <div class="tip-text">
                <p>请使用微信扫一扫</p>
                <p>扫描二维码完成支付</p>
            </div>
        </div>
     </div>

</div>
<script type="text/javascript">
function test(){
$.post("post.php",
    {
      L_genkey:"<?php echo $genkey?>",
    },
 function(data){
  if(data==1){
  document.location.href="list.php";
  }
    });
}

$.ajax({
    type: "post",
    url: "../pay/<?php echo $_GET["type"]?>/native.php",
    data: {body:"用户充值<?php echo $_REQUEST["wx_fee"]?>元",attach:"<?php echo $_REQUEST["M_id"]."|".$genkey?>",total_fee:"<?php echo $_REQUEST["wx_fee"]?>"},
    success: function(data) {
		if(data.indexOf("weixin://") != -1){
            var qrcode = new QRCode('billImage', {width: 200,height: 200,colorDark: '#000000',colorLight: '#ffffff',correctLevel: QRCode.CorrectLevel.H});
            qrcode.makeCode(data);
            setInterval("test()",3000);
		}else{
			if(data.indexOf("https://") != -1){
				setInterval("test()",3000);
				window.location.href=data;
			}else{
				alert(data);
			}
		}
    }
})

</script>
</body>

</html>
<?php 
}else{

if (strpos(strtolower($_SERVER["HTTP_USER_AGENT"]),"micromessenger")!==false){
	if ($_REQUEST["jsApiParameters"]=="" && $_REQUEST["type"]=="jsapi"){
		Header("Location: https://open.weixin.qq.com/connect/oauth2/authorize?appid=".$C_wx_appid."&redirect_uri=".urlencode("http://".$D_domain."/pay/wxpay/jsapi.php?M_id=".$_SESSION["M_id"]."|".gen_key(20)."&fee=".$_REQUEST["fee"]."&page=pay.php")."&response_type=code&scope=snsapi_base&state=123&connect_redirect=1#wechat_redirect"); 
		die();
	}

	if ($_REQUEST["type"]=="jsapi_payjs"){
		Header("Location: https://payjs.cn/api/openid?mchid=".$C_payjs_id."&callback_url=".urlencode("http://".$D_domain."/pay/payjs/jsapi.php?M_id=".$_SESSION["M_id"]."|".gen_key(20)."&fee=".$_REQUEST["fee"]."&page=pay.php")); 
		die();
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
  <title>账户充值 - 会员中心</title>
<link href="../media/<?php echo $C_ico?>" rel="shortcut icon" />
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="../js/qrcode.min.js"></script>
  <!-- Stylesheets -->
  <!-- Stylesheets -->
  <link rel="stylesheet" href="../css/css/font-awesome.min.css">
  <link rel="stylesheet" href="css/bootstrap.css">
  <link rel="stylesheet" href="css/site.min.css">
  <!-- css plugins -->

  <link rel="stylesheet" href="css/cropper.min.css">
  <link rel="stylesheet" href="../css/sweetalert.css">
 <style>


	#buy {margin-bottom: 10px;}
	#buy label {
		width: 100%;
		text-align: center;
		padding: 5px 0;

            cursor: pointer;
            border: #CCCCCC solid 2px;
            -moz-border-radius: 3px;
            -webkit-border-radius: 3px;
            border-radius: 3px;
            position: relative;
        }
        #buy label .icon{
        	position: absolute;right: -2px;bottom: 0px;height: 15px;
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
<script type="text/javascript">
 	function isAlipay(){
        var ua = window.navigator.userAgent.toLowerCase();
        if (ua.match(/Alipay/i) == 'alipay') {
            return true; // 是支付宝端
        } else {
            return false;
        }
    }
    function isWeiXin(){
        var ua = window.navigator.userAgent.toLowerCase();
        if (ua.match(/MicroMessenger/i) == 'micromessenger') {
            return true; // 是微信端
        } else {
            return false;
        }
    }
<?php if (strpos(strtolower($_SERVER["HTTP_USER_AGENT"]),"micromessenger")!==false && $_REQUEST["jsApiParameters"]!=""){?>

	function jsApiCall()
	{
		WeixinJSBridge.invoke(
			'getBrandWCPayRequest',
			<?php echo stripslashes(str_replace("__", "\"", $_REQUEST["jsApiParameters"]))?>,
			function(res){
				//WeixinJSBridge.log(res.err_msg);
				if(res.err_msg.indexOf(":ok")>-1){
					window.location.href="list.php";
				}
				//else{
				//	alert(res.err_msg);
				//}
				
			}
		);
	}

	function callpay()
	{
		if (typeof WeixinJSBridge == "undefined"){
		    if( document.addEventListener ){
		        document.addEventListener('WeixinJSBridgeReady', jsApiCall, false);
		    }else if (document.attachEvent){
		        document.attachEvent('WeixinJSBridgeReady', jsApiCall); 
		        document.attachEvent('onWeixinJSBridgeReady', jsApiCall);
		    }
		}else{
		    jsApiCall();
		}
	}
	callpay();
	
<?php }?>
</script>
  <!--[if lt IE 9]>
    <script src="/assets/js/plugins/html5shiv/html5shiv.min.js"></script>
    <![endif]-->
  <!--[if lt IE 10]>
    <link rel="stylesheet" href="/assets/css/ie8.min.css">
    <script src="/assets/js/plugins/respond/respond.min.js"></script>
    <![endif]-->
	<script>
		var _ctxPath='';
	</script>    
</head>

<body class="body-index">
<div class="pop none" id="divpop" style="display:none;" onclick="$('#divpop').hide();">
　　<img src="img/top.png" style='float: right;margin: 10px;max-width: calc(100% - 20px)'>
</div>

		<?php require 'top.php';?>
		<div class="container m_top_30">
					<div class="yto-box">
						<h5>账户充值</h5>
						
<form  method="post" class="form-horizontal" id="pay_form">

<div class="form-group" id="fee_form">
	<label for="oldpass" class="col-sm-2 control-label">充值金额</label>
	<div class="col-sm-4">
		<div class="input-group">
			<span class="input-group-addon">￥</span>
			<input name="fee"  value="<?php echo str_replace(",","",$_REQUEST["money"])?>" title="nickname" class="form-control"  placeholder="元" >
		</div>
		<input type="hidden" value="<?php echo $_SERVER["HTTP_HOST"].$_SERVER["PHP_SELF"]?>" name="M_url">
		<input type="hidden" name="M_id" value="<?php echo $M_id?>">

		<input type="hidden" value="账户充值" name="body">
		<input type="hidden" name="attach" value="<?php echo $M_id."|".$genkey?>">
	</div>
</div>

<div class="form-group" style="display: none" id="card_form">
	<label for="oldpass" class="col-sm-2 control-label">充值卡号</label>
	<div class="col-sm-4">	
	<input name="card" value="" title="nickname" class="form-control"  >
	</div>
</div>

<div class="form-group">
    <label for="firstname" class="col-sm-2 control-label">支付方式</label>
    <div class="col-sm-10">
    	<div id="buy">
		<div class="row">
		<?php if ($C_alipayon==1){?><div class="col-xs-6 col-md-2"><label aa="pay" type="支付宝商户"><input type="radio" value="alipay" name="pay"> <img src="img/alipay.png" height="25" alt="支付宝商户"></label></div> <?php }?>
		<?php if ($C_dmfon==1){?><div class="col-xs-6 col-md-2"><label aa="pay"><input type="radio" value="dmf" name="pay"> <img src="img/alipay.png" height="25" alt="当面付"></label></div> <?php }?>
		<?php if ($C_7payon==1){?><div class="col-xs-6 col-md-2"><label aa="pay"><input type="radio" value="7pay" name="pay"> <img src="img/alipay.png" height="25" alt="7支付"></label></div> <?php }?>
		<?php if (strpos($C_payjs_type,"alipay")!==false){?><div class="col-xs-6 col-md-2"><label aa="pay"><input type="radio" value="payjs_alipay" name="pay"> <img src="img/alipay.png" height="25" alt="PAYJS"></label></div> <?php }?>
		<?php if (strpos($C_codepay_type,"alipay")!==false){?><div class="col-xs-6 col-md-2"><label aa="pay"><input type="radio" value="codepay_alipay" name="pay"> <img src="img/alipay.png" height="25" alt="码支付"></label></div> <?php }?>

		<?php if (strpos($C_jipay_type,"alipay")!==false){?><div class="col-xs-6 col-md-2"><label aa="pay"><input type="radio" value="jipay_alipay" name="pay"> <img src="img/alipay.png" height="25" alt="极支付"></label></div> <?php }?>

		<!--<?php if (strpos($C_hupay_type,"alipay")!==false){?><div class="col-xs-6 col-md-2"><label aa="pay"><input type="radio" value="hupay_alipay" name="pay"> <img src="img/alipay.png" height="25" alt="虎皮椒"></label></div> <?php }?>-->

		<?php if (strpos($C_epay_type,"alipay")!==false && $config->epay=="true"){?><div class="col-xs-6 col-md-2"><label aa="pay"><input type="radio" value="epay_alipay" name="pay"> <img src="img/alipay.png" height="25" alt="易支付"></label></div> <?php }?>

		<?php if ($C_wxpayon==1){?><div class="col-xs-6 col-md-2"><label aa="pay"><input type="radio" value="wxpay" name="pay"> <img src="img/weixin.png" height="25"></label></div> <?php }?>

		<?php if(strpos($C_payjs_type,"wxpay")!==false){?><div class="col-xs-6 col-md-2"><label aa="pay"><input type="radio" value="payjs" name="pay"> <img src="img/weixin.png" height="25"></label></div> <?php }?>
		<?php if(strpos($C_codepay_type,"wxpay")!==false){?><div class="col-xs-6 col-md-2"><label aa="pay"><input type="radio" value="codepay_wxpay" name="pay"> <img src="img/weixin.png" height="25"</label></div> <?php }?>
		<?php if(strpos($C_jipay_type,"wxpay")!==false){?><div class="col-xs-6 col-md-2"><label aa="pay"><input type="radio" value="jipay_wxpay" name="pay"> <img src="img/weixin.png" height="25"</label></div> <?php }?>
		<?php if(strpos($C_hupay_type,"wxpay")!==false){?><div class="col-xs-6 col-md-2"><label aa="pay"><input type="radio" value="hupay_wxpay" name="pay"> <img src="img/weixin.png" height="25"</label></div> <?php }?>
		<?php if(strpos($C_epay_type,"wxpay")!==false && $config->epay=="true"){?><div class="col-xs-6 col-md-2"><label aa="pay"><input type="radio" value="epay_wxpay" name="pay"> <img src="img/weixin.png" height="25"</label></div> <?php }?>

		<?php if ($C_qpayon==1){?><div class="col-xs-6 col-md-2"><label aa="pay"><input type="radio" value="qpay" name="pay"> <img src="img/qqpay.png" height="25"></label></div> <?php }?>
		<?php if(strpos($C_codepay_type,"qqpay")!==false){?><div class="col-xs-6 col-md-2"><label aa="pay"><input type="radio" value="codepay_qpay" name="pay"> <img src="img/qqpay.png" height="25"></label></div> <?php }?>
		<?php if(strpos($C_epay_type,"qqpay")!==false && $config->epay=="true"){?><div class="col-xs-6 col-md-2"><label aa="pay"><input type="radio" value="epay_qpay" name="pay"> <img src="img/qqpay.png" height="25"></label></div> <?php }?>


		</div>
    </div>
</div>

</div>

<div class="form-group">
	<label for="oldpass" class="col-sm-2 control-label"></label>
	<div class="col-sm-4">
	<button type="button" class="btn btn-primary btn-block m_top_20" onclick="payx()">充值</button>
	</div>
</div>
</form>
	
			</div>
		</div>

	</div>
	<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
					&times;
				</button>
				<h4 class="modal-title" id="myModalLabel">
					扫码支付
				</h4>
			</div>
			<div class="modal-body" style="text-align: center;" id="modal_body">
				<img src="img/alipay.png" style="margin-bottom: 20px;" id="pay_img"><br>
				<div id="billImage" style="width: 200px;display: inline-block;margin-bottom: 10px"></div>
				<div id="pay_info">请使用支付宝扫码支付</div>
			</div>
		</div>
	</div>
</div>
		<?php require 'foot.php';?>

	<!-- js plugins  -->
	<script type="text/javascript">
function payx(){
	        	switch($('input[name="pay"]:checked').val()){
	        		case "rcard":
	        		$("#pay_form").attr("action","?action=card");
					$("#pay_form").submit();
	        		break;
					case "alipay"://选择支付宝
						if(isWeiXin()){//如果是在微信浏览器内
							$("#divpop").show();
							return false;
						}else{
							$("#pay_form").attr("action","../pay/alipay/alipayapi.php<?php echo $port_info?>");
							$("#pay_form").submit();
						}
					break;
					case "wxpay":
						if(isWeiXin()){
							window.location.href="https://open.weixin.qq.com/connect/oauth2/authorize?appid=<?php echo $C_wx_appid?>&redirect_uri="+encodeURIComponent("http://<?php echo $D_domain?>/pay/wxpay/jsapi.php?O_id=<?php echo $O_id?>&genkey=<?php echo $genkey?>")+"&response_type=code&scope=snsapi_base&state=123&connect_redirect=1#wechat_redirect";
						}else{
							$.ajax({
						        type: "post",
						        url: "../pay/wxpay/native.php",
						        data: $("#pay_form").serialize(),
						        success: function(data) {
									if(data.indexOf("weixin://") != -1){
										$('#myModal').modal('show')
										$("#pay_img").attr("src","img/weixin.png");
										$("#pay_info").html("请使用微信扫码支付");
							            qrcode.makeCode(data);
									}else{
										if(data.indexOf("https://") != -1){
											$('#myModal').modal('show')
											$("#pay_img").attr("src","img/weixin.png");
											$("#pay_info").html("<a href='"+data+"' target='_blank' class='btn btn-success'>使用微信APP支付</a>");
							            	qrcode.makeCode(data);
										}else{
											alert(data);
										}
									}
						        }
						    })
						}
						
					break;
					case "qpay":
						$.ajax({
					        type: "post",
					        url: "../pay/qpay/native.php",
					        data: $("#pay_form").serialize(),
					        success: function(data) {
					        	console.log(data);
								if(data.indexOf("https://") != -1){
									if(IsPC()){
										$('#myModal').modal('show');
										$("#pay_img").attr("src","img/qqpay.png");
										$("#pay_info").html("请使用手机QQ扫码支付");
							            qrcode.makeCode(data);
									}else{
										$('#myModal').modal('show');
										$("#pay_img").attr("src","img/qqpay.png");
										$("#pay_info").html("<a href='"+data+"' target='_blank' class='btn btn-info'>使用手机QQ支付</a>");
							            qrcode.makeCode(data);
									}
								}else{
									alert(data);
								}
					        }
					    })
					break;
					case "dmf":
						$.ajax({
					        type: "post",
					        url: "../pay/dmf/api.php",
					        data: $("#pay_form").serialize(),
					        success: function(data) {
								if(data.indexOf("https://") != -1){
									if(IsPC()){
										$('#myModal').modal('show');
										$("#pay_img").attr("src","img/alipay.png");
										$("#pay_info").html("请使用支付宝扫码支付");
							            qrcode.makeCode(data);
									}else{
										$('#myModal').modal('show');
										$("#pay_img").attr("src","img/alipay.png");
										$("#pay_info").html("<a href='"+data+"' target='_blank' class='btn btn-info'>使用支付宝APP支付</a>");
							            qrcode.makeCode(data);
									}
								}else{
									alert("支付出错：请检查以下原因：（1）应用appid和应用私钥是否填写正确（2）是否开通了当面付这个产品（3）有无在应用里添加当面付这个产品（4）PHP版本需5.5或以上");
								}
					        }
					    })
					break;
					case "7pay":
						$("#pay_form").attr("action","../pay/7pay/api.php?action=pay");
						$("#pay_form").submit();
					break;
					case "payjs":
						if(isWeiXin()){
							window.location.href="https://payjs.cn/api/openid?mchid<?php echo $C_payjs_id?>&callback_url="+encodeURIComponent("http://<?php echo $D_domain?>/pay/payjs/jsapi.php?genkey=<?php echo $genkey?>&O_id=<?php echo $O_id?>");
						}else{
							$.ajax({
						        type: "post",
						        url: "../pay/payjs/native.php",
						        data: $("#pay_form").serialize(),
						        success: function(data) {
									$('#myModal').modal('show');
									$("#pay_img").attr("src","img/weixin.png");
									$("#pay_info").html("请使用微信扫码支付");
						            qrcode.makeCode(data);
						        }
						    })
						}
					break;
					case "payjs_alipay":
						$.ajax({
					        type: "post",
					        url: "../pay/payjs/native.php?t=alipay",
					        data: $("#pay_form").serialize(),
					        success: function(data) {
								$('#myModal').modal('show');
								$("#pay_img").attr("src","img/alipay.png");
								$("#pay_info").html("请使用支付宝扫码支付");
					            qrcode.makeCode(data);
					        }
					    })
					break;
					case "jipay_alipay":
						$("#pay_form").attr("action","../pay/jipay/api.php?action=pay&paytype=2");
						$("#pay_form").submit();
					break;
					case "jipay_wxpay":
						$("#pay_form").attr("action","../pay/jipay/api.php?action=pay&paytype=1");
						$("#pay_form").submit();
					break;
					case "hupay_alipay":
						$("#pay_form").attr("action","../pay/hupay/api.php?action=pay&paytype=2");
						$("#pay_form").submit();
					break;
					case "hupay_wxpay":
						$("#pay_form").attr("action","../pay/hupay/api.php?action=pay&paytype=1");
						$("#pay_form").submit();
					break;
					case "codepay_alipay":
						$("#pay_form").attr("action","../pay/codepay/api.php?action=pay&paytype=1");
						$("#pay_form").submit();
					break;
					case "codepay_wxpay":
						$("#pay_form").attr("action","../pay/codepay/api.php?action=pay&paytype=3");
						$("#pay_form").submit();
					break;
					case "codepay_qpay":
						$("#pay_form").attr("action","../pay/codepay/api.php?action=pay&paytype=2");
						$("#pay_form").submit();
					break;
					case "epay_alipay":
						$("#pay_form").attr("action","../pay/epay/api.php?action=pay&paytype=alipay");
						$("#pay_form").submit();
					break;
					case "epay_wxpay":
						$("#pay_form").attr("action","../pay/epay/api.php?action=pay&paytype=wxpay");
						$("#pay_form").submit();
					break;
					case "epay_qpay":
						$("#pay_form").attr("action","../pay/epay/api.php?action=pay&paytype=qqpay");
						$("#pay_form").submit();
					break;
					
				}
}

function IsPC() {
    var userAgentInfo = navigator.userAgent;
    var Agents = ["Android", "iPhone",
                "SymbianOS", "Windows Phone",
                "iPad", "iPod"];
    var flag = true;
    for (var v = 0; v < Agents.length; v++) {
        if (userAgentInfo.indexOf(Agents[v]) > 0) {
            flag = false;
            break;
        }
    }
    return flag;
}

function check(){
$.post("post.php",
    {
      L_genkey:"<?php echo $genkey?>",
    },
 function(data){
  if(data==1){
  document.location.href="list.php";
  }
    });
}

var qrcode = new QRCode('billImage', {width: 200,height: 200,colorDark: '#000000',colorLight: '#ffffff',correctLevel: QRCode.CorrectLevel.H});
setInterval("check()",3000);


$(function() { 
	$('#buy label').click(
		function(){
			if($(this).attr("title")=="card"){
				$("#fee_form").hide();
				$("#card_form").show();
			}else{
				$("#fee_form").show();
				$("#card_form").hide();
			}
			var aa = $(this).attr('aa');
			$('[aa="'+aa+'"]').removeAttr('class');
			$(this).attr('class','checked');
	});
});
$("#buy").find("input:first").attr("checked","checked");
$("#buy").find("label:first").addClass("checked");

	</script>


	<script src="../js/sweetalert.min.js"></script>
	
</body>
</html>
<?php }?>