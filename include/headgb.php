<?php
$url1='http://'.$_SERVER['SERVER_NAME'].$_SERVER["REQUEST_URI"]; 
    $id = "1";
    $title = "ɫߣ������1.2��ʾվ";
    $urlwz = "11111.ml�����һ��ml��";
    $ad1="<div class='main'><a href='".$url1."?&ad=1'>վ���Ƽ������ſ���ƽ̨ˢ���뿪�ȶ�</a></div>";
    $ad1url="http://ad.qc510.com/c?c=542@104";
    $ad2="<div class='main'><a href='".$url1."?&ad=2'>վ���Ƽ������ſ���ƽ̨ˢ���뿪�ȶ�</a></div>";
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
<center> <a href="/user">�û�����</a>
<input type="button" onclick="show('b')" value="չ����Ŀ����"></center>
 </div>
 <div id="b">
<div class="black">��Ƶ��</div>
<div class="dh_bg"><div class="dh_kz">
<a href="/index.php?cat=1">����</a>
<a href="/index.php?cat=55">ŷ��</a>
<a href="/index.php?cat=81">�Ʒ�</a>
<a href="/index.php?cat=22">��ο</a>
<a href="/index.php?cat=80">�ּ�</a>
<a href="/index.php?cat=23">���</a>
<a href="/main.php?name=hentai">����</a>
<a href="/index.php?cat=10">��Ű</a>
<a href="/index.php?cat=14">����</a>
<a href="categories.php">����</a>
</div></div>
<div class="black">��Ӱ��</div>
<div class="dh_bg"><div class="dh_kz">
<a href="/d/?id=1">����</a>
<a href="/d/?id=3">ŷ��</a>
<a href="/d/?id=6">˿��</a>
<a href="/d/?id=5">��Ű</a>
<a href="/d/?id=10">ͬ��</a>
</div></div>
<div class="black">ͼƬ��</div>
<div class="dh_bg"><div class="dh_kz">
<a href="/t/?id=yazhousetu">����</a>
<a href="/t/?id=oumeisetu">ŷ��</a>
<a href="/t/?id=qingchunweimei">�崿</a>
<a href="/t/?id=toupaizipai">����</a>
<a href="/t/?id=dongmantupian">����</a>
</div></div>
<div class="black">������</div>
<div class="dh_bg"><div class="dh_kz">
<a href="/x/?id=jiqingxiaoshuo">����</a>
<a href="/x/?id=luanlunxiaoshuo">����</a>
<a href="/x/?id=xiaoyuanchunse">У԰</a>
<a href="/x/?id=xingaijiqiao">����</a>
<a href="/x/?id=changpianlianzai">��ƪ</a>
</div></div>
<div class="black">ͼ����</div>
<div class="dh_bg"><div class="dh_kz">
<a href="/j/?id=1009&sid=1296">ROSI</a>
<a href="/j/?id=1047&sid=1335">����</a>
<a href="/j/?id=1034&sid=1322">����</a>
<a href="/j/?id=1007&sid=1294">����</a>
<a href="/j/?id=1020&sid=1308">����</a>
<a href="/j/?id=1021&sid=1309">����</a>
<a href="/j/?id=1029&sid=1312">��˿</a>
<a href="/j/?id=1026&sid=1315">3Agirl</a>
<a href="/j/?id=1035&sid=1323">��һ</a>
<a href="/j/categories.php">����</a>
</div></div>
</div>
</div>