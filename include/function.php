<?php
function mksid($id,$name,$pass)
{
return strtr(str_shuffle(base64_encode(md5(md5($name,true).md5(microtime(),true).md5($pass,true),true))).base64_encode(pack('V',$id)), array('+'=>'-', '/'=>'_','='=>'.'));
}
//自定义sid生成算法

function sqlstr($str) {
  return mysql_real_escape_string($str);
}
//定义转义

function htime($time) 
{
    $htime = date("H:i",$time);
    return $htime;
}
function ytime($time) 
{
    $rtime = date("Y-m-d",$time);
    return $rtime;
}
function wtime($time)
{
$weekarray= array( "天" , "一" , "二" , "三" , "四" , "五" , "六" );
return "星期" . $weekarray[date( "w",$time)];
}

//时间戳处理
function ctime($time) 
{
    $rtime = date("Y年m月d日 H:i",$time);
    $htime = date("H:i",$time);
    $time = time() - $time;
    if ($time < 60) {
        $str = '刚刚';
    }
    elseif ($time < 60 * 60) {
        $min = floor($time/60);
        $str = $min.'分钟前';
    }
    elseif ($time < 60 * 60 * 24){
        $h = floor($time/(60*60));
        $str = $h.'小时前 '.$htime;
    }
    elseif ($time < 60 * 60 * 24* 3) {
        $d = floor($time/(60*60*24));
        if($d==1)
           $str = '昨天 '.$htime;
        else
           $str = '前天 '.$htime;
    }
    else {
        $str = $rtime;
    }
    return $str;
}


//统计记录天数

function diaryday($id)
{

 $rs=mysql_query('select * from `diary` where diarywriteid='.$id.'');
  if(!$rs){
   return "零";
  }else{
    while($array=mysql_fetch_array($rs)){
    $day[date('Y-m-d',$array['diarytime'])]=true;
    }
  return count($day);
  }

}



?>