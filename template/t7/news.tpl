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

$page_num=intval($N_count/18)+1;
if($N_count%18 ==0){
  $page_num=$page_num-1;
}

</fh-function>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta charset="UTF-8">
<meta http-equiv="Content-Type" content="text/html" />
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<title>[S_title] - [fh_title]</title>
<link href="media/[fh_ico]" rel="shortcut icon" />
<meta name="description" content="[S_content]" />
<meta name="keywords" content="[S_keywords]" />

<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
<link rel='stylesheet' id='contact-form-7-css'  href='template/t7/skin/styles.css' type='text/css' media='all' />
<link rel='stylesheet' id='responsive-lightbox-swipebox-front-css'  href='template/t7/skin/swipebox.min.css' type='text/css' media='all' />
<link rel='stylesheet' id='wp-pagenavi-css'  href='template/t7/skin/pagenavi-css.css' type='text/css' media='all' />
<link rel='stylesheet' id='kube-css'  href='template/t7/skin/kube.css' type='text/css' media='all' />
<link href="css/Pager.css" rel="stylesheet" type="text/css" />
<script type='text/javascript' src='template/t7/skin/jquery.min.js'></script>
<script type='text/javascript' src='template/t7/skin/jquery.swipebox.min.js'></script>
<script type='text/javascript'>
/* <![CDATA[ */
var rlArgs = {"script":"swipebox","selector":"lightbox","custom_events":"","activeGalleries":"1","animation":"1","hideCloseButtonOnMobile":"0","hideBars":"1","hideBarsDelay":"5000","videoMaxWidth":"1080","useSVG":"","loopAtEnd":"0"};
/* ]]> */
</script>
<script type='text/javascript' src='template/t7/skin/front.js'></script>
<script type='text/javascript' src='template/t7/skin/jquery.masonry.js'></script>
<link rel="stylesheet" type="text/css" href="template/t7/skin/black.css" />
<style></style>
</head>
<body  class="custom-background">
<!--加载进度条--> 
<script type="text/javascript">
jQuery(function(){
jQuery('#loading-one').empty().append('页面载入完毕.').parent().fadeOut('slow');
});
</script>
<div id="main_loading"  onclick="javascript:turnoff('loading')">
  <p id="loading-one" onclick="javascript:turnoff('loading')">页面载入中...</p>
</div>
<script type="text/javascript">
//<![CDATA[
function turnoff(obj){
document.getElementById(obj).style.display="none";
}
//]]&gt;
</script> 
<!--加载进度条--> 
<!--head--> 

<div id="head" class="row">
  <div class="mainbar row">
    <div class="container">
      <div id="topbar">
        <ul id="toolbar" class="menu">
          <li class="menu-item">欢迎来到[fh_title]!</li>
        </ul>
      </div>
      <div id="rss">
        <ul>

          <fh-function>
      if($_SESSION["M_login"]==""){
        $api="<li><a class=\"login\" href=\"member/login.php\">登录</a></li>

              <li><a class=\"login\" href=\"member/reg.php\">注册</a></li>";
      }else{
        $api="<li><a class=\"login\" href=\"member\">".$_SESSION["M_login"]."</a></li>

              <li><a class=\"login\" href=\"member/login.php?action=unlogin\">退出</a></li>";
      }
      </fh-function>


        </ul>
      </div>
    </div>
  </div>
  <div class="clear"></div>
  <div class="container">
    <div id="blogname" class="third"> <a href="./" title="[fh_title]">
      <h1>[fh_title]</h1>
      <img src="media/[fh_logo]" alt="[fh_title]" height="80" /></a> </div>
     </div>
  <div class="clear"></div>
</div>
<div class="mainmenus container">
  <div class="mainmenu">
    <div class="topnav"> <a   class='home' href="./" title="首页" class="home_none">首页</a>
      <div class="menu-button"><i class="menu-ico"></i></div>
      <!--导航-->
      <ul class="menu">

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


    $api=$api."<li class=\"menu-item \"> <a href=\"".$link."\" title=\"".$row["U_title"]."\" target=\"".$target."\">".$row["U_title"]."</a>
          <ul class=\"sub-menu\">";
            

            $sql2="select * from sl_menu where U_hide=0 and U_del=0 and U_sub=".$row["U_id"]." order by U_order,U_id desc";
                    s2[[
                      
                      if($row2["U_type"]=="link"){
                        $link2=$row2["U_link"];
                        $target="_blank";
                      }else{
                        $link2="?type=".$row2["U_type"]."&id=".$row2["U_typeid"];
                        $target="_self";
                      }
                            
    $api=$api."<li><a href=\"".$link2."\" target=\"".$target."\" title=\"".$row2["U_title"]."\">".$row2["U_title"]."</a></li>";

                        ]]

            
          $api=$api."</ul>
