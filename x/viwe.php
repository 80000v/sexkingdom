<?php
include "../include/config.php";

if(!empty($_GET['pag'])){
$vpage = $_GET['pag'];
}
else{
$vpage = $_GET['id'];
}
$url="http://".$urlb."/html/xiaoshuo/".$vpage;
$nr=file_get_contents($url);
$nr=preg_replace('!<html.*<font color="#0000FF" style="font-size:15px;">!Uis','',$nr);
$nr=str_replace('<!DOCTYPE HTML>','',$nr);
$nr=str_replace('<br>','',$nr);
$nr=str_replace('<font color="Blue">','',$nr);

$nr=preg_replace('!</font></p>.*<div class="pagea">!Uis','',$nr);
$nr=str_replace('/html/xiaoshuo/','viwe.php?pag=',$nr);

$nr=preg_replace('!</div>
<div class="pagea">.*</html>!Uis','',$nr);

$nr=str_replace('</div>','',$nr);
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