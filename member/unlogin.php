<?php
require '../conn/conn.php';
require '../conn/function.php';

$type=$_GET["type"];
$genkey=t($_REQUEST["genkey"]);

if($type=="download"){
	downloadFile("../media/".t($_GET["path"]).".txt");
}

if($type=="msg"){
	if(is_array($_POST["email"])){
        for ($i=0 ;$i<count($_POST["email"]);$i++ ) {
            $email=$email.$_POST["email"][$i]."__";
        }
        $email=substr($email,0,strlen($email)-2);
    }else{
        $email=$_POST["email"];
    }

    $city=$_POST["city"];
    switch($_POST["pay"]){
    	case "alipay":
    	$paytype="支付宝";
    	break;
    	case "wxpay":
    	$paytype="微信支付";
    	break;
    	case "qpay":
    	$paytype="QQ钱包";
    	break;
    	case "dmf":
    	$paytype="当面付";
    	break;
    	case "7pay":
    	$paytype="7支付";
    	break;
    	case "payjs":
    	case "payjs_alipay":
    	$paytype="PAYJS";
    	break;
    	case "money":
    	$paytype="余额支付";
    	break;
    	case "codepay_alipay":
    	case "codepay_wxpay":
    	case "codepay_qpay":
    	$paytype="码支付";
    	break;
    	case "jipay_alipay":
    	case "jipay_wxpay":
    	$paytype="极支付";
    	break;
    	case "hupay_alipay":
    	case "hupay_wxpay":
    	$paytype="虎皮椒";
    	break;
    	case "epay_alipay":
    	case "epay_wxpay":
    	case "epay_qpay":
    	$paytype="易支付";
    	break;
    }
	
	$O=getrs("select * from sl_orders where O_id=".intval($_POST["O_id"]));
	$P=getrs("select * from sl_product where P_id=".intval($O["O_pid"]));
	if($P!=""){
		//判断手机号
		if($P["P_msg"]!=""){
			$msg=explode("|",$P["P_msg"]);
			for($i=0;$i<count($msg);$i++){
				if(strpos(splitx($msg[$i],"__",0),"手机")!==false){
					if(!is_mobile($_POST["email"][$i])){
						die("请填写正确的手机号码！".$_POST["email"][$i]);
					}
				}
			}
		}
		//处理优惠券
		if($config->quan=="true"){
			$Q_id=intval($_POST["quan"]);
			$Q=getrs("select * from sl_quan where Q_id=".$Q_id." and Q_del=0 and Q_money<=".$O["O_price"]*$O["O_num"]." and Q_usetime>now() and ((Q_fid=".$P["P_mid"]." and Q_pid=0) or (Q_pid=".$O["O_pid"]." and Q_fid=".$P["P_mid"]."))");
			if($Q!=""){
				$quan=$Q["Q_minuse"]+($O["O_price"]*$O["O_num"]-$Q["Q_minuse"])*$Q["Q_discount"]/100;
			}else{
				$quan=0;
			}
		}else{
			$quan=0;
		}
	
		//判断是否为实物商品
		if($P["P_ggsell"]=="" || $O["O_gg"]=="标配" || $O["O_gg"]==""){
			$selltype=$P["P_selltype"];
		}else{
			$O_gg=splitx($O["O_gg"],"|",0);
			$gg=splitx(splitx($P["P_gg"],"@",0),"_",1);
			$gg=explode("|",$gg);
			for($z=0;$z<count($gg);$z++){
				if($O_gg==$gg[$z]){
					$selltype=splitx(splitx($P["P_ggsell"],"\n",$z),"|",0);
				}
			}
		}

		//处理邮费
		if($config->postage=="true"){
			if($selltype==2 && $O["O_price"]*$O["O_num"]<$C_baoyou){//实物商品 && 达不到包邮标准
				$postage=$C_postage;
			}else{
				$postage=0;
			}
		}else{
			$postage=0;
		}
	}else{
		$quan=0;
		$postage=0;
	}

	$O_client=t($_POST["O_client"]);
	mysqli_query($conn,"update sl_orders set O_city='$city',O_ip='".getip()."',O_client='$O_client',O_address='$email',O_paytype='$paytype',O_quan=$quan,O_postage=$postage where O_genkey='$genkey' and O_id=".intval($_POST["O_id"]));
	die("success");
}

if($type=="quan"){
	$Q_id=intval($_GET["id"]);
	$Q=getrs("select * from sl_quan where Q_id=".$Q_id." and Q_del=0");
	if($Q==""){
		die("{\"id\":\"$Q_id\",\"discount\":\"0\",\"minuse\":\"0\"}");
	}else{
		die("{\"id\":\"$Q_id\",\"discount\":\"".$Q["Q_discount"]."\",\"minuse\":\"".$Q["Q_minuse"]."\"}");
	}
}

if($type=="check"){
	$L_id=getrs("select * from sl_list where L_genkey='".t($genkey)."' and not L_genkey=''","L_id");
	if($L_id==""){
		die("0");
	}else{
		die("1");
	}
}


