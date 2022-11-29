<?php
$sh1=getrs("select count(P_id) as P_count from sl_product,sl_member where M_del=0 and P_mid=M_id and P_sh=0 and P_del=0","P_count");
$sh2=getrs("select count(N_id) as N_count from sl_news,sl_member where M_del=0 and N_mid=M_id and N_sh=0 and N_del=0","N_count");
$sh3=getrs("select count(L_id) as L_count from sl_list,sl_member where M_del=0 and L_mid=M_id and L_sh=0 and L_del=0","L_count");
$sh4=getrs("select count(O_id) as O_count from sl_orders,sl_member where M_del=0 and O_mid=M_id and O_state=2 and O_type=0 and O_del=0 and O_content='实物商品，由商家手动发货'","O_count");
$sh5=getrs("select count(G_id) as G_count from sl_guestbook where G_reply=''","G_count");
?>
<script type="text/javascript">
    function auth(){
        $.post("api.php?action=get_auth", {
                authcode: $("#authcode").val(),
            },
            function(data) {
                if(data == "success") {
                    toastr.success("授权成功！请重启浏览器", '成功');
                }else{
                    toastr.error(data, '错误');
                    $('#largeModal').modal('show');
                    $("#auth_pay").html("<iframe src='<?php echo $url_from?>/pay.html' name='mapif' type='1' frameborder='0' height='820' width='100%'></iframe>");
                }
            });
    }
    function reauth(){
        $(".search-element").html('<input class="form-control" type="search" placeholder="授权码" aria-label="Search" id="authcode"><button class="btn btn-primary" type="button" onclick="auth()"><i class="fa fa-check"></i></button>');
    }
    function checkauth(){
        $.ajax({
            url:'api.php?action=check_auth',
            type:'get',
            success:function (data) {
                data=JSON.parse(data);
                if(data.msg=="success"){
                    if(data.A_version!="站群版"){
                        data.A_version=data.A_version+" <a href='<?php echo $url_from?>/pay2.html' class='btn btn-info btn-sm' target='_blank'>升级</a>";
                    }
                    $("#auth_pay").html("<div style='padding:10px;'><p>授权状态：已授权</p><p>授权域名："+data.A_domain+"</p><p>授权时间："+data.A_time+"</p><p>授权时长："+data.A_long+"</p><p>授权版本："+data.A_version+"</p></div>");
                    $('#largeModal').modal('show');
                }else{
                    toastr.error(data.msg, '未查询到授权信息');
                }
            }
        });
    }
</script>

<nav class="navbar navbar-expand-lg main-navbar">
    <a class="header-brand" href="./">
        <img src="../media/<?php echo $C_logo?>" class="header-brand-img">
    </a>

    <div class="form-inline mr-auto"></div>
    <form class="form-inline mr-auto" style="display: none;">
        <ul class="navbar-nav mr-3">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="ion ion-navicon-round"></i></a></li>
            <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-md-none navsearch"><i class="ion ion-search"></i></a></li>
        </ul>
        <?php if(!checkauth()){?>
            <div class="search-element">
                <input class="form-control" type="search" placeholder="授权码" aria-label="Search" id="authcode">
                <button class="btn btn-primary" type="button" onclick="auth()"><i class="fa fa-check"></i></button>
            </div>
        <?php }else{
            if($config->auth_show!="false"){
                echo "<div class=\"search-element\"><a href=\"javascript:;\" onclick=\"checkauth()\">已授权</a> <a href=\"javascript:;\" onclick=\"reauth()\"><i class=\"fa fa-refresh\" style=\"margin-left:10px;\"></i></a></div>";
            }
        }?>
    </form>

    <ul class="navbar-nav navbar-right">

        <li class="dropdown dropdown-list-toggle">

            <div class="dropdown-menu dropdown-list dropdown-menu-right">
                <!--								<div class="dropdown-header">消息提醒-->
                <!--								</div>-->

                <!--								<div class="dropdown-list-content">-->
                <!--									<a href="product_list.php?action=sh" class="dropdown-item">-->
                <!--										<i class="fa fa-shopping-cart text-primary"></i>-->
                <!--										<div class="dropdown-item-desc">-->
                <!--											<b>商品审核</b> <div class="float-right"><span class="badge badge-pill badge-danger badge-sm">--><?php //echo $sh1?><!--</span></div>-->
                <!--										</div>-->
                <!--									</a>-->
                <!--									<a href="news_list.php?action=sh" class="dropdown-item">-->
                <!--										<i class="fa fa-newspaper-o text-primary"></i>-->
                <!--										<div class="dropdown-item-desc">-->
                <!--											<b>文章审核</b> <div class="float-right"><span class="badge badge-pill badge-danger badge-sm">--><?php //echo $sh2?><!--</span></div>-->
                <!--										</div>-->
                <!--									</a>-->
                <!--									<a href="list.php?action=money" class="dropdown-item">-->
                <!--										<i class="fa fa-money text-primary"></i>-->
                <!--										<div class="dropdown-item-desc">-->
                <!--											<b>提现审核</b> <div class="float-right"><span class="badge badge-pill badge-danger badge-sm">--><?php //echo $sh3?><!--</span></div>-->
                <!--										</div>-->
                <!--									</a>-->
                <!--									<a href="orders_list.php?action=fh" class="dropdown-item">-->
                <!--										<i class="fa fa-paper-plane text-primary"></i>-->
                <!--										<div class="dropdown-item-desc">-->
                <!--											<b>发货提醒</b> <div class="float-right"><span class="badge badge-pill badge-danger badge-sm">--><?php //echo $sh4?><!--</span></div>-->
                <!--										</div>-->
                <!--									</a>-->
                <!--									<a href="guestbook.php?action=menu" class="dropdown-item">-->
                <!--										<i class="fa fa-commenting text-primary"></i>-->
                <!--										<div class="dropdown-item-desc">-->
                <!--											<b>留言提醒</b> <div class="float-right"><span class="badge badge-pill badge-danger badge-sm">--><?php //echo $sh5?><!--</span></div>-->
                <!--										</div>-->
                <!--									</a>-->
                <!--									-->
                <!--								</div>-->
            </div>
        </li>
        <li class="dropdown dropdown-list-toggle">
            <a href="#" class="nav-link nav-link-lg full-screen-link">
                <i class="ion-arrow-expand" id="fullscreen-button"></i>
            </a>
        </li>
        <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg">
                <img src="../media/<?php echo $_SESSION["A_head"]?>" class="rounded-circle w-32">
                <div class="d-sm-none d-lg-inline-block"><?php echo $_SESSION["A_login"]?></div></a>
            <div class="dropdown-menu dropdown-menu-right">
                <a href="login.php?action=unlogin" class="dropdown-item has-icon">
                    <i class="ion-ios-redo"></i> 退出登录
                </a>
                <a href="../" class="dropdown-item has-icon" target="_blank">
                    <i class="ion-arrow-right-a"></i> 前往首页
                </a>
            </div>
        </li>

    </ul>
