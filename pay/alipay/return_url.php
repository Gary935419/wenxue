<?php
/* * 
 * 功能：支付宝页面跳转同步通知页面
 * 版本：3.3
 * 日期：2012-07-23
 * 说明：
 * 以下代码只是为了方便商户测试而提供的样例代码，商户可以根据自己网站的需要，按照技术文档编写,并非一定要使用该代码。
 * 该代码仅供学习和研究支付宝接口使用，只是提供一个参考。

 *************************页面功能说明*************************
 * 该页面可在本机电脑测试
 * 可放入HTML等美化页面的代码、商户业务逻辑程序代码
 * 该页面可以使用PHP开发工具调试，也可以使用写文本函数logResult，该函数已被默认关闭，见alipay_notify_class.php中的函数verifyReturn
 */
require_once("../../conn/conn.php");
require_once("../../conn/function.php");
require_once("alipay.config.php");
require_once("lib/alipay_notify.class.php");
?>
<!DOCTYPE HTML>
<html>
    <head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <title>支付宝即时到账交易接口</title>
	</head>
    <body>
    	<?php
//计算得出通知验证结果
$alipayNotify = new AlipayNotify($alipay_config);
$verify_result = $alipayNotify->verifyReturn();
if($verify_result) {//验证成功
	/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	//请在这里加上商户的业务逻辑程序代码
	
	//——请根据您的业务逻辑来编写程序（以下代码仅作参考）——
    //获取支付宝的通知返回参数，可参考技术文档中页面跳转同步通知参数列表

	//商户订单号

	$out_trade_no = $_GET['out_trade_no'];

	//支付宝交易号

	$trade_no = $_GET['trade_no'];

	//交易状态
	$trade_status = $_GET['trade_status'];
	$subject = $_GET['subject'];


    if($_GET['trade_status'] == 'TRADE_FINISHED' || $_GET['trade_status'] == 'TRADE_SUCCESS') {
		//判断该笔订单是否在商户网站中已经做过处理
			//如果没有做过处理，根据订单号（out_trade_no）在商户网站的订单系统中查到该笔订单的详细，并执行商户的业务程序
			//如果有做过处理，不执行商户的业务程序
    }
    else {
      echo "trade_status=".$_GET['trade_status'];
    }

	if(strpos($_GET["body"],"cart@")===false){
		if(strpos($_GET["body"],"|")===false){
			if(strpos($subject,"[app]")===false){
				echo "<script>alert('充值成功！');window.location='../../member/index.php';</script>";
			}else{
				echo app_back("../my/my","充值成功！");
			}
		}else{
			$body = explode("|",$_GET["body"]);
			$type = $body[0];
			$id = intval($body[1]);
			$genkey = t($body[2]);
			$email = $body[3];

			if($type=="news"){
				if(strpos($genkey,"_app")===false){
					echo "<script>window.location='../../?type=newsinfo&id=$id&genkey=$genkey';</script>";
				}else{
					echo app_back("../webview/webview?id=$id&type=news&genkey=$genkey","");
				}
			}
			if($type=="product"){
				echo "<script>window.location='../../member/unlogin.php?type=fahuo&genkey=$genkey&id=$id';</script>";
			}

			if($type=="course"){
				$O=getrs("select * from sl_orders where O_genkey='$genkey'");
				if($O["O_content"]=="all"){
					$page=1;
				}else{
					$page=$O["O_content"];
				}
				if(strpos($genkey,"_app")===false){
					echo "<script>window.location='../../?type=courseinfo&id=$id&page=$page';</script>";
				}else{
					echo app_back("../webview/webview?id=$id&type=course&page=$page","");
				}
			}
		}
	}else{
		echo "<script>window.location='../../member/query.php?action=query&no=$trade_no';</script>";
	}
	
	/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
}
else {
    //验证失败
    //如要调试，请看alipay_notify.php页面的verifyReturn函数
    echo "验证失败";
}
?>
    </body>
</html>