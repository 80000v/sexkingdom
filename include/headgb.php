<?php
$url1='http://'.$_SERVER['SERVER_NAME'].$_SERVER["REQUEST_URI"]; 
    $id = "1";
    $title = "色撸网程序1.2演示站";
    $urlwz = "11111.ml（五个一点ml）";
    $ad1="<div class='main'><a href='".$url1."?&ad=1'>站长推荐：汇雅卡盟平台刷钻秒开稳定</a></div>";
    $ad1url="http://ad.qc510.com/c?c=542@104";
    $ad2="<div class='main'><a href='".$url1."?&ad=2'>站长推荐：汇雅卡盟平台刷钻秒开稳定</a></div>";
    $ad2url="http://ad.qc510.com/c?c=542@104";
    $cnzz='<script src="http://s95.cnzz.com/z_stat.php?id=1256444615&web_id=1256444615" language="JavaScript"></script>';
if(!empty($_GET['ad'])){
$value = $id;
setcookie("ad",$value, time()+40000);
header("Location:".$ad1url."");
exit;
}
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="te/x/t/html; charset=gb2312">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php echo $title; ?></title>
<link rel="stylesheet" type="te/x/t/css" href="/css/style.css?v=201509132148" />
<style type="text/css" >
#b{ display:none;} 
</style>
</head>
<script type="text/javascript">
function show(obj){
var obj=document.getElementById(obj);
if(obj.style.display=="block"){
obj.style.display="none";
}else 
obj.style.display="block";
}
</script>
<body>
<header>
<div class="header_top"><h1 class="header_top_logo"><a href="/index.php"><img height="27" src="/css/<?php echo $id; ?>.png"></a></h1><div class="header_top_right"></div></div>
 </header>

  <div id="a">
   <div class="main">
<center> <a href="/user">用户中心</a>
<input type="button" onclick="show('b')" value="展开栏目分类"></center>
 </div>
 <div id="b">
<div class="black">视频区</div>
<div class="dh_bg"><div class="dh_kz">
<a href="/index.php?cat=1">亚洲</a>
<a href="/index.php?cat=55">欧美</a>
<a href="/index.php?cat=81">制服</a>
<a href="/index.php?cat=22">自慰</a>
<a href="/index.php?cat=80">轮奸</a>
<a href="/index.php?cat=23">玩具</a>
<a href="/main.php?name=hentai">动漫</a>
<a href="/index.php?cat=10">性虐</a>
<a href="/index.php?cat=14">颜射</a>
<a href="categories.php">更多</a>
</div></div>
<div class="black">电影区</div>
<div class="dh_bg"><div class="dh_kz">
<a href="/d/?id=1">亚洲</a>
<a href="/d/?id=3">欧美</a>
<a href="/d/?id=6">丝袜</a>
<a href="/d/?id=5">性虐</a>
<a href="/d/?id=10">同性</a>
</div></div>
<div class="black">图片区</div>
<div class="dh_bg"><div class="dh_kz">
<a href="/t/?id=yazhousetu">亚洲</a>
<a href="/t/?id=oumeisetu">欧美</a>
<a href="/t/?id=qingchunweimei">清纯</a>
<a href="/t/?id=toupaizipai">自拍</a>
<a href="/t/?id=dongmantupian">动漫</a>
</div></div>
<div class="black">文章区</div>
<div class="dh_bg"><div class="dh_kz">
<a href="/x/?id=jiqingxiaoshuo">激情</a>
<a href="/x/?id=luanlunxiaoshuo">乱伦</a>
<a href="/x/?id=xiaoyuanchunse">校园</a>
<a href="/x/?id=xingaijiqiao">技巧</a>
<a href="/x/?id=changpianlianzai">长篇</a>
</div></div>
<div class="black">图集区</div>
<div class="dh_bg"><div class="dh_kz">
<a href="/j/?id=1009&sid=1296">ROSI</a>
<a href="/j/?id=1047&sid=1335">美媛</a>
<a href="/j/?id=1034&sid=1322">秀人</a>
<a href="/j/?id=1007&sid=1294">绳艺</a>
<a href="/j/?id=1020&sid=1308">韩日</a>
<a href="/j/?id=1021&sid=1309">第四</a>
<a href="/j/?id=1029&sid=1312">盘丝</a>
<a href="/j/?id=1026&sid=1315">3Agirl</a>
<a href="/j/?id=1035&sid=1323">如一</a>
<a href="/j/categories.php">更多</a>
</div></div>
</div>
</div>