<?php
require '../conn/conn.php';
require '../conn/function.php';
require '../conn/baidu_transapi.php';
require 'admin_check.php';

$action=$_GET["action"];

$D_domain=splitx($_SERVER["HTTP_HOST"].$_SERVER["PHP_SELF"],"/".$C_admin,0);
$dirx=splitx($_SERVER["PHP_SELF"],$C_admin,0);

$sql="select * from sl_price where id=1";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$wenzhangprice = $row["wenzhangprice"];
$wenzhanglong = $row["wenzhanglong"];

$N_id=intval($_GET["N_id"]);
if($N_id!=""){
    $aa="edit&N_id=".$N_id;
    $bb="getContent&N_id=".$N_id;
    $sql="select * from sl_news,sl_nsort where N_sort=S_id and N_id=".$N_id;
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    if (mysqli_num_rows($result) > 0) {
        $S_title=$row["S_title"];
        $N_pic=$row["N_pic"];
        $N_title=$row["N_title"];
        $N_content=$row["N_content"];
        $N_price=$row["N_price"];
        $N_timelong=$row["N_timelong"];
        $N_price2=$row["N_price2"];
        $N_sort=$row["N_sort"];
        $N_order=$row["N_order"];
        $N_date=$row["N_date"];
        $N_author=$row["N_author"];
        $N_view=$row["N_view"];
        $N_preview=$row["N_preview"];
        $N_long=$row["N_long"];
        $N_sh=$row["N_sh"];
        $N_tag=$row["N_tag"];
        $N_fx=$row["N_fx"];
        $N_video=$row["N_video"];
        $N_top=$row["N_top"];
        $N_tpl=$row["N_tpl"];
        $N_vshow=$row["N_vshow"];
        $N_ds=$row["N_ds"];
        $N_shuxing=$row["N_shuxing"];
        $N_keywords=$row["N_keywords"];
        $N_description=$row["N_description"];
        $N_dsintro=$row["N_dsintro"];
        $N_viponly=$row["N_viponly"];
        $N_uncopy=$row["N_uncopy"];
    }
}else{
    $aa="add";
    $bb="getContent&N_id=".$N_id;
    $N_pic="nopic.png";
    $N_date=date('Y-m-d H:i:s');
    $N_author=$_SESSION["A_login"];
    $N_view=0;
    $N_order=0;
    $N_price=0;
    $N_timelong=0;
    $N_price2=0;
    $N_preview=1;
    $N_long=0;
    $N_sh=1;
    $N_ds=0;
    $N_fx=1;
    $N_top=0;
    $N_tpl=0;
    $N_vshow=0;
    $N_viponly=0;
    $N_uncopy=0;
}

if($action=="openall"){
    $open=intval($_GET["open"]);
    mysqli_query($conn,"update sl_news set N_viponly=$open");
    die("{\"msg\":\"success\"}");
}

if($action=="getContent"){
    $lange = $_POST["lange"];
    $files = "N_content";
    if($lange!='zh'){
        $files = $files.'_'.$lange;
    }
    $content = getrs("select * from sl_news where N_id=$N_id",$files);
    die($content);
}

