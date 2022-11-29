<?php
require '../conn/conn.php';
require '../conn/function.php';
require 'admin_check.php';

if($config->quan!="true"){
	die();
}

$page=$_GET["page"];
$action=$_GET["action"];
$Q_id=intval($_GET["Q_id"]);

if($page==""){
	$page=1;
}

if($Q_id!=""){
	$aa="edit&Q_id=".$Q_id;
	$sql="select * from sl_quan where Q_id=".$Q_id;
	$result = mysqli_query($conn, $sql);
	$row = mysqli_fetch_assoc($result);
	if (mysqli_num_rows($result) > 0) {
		$Q_title=$row["Q_title"];
		$Q_code=$row["Q_code"];
		$Q_pid=$row["Q_pid"];
		$Q_money=$row["Q_money"];
		$Q_discount=$row["Q_discount"];
		$Q_minuse=$row["Q_minuse"];
		$Q_gettime=$row["Q_gettime"];
		$Q_usetime=$row["Q_usetime"];
		$Q_order=$row["Q_order"];
		$Q_hide=$row["Q_hide"];
	}
	$title="编辑";
}else{
	$aa="add";
	$title="新增";
	$Q_pid=0;
	$Q_money=100;
	$Q_discount=0;
	$Q_minuse=0;
	$Q_gettime=date('Y-m-d H:i:s',strtotime('+10 day'));
	$Q_usetime=date('Y-m-d H:i:s',strtotime('+30 day'));
	$Q_order=1;
	$Q_hide=0;
}

if($action=="add"){
	$Q_num=intval($_POST["Q_num"]);
	$Q_title=$_POST["Q_title"];
	$Q_code=$_POST["Q_code"];
	$Q_pid=intval($_POST["Q_pid"]);
	$Q_order=intval($_POST["Q_order"]);
	$Q_hide=intval($_POST["Q_hide"]);
	$Q_money=round($_POST["Q_money"],2);
	$Q_discount=round($_POST["Q_discount"],2);
	$Q_minuse=round($_POST["Q_minuse"],2);
	$Q_gettime=$_POST["Q_gettime"];
	$Q_usetime=$_POST["Q_usetime"];

	if(getrs("select * from sl_quan where Q_title='$Q_title'","Q_id")!=""){
		die("{\"msg\":\"error\",\"msg\":\"优惠券名称不可重复\"}");
	}
	if($Q_money<$Q_minuse){
		die("{\"msg\":\"error\",\"msg\":\"优惠金额不得大于使用门槛\"}");
	}
	if($Q_discount<=0 && $Q_minuse<=0){
		die("{\"msg\":\"error\",\"msg\":\"减额和折扣至少设置一个优惠\"}");
	}
	if($Q_num<1){
		die("{\"msg\":\"error\",\"msg\":\"生成数量需大于0\"}");
	}

	if($Q_title!=""){
		for($i=0;$i<$Q_num;$i++){
			mysqli_query($conn,"insert into sl_quan(Q_mid,Q_title,Q_code,Q_pid,Q_money,Q_discount,Q_minuse,Q_gettime,Q_usetime,Q_fid,Q_hide,Q_order) values(0,'$Q_title','".gen_key(32)."',$Q_pid,$Q_money,$Q_discount,$Q_minuse,'$Q_gettime','$Q_usetime',0,$Q_hide,$Q_order)");
		}
		$Q_id=getrs("select * from sl_quan where Q_title='$Q_title' and Q_del=0","Q_id");
		mysqli_query($conn, "insert into sl_log(Q_aid,Q_time,Q_add,Q_ip,Q_title) values(".$_SESSION["A_id"].",'".date('Y-m-d H:i:s')."','".$_SESSION["add"]."','".getip()."','新增优惠券')");
		die("{\"msg\":\"success\",\"title\":\"".$Q_title."\",\"id\":\"".$Q_id."\"}");
	}else{
		die("{\"msg\":\"请填全信息\"}");
	}
}

