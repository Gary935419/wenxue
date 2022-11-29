<?php
require '../conn/conn.php';
require '../conn/function.php';
require 'admin_check.php';

$action=$_GET["action"];
$id=$_GET["id"];
$tpl=$_GET["tpl"];

if($tpl==""){
	$tpl="index";
}

if($action=="save"){
	$tplinfo=$_POST["tplinfo"];
	file_put_contents("../template/$id/$tpl.tpl",$tplinfo);
	die("success");
}

?>
<!DOCTYPE html>
<html lang="en">
	<head>

		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>模板编辑 - 后台管理</title>

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
		<link rel="stylesheet" href="assets/plugins/toaster/garessi-notif.css">

		<script type="text/javascript" src="../upload/upload.js"></script>
		<style type="text/css">
		.showpic{height: 50px;border: solid 1px #DDDDDD;padding: 5px;}
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
					<section class="section">
                    	<ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.php">后台管理</a></li>
                            <li class="breadcrumb-item active" aria-current="page"><?php echo $id."-".$tpl;?>模板在线编辑</li>
                        </ol>

						<div class="section-body ">
							<form id="form">
							<div class="row">
								
								<div class="col-lg-12">
									<div class="card card-primary">
										<div class="card-header ">
											<h4><?php echo $id."-".$tpl;?>模板在线编辑</h4>
										</div>
										<div class="card-body">
											<a href="?id=<?php echo $id?>&tpl=index" class="btn btn-<?php if($tpl=="index"){echo "info";}else{echo "primary";}?> btn-sm">网站首页</a>
											<a href="?id=<?php echo $id?>&tpl=text" class="btn btn-<?php if($tpl=="text"){echo "info";}else{echo "primary";}?> btn-sm">单页模板</a>
											<a href="?id=<?php echo $id?>&tpl=news" class="btn btn-<?php if($tpl=="news"){echo "info";}else{echo "primary";}?> btn-sm">文章列表</a>
											<a href="?id=<?php echo $id?>&tpl=newsinfo" class="btn btn-<?php if($tpl=="newsinfo"){echo "info";}else{echo "primary";}?> btn-sm">文章详情</a>
											<a href="?id=<?php echo $id?>&tpl=product" class="btn btn-<?php if($tpl=="product"){echo "info";}else{echo "primary";}?> btn-sm">商品列表</a>
											<a href="?id=<?php echo $id?>&tpl=productinfo" class="btn btn-<?php if($tpl=="productinfo"){echo "info";}else{echo "primary";}?> btn-sm">商品详情</a>
											<a href="?id=<?php echo $id?>&tpl=search" class="btn btn-<?php if($tpl=="search"){echo "info";}else{echo "primary";}?> btn-sm">搜素页面</a>
											<hr>
											<textarea class="form-control" rows="20" name="tplinfo"><?php echo file_get_contents("../template/".$id."/".$tpl.".tpl")?></textarea>
										</div>
									</div>
								</div>

								<div class="col-lg-6">
									<p>*没有html及php基础的人员请勿操作该页面，否则可能导致网站出错</p>
									<button class="btn btn-primary" type="button" onClick="save()">保存</button>

								</div>
							
							</div>
							</form>
						</div>
					</section>
				</div>

			</div>
		</div>

		<!--Jquery.min js-->
		<script src="assets/js/jquery.min.js"></script>

		<!--Bootstrap.min js-->
		<script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>

		<!--Sidemenu js-->
		<script src="assets/plugins/toggle-menu/sidemenu.js"></script>

		<!--mCustomScrollbar js-->
		<script src="assets/plugins/scroll-bar/jquery.mCustomScrollbar.concat.min.js"></script>

		<!--Scripts js-->
		<script src="assets/js/scripts.js"></script>

		<script src="assets/plugins/toastr/build/toastr.min.js"></script>


		<script type="text/javascript">
		function save(){
				$.ajax({
            	url:'?action=save&id=<?php echo $id?>&tpl=<?php echo $tpl?>',
            	type:'post',
            	data:$("#form").serialize(),
            	success:function (data) {
            		if(data=="success"){
            		toastr.success("保存成功", "成功");
            	}else{
            		toastr.error(data, '错误');
            	}
            	}
            });

			}
document.addEventListener('keydown', function(e) {
  if (e.keyCode == 83 && (navigator.platform.match("Mac") ? e.metaKey : e.ctrlKey))      {
        e.preventDefault();
        save();
      }
});

		</script>
		
	</body>
</html>
