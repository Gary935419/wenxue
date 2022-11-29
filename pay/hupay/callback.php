<?php
require_once("../../conn/conn.php");
require_once("../../conn/function.php");

$D_domain=splitx($_SERVER["HTTP_HOST"].$_SERVER["PHP_SELF"],"/pay",0);

$trade_order_id=$_POST["trade_order_id"];
$total_fee=$_POST["total_fee"];
$transaction_id=$_POST["transaction_id"];
$open_order_id=$_POST["open_order_id"];
$order_title=$_POST["order_title"];
$status=$_POST["status"];
$plugins=$_POST["plugins"];
$appid=$_POST["appid"];
$time=$_POST["time"];
$nonce_str=$_POST["nonce_str"];
$hash=$_POST["hash"];

$data = array(
        "trade_order_id" => $trade_order_id,
        "total_fee" => $total_fee,
        "transaction_id" => $transaction_id,
        "open_order_id" => $open_order_id,
        "order_title" => $order_title,
        "status" => $status,
        "plugins" => $plugins,
        "appid" => $appid,
        "time" => $time,
        "nonce_str" => $nonce_str
    );

$_sign=generate_xh_hash($data,$C_hupay_key);

//file_put_contents($trade_order_id."1.txt",$hash."|".$_sign);

if($hash==$_sign && $hash!=""){
    if(substr_count($plugins,"|")==6){
        $body = explode("|",$plugins);
        $type = $body[0];
        $id = intval($body[1]);
        $genkey = $body[2];
        $email = $body[3];
        $num = intval($body[4]);
        $M_id = intval($body[5]);
        $_SESSION["uid"]=intval($body[6]);
        notify($open_order_id,$type,$id,$genkey,$email,$num,$M_id,$total_fee,$D_domain,"虎皮椒");
        die("success");
    }else{
        $M_id=intval(splitx($plugins,"|",0));
        $L_genkey=splitx($plugins,"|",1);
        $sql="Select * from sl_list where L_no='".t($open_order_id)."'";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        if (mysqli_num_rows($result) <= 0) {
            mysqli_query($conn,"update sl_member set M_money=M_money+".$total_fee." where M_id=".intval($M_id));
            mysqli_query($conn, "insert into sl_list(L_mid,L_no,L_title,L_time,L_money,L_genkey) values($M_id,'$open_order_id','帐号充值','".date('Y-m-d H:i:s')."',".$total_fee.",'$L_genkey')");
            //sendmail("有用户通过微信充值","用户ID：".$M_id."<br>充值金额：".($total_fee/100)."元<br>交易单号：".$transaction_id,$C_email);
        }
    }
}else{
	die("error");
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