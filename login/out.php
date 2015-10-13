<?php
setcookie('user',$sid,time()-31536000,'/',$_SERVER['HTTP_HOST']);
header("location:/login/?out");
?>