<?php 
require '../conn/conn.php';
require '../conn/function.php';
require 'member_check.php';

if($M_type==0 || time()-strtotime($M_sellertime)>$M_sellerlong*86400){//商家到期
	Header("Location:seller.php");
	die();
}

$action=$_GET["action"];
$P_id=intval($_GET["P_id"]);
$dirx=splitx($_SERVER["PHP_SELF"],$C_admin,0);
$D_domain=splitx($_SERVER["HTTP_HOST"].$_SERVER["PHP_SELF"],"/$C_admin",0);

if($P_id!=""){
	$title="编辑";
	$aa="edit&P_id=".$P_id;
	$sql="select * from sl_product,sl_psort where P_sort=S_id and P_id=$P_id and P_mid=$M_id";

	$result = mysqli_query($conn, $sql);
	$row = mysqli_fetch_assoc($result);
	if (mysqli_num_rows($result) > 0) {
		$P_pic=$row["P_pic"];
		$P_title=$row["P_title"];
		$S_title=$row["S_title"];
		$P_content=$row["P_content"];
		$P_price=$row["P_price"];
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

		$P_taobao=$row["P_taobao"];
		$P_vip=$row["P_vip"];

		$P_tpl=$row["P_tpl"];
		$P_keywords=$row["P_keywords"];
		$P_description=$row["P_description"];
		$P_vshow=$row["P_vshow"];
		$P_mid=$row["P_mid"];
		$P_address=$row["P_address"];
		$P_ggsell=$row["P_ggsell"];
		if($P_time==""){
			$P_time=date('Y-m-d H:i:s');
		}
	}
}else{
	$title="新增";
	$aa="add";
	$P_pic="nopic.png";
	$P_selltype=0;
	$P_rest=100;
	$P_sh=1;
	$P_unlogin=1;
	$P_fx=1;
	$P_time=date('Y-m-d H:i:s');

	$P_vip=1;

	$P_tpl=0;
	$P_vshow=0;
	$P_address="name,mobile,address";
	$P_price3=0;
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
			if($_POST[$x]==""){
				die("{\"msg\":\"规格名称不可留空\"}");
			}else{
				$shuxing=$shuxing.$_POST[$x]."_".$sc."_".$sp."@";
			}
		}
		$sc="";
		$sp="";
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
	$P_content=$_POST["P_content"];
	$P_price=round($_POST["P_price"],2);

	$P_sort=intval($_POST["P_sort"]);
	$P_order=intval($_POST["P_order"]);
	$P_selltype=intval($_POST["P_selltype"]);
	$P_rest=intval($_POST["P_rest"]);
	$P_sh=intval($C_punsh);
	$P_unlogin=intval($_POST["P_unlogin"]);
	$P_fx=intval($_POST["P_fx"]);

	$P_vip=intval($_POST["P_vip"]);

	$P_tpl=intval($_POST["P_tpl"]);
	$P_vshow=intval($_POST["P_vshow"]);
	$P_tag=$_POST["P_tag"];
	$P_video=$_POST["P_video"];
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
		mysqli_query($conn,"insert into sl_product(P_pic,P_title,P_content,P_price,P_sort,P_order,P_selltype,P_sell,P_rest,P_sh,P_unlogin,P_fx,P_tag,P_shuxing,P_video,P_time,P_taobao,P_vip,P_tpl,P_keywords,P_description,P_address,P_vshow,P_gg,P_ggsell,P_mid) values('$P_pic','$P_title','$P_content',$P_price,$P_sort,$P_order,$P_selltype,'$P_sell',$P_rest,$P_sh,$P_unlogin,$P_fx,'$P_tag','$P_shuxing','$P_video','$P_time','$P_taobao',$P_vip,$P_tpl,'$P_keywords','$P_description','$P_address',$P_vshow,'$shuxing','$P_ggsell',$M_id)");

		$P_id=getrs("select * from sl_product where P_title='$P_title' and P_pic='$P_pic' and P_sort=$P_sort","P_id");
		if($C_punsh==0 && $C_dx4==1){
			sendsms("【".$C_smssign."】有商户发布商品等待审核，请登录后台处理",$C_mobile);
		}
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

			if($_POST[$x]==""){
				die("{\"msg\":\"规格名称不可留空\"}");
			}else{
				$shuxing=$shuxing.$_POST[$x]."_".$sc."_".$sp."@";
			}
		}
		$sc="";
		$sp="";
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
	$P_content=$_POST["P_content"];
	$P_price=round($_POST["P_price"],2);
	$P_sort=intval($_POST["P_sort"]);
	$P_order=intval($_POST["P_order"]);
	$P_selltype=intval($_POST["P_selltype"]);
	$P_rest=intval($_POST["P_rest"]);
	$P_sh=intval($C_punsh);
	$P_unlogin=intval($_POST["P_unlogin"]);
	$P_fx=intval($_POST["P_fx"]);
	
	$P_vip=intval($_POST["P_vip"]);

	$P_tpl=intval($_POST["P_tpl"]);
	$P_vshow=intval($_POST["P_vshow"]);
	$P_tag=$_POST["P_tag"];
	$P_video=$_POST["P_video"];
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
		P_sort=$P_sort,
		P_order=$P_order,
		P_selltype=$P_selltype,
		P_rest=$P_rest,
		P_sh=$P_sh,
		P_unlogin=$P_unlogin,
		P_fx=$P_fx,

		P_sell='$P_sell',
		P_tag='$P_tag',
		P_shuxing='$P_shuxing',
		P_gg='$shuxing',
		P_time='$P_time',
		P_ggsell='$P_ggsell',
		P_video='$P_video',
		P_keywords='$P_keywords',
		P_description='$P_description',
		P_address='$P_address',
		P_vip=$P_vip,

		P_tpl=$P_tpl,
		P_vshow=$P_vshow,
		P_taobao='$P_taobao'
		where P_id=$P_id and P_mid=$M_id");
		if($C_punsh==0 && $C_dx4==1){
			sendsms("【".$C_smssign."】有商户发布商品等待审核，请登录后台处理",$C_mobile);
		}
		die("{\"msg\":\"success\",\"P_id\":0}");
	}else{
		die("{\"msg\":\"请填全内容\"}");
	}
}

