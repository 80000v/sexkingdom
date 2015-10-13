<?php
include("../include/coon.php");
include("../include/function.php");
include "../include/config.php";
$sid=sqlstr($_COOKIE['user']);
$uin=mysql_fetch_array(mysql_query("select * from user where sid='$sid'"));
if(!$uin){
header("Location:../login");
exit;
}
$id=$uin['id'];
$vip=$uin["vip"];
$jb=$uin["jb"];
$jbz="10";
$cs=$jb/10;
echo '<div class="main">';
if($vip!=1){
echo '您不是VIP用户，只能浏览本页10次，剩余'.$cs.'次。<a href="../user/vipcz.php">充值VIP</a>';
if($jb < $jbz){
echo '浏览已结束';
header("Location:../vip.php");
exit;
}else{
$jbj=$jb-10;
mysql_query("UPDATE user SET jb='$jbj' WHERE id='$id'");
}
}
echo '</div>';
$url="http://".$urlb."/vod/".$_GET[id];
$nr=file_get_contents($url);
$nr=preg_replace('!<html.*<div class="nr-box-dh" style="margin-bottom:10px;">迅雷看看!Uis','迅雷看看',$nr);
$nr=preg_replace('!﻿DOCTYPE html PUBLIC.*dtd">!Uis','',$nr);
$nr=str_replace('<div class="vmain"><div class="vpl"><ul>','<hr>',$nr);
$nr=str_replace('<a href="http://soft.hao123.com/soft/appid/17131.html" title="去官网下载" target="_blank">下载迅雷看看播放器</a>','',$nr);
$nr=preg_replace('!</ul></div></div>.*阅读高速播放秘籍</a></ul>!Uis','',$nr);
$nr=str_replace('</ul></div></div>
</div>
</div><div class="nr-box" style="width:708px; margin-bottom:10px;">
<div class="clear">
<div class="nr-box-dh" style="margin-bottom:10px;">QQ旋风下载: (优点: 原版超清)、(缺点: 速度可能不稳定)</div>','<hr>QQ旋风下载: (优点: 原版超清)、(缺点: 速度可能不稳定)',$nr);
$nr=str_replace('</ul></div></div>
</div>
</div><div class="nr-box" style="width:708px; margin-bottom:10px;">
<div class="clear">
<div class="nr-box-dh" style="margin-bottom:10px;">快车下载: (优点: 原版超清)、(缺点: 速度可能不稳定)</div>','<hr>快车下载: (优点: 原版超清)、(缺点: 速度可能不稳定)',$nr);
$nr=str_replace('</ul></div></div>
</div>
</div><div class="nr-box" style="width:708px; margin-bottom:10px;">
<div class="clear">
<div class="nr-box-dh" style="margin-bottom:10px;">ed2k(电驴)下载: (优点: 原版超清)、(缺点: 速度可能不稳定)</div>','<hr>ed2k(电驴)下载: (优点: 原版超清)、(缺点: 速度可能不稳定)',$nr);

$nr=preg_replace('!<div class="play-nr-r" align="right" style="width:210px; padding-bottom:0px;">.*</html>!Uis','',$nr);


$nr=str_replace('</div>','',$nr);


$nr=str_replace('<div class="nr-box" style="width:708px; margin-bottom:10px;">
<div class="clear">
<div class="nr-box-dh" style="margin-bottom:10px;">','<hr>',$nr);
echo $ad2;

if(!isset($_COOKIE['ad'])){
echo '<div class="main">';

echo '您暂时没有访问本资源的权限，请花十秒钟获得【一整天】全站的访问权限。<hr>请点击下面的广告，请等待广告页面加载完成后在返回【刷新本页】<hr>';
echo $ad;
echo '</div>';
}
else{

echo '<div class="main">';
echo $nr;
echo '</div>';
}
include "../include/footutf.php";
?>