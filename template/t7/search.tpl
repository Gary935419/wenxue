<fh-function>
$keyword=t($_REQUEST["keyword"]);
$page=$_GET["page"];
if($page==""){
  $page=1;
}


$sql="select count(*) as L_count from
(select N_id as id,N_title as title,N_pic as pic,N_content as content,'newsinfo' as type from sl_news where N_del=0 and N_sh=1 and (N_title like '%".$keyword."%' or N_content like '%".$keyword."%' )
union select S_id as id,S_title as title,S_pic as pic,S_content as content,'news' as type from sl_nsort where S_del=0 and (S_title like '%".$keyword."%' or S_content like '%".$keyword."%' )
union select C_id as id,C_title as title,C_pic as pic,C_content as content,'courseinfo' as type from sl_course where C_del=0 and (C_title like '%".$keyword."%' or C_content like '%".$keyword."%' )
union select S_id as id,S_title as title,S_pic as pic,S_content as content,'course' as type from sl_usort where S_del=0 and (S_title like '%".$keyword."%' or S_content like '%".$keyword."%' )
union select P_id as id,P_title as title,P_pic as pic,P_content as content,'productinfo' as type from sl_product where P_del=0 and P_sh=1 and (P_title like '%".$keyword."%' or P_content like '%".$keyword."%' )
union select S_id as id,S_title as title,S_pic as pic,S_content as content,'product' as type from sl_psort where S_del=0 and (S_title like '%".$keyword."%' or S_content like '%".$keyword."%' )
union select T_id as id,T_title as title,T_pic as pic,T_content as content,'text' as type from sl_text where T_del=0 and (T_title like '%".$keyword."%' or T_content like '%".$keyword."%' ))a";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$L_count=$row["L_count"];

$page_num=intval($L_count/10)+1;
if($L_count%10 ==0){
  $page_num=$page_num-1;
}
</fh-function>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta charset="UTF-8">
<meta http-equiv="Content-Type" content="text/html" />
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<title>搜索<fh-function> $api=$api.$keyword;</fh-function> -[fh_title]</title>
<link href="media/[fh_ico]" rel="shortcut icon" />
<meta name="description" content="[fh_description]" />
<meta name="keywords" content="[fh_keyword]" />

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
<style>
.search_pic{padding:5px;border:#CCCCCC solid 1px;width:100%;max-width:150px;min-width:100px;}
table{width: 100%;}
.search_area{}
.search_area .list{padding: 10px;}
.search_area td{padding: 10px;}
</style>
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
      <div class="bulletin fourfifth"> <span class="sixth">当前位置：</span> <span class="current"> <a href='./'>主页</a> > <a href=''>搜索“<fh-function> $api=$api.$keyword;</fh-function>”</a> > </span> </div>
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
        $sql="select * from sl_news,sl_nsort where N_sh=1 and N_sort=S_id and N_del=0 ".$M_ninfo."  order by N_order,N_id desc limit 8";
                s[[


      $api=$api."<li class=\"post\"> <a href=\"?type=newsinfo&id=".$row["N_id"]."\" title=\"".$row["N_title"]."\"> <img src=\"".pic($row["N_pic"])."\" alt=\"".$row["N_title"]."\" width=\"142\" height=\"95\" alt=\"".$row["N_title"]."\">
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
$tag = explode(" ",$N_tag);
$tag = array_unique($tag);

for($i=0;$i<count($tag);$i++){
if($tag[$i]!=""){
  $api=$api."<li><a href=\"?type=news&tag=".$tag[$i]."\">".$tag[$i]."</a></li>";
}
  
}
</fh-function> 

      
    </ul>
  </div>
  <div id="sidebar-follow"> </div>
</div>
 
  <!--right end -->
  
  <div class="mainleft">
    <ul  class="search_area box">



        <fh-function>
if($keyword==""){
  $api=$api."请输入要查询的关键词！";
}else{

$sql="select id,title,pic,content,type from(select N_id as id,N_title as title,N_pic as pic,N_content as content,'newsinfo' as type from sl_news where N_del=0 and N_sh=1 and (N_title like '%".$keyword."%' or N_content like '%".$keyword."%' )
union select S_id as id,S_title as title,S_pic as pic,S_content as content,'news' as type from sl_nsort where S_del=0 and (S_title like '%".$keyword."%' or S_content like '%".$keyword."%' )
union select C_id as id,C_title as title,C_pic as pic,C_content as content,'courseinfo' as type from sl_course where C_del=0 and (C_title like '%".$keyword."%' or C_content like '%".$keyword."%' )
union select S_id as id,S_title as title,S_pic as pic,S_content as content,'course' as type from sl_usort where S_del=0 and (S_title like '%".$keyword."%' or S_content like '%".$keyword."%' )
union select P_id as id,P_title as title,P_pic as pic,P_content as content,'productinfo' as type from sl_product where P_del=0 and P_sh=1 and (P_title like '%".$keyword."%' or P_content like '%".$keyword."%' )
union select S_id as id,S_title as title,S_pic as pic,S_content as content,'product' as type from sl_psort where S_del=0 and (S_title like '%".$keyword."%' or S_content like '%".$keyword."%' )
union select T_id as id,T_title as title,T_pic as pic,T_content as content,'text' as type from sl_text where T_del=0 and (T_title like '%".$keyword."%' or T_content like '%".$keyword."%' ))a limit ".(($page-1)*10).",10";

$result = mysqli_query($conn,  $sql);
if (mysqli_num_rows($result) > 0) {
while($row = mysqli_fetch_assoc($result)) {
        $search_info=$search_info."<div class='list'><table><tr><td colspan='2' ><a href='?type=".$row["type"]."&id=".$row["id"]."' target='_blank'><font size='+1' color='#0066ff'><u>".str_Replace($keyword,"<font color='red'>".$keyword."</font>",$row["title"])."</u></font></a></td></tr><tr><td width='20%' align='center' valign='middle'><a href='?type=".$row["type"]."&id=".$row["id"]."' target='_blank'><img src='".pic(splitx($row["pic"],"|",0))."' class='search_pic'></a></td><td width='80%'>".str_replace($keyword,"<font color='red'>".$keyword."</font>",mb_substr(strip_tags($row["content"]),0,100,"utf-8"))."...<br><font color='#006600'>".$_SERVER["HTTP_HOST"]."/?type=".$row["type"]."&id=".$row["id"]."</font><br> <font color='#777777'>位置：<a href='./'>".$C_title."</a> - <a href='?type=".$row["type"]."&id=".$row["id"]."'>".$row["title"]."</a></font></td></tr></table></div>";
    }
  $api=$api.$search_info;
}else{
  $api=$api."抱歉！未找到“".$keyword."”的相关内容，请尝试其他关键词！";
}
}

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
$(document).ready(function() {
    $("#pager").pager({ pagenumber: <fh-function> $api=$api.$page;</fh-function>, pagecount: <fh-function> $api=$api.$page_num;</fh-function>, buttonClickCallback: PageClick });
});

PageClick = function(pageclickednumber) {
  window.location="?type=search&keyword=<fh-function> $api=$api.$keyword;</fh-function>&page="+pageclickednumber;
}
</script>
[fh_kefu]
</body>
</html>