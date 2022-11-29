<?php
require '../conn/conn.php';
require '../conn/function.php';
require 'member_check.php';

$action=$_GET["action"];

if ($_GET["action"] == "tx") {
    $money = round($_POST["money"],2);
    $name = removexss($_POST["name"]);
    $alipay = removexss($_POST["alipay"]);
    if ($money-$C_zd>=0) {
        if ($money - $M_money <= 0) {
            mysqli_query($conn, "update sl_member set M_money=M_money-$money where M_id=$M_id");
            mysqli_query($conn, "insert into sl_list(L_mid,L_no,L_title,L_time,L_money,L_genkey,L_sh) values($M_id,'".date('YmdHis').rand(10000000,99999999)."','余额提现（".$alipay."/".$name."/实际到账：".($money*(1-$C_fee/100))."元/手续费：".($money*$C_fee/100)."元）','".date('Y-m-d H:i:s')."',-$money,'',0)");
            sendmail("用户提交提现申请","<p>用户提现申请</p><p>用户ID：$M_id</p><p>用户帐号：$M_login</p><p>提现账户：$alipay</p><p>真实姓名：$name</p><p>提现金额：".$money."元</p><p>请到后台-交易管理-资金明细，进行提现审核</p>",$C_email);
            if($C_dx3==1){
            	sendsms("【".$C_smssign."】用户提现申请，用户ID：$M_id，用户帐号：$M_login，提现账户：$alipay，真实姓名：$name，提现金额：".$money."元，请到后台-交易管理-资金明细，进行提现审核",$C_mobile);
            }
            box("提交成功！请等待管理员审核", "list.php", "success");
        } else {
            box("余额不足！请重新输入", "back", "error");
        }
    } else {
        box("最低提现金额为".$C_zd."元！", "back", "error");
    }
}

if($action=="sign"){
	if(getrs("select * from sl_list where L_mid=$M_id and L_title='每日签到' and to_days(L_time) = to_days(now())")==""){
		mysqli_query($conn,"update sl_member set M_fen=M_fen+".$C_fen2." where M_id=$M_id");
		mysqli_query($conn, "insert into sl_list(L_mid,L_no,L_title,L_time,L_money,L_genkey,L_type) values($M_id,'".date('YmdHis').rand(10000000,99999999)."','每日签到','".date('Y-m-d H:i:s')."',".$C_fen2.",'".gen_key(20)."',1)");
		box("签到成功！","list.php","success");
	}else{
		box("今日您已签到！","back","error");
	}
}
if($action=="tomoney"){
	if($M_fen==0){
		box("积分不足！","back","error");
	}else{
		$genkey=date('YmdHis').rand(10000000,99999999);
		mysqli_query($conn,"update sl_member set M_fen=0,M_money=M_money+".($M_fen*$C_fen3)." where M_id=$M_id");
		mysqli_query($conn, "insert into sl_list(L_mid,L_no,L_title,L_time,L_money,L_genkey,L_type) values($M_id,'".$genkey."','积分转余额','".date('Y-m-d H:i:s')."',".($M_fen*$C_fen3).",'".$genkey."',0)");
		mysqli_query($conn, "insert into sl_list(L_mid,L_no,L_title,L_time,L_money,L_genkey,L_type) values($M_id,'".$genkey."','积分转余额','".date('Y-m-d H:i:s')."',-".$M_fen.",'".$genkey."',1)");
		box("转换成功！","list.php","success");
	}
}

if($action=="check_login"){
	die("success");
}

$page=$_GET["page"];
if($page==""){
    $page=1;
}


$sql="select count(L_id) as L_count from sl_list where L_del=0 and L_mid=$M_id order by L_id desc";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$L_counts=$row["L_count"];
?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
  <meta charset="utf-8">
  <meta name="renderer" content="webkit">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
  <meta name="description" content="会员中心">
  <title>会员中心 - <?php echo $C_title?></title>
  <link href="../media/<?php echo $C_ico?>" rel="shortcut icon" />

  <!-- Stylesheets -->
  <link rel="stylesheet" href="../css/css/font-awesome.min.css">
  <link rel="stylesheet" href="css/bootstrap.css">
  <link rel="stylesheet" href="css/site.min.css">
  <!-- css plugins -->
  <link rel="stylesheet" href="css/icheck.min.css">
  <link rel="stylesheet" href="css/cropper.min.css">
  <link rel="stylesheet" href="../css/sweetalert.css">

  <!-- css plugins -->


  <!--[if lt IE 9]>
    <script src="/assets/js/plugins/html5shiv/html5shiv.min.js"></script>
    <![endif]-->
  <!--[if lt IE 10]>
    <link rel="stylesheet" href="/assets/css/ie8.min.css">
    <script src="/assets/js/plugins/respond/respond.min.js"></script>
    <![endif]-->

