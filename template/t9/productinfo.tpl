<fh-function>
mysqli_query($conn, "update sl_product set P_view=P_view+1 where P_id=".$id);
$sql="select * from sl_product,sl_psort where P_sort=S_id and P_id=".$id;
  $result = mysqli_query($conn, $sql);
  $row = mysqli_fetch_assoc($result);
  if (mysqli_num_rows($result) > 0) {
    $S_id=$row["S_id"];
    $P_id=$row["P_id"];
    $P_pic=$row["P_pic"];
    $P_tag=$row["P_tag"];
    $P_shuxing=$row["P_shuxing"];
    $P_mid=$row["P_mid"];

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
  $genkey=gen_key(20);
</fh-function>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>[P_title] - [fh_title]</title>
<link href="media/[fh_ico]" rel="shortcut icon" />
<meta name="description" content="[P_description]" />
<meta name="keywords" content="[P_keywords]" />

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.bootcss.com/weui/1.1.2/style/weui.min.css">
    <link rel="stylesheet" href="https://cdn.bootcss.com/jquery-weui/1.2.0/css/jquery-weui.min.css">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="template/t9/css/font-awesome.min.css">
    <link rel="stylesheet" href="template/t9/css/swiper.min.css">
    <link rel="stylesheet" href="template/t9/css/main.css">
    <link rel="stylesheet" href="template/t9/css/item.css">
    <link rel="stylesheet" href="template/t9/css/theme-color.css">
    <script src="https://cdn.bootcss.com/jquery/1.11.0/jquery.min.js"></script>
<script src="https://cdn.bootcss.com/jquery-weui/1.2.0/js/jquery-weui.min.js"></script>
<script src="template/t9/js/bootstrap.min.js"></script>
<script src="template/t9/js/swiper.min.js"></script>
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
    <style type="text/css">
    #buy .add{
  height:25px; width:25px; margin:0 5px 0 5px;line-height:100%;
  border: hidden;
  background-color: #956bff;
  color: #FFFFFF;
  font-size: 15px;
  line-height: 100%;
  cursor: pointer;
  border-radius:3px;
}


#buy .add:hover {
  border: #956bff solid 1px;
  background-color: #FFFFFF;
  color: #956bff;
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
.btn{padding: 5px;margin-top: 10px;}
</style>
</head>
<body>
<header class="zyw-header">
    <div class="zyw-container white-color">
        <div class="head-l"><a href="javascript:window.history.back(-1)" target="_self"><img src="template/t9/img/svg/head-return.svg" alt=""></a></div>
        <h1>
        	<a href="./">首页</a>
            <a href="#" class="active">商品</a>
            <a href="#item-precent">详情</a>

        </h1>
        <div class="head-r"><a href="?type=product&id=[S_id]"><img src="template/t9/img/svg/head-more.svg" alt=""></a></div>
    </div>
</header>
<footer class="zyw-footer">
    <div class="zyw-container white-bgcolor clearfix">

    	<fh-function>
    if($P_mid==0){
    $api=$api."<div class=\"col-sm-2 col-xs-2\">
            <a href=\"./\" class=\"weui-tabbar__item\">
                <div class=\"weui-tabbar__icon\">
                    <img src=\"template/t9/img/svg/item-1.svg\" alt=\"\">
                </div>
                <p class=\"weui-tabbar__label\">首页</p>
            </a>
        </div>";
    	}else{
$api=$api."<div class=\"col-sm-2 col-xs-2\">
            <a href=\"./shop.php?M_id=".$P_mid."\" class=\"weui-tabbar__item\">
                <div class=\"weui-tabbar__icon\">
                    <img src=\"template/t9/img/svg/item-1.svg\" alt=\"\">
                </div>
                <p class=\"weui-tabbar__label\">店铺</p>
            </a>
        </div>";
    }
    	</fh-function>
        

        <div class="col-sm-2 col-xs-2">
            <a href="member/cart.php" class="weui-tabbar__item">
                
                <div class="weui-tabbar__icon">
                    <img src="template/t9/img/svg/item-2.svg" alt="">
                </div>
                <p class="weui-tabbar__label">购物车</p>
            </a>
        </div>
        <div class="col-sm-2 col-xs-2">

<fh-function>
if($P_mid==0){
$api=$api."<a href=\"./?type=contact\" class=\"weui-tabbar__item\">";
    	}else{
   $sql="Select * from sl_member where M_id=$P_mid";
  $result = mysqli_query($conn, $sql);
  if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $M_qq=$row["M_qq"];
  }
$api=$api."<a href=\"http://wpa.qq.com/msgrd?v=3&uin=".$M_qq."&site=qq&menu=yes\" class=\"weui-tabbar__item\">";
    }
