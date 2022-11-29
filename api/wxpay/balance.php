<?php
require_once("../../conn/conn.php");
require_once("../../conn/function.php");

$action=$_GET["action"];
$id=intval($_GET["id"]);
$uid=intval($_GET["uid"]);
$path=splitx($_SERVER["PHP_SELF"],"api",0);
$D_domain=splitx($_SERVER["HTTP_HOST"].$_SERVER["PHP_SELF"],"/api",0);
$M_id=intval($_GET["M_id"]);
$M_pwd=t($_GET["M_pwd"]);

switch($action){
	case "balance":
		$attach=t($_POST["attach"]);
		$a=explode("|",$attach);
		$type=$a[0];
		$id=$a[1];
		$genkey=$a[2];
		$email=$a[3];
		$num=$a[4];
		$M_id=intval($a[5]);
		$uid=intval($a[6]);

		if($M_id==0){
			$M_id=1;
		}
		if($num<1){
	        $num=1;
	    }

	    $attach="$type|$id|$genkey|$email|$num|$M_id|$uid";

		$sql="Select * from sl_member where M_id=".intval($M_id);
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        $M_id=$row["M_id"];
        $M_email=$row["M_email"];
        $M_money=$row["M_money"];
        $M_viptime=$row["M_viptime"];
        $M_viplong=$row["M_viplong"];

        if($M_viplong-(time()-strtotime($M_viptime))/86400>0){
            $M_vip=1;
            if($M_viplong>30000){
                $N_discount=$C_n_discount2/10;
                $P_discount=$C_p_discount2/10;
            }else{
                $N_discount=$C_n_discount/10;
                $P_discount=$C_p_discount/10;
            }
        }else{
            $M_vip=0;
            $N_discount=1;
            $P_discount=1;
        }

        if($type=="news"){
            $sql="select * from sl_news where N_id=".$id;
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_assoc($result);
            $body=mb_substr($row["N_title"],0,10,"utf-8")."...-付费阅读";
            $total_fee=p($row["N_price"]*$N_discount)*100;
            $N_title=$row["N_title"];
            $N_pic=$row["N_pic"];
            $N_mid=$row["N_mid"];
        }
        if($type=="product"){
            $sql="select * from sl_product where P_id=".$id;
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_assoc($result);
            $body=mb_substr($row["P_title"],0,10,"utf-8")."...-购买";
            $P_title=$row["P_title"];
            $P_pic=splitx($row["P_pic"],"|",0);
            $P_mid=$row["P_mid"];
            if($row["P_vip"]==1){
                $total_fee=p($row["P_price"]*$P_discount)*$num*100;
            }else{
                $total_fee=p($row["P_price"])*$num*100;
            }
        }
        if($total_fee>0){
            if(getrs("select O_id from sl_orders where O_genkey='$genkey'","O_id")==""){
                if($type=="news"){
                    mysqli_query($conn, "insert into sl_orders(O_nid,O_mid,O_time,O_type,O_price,O_num,O_title,O_pic,O_state,O_address,O_content,O_genkey,O_sellmid,O_client) values($id,$M_id,'".date('Y-m-d H:i:s')."',1,".($total_fee/100).",1,'$N_title','$N_pic',0,'$email','$genkey','$genkey',$N_mid,'小程序')");
                }
                if($type=="product"){
                	mysqli_query($conn, "insert into sl_orders(O_pid,O_mid,O_time,O_type,O_price,O_num,O_content,O_title,O_pic,O_address,O_state,O_genkey,O_sellmid,O_client) values($id,$M_id,'".date('Y-m-d H:i:s')."',0,".($total_fee/100/$num).",$num,'','$P_title','$P_pic','$email',0,'$genkey',$P_mid,'小程序')");
                }
            }else{
            	mysqli_query($conn, "update sl_orders set O_address='$email',O_paytype='微信小程序' where O_genkey='$genkey'");
            }

		    $no = date("YmdHis").gen_key(10);
		    $money=$total_fee/100;
		    if($M_money-$money>=0){
		        if(notify($no,$type,$id,$genkey,$email,$num,$M_id,$money,$D_domain,"余额支付")){
		            $api="{\"msg\":\"success\",\"code\":\"success\"}";
		        }
		    }else{
		        $api="{\"msg\":\"error\",\"code\":\"error\"}";
		    }
        }

	break;
}
die(trim($api,"\xEF\xBB\xBF"));
?>