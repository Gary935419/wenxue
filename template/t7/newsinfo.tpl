<fh-function>
mysqli_query($conn, "update sl_news set N_view=N_view+1 where N_id=".$id);
$sql="select * from sl_news,sl_nsort where N_sort=S_id and N_id=".$id;
  $result = mysqli_query($conn, $sql);
  $row = mysqli_fetch_assoc($result);
  if (mysqli_num_rows($result) > 0) {
    $S_id=$row["S_id"];
  }
</fh-function>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta charset="UTF-8">
<meta http-equiv="Content-Type" content="text/html" />
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<title>[N_title] - [fh_title]</title>
<link href="media/[fh_ico]" rel="shortcut icon" />
<meta name="description" content="[N_description]" />
<meta name="keywords" content="[N_keywords]" />

<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
<link rel='stylesheet' id='contact-form-7-css'  href='template/t7/skin/styles.css' type='text/css' media='all' />
<link rel='stylesheet' id='responsive-lightbox-swipebox-front-css'  href='template/t7/skin/swipebox.min.css' type='text/css' media='all' />
<link rel='stylesheet' id='wp-pagenavi-css'  href='template/t7/skin/pagenavi-css.css' type='text/css' media='all' />
<link rel='stylesheet' id='kube-css'  href='template/t7/skin/kube.css' type='text/css' media='all' />
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
.fh100_news_btn{line-height: 30px;vertical-align: top;margin-top: 20px !important;}
#post_content img{max-width: calc(100% - 10px);margin:10px 0;padding: 5px;border:solid 1px #DDDDDD;}
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
      <div class="bulletin fourfifth"> <span class="sixth">当前位置：</span> <span class="current"> <a href='./'>主页</a> > <a href='?type=news&id=[S_id]'>[S_title]</a> > <a href=''>[N_title]</a> > 正文</span> </div>
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


      $api=$api."<li class=\"post\"> <a href=\"?type=newsinfo&id=".$row["N_id"]."\" title=\"".$row["N_title"]."\"> 
      	<div style=\"background-image:url(".pic($row["N_pic"]).");background-repeat: no-repeat;background-position:center center;width:142px;height:95px;background-size: cover;\"></div>
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
    <div class="article_container row  box">
      <h1>[N_title]</h1>
      <div class="article_info"> <span class="info_author info_ico">[N_author]</span> <span class="info_category info_ico"><a href="?type=news&id=[S_id]">[S_title]</a></span> <span class="info_date info_ico">[N_date]</span> <span class="info_views info_ico">[N_view]</span>  <span id="collection_news" nid="[N_id]"></span>
        <!--评论数 <span class="info_comment info_ico"><a href="#">88</a></span>--> 
      </div>
      <div class="clear"></div>
      <div class="context">
        <div id="post_content"> 
[N_content]
 </div>
        <div class="clear"></div>
        <div class="article_tags">
          <div style="text-align: left;">

            [N_tag]
          </div>
        </div>
        
      </div>
    </div>
    <!--ad -->
    <div class="box row"> 
          <div style="padding: 20px; text-align: center;">
            免责声明：本站所有图片均来自网络，如果有侵犯您的权益，请联系我们删除。
          </div>
    </div>
    <!--ad end-->
    <ul class="post-navigation row">
      <div class="post-previous twofifth"> 上一篇：<a href='[N_Purl]'>[N_Ptitle]</a>  </div>
      <div class="post-next twofifth"> 下一篇：<a href='[N_Nurl]'>[N_Ntitle]</a>  </div>
    </ul>
    <!--热门图文-->
    <div class="article_container row  box article_related">
      <div class="related">
        <ul>

<fh-function>
$sql="select * from sl_news where N_del=0 ".$M_ninfo."  and N_sort=$S_id order by N_order,N_id desc limit 12";
s[[

                  $api=$api."<li class=\"related_box\"> <a href=\"?type=newsinfo&id=".$row["N_id"]."\" title=\"".$row["N_title"]."\" target=\"_blank\">
            <div class=\"r_pic\"> 
            	<div style=\"background-image:url(".pic($row["N_pic"]).");background-repeat: no-repeat;background-position:center center;width:140px;height:94px;background-size: cover;\"></div>
            	 </div>
            <div class=\"r_title\">".$row["N_title"]."</div>
            </a> </li>";


                ]]

                </fh-function>


        </ul>
      </div>
    </div>
    <div class="clear"></div>

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
<!--footer  end-->
[fh_kefu]
</body>
</html>