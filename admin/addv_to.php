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
$id=sqlstr($_POST["id"]);
if($id!=Null){
$row=mysql_query("UPDATE user SET vip='1' WHERE id='$id'");
if($row){
echo "<div class='main'><p><font color='pink'>认证成功</font>，已为该用户增加认证</p><p>返回&nbsp;<a href='index.php'>后台首页</a>&nbsp;</p></div>";
}else{echo "<div class='main'><p><font color='pink'>认证失败</font>，可能是ID不存在造成的</p><p>返回&nbsp;<a href='javascript:history.go(-1)'>修改</a>&nbsp;一下吧</p></div>";}
}else{
echo "<div class='main'><p><font color='pink'>认证失败</font>，请输入ID</p><p>返回&nbsp;<a href='javascript:history.go(-1)'>修改</a>&nbsp;一下吧</p></div>";
}
?>
	<?php

include "../include/footutf.php";

?>
