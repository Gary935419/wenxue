    <?php
require '../conn/conn.php';
require '../conn/function.php';

if($C_memberon==0){
    box("会员中心未开放","../","error");
}

$from = $_GET["from"];
$action = $_GET["action"];
$genkey=gen_key(20);

$D_domain=splitx($_SERVER["HTTP_HOST"].$_SERVER["PHP_SELF"],"/member",0);

if($from==""){
	$from="index.php";
}

if($action == "quick"){
    $sql = "select * from sl_member where M_id=".intval($_GET["M_id"])." and M_pwd='" . xcode($_GET["M_pwd"],"DECODE",intval($_GET["M_id"])) . "' and not M_login='未登录帐号' and M_del=0 and M_stop=0";

    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    if (mysqli_num_rows($result) > 0) {
        $_SESSION["M_login"] = $row["M_login"];
        $_SESSION["M_id"] = $row["M_id"];
        $_SESSION["M_pwd"] = $row["M_pwd"];
        $genkey=gen_key(20);
        mysqli_query($conn,"update sl_member set M_pwdcode='".$genkey."' where M_id=".$row["M_id"]);
        $_SESSION["M_pwdcode"] = $genkey;
        Header("Location:".$from);
        die();
    }
}

if ($action == "unlogin") {
    $_SESSION["M_login"] = "";
    $_SESSION["M_id"] = "";
    $_SESSION["M_pwd"] = "";
    $_SESSION["M_pwdcode"] = "";
    box("退出成功!", "login.php", "success");
}

if ($action == "login") {
    $M_email = t($_POST["M_email"]);
    $M_pwd = $_POST["M_pwd"];
    $M_code = $_POST["M_code"];
    
    if(($_POST["M_code"]!=$_SESSION["CmsCode"] || $_POST["M_code"]=="" || $_SESSION["CmsCode"]=="") && $C_slide==1){
        $_SESSION["CmsCode"]="refresh";
        box("请填写正确的计算结果！", "back", "error");
    } else {
    	$_SESSION["CmsCode"]="refresh";
        $sql = "select * from sl_member where (M_email='" . $M_email . "' or M_login='" . $M_email . "') and M_pwd='" . md5($M_pwd) . "' and not M_login='未登录帐号' and M_del=0";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        if (mysqli_num_rows($result) > 0) {
            if($row["M_stop"]==1){
                box("帐号封停，原因：".$row["M_stopinfo"], "back", "error");
            }else{
                $_SESSION["M_login"] = $row["M_login"];
                $_SESSION["M_id"] = $row["M_id"];
                $_SESSION["M_pwd"] = md5($M_pwd);
                $M_loginnewtime = time();
                $genkey=gen_key(20);
                mysqli_query($conn,"update sl_member set M_pwdcode='".$genkey."',M_loginnewtime=$M_loginnewtime where M_id=".$row["M_id"]);
                $_SESSION["M_pwdcode"] = $genkey;
                Header("Location:".$from);
            }
        } else {
            box("帐号或密码错误!", "back", "error");
        }
    }
}

if($_SESSION["M_login"]!=="" && $_SESSION["M_pwd"]!="" && $_SESSION["M_id"]!="" && $_SESSION["M_pwdcode"]!=""){
    die("<script>window.location.href=\"$from\"</script>");
}
?>

<!DOCTYPE HTML>
<html>
<head>
<title>会员登录 - <?php echo $C_title?></title>
<meta name="renderer" content="webkit">
<meta charset="utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
<meta name="generator" data-variable="" />
<link href="../media/<?php echo $C_ico?>" rel="shortcut icon" type="image/x-icon" />
<link rel='stylesheet' type='text/css' href="css/account.css">
<link rel='stylesheet' type='text/css' href="../css/css/font-awesome.min.css">
</head>
<!--[if lte IE 8]>
<div class="text-center margin-bottom-0 bg-blue-grey-100 alert">
    <button type="button" class="close" aria-label="Close" data-dismiss="alert">
        <span aria-hidden="true">×</span>
    </button>
    你正在使用一个 <strong>过时</strong> 的浏览器。请 <a href="http://browsehappy.com/" target="_blank">升级您的浏览器</a>，以提高您的体验。
</div>
<![endif]-->

<body class="page-register-v3 layout-full">
<div class="page animsition vertical-align text-center" data-animsition-in="fade-in" data-animsition-out="fade-out">>
    <div class="page-content vertical-align-middle">
        <div class="panel">
            <div class="panel-body">

<div class="brand">
	<a href="../"><img class="brand-img" src="../media/<?php echo $C_logo?>"></a>
	<h2 class="brand-text font-size-20 margin-top-20">会员登录</h2>
