<?php
include "../include/config.php";
if(!empty($_GET['pag'])){
$vpage = $_GET['pag'];
}
else{
$vpage = "2";
}
$url="http://".$urlb."/html/xiaoshuo/".$_GET[id]."/index_".$vpage.".html";
$nr=file_get_contents($url);
$nr=preg_replace('!<html>.*<div class="zxlist">!Uis','',$nr);
$nr=str_replace('<!DOCTYPE HTML>','',$nr);
$nr=preg_replace('!<iframe.*</iframe>!Uis','',$nr);
$nr=str_replace('<ul>','',$nr);
$nr=str_replace('</ul>','<hr>',$nr);
$nr=str_replace('<li>','',$nr);
$nr=str_replace('</li>','',$nr);
$nr=str_replace('<img src="http://ww3.sinaimg.cn/large/a74e55b4jw1e18mycmbyvg.gif" alt="[!--pagetitle--]" border="0">','',$nr);
$nr=str_replace('/html/xiaoshuo/','viwe.php?id=',$nr);
$nr=str_replace(' target="_blank"','',$nr);
$nr=preg_replace('!<li class="zxsyd">.*</font>!Uis','',$nr);
$nr=preg_replace('!<div class="box_page">.*</html>!Uis','',$nr);
$nr=preg_replace('!<script>.*</script>!Uis','',$nr);

$nr=str_replace('</div>','',$nr);
echo $ad1;
echo '<hr>';
echo '<div class="main">';
echo $nr;
echo '</div>';
if($vpage > 2){
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