?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
  <meta charset="utf-8">
  <meta name="renderer" content="webkit">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
  <meta name="description" content="会员中心">
  <title>会员中心 - <?php echo $C_title?></title>
  <link href="../media/<?php echo $C_ico?>" rel="shortcut icon" />
  <!-- Stylesheets -->
  <link rel="stylesheet" href="../css/css/font-awesome.min.css">
  <link rel="stylesheet" href="css/bootstrap.css">
  <link rel="stylesheet" href="css/site.min.css">
  <!-- css plugins -->
  <link rel="stylesheet" href="css/icheck.min.css">
  <link rel="stylesheet" href="css/cropper.min.css">
  <link rel="stylesheet" href="../css/sweetalert.css">
 <script type="text/javascript" src="../upload/upload.js"></script>
		<style type="text/css">
		.showpic{height: 100px;border: solid 1px #DDDDDD;padding: 5px;max-width: 100%}
		.showpicx{width: 100%;max-width: 500px}
		.list-group a{text-decoration:none}
		.btn-danger{margin-top: 10px;}

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
 newTd0.innerHTML = "<div class='input-group m-b'><span class='input-group-addon'>规格名称</span><input type='text' name='sctitle_"+i+"' value='' class='form-control'/></div><input type='button' value='- 删除规格' class='btn btn-sm btn-danger' onclick='DelRow("+i+")' style='margin:5px;'/> <input type='button' value='＋ 新增一行' class='btn btn-sm btn-info' onclick='AddRow2(\"table"+i+"\","+i+")' style='margin:5px;'/>";
 newTd1.innerHTML ="<table width='100%' bgcolor='#FFFFFF' id='table"+i+"'><tr id='pd"+i+"_0"+"' ><td><div class='input-group m-b'><span class='input-group-addon'>规格值</span><input type='text' name='scvvvv"+i+"_0' value='' class='form-control'/></div></td><td><div class='input-group m-b'><span class='input-group-addon'>加价</span><input type='text' name='spvvvv"+i+"_0' value='' class='form-control'/><span class='input-group-addon'>元</span></div></td><td><input type='button' value='- 删除' class='btn btn-sm btn-warning' onclick='DelRow2(\"table"+i+"\",\""+i+"_0"+"\")' style='margin:5px;'/></td></tr></table>";
 

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
 newTd0.innerHTML = "<div class='input-group m-b'><span class='input-group-addon'>规格值</span><input type='text' name='scvvvv"+j+"_"+i+"' value='' class='form-control'/></div>";
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
 newTd0.innerHTML ='<div class="input-group"><select class="form-control" name="sellic1_'+i+'" style="width:20%;display:inline;float:left"><option value="0">固定内容</option><option value="1">卡密发卡</option><option value="2">实物商品</option></select><div style="display:inline;width:70%;float:left"><textarea placeholder="发货内容" name="sellic2_'+i+'" class="form-control"></textarea></div><span class="input-group-btn" style="width:10%"><button class="btn btn-primary m-b-5  m-t-5" type="button" onclick="DelSell('+i+')">－ 删除</button></span></div>';
}
function DelSell(i){
  var Container = document.getElementById("sell1");    
    var _tr=document.getElementById("pp"+i);  
    row=_tr.rowIndex;
    Container.deleteRow(row); 
}
	</script>

  
