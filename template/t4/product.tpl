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
  $taginfo=" and CONCAT(\" \",P_tag,\" \") like '% ".$tag." %'";
}

$M_id=$_GET["M_id"];
if($page==""){
  $page=1;
}
if($M_id!=""){
  $M_info=" and P_mid=$M_id ".$taginfo;
}else{
  $M_info=" and P_sh=1".$taginfo;
}

$sql="select * from sl_psort where S_id=".$id;
  $result = mysqli_query($conn, $sql);
  $row = mysqli_fetch_assoc($result);
  if (mysqli_num_rows($result) > 0) {
    $S_sub=$row["S_sub"];
  }

if($id==0){
  $sql="select count(P_id) as P_count from sl_product where P_del=0 ".$M_pinfo."  $M_info order by P_order,P_id desc";
}else{
  if($S_sub==0){
    $sql="select count(P_id) as P_count from sl_product,sl_psort where S_del=0 $M_info and P_del=0 ".$M_pinfo."  and P_sort=S_id and S_sub=".$id." order by P_order,P_id desc";
  }else{
    $sql="select count(P_id) as P_count from sl_product,sl_psort where S_del=0 $M_info and P_del=0 ".$M_pinfo."  and P_sort=S_id and S_id=".$id." order by P_order,P_id desc";
  }
}

$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$P_count=$row["P_count"];

$page_num=intval($P_count/10)+1;
if($P_count%10 ==0){
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

<link rel="stylesheet" type="text/css" href="template/t4/skin/css/aswiper.min.css"/>
<link rel="stylesheet" type="text/css" href="template/t4/skin/css/animate.min.css"/>
<link rel="stylesheet" type="text/css" href="template/t4/skin/css/layout.css"/>
<script type="text/javascript" src="template/t4/skin/js/jquery-1.12.4.min.js"></script>
<link href="css/Pager.css" rel="stylesheet" type="text/css" />
</head>
<body>
<header>
<div class="headerweb clearfix">
<h3 class="logo"> <a href="./"><img src="media/[fh_logo]" alt="[fh_title]"/></a> </h3>
<div class="header-nav commonweb ">
<ul class="clearfix" id="curlist">

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
  <h3><a href=\"".$link."\" title=\"".$row["U_title"]."\" target=\"".$target."\">".$row["U_title"]."</a><em class=\"phsearchicon\"></em></h3>
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
      <h4><a href=\"".$link2."\" target=\"".$target."\" title=\"".$row2["U_title"]."\">".$row2["U_title"]."</a></h4>
    </div>";
                        ]]

            
          $api=$api."</div>
</li>";
                ]]

              </fh-function>



<div class="childMenu"> </div>
</div>
<div class="header-right">
  <div class="headsearch"> <a href="javascript:;" class="search-con"> <span class="search-inco"></span>
    <div class="searchbox">
      <form  name="formsearch" action="./?type=search" method="post">
        <input type="hidden" name="kwtype" value="0" />
        <input type="text" name="keyword" class="searchtext" />
        <input type="submit" class="searchbtn" value="搜索" />
      </form>
    </div>
    </a> </div>
  
  <a href="javascript:;" class="mobnav-btn"> <span></span> <span></span> <span></span> </a> 
  <!--<div class="headlanguage"> <a href="" target="_blank" class="langbtn"></a> </div>--> 
</div>
<div class="pcnavmenubtn"> <a href="javascript:;" class="pcnav-btn"> <span></span> <span></span> <span></span> </a> </div>
</div>
</header>
<!--侧边导航-->
<div class="headsideNav"> <a href="javascript:;" class="slide-colse"></a> <a href="#" ><img src="media/[fh_logo]" alt="[fh_title]" /></a>
  <div class="slide-nav"> </div>
