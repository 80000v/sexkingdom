<?php
include("./include/config.php");
header ( 'Content-Type:text/html;charset=utf-8 ');
?>
<div class="main">
<?php
date_default_timezone_set("Asia/Shanghai");
if($_POST["host"]!=NULL){
$datetime=date("Y.m.d H:i");
$mysql_host=$_POST["host"];
$mysql_user=$_POST["user"];
$mysql_password= $_POST["password"];
$mysql_database= $_POST["database"];
$conn=@mysql_connect("$mysql_host","$mysql_user","$mysql_password");
if($conn && @mysql_select_db("$mysql_database",$conn))
{
    echo "<font color=\"green\">数据库连接成功！</font><br/>";
$t='<?php
date_default_timezone_set("Asia/Shanghai");
//include_once("zone/good.php");
$datetime=date("Y.m.d H:i");
$mysql_host="'.$mysql_host.'";
$mysql_user="'.$mysql_user.'";
$mysql_password="'.$mysql_password.'";
$mysql_database="'.$mysql_database.'";
$conn=mysql_connect("$mysql_host","$mysql_user","$mysql_password");
if(!$conn){ die("连接数据库失败：" . mysql_error());}
mysql_select_db("$mysql_database",$conn);
mysql_query("set character set \'utf-8\'");
mysql_query("set names \'utf-8\'");
?>';
file_put_contents("./include/coon.php",$t);


	//用户表
	if(mysql_query("CREATE TABLE user(id int primary key auto_increment,time varchar(100), name varchar(6) not null unique, email varchar(50) not null unique, password varchar(30), sid varchar(40) not null unique,vip varchar(2),jb varchar(250)) DEFAULT CHARSET=utf8"))
    {
        echo "user 建表成功!<br/>";
    }
    else
    {
        if(mysql_query("SELECT * FROM user"))
        {
            echo "user数据表已存在!<br/>";   
        }
        else
        {
            echo "<font color=\"red\">user 建表失败!</font><br/>";    
        }           
    }


	//vip密卡表
	if(mysql_query("CREATE TABLE vipmk(id int primary key auto_increment,mk varchar(100),time varchar(100)) DEFAULT CHARSET=utf8"))
    {
        echo "vipmk 建表成功!<br/>";
    }
    else
    {
        if(mysql_query("SELECT * FROM vipmk"))
        {
            echo "vipmk数据表已存在!<br/>";   
        }
        else
        {
            echo "<font color=\"red\">user 建表失败!</font><br/>";    
        }           
    }


    echo "<p style=\"background:#AADD9A;padding: 5px 2px; \">建表过程结束，若无表单建立失败，就请进入<a href='index.php'>首页</a>看看吧！<br/>*<font color=\"red\">请立即注册账号，id为1的用户为默认管理员！</font><br/>
    请手动删除install.php或将其改名！</p>";

    $ok=1;
}
    else
    {
        echo "<font color=\"red\">数据库连接失败！</font>";
    }
}

if($ok!=1)
{
    echo "<b>感谢使用色撸程序，您正在进行程序安装，请填写相关数据：</b><br/><br/> <form method='POST' action=''>
    数据库地址:<input type='text' name='host' /><br/> 数据库用户名: <input type='text' name='user' /><br/> 数据库密码: <input type='text' name='password' /><br/> 
    数据库名: <input type='text' name='database' /><br/> <br/><input type='submit' value='一键安装' /> </form> ";
}
?>
</div>
<?php include("./include/footutf.php"); ?> 