</li>";
                ]]

              </fh-function>
      </ul>
      <!--导航 end-->
      <ul class="menu-right">
        <li class="menu-search"> <a href="#" id="menu-search" title="搜索"></a>
          <div class="menu-search-form ">
            <form action="./?type=search" method="post">
              <input name="keyword" type="text" id="search" value="" maxlength="150" placeholder="请输入搜索内容" x-webkit-speech style="width:135px">
              <input type="submit" value="搜索" class="button"/>
            </form>
          </div>
        </li>
      </ul>
      <!-- menus END --> 
    </div>
  </div>
  <div class="clear"></div>
</div>
 
<!--head end-->
<div class="container">
  <div class="row">
    <div class="subsidiary box">
      <div class="bulletin fourfifth"> <span class="sixth">当前位置：</span> <span class="current"> <a href='./'>主页</a> > <a href=''>[S_title]</a> > </span> </div>
    </div>
  </div>
  <!--right--> 
  
<div id="sidebar">
  <div class="widget box row">
        <div id="tab-title">
        <div class="tab">
          <ul id="tabnav">
            <li>最新</li>
            <li class="selected">热门</li>
            <li>随机</li>
          </ul>
        </div>
        <div class="clear"></div>
      </div>
      <div id="tab-content">
        <ul class="hide"> 

        <fh-function>
        $sql="select * from sl_news,sl_nsort where N_sh=1 and N_sort=S_id and N_del=0 ".$M_ninfo."  order by N_id desc limit 10";
                s[[
          $api=$api."<li> <a href=\"?type=newsinfo&id=".$row["N_id"]."\" title=\"".$row["N_title"]."\">".$row["N_title"]."</a> </li>";
                    ]]
        </fh-function>

</ul>
        <ul>
<fh-function>
        $sql="select * from sl_news,sl_nsort where N_sh=1 and N_sort=S_id and N_del=0 ".$M_ninfo."  order by N_view desc limit 10";
                s[[
          $api=$api."<li> <a href=\"?type=newsinfo&id=".$row["N_id"]."\" title=\"".$row["N_title"]."\">".$row["N_title"]."</a> </li>";
                    ]]
        </fh-function>


</ul>
        <ul class="hide">
<fh-function>
        $sql="select * from sl_news,sl_nsort where N_sh=1 and N_sort=S_id and N_del=0 ".$M_ninfo."  order by rand() desc limit 10";
                s[[
          $api=$api."<li> <a href=\"?type=newsinfo&id=".$row["N_id"]."\" title=\"".$row["N_title"]."\">".$row["N_title"]."</a> </li>";
                    ]]
        </fh-function>
                        </ul>
             </div>
          </div>
  <div class="search box row">
    <div class="search_site">
      <form id="searchform" action="./?type=search" method="post">
        <input type="submit" value="" id="searchsubmit" class="button"/>
        <label><span>请输入搜索内容</span>
          <input type="text" class="search-s" name="keyword"  x-webkit-speech />
        </label>
      </form>
    </div>
  </div>
  <div class="widget box row">
    <h3>微信公众帐号-扫一扫哦！</h3>
    <div class="textwidget"><a id="adv" rel="external" href="index.html"> <img src="media/[fh_qrcode]" /></a></div>
  </div>

  <div class="widget box row">
    <h3>推荐图文</h3>
    <div class="siderbar-list">
      <ul class="imglist clear">
