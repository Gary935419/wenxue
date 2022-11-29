<?php
require_once("../../conn/conn.php");
require_once("../../conn/function.php");

$D_domain=splitx($_SERVER["HTTP_HOST"].$_SERVER["PHP_SELF"],"/pay",0);

$M_id=intval($_REQUEST["M_id"]);
$fee=$_REQUEST["fee"];
$genkey=$_REQUEST["genkey"];

$APPID = $C_wx_appid;
$MCHID = $C_wx_mchid;
$KEY = $C_wx_key;
$APPSECRET = $C_wx_appsecret;
	
$NOTIFY_URL = gethttp().$D_domain."/pay/wxpay/notify_url.php";

$O_ids=$_REQUEST["O_ids"];

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

    $body="购物车订单";
    $attach = "cart@".$O_ids;
    $total_fee=$total_fee*100;
}else{
    if($genkey==""){
    	$body="用户充值" . $fee . "元";
    	$attach=$M_id;
    	$total_fee=$fee*100;
    }else{
        $O_id=intval($_GET["O_id"]);
        $sql="select * from sl_orders where O_id=$O_id";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        $body="订单$O_id";
        //$body=mb_substr($row["O_title"],0,10,"utf-8")."...-购买";
        $total_fee=($row["O_price"]*$row["O_num"]-$row["O_quan"]+$row["O_postage"])*100;
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
        $attach=$type."|".$id."|".$genkey."||".$num."|".$M_id."|".intval($_SESSION["uid"]);
    }
}

$product_id=1;
$out_trade_no = date("YmdHis");

$Code = $_GET["code"];
$info=getbody("https://api.weixin.qq.com/sns/oauth2/access_token?appid=".$APPID."&secret=".$APPSECRET."&code=".$Code."&grant_type=authorization_code","");

$openid=json_decode($info)->openid;

if($openid==""){
    die("出现错误，报错代码：".$info);
}

$sign=strtoupper(MD5("appid=".$APPID."&attach=".$attach."&body=".$body."&mch_id=".$MCHID."&nonce_str=".$out_trade_no."&notify_url=".$NOTIFY_URL."&openid=".$openid."&out_trade_no=".$out_trade_no."&spbill_create_ip=127.0.0.1&total_fee=".$total_fee."&trade_type=JSAPI&key=".$KEY));

$info=getbody("https://api.mch.weixin.qq.com/pay/unifiedorder","<xml><appid>".$APPID."</appid><attach>".$attach."</attach><body>".$body."</body><mch_id>".$MCHID."</mch_id><nonce_str>".$out_trade_no."</nonce_str><notify_url>".$NOTIFY_URL."</notify_url><openid>".$openid."</openid><out_trade_no>".$out_trade_no."</out_trade_no><spbill_create_ip>127.0.0.1</spbill_create_ip><total_fee>".$total_fee."</total_fee><trade_type>JSAPI</trade_type><sign>".$sign."</sign></xml>");

$postObj = simplexml_load_string($info);
$prepay_id=$postObj->prepay_id;

if($prepay_id==""){
    die("出现错误，报错代码：<textarea style=\"100%;height:500px\">".$info."</textarea>");
}

$timeStamp=time();
$nonceStr=gen_key(20);
$signType="MD5";

$paySign=strtoupper(MD5("appId=".$APPID."&nonceStr=".$nonceStr."&package=prepay_id=".$prepay_id."&signType=MD5&timeStamp=".$timeStamp."&key=".$KEY));

$jsApiParameters='{"appId":"'.$APPID.'","timeStamp":"'.$timeStamp.'","nonceStr":"'.$nonceStr.'","package":"prepay_id='.$prepay_id.'","signType":"MD5","paySign":"'.$paySign.'"}';
if($genkey==""){
	Header("Location: ../../member/pay.php?jsApiParameters=".$jsApiParameters."&O_id=".$O_id."&money=".$fee);
}else{
	Header("Location: ../../member/unlogin.php?jsApiParameters=".$jsApiParameters."&O_id=".$O_id."&genkey=".$genkey);
}
?>