if($type=="fahuo"){
	$sql="select * from sl_orders,sl_list where O_genkey=L_genkey and O_state>0 and O_genkey='".t($genkey)."' and not O_genkey=''";
	$result = mysqli_query($conn,$sql);
	$row = mysqli_fetch_assoc($result);
	if (mysqli_num_rows($result) > 0) {
		$P=getrs("select * from sl_product where P_id=".$row["O_pid"]);
			if($P!=""){
			$P_bz=$P["P_bz"];
			if($P_bz!=""){
				$P_bz=$P_bz."\r\n";
			}
			$P_msg=$P["P_msg"];
			if($P_msg!=""){
				$msg=explode("|",$P_msg);
				$add=explode("__",$row["O_address"]);
				for($i=0;$i<count($msg);$i++){
					$O_address=$O_address.splitx($msg[$i],"_",0)."：".$add[$i]." ";
				}
			}else{
				$O_address=str_replace("__"," ",$row["O_address"]);
			}
		}
		echo '<!DOCTYPE html>
		<html>
		<head>
			<meta charset="utf-8"> 
			<meta name="viewport" content="width=device-width, initial-scale=1">
			<title>发货内容</title>
			<link href="../media/'.$C_ico.'" rel="shortcut icon" />
			<link rel="stylesheet" href="css/bootstrap.css">
			<script src="js/jquery.min.js"></script>
			<script src="js/bootstrap.min.js"></script>
			<script src="../js/qrcode.min.js"></script>
			<script src="https://cdn.bootcss.com/html2canvas/0.5.0-beta4/html2canvas.js"></script>
		</head>
		<body style="padding-top:0px">
		<div class="container">
		<a href="../"><img src="../media/'.$C_logo.'" style="height:60px;margin:10px 0"></a>
		<a href="../" class="btn btn-primary pull-right" style="margin-top:20px;">返回首页</a>
			<div class="panel panel-primary">
				<div class="panel-heading">
					<h3 class="panel-title">订单信息</h3>
				</div>
				<div class="panel-body">
				<div class="row">
				<div class="col-md-3">
					<p><img src="'.pic2(splitx($row["O_pic"],"|",0)).'" width="100%"></p>
				</div>
				<div class="col-md-9">
					<p>商品名称：'.$row["O_title"].'</p>
					<p>商品规格：'.str_replace("|"," ",$row["O_gg"]).'</p>
					<p>商品价格：'.$row["O_price"].'元</p>
					<p>购买数量：'.$row["O_num"].'件</p>
					<p>购买时间：'.$row["O_time"].'</p>
					<p>收货信息：'.$O_address.'</p>
					<p>付款方式：'.$row["O_paytype"].'</p>
					<p>订单编号：'.$row["L_no"].'</p>
				</div>
				</div>
					
					
				</div>
			</div>

			<div class="panel panel-primary">
				<div class="panel-heading">
					<h3 class="panel-title">发货内容</h3>
				</div>
				<div class="panel-body">';

				$oc=strtolower($row["O_content"]);
				$oc=explode("||",$oc);
				for($i=0;$i<count($oc);$i++){
					if(splitx($oc[$i],".",1)=="jpg" || splitx($oc[$i],".",1)=="png" || splitx($oc[$i],".",1)=="gif"){
						echo "<p><a href=\"../media/".$oc[$i]."\" target=\"_blank\"><img src=\"../media/".$oc[$i]."\" style=\"max-width:200px;max-height:100px;\"></a> 点击图片放大</p>";
					}
				}

				$x=getrs("select * from sl_product where P_id=".$row["O_pid"]);
				if(strlen($row["O_content"])>10000){
					$file=t($genkey);
					file_put_contents("../media/".$file.".txt",str_replace('||',PHP_EOL,$row["O_content"]));
					echo '<a class="btn btn-info" style="margin-top:10px;" href="?type=download&path='.$file.'">下载文件</a>';
				}else{
					echo '<textarea class="form-control" rows="5" id="content_copy">'.$P_bz.str_replace('||',PHP_EOL,$row["O_content"]).'</textarea> <button class="btn btn-info" style="margin-top:10px;" onclick="copy()">复制</button>';
				}
					
				echo ' <button class="btn btn-success" style="margin-top:10px;" onclick="qr()">生成二维码</button>';
				if(substr($row["O_content"],0,4)=="http"){
					echo " <a href=\"".splitx($row["O_content"]," ",0)."\" class=\"btn btn-primary\" style=\"margin-top:10px;\" target=\"_blank\">打开链接</a>";
				}
				if($x!=""){
					if($x["P_selltype"]==1){
						echo "<div style=\"margin-top:5px\">".getrs("select S_content from sl_csort where S_id=".$x["P_sell"],"S_content")."</div>";
					}
				}
					
				echo '</div>
			</div>
		</div>
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">生成二维码</h4>
            </div>
            <div class="modal-body" style="text-align:center">
            <div id="billImage" style="display:inline-block"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
                <button type="button" class="btn btn-primary" onclick="save()">保存二维码</button>
            </div>
        </div>
    </div>
</div>
		<script>
			function copy(){
				var e=document.getElementById("content_copy");
		        e.select();
		        document.execCommand("Copy");
		       alert("复制成功")
			}
			function qr(){
				qrcode.makeCode(window.location.href);
				$("#myModal").modal("show");
			}
			function save(){
			var copyDom = $("#billImage"); //要保存的dom
			var width = copyDom.offsetWidth; //dom宽
			var height = copyDom.offsetHeight; //dom高
			var scale = 2; //放大倍数

    	html2canvas(
                    copyDom[0],
                    {
                    	dpi: window.devicePixelRatio * 2,
					    scale: scale,
					    width: width,
					    heigth: height,
					    useCORS: true,
                        onrendered: function (canvas) {                         
                            var pageData = canvas.toDataURL("image/png", 1.0);
							console.log(pageData)
							saveFile(pageData.replace("image/png", "image/octet-stream"),new Date().getTime()+".png");
						}
                    })
}

    function convertCanvasToImage(canvas) {
        var image = new Image();
        image.src = canvas.toDataURL("image/png");
        document.body.appendChild(image);
        return image;
    }
    function saveFile(data, filename){
                var save_link = document.createElementNS("http://www.w3.org/1999/xhtml", "a");
                save_link.href = data;
                save_link.download = filename;
 
                var event = document.createEvent("MouseEvents");
                event.initMouseEvent("click", true, false, window, 0, 0, 0, 0, 0, false, false, false, false, 0, null);
                save_link.dispatchEvent(event);
            };

			var qrcode = new QRCode("billImage", {width: 300,height: 300,colorDark: "#000000",colorLight: "#ffffff",correctLevel: QRCode.CorrectLevel.H});
		</script>
		</body>
		</html>';
		die();
	}else{
		die("未获取到发货内容，请联系客服");
	}
}

