<?php
require '../conn/conn.php';
require '../conn/function.php';

$D_domain=splitx($_SERVER["HTTP_HOST"].$_SERVER["PHP_SELF"],"/api",0);
$dirx=splitx($_SERVER["PHP_SELF"],"api",0);

$action=$_GET["action"];
$key=t($_POST["key"]);
$part=$_POST["part"];

$id=intval($_POST["id"]);
$type=$_POST["type"];
$admin=getrs("select * from sl_admin");

if($key==md5($admin["A_login"].$admin["A_pwd"])){
	if($action=="list"){
		if(strpos($part,"text")!==false){
			foreach(getlist("select * from sl_text where T_del=0") as $t){
				$list=$list."{\"type\":\"text\",\"id\":\"".$t["T_id"]."\",\"md5\":\"".md5(s("select * from sl_text where T_id=".$t["T_id"]))."\"},";
			}
		}
		if(strpos($part,"slide")!==false){
			foreach(getlist("select * from sl_slide where S_del=0") as $t){
				$list=$list."{\"type\":\"slide\",\"id\":\"".$t["S_id"]."\",\"md5\":\"".md5(s("select * from sl_slide where S_id=".$t["S_id"]))."\"},";
			}
		}
		if(strpos($part,"menu")!==false){
			foreach(getlist("select * from sl_menu where U_del=0") as $t){
				$list=$list."{\"type\":\"menu\",\"id\":\"".$t["U_id"]."\",\"md5\":\"".md5(s("select * from sl_menu where U_id=".$t["U_id"]))."\"},";
			}
		}
		if(strpos($part,"news")!==false){
			foreach(getlist("select * from sl_news where N_del=0") as $t){
				$list=$list."{\"type\":\"news\",\"id\":\"".$t["N_id"]."\",\"md5\":\"".md5(s("select * from sl_news where N_id=".$t["N_id"]))."\"},";
			}
			foreach(getlist("select * from sl_nsort where S_del=0") as $t){
				$list=$list."{\"type\":\"nsort\",\"id\":\"".$t["S_id"]."\",\"md5\":\"".md5(s("select * from sl_nsort where S_id=".$t["S_id"]))."\"},";
			}
		}
		if(strpos($part,"course")!==false){
			foreach(getlist("select * from sl_course where C_del=0") as $t){
				$list=$list."{\"type\":\"course\",\"id\":\"".$t["C_id"]."\",\"md5\":\"".md5(s("select * from sl_course where C_id=".$t["C_id"]))."\"},";
			}
			foreach(getlist("select * from sl_usort where S_del=0") as $t){
				$list=$list."{\"type\":\"usort\",\"id\":\"".$t["S_id"]."\",\"md5\":\"".md5(s("select * from sl_usort where S_id=".$t["S_id"]))."\"},";
			}
		}
		if(strpos($part,"product")!==false){
			foreach(getlist("select * from sl_product where P_del=0") as $t){
				$list=$list."{\"type\":\"product\",\"id\":\"".$t["P_id"]."\",\"md5\":\"".md5(s("select * from sl_product where P_id=".$t["P_id"]))."\"},";
			}
			foreach(getlist("select * from sl_psort where S_del=0") as $t){
				$list=$list."{\"type\":\"psort\",\"id\":\"".$t["S_id"]."\",\"md5\":\"".md5(s("select * from sl_psort where S_id=".$t["S_id"]))."\"},";
			}
			foreach(getlist("select * from sl_card where C_del=0") as $t){
				$list=$list."{\"type\":\"card\",\"id\":\"".$t["C_id"]."\",\"md5\":\"".md5(s("select * from sl_card where C_id=".$t["C_id"]))."\"},";
			}
			foreach(getlist("select * from sl_csort where S_del=0") as $t){
				$list=$list."{\"type\":\"csort\",\"id\":\"".$t["S_id"]."\",\"md5\":\"".md5(s("select * from sl_csort where S_id=".$t["S_id"]))."\"},";
			}
		}
		$list= substr($list,0,strlen($list)-1);
		$arr=array(
			"code"=>"success",
			"list"=>json_decode("[".$list."]")
		);
		die(json_encode($arr));
	}
	if($action=="info"){
		switch($type){
			case "text":
				$sql=sql("sl_text","T_id",$id);
				$t=getrs("select * from sl_text where T_id=".$id);
				$pic=$pic."{\"pic\":\"../media/".$t["T_pic"]."\",\"path\":\"".gethttp().$D_domain."/media/".$t["T_pic"]."\"},";
				$c=explode("src=\"",$t["T_content"]);
				for($i=1;$i<count($c);$i++){
					$p=splitx($c[$i],"\"",0);
					if(substr($p,0,7)!="http://" && substr($p,0,8)!="https://"){
						$p="kindeditor".splitx($p,"kindeditor",1);
						$pic=$pic."{\"pic\":\"../".$p."\",\"path\":\"".gethttp().$D_domain."/".$p."\"},";
					}
				}
			break;
			case "slide":
				$sql=sql("sl_slide","S_id",$id);
				$t=getrs("select * from sl_slide where S_id=".$id);
				$pic=$pic."{\"pic\":\"../media/".$t["S_pic"]."\",\"path\":\"".gethttp().$D_domain."/media/".$t["S_pic"]."\"},";
				
			break;
			case "menu":
				$sql=sql("sl_menu","U_id",$id);
				$t=getrs("select * from sl_menu where U_id=".$id);
				$pic=$pic."{\"pic\":\"../media/".$t["U_icon"]."\",\"path\":\"".gethttp().$D_domain."/media/".$t["U_icon"]."\"},";
				
			break;
			case "news":
				$sql=sql("sl_news","N_id",$id);
				$t=getrs("select * from sl_news where N_id=".$id);
				$pic=$pic."{\"pic\":\"../media/".$t["N_pic"]."\",\"path\":\"".gethttp().$D_domain."/media/".$t["N_pic"]."\"},";
				$c=explode("src=\"",$t["N_content"]);
				for($i=1;$i<count($c);$i++){
					$p=splitx($c[$i],"\"",0);
					if(substr($p,0,7)!="http://" && substr($p,0,8)!="https://"){
						$p="kindeditor".splitx($p,"kindeditor",1);
						$pic=$pic."{\"pic\":\"../".$p."\",\"path\":\"".gethttp().$D_domain."/".$p."\"},";
					}
				}
			break;

			case "nsort":
				$sql=$sql.sql("sl_nsort","S_id",$id);
				$t=getrs("select * from sl_nsort where S_id=".$id);
				$pic=$pic."{\"pic\":\"../media/".$t["S_pic"]."\",\"path\":\"".gethttp().$D_domain."/media/".$t["S_pic"]."\"},";
			break;
			case "course":
				$sql=sql("sl_course","C_id",$id);
				$t=getrs("select * from sl_course where C_id=".$id);
				$pic=$pic."{\"pic\":\"../media/".$t["C_pic"]."\",\"path\":\"".gethttp().$D_domain."/media/".$t["C_pic"]."\"},";
				$c=explode("src=\"",$t["C_content"]);
				for($i=1;$i<count($c);$i++){
					$p=splitx($c[$i],"\"",0);
					if(substr($p,0,7)!="http://" && substr($p,0,8)!="https://"){
						$p="kindeditor".splitx($p,"kindeditor",1);
						$pic=$pic."{\"pic\":\"../".$p."\",\"path\":\"".gethttp().$D_domain."/".$p."\"},";
					}
				}

			break;
			case "usort":
				
				$sql=$sql.sql("sl_usort","S_id",$id);
				$t=getrs("select * from sl_usort where S_id=".$id);
				$pic=$pic."{\"pic\":\"../media/".$t["S_pic"]."\",\"path\":\"".gethttp().$D_domain."/media/".$t["S_pic"]."\"},";
			break;
			case "product":
			 	mysqli_query($conn, "update sl_product set P_time='".date('Y-m-d H:i:s')."' where P_time is NULL");
				$sql=sql("sl_product","P_id",$id);
				$t=getrs("select * from sl_product where P_id=".$id);

				$p=explode("|",$t["P_pic"]);
				for($i=0;$i<count($p);$i++){
					$pic=$pic."{\"pic\":\"../media/".$p[$i]."\",\"path\":\"".gethttp().$D_domain."/media/".$p[$i]."\"},";
				}

				$g=explode("@",$t["P_gg"]);
				for($i=0;$i<count($g);$i++){
					$gc=splitx($g[$i],"_",3);
					$gb=explode("|",$gc);
					for($j=0;$j<count($gb);$j++){
						$pic=$pic."{\"pic\":\"../media/".$gb[$j]."\",\"path\":\"".gethttp().$D_domain."/media/".$gb[$j]."\"},";
					}
				}

				$c=explode("src=\"",$t["P_content"]);
				for($i=1;$i<count($c);$i++){
					$p=splitx($c[$i],"\"",0);
					if(substr($p,0,7)!="http://" && substr($p,0,8)!="https://"){
						$p="kindeditor".splitx($p,"kindeditor",1);
						$pic=$pic."{\"pic\":\"../".$p."\",\"path\":\"".gethttp().$D_domain."/".$p."\"},";
					}
				}
				$sql=$sql."update sl_product set P_time='".date('Y-m-d H:i:s')."' where P_time=NULL";
			break;
			case "psort":
				$sql=$sql.sql("sl_psort","S_id",$id);
				$t=getrs("select * from sl_psort where S_id=".$id);
				$pic=$pic."{\"pic\":\"../media/".$t["S_pic"]."\",\"path\":\"".gethttp().$D_domain."/media/".$t["S_pic"]."\"},";
			case "card":
				$sql=sql("sl_card","C_id",$id);
			break;
			case "csrot":
				$sql=$sql.sql("sl_csort","S_id",$id);
			break;
		}
		$pic= substr($pic,0,strlen($pic)-1);
		$arr=array(
			"sql"=>$sql,
			"pic"=>json_decode("[".$pic."]")
		);
		die(json_encode($arr));
	}
}else{
	die("{\"code\":\"error\",\"msg\":\"KEY错误！\"}");
}

function sql($_t,$c,$id){
	global $conn;
	$mysql="delete from `$_t` where $c=$id;__";
	$q3 = mysqli_query($conn, "select * from `$_t` where $c=$id");
	while ($data = mysqli_fetch_assoc($q3)) {
		$keys = array_keys($data);
		$keys = array_map('addslashes', $keys);
		$keys = join('`,`', $keys);
		$keys = "`" . $keys . "`";
		$vals = array_values($data);
		$vals = array_map('addslashes', $vals);
		$vals = join("','", $vals);
		$vals = "'" . $vals . "'";
		$mysql.= "insert into `$_t`($keys) values($vals);__";
	}
	return $mysql;
}

function s($sql){
	global $conn;
	$result = mysqli_query($conn, $sql);
	$row = mysqli_fetch_assoc($result);
	return json_encode($row);
}
?>