</nav>

<aside class="app-sidebar">
    <div class="app-sidebar__user">
        <div class="dropdown">
            <div class="nav-link pl-2 pr-2 leading-none d-flex" data-toggle="dropdown" >
                <img  src="../media/<?php echo $_SESSION["A_head"]?>" class=" avatar-md rounded-circle">
                <span class="ml-2 d-lg-block">
									<span class="text-white app-sidebar__user-name mt-5"><?php echo $_SESSION["A_login"]?></span><br>
									<a href="member_vip.php"><span class="text-muted app-sidebar__user-name text-sm"> 管理员</span></a>
								</span>
            </div>
        </div>
    </div>
    <style>
        .side-menu li{display: inline}
    </style>
    <ul class="side-menu">
        <li>
            <a class="side-menu__item" href="index.php"><i class="side-menu__icon fa fa-home"></i><span class="side-menu__label">后台首页</span></a>
        </li>
        <li class="slide">
            <a class="side-menu__item" data-toggle="slide" href="#"><i class="side-menu__icon fa fa-cog"></i><span class="side-menu__label">系统设置</span><i class="angle fa fa-angle-right"></i></a>
            <ul class="slide-menu">
                <li><a href="config.php" class="slide-item"> 基本设置</a></li>
                <!--			<li><a href="vip.php" class="slide-item"> VIP会员设置</a></li>-->
                <!--			<li><a href="template.php" class="slide-item"> 模板管理</a></li>-->
                <!--			<li><a href="slide.php?action=menu" class="slide-item"> 焦点图管理</a></li>-->
                <!--			<li><a href="link.php?action=menu" class="slide-item"> 友链管理</a></li>-->
                <li><a href="menu.php?action=menu" class="slide-item"> 前台菜单</a></li>
            </ul>
        </li>
        <li class="slide">
            <a class="side-menu__item" data-toggle="slide" href="#"><i class="side-menu__icon fa fa-star"></i><span class="side-menu__label">后台管理</span><i class="angle fa fa-angle-right"></i></a>
            <ul class="slide-menu">
                <?php if($product_show=="true"){
                }
                if($news_show=="true"){
                    echo "<li><a href=\"news_list.php\" class=\"slide-item\"> 文章管理</a></li>";
                }
                if($course_show=="true"){
//				echo "<li><a href=\"course_list.php\" class=\"slide-item\"> 课程管理</a></li>";
                }?>
                <li><a href="price_list.php" class="slide-item"> 价格管理</a></li>
            </ul>
        </li>

        <li class="slide">
            <a class="side-menu__item" data-toggle="slide" href="#"><i class="side-menu__icon fa fa-list"></i><span class="side-menu__label">交易管理</span><i class="angle fa fa-angle-right"></i></a>
            <ul class="slide-menu">
                <!--            <li><a href="orders_list.php" class="slide-item"> 订单管理</a></li>-->
                <li><a href="list.php" class="slide-item"> 资金明细</a></li>
            </ul>
        </li>

        <li class="slide">
            <a class="side-menu__item" data-toggle="slide" href="#"><i class="side-menu__icon fa fa-users"></i><span class="side-menu__label">账户管理</span><i class="angle fa fa-angle-right"></i></a>
            <ul class="slide-menu">
                <li><a href="admin.php?action=menu" class="slide-item"> 管理员管理</a></li>
                <li><a href="member.php?action=menu&type=0" class="slide-item"> 会员管理</a></li>
            </ul>
        </li>

        </li>
    </ul>
</aside>