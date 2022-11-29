<?php
require_once("../../conn/conn.php");
require_once("../../conn/function.php");

$type=$_GET["type"];
$typex=$_GET["typex"];
$id=$_GET["id"];
$genkey=t($_GET["genkey"]);
?>
<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>即时到账交易接口</title>
</head>
<body>
	
	<?php
	if($type=="pay" || $typex=="pay"){
		echo "<script>alert('充值成功！');window.location='../../member/index.php';</script>";
	}
	if($type=="app" || $typex=="app"){
		echo app_back("../my/my","充值成功！");
	}
	if($type=="news"){
		if(strpos($genkey,"_app")===false){
			echo "<script>window.location='../../?type=newsinfo&id=$id&genkey=$genkey';</script>";
		}else{
			echo app_back("../webview/webview?id=$id&type=news&genkey=$genkey","");
		}
	}
	if($type=="course"){
		$O=getrs("select * from sl_orders where O_genkey='$genkey'");
		if($O["O_content"]=="all"){
			$page=1;
		}else{
			$page=$O["O_content"];
		}
		if(strpos($genkey,"_app")===false){
			echo "<script>window.location='../../?type=courseinfo&id=$id&page=$page';</script>";
		}else{
			echo app_back("../webview/webview?id=$id&type=course&page=$page","");
		}
	}
	if($type=="product"){
		echo "<script>window.location='../../member/unlogin.php?type=fahuo&genkey=$genkey&id=$id';</script>";
	}
	if($type=="cart"){
		$no=getrs("select * from sl_list where L_genkey='".$genkey."' and not L_genkey=''","L_no");
		echo "<script>window.location='../../member/query.php?action=query&no=$no';</script>";
	}
	?>
</body>
</html>