<?php
require '../conn/conn.php';
require '../conn/function.php';

if(checkauth()){
    $from=splitx($_GET["from"],"|",0);
    $M_id=intval(splitx($_GET["from"],"|",1));

    $D_domain=splitx($_SERVER["HTTP_HOST"].$_SERVER["PHP_SELF"],"/qq",0);
    $url = "https://graph.qq.com/oauth2.0/token";
    $data = "grant_type=authorization_code&client_id=" . $C_qqid . "&client_secret=" . $C_qqkey . "&code=" . $_GET["code"] . "&state=200&redirect_uri=".gethttp().$D_domain."/qq/reg.php";
    $accdata = GetBody($url, $data);
    $openids = GetBody("https://graph.qq.com/oauth2.0/me", $accdata."&unionid=1");
    $openids = str_Replace("callback(", "", $openids);
    $openids = str_Replace(");", "", $openids);
    $openids = json_decode($openids);
    $openid = $openids->openid;
    if($openid==""){
        $openids = GetBody("https://graph.qq.com/oauth2.0/me", $accdata."&unionid=0");
        $openids = str_Replace("callback(", "", $openids);
        $openids = str_Replace(");", "", $openids);
        $openids = json_decode($openids);
        $openid = $openids->openid;
        $unionid = "";
    }else{
        $unionid = $openids->unionid;
    }
    
    $url = "https://graph.qq.com/user/get_user_info";
    $data = $accdata . "&openid=" . $openid . "&oauth_consumer_key=" . $C_qqid;
    $info2 = GetBody($url, $data);
    $info2 = json_decode($info2);
    $nickname = $info2->nickname;
    $figureurl_qq_2 = $info2->figureurl_qq_2;

    if($unionid!=""){
        $openid=$unionid;
    }
    if ($nickname == "") {
        box("授权失败，请重新登录！", "../member/login.php", "error");
    } else {
        if($M_id==0){
            $sql = "select * from sl_member where M_openid='" . $openid . "' and M_del=0";
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_assoc($result);
            if (mysqli_num_rows($result) > 0) {
                $_SESSION["M_login"] = $row["M_login"];
                $_SESSION["M_id"] = $row["M_id"];
                $_SESSION["M_pwd"] = $row["M_pwd"];
                $genkey=gen_key(20);
                mysqli_query($conn,"update sl_member set M_pwdcode='".$genkey."' where M_id=".$row["M_id"]);
                $_SESSION["M_pwdcode"] = $genkey;
                Header("Location: ../member/login.php?from=".urlencode($from));
            } else {
                $pic=downpic("../media/",$figureurl_qq_2);
                mysqli_query($conn,"insert into sl_member(M_login,M_pwd,M_email,M_head,M_regtime,M_openid,M_pwdcode,M_from) values('Q_$nickname','".md5($openid)."','未设置邮箱@qq.com','$pic','".date('Y-m-d H:i:s')."','$openid','',".intval($_SESSION["uid"]).")");

                $_SESSION["M_login"] = "Q_" . $nickname;
                $_SESSION["M_pwd"] = md5($openid);
                $sql = "select * from sl_member where M_login='Q_".$nickname."' order by M_id desc limit 1";
                $result = mysqli_query($conn, $sql);
                $row = mysqli_fetch_assoc($result);
                if (mysqli_num_rows($result) > 0) {
                    $_SESSION["M_id"] = $row["M_id"];
                    $genkey=gen_key(20);
                    mysqli_query($conn,"update sl_member set M_pwdcode='".$genkey."' where M_id=".$row["M_id"]);
                    $_SESSION["M_pwdcode"] = $genkey;
                }
                Header("Location: ../member/login.php?from=".urlencode($from));
            }
        }else{
            if(getrs("select * from sl_member where M_openid='$openid'","M_login")!=""){
                die("<script>alert(\"该QQ已绑定帐号：".getrs("select * from sl_member where M_openid='$openid'","M_login")."，请先解绑！\");window.location.href=\"../member/login.php?from=".urlencode($from)."\"</script>");
            }else{
                mysqli_query($conn, "update sl_member set M_openid='$openid' where M_id=".$_SESSION["M_id"]);
                die("<script>alert(\"绑定成功！\");window.location.href=\"../member/login.php?from=".urlencode($from)."\"</script>");
            }
        }
    }
}
?>