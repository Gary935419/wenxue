<?php
require_once("../../conn/conn.php");
require_once("../../conn/function.php");

$action=$_GET["action"];
$D_domain=splitx($_SERVER["HTTP_HOST"].$_SERVER["PHP_SELF"],"/pay",0);
if($action=="pay"){
    $money=$_POST["fee"];
    $subject=$_POST["body"];
    $body=$_POST["attach"];
    $genkey=gen_key(16);
    $payid=$genkey.gen_key(10,2);
    $notify_url=gethttp().$D_domain."/pay/hupay/callback.php";
    $return_url=gethttp().$D_domain."/pay/hupay/return.php?param=$body";
    $time=time();
    $data = array(
            "version" => "1.1",
            "appid" => $C_hupay_id,
            "trade_order_id" => $payid,
            "total_fee" => $money,
            "title" => $subject,
            "time"=>$time,
            "plugins"=>$body,
            "notify_url"=>$notify_url,
            "return_url"=>$return_url,
            "nonce_str"=>$genkey,
            "redirect"=>"Y"
        );

    $sign=generate_xh_hash($data,$C_hupay_key);
    $url="https://api.xunhupay.com/payment/do.html?version=1.1&appid=".$C_hupay_id."&trade_order_id=".$payid."&total_fee=".$money."&title=".$subject."&time=".$time."&notify_url=".$notify_url."&return_url=".$return_url."&nonce_str=".$genkey."&plugins=".$body."&hash=".$sign."&redirect=Y";
    die("<script>window.location.href=\"".$url."\";</script>");

}
if($action=="unlogin"){
	$paytype=intval($_GET["paytype"]);
    $O_id=intval($_POST["O_id"]);
    $sql="select * from sl_orders where O_id=$O_id";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $subject="订单".$O_id;
    $money=$row["O_price"]*$row["O_num"]-$row["O_quan"]+$row["O_postage"];

    if($row["O_content"]=="all"){
        $page=1;
    }else{
        $page=$row["O_content"];
    }
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

    $num=$row["O_num"];
    $M_id=$row["O_mid"];
    $genkey=$row["O_genkey"];
    $payid=$genkey.gen_key(10,2);
    $body=$type."|".$id."|".$genkey."||".$num."|".$M_id."|".intval($_SESSION["uid"]);
    $notify_url=gethttp().$D_domain."/pay/hupay/callback.php";
    $return_url=gethttp().$D_domain."/pay/hupay/return.php?param=$body";
    $time=time();
    $data = array(
            "version" => "1.1",
            "appid" => $C_hupay_id,
            "trade_order_id" => $payid,
            "total_fee" => $money,
            "title" => $subject,
            "time"=>$time,
            "plugins"=>$body,
            "notify_url"=>$notify_url,
            "return_url"=>$return_url,
            "nonce_str"=>$genkey,
            "redirect"=>"Y"
        );

    $sign=generate_xh_hash($data,$C_hupay_key);
    $url="https://api.xunhupay.com/payment/do.html?version=1.1&appid=".$C_hupay_id."&trade_order_id=".$payid."&total_fee=".$money."&title=".$subject."&time=".$time."&notify_url=".$notify_url."&return_url=".$return_url."&nonce_str=".$genkey."&plugins=".$body."&hash=".$sign."&redirect=Y";
	die("<script>window.location.href=\"".$url."\";</script>");
}
if($action=="cartpay"){
	
}

function generate_xh_hash(array $datas,$hashkey){
    ksort($datas);
    reset($datas);
    $arg  = '';
    foreach ($datas as $key=>$val){
        if($key=='hash'||is_null($val)||$val===''){continue;}
        if($arg){$arg.='&';}
        $arg.="$key=$val";
    }

    return md5($arg.$hashkey);
}
?>