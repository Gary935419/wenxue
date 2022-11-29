<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="renderer" content="webkit">
    <meta name="format-detection" content="telephone=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="format-detection" content="telephone=no">
    <meta http-equiv="Pragma" content="no-cache">
    <title>[fh_title]</title>
    <link href="media/[fh_ico]" rel="shortcut icon" />
    <meta name="description" content="[fh_description]" />
    <meta name="keywords" content="[fh_keyword]" />
    <meta name="author" content="author" />
    <link rel="stylesheet" type="text/css" href="template/t4/skin/css/aswiper.min.css" />
    <link rel="stylesheet" type="text/css" href="template/t4/skin/css/animate.min.css" />
    <script type="text/javascript" src="template/t4/skin/js/jquery-1.12.4.min.js"></script>
</head>
<style>
    *{
        margin: 0;
        padding: 0;
    }
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
    .head .logo{
        height: 0.98rem;
        float: left;
        margin-left: 0.4rem;
    }
    .head .logo img{
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
    .body{
        width: 19.2rem;
        height: 100%;
        position: absolute;
        background-image: url(../images/WechatIMG1396.jpeg);
        background-repeat: no-repeat;
        background-size: 100% auto;
        background-position: center bottom;
    }
    .cloue{
        width: 19.2rem;
        height: 100%;
        position: absolute;
        background-image: url(../images/WechatIMG1397.png);
        background-repeat: no-repeat;
        background-size: 100% auto;
        background-position: center bottom;
    }
    .foot{
        position: fixed;
        z-index: 99;
        height: 0.6rem;
        width: 19.2rem;
        bottom: 0;
        left: 0;
        font-size: 0.16rem;
        text-align: center;
        line-height: 0.6rem;
        color: #ffffff;
    }
    .foot a{
        color: #ffffff;
        text-decoration: none;
    }
</style>
<body>
<div class="head">
    <div class="logo">
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
<div class="body">

</div>
<div class="cloue">

</div>
<div class="foot">
    <a href="http://beian.miit.gov.cn/">[fh_code]</a> [fh_copyright][fh_beian]
</div>
</div>
<script type="text/javascript" src="template/t4/skin/js/scrollbar.js"></script>
<script type="text/javascript" src="template/t4/skin/js/jquery.countup.min.js"></script>
<script type="text/javascript" src="template/t4/skin/js/swiper.jquery.min.js"></script>
<script type="text/javascript" src="template/t4/skin/js/wow.min.js"></script>
<script type="text/javascript" src="template/t4/skin/js/scale.js"></script>
</body>
</html>