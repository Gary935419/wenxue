<fh-function>
mysqli_query($conn, "update sl_news set N_view=N_view+1 where N_id=".$id);
$sql="select * from sl_news,sl_nsort where N_sort=S_id and N_id=".$id;
  $result = mysqli_query($conn, $sql);
  $row = mysqli_fetch_assoc($result);
  if (mysqli_num_rows($result) > 0) {
    $S_id=$row["S_id"];
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
<title>[N_title] - [fh_title]</title>
<link href="media/[fh_ico]" rel="shortcut icon" />
<meta name="description" content="[N_description]" />
<meta name="keywords" content="[N_keywords]" />

<link rel="stylesheet" type="text/css" href="template/t4/skin/css/aswiper.min.css" />
<link rel="stylesheet" type="text/css" href="template/t4/skin/css/animate.min.css" />
<link rel="stylesheet" type="text/css" href="template/t4/skin/css/layout.css" />
<link href="css/Pager.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="template/t4/skin/js/jquery-1.12.4.min.js"></script>
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
<div class="inside-banner " style="padding-top:80px;"> <img src="template/t4/skin/images/1569466857.jpg"/> </div>
<div class="full-inside-subnav">
  <div class="commonweb clearfix">
    <div class="inside-subnav">
      <h3 class="channel-title">[S_title]</h3>
      <div class="subnav clearfix">
        <ul class="clearfix">

<fh-function>
      $U_id=getrs("select * from sl_menu where U_hide=0 and U_del=0 and U_type='news' and U_typeid=".$S_id,"U_id");
      $U_sub=getrs("select * from sl_menu where U_hide=0 and U_del=0 and U_type='news' and U_typeid=".$S_id,"U_sub");

      if($U_id!=""){
        if($U_sub==0){
              $sql="select * from sl_menu where U_hide=0 and U_del=0 and U_sub=".$U_id;
            }else{
              $sql="select * from sl_menu where U_hide=0 and U_del=0 and U_sub=".$U_sub;
            }
            
            s[[
              if($row["U_type"]=="news" && $row["U_typeid"]==$S_id){
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
      <div class="inner"> <a href="./" class="home"></a> <a href='./'>主页</a> > <a href='?type=news&id=[S_id]'>[S_title]</a> > <a href=''>[N_title]</a> >  </div>
    </div>
  </div>
</div>
<div class="newscenter-detail commonweb padtb">
  <div class="news-detail-title"> <span class="date font22">[N_date]</span>
    <h2 class="font24">[N_title]</h2>
    <div>[N_tag]</div>
    <div class="" id="" style="">
    <script type="text/javascript" charset="utf-8" src="https://static.bshare.cn/b/buttonLite.js#style=-1&uuid=&pophcol=2&lang=zh"></script>
    <script type="text/javascript" charset="utf-8" src="https://static.bshare.cn/b/bshareC0.js"></script>
  </div>
  <span id="collection_news" nid="[N_id]"></span>
  <select id="news_lange"  name="news_lange" style="-webkit-appearance: button;float: right;" onchange="newsLangeChange();">
      <option value="zh" >中文</option>
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
  <div class="news-datail-content padtb" > [N_content]
 </div>
  <div class="news-detail-foot">
    <dl class="clearfix">
      <dd class="clearfix">上一篇：<a href='[N_Purl]'>[N_Ptitle]</a>  </dd>
      <dt class="clearfix">下一篇：<a href='[N_Nurl]'>[N_Ntitle]</a>  </dt>
    </dl>
  </div>
</div>
<input type="hidden" id="N_CUR_URL" value="[N_CUR_URL]">
<input type="hidden" id="N_CUR_LANGE" value="[N_CUR_LANGE]">
<div class="foot">
    <a href="http://beian.miit.gov.cn/">[fh_code]</a> [fh_copyright][fh_beian]
</div>
<script type="text/javascript" src="template/t4/skin/js/scrollbar.js"></script> 
<script type="text/javascript" src="template/t4/skin/js/jquery.countup.min.js"></script> 
<script type="text/javascript" src="template/t4/skin/js/swiper.jquery.min.js"></script> 
<script type="text/javascript" src="template/t4/skin/js/wow.min.js"></script>
<script type="text/javascript" src="template/t4/skin/js/scale.js"></script>
<script type="text/javascript">
    $(function(){
        var cur_lange = $('#N_CUR_LANGE').val();
        $("#news_lange option[value="+cur_lange+"] ").attr("selected",true)
    });
    function newsLangeChange(){
        var langeValue = $('#news_lange').val();
        window.location.href = $('#N_CUR_URL').val()+'&chageLange='+langeValue;
    }
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
[fh_kefu]
</body>
</html>