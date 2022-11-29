<?php 
require_once("../../conn/conn.php");
require_once("../../conn/function.php");

$D_domain=splitx($_SERVER["HTTP_HOST"].$_SERVER["PHP_SELF"],"/pay",0);

$APPID = $C_wx_appid;
$MCHID = $C_wx_mchid;
$KEY = $C_wx_key;
$APPSECRET = $C_wx_appsecret;
$NOTIFY_URL = gethttp().$D_domain."/pay/wxpay/notify_url.php";
$genkey=$_POST["genkey"];
$O_ids=$_POST["O_ids"];

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
    	$total_fee=$_POST["fee"]*100;
    	$body=$_POST["body"];
    	$attach=$_POST["attach"];
    }else{
    	$O_id=intval($_POST["O_id"]);
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

if(isMobile()){//h5支付
    $sign=strtoupper(MD5("appid=".$APPID."&attach=".$attach."&body=".$body."&mch_id=".$MCHID."&nonce_str=".$out_trade_no."&notify_url=".$NOTIFY_URL."&out_trade_no=".$out_trade_no."&scene_info={\"h5_info\": {\"type\":\"Wap\",\"wap_url\": \"".gethttp().$_SERVER["HTTP_HOST"]."\",\"wap_name\": \"".$C_title."\"}}&spbill_create_ip=".getip()."&total_fee=".$total_fee."&trade_type=MWEB&key=".$KEY));
    $info=getbody("https://api.mch.weixin.qq.com/pay/unifiedorder","<xml><appid>".$APPID."</appid><attach>".$attach."</attach><body>".$body."</body><mch_id>".$MCHID."</mch_id><nonce_str>".$out_trade_no."</nonce_str><notify_url>".$NOTIFY_URL."</notify_url><out_trade_no>".$out_trade_no."</out_trade_no><spbill_create_ip>".getip()."</spbill_create_ip><total_fee>".$total_fee."</total_fee><trade_type>MWEB</trade_type><scene_info>{\"h5_info\": {\"type\":\"Wap\",\"wap_url\": \"".gethttp().$_SERVER["HTTP_HOST"]."\",\"wap_name\": \"".$C_title."\"}}</scene_info><sign>".$sign."</sign></xml>");
}else{//扫码支付
    $sign=strtoupper(MD5("appid=".$APPID."&attach=".$attach."&body=".$body."&mch_id=".$MCHID."&nonce_str=".$out_trade_no."&notify_url=".$NOTIFY_URL."&out_trade_no=".$out_trade_no."&spbill_create_ip=".getip()."&total_fee=".$total_fee."&trade_type=NATIVE&key=".$KEY));
    $info=getbody("https://api.mch.weixin.qq.com/pay/unifiedorder","<xml><appid>".$APPID."</appid><attach>".$attach."</attach><body>".$body."</body><mch_id>".$MCHID."</mch_id><nonce_str>".$out_trade_no."</nonce_str><notify_url>".$NOTIFY_URL."</notify_url><out_trade_no>".$out_trade_no."</out_trade_no><spbill_create_ip>".getip()."</spbill_create_ip><total_fee>".$total_fee."</total_fee><trade_type>NATIVE</trade_type><sign>".$sign."</sign></xml>");
}

$postObj = simplexml_load_string( $info );
$code_url=$postObj->code_url;
$mweb_url=$postObj->mweb_url;

if(strpos($info,"SUCCESS")!==false){
    if(isMobile()){//h5支付
        echo $mweb_url;
    }else{
        echo $code_url;
    }
}else{
    echo "错误，信息：".$info;
}
?>