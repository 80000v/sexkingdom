<?php
include("include/coon.php");
include("include/function.php");
include "include/config.php";
$action=sqlstr($_GET["action"]);
if($action==t){
$id=$_GET["id"];
$uin=mysql_fetch_array(mysql_query("select * from user where id='$id'"));
$jb=$uin["jb"];
$jbj=$jb+10;
mysql_query("UPDATE user SET jb='$jbj' WHERE id='$id'");
header("Location:index.php");
}else{
$sid=sqlstr($_COOKIE['user']);
$uin=mysql_fetch_array(mysql_query("select * from user where sid='$sid'"));
if(!$uin){
header("Location:../login");
exit;
}
$id1=$uin['id'];
$jb1=$uin["jb"];
}
?>
<div class="main">
<hr>
您好，您每推广一人访问本站系统将送您10金币作为奖励。
<hr>
您的金币：<?php echo $jb1;?>
<hr>
您的推广链接为：<?php echo $url1;?>?id=<?php echo $id1;?>&action=t
<hr>
请将本链接发给您的好友
<hr>
</div>
<?php
include "include/footutf.php";
?>