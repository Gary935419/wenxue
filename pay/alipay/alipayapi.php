<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>支付宝即时到账交易接口接口</title>
</head>
<?php
require_once("../../conn/conn.php");
require_once("../../conn/function.php");
require_once("alipay.config.php");
require_once("lib/alipay_submit.class.php");

$genkey=$_POST["genkey"];
$O_ids=$_POST["O_ids"];
$out_trade_no = date("YmdHis");

if($O_ids!=""){
    $total_fee=0;
    $ids=explode(",",$O_ids);
    for ($i=0 ;$i<count($ids);$i++) {
        $sql="select * from sl_orders where O_del=0 and O_state=0 and O_id=".intval($ids[$i]);
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        if (mysqli_num_rows($result) > 0) {
            $total_fee=$total_fee+($row["O_price"]*$row["O_num"]);
        }
    }

    $subject="购物车订单";
    $body = "cart@".$O_ids;
}else{
    if($genkey==""){
        if($_GET["from"]=="app"){
            $subject = "[app]用户充值" . $_REQUEST["fee"] . "元";
        }else{
            $subject = "用户充值" . $_REQUEST["fee"] . "元";
        }
        $total_fee = $_REQUEST["fee"];
        $body = $_REQUEST["M_id"];
    }else{
        $O_id=intval($_POST["O_id"]);
        $sql="select * from sl_orders where O_id=$O_id";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        $subject=mb_substr($row["O_title"],0,10,"utf-8")."...-购买";
        $total_fee=$row["O_price"]*$row["O_num"]-$row["O_quan"]+$row["O_postage"];
        if($row["O_type"]==0){
            $type="product";
            $id=$row["O_pid"];
        }
        if($row["O_type"]==1){
            $type="news";
            $id=$row["O_nid"];
        }
        if($row["O_type"]==2){
            $type="course";
            $id=$row["O_cid"];
        }
        $genkey=$row["O_genkey"];
        $num=$row["O_num"];
        $M_id=$row["O_mid"];
        $body=$type."|".$id."|".$genkey."||".$num."|".$M_id."|".intval($_SESSION["uid"]);
    }
}

if(isMobile()){
    $parameter = array(
        "service"       => "alipay.wap.create.direct.pay.by.user",
        "partner"       => $alipay_config['partner'],
        "seller_id"  => $alipay_config['seller_id'],
        "payment_type"  => $alipay_config['payment_type'],
        "notify_url"    => $alipay_config['notify_url'],
        "return_url"    => $alipay_config['return_url'],
        
        "anti_phishing_key"=>$alipay_config['anti_phishing_key'],
        "exter_invoke_ip"=>$alipay_config['exter_invoke_ip'],
        "out_trade_no"  => $out_trade_no,
        "subject"   => $subject,
        "total_fee" => $total_fee,
        "body"  => $body,
        "it_b_pay" => "1440m",
        "app_pay" => "Y",
        "_input_charset"    => trim(strtolower($alipay_config['input_charset']))
    );
}else{
    $parameter = array(
            "service"       => $alipay_config['service'],
            "partner"       => $alipay_config['partner'],
            "seller_id"  => $alipay_config['seller_id'],
            "payment_type"  => $alipay_config['payment_type'],
            "notify_url"    => $alipay_config['notify_url'],
            "return_url"    => $alipay_config['return_url'],
            
            "anti_phishing_key"=>$alipay_config['anti_phishing_key'],
            "exter_invoke_ip"=>$alipay_config['exter_invoke_ip'],
            "out_trade_no"  => $out_trade_no,
            "subject"   => $subject,
            "total_fee" => $total_fee,
            "body"  => $body,
            "_input_charset"    => trim(strtolower($alipay_config['input_charset']))
    );
}


$alipaySubmit = new AlipaySubmit($alipay_config);
$html_text = $alipaySubmit->buildRequestForm($parameter,"get", "确认");
echo $html_text;
?>
</body>
</html>