if($action=="add"){
    $N_lange_type = $_POST["N_lange_type"];
    $N_lange_value = $_POST["N_lange_value"];
    if($N_lange_type!="2"){
        if($N_lange_type=="0"&&$N_lange_value=="0"){
            die("{\"msg\":\"请选择目标语言！\"}");
        }
    }
    $N_price = $_POST["N_price"];
    $N_timelong = $_POST["N_timelong"];
    $N_pic=$_POST["N_pic"];
    $N_title=$_POST["N_title"];
    $N_content=str_replace("&quot;","",$_POST["N_content"]);
    $N_price2=round($_POST["N_price2"],2);
    if($N_price2==0){
        $N_price2=$N_price;
    }
    if($N_price2>$N_price){
        die("{\"msg\":\"成本价不得高于售价\"}");
    }
    $N_sort=intval($_POST["N_sort"]);
    $N_sort2=getrs("select S_sub from sl_nsort where S_id=$N_sort","S_sub");
    $N_ds=intval($_POST["N_ds"]);
    $N_order=intval($_POST["N_order"]);
    $N_date=$_POST["N_date"];
    $N_author=$_POST["N_author"];
    $N_view=intval($_POST["N_view"]);
    $N_preview=intval($_POST["N_preview"]);
    $N_long=intval($_POST["N_long"]);
    $N_sh=1;
    $N_tag=$_POST["N_tag"];
    $N_video=$_POST["N_video"];
    $N_fx=intval($_POST["N_fx"]);
    $N_top=intval($_POST["N_top"]);
    $N_tpl=intval($_POST["N_tpl"]);
    $N_vshow=intval($_POST["N_vshow"]);
    $N_keywords=$_POST["N_keywords"];
    $N_description=$_POST["N_description"];
    $N_dsintro=$_POST["N_dsintro"];
    $N_shuxing=$_POST["N_shuxing"];
    $N_viponly=1;
    $N_uncopy=intval($_POST["N_uncopy"]);
    $N_shuxing=str_replace("：", ":", $N_shuxing);
    if($N_shuxing!="" && strpos($N_shuxing, ":")===false){
        die("{\"msg\":\"文章参数的格式错误\"}");
    }
    $savepic=intval($_POST["savepic"]);

    if($savepic==1){
        $N_content=savepic($N_content,$dirx);
    }
    if($C_osson==1){
        editor2oss($N_content);
    }

    if($N_sort==0){
        die("{\"msg\":\"请选择一个文章分类\"}");
    }

    if($N_price<0){
        die("{\"msg\":\"文章价格不可为负\"}");
    }
    if($N_title!=""){

        mysqli_query($conn,"insert into sl_news(N_pic,N_title,N_content,N_price,N_timelong,N_price2,N_sort,N_sort2,N_order,N_date,N_author,N_view,N_preview,N_long,N_sh,N_tag,N_fx,N_video,N_top,N_tpl,N_shuxing,N_keywords,N_description,N_vshow,N_ds,N_dsintro,N_viponly,N_uncopy) values('$N_pic','$N_title','$N_content',$N_price,$N_timelong,$N_price2,$N_sort,$N_sort2,$N_order,'$N_date','$N_author',$N_view,0,$N_long,$N_sh,'$N_tag',$N_fx,'$N_video',$N_top,$N_tpl,'$N_shuxing','$N_keywords','$N_description',$N_vshow,$N_ds,'$N_dsintro',$N_viponly,$N_uncopy)");

        $N_id=getrs("select * from sl_news where N_title='$N_title' and N_pic='$N_pic' and N_sort=$N_sort","N_id");
        if($N_lange_type!="2") {
            //翻译内容
            $array = array("zh", "en", "jp", "kor", "ru", "de", "spa", "fra", "ara");
            $lange = $_POST["lange"];
            // $array=array("zh","kor");
            if ($N_lange_type == "0") {
                $array = array($N_lange_value);
            }else if($N_lange_type == "1"){
                $key = array_search($lange, $array);
                if ($key !== false)
                    array_splice($array, $key, 1);
            }
            //调用百度翻译
            $N_content= strip_tags($N_content);
            for ($i = 0; $i < count($array); $i++) {
                $files = "N_content_" . $array[$i];
                if ($lange != $array[$i]) {
                    if ($N_lange_type == "0") {
                        $ret = translate($N_content, $lange, $array[$i]);
                    }else if($N_lange_type == "1"){
                        $ret = translateprice($N_content, $lange, $array[$i]);
                    }
                    $ct = $ret['trans_result'];
                    $result = "";
                    for($j=0;$j<count($ct);$j++){
                        $result .=  $ct[$j]['dst'];
                    }
                    $result=  htmlspecialchars_decode($result);
                    $result= addslashes($result);
                    $result= htmlentities($result);
                    $sql = 'update sl_news set '.$files.' = "'.$result.'" where n_id='.$N_id;
                    $query = mysqli_query($conn, $sql);
                }
            }
        }

        mysqli_query($conn, "insert into sl_log(L_aid,L_time,L_add,L_ip,L_title) values(".$_SESSION["A_id"].",'".date('Y-m-d H:i:s')."','".$_SESSION["add"]."','".getip()."','新增文章')");
        die("{\"msg\":\"success\",\"N_id\":$N_id}");
    }else{
        die("{\"msg\":\"请填全内容\"}");
    }
}

