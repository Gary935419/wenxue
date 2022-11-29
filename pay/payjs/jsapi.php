<?php 
require_once("../../conn/conn.php");
require_once("../../conn/function.php");

$D_domain=splitx($_SERVER["HTTP_HOST"].$_SERVER["PHP_SELF"],"/pay",0);
$openid=$_GET["openid"];

$NOTIFY_URL = gethttp().$D_domain."/pay/payjs/notify_url.php";

$M_id=intval($_REQUEST["M_id"]);
$fee=$_REQUEST["fee"];
$genkey=$_REQUEST["genkey"];
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

$sign=strtoupper(md5("attach=".$attach."&body=".$body."&mchid=".$C_payjs_id."&notify_url=".$NOTIFY_URL."&openid=".$openid."&out_trade_no=".$out_trade_no."&total_fee=".$total_fee."&key=".$C_payjs_key));
$info=getbody("https://payjs.cn/api/jsapi","mchid=$C_payjs_id&openid=$openid&total_fee=$total_fee&out_trade_no=$out_trade_no&body=$body&attach=$attach&notify_url=$NOTIFY_URL&sign=$sign");

if(strpos($info,"SUCCESS")!==false){
    $jsApiParameters=json_encode(json_decode($info)->jsapi);
    if($genkey==""){
        Header("Location: ../../member/pay.php?jsApiParameters=".$jsApiParameters."&O_id=".$O_id."&money=".$fee);
    }else{
        Header("Location: ../../member/unlogin.php?jsApiParameters=".$jsApiParameters."&O_id=".$O_id."&genkey=".$genkey);
    }
}else{
    die($info);
}
?>