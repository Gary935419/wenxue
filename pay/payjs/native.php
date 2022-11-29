<?php 
require_once("../../conn/conn.php");
require_once("../../conn/function.php");

$D_domain=splitx($_SERVER["HTTP_HOST"].$_SERVER["PHP_SELF"],"/pay",0);

$NOTIFY_URL = gethttp().$D_domain."/pay/payjs/notify_url.php";
$genkey=$_POST["genkey"];
$O_ids=$_POST["O_ids"];
$t=$_GET["t"];

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

if($t=="alipay"){
    //die("alipay");
    $sign=strtoupper(md5("attach=".$attach."&body=".$body."&mchid=".$C_payjs_id2."&notify_url=".$NOTIFY_URL."&out_trade_no=".$out_trade_no."&total_fee=".$total_fee."&type=alipay&key=".$C_payjs_key2));
    $info=getbody("https://payjs.cn/api/native","mchid=$C_payjs_id2&total_fee=$total_fee&out_trade_no=$out_trade_no&body=$body&attach=$attach&notify_url=$NOTIFY_URL&type=alipay&sign=$sign");
}else{
    $sign=strtoupper(md5("attach=".$attach."&body=".$body."&mchid=".$C_payjs_id."&notify_url=".$NOTIFY_URL."&out_trade_no=".$out_trade_no."&total_fee=".$total_fee."&key=".$C_payjs_key));
    $info=getbody("https://payjs.cn/api/native","mchid=$C_payjs_id&total_fee=$total_fee&out_trade_no=$out_trade_no&body=$body&attach=$attach&notify_url=$NOTIFY_URL&sign=$sign");
}

if(strpos($info,"SUCCESS")!==false){
    die(json_decode($info)->code_url);
}else{
    die($info);
}

?>