<?php

include("../include/coon.php");
include("../include/function.php");
include("../include/config.php");
$sid = sqlstr($_COOKIE['user']);
$uin=mysql_fetch_array(mysql_query("select * from user where sid='$sid'"));
$uid=$uin['id'];
if($uid!=1){
header("Location:../index.php");
exit;
}
$a=sprintf('%04X%04X-%04X-%04X-%04X-%04X%04X%04X', mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(16384, 20479), mt_rand(32768, 49151), mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535));
$time=time();
$action=sqlstr($_GET["action"]);
$mk=sqlstr($_POST["mk"]);
if($action==post){
mysql_query("INSERT INTO vipmk(mk,time) VALUES ('$mk','$time')");
echo '<div class=main><p><font color="pink">增加成功</font>*^_^*</p></div>';
}
?>

<div class="main">
<form action="mk.php?action=post" method="POST">
<p>增加密卡</p>
<p><textarea name="mk" rows="5" class="put" ><?php echo $a; ?></textarea></p>
<p><input class="libbtn" type="submit" value="提交"></p>
</form>
</div>

	<?php

include "../include/footutf.php";

?>