<?php
require_once("../../conn/conn.php");
require_once("../../conn/function.php");

foreach ($_GET as $key=>$value){
	$str2=$str2.$key."=".$value."&";
}
$str2=substr($str2,0,strlen($str2)-1); 
file_put_contents($_GET["out_trade_no"].".txt",$str2);


$D_domain=splitx($_SERVER["HTTP_HOST"].$_SERVER["PHP_SELF"],"/pay",0);
if(md5("money=".$_GET["money"]."&name=".$_GET["name"]."&out_trade_no=".$_GET["out_trade_no"]."&pid=".$C_epay_id."&trade_no=".$_GET["trade_no"]."&trade_status=".$_GET["trade_status"]."&type=".$_GET["type"].$C_epay_key)==$_GET["sign"]){

	$no=t($_GET["out_trade_no"]);
	$money=$_GET["money"];
	$M_id=intval(splitx($no,"_",1));

	$sql="select * from sl_list where L_mid=".$M_id." and L_no='".$no."'";
	$result = mysqli_query($conn, $sql);
	$row = mysqli_fetch_assoc($result);
	if(mysqli_num_rows($result) > 0) {

	}else{
		mysqli_query($conn,"update sl_member set M_money=M_money+".$money." where M_id=".$M_id);
		mysqli_query($conn, "insert into sl_list(L_mid,L_no,L_title,L_time,L_money,L_genkey) values(".$M_id.",'$no','帐号充值','".date('Y-m-d H:i:s')."',".$money.",'')");
	}
	echo "success";
}
?>