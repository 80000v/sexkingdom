<?php
session_start();
require 'image.class.php';  
$pder = new ProMeode();  
$pder->doimg();  
$_SESSION['var'] = $pder->getCode();
?>