$sql="select * from sl_orders where O_genkey='$genkey' and not O_genkey=''";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
if (mysqli_num_rows($result) > 0) {
	$O_id=$row["O_id"];
	$O_title=$row["O_title"];
	$O_price=$row["O_price"];
	$O_pic=$row["O_pic"];
	$O_gg=$row["O_gg"];
	$O_ggx=$row["O_gg"];
	$O_num=$row["O_num"];
	$O_type=$row["O_type"];
	$O_pid=$row["O_pid"];
	$O_nid=$row["O_nid"];
	$O_cid=$row["O_cid"];
	$O_content=$row["O_content"];

	if($O_type==0){
		$P=getrs("select * from sl_product where P_id=$O_pid");
		$P_id=$O_pid;
		$P_mid=$P["P_mid"];
	}
	
	if($O_price==0){
		if($O_type==0){
			
			if($P["P_ggsell"]=="" || $O_gg=="标配"){//如果没有设置各项发货
				switch($P["P_selltype"]){
				  	case 0:
				  		$O_content=$P["P_sell"];
				  	break;
				  	case 1:
				  		for($i=0;$i<$O_num;$i++){
							$C_id=getrs("select * from sl_card where C_del=0 and C_use=0 and C_sort=".intval($P["P_sell"]),"C_id");
							$C_content=getrs("select * from sl_card where C_id=".intval($C_id),"C_content");
							if($C_content==""){
								$O_content=$O_content."商品缺货，请联系客服||";
							}else{
								$O_content=$O_content.$C_content."||";
							}
							mysqli_query($conn,"update sl_card set C_use=1 where C_id=".intval($C_id));
						}
						$O_content=substr($O_content,0,strlen($O_content)-2);
				  	break;
				  	case 2:
				  		mysqli_query($conn,"update sl_product set P_rest=P_rest-$O_num where P_id=".$O_pid);
				  		$O_content="实物商品，由商家手动发货";
				  	break;
				}
			}else{
				$O_gg=splitx($O_gg,"|",0);
				$gg=splitx(splitx($P["P_gg"],"@",0),"_",1);
				$gg=explode("|",$gg);
				for($z=0;$z<count($gg);$z++){
					if($O_gg==$gg[$z]){
						switch(splitx(splitx($P["P_ggsell"],"\n",$z),"|",0)){
						  	case 0:
						  		$O_content=splitx(splitx($P["P_ggsell"],"\n",$z),"|",1);
						  	break;
						  	case 1:
						  		for($i=0;$i<$O_num;$i++){
									$C_id=getrs("select * from sl_card where C_del=0 and C_use=0 and C_sort=".intval(splitx(splitx($P["P_ggsell"],"\n",$z),"|",1)),"C_id");
									$C_content=getrs("select * from sl_card where C_id=".intval($C_id),"C_content");
									if($C_content==""){
										$O_content=$O_content."商品缺货，请联系客服||";
									}else{
										$O_content=$O_content.$C_content."||";
									}
									mysqli_query($conn,"update sl_card set C_use=1 where C_id=".intval($C_id));
								}
								$O_content=substr($O_content,0,strlen($O_content)-2);
						  	break;
						  	case 2:
						  		mysqli_query($conn,"update sl_product set P_rest=P_rest-$O_num where P_id=".$O_pid);
						  		$O_content="实物商品，由商家手动发货";
						  	break;
						}
					}
				}
			}

		  	mysqli_query($conn, "update sl_product set P_sold=P_sold+$O_num where P_id=$O_pid");
			mysqli_query($conn, "insert into sl_list(L_mid,L_no,L_title,L_time,L_money,L_genkey) values(1,'".date('YmdHis').rand(10000000,99999999)."','购买商品-".t($O_title)."','".date('Y-m-d H:i:s')."',0,'$genkey')");
			mysqli_query($conn,"update sl_orders set O_content='$O_content',O_state=1,O_address='免费商品，无需邮箱' where O_genkey='$genkey' and not O_genkey=''");
			Header("Location: ?type=fahuo&id=$O_pid&genkey=$genkey");
			die();
		}
		if($O_type==2){
			mysqli_query($conn,"update sl_orders set O_state=1 where O_genkey='$genkey' and not O_genkey=''");
			if($O_content=="all"){
				Header("Location: ../?type=courseinfo&id=$O_cid");
			}else{
				Header("Location: ../?type=courseinfo&id=$O_cid&page=$O_content");
			}
			die();
		}
	}
}else{
	//未生成有效订单，重新生成
	header("location:../buy.php?genkey=$genkey&type=".$_GET["type"]."info&id=".intval($_GET["id"]));
	die();
}

if($O_type==0){
	$id=$O_pid;
}
if($O_type==1){
	$id=$O_nid;
}
if($O_type==2){
	$id=$O_cid;
	if($O_content=="all"){
		$page=1;
	}else{
		$page=$O_content;
	}
}

$address=intval($_GET["address"]);
$A_address=getrs("select * from sl_address where A_id=".$address,"A_address");
$A_name=getrs("select * from sl_address where A_id=".$address,"A_name");
$A_phone=getrs("select * from sl_address where A_id=".$address,"A_phone");

$D_domain=splitx($_SERVER["HTTP_HOST"].$_SERVER["PHP_SELF"],"/member",0);

if(member_auth(intval($_GET["M_id"]),t($_GET["M_pwd"]))){
	$_SESSION["M_login"] = getrs("select * from sl_member where M_id=".intval($_GET["M_id"])." and M_del=0","M_login");
    $_SESSION["M_id"] = intval($_GET["M_id"]);
    $_SESSION["M_pwd"] = t($_GET["M_pwd"]);

    $genkey=gen_key(20);
    mysqli_query($conn,"update sl_member set M_pwdcode='".$genkey."' where M_id=".intval($_GET["M_id"]));
    $_SESSION["M_pwdcode"] = $genkey;
}

if($_SESSION["M_id"]==""){
	$M_id=1;
	$login="<a href=\"../member/login.php\">[登录]</a> <a href=\"../member/reg.php\">[注册]</a>";
}else{
	$M_id=intval($_SESSION["M_id"]);
	$login="<a href=\"../member/\">[会员中心]</a> <a href=\"../member/login.php?action=unlogin\">[退出]</a>";
}

$sql="select * from sl_member where M_id=$M_id";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$M_id=$row["M_id"];
$M_head=$row["M_head"];
$M_login=$row["M_login"];
$M_email=$row["M_email"];
if($M_id==1){
	$M_email="";
}

$M_viptime=$row["M_viptime"];
$M_viplong=$row["M_viplong"];

if($M_viplong-(time()-strtotime($M_viptime))/86400*24*60>0){
	$vip_pic="<img src=\"../member/img/vip.png\" style=\"margin-left:5px;height:17px;\">";
}else{
	$vip_pic="";
}

$M_info="
<img src=\"../media/$M_head\" style=\"width:30px;height:30px;border-radius:10px\">
<div style=\"display:inline-block;vertical-align:top;font-size:12px;margin-left:10px;\"> <b>$M_login</b>$vip_pic<br>$login</div>";

if(isMobile()){
	$port_info="?port_type=wap";
}else{
	$port_info="";
}