if($action=="edit"){
    $N_lange_type = $_POST["N_lange_type"];
    $N_lange_value = $_POST["N_lange_value"];
    if($N_lange_type!="2"){
        if($N_lange_type=="0"&&$N_lange_value=="0"){
            die("{\"msg\":\"请选择目标语言！\"}");
        }
    }

    $N_pic=$_POST["N_pic"];
    $N_title=$_POST["N_title"];
    $N_content=str_replace("&quot;","",$_POST["N_content"]);
    $N_price = $_POST["N_price"];
    $N_timelong = $_POST["N_timelong"];
    $N_price2=round($_POST["N_price2"],2);
    if($N_price2==0){
        $N_price2=$N_price;
    }
    if($N_price2>$N_price){
        die("{\"msg\":\"成本价不得高于售价\"}");
    }
    $N_ds=intval($_POST["N_ds"]);
    $N_sort=intval($_POST["N_sort"]);
    $N_sort2=getrs("select S_sub from sl_nsort where S_id=$N_sort","S_sub");
    $N_order=intval($_POST["N_order"]);
    $N_date=$_POST["N_date"];
    $N_author=$_POST["N_author"];
    $N_view=intval($_POST["N_view"]);
    $N_preview=intval($_POST["N_preview"]);
    $N_long=intval($_POST["N_long"]);
    $N_sh=1;
    $N_tag=$_POST["N_tag"];
    $N_video=$_POST["N_video"];
    $N_fx=intval($_POST["N_fx"]);
    $N_top=intval($_POST["N_top"]);
    $N_tpl=intval($_POST["N_tpl"]);
    $N_vshow=intval($_POST["N_vshow"]);
    $N_keywords=$_POST["N_keywords"];
    $N_description=$_POST["N_description"];
    $N_dsintro=$_POST["N_dsintro"];
    $N_shuxing=$_POST["N_shuxing"];
    $N_viponly=1;
    $N_uncopy=intval($_POST["N_uncopy"]);
    $N_shuxing=str_replace("：", ":", $N_shuxing);
    if($N_shuxing!="" && strpos($N_shuxing, ":")===false){
        die("{\"msg\":\"文章参数的格式错误\"}");
    }

    $savepic=intval($_POST["savepic"]);
    if($savepic==1){
        $N_content=savepic($N_content,$dirx);
    }
    if($C_osson==1){
        editor2oss($N_content);
    }

    if($N_sort==0){
        die("{\"msg\":\"请选择一个文章分类\"}");
    }

    if($N_price<0){
        die("{\"msg\":\"文章价格不可为负\"}");
    }

    if($N_title!=""){
        mysqli_query($conn, "update sl_news set
		N_pic='$N_pic',
		N_title='$N_title',
		N_content='$N_content',
		N_price=$N_price,
        N_timelong=$N_timelong,
		N_price2=$N_price2,
		N_sort=$N_sort,
		N_sort2=$N_sort2,
		N_order=$N_order,
		N_date='$N_date',
		N_author='$N_author',
		N_view=$N_view,
		N_preview=0,
		N_long=$N_long,
		N_sh=$N_sh,
		N_fx=$N_fx,
		N_tag='$N_tag',
		N_top=$N_top,
		N_tpl=$N_tpl,
		N_vshow=$N_vshow,
		N_keywords='$N_keywords',
		N_description='$N_description',
		N_shuxing='$N_shuxing',
		N_video='$N_video',
		N_ds=$N_ds,
		N_dsintro='$N_dsintro',
		N_viponly='$N_viponly',
		N_uncopy='$N_uncopy'
		where N_id=".$N_id);

        if($N_lange_type!="2") {
            //翻译内容
            $array = array("zh", "en", "jp", "kor", "ru", "de", "spa", "fra", "ara");
            $lange = $_POST["lange"];
            // $array=array("zh","kor");
            if ($N_lange_type == "0") {
                $array = array($N_lange_value);
            }else if($N_lange_type == "1"){
                $key = array_search($lange, $array);
                if ($key !== false)
                    array_splice($array, $key, 1);
            }
            //调用百度翻译
            $N_content= strip_tags($N_content);
            for ($i = 0; $i < count($array); $i++) {
                $files = "N_content_" . $array[$i];
                if ($lange != $array[$i]) {
                    if ($N_lange_type == "0") {
                        $ret = translate($N_content, $lange, $array[$i]);
                    }else if($N_lange_type == "1"){
                        $ret = translateprice($N_content, $lange, $array[$i]);
                    }
                    $ct = $ret['trans_result'];
                    $result = "";
                    for($j=0;$j<count($ct);$j++){
                        $result .=  $ct[$j]['dst'];
                    }
                    $result=  htmlspecialchars_decode($result);
                    $result= addslashes($result);
                    $result= htmlentities($result);
                    $sql = 'update sl_news set '.$files.' = "'.$result.'" where n_id='.$N_id;
                    $query = mysqli_query($conn, $sql);
                }
            }
        }
        $sql1 = "update sl_news set N_price=$N_price,N_timelong=$N_timelong where N_id=".$N_id;
        mysqli_query($conn, $sql1);
        mysqli_query($conn, "insert into sl_log(L_aid,L_time,L_add,L_ip,L_title) values(".$_SESSION["A_id"].",'".date('Y-m-d H:i:s')."','".$_SESSION["add"]."','".getip()."','编辑文章')");
        die("{\"msg\":\"success\",\"N_id\":0}");
    }else{
        die("{\"msg\":\"请填全内容\"}");
    }
}

if($action=="caiji"){
    $url=$_POST["url"];
    $info=get_article($url);
    if($info["title"]==""){
        die("{\"msg\":\"未获取到内容，请检查网址\"}");
    }else{
        $info["msg"]="success";
        $info["img"]=downpic("../media/",$info["img"]);
        die(json_encode($info));
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>文章设置 - 后台管理</title>

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
        .showpic{height: 100px;border: solid 1px #DDDDDD;padding: 5px;}
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
<!--            <button class="btn btn-info pull-right btn-sm" style="z-index: 2;position: relative;" onClick="$('#cj').show()"><i class="fa fa-paste"></i> 采集文章</button>-->
            <a class="btn btn-primary pull-right btn-sm" href="nsort_add.php" style="z-index: 2;position: relative;margin-right: 10px;"><i class="fa fa-plus-circle"></i> 新增文章分类</a>
            <a class="btn btn-primary pull-right btn-sm" href="news_add.php" style="z-index: 2;position: relative;margin-right: 10px;"><i class="fa fa-plus-circle"></i> 新增文章</a>

            <section class="section">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active"><a href="news_list.php">文章管理</a></li>
                    <li class="breadcrumb-item"><a href="nsort_add.php">文章分类</a></li>
                    <!--                            <li class="breadcrumb-item"><a href="excel_news.php">导入EXCEL</a></li>-->
                </ol>
                <style type="text/css">
                    .active a{font-weight: bold;color: #a2a9d4}
                </style>

                <div class="section-body ">
                    <form id="form">
                        <input type="hidden" id="lange" name="lange" value="zh">
<!--                        <input type="hidden" id="N_price" name="N_price" value="1">-->
                        <input type="hidden" id="N_price2" name="N_price2" value="0">
                        <input type="hidden" id="N_view" name="N_view" value="0">
                        <div class="row">

                            <div class="col-lg-3">

                                <div class="card card-primary">

                                    <div class="card-header">
                                        <h4><?php echo $S_title?> - 文章列表</h4>
                                    </div>

                                    <ul class="list-group">
                                        <?php
                                        if($N_id==0){
                                            $sql="select * from sl_news,sl_nsort where N_sort=S_id and S_del=0 and N_del=0 order by N_id desc limit 20";
                                        }else{
                                            $sql="select * from sl_news,sl_nsort where N_sort=S_id and S_del=0 and N_del=0 and N_sort=$N_sort order by N_id desc limit 20";
                                        }

                                        $result = mysqli_query($conn, $sql);
                                        if (mysqli_num_rows($result) > 0) {
                                            while($row = mysqli_fetch_assoc($result)) {
                                                if($row["N_id"]==$N_id){
                                                    $active="active";
                                                }else{
                                                    $active="";
                                                }
                                                echo "<a href=\"?N_id=".$row["N_id"]."\" class=\"list-group-item ".$active."\"><b>[".$row["S_title"]."]</b> ".htmlspecialchars($row["N_title"])."</a>";
                                            }
                                        }
                                        ?>

                                    </ul>


                                </div>
                                <a href="news_add.php" class="btn btn-sm btn-primary"><i class="fa fa-plus-circle"></i> 新增文章</a>
                            </div>

                            <div class="col-lg-9">
                                <div class="card card-primary">
                                    <div class="card-header ">
                                        <h4>文章管理</h4>
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
                                            <label class="col-md-2 col-form-label" >文章标题</label>
                                            <div class="col-md-10">
                                                <input type="text" id="N_title" name="N_title" class="form-control" value="<?php echo htmlspecialchars($N_title)?>">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-md-2 col-form-label" >文章图片</label>
                                            <div class="col-md-10">
                                                <p><img src="<?php echo pic2($N_pic)?>" id="N_picx" class="showpic" onClick="showUpload('N_pic','N_pic','../media',1,null,'','');" alt="<img src='<?php echo pic2($N_pic)?>' class='showpicx'>"></p>
                                                <div class="input-group">
                                                    <input type="text" id="N_pic" name="N_pic" class="form-control" value="<?php echo $N_pic?>">
                                                    <span class="input-group-btn">
						                                                <button class="btn btn-primary m-b-5 m-t-5" type="button" onClick="showUpload('N_pic','N_pic','../media',1,null,'','');">上传</button>
						                                        </span>
                                                </div>

                                            </div>
                                        </div>

                                        <div class="form-group row">

                                            <label class="col-md-2 col-form-label" >文章分类</label>
                                            <div class="col-md-4">
                                                <select name="N_sort" class="form-control">
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
                                                <div style="margin-top: 10px;font-size: 12px;color: #AAAAAA">*文章无法直接归到主分类，如果无法选择请先新建子分类</div>
                                            </div>
                                            <label class="col-md-2 col-form-label" >文章作者</label>
                                            <div class="col-md-4">
                                                <input type="text"  name="N_author" class="form-control" value="<?php echo $N_author?>">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-md-2 col-form-label" >发表日期</label>
                                            <div class="col-md-4">
                                                <div class="input-group">
                                                    <input type="text"  name="N_date" id="N_date" class="form-control" value="<?php echo $N_date?>">
                                                    <span class="input-group-btn">
										                        <button class="btn btn-info" type="button" onclick="getdate()">获取</button>
										                    </span>
                                                </div>
                                            </div>

                                            <label class="col-md-2 col-form-label" >文章排序</label>
                                            <div class="col-md-4" style="position: relative;">
                                                <input type="text"  name="N_order" class="form-control" value="<?php echo $N_order?>" placeholder="数字越小，排序越靠前">

                                                <label style="position: absolute;right: 25px;top: 10px;"><input type="checkbox" name="N_top" value="1" <?php if($N_top==1){echo "checked='checked'";}?> >置顶</label>

                                                <div style="margin-top: 10px;font-size: 12px;color: #AAAAAA">*数字越小，排序越靠前</div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-md-2 col-form-label">文章价格</label>
                                        <div class="col-md-4">
                                            <input type="text"  name="N_price" class="form-control" value="<?php echo $N_price?>">
                                            <div style="margin-top: 10px;font-size: 12px;color: #AAAAAA">*单位：元</div>
                                        </div>
                                        <label class="col-md-2 col-form-label">文章时长</label>
                                        <div class="col-md-4">
                                            <input type="text"  name="N_timelong" class="form-control" value="<?php echo $N_timelong?>">
                                            <div style="margin-top: 10px;font-size: 12px;color: #AAAAAA">*单位：分钟</div>
                                        </div>
                                    </div>

                                    <div class="form-group row" >
                                        <label class="col-md-2 col-form-label" >翻译类型</label>
                                        <div class="col-md-4">
                                            <select class="form-control" name="N_lange_type">
                                                <option value="2" selected>不翻译</option>
                                                <option value="0">标准免费</option>
                                                <option value="1">企业收费</option>
                                            </select>
                                        </div>
                                        <label class="col-md-2 col-form-label" >目标语言</label>
                                        <div class="col-md-4">
                                            <select class="form-control" name="N_lange_value">
                                                <option value="0" selected>全部</option>
                                                <option value="en" >英语</option>
                                                <option value="jp">日语</option>
                                                <option value="kor">韩语</option>
                                                <option value="ru">俄语</option>
                                                <option value="de">德语</option>
                                                <option value="spa">西班牙语</option>
                                                <option value="fra">法语</option>
                                                <option value="ara">阿拉伯语</option>
                                            </select>
                                        </div>
                                    </div>

                                    <?php
                                    if($N_id!=""){
                                        ?>
                                        <ul class="nav nav-tabs" id="myTab2" role="tablist" style="padding-left:17%;">
                                            <li class="nav-item">
                                                <a class="nav-link active" id="tab1" data-toggle="tab" href="javascript(0);" onclick="tabClick(this.id)" role="tab" aria-controls="zh" aria-selected="true">中文</a>
                                            </li>

                                            <li class="nav-item">
                                                <a class="nav-link" id="tab2" data-toggle="tab" href="javascript(0);" onclick="tabClick(this.id)"role="tab" aria-controls="en" aria-selected="false">英文</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="tab3" data-toggle="tab" href="javascript(0);" onclick="tabClick(this.id)" role="tab" aria-controls="jp" aria-selected="false">日语</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="tab4" data-toggle="tab" href="#t4" onclick="tabClick(this.id)" role="tab" aria-controls="kor" aria-selected="false">韩语</a>
                                            </li>

                                            <li class="nav-item">
                                                <a class="nav-link" id="tab5" data-toggle="tab" href="#t5" onclick="tabClick(this.id)" role="tab" aria-controls="ru" aria-selected="false">俄语</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="tab6" data-toggle="tab" href="#t6" onclick="tabClick(this.id)" role="tab" aria-controls="de" aria-selected="false">德语</a>
                                            </li>

                                            <li class="nav-item">
                                                <a class="nav-link" id="tab7" data-toggle="tab" href="#t7" onclick="tabClick(this.id)" role="tab" aria-controls="spa" aria-selected="false">西班牙语</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="tab7" data-toggle="tab" href="#t8" onclick="tabClick(this.id)" role="tab" aria-controls="fra" aria-selected="false">法语</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="tab8" data-toggle="tab" href="#t9" onclick="tabClick(this.id)" role="tab" aria-controls="ara" aria-selected="false">阿拉伯语</a>
                                            </li>
                                        </ul>
                                        <?php
                                    }
                                    ?>
                                    <div class="form-group row">
                                        <label class="col-md-2 col-form-label" >文章内容</label>
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
                                            <textarea name='N_content' style='width:100%;height:350px;' id='content'><?php echo $N_content?></textarea>
                                            <!--														<label style="font-size: 12px;margin-top: 5px;text-align: right;"><input type="checkbox" id="savepic" value="1" name="savepic">保存编辑器内的远程图片到本地</label>-->
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
        </section>
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
    function openall(info,open){
        if (confirm(info+"所有文章仅限VIP购买？")==true){
            $.ajax({
                url:'?action=openall&open='+open,
                success:function (data) {
                    data=JSON.parse(data);
                    if(data.msg=="success"){
                        toastr.success(info+"成功", "成功");
                        location.reload();
                    }else{
                        toastr.error(data.msg, '错误');
                    }
                }
            });
            return true;
        }else{
            return false;
        }
    }

    function tabClick(id){
        var tabValue = $('#'+id).attr('aria-controls');
        $('#lange').val(tabValue);
        $('#lange'+id).val(tabValue);
        $.ajax({
            url:'?action=<?php echo $bb?>',
            type:'post',
            data:$("#form").serialize(),
            success:function (data) {
                editor.html(data);
            }
        });
    }

    function save(id){
        toastr.warning('请稍等...','');
        editor.sync();
        $.ajax({
            url:'?action=<?php echo $aa?>',
            type:'post',
            data:$("#form").serialize(),
            success:function (data) {
                data=JSON.parse(data);
                if(data.msg=="success"){
                    if(id==1){
                        if(data.N_id==0){
                            toastr.success("保存成功", "成功");
                        }else{
                            window.location.href="news_add.php?N_id="+data.N_id;
                        }
                    }else{
                        window.location.href="news_list.php";
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
            url:'?action=caiji',
            type:'post',
            data:{url:$("#url").val()},
            success:function (data) {
                data=JSON.parse(data);
                if(data.msg=="success"){
                    toastr.success("采集成功", "成功");
                    $("#N_title").val(data.title);
                    $("#N_pic").val(data.img);
                    $("#N_keywords").val(data.keyword);
                    $("#N_description").val(data.description);
                    $("#N_picx").attr("src","../media/"+data.img);
                    $("#savepic").attr("checked","checked");
                    editor.html(data.content);
                }else{
                    toastr.error(data.msg, '错误');
                }
            }
        });
    }

    function getdate(){
        var day1 = new Date();
        day1.setDate(day1.getDate());
        var s1 = day1.format("yyyy-MM-dd hh:mm:ss");
        $("#N_date").val(s1);
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

    $(function() { $('.buy label').click(function(){var aa = $(this).attr('aa');$('[aa="'+aa+'"]').removeAttr('class') ;$(this).attr('class','checked');});});
    document.addEventListener('keydown', function(e) {
        if (e.keyCode == 83 && (navigator.platform.match("Mac") ? e.metaKey : e.ctrlKey))      {
            e.preventDefault();
            save(1);
        }
    });
</script>

</body>
</html>