</fh-function>
            

                <div class="weui-tabbar__icon">
                    <img src="template/t9/img/svg/kf.svg" alt="">
                </div>
                <p class="weui-tabbar__label">客服</p>
            </a>
        </div>
        <style type="text/css">
        .footer-btn{border:none;}
    </style>
        <div class="col-sm-3 col-xs-3">
            <a class="footer-btn footer-warning open-popup" href="javascript:$('#buy_btn').show();$('#cart_btn').hide();" data-target="#item_buy">立即购买</a>";
        </div>

        <div class="col-sm-3 col-xs-3">
            <a class="footer-btn footer-danger open-popup" href="javascript:$('#buy_btn').hide();$('#cart_btn').show();" data-target="#item_buy">加入购物车</a>";
        </div>
    </div>
</footer>
<section class="zyw-container">
    <!-- Swiper -->
    <div class="item-img">
        <div class="swiper-wrapper">
            <fh-function>
            $pic=explode("|",$P_pic);
            for($i=0;$i<count($pic);$i++){
              $api=$api."<div class=\"swiper-slide\"><img src=\"".pic($pic[$i])."\" alt=\"\"></div>";
            }
            </fh-function>
        </div>
        <!-- Add Pagination -->
        <div class="swiper-pagination"></div>
    </div>
    <div class="item-details white-bgcolor clearfix">
    	<span id="collection_product" pid="[P_id]"></span>
<fh-function>
	$sql="select Q_title,Q_pid from (select * from sl_quan where Q_del=0 and Q_gettime>now())b where Q_pid=0 or Q_pid=$id group by Q_title,Q_pid order by Q_pid asc";
		$result = mysqli_query($conn,  $sql);
		if (mysqli_num_rows($result) > 0) {
		$api=$api."<a class=\"open-popup\" href=\"javascript:;\" data-target=\"#quan_parameter\">
    		<div style=\"float: right;background-image: linear-gradient(to left, #FF7A0C,#FF2A14);color: #fff;padding: 5px 10px;border-radius: 25px 0 0 25px;margin-right: -7px;\">领券 ></div>
    	</a>";
	}
</fh-function>
        <h3 class="details-title">[P_zy][P_title]</h3>
        <strong class="details-prince theme-color pull-left">￥[P_price]</strong> 
        <span class="details-volume pull-right">已售：[P_sold]件</span>
    </div>
    <div class="item-choose weui-cells mt-625">
	<fh-function>
	            if($P_shuxing!=""){
	            $api=$api."<a class=\"weui-cell weui-cell_access open-popup\" href=\"javascript:;\" data-target=\"#item_parameter\">
	            <div class=\"weui-cell__bd\">
	                <p class=\"choose-text\">产品参数</p>
	            </div>
	            <div class=\"weui-cell__ft choose-des\">
	            </div>
	        </a>";
	        }
	</fh-function>
        <div id="item_parameter" class="weui-popup__container popup-bottom">
            <div class="weui-popup__overlay"></div>
            <div class="weui-popup__modal">
                <div class="item-parameter-layer white-bgcolor">
                    <h3 class="parameter-title">产品参数</h3>
                    <table class="table table-condensed parameter-table">
                        <fh-function>
            if($P_shuxing!=""){
            $s=explode("\r",$P_shuxing);
            for($i=0;$i<count($s);$i++){
                $api=$api."<tr><th>".splitx($s[$i],":",0)."</th><td>".splitx($s[$i],":",1)."</td></tr>";
            }
                        }
                        </fh-function>
                    </table>
                    <button class="item-layer-button theme-bgcolor white-color close-popup" type="submit">完成</button>
                </div>
            </div>
        </div>

        <div id="quan_parameter" class="weui-popup__container popup-bottom">
            <div class="weui-popup__overlay"></div>
            <div class="weui-popup__modal">
                <div class="item-parameter-layer white-bgcolor">
                    <h3 class="parameter-title">领优惠券</h3>
                    <div style="font-size: 12px;padding: 10px;">[P_quan]</div>
                    <button class="item-layer-button theme-bgcolor white-color close-popup" type="submit">完成</button>
                </div>
            </div>
        </div>

    </div>
    <div class="item-serve">
        <span><i class="fa fa-check-circle-o theme-color"></i> 品质承诺</span>
        <span><i class="fa fa-check-circle-o theme-color"></i> 七天包退换</span>
        <span><i class="fa fa-check-circle-o theme-color"></i> 如实描述</span>
    </div>
    <div class="item-assess weui-cells mb-625">
        <a class="weui-cell weui-cell_access open-popup" href="javascript:;" data-target="#item_spec">
            <div class="weui-cell__bd">
                <p class="choose-text">用户评价（<em class="theme-color">[E_count]</em>条）</p>
            </div>
            <div class="weui-cell__ft choose-des">
                100%好评
            </div>
        </a>
    </div>

    <div id="item_buy" class="weui-popup__container popup-bottom">
        <div class="weui-popup__overlay"></div>
        <div class="weui-popup__modal">
            <div class="item-parameter-layer white-bgcolor" style="max-height: 600px;height: auto;">

                <form id="buy" method="post" action="buy.php?type=productinfo&id=[P_id]" style="margin-bottom: 56px">
                    <div style="padding: 10px;">

                    <div>
                    <img src="[P_pic]" style="width:80px;height:80px;">
                    <div style="width:calc(100% - 100px);display:inline-block;margin-left:15px;vertical-align:top">
                    <span style="color: #ff0000;">￥<span id="price" style="font-weight:bold;font-size:17px;">[P_price]</span>[P_vip]</span><br>
                    <b>[P_title]</b><br>
                    已选择：<span id="gg_title">标配</span>
                    </div>
                </div>
                    <hr>
                    
                    <p>[P_gg]</p>
                    <input type="hidden" name="genkey" value="<fh-function>$api=$api.$genkey;</fh-function>">
                    <p style="margin-bottom: 10px"><b>购买数量：</b>
              <input type='button' class='add' value='-' onClick='javascript:if(this.form.amount.value>=2){this.form.amount.value--;}'>
              <input type='text' name='no' value='1' id='amount'>
              <input type='button' class='add' value='+' id='plus' onClick='javascript:if(this.form.amount.value<[P_rest]){this.form.amount.value++;}'>
              （库存：<span id="gg_rest">[P_resttitle]</span>）</p>
          </div>
                    <input class="item-layer-button theme-bgcolor white-color close-popup" id="buy_btn" type="submit" value="立即购买"/>
                    <button class="item-layer-button theme-bgcolor white-color close-popup" id="cart_btn" type="button" onclick="addcart()" >加入购物车</button>
                </form>
            </div>
        </div>
    </div>

