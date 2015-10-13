<?php
session_start();
include("../include/coon.php");
include("../include/function.php");
include("../include/config.php");
$sid=sqlstr($_COOKIE['user']);
$user=mysql_fetch_array(mysql_query("select * from user where sid='$sid'"));
if($user){
header("Location:../index.php");
exit;
}
$action=sqlstr($_SERVER['QUERY_STRING']);
if($action==regback){
$msg='<p><font color="pink">你已经注册过帐号，请不要重复注册。</font>若已忘记密码，请&nbsp;<a href="/login/getpass.php">找回密码</a>&nbsp;。</p>';
}elseif($action==out){
$msg='<p><font color="pink">你已经成功登出，请重新登录。</font></p>';
}else{
$msg='';
}
?>
<div class="main">
<?=$msg;?>
<form action="/login/login_go.php" method="post">
<p><label class="liblogtag">邮箱</label></p>
<p><input type="text"  class="loginput" name="name" maxlength="50"></p>
<p><label class="liblogtag">密码</label></p>
<p><input type="password" name="password" class="loginput" maxlength="30"></p>
<p><label class="liblogtag">验证码&nbsp;|&nbsp;登录失败需刷新验证码</label></p>
<p><img  title="点击刷新" src="image.php" align="absbottom" onclick="this.src='image.php?'+Math.random();"></img>点击验证码刷新</p>
<p><input type="text"  class="loginput" name="var" size="5" style="height: 32px;" class="loginput" maxlength="4"></p>
<p><input class="libbtn" name="libreg" type="submit" value="登录">&nbsp;&nbsp;<a href="/login/getpass.php">找回密码</a>&nbsp;&nbsp;<a href="/register">注册帐号</a></p>
</form>
</div>
<?php include("../include/footutf.php"); ?> 