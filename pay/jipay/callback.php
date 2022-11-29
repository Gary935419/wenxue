<?php
require_once("../../conn/conn.php");
require_once("../../conn/function.php");

$D_domain=splitx($_SERVER["HTTP_HOST"].$_SERVER["PHP_SELF"],"/pay",0);

$key = $C_jipay_key;//通讯密钥
$mid = $C_jipay_id;//商户ID
$payId = $_GET['payId'];//商户订单号
$param = $_GET['param'];//创建订单的时候传入的参数
$type = $_GET['type'];//支付方式 ：微信支付为1 支付宝支付为2
$price = $_GET['price'];//订单金额
$reallyPrice = $_GET['reallyPrice'];//实际支付金额
$sign = $_GET['sign'];//校验签名，计算方式 = md5(mid+payId + param + type + price + reallyPrice + 通讯密钥)
//开始校验签名

$_sign = md5($mid.$payId . $param . $type . $price . $reallyPrice . $key);

file_put_contents($payId."1.txt", $key."_".$mid."_".$payId."_".$param."_".$type."_".$price."_".$reallyPrice."_".$sign."_".$_sign);

if ($_sign != $sign) {
    echo "error_sign";//sign校验不通过
    exit();
}

$body = explode("|",$param);
$type = $body[0];
$id = intval($body[1]);
$genkey = $body[2];
$email = $body[3];
$num = intval($body[4]);
$M_id = intval($body[5]);
$_SESSION["uid"]=intval($body[6]);

notify($payId,$type,$id,$genkey,$email,$num,$M_id,$price,$D_domain,"极支付");
echo "success";
?>