</head>

<body class="body-index">
<?php require 'top.php';?>
		<div class="container m_top_30">
			<div class="yto-box">
				<div class="row">
					<div class="col-sm-2 hidden-xs">
			<h5 class="p_bottom_10">商品管理</h5>
		<ul class="nav nav-pills nav-stacked">
	        <li ><a href="product_sell.php">商品列表</a></li>
	        <li class="active"><a href="product_add.php">新增商品</a></li>
	        <hr>
	        <li><a href="card_sell.php">卡密列表</a></li>
	        <li><a href="card_add.php">新增卡密</a></li>
	        <li><a href="csort_list.php">卡密分类</a></li>
	        <li><a href="csort_add.php">新增分类</a></li>
	     </ul>
					</div>
					<div class="col-sm-10 b-left">
						
						
						<div class="panel panel-default">
							<div class="panel-heading"><?php echo $title?>商品</div>
							<div class="panel-body">
								<form id="form">
							<div class="row">
								

								<div class="col-lg-12">
									<div class="card card-primary">
										
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
													<div style="margin: 10px 0;font-size: 12px;color: #AAAAAA"><input type="checkbox" name="P_vip" value="1" <?php if($P_vip==1){echo "checked='checked'";}?>>参与VIP打折活动 <a href="vip.php">[设置折扣]</a>
														
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
													

													<label class="col-md-2 col-form-label" >商品排序</label>
													<div class="col-md-4" style="position: relative;">
														<input type="text"  name="P_order" class="form-control" value="<?php echo $P_order?>" placeholder="数字越小越靠前">
													</div>
													
												</div>


												<div class="form-group row">
													<label class="col-md-2 col-form-label" ><p>发货类型</p><p>发货内容</p></label>
													<div class="col-md-10">
														<div class="buy">
															<label aa="P_selltype" <?php if($P_selltype==0){echo "class='checked'";}?>><input type="radio" name="P_selltype" value="0" onclick="change(0)" <?php if($P_selltype==0){echo "checked='checked'";}?>> [自动发货]固定内容</label>
															<label aa="P_selltype" <?php if($P_selltype==1){echo "class='checked'";}?>><input type="radio" name="P_selltype" value="1" onclick="change(1)" <?php if($P_selltype==1){echo "checked='checked'";}?>> [自动发货]卡密</label>
															<label aa="P_selltype" <?php if($P_selltype==2){echo "class='checked'";}?>><input type="radio" name="P_selltype" value="2" onclick="change(2)" <?php if($P_selltype==2){echo "checked='checked'";}?>> [手动发货]实物</label>
															<div style="font-size: 12px;color: #AAAAAA;display: inline-block;margin-left: 20px;">*不会设置？点击<button class="btn btn-primary btn-xs" type="button" data-toggle="modal" data-target="#myModal">查看帮助</button></div>
														</div>
														<div id="P_sell1" style="position: relative;">
															<textarea id="P_file" name="P_sell[]" class="form-control" rows="3" placeholder="输入固定发货内容或上传附件" ><?php echo $P_sell?></textarea>
															<button type="button" class="btn btn-sm btn-info" style="position: absolute;right: 10px;bottom: 10px;" onClick="showUpload('P_file','<?php echo gethttp().$D_domain?>','../media');"><i class="fa fa-paperclip"></i> 上传附件</button>
														</div>
														<div id="P_sell2">
														<select class="form-control" name="P_sell[]">
															<option value="0">请选择一个卡密分类</option>
															<?php
																$sql="select * from sl_csort where S_del=0 and S_mid=$M_id order by S_id desc";
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
														<a href="card_sell.php" target="_blank" class="btn btn-info btn-sm" style="margin-top: 10px;">管理卡密</a>
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
														<p style="font-size: 12px;margin-top: 10px;"> *可以填写外部购买链接，点击购买时自动跳转</p>
													</div>
												
													<label class="col-md-2 col-form-label">插入视频</label>
													<div class="col-md-4">
														<textarea name="P_video" id="P_video" class="form-control" rows="3" placeholder="上传mp4视频或者粘贴视频代码"><?php echo $P_video?></textarea>
														<label style="position: absolute;right: 100px;bottom: 50px;"><input type="radio" name="P_vshow" value="0" <?php if($P_vshow==0){echo "checked='checked'";}?> >顶部显示</label>
														<label style="position: absolute;right: 25px;bottom: 50px;"><input type="radio" name="P_vshow" value="1" <?php if($P_vshow==1){echo "checked='checked'";}?> >底部显示</label>
														<p style="font-size: 12px;margin-top: 10px;"><button class="btn btn-sm btn-primary" type="button" onClick="showUpload('P_video','P_video','../media',1,null,'','');">上传视频</button> *不知道如何使用？请<button class="btn btn-primary btn-xs" type="button" data-toggle="modal" data-target="#myModal2">查看帮助</button></p>
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
														$P_sx=$P_sx."<table id=\"tab1\" class=\"table table-hover table-condensed\"><tr><td>规格名称</td><td>规格值 / 加价</td></tr>";
														if($P_gg!=""){
															$shuxing=explode("@",$P_gg);
															
															for($j = 0;$j<count($shuxing);$j++){

															$P_sx=$P_sx. "<tr id='pd".($j+1)."' ><td><div class='input-group m-b'><span class='input-group-addon'>规格名称</span><input type='text' name='sctitle_".$j."' value='".splitx($shuxing[$j],"_",0)."' class='form-control'/><input type='hidden' name='xsctitle_".$j."' value='".splitx($shuxing[$j],"_",0)."'/></div><input type='button' value='- 删除规格' onclick='DelRow(".($j+1).")' style='margin:5px;' class='btn btn-sm btn-danger'/> <input type='button' value='＋ 新增一行' class='btn btn-sm btn-info' onclick='AddRow2(\"table".$j."\",".$j.")' style='margin:5px;'/></td><td>";
															$P_sx=$P_sx. "<table width='100%' bgcolor='#FFFFFF' id='table".$j."'>";

															$sc=explode("|",splitx($shuxing[$j],"_",1));
															$sp=explode("|",splitx($shuxing[$j],"_",2));

															for($i = 0 ;$i<count($sc);$i++){
															$P_sx=$P_sx. "<tr id='pd".$j."_".$i."' ><td><div class='input-group m-b'><span class='input-group-addon'>规格值</span><input type='text' name='scvvvv".$j."_".$i."' value='".$sc[$i]."'  class='form-control'/><input type='hidden' name='xscvvvv".$j."_".$i."' value='".$sc[$i]."'/></div></td><td><div class='input-group m-b'><span class='input-group-addon'>加价</span><input type='text' name='spvvvv".$j."_".$i."' value='".$sp[$i]."'  class='form-control'/><span class='input-group-addon'>元</span></div></td><td><input type='button' value='- 删除' onclick='DelRow2(\"table".$j."\",\"".$j."_".$i."\")' class='btn btn-sm btn-warning' style='margin:5px;'/></td></tr>";
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
														
													</div>
												</div>
										</div>
									</div>
								</div>
							</div>
							
							</form>
									</div>
				</div>
			</div>
			</div>
			</div>
			
		</div>

	</div>
	
	<style> 
.modal-body img{border:solid 1px #CCCCCC;margin-bottom: 20px;border-radius: 10px;box-shadow:0px 0px 10px #aaaaaa;max-width: 100%}
</style>
<!-- 模态框（Modal） -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog" style="width: 100%;max-width: 1000px">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
					&times;
				</button>
				<h4 class="modal-title" id="myModalLabel">
					如何设置自动发货内容？
				</h4>
			</div>
			<div class="modal-body">
				<p>发货100-虚拟商品自动发货系统主打的功能为自动发货和付费阅读</p>
            <img src="<?php echo $url_from?>/images/6.1.png">
            <div class="description">
                <p>1.进入网站后台，点击左侧的内容管理-商品管理-新增商品，可以看到有3种发货方式</p>
            </div>
            <img src="<?php echo $url_from?>/images/6.2.png">
            <div class="description">
                <p>（1）固定内容：即不同用户购买，发货相同的内容，可以设置下载链接、解压密码等可以重复使用的商品；
                由于每次都是发货固定内容，因此无需设置库存（前台库存会显示为充足），且购买时只可购买一件</p>
            </div>
            <img src="<?php echo $url_from?>/images/6.3.png">
            <div class="description">
                <p>（2）卡密：即不同用户购买，发货不同的内容，可以设置激活码、CDK、优惠码等一次性商品；
                需要配合卡密模块进行使用，选择相应的卡密分类即可，缺货时会有缺货提醒</p>
            </div>
            <img src="<?php echo $url_from?>/images/6.4.png">
            <div class="description">
                <p>（3）实物商品：比如衣服、手机、食品等实物商品，用户付款后，需要手动使用快递发货，可以设置库存（商品余量）</p>
            </div>
        </div>

			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">关闭
				</button>
				<button type="button" class="btn btn-primary">
					提交更改
				</button>
			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal -->
</div>



<!-- 模态框（Modal） -->

<div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog" style="width: 100%;max-width: 1000px">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
					&times;
				</button>
				<h4 class="modal-title" id="myModalLabel">
					商品/文章模块如何插入视频？
				</h4>
			</div>
			<div class="modal-body">
				<p>发货100目前支持3种插入视频的方式</p>
<p>（1）自行上传mp4视频</p>
<p>（2）外链播放器代码，如优酷，爱奇艺等</p>
<p>（3）外链视频URL</p>
<p>下面详细介绍如何使用：</p>
<p><b>（1）自行上传mp4视频</b></p>
<p>如果视频小于2M，可以使用上传视频的按钮进行上传，如果视频大于2M，可以通过FTP将视频上传到media文件夹，然后填写视频名称即可。</p>
<img src="<?php echo $url_from?>/images/18.1.png">
<p><b>（2）外链播放器代码</b></p>
<p>举例：访问优酷，找到视频播放页面，点击分享-复制通用代码，然后粘贴代码即可</p>
<img src="<?php echo $url_from?>/images/18.2.png">
<img src="<?php echo $url_from?>/images/18.3.png">
<p><b>（3）外链视频URL</b></p>
<p>如果视频文件在其他服务器上，可以直接填写完整的视频URL，举例：http://www.aaa.com/1.mp4，也可以播放视频</p>
<img src="<?php echo $url_from?>/images/18.4.png">
<p>注意事项：小程序和APP内仅支持第1种和第3种视频播放</p>
            </div>

			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">关闭
				</button>
				<button type="button" class="btn btn-primary">
					提交更改
				</button>
			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal -->
</div>

<div class="modal fade" id="sellModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

			<div class="modal-dialog modal-lg" role="document" >
				<div class="modal-content " style="width: 1000px">
					<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
					&times;
				</button>
				<h4 class="modal-title" id="myModalLabel">
					设置单项发货内容
				</h4>
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
															            <select class="form-control" name="sellic1_'.$i.'" style="width:20%;display:inline;float:left">
															            	<option value="0" '.$s1.'>固定内容</option>
															            	<option value="1" '.$s2.'>卡密发卡</option>
															            	<option value="2" '.$s3.'>实物商品</option>
															            </select>
															            <div style="display:inline;width:70%;float:left">
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
<?php 
require 'foot.php';
?>

	<!-- js plugins  -->
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>

	<script src="js/page.js"></script>
	<script src="../js/sweetalert.min.js"></script>
	<script>
$(function() { $('.buy label').click(function(){var aa = $(this).attr('aa');$('[aa="'+aa+'"]').removeAttr('class') ;$(this).attr('class','checked');});});
	</script>
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
		function setsell(){
			$('#sellModal').modal('show');
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
	            			alert("保存成功");
	            		}else{
	            			window.location.href="product_add.php?P_id="+data.P_id;
	            		}
            		}else{
            			window.location.href="product_sell.php";
            		}
            	}else{
            		alert(data.msg);
            	}
            	}
            });

			}
			function getdate(){
			var day1 = new Date();
			day1.setDate(day1.getDate() - 1);
			var s1 = day1.format("yyyy-MM-dd hh:mm:ss");
			$("#P_time").val(s1);
		}
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
		</script>
</body>
</html>