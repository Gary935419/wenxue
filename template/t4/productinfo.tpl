<fh-function>
mysqli_query($conn, "update sl_product set P_view=P_view+1 where P_id=".$id);
$sql="select * from sl_product,sl_psort where P_sort=S_id and P_id=".$id;
  $result = mysqli_query($conn, $sql);
  $row = mysqli_fetch_assoc($result);
  if (mysqli_num_rows($result) > 0) {
    $S_id=$row["S_id"];
    $S_sub=$row["S_sub"];
    $P_id=$row["P_id"];

    switch ($row["P_selltype"]) {
    case 0:
    $P_rest=1;
    break;

    case 1:
    $P_rest=getrs("select count(C_id) as C_count from sl_card where C_sort=".intval($row["P_sell"])." and C_use=0","C_count");
    break;

    case 2:
    $P_rest=$row["P_rest"];
    break;
  }
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
<title>[P_title] - [fh_title]</title>
<link href="media/[fh_ico]" rel="shortcut icon" />
<meta name="description" content="[P_description]" />
<meta name="keywords" content="[P_keywords]" />

<link rel="stylesheet" type="text/css" href="template/t4/skin/css/aswiper.min.css" />
<link rel="stylesheet" type="text/css" href="template/t4/skin/css/animate.min.css" />
<link rel="stylesheet" type="text/css" href="template/t4/skin/css/layout.css" />
<script type="text/javascript" src="template/t4/skin/js/jquery-1.12.4.min.js"></script>
<style>
#buy .add{
  height:25px; width:25px; margin:0 5px 0 5px;line-height:100%;
  border: hidden;
  background-color: #65bd77;
  color: #FFFFFF;
  font-size: 15px;
  line-height: 100%;
  cursor: pointer;
  border-radius:3px;
}

#buy .add:hover {
  border: #65bd77 solid 1px;
  background-color: #FFFFFF;
  color: #65bd77;
}

#buy .buy_btn{
height:40px; 
margin:0 5px 0 5px;line-height:100%;padding: 10px;
  border: hidden;
  background-color: #65bd77;
  color: #FFFFFF;
  font-size: 15px;
  line-height: 100%;
  cursor: pointer;
  border-radius:3px;
}

#amount{
  border-top:1px solid #ABADB3;
  border-left:1px solid #ABADB3;
  border-right:1px solid #ddd;
  border-bottom:1px solid #ddd;
  height:24px;
  width:50px;
  padding:0 5px;
  line-height:100%;
}
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
<div class="inside-banner "> <img src="template/t4/skin/images/1569464033.jpg"/></div>
<div class="full-inside-subnav">
  <div class="commonweb clearfix">
    <div class="inside-subnav">
      <h3 class="channel-title">[S_title]</h3>
      <div class="subnav clearfix">
        <ul class="clearfix">
          <fh-function>
      $U_id=getrs("select * from sl_menu where U_hide=0 and U_del=0 and U_type='product' and (U_typeid=".$S_id." or U_typeid=".$S_sub.")","U_id");
      $U_sub=getrs("select * from sl_menu where U_hide=0 and U_del=0 and U_type='product' and (U_typeid=".$S_id." or U_typeid=".$S_sub.")","U_sub");

      if($U_id!=""){
        if($U_sub==0){
              $sql="select * from sl_menu where U_hide=0 and U_del=0 and U_sub=".$U_id;
            }else{
              $sql="select * from sl_menu where U_hide=0 and U_del=0 and U_sub=".$U_sub;
            }
            
            s[[
              if($row["U_type"]=="product" && ($row["U_typeid"]==$S_id || $row["U_typeid"]==$S_sub)){
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
      <div class="inner"> <a href="./" class="home"></a> <a href='./'>主页</a> > <a href='?type=product&id=[S_id]'>产品展示</a> > <a href=''>[P_title]</a> >  </div>
    </div>
  </div>
</div>

<div class="row">

        <div style="width: 50%;display: inline-block;vertical-align: top;">
          <div class='met-showproduct-list fngallery text-center slick-dotted' id="met-imgs-carousel">
            <div class='slick-slide lg-item-box' data-src="[P_pic]" data-exthumbimage='[P_pic]'> 
              <span> <img src='[P_pic]' data-src='[P_pic]' class="img-responsive" alt="[P_title]" style="width:100%;max-width: 400px;float: right;margin-right: 30px;"/> </span>

            </div>
          </div>
        </div><div style="width: 50%;display: inline-block;padding-top: 20px;">
          <h2 style="line-height: 50px;">[P_title]</h2>
          <div>[P_tag]</div>
          <div class="shop-product-intro grey-500">
            <div class="padding-20 bg-grey-100 price" style="margin-bottom: 20px;"> 价格：￥<span id="price" class="red-600" style="font-weight: bold;font-size: 25px;color: #ff6600;">[P_price]</span>[P_vip]</div>
            <div style="margin-top: -10px;">[P_quan]</div>
            <div class="form-group inline-block margin-top-30">
              <form id="buy" method="post" action="buy.php?type=productinfo&id=[P_id]">
                <p style="margin-bottom: 10px"><b>购买数量：</b>
              <input type='button' class='add' value='-' onClick='javascript:if(this.form.amount.value>=2){this.form.amount.value--;}'>
              <input type='text' name='no' value='1' id='amount'>
              <input type='button' class='add' value='+' id='plus' onClick='javascript:if(this.form.amount.value<[P_rest]){this.form.amount.value++;}'>
              （库存：<span id="gg_rest">[P_resttitle]</span>）</p>
              [P_gg]
              [fh_address]
              <fh-function>
              $api=$api."<input type=\"submit\" name=\"button\" class=\"buy_btn\" value=\"立即购买\" /> ";
              $api=$api.unlogin_product("buy_btn",$id);
              </fh-function>
              </form>
              <div id="collection_product" pid="[P_id]"></div>
            </div>
          </div>
        </div>
      </div>

<div class="pro-datial-tab ">
  <div class="tab-optionsbox">
    <div class="tab-options clearfix">
      <div class="commonweb"> 
        <a href="javascript:;" class="cur">产品介绍</a> 
        
      </div>
    </div>
  </div>
  <div class="commonweb">
    <div class="composimin">
      <div class="padtb Technical" >
        [P_shuxing][P_content]
      </div>
      
    </div>
    <div class="news-detail-foot">
      <dl class="clearfix">
        <dd class="clearfix">上一篇：<a href='[P_Purl]'>[P_Ptitle]</a>  </dd>
        <dt class="clearfix">下一篇：<a href='[P_Nurl]'>[P_Ntitle]</a>  </dt>
      </dl>
    </div>
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
[fh_kefu]
</body>
</html>