if($action=="edit"){
	$Q=getrs("select * from sl_quan where Q_id=".$Q_id);
	$Q_title=$_POST["Q_title"];
	$Q_code=$_POST["Q_code"];
	$Q_pid=intval($_POST["Q_pid"]);
	$Q_order=intval($_POST["Q_order"]);
	$Q_hide=intval($_POST["Q_hide"]);
	$Q_money=round($_POST["Q_money"],2);
	$Q_discount=round($_POST["Q_discount"],2);
	$Q_minuse=round($_POST["Q_minuse"],2);
	$Q_gettime=$_POST["Q_gettime"];
	$Q_usetime=$_POST["Q_usetime"];

	if($Q["Q_title"]!=$Q_title && getrs("select * from sl_quan where Q_title='".$Q_title."'","Q_id")!=""){
		die("{\"msg\":\"error\",\"msg\":\"优惠券名称不可重复\"}");
	}
	
	if($Q_money<$Q_minuse){
		die("{\"msg\":\"error\",\"msg\":\"优惠金额不得大于使用门槛\"}");
	}

	if($Q_discount<=0 && $Q_minuse<=0){
		die("{\"msg\":\"error\",\"msg\":\"减额和折扣至少设置一个优惠\"}");
	}

	if($Q_title!=""){
		mysqli_query($conn, "update sl_quan set
		Q_title='$Q_title',
		Q_code='$Q_code',
		Q_pid=$Q_pid,
		Q_order=$Q_order,
		Q_hide=$Q_hide,
		Q_money=$Q_money,
		Q_discount=$Q_discount,
		Q_minuse=$Q_minuse,
		Q_gettime='$Q_gettime',
		Q_usetime='$Q_usetime'
		where Q_title='".$Q["Q_title"]."'");
		mysqli_query($conn, "insert into sl_log(Q_aid,Q_time,Q_add,Q_ip,Q_title) values(".$_SESSION["A_id"].",'".date('Y-m-d H:i:s')."','".$_SESSION["add"]."','".getip()."','编辑优惠券')");
		die("{\"msg\":\"success\",\"id\":\"".$Q_id."\"}");
	}else{
		die("{\"msg\":\"请填全信息\"}");
	}
}

if($action=="bu"){
	$id=intval($_POST["Q_id"]);
	$num=intval($_POST["num"]);
	for($i=0;$i<$num;$i++){
		$Q=getrs("select * from sl_quan where Q_id=".$id);
		mysqli_query($conn,"insert into sl_quan(Q_mid,Q_title,Q_code,Q_pid,Q_money,Q_discount,Q_minuse,Q_gettime,Q_usetime,Q_fid,Q_hide,Q_order) values(0,'".$Q["Q_title"]."','".gen_key(32)."',".$Q["Q_pid"].",".$Q["Q_money"].",".$Q["Q_discount"].",".$Q["Q_minuse"].",'".$Q["Q_gettime"]."','".$Q["Q_usetime"]."',".$Q["Q_fid"].",".$Q["Q_hide"].",".$Q["Q_order"].")");
	}
	die("{\"code\":\"success\",\"msg\":\"补券成功！\"}");
}

if($action=="fa"){
	$id=intval($_POST["Q_id"]);
	$M_id=intval($_POST["M_id"]);
	$Q=getrs("select * from sl_quan where Q_id=".$id);
	if(getrs("select * from sl_quan where Q_title='".$Q["Q_title"]."' and Q_mid=".$M_id)==""){
		$Q_id=getrs("select * from sl_quan where Q_title='".$Q["Q_title"]."' and Q_mid=0 and Q_del=0","Q_id");
		if($Q_id==""){
			die("{\"code\":\"error\",\"msg\":\"该优惠券数量不足，请先补券！\"}");
		}else{
			mysqli_query($conn,"update sl_quan set Q_mid=".$M_id." where Q_id=".$Q_id);
			die("{\"code\":\"success\",\"msg\":\"发放成功！\"}");
		}
	}else{
		die("{\"code\":\"error\",\"msg\":\"会员已有该优惠券！\"}");
	}
}

if($action=="fay"){
	$id=intval($_POST["Q_id"]);
	$Q=getrs("select * from sl_quan where Q_id=".$id);
	$M_count=getrs("select count(M_id) as M_count from sl_member where M_del=0 and not M_id=1","M_count");
	$Q_count=getrs("select count(Q_id) as Q_count from sl_quan where Q_title='".$Q["Q_title"]."' and Q_mid=0 and Q_del=0","Q_count");
	if($Q_count-$M_count<0){
		die("{\"code\":\"error\",\"msg\":\"该优惠券数量还需".($M_count-$Q_count)."张！\"}");
	}else{
		$q=getlist("select * from sl_quan where Q_title='".$Q["Q_title"]."' and Q_mid=0 and Q_del=0");
		$m=getlist("select * from sl_member where M_del=0 and not M_id=1");
		for($i=0;$i<$M_count;$i++){
			mysqli_query($conn,"update sl_quan set Q_mid=".$m[$i]["M_id"]." where Q_id=".$q[$i]["Q_id"]);
		}
		die("{\"code\":\"success\",\"msg\":\"发放成功！\"}");
	}
}

if($action=="delall"){
	$id=$_POST["id"];
	if(count($id)>0) {
		$shu=0 ;
		for ($i=0 ;$i<count($id);$i++ ) {
			$Q=getrs("select * from sl_quan where Q_id=".intval($id[$i]));
			mysqli_query($conn,"update sl_quan set Q_del=1 where Q_title='".$Q["Q_title"]."'");
			$shu=$shu+1 ;
			$ids=$ids.$id[$i].",";
		}
		$ids= substr($ids,0,strlen($ids)-1);
		if($shu>0) {
			mysqli_query($conn, "insert into sl_log(Q_aid,Q_time,Q_add,Q_ip,Q_title) values(".$_SESSION["A_id"].",'".date('Y-m-d H:i:s')."','".$_SESSION["add"]."','".getip()."','批量删除优惠券')");
			die("{\"msg\":\"success\",\"ids\":\"".$ids."\"}");
		} else {
			die("{\"msg\":\"删除失败\"}");
		}

	} else {
		die("{\"msg\":\"未选择要删除的内容\"}");
	}
}

$sql="select count(Q_title) as Q_count from (select Q_title from (select * from sl_quan where Q_del=0)b group by Q_title)a";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$Q_counts=$row["Q_count"];
?>
<!DOCTYPE html>
<html lang="en">
	<head>

		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title><?php echo $title?>优惠券 - 后台管理</title>

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
		.showpic{height: 50px;border: solid 1px #DDDDDD;padding: 5px;}
		.showpicx{width: 100%;max-width: 300px}
		.list-group a{text-decoration:none}
		.part{display:inline-block;width:46%;overflow:hidden;text-overflow:ellipsis;white-space: nowrap;}
	</style>
	</head>

	<body class="app ">

		<div id="spinner"></div>

		<div id="app">
			<div class="main-wrapper" >
				
					<?php
					require 'nav.php';
					?>

				<div class="app-content">
					<a href="recycle.php" class="btn btn-info pull-right" style="z-index: 2;position: relative;"><i class="fa fa-recycle"></i> 回收站</a>
					<section class="section">
                    	<ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.php">后台管理</a></li>
                            <li class="breadcrumb-item active" aria-current="page">优惠券管理</li>
                        </ol>


						<div class="section-body ">
							
							<div class="row">
								
								<div class="col-lg-6">
									<form id="list">
									<div class="card card-primary">

										<div class="card-header">
											<h4>优惠券列表</h4>
										</div>
												<ul class="list-group">
													<li class="list-group-item " style="background: #f7f7f7"><div class="part">排序/名称</div><div class="part">活动规则</div></li>
													<?php 
														$sql="select Q_title,Q_order from (select Q_title,Q_order from (select * from sl_quan where Q_fid=0 and Q_del=0)b group by Q_title,Q_order)a order by Q_order limit ".(($page-1)*20).",10";
																$result = mysqli_query($conn, $sql);
																if (mysqli_num_rows($result) > 0) {
																while($row = mysqli_fetch_assoc($result)) {
																	$Q=getrs("select * from sl_quan where Q_title='".$row["Q_title"]."'");

																	$R1=getrs("select count(*) as Q_r1 from sl_quan where Q_title='".$row["Q_title"]."'","Q_r1");
																	$R2=getrs("select count(*) as Q_r2 from sl_quan where Q_mid>0 and Q_title='".$row["Q_title"]."'","Q_r2");
																	$R3=getrs("select count(*) as Q_r3 from sl_quan where Q_use=1 and Q_title='".$row["Q_title"]."'","Q_r3");

																	if($Q["Q_title"]==$Q_title){
																		$active="active";
																	}else{
																		$active="";
																	}
																	if($Q["Q_pid"]==0){
																		$P_info="店内通用";
																	}else{
																		$P_info="限【".getrs("select * from sl_product where P_id=".$Q["Q_pid"],"P_title")."】使用";
																	}
																	if($Q["Q_discount"]>0){
																		$D_info=" 打".((100-$Q["Q_discount"])/10)."折";
																	}else{
																		$D_info="";
																	}
																	if($Q["Q_minuse"]>0){
																		$M_info=" 减".$Q["Q_minuse"]."元";
																	}else{
																		$M_info="";
																	}
																	if($Q["Q_gettime"]<date('Y-m-d H:i:s')){
																		$get=" <span class=\"badge badge-danger m-b-5\">领取已截止</span>";
																	}else{
																		$get="";
																	}
																	if($Q["Q_usetime"]<date('Y-m-d H:i:s')){
																		$use=" <span class=\"badge badge-danger m-b-5\">使用已截止</span>";
																	}else{
																		$use="";
																	}
																	if($Q["Q_hide"]==1){
																		$hide=" <span class=\"badge badge-info m-b-5\">隐藏</span>";
																	}else{
																		$hide="";
																	}
																	if($R1==$R2){
																		$rest_info=" <span class=\"badge badge-warning m-b-5\">已抢光</span>";
																	}else{
																		$rest_info="";
																	}

																	echo "<div style=\"position:relative;border-top:solid 1px #EEEEEE;\"  id=\"".$Q["Q_id"]."\"><a class=\"list-group-item ".$active."\" href=\"?Q_id=".$Q["Q_id"]."\" >
																	<div class=\"part\">
																		<div><input type=\"checkbox\" name=\"id[]\" value=\"".$Q["Q_id"]."\"> <b>".$Q["Q_order"].".".$Q["Q_title"]."</b>".$hide.$rest_info."</div>
																		<div>总数：".$R1." 已领：".$R2." 已用：".$R3."</div>
																	</div> 
																	<div class=\"part\">
																		<div><b>$P_info</b></div>
																		<div>满".$Q["Q_money"]."元".$M_info.$D_info.$get.$use."</div>
																	</div>
																	</a>
																	<a href=\"javascript:;\" onclick=\"bu(".$Q["Q_id"].",'".$Q["Q_title"]."')\" style=\"position:absolute;right:10px;top:7px;z-index:999\" class=\"btn btn-sm btn-danger\">补券</a>
																	<a href=\"javascript:;\" onclick=\"fa(".$Q["Q_id"].",'".$Q["Q_title"]."')\" style=\"position:absolute;right:10px;top:38px;z-index:999\" class=\"btn btn-sm btn-info\">发放</a>
																	</div>";
																}
															}
													?>
												</ul>
									</div>
									<label><input type="checkbox" id="selectAll" name="selectAll"> 全选</label>
									<button class="btn btn-sm btn-danger" type="button" onClick="delall()"><i class="fa fa-times-circle" ></i> 删除所选</button>
									<a href="quan.php" class="btn btn-sm btn-primary"><i class="fa fa-plus-circle"></i> 新增优惠券</a>
									<ul class="pagination" id="pagination" style="float: right;"></ul>
									<input type="hidden" id="PageCount" runat="server" />
        <input type="hidden" id="PageSize" runat="server" value="10" />
        <input type="hidden" id="countindex" runat="server" value="10"/>
        <!--设置最多显示的页码数 可以手动设置 默认为7-->
        <input type="hidden" id="visiblePages" runat="server" value="7" />
								</form>
								</div>
								<?php if($action!="menu"){?>
								
								<div class="col-lg-6">
									<form id="form">
									<div class="card card-primary">
										<div class="card-header ">
											<h4><?php echo $title?>优惠券</h4>
										</div>
										<div class="card-body">
												<div class="form-group row">
													<label class="col-md-3 col-form-label" >优惠券名称</label>
													<div class="col-md-9">
														<input type="text"  name="Q_title" class="form-control" value="<?php echo $Q_title?>">
													</div>
												</div>

												<div class="form-group row">
													<label class="col-md-3 col-form-label" >限定商品</label>
													<div class="col-md-9">
														<select name="Q_pid" class="form-control">
															<option value="0">店内通用</option>
															<?php
															$sql2="select * from sl_psort where S_del=0 and not S_sub=0 order by S_order,S_id desc";
																	$result2 = mysqli_query($conn, $sql2);
																	if (mysqli_num_rows($result2) > 0) {
																	while($row2 = mysqli_fetch_assoc($result2)) {
																		echo "<optgroup label=\"".$row2["S_title"]."\">";
																		$sql="select * from sl_product where P_del=0 and P_mid=0 and P_sort=".$row2["S_id"]." order by P_order,P_id desc";
																			$result = mysqli_query($conn, $sql);
																			if (mysqli_num_rows($result) > 0) {
																			while($row = mysqli_fetch_assoc($result)) {
																				if($row["P_id"]==$Q_pid){
																					$selected="selected='selected'";
																				}else{
																					$selected="";
																				}
																				echo "<option value=\"".$row["P_id"]."\" ".$selected.">".$row["P_title"]."</option>";
																			}
																		}
																		echo "</optgroup>";
																	}
																}
															?>
														</select>
													</div>
												</div>

												<div class="form-group row">
													<label class="col-md-3 col-form-label" >优惠券排序</label>
													<div class="col-md-9">
														
														<input type="text"  name="Q_order" class="form-control" value="<?php echo $Q_order?>">
														<label style="position: absolute;right: 25px;top: 10px;"><input type="checkbox" name="Q_hide" value="1" <?php if($Q_hide==1){echo "checked='checked'";}?> >隐藏</label>
														<div style="margin-top: 10px;font-size: 12px;color: #AAAAAA">填写大于0的数字</div>
													</div>
												</div>

												<div class="form-group row">
													<label class="col-md-3 col-form-label" >使用门槛</label>
													<div class="col-md-9">
														<div class="input-group">
															<span class="input-group-addon">满</span>
															<input type="text"  name="Q_money" class="form-control" value="<?php echo $Q_money?>">
															<span class="input-group-addon">元</span>
														</div>
														<div style="margin-top: 10px;font-size: 12px;color: #AAAAAA">填0则无使用门槛</div>
													</div>
												</div>

												<div class="form-group row">
													<label class="col-md-3 col-form-label" >优惠减额</label>
													<div class="col-md-9">
														<div class="input-group">
														<input type="text"  name="Q_minuse" class="form-control" value="<?php echo $Q_minuse?>">
														<span class="input-group-addon">元</span>
														</div>
														<div style="margin-top: 10px;font-size: 12px;color: #AAAAAA">填写大于0的数字</div>
													</div>
												</div>

												<div class="form-group row">
													<label class="col-md-3 col-form-label" >优惠折扣</label>
													<div class="col-md-9">
														<div class="input-group">
														<input type="text"  name="Q_discount" class="form-control" value="<?php echo $Q_discount?>">
														<span class="input-group-addon">%</span>
														</div>
														<div style="margin-top: 10px;font-size: 12px;color: #AAAAAA">填写0-100之间的数字（如优惠10%即打9折）</div>
													</div>
												</div>

												<div class="form-group row">
													<label class="col-md-3 col-form-label" >领取截止</label>
													<div class="col-md-9">
														<input type="text"  name="Q_gettime" class="form-control" value="<?php echo $Q_gettime?>">
													</div>
												</div>

												<div class="form-group row">
													<label class="col-md-3 col-form-label" >使用截止</label>
													<div class="col-md-9">
														<input type="text"  name="Q_usetime" class="form-control" value="<?php echo $Q_usetime?>">
													</div>
												</div>
												<?php if($Q_id==""){?>
												<div class="form-group row">
													<label class="col-md-3 col-form-label" >生成数量</label>
													<div class="col-md-9">
														<input type="text"  name="Q_num" class="form-control" value="1">
													</div>
												</div>
												<?php }?>

												<div class="form-group row">
													<label class="col-md-3 col-form-label" ></label>
													<div class="col-md-9">
														<button class="btn btn-info" type="button" onClick="save()"><?php echo $title?></button>
													</div>
												</div>
												
										</div>
									</div>
									</form>
								</div>
							
							<?php }?>
							
							</div>
							
						</div>
					</section>
				</div>

			</div>
		</div>

		<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="example-Modal2">优惠券补券</h5>
						<button type="button" class="close" data-dismiss="modal" 
								aria-hidden="true">×
						</button>
					</div>
					<div class="modal-body">
						<form id="form2">
							<p id="Q_title"></p>
							<input type="hidden" name="Q_id" id="Q_id" value="">
							<p><div class="input-group">
					            <span class="input-group-addon">数量</span>
					            <input type="text" name="num" value="10" class="form-control">
					        </div></p>
							<p><button class="btn btn-info" type="button" onclick="bux()">补券</button></p>
						</form>
					</div>
					
				</div><!-- /.modal-content -->
			</div><!-- /.modal-dialog -->
		</div><!-- /.modal -->

		<div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="example-Modal2">发送券发放</h5>
						<button type="button" class="close" data-dismiss="modal" 
								aria-hidden="true">×
						</button>
					</div>
					<div class="modal-body">
						<form id="form3">
							<p id="Q_title2"></p>
							<input type="hidden" name="Q_id" id="Q_id2" value="">
							<p><select name="M_id" class="form-control">
								<?php
								$sql="select * from sl_member where M_del=0 and not M_id=1";
								$result = mysqli_query($conn,  $sql);
								if (mysqli_num_rows($result) > 0) {
								while($row = mysqli_fetch_assoc($result)) {
										echo "<option value=\"".$row["M_id"]."\">".$row["M_login"]."</option>";
								    }
								} 
								?>
							</select></p>
							<p><button class="btn btn-info" type="button" onclick="fax()">发放</button> <button class="btn btn-primary" type="button" onclick="fay()">全员发放</button></p>
						</form>
					</div>
					
				</div><!-- /.modal-content -->
			</div><!-- /.modal-dialog -->
		</div><!-- /.modal -->

		<!--Jquery.min js-->
		<script src="assets/js/jquery.min.js"></script>

		<!--popper js-->
		<script src="assets/js/popper.js"></script>

		<!--Tooltip js-->
		<script src="assets/js/tooltip.js"></script>

		<script src="assets/js/help.js"></script>

		<!--Bootstrap.min js-->
		<script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>

		<!--Jquery.nicescroll.min js-->
		<script src="assets/plugins/nicescroll/jquery.nicescroll.min.js"></script>

		<!--mCustomScrollbar js-->
		<script src="assets/plugins/scroll-bar/jquery.mCustomScrollbar.concat.min.js"></script>

		<!--Scroll-up-bar.min js-->
		<script src="assets/plugins/scroll-up-bar/dist/scroll-up-bar.min.js"></script>

		<!--Sidemenu js-->
		<script src="assets/plugins/toggle-menu/sidemenu.js"></script>

		<!--Scripts js-->
		<script src="assets/js/scripts.js"></script>

		<script src="assets/plugins/toastr/build/toastr.min.js"></script>
		<script src="assets/plugins/toaster/garessi-notif.js"></script>

		<script src="assets/plugins/toaster/garessi-notif.js"></script>
		<script src="assets/js/jqPaginator.min.js" type="text/javascript"></script>

		<script type="text/javascript">

		function loadData(num) {
            $("#PageCount").val("<?php echo $Q_counts?>");
        }
function loadpage(id) {
    var myPageCount = parseInt($("#PageCount").val());
    var myPageSize = parseInt($("#PageSize").val());
    var countindex = myPageCount % myPageSize > 0 ? (myPageCount / myPageSize) + 1 : (myPageCount / myPageSize);
    $("#countindex").val(countindex);

    $.jqPaginator('#pagination', {
        totalPages: parseInt($("#countindex").val()),
        visiblePages: parseInt($("#visiblePages").val()),
        currentPage: id,
        first: '<li class="first page-item"><a href="javascript:;" class="page-link">|<</a></li>',
        prev: '<li class="prev page-item"><a href="javascript:;" class="page-link"><i class="arrow arrow2"></i><</a></li>',
        next: '<li class="next page-item"><a href="javascript:;" class="page-link">><i class="arrow arrow3"></i></a></li>',
        last: '<li class="last page-item"><a href="javascript:;" class="page-link">>|</a></li>',
        page: '<li class="page page-item"><a href="javascript:;" class="page-link">{{page}}</a></li>',
        onPageChange: function (num, type) {
            if (type == "change") {
                window.location="quan.php?page="+num;
            }
        }
    });
}
$(function () {
    loadData(<?php echo $page?>);
    loadpage(<?php echo $page?>);

});

		function save(){
				$.ajax({
            	url:'?action=<?php echo $aa?>',
            	type:'post',
            	data:$("#form").serialize(),
            	success:function (data) {
            	data=JSON.parse(data);
            	if(data.msg=="success"){
            		toastr.success("保存成功，2秒后刷新", "成功");
            		setTimeout("window.location.href='quan.php?Q_id="+data.id+"'", 2000 )
            	}else{
            		toastr.error(data.msg, '错误');
            	}
            	}
            });

			}
function delall() {
    if (confirm("确定删除吗？") == true) {
        $.ajax({
            url: '?action=delall',
            type: 'post',
            data: $("#list").serialize(),
            success: function(data) {
                data = JSON.parse(data);
                if (data.msg == "success") {
                    toastr.success("删除成功", "成功");
                    id = data.ids.split(",");
                    for (var i = 0; i < id.length; i++) {
                        $("#" + id[i]).hide();
                    };
                } else {
                    toastr.error(data.msg, '错误');
                }
            }
        });
        return true;
    } else {
        return false;
    }
}

function bu(id,title){
	$("#Q_id").val(id);
	$("#Q_title").html("名称："+title);
	$('#myModal').modal('show')
}

function fa(id,title){
	$("#Q_id2").val(id);
	$("#Q_title2").html("名称："+title);
	$('#myModal2').modal('show')
}

function bux(){
	$.ajax({
            url: '?action=bu',
            type: 'post',
            data: $("#form2").serialize(),
            success: function(data) {
                data = JSON.parse(data);
                if (data.code == "success") {
                    location.reload();
                } else {
                    toastr.error(data.msg, '错误');
                }
            }
        });
}

function fax(){
	$.ajax({
            url: '?action=fa',
            type: 'post',
            data: $("#form3").serialize(),
            success: function(data) {
                data = JSON.parse(data);
                if (data.code == "success") {
                    toastr.success(data.msg, '成功');
                } else {
                    toastr.error(data.msg, '错误');
                }
            }
        });
}

function fay(){
	$.ajax({
            url: '?action=fay',
            type: 'post',
            data: $("#form3").serialize(),
            success: function(data) {
                data = JSON.parse(data);
                if (data.code == "success") {
                    toastr.success(data.msg, '成功');
                } else {
                    toastr.error(data.msg, '错误');
                }
            }
        });
}

$('input[name="selectAll"]').on("click",function(){
        if($(this).is(':checked')){
            $('input[name="id[]"]').each(function(){
                $(this).prop("checked",true);
            });
        }else{
            $('input[name="id[]"]').each(function(){
                $(this).prop("checked",false);
            });
        }
    });
		</script>
		
	</body>
</html>
