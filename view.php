<?php


include "include/config.php";


if(!empty($_GET['id'])){
$videoID = $_GET['id'];

$AddHeaders = array(
  'http'=>array(
    'method'=>"GET",
    'header'=>"User-Agent: Opera/9.80 (J2ME/MIDP; Opera Mini/9.80 (J2ME/23.377; U; en) Presto/2.5.25 Version/10.54"
  )
);

$context = stream_context_create($AddHeaders);
$GrabURL = file_get_contents('http://www.pornhub.com/view_video.php?viewkey='.$videoID.'',false,$context);
$GrabURL = strstr($GrabURL,'<div class="title">');
$GrabURL = str_replace('<div class="title">','<div class="black">',$GrabURL);
$GrabURL = str_replace('<h1>','',$GrabURL);
$GrabURL = str_replace('</h1>','',$GrabURL);
$GrabURL = str_replace('Length:','时间:',$GrabURL);
$GrabURL = str_replace('Views:','热度:',$GrabURL);
$GrabURL = str_replace('Rating:','评级:',$GrabURL);
$GrabURL = str_replace('[More Info]','{更多信息}',$GrabURL);
$GrabURL = str_replace('PLAY:','下载:',$GrabURL);
$GrabURL = preg_replace('#<!--<div class="add_this_box">(.*?)<div class="page_container">(.*?)#s','',$GrabURL);
$GrabURL = str_replace('Related Scenes','相关视频',$GrabURL);
$GrabURL = str_replace('href="/view_video.php?viewkey=','href="view.php?id=',$GrabURL);
//$GrabURL = str_replace('src="','src="img.php?id=',$GrabURL);

$GrabURL = preg_replace('#<div class="adCont(.*?)</html>(.*?)#s','',$GrabURL);
echo $ad2;
if(!isset($_COOKIE['ad'])){

echo '<div class="main">';
echo '您暂时没有访问本资源的权限，请花十秒钟获得【一整天】全站的访问权限。<hr>请点击下面的广告，请等待广告页面加载完成后在返回【刷新本页】<hr>';
echo $ad;
echo '</div>';
}
else{

echo $GrabURL;
}
}
else{
echo '<div class="black">视频为空</div>';
echo '<div class="red"> URL是无效的…请检查它并再试一次 .</div>';
}

include "include/footutf.php";

?>