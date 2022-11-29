<?php
require '../conn/conn.php';
require '../conn/function.php';
require 'admin_check.php';

$dir=str_replace("/", "\\",dirname(__FILE__));
if($_GET["action"]=="mod"){
  mysqli_query($conn,"update sl_config set C_admin='".splitx($dir,"\\",count(explode("\\",$dir))-1)."'");
  box("修复成功！","./","success");
}
if(splitx($dir,"\\",count(explode("\\",$dir))-1)!=$C_admin){
  die("系统检测到您手动修改过后台目录，请<a href='?action=mod'>点击此处</a>进行修复");
}

$sql="select sum(L_money) as L_all from sl_list,sl_member where L_del=0 and L_mid=M_id and L_money>0 and L_title like '%充值%' and to_days(L_time) = to_days(now())";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$L_all=round($row["L_all"],2);


$sql="select count(L_id) as L_all from sl_list,sl_member where L_del=0 and L_mid=M_id and L_money>0 and L_title like '%充值%' and to_days(L_time) = to_days(now())";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$L_all2=round($row["L_all"],2);


$sql="select sum(L_money) as L_all from sl_list,sl_member where L_del=0 and L_mid=M_id and L_money>0 and L_title like '%充值%' and DATE_FORMAT( L_time, '%Y%m' ) = DATE_FORMAT( CURDATE( ) , '%Y%m' )";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$L_all3=round($row["L_all"],2);


$sql="select count(L_id) as L_all from sl_list,sl_member where L_del=0 and L_mid=M_id and L_money>0 and L_title like '%充值%' and DATE_FORMAT( L_time, '%Y%m' ) = DATE_FORMAT( CURDATE( ) , '%Y%m' )";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$L_all4=round($row["L_all"],2);


for ($i=1;$i<=12;$i++){

$sql="select sum(L_money) as money_total from sl_list,sl_member where L_del=0 and L_mid=M_id and L_money>0 and L_title like '%充值%' and year(L_time)=".date('Y')." and month(L_time)=".$i;
	$result = mysqli_query($conn, $sql);
	$row = mysqli_fetch_assoc($result);
	$m_all=round($row["money_total"],2);
	if($m_all==""){
		$m_all=0;
	}
	$info=$info.$m_all.",";
	} 

for ($j=1;$j<=31;$j++){
$sql="select sum(L_money) as money_total from sl_list,sl_member where L_del=0 and L_mid=M_id and L_money>0 and L_title like '%充值%' and DATE_FORMAT( L_time, '%Y%m' ) = DATE_FORMAT( CURDATE( ) , '%Y%m' ) and DAY(L_time)=".$j;

	$result = mysqli_query($conn, $sql);
	$row = mysqli_fetch_assoc($result);
	$m_all2=round($row["money_total"],2);
	if ($m_all2==""){
		$m_all2=0;
	}
	$info2=$info2.$m_all2.",";
	}

?>
<!DOCTYPE html>
<html lang="zh-CN">
	<head>

		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>后台首页</title>

		<!--Favicon -->
		<link rel="icon" href="../media/<?php echo $C_ico?>" type="image/x-icon"/>

		<!--Bootstrap.min css-->
		<link rel="stylesheet" href="assets/plugins/bootstrap/css/bootstrap.min.css">

		<!--Icons css-->
		<link rel="stylesheet" href="assets/css/icons.css">

		<!--Style css-->
		<link rel="stylesheet" href="assets/css/style.css">

		<!--mCustomScrollbar css-->
		<link rel="stylesheet" href="assets/plugins/scroll-bar/jquery.mCustomScrollbar.css">

		<!--Sidemenu css-->
		<link rel="stylesheet" href="assets/plugins/toggle-menu/sidemenu.css">
		<link rel="stylesheet" href="assets/plugins/toastr/build/toastr.css">

	</head>

	<body class="app ">

		<div id="spinner"></div>

		<div id="app">
			<div class="main-wrapper" >
				
					<?php
					require 'nav.php';
					?>
				</aside>


			</div>
		</div>
		<style>
.member_box{display:inline-block;margin:10px;text-align: center;}
.member_box img{height:70px;width:70px;border-radius:100px;margin-bottom: 3px;border:solid 1px #EEEEEE;}
.member_box p{text-align: center;font-size: 12px;}
.vip{color: #ff0000}
</style>

<script src="assets/js/jquery.min.js"></script>
<script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>
<script src="assets/plugins/toggle-menu/sidemenu.js"></script>
<script src="assets/plugins/scroll-bar/jquery.mCustomScrollbar.concat.min.js"></script>
<script src="assets/js/scripts.js"></script>
<script src="assets/js/help.js"></script>
<script src="assets/plugins/toastr/build/toastr.min.js"></script>
<script src="assets/js/echarts-all.js"></script>
<script type="text/javascript">

        var myChart3 = echarts.init(document.getElementById('main3')); 
        var myChart4 = echarts.init(document.getElementById('main4')); 
        
option4 = {
    title : {
        text: '',
        subtext: ''
    },
    tooltip : {
        trigger: 'axis'
    },
    legend: {
        data:['成交']
    },
    toolbox: {
        show : true,
        feature : {
            mark : {show: true},
            dataView : {show: true, readOnly: false},
            magicType : {show: true, type: ['line', 'bar', 'stack', 'tiled']},
            restore : {show: true},
            saveAsImage : {show: true}
        }
    },
    calculable : true,
    xAxis : [
        {
            type : 'category',
            boundaryGap : false,
            data : ['1','2','3','4','5','6','7','8','9','10','11','12','13','14','15','16','17','18','19','20','21','22','23','24','25','26','27','28','29','30','31']
        }
    ],
    yAxis : [
        {
            type : 'value'
        }
    ],
    series : [
        {
            name:'成交',
            type:'line',
            smooth:true,
            itemStyle: {normal: {areaStyle: {type: 'default'}}},
            data:[<?php echo $info2?>]
        },
        
    ]
};
       

option3 = {
    title : {
        text: '',
        subtext: ''
    },
    tooltip : {
        trigger: 'axis'
    },
    legend: {
        data:['成交']
    },
    toolbox: {
        show : true,
        feature : {
            mark : {show: true},
            dataView : {show: true, readOnly: false},
            magicType : {show: true, type: ['line', 'bar', 'stack', 'tiled']},
            restore : {show: true},
            saveAsImage : {show: true}
        }
    },
    calculable : true,
    xAxis : [
        {
            type : 'category',
            boundaryGap : false,
            data : ['1月','2月','3月','4月','5月','6月','7月','8月','9月','10月','11月','12月']
        }
    ],
    yAxis : [
        {
            type : 'value'
        }
    ],
    series : [
        {
            name:'成交',
            type:'line',
            smooth:true,
            itemStyle: {normal: {areaStyle: {type: 'default'}}},
            data:[<?php echo $info?>]
        },
        
    ]
};             



        myChart3.setOption(option3); 
        myChart4.setOption(option4); 
    </script>
	</body>
</html>
