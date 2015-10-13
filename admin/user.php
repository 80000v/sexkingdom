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

$page=sqlstr($_GET['page']);
$max=mysql_num_rows(mysql_query("SELECT * FROM user"));
$p=ceil($max/10);
if(!$page or $page>$p){
$page=1;
}
$low=10*($page-1);//开始查询的条数
$pagesize=10;//每页查询的条数
$rs=mysql_query("SELECT * FROM user ORDER BY id DESC LIMIT {$low},{$pagesize}");//列
while($uinfo=mysql_fetch_array($rs)){
$id=$uinfo['id'];
$name=$uinfo['name']; 
echo '<div class="main">'.ctime($uinfo["time"]).'<br/>ID: '.$id.'<br/>用户名(昵称): '.$name.'<br/>邮箱: '.$uinfo["email"].'<br/>密码: '.$uinfo["password"].'<br/><a href="userdelete.php?id='.$id.'">删除</a><hr></div>';
}
if($max){
$pa=$page;
if($page>1){
$pag=$page-1;
echo '<a href="user.php?page='.$pag.'">上一页</a>　';
} if($page<$p){
$page=$page+1;
echo  '<a href="user.php?page='.$page.'">下一页</a>';
}
}else{
echo '还没有人注册</div>';
}
?>
	<?php

include "../include/footutf.php";

?>
