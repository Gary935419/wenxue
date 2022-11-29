<?php
require_once("../../conn/conn.php");
require_once("../../conn/function.php");

$action=$_GET["action"];
$D_domain=splitx($_SERVER["HTTP_HOST"].$_SERVER["PHP_SELF"],"/pay",0);

if($action=="pay"){
    $money=round($_POST["fee"],2);

    if($_GET["from"]=="app"){
        $return_url=gethttp().$D_domain."/pay/7pay/return.php?typex=app";
    }else{
        $return_url=gethttp().$D_domain."/pay/7pay/return.php?typex=pay";
    }

    $M_id=$_POST["M_id"];
    $paytype=intval($_POST["paytype"]);
    $no=date("YmdHis").gen_key(10,2);
    $notify_url=gethttp().$D_domain."/pay/codepay/callback2.php";

    if($money>0){

        $data = array(
            "id" => $C_codepay_id,//你的码支付ID
            "pay_id" => $M_id.gen_key(10,2), //唯一标识 可以是用户ID,用户名,session_id(),订单ID,ip 付款后返回
            "type" => $paytype,//1支付宝支付 3微信支付 2QQ钱包
            "price" => $money,//金额100元
            "param" => $M_id,//自定义参数
            "notify_url"=>$notify_url,//通知地址
            "return_url"=>$return_url,//跳转地址
        ); //构造需要传递的参数

        ksort($data); //重新排序$data数组
        reset($data); //内部指针指向数组中的第一个元素

        $sign = ''; //初始化需要签名的字符为空
        $urls = ''; //初始化URL参数为空

        foreach ($data AS $key => $val) { //遍历需要传递的参数
            if ($val == ''||$key == 'sign') continue; //跳过这些不参数签名
            if ($sign != '') { //后面追加&拼接URL
                $sign .= "&";
                $urls .= "&";
            }
            $sign .= "$key=$val"; //拼接为url参数形式
            $urls .= "$key=" . urlencode($val); //拼接为url参数形式并URL编码参数值

        }
        $query = $urls . '&sign=' . md5($sign .$C_codepay_key); //创建订单所需的参数
        //$url = "http://api2.xiuxiu888.com/creat_order/?{$query}"; //支付页面
        $url=gethttp().$D_domain."/pay/codepay/wg.php?{$query}";

        header("Location:{$url}"); //跳转到支付页面
        die();

    }else{
        box("金额需大于0元","back","error");
    }
}

if($action=="cartpay"){
    $paytype=intval($_POST["paytype"]);
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

    $no = date("YmdHis");
    $subject="购物车订单";
    $body = "cart@".$O_ids;
    $notify_url=gethttp().$D_domain."/pay/codepay/callback.php";
    $return_url=gethttp().$D_domain."/pay/codepay/return.php";

    if($money>0){
        $data = array(
            "id" => $C_codepay_id,//你的码支付ID
            "pay_id" => $no.gen_key(10,2), //唯一标识 可以是用户ID,用户名,session_id(),订单ID,ip 付款后返回
            "type" => $paytype,//1支付宝支付 3微信支付 2QQ钱包
            "price" => $money,//金额100元
            "param" => $body,//自定义参数
            "notify_url"=>$notify_url,//通知地址
            "return_url"=>$return_url,//跳转地址
        ); //构造需要传递的参数

        ksort($data); //重新排序$data数组
        reset($data); //内部指针指向数组中的第一个元素

        $sign = ''; //初始化需要签名的字符为空
        $urls = ''; //初始化URL参数为空

        foreach ($data AS $key => $val) { //遍历需要传递的参数
            if ($val == ''||$key == 'sign') continue; //跳过这些不参数签名
            if ($sign != '') { //后面追加&拼接URL
                $sign .= "&";
                $urls .= "&";
            }
            $sign .= "$key=$val"; //拼接为url参数形式
            $urls .= "$key=" . urlencode($val); //拼接为url参数形式并URL编码参数值

        }
        $query = $urls . '&sign=' . md5($sign .$C_codepay_key); //创建订单所需的参数
        //$url = "http://api2.xiuxiu888.com/creat_order/?{$query}"; //支付页面
        $url=gethttp().$D_domain."/pay/codepay/wg.php?{$query}";

        header("Location:{$url}"); //跳转到支付页面
        die();
    }else{
        box("订单金额需大于0元","back","error");
    }
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
        $return_url=gethttp().$D_domain."/pay/codepay/return.php";
    }
    if($row["O_type"]==1){
        $type="news";
        $id=$row["O_nid"];
        $return_url=gethttp().$D_domain."/pay/codepay/return.php";
    }
    if($row["O_type"]==2){
        $type="course";
        $id=$row["O_cid"];
        $return_url=gethttp().$D_domain."/pay/codepay/return.php";
    }

    $num=$row["O_num"];
    $M_id=$row["O_mid"];
    $genkey=$row["O_genkey"];
    $body=$type."|".$id."|".$genkey."||".$num."|".$M_id."|".intval($_SESSION["uid"]);
    $notify_url=gethttp().$D_domain."/pay/codepay/callback.php";

	$data = array(
	    "id" => $C_codepay_id,//你的码支付ID
	    "pay_id" => $genkey.gen_key(10,2), //唯一标识 可以是用户ID,用户名,session_id(),订单ID,ip 付款后返回
	    "type" => $paytype,//1支付宝支付 3微信支付 2QQ钱包
	    "price" => $money,//金额100元
	    "param" => $body,//自定义参数s
	    "notify_url"=>$notify_url,//通知地址
	    "return_url"=>$return_url,//跳转地址
	); //构造需要传递的参数

	ksort($data); //重新排序$data数组
	reset($data); //内部指针指向数组中的第一个元素

	$sign = ''; //初始化需要签名的字符为空
	$urls = ''; //初始化URL参数为空

	foreach ($data AS $key => $val) { //遍历需要传递的参数
	    if ($val == ''||$key == 'sign') continue; //跳过这些不参数签名
	    if ($sign != '') { //后面追加&拼接URL
	        $sign .= "&";
	        $urls .= "&";
	    }
	    $sign .= "$key=$val"; //拼接为url参数形式
	    $urls .= "$key=" . urlencode($val); //拼接为url参数形式并URL编码参数值

	}
	$query = $urls . '&sign=' . md5($sign .$C_codepay_key); //创建订单所需的参数
	//$url = "http://api2.xiuxiu888.com/creat_order/?{$query}"; //支付页面
   $url=gethttp().$D_domain."/pay/codepay/wg.php?{$query}"; //

	header("Location:{$url}"); //跳转到支付页面
	die();
}
?>