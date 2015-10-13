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
$id=$_GET["id"];
if($id==1){
echo "<div class='main'><p><font color='pink'>删除失败</font>，不能删除ID1</p><p>返回&nbsp;<a href='javascript:history.go(-1)'>上一页</a></p></div>";
}else{
mysql_query("DELETE FROM user WHERE id='$id'");
echo "<div class='main'><p><font color='pink'>删除成功</font></p><p>返回&nbsp;<a href='javascript:history.go(-1)'>上一页</a></p></div>";
}
?>
	<?php

include "../include/footutf.php";

?>
