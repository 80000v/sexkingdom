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
$time=time();
$name=sqlstr($_POST["name"]);
$email=sqlstr($_POST["email"]);
$password=sqlstr($_POST["password"]);
$repassword=sqlstr($_POST["repassword"]);
$sid=mksid($id,$name,$password);
$var=strtolower($_POST['var']);
$vip="0";
$jb="100";
if ($var !== $_SESSION['var']){
   echo "<div class='main'><p><font color='red'>注册失败</font>，验证码错误了，仔细看看吧-_-||，注意：<font color='red'>一个验证码只能使用一次，注册失败时要记得刷新验证码哦</font>。</p><p>返回&nbsp;<a href='javascript:history.go(-1)'>修改</a>&nbsp;一下吧</p></div>"; 
}elseif($name==Null or $email==Null or $password==Null or $repassword==Null){echo "<div class='main'><p><font color='red'>注册失败</font>，太马虎了吧，你貌似忘了填一些空哦-_-||</p><p>返回&nbsp;<a href='javascript:history.go(-1)'>修改</a>&nbsp;一下吧</p></div>";
}elseif(mysql_fetch_array(mysql_query("SELECT * FROM user  WHERE name='$name'"))){echo "<div class='main'><p><font color='red'>注册失败</font>，你选的昵称已经被其他人占用了(◎_◎)</p><p>返回&nbsp;<a href='javascript:history.go(-1)'>修改</a>&nbsp;一下吧</p></div>";

}elseif($password!=$repassword){echo "<div class='main'><p><font color='red'>注册失败</font>，怎么两次输入的密码不一样呢(•ิ_•ิ)？</p><p>返回&nbsp;<a href='javascript:history.go(-1)'>修改</a>&nbsp;一下吧</p></div>";
}
elseif(mysql_fetch_array(mysql_query("SELECT * FROM user  WHERE email='$email'"))){echo "<div class='main'><p><font color='red'>注册失败</font>，之前用这个邮箱注册的人，不是你么(•ิ_•ิ)?</p><p>返回&nbsp;<a href='javascript:history.go(-1)'>修改</a>&nbsp;一下吧</p></div>";
}
elseif(!preg_match('/^[\x{4e00}-\x{9fa5}_]+$/us',$name)){
echo "<div class='main'><p><font color='red'>注册失败</font>，昵称仅可由中文和下划线组成(๑• . •๑)</p><p>返回&nbsp;<a href='javascript:history.go(-1)'>修改</a>&nbsp;一下吧</p></div>" ;
}
elseif(!preg_match("/^[0-9a-zA-Z]+$/",$password)){echo "<div class='main'><p><font color='red'>注册失败</font>，密码不能包含特殊符号哦-_-||</p><p>返回&nbsp;<a href='javascript:history.go(-1)'>修改</a>&nbsp;一下吧</p></div>";
}elseif(mb_strlen($name,'utf-8') < 2 or mb_strlen($name,'utf-8')> 6){echo "<div class='main'><p><font color='red'>注册失败</font>，昵称长度应在2~6个字之间啊-_-||</p><p>返回&nbsp;<a href='javascript:history.go(-1)'>修改</a>&nbsp;一下吧</p></div>";
}else{

mysql_query("INSERT INTO user(name,time,email,password,sid,vip,jb) VALUES ('$name', '$time', '$email', '$password','$sid','$vip','$jb')" );
$ok=isreg;
setcookie('reg',$ok,time()+31536000);//设置cookies

$uinfo=mysql_fetch_array(mysql_query("SELECT * FROM user  WHERE email='$email'"));
$id=$uinfo["id"];
echo "<div class='main'><p><font color='red'>恭喜，注册成功</font></p><p>你注册的信息，请牢记：</p><p>---------------</p><p>昵称：".$name."</p><p>密码：".$password."</p><p>邮箱：".$email."</p><p>个人地址：http://".$_SERVER [ 'SERVER_NAME' ]."/user?".$id."</p><p>---------------</p><p>祝你愉快</p>";
echo "<p><a href='../login'>返回登录»</p></div>";

}
unset($_SESSION['var']);
?>
<?php include("../include/footutf.php"); ?> 