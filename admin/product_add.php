<?php
require '../conn/conn.php';
require '../conn/function.php';
require 'admin_check.php';

$action=$_GET["action"];
$P_id=intval($_GET["P_id"]);
$dirx=splitx($_SERVER["PHP_SELF"],$C_admin,0);
$D_domain=splitx($_SERVER["HTTP_HOST"].$_SERVER["PHP_SELF"],"/$C_admin",0);

if($P_id!=""){
	$aa="edit&P_id=".$P_id;
	$sql="select * from sl_product,sl_psort where P_sort=S_id and P_id=".$P_id;

	$result = mysqli_query($conn, $sql);
	$row = mysqli_fetch_assoc($result);
	if (mysqli_num_rows($result) > 0) {
		$P_pic=$row["P_pic"];
		$P_title=$row["P_title"];
		$S_title=$row["S_title"];
		$P_content=$row["P_content"];
		$P_price=$row["P_price"];
		$P_price2=$row["P_price2"];
		$P_price3=$row["P_price3"];
		$P_sort=$row["P_sort"];
		$P_order=$row["P_order"];
		$P_sell=$row["P_sell"];
		$P_selltype=$row["P_selltype"];
		$P_rest=$row["P_rest"];
		$P_sh=$row["P_sh"];
		$P_unlogin=$row["P_unlogin"];
		$P_tag=$row["P_tag"];
		$P_fx=$row["P_fx"];
		$P_shuxing=$row["P_shuxing"];
		$P_gg=$row["P_gg"];
		$P_video=$row["P_video"];
		$P_time=$row["P_time"];
		$P_sold=$row["P_sold"];
		$P_taobao=$row["P_taobao"];
		$P_vip=$row["P_vip"];
		$P_viponly=$row["P_viponly"];
		$P_viponly2=$row["P_viponly2"];
		$P_top=$row["P_top"];
		$P_tpl=$row["P_tpl"];
		$P_keywords=$row["P_keywords"];
		$P_description=$row["P_description"];
		$P_vshow=$row["P_vshow"];
		$P_mid=$row["P_mid"];
		$P_address=$row["P_address"];
		$P_ggsell=$row["P_ggsell"];
		$P_code=$row["P_code"];
		$P_msg=$row["P_msg"];
		$P_bz=$row["P_bz"];
		if($P_time==""){
			$P_time=date('Y-m-d H:i:s');
		}
	}
}else{
	$aa="add";
	$P_pic="nopic.png";
	$P_selltype=0;
	$P_rest=100;
	$P_sh=1;
	$P_unlogin=1;
	$P_fx=1;
	$P_time=date('Y-m-d H:i:s');
	$P_sold=0;
	$P_vip=1;
	$P_viponly=0;
	$P_viponly2=0;
	$P_top=0;
	$P_tpl=0;
	$P_vshow=0;
	$P_address="name,mobile,address";
	$P_price3=0;
	$P_msg="电子邮箱__text_0|给卖家留言__textarea_0";
}

if($action=="add"){
	foreach ($_POST as $x=>$value) {
		if(splitx($x,"_",0)=="sctitle"){
			foreach ($_POST as $y=>$value) {
				if(splitx($y,"_",0)=="scvvvv".splitx($x,"_",1)){
					if($_POST[$y]==""){
						die("{\"msg\":\"规格值不可留空\"}");
					}else{
						$sc=$sc.$_POST[$y]."|";
					}
				}
			}
			$sc=substr($sc,0,strlen($sc)-1);
			foreach ($_POST as $y=>$value) {
				if(splitx($y,"_",0)=="spvvvv".splitx($x,"_",1)){
					if($_POST[$y]==""){
						die("{\"msg\":\"加价不可留空\"}");
					}else{
						$sp=$sp.$_POST[$y]."|";
					}
				}
			}
			$sp=substr($sp,0,strlen($sp)-1);

			foreach ($_POST as $y=>$value) {
				if(splitx($y,"_",0)=="pcvvvv".splitx($x,"_",1)){
					$pc=$pc.$_POST[$y]."|";
				}
			}
			$pc=substr($pc,0,strlen($pc)-1);

			if($_POST[$x]==""){
				die("{\"msg\":\"规格类不可留空\"}");
			}else{
				$shuxing=$shuxing.$_POST[$x]."_".$sc."_".$sp."_".$pc."@";
			}
		}
		$sc="";
		$sp="";
		$pc="";
	} 
	if($shuxing!=""){
		$shuxing=substr($shuxing,0,strlen($shuxing)-1);
	}
	foreach ($_POST as $x=>$value) {
	    if(splitx($x,"_",0)=="picpic1"){
	        $pic=$pic.$_POST[$x]."|";
	    }
	}
	$P_pic=substr($pic,0,strlen($pic)-1);

	foreach ($_POST as $x=>$value) {
	    if(splitx($x,"_",0)=="sellic1"){
	    	if($_POST[$x]==1 && !is_numeric($_POST["sellic2_".splitx($x,"_",1)])){
	    		die("{\"msg\":\"单项发货内容->卡密分类ID需为数字\"}");
	    	}else{
	    		$g=$g.$_POST[$x]."|".$_POST["sellic2_".splitx($x,"_",1)]."\n";
	    	}
	    }
	}
	$P_ggsell=substr($g,0,strlen($g)-1);

	$P_title=$_POST["P_title"];
	$P_content=str_replace("&quot;","",$_POST["P_content"]);
	$P_price=round($_POST["P_price"],2);
	$P_price2=round($_POST["P_price2"],2);
	$P_price3=round($_POST["P_price3"],2);
	if($P_price2==0){
		$P_price2=$P_price;
	}
	if($P_price2>$P_price){
		die("{\"msg\":\"成本价不得高于售价\"}");
	}
	$P_sort=intval($_POST["P_sort"]);
	$P_sort2=getrs("select S_sub from sl_psort where S_id=$P_sort","S_sub");
	$P_order=intval($_POST["P_order"]);
	$P_selltype=intval($_POST["P_selltype"]);
	$P_rest=intval($_POST["P_rest"]);
	$P_sh=intval($_POST["P_sh"]);
	$P_unlogin=intval($_POST["P_unlogin"]);
	$P_fx=intval($_POST["P_fx"]);
	$P_sold=intval($_POST["P_sold"]);
	$P_vip=intval($_POST["P_vip"]);
	$P_viponly=intval($_POST["P_viponly"]);
	$P_viponly2=intval($_POST["P_viponly2"]);
	$P_top=intval($_POST["P_top"]);
	$P_tpl=intval($_POST["P_tpl"]);
	$P_vshow=intval($_POST["P_vshow"]);
	$P_tag=$_POST["P_tag"];
	$P_video=$_POST["P_video"];
	$P_code=$_POST["P_code"];
	$P_bz=$_POST["P_bz"];
	$P_shuxing=$_POST["P_shuxing"];
	$P_shuxing=str_replace("：", ":", $P_shuxing);
	if($P_shuxing!="" && strpos($P_shuxing, ":")===false){
		die("{\"msg\":\"商品参数的格式错误\"}");
	}
	$P_time=$_POST["P_time"];
	$P_taobao=$_POST["P_taobao"];
	$P_sell=$_POST["P_sell"][$P_selltype];
	$P_keywords=$_POST["P_keywords"];
	$P_description=$_POST["P_description"];

	$P_address=$_POST["name"].",".$_POST["mobile"].",".$_POST["address"];
	$savepic=intval($_POST["savepic"]);
	if($savepic==1){
		$P_content=savepic($P_content,$dirx);
	}
	if($C_osson==1){
		editor2oss($P_content);
	}

	foreach ($_POST as $x=>$value) {
	    if(splitx($x,"_",0)=="msgmsg1"){
	        $kf=$kf.$_POST[$x]."_".$_POST["msgmsg2_".splitx($x,"_",1)]."_".$_POST["msgmsg3_".splitx($x,"_",1)]."_".$_POST["msgmsg4_".splitx($x,"_",1)]."|";
	    }
	}

	$P_msg=substr($kf,0,strlen($kf)-1);

	if(count(explode("|",splitx(splitx($shuxing,"@",0),"_",1)))!=count(explode("\n",$P_ggsell)) && $P_ggsell!=""){
		die("{\"msg\":\"规格数与各项发货数不一致".count(explode("|",splitx(splitx($shuxing,"@",0),"_",1)))."|".count(explode("\n",$P_ggsell))."\"}");
	}

	if($P_sort==0){
		die("{\"msg\":\"请选择一个商品分类\"}");
	}
	if($P_price<0){
		die("{\"msg\":\"商品价格不可为负\"}");
	}
	if($P_selltype==1 && $P_sell==0){
		die("{\"msg\":\"请选择一个卡密分类\"}");
	}

	if($P_title!=""){
		mysqli_query($conn,"insert into sl_product(P_pic,P_title,P_content,P_price,P_price2,P_price3,P_sort,P_sort2,P_order,P_selltype,P_sell,P_rest,P_sh,P_unlogin,P_fx,P_tag,P_shuxing,P_video,P_time,P_sold,P_taobao,P_vip,P_viponly,P_viponly2,P_top,P_tpl,P_keywords,P_description,P_address,P_vshow,P_gg,P_ggsell,P_code,P_msg,P_bz) values('$P_pic','$P_title','$P_content',$P_price,$P_price2,$P_price3,$P_sort,$P_sort2,$P_order,$P_selltype,'$P_sell',$P_rest,$P_sh,$P_unlogin,$P_fx,'$P_tag','$P_shuxing','$P_video','$P_time',$P_sold,'$P_taobao',$P_vip,$P_viponly,$P_viponly2,$P_top,$P_tpl,'$P_keywords','$P_description','$P_address',$P_vshow,'$shuxing','$P_ggsell','$P_code','$P_msg','$P_bz')");

		$P_id=getrs("select * from sl_product where P_title='$P_title' and P_pic='$P_pic' and P_sort=$P_sort","P_id");
		mysqli_query($conn,"insert into sl_log(L_aid,L_time,L_add,L_ip,L_title) values(".$_SESSION["A_id"].",'".date('Y-m-d H:i:s')."','".$_SESSION["add"]."','".getip()."','新增商品')");
		die("{\"msg\":\"success\",\"P_id\":$P_id}");
	}else{
		die("{\"msg\":\"请填全内容\"}");
	}
}

