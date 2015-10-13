<?php
include("../include/coon.php");
include("../include/function.php");
include("../include/config.php");
$sid=sqlstr($_COOKIE['user']);
$uin=mysql_fetch_array(mysql_query("select * from user where sid='$sid'"));
if(!$uin){
header("Location:/index.php");
exit;
}
$password=sqlstr($_POST["password"]);
$repassword=sqlstr($_POST["repassword"]);
$action=sqlstr($_GET["action"]);
if($action==post){
if($password!=Null or $repassword!=Null){
if($password!=$repassword){$sms="<p><font color='pink'>咦，怎么两次输入的密码不一样呢(•ิ_•ิ)？</font></p>";
} elseif(!preg_match("/^[0-9a-zA-Z]+$/",$password)){$sms="<p><font color='pink'>密码不能包含特殊符号哦-_-||</font></p>";
}else{
mysql_query("UPDATE user SET password='$password' WHERE id='$id'");
$sms="<p><font color='pink'>密码修改成功，此次修改的密码为: ".$password."</font>&nbsp;<a href='/index.php'>重新登录»</a></p>";
$usid=mksid($id,$name,$password);
mysql_query("UPDATE user SET sid='$usid' WHERE id='$id'");
}
}else{
$sms= "<p><font color='pink'>请输入新密码(๑• . •๑)</font></p>";
}
}
?>
<div class="main">
<?php echo $sms; ?>
<form action="password.php?action=post" method="post">
<p>输入新密码</p>
<p><input type="password" name="password"  class="loginput"maxlength="18"/></p>
<p>再次输入新密码</p>
<p><input type="password" name="repassword"  class="loginput"maxlength="18"/></p>
<p><input class="libbtn" name="libreg"type="submit" value="修改"></p>
</form>
<font color='pink'>*</font>&nbsp;修改密码将影响当前登录，修改后请使用新密码重新登录。
</div>
<?php include("../include/footutf.php"); ?>