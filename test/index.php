<?php
include "./head.php";
$wz="http://cl8.pw/mfzl2.asp?glsb=Error";
$nr=file_get_contents($wz);
$nr=preg_replace('!<.*序。<br/>',$nr);
$nr=preg_replace('本站所有.*</wml>!Uis','',$nr);
$nr=str_replace('/Harticle.asp?id=','./viwe.php?id=',$nr);
echo $nr;
//include "./foot.php";
?>