<?php
require_once("../../conn/conn.php");
require_once("../../conn/function.php");

$D_domain=splitx($_SERVER["HTTP_HOST"].$_SERVER["PHP_SELF"],"/pay",0);
if(md5("money=".$_GET["money"]."&name=".$_GET["name"]."&out_trade_no=".$_GET["out_trade_no"]."&pid=".$C_epay_id."&trade_no=".$_GET["trade_no"]."&trade_status=".$_GET["trade_status"]."&type=".$_GET["type"].$C_epay_key)==$_GET["sign"]){
	$trade_no=t($_GET["trade_no"]);
	$no=intval($_GET["out_trade_no"]);
	$O=getrs("select * from sl_orders where O_id=$no");
	switch($O["O_type"]){
		case 0:
		$type="product";
		$id=$O["O_pid"];
		break;
		case 1:
		$type="news";
		$id=$O["O_nid"];
		break;
		case 2:
		$type="course";
		$id=$O["O_cid"];
		break;
	}
	$genkey=$O["O_genkey"];
	$email=$O["O_address"];
	$num=$O["O_num"];
	$M_id=$O["O_mid"];
	$_SESSION["uid"]=0;
	$price=$_GET["money"];

	notify($trade_no,$type,$id,$genkey,$email,$num,$M_id,$price,$D_domain,"易支付");
	echo "success";
}
?>