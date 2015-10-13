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
include("email.php");
$email=sqlstr($_POST["email"]);
$var=strtolower($_POST['var']);
if ($var !== $_SESSION['var']){
   echo "<div class='main'><p><font color='pink'>发送失败</font>，验证码错误了，仔细看看吧-_-||，注意：<font color='pink'>一个验证码只能使用一次，登录失败时要记得刷新验证码哦</font>。</p><p>返回&nbsp;<a href='javascript:history.go(-1)'>修改</a>&nbsp;一下吧</p></div>"; 
}elseif($email!=null){
if(!preg_match("/^[0-9a-z_]+@([0-9a-z]*[0-9a-z].)[a-z]{2,3}$/",$email)){ echo "<div class='main'><p><font color='pink'>发送失败</font>，你输入的邮箱格式不正确-_-||</p><p>返回&nbsp;<a href='javascript:history.go(-1)'>修改</a>&nbsp;一下吧</p></div>";
}else{
$uinfo=mysql_fetch_array(mysql_query("select * from user where email='$email'"));
$email=$uinfo["email"];
$pass=$uinfo["password"];
$txt='感谢你支持'.$title.'，密码已经帮你找回来啦。

邮箱：'.$email.'
密码：'.$pass.'';
if($uinfo){
 $smtp = new Smtp; 
  
 $smtp->smtp('smtp.qq.com');           //邮件发送服务器 
 $smtp->pors(25);                      //邮件服务器端口 
 $smtp->login( 'yixianyinxiang@foxmail.com');     //邮件服务器登录用户 
 $smtp->pass('');             //邮件服务器登录密码 
 $smtp->mails( $email);    //邮件接收人 
 $smtp->from( 'yixianyinxiang@foxmail.com');      //邮件发送人 
 $smtp->come( 'yixianyinxiang@foxmail.com');  //接收邮件回复地址 
 $smtp->title(''.$title.'已为你找回密码');  //邮件主题 
 $smtp->body($txt);   //邮件内容 
 echo "<div class='main'><p><font color='pink'>发送成功</font>，".$smtp->send()."</p><p><a href='http://".$email."'>登录邮箱</a>&nbsp;查收吧</p></div>";
}

 else
 {
 echo "<div class='main'><p><font color='pink'>发送失败</font>，咦，数据库里木有找到你输入的邮箱啊(•ิ_•ิ)?</p><p>返回&nbsp;<a href='javascript:history.go(-1)'>修改</a>&nbsp;一下吧</p></div>";
 }
 }
 }else{
 echo "<div class='main'><p><font color='pink'>发送失败</font>，太马虎了吧，你貌似忘了填邮箱哦-_-||</p><p>返回&nbsp;<a href='javascript:history.go(-1)'>修改</a>&nbsp;一下吧</p></div>";
 }
 
 unset($_SESSION['var']);

?> 
<?php include("../include/footutf.php"); ?> 