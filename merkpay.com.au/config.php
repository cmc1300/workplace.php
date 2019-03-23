<?php 
session_start();
$myconn=mysql_connect("localhost","tenpayco_db","tenpayco_db");
mysql_select_db("tenpayco_db",$myconn);
mysql_query("SET NAMES 'utf8'");

//echo $rs;
?>