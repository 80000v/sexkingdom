<?php
include("../include/coon.php");
include("../include/function.php");
include("../include/config.php");
$sid = sqlstr($_COOKIE['user']);
$uin=mysql_fetch_array(mysql_query("select * from user where sid='$sid'"));
$uid=$uin['id'];
if($uid!=1){
header("Location:../index.php");
exit;
}
?>
<?php	  if($_SERVER['REQUEST_METHOD'] == "POST") 
    {
	extract($_POST,EXTR_SKIP);
	$con=file_get_contents('../include/config.php');
	$con=str_replace('title="'.$title.'"','title="'.$title1.'"',$con);

	$con=str_replace('urlwz="'.$urlwz.'"','urlwz="'.$urlwz1.'"',$con);
	
	$con=str_replace('ad1title="'.$ad1title.'"','ad1title="'.$ad1title1.'"',$con);
	
	$con=str_replace('ad1url="'.$ad1url.'"','ad1url="'.$ad1url1.'"',$con);
	$con=str_replace('ad2title="'.$ad2title.'"','ad2title="'.$ad2title1.'"',$con);
	$con=str_replace('ad2url="'.$ad2url.'"','ad2url="'.$ad2url1.'"',$con);
	$con=str_replace("linktj='".$linktj."'", "linktj='".$linktj1."'", $con);
	$con=str_replace("link='".$link."'", "link='".$link1."'", $con);
	file_put_contents('../include/config.php', $con); 
	echo '<div class="main">修改成功！</div>';
include "../include/footutf.php";

		exit;
}

?>
<div class="main">
<a href="user.php">管理会员</a>
<hr>
<a href="addv.php">增加vip</a>
<hr>
<a href="mk.php">增加vip密卡</a>
<hr>
网站设置↓
<hr>
	<form action="index.php" method="post">
	网站名称：
 	<input type="text" name="title1" value="<?php echo $title; ?>"><br/>
 	网站地址：
 	<input type="text" name="urlwz1" value="<?php echo $urlwz; ?>"><br/>
 	广告1标题：
 	<input type="text" name="ad1title1" value="<?php echo $ad1title; ?>"><br/>
	广告1网址：
 	<input type="text" name="ad1url1" value="<?php echo $ad1url; ?>"><br/>
	广告2标题：
 	<input type="text" name="ad2title1" value="<?php echo $ad2title; ?>"><br/>
	广告2网址：
 	<input type="text" name="ad2url1" value="<?php echo $ad2url; ?>"><br/>
	首页固链：<br/>
	<textarea name="linktj1" rows="5" class="put" ><?php echo $linktj; ?></textarea><br/>
	友情链接：<br/>
	<textarea name="link1" rows="5" class="put" ><?php echo $link; ?></textarea>
	<br/><input type="submit" value="提交"></form>
	</div>
	<?php

include "../include/footutf.php";

?>
