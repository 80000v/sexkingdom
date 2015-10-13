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
$name=sqlstr($_POST["name"]);
$password=sqlstr($_POST["password"]);
$var=strtolower($_POST['var']);
$row=mysql_fetch_array(mysql_query("SELECT * FROM user WHERE email='$name' order by id DESC"));
$sid=$row['sid'];
$pass=$row['password'];
if ($var !== $_SESSION['var']){
   echo "<div class='main'><p><font color='pink'>登录失败</font>，验证码错误了，仔细看看吧-_-||，注意：<font color='pink'>一个验证码只能使用一次，登录失败时要记得刷新验证码哦</font>。</p><p>返回&nbsp;<a href='javascript:history.go(-1)'>修改</a>&nbsp;一下吧</p></div>"; 
}elseif($name==Null or $password==Null){
echo '<div class="main"><p><font color="pink">登录失败</font>，太马虎了吧，你貌似忘了填一些空哦-_-||</p><p>返回&nbsp;<a href="javascript:history.go(-1)">修改</a>&nbsp;一下吧</p></div>';
}else{
if($password==$pass){
setcookie('user',$sid,time()+31536000,'/',$_SERVER['HTTP_HOST']);
header("Location:/user/");
exit;
}else{
echo '<div class="main"><p><font color="pink">登录失败</font>，可能是邮箱或者密码输入错误哦，好好想一想再登录吧(๑˙ー˙๑)，你也可以尝试&nbsp;<a href="/login/getpass.php">找回密码</a>&nbsp;。</p><p>返回&nbsp;<a href="javascript:history.go(-1)">修改</a>&nbsp;一下吧</p></div>';
}

}
unset($_SESSION['var']);
?>
<?php include("../include/footutf.php"); ?>