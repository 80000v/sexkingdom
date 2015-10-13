<?php
  $imgurl=$_GET['id'];
 if($imgurl){
  header('Content-Type: image/JPEG');
  @ob_end_clean();
  @readfile($imgurl);
  @flush(); @ob_flush();
  exit();
 }else{
  exit('error');
 }
?>