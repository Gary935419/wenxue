<?php
error_reporting(E_ALL ^ E_NOTICE); 
session_start();
$name=htmlspecialchars($_GET["name"]);

$a=rand(1,9);
$b=rand(1,9);
$s=rand(1,2);

switch($s){
	case 1:
	$symbol="＋";
	$c=$a+$b;
	break;
	case 2:
	$symbol="×";
	$c=$a*$b;
	break;
}

$_SESSION["CmsCode"]=$c;
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"> 
	<title>验证码</title>
   <script src="https://cdn.staticfile.org/jquery/2.1.1/jquery.min.js"></script>
</head>
<body>
<div id="code">
<div style="background: #f7f7f7;text-align: center;padding: 8px;" id="codex">
	计算结果：
<?php
echo $a." ".$symbol." ".$b." = ";
?>
<input type="text" style="width: 50px;height: 25px;" name="M_code">
</div>
</div>
<script type="text/javascript">
$(function(){
	$("#codex", window.parent.document).remove();
	$("[src$='conn/code_1.php?name=<?php echo $name?>']", window.parent.document).parent().append($("#code").html());
	$("[src$='conn/code_1.php?name=<?php echo $name?>']", window.parent.document).hide();
})
</script>
</body>
</html>