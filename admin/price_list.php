<?php
require '../conn/conn.php';
require '../conn/function.php';
require 'admin_check.php';

$action=$_GET["action"];

$sql="select * from sl_price where id=1";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
if (mysqli_num_rows($result) > 0) {
    $vipprice1 = $row["vipprice1"];
    $timelong1 = $row["timelong1"];
    $vipprice2 = $row["vipprice2"];
    $timelong2 = $row["timelong2"];
    $vipprice3 = $row["vipprice3"];
    $timelong3 = $row["timelong3"];
}

if($action=="save"){
    $vipprice1=round($_POST["vipprice1"],2);
    $timelong1=round($_POST["timelong1"],0);
    $vipprice2=round($_POST["vipprice2"],2);
    $timelong2=round($_POST["timelong2"],0);
    $vipprice3=round($_POST["vipprice3"],2);
    $timelong3=round($_POST["timelong3"],0);

    if($vipprice1==""||$timelong1==""){
        die("价格1和时长1不能为空！");
    }else{
        mysqli_query($conn,"update sl_price set
		vipprice1=$vipprice1,
	    timelong1=$timelong1,
	    vipprice2=$vipprice2,
	    timelong2=$timelong2,
	    vipprice3=$vipprice3,
	    timelong3=$timelong3 where id=1");
        mysqli_query($conn,"insert into sl_log(L_aid,L_time,L_add,L_ip,L_title) values(".$_SESSION["A_id"].",'".date('Y-m-d H:i:s')."','".$_SESSION["add"]."','".getip()."','设置价格')");
        die("success");
    }
}
?>
<!DOCTYPE html>
<html lang="en">
	<head>

		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>VIP会员设置 - 后台管理</title>

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
                            <li class="breadcrumb-item active" aria-current="page">价格管理</li>
                        </ol>

						<div class="section-body ">
							<form id="form">
							<div class="row">

								<div class="col-lg-12">
									<div class="card card-primary">
										<div class="card-header ">
											<h4>价格设置</h4>
										</div>
										<div class="card-body">
												<div class="form-group row">
													<div class="col-md-9">
														<div class="input-group">
                                                            <label class="col-md-3 col-form-label" >价格1</label>
                                                            <input type="text"  name="vipprice1" class="form-control" value="<?php echo $vipprice1?>" placeholder="请输入价格(元)">
                                                            <span class="input-group-addon">元</span>

                                                            <label class="col-md-3 col-form-label" >时长1</label>
                                                            <input type="text"  name="timelong1" class="form-control" value="<?php echo $timelong1?>" placeholder="请输入时长(分钟)">
                                                            <span class="input-group-addon">分钟</span>
													    </div>
												    </div>
											    </div>
                                            <div class="form-group row">
                                                <div class="col-md-9">
                                                    <div class="input-group">
                                                        <label class="col-md-3 col-form-label" >价格2</label>
                                                        <input type="text"  name="vipprice2" class="form-control" value="<?php echo $vipprice2?>"  placeholder="请输入价格(元)">
                                                        <span class="input-group-addon">元</span>

                                                        <label class="col-md-3 col-form-label" >时长2</label>
                                                        <input type="text"  name="timelong2" class="form-control" value="<?php echo $timelong2?>" placeholder="请输入时长(分钟)">
                                                        <span class="input-group-addon">分钟</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-md-9">
                                                    <div class="input-group">
                                                        <label class="col-md-3 col-form-label" >价格3</label>
                                                        <input type="text"  name="vipprice3" class="form-control" value="<?php echo $vipprice3?>"  placeholder="请输入价格(元)">
                                                        <span class="input-group-addon">元</span>

                                                        <label class="col-md-3 col-form-label" >时长3</label>
                                                        <input type="text"  name="timelong3" class="form-control" value="<?php echo $timelong3?>" placeholder="请输入时长(分钟)">
                                                        <span class="input-group-addon">分钟</span>
                                                    </div>
                                                </div>
                                            </div>
									</div>
								</div>

								<div class="col-lg-6">

								</div>

								<div class="col-lg-6">
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
            	url:'?action=save',
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
