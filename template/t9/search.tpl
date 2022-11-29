<fh-function>
$keyword=t($_REQUEST["keyword"]);
$page=$_GET["page"];
if($page==""){
  $page=1;
}


$sql="select count(*) as L_count from
(select N_id as id,N_title as title,N_pic as pic,N_content as content,'newsinfo' as type from sl_news where N_del=0 and (N_title like '%".$keyword."%' or N_content like '%".$keyword."%' )
union select S_id as id,S_title as title,S_pic as pic,S_content as content,'news' as type from sl_nsort where S_del=0 and (S_title like '%".$keyword."%' or S_content like '%".$keyword."%' )
union select C_id as id,C_title as title,C_pic as pic,C_content as content,'courseinfo' as type from sl_course where C_del=0 and (C_title like '%".$keyword."%' or C_content like '%".$keyword."%' )
union select S_id as id,S_title as title,S_pic as pic,S_content as content,'course' as type from sl_usort where S_del=0 and (S_title like '%".$keyword."%' or S_content like '%".$keyword."%' )
union select P_id as id,P_title as title,P_pic as pic,P_content as content,'productinfo' as type from sl_product where P_del=0 and (P_title like '%".$keyword."%' or P_content like '%".$keyword."%' )
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
    <meta charset="utf-8">
<title>搜索<fh-function> $api=$api.$keyword;</fh-function> -[fh_title]</title>
<link href="media/[fh_ico]" rel="shortcut icon" />
<meta name="description" content="[fh_description]" />
<meta name="keywords" content="[fh_keyword]" />

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.bootcss.com/weui/1.1.2/style/weui.min.css">
    <link rel="stylesheet" href="https://cdn.bootcss.com/jquery-weui/1.2.0/css/jquery-weui.min.css">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="template/t9/css/font-awesome.min.css">
    <link rel="stylesheet" href="template/t9/css/swiper.min.css">
    <link rel="stylesheet" href="template/t9/css/main.css">
    <link rel="stylesheet" href="template/t9/css/index.css">
    <link rel="stylesheet" href="template/t9/css/theme-color.css">
    <link href="css/Pager.css" rel="stylesheet" type="text/css" />
<style>
.search_pic{padding:5px;border:#CCCCCC solid 1px;width:100%;max-width:150px;min-width:100px;}
table{width: 100%;}
.search_area{}
.search_area .list{padding: 10px;}
.search_area td{padding: 10px;}
</style>
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<header class="zyw-header">
    <div class="zyw-container white-color">
        <div class="head-l"><a href="./"><i class="head-l-svg" aria-hidden="true"></i></a></div>
        <form  name="formsearch" action="?type=search" method="post" class="head-search">
            <i class="fa fa-search" aria-hidden="true"></i>
            <input type="text" placeholder="输入您当前要搜索的商品" name="keyword" class="white-color">
        </form>
        <div class="head-r"><a href="member/cart.php"><i class="head-r-svg" aria-hidden="true"></i></a></div>
    </div>
</header>

<section class="zyw-container search_area">
    <fh-function>
if($keyword==""){
  $api=$api."请输入要查询的关键词！";
}else{

$sql="select id,title,pic,content,type from(select N_id as id,N_title as title,N_pic as pic,N_content as content,'newsinfo' as type from sl_news where N_del=0 and (N_title like '%".$keyword."%' or N_content like '%".$keyword."%' )
union select S_id as id,S_title as title,S_pic as pic,S_content as content,'news' as type from sl_nsort where S_del=0 and (S_title like '%".$keyword."%' or S_content like '%".$keyword."%' )
union select C_id as id,C_title as title,C_pic as pic,C_content as content,'courseinfo' as type from sl_course where C_del=0 and (C_title like '%".$keyword."%' or C_content like '%".$keyword."%' )
union select S_id as id,S_title as title,S_pic as pic,S_content as content,'course' as type from sl_usort where S_del=0 and (S_title like '%".$keyword."%' or S_content like '%".$keyword."%' )
union select P_id as id,P_title as title,P_pic as pic,P_content as content,'productinfo' as type from sl_product where P_del=0 and (P_title like '%".$keyword."%' or P_content like '%".$keyword."%' )
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
</section>
<script src="https://cdn.bootcss.com/jquery/1.11.0/jquery.min.js"></script>
<script src="https://cdn.bootcss.com/jquery-weui/1.2.0/js/jquery-weui.min.js"></script>
<script src="template/t9/js/bootstrap.min.js"></script>
<script src="template/t9/js/swiper.min.js"></script>
<script>
    $(document).ready(function () {
        // 顶部分类滑动
        var swiper = new Swiper('.find-cart', {
            slidesPerView: 'auto',
            // centeredSlides: true,
            spaceBetween: 0,
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
        });
        // 顶部轮播图
        var mySwiper = new Swiper('.find-slider', {
            // 如果需要分页器
            autoplay: true,
            pagination: {
                el: '.swiper-pagination'
            }
        });
    })
</script>
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
<div style="display: none">[fh_code]</div>
</body>
</html>