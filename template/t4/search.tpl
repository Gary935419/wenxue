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
<title>搜索<fh-function> $api=$api.$keyword;</fh-function> -[fh_title]</title>
<link href="media/[fh_ico]" rel="shortcut icon" />
<meta name="description" content="[fh_description]" />
<meta name="keywords" content="[fh_keyword]" />

<link rel="stylesheet" type="text/css" href="template/t4/skin/css/aswiper.min.css" />
<link rel="stylesheet" type="text/css" href="template/t4/skin/css/animate.min.css" />
<link rel="stylesheet" type="text/css" href="template/t4/skin/css/layout.css" />
<link href="css/Pager.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="template/t4/skin/js/jquery-1.12.4.min.js"></script>
<style>
.search_pic{padding:5px;border:#CCCCCC solid 1px;width:100%;max-width:150px;min-width:100px;}
table{width: 100%;}
.search_area{}
.search_area .list{padding: 10px;}
.search_area td{padding: 10px;}
</style>
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
<div class="inside-banner "> <img src="template/t4/skin/images/1569491368.jpg"/> </div>
<div class="full-inside-subnav">
  <div class="commonweb clearfix">
    <div class="inside-subnav">
      <h3 class="channel-title">关于我们</h3>
      <div class="subnav clearfix">
        <ul class="clearfix">


          
        </ul>
        <a href="javascript:;" class="sub-btn sub-prev"></a> <a href="javascript:;" class="sub-btn sub-next"></a> </div>
    </div>
    <div class="crumb">
      <div class="inner"> <a href="./" class="home"></a> <a href='./'>主页</a> > <a href='./'>搜索页</a> </div>
    </div>
  </div>
</div>
<div class="common-clumb-min commonweb clearfix">
  <div class="clumb-title">
    <h3 class="cn font22">搜索“<fh-function> $api=$api.$keyword;</fh-function>”</h3>

  </div>
</div>

<div class="Pledge-min commonweb padtb search_area" >
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
<div id="pager"></div>
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