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
echo '����ʱû�з��ʱ���Դ��Ȩ�ޣ��뻨ʮ���ӻ�á�һ���졿ȫվ�ķ���Ȩ�ޡ�<hr>��������Ĺ�棬��ȴ����ҳ�������ɺ��ڷ��ء�ˢ�±�ҳ��<hr>';
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
echo '<div class="black"><a href="index.php?id='.$_GET[id].'&pag='.$navpage1.'" title="prev">&laquo; ��һҳ</a> | <a href="xiwe.php?id='.$_GET[sid].'&pag='.$navpage2.'" title="Next">��һҳ &raquo;</a></div>';
}
else{
$navpage = $svpage+1;
echo ' <div class="black">��һҳ | <a href="viwe.php?id='.$_GET[id].'&pag='.$navpage.'" title="Next">��һҳ &raquo;</a></div>';
}
}

include "../include/footgb.php";
?>