if($O_type==0){//商品
	$P=getrs("select * from sl_product where P_id=$O_pid");
	$P_selltype=$P["P_selltype"];
	$P_address=$P["P_address"];
	$P_ggsell=$P["P_ggsell"];
	$P_gg=$P["P_gg"];
	$P_msg=$P["P_msg"];


	if($P_msg!=""){
		$msg=explode("|",$P_msg);
		for($i=0;$i<count($msg);$i++){
			if(splitx($msg[$i],"_",3)==1){
				$re_info="必填";
				$re=" required='required'";
			}else{
				$re_info="选填";
				$re="";
			}


			switch(splitx($msg[$i],"_",2)){
				case "text":
					$msgx=$msgx."<div class=\"form-group\">
							    <label class=\"col-sm-2 control-label\">".splitx($msg[$i],"_",0)."</label>
							    <div class=\"col-sm-10\">
							      <input type=\"text\" class=\"form-control\" name=\"email[]\"  placeholder=\"".splitx($msg[$i],"_",0)."（".$re_info."）\" $re>
							    </div>
							  </div>";
				break;
				case "textarea":
					$msgx=$msgx."<div class=\"form-group\">
							    <label class=\"col-sm-2 control-label\">".splitx($msg[$i],"_",0)."</label>
							    <div class=\"col-sm-10\">
							      <textarea class=\"form-control\" placeholder=\"".splitx($msg[$i],"_",0)."（".$re_info."）\" name=\"email[]\" $re></textarea>
							    </div>
							  </div>";
				break;
				case "radio":
					$con=explode(",",splitx($msg[$i],"_",1));
					for($j=0;$j<count($con);$j++){
						$msgy=$msgy."<label><input type=\"radio\" name=\"email[]\" value=\"".$con[$j]."\"> ".$con[$j]."</label> ";
					}

					$msgx=$msgx."<div class=\"form-group\">
							    <label  class=\"col-sm-2 control-label\">".splitx($msg[$i],"_",0)."</label>
							    <div class=\"col-sm-10\">
							      ".$msgy."
							    </div>
							  </div>";
				break;

				case "checkbox":
					$con=explode(",",splitx($msg[$i],"_",1));
					for($j=0;$j<count($con);$j++){
						$msgy=$msgy."<label><input type=\"checkbox\" name=\"email[]\" value=\"".$con[$j]."\"> ".$con[$j]."</label> ";
					} 

					$msgx=$msgx."<div class=\"form-group\">
							    <label class=\"col-sm-2 control-label\" value=\"".splitx($msg[$i],"_",0)."\">".splitx($msg[$i],"_",0)."</label>
							    <div class=\"col-sm-10\">
							      ".$msgy."
							    </div>
							  </div>";
				break;
				case "select":

				$con=explode(",",splitx($msg[$i],"_",1));
					for($j=0;$j<count($con);$j++){
						$msgy=$msgy."<option value=\"".$con[$j]."\">".$con[$j]."</option>";
					}

					$msgx=$msgx."<div class=\"form-group\">
							    <label class=\"col-sm-2 control-label\">".splitx($msg[$i],"_",0)."</label>
							    <div class=\"col-sm-10\">
							      <select class=\"form-control\" name=\"email[]\">".$msgy."</select>
							    </div>
							  </div>";
				break;
			}
			$msgy="";
		}
	}

	if($P_ggsell==""){
		if($P_selltype==2){
			if(strpos($P_address,"name")!==false){
				$email=$email."<div class=\"form-group\">
							    <label class=\"col-sm-2 control-label\">收件人</label>
							    <div class=\"col-sm-10\"><input class=\"form-control\"  name=\"email[]\" placeholder=\"收件人（必填）\" value=\"$A_name\" required></div></div>";
			}
			if(strpos($P_address,"mobile")!==false){
				$email=$email."<div class=\"form-group\">
							    <label class=\"col-sm-2 control-label\">手机号码</label>
							    <div class=\"col-sm-10\"><input class=\"form-control\"  name=\"email[]\"  placeholder=\"手机号码（必填）\" value=\"$A_phone\" required></div></div>";
			}
			if(strpos($P_address,"address")!==false){
				$email=$email."<div class=\"form-group\">
							    <label class=\"col-sm-2 control-label\">收件地址</label>
							    <div class=\"col-sm-10\"><textarea class=\"form-control\"  placeholder=\"收件地址（必填）\" name=\"email[]\" required>$A_address</textarea></div></div>";
			}

			$email=$email."<div class=\"form-group\">
							    <label class=\"col-sm-2 control-label\">给卖家留言</label>
							    <div class=\"col-sm-10\"><textarea class=\"form-control\" placeholder=\"给卖家留言（选填）\" name=\"email[]\"></textarea></div></div>";
			$info="该商品为实物商品，支付成功后，由商家手动发货";
			if($config->postage=="true"){
				if($O_price*$O_num>$C_baoyou){
					$postage="<div class=\"form-group\">
							    <label class=\"col-sm-2 control-label\">邮费</label>
							    <div class=\"col-sm-10\"><p class=\"form-control-static\">0元（已满".$C_baoyou."元包邮）</p></div></div>";
				}else{
					$postage="<div class=\"form-group\">
							    <label class=\"col-sm-2 control-label\">邮费</label>
							    <div class=\"col-sm-10\"><p class=\"form-control-static\"><span style=\"color:#ff0000;font-weight:bold;\">".$C_postage."元</span>（满".$C_baoyou."元可包邮）</p></div></div>";
				}
			}
		}else{
			if($msgx==""){
				$email="<div class=\"form-group\">
						<label class=\"col-sm-2 control-label\">电子邮箱</label>
						<div class=\"col-sm-10\"><input class=\"form-control\" id=\"email\" name=\"email[]\" value=\"$M_email\" placeholder=\"电子邮箱（选填）\" ></div></div>
						<div class=\"form-group\">
						<label class=\"col-sm-2 control-label\">给卖家留言</label>
						<div class=\"col-sm-10\"><textarea class=\"form-control\" placeholder=\"给卖家留言（选填）\" name=\"email[]\"></textarea></div></div>";
			}else{
				$email=$msgx;
			}
			$info="该商品为虚拟商品，支付成功后，商品将自动发送到您的电子邮箱";
			$postage="";
		}
	}else{
		$O_gg=splitx($O_ggx,"|",0);
		$gg=splitx(splitx($P_gg,"@",0),"_",1);
		$gg=explode("|",$gg);
		for($z=0;$z<count($gg);$z++){
			if($O_gg==$gg[$z]){
				if(splitx(splitx($P_ggsell,"\n",$z),"|",0)==2){
					if(strpos($P_address,"name")!==false){
						$email=$email."<div class=\"form-group\">
									    <label class=\"col-sm-2 control-label\">收件人</label>
									    <div class=\"col-sm-10\"><input class=\"form-control\"  name=\"email[]\" placeholder=\"收件人（必填）\" value=\"$A_name\" required></div></div>";
					}
					if(strpos($P_address,"mobile")!==false){
						$email=$email."<div class=\"form-group\">
									    <label class=\"col-sm-2 control-label\">手机号码</label>
									    <div class=\"col-sm-10\"><input class=\"form-control\"  name=\"email[]\"  placeholder=\"手机号码（必填）\" value=\"$A_phone\" required></div></div>";
					}
					if(strpos($P_address,"address")!==false){
						$email=$email."<div class=\"form-group\">
									    <label class=\"col-sm-2 control-label\">收件地址</label>
									    <div class=\"col-sm-10\"><textarea class=\"form-control\"  placeholder=\"收件地址（必填）\" name=\"email[]\" required>$A_address</textarea></div></div>";
					}

					$email=$email."<div class=\"form-group\">
									    <label class=\"col-sm-2 control-label\">给卖家留言</label>
									    <div class=\"col-sm-10\"><textarea class=\"form-control\" placeholder=\"给卖家留言（选填）\" name=\"email[]\"></textarea></div></div>";
					$info="该商品为实物商品，支付成功后，由商家手动发货";
					if($config->postage=="true"){
						if($O_price*$O_num>$C_baoyou){
							$postage="<div class=\"form-group\">
							    <label class=\"col-sm-2 control-label\">邮费</label>
							    <div class=\"col-sm-10\"><p class=\"form-control-static\">0元（已满".$C_baoyou."元包邮）</p></div></div>";
						}else{
							$postage="<div class=\"form-group\">
							    <label class=\"col-sm-2 control-label\">邮费</label>
							    <div class=\"col-sm-10\"><p class=\"form-control-static\"><span style=\"color:#ff0000;font-weight:bold;\">".$C_postage."元</span>（满".$C_baoyou."元可包邮）</p></div></div>";
						}
					}
				}else{
					if($msgx==""){
						$email="<div class=\"form-group\">
						<label class=\"col-sm-2 control-label\">电子邮箱</label>
						<div class=\"col-sm-10\"><input class=\"form-control\" id=\"email\" name=\"email[]\" value=\"$M_email\" placeholder=\"电子邮箱（选填）\" ></div></div>
						<div class=\"form-group\">
						<label class=\"col-sm-2 control-label\">给卖家留言</label>
						<div class=\"col-sm-10\"><textarea class=\"form-control\" placeholder=\"给卖家留言（选填）\" name=\"email[]\"></textarea></div></div>";
					}else{
						$email=$msgx;
					}
					
					$info="该商品为虚拟商品，支付成功后，商品将自动发送到您的电子邮箱";
					$postage="";
				}
			}
		}
	}
}
if($O_type==1){
	$info="支付成功后，文章页面将自动刷新并显示全部内容，在这之前请不要关闭页面";
	$email="<div class=\"form-group\">
				<label class=\"col-sm-2 control-label\">电子邮箱</label>
				<div class=\"col-sm-10\"><input class=\"form-control\" name=\"email\" id=\"email\" placeholder=\"电子邮箱\" value=\"$M_email\"></div></div>";
}
if($O_type==2){
	$info="支付成功后，自动跳转到课程页面，在这之前请不要关闭页面";
	$email="<div class=\"form-group\">
			<label class=\"col-sm-2 control-label\">电子邮箱</label>
					<div class=\"col-sm-10\"><input class=\"form-control\" name=\"email\" id=\"email\" placeholder=\"电子邮箱\" value=\"$M_email\">
					</div></div>";
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"> 
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>收银台 - <?php echo $C_title?></title>
	<link href="../media/<?php echo $C_ico?>" rel="shortcut icon" />
	<meta name="description" content="<?php echo $C_description?>" />
	<link rel="stylesheet" href="css/bootstrap.css">
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="../js/qrcode.min.js"></script>
	<script src="../js/autoMail.js"></script>
	<script src="https://pv.sohu.com/cityjson?ie=utf-8"></script>
	<style type="text/css">
	a{color: #666666;}
	a:hover{color: #000000;text-decoration:none}
	#mailBox{background:#fff;border:1px solid #ddd;padding:3px 5px 5px;position:absolute;z-index:9999;display:none;-webkit-box-shadow:0px 2px 7px rgba(0, 0, 0, 0.35);-moz-box-shadow:0px 2px 7px rgba(0, 0, 0, 0.35);}
	#mailBox p{width:100%;margin:0;padding:0;height:20px;line-height:20px;clear:both;font-size:12px;color:#ccc;cursor:default;}
	#mailBox ul{padding:0;margin:0;}
	#mailBox li{font-size:15px;height:30px;line-height:30px;color:#939393;font-family:'Tahoma';list-style:none;cursor:pointer;overflow:hidden;}
	#mailBox .cmail{color:#000;background:#e8f4fc;}
	#buy {margin-bottom: 10px;}
	#buy label {
			width: 100%;
			text-align: center;
			padding: 5px 0;
            cursor: pointer;
            border: #CCCCCC solid 2px;
            -moz-border-radius: 3px;
            -webkit-border-radius: 3px;
            border-radius: 3px;
            position: relative;
        }
        #buy label .icon{
        	position: absolute;right: -2px;bottom: 0px;height: 15px;
        }

        #buy .checked {
            border: #ff0000 solid 2px;
            -moz-border-radius: 3px;
            -webkit-border-radius: 3px;
            border-radius: 3px;
            color: #ff0000;
        }

        #buy input[type="radio"] {
            display: none;
        }
	</style>
	<script type="text/javascript">
	function isAlipay(){
        var ua = window.navigator.userAgent.toLowerCase();
        if (ua.match(/Alipay/i) == 'alipay') {
            return true; // 是支付宝端
        } else {
            return false;
        }
    }
    function isWeiXin(){
        var ua = window.navigator.userAgent.toLowerCase();
        if (ua.match(/MicroMessenger/i) == 'micromessenger') {
            return true; // 是微信端
        } else {
            return false;
        }
    }
    <?php if (strpos(strtolower($_SERVER["HTTP_USER_AGENT"]),"micromessenger")!==false && $_REQUEST["jsApiParameters"]!=""){?>
	function jsApiCall(){
		$type="<?php echo $type?>";

		WeixinJSBridge.invoke(
			'getBrandWCPayRequest',
			<?php echo stripslashes(str_replace("__", "\"", $_REQUEST["jsApiParameters"]))?>,
			function(res){
				if(res.err_msg.indexOf(":ok")>-1){
					if($type=="news"){
						window.location.href="../pay/7pay/return.php?type=news&id=<?php echo $id?>&genkey=<?php echo $genkey?>";
					}else{
						window.location.href="?type=fahuo&genkey=<?php echo $genkey?>";
					}
				}else{
					alert(res.err_msg);
				}
			}
		);
	}

	function callpay(){
		if (typeof WeixinJSBridge == "undefined"){
		    if( document.addEventListener ){
		        document.addEventListener('WeixinJSBridgeReady', jsApiCall, false);
		    }else if (document.attachEvent){
		        document.attachEvent('WeixinJSBridgeReady', jsApiCall); 
		        document.attachEvent('onWeixinJSBridgeReady', jsApiCall);
		    }
		}else{
		    jsApiCall();
		}
	}
	callpay();

	<?php }?>
	</script>

