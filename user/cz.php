<?php
include("../include/coon.php");
include("../include/function.php");
include("../include/config.php");
$sid=sqlstr($_COOKIE['user']);
$uin=mysql_fetch_array(mysql_query("select * from user where sid='$sid'"));
if(!$uin){
header("Location:../login");
exit;
}
$id=$uin['id'];
$time=time();
$action=sqlstr($_GET["action"]);
$mk=sqlstr($_POST["mk"]);
$row=mysql_fetch_array(mysql_query("SELECT * FROM vipmk WHERE mk='$mk'"));
$mk1=$row['mk'];
if($action==post){
if($mk!=Null){
if($mk==$mk1){
$row=mysql_query("UPDATE user SET vip='1' WHERE id='$id'");
$row=mysql_query("DELETE FROM vipmk WHERE mk='$mk'");
echo '<div class=main><p><font color="pink">充值成功</font>*^_^*</p></div>';
}
}
}
?>

<div class="main">
<form action="cz.php?action=post" method="POST">
<p>vip充值，请输入密卡</p>
<p><textarea name="mk" rows="5" class="put" ><?php echo $a; ?></textarea></p>
<p><input class="libbtn" type="submit" value="提交"></p>
</form>
</div>

	<?php

include "../include/footutf.php";

?>