<?php

include "../include/headgb.php";
if(!empty($_GET['pag'])){
$vpage = $_GET['pag'];
}
else{
$vpage = "1";
}
$url="http://www.77tuba.com/".$_GET[id]."/list_".$_GET['sid']."_".$vpage.".shtml";
$nr=file_get_contents($url);
$nr=preg_replace('!<HTML.*<table width="975" border="0" align="center" cellpadding="0" cellspacing="0">!Uis','',$nr);
$nr=str_replace('?<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">','',$nr);
$nr=preg_replace("!<td width='20%'>.*<td bgcolor='#FFFFFF'>!Uis","",$nr);
$nr=str_replace('target=_blank','',$nr);
$nr=preg_replace('!<img.*alt=!Uis','',$nr);
$nr=str_replace('width=150  border=0></a></td>','',$nr);

$nr=str_replace('href=','href=viwe.php?sid='.$_GET['sid'].'&id=',$nr);

$nr=preg_replace("!<tr>
<td width='20%'>.*</html>!Uis","",$nr);

$nr=preg_replace("!<tr>.*</tr>!Uis","",$nr);

$nr=preg_replace("!</tr>.*<td height='35'>!Uis","</a><hr>",$nr);

$nr=str_replace('</a></td>','',$nr);

$nr=preg_replace("!</table>.*<td height='35'>!Uis","",$nr);
$nr=preg_replace("!</tr>.*</tr>!Uis","",$nr);
$nr=str_replace('.shtml','',$nr);

echo $ad1;
echo '<hr>';
echo '<div class="main">';
echo $nr;
echo '</a></div>';
if($vpage > 2){
$navpage1 = $vpage-1;
$navpage2 = $vpage+1;
echo '<div class="black"><a href="index.php?id='.$_GET[id].'&sid='.$_GET[sid].'&pag='.$navpage1.'" title="prev">&laquo; 上一页</a> | <a href="index.php?id='.$_GET[id].'&sid='.$_GET[sid].'&pag='.$navpage2.'" title="Next">下一页 &raquo;</a></div>';
}
else{
$navpage = $vpage+1;
echo ' <div class="black">上一页 | <a href="index.php?id='.$_GET[id].'&sid='.$_GET[sid].'&pag='.$navpage.'" title="Next">下一页 &raquo;</a></div>';
}
include "../include/footgb.php";
?>