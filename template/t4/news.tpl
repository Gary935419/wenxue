<fh-function>
    $page=$_GET["page"];
    $tag=t($_GET["tag"]);

    $url=gethttp().$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'].'?'.$_SERVER['QUERY_STRING'];
    function url($url,$key,$value){
    $url=str_replace("&".$key."=".str_replace("%3A",":",urlencode($value)),"",$url);
    return $url;
    }

    if($tag==""){
    $taginfo="";
    }else{
    $taginfo=" and CONCAT(\" \",N_tag,\" \") like '% ".$tag." %'";
    }

    $M_id=$_GET["M_id"];
    if($page==""){
    $page=1;
    }

    if($M_id!=""){
    $M_info=" and N_mid=$M_id".$taginfo;
    }else{
    $M_info=" and N_sh=1".$taginfo;
    }

    $sql="select * from sl_nsort where S_id=".$id;
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    if (mysqli_num_rows($result) > 0) {
    $S_sub=$row["S_sub"];
    }

    if($id==0){
    $sql="select count(N_id) as N_count from sl_news where N_del=0 ".$M_ninfo."  $M_info order by N_order,N_id desc";
    }else{
    if($S_sub==0){
    $sql="select count(N_id) as N_count from sl_news,sl_nsort where S_del=0 $M_info and N_del=0 ".$M_ninfo."  and N_sort=S_id and S_sub=".$id." order by N_order,N_id desc";
    }else{
    $sql="select count(N_id) as N_count from sl_news,sl_nsort where S_del=0 $M_info and N_del=0 ".$M_ninfo."  and N_sort=S_id and S_id=".$id." order by N_order,N_id desc";
    }
    }

    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $N_count=$row["N_count"];

    $page_num=intval($N_count/12)+1;
    if($N_count%12 ==0){
    $page_num=$page_num-1;
    }

</fh-function>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="renderer" content="webkit">
    <meta name="format-detection" content="telephone=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="format-detection" content="telephone=no">
    <meta http-equiv="Pragma" content="no-cache">
    <title>[S_title] - [fh_title]</title>
    <link href="media/[fh_ico]" rel="shortcut icon" />
    <meta name="description" content="[S_content]" />
    <meta name="keywords" content="[S_keywords]" />

    <link rel="stylesheet" type="text/css" href="template/t4/skin/css/aswiper.min.css" />
    <link rel="stylesheet" type="text/css" href="template/t4/skin/css/animate.min.css" />
    <link rel="stylesheet" type="text/css" href="template/t4/skin/css/layout.css" />
    <script type="text/javascript" src="template/t4/skin/js/jquery-1.12.4.min.js"></script>
    <link href="css/Pager.css" rel="stylesheet" type="text/css" />
    <style>
        body{
            width: 100%;
            height: 100%;
        }
        ul,li{
            list-style: none;
        }
        a{
            text-decoration: none;
        }
        .head{
            height: 0.98rem;
            background-color: rgba(255, 255, 255, 0.8);
            position: absolute;
            width: 100%;
            z-index: 99;
        }
        .head .logo1{
            height: 0.98rem;
            float: left;
            margin-left: 0.4rem;
        }
        .head .logo1 img{
            max-height: 100%;
            float: left;
        }
        .head .nav{
            float: left;
            font-size: 0.18rem;
            height: 0.98rem;
            margin-left: 0.6rem;
        }
        .head .nav li{
            float: left;
            height: 0.98rem;
            line-height: 0.98rem;
        }
        .head .nav li a{
            color: #333333;
            display: block;
            padding: 0 0.4rem;
        }
        .head .nav li.cur{
            background-color: #3F7FE0;
        }
        .head .nav li.cur a{
            color: #ffffff;
        }
        .head .nav li:cur{
            background-color: #3F7FE0;
        }
        .head .nav li:cur a{
            color: #ffffff;
        }
        .head .reg{
            float: right;
            font-size: 0.16rem;
            margin-right: 0.4rem;
        }
        .head .reg li{
            float: left;
            height: 0.98rem;
            line-height: 0.98rem;
            color: #333333;
        }
        .head .reg li a{
            color: #333333;
            padding: 0 0.05rem;
        }
        .foot{
            position: relative;
            z-index: 99;
            height: 0.6rem;
            width: 19.2rem;
            bottom: 0;
            left: 0;
            font-size: 0.16rem;
            text-align: center;
            line-height: 0.6rem;
            color: #000000;
        }
        .foot a{
            color: #000000;
            text-decoration: none;
        }
    </style>