</div>
<a href="javascript:;" class="exit-off-canvas"></a>
<div class="inside-banner"> <img src="template/t4/skin/images/1569464033.jpg"/> </div>
<div class="full-inside-subnav">
  <div class="commonweb clearfix">
    <div class="inside-subnav">
      <h3 class="channel-title">[S_title]</h3>
      <div class="subnav clearfix">
        <ul class="clearfix">



          <fh-function>
      $U_id=getrs("select * from sl_menu where U_hide=0 and U_del=0 and U_type='product' and U_typeid=".$id,"U_id");
      $U_sub=getrs("select * from sl_menu where U_hide=0 and U_del=0 and U_type='product' and U_typeid=".$id,"U_sub");

      if($U_id!=""){
        if($U_sub==0){
              $sql="select * from sl_menu where U_hide=0 and U_del=0 and U_sub=".$U_id;
            }else{
              $sql="select * from sl_menu where U_hide=0 and U_del=0 and U_sub=".$U_sub;
            }
            
            s[[
              if($row["U_type"]=="product" && $row["U_typeid"]==$id){
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
      <div class="inner"> <a href="./" class="home"></a> <a href='./'>主页</a> > <a href=''>[S_title]</a>  </div>
    </div>
  </div>
</div>
<div class="common-clumb-min commonweb clearfix">
  <div class="clumb-title">
    <h3 class="cn font22">[S_title]</h3>
    <h2 class="en font24">[S_content]</h2>
  </div>
  <div class="common-clumb-box">
    <div class="common-clumb ">
      <div class="clumb-box swiper-wrapper"> 

<fh-function>
      $U_id=getrs("select * from sl_menu where U_hide=0 and U_del=0 and U_type='product' and U_typeid=".$id,"U_id");
      $U_sub=getrs("select * from sl_menu where U_hide=0 and U_del=0 and U_type='product' and U_typeid=".$id,"U_sub");

      if($U_id!=""){
        if($U_sub==0){
              $sql="select * from sl_menu where U_hide=0 and U_del=0 and U_sub=".$U_id;
            }else{
              $sql="select * from sl_menu where U_hide=0 and U_del=0 and U_sub=".$U_sub;
            }
            
            s[[
              if($row["U_type"]=="product" && $row["U_typeid"]==$id){
                $active="cur";
              }else{
                $active="";
              }
                    $api=$api." <a class=\"swiper-slide ".$active."\" href=\"?type=".$row["U_type"]."&id=".$row["U_typeid"]."\" title=\"".$row["U_title"]."\">".$row["U_title"]."</a> ";
                ]]
      }
        </fh-function>


      </div>
    </div>
  </div>
</div>
<div class="product-list commonweb">
  <ul class="clearfix">


<fh-function>
if($id==0){
  $sql="select * from sl_product where P_del=0 ".$M_pinfo."  $M_info order by P_top desc,P_order,P_id desc limit ".(($page-1)*12).",12";
}else{
  if($S_sub==0){
    $sql="select * from sl_product,sl_psort where S_del=0 $M_info and P_del=0 ".$M_pinfo."  and P_sort=S_id and S_sub=".$id." order by P_top desc,P_order,P_id desc limit ".(($page-1)*12).",12";
  }else{
    $sql="select * from sl_product,sl_psort where S_del=0 $M_info and P_del=0 ".$M_pinfo."  and P_sort=S_id and S_id=".$id." order by P_top desc,P_order,P_id desc limit ".(($page-1)*12).",12";
  }
}

    s[[
      $api=$api."<li class=\"col-xs-6 col-sm-3 scms-pic\"> <a href=\"?type=productinfo&id=".$row["P_id"]."\" title=\"".$row["P_title"]."\">
      <p class=\"pro-img\"> <img src=\"".pic(splitx($row["P_pic"],"|",0))."\" alt=\"".$row["P_title"]."\"/> </p>
      <p class=\"pro-text\">".$row["P_title"]."</p>
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
<footer class="footer">
  <div class="footer-top commonweb clearfix">
    <ul class="clearfix">

<fh-function>
                $sql="select * from sl_menu where U_hide=0 and U_del=0 and U_sub=0 and not U_type='index' order by U_order,U_id desc";
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
                    $api=$api."<li class=\"li1\">
        <h3><a href=\"".$link."\" target=\"".$target."\" title=\"".$row["U_title"]."\">".$row["U_title"]."</a> <span class=\"plus icon\"></span> </h3>
        <p class=\"footer-sub sub-box\">";
            

            $sql2="select * from sl_menu where U_hide=0 and U_del=0 and U_sub=".$row["U_id"]." order by U_order,U_id desc";
                    s2[[
                      
                      if($row2["U_type"]=="link"){
                        $link2=$row2["U_link"];
                        $target="_blank";
                      }else{
                        $link2="?type=".$row2["U_type"]."&id=".$row2["U_typeid"];
                        $target="_self";
                      }
                            $api=$api."<a href=\"".$link2."\" target=\"".$target."\" title=\"".$row2["U_title"]."\">".$row2["U_title"]."</a> ";
                        ]]

            
          $api=$api."</p>
      </li>";
                ]]

              </fh-function>

      <li class="li2 fr" style="float:right">
        <p> <img src="media/[fh_qrcode]" width="150"> </p>
        <p class="telnum">[fh_copyright][fh_beian][fh_code]</p>

      </li>
    </ul>
  </div>
  <!--2018.11.19 end-->
  <div class="friendlink">
    <div class="commonweb">
      <p> <span>友情链接：</span>   

<fh-function>
        $sql="select * from sl_link where L_del=0 order by L_id desc";
        s[[$api=$api."<a href=\"".$row["L_link"]."\" target=\"_blank\">".$row["L_title"]."</a> ";]]
        </fh-function>



            </p>
    </div>
  </div>
</footer>
<a class="zdsbacktop" href="javascript:"></a> 
<script type="text/javascript" src="template/t4/skin/js/scrollbar.js"></script> 
<script type="text/javascript" src="template/t4/skin/js/jquery.countup.min.js"></script> 
<script type="text/javascript" src="template/t4/skin/js/swiper.jquery.min.js"></script> 
<script type="text/javascript" src="template/t4/skin/js/wow.min.js"></script> 
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
[fh_kefu]
</body>
</html>