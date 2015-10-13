<?php
include("../include/coon.php");
include("../include/function.php");
include("../include/config.php");
$sid=sqlstr($_COOKIE['user']);
$uin=mysql_fetch_array(mysql_query("select * from user where sid='$sid'"));
if(!$uin){
header("Location:../login");
exit;
}
$id=$uin['id'];
$uinfo=mysql_fetch_array(mysql_query("select * from user where id='$id'"));
$vip=$uinfo["vip"];
$uiname=$uinfo["name"];
$jb=$uinfo["jb"];
if($id==1){
$admin="<a href='../admin'>管理后台</a><hr>";
}else{
$admin="";
}
if($vip==1){$vzz='您是尊敬的VIP用户';}else{$vzz="您不是VIP用户，<a href='vipcz.php'>充值VIP</a>";}
echo '<div class="main"><hr>ID：'.$id.'<hr>昵称：'.$uiname.'<hr>VIP：'.$vzz.'<hr>金币：'.$jb.'，<a href="../t.php">推广获得金币</a><hr>'.$admin.'<a href="password.php">修改密码</a><hr><a href="../login/out.php">退出登录</a><hr></div>';
?>
<?php include("../include/footutf.php"); ?>