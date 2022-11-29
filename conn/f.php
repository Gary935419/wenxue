<?php
require '../conn/conn.php';
require '../conn/function.php';

$D_domain=splitx($_SERVER["HTTP_HOST"].$_SERVER["PHP_SELF"],"/conn",0);

switch ($_GET["action"]) {
	case "video":
	$id=intval($_GET["id"]);
	$page=intval($_GET["page"]);
	if($page==0){
	  $page=1;
	}

	die(json_encode(C_video($id,$page)));
	
	break;
	case "getquan":
	$id=intval($_GET["Q_id"]);
	if($_SESSION["M_id"]==""){
		die("{\"code\":\"error\",\"msg\":\"请先登录会员帐号！\"}");
	}else{
		$Q=getrs("select * from sl_quan where Q_id=".$id);
		$Q_id=getrs("select * from sl_quan where Q_title='".$Q["Q_title"]."' and Q_del=0 and Q_mid=0 and Q_gettime>now()","Q_id");
		if($Q_id!=""){
			if(getrs("select * from sl_quan where Q_mid=".intval($_SESSION["M_id"])." and Q_title='".$Q["Q_title"]."'","Q_id")==""){
				mysqli_query($conn,"update sl_quan set Q_mid=".intval($_SESSION["M_id"])." where Q_id=".$Q_id);
				die("{\"code\":\"success\",\"msg\":\"领取成功！\"}");
			}else{
				die("{\"code\":\"error\",\"msg\":\"您已领取过该优惠券！\"}");
			}
		}else{
			die("{\"code\":\"error\",\"msg\":\"优惠券数量不足！\"}");
		}
	}
	break;

	case "checknewsbuy":
		$id=intval($_GET["id"]);
		$genkey=t($_POST["genkey"]);
		$O_id=getrs("select * from sl_orders where O_content='".$genkey."' and O_nid=".$id,"O_id");
		if($O_id==""){
			die("{\"code\":\"error\"}");
		}else{
			$arr = array();
			$arr["code"]="success";
			$N_content=getrs("select N_content from sl_news where N_id=".$id,"N_content");
			$arr["msg"]=str_replace("[fh_free]","",$N_content);
			die(json_encode($arr));
		}
	break;

	case "getp":
	$id=intval($_GET["id"]);
	$code=t($_POST["P_code"]);
	if($_SESSION["M_id"]==""){
		$M_id=1;
	}else{
		$M_id=intval($_SESSION["M_id"]);
	}
	$num=intval($_POST["no"]);
	$genkey=t($_POST["genkey"]);

	$P=getrs("select * from sl_product where P_id=$id and P_code='$code' and not P_code=''");
	if($P==""){
		die("兑换码错误，请重新检查！");
	}else{
		$sql="select * from sl_product where P_id=".$id;
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        $subject=mb_substr($row["P_title"],0,10,"utf-8")."...-购买";
        $P_title=t($row["P_title"]);
        $P_pic=splitx($row["P_pic"],"|",0);
        $P_mid=$row["P_mid"];
        $P_gg=$row["P_gg"];
        $P_ggsell=$row["P_ggsell"];
        $P_rest=$row["P_rest"];
        $P_price=$row["P_price"];
        $P_sell=$row["P_sell"];
        $P_selltype=$row["P_selltype"];
        $P_viponly=$row["P_viponly"];

	    $sp=0;
	    $sq=1;
		foreach ($_POST as $x=>$value) {
			if(splitx($x,"_",0)=="scvvvvv"){
				$sc=$sc.splitx(splitx(splitx($P_gg,"@",splitx($x,"_",1)),"_",1),"|",$_POST[$x])."|";
				if(substr(splitx(splitx(splitx($P_gg,"@",splitx($x,"_",1)),"_",2),"|",$_POST[$x]),0,1)=="*"){
					$sq=$sq*substr(splitx(splitx(splitx($P_gg,"@",splitx($x,"_",1)),"_",2),"|",$_POST[$x]),1);
				}else{
					$sp=$sp+splitx(splitx(splitx($P_gg,"@",splitx($x,"_",1)),"_",2),"|",$_POST[$x]);
				}
			}
		}
		$sc=substr($sc,0,strlen($sc)-1);
		if($sc==""){
			$sc="标配";
		}

		$price=($P_price+$sp)*$sq;

        if($row["P_vip"]==1){
            $money=p($price*$P_discount);
        }else{
            $money=p($price);
        }

        if($P_ggsell!=""){
        	$O_gg=splitx($sc,"|",0);
			$gg=splitx(splitx($P_gg,"@",0),"_",1);
			$gg=explode("|",$gg);
			for($z=0;$z<count($gg);$z++){
				if($O_gg==$gg[$z]){
					switch(splitx(splitx($P_ggsell,"\n",$z),"|",0)){
					  	case 0:
					  		$gg_rest=999999999;
					  	break;
					  	case 1:
					  		$gg_rest=getrs("select count(C_id) as C_count from sl_card where C_sort=".intval(splitx(splitx($P_ggsell,"\n",$z),"|",1))." and C_use=0 and C_del=0","C_count");
					  	break;
					  	case 2:
					  		$gg_rest=$P_rest;
					  	break;
					}
				}
			}
    	}else{
		    switch ($P_selltype) {
				case 0:
				$gg_rest=999999999;
				break;
				case 1:
				$gg_rest=getrs("select count(C_id) as C_count from sl_card where C_sort=".intval($P_sell)." and C_use=0 and C_del=0","C_count");
				break;
				case 2:
				$gg_rest=$P_rest;
				break;
			}
    	}
    	if($gg_rest>0){
    		if(getrs("select O_id from sl_orders where O_genkey='$genkey'","O_id")==""){//判断订单是否已存在
    			mysqli_query($conn, "insert into sl_orders(O_pid,O_mid,O_time,O_type,O_price,O_num,O_content,O_title,O_pic,O_address,O_state,O_genkey,O_sellmid,O_gg,O_paytype) values($id,$M_id,'".date('Y-m-d H:i:s')."',0,0,$num,'','$P_title','$P_pic','',0,'$genkey',$P_mid,'$sc','免费兑换')");
    		}else{
    			mysqli_query($conn, "update sl_orders set O_pid=$id,O_mid=$M_id,O_price=$money,O_num=$num,O_title='$P_title',O_pic='$P_pic',O_state=0,O_sellmid=$P_mid,O_gg='$sc' where O_genkey='$genkey'");
    		}
			die("success");
    	}else{
    		die("库存不足，请联系客服补货！");
    	}
	}
	break;

	case "collection":
	?>
function c(){
if(document.getElementById("collection_product")){
		$.ajax({
	    url: "conn/f.php?action=check_collection&type=product&id="+$("#collection_product").attr("pid"),
	    type: 'get',
	    success:function(res){
		    if(res=="true"){
		    	$("#collection_product").html("<a href='javascript:collect(\"product\","+$("#collection_product").attr("pid")+");'><span style='color: #ff9900;'>★</span> 已加入收藏</a>");
			}else{
				$("#collection_product").html("<a href='javascript:collect(\"product\","+$("#collection_product").attr("pid")+");'><span style='color: #ff9900;'>☆</span> 加入收藏</a> <span id='clogin'></span>");
			}	
		}
	  });
	}
	if(document.getElementById("collection_news")){
		$.ajax({
	    url: "conn/f.php?action=check_collection&type=news&id="+$("#collection_news").attr("nid"),
	    type: 'get',
	    success:function(res){
		    if(res=="true"){
		    	$("#collection_news").html("<a href='javascript:collect(\"news\","+$("#collection_news").attr("nid")+");'><span style='color: #ff9900;'>★</span> 已加入收藏</a>");
			}else{
				$("#collection_news").html("<a href='javascript:collect(\"news\","+$("#collection_news").attr("nid")+");'><span style='color: #ff9900;'>☆</span> 加入收藏</a> <span id='clogin'></span>");
			}	
		}
	  });
	}
	if(document.getElementById("collection_course")){
		$.ajax({
	    url: "conn/f.php?action=check_collection&type=course&id="+$("#collection_course").attr("cid"),
	    type: 'get',
	    success:function(res){
		    if(res=="true"){
		    	$("#collection_course").html("<a href='javascript:collect(\"course\","+$("#collection_course").attr("cid")+");'><span style='color: #ff9900;'>★</span> 已加入收藏</a>");
			}else{
				$("#collection_course").html("<a href='javascript:collect(\"course\","+$("#collection_course").attr("cid")+");'><span style='color: #ff9900;'>☆</span> 加入收藏</a> <span id='clogin'></span>");
			}	
		}
	  });
	}
	if(document.getElementById("collection_shop")){
		$.ajax({
	    url: "conn/f.php?action=check_collection&type=shop&id="+$("#collection_shop").attr("mid"),
	    type: 'get',
	    success:function(res){
		    if(res=="true"){
		    	$("#collection_shop").html("<a href='javascript:collect(\"shop\","+$("#collection_shop").attr("mid")+");'><span style='color: #ff9900;'>★</span> 已收藏店铺</a>");
			}else{
				$("#collection_shop").html("<a href='javascript:collect(\"shop\","+$("#collection_shop").attr("mid")+");'><span style='color: #ff9900;'>☆</span> 收藏店铺</a> <span id='clogin'></span>");
			}
		}
	  });
	}
}

	function collect(type,id){
		$.ajax({
	    url: "conn/f.php?action=collect&type="+type+"&id="+id,
	    type: 'get',
	    success:function(res){
		    data=JSON.parse(res);
		    if(data.code=="error"){
		    	alert(data.msg);
		    	if(data.msg=="请登录会员后操作"){
		    		$("#clogin").html("<a href='member/login.php?from="+encodeURIComponent(window.location.href)+"'>[登录]</a>");
		    	}
			}else{
				c();
			}
		}
	  });
	}
setTimeout(c,1000);
	<?php
	break;
	case "collect":
	$type=$_GET["type"];
	$id=intval($_GET["id"]);
	switch($type){
		case "product":
			$C_type=0;
		break;
		case "news":
			$C_type=1;
		break;

		case "shop":
			$C_type=2;
			if($id==0){
				die("{\"code\":\"error\",\"msg\":\"官方自营店不支持收藏\"}");
			}
		break;
		case "course":
			$C_type=3;
		break;
	}
	if(intval($_SESSION["M_id"])==0){
		die("{\"code\":\"error\",\"msg\":\"请登录会员后操作\"}");
	}else{
		if(getrs("select * from sl_colletion where C_type=$C_type and C_mid=".intval($_SESSION["M_id"])." and C_cid=$id","C_id")!=""){
			mysqli_query($conn,"delete from sl_colletion where C_type=$C_type and C_mid=".intval($_SESSION["M_id"])." and C_cid=$id");
			die("{\"code\":\"success\",\"msg\":\"取消收藏\"}");
		}else{
			mysqli_query($conn,"insert into sl_colletion(C_type,C_mid,C_cid) values($C_type,".intval($_SESSION["M_id"]).",$id)");
			die("{\"code\":\"success\",\"msg\":\"收藏成功\"}");
		}
	}
	break;
	case "check_collection":
	$type=$_GET["type"];
	$id=intval($_GET["id"]);
	switch($type){
		case "product":
			$C_type=0;
		break;
		case "news":
			$C_type=1;
		break;
		case "shop":
			$C_type=2;
		break;
		case "course":
			$C_type=3;
		break;
	}
	if(intval($_SESSION["M_id"])==0){
		die("false");
	}else{
		if(getrs("select * from sl_colletion where C_type=$C_type and C_mid=".intval($_SESSION["M_id"])." and C_cid=$id","C_id")==""){
			die("false");
		}else{
			die("true");
		}
	}

	break;
	case "wxjs":
?>$.ajax({
    url: "conn/f.php?action=jssdk",
    type: 'post',
    data: { url: location.href.split('#')[0],action:"jssdk",pagetype:"<?php echo htmlspecialchars($_GET["type"])?>",pageid:"<?php echo intval($_GET["id"])?>" },
    success:function(res){
    res=JSON.parse(res);
      wx.config({
        debug: false,
        appId: res.appid,
        timestamp: res.timestamp,
        nonceStr: res.nonceStr,
        signature: res.signature,
        jsApiList: [
          'checkJsApi',
          'onMenuShareTimeline',
          'onMenuShareAppMessage',
          'onMenuShareQQ'
        ]
      }); 
      wx.ready(function () {
        var shareData = {
          title: document.title,
          desc: getDesc(),
          link: res.url,
          imgUrl: res.img
        };
        wx.onMenuShareAppMessage(shareData);
        wx.onMenuShareTimeline(shareData);
        wx.onMenuShareQQ(shareData);
      });
      wx.error(function (res) {
       
      });
    }
  });

  function getDesc() {
    var meta = document.getElementsByTagName("meta");
    for (var i=0;i<meta.length;i++){
      if(typeof meta[i].name!="undefined"&&meta[i].name.toLowerCase()=="description"){
        return meta[i].content;
      }
    }
};
<?php
break;

case "jssdk":
	if($C_wx_appid=="" || $C_wx_appsecret==""){
		die("{\"code\":\"未设置微信接口！\"}");
	}
	$APPID = $C_wx_appid;
	$APPSECRET = $C_wx_appsecret;
	$info=getbody("https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid=".$APPID."&secret=".$APPSECRET,"");
	$access_token=json_decode($info)->access_token;
	$info=getbody("https://api.weixin.qq.com/cgi-bin/ticket/getticket?access_token=".$access_token."&type=jsapi","");
	$ticket=json_decode($info)->ticket;
	$url=$_POST["url"];
	$noncestr=gen_key(20);
	$timestamp=time();
	$pageid=$_POST["pageid"];

	if($pageid==""){
		$pageid=1;
	}else{
	  	$pageid=intval($pageid);
	}
	switch($_POST["pagetype"]){

		case "index":
			$img=$C_ico;
		break;

		case "text":
			$img=getrs("select * from sl_text where T_id=".$pageid,"T_pic");
		break;

		case "product":
			$img=getrs("select * from sl_psort where S_id=".$pageid,"S_pic");
		break;

		case "productinfo":
			$img=splitx(getrs("select * from sl_product where P_id=".$pageid,"P_pic"),"|",0);
		break;

		case "news":
			$img=getrs("select * from sl_nsort where S_id=".$pageid,"S_pic");
		break;

		case "newsinfo":
			$img=getrs("select * from sl_news where N_id=".$pageid,"N_pic");
		break;

		case "form":
			$img=getrs("select * from sl_form where F_id=".$pageid,"F_pic");
		break;

		case "contact":
			$img=$C_ico;
		break;

		case "guestbook":
			$img=$C_ico;
		break;

		default:
			$img=$C_ico;
		break;
	}

	$sign=sha1("jsapi_ticket=".$ticket."&noncestr=".$noncestr."&timestamp=".$timestamp."&url=".$url);

	die("{\"nonceStr\":\"".$noncestr."\",\"timestamp\":\"".$timestamp."\",\"signature\":\"".$sign."\",\"appid\":\"".$APPID."\",\"img\":\"".gethttp().$D_domain."/media/".$img."\",\"ticket\":\"".$ticket."\"}");
break;
	
	default:
		# code...
		break;
}

?>