</head>
<body style="padding-top:0px;">
<div class="head">
    <div class="logo1">
        <img src="images/WechatIMG1398.png" height="100%">
    </div>
    <ul class="nav">
        <fh-function>
            $sql="select * from sl_menu where U_hide=0 and U_del=0 and U_sub=0 order by U_order,U_id desc";
            s[[
            if($type==$row["U_type"] && $id==$row["U_typeid"]){
            $class="cur";
            }else{
            $class="";
            }

            if($row["U_type"]=="link"){
            $link=$row["U_link"];
            $target="_blank";
            }else{
            $link="?type=".$row["U_type"]."&id=".$row["U_typeid"];
            $target="_self";
            }
            $api=$api."<li rel=\"1\" class=\"".$class."\">
                <a href=\"".$link."\" title=\"".$row["U_title"]."\" target=\"".$target."\">".$row["U_title"]."</a><em class=\"phsearchicon\"></em>
                <div class='sub-nav'> ";


                    $sql2="select * from sl_menu where U_hide=0 and U_del=0 and U_sub=".$row["U_id"]." order by U_order,U_id desc";
                    s2[[

                    if($row2["U_type"]=="link"){
                    $link2=$row2["U_link"];
                    $target="_blank";
                    }else{
                    $link2="?type=".$row2["U_type"]."&id=".$row2["U_typeid"];
                    $target="_self";
                    }
                    $api=$api."<div class=\"sub-item\">
                        <a href=\"".$link2."\" target=\"".$target."\" title=\"".$row2["U_title"]."\">".$row2["U_title"]."</a>
                    </div>";
                    ]]


                    $api=$api."</div>
            </li>";
            ]]

        </fh-function>
    </ul>
    <ul class="reg">
        <fh-function>
            if($_SESSION["M_login"]==""){
            $api="<li ><a class=\"login\" href=\"member/login.php\">登录</a></li>
            <li>/</li>
            <li><a class=\"login\" href=\"member/reg.php\">注册</a></li>";
            }else{
            $api="<li><a class=\"login\" href=\"member\">".$_SESSION["M_login"]."</a></li>
            <li>/</li>
            <li><a class=\"login\" href=\"member/login.php?action=unlogin\">退出</a></li>";
                }
            </fh-function>
    </ul>
</div>
<div class="inside-banner" style="padding-top:80px;"> <img src="template/t4/skin/images/1569466857.jpg"/> </div>
<div class="full-inside-subnav">
    <div class="commonweb clearfix">
        <div class="inside-subnav">
            <h3 class="channel-title">[S_title]</h3>
            <div class="subnav clearfix">
                <ul class="clearfix">


                    <fh-function>
                        $U_id=getrs("select * from sl_menu where U_hide=0 and U_del=0 and U_type='news' and U_typeid=".$id,"U_id");
                        $U_sub=getrs("select * from sl_menu where U_hide=0 and U_del=0 and U_type='news' and U_typeid=".$id,"U_sub");

                        if($U_id!=""){
                        if($U_sub==0){
                        $sql="select * from sl_menu where U_hide=0 and U_del=0 and U_sub=".$U_id;
                        }else{
                        $sql="select * from sl_menu where U_hide=0 and U_del=0 and U_sub=".$U_sub;
                        }

                        s[[
                        if($row["U_type"]=="news" && $row["U_typeid"]==$id){
                        $active="cur";
                        }else{
                        $active="";
                        }
                        if($row["U_type"]=="link"){
                        $link=$row["U_link"];
                        $target="_blank";
                        }else{
                        $link="?type=".$row["U_type"]."&id=".$row["U_typeid"];
                        $target="_self";
                        }

                        $api=$api."<li class=\"".$active."\"> <a href=\"".$link."\" target=\"".$target."\" title=\"".$row["U_title"]."\">".$row["U_title"]."</a> </li>";
                        ]]
                        }
                    </fh-function>



                </ul>
                <a href="javascript:;" class="sub-btn sub-prev"></a> <a href="javascript:;" class="sub-btn sub-next"></a> </div>
        </div>
        <div class="crumb">
            <div class="inner"><a href='./'>主页</a> > <a href=''>[S_title]</a> >  </div>
        </div>
    </div>
