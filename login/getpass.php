<?php
include("../include/coon.php");
include("../include/function.php");
include("../include/config.php");
$sid=sqlstr($_COOKIE['user']);
$user=mysql_fetch_array(mysql_query("select * from user where sid='$sid'"));
if($user){
header("Location:../index.php");
exit;
}
?>
<div class="main">
<p>找回密码</p>
<form action="getpass_go.php" method="post">
<p><input type="text"  class="loginput" name="email"></p>
<p><label class="liblogtag">验证码&nbsp;|&nbsp;发送失败需刷新验证码</label></p>
<p><img  title="点击刷新" src="image.php" align="absbottom" onclick="this.src='image.php?'+Math.random();"></img>点击验证码刷新</p>
<p><input type="text"  class="loginput" name="var" size="5" style="height: 32px;" class="loginput" maxlength="4"></p>
<p><input class="libbtn" name="libreg"type="submit" value="找回密码"></p> 
</form>
<p><font color="pink">*</font>&nbsp;请输入你注册时填写的邮箱，系统会把你注册的信息发送到你邮箱里哦。</p>
</div>
<?php include("../include/footutf.php"); ?> 