<div id="item_spec" class="weui-popup__container popup-bottom">
            <div class="weui-popup__overlay"></div>
            <div class="weui-popup__modal">
                <div class="item-parameter-layer white-bgcolor">
                    <h3 class="parameter-title">商品评价</h3>
                    <table class="table table-condensed parameter-table">
<fh-function>
                $sql="select * from sl_evaluate,sl_member,sl_orders where E_mid=M_id and E_oid=O_id and O_pid=$P_id order by E_id desc";
                $result = mysqli_query($conn,  $sql);
                if (mysqli_num_rows($result) > 0) {
                while($row = mysqli_fetch_assoc($result)) {
                  $api=$api."<tr><td>
                      <img src=\"media/".$row["M_head"]."\" style=\"height:50px;\">
                    </td><td>
                      <div style=\"font-weight: bold;\">".enname($row["M_login"])."</div>
                      <div>[".$row["E_star"]."星] ".$row["E_content"]."</div>
                      <div style=\"font-size: 12px;color: #AAAAAA\">".$row["E_time"]."</div>";
                      if($row["E_reply"]!=""){
                      $api=$api."<div style=\"font-size: 12px;color: #AF874D\">商家回复：".$row["E_reply"]."</div>";
                    }
                    $api=$api."</td></tr>";
                }
              }else{
              $api=$api."<div><tr><td>暂无商品评价</td></div>";
            }
                    </fh-function>
                    </table>
                    <button class="item-layer-button theme-bgcolor white-color close-popup" type="submit">完成</button>
                </div>
            </div>
        </div>


    

    <div class="item-precent white-bgcolor" id="item-precent">
        <h4>图文详情</h4>
        <div style="padding: 0 10px;word-wrap:break-word;">
            [P_content]
        </div>
    </div>
</section>

<script>
    var swiper = new Swiper('.item-img', {
        autoplay:true,
        delay: 7000,
        slidesPerView: 1,
        spaceBetween: 0,
        keyboard: {
            enabled: true,
        },
        pagination: {
            el: '.swiper-pagination',
            type: 'fraction',
        },
    });
    var MAX = 10, MIN = 1;
    $('.weui-count__decrease').click(function (e) {
        var $input = $(e.currentTarget).parent().find('.weui-count__number');
        var number = parseInt($input.val() || "0") - 1
        if (number < MIN) number = MIN;
        $input.val(number)
    });
    $('.weui-count__increase').click(function (e) {
        var $input = $(e.currentTarget).parent().find('.weui-count__number');
        var number = parseInt($input.val() || "0") + 1
        if (number > MAX) number = MAX;
        $input.val(number)
    });
</script>
[fh_kefu]
<div style="display: none">[fh_code]</div>
</body>
</html>