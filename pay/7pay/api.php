<?php
require_once("../../conn/conn.php");
require_once("../../conn/function.php");

$action=$_GET["action"];
$D_domain=splitx($_SERVER["HTTP_HOST"].$_SERVER["PHP_SELF"],"/pay",0);

if($action=="pay"){
    $money=round($_POST["fee"],2);
    if($_GET["from"]=="app"){
        $return_url=urlencode(gethttp().$D_domain."/pay/7pay/return.php?type=app");
    }else{
        $return_url=urlencode(gethttp().$D_domain."/pay/7pay/return.php?type=pay");
    }
    $M_id=$_POST["M_id"];
    $no=date("YmdHis").gen_key(10,2);
    $notify_url=gethttp().$D_domain."/pay/7pay/callback.php";

    if($money>0){
        $sign=strtolower(md5("body=账户充值".$money."元&fee=".$money."&no=".$no."&notify_url=".$notify_url."&pid=".$C_7pay_pid."&remark=".$M_id."&return_url=".$return_url."&key=".$C_7pay_pkey));
        if(isMobile()){
              Header("Location: https://7-pay.cn/pay.php?body=账户充值".$money."元&fee=".$money."&no=".$no."&notify_url=".$notify_url."&pid=".$C_7pay_pid."&remark=".$M_id."&return_url=".$return_url."&sign=".$sign);
            die();
        }else{
            die("<html><head><title>收银台 - ".$C_title."</title></head><body><iframe src=\"https://7-pay.cn/pay.php?body=账户充值".$money."元&fee=".$money."&no=".$no."&notify_url=".$notify_url."&pid=".$C_7pay_pid."&remark=".$M_id."&return_url=".$return_url."&sign=".$sign."\" style=\"width:100%;height:100%;border:none\"></body></html>");
        }
    }else{
        box("金额需大于0元","back","error");
    }
}

if($action=="cartpay"){
    $O_ids=$_POST["O_ids"];
    $money=0;
    $ids=explode(",",$O_ids);
    for ($i=0 ;$i<count($ids);$i++) {
        $sql="select * from sl_orders where O_del=0 and O_state=0 and O_id=".intval($ids[$i]);
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        if (mysqli_num_rows($result) > 0) {
            $money=$money+($row["O_price"]*$row["O_num"]);
            $genkey=$row["O_genkey"];
        }
    }

    $no=date("YmdHis").gen_key(10,2);
    $subject="购物车订单";
    $body = "cart@".$O_ids;
    $notify_url=gethttp().$D_domain."/pay/7pay/callback2.php";
    $return_url=urlencode(gethttp().$D_domain."/pay/7pay/return.php?type=cart&genkey=$genkey");

    if($money>0){
        $sign=strtolower(md5("body=".$subject."&fee=".$money."&no=".$no."&notify_url=".$notify_url."&pid=".$C_7pay_pid."&remark=".$body."&return_url=".$return_url."&key=".$C_7pay_pkey));
        if(isMobile()){
              Header("Location: https://7-pay.cn/pay.php?body=".$subject."&fee=".$money."&no=".$no."&notify_url=".$notify_url."&pid=".$C_7pay_pid."&remark=".$body."&return_url=".$return_url."&sign=".$sign);
            die();
        }else{
            die("<html><head><title>收银台 - ".$C_title."</title></head><body><iframe src=\"https://7-pay.cn/pay.php?body=".$subject."&fee=".$money."&no=".$no."&notify_url=".$notify_url."&pid=".$C_7pay_pid."&remark=".$body."&return_url=".$return_url."&sign=".$sign."\" style=\"width:100%;height:100%;border:none\"></body></html>");
        }
    }else{
        box("订单金额需大于0元","back","error");
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
        $return_url=urlencode(gethttp().$D_domain."/pay/7pay/return.php?type=product&genkey=$genkey&id=$id");
    }
    if($row["O_type"]==1){
        $type="news";
        $id=$row["O_nid"];
        $return_url=urlencode(gethttp().$D_domain."/pay/7pay/return.php?type=news&id=$id&genkey=$genkey");
    }
    if($row["O_type"]==2){
        $type="course";
        $id=$row["O_cid"];
        $return_url=urlencode(gethttp().$D_domain."/pay/7pay/return.php?type=course&id=$id&genkey=$genkey");
    }
    
    $num=$row["O_num"];
    $M_id=$row["O_mid"];
    $body=$type."|".$id."|".$genkey."||".$num."|".$M_id."|".intval($_SESSION["uid"]);
    $notify_url=gethttp().$D_domain."/pay/7pay/callback2.php";
    $no=date("YmdHis").gen_key(10,2);

    $sign=strtolower(md5("body=".$subject."&fee=".$money."&no=".$no."&notify_url=".$notify_url."&pid=".$C_7pay_pid."&remark=".$body."&return_url=".$return_url."&key=".$C_7pay_pkey));
    if(isMobile()){
          Header("Location: https://7-pay.cn/pay.php?body=".$subject."&fee=".$money."&no=".$no."&notify_url=".$notify_url."&pid=".$C_7pay_pid."&remark=".$body."&return_url=".$return_url."&sign=".$sign);
        die();
    }else{
        die("<html><head><title>收银台 - ".$C_title."</title></head><body><iframe src=\"https://7-pay.cn/pay.php?body=".$subject."&fee=".$money."&no=".$no."&notify_url=".$notify_url."&pid=".$C_7pay_pid."&remark=".$body."&return_url=".$return_url."&sign=".$sign."\" style=\"width:100%;height:100%;border:none\"></body></html>");
    }
}
?>