if($action=="edit"){
	foreach ($_POST as $x=>$value) {
		if(splitx($x,"_",0)=="sctitle"){
			foreach ($_POST as $y=>$value) {
				if(splitx($y,"_",0)=="scvvvv".splitx($x,"_",1)){
					if($_POST[$y]==""){
						die("{\"msg\":\"规格值不可留空\"}");
					}else{
						$sc=$sc.$_POST[$y]."|";
					}
				}
			}
			$sc=substr($sc,0,strlen($sc)-1);
			foreach ($_POST as $y=>$value) {
				if(splitx($y,"_",0)=="spvvvv".splitx($x,"_",1)){
					if($_POST[$y]==""){
						die("{\"msg\":\"加价不可留空\"}");
					}else{
						$sp=$sp.$_POST[$y]."|";
					}
				}
			}
			$sp=substr($sp,0,strlen($sp)-1);

			foreach ($_POST as $y=>$value) {
				if(splitx($y,"_",0)=="pcvvvv".splitx($x,"_",1)){
					$pc=$pc.$_POST[$y]."|";
				}
			}
			$pc=substr($pc,0,strlen($pc)-1);

			if($_POST[$x]==""){
				die("{\"msg\":\"规格类不可留空\"}");
			}else{
				$shuxing=$shuxing.$_POST[$x]."_".$sc."_".$sp."_".$pc."@";
			}
		}
		$sc="";
		$sp="";
		$pc="";
	} 
	if($shuxing!=""){
		$shuxing=substr($shuxing,0,strlen($shuxing)-1);
	}
	foreach ($_POST as $x=>$value) {
	    if(splitx($x,"_",0)=="picpic1"){
	        $pic=$pic.$_POST[$x]."|";
	    }
	}
	$P_pic=substr($pic,0,strlen($pic)-1);

	foreach ($_POST as $x=>$value) {
	    if(splitx($x,"_",0)=="sellic1"){
	    	if($_POST[$x]==1 && !is_numeric($_POST["sellic2_".splitx($x,"_",1)])){
	    		die("{\"msg\":\"单项发货内容->卡密分类ID需为数字\"}");
	    	}else{
	    		$g=$g.$_POST[$x]."|".$_POST["sellic2_".splitx($x,"_",1)]."\n";
	    	}
	    }
	}

	$P_ggsell=substr($g,0,strlen($g)-1);

	$P_title=$_POST["P_title"];
	$P_content=str_replace("&quot;","",$_POST["P_content"]);
	$P_price=round($_POST["P_price"],2);
	$P_price2=round($_POST["P_price2"],2);
	$P_price3=round($_POST["P_price3"],2);
	if($P_price2==0){
		$P_price2=$P_price;
	}
	if($P_price2>$P_price){
		die("{\"msg\":\"成本价不得高于售价\"}");
	}


	foreach ($_POST as $x=>$value) {
	    if(splitx($x,"_",0)=="msgmsg1"){
	        $kf=$kf.$_POST[$x]."_".$_POST["msgmsg2_".splitx($x,"_",1)]."_".$_POST["msgmsg3_".splitx($x,"_",1)]."_".$_POST["msgmsg4_".splitx($x,"_",1)]."|";
	    }
	}

	$P_msg=substr($kf,0,strlen($kf)-1);

	$P_sort=intval($_POST["P_sort"]);
	$P_sort2=getrs("select S_sub from sl_psort where S_id=$P_sort","S_sub");
	$P_order=intval($_POST["P_order"]);
	$P_selltype=intval($_POST["P_selltype"]);
	$P_rest=intval($_POST["P_rest"]);
	$P_sh=intval($_POST["P_sh"]);
	$P_unlogin=intval($_POST["P_unlogin"]);
	$P_fx=intval($_POST["P_fx"]);
	$P_sold=intval($_POST["P_sold"]);
	$P_vip=intval($_POST["P_vip"]);
	$P_viponly=intval($_POST["P_viponly"]);
	$P_viponly2=intval($_POST["P_viponly2"]);
	$P_top=intval($_POST["P_top"]);
	$P_tpl=intval($_POST["P_tpl"]);
	$P_vshow=intval($_POST["P_vshow"]);
	$P_tag=$_POST["P_tag"];
	$P_video=$_POST["P_video"];
	$P_code=$_POST["P_code"];
	$P_shuxing=$_POST["P_shuxing"];
	$P_shuxing=str_replace("：", ":", $P_shuxing);
	if($P_shuxing!="" && strpos($P_shuxing, ":")===false){
		die("{\"msg\":\"商品参数的格式错误\"}");
	}
	$P_time=$_POST["P_time"];
	$P_sell=$_POST["P_sell"][$P_selltype];
	$P_keywords=$_POST["P_keywords"];
	$P_description=$_POST["P_description"];
	$P_address=$_POST["name"].",".$_POST["mobile"].",".$_POST["address"];
	$P_taobao=$_POST["P_taobao"];
	$P_bz=$_POST["P_bz"];
	$savepic=intval($_POST["savepic"]);
	if(count(explode("|",splitx(splitx($shuxing,"@",0),"_",1)))!=count(explode("\n",$P_ggsell)) && $P_ggsell!=""){
		die("{\"msg\":\"规格数与各项发货数不一致".count(explode("|",splitx(splitx($shuxing,"@",0),"_",1)))."|".count(explode("\n",$P_ggsell))."\"}");
	}
	if($savepic==1){
		$P_content=savepic($P_content,$dirx);
	}
	if($C_osson==1){
		editor2oss($P_content);
	}

	if($P_sort==0){
		die("{\"msg\":\"请选择一个商品分类\"}");
	}

	if($P_price<0){
		die("{\"msg\":\"商品价格不可为负\"}");
	}
	if($P_price2<0){
		die("{\"msg\":\"商品价格不可为负\"}");
	}

	if($P_selltype==1 && $P_sell==0){
		die("{\"msg\":\"请选择一个卡密分类\"}");
	}

	if($P_title!=""){
		mysqli_query($conn, "update sl_product set
		P_pic='$P_pic',
		P_title='$P_title',
		P_content='$P_content',
		P_price=$P_price,
		P_price2=$P_price2,
		P_price3=$P_price3,
		P_sort=$P_sort,
		P_sort2=$P_sort2,
		P_order=$P_order,
		P_selltype=$P_selltype,
		P_rest=$P_rest,
		P_sh=$P_sh,
		P_unlogin=$P_unlogin,
		P_fx=$P_fx,
		P_sold=$P_sold,
		P_sell='$P_sell',
		P_tag='$P_tag',
		P_shuxing='$P_shuxing',
		P_gg='$shuxing',
		P_time='$P_time',
		P_ggsell='$P_ggsell',
		P_video='$P_video',
		P_code='$P_code',
		P_keywords='$P_keywords',
		P_description='$P_description',
		P_msg='$P_msg',
		P_address='$P_address',
		P_bz='$P_bz',
		P_vip=$P_vip,
		P_viponly=$P_viponly,
		P_viponly2=$P_viponly2,
		P_top=$P_top,
		P_tpl=$P_tpl,
		P_vshow=$P_vshow,
		P_taobao='$P_taobao'
		where P_id=".$P_id);
		mysqli_query($conn,"insert into sl_log(L_aid,L_time,L_add,L_ip,L_title) values(".$_SESSION["A_id"].",'".date('Y-m-d H:i:s')."','".$_SESSION["add"]."','".getip()."','编辑商品')");
		die("{\"msg\":\"success\",\"P_id\":0}");
	}else{
		die("{\"msg\":\"请填全内容\"}");
	}
}
?>
<!DOCTYPE html>
<html lang="en">
	<head>

		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>商品设置 - 后台管理</title>

		<!--favicon -->
		<link rel="icon" href="../media/<?php echo $C_ico?>" type="image/x-icon"/>

		<!--Bootstrap.min css-->
		<link rel="stylesheet" href="assets/plugins/bootstrap/css/bootstrap.min.css">

		<!--Icons css-->
		<link rel="stylesheet" href="assets/css/icons.css">

		<!--Style css-->
		<link rel="stylesheet" href="assets/css/style.css">

		<!--mCustomScrollbar css-->
		<link rel="stylesheet" href="assets/plugins/scroll-bar/jquery.mCustomScrollbar.css">

		<!--Sidemenu css-->
		<link rel="stylesheet" href="assets/plugins/toggle-menu/sidemenu.css">

		<!--Morris css-->
		<link rel="stylesheet" href="assets/plugins/morris/morris.css">

		<!--Toastr css-->
		<link rel="stylesheet" href="assets/plugins/toastr/build/toastr.css">


		<script type="text/javascript" src="../upload/upload.js"></script>
		<style type="text/css">
		.showpic{height: 100px;border: solid 1px #DDDDDD;padding: 5px;max-width: 100%;}
		.showpicx{width: 100%;max-width: 500px}
		.list-group a{text-decoration:none}

		.buy label {
			padding: 1px 5px;
			cursor: pointer;
			border: #CCCCCC solid 2px;
			-moz-border-radius: 3px;
			-webkit-border-radius: 3px;
			border-radius: 3px;
		}

		.buy .checked {
			border: #ff0000 solid 2px;
			-moz-border-radius: 3px;
			-webkit-border-radius: 3px;
			border-radius: 3px;
			color: #ff0000;
		}

		.buy input[type="radio"] {
			display: none;
		}
		.gg_pic{width:30px;height:30px;position:absolute;right:4px;top:4px;}
		.remove_pic{width:12px;height:12px;border-radius:12px;background:#ff0000;color:#fff;text-align:center;line-height:12px;position:absolute;right:-15px;top:12px;cursor:pointer}
	</style>

		<script type="text/javascript">

function AddPic()
{
 var i =pic1.rows.length;
 var newTr = pic1.insertRow();
 var _id='pp'+i;
 var newTd0 = newTr.insertCell();
 newTr.id=_id;
 newTd0.innerHTML ='<div class="row"><div class="col-md-3"><img src="../media/nopic.png" id="picpic1_'+i+'x" class="showpic" onClick="showUpload(\'picpic1_'+i+'\',\'picpic1_'+i+'\',\'../media\',1,null,\'\',\'\');" alt="<img src=\'../media/nopic.png\' class=\'showpicx\'>"></div><div class="col-md-9"><div class="input-group"><input type="text" id="picpic1_'+i+'" name="picpic1_'+i+'" class="form-control" value="nopic.png"><span class="input-group-btn"><button class="btn btn-primary m-b-5 m-t-5" type="button" onClick="showUpload(\'picpic1_'+i+'\',\'picpic1_'+i+'\',\'../media\',1,null,\'\',\'\');">上传</button></span></div><button class="btn btn-danger btn-sm" type="button" onclick="DelPic('+i+')">- 删除该图</button></div></div>';
}

function DelPic(i){
  var Container = document.getElementById("pic1");    
    var _tr=document.getElementById("pp"+i);  
    row=_tr.rowIndex;
    Container.deleteRow(row); 
}
function AddRow()
{
 //添加一行
 var i =tab1.rows.length;
 var Nam="'div1'";
 var Cod="fuJ"+i;
 var newTr = tab1.insertRow();
 var _id='pd'+i;
 var newTd0 = newTr.insertCell();
 var newTd1 = newTr.insertCell();
 var newTd2 = newTr.insertCell();
 newTr.id=_id;
 newTd0.innerHTML = "<div class='input-group m-b'><span class='input-group-addon'>规格类</span><input type='text' name='sctitle_"+i+"' value='' class='form-control'/></div><input type='button' value='- 删除规格类' class='btn btn-sm btn-danger' onclick='DelRow("+i+")' style='margin:5px;'/> <input type='button' value='＋ 新增一行' class='btn btn-sm btn-info' onclick='AddRow2(\"table"+i+"\","+i+")' style='margin:5px;'/>";

 newTd1.innerHTML ="<table width='100%' bgcolor='#FFFFFF' id='table"+i+"'><tr id='pd"+i+"_0"+"' ><td><div class='input-group m-b'><span class='input-group-addon'>规格</span><input type='text' name='scvvvv"+i+"_0' value='' class='form-control'/><input type='hidden' name='pcvvvv"+i+"_0' id='pcvvvv"+i+"_0' value=''><img src='../media/upic.png' id='pcvvvv"+i+"_0x' onClick=\"$('#pcvvvv"+i+"_0btn').show();showUpload('pcvvvv"+i+"_0','pcvvvv"+i+"_0','../media',1,null,'','');\"style='width:30px;height:30px;position:absolute;right:4px;top:4px;' alt='<img src=\"../media/upic.png\" class=\"showpicx\">'><div class='remove_pic' style='display:none' onclick='removepic(\"pcvvvv"+i+"_0\")' id='pcvvvv"+i+"_0btn'>×</div></div></td><td><div class='input-group m-b'><span class='input-group-addon'>加价</span><input type='text' name='spvvvv"+i+"_0' value='' class='form-control'/><span class='input-group-addon'>元</span></div></td><td><input type='button' value='- 删除' class='btn btn-sm btn-warning' onclick='DelRow2(\"table"+i+"\",\""+i+"_0"+"\")' style='margin:5px;'/></td></tr></table>";
}

function AddRow2(tab,j)
{
 var Container = document.getElementById(tab);  
 var i =Container.rows.length;
 var Nam="'div1'";
 var Cod="fuJ"+i;
 var newTr = Container.insertRow();
 var _id='pd'+j+"_"+i;

 var newTd0 = newTr.insertCell();
 var newTd1 = newTr.insertCell();
 var newTd2 = newTr.insertCell();
 newTr.id=_id;
 newTd0.innerHTML = "<div class='input-group m-b'><span class='input-group-addon'>规格</span><input type='text' name='scvvvv"+j+"_"+i+"' value='' class='form-control'/><input type='hidden' name='pcvvvv"+j+"_"+i+"' id='pcvvvv"+j+"_"+i+"' value='' class='form-control'/><img src='../media/upic.png' id='pcvvvv"+j+"_"+i+"x' onClick=\"$('#pcvvvv"+j+"_"+i+"btn').show();showUpload('pcvvvv"+j+"_"+i+"','pcvvvv"+j+"_"+i+"','../media',1,null,'','');\"style='width:30px;height:30px;position:absolute;right:4px;top:4px;' alt='<img src=\"../media/upic.png\" class=\"showpicx\">'><div class='remove_pic' style='display:none' id='pcvvvv"+j+"_"+i+"btn' onclick='removepic(\"pcvvvv"+j+"_"+i+"\")'>×</div></div>";
 newTd1.innerHTML ="<div class='input-group m-b'><span class='input-group-addon'>加价</span><input type='text' name='spvvvv"+j+"_"+i+"' value='' class='form-control'/><span class='input-group-addon'>元</div></span>";
 newTd2.innerHTML = "<input type='button' value='- 删除' class='btn btn-sm btn-warning' onclick='DelRow2(\""+tab+"\",\""+j+"_"+i+"\")' style='margin:5px;'/>";
}

function DelRow(i)
{
  var Container = document.getElementById("tab1");    
    var _tr=document.getElementById("pd"+i);  
    row=_tr.rowIndex;
    Container.deleteRow(row); 
     $("#gg_btn").show();
}
function DelRow2(tab,i)
{
    var Container = document.getElementById(tab);   
    var _tr=document.getElementById("pd"+i);  
    row=_tr.rowIndex;
    Container.deleteRow(row); 
}

function AddSell(){
 var i =sell1.rows.length;
 var newTr = sell1.insertRow();
 var _id='pp'+i;
 var newTd0 = newTr.insertCell();
 newTr.id=_id;
 newTd0.innerHTML ='<div class="input-group"><select class="form-control" name="sellic1_'+i+'" style="width:20%"><option value="0">固定内容</option><option value="1">卡密发卡</option><option value="2">实物商品</option></select><div style="display:inline;width:70%"><textarea placeholder="发货内容" name="sellic2_'+i+'" class="form-control"></textarea></div><span class="input-group-btn" style="width:10%"><button class="btn btn-primary m-b-5  m-t-5" type="button" onclick="DelSell('+i+')">－ 删除</button></span></div>';
}
function DelSell(i){
  var Container = document.getElementById("sell1");    
    var _tr=document.getElementById("pp"+i);  
    row=_tr.rowIndex;
    Container.deleteRow(row); 
}


function AddMsg(){
 var i =msg1.rows.length;
 var newTr = msg1.insertRow();
 var _id='mm'+i;
 var newTd0 = newTr.insertCell();
 newTr.id=_id;
 newTd0.innerHTML ='<div class="input-group"><input type="text" name="msgmsg1_'+i+'" class="form-control" value="" placeholder="名称" style="width:30%"><input type="text" name="msgmsg2_'+i+'" class="form-control" value="" placeholder="内容" style="width:35%"><select class="form-control" name="msgmsg3_'+i+'" style="width:15%"><option value="text">文本框</option><option value="textarea">文本域</option><option value="radio">单选按钮</option><option value="checkbox">多选按钮</option><option value="select">下拉列表</option></select><select class="form-control" name="msgmsg4_'+i+'" style="width:10%"><option value="1">必填</option><option value="0">选填</option></select><span class="input-group-btn" style="width:10%"><button class="btn btn-primary m-b-5  m-t-5" type="button" onclick="DelMsg('+i+')">－ 删除</button></span></div>'
}
function DelMsg(i){
  var Container = document.getElementById("msg1");    
    var _tr=document.getElementById("mm"+i);  
    row=_tr.rowIndex;
    Container.deleteRow(row); 
}
	</script>
	</head>
	<body class="app ">
		<div id="spinner"></div>
		<div id="app">
			<div class="main-wrapper" >
					<?php
					require 'nav.php';
					?>
				<div class="app-content">
					<button class="btn btn-info pull-right btn-sm" style="z-index: 2;position: relative;" onClick="$('#cj').show()"><i class="fa fa-paste"></i> 采集文章</button>
					<a class="btn btn-primary pull-right btn-sm" href="psort_add.php" style="z-index: 2;position: relative;margin-right: 10px;"><i class="fa fa-plus-circle"></i> 新增商品分类</a>
					<a class="btn btn-primary pull-right btn-sm" href="product_add.php" style="z-index: 2;position: relative;margin-right: 10px;"><i class="fa fa-plus-circle"></i> 新增商品</a>
					<section class="section">
                    	<ol class="breadcrumb">
                            <li class="breadcrumb-item active"><a href="product_list.php">商品管理</a></li>
                            <li class="breadcrumb-item"><a href="psort_add.php">商品分类</a></li>
                            <li class="breadcrumb-item"><a href="excel.php">导入EXCEL</a></li>
                        </ol>
                        <style type="text/css">
                        .active a{font-weight: bold;color: #a2a9d4}
                    	</style>

						<div class="section-body ">
							<form id="form">
							<div class="row">
								<div class="col-lg-3">
									<div class="card card-primary">
										<div class="card-header">
											<h4><?php echo $S_title?> -商品列表</h4>
										</div>
												<ul class="list-group">
													<?php 
													if($P_id==0){
														$sql="select * from sl_product,sl_psort where P_sort=S_id and P_del=0 order by S_order,P_order,P_id desc limit 20";
													}else{
														$sql="select * from sl_product,sl_psort where P_sort=S_id and P_del=0 and P_sort=$P_sort order by S_order,P_order,P_id desc limit 20";
													}
														
																$result = mysqli_query($conn, $sql);
																if (mysqli_num_rows($result) > 0) {
																while($row = mysqli_fetch_assoc($result)) {
																	if($row["P_id"]==$P_id){
																		$active="active";
																	}else{
																		$active="";
																	}
																	echo "<a href=\"?P_id=".$row["P_id"]."\" class=\"list-group-item ".$active."\"><b>[".$row["S_title"]."]</b> ".htmlspecialchars($row["P_title"])."</a>";
																}
															}
													?>
													
												</ul>
									</div>
									<a href="product_add.php" class="btn btn-sm btn-primary"><i class="fa fa-plus-circle"></i> 新增商品</a>
									<div class="pull-right"><a href="wholesale.php" class="btn btn-sm btn-info"><i class="fa fa-shopping-cart"></i> 货源采购</a></div>
								</div>

								<div class="col-lg-9">
									<div class="card card-primary">
										<div class="card-header ">
											<h4>商品管理</h4>
										</div>
										<div class="card-body">

												<div class="form-group row" style="display: none" id="cj">
													<label class="col-md-2 col-form-label">采集文章<br><button type="button" class="btn btn-info btn-sm" onClick="$('#cj').hide()">隐藏</button></label>
													<div class="col-md-10 buy">
														<textarea  id="url" class="form-control" rows="3" placeholder="输入网页地址"></textarea>
														<p style="font-size: 12px;margin-top: 10px;"><button class="btn btn-sm btn-primary" type="button" onClick="caiji()">采集</button> *会自动采集文章标题/配图/内容；目前支持采集微信公众号/百家号/新浪新闻</p>
													</div>
												</div>

												<div class="form-group row">
													<label class="col-md-2 col-form-label" >商品标题</label>
													<div class="col-md-10">
														<input type="text" id="P_title" name="P_title" class="form-control" value="<?php echo htmlspecialchars($P_title)?>">
													</div>
												</div>

												<div class="form-group row">
													<label class="col-md-2 col-form-label" >商品图片</label>
													<div class="col-md-10" style="border: solid 1px #EEEEEE;padding-bottom: 10px;border-radius: 5px;background: #f9f9f9">
<table class="table" id="pic1">
															<?php
															$pic=explode("|",$P_pic);
															for($i=0;$i<count($pic);$i++){
																echo "<tr id=\"pp".$i."\"><td><div class=\"row\">
																<div class=\"col-md-3\">
																<img src=\"".pic2($pic[$i])."\" id=\"picpic1_".$i."x\" class=\"showpic\" onClick=\"showUpload('picpic1_".$i."','picpic1_".$i."','../media',1,null,'','');\" alt=\"<img src='".pic2($pic[$i])."' class='showpicx'>
																\"></div>

																<div class=\"col-md-9\">
																<div class=\"input-group\">
						                                        <input type=\"text\" id=\"picpic1_".$i."\" name=\"picpic1_".$i."\" class=\"form-control\" value=\"".$pic[$i]."\">
						                                        <span class=\"input-group-btn\">
						                                                <button class=\"btn btn-primary m-b-5 m-t-5\" type=\"button\" onClick=\"showUpload('picpic1_".$i."','picpic1_".$i."','../media',1,null,'','');\">上传</button>
						                                        </span>
						                                </div>
						                                <button class=\"btn btn-danger btn-sm\" type=\"button\" onclick=\"DelPic(".$i.")\">- 删除该图</button>
						                                </div>
						                                </div></td></tr>";
															}

															?>
</table>
<button class="btn btn-info btn-sm" type="button" onclick="AddPic()">+ 新增一个商品图</button>
													</div>
												</div>

												<div class="form-group row">
													<label class="col-md-2 col-form-label" >商品价格</label>
													<div class="col-md-4">

														<div class="input-group">
															<span class="input-group-addon">出售价</span>
														<input type="text"  name="P_price" class="form-control" value="<?php echo $P_price?>">
														<span class="input-group-addon">元</span>
													</div>
													<div style="margin: 10px 0;font-size: 12px;color: #AAAAAA">
														<input type="checkbox" name="P_vip" value="1" <?php if($P_vip==1){echo "checked='checked'";}?>>参与VIP打折活动 <a href="vip.php" style="margin-right: 20px;">[设置折扣]</a>
														<input type="checkbox" name="P_viponly" value="1" <?php if($P_viponly==1){echo "checked='checked'";}?>>仅限VIP购买
														<!--<input type="checkbox" name="P_viponly2" value="1" <?php if($P_viponly2==1){echo "checked='checked'";}?>>仅限永久VIP购买-->
													</div>

													<?php if($C_fzon==1){?>
													<div class="input-group">
														<span class="input-group-addon">分站成本价</span>
														<input type="text"  name="P_price2" class="form-control" value="<?php echo $P_price2?>">
														<span class="input-group-addon">元</span>
													</div>
													<div style="margin: 10px 0;font-size: 12px;color: #AAAAAA">
														说明：开启分站后该参数有效，用于计算分站的利润分成
													</div>
													<?php }?>
													<div class="input-group">
														<span class="input-group-addon">进货价</span>
														<input type="text"  name="P_price3" class="form-control" value="<?php echo $P_price3?>">
														<span class="input-group-addon">元</span>
													</div>
													<div style="margin-top: 10px;font-size: 12px;color: #AAAAAA">
														说明：设置进货价方便统计利润，可不填 <a href="statistics.php">[查看统计]</a>
													</div>
													
													</div>

													<label class="col-md-2 col-form-label" >商品分类</label>
													<div class="col-md-4">
														<select name="P_sort" class="form-control">
															<?php
																$sql2="select * from sl_psort where S_del=0 and S_sub=0 order by S_order,S_id desc";
																	$result2 = mysqli_query($conn, $sql2);
																	if (mysqli_num_rows($result2) > 0) {
																	while($row2 = mysqli_fetch_assoc($result2)) {
																		echo "<optgroup label=\"".$row2["S_title"]."\">";
																		$sql="select * from sl_psort where S_del=0 and S_sub=".$row2["S_id"]." order by S_order,S_id desc";
																			$result = mysqli_query($conn, $sql);
																			if (mysqli_num_rows($result) > 0) {
																			while($row = mysqli_fetch_assoc($result)) {
																				if($P_sort==$row["S_id"]){
																					$selected="selected";
																				}else{
																					$selected="";
																				}
																				echo "<option value=\"".$row["S_id"]."\" ".$selected.">".$row["S_title"]."</option>";
																			}
																		}
																		echo "</optgroup>";
																	}
																}
															?>
														</select>
														<div style="margin-top: 10px;font-size: 12px;color: #AAAAAA">*商品无法直接归到主分类，如果无法选择请先新建子分类</div>
													</div>
												</div>

												<div class="form-group row">
													<label class="col-md-2 col-form-label" >发布时间</label>
													<div class="col-md-4">
														<div class="input-group">
										                    <input type="text"  name="P_time" id="P_time" class="form-control" value="<?php echo $P_time?>">
										                    <span class="input-group-btn">
										                        <button class="btn btn-info" type="button" onclick="getdate()">获取</button>
										                    </span>
										                </div>
													</div>
													<label class="col-md-2 col-form-label" >商品销量</label>
													<div class="col-md-4">
														<div class="input-group">
														<input type="text"  name="P_sold" class="form-control" value="<?php echo $P_sold?>">
														<span class="input-group-addon">件</span>
													</div>
													</div>
												</div>

												<div class="form-group row">
													<label class="col-md-2 col-form-label" >商品排序</label>
													<div class="col-md-4" style="position: relative;">
														<input type="text"  name="P_order" class="form-control" value="<?php echo $P_order?>" placeholder="数字越小越靠前">
														<label style="position: absolute;right: 25px;top: 10px;"><input type="checkbox" name="P_top" value="1" <?php if($P_top==1){echo "checked='checked'";}?> >置顶</label>
													</div>
													<label class="col-md-2 col-form-label" >
														<?php
														if($P_mid==0){
															echo "商品审核";
														}else{
															echo "<span style=\"color:#ff0000\">商品审核<span>";
														}

														?>
													</label>
													<div class="col-md-4">
														
														<select class="form-control" name="P_sh">
															<option value="0" <?php if($P_sh==0){echo "selected=\"selected\"";}?>>未审核</option>
															<option value="1" <?php if($P_sh==1){echo "selected=\"selected\"";}?>>已通过</option>
															<option value="2" <?php if($P_sh==2){echo "selected=\"selected\"";}?>>未通过</option>
														</select>
													
													</div>
												</div>


												<div class="form-group row">
													<label class="col-md-2 col-form-label" ><p>发货类型</p><p>发货内容</p></label>
													<div class="col-md-10">
														<div class="buy">
															<label aa="P_selltype" <?php if($P_selltype==0){echo "class='checked'";}?>><input type="radio" name="P_selltype" value="0" onclick="change(0)" <?php if($P_selltype==0){echo "checked='checked'";}?>> [自动发货]固定内容</label>
															<label aa="P_selltype" <?php if($P_selltype==1){echo "class='checked'";}?>><input type="radio" name="P_selltype" value="1" onclick="change(1)" <?php if($P_selltype==1){echo "checked='checked'";}?>> [自动发货]卡密</label>
															<label aa="P_selltype" <?php if($P_selltype==2){echo "class='checked'";}?>><input type="radio" name="P_selltype" value="2" onclick="change(2)" <?php if($P_selltype==2){echo "checked='checked'";}?>> [手动发货]实物</label>
															<div style="font-size: 12px;color: #AAAAAA;display: inline-block;margin-left: 20px;">*不会设置？点击<a href="<?php echo $url_from?>/h6.html" target="_blank">查看帮助</a></div>
														</div>
														<div id="P_sell1" style="position: relative;">
															<textarea id="P_file" name="P_sell[]" class="form-control" rows="3" placeholder="输入固定发货内容或上传附件" ><?php echo $P_sell?></textarea>
															<button type="button" class="btn btn-sm btn-info" style="position: absolute;right: 10px;bottom: 10px;" onClick="showUpload('P_file','<?php echo gethttp().$D_domain?>','../media');"><i class="fa fa-paperclip"></i> 上传附件</button>
														</div>
														<div id="P_sell2">
														<select class="form-control" name="P_sell[]">
															<option value="0">请选择一个卡密分类</option>
															<?php
																$sql="select * from sl_csort where S_del=0 order by S_id desc";
																	$result = mysqli_query($conn, $sql);
																	if (mysqli_num_rows($result) > 0) {
																	while($row = mysqli_fetch_assoc($result)) {
																		if($P_sell==$row["S_id"]){
																			$selected="selected";
																		}else{
																			$selected="";
																		}
																		echo "<option value=\"".$row["S_id"]."\" ".$selected.">".$row["S_title"]."</option>";
																	}
																}
															?>
														</select>
														<a href="card_list.php" target="_blank" class="btn btn-info btn-sm" style="margin-top: 10px;">管理卡密</a>
														</div>

														<div id="P_sell3">
															<div class="input-group">
													            <span class="input-group-addon">商品余量</span>
													            <input type="text" class="form-control" name="P_rest" value="<?php echo $P_rest?>">
													        </div>
													        <div style="margin-top: 10px;border: solid 1px #ced4da;padding: 10px 10px 0 10px ;border-radius: 5px;">收件信息开关：
													        	<label><input type="checkbox" name="name" value="name" <?php if(strpos($P_address,"name")!==false){echo "checked='checked'";}?>> 收件人</label>
													        	<label><input type="checkbox" name="mobile" value="mobile" <?php if(strpos($P_address,"mobile")!==false){echo "checked='checked'";}?>> 手机号码</label>
													        	<label><input type="checkbox" name="address" value="address" <?php if(strpos($P_address,"address")!==false){echo "checked='checked'";}?>> 收件地址</label>
													        </div>
														<div style="font-size: 12px;margin-top: 10px;">*实物商品，请手动给用户发货</div>
													</div>
													</div>
												</div>


<div class="panel-group" id="accordion">
<a data-toggle="collapse" data-parent="#accordion" href="#collapseThree" style="display: block;text-align: center;background: #f7f7f7;margin-bottom: 10px;font-weight: bold;padding: 5px;">＋展开高级功能</a>
            
        <div id="collapseThree" class="panel-collapse collapse" style="background: #f7f7f7;padding: 10px;margin-bottom: 10px;border-radius: 10px;">
<div class="form-group row">
													<label class="col-md-2 col-form-label" >SEO关键词</label>
													<div class="col-md-10">
														<input type="text" id="P_keywords" name="P_keywords" class="form-control" value="<?php echo $P_keywords?>" placeholder="多个词用,隔开">
													</div>
												</div>

												<div class="form-group row">
													<label class="col-md-2 col-form-label" >SEO描述</label>
													<div class="col-md-10">
														<textarea name="P_description" id="P_description" class="form-control"><?php echo $P_description?></textarea>
													</div>
												</div>
        	<hr>
        	<div class="form-group row">
													<label class="col-md-2 col-form-label" >兑换码取货</label>
													<div class="col-md-10">
														<div class="input-group">
							                               <input type="text" name="P_code" id="P_code" class="form-control" value="<?php echo $P_code?>">
							                               <span class="input-group-btn">
							                                   <button class="btn btn-info" type="button" onclick="creat()">生成</button>
							                               </span>
							                           </div>
													</div>
												</div>
        	
												<div class="form-group row">
													<label class="col-md-2 col-form-label" >免登录购买</label>
													<div class="col-md-4 buy">
														<label aa="P_unlogin" <?php if($P_unlogin==1){echo "class='checked'";}?>><input type="radio" name="P_unlogin" value="1"  <?php if($P_unlogin==1){echo "checked='checked'";}?>> 开启</label>
														<label aa="P_unlogin" <?php if($P_unlogin==0){echo "class='checked'";}?>><input type="radio" name="P_unlogin" value="0"  <?php if($P_unlogin==0){echo "checked='checked'";}?>> 关闭</label>
													</div>

													<label class="col-md-2 col-form-label" >分销推广</label>
													<div class="col-md-4 buy">
														<label aa="P_fx" <?php if($P_fx==1){echo "class='checked'";}?>><input type="radio" name="P_fx" value="1"  <?php if($P_fx==1){echo "checked='checked'";}?>> 开启</label>
														<label aa="P_fx" <?php if($P_fx==0){echo "class='checked'";}?>><input type="radio" name="P_fx" value="0"  <?php if($P_fx==0){echo "checked='checked'";}?>> 关闭</label>
													</div>

												</div>

												<div class="form-group row">
													<label class="col-md-2 col-form-label">外部链接</label>
													<div class="col-md-4 buy">
														<textarea name="P_taobao" class="form-control" rows="2" placeholder=""><?php echo $P_taobao?></textarea>
														<p style="font-size: 12px;margin-top: 10px;"> *可以填写淘宝/京东等外部购买链接，点击购买时自动跳转</p>
													</div>
												
													<label class="col-md-2 col-form-label">插入视频</label>
													<div class="col-md-4">
														<textarea name="P_video" id="P_video" class="form-control" rows="3" placeholder="上传mp4视频或者粘贴视频代码"><?php echo $P_video?></textarea>
														<label style="position: absolute;right: 100px;bottom: 50px;"><input type="radio" name="P_vshow" value="0" <?php if($P_vshow==0){echo "checked='checked'";}?> >顶部显示</label>
														<label style="position: absolute;right: 25px;bottom: 50px;"><input type="radio" name="P_vshow" value="1" <?php if($P_vshow==1){echo "checked='checked'";}?> >底部显示</label>
														<p style="font-size: 12px;margin-top: 10px;"><button class="btn btn-sm btn-primary" type="button" onClick="showUpload('P_video','P_video','../media',1,null,'','');">上传视频</button> *如果您不知道如何使用视频功能，请点击<a href="<?php echo $url_from?>/h18.html" target="_blank">查看帮助</a></p>
													</div>
												</div>


												<div class="form-group row">
													<label class="col-md-2 col-form-label">商品Tag</label>
													<div class="col-md-4">
														<textarea name="P_tag" class="form-control" rows="3" placeholder="多个标签用空格隔开"><?php echo $P_tag?></textarea>
														<p style="font-size: 12px;margin-top: 10px;">*使用Tag功能，方便用户快速定位具有相同标签的商品，多个标签用空格隔开</p>
													</div>
												
													<label class="col-md-2 col-form-label">商品参数</label>
													<div class="col-md-4">
														
														<textarea id="P_shuxing" name="P_shuxing" class="form-control" rows="3" placeholder="格式：参数名:参数值（每行一个）"><?php echo $P_shuxing?></textarea>
														<p style="font-size: 12px;margin-top: 10px;">*举例：颜色:黑色 </p>
														<div style="float: right;margin-top: -35px"><label><input type="checkbox" name="P_tpl" value="1" <?php if($P_tpl==1){echo "checked='checked'";}?>>设为模板</label> <button class="btn btn-sm btn-info" type="button" onclick="$('#tpl').show()">调用模板</button></div>

														<div style="max-height: 100px;overflow: auto;background: #ffffff;padding:10px; font-size: 12px;display: none;" id="tpl">
															<?php

															$sql="select * from sl_product where P_tpl=1 and P_del=0";
															$result = mysqli_query($conn,  $sql);
															if (mysqli_num_rows($result) > 0) {
															while($row = mysqli_fetch_assoc($result)) {
															        echo "<div>".$row["P_shuxing"]." <button class=\"btn btn-sm btn-info\" type=\"button\" onclick=\"$('#tpl').hide();$('#P_shuxing').val('".str_replace("\r\n","\\r\\n",$row["P_shuxing"])."')\">调用</button></div>";
															    }
															} 
															?>
														</div>
													</div>
												</div>

												<div class="form-group row">
													<label class="col-md-2 col-form-label">商品规格</label>
													<div class="col-md-10" style="border: solid 1px #DDDDDD;background: #ffffff;border-radius: 10px;font-size: 12px">
														<?php
														$P_sx=$P_sx."<table id=\"tab1\" class=\"table table-hover table-condensed\"><tr><td>规格类</td><td>规格 / 加价</td></tr>";
														if($P_gg!=""){
															$shuxing=explode("@",$P_gg);
															
															for($j = 0;$j<count($shuxing);$j++){

															$P_sx=$P_sx. "<tr id='pd".($j+1)."' ><td><div class='input-group m-b'><span class='input-group-addon'>规格类</span><input type='text' name='sctitle_".$j."' value='".splitx($shuxing[$j],"_",0)."' class='form-control'/><input type='hidden' name='xsctitle_".$j."' value='".splitx($shuxing[$j],"_",0)."'/></div><input type='button' value='- 删除规格类' onclick='DelRow(".($j+1).")' style='margin:5px;' class='btn btn-sm btn-danger'/> <input type='button' value='＋ 新增一行' class='btn btn-sm btn-info' onclick='AddRow2(\"table".$j."\",".$j.")' style='margin:5px;'/></td><td>";
															$P_sx=$P_sx. "<table width='100%' bgcolor='#FFFFFF' id='table".$j."'>";

															$sc=explode("|",splitx($shuxing[$j],"_",1));
															$sp=explode("|",splitx($shuxing[$j],"_",2));
															$pc=explode("|",splitx($shuxing[$j],"_",3));

															for($i = 0 ;$i<count($sc);$i++){
															$P_sx=$P_sx. "<tr id='pd".$j."_".$i."' ><td>
															<div class='input-group m-b'>
															<span class='input-group-addon'>规格</span>
															<input type='text' name='scvvvv".$j."_".$i."' value='".$sc[$i]."'  class='form-control'/>
															<input type='hidden' name='pcvvvv".$j."_".$i."' id='pcvvvv".$j."_".$i."' value='".$pc[$i]."'>";
															if($pc[$i]!=""){
																$P_sx=$P_sx. "<img src='../media/".$pc[$i]."' id='pcvvvv".$j."_".$i."x' onClick=\"\$('#pcvvvv".$j."_".$i."btn').show();showUpload('pcvvvv".$j."_".$i."','pcvvvv".$j."_".$i."','../media',1,null,'','');\" class='gg_pic' alt='<img src=\"../media/".$pc[$i]."\" class=\"showpicx\">'><div class='remove_pic' id='pcvvvv".$j."_".$i."btn' onclick='removepic(\"pcvvvv".$j."_".$i."\")'>×</div>";
															}else{
																$P_sx=$P_sx. "<img src='../media/upic.png' id='pcvvvv".$j."_".$i."x' onClick=\"\$('#pcvvvv".$j."_".$i."btn').show();showUpload('pcvvvv".$j."_".$i."','pcvvvv".$j."_".$i."','../media',1,null,'','');\"style='width:30px;height:30px;position:absolute;right:4px;top:4px;' alt='<img src=\"../media/upic.png\" class=\"showpicx\">'><div class='remove_pic' style='display:none' id='pcvvvv".$j."_".$i."btn' onclick='removepic(\"pcvvvv".$j."_".$i."\")'>×</div>";
															}

															$P_sx=$P_sx. "</div>
															</td><td><div class='input-group m-b'><span class='input-group-addon'>加价</span><input type='text' name='spvvvv".$j."_".$i."' value='".$sp[$i]."'  class='form-control'/><span class='input-group-addon'>元</span></div></td><td><input type='button' value='- 删除' onclick='DelRow2(\"table".$j."\",\"".$j."_".$i."\")' class='btn btn-sm btn-warning' style='margin:5px;'/></td></tr>";
															}
															$P_sx=$P_sx. "</table>";

															$P_sx=$P_sx. "</td></tr>";
															}
															}
															$P_sx=$P_sx."</table>";
															echo $P_sx;
														?>
														<hr>
														<button type="button" class="btn btn-sm btn-info" id="gg_btn" onclick="AddRow()" style="margin:5px;"> ＋ 新增规格类</button>
														<button type="button" class="btn btn-sm btn-primary" id="ggsell_btn" onclick="setsell()" style="margin:5px;"> 设置单项发货内容</button>
														<div style="font-size: 12px;color: #AAAAAA;display: inline-block;margin-left: 20px;">*不会设置？点击<a href="<?php echo $url_from?>/h33.html" target="_blank">查看帮助</a></div>
													</div>
												</div>

												<div class="form-group row">
													<label class="col-md-2 col-form-label">付款留言框</label>
													<div class="col-md-10" style="border: solid 1px #DDDDDD;background: #ffffff;border-radius: 10px;font-size: 12px">
														<table class="table" id="msg1">

														<?php
														if($P_msg!=""){
															$kf=explode("|",$P_msg);
															for($i=0;$i<count($kf);$i++){
																if(splitx($kf[$i],"_",2)=="text"){
																	$text="selected='selected'";
																}else{
																	$text="";
																}

																if(splitx($kf[$i],"_",2)=="textarea"){
																	$textarea="selected='selected'";
																}else{
																	$textarea="";
																}

																if(splitx($kf[$i],"_",2)=="radio"){
																	$radio="selected='selected'";
																}else{
																	$radio="";
																}

																if(splitx($kf[$i],"_",2)=="checkbox"){
																	$checkbox="selected='selected'";
																}else{
																	$checkbox="";
																}

																if(splitx($kf[$i],"_",2)=="select"){
																	$select="selected='selected'";
																}else{
																	$select="";
																}

																if(splitx($kf[$i],"_",3)==1){
																	$r1="selected='selected'";
																	$r0="";
																}else{
																	$r1="";
																	$r0="selected='selected'";
																}


																echo '<tr id="mm'.$i.'"><td><div class="input-group">
															            <input type="text" placeholder="名称" name="msgmsg1_'.$i.'" class="form-control" value="'.splitx($kf[$i],"_",0).'" style="width:30%">
															            <input type="text" placeholder="内容" name="msgmsg2_'.$i.'" class="form-control" value="'.splitx($kf[$i],"_",1).'" style="width:35%">
															            <select class="form-control" name="msgmsg3_'.$i.'" style="width:15%">
															            	<option value="text" '.$text.'>文本框</option>
															            	<option value="textarea" '.$textarea.'>文本域</option>
															            	<option value="radio" '.$radio.'>单选按钮</option>
															            	<option value="checkbox" '.$checkbox.'>多选按钮</option>
															            	<option value="select" '.$select.'>下拉列表</option>
															            </select>
															            <select class="form-control" name="msgmsg4_'.$i.'" style="width:10%">
															            	<option value="1" '.$r1.'>必填</option>
															            	<option value="0" '.$r0.'>选填</option>
															            </select>
															            <span class="input-group-btn" style="width:10%">
															                    <button class="btn btn-primary m-b-5  m-t-5" type="button" onclick="DelMsg('.$i.')">－ 删除</button>
															            </span>
															    </div></td></tr>';
															}
														}
															
														?>
													</table>
													<button type="button" class="btn btn-primary btn-sm" onclick="AddMsg()" style="margin:5px;">＋ 新增一行</button>
													</div>
												</div>

												<div class="form-group row">
													<label class="col-md-2 col-form-label">发货页备注</label>
													<div class="col-md-10">
														<textarea  name="P_bz" class="form-control" placeholder=""><?php echo $P_bz?></textarea>
													</div>
												</div>
											</div>

												<div class="form-group row">
													<label class="col-md-2 col-form-label" >商品介绍</label>
													<div class="col-md-10">
														<script charset='utf-8' src='../kindeditor/kindeditor-all-min.js'></script>
		                                                <script charset='utf-8' src='../kindeditor/lang/zh-CN.js'></script>
		                                                <script>KindEditor.ready(function(K) {window.editor = K.create('#content', {uploadJson : '../kindeditor/php/upload_json.php', fileManagerJson : '../kindeditor/php/file_manager_json.php',allowFileManager : true,items:[
        'source', '|', 'undo', 'redo', '|', 'preview', 'print', 'template', 'code', 'cut', 'copy', 'paste',
        'plainpaste', 'wordpaste', '|', 'justifyleft', 'justifycenter', 'justifyright',
        'justifyfull', 'insertorderedlist', 'insertunorderedlist', 'indent', 'outdent', 'subscript',
        'superscript', 'clearhtml', 'quickformat', 'selectall', '|', 'fullscreen', '/',
        'formatblock', 'fontname', 'fontsize', '|', 'forecolor', 'hilitecolor', 'bold',
        'italic', 'underline', 'strikethrough', 'lineheight', 'removeformat', '|', 'image', 'multiimage',
        'insertfile', 'table', 'hr', 'emoticons', 'baidumap', 'pagebreak',
        'anchor', 'link', 'unlink', '|', 'about'
] });});</script>
		                                                <textarea name='P_content' style='width:100%;height:350px;' id='content'><?php echo $P_content?></textarea>
		                                                <label style="font-size: 12px;margin-top: 5px;text-align: right;"><input id="savepic" type="checkbox" value="1" name="savepic">保存编辑器内的远程图片到本地</label>
													</div>
												</div>

												<div class="form-group row">
													<label class="col-md-2 col-form-label" ></label>
													<div class="col-md-10">
														<button class="btn btn-info" type="button" onClick="save(1)">保存</button>
														<button class="btn btn-primary" type="button" onClick="save(2)">保存并返回</button>
														<div class="pull-right">无商品可卖？<a href="wholesale.php" target="_balnk" class="btn btn-sm btn-success"><i class="fa fa-shopping-cart"></i> 货源采购</a></div>
													</div>
												</div>
										</div>
									</div>
								</div>
							</div>
							
							</form>
						</div>
					</section>
				</div>
			</div>
		</div>

		<div id="sellModal" class="modal fade">
			<div class="modal-dialog modal-lg" role="document" >
				<div class="modal-content " style="width: 1000px">
					<div class="modal-header pd-x-20">
						<h6 class="modal-title">设置单项发货内容</h6>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<form id="form2">
						<table class="table" id="sell1">
														<?php
														if($P_ggsell!=""){
															$ggsell=explode("\n",$P_ggsell);

															for($i=0;$i<count($ggsell);$i++){

																if(splitx($ggsell[$i],"|",0)=="0"){
																	$s1="selected='selected'";
																}else{
																	$s1="";
																}
																if(splitx($ggsell[$i],"|",0)=="1"){
																	$s2="selected='selected'";
																}else{
																	$s2="";
																}
																if(splitx($ggsell[$i],"|",0)=="2"){
																	$s3="selected='selected'";
																}else{
																	$s3="";
																}

																echo '<tr id="pp'.$i.'"><td><div class="input-group">
															            <select class="form-control" name="sellic1_'.$i.'" style="width:20%">
															            	<option value="0" '.$s1.'>固定内容</option>
															            	<option value="1" '.$s2.'>卡密发卡</option>
															            	<option value="2" '.$s3.'>实物商品</option>
															            </select>
															            <div style="display:inline;width:70%">
															            <textarea placeholder="发货内容" name="sellic2_'.$i.'" class="form-control">'.splitx($ggsell[$i],"|",1).'</textarea>
															            </div>
															            <span class="input-group-btn" style="width:10%">
															                    <button class="btn btn-primary m-b-5  m-t-5" type="button" onclick="DelSell('.$i.')">－ 删除</button>
															            </span>
															    </div></td></tr>';
															}
														}
														?>
</table>
</form>
														<button type="button" class="btn btn-primary btn-sm" onclick="AddSell()">＋ 新增一项发货</button>
						<p style="font-size: 12px;margin-top: 10px;">设置说明：<br>
							1.如果设置单项发货内容，数目需与规格数一致<br>
							2.如果不设置单项发货内容，则所有规格调用总发货内容</br>
							3.当发货类型为“卡密发卡”时，填写卡密分类对应的ID</p>
					</div>
				</div>
			</div>
		</div>

		<script src="assets/js/jquery.min.js"></script>
		<script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>
		<script src="assets/plugins/toggle-menu/sidemenu.js"></script>
		<script src="assets/plugins/scroll-bar/jquery.mCustomScrollbar.concat.min.js"></script>
		<script src="assets/js/scripts.js"></script>
		<script src="assets/js/help.js"></script>
		<script src="assets/plugins/toastr/build/toastr.min.js"></script>

		<script type="text/javascript">
		var $P_selltype=<?php echo $P_selltype?>;
		$("#P_sell1").hide();
		$("#P_sell2").hide();
		$("#P_sell3").hide();
		switch($P_selltype){
			case 0:
			$("#P_sell1").show();
			break;

			case 1:
			$("#P_sell2").show();
			break;

			case 2:
			$("#P_sell3").show();
			break;
		}
		function setsell(){
			$('#sellModal').modal('show');
		}
		function getdate(){
			var day1 = new Date();
			day1.setDate(day1.getDate());
			var s1 = day1.format("yyyy-MM-dd hh:mm:ss");
			$("#P_time").val(s1);
		}
		
		function change(id){
			$("#P_sell1").hide();
			$("#P_sell2").hide();
			$("#P_sell3").hide();

			switch(id){
				case 0:
				$("#P_sell1").show();
				break;

				case 1:
				$("#P_sell2").show();
				break;

				case 2:
				$("#P_sell3").show();
				break;
			}
		}
		function removepic(id){
			$("#"+id).val("");
			$("#"+id+"x").attr("src","../media/upic.png");
			$("#"+id+"x").attr("alt","");
			$("#"+id+"btn").hide();
		}

		function save(id){
			editor.sync();
				$.ajax({
            	url:'?action=<?php echo $aa?>',
            	type:'post',
            	data:$("#form").serialize()+"&"+$("#form2").serialize(),
            	success:function (data) {
            	data=JSON.parse(data);
            	if(data.msg=="success"){
            		if(id==1){
	            		if(data.P_id==0){
	            			toastr.success("保存成功", "成功");
	            		}else{
	            			window.location.href="product_add.php?P_id="+data.P_id;
	            		}
            		}else{
            			window.location.href="product_list.php";
            		}
            	}else{

            		toastr.error(data.msg, '错误');
            	}
            	}
            });

			}

			function caiji(){
				toastr.warning('请稍等...','');
					$.ajax({
	            	url:'news_add.php?action=caiji',
	            	type:'post',
	            	data:{url:$("#url").val()},
	            	success:function (data) {
		            	data=JSON.parse(data);
		            	if(data.msg=="success"){
		            		toastr.success("采集成功", "成功");
		            		$("#P_title").val(data.title);
		            		$("#picpic1_0").val(data.img);
		            		$("#picpic1_0x").attr("src","../media/"+data.img);
		            		$("#P_keywords").val(data.keyword);
		            		$("#P_description").val(data.description);
		            		$("#savepic").attr("checked","checked");
		            		editor.html(data.content);
		            	}else{
		            		toastr.error(data.msg, '错误');
		            	}
	            	}
	            });

			}

function creat(){
   $("#P_code").val(randomWord(false,32));
}

function randomWord(randomFlag, min, max){
    var str = "",
        range = min,
        arr = ['0', '1', '2', '3', '4', '5', '6', '7', '8', '9', 'a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z', 'A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z'];
 
    // 随机产生
    if(randomFlag){
        range = Math.round(Math.random() * (max-min)) + min;
    }
    for(var i=0; i<range; i++){
        pos = Math.round(Math.random() * (arr.length-1));
        str += arr[pos];
    }
    return str;
}

			$(function() { $('.buy label').click(function(){var aa = $(this).attr('aa');$('[aa="'+aa+'"]').removeAttr('class') ;$(this).attr('class','checked');});});

			Date.prototype.format = function (fmt) {
			    var o = {
			        "M+": this.getMonth() + 1, //月份
			        "d+": this.getDate(), //日
			        "h+": this.getHours(), //小时
			        "m+": this.getMinutes(), //分
			        "s+": this.getSeconds(), //秒
			        "q+": Math.floor((this.getMonth() + 3) / 3), //季度
			        "S": this.getMilliseconds() //毫秒
			    };
			    if (/(y+)/.test(fmt)) fmt = fmt.replace(RegExp.$1, (this.getFullYear() + "").substr(4 - RegExp.$1.length));
			    for (var k in o)
			        if (new RegExp("(" + k + ")").test(fmt)) fmt = fmt.replace(RegExp.$1, (RegExp.$1.length == 1) ? (o[k]) : (("00" + o[k]).substr(("" + o[k]).length)));
			    return fmt;
			}
document.addEventListener('keydown', function(e) {
  if (e.keyCode == 83 && (navigator.platform.match("Mac") ? e.metaKey : e.ctrlKey))      {
        e.preventDefault();
        save(1);
      }
});
		</script>
	</body>
</html>
