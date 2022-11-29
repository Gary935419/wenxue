<?php
require_once("../../conn/conn.php");
require_once("../../conn/function.php");

$action=$_GET["action"];
$D_domain=splitx($_SERVER["HTTP_HOST"].$_SERVER["PHP_SELF"],"/pay",0);

$M_id=$_SESSION["M_id"];
$sql="select * from sl_member where M_id=".intval($M_id);
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$M_money=$row["M_money"];


if($action=="cartpay"){
    $O_ids=$_POST["O_ids"];
    $no = date("YmdHis").gen_key(10);
    $money=0;
    $ids=explode(",",$O_ids);

    for ($i=0 ;$i<count($ids);$i++) {
        $sql="select * from sl_orders where O_del=0 and O_state=0 and O_id=".intval($ids[$i]);
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        if (mysqli_num_rows($result) > 0) {
            $money=$money+($row["O_price"]*$row["O_num"]);
        }
    }

    if($M_money-$money>=0){
        if(cart($O_ids,$money,$no,"余额支付")){
            Header("Location: ../../member/query.php?action=query&no=$no");
        }
    }else{
        box("账户余额不足，请先充值","../../member/pay.php?money=".($money-$M_money),"error");
    }
}

if($action=="unlogin"){

    $O_id=intval($_POST["O_id"]);
    $sql="select * from sl_orders where O_id=$O_id";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $subject=mb_substr($row["O_title"],0,10,"utf-8")."...-购买";
    $money=$row["O_price"]*$row["O_num"]-$row["O_quan"]+$row["O_postage"];
    $genkey=$row["O_genkey"];
    if($row["O_content"]=="all"){
        $page=1;
    }else{
        $page=$row["O_content"];
    }

    if($row["O_type"]==0){
        $type="product";
        $id=$row["O_pid"];
        $return_url=gethttp().$D_domain."/pay/7pay/return.php?type=product&genkey=$genkey&id=$id";
    }
    if($row["O_type"]==1){
        $type="news";
        $id=$row["O_nid"];
        $return_url=gethttp().$D_domain."/pay/7pay/return.php?type=news&id=$id&genkey=$genkey";
    }
    if($row["O_type"]==2){
        $type="course";
        $id=$row["O_cid"];
        $return_url=gethttp().$D_domain."/pay/7pay/return.php?type=course&id=$id&genkey=$genkey";
    }
    
    $num=$row["O_num"];
    $M_id=$row["O_mid"];
    $email=$row["O_address"];
    $no = date("YmdHis").gen_key(10);

    if($M_money-$money>=0){
        if(notify($no,$type,$id,$genkey,$email,$num,$M_id,$money,$D_domain,"余额支付")){
            Header("Location: ".$return_url);
        }
    }else{
        box("账户余额不足，请先充值","../../member/pay.php?money=".($money-$M_money),"error");
    }
}

?>