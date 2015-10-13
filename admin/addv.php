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
<div class="main">
<form action="addv_to.php" method="POST">
<p>ID：</p>
<p><input type="text"  class="loginput" name="id" maxlength="20"/></p>
<p><input class="libbtn" type="submit" value="添加认证" /></p>
</form>
</div>
	<?php

include "../include/footutf.php";

?>