</head>
<body style="background: #f7f7f7;padding-top:10px ">
<div class="pop none" id="divpop" style="display:none;" onclick="$('#divpop').hide();">
　　<img src="img/top.png" style='float: right;margin: 10px;max-width: calc(100% - 20px)'>
</div>
<div class="container" style="padding: 20px;background: #ffffff;border-radius: 10px;">
<div style="font-size: 18px"><a href="../"><img src="../media/<?php echo $C_logo?>" style="height: 40px;margin-right: 10px;padding-right: 10px;border-right: solid 1px #DDDDDD;"></a>收银台</div>

<div style="float: right;margin-top: -35px;">
<?php echo $M_info;?>
</div>
</div>

<?php if($_SESSION["M_id"]==""){?>
<div class="container" style="padding: 20px;background: #ffffff;margin-top: 10px;border:solid 1px #0099ff;border-radius: 10px;">
提示：您正在使用免登录购物功能，付款后商品将直接发送到您的邮箱
<a href="login.php" class="btn btn-primary pull-right btn-xs">登录帐号</a>
</div>
<?php }?>

<div class="container" style="padding: 20px;background: #ffffff;margin-top: 10px;position: relative;border-radius: 10px;">
<div style="position: absolute;top: 10px;right: 10px;text-align: center;padding: 10px;background: #ffffff;font-size: 12px;display: none" id="qrcode2">
<div id="qrcode_url"></div>
<div style="margin-top: 5px;">扫码进入手机版</div>
</div>
<form id="pay_form" method="post" class="form-horizontal">
<input type="hidden" name="genkey" value="<?php echo $genkey?>">
<input type="hidden" name="O_id" value="<?php echo $O_id?>">
<input type="hidden" name="O_client" value="">

