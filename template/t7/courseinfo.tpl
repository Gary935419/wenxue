<fh-function>
$id=intval($_GET["id"]);
$page=intval($_GET["page"]);
$genkey=date('YmdHis').rand(1000,9999);
if($page==0){
	  $page=1;
	}
mysqli_query($conn, "update sl_course set C_view=C_view+1 where C_id=".$id);
$sql="select * from sl_course,sl_usort where C_sort=S_id and C_id=".$id;
  $result = mysqli_query($conn, $sql);
  $row = mysqli_fetch_assoc($result);
  if (mysqli_num_rows($result) > 0) {
    $C_id=$row["C_id"];
    $C_price=$row["C_price"];
    $C_lesson=$row["C_lesson"];
  }
</fh-function>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8"> 
  <title>[C_ptitle] - [fh_title]</title>
  <link href="media/[fh_ico]" rel="shortcut icon" />
  <meta name="description" content="[N_description]" />
  <meta name="keywords" content="[N_keywords]" />
  
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
  <link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/css/bootstrap.min.css">  
  <script src="https://cdn.staticfile.org/jquery/2.1.1/jquery.min.js"></script>
  <script src="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>

  <style type="text/css">
  html,body{height: 100%}
  .head{height: 50px;background: #ffffff;box-shadow: 0px 0px 10px #888888;z-index: 9;position: relative;}
  .head div{font-size: 20px;line-height: 50px;display: inline-block;vertical-align: top;margin-left: 10px;width: calc(100% - 150px);white-space: nowrap;
    text-overflow: ellipsis;
    overflow: hidden;
    word-break: break-all;}
  .head img{height: 40px;position: absolute;right: 5px;top: 5px;}
  .back{font-size: 25px;line-height: 50px;display: inline-block;width: 50px;text-align: center;border-right: solid 1px #DDDDDD;color: #000000;text-decoration:none;}
  .back:hover{text-decoration:none;background: #EEEEEE}

 @media only screen and (min-width: 1024px) {
  .left-box{padding: 20px;height: calc(100% - 50px);background: #AAAAAA;text-align: center;}
  .right-box{padding: 0px;height:calc(100% - 50px);overflow: auto;}
  .left-box .video-js{width:100%;max-width: 100%;height: 100%;box-shadow: 0px 0px 10px #666666;}
  .left-box iframe{width:100%;height: 100%;box-shadow: 0px 0px 10px #666666;}
 }
  @media only screen and (max-width: 1024px) {
  .left-box{padding: 0px;background: #000000;text-align: center;height: 250px}
  .right-box{padding: 0px;overflow: auto;}
  .left-box .video-js{height: 250px;width: 100%;}
  .left-box iframe{width:100%;height: 250px}
 }

  .part{width: 90px;display: inline-block;font-weight: bold;padding: 10px 15px 0 15px;text-align: center;vertical-align: top;}
  .part2{width: calc(100% - 90px);display: inline-block;font-weight: bold;padding: 10px 15px 0 15px;border-left: solid 2px #DDDDDD;position: relative;vertical-align: top;}
  .zj{font-size: 17px;line-height: 50px;margin: 10px;white-space: nowrap;
    text-overflow: ellipsis;
    overflow: hidden;
    word-break: break-all;width: 100%}
  .list-group-item{padding: 0px;}
  .list-group-item span{font-size: 12px;font-weight: normal;}
  .y{width: 16px;height: 16px;border-radius: 16px;border:solid 2px #DDDDDD;background: #ffffff;position: absolute;left: -9px;top: calc(50% - 8px)}
  .z{width: 30px;height: 30px;border-radius: 30px;border:solid 2px #DDDDDD;background: #ffffff;position: absolute;left: -15px;top: calc(50% - 10px);text-align: center;line-height: 26px}
  .active .y{border:solid 2px #ffffff;background: #337ab7;}
  .active .part2{border-left: solid 2px #ffffff;}
  .active span{color: #ffffff !important}
</style>
</head>
<body>
<div class="head">
  <a href="?type=courseintro&id=[C_id]" class="back"><</a>
  <div id="t">[C_ptitle]</div>
  <a href="./"><img src="media/[fh_logo]"></a>
</div>

  <div class="col-lg-10 col-md-9 left-box" id="v">
[C_video]
  </div>
  <div class="col-lg-2 col-md-3 right-box">
<div style="padding: 15px 0;background: #EEEEEE;box-sizing: border-box;margin: 0px;" class="row">

<div class="col-lg-5 col-md-12 col-xs-5">
  <img src="[C_pic]" style="width: 100%">
</div><div class="col-lg-7 col-md-12 col-xs-7">
  <p>[C_title]</p>
  <p style="font-weight: normal;font-size: 12px">全套售价：<span style="font-size: 15px;color: #ff0000;font-weight: bold;">[C_price]元</span></p>
  <p>
    <fh-function>
      if($C_price>0){
      $O=getrs("select * from sl_orders where O_cid=$id and O_state=1 and O_content='all' and O_mid=".intval($_SESSION["M_id"]));
      if($O!=""){
$api="<button class=\"btn btn-xs btn-success\">本套课程已购买</button>";
    }else{
    $api="<a href=\"buy.php?type=courseinfo&id=$id&page=all&genkey=$genkey\" class=\"btn btn-primary btn-xs\">购买全套课程</a>";
  }
}else{
  $api="<button class=\"btn btn-xs btn-success\">免费课程</button>";
}
      
    </fh-function>
    
  </p>
</div>
</div>

<fh-function>
$lesson=explode("||",$C_lesson);
$m=0;
$n=0;
      for($i=0;$i<count($lesson);$i++){
      if(strpos($lesson[$i],"_")!==false){
      $O=getrs("select * from sl_orders where O_cid=$id and O_state=1 and (O_content='all' or O_content='".($m+1)."') and O_mid=".intval($_SESSION["M_id"]));

      if(splitx($lesson[$i],"__",1)==0 || $C_price==0){
        $price="<span style=\"color:#0099ff\">免费观看</span>";
      }else{
  if($O!=""){
    $price="<span style=\"color:#009900\">本节已购</span>";
    }else{
    $price="<span style=\"color:#ff9900\">本节售价：".splitx($lesson[$i],"__",1)."元</span>";
  }
      }

      if($page==$m+1){
      $active="active";
    }else{
    $active="";
  }
    $api=$api."<a onclick=\"course(".$id.",".($m+1).")\" href=\"javascript:;\" class=\"list-group-item\" id=\"item_".($m+1)."\">
  <div class=\"part\"><p>课时".($m+1)."</p><p><span>".splitx($lesson[$i],"__",3)."</span></p>
  </div><div class=\"part2\"><p style=\";white-space: nowrap;
    text-overflow: ellipsis;
    overflow: hidden;
    word-break: break-all;\">".splitx($lesson[$i],"__",0)."</p><p><span>$price</span></p> <div class=\"y\"></div></div>
</a>";
$m=$m+1;
    }else{
    $api=$api."<a class=\"list-group-item\" >
  <div class=\"part\"><p class=\"zj\">章节</p>
  </div><div class=\"part2\"><p class=\"zj\" style=\"float:left\">".$lesson[$i]."</p> <div class=\"z\">".($n+1)."</div></div>
</a>";
$n=$n+1;
  }
      }
</fh-function>
  </div>
  <script>
	var page=<fh-function>$api=$api.$page;</fh-function>;
	if(page>1){
		$(".right-box").animate({scrollTop: $("#item_"+page).position().top},1000);
	}
	a(page);

  	function a(page){
  		$(".list-group-item").each(function(){
  			$(this).attr("class","list-group-item");
  		});
  		$("#item_"+page).attr("class","list-group-item active");
	  	var myPlayer = videojs('my-video');
	    	videojs("my-video").ready(function(){
	    	var myPlayer = this;
	        //myPlayer.play();
	    });
  	}
  	
  	function course(id,page){
  		$.ajax({
            	url:'conn/f.php?action=video&id='+id+'&page='+page,
            	type:'post',
            	data:$("#form").serialize(),
            	success:function (data) {
            		data=JSON.parse(data);
            		$("#v").html(data.video);
            		$("#t").html(data.title);
            		a(page);
            	}
            });
  	}
  	
</script>
</body>
</html>