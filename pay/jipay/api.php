<?php
require_once("../../conn/conn.php");
require_once("../../conn/function.php");

$action=$_GET["action"];
$D_domain=splitx($_SERVER["HTTP_HOST"].$_SERVER["PHP_SELF"],"/pay",0);
if($action=="pay"){

}
if($action=="unlogin"){
	$paytype=intval($_GET["paytype"]);
    $O_id=intval($_POST["O_id"]);
    $sql="select * from sl_orders where O_id=$O_id";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $subject=mb_substr($row["O_title"],0,10,"utf-8")."...-购买";
    $money=$row["O_price"]*$row["O_num"]-$row["O_quan"]+$row["O_postage"];
    if($row["O_content"]=="all"){
        $page=1;
    }else{
        $page=$row["O_content"];
    }
    if($row["O_type"]==0){
        $type="product";
        $id=$row["O_pid"];
        $return_url=gethttp().$D_domain."/pay/jipay/return.php";
    }
    if($row["O_type"]==1){
        $type="news";
        $id=$row["O_nid"];
        $return_url=gethttp().$D_domain."/pay/jipay/return.php";
    }
    if($row["O_type"]==2){
        $type="course";
        $id=$row["O_cid"];
        $return_url=gethttp().$D_domain."/pay/jipay/return.php";
    }

    $num=$row["O_num"];
    $M_id=$row["O_mid"];
    $genkey=$row["O_genkey"];
    $body=$type."|".$id."|".$genkey."||".$num."|".$M_id."|".intval($_SESSION["uid"]);
    $notify_url=gethttp().$D_domain."/pay/jipay/callback.php";
    $payid=$genkey.gen_key(10,2);

	$url="http://pay.xi88.top/createOrder?mid=".$C_jipay_id."&payId=".$payid."&type=".$paytype."&price=".$money."&sign=".md5($C_jipay_id.$payid.$body.$paytype.$money.$C_jipay_key)."&param=".$body."&isHtml=1&notifyUrl=".$notify_url."&returnUrl=".$return_url;
	die("<script>window.location.href=\"".$url."\";</script>");
}
if($action=="cartpay"){
	
}
?>