<div class="form-group">
    <label  class="col-sm-2 control-label">订单名称</label>
    <div class="col-sm-10"><p class="form-control-static"><?php echo $O_title;?></p></div>
</div>
<?php
if($O_type==0){
	echo "<div class=\"form-group\">
    <label  class=\"col-sm-2 control-label\">订单详情</label>
    <div class=\"col-sm-10\"><p class=\"form-control-static\">".str_replace("|"," ",$O_ggx)." ".$O_num."件</p></div></div>";
}
?>
<div class="form-group">
    <label  class="col-sm-2 control-label">订单金额</label>
    <div class="col-sm-10"><span style="font-size: 25px;color: #ff0000"><span id="O_money"><?php echo $O_price*$O_num;?></span>元</span><?php echo $vip_pic?></div>
</div>

<p><?php echo $postage?></p>
<div class="form-group">
    <label  class="col-sm-2 control-label">购买说明</label>
    <div class="col-sm-10"><p class="form-control-static"><span style="font-size: 12px;color: #999999"><?php echo $info?></span></p></div>
</div>

<?php if($config->quan=="true" && $_SESSION["M_id"]!="" && $O_type==0){?>

<div class="form-group">
    <label  class="col-sm-2 control-label">可用优惠</label>
    <div class="col-sm-10"><select class="form-control" name="quan" id="quan" onchange="usequan()">
        	<option value="0">暂无可用优惠</option>
        	<?php
        	//全场优惠
        	$sql="select * from sl_quan where Q_del=0 and Q_mid=".intval($_SESSION["M_id"])." and not Q_mid=0 and ((Q_fid=".$P_mid." and Q_pid=0) or (Q_pid=".$P_id." and Q_fid=".$P_mid.")) and Q_usetime>now()";
			$result = mysqli_query($conn,  $sql);
			if (mysqli_num_rows($result) > 0) {
				while($row = mysqli_fetch_assoc($result)) {
					if($row["Q_discount"]>0){
						$D_info=" 打".((100-$row["Q_discount"])/10)."折";
					}else{
						$D_info="";
					}
					if($row["Q_minuse"]>0){
						$M_info=" 减".$row["Q_minuse"]."元";
					}else{
						$M_info="";
					}
					if($row["Q_money"]<=$O_price*$O_num){
						echo "<option value=\"".$row["Q_id"]."\">[".$row["Q_title"]."] 满".$row["Q_money"]."元".$M_info.$D_info."</option>";
					}else{
						echo "<optgroup label=\"[".$row["Q_title"]."] 满".$row["Q_money"]."元".$M_info.$D_info."【不可用】\"></optgroup>";

					}
				}
			}
        	?>
        </select></div>
</div>
<?php }?>

<div class="form-group">
    <label for="firstname" class="col-sm-2 control-label">支付方式</label>
    <div class="col-sm-10">
    	<div id="buy">
		<div class="row">
		<?php if ($C_alipayon==1){?><div class="col-xs-6 col-md-2"><label aa="pay" type="支付宝商户"><input type="radio" value="alipay" name="pay"> <img src="img/alipay.png" height="25" alt="支付宝商户"></label></div> <?php }?>
		<?php if ($C_dmfon==1){?><div class="col-xs-6 col-md-2"><label aa="pay"><input type="radio" value="dmf" name="pay"> <img src="img/alipay.png" height="25" alt="当面付"></label></div> <?php }?>
		<?php if ($C_7payon==1){?><div class="col-xs-6 col-md-2"><label aa="pay"><input type="radio" value="7pay" name="pay"> <img src="img/alipay.png" height="25" alt="7支付"></label></div> <?php }?>
		<?php if (strpos($C_payjs_type,"alipay")!==false){?><div class="col-xs-6 col-md-2"><label aa="pay"><input type="radio" value="payjs_alipay" name="pay"> <img src="img/alipay.png" height="25" alt="PAYJS"></label></div> <?php }?>
		<?php if (strpos($C_codepay_type,"alipay")!==false){?><div class="col-xs-6 col-md-2"><label aa="pay"><input type="radio" value="codepay_alipay" name="pay"> <img src="img/alipay.png" height="25" alt="码支付"></label></div> <?php }?>

		<?php if (strpos($C_jipay_type,"alipay")!==false){?><div class="col-xs-6 col-md-2"><label aa="pay"><input type="radio" value="jipay_alipay" name="pay"> <img src="img/alipay.png" height="25" alt="极支付"></label></div> <?php }?>

		<!--<?php if (strpos($C_hupay_type,"alipay")!==false){?><div class="col-xs-6 col-md-2"><label aa="pay"><input type="radio" value="hupay_alipay" name="pay"> <img src="img/alipay.png" height="25" alt="虎皮椒"></label></div> <?php }?>-->

		<?php if (strpos($C_epay_type,"alipay")!==false && $config->epay=="true"){?><div class="col-xs-6 col-md-2"><label aa="pay"><input type="radio" value="epay_alipay" name="pay"> <img src="img/alipay.png" height="25" alt="易支付"></label></div> <?php }?>

		<?php if ($C_wxpayon==1){?><div class="col-xs-6 col-md-2"><label aa="pay"><input type="radio" value="wxpay" name="pay"> <img src="img/weixin.png" height="25"></label></div> <?php }?>

		<?php if(strpos($C_payjs_type,"wxpay")!==false){?><div class="col-xs-6 col-md-2"><label aa="pay"><input type="radio" value="payjs" name="pay"> <img src="img/weixin.png" height="25"></label></div> <?php }?>
		<?php if(strpos($C_codepay_type,"wxpay")!==false){?><div class="col-xs-6 col-md-2"><label aa="pay"><input type="radio" value="codepay_wxpay" name="pay"> <img src="img/weixin.png" height="25"</label></div> <?php }?>
		<?php if(strpos($C_jipay_type,"wxpay")!==false){?><div class="col-xs-6 col-md-2"><label aa="pay"><input type="radio" value="jipay_wxpay" name="pay"> <img src="img/weixin.png" height="25"</label></div> <?php }?>
		<?php if(strpos($C_hupay_type,"wxpay")!==false){?><div class="col-xs-6 col-md-2"><label aa="pay"><input type="radio" value="hupay_wxpay" name="pay"> <img src="img/weixin.png" height="25"</label></div> <?php }?>
		<?php if(strpos($C_epay_type,"wxpay")!==false && $config->epay=="true"){?><div class="col-xs-6 col-md-2"><label aa="pay"><input type="radio" value="epay_wxpay" name="pay"> <img src="img/weixin.png" height="25"</label></div> <?php }?>

		<?php if ($C_qpayon==1){?><div class="col-xs-6 col-md-2"><label aa="pay"><input type="radio" value="qpay" name="pay"> <img src="img/qqpay.png" height="25"></label></div> <?php }?>
		<?php if(strpos($C_codepay_type,"qqpay")!==false){?><div class="col-xs-6 col-md-2"><label aa="pay"><input type="radio" value="codepay_qpay" name="pay"> <img src="img/qqpay.png" height="25"></label></div> <?php }?>
		<?php if(strpos($C_epay_type,"qqpay")!==false && $config->epay=="true"){?><div class="col-xs-6 col-md-2"><label aa="pay"><input type="radio" value="epay_qpay" name="pay"> <img src="img/qqpay.png" height="25"></label></div> <?php }?>

		<?php if ($M_id>1){?><div class="col-xs-6 col-md-2"><label aa="pay"><input type="radio" value="money" name="pay"> <img src="img/money.png" height="25"></label></div> <?php }?>
		</div>
    </div>
