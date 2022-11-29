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
<title>[T_title] - [fh_title]</title>
<link href="media/[fh_ico]" rel="shortcut icon" />
<meta name="description" content="[T_description]" />
<meta name="keywords" content="[T_keywords]" />

<link rel="stylesheet" type="text/css" href="template/t4/skin/css/aswiper.min.css" />
<link rel="stylesheet" type="text/css" href="template/t4/skin/css/animate.min.css" />
<link rel="stylesheet" type="text/css" href="template/t4/skin/css/layout.css" />
<script type="text/javascript" src="template/t4/skin/js/jquery-1.12.4.min.js"></script>
<style>
.form_container{height: 450px !important}
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
      <h3 class="channel-title">[T_title]</h3>
      <div class="subnav clearfix">
        <ul class="clearfix">
<fh-function>
      $U_id=getrs("select * from sl_menu where U_hide=0 and U_del=0 and U_type='text' and U_typeid=".$id,"U_id");
      $U_sub=getrs("select * from sl_menu where U_hide=0 and U_del=0 and U_type='text' and U_typeid=".$id,"U_sub");

      if($U_id!=""){
        if($U_sub==0){
              $sql="select * from sl_menu where U_hide=0 and U_del=0 and U_sub=".$U_id;
            }else{
              $sql="select * from sl_menu where U_hide=0 and U_del=0 and U_sub=".$U_sub;
            }
            
            s[[
              if($row["U_type"]=="text" && $row["U_typeid"]==$id){
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
      <div class="inner"> <a href="./" class="home"></a> <a href='./'>主页</a> > <a href='./'>[T_title]</a> </div>
    </div>
  </div>
</div>
<div class="common-clumb-min commonweb clearfix">
  <div class="clumb-title">
    <h3 class="cn font22">[T_title]</h3>

  </div>
</div>

<div class="Pledge-min commonweb padtb" >
  [T_content]
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
[fh_kefu]
</body>
</html>