<style type="text/css">
    .vip{color: #ff0000;}
    .vip2{color: #ff6600;}
</style>
<div class="modal fade" id="myModal3" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <form action="index.php?action=tx" method="post">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"
                            aria-hidden="true">×
                    </button>
                    <h4 class="modal-title" id="myModalLabel">
                        余额提现
                    </h4>
                </div>
                <div class="modal-body">
                    提现金额：
                    <div class="input-group">
                        <input type="text" name="money" class="form-control">
                        <span class="input-group-addon">元</span>
                    </div>

                    支付宝帐号：
                    <input class="form-control" name="alipay" />
                    真实姓名：
                    <input class="form-control" name="name"/>
                    说明：最低提现金额<?php echo $C_zd?>元，每次提现收取<?php echo $C_fee?>%手续费。
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default"
                            data-dismiss="modal">关闭
                    </button>
                    <button type="submit" class="btn btn-primary">
                        提交
                    </button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </form>
</div>
<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle navbar-menubar" id="menu">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#userinfo" aria-expanded="false">
                <span class="icon fa-user"></span>
            </button>
            <a class="navbar-brand" href="../index.php">
                <img title="会员中心" src="../media/<?php echo $C_logo?>" class="navbar-brand-logo" height="60">
            </a>
            <a href="../" style="line-height: 60px;"><span class="navbar-brand-text hidden-xs" style="color: #09f;margin-left: 20px;background: #fff;height: 30px;width:80px;border-radius: 5px;line-height: 30px;text-align: center;padding-right: 5px;">返回首页</span></div></a>
        <div class="collapse navbar-collapse" id="userinfo">
            <ul class="nav navbar-nav navbar-right">
                <li>
                    <a href="index.php" class="navbar-avatar dropdown-toggle">
            <span class="avatar">
              <img alt="..." src="../media/<?php echo $M_head?>"></span>
                        <span class="user-name">
              <?php echo $M_login?></span>
                    </a>
                </li>
                <li>
                    <a href="login.php?action=unlogin">退出</a></li>
            </ul>
        </div>
    </div>
</nav>
<div class="site-menubar navbar-nav">
    <div class="site-menubar-body">
        <ul class="site-menu">
            <li class="site-menu-item">
                <a href="./">
                    <i class="icon" aria-hidden="true" title="10000"></i>
                    <span class="site-menu-title">会员中心</span></a>
                <ul class="dropdown-menu"></ul>
            </li>

            <?php if($C_fzon==1){?>
                <li class="site-menu-item">
                    <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                        <i class="icon" aria-hidden="true" title="7000"></i>
                        <span class="site-menu-title">分站设置</span>
                        <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a href="config.php">基本设置</a></li>

                    </ul>
                </li>
            <?php }?>

            <li class="site-menu-item">
                <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                    <i class="icon" aria-hidden="true" title="20000"></i>
                    <span class="site-menu-title">用户信息</span>
                    <span class="caret"></span>
                </a>
                <ul class="dropdown-menu">
                    <li><a href="edit.php">用户信息</a></li>
                    <li><a href="pwdedit.php">修改密码</a></li>
                    <li><a href="list.php">资金明细</a></li>
                    </li>


                </ul>
    </div>
</div>
<div class="page">
    <div class="page-header">

        <div class="container">
            <div class="row">

                <div class="col-xs-5 col-sm-2">
                    <div class="my-avatar pull-right">
            <span class="avatar">
              <img alt="..." src="../media/<?php echo $M_head?>">
              <label class="badge">
                <?php echo $M_viptitle?></label>
            </span>
                    </div>
                </div>

                <div class="col-xs-7 col-sm-3">
                    <p class="font-size-16">
                        <strong>
                            <?php echo $M_login?></strong>
                    </p>
                    <p class="font-size-16">
                        <?php
                        if($C_rzon==1){
                            if($M_vip==0){
                                if($M_type==0){
                                    echo "<a href=\"vip.php\"><span style=\"color:#333333;\">普通会员</span></a> <a href=\"vip.php\" class=\"btn btn-info btn-xs\">开通VIP</a> <a href=\"seller.php\" class=\"btn btn-warning btn-xs\">升级到商户</a>";
                                }else{
                                    echo "<a href=\"vip.php\"><span style=\"color:#333333;\">商家用户</span></a> <a href=\"vip.php\" class=\"btn btn-info btn-xs\">开通VIP</a>";
                                }
                            }else{
                                if($M_type==0){
                                    echo "<a href=\"vip.php\"><span style=\"color:#333333;\">VIP会员</span></a> <a href=\"seller.php\" class=\"btn btn-warning btn-xs\">升级到商户</a>";
                                }else{
                                    echo "<a href=\"vip.php\"><span style=\"color:#333333;\">商家用户/VIP会员</span></a>";
                                }
                            }
                        }else{
                            if($M_vip==0){
                                echo "<a href=\"vip.php\"><span style=\"color:#333333;\">普通会员</span></a> <a href=\"vip.php\" class=\"btn btn-info btn-xs\">开通VIP</a>";
                            }else{
                                echo "<a href=\"vip.php\"><span style=\"color:#333333;\">VIP会员</span></a>";
                            }
                        }

                        ?>
                    </p>
                    <p class="hidden-xs"><a href="edit.php" style="color:#333333;"><?php echo $M_email?></a></p>
                </div>
                <div class="col-xs-12 col-sm-4" style="padding-left: 50px">
                    <p class="font-size-16">
                        <strong>我的财富</strong></p>
                    <ul class="list-inline">
                        <li class="p_top_10 p_left_20 col-integral">
                            <a href="pay.php" class="badge">
                                <?php echo $M_money?></a> 元
                            <p class="">余额 <a href="pay.php" class="btn btn-warning btn-xs">充值</a>
<!--                                <a href="javascript:;" data-toggle="modal" data-target="#myModal3"  class="btn btn-info btn-xs">提现</a>-->
                            </p></li>
                    </ul>
                </div>

            </div>
        </div>
    </div>
    <script>
        function tomoney(){
            if (confirm("是否转为余额（每1积分转<?php echo $C_fen3?>元余额）？")==true){
                window.location.href="index.php?action=tomoney"
                return true;
            }else{
                return false;
            }
        }
    </script>