</div>

</div>

<div><?php echo $email?></div>
<input type="hidden" value="" name="city">
<div class="form-group">
    <label class="col-sm-2 control-label"></label>
    <div class="col-sm-10">
    	<button class="btn btn-danger btn-lg hidden-xs" type="button" onclick="payx()" id="money_btn">立即支付</button>
    	<button class="btn btn-danger btn-lg btn-block visible-xs" type="button" onclick="payx()" id="money_btn">立即支付</button>
    </div>
</div>

</form>
</div>
<!-- 模态框（Modal） -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
					&times;
				</button>
				<h4 class="modal-title" id="myModalLabel">
					扫码支付
				</h4>
			</div>
			<div class="modal-body" style="text-align: center;" id="modal_body">
				<img src="img/alipay.png" style="margin-bottom: 20px;" id="pay_img"><br>
				<div id="billImage" style="width: 200px;display: inline-block;margin-bottom: 10px"></div>
				<div id="pay_info">请使用支付宝扫码支付</div>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
function payx(){
	if($("#pay_form [placeholder='收件人（必填）']").val()=="" || $("#pay_form [placeholder='手机号码（必填）']").val()=="" || $("#pay_form [placeholder='收件地址（必填）']").val()==""){
		alert("请填全收货信息！");
	}else{
		$.ajax({
        type: "post",
        url: "?type=msg",
        data: $("#pay_form").serialize(),
        success: function(data) {
        	if(data=="success"){
	        	switch($('input[name="pay"]:checked').val()){
					case "alipay"://选择支付宝
						if(isWeiXin()){//如果是在微信浏览器内
							$("#divpop").show();
							return false;
						}else{
							$("#pay_form").attr("action","../pay/alipay/alipayapi.php");
							$("#pay_form").submit();
						}
					break;
					case "wxpay":
						if(isWeiXin()){
							window.location.href="https://open.weixin.qq.com/connect/oauth2/authorize?appid=<?php echo $C_wx_appid?>&redirect_uri="+encodeURIComponent("http://<?php echo $D_domain?>/pay/wxpay/jsapi.php?O_id=<?php echo $O_id?>&genkey=<?php echo $genkey?>")+"&response_type=code&scope=snsapi_base&state=123&connect_redirect=1#wechat_redirect";
						}else{
							$.ajax({
						        type: "post",
						        url: "../pay/wxpay/native.php",
						        data: $("#pay_form").serialize(),
						        success: function(data) {
									if(data.indexOf("weixin://") != -1){
										$('#myModal').modal('show')
										$("#pay_img").attr("src","img/weixin.png");
										$("#pay_info").html("请使用微信扫码支付");
							            qrcode.makeCode(data);
									}else{
										if(data.indexOf("https://") != -1){
											$('#myModal').modal('show')
											$("#pay_img").attr("src","img/weixin.png");
											$("#pay_info").html("<a href='"+data+"' target='_blank' class='btn btn-success'>使用微信APP支付</a>");
							            	qrcode.makeCode(data);
										}else{
											alert(data);
										}
									}
						        }
						    })
						}
						
					break;
					case "qpay":
						$.ajax({
					        type: "post",
					        url: "../pay/qpay/native.php",
					        data: $("#pay_form").serialize(),
					        success: function(data) {
					        	console.log(data);
								if(data.indexOf("https://") != -1){
									if(IsPC()){
										$('#myModal').modal('show');
										$("#pay_img").attr("src","img/qqpay.png");
										$("#pay_info").html("请使用手机QQ扫码支付");
							            qrcode.makeCode(data);
									}else{
										$('#myModal').modal('show');
										$("#pay_img").attr("src","img/qqpay.png");
										$("#pay_info").html("<a href='"+data+"' target='_blank' class='btn btn-info'>使用手机QQ支付</a>");
							            qrcode.makeCode(data);
									}
								}else{
									alert(data);
								}
					        }
					    })
					break;
					case "dmf":
						$.ajax({
					        type: "post",
					        url: "../pay/dmf/api.php",
					        data: $("#pay_form").serialize(),
					        success: function(data) {
								if(data.indexOf("https://") != -1){
									if(IsPC()){
										$('#myModal').modal('show');
										$("#pay_img").attr("src","img/alipay.png");
										$("#pay_info").html("请使用支付宝扫码支付");
							            qrcode.makeCode(data);
									}else{
										$('#myModal').modal('show');
										$("#pay_img").attr("src","img/alipay.png");
										$("#pay_info").html("<a href='"+data+"' target='_blank' class='btn btn-info'>使用支付宝APP支付</a>");
							            qrcode.makeCode(data);
									}
								}else{
									alert("支付出错：请检查以下原因：（1）应用appid和支付宝公钥/应用私钥是否填写正确（2）是否开通了当面付这个产品（3）有无在应用里添加当面付这个产品（4）应用是否是已上线状态（5）PHP版本需5.5或以上");
								}
					        }
					    })
					break;
					case "7pay":
						$("#pay_form").attr("action","../pay/7pay/api.php?action=unlogin");
						$("#pay_form").submit();
					break;
					case "payjs":
						if(isWeiXin()){
							window.location.href="https://payjs.cn/api/openid?mchid<?php echo $C_payjs_id?>&callback_url="+encodeURIComponent("http://<?php echo $D_domain?>/pay/payjs/jsapi.php?genkey=<?php echo $genkey?>&O_id=<?php echo $O_id?>");
						}else{
							$.ajax({
						        type: "post",
						        url: "../pay/payjs/native.php",
						        data: $("#pay_form").serialize(),
						        success: function(data) {
									$('#myModal').modal('show');
									$("#pay_img").attr("src","img/weixin.png");
									$("#pay_info").html("请使用微信扫码支付");
						            qrcode.makeCode(data);
						        }
						    })
						}
					break;
					case "payjs_alipay":
					$.ajax({
						        type: "post",
						        url: "../pay/payjs/native.php?t=alipay",
						        data: $("#pay_form").serialize(),
						        success: function(data) {
									$('#myModal').modal('show');
									$("#pay_img").attr("src","img/alipay.png");
									$("#pay_info").html("请使用支付宝扫码支付");
						            qrcode.makeCode(data);
						        }
						    })
					break;
					case "jipay_alipay":
						$("#pay_form").attr("action","../pay/jipay/api.php?action=unlogin&paytype=2");
						$("#pay_form").submit();
					break;
					case "jipay_wxpay":
						$("#pay_form").attr("action","../pay/jipay/api.php?action=unlogin&paytype=1");
						$("#pay_form").submit();
					break;
					case "hupay_alipay":
						$("#pay_form").attr("action","../pay/hupay/api.php?action=unlogin&paytype=2");
						$("#pay_form").submit();
					break;
					case "hupay_wxpay":
						$("#pay_form").attr("action","../pay/hupay/api.php?action=unlogin&paytype=1");
						$("#pay_form").submit();
					break;
					case "codepay_alipay":
						$("#pay_form").attr("action","../pay/codepay/api.php?action=unlogin&paytype=1");
						$("#pay_form").submit();
					break;
					case "codepay_wxpay":
						$("#pay_form").attr("action","../pay/codepay/api.php?action=unlogin&paytype=3");
						$("#pay_form").submit();
					break;
					case "codepay_qpay":
						$("#pay_form").attr("action","../pay/codepay/api.php?action=unlogin&paytype=2");
						$("#pay_form").submit();
					break;
					case "epay_alipay":
						$("#pay_form").attr("action","../pay/epay/api.php?action=unlogin&paytype=alipay");
						$("#pay_form").submit();
					break;
					case "epay_wxpay":
						$("#pay_form").attr("action","../pay/epay/api.php?action=unlogin&paytype=wxpay");
						$("#pay_form").submit();
					break;
					case "epay_qpay":
						$("#pay_form").attr("action","../pay/epay/api.php?action=unlogin&paytype=qqpay");
						$("#pay_form").submit();
					break;
					case "money":
						$("#money_btn").html("请稍候...");
						$("#money_btn").attr("disabled",true);
						$("#pay_form").attr("action","../pay/money/api.php?action=unlogin");
						$("#pay_form").submit();
					break;
				}
        	}else{
        		alert(data);
        	}
        }
    })
	}
}

