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
<form action="register_go.php" method="post">
<p><label class="liblogtag">邮箱(登录用，请输入正确)</label></p>
<p><input type="text"  class="loginput" name="email" maxlength="50"></p>
<p><label class="liblogtag">密码</label></p>
<p><input type="password" name="password"  class="loginput"maxlength="30"></p>
<p><label class="liblogtag">确认密码</label></p>
<p><input type="password" name="repassword"  class="loginput" maxlength="30"></p>
<p><label class="liblogtag">昵称</label></p>
<p><input type="text"  class="loginput" name="name" maxlength="6"></p>
<p><label class="liblogtag">验证码&nbsp;|&nbsp;注册失败需刷新验证码</label></p>
<p><img  title="点击刷新" src="image.php" align="absbottom" onclick="this.src='image.php?'+Math.random();"></img>点击验证码刷新</p>
<p><input type="text"  class="loginput" name="var" size="5" style="height: 32px;" class="loginput" maxlength="4"></p>
<p><input class="libbtn" name="libreg"type="submit" value="注册"></p>
</form>
</div>
<?php include("../include/footutf.php"); ?> 