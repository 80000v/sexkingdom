<?php
include "../include/config.php";
if(!empty($_GET['pag'])){
$vpage = $_GET['pag'];
}
else{
$vpage = "1";
}
$url="http://".$urlb."/vodlist/".$_GET[id]."_".$vpage.".html";
$nr=file_get_contents($url);
$nr=preg_replace('!<html.*<div class="zy-box">!Uis','',$nr);
$nr=str_replace('﻿<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">','',$nr);
$nr=str_replace('<div class="list-pianyuan-box">','<div class="thumb">',$nr);
$nr=str_replace('<div class="list-pianyuan-box-l">','',$nr);
$nr=preg_replace('!title=".*target="_blank"!Uis','',$nr);
$nr=preg_replace('!width="120".*border="0"!Uis','',$nr);
$nr=str_replace('<div class="list-pianyuan-box-r">','<div class="description">',$nr);
$nr=str_replace('target="_blank"','',$nr);
$nr=str_replace('<strong>','',$nr);
$nr=str_replace('</strong>','',$nr);
$nr=str_replace('<div>','<p>',$nr);
$nr=str_replace('</a></div>','</a></p>',$nr);
$nr=str_replace('<span>','',$nr);
$nr=str_replace('</span></div>','</p>',$nr);
$nr=str_replace('/vod/','viwe.php?id=',$nr);
$nr=preg_replace('!<div class="list-pianyuan-box-nr">.*</a></p>
</div>
</div>!Uis','</div>',$nr);

$nr=preg_replace('!</div>
<div class="zypag d10" style="width:950px;"  id="page2">.*</html>!Uis','',$nr);
$nr=str_replace('<div class="description">','</div><div class="description">',$nr);
$nr=str_replace('<p><a','<p><a class="video_title"',$nr);
echo $ad1;
echo $nr;
if($vpage > 1){
$navpage1 = $vpage-1;
$navpage2 = $vpage+1;
echo '<div class="black"><a href="index.php?id='.$_GET[id].'&pag='.$navpage1.'" title="prev">&laquo; 上一页</a> | <a href="index.php?id='.$_GET[id].'&pag='.$navpage2.'" title="Next">下一页 &raquo;</a></div>';
}
else{
$navpage = $vpage+1;
echo ' <div class="black">上一页 | <a href="index.php?id='.$_GET[id].'&pag='.$navpage.'" title="Next">下一页 &raquo;</a></div>';
}
include "../include/footutf.php";
?>