function check(){
	$type="<?php echo $O_type?>";
	$.post("?type=check",
    {
      genkey:"<?php echo $genkey?>",
    },
  function(data){
  if(data==1){
  	if($type=="0"){
  		window.location.href="?type=fahuo&genkey=<?php echo $genkey?>&id=<?php echo $id?>";
  	}
  	if($type=="1"){
  		window.location.href="../pay/7pay/return.php?type=news&id=<?php echo $id?>&genkey=<?php echo $genkey?>";
  	}
  	if($type=="2"){
  		window.location.href="../?type=courseinfo&id=<?php echo $id?>&page=<?php echo $page?>";
  	}
  }
    });
}

function IsPC() {
    var userAgentInfo = navigator.userAgent;
    var Agents = ["Android", "iPhone",
                "SymbianOS", "Windows Phone",
                "iPad", "iPod"];
    var flag = true;
    for (var v = 0; v < Agents.length; v++) {
        if (userAgentInfo.indexOf(Agents[v]) > 0) {
            flag = false;
            break;
        }
    }
    return flag;
}

function usequan(){
	var money=<?php echo $O_price*$O_num?>;
	$.ajax({
    	url:'?type=quan&id='+$("#quan").val(),
    	success:function (data) {
    		data = JSON.parse(data);
    		$("#O_money").html((money-data.minuse)*(100-data.discount)/100);
    	}
    });
}

if(IsPC()){
	$("[name='O_client']").val("电脑端");
	$("#qrcode2").show();
	var qrcode2 = new QRCode('qrcode_url', {width: 100,height: 100,colorDark: '#000000',colorLight: '#ffffff',correctLevel: QRCode.CorrectLevel.H});
	qrcode2.makeCode(window.location.href);
}else{
	$("[name='O_client']").val("H5手机端");
}

$("#codepaytype").find("input:first").attr("checked","checked");
$("#myTab").find("li:first").attr("class","active");
$("#myTabContent").find("div:first").attr("class","tab-pane fade in active");
var qrcode = new QRCode('billImage', {width: 200,height: 200,colorDark: '#000000',colorLight: '#ffffff',correctLevel: QRCode.CorrectLevel.H});
setInterval("check()",3000);
$(document).ready(function(){
	$('#email').autoMail({
		emails:['qq.com','163.com','126.com','sina.com','sohu.com','yahoo.cn','gmail.com','hotmail.com','live.cn']
	});
});
$(function() { $('#buy label').click(function(){var aa = $(this).attr('aa');$('[aa="'+aa+'"]').removeAttr('class') ;$(this).attr('class','checked');});});
$("#buy").find("input:first").attr("checked","checked");
$("#buy").find("label:first").addClass("checked");
$("[name='city']").val(returnCitySN['cname']);
</script>

<script src="https://res.wx.qq.com/open/js/jweixin-1.2.0.js"></script>
<script src="../conn/f.php?action=wxjs&type=&id="></script>
</body>
</html>