<fh-function>
        $sql="select * from sl_news,sl_nsort where N_sh=1 and N_sort=S_id and N_del=0 ".$M_ninfo."  order by N_top desc,N_order,N_id desc limit 8";
                s[[
      $api=$api."<li class=\"post\"> <a href=\"?type=newsinfo&id=".$row["N_id"]."\" title=\"".$row["N_title"]."\"> 
        <div style=\"background-image:url(".pic($row["N_pic"]).");background-repeat: no-repeat;background-position:center center;width:140px;height:94px;background-size: cover;\"></div>
          <h4>".$row["N_title"]."</h4>
          </a> </li>";



                    ]]
        </fh-function>

      </ul>
    </div>
  </div>
  <div class="widget box row">
    <h3>HOT TAGS</h3>
    <ul class='xoxo blogroll'>
      
<fh-function>

$sql="select * from sl_news where N_sh=1 and N_del=0 ".$M_ninfo." ";
                s[[
if($row["N_tag"]!=""){
  $N_tag=$N_tag.$row["N_tag"]." ";
}
                    ]]
$tags = explode(" ",$N_tag);
$tags = array_unique($tags);

for($i=0;$i<count($tags);$i++){
if($tags[$i]!=""){
  $api=$api."<li><a href=\"?type=news&tag=".$tags[$i]."\">".$tags[$i]."</a></li>";
}
  
}
</fh-function> 

      
    </ul>
  </div>
  <div id="sidebar-follow"> </div>
</div>
 
  <!--right end -->
  
  <div class="mainleft">
    <ul id="post_container" class="masonry clearfix">



        <fh-function>
if($id==0){
  $sql="select * from sl_news where N_del=0 ".$M_ninfo."  $M_info order by N_order,N_id desc limit ".(($page-1)*18).",18";
}else{
  if($S_sub==0){
    $sql="select * from sl_news,sl_nsort where S_del=0 $M_info and N_del=0 ".$M_ninfo."  and N_sort=S_id and S_sub=".$id." order by N_order,N_id desc limit ".(($page-1)*18).",18";
  }else{
    $sql="select * from sl_news,sl_nsort where S_del=0 $M_info and N_del=0 ".$M_ninfo."  and N_sort=S_id and S_id=".$id." order by N_order,N_id desc limit ".(($page-1)*18).",18";
  }
}

      s[[
        

          $api=$api."<li class=\"post box row \">
        <div class=\"thumbnail\"> <a href=\"?type=newsinfo&id=".$row["N_id"]."\" title=\"".$row["N_title"]."\" class=\"zoom\"  target=\"_blank\" > <img src=\"".pic($row["N_pic"])."\" alt=\"".$row["N_title"]."\" />
          <div class=\"zoomOverlay\"></div>
          </a> </div>
        <div class=\"article\">
          <h2><a href=\"?type=newsinfo&id=".$row["N_id"]."\"  target=\"_blank\" title=\"".$row["N_title"]."\">".$row["N_title"]."</a></h2>
        </div>
        <div class=\"info\"> <span class=\"info_date info_ico\">".date("Y-m-d",strtotime($row["N_date"]))."</span> <span class=\"info_views info_ico\">".$row["N_view"]." </span> 
          <span class=\"info_category info_ico\"><a href=\"?type=news&id=".$row["S_id"]."\" rel=\"category\">".$row["S_title"]."</a></span> </div>
      </li>";



          ]]
        </fh-function>

    </ul>
    <div class="clear"></div>
    <div class="pages"> <div id="pager"></div>
 </div>
  </div>
</div>
<div class="clear"></div>
<!--footer--> 
<div id="footer">
  <div class="footnav container">
    <div class="menu">
      <ul>
        友情链接：
        
        <fh-function>
        $sql="select * from sl_link where L_del=0 order by L_id desc";
        s[[$api=$api."<li class=\"page_item page-item-2\"><a href=\"".$row["L_link"]."\" target=\"_blank\">".$row["L_title"]."</a></li>";]]
        </fh-function>
      </ul>
    </div>
  </div>
  <div class="copyright">
    <p> [fh_copyright][fh_beian][fh_code]
       </p>
  </div>
</div>
</div>
<!--gototop-->
<div id="tbox"> <a id="gotop" href="javascript:void(0)"></a> </div>
<script type='text/javascript' src='template/t7/skin/jquery.form.min.js'></script> 
<script type='text/javascript' src='template/t7/skin/scripts.js'></script> 
<script type='text/javascript' src='template/t7/skin/loostrive.js'></script> 
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
[fh_kefu]
</body>
</html>