</div>
<div class="common-clumb-min commonweb clearfix">
    <div class="clumb-title">
        <h3 class="cn font22">[S_title]</h3>
        <h2 class="en font24">[S_content]</h2>
    </div>
</div>

<div class="newscenter-list commonweb">
    <ul class="clearfix">
        <!--图片尺寸378*278-->

        <fh-function>
            if($id==0){
            $sql="select * from sl_news where N_del=0   $M_info order by N_top desc,N_order,N_id desc limit ".(($page-1)*12).",12";
            }else{
            if($S_sub==0){
            $sql="select * from sl_news,sl_nsort where S_del=0 and N_del=0  and N_sort=S_id and S_sub=".$id." order by N_top desc,N_order,N_id desc limit ".(($page-1)*12).",12";
            }else{
            $sql="select * from sl_news,sl_nsort where S_del=0  and N_del=0  and N_sort=S_id and S_id=".$id." order by N_top desc,N_order,N_id desc limit ".(($page-1)*12).",12";
            }
            }

            s[[

            $api=$api."<li class=\"col-sm-4 scms-pic\"> <a href=\"?type=newsinfo&id=".$row["N_id"]."\" title=\"".$row["N_title"]."\">
                <p class=\"news-img\"> <img  src=\"".pic($row["N_pic"])."\" alt=\"".$row["N_title"]."\" /> </p>
                <div class=\"news-text\">
                    <h3 class=\"name\">".$row["N_title"]."</h3>
                    <p class=\"desc\">".mb_substr(strip_tags($row["N_content"]),0,200,"utf-8")."</p>
                    <span class=\"date\">".date("Y-m-d",strtotime($row["N_date"]))."</span> </div>
            </a> </li>";
            ]]
        </fh-function>

    </ul>
</div>
<div class="commonweb padtbb">
    <div class="pages">
        <div id="pager"></div>
    </div>
</div>
<div class="foot">
    <a href="http://beian.miit.gov.cn/">[fh_code]</a> [fh_copyright][fh_beian]
</div>
<script type="text/javascript" src="template/t4/skin/js/scrollbar.js"></script>
<script type="text/javascript" src="template/t4/skin/js/jquery.countup.min.js"></script>
<script type="text/javascript" src="template/t4/skin/js/swiper.jquery.min.js"></script>
<script type="text/javascript" src="template/t4/skin/js/wow.min.js"></script>
<script type="text/javascript" src="template/t4/skin/js/scale.js"></script>
<script>
    var wow = new WOW({
        boxClass: 'wow',
        animateClass: 'animated',
        offset: 0,
        mobile: true,
        live: true
    });
    wow.init();
</script>
<script src="template/t4/skin/js/layout.js"></script>
<script src="js/jquery.pager.js" type="text/javascript"></script>
<script>
    $(".scms-pic").attr("style","float: none;display:inline-block;vertical-align:top;");
    $(document).ready(function() {
        $("#pager").pager({ pagenumber: <fh-function> $api=$api.$page;</fh-function>, pagecount: <fh-function> $api=$api.$page_num;</fh-function>, buttonClickCallback: PageClick });
    });

    PageClick = function(pageclickednumber) {
        window.location="<fh-function>$api=$api.url($url,"page",$_GET["page"]);</fh-function>&page="+pageclickednumber;
    }
</script>
</body>
</html>