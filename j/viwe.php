<?php
include "../include/headgb.php";
if(!empty($_GET['pag'])){
$svpage = $_GET['pag'];
$vpage = $_GET['pag'];
$a="_";
}
else{
$svpage = "1";
$a="";
}
$url="http://www.77tuba.com".$_GET[id]."".$a."".$vpage.".shtml";
$nr=file_get_contents($url);
$nr=preg_replace("!<HTML.*</tr><tr align='center'>!Uis","",$nr);
$nr=str_replace("<td valign='top'>","",$nr);
$nr=str_replace('<br/><br/></td>
</tr>','<br/>',$nr);
$nr=preg_replace('!</table>.*</html>!Uis','',$nr);
$nr=str_replace("<tr align='center'>","",$nr);
$nr=str_replace("src='/",'src="http://www.77tuba.com/',$nr);
$nr=str_replace('src="',"src='../image/?id=",$nr);
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
if($svpage > 1){
$navpage1 = $svpage-1;
$navpage2 = $svpage+1;
echo '<div class="black"><a href="index.php?id='.$_GET[id].'&pag='.$navpage1.'" title="prev">&laquo; 上一页</a> | <a href="xiwe.php?id='.$_GET[sid].'&pag='.$navpage2.'" title="Next">下一页 &raquo;</a></div>';
}
else{
$navpage = $svpage+1;
echo ' <div class="black">上一页 | <a href="viwe.php?id='.$_GET[id].'&pag='.$navpage.'" title="Next">下一页 &raquo;</a></div>';
}
}

include "../include/footgb.php";
?>