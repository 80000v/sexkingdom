<?php

error_reporting(E_ALL ^ E_NOTICE);

include "include/config.php";


if(!empty($_GET['pag'])){
$vpage = $_GET['pag'];
}
else{
$vpage = 1;
}

$AddHeaders = array(
  'http'=>array(
    'method'=>"GET",
    'header'=>"User-Agent: Opera/9.80 (J2ME/MIDP; Opera Mini/9.80 (J2ME/23.377; U; en) Presto/2.5.25 Version/10.54"
  )
);

$context = stream_context_create($AddHeaders);
if(!empty($_GET['cat'])){
$vcat = $_GET['cat'];
$GrabURL = file_get_contents('http://www.pornhub.com/video?c='.$vcat.'&page='.$vpage.'',false,$context);
}
else{
$GrabURL = file_get_contents('http://www.pornhub.com/video?page='.$vpage.'',false,$context);
}
$GrabURL = strstr($GrabURL,'<div class="thumb">');
$GrabURL = str_replace('href="/view_video.php?viewkey=','href="view.php?id=',$GrabURL);
$GrabURL = str_replace('Length:','时间:',$GrabURL);
$GrabURL = str_replace('Views:','热度:',$GrabURL);
$GrabURL = str_replace('Rating:','评级:',$GrabURL);
$GrabURL = str_replace('[More Info]','免费下载',$GrabURL); 
//$GrabURL = str_replace('src="','src="img.php?id=',$GrabURL);
$GrabURL = preg_replace('#<div class="premiumAd(.*?)</div>(.*?)#s','',$GrabURL);
$GrabURL = preg_replace('#<div class="adCont(.*?)</html>(.*?)#s','',$GrabURL);

echo $ad1;

echo '<div class="black">最新视频</div>';
echo $GrabURL;


echo '<div class="black">'; 

if($vpage > 1){
$navpage1 = $vpage-1;
$navpage2 = $vpage+1;
echo '<a href="index.php?cat='.$vcat.'&pag='.$navpage1.'" title="prev">&laquo; 上一页</a> | <a href="index.php?cat='.$vcat.'&pag='.$navpage2.'" title="Next">下一页 &raquo;</a>';
}
else{
$navpage = $vpage+1;
echo '<span style="color: silver;">&laquo; 上一页</span> | <a href="index.php?cat='.$vcat.'&pag='.$navpage.'" title="Next">下一页 &raquo;</a>';
}

echo '</div>';

echo '<div class="black"><a href="link.php">友情链接【查看更多】</a></div><div class="dh_bg"><div class="dh_kz">';
echo $linktj;
echo '<a href="link.php">更多</a></div></div>';


include "include/footutf.php";

?>