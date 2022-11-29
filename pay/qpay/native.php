<?php 
require_once("../../conn/conn.php");
require_once("../../conn/function.php");

$D_domain=splitx($_SERVER["HTTP_HOST"].$_SERVER["PHP_SELF"],"/pay",0);

$NOTIFY_URL = gethttp().$D_domain."/pay/qpay/notify_url.php";
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

$sgin=strtoupper(MD5("attach=".$attach."&body=".$body."&fee_type=CNY&mch_id=".$C_qpay_mchid."&nonce_str=".$out_trade_no."&notify_url=".$NOTIFY_URL."&out_trade_no=".$out_trade_no."&spbill_create_ip=".getip()."&total_fee=".$total_fee."&trade_type=NATIVE&key=".$C_qpay_key));

$xml="<xml><attach>".$attach."</attach><body>".$body."</body><fee_type>CNY</fee_type><mch_id>".$C_qpay_mchid."</mch_id><nonce_str>".$out_trade_no."</nonce_str><notify_url>".$NOTIFY_URL."</notify_url><out_trade_no>".$out_trade_no."</out_trade_no><spbill_create_ip>".getip()."</spbill_create_ip><total_fee>".$total_fee."</total_fee><trade_type>NATIVE</trade_type><sign>".$sgin."</sign></xml>";

$info=getbody("https://qpay.qq.com/cgi-bin/pay/qpay_unified_order.cgi",$xml);

$postObj = simplexml_load_string( $info );
$code_url=$postObj->code_url;
$mweb_url=$postObj->mweb_url;

if(strpos($info,"SUCCESS")!==false){
    echo $code_url;
}else{
    echo "错误，信息：".$info;
}
?>