</div>
<?php if($C_regon==1){?>
                <form method="post" class="met-form-validation" action="?action=login&from=<?php echo urlencode($from)?>">
                    <input type="hidden" name="add">
                    <div class="form-group form-material floating">
                        <input type="text" class="form-control"  name="M_email" />
                        <label class="floating-label">邮箱/帐号</label>
                    </div>
                    
                    <div class="form-group form-material floating">
                        <input
                        type="password" class="form-control" name="M_pwd"
                        data-fv-notempty="true"
                        maxlength="100"
                        minlength="1"
                        />
                        <label class="floating-label">密码</label>
                    </div>
                    <?php if($C_slide==1){
                        echo "<div class=\"form-group form-material floating\" style=\"position: relative;\">
                        <iframe id=\"slide\" src=\"../conn/code_1.php?name=M_code\" scrolling=\"no\" frameborder=\"0\" width=\"100%\" height=\"40\"></iframe>
                    </div>";
                    }?>
                    
                    
                    <button type="submit" class="btn btn-primary btn-block btn-lg margin-top-10">登录</button>
<!--                    <div style="font-size: 12px;color: #AAA;margin-top: 12px;">注册或点击登录代表您同意<a href="../?type=lisence" target="_blank" style="margin-left: 5px;">《用户协议》</a></div>-->
                </form>
                <?php }?>
                <p id="buttons">
                    <?php 
                    if($C_qqon==1){
                        echo "<a href=\"../qq/qqlogin.php?from=".urlencode($from)."\" style=\"width:40px;height:40px;border-radius:100%;text-align:center;background:#0099ff;color:#ffffff;display:inline-block;font-size:20px;padding-top:3px;\"><i class=\"fa fa-qq\"></i></a>";
                    }
                    if($C_wxon==1){
                    	if(isMobile()){
                            echo " <a href=\"".gethttp().$D_domain."/pay/wxpay/login.php?from=".urlencode($from)."&genkey=".$genkey."_".intval($_SESSION["uid"])."\" style=\"width:40px;height:40px;border-radius:100%;text-align:center;background:#009900;color:#ffffff;display:inline-block;font-size:20px;padding-top:3px;vertical-align:top;margin-left:10px;\"><i class=\"fa fa-weixin\"></i></a>";

                    	}else{
                            echo " <a href=\"javascript:qrcode();\" style=\"width:40px;height:40px;border-radius:100%;text-align:center;background:#009900;color:#ffffff;display:inline-block;font-size:20px;padding-top:3px;vertical-align:top;margin-left:10px;\"><i class=\"fa fa-weixin\"></i></a>";
                    	}
                    }
                    if($C_dxon==1){
                        echo " <a href=\"mobile_login.php?from=".urlencode($from)."\" style=\"width:40px;height:40px;border-radius:100%;text-align:center;background:#ff9900;color:#ffffff;display:inline-block;font-size:25px;padding-top:-10px;vertical-align:top;margin-left:10px;\"><i class=\"fa fa-mobile\"></i></a>";
                    }
                    ?>
                </p>
                <div id="billImage" style="display: inline-block;margin-bottom: 10px;"></div>
                <p>还没有账号? 去 <a href="reg.php?from=<?php echo urlencode($from)?>">注册</a> <a href="forget.php">忘记密码</a> <a href="../">返回首页</a></p>
            </div>
        </div>

<footer class="page-copyright page-copyright-inverse">
	<p class="txt">
        <span class="beian"><a href="http://beian.miit.gov.cn/"> <?php echo $C_beian?></a>
        </span>
	</p>
	<div class=""><?php echo $C_copyright?>
	</div>
</footer>

    </div>
</div>
<script src="js/account.js"></script>
<script src="../js/qrcode.min.js"></script>
<script type="text/javascript">
function qrcode(){
    $("#buttons").hide();
    var qrcode = new QRCode('billImage', {width: 100,height: 100,colorDark: '#000000',colorLight: '#ffffff',correctLevel: QRCode.CorrectLevel.H});
    qrcode.makeCode("<?php echo gethttp().$D_domain."/pay/wxpay/login.php?genkey=".$genkey."_".intval($_SESSION["uid"])?>");
}
function test(){
$.post("post.php",
    {
      genkey:"<?php echo $genkey."_".intval($_SESSION["uid"])?>",
    },
    function(data){
  if(data==1){
  window.location.href='login.php?from=<?php echo urlencode($from)?>'
  }
    });
}
setInterval("test()",3000); //每3秒钟执行一次test()

</script>


<?php 
if(isMobile()){
  $api=$api.'<style>
.tab_bar{position: fixed;bottom: 0px;left: 0px;z-index: 9999;background: #fff;height: 55px;width: 100%;border-top: solid 1px #DDD;padding-top: 5px;font-size: 12px;}
.tab_bar a{color:#333}
.tab_bar .active{color: #ff0000}
.tab_bar img{height: 27px;}
.tab_bar table{width: 100%;}
.tab_bar table tr td{text-align: center;}

.h50{height: 50px;}

</style>

<div class="h50"></div>
<div class="tab_bar">
  <table>
    <tr>
  <td><a class="tab" href="../">
    <img src="https://www.fahuo100.cn/images/tab1.png">
    <div >首页</div>
  </a></td>';

  if($config->course!="false"){
    $api=$api.'<td><a class="tab" href="../?type=course&id=0">
        <img src="https://www.fahuo100.cn/images/tab5.png">
        <div >课程</div>
      </a></td>';
  }

  if($config->news!="false"){
    $api=$api.'<td><a class="tab" href="../?type=news&id=0">
      <img src="https://www.fahuo100.cn/images/tab3.png">
      <div >文章</div>
    </a></td>';
  }

  if($config->product!="false"){
    $api=$api.'<td><a class="tab" href="../?type=product&id=0">
      <img src="https://www.fahuo100.cn/images/tab2.png">
      <div >商品</div>
    </a></td>';
  }

  $api=$api.'<td><a class="tab" href="">
    <img src="https://www.fahuo100.cn/images/tab4_2.png">
    <div class="active">我的</div>
  </a></td>
</tr>
</table>
</div>';
echo $api;
}
?>

</body>
</html>