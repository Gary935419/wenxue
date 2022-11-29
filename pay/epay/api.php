<?php
require_once("../../conn/conn.php");
require_once("../../conn/function.php");

$paytype=$_GET["paytype"];
$no=date("YmdHis").gen_key(10,2);
$D_domain=splitx($_SERVER["HTTP_HOST"].$_SERVER["PHP_SELF"],"/pay",0);
$action=$_GET["action"];

if($action=="pay"){
	$money=round($_POST["fee"],2);
    $M_id=$_POST["M_id"];
	$subject="充值$money元";
    if($_GET["from"]=="app"){
        $return_url=gethttp().$D_domain."/pay/7pay/return.php?typex=app";
    }else{
        $return_url=gethttp().$D_domain."/pay/7pay/return.php?typex=pay";
    }

    $notify_url=gethttp().$D_domain."/pay/epay/notify2.php";
    $no=$no."_".$M_id;

    if($money>0){
    	$sign=md5("money=".$money."&name=".$subject."&notify_url=".$notify_url."&out_trade_no=".$no."&pid=".$C_epay_id."&return_url=".$return_url."&sitename=".$C_title."&type=".$paytype.$C_epay_key);

		header("location:".$C_epay_url."submit.php?pid=".$C_epay_id."&type=".$paytype."&out_trade_no=".$no."&notify_url=".$notify_url."&return_url=".$return_url."&name=".$subject."&money=".$money."&sitename=".$C_title."&sign=".$sign."&sign_type=MD5");
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
        }
    }

    $subject="购物车订单";
    $body = "cart@".$O_ids;
    $notify_url=gethttp().$D_domain."/pay/epay/notify.php";
    $return_url=gethttp().$D_domain."/pay/epay/return.php";

    if($money>0){
    	$sign=md5("money=".$money."&name=".$subject."&notify_url=".$notify_url."&out_trade_no=".$no."&pid=".$C_epay_id."&return_url=".$return_url."&sitename=".$C_title."&type=".$paytype.$C_epay_key);

		header("location:".$C_epay_url."submit.php?pid=".$C_epay_id."&type=".$paytype."&out_trade_no=".$no."&notify_url=".$notify_url."&return_url=".$return_url."&name=".$subject."&money=".$money."&sitename=".$C_title."&sign=".$sign."&sign_type=MD5");
    }
}
if($action=="unlogin"){
	$O_id=intval($_POST["O_id"]);
	$sql="select * from sl_orders where O_id=$O_id";
	$result = mysqli_query($conn, $sql);
	$row = mysqli_fetch_assoc($result);
	$subject="订单$O_id";
	$money=$row["O_price"]*$row["O_num"];

	$sign=md5("money=".$money."&name=".$subject."&notify_url=".gethttp().$D_domain."/pay/epay/notify.php&out_trade_no=".$O_id."&pid=".$C_epay_id."&return_url=".gethttp().$D_domain."/pay/epay/return.php&sitename=".$C_title."&type=".$paytype.$C_epay_key);

	header("location:".$C_epay_url."submit.php?pid=".$C_epay_id."&type=".$paytype."&out_trade_no=".$O_id."&notify_url=".gethttp().$D_domain."/pay/epay/notify.php&return_url=".gethttp().$D_domain."/pay/epay/return.php&name=".$subject."&money=".$money."&sitename=".$C_title."&sign=".$sign."&sign_type=MD5");
}
?>