</head>

<body class="body-index">
<?php require 'top.php';?>

		<div class="container m_top_30">
            <div class="container m_top_30">
                <div class="yto-box">
                    <h5>资金明细</h5>

                    <div class="panel panel-default">
                        <div class="panel-heading">资金明细</div>
                        <div class="table-responsive">

                            <table class="table table-condensed" style="font-size: 12px;">
                                <thead>
                                <tr>

                                    <th>名称</th>
                                    <th>金额/积分</th>
                                    <th>编号</th>
                                    <th>时间</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php

                                $sql="select * from sl_list where L_del=0 and L_mid=$M_id order by L_id desc limit ".(($page-1)*10).",10";
                                $result = mysqli_query($conn, $sql);
                                if (mysqli_num_rows($result) > 0) {
                                    while($row = mysqli_fetch_assoc($result)) {
                                        if($row["L_money"]>0){
                                            $f="+";
                                        }else{
                                            $f="";
                                        }
                                        if($row["L_type"]==1){
                                            $d="积分";
                                        }else{
                                            $d="元";
                                        }



                                        echo "<tr id='".$row["L_id"]."'><td>".$row["L_title"]."</td><td>".$f.$row["L_money"].$d."</td><td>".$row["L_no"]."</td><td>".$row["L_time"]."</td><td>$sh</td></tr>";
                                    }
                                }
                                ?>

                                </tbody>
                            </table>
                        </div>
                    </div>

                    <ul class="pagination" id="pagination" style="display: block;"></ul>
                    <input type="hidden" id="PageCount" runat="server" />
                    <input type="hidden" id="PageSize" runat="server" value="10" />
                    <input type="hidden" id="countindex" runat="server" value="10"/>
                    <!--设置最多显示的页码数 可以手动设置 默认为7-->
                    <input type="hidden" id="visiblePages" runat="server" value="7" />

                </div>

            </div>
		</div>
	</div>

<?php
require 'foot.php';
?>

	<!-- js plugins  -->
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/icheck.min.js"></script>
	<script src="js/page.js"></script>
	<script src="../js/sweetalert.min.js"></script>
	<script>
		function del(id){
					if (confirm("确定删除订单吗？")==true){
		                $.ajax({
		            	url:'product.php?action=del&O_id='+id,
		            	type:'post',
		            	success:function (data) {
		            	if(data=="success"){
		            		$("#"+id).hide();
		            	}else{
		            		alert(data);
		            	}
		            	}
		            });
		                return true;
		            }else{
		                return false;
		            }
		}

        function loadData(num) {
            $("#PageCount").val("<?php echo $L_counts?>");
        }
        function loadpage(id) {
            var myPageCount = parseInt($("#PageCount").val());
            var myPageSize = parseInt($("#PageSize").val());
            var countindex = myPageCount % myPageSize > 0 ? (myPageCount / myPageSize) + 1 : (myPageCount / myPageSize);
            $("#countindex").val(countindex);

            $.jqPaginator('#pagination', {
                totalPages: parseInt($("#countindex").val()),
                visiblePages: parseInt($("#visiblePages").val()),
                currentPage: id,
                first: '<li class="first page-item"><a href="javascript:;" class="page-link">首页</a></li>',
                prev: '<li class="prev page-item"><a href="javascript:;" class="page-link"><i class="arrow arrow2"></i>上一页</a></li>',
                next: '<li class="next page-item"><a href="javascript:;" class="page-link">下一页<i class="arrow arrow3"></i></a></li>',
                last: '<li class="last page-item"><a href="javascript:;" class="page-link">末页</a></li>',
                page: '<li class="page page-item"><a href="javascript:;" class="page-link">{{page}}</a></li>',
                onPageChange: function (num, type) {
                    if (type == "change") {
                        window.location="?page="+num;
                    }
                }
            });
        }
        $(function () {
            loadData(<?php echo $page?>);
            loadpage(<?php echo $page?>);

        });
	</script>
</body>
</html>