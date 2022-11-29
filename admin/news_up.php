<?php
require '../conn/conn.php';
require '../conn/function.php';
require 'admin_check.php';
$D_domain=splitx($_SERVER["HTTP_HOST"].$_SERVER["PHP_SELF"],"/".$C_admin,0);
$action=$_GET["action"];

if($action=="upload"){
	$N_part=intval($_POST["N_part"]);
	if(!is_dir("../media/word")){
		@mkdir("../media/word",0755,true);
	}
	$kname = strtolower(substr($_FILES["file"]["name"],strrpos($_FILES["file"]["name"],'.')+1));
	$N_title=str_replace(".".$kname,"",$_FILES["file"]["name"]);
	$N_title=str_replace(" ","",$N_title);
	$genkey=md5($N_title.date('Y-m-d'));
	$path=iconv("UTF-8", "GB2312","../media/word/".$N_title."_".$genkey.".".$kname);
	move_uploaded_file($_FILES["file"]["tmp_name"],$path);

	if($kname=="txt"){
		$N_content=mb_convert_encoding(file_get_contents($path),'UTF-8','UTF-8,GBK,GB2312,BIG5');
		$len=intval(mb_strlen($N_content,"utf-8")*(100-$N_part)/100);//字符数
		$part=mb_substr($N_content,0,$len,"utf-8");//前一半内容
		$N_content=str_replace($part,$part."[fh_free]",$N_content);//中间插入[fh_free]
		$N_content=str_replace("\r\n","<br>",$N_content);
		$N_content=$N_content."<div style=\"border:dashed 2px #0099ff;padding:5px 10px;margin-top:10px\">完整文档下载地址：<u><a href=\"".gethttp().$D_domain."/media/word/".$N_title."_".$genkey.".docx\">".$N_title.".docx</a></u></div>";
		$N_pic="nopic.png";
		$N_price=round($_POST["N_price"],2);
		$N_price2=round($_POST["N_price"],2);
		$N_sort=intval($_POST["N_sort"]);
		$N_sort2=getrs("select S_sub from sl_nsort where S_id=$N_sort","S_sub");
		$N_date=date('Y-m-d H:i:s');
		$N_author=t($_POST["N_author"]);
		$N_view=0;
		$N_long=0;
		$N_sh=1;
		$N_tag="";
		$N_fx=1;
		$N_order=0;
		$N_video="";
		$N_top=0;
		$N_tpl=0;
		$N_shuxing="";
		$N_keywords=$title;
		$N_description=$title;
		$N_vshow=0;
		$N_ds=0;
		$N_dsintro="";
		$N_viponly=0;
		$N_uncopy=1;
		unlink($path);
		if(getrs("select * from sl_news where N_title='$N_title'","N_id")==""){
			mysqli_query($conn,"insert into sl_news(N_pic,N_title,N_content,N_price,N_price2,N_sort,N_sort2,N_order,N_date,N_author,N_view,N_preview,N_long,N_sh,N_tag,N_fx,N_video,N_top,N_tpl,N_shuxing,N_keywords,N_description,N_vshow,N_ds,N_dsintro,N_viponly,N_uncopy) values('$N_pic','$N_title','$N_content',$N_price,$N_price2,$N_sort,$N_sort2,$N_order,'$N_date','$N_author',$N_view,0,$N_long,$N_sh,'$N_tag',$N_fx,'$N_video',$N_top,$N_tpl,'$N_shuxing','$N_keywords','$N_description',$N_vshow,$N_ds,'$N_dsintro',$N_viponly,$N_uncopy)");
			die("{\"title\":\"".$N_title."\",\"code\":\"success\",\"msg\":\"上传成功！\"}");
		}else{
			die("{\"title\":\"".$N_title."\",\"code\":\"error\",\"msg\":\"文章重复！\"}");
		}
	}else{
		die();
	}
}
?>
<!DOCTYPE html>
<html lang="en">
	<head>

		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>批量上传文章 - 后台管理</title>

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
                            <li class="breadcrumb-item active" aria-current="page">批量上传WORD文章</li>
                        </ol>

						<div class="section-body ">
							<form id="form">
							<div class="row">
								
								<div class="col-lg-12">
									<div class="card card-primary">
										<div class="card-header ">
											<h4>批量上传WORD文章</h4>
										</div>
										<div class="card-body">

											<div class="form-group row">
													
													<label class="col-md-2 col-form-label" >文章作者</label>
													<div class="col-md-4">
														<input type="text" name="N_author" class="form-control" onchange="up()" value="<?php echo $_SESSION["A_login"];?>">
													</div>
													<label class="col-md-2 col-form-label" >隐藏比例</label>
													<div class="col-md-4">
														<div class="input-group">
														
														<input type="text" name="N_part" class="form-control" value="50" onchange="up()">
														<span class="input-group-addon">%</span>
													</div>
													</div>


											</div>

											<div class="form-group row">
													
													<label class="col-md-2 col-form-label" >文章价格</label>
													<div class="col-md-4">
														<div class="input-group">
														
														<input type="text" name="N_price" class="form-control" value="1.00" onchange="up()">
														<span class="input-group-addon">元</span>
													</div>
													
													</div>
													<label class="col-md-2 col-form-label" >文章分类</label>
													<div class="col-md-4">
														<select name="N_sort" class="form-control" onchange="up()">
															<?php
													$sql2="select * from sl_nsort where S_del=0 and S_sub=0 order by S_order,S_id desc";
														$result2 = mysqli_query($conn, $sql2);
														if (mysqli_num_rows($result2) > 0) {
														while($row2 = mysqli_fetch_assoc($result2)) {
															echo "<optgroup label=\"".$row2["S_title"]."\">";
															$sql="select * from sl_nsort where S_del=0 and S_sub=".$row2["S_id"]." order by S_order,S_id desc";
																$result = mysqli_query($conn, $sql);
																if (mysqli_num_rows($result) > 0) {
																while($row = mysqli_fetch_assoc($result)) {
																	if($N_sort==$row["S_id"]){
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
													</div>

												</div>

												<div class="form-group row">
													
													<label class="col-md-2 col-form-label" >选择文件</label>
													<div class="col-md-10">
														
													
													<div id="as" ></div>
													</div>

													

												</div>

												<div class="form-group row">
													
													<label class="col-md-2 col-form-label" >返回信息</label>
													<div class="col-md-10">
														
													
													<div id="back"></div>
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

		<link rel="stylesheet" type="text/css" href="https://www.jq22.com/demo/jquery-upload-150107181757/diyUpload/css/webuploader.css">
		<link rel="stylesheet" type="text/css" href="https://www.jq22.com/demo/jquery-upload-150107181757/diyUpload/css/diyUpload.css">
		<script type="text/javascript" src="https://www.jq22.com/demo/jquery-upload-150107181757/diyUpload/js/webuploader.html5only.min.js"></script>
		<script type="text/javascript" src="../js/diyUpload.js"></script>

		<script type="text/javascript">
				up();
				function up(){
					$('#as').diyUpload({
					url:'?action=upload',
					success:function( data ) {
						console.log( data );
						if(data.code=="success"){
							$("#back").append("<p><b>"+data.title+"</b> "+data.msg+"</p>");
						}
						if(data.code=="error"){
							$("#back").append("<p><b>"+data.title+"</b> "+data.msg+"</p>");
						}
					},
					error:function( err ) {
						console.log( err );	
					},
					buttonText : '选择文件',
					chunked:true,
					// 分片大小
					chunkSize:512 * 1024,
					//最大上传的文件数量, 总文件大小,单个文件大小(单位字节);
					fileNumLimit:50,
					fileSizeLimit:500000 * 1024,
					fileSingleSizeLimit:50000 * 1024,
					accept: {}
				